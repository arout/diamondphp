<?php
/**
 * An open source application development framework designed for PHP 7
 *
 * @package         Diamond PHP Framwework
 * @author          Andrew Rout [ andrew@diamondphp.com ]
 * @copyright       Copyright (c) 2015, Andrew Rout
 * @license         https://diamondphp.com/support/license
 * @link            https://diamondphp.com
 * @since           Version 1.0
 * @filesource
 *
 */
# Initiate global settings
require_once getcwd() . '/app/code/core/system/global.php';

ob_start();
# Define the path to the front controller (this file)
define('BASE_PATH', getcwd() . '/');
ob_end_clean();


# Get Composer autoloader
require_once BASE_PATH . 'vendor/autoload.php';

# Pimple dependency injection
if ( ! class_exists('Pimple\Container') ) {
	require_once BASE_PATH . 'pimple/pimple/src/Pimple/Container.php';
	require_once BASE_PATH . 'pimple/pimple/src/Pimple/ServiceProviderInterface.php';
}

$dispatcher = new Hal\Core\Dispatch;

require_once BASE_PATH . 'app/code/core/system/run.php';

# Load directory definitions
require_once BASE_PATH . 'app/code/core/system/paths.php';

