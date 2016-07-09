<?php
// $dispatcher = new Hal\Core\Dispatch();
// $listener 	= new Hal\Config\Config();
// $dispatcher->addListener('config.initialize', array($listener, 'onFooAction'));

require_once 'factory.php';

if( $app['config']->setting('maintenance_mode') === TRUE ) 
{
	header('Location: ' . $app['config']->setting('site_url').'maintenance.php');
	exit;
}

# Build system routes
$app['router']->build();

if( $app['router']->controller != 'Block' ) 
{
    $app['template']->header();
    $app['base_controller']->parse();
    $app['template']->footer();
    
}
else {
    $app['base_controller']->parse();
}

// $app['registry']->event_register([

// 	'name' 		=> [ 'member.login', 'message.send' ],
// 	'class' 	=> [ 'Login_Controller', 'Messenger_Controller' ],
// 	'callback' 	=> [ 'hello', 'notify_new_message' ]

// ]);

// $app['registry']->event_register('message.send', 'Messenger_Controller', 'all');

// $app['registry']->event_dispatch('message.send');

$app['dispatcher']->dispatch('member.login');