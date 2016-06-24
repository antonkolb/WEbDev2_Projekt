
<?php

/* @var $this yii\web\View */

$this->title = 'Rechnen und Denken';
//eigene CSS
$this->registerCssFile(Yii::$app->request->baseUrl.'/css/main.css');
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>W&auml;hle eine Aufgabe aus!</h1>

        <p class="lead">Aufgabe 1: Einfache Rechenaufgaben</p>
        <p class="lead">Aufgabe 2: Textaufgaben</p>
        <p class="lead">Aufgabe 3: bla</p>
        <p class="lead">Aufgabe 4: blub</p>

        <p><a class="btn btn-md btn-info gamebtn" href="main/aufgabe1">Aufgabe 1</a>
	   <a class="btn btn-md btn-info gamebtn" href="main/aufgabe2">Aufgabe 2</a>
      	   <a class="btn btn-md btn-info gamebtn" href="main/aufgabe3">Aufgabe 3</a>
	   <a class="btn btn-md btn-info gamebtn" href="main/aufgabe4">Aufgabe 4</a>
	</p>
    </div>
</div>
