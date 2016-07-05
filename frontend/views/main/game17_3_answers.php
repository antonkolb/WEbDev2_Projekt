<?php

		$this->title = 'Zahlenmauern';
		$this->params['breadcrumbs'][] = $this->title;

		$out="";
		$out .= "<h3>Ergebnisse f&uuml;r Spiel 3</h3>";
		$out .= $model->verifyAnswers();

$out .= "</ul>";
echo $out;

?>
