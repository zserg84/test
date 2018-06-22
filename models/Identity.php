<?php

namespace app\models;

use base\entities\User;
use base\repositories\UserRepository;
use yii\web\IdentityInterface;

/**
 * Class Identity
 * @package app\models
 */
class Identity implements IdentityInterface
{
    /**
     * @var User
     */
    private $user;

    /**
     * User constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return object
     */
    private static function getRepository()
    {
        return \Yii::$container->get(UserRepository::class);
    }

    /**
     * @param int|string $id
     * @return Identity|null
     */
    public static function findIdentity($id)
    {
        $user = self::getRepository()->findActiveById($id);
        return $user ? new self($user): null;
    }

    /**
     * @param mixed $token
     * @param null $type
     * @return Identity|null
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = self::getRepository()->findByAccessToken($token);
        return $user ? static::findIdentity($user->id) : null;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->user->id;
    }

    /**
     * @return mixed
     */
    public function getAuthKey()
    {
        return $this->user->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function getUser()
    {
        return $this->user;
    }
}
