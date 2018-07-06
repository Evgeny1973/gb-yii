<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "calendar".
 *
 * @property string $id
 * @property string $name Название
 * @property string $text Текст заметки
 * @property string $creator Автор заметки
 * @property string $event_date Дата события
 * @property string $creation_date Дата внесения
 * @property User $author
 */
class Calendar extends \yii\db\ActiveRecord {
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'calendar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name', 'text', 'event_date'], 'required'],
            [['text'], 'string'],
            [['event_date', 'creation_date'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['creator'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'text' => 'Текст заметки',
            'creator' => 'Автор заметки',
            'event_date' => 'Дата события',
            'creation_date' => 'Дата внесения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor(): ActiveQuery {
        return $this->hasOne(Users::class, ['id' => 'creator']);
    }

    public function beforeSave($insert) {
        $result = parent::beforeSave($insert);
        if (!$this->creator) {
            $this->creator = \Yii::$app->user->id;
        }
        return $result;
    }
}
