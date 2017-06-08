<?php
// MIT License

// Copyright (c) 2017 Andrew Rout

// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions:

// The above copyright notice and this permission notice shall be included in all
// copies or substantial portions of the Software.

// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
// SOFTWARE.

/**
 * An open source application development framework designed for PHP 7
 *
 * @package         Diamond PHP Framwework
 * @author          Andrew Rout [ andrew@diamondphp.com ]
 * @copyright       Copyright (c) 2017, Andrew Rout
 * @license         https://diamondphp.com/support/license
 * @link            https://diamondphp.com
 * @since           Version 1.0.0
 * @filesource
 *
 */

// Defines the base path of the application
if (!defined('BASE_PATH'))
{
	$dir = getcwd();
	$dir = chop($dir);
	$dir = chop($dir, "/");
	define('BASE_PATH', $dir . '/');
}

// System initialization
require_once BASE_PATH . 'app/code/core/system/init.php';

// Start session. Be sure to only make changes to session options
// within the .env configuration file.
$app['session']->start();

// Import Smarty template engine
// Version 3.1.30 is released with the framework
// Future patch will use Composer to handle Smarty updates
if (!class_exists('Smarty'))
{
	require_once SMARTY_PATH . 'libs/Smarty.php';
}

// Ready...steady...go!
require_once SYSTEM_PATH . 'run.php';
