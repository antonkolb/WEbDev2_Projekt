<?php
namespace frontend\controllers;
use Yii;
use frontend\models\customer\Customer;
use frontend\models\customer\CustomerRecord;
use frontend\models\customer\Phone;
use frontend\models\customer\PhoneRecord;
use \yii\data\ArrayDataProvider;
use \yii\web\Controller;
use frontend\models\customer\StatisticRecord;
use frontend\models\customer\Statistic;
use yii\base\Model;

class StatisticHaendler extends Model
{
	public function __construct($id,$gameKat,$userAnswer,$amoutOfTries,$elapsedTime) 
    {
        $this->makeStatistic($id,$gameKat,$userAnswer,$amoutOfTries,$elapsedTime);
    }
	

	public function actionIndex()
	{
		$records = $this->findRecordsByQuery();
		return $this->render('index', compact('records'));
		
		// return "customer / index";
	}
	
	public function actionAdd()
	{
		
		$statistic = new StatisticRecord();
		$id = '2';
		$gameKat = 'tt';
		$game = '1';
		$userAnswere = 'Tu';
		$amoutOfTries = '1';
		$elapsedTime = '12.06.2016';
		
		if ($this->load($statistic, $_POST)) {
				$this->store($this->makeStatistic($id, $gameKat, $game, $userAnswere, $amoutOfTries, $elapsedTime));
            //return $this->redirect('/customer');
		}
		
		return $this->render('add',compactmakeStatistic($id, $gameKat, $game, $userAnswere, $amoutOfTries, $elapsedTime));
		
		// return "customer / add";
	}

	public function actionQuery() 
	{
		return $this->render('query');
	}
	
	public function load(CustomerRecord $customer, PhoneRecord $phone, array $post)
	{
		return $customer->load($post)
			and $phone->load($post)
			and $customer->validate()
			and $phone->validate(['number']);
	}
	
	public function findRecordsByQuery(){
		$number = Yii::$app->request->get('phone_number');
		$records = $this->getRecordsByPhoneNumber($number);
		$dataProvider = $this->wrapIntoDataProvider($records);
		return $dataProvider;
	}

	public function wrapIntoDataProvider($data)
	{
	   return new ArrayDataProvider([
	           'allModels' => $data,
	           'pagination' => false
	    ]); 
	}
	
	public function getRecordsByPhoneNumber($number) {
		$phone_record = PhoneRecord::findOne(['number' => $number]);
		if (!$phone_record)
			return [];
		
		$customer_record = CustomerRecord::findOne($phone_record->customer_id);
		if (!$customer_record)
			return [];
		
		return [$this->makeCustomer($customer_record, $phone_record)];
	}

	
	public function store(Statistic $stat) {
		$statistic_record = new StatisticRecord();
		$statistic_record->userid = $stat->userid;
		$statistic_record->gameKat = $stat->gameKat;
		$statistic_record->game = $stat->game;
        $statistic_record->userAnswer = $stat->userAnswer;
        $statistic_record->amoutOfTries = $stat->amoutOfTries;
        $statistic_record->elapsedTime = $stat->elapsedTime;
		$statistic_record->save();

		
	}

	//public function makeStatistic(StatisticRecord $statistic_record) {
    public function makeStatistic($id,$gameKat,$userAnswer,$amoutOfTries,$elapsedTime) {
		
		$statistic = new StatisticRecord($id,$gameKat,$userAnswer,$amoutOfTries,$elapsedTime);
                //$id = '2';
                //$gameKat = 'Kat';
		        //$game = '1';
                //$userAnswere = '1';
                //$amoutOfTries = '1';
                //$elapsedtime = '4';
		//$statistic = new StatisticRecord($id,$gameKat,$game,$userAnswere,$amoutOfTries,$elapsedtime);

		$name = $customer_record->name;
		$birth_date = new \DateTime($customer_record->birth_date);

		return $statistic;
	}
}
