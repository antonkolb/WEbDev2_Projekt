<?php

use yii\db\Migration;

class m160620_133457_init_customer_table extends Migration
{
    public function up()
    {//eigener Code, siehe Yii2-3-S41
	$this->createTable(
		'customer',
		[	'id' => 'pk',
			'name' => 'string',
			'birth_date' => 'date',
			'notes' => 'text',
		],
		'ENGINE=InnoDB'
	);
    }

    public function down()
    {
	//eigene Methode, siehe Yii2-3-S42
	$this->dropTable('customer');
        //echo "m160620_133457_init_customer_table cannot be reverted.\n"; //commented

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
