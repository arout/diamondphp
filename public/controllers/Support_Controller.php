<?php
namespace Web\Controller;
use Hal\Controller\Base_Controller;

class Support_Controller extends Base_Controller
{

	public function __construct($app)
	{
		parent::__construct($app);
		$this->redirect('documentation/index');
	}

	public function index()
	{
		$this->redirect('documentation/index');
		exit;
	}
}