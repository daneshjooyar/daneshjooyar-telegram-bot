<?php
namespace DaneshjooyarTelegramBot;
/**
* 
*/
class DaneshjooyarTelegramBotCore
{

	protected $version 		= '1.0.0';
	
	public $token 			= '382027342:AAE_lcuWvSYaneNtTgkk2nOFGiakTN8TBpc';

	public $botUserName 	= 'daneshjooyarwp_bot';

	public $url;

	public $chat_id;

	public $from;

	public $first_name;

	public $last_name;

	public $user_id;

	public $text;

	public $date;

	public $message_id;

	public $isCommand;

	public $event;

	public $type;

	public $result;

	/**
	 * if( isMessage ) {
	 * 	if( isPrivete ){
	 * 		
	 * 	}elseif( isGroup ){
	 * 		if( isReply ) {
	 * 			
	 * 		}elseif( leftGroup ) {
	 * 			if( isBot ) {
	 * 				
	 * 			}elseif( otherUser ){
	 * 				
	 * 			}
	 * 		}elseif( joinGroup ) {
	 * 			if( isBot ) {
	 * 				
	 * 			}elseif( otherUser ){
	 * 			
	 * 			}
	 * 		}
	 * 	}
	 * } elseif( isChannel ) {
	 * 		if( channel_post ) {
	 * 			
	 * 		}
	 * }
	 */

	function __construct()
	{

		$this->url          = "https://api.telegram.org/bot" . $this->token . "/";

		//$result = $this->post( 'getUpdates' );
		$updates = file_get_contents( "php://input" );
		$this->result = json_decode( $updates );

		/**
		 * Check if event is message
		 */
		if( isset( $this->result->message ) ) {

			$this->type = 'message';

			$this->first_name 	= $this->result->message->from->first_name;
			$this->last_name 	= $this->result->message->from->last_name;
			$this->username 	= $this->result->message->from->username;
			$this->message_id 	= $this->result->message->message_id;
			$this->from 		= $this->result->message->from->id;
			$this->chat_id 		= $this->result->message->chat_id;
			$this->text 		= $this->result->message->text;
			$this->date 		= $this->result->message->date;


			/**
			 * Check if message is command
			 */
			if( isset( $this->result->message->entities ) ) {

				foreach ($this->result->message->entities as $entity) {

					$this->isCommand = $entity->type == 'bot_command' ? true : false;

				}

			} else {

				$this->isCommand = false;

			}

		}



		/**
		 * Check for type of chat: group , ...
		 */
		if( isset( $this->result->message->chat->type ) ) {

			$this->type = $this->result->message->chat->type;

		}elseif( isset( $this->result->channel_post->chat->type ) ){

			$this->type = $this->result->channel_post->chat->type;

		}

		if( isset( $this->result->message->new_chat_members ) ){

			if( $this->result->message->new_chat_members->username == $this->botUserName ) {

				//You join in group
				
			}else{

				//$this->result->message->new_chat_members->username
				//$this->result->message->new_chat_members->first_name
				//$this->result->message->new_chat_members->last_name
			
			}
		}

		if( isset( $this->result->message->left_chat_member ) ){

			if( $this->result->message->left_chat_member->username == $this->botUserName ) {
				
				//You left in group
			
			}else{

				//$this->result->message->new_chat_members->username
				//$this->result->message->new_chat_members->first_name
				//$this->result->message->new_chat_members->last_name
			
			}
		}		

	}

	public function isGroup() {
		return $this->type == 'group' ? true : false;
	}

	public function isChannel() {
		return $this->type == 'channel' ? true : false;
	}

	public function isMessage(  ) {
		return $this->type == 'message' ? true : false;
	}

	public function isPrivate() {
		return $this->type == 'private' ? true : false;
	}

