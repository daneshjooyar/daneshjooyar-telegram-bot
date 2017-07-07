<?php
namespace DaneshjooyarTelegramBot;
/**
* 
*/
class Loader extends DaneshjooyarTelegramBotCore
{
	
	function __construct()
	{
		# code...
	}

	public function run() {

		$components = new Components\ComponentsManager();
		$components->loadComponents();

	}

}