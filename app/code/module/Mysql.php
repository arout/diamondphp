<?php
namespace Hal\Module;

/*
 * MySQL management system
 */

class Mysql
{
	private $config;
	private $db;

	public function __construct($app)
	{
		$this->config = $app['config'];
		$this->db     = $app['database'];
	}

	public function create_event()
	{
		$this->db->prepare('SET GLOBAL event_scheduler="ON"');
		$this->db->execute();
	}

	public function view_events()
	{

	}
}
