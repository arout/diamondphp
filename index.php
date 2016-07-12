<?php
/**
 * An open source application development framework designed for PHP 7
 *
 * @package         Diamond PHP Framwework
 * @author          Andrew Rout [ arout@diamondphp.com ]
 * @copyright       Copyright (c) 2016, Andrew Rout
 * @license         https://diamondphp.com/support/license
 * @link            https://diamondphp.com
 * @since           Version 1.0.0
 * @filesource
 *
 */

if( ! defined( 'BASE_PATH' ) )
	define('BASE_PATH', getcwd().'/');

# Initiate global settings
require_once getcwd() . '/app/code/core/system/global.php';

if( $app['config']->setting('system_startup_check') === TRUE ) 
	require_once getcwd() . '/app/code/core/system/system_startup_check.php';

# Get Composer autoloader
require_once BASE_PATH . 'vendor/autoload.php';

# Pimple dependency injection
if ( ! class_exists('Pimple\Container') ) 
{
	require_once BASE_PATH . 'pimple/pimple/src/Pimple/Container.php';
	require_once BASE_PATH . 'pimple/pimple/src/Pimple/ServiceProviderInterface.php';
}

require_once BASE_PATH . 'app/code/core/system/run.php';

# Load directory definitions
require_once BASE_PATH . 'app/code/core/system/paths.php';