	public function addEventListener( $event, $callback ) {

		if( $event == 'bot_join_group' || $event == 'user_join_group' ) {

			if( isset( $this->result->message->new_chat_members ) ) {
				if( $this->result->message->new_chat_members->username == $this->botUserName ) {
					//You join in group
					if( $event == 'bot_join_group' ) {
						//run $callback
					}
				} else { // $event == 'user_join_group'
					//$this->result->message->new_chat_members->username
					//$this->result->message->new_chat_members->first_name
					//$this->result->message->new_chat_members->last_name
					//run $callback
				}
			}

		}

		if( $event == 'bot_left_group' || $event == 'user_left_group' ) {

			if( isset( $this->result->message->left_chat_member ) ){
				if( $this->result->message->left_chat_member->username == $this->botUserName ) {
					//You left in group
					if( $event == 'bot_left_group' ) {
						//run $callback
					}
				}else{ //$event == 'user_left_group'
					//$this->result->message->new_chat_members->username
					//$this->result->message->new_chat_members->first_name
					//$this->result->message->new_chat_members->last_name
					//run $callback
				}
			}

		}

	}

	public function isCommand() {
		return $this->isCommand;
	}

	public function getMe() {

		return $this->result;

	}

	public function getUpdates() {

		$result = $this->post( 'getUpdates' );

		return json_decode( $result );

	}

	public function sendMessage( $sendParams = array() ) {
		$params = wp_parse_args( $sendParams , array(
			'chat_id'					=> '',
			'text'						=> '',
			'parse_mode'				=> 'HTML',
			'disable_web_page_preview'	=> false,
			'disable_notification'		=> false,
			'reply_to_message_id'		=> 0,
			'reply_markup'				=> '',

		) );

		return $this->post( 'sendMessage', $params );

	}

	public function sendPhoto( $photoParams = array() ) {
		
		$params = wp_parse_args( $photoParams , array(
			'chat_id'					=> '',
			'photo'						=> '',
			'caption'					=> '',//0 - 200 characters
			'disable_notification'		=> false,
			'reply_to_message_id'		=> 0,
			'reply_markup'				=> '',
		) );

		return $this->post( 'sendPhoto', $params );

	}

	public function sendChatAction( $actionParams = array() ) {

		$params = wp_parse_args( $actionParams, array(
			'chat_id'	=> '',
			'action' 	=> '',
		) );

		return $this->post( 'sendChatAction', $params );

	}


	public function post( $url, $params = array() ) {

	    $curl_handle  = curl_init( $this->url . $url );

	    curl_setopt($curl_handle, CURLOPT_POST, true );

	    //curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data") );

	    curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);

	    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

	    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $params );

	    $result = curl_exec($curl_handle);

	    curl_close($curl_handle);

	    return $result;

	}


	public function log( $msg ) {
		$token        = '363453916:AAH6JPB-AHskuoLVNBS9KZn4vjPG3GIFwtA';
	    $url          = "https://api.telegram.org/bot" . $token . "/";
	    $chat_id      = '76363847';
	    $curl_handle  = curl_init( $url . 'sendMessage?chat_id=' . $chat_id );
	    curl_setopt($curl_handle, CURLOPT_POST, true );
	    curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array( 'text' => print_r( $msg, true ) ));
	    curl_exec($curl_handle);
	    curl_close($curl_handle);
	}

	/**
	 * 
	 * Generate v4 UUID
	 * 
	 * Version 4 UUIDs are pseudo-random.
	 */
	public function uuid() 
	{
		return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

		// 32 bits for "time_low"
		mt_rand(0, 0xffff), mt_rand(0, 0xffff),

		// 16 bits for "time_mid"
		mt_rand(0, 0xffff),

		// 16 bits for "time_hi_and_version",
		// four most significant bits holds version number 4
		mt_rand(0, 0x0fff) | 0x4000,

		// 16 bits, 8 bits for "clk_seq_hi_res",
		// 8 bits for "clk_seq_low",
		// two most significant bits holds zero and one for variant DCE1.1
		mt_rand(0, 0x3fff) | 0x8000,

		// 48 bits for "node"
		mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
		);
	}

}