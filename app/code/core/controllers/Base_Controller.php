<?php
namespace Hal\Controller;

/*
 * File:    /app/code/core/system/base_controller.php
 * Purpose: Base class from which all controllers extend
 */

class Base_Controller
{
	protected $action;
	public $cache;
	public $config;
	private $controller;
	private $controller_class;
	private $controller_filename;
	protected $core;
	protected $cron;
	protected $data;
	protected $db;
	protected $dispatcher;
	public $load;
	public $log;
	protected $model;
	protected $param;
	protected $route;
	public $session;
	public $template;
	public $toolbox;
	public $view;

	public function __construct($app)
	{
		$this->config     = $app['config'];
		$this->core       = $app;
		$this->cron       = $app['cron'];
		$this->db         = $app['database'];
		$this->dispatcher = $app['dispatcher'];
		$this->event      = $app['event'];
		$this->load       = $app['load'];
		$this->log        = $app['log'];
		$this->model      = $app['system_model'];
		$this->route      = $app['router'];
		$this->session    = $app['session'];
		$this->template   = $app['template'];
		$this->toolbox    = $app['toolbox'];
	}

	public final function parse()
	{
		# Define child controller extending this class
		$this->controller = $this->route->controller;
		# The class name contained inside child controller
		$this->controller_class = $this->controller . '_Controller';
		# File name of child controller
		$this->controller_filename = ucwords($this->controller_class) . '.php';
		# Action being requested from child controller
		$this->action = $this->route->action;
		$action       = trim(strtolower($this->route->action));
		# URL parameters
		$this->param = $this->route->param;
		# Pass controller information to view files; used for debugger
		$this->template->assign('controller', $this->controller);
		$this->template->assign('controller_class', $this->controller_class);
		$this->template->assign('controller_filename', $this->controller_filename);
		$this->template->assign('action', $action);

		# Check if the admin controller is being requested
		if ($this->controller == $this->config->setting('admin_controller') && is_readable(CORE_PATH . 'controllers/' . $this->controller_filename) && $this->controller_filename)
		{
			# File was found and has proper file permissions
			require_once CORE_PATH . 'controllers/' . $this->controller_filename;

			if (class_exists($this->controller_class))
			{
				# File found and class exists, so instantiate controller class
				$__instantiate_class = new $this->controller_class($this->core);

				if (method_exists($__instantiate_class, $action))
				{
					# Class method exists
					$__instantiate_class->$action();
				}
				else
				{
					# Valid controller, but invalid action
					$this->load->viewerror('errors/action', $this->controller_filename, $this->data, $this->route);
					$this->redirect('error/_404');
				}
			}
			else
			{
				# Controller file exists, but class name
				# is not formatted / spelled properly
				$this->redirect('error/_404');
				$this->data['controller-error'] = 'Controller file exists, but class name is not formatted / spelled properly';
				$this->load->viewerror('error/controller-bad-classname', $data);
			}
		}
		# First search for requested controller file in override directory
		elseif (is_readable(PUBLIC_OVERRIDE_PATH . 'controllers/' . $this->controller_filename) && $this->controller_filename)
		{
			# File was found and has proper file permissions
			require_once PUBLIC_OVERRIDE_PATH . 'controllers/' . $this->controller_filename;

			if (class_exists($this->controller_class))
			{
				# File found and class exists, so instantiate controller class
				$__instantiate_class = new $this->controller_class($this->core);

				if (method_exists($__instantiate_class, $action))
				{
					# Class method exists
					$__instantiate_class->$action();
				}
				else
				{
					# Valid controller, but invalid action
					$this->load->viewerror('errors/action', $this->controller_filename, $this->data, $this->route);
				}
			}
			else
			{
				# Controller file exists, but class name
				# is not formatted / spelled properly
				$this->redirect('error/_404');
				$this->data['controller-error'] = 'Controller file exists, but class name is not formatted / spelled properly';
				$this->load->viewerror('error/controller-bad-classname', $data);
			}
		}
		else
		{
			if (!file_exists($this->config->setting('controllers_path') . $this->controller_filename))
			{
				# Controller file does not exist, or
				# does not have read permissions
				if ($this->config->setting('debug_mode') === 'off' || $this->config->setting('debug_mode') === 'OFF')
				{
					$this->redirect('error/_404');
				}
				else
				{
					$this->template->assign('content', 'error/controller.tpl');
					$this->template->display('head.tpl');
					$this->template->display('error/controller.tpl');
					$this->template->display('footer.tpl');
					exit;
				}
			}

			# Search for requested controller file in public directory
			if (is_readable($this->config->setting('controllers_path') . $this->controller_filename) && $this->controller_filename)
			{
				# File was found and has proper file permissions
				require_once $this->config->setting('controllers_path') . $this->controller_filename;

				if (class_exists($this->controller_class))
				{
					# File found and class exists, so instantiate controller class
					$__instantiate_class = new $this->controller_class($this->core);
					if (method_exists($__instantiate_class, $action))
					{
						# Class method exists
						$__instantiate_class->$action();
					}
					else
					{
						# Valid controller, but invalid action
						if ($this->config->setting('debug_mode') === 'off' || $this->config->setting('debug_mode') === 'OFF')
						{
							$this->redirect('error/_404');
						}
						else
						{
							$this->template->assign('content', 'error/action.tpl');
						}
					}
				}
				else
				{
					# Controller file exists, but class name is not formatted / spelled properly
					if ($this->config->setting('debug_mode') === 'off' || $this->config->setting('debug_mode') === 'OFF')
					{
						$this->redirect('error/_404');
					}
					else
					{
						$this->template->assign('content', 'error/controller-bad-classname.tpl');
					}
				}
			}
			else
			{
				# Controller file does not exist, or
				# does not have read permissions
				if ($this->config->setting('debug_mode') === 'off' || $this->config->setting('debug_mode') === 'OFF')
				{
					$this->redirect('error/_404');
				}
				else
				{
					$this->template->assign('content', 'error/controller.tpl');
				}

			}
		}

	}

	public function model($model)
	{
		return $this->load->model("$model");
	}

	public function redirect($url)
	{
		if (strpos($url, 'http://'))
		{
			return header('Location: ' . $url);
		}
		elseif (strpos($url, 'https://'))
		{
			return header('Location: ' . $url);
		}
		else
		{
			return header('Location: ' . BASE_URL . $url);
		}
	}

	public function session()
	{
		return $this->toolbox('session');
	}

	public function toolbox($helper)
	{
		# Load a Toolbox helper
		return $this->toolbox["$helper"];
	}

}
