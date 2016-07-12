<?php

### Define global server / PHP settings ###

# Strict mode by default for scalar type declarations
declare(strict_types = 1);

# Get Composer autoloader
require_once BASE_PATH . 'vendor/autoload.php';
require_once 'factory.php';

# Edit to match your time zone
date_default_timezone_set($app['config']->setting('time_zone'));

# Turn error reporting on / off
$app['parse']->set_reporting($app['config']->setting('error_reports'));

# Log run time errors
if( $app['config']->setting('log_errors') === TRUE ) {
	ini_set("log_errors", '1');
	ini_set("error_log", LOG_PATH.'system.log');
}
