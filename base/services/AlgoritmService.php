<?php
namespace base\services;
use base\entities\UserAlg;
use base\repositories\UserAlgRepository;


/**
 * Class AlgoritmService
 * @package app\services
 */
class AlgoritmService
{
    /**
     * @var UserAlgRepository
     */
    private $userAlgRepository;

    public function __construct(UserAlgRepository $userAlgRepository)
    {
        $this->userAlgRepository = $userAlgRepository;
    }

    /**
     * Алгоритм следующий:
     * Входящий массив делится на 2 части по позиции разделителя. Если разделитель не задан - делим пополам.
     * В левом массиве считаем количество совпадающиъх с нашим числом значений.
     * В правом - несовпадающих.
     * Если слева меньше чисел, двигаем вправо(правый массив делим пополам и сдвигаем разделитель на полученное число).
     * Если слева больше чисел, двигаем влево(левый массив делим пополам и сдвигаем разделитель на полученное число)
     *
     * @param $num - число, по которому осуществляем поиск
     * @param $array - входящий массив
     * @param int $key - позиция элемента, перед которым разделяем массив
     * @param int $keyBefore - предыдущая позиция элемента, перед которым разделяем массив
     * @return int
     */
    public function algorithm($num, $array, $key=0, $keyBefore=0)
    {
        $count = count($array);

        $key = $key == 0 ? floor($count / 2) : $key;

        $leftArray = array_slice($array, 0, $key);
        $rightArray = array_slice($array, $key);

        $leftCount = $rightCount = 0;
        foreach ($leftArray as $el){
            if($el == $num){
                $leftCount++;
            }
        }
        foreach($rightArray as $el){
            if($el != $num){
                $rightCount++;
            }
        }

        if($leftCount == 0 && $rightCount == 0)
            return -1;
        elseif($leftCount == $rightCount)
            return $key;
        else{
            if($leftCount < $rightCount){
                $prepareArray = $key < $keyBefore
                    ? array_slice($rightArray, 0, $keyBefore - $key)
                    : array_slice($rightArray, 0);
                return !$prepareArray ? -1 : self::algorithm($num, $array, $key + floor(count($prepareArray) / 2), $key);
            }
            else{
                if($key < $keyBefore){
                    $prepareArray = array_slice($leftArray, 0, $key);
                    return !$prepareArray ? -1 : self::algorithm($num, $array, floor(count($prepareArray) / 2), $key);
                }
                else{
                    $prepareArray = array_slice($leftArray, $keyBefore, $key - $keyBefore);
                    return !$prepareArray ? -1 : self::algorithm($num, $array, $keyBefore + floor(count($prepareArray) / 2), $key);
                }
            }
        }
    }

    /**
     * Сохраняем привязку данных об алгоритме к пользователю
     * @param $user
     * @param $number
     * @param $data
     * @param $result
     */
    public function saveForUser($user, $number, $data, $result)
    {
        $userAlg = UserAlg::create($user->id, $number, $data, $result);
        $this->userAlgRepository->save($userAlg);
    }
}