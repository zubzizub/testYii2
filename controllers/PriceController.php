<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\PriceForm;
use app\models\SetChangePrice;


class PriceController extends Controller
{
    public function actionIndex()
    {
        $modelPrice = new PriceForm();

        if ($modelPrice->load(Yii::$app->request->post()) && $modelPrice->validate()) {
            $objSetChangePrice = new SetChangePrice($modelPrice);
            $statePrice = $objSetChangePrice->state;

        } else {
            $statePrice = false;
        }

        return $this->render('priceForm', ['model' => $modelPrice, 'statePrice' => $statePrice]);
    }
}