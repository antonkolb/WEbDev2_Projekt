<?php

use yii\db\Migration;

class m160706_101856_init_test_table extends Migration
{
    public function up()
    {
        $this->createTable('test',['user'=> 'varchar(5) not null',]);
    }

    public function down()
    {
        $this->dropTable('test');
        echo "m160706_101856_init_test_table cannot be reverted.\n";
        
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
