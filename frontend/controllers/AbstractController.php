<?php
//copied from SiteController
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
abstract class AbstractController extends Controller
{
	/**
     * @inheritdoc
	 * requires to be logged in to see al inheritet Controlelrs/functions
	 * see for more information: http://stackoverflow.com/questions/30067849/yii2-require-all-controller-and-action-to-login
     */
	public function behaviors()
    {
        return [
    		'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
}



