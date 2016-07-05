<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\main\Game17_1 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//custom CSS
$this->registerCssFile(Yii::$app->request->baseUrl.'/css/game.css');
//custom JS, is depending on jQuery
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/game.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = 'Zahlenreihen';
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin(['id' => 'game17_1']);

$textInputOptions = [
		'class'=>'integerForm',
		'data-bv-integer-message'=>'Bitte nur Zahlen eingeben',
		'maxlength'=>2,
		'style'=>'width:1em'
];

$answerIndex = 0;
$out="";
for ($i = 0; $i < $model->numEx; $i++) {

	$exerciseNum = $i + 1;
	$out .= "<h3>Aufgabe $exerciseNum</h3>\n";
	$out .= '<div class="aufgabenstellung">';
	$out .= '<div class="sequence">';
	
	$seq = $model->sequences[$i];
	for ($j = 0; $j < sizeof($seq->sequence); $j++) {
		$out .= '<div class="sequence-cell">';
		if ($seq->isVisible[$j]) {
			$out .= $seq->sequence[$j];
		} else {
			$out .= $form->field($model, "userAnswers[$answerIndex]")->label(false)->textInput($textInputOptions);
			$answerIndex++;
		}
		$out .= "</div>";
	}
	$out .= "</div>";
	$out .= "</div>";
}

$out .= "<div class=\"form-group\">";
$out .= Html::submitButton('Korrigieren', ['name'=>'answers', 'class' => 'btn btn-primary lowbtn']);
$out .= Html::submitButton('Zur&uuml;ck', ['name'=>'back', 'class' => 'btn btn-primary lowbtn']); 
$out .= "</div>";

echo $out;
ActiveForm::end(); 

?>
