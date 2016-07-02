<?php

### Define global server / PHP settings ###

# Strict mode by default for scalar type declarations
declare(strict_types = 1);
# Get Composer autoloader
if( !defined( 'BASE_PATH' ) )
	define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'].'/');

require_once BASE_PATH . 'vendor/autoload.php';
require_once 'factory.php';

# Edit to match your time zone
date_default_timezone_set($app['config']->setting('time_zone'));

# Turn error reporting on / off
$app['parse']->set_reporting($app['config']->setting('error_reports'));
