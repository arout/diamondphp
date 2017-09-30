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
		$this->template->assign("phone", $this->config->setting('telephone'));
		$this->template->assign("content", "maintenance/index.tpl");
	}

}
