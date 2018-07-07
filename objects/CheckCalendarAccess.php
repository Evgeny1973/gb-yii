<?php

namespace app\objects;

use app\models\Access;
use app\models\Calendar;

class CheckCalendarAccess {

    /**
     * Уровень доступа к заметке
     * @param Calendar $model
     * @return int
     */
    public function execute(Calendar $model): int {
        $authorId = (int)$model->creator;
        $userId = (int)\Yii::$app->user->id;

        if ($authorId == $userId) {
            return Access::LEVEL_EDIT;
        }

        $query = Access::find()
            ->forCalendar($model)
            ->forUserId($userId)
            ->forCurrentDate();

        $accessCalendar = $query->one();


        if ($accessCalendar) {
            return Access::LEVEL_VIEW;
        }
        return Access::LEVEL_DENIED;
    }
}