<?php
/**
 * Created by PhpStorm.
 * User: zubzizub
 * Date: 27.02.17
 * Time: 17:22
 */

namespace app\controllers;


use app\models\TestModel;
use yii\web\Controller;


class PostController extends Controller
{

    public $layout = 'basic';

    public function actionIndex()
    {

        $model = new TestModel();


        return $this->render('test', compact('model'));
    }

    public function actionShow()
    {
        return $this->render('show');
    }
}