<?php
namespace DaneshjooyarTelegramBot;
/**
* 
*/
class DaneshjooyarTelegramBotCore
{
	protected $version = '1.0.0';
	
	public $token 	= '382027342:AAE_lcuWvSYaneNtTgkk2nOFGiakTN8TBpc';

	public $url;

	function __construct()
	{
		$this->url          = "https://api.telegram.org/bot" . $this->token . "/";
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

}