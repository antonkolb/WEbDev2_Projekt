<?php
use yii\helpers\Html;

//Hier if statements, wenn was anderes abgefragt wird, als das Ergebnis!


$out = "<h3>Ergebnisse f&uuml;r Aufgabe 1</h3>";
$out .= "<ul>";


$out .= "<li><h4>Aufgabe 1</h4>";
$out .= $model->number1[3];
$out .= " + ";
$out .= $model->number2[3];
$out .= " = ";
$out .= $model->sum[3];
$out .= " numEx: ";
$out .= $model->numEx; 

$out .= "</li>";
$out .= "<li>";
$out .= $model->verifyAnswers();
$out .= "</li>";

$out .= "</ul>";
echo $out;

var_dump( $model->number1 );
echo "</br>";
var_dump( $model->number2 );
echo "</br>";
var_dump( $model->sum );
echo "</br>";
var_dump( $model->userAnswer );
echo "</br>";
var_dump( $model->correctAnswer );
echo "</br>";
var_dump( $model->numEx );
echo "</br>";
var_dump( $model->difficulty );
echo "</br>";

?>
