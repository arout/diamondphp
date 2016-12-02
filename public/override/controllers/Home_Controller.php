<?php
namespace Hal\ControllerOverride;
use Web\Controller\Home_Controller as Home;

class Home_Controller extends Home
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
		return "Home_Controller_Override";
	}

}
