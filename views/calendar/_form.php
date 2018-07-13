<?php

use app\models\Users;
use yii\helpers\BaseArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$users = BaseArrayHelper::map(Users::find()->all(), 'id', 'login');

/* @var $this yii\web\View */
/* @var $model app\models\form\CalendarForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendar-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'event_date')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'grantedTo')->dropDownList($users,
        ['multiple' => true]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
