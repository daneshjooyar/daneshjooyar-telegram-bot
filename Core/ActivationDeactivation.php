<?php
namespace DaneshjooyarTelegramBot;
/**
* 
*/
class ActivationDeactivation extends DaneshjooyarTelegramBotCore
{
	
	function __construct()
	{
		# code...
	}

	public function activate(){
		//Activation plugin activity
		/**
		 * CREATE TABLE `wp_payment` (
		 *	 `ID` bigint(20) NOT NULL AUTO_INCREMENT,
		 *	 `payment_post_id` bigint(20) NOT NULL,
		 *	 `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
		 *	 `user_id` bigint(20) NOT NULL,
		 *	 `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		 *	 `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		 *	 `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
		 * 	 `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		 *	 `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
		 *	 `country` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
		 *	 `state` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
		 *	 `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
		 *	 `zip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
		 *	 `customer_id` bigint(20) NOT NULL,
		 *	 `purchase_key` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
		 *	 `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
		 *	 `discount_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
		 *	 `discount_amount` int(11) NOT NULL,
		 *	 `discount_price` int(11) NOT NULL,
		 *	 `gateway` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
		 *	 `total` int(11) NOT NULL,
		 *	 `price` int(11) NOT NULL,
		 *	 `completed_date` datetime NOT NULL,
		 *	 `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
		 *	 PRIMARY KEY (`ID`)
		 *	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		 */
		
		/**
		 * CREATE TABLE `wp_payment_products` (
		 *	 `ID` int(11) NOT NULL AUTO_INCREMENT,
		 *	 `payment_post_id` bigint(20) NOT NULL,
		 *	 `product_id` bigint(20) NOT NULL,
		 *	 `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		 *	 `item_price` int(11) NOT NULL,
		 *	 `discount` int(11) NOT NULL,
		 *	 `price` int(11) NOT NULL,
		 *	 `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
		 *	 PRIMARY KEY (`ID`)
		 *	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		 */

	}

	public function deactivate(){
		//Deactivation plugin activity
		
	}

}