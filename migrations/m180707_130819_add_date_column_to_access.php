<?php

use app\models\Access;
use yii\db\Migration;

/**
 * Class m180707_130819_add_date_column_to_access
 */
class m180707_130819_add_date_column_to_access extends Migration {

    public function up(): bool {
        parent::up();

        $this->addColumn(Access::tableName(), 'since', $this->dateTime());
        return true;
    }

    public function down(): bool {
        parent::down();

        $this->dropColumn(Access::tableName(), 'since');
        return true;
    }
}
