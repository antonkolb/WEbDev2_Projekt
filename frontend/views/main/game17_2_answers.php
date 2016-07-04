<?php
use yii\helpers\Html;

		$this->title = 'Textaufgaben';
		$this->params['breadcrumbs'][] = $this->title;

		//alle werte vom model rein, die noch gebraucht werden, sonst sind diese leer!
		$out="";
		$out .= "<h3>Ergebnisse f&uuml;r Spiel 2</h3>";

		$out .= $model->verifyAnswers();

$out .= "</ul>";
echo $out;

?>
