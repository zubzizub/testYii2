<?php
/**
 * Created by PhpStorm.
 * User: zubzizub
 * Date: 27.02.17
 * Time: 16:09
 */

namespace app\controllers;

use yii\web\Controller;

class MyController extends Controller
{

    public function actionIndex($id = null)
    {
        $hi = 'Hello, World!';

        $names = ['Ivanov', 'Petrov', 'Sidorov'];

        //return $this->render('index', ['hello' => $hi, 'names' => $names]);
        //or
        return $this->render('index', compact('hi', 'names', 'id'));
    }

}