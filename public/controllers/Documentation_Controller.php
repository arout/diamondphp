<?php

class Documentation_Controller extends Hal\Controller\Base_Controller 
{

	public function __construct($app)
	{
		parent::__construct($app);
		$this->load->view('docs/toc');
	}
	
	public function index() {
		$data['load'] = $this->load;
		$data['route'] = $this->route;
		# $this->load->view('docs/toc', $data);
		return $this->load->view('docs/index', $data);
	}

	public function introduction() {
		$data['load'] 	= $this->load;
		$data['route'] 	= $this->route;
		$page 			= $data['route']->param1;
		switch( $page ) {
			case "requirements":
				$this->load->view('docs/introduction/requirements', $data);
				break;
			case "install":
				$this->load->view('docs/introduction/install', $data);
				break;
			case "configuration":
				$this->load->view('docs/introduction/configuration', $data);
				break;

			default: 
				return $this->load->view('docs/index', $data);
		}
	}

	public function mvc() {
		$data['load'] 	= $this->load;
		$data['route'] 	= $this->route;
		$page 			= $data['route']->param1;
		switch( $page ) {
			case "controllers":
				$this->load->view('docs/mvc/controllers', $data);
				break;
			case "models":
				$this->load->view('docs/mvc/models', $data);
				break;
			case "views":
				$this->load->view('docs/mvc/views', $data);
				break;

			default: 
				return $this->load->view('docs/index', $data);
		}
	}

	public function core() {
		$data['load']  	= $this->load;
		$data['route'] 	= $this->route;
		$page 			= $data['route']->param1;
		switch( $page ) {
			case "cron":
				$this->load->view('docs/core/cron', $data);
				break;
			case "database":
				$this->load->view('docs/core/database', $data);
				break;
			case "events":
				$this->load->view('docs/core/events', $data);
				break;
			case "router":
				$this->load->view('docs/core/router', $data);
				break;
			case "sessions":
				$this->load->view('docs/core/sessions', $data);
				break;
			case "blocks":
				$this->load->view('docs/core/blocks', $data);
				break;
			case "override":
				$this->load->view('docs/core/override', $data);
				break;
			case "logger":
				$this->load->view('docs/core/logger', $data);
				break;
			case "loader":
				$this->load->view('docs/core/loader', $data);
				break;

			default: 
				return $this->load->view('docs/index', $data);
		}
	}

	public function modules() {
		$data['load'] = $this->load;
		$data['route'] = $this->route;
		$page 			= $data['route']->param1;
		switch( $page ) {
			case "breadcrumbs":
				$this->load->view('docs/modules/breadcrumbs', $data);
				break;
			case "formatter":
				$this->load->view('docs/modules/formatter', $data);
				break;
			case "friends":
				$this->load->view('docs/modules/friends', $data);
				break;
			case "geoip":
				$this->load->view('docs/modules/geoip', $data);
				break;
			case "hash":
				$this->load->view('docs/modules/hash', $data);
				break;
			case "images":
				$this->load->view('docs/modules/images', $data);
				break;
			case "messenger":
				$this->load->view('docs/modules/messenger', $data);
				break;
			case "titles":
				$this->load->view('docs/modules/titles', $data);
				break;
			case "pagination":
				$this->load->view('docs/modules/pagination', $data);
				break;
			case "sanitize":
				$this->load->view('docs/modules/sanitize', $data);
				break;
			case "user-agent":
				$this->load->view('docs/modules/user-agent', $data);
				break;
			case "validation":
				$this->load->view('docs/modules/validation', $data);
				break;
			case "ckeditor":
				$this->load->view('docs/modules/ckeditor', $data);
				break;
			case "gritter":
				$this->load->view('docs/modules/gritter', $data);
				break;
			case "mobile":
				$this->load->view('docs/modules/mobile', $data);
				break;
			case "phpword":
				$this->load->view('docs/modules/phpword', $data);
				break;

			default: 
				return $this->load->view('docs/modules/overview', $data);
		}
	}


	public function docs() {
		$this->index();
	}

	public function faq() {
		$data['load'] = $this->load;
		$data['route'] = $this->route;
		$this->load->view('docs/faq', $data);
	}

	public function license() {

		$this->load->view('docs/license');
	}

}