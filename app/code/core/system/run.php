<?php
// $dispatcher = new Hal\Core\Dispatch();
// $listener 	= new Hal\Config\Config();
// $dispatcher->addListener('config.initialize', array($listener, 'onFooAction'));

# Page exec time
$_page_exec_timer_start = microtime(true);
# Actual memory used
// $_ram = memory_get_usage ( false );
# Format memory use to kb or mb
function convert($_ram) {
	$unit = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];
	return round($_ram/pow(1024, ($i = floor(log($_ram, 1024)))), 2).' '.$unit[$i];
}
$actual_ram = convert(memory_get_usage(false));

require_once SYSTEM_PATH.'factory.php';

if ($app['config']->setting('maintenance_mode') === TRUE) {
	header('Location: '.$app['config']->setting('site_url').'maintenance.php');
	exit;
}

if ($app['config']->setting('system_startup_check') === TRUE) {
	require_once 'system_startup_check.php';
	exit;
}

# Build system routes
$app['router']->build();

if ($app['session']->get('admin_username')) {
	$nav_menu = 'nav_user.tpl';
} else {
	$nav_menu = 'nav_visitor.tpl';
}

# Core Smarty settings
$app['template']->setTemplateDir(VIEWS_PATH);
$app['template']->setCompileDir(VAR_PATH.'templates_c');
$app['template']->setCacheDir(CACHE_PATH.'/'.$app['router']->controller_class.'/'.$app['router']->action.'/'.$app['router']->param1);
$app['template']->setCaching(Smarty::CACHING_LIFETIME_CURRENT);
#$app['template']->setCompileCheck(false);
$app['template']->setConfigDir(SMARTY_PATH.'configs');

# Memory usage
$app['template']->assign('actual_ram', $actual_ram);

if ($app['router']->controller_class === $app['config']->setting['admin_controller'].'_Controller') {
	$app['template']->setTemplateDir(ADMIN_VIEWS_PATH);
	// Set the page titles in head.tpl
	$app['template']->assign('page_title', $app['title']->get());
	// Get appropriate nav menu
	$app['template']->assign('nav_menu', $nav_menu);
	// Get active page requested
	$app['template']->assign('action', $app['router']->action);

	$app['base_controller']->parse();

	# Stop timer for page execution
	$_page_exec_timer_stop = (microtime(true)-$_page_exec_timer_start);
	$app['template']->assign('script_exec_time', $_page_exec_timer_stop);

	$app['template']->display('layout.tpl');
	if ($app['router']->action !== 'login') {
		$app['template']->display('footer.tpl');
	} else {
		$app['template']->display('footer-login.tpl');
	}

} else {
	// Set the page titles in head.tpl
	$app['template']->assign('page_title', $app['title']->get());
	// Get appropriate nav menu
	$app['template']->assign('nav_menu', $nav_menu);
	// Get active page requested
	$app['template']->assign('action', $app['router']->action);

	// exit('run.php');
	$app['base_controller']->parse();

	# Stop timer for page execution
	$_page_exec_timer_stop = (microtime(true)-$_page_exec_timer_start);
	$app['template']->assign('script_exec_time', $_page_exec_timer_stop);

	if ($app['router']->controller_class !== 'Block_Controller') {
		$app['template']->display('extends:layout.tpl|head.tpl');
	}

}
