<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerCssFile(Yii::$app->request->baseUrl.'/css/game.css');

$form = ActiveForm::begin();

for( $i=0,$out=""; $i < $model->numEx; $i++ ) {
	$out .= "\n";
	$out .= Html::activeHiddenInput($model,"number1[$i]");
	$out .= "\n";
	$out .= Html::activeHiddenInput($model,"number2[$i]");
	$out .= "\n";
	$out .= "<h3>Aufgabe $i</h3>\n";
	$out .= $model->number1[$i]; 
	$out .= " + ";
	$out .= $model->number2[$i];
	$out .= " = ";
	$out .= $form->field($model, "userAnswer[$i]")->label(false);
}

$out .= "<div class=\"form-group\">";
$out .= Html::submitButton('Korrigieren', ['name'=>'check', 'class' => 'btn btn-primary lowbtn']);
$out .= Html::submitButton('Zur&uuml;ck', ['name'=>'back', 'class' => 'btn btn-primary lowbtn']); 
$out .= "</div>";

echo $out;

ActiveForm::end(); 

?>
