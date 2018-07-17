<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "user_log".
 *
 * @property string $id
 * @property int $user_id
 * @property string $logged_at
 */
class UserLog extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['user_id', 'required'],
            [['id', 'user_id'], 'integer'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'logged_at' => 'Logged At',
        ];
    }
}
