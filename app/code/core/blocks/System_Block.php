<?php
namespace Hal\Block;

/*
 * File:    /app/code/core/blocks/system_block.php
 * Purpose: Base class from which all blocks extend
 */

class System_Block {

	protected $core;
	protected $db;
	private $controller;
	private $controller_class;
	private $controller_filename;
	protected $param;
	protected $route;
	protected $model;
	public $view;
	protected $action;
	public $config;
	protected $data;
	public $session;
	// Input sanitation class
	public $input;
	public $toolbox;
	public $load;
	// System logger class
	public $log;
	// Helpers located in /app/code/helpers
	public $helper;

	public function __construct($app) {

		$this->core    = $app;
		$this->db      = $app['database'];
		$this->config  = $app['config'];
		$this->route   = $app['router'];
		$this->model   = $app['system_model'];
		$this->load    = $app['load'];
		$this->toolbox = $app['toolbox'];
		$this->log     = $app['log'];
		$this->session = self::session();
		// $this->input   = self::input();


	}

	public final function partial($block_file, $data = null) {

		$this->load->block($block_file, $data = null);
	}

	public function model($model) {
		return $this->load->model("$model");
	}

	public function redirect($url) {

		if (strpos($url, 'http://')) {
			return header('Location: ' . $url);
		} elseif (strpos($url, 'https://')) {
			return header('Location: ' . $url);
		} else {

			return header('Location: ' . BASE_URL . $url);
		}
	}

	public function session() {

		return $this->toolbox('session');
	}

	public function toolbox($helper) {

		# Load a Toolbox helper
		return $this->toolbox["$helper"];
	}

}
