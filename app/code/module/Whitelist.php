<?php
namespace Hal\Module;

class Whitelist 
{
	protected $ip_allowed = [];
	protected $ip_blocked = [];

	public function allow( Array $allow ) 
	{
		if( ! empty( $allow ) ) 
		{
			foreach( $allow as $safe )
				$this->ip_allowed[$safe] = $safe;
			return TRUE;
		}
		return FALSE;
	}

	public function block( Array $block ) 
	{
		if( ! empty( $block ) ) 
		{
			foreach( $block as $unsafe )
				$this->ip_blocked[$unsafe] = $unsafe;
			return TRUE;
		}
		return FALSE;
	}
}