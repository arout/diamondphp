<?php
// $dispatcher = new Hal\Core\Dispatch();
// $listener 	= new Hal\Config\Config();
// $dispatcher->addListener('config.initialize', array($listener, 'onFooAction'));

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

if ($app['session']->get('username'))
{
	$nav_menu = 'nav_user.tpl';
}
else
{
	$nav_menu = 'nav_visitor.tpl';
}

$app['template']->setTemplateDir(VIEWS_PATH);
//$app['template']->setPluginsDir(SMARTY_PATH . 'plugins');
$app['template']->setCompileDir(VAR_PATH . 'templates_c');
$app['template']->setCacheDir(CACHE_PATH);
// $app['template']->setCaching(Smarty::CACHING_LIFETIME_CURRENT);
// $app['template']->setCompileCheck(false);
$app['template']->setConfigDir(SMARTY_PATH . 'configs');

// Set the page titles in head.tpl
$app['template']->assign('page_title', $app['title']->get());
// Get appropriate nav menu
$app['template']->assign('nav_menu', $nav_menu);

$app['base_controller']->parse();

$app['template']->display('head.tpl');
$app['template']->display('layout.tpl');
$app['template']->display('footer.tpl');

// $app['registry']->event_register([

// 	'name' 		=> [ 'member.login', 'message.send' ],
// 	'class' 	=> [ 'Login_Controller', 'Messenger_Controller' ],
// 	'callback' 	=> [ 'hello', 'notify_new_message' ]

// ]);

// $app['registry']->event_register('message.send', 'Messenger_Controller', 'all');

// $app['registry']->event_dispatch('message.send');

// $app['dispatcher']->dispatch('member.login');