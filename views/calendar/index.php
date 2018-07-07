<?php

use app\models\Access;
use app\models\Calendar;
use yii\helpers\Html;
use yii\grid\GridView;
use app\objects\CheckCalendarAccess;

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
        <?= Html::a('Create Calendar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'text:ntext',
            ['label' => 'Автор',
                'attribute' => 'author.login'],
            'event_date',

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, Calendar $model) {
                        return (new CheckCalendarAccess)->execute($model) == Access::LEVEL_EDIT ? Html::a('Update', $url) : '';
                    }
                ]
            ],
        ],
    ]); ?>
</div>
