<?php

namespace tests\_fixtures;

use base\entities\User;
use yii\test\ActiveFixture;

class UserFixture extends ActiveFixture
{
    public $modelClass = User::class;
    public $dataFile = '@tests/_fixtures/data/user.php';
}