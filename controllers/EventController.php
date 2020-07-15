<?php

namespace micro\controllers;

use Yii;

use yii\base\Exception;

use yii\rest\Controller;
use yii\web\Response;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\VerbFilter;


/**
 * Class SiteController
 * @package micro\controllers
 */
class EventController extends Controller
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

        return $behaviors;
    }

    /**
     * Event handling message
     * replying to messages
     */
    public function actionMessage()
    {
        try {
            $data = json_decode(file_get_contents('php://input'));

            $key = Yii::$app->params['vk_key'];
            $secret = Yii::$app->params['vk_secret'];
            $confirm_token  = Yii::$app->params['confirm_token'];
            $type = 'confirmation';

            if ($data->type == $type) {

                echo $confirm_token;
                exit();
            } 
            if ($data->type == 'message_new' && $data->secret == $secret) {
                // get user name
                $user_id = $data->object->message->from_id;
                $user_info = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$user_id}&access_token={$key}&v=5.105"));
                $user_name = $user_info->response[0]->first_name;

                if ($data->object->message->text == 'Команды') {
                    $answer = "Введите номер команды <br>1) ВолГУ <br>2) ИМИТ <br>3) ИСКМ";
                    $this->_sendMsg($answer, $user_id, $key);

                } elseif ($data->object->message->text == '1') {
                    $answer = "Федеральное государственное автономное образовательное учреждение высшего образования «Волгоградский государственный университет» (ФГАОУ ВО ВолГУ) — одно из крупнейших высших учебных заведений Волгоградской области. Основано в 1980 году.";
                    $this->_sendMsg($answer, $user_id, $key);

                } elseif ($data->object->message->text == '2') {
                    $answer = "ИМИТ - единственный в регионе институт, выпускающий математиков с классическим университетским образованием, вырастивший за последние несколько лет более 10 докторов и более 25 кандидатов наук, в аспирантуре института по шести специальностям обучается более 10 аспирантов.";
                    $this->_sendMsg($answer, $user_id, $key);

                } elseif ($data->object->message->text == '3') {
                    $answer = "Кафедра Информационных систем и компьютерного моделирования была создана в феврале 2008 года в качестве выпускающей по инженерным IT-направлениям.";
                    $this->_sendMsg($answer, $user_id, $key);

                } else {
                    $answer = "Привет, {$user_name}! Для получения инфы напиши мне слово 'Команды'";
                    $this->_sendMsg($answer, $user_id, $key);
                }

                echo 'ok';
                exit();
            }
            
        } catch (Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }

    public function actionMailing()
    {
        try {
            // connection component eventHandlig (Send to message)
            Yii::$app->event->eventHandling();
                
        } catch (Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Send message specific user
     * 
     * @param string $answer text answer
     * @param int $user_id User ID
     * @param string $key secret access key
     */
    private function _sendMsg($answer, $user_id, $key)
    {
        // messages send 
        $request_params = array(
            'message' => $answer,
            'peer_id' => $user_id,
            'access_token' => $key,
            'v' => '5.105',
            'random_id' => '0'
        );

        $get_params = http_build_query($request_params);

        file_get_contents('https://api.vk.com/method/messages.send?'. $get_params);
    }

}