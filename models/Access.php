<?php

namespace app\models;

use app\models\query\AccessQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "access".
 *
 * @property string $id
 * @property int $user_id
 * @property int $event_id
 */
class Access extends ActiveRecord {

    public const LEVEL_DENIED = 0;
    public const LEVEL_VIEW = 1;
    public const LEVEL_EDIT = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'access';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array {
        return [
            [['user_id', 'event_id'], 'required'],
            [['user_id', 'event_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'event_id' => 'Event ID',
        ];
    }

    /**
     * Уровень доступа к заметке
     * @param Calendar $model
     * @return int
     */
    public static function getAccessLevel(Calendar $model) {
        $authorId = (int)$model->creator;
        $userId = (int)\Yii::$app->user->id;

        if ($authorId == $userId) {
            return self::LEVEL_EDIT;
        }

        $accessCalendar = self::find()
            ->forCalendar($model)
            ->forUserId($userId)
            ->one();

        if ($accessCalendar) {
            return self::LEVEL_VIEW;
        }
        return self::LEVEL_DENIED;
    }


    /**
     * @return AccessQuery
     */
    public static function find(): AccessQuery {
        return new AccessQuery(__CLASS__);
    }
}
