<?php

class Download_Controller extends Hal\Controller\Base_Controller {

	public function index() {

		// $this->data['cache'] = new System\Core\Apc;
		$data['param']  = $this->route->param2;
		$this->load->view('static/download', $data);
	}

	public function demo() {

		echo '<div class="bs-callout text-center styleSecondBackground">Demo action loaded!!!  :)</div>';
	}

}