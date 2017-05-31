<?php
namespace Web\Controller;
use Hal\Controller\Base_Controller;

class Search_Controller extends Base_Controller
{
	public $type;

	public function index()
	{
		$this->template->assign('content', 'search/index.tpl');
	}

	public function results()
	{
		# Search request submitted by user
		$search_query = $this->toolbox('sanitize')->xss($_POST['search-query']);
		$response = 'success';
		
		if( strlen($search_query) < 4 )
			$response = 'query_too_short';

		# Search members / profiles
		$members = $this->model('Member')->select_from_users_results($search_query);
		// var_dump($members);
		$this->template->assign('search_term', $search_query);
		$this->template->assign('response', $response);
		$this->template->assign('user', $members);
		$this->template->assign('content', 'search/results.tpl');
	}

}
