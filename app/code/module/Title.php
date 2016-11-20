<?php
namespace Hal\Module;

class Title
{
	private $route;
	public $controller;
	public $action;
	public $title;
	public $default_title;

	public function __construct($c)
	{
		$this->route         = $c['router'];
		$this->controller    = $this->route->controller;
		$this->action        = $this->route->action;
		$this->default_title = (!empty($c['config']->setting['site_slogan']) ? $c['config']->setting['site_slogan'] : $c['config']->setting['site_name']);
	}

	public function get()
	{
		return $this->title;
	}

	public function set(Array $titles)
	{
		foreach ($titles as $controller => $title)
		{
			if (in_array($controller, [$this->controller]))
			{
				if (!is_null($this->action) && isset($title[$this->action]) && !empty($this->action))
				{
					return $this->title = $title[$this->action];
					exit;
				}
				else
				{
					return $this->title = $this->default_title;
					exit;
				}
			}
			continue;
		}
		return $this->title = $this->default_title;
	}

}
