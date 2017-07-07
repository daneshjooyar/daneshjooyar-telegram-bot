<?php
namespace DaneshjooyarTelegramBot\Components;
use DaneshjooyarTelegramBot\DaneshjooyarTelegramBotCore;
/**
* 
*/
class ComponentsManager extends DaneshjooyarTelegramBotCore
{
	
	function __construct()
	{
		# code...
	}

	public function loadComponents() {

		$profile = new Profile();
		$profile->addUserField();

		$notification = new Notification();
		$notification->activeComments();
		
	}
}