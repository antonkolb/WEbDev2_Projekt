
<?php
//copy of jheyms file
//Yii2-3-S43
use yii\db\Migration;

class m160622_104550_init_phone_table extends Migration
{
    public function up()
    {

	$this->createTable(
		'phone',
		[
			'id' => 'pk',
			'customer_id' => 'int',
			'number' => 'string', 	] 
	);
	$this->addForeignKey('customer_phone_numbers','phone','customer_id','customer','id');
    }

    public function down()
    {
	$this->dropForeignKey('customer_phone_numbers','phone');
	$this->dropTable('phone');
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

