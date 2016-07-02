<?php

use yii\db\Migration;

class m160630_115547_init_statistic_table extends Migration
{
    public function up()
    { $this->createTable(
          'statistic',
     [     'userid' => 'pk',
           'username' => 'pk' -> notNull(),
           'gameKat' =>  'pk',
           'game'=> 'pk',
           'userAnswer' => 'string',
           'amountOfTries' => 'time',
           'elapsedTime' => 'time', ]
     );
    }

    public function down()
    {
        $this->dropTable('statistic');
        echo "m160630_115547_init_statistic_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
