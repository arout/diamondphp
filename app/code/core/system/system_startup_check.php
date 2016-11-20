<?php ob_start(); ?>
<style>
code { color: red;  }
</style>

<?php

if( ! is_readable( 'app/code/core/config/Config.php' ) ) {
	ini_set('display_errors', '0');
	error_reporting(0);
	exit("<h3>Configuration file either does not exist, or does not have read permissions (0644) in <code>app/code/core/config/Config.php</code></h3>");
}

if( ! is_readable( 'app/code/core/system/factory.php' ) ) {
	ini_set('display_errors', '0');
	error_reporting(0);
	exit("<h3>factory.php file either does not exist, or does not have read permissions (0644) in <code>app/code/core/system/factory.php</code></h3>");
}

if( ! is_readable( 'app/code/core/system/run.php' ) ) {
	ini_set('display_errors', '0');
	error_reporting(0);
	exit("<h3>run.php file either does not exist, or does not have read permissions (0644) in <code>app/code/core/system/run.php</code></h3>");
}

if( ! is_readable( 'app/code/core/system/paths.php' ) ) {
	ini_set('display_errors', '0');
	error_reporting(0);
	exit("<h3>paths.php file either does not exist, or does not have read permissions (0644) in <code>app/code/core/system/paths.php</code></h3>");
}

if( ! is_readable( 'app/code/core/system/Loader.php' ) ) {
	ini_set('display_errors', '0');
	error_reporting(0);
	exit("<h3>Loader.php file either does not exist, or does not have read permissions (0644) in <code>app/code/core/system/Loader.php</code></h3>");
}

if( ! is_readable( 'app/code/core/controllers/Base_Controller.php' ) ) {
	ini_set('display_errors', '0');
	error_reporting(0);
	exit("<h3>Base_Controller.php file either does not exist, or does not have read permissions (0644) in <code>app/code/core/controllers/Base_Controller.php</code></h3>");
}

if ( ! array_key_exists('mod_rewrite', $_SERVER) && ! array_key_exists('REDIRECT_mod_rewrite', $_SERVER) && ! array_key_exists('REDIRECT_HTTP_MOD_REWRITE', $_SERVER) ) 
	exit('<h3>Apache module <code>mod_rewrite</code> was not detected. System exiting...</h3>');


if ( ! extension_loaded('pdo') )
    exit('<h3><code>PDO extension</code> was not detected. System exiting...</h3>');

function php_ver() {
	// Detect PHP version being run
	return PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION.'.'.PHP_RELEASE_VERSION;
}
if (php_ver() <= 6.9)
	exit('<h3>You must have PHP version 7.0 or higher. Your PHP version: <code>'.php_ver().'</code> System exiting...</h3>');

ob_flush();