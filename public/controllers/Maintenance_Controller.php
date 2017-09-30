<?php
namespace Web\Controller;
use Hal\Controller\Base_Controller;

class Maintenance_Controller extends Base_Controller
{
	public function __construct($app)
	{
		parent::__construct($app);
	}

	public function index()
	{
		$this->template->assign("site_name", $this->config->setting('site_name'));
		$this->template->assign("content", "maintenance/index.tpl");
	}

}
