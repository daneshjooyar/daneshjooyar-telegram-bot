<?php
namespace DaneshjooyarTelegramBot\Components;
use DaneshjooyarTelegramBot\DaneshjooyarTelegramBotCore;
/**
* 
*/
class Profile extends DaneshjooyarTelegramBotCore
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function addUserField() {

		add_action( 'show_user_profile', array( $this, 'add_UserFieldUI' ) );

		add_action( 'edit_user_profile', array( $this, 'add_UserFieldUI' ) );

		/**
		 * $this->result->message documented in DaneshjooyarTelegramBotCore Class
		 */
		
		if( $this->result && isset( $this->result->message ) && strpos( $this->result->message, 'tguid' ) !== FALSE ) {
			
			//
			global $wpdb;
			$code = trim( $this->result->message->text );
			$sql = $wpdb->prepare( "SELECT user_id FROM $wpdb->usermeta WHERE meta_key = 'telegram_invite_key' AND meta_value = %s", $code );
			$user_id = $wpdb->get_var( $sql );
			if( $user_id ) {
				if( ! get_user_meta( $user_id, 'telegram_chat_id', true ) ) {
					update_user_meta( $user_id, 'telegram_chat_id', $this->result->message->chat->id );
					$this->log( 'message_id => ' . $this->result->message->message_id );
					$this->sendMessage(array(
						'chat_id' 				=> $this->result->message->chat->id,
						'reply_to_message_id'	=> $this->result->message->message_id,
						'text'					=> 'از عضویت شما در ربات تلگرام دانشجویار ممنونیم. امیواریم بتوانی سرویس های بهتری را ارائه دهیم.'
					));
				}
			}

		}

	}

	public function add_UserFieldUI( $user ){

		$userTelegramInviteKey = get_user_meta( $user->ID, 'telegram_invite_key', true );

		if( ! $userTelegramInviteKey ) {
			$userTelegramInviteKey = 'tguid' . $this->uuid();
			update_user_meta( $user->ID, 'telegram_invite_key', $userTelegramInviteKey );
		}

		$chat_id = get_user_meta( $user->ID, 'telegram_chat_id', true );

		?>
		<table class="form-table">
			<tr>
				<th><label for="telegram_invite_key">تنظیم تلگرام شما:</label></th>
				<td>
					<?php if( $chat_id && $chat_id > 0 ):?>
						<p>شما تلگرام خود را تنظیم کرده اید</p>
					<?php else:?>
						<p>برای تنظیم تلگرام کافیست کافیست ربات ما را از <a target="_blank" href="https://t.me/<?php echo $this->botUserName;?>">اینجا</a> آغاز کنید و سپس کد <span style="padding: 2px 5px; background-color: ##ececec; border: 1px solid #d2cfcf; margin: 0 5px;"><?php echo $userTelegramInviteKey;?></span> را برای آن بفرستید. </p>
					<?php endif;?>
				</td>
			</tr>
		</table>
		<?php

	}
}