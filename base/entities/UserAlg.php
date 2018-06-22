<?php
namespace base\entities;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;


/**
 * UserAlg model
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $number
 * @property string $data
 * @property float $result
 */
class UserAlg extends ActiveRecord
{

    /**
     * Создаем привязку данных по алгоритму к пользователю
     * @param $userId
     * @param $number
     * @param $data
     * @param $result
     * @return static
     */
    public static function create($userId, $number, $data, $result)
    {
        $userAlg = new static();
        $userAlg->user_id = $userId;
        $userAlg->number = $number;
        $userAlg->data = $data;
        $userAlg->result = $result;
        return $userAlg;
    }

    ###############################

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_alg}}';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['user_id', 'number', 'created_at'], 'integer'],
            [['data'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false
            ]
        ];
    }
}