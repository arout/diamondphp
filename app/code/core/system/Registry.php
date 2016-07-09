<?php
namespace Hal\Core;

class Registry extends Event
{

	public function event_register( $name, $class, $callback ) 
	{
		return $this->dispatcher->addListener( "{$name}",array($class,$callback));
	}

	public function event_dispatch( $name )
	{
		return $this->dispatcher->dispatch( "{$name}" );
	}

}