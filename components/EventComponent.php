<?php

namespace micro\components;

use Yii;
use yii\base\Component;

use \yii\base\Exception as Exception;

/**
 * Event Component
 * 
 * Componet for work with API VK
 * 
 * @author Shukanov Arman
 */
class EventComponent extends Component
{

	/**
	 * Send message to all who has permission
	 * 
	 * @param mixed $searchText
	 * 
	 * More info - https://vk.com/dev/callback_api
	 * 
	 * @return string 
	 */
    public function eventHandling()
    {
        try {
            $key = Yii::$app->params['vk_key'];
            $group_id = Yii::$app->params['vk_group_id'];

            // array with permission to send messages and permission denied
            $arrayYes = [];
            $arrayNo = [];

            // get list users ID from group
            $arrayList = $this->_getList($group_id, $key);

            // Create array with permission and no permission to send message
            foreach ($arrayList as $user_id) {
                $permis = $this->_checkingMail($group_id, $user_id, $key);

                if ($permis == 1) {
                    array_push($arrayYes, $user_id);
                } else {
                    array_push($arrayNo, $user_id);
                }
            }

            // send messages to all
            $answer = 'Рассылка';
            if ($this->_allSendMsg($answer, $key, $arrayYes) == true) {
                echo 'Сообщения отправлено ' . count($arrayYes) . ' людям';
                exit();
            } else {
                return ['error' => 'Not send message to all'];
            }
                
        } catch (Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Get list user id from group
     * 
     * @param int $group_id Group ID
     * @param string $key secret access key
     * 
     * @return array Users ID 
     */
    private function _getList($group_id, $key)
    {
        $listID = [];

        // get Users ID from group 
        $request_params = array(
            'group_id' => $group_id,
            'access_token' => $key,
            'v' => '5.120',
        );

        $get_params = http_build_query($request_params);

        $contents = file_get_contents('https://api.vk.com/method/groups.getMembers?'. $get_params);
        $records =  json_decode($contents, true);

        // adding usersID in array
        foreach ($records['response']['items'] as $user_id1) {
            array_push($listID, $user_id1);
        }

        return $listID;
    }

    /**
     * Send message specific user
     * 
     * @param string $answer text answer
     * @param int $user_id User ID
     * @param string $key secret access key
     * 
     * @return $permission
     */
    private function _checkingMail($group_id, $user_id, $key)
    {
        // 
        $request_params = array(
            'group_id' => $group_id,
            'user_id' => $user_id,
            'access_token' => $key,
            'v' => '5.120',
        );

        $get_params = http_build_query($request_params);

        $contents = file_get_contents('https://api.vk.com/method/messages.isMessagesFromGroupAllowed?'. $get_params);
        $records =  json_decode($contents, true);

        $permission = $records['response']['is_allowed'];
        return $permission;
    }

    /**
     * Send message specific user
     * 
     * @param string $answer text answer
     * @param string $key secret access key
     * @param array $arrayYes list users ID with permission to send message 
     */
    private function _allSendMsg($answer, $key, $arrayYes)
    {
        // messages send 
        $request_params = array(
            'message' => $answer,
            'access_token' => $key,
            'v' => '5.105',
            'random_id' => '0',
            'user_ids' => $arrayYes
        );

        $get_params = http_build_query($request_params);

        if (file_get_contents('https://api.vk.com/method/messages.send?'. $get_params)) {
            return true;
        } else {
            return false;
        }
    }
}