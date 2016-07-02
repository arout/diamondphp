<?php
namespace Hal\Module;

class Slider {

	// Loader
	private $load;
	public $slider;
	public $route;

	public function __construct($c) {

		$this->load  = $c['load'];
		$this->route = $c['router'];
	}

	public function load($sliders) {

		$controller = strtolower(str_replace('_Controller', '', $this->route->controller));
		$action     = $this->route->action;

		foreach ($sliders as $page => $slider) {
			# $page is the controller/action, $slider the slider to load
			if ($page == $controller . '/' . $action) {
				return $this->load->view("sliders/{$slider}");
			}
		}

	}

	/*public function get() {

return $this->sliders;

}

public function destroy($slider) {

\Hal\Core\Registry::delete($slider);

}

public function display($slider) {

if (\Hal\Core\Registry::registered('slider') === FALSE) {
\Hal\Core\Registry::register('slider', $slider);
return $this->slider = $slider;
}
}*/
}