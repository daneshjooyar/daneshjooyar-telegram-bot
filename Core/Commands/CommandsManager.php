<?php
namespace DaneshjooyarTelegramBot\Commands;
use DaneshjooyarTelegramBot\DaneshjooyarTelegramBotCore;
/**
* 
*/
class CommandsManager extends DaneshjooyarTelegramBotCore
{

	private $input;
	
	public function __construct() {
		
		$this->input = json_decode( file_get_contents("php://input") );

		if( $this->input->ok ) {
			//Result Success
		}else{
			$errCode 		= $this->input->error_code;
			$errDescription = $this->input->description;
		}

	}

	public function listen() {
		


	}

}