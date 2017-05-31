<?php
namespace Hal\Config;

class Config {

	public $setting = [];
	private $db;

	public function __construct($env) {

		# Database Connection
		$this->setting['db_host'] = $env->get_global_configuration('db_host');
		$this->setting['db_name'] = $env->get_global_configuration('db_name');
		$this->setting['db_user'] = $env->get_global_configuration('db_user');
		$this->setting['db_pass'] = $env->get_global_configuration('db_pass');

		$this->setting['default_controller'] = $env->get_global_configuration('default_controller');

		# Define the site name
		$this->setting['site_name'] = $env->get_global_configuration('site_name');

		# Does your website/company have a tagline or slogan?
		$this->setting['site_slogan'] = $env->get_global_configuration('site_slogan');

		# Customer service or support email address
		$this->setting['site_email'] = $env->get_global_configuration('site_email');

		# Site admin name
		$this->setting['site_admin'] = $env->get_global_configuration('site_admin');

		$this->setting['admin_controller'] = $env->get_global_configuration('admin_controller');

		# Address
		$this->setting['street_address'] = $env->get_global_configuration('street_address');
		$this->setting['city']           = $env->get_global_configuration('city');
		$this->setting['state']          = $env->get_global_configuration('state');
		$this->setting['zipcode']        = $env->get_global_configuration('zipcode');

		# Phone
		$this->setting['telephone'] = $env->get_global_configuration('telephone');

		# Time Zone
		$this->setting['time_zone'] = $env->get_global_configuration('time_zone');

		$this->setting['error_reports'] = $env->get_global_configuration('error_reports');

		$this->setting['debug_mode'] = $env->get_global_configuration('debug_mode');

		$this->setting['log_errors'] = $env->get_global_configuration('log_errors');

		# Controllers directory
		$this->setting['controllers_path'] = BASE_PATH.$env->get_global_configuration('controllers_path');

		# Models directory
		$this->setting['models_path'] = BASE_PATH.$env->get_global_configuration('models_path');

		$this->setting['log_file_max_size'] = $env->get_global_configuration('log_file_max_size');

		# Name of the directory storing template files ( css/js/img, etc. )
		$this->setting['template_name'] = $env->get_global_configuration('template_name');

		# Name of the directory storing template files for administration area of website( css/js/img, etc. )
		$this->setting['admin_template_name'] = $env->get_global_configuration('admin_template_name');

		# Enable / disable breadcrumb links
		$this->setting['breadcrumbs'] = $env->get_global_configuration('breadcrumbs');

		# Put site in maintenance mode
		$this->setting['maintenance_mode'] = $env->get_global_configuration('maintenance_mode');

		# Check for common issues preventing system from running
		$this->setting['system_startup_check'] = $env->get_global_configuration('system_startup_check');

		$this->setting['signup_email_confirmation'] = $env->get_global_configuration('signup_email_confirmation');

		$this->setting['compression'] = $env->get_global_configuration('compression');

		$this->setting['login_math'] = $env->get_global_configuration('login_math');

		# Image gallery settings
		$this->setting['total_img_allowed'] = $env->get_global_configuration('total_img_allowed');
		# Maximum allowed image file size in bytes ( 1000 is equal to 1kb; 1000000 is equal to 1 MB )
		$this->setting['img_file_size'] = $env->get_global_configuration('img_file_size');
		# Maximum image height in pixels. Set to zero for unlimited
		$this->setting['img_height'] = $env->get_global_configuration('img_height');
		# Maximum image width in pixels. Set to zero for unlimited
		$this->setting['img_width'] = $env->get_global_configuration('img_width');
		# Allowed image types
		$this->setting['img_type'] = $env->get_global_configuration('img_type');

		/*----------------------------------------
		 * Global messenger inbox settings
		 */
		# Enable the messenger system by setting this to true
		$this->setting['inbox_enabled'] = $env->get_global_configuration('inbox_enabled');

		# Max number of saved messages in inbox
		$this->setting['inbox_limit'] = $env->get_global_configuration('inbox_limit');

		# Allow email addresses to be sent in messages?
		$this->setting['inbox_allow_email'] = $env->get_global_configuration('inbox_allow_email');

		# Allow URLs to be sent in messages?
		$this->setting['inbox_allow_url'] = $env->get_global_configuration('inbox_allow_url');

		# Allow links to be sent in messages?
		$this->setting['inbox_allow_link'] = $env->get_global_configuration('inbox_allow_link');

		# Allow images to be sent in messages?
		$this->setting['inbox_allow_image'] = $env->get_global_configuration('inbox_allow_image');

		# Allow HTML formatting ( <strong>, <em>, <h1>, etc. ) to be sent in messages?
		$this->setting['inbox_allow_formatting'] = $env->get_global_configuration('inbox_allow_formatting');

		$this->setting['site_url'] = $env->get_global_configuration('site_url');

		#== Global system settings ==#

		# Location of front controller
		$this->setting['BASE_PATH'] = BASE_PATH;

		# Location of the system directory
		$this->setting['system_folder'] = $this->setting['BASE_PATH'].'app/code/core/system/';

		# Location of the public directory
		$this->setting['public_folder'] = $this->setting['BASE_PATH'].'public/';

		# Location of template directory
		$this->setting['template_folder'] = $this->setting['BASE_PATH'].'app/design/frontend/'.$this->setting['template_name'].'/';

		# Location of admin template directory
		$this->setting['admin_template_folder'] = $this->setting['BASE_PATH'].'app/design/admin/'.$this->setting['template_name'].'/';

		# Template URL for fetching CSS / JS / IMG files
		$this->setting['template_url'] = $this->setting['site_url'].'app/design/frontend/'.$this->setting['template_name'].'/';

		# Admin Template URL for fetching CSS / JS / IMG files
		$this->setting['admin_template_url'] = $this->setting['site_url'].'app/design/admin/'.$this->setting['admin_template_name'].'/';

		# Convert image file size setting to kb
		$this->setting['img_size']        = $this->setting['img_file_size']*1024;
		$size                             = $this->setting['img_size'];
		$unit                             = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];
		$this->setting['notify_img_size'] = number_format(round($size/pow(1024, ($i = floor(log($size, 1024)))), 2)).' '.$unit[$i];

		# Enable / disable Memcached helper
		if (extension_loaded('memcached')) {
			$this->setting['memcached'] = TRUE;
		} else {
			$this->setting['memcached'] = FALSE;
		}

		# Measure script execution time
		$this->setting['execution_time'] = (microtime(true)-$_SERVER["REQUEST_TIME_FLOAT"]);

		# Release version
		$this->setting['software_version'] = '1.0.0';
	}

	public final function setting($setting = null) {
		return $this->setting["$setting"];
	}

	/**
	 * Private clone method to prevent cloning of the instance
	 *
	 * @return void
	 */
	private function __clone() {
	}

	/**
	 * Private unserialize method to prevent unserializing
	 *
	 * @return void
	 */
	private function __wakeup() {
	}
}
