<?php

class Support_Controller extends Hal\Controller\Base_Controller {

	public function __construct($app) {
		parent::__construct($app);
		$this->redirect('documentation/index');
		exit;
	}
}