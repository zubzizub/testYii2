<?php
/**
 * Created by PhpStorm.
 * User: zubzizub
 * Date: 28.02.17
 * Time: 18:18
 */

namespace app\models;

use Yii;

class SetChangePrice
{
    const DEFLECTION = 25;
    const KEY_CACHE_PRICE = 'price';
    const KEY_CACHE_TIME = 'time';

    public $state;
    private $diff;
    private $priceOld;
    private $priceNew;
    private $unixtime;

    public function __construct(PriceForm $modelPrice)
    {
        $this->priceNew = $modelPrice->value;
        $this->priceOld = Yii::$app->cache->get(self::KEY_CACHE_PRICE);
        Yii::$app->cache->set(self::KEY_CACHE_PRICE, $this->priceNew);

        $date = new \DateTime();
        $this->unixtime = $date->format('U');
        Yii::$app->cache->set(self::KEY_CACHE_TIME, $this->unixtime);

        if ($this->priceOld === false) {
            $this->priceOld = 0;
            $this->diff = 0;
            $this->state = 'normal';
        } else {
            $this->diff = $this->getDifferentPrice();
            $this->setStatePrice();
        }
    }

    public function getPriceOld()
    {
        return $this->priceOld;
    }

    public function getUnixtime()
    {
        return $this->unixtime;
    }

    private function getDifferentPrice()
    {
        return ($this->priceNew - $this->priceOld) / $this->priceNew * 100;
    }

    private function setStatePrice()
    {
        if ($this->diff > self::DEFLECTION) {
            $this->state = 'warning';
        } elseif ($this->diff < 0) {
            $this->state = 'error';
        } else {
            $this->state = 'normal';
        }
    }
}