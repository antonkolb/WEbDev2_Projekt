<?php
use yii\helpers\Html;

//Hier if statements, wenn was anderes abgefragt wird, als das Ergebnis!

$this->title = 'Spiel 1';
$this->params['breadcrumbs'][] = $this->title;

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
}

$out .= "<h3>Ergebnisse f&uuml;r Spiel 1</h3>";
/*$out .= "<ul>";


$out .= "<li><h4>Aufgabe 1</h4>";
$out .= $model->number1[3];
$out .= " + ";
$out .= $model->number2[3];
$out .= " = ";
$out .= $model->sum[3];
$out .= " numEx: ";
$out .= $model->numEx; 

$out .= "</li>" */;
$out .= $model->checkAnswers();

$out .= "</ul>";
echo $out;

?>
