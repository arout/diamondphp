<?php
/**
 * file: /app/code/core/system/factory.php
 * System initialization begins here
 *
 * We will use Pimple to create our services
 * and manage dependencies
 */
// use \R as R;

$app = new \Pimple\Container();

$app['global_config_import'] = function () {
	$file                       = BASE_PATH.'.env';
	return new \Hal\Core\Import($file);
};

$app['config'] = function ($c) {
	return new \Hal\Config\Config($c['global_config_import']);
};

function set_server_environ($app) {
	# Set error reporting level [via Config.php]
	if ($app['config']->setting('error_reports') === "true") {
		ini_set("display_errors", 1);
		error_reporting(E_ALL&~E_NOTICE);
	} else {
		error_reporting(0);
	}

	# Set log file
	if ($app['config']->setting('log_errors') == TRUE) {
		ini_set("log_errors", 1);
		include_once 'paths.php';
		ini_set('error_log', LOG_PATH.'system.log');
	}
	# Set time zone [via Config.php]
	date_default_timezone_set($app['config']->setting('time_zone'));

}
set_server_environ($app);

$app['router'] = function ($c) {
	return new \Hal\Core\Router($c['config']->setting('default_controller'), $c['config']);
};

$app['cron'] = function ($c) {
	return new \Hal\Core\Cron;
};

$app['dispatcher'] = new Hal\Core\Dispatch;

$app['registry'] = function ($c) {
	return new \Hal\Core\Registry($c);
};

$app['event'] = function ($c) {
	return new \Hal\Core\Event($c);
};

$app['system_block'] = function ($c) {
	return new \Hal\Block\System_Block($c);
};

$app['parse'] = function ($c) {
	return new \Hal\Core\Parse($c);
};

$app['database'] = function ($c) {
	return new \Hal\Core\Database($c);
};

$app['orm'] = function ($c) {
	// Create instance of redbean orm
	require_once VENDOR_PATH.'redbean/rb.php';
	return R::setup("mysql:host=".$c['config']->setting('db_host').";
		dbname=".$c['config']->setting('db_name')."", $c['config']->setting('db_user'), $c['config']->setting('db_pass'));

	// uncomment the below in production environment to prevent database columns from changing
	// R::freeze( TRUE );
};

$app['view'] = function ($c) {
	return new \Hal\Core\SystemView;
};

$app['cache'] = function ($c) {
	return new \Hal\Core\Cache;
};

$app['load'] = function ($c) {
	return new \Hal\Core\Loader($c);
};

$app['system_model'] = function ($c) {
	return new \Hal\Model\System_Model($c['database'], $c['toolbox'], $c);
};

$app['template'] = function ($c) {
	return new \Hal\Core\Template($c);
};

$app['log'] = function ($c) {
	return new \Hal\Core\Logger();
};

$app['base_controller'] = function ($c) {
	return new \Hal\Controller\Base_Controller($c);
};

/*********************
 *   Toolbox helpers
 *********************/
$app['breadcrumbs'] = function ($c) {
	$bc                = new \Hal\Module\Breadcrumbs($c['router'], $c['config']);
	$bc->show();
	return $bc;
};

$app['cookie'] = function ($c) {
	return new \Hal\Core\Cookie;
};

$app['email'] = function ($c) {
	return new \Hal\Module\Email($c);
};

$app['formatter'] = function ($c) {
	return new \Hal\Module\Formatter;
};

$app['friends'] = function ($c) {
	return new \Hal\Module\Friends($c['database'], $c['toolbox'], $c['system_model']);
};

$app['geoip'] = function ($c) {
	return new \Hal\Module\Geo($c['database']);
};

$app['hash'] = function ($c) {
	return new \Hal\Module\Hash;
};

$app['image'] = function ($c) {
	return new \Hal\Module\Image($c['config'], $c['toolbox']);
};

$app['input'] = function ($c) {
	return new \Hal\Module\Input($c['sanitize'], $c['validate']);
};

$app['memcached'] = function ($c) {
	return new Mcached;
	// return $_s->connect();
};

$app['messenger'] = function ($c) {
	return new \Hal\Module\Messenger($c['database'], $c['toolbox']);
};

$app['mysql'] = function ($c) {
	return new \Hal\Module\Mysql($c);
};

$app['opcache'] = function ($c) {
	return new \Hal\Core\Opcache;
};

$app['pagination'] = function ($c) {
	return new \Hal\Module\Pagination($c);
};

$app['performance'] = function ($c) {
	return new \Hal\Module\Performance;
};

$app['sanitize'] = function ($c) {
	return new \Hal\Module\Sanitize($c['toolbox']);
};

$app['search'] = function ($c) {
	return new \Hal\Module\Search($c['database']);
};

$app['session'] = function ($c) {
	return new \Hal\Core\Session();
};

$app['slider'] = function ($c) {
	return new \Hal\Module\Slider($c);
};

$app['title'] = function ($c) {

	$title = new \Hal\Module\Title($c['toolbox']);
	require_once MODULES_PATH.'Titlesettings.php';
	# Pass the Titlesettings() function from the included file above to $title->set()
	$title->set(Titlesettings($c));
	return $title;
};

$app['validate'] = function ($c) {
	return new \Hal\Module\Validation;
};

$app['toolbox'] = function ($app) {
	// Used to pass the toolbox as a function parameter to other objects
	return $app;
};

$app['whitelist'] = function ($c) {
	return new \Hal\Module\Whitelist;
};
