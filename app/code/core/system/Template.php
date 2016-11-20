<?php

namespace Hal\Core;
use Smarty;

if (!class_exists('Smarty'))
{
	require SMARTY_PATH . 'libs/Smarty.php';
}

class Template extends Smarty
{
	public $app;
	protected $config;
	protected $load;
	protected $route;
	public $session;
	# Is this the admin area?
	private $is_admin = FALSE;

	public function __construct($app)
	{
		parent::__construct();

		$this->config = $app['config'];
		$this->load   = $app['load'];
		$this->route  = $app['router'];

		if ($this->route->controller == 'Admin')
		{
			$this->is_admin = TRUE;
		}
	}
}
