<?php

namespace tests\models;

use base\entities\UserAlg;

class UserAlgTest extends \Codeception\Test\Unit
{
    public function testCreateUserAlg()
    {
        $userId = 1;
        $number = 5;
        $data = [2,3,5,6];
        $result = 3;
        expect_that($userAlg = UserAlg::create($userId, $number, $data, $result));
        expect($userAlg->number)->equals($number);
        expect($userAlg->data)->equals($data);
        expect($userAlg->result)->equals($result);

        expect($userAlg->number)->notEquals($number+1);
        expect($userAlg->data)->notEquals(array_merge($data, [2]));
        expect($userAlg->result)->notEquals($result+1);
    }

}
