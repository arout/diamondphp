<?php
declare(strict_types=1);
namespace Web\Controller;
use Hal\Controller\Base_Controller;

class Home_Controller extends Base_Controller
{
	/**
	 * [__construct description]
	 * @param [object] $app [Instance of Pimple]
	 *
	 * Often, an individual controller will need a constructor.
	 * Below is an example of creating the __construct() for a
	 * given controller.
	 * The $app variable must be passed to the construct method,
	 * and again to the parent::__construct() method call
	 */
	public function __construct($app)
	{
		parent::__construct($app);
	}

	public function __toString()
	{
		return "Home_Controller";
	}

	public function index()
	{
		$limit = rand(2, 1250);

		$query = "SELECT * FROM users WHERE hidden = 0";
		$data['pager'] = $this->toolbox('pagination');
		$data['pager']->config( $query, $this->route->param1, 20 );
		$data['pagination_links'] = $data['pager']->paginate(3);
		$data['profiles'] = $this->model('Member')->select($limit);
		$this->template->assign('data', $data);
		$this->template->assign('content', 'home/index.tpl');
	}

}
