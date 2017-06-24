<?php
namespace Hal\Module;
use \Memcache;

class Cache extends Memcache
{
	public function __construct($host,$port)
	{
		parent::connect($host,$port);	
	}

	public function connect($host,$port)
	{
		parent::connect($host,$port);	
	}
}
