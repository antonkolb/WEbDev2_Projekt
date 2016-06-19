<?php

use yii\helpers\Html;

echo Html::beginForm(['/customer'], 'get');
echo Html::label('Telefonnummernsuche:', 'phone_number');
echo Html::textInput('phone_number');
echo Html::submitButton('Suchen');

echo Html::endForm();
