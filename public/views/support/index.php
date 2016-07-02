<?php
$_app           = new \Pimple\Container();
$_app['router'] = function ($c) {
	return @new Hal\Core\Router;
};
if (isset($_app['router']->param1)) {
	$this->view("support/docs/" . $_app['router']->param1);
} else {
	$this->view("support/toc");
}
