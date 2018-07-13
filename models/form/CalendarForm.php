<?php

namespace app\models\form;

use app\models\Access;
use app\models\Calendar;
use yii\helpers\BaseArrayHelper;

class CalendarForm extends Calendar {

    /**
     * @var array
     */
    public $grantedTo = [];

    public function rules(): array {
        return BaseArrayHelper::merge([
            ['grantedTo', 'safe'],
        ], parent::rules());
    }

    public function afterFind() {
        parent::afterFind();

        $accesses = Access::find()->andWhere(['event_id' => $this->id])->all();

        foreach ($accesses as $access){
            $this->grantedTo[] = $access->user_id;
        }

    }


    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);

        foreach ($this->grantedTo as $userId) {
            $access = new Access([
                'user_id' => $userId,
                'event_id' => $this->id,
            ]);
            $access->save();
            $this->link('access', $access);
        }
    }
}