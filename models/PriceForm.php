<?php

namespace app\models;

use yii\base\Model;

class PriceForm extends Model
{
    public $value;
    public $currencyId;
    public $goodId;

    public function rules()
    {
        return [
            ['value', 'required'],
            ['value', 'integer', 'min' => 1],
            [['value', 'currencyId', 'goodId'], 'trim']
        ];
    }
}