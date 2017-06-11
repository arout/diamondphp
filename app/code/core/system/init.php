<?php

$file = BASE_PATH . '.env';
if (!file_exists($file))
{
	exit('<h3><span style="color: red;">.env</span> global configuration file not found. Exiting...</h3>');
}

require_once BASE_PATH . 'vendor/autoload.php';
require_once BASE_PATH . 'app/code/core/system/factory.php';
require_once BASE_PATH . 'app/code/core/system/paths.php';

switch ($app['config']->setting('error_reports'))
{
case "ON":
	ini_set('display_errors', 1);
	error_reporting(E_ALL & ~E_NOTICE);
	break;

case "DEV MODE":
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	break;

default:
	ini_set('display_errors', 0);
	error_reporting(0);
}

# Core Smarty settings
$app['template']->setTemplateDir(VIEWS_PATH);
$app['template']->setCompileDir(VAR_PATH . 'templates_c');
$app['template']->setCacheDir(CACHE_PATH . '/' . $app['router']->controller_class . '/' . $app['router']->action . '/' . $app['router']->param1);
$app['template']->setCaching(Smarty::CACHING_LIFETIME_CURRENT);
#$app['template']->setCompileCheck(false);
$app['template']->setConfigDir(SMARTY_PATH . 'configs');
