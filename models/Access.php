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
 * @property string $since
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
            ['since', 'safe'],
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
            'since' => 'Доступно с',
        ];
    }

        /**
     * @return AccessQuery
     */
    public static function find(): AccessQuery {
        return new AccessQuery(__CLASS__);
    }
}
