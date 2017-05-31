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

if (!defined('BASE_PATH'))
{
	$dir = getcwd();
	$dir = chop($dir);
	$dir = chop($dir, "/");
	define('BASE_PATH', $dir . '/');
}
require_once BASE_PATH . 'app/code/core/system/init.php';

$app['session']->start();
// Import Smarty
if (!class_exists('Smarty'))
{
	require_once SMARTY_PATH . 'libs/Smarty.php';
}

require_once SYSTEM_PATH . 'run.php';
