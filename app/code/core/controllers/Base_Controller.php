<?php
namespace Hal\Controller;

/**
 * File:    /app/code/core/system/base_controller.php
 * Purpose: Base class from which all controllers extend
 */

class Base_Controller {

	protected 	$action;
	public 		$cache;
	public 		$config;
	private 	$controller;
	private 	$controller_class;
	private 	$controller_filename;
	protected 	$core;
	protected 	$cron;
	protected 	$data;
	protected 	$db;
	public 		$load;
	public 		$log;
	protected 	$model;
	protected 	$param;
	protected 	$route;
	public 		$session;
	public 		$toolbox;
	public 		$view;

	public function __construct($app) {

		$this->cache   = self::cache();
		$this->config  = $app['config'];
		$this->core    = $app;
		$this->cron    = $app['cron'];
		$this->db      = $app['database'];
		$this->load    = $app['load'];
		$this->log     = $app['log'];
		$this->model   = $app['system_model'];
		$this->route   = $app['router'];
		$this->session = $app['session'];
		$this->toolbox = $app['toolbox'];

	}

	public final function parse() {
        

		# Define child controller extending this class
		$this->controller = $this->route->controller;
		# The class name contained inside child controller
		$this->controller_class = $this->controller.'_Controller';
		# File name of child controller
		$this->controller_filename = ucwords($this->controller_class) . '.php';
		# Action being requested from child controller
		$this->action = $this->route->action;
		$action       = trim(strtolower($this->route->action));
		# URL parameters
		$this->param = $this->route->param;

		# First search for requested controller file in override directory
		if (is_readable(PUBLIC_OVERRIDE_PATH . 'controllers/' . $this->controller_filename) && $this->controller_filename) { 
			# File was found and has proper file permissions
			require_once PUBLIC_OVERRIDE_PATH . 'controllers/' . $this->controller_filename;

			if (class_exists($this->controller_class)) {
				# File found and class exists, so instantiate controller class
				$__instantiate_class = new $this->controller_class($this->core);

				if (method_exists($__instantiate_class, $action)) {
					# Class method exists
					$__instantiate_class->$action();
				} else {
					# Valid controller, but invalid action
					$this->load->viewerror('errors/action', $this->controller_filename, $this->data, $this->route);
				}
			} 
			else {
				# Controller file exists, but class name
				# is not formatted / spelled properly
				$this->redirect('error/_404');
				$this->data['controller-error'] = 'Controller file exists, but class name is not formatted / spelled properly';
				$this->load->viewerror('error/controller-bad-classname', $data);
			}
		} 
		else {

			# Search for requested controller file in public directory
			if (is_readable(CONTROLLERS_DIR . $this->controller_filename) && $this->controller_filename) { 
				# File was found and has proper file permissions
				require_once CONTROLLERS_DIR . $this->controller_filename;

				if (class_exists($this->controller_class)) {
					# File found and class exists, so instantiate controller class
					$__instantiate_class = new $this->controller_class($this->core);

					if (method_exists($__instantiate_class, $action)) {
						# Class method exists
						$__instantiate_class->$action();
					} else {
						# Valid controller, but invalid action
						$this->load->viewerror('errors/action', $this->controller_filename, $this->data, $this->route);
					}
				} 
				else {
					# Controller file exists, but class name
					# is not formatted / spelled properly
					$this->redirect('error/_404');
					$this->data['controller-error'] = 'Controller file exists, but class name is not formatted / spelled properly';
					$this->load->viewerror('error/controller-bad-classname', $data);
				}
			} else {

				# Controller file does not exist, or
				# does not have read permissions (644)
				$data['controller'] = $this->controller;
				$this->redirect('error/_404');
				# $this->load->view('error/controller', $data);
			}
		}
		
	}

	public function cache() {

	}

	# public function input() {

	# 	return $this->toolbox["sanitize"];
	# }

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
