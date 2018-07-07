<?php

namespace app\models\query;

use app\models\Calendar;
use yii\db\ActiveQuery;


class AccessQuery extends ActiveQuery {

    /**
     * Condition with note_id
     * @param $note_id
     * @return $this
     */
    public function withNote($note_id) {
        return $this->andWhere(
            'note_id = :note_id',
            [
                ":note_id" => $note_id
            ]
        );
    }

    /**
     * Condition with user_id
     * @param $user_id
     * @return $this
     */
    public function withUser($user_id) {
        return $this->andWhere(
            'user_id = :user_id',
            [
                ":user_id" => $user_id
            ]
        );
    }

    /**
     * @inheritdoc
     * @return \app\models\Access[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Access|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

    /**
     * @param Calendar $model
     * @return self
     */
    public function forCalendar(Calendar $model): self {
        $this->andWhere(['event_id' => $model->id]);
        return $this;
    }

    /**
     * @param int $userID
     * @return self
     */
    public function forUserId(int $userID): self {
        $this->andWhere(['user_id' => $userID]);
        return $this;
    }

    public function forCurrentDate(): self {
        $date = date('Y-m-d');
        $this->andWhere([
            'or',
            ['<=', 'since', $date],
            ['since' => null],
        ]);
        return $this;
    }
}