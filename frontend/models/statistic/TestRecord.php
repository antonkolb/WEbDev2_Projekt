<?php

namespace frontend\models\statistic;
use yii\db\ActiveRecord;

class TestRecord extends ActiveRecord {
    public static function testName() {
        return 'test';
    }
    
    public function rulers() {
        return[['test', 'varchar(5)']];
    }
}