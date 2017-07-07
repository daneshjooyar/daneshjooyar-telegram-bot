<?php
namespace DaneshjooyarTelegramBot;
/**
* 
*/
class Loader extends DaneshjooyarTelegramBotCore
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function run() {

		//Test
		//$this->log( $this->sendMessage(['chat_id' => '76363847', 'text' => 'درو بر تو <a href="http://ircodex.ir/send-email-with-phpmailer-in-php/">حامد مودی</a> و <i>خودم</i>', 'reply_to_message_id' => 107]) );
		//$this->log( $this->sendPhoto(['chat_id' => '76363847', 'caption' => 'درو بر تو' ,'photo'=> 'http://img.p30download.com/console/image/2017/01/1485807925_firewatch.jpg']) );

		/*
		sleep(5);
		$this->log( $this->sendChatAction( ['chat_id'	=> 76363847, 'action'	=> 'typing'] ) );
		sleep(3);
		$this->log( $this->sendChatAction( ['chat_id'	=> 76363847, 'action'	=> 'upload_photo'] ) );
		sleep(3);
		$this->log( $this->sendChatAction( ['chat_id'	=> 76363847, 'action'	=> 'record_video'] ) );
		sleep(3);
		$this->log( $this->sendChatAction( ['chat_id'	=> 76363847, 'action'	=> 'upload_video'] ) );
		sleep(3);
		$this->log( $this->sendChatAction( ['chat_id'	=> 76363847, 'action'	=> 'record_audio'] ) );
		sleep(3);
		$this->log( $this->sendChatAction( ['chat_id'	=> 76363847, 'action'	=> 'upload_audio'] ) );
		sleep(3);
		$this->log( $this->sendChatAction( ['chat_id'	=> 76363847, 'action'	=> 'upload_document'] ) );
		sleep(3);
		$this->log( $this->sendChatAction( ['chat_id'	=> 76363847, 'action'	=> 'find_location'] ) );
		sleep(3);
		$this->log( $this->sendChatAction( ['chat_id'	=> 76363847, 'action'	=> 'record_video_note'] ) );
		sleep(3);
		$this->log( $this->sendChatAction( ['chat_id'	=> 76363847, 'action'	=> 'upload_video_note'] ) );
		sleep(3);
		*/

		$components = new Components\ComponentsManager();
		$components->loadComponents();

		$commands = new Commands\CommandsManager();
		$commands->listen();

	}

}