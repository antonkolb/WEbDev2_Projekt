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

$this->title = 'Spiel 1';
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin(['id' => 'game17_1']);

//alle werte vom model rein, die noch gebraucht werden, sonst sind diese leer!
$out="";
$out .= Html::activeHiddenInput($model,"numEx");
$out .= "\n";
$out .= Html::activeHiddenInput($model,"difficulty");
$out .= "\n";
$out .= Html::activeHiddenInput($model,"commited");
$out .= "\n";
$out .= Html::activeHiddenInput($model,"started");
$out .= "\n";


for( $i=1; $i <= $model->numEx; $i++ ) {
	$out .= "\n";
	$out .= Html::activeHiddenInput($model,"number1[$i]");
	$out .= "\n";
	$out .= Html::activeHiddenInput($model,"number2[$i]");
	$out .= "\n";
	$out .= Html::activeHiddenInput($model,"sum[$i]");
	$out .= "\n";
	$out .= Html::activeHiddenInput($model,"correctAnswer[$i]");
	$out .= "\n";

	//hier beginnt die eigentliche Aufgabe
	$out .= "<h3>Aufgabe $i</h3>\n";
	$out .= '<div class="aufgabenstellung">';
	$out .= $model->number1[$i]; 
	$out .= " + ";
	$out .= $model->number2[$i];
	$out .= " = ";
	$out .= "</div>";
	//this syncs the textfield with the model value: anything written in it will be saved in model, if the value is not empty it will be placed in the textbox
	$out .= $form->field($model, "userAnswer[$i]")->label(false)->textInput(['class'=>'integerForm', 'data-bv-integer-message'=>'Bitte nur Zahlen eingeben', 'maxlength'=>2, 'style'=>'width:100px']);
}

$out .= "<div class=\"form-group\">";
$out .= Html::submitButton('Korrigieren', ['name'=>'check', 'class' => 'btn btn-primary lowbtn']);
$out .= Html::submitButton('Zur&uuml;ck', ['name'=>'back', 'class' => 'btn btn-primary lowbtn']); 
$out .= "</div>";

echo $out;
ActiveForm::end(); 

?>
