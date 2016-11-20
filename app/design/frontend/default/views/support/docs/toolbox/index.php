<?php
$_app           = new \Pimple\Container();
$_app['router'] = function ($c) {
	return @new Hal\Core\Router;
};

if ($_app['router']->action === 'toolbox') {

	if ($_app['router']->param2) {
		$this->view("support/docs/toolbox/" . $_app['router']->param2, $data = NULL);
	} else {
		$this->view("support/docs/toolbox/" . $_app['router']->param1, $data = NULL);
	}

} else {
	$this->view("support/docs/" . $_app['router']->param1, $data = NULL);
}