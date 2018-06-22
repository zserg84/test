<?php
namespace base\repositories;


use base\entities\UserAlg;

class UserAlgRepository
{

    public function save(UserAlg $userAlg)
    {
        if (!$userAlg->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }
}