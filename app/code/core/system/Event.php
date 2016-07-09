<?php
namespace Hal\Core;

class Event extends \Symfony\Component\EventDispatcher\Event
{
	protected $dispatcher;

	public function __construct( $app )
	{
		$this->dispatcher = $app['dispatcher'];
	}

	public function _register( $name, $class, $callback ) 
	{
		$this->dispatcher->addListener( "{$name}",array($class,$callback));
	}

}