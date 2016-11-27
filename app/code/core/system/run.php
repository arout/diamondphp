<?php
// $dispatcher = new Hal\Core\Dispatch();
// $listener 	= new Hal\Config\Config();
// $dispatcher->addListener('config.initialize', array($listener, 'onFooAction'));
error_reporting($app['config']->setting('error_reports'));

require_once 'factory.php';

if ($app['config']->setting('maintenance_mode') === TRUE)
{
	header('Location: ' . $app['config']->setting('site_url') . 'maintenance.php');
	exit;
}

if ($app['config']->setting('system_startup_check') === TRUE)
{
	require_once 'system_startup_check.php';
	exit;
}

# Build system routes
$app['router']->build();

if ($app['session']->get('admin_username'))
{
	$nav_menu = 'nav_user.tpl';
}
else
{
	$nav_menu = 'nav_visitor.tpl';
}

if ($app['router']->controller_class === $app['config']->setting['admin_controller'] . '_Controller')
{
	$app['template']->setTemplateDir(ADMIN_VIEWS_PATH);
	//$app['template']->setPluginsDir(SMARTY_PATH . 'plugins');
	$app['template']->setCompileDir(VAR_PATH . 'templates_c');
	$app['template']->setCacheDir(CACHE_PATH);
	// $app['template']->setCaching(Smarty::CACHING_LIFETIME_CURRENT);
	// $app['template']->setCompileCheck(false);
	$app['template']->setConfigDir(SMARTY_PATH . 'configs');
	// Script exec time in footer
	$app['template']->assign('script_exec_time', $app['config']->setting['execution_time']);
	// Set the page titles in head.tpl
	$app['template']->assign('page_title', $app['title']->get());
	// Get appropriate nav menu
	$app['template']->assign('nav_menu', $nav_menu);
	// Get active page requested
	$app['template']->assign('action', $app['router']->action);

	$app['base_controller']->parse();

	// $app['template']->display('head.tpl');
	$app['template']->display('layout.tpl');
	if ($app['router']->action !== 'login')
	{
		$app['template']->display('footer.tpl');
	}
	else
	{
		$app['template']->display('footer-login.tpl');
	}

}
else
{
	$app['template']->setTemplateDir(VIEWS_PATH);
	//$app['template']->setPluginsDir(SMARTY_PATH . 'plugins');
	$app['template']->setCompileDir(VAR_PATH . 'templates_c');
	$app['template']->setCacheDir(CACHE_PATH);
	// $app['template']->setCaching(Smarty::CACHING_LIFETIME_CURRENT);
	// $app['template']->setCompileCheck(false);
	$app['template']->setConfigDir(SMARTY_PATH . 'configs');
	// Script exec time in footer
	$app['template']->assign('script_exec_time', $app['config']->setting['execution_time']);
	// Set the page titles in head.tpl
	$app['template']->assign('page_title', $app['title']->get());
	// Get appropriate nav menu
	$app['template']->assign('nav_menu', $nav_menu);
	// Get active page requested
	$app['template']->assign('action', $app['router']->action);
	$app['base_controller']->parse();

	$app['template']->display('head.tpl');
	$app['template']->display('layout.tpl');
	$app['template']->display('footer.tpl');
}

// $app['registry']->event_register([

// 	'name' 		=> [ 'member.login', 'message.send' ],
// 	'class' 	=> [ 'Login_Controller', 'Messenger_Controller' ],
// 	'callback' 	=> [ 'hello', 'notify_new_message' ]

// ]);

// $app['registry']->event_register('message.send', 'Messenger_Controller', 'all');

// $app['registry']->event_dispatch('message.send');

// $app['dispatcher']->dispatch('member.login');