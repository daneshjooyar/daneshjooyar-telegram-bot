<?php
namespace DaneshjooyarTelegramBot\Components;
use DaneshjooyarTelegramBot\DaneshjooyarTelegramBotCore;
/**
* 
*/
class Notification extends DaneshjooyarTelegramBotCore
{

	public $chat_id;
	
	function __construct()
	{

		parent::__construct();

		/**
		 * Set telegram chat id to $this->chat_id
		 */
		add_action( 'init', function() {
			if( is_user_logged_in() ) {
				$this->chat_id = get_user_meta( get_current_user_id(), 'telegram_chat_id', true );
			}
		} );

	}

	public function activeComments() {

		add_action('wp_insert_comment', function($comment_id, $comment_object) {
		    if ($comment_object->comment_parent >= 0) {
		    	$this->log( $this->chat_id );
		        $this->sendMessage(array(
		        	'chat_id' => $this->chat_id,
		        	'text'	=> "پاسخ به دیدگاه شما \n\r"  . $comment_object->comment_content,
		        ));
		    }
		},99,2);

		
	}

}