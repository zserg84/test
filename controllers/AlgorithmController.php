<?php

namespace app\controllers;


use base\services\AlgoritmService;
use yii\helpers\Json;
use yii\rest\Controller;

class AlgorithmController extends Controller
{
    private $algorithmService;

    public function __construct($id, $module, AlgoritmService $algoritmService, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->algorithmService = $algoritmService;
    }

    public function verbs()
    {
        return [
            'create' => ['POST'],
        ];
    }

    public function actionCreate()
    {
        $number = \Yii::$app->getRequest()->post('number');
        $data = \Yii::$app->getRequest()->post('data');
        $result = $this->algorithmService->algorithm($number, Json::decode($data));
        $this->algorithmService->saveForUser(\Yii::$app->getUser(), $number, $data, $result);

        return $result;
    }
}