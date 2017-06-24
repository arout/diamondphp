<?php
namespace Web\Controller;
use Hal\Controller\Base_Controller;

class Documentation_Controller extends Base_Controller
{
	public function __construct($app)
	{
		parent::__construct($app);
		$this->template->assign('sidebar', 'docs/toc.tpl');
		$this->template->assign('content', 'docs/toc.tpl');
		$this->template->assign('layout', 'docs/layout.tpl');
		$this->template->assign('layout_close', 'docs/layout_close.tpl');
	}

	public function index()
	{
		$data['load']  = $this->load;
		$data['route'] = $this->route;

		return $this->template->assign('content', 'docs/index.tpl');
	}

	public function introduction()
	{
		$data['load']  = $this->load;
		$data['route'] = $this->route;
		$page          = $data['route']->param1;
		switch ($page)
		{
		case "requirements":
			$this->template->assign('content', 'docs/introduction/requirements.tpl');
			break;
		case "install":
			$this->template->assign('content', 'docs/introduction/install.tpl');
			break;
		case "configuration":
			$this->template->assign('content', 'docs/introduction/configuration.tpl');
			break;

		default:
			return $this->template->assign('content', 'docs/index.tpl');
		}
	}

	public function mvc()
	{
		$data['load']  = $this->load;
		$data['route'] = $this->route;
		$page          = $data['route']->param1;
		switch ($page)
		{
		case "controllers":
			$this->template->assign('title', 'Controllers');
			$this->template->assign('subtitle', 'Creating Controllers');
			$this->template->assign('use_it', '');
			$this->template->assign('icon', 'flag');
			$this->template->assign('lead', "The controller's job is to handle data that the user inputs or submits, and update the model accordingly. The controller’s life blood is the user; without user interactions, the controller has no purpose. It is the only part of the pattern the user should be interacting with.");
			$this->template->assign('content', 'docs/mvc/controllers.tpl');
			break;
		case "models":
			$this->template->assign('title', 'Models');
			$this->template->assign('subtitle', 'Creating Models');
			$this->template->assign('use_it', 'Use it: <code>$this->model(\'Example\');</code>');
			$this->template->assign('icon', 'database');
			$this->template->assign('lead', "Models interact directly with your database. The model will perform your sql query and return the result, from which your controllers and views can then access the data.");
			$this->template->assign('content', 'docs/mvc/models.tpl');
			break;
		case "views":
			$this->template->assign('content', 'docs/mvc/views.tpl');
			break;

		default:
			return $this->template->assign('content', 'docs/index.tpl');
		}
	}

	public function core()
	{
		$data['load']  = $this->load;
		$data['route'] = $this->route;
		$page          = $data['route']->param1;
		switch ($page)
		{
		case "cron":
			$this->template->assign('content', 'docs/core/cron.tpl');
			break;
		case "database":
			$this->template->assign('content', 'docs/core/database.tpl');
			break;
		case "events":
			$this->template->assign('content', 'docs/core/events.tpl');
			break;
		case "router":
			$this->template->assign('title', 'Router');
			$this->template->assign('subtitle', 'Working with the Router');
			$this->template->assign('use_it', 'Use it: <code>$this->route(<samp>parameter</samp>);</code>');
			$this->template->assign('icon', 'share-alt');
			$this->template->assign('lead', "The Router class fetches the HTTP request and dynamically maps URLs to the corresponding controller.");
			$this->template->assign('content', 'docs/core/router.tpl');
			break;
		case "sessions":
			$this->template->assign('content', 'docs/core/sessions.tpl');
			break;
		case "blocks":
			$this->template->assign('content', 'docs/core/blocks.tpl');
			break;
		case "override":
			$this->template->assign('content', 'docs/core/override.tpl');
			break;
		case "logger":
			$this->template->assign('content', 'docs/core/logger.tpl');
			break;
		case "loader":
			$this->template->assign('content', 'docs/core/loader.tpl');
			break;

		default:
			return $this->template->assign('content', 'docs/index.tpl');
		}
	}

	public function modules()
	{
		$data['load']  = $this->load;
		$data['route'] = $this->route;
		$page          = $data['route']->param1;
		switch ($page)
		{
		case "breadcrumbs":
			$this->template->assign('content', 'docs/modules/breadcrumbs.tpl');
			break;
		case "formatter":
			$this->template->assign('content', 'docs/modules/formatter.tpl');
			break;
		case "friends":
			$this->template->assign('content', 'docs/modules/friends.tpl');
			break;
		case "geoip":
			$this->template->assign('content', 'docs/modules/geoip.tpl');
			break;
		case "hash":
			$this->template->assign('title', 'Encryption Helper');
			$this->template->assign('subtitle', 'Password Encryption');
			$this->template->assign('use_it', 'Use it: <code>$this->toolbox(\'hash\');</code>');
			$this->template->assign('icon', 'user-secret');
			$this->template->assign('lead', "The Encryption helper uses PHP's built-in password_hash() function to encrypt and salt important data.");
			$this->template->assign('content', 'docs/modules/hash.tpl');
			break;
		case "images":
			$this->template->assign('content', 'docs/modules/images.tpl');
			break;
		case "messenger":
			$this->template->assign('content', 'docs/modules/messenger.tpl');
			break;
		case "titles":
			$this->template->assign('content', 'docs/modules/titles.tpl');
			break;
		case "pagination":
			$this->template->assign('content', 'docs/modules/pagination.tpl');
			break;
		case "sanitize":
			$this->template->assign('title', 'Data Sanitize Helper');
			$this->template->assign('subtitle', 'Data Sanitization');
			$this->template->assign('use_it', 'Use it: <code>$this->toolbox(\'sanitize\');</code>');
			$this->template->assign('icon', 'medkit');
			$this->template->assign('lead', "The Sanitize helper is used to enable/disable the submission of HTML tags in GET and POST data. Use the Sanitize helper in addition to the Validation helper when you want to customize the data processing of forms.");
			$this->template->assign('content', 'docs/modules/sanitize.tpl');
			break;
		case "user-agent":
			$this->template->assign('content', 'docs/modules/user-agent.tpl');
			break;
		case "validation":
			$this->template->assign('title', 'Validation Helper');
			$this->template->assign('subtitle', 'Form Validation');
			$this->template->assign('use_it', 'Use it: <code>$this->toolbox(\'validate\');</code>');
			$this->template->assign('icon', 'check');
			$this->template->assign('lead', "The Validation helper is used to validate forms. It is recommended, but not required, to use this in conjuction with the JS form validation.");
			$this->template->assign('content', 'docs/modules/validation.tpl');
			break;
		case "ckeditor":
			$this->template->assign('content', 'docs/modules/ckeditor.tpl');
			break;
		case "gritter":
			$this->template->assign('content', 'docs/modules/gritter.tpl');
			break;
		case "mobile":
			$this->template->assign('content', 'docs/modules/mobile.tpl');
			break;
		case "phpword":
			$this->template->assign('content', 'docs/modules/phpword.tpl');
			break;

		default:
			return $this->template->assign('content', 'docs/modules/overview.tpl');
		}
	}

	public function docs()
	{
		$this->index();
	}

	public function faq()
	{
		$data['load']  = $this->load;
		$data['route'] = $this->route;
		$this->template->assign('content', 'docs/faq.tpl');
	}

	public function license()
	{

		$this->template->assign('content', 'docs/license.tpl');
	}

}
