<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use base\services\AlgoritmService;
use yii\console\Controller;
use yii\helpers\Json;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AlgorithmController extends Controller
{
    private $algoritmService;

    public function __construct($id, $module, AlgoritmService $algoritmService, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->algoritmService = $algoritmService;
    }

    public function actionRun($num, $alg)
    {
        echo $this->algoritmService->algorithm($num, Json::decode($alg)) . "\n";
    }
}
