<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<h1>This page of form with price</h1>

<?php if ($statePrice === 'normal'): ?>
    <div class="alert alert-success" role="alert"><?=$statePrice?></div>
<?php elseif ($statePrice === 'warning'): ?>
    <div class="alert alert-warning" role="alert"><?=$statePrice?></div>
<?php elseif ($statePrice === 'error'): ?>
    <div class="alert alert-danger" role="alert"><?=$statePrice?></div>
<?php endif; ?>

<?php $form = ActiveForm::begin(); ?>
<?=$form->field($model, 'value')?>
<?=$form->field($model, 'currencyId')?>
<?=$form->field($model, 'goodId')?>
<?=Html::submitButton('Check Price', ['class' => 'btn btn-success'])?>
<?php ActiveForm::end(); ?>

