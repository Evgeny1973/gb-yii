<?php

use app\models\Access;
use app\models\Calendar;
use yii\helpers\Html;
use yii\grid\GridView;
use app\objects\CheckCalendarAccess;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'События';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать событие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => yii\grid\SerialColumn::class],

            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->name, ['calendar/view', 'id' => $model->id]);
                }
            ],

            //'name',

            [
                'attribute' => 'text',
                'format' => 'raw',
                'value' => function ($model) {
                    return StringHelper::truncateWords($model->text, 50, '...', true);
                }
            ],

            [
                'label' => 'Автор',
                'attribute' => 'author.login'
            ],

            [
                'attribute' => 'event_date',
                'format' => ['date', 'php:d-m-Y']
            ],

            [
                'class' => yii\grid\ActionColumn::class,
                'visibleButtons' => [
                    'update' => function ($model) {
                        return (new CheckCalendarAccess)->execute($model) == Access::LEVEL_EDIT;
                    }
                ],
            ],
        ],
    ]); ?>
</div>
