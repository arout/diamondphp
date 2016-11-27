<?php
namespace Web\Controller;
use Hal\Controller\Base_Controller;

class Home_Controller extends Base_Controller
{
	/**
	 * [__construct description]
	 * @param [object] $app [Instance of Pimple]
	 *
	 * Often, an individual controller will need a constructor.
	 * Below is an example of creating the __construct() for a
	 * given controller.
	 * The $app variable must be passed to the construct method,
	 * and again to the parent::__construct() method call
	 */
	public function __construct($app)
	{
		parent::__construct($app);
	}

	public function __toString()
	{
		return "Home_Controller";
	}

	public function index()
	{
		$this->template->assign('content', 'index.tpl');
	}

}
