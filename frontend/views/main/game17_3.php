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

$this->title = 'Zahlenmauern';
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin(['id' => 'game17_1']);

$textInputOptions = [
		'class'=>'integerForm',
		'data-bv-integer-message'=>'Bitte nur Zahlen eingeben',
		'maxlength'=>2,
		'style'=>'width:60px'
];

$out="";
for ($i = 0; $i < $model->numEx; $i++) {
	$exerciseNum = $i + 1;
	$out .= "<h3 class='aufgabennummer'>Aufgabe $exerciseNum</h3>\n"
	.'<div class="aufgabenstellung">'
		."<div class='pyramid-row pyramid-top'>"
			."<div class='pyramid-cell pyramid-top-cell'>"
				.$form->field($model, "userAnswers[$i]['sum']")->label(false)->textInput($textInputOptions)
			."</div>"
			."<div class='clear'></div>"
		."</div>"
		."<div class='pyramid-row pyramid-middle'>"
			."<div class='pyramid-cell pyramid-middle-cell'>"
				.$form->field($model, "userAnswers[$i]['x']")->label(false)->textInput($textInputOptions)
			."</div>"
			."<div class='pyramid-cell pyramid-middle-cell'>"
				.$form->field($model, "userAnswers[$i]['y']")->label(false)->textInput($textInputOptions)
			."</div>"
			."<div class='clear'></div>"
		."</div>"
		."<div class='pyramid-row pyramid-bottom'>"
			."<div class='pyramid-cell pyramid-bottom-cell'>"
				.$model->pyramids[$i]->xCalc->getSummands()[0]
			."</div>"
			."<div class='pyramid-cell pyramid-bottom-cell'>"
				.$model->pyramids[$i]->xCalc->getSummands()[1]
			."</div>"
			."<div class='pyramid-cell pyramid-bottom-cell'>"
				.$model->pyramids[$i]->yCalc->getSummands()[1]
			."</div>"
			."<div class='clear'></div>"
		."</div>"
	."</div>";
}

$out .= "<div class=\"form-group\">";
$out .= Html::submitButton('Korrigieren', ['name'=>'check', 'class' => 'btn btn-primary lowbtn']);
$out .= Html::submitButton('Zur&uuml;ck', ['name'=>'back', 'class' => 'btn btn-primary lowbtn']); 
$out .= "</div>";

echo $out;
ActiveForm::end(); 

?>
