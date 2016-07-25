<?php

class Home_Controller extends Hal\Controller\Base_Controller {

	/**
	 * [__construct description]
	 * @param [object] $container [Instance of Pimple]
	 *
	 * Often, an individual controller will need a constructor.
	 * Below is an example of creating the __construct() for a
	 * given controller.
	 * The $app variable must be passed to the construct method,
	 * and again to the parent::__construct() method call
	 */
	public function __construct($app) {

		parent::__construct($app);

	}

	public function index() {

		//$api = $this->helper->load('config');
		//echo $api->api_key;
		$this->load->view('home/index');

	}

}
