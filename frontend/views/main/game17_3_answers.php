<?php

		$this->title = 'Zahlenmauern';
		$this->params['breadcrumbs'][] = $this->title;

		$out="";
		$out .= "<h3>Ergebnisse f&uuml;r Spiel 1</h3>";
		$out .= $model->checkAnswers();

$out .= "</ul>";
echo $out;

?>
