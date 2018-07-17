<?php

use yii\db\Migration;

/**
 * Class m180716_221030_user_log
 */
class m180716_221030_user_log extends Migration {

    public function safeUp() {
        $this->execute(
            'CREATE TABLE `user_log` (
            `id` bigint(20) UNSIGNED NOT NULL,
           `user_id` int(11) NOT NULL,
           `logged_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP)
            ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `user_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;');
        return true;
    }

    public function safeDown() {
        $this->dropTable('user_log');
    }
}