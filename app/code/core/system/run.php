<?php
// $dispatcher = new Hal\Core\Dispatch();
// $listener 	= new Hal\Config\Config();
// $dispatcher->addListener('config.initialize', array($listener, 'onFooAction'));

require_once 'factory.php';



# Build system routes
$app['router']->build();

if( $app['router']->controller != 'Block' ) {

    $app['template']->header();
    $app['base_controller']->parse();
    $app['template']->footer();
    
}
else {
    $app['base_controller']->parse();
}

// $parse = new Hal\Core\Parse;
// $parse->init('config');
