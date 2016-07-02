<?php
namespace Hal\Core;

class Parse {

	public $core = [];
	public $config;

	public function __construct($core) {

		$this->config             = $core['config'];
		$this->core['controller'] = $core['base_controller'];
		$this->core['db']         = $core['database'];
		$this->core['load']       = $core['load'];
		$this->core['log']        = $core['log'];
		$this->core['model']      = $core['system_model'];
		$this->core['router']     = $core['router'];
		$this->core['template']   = $core['template'];
		$this->core['toolbox']    = $core['toolbox'];

		$this->remove_magic_quotes();
		$this->unregister_globals();

	}

	public function set_reporting() {

		/*
		 * Set Error Reporting environment here.
		 * Default options are essentially "ON / OFF". We will display all errors / notices
		 * to help us along during the development,
		 * but be sure to set error reporting to FALSE in a live environment.
		 *
		 */
		$level = $this->config->setting('error_reports') ?? 'off';
		if ($level === 'on') {
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
			ini_set('error_reporting', E_ALL);
		} else {
			error_reporting(0);
			ini_set('display_errors', 0);
		}
	}

	private function strip_slashes_deep($value) {
		$value = is_array($value) ? array_map(array($this, 'strip_slashes_deep'), $value) : stripslashes($value);
		return $value;
	}

	private function remove_magic_quotes() {

		if (get_magic_quotes_gpc()) {
			$_GET    = $this->strip_slashes_deep($_GET);
			$_POST   = $this->strip_slashes_deep($_POST);
			$_COOKIE = $this->strip_slashes_deep($_COOKIE);
		}
	}

	private function unregister_globals() {
		if (ini_get('register_globals')) {
			$array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
			foreach ($array as $value) {
				foreach ($GLOBALS[$value] as $key => $var) {
					if ($var === $GLOBALS[$key]) {
						unset($GLOBALS[$key]);
					}
				}
			}
		}
	}

	public function show_view_files($status = 'disabled') {

		if ($status !== 'disabled') {
			$views = Loader;
		}

	}
}