<?php
declare(strict_types=1);
namespace Web\Controller;
use Hal\Controller\Base_Controller;

class Documentation_Controller extends Base_Controller
{
	public function __construct($app)
	{
		parent::__construct($app);
		$this->template->assign('sidebar', 'docs/toc.tpl');
		$this->template->assign('content', 'docs/toc.tpl');
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
			$this->template->assign('content', 'docs/mvc/controllers.tpl');
			break;
		case "models":
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
			$this->template->assign('content', 'docs/modules/sanitize.tpl');
			break;
		case "user-agent":
			$this->template->assign('content', 'docs/modules/user-agent.tpl');
			break;
		case "validation":
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