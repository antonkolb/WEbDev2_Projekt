<?php

use yii\db\Migration;

class m160630_115547_init_statistic_table extends Migration
{
    public function up()
    { 
     $this->createTable(
          'statistic',
     [
           'userid' => 'varchar(6) not null',
           'gameKat' =>  'varchar(32) not null',
           'game'=> 'varchar(32) not null',
           'userAnswer' => 'string',
           'amountOfTries' => 'time',
           'elapsedTime' => 'time',
           'pk(userid,gameKat,game)',
      ]
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
