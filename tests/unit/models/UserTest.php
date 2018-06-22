<?php

namespace tests\models;

use app\models\Identity;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        expect_that($identity = Identity::findIdentity(1));
        expect($identity->getUser()->username)->equals('test');

        expect_not(Identity::findIdentity(999));
    }

    public function testFindUserByAccessToken()
    {
        expect_that($identity = Identity::findIdentityByAccessToken('1-token'));
        expect($identity->getUser()->username)->equals('test');

        expect_not(Identity::findIdentityByAccessToken('non-existing'));
    }

}
