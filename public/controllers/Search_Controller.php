<?php

class Search_Controller extends Hal\Controller\Base_Controller
{

	// public function __construct($app) {
	// 	parent::__construct($app);
	// }
	public $type;

	public function index()
	{
		$this->template->assign('content', 'search/index.tpl');
	}

	public function results()
	{
		# Search request submitted by user
		$search_query = $_POST['search-query'];

		# Search members / profiles
		$members = $this->model('Member')->select_from_users_results($search_query);
		// var_dump($members);
		$this->template->assign('user', $members);

		$this->template->assign('content', 'search/results.tpl');
	}

}