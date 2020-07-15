<?php

namespace micro\controllers;

use Yii;

use yii\base\Exception;

use yii\rest\Controller;
use yii\web\Response;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use micro\models\User; 
use micro\models\Wallet; 

use \VK\Client\VKApiClient;
use \VK\OAuth\VKOAuth;
use \VK\OAuth\VKOAuthDisplay;
use \VK\OAuth\Scopes\VKOAuthUserScope;
use \VK\OAuth\VKOAuthResponseType;
use VK\CallbackApi\Server\VKCallbackApiServerHandler;

/**
 * Class SiteController
 * @package micro\controllers
 */
class MessageController extends Controller
{
    public function behaviors()
    {
        // удаляем rateLimiter, требуется для аутентификации пользователя
        $behaviors = parent::behaviors();

        $behaviors['verbs'] = [
            'class' => VerbFilter::className(),
        ];

        // Возвращает результаты экшенов в формате JSON  
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;

        $behaviors['authenticator'] = [
            'except' => ['event'],
            'class' => HttpBearerAuth::className()
        ];

        return $behaviors;
    }

    public function actionEvent()
    {
        try {

            $data = json_decode(file_get_contents('php://input'));

            $key = Yii::$app->params['vk_key'];
            $secret = Yii::$app->params['vk_secret'];
            $group_id = 197125555;
            $confirm_token  = Yii::$app->params['confirm_token'];
            $type = 'confirmation';

            if ($data->type == $type) {

                echo $confirm_token;

            } else {
                echo 'ok';
            }
            
        } catch (Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }

    
}