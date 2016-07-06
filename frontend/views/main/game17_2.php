<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\main\Game17_2 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//custom CSS
$this->registerCssFile(Yii::$app->request->baseUrl.'/css/game.css');
//custom JS, is depending on jQuery
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/game.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = 'Textaufgaben';
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin(['id' => 'game17_2']);

$out="";

for ($i = 0; $i < $model->numEx; $i++) {
	//hier beginnt die eigentliche Aufgabe
	$numExercise = $i + 1;
	
	$out .= "<h3>Aufgabe $numExercise</h3>\n";
	$out .= '<div class="aufgabenstellung">';
	$out .= $model->calcTexts[$i]; 
	$out .= "</div>";
	//this syncs the textfield with the model value: anything written in it will be saved in model, if the value is not empty it will be placed in the textbox
	$out .= $form->field($model, "userAnswers[$i]")->label(false)->textInput(['class'=>'integerForm', 'data-bv-integer-message'=>'Bitte nur Zahlen eingeben', 'maxlength'=>2, 'style'=>'width:100px']);
}

$out .= "<div class=\"form-group\">";
$out .= Html::submitButton('Korrigieren', ['name'=>'answers', 'value'=>'answers', 'class' => 'btn btn-primary lowbtn']);
$out .= Html::submitButton('Zur&uuml;ck', ['name'=>'back', 'value'=>'back', 'class' => 'btn btn-primary lowbtn']); 
$out .= "</div>";

echo $out;
ActiveForm::end(); 

?>
