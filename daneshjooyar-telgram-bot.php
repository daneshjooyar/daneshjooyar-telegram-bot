<?php
namespace DaneshjooyarTelegramBot;
/**
 * Plugin Name: Daneshjooyar Telegram Bot
 * Plugin URI: http://daneshjooyar.com
 * Author: Hamed moodi
 * Author URI: http://daenshjooyar.com/author/h_m_mood
 * Description: Simple telegram bot for send posts in channel and send notification for user in events
 * License: MIT
 * Text Domain: daneshjooyar-telegram-bot
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) || exit;

define( 'DYTB_PATH', plugin_dir_path( __FILE__ ) );
define( 'DYTB_PLUGIN_CORE', DYTB_PATH . 'Core/' );

/**
 * Register AutoLoader class
 * DaneshjooyarTelegramBot is root of plugin
 * Note: If yout want to use wordpress or Php class user'\' before class instantiation
 * Example: if you want to use WP_Query you must use => $wp_query = new \WP_Query( $args );
 * OR: use 'use WP_Query' above of php file for igore in instantiation
 */
spl_autoload_register( function( $class ) { //Ex: DaneshjooyarTelegramBot\Core
	if( strpos( $class,  'DaneshjooyarTelegramBot' ) === 0 ){
		$class = str_replace( 'DaneshjooyarTelegramBot\\', DYTB_PLUGIN_CORE,  $class ); //Ex: {PluginPath}\Core
		$class = str_replace( '\\' , '/',  $class ); //Ex: {PluginPath}/Core
		$class.= '.php'; //Ex: {PluginPath}\Core/Loader.php
		include $class;
	}
} );

/**
 * init plugin translation
 */
add_action('plugins_loaded', function(){
    load_plugin_textdomain( 'daneshjooyar-telegram-bot', false, basename( DYTB_PATH ) . '/languages/' );
});

register_activation_hook( __FILE__, array('DaneshjooyarTelegramBot\ActivationDeactivation', 'activate'));
register_deactivation_hook( __FILE__, array('DaneshjooyarTelegramBot\ActivationDeactivation', 'deactivate'));

$daneshjooyarPlugin = new Loader();
$daneshjooyarPlugin->run();