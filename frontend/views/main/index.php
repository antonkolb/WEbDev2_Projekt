
<?php

/* @var $this yii\web\View */

$this->title = 'Rechnen und Denken';
//eigene CSS
$this->registerCssFile(Yii::$app->request->baseUrl.'/css/main.css');
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>W&auml;hle eine Aufgabe aus!</h1>

        <p class="lead">Spiel 1: Einfache Rechenaufgaben</p>
        <p class="lead">Spiel 2: Textaufgaben</p>
        <p class="lead">Spiel 3: Zahlenmauern</p>
        <p class="lead">Spiel 4: Zahlenreihe</p>

		<p><a class="btn btn-md btn-info gamebtn" href="main/game17_1">Spiel 1</a>
		   <a class="btn btn-md btn-info gamebtn" href="main/game17_2">Spiel 2</a>
		   <a class="btn btn-md btn-info gamebtn" href="main/game17_3">Spiel 3</a>
		   <a class="btn btn-md btn-info gamebtn" href="main/game17_4">Spiel 4</a>
	</p>
    </div>
</div>
