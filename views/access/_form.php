<?php

use app\models\Calendar;
use app\models\Users;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Access */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="access-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        Users::find()->select(['login'])->indexBy('id')->column()) ?>

    <?= $form->field($model, 'event_id')->dropDownList(
        Calendar::find()->select(['name'])->indexBy('id')->column()) ?>

    <?= $form->field($model, 'since')->textInput(['type' => 'date']); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
