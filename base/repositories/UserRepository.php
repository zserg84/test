<?php

namespace base\repositories;


use base\entities\User;

class UserRepository
{

    public function find($id)
    {
        return User::findOne($id);
    }

    public function findActiveByUsername($username)
    {
        return User::findOne(['username' => $username, 'status' => User::STATUS_ACTIVE]);
    }

    public function findActiveById($id)
    {
        return User::findOne(['id' => $id, 'status' => User::STATUS_ACTIVE]);
    }

    public function findByAccessToken($token)
    {
        return User::findOne(['access_token' => $token]);
    }

}