<?php

class Friends_Controller extends Hal\Core\SystemController {

	public function __construct($container) {

		parent::__construct($container);

		if ($this->session->get('email') === FALSE) {
			$this->redirect('login');
			exit;
		}
	}

	public function index() {

		$data['friends'] = $this->toolbox('friends')->view_friends();
		$this->load->view('friends/index', $data);
	}

	public function accept() {

		if ($this->session->get('email') == FALSE) {
			$this->redirect('login');
			exit;
		}

		$data['add'] = $this->route->param1;
		$this->load->view('friends/accept', $data);
	}

	public function request($request = NULL) {
		/**
		 * This method will be used to friend requests
		 * from several different sources ( forms, other URLs, etc )
		 * When being sent from another URL, it will pass the $request
		 * parameter here, so check for that first.
		 * Note that $request passed to toolbox helper below can be
		 * either a single member id or an array of member id's
		 */
		if (!is_null($request)) {
			$data['friends'] = $request;
			$this->toolbox('friends')->send_request($request);
			$this->request_sent($data['friends']);
		} elseif ($_POST) {
			$data['friends'] = $_POST;
			$this->toolbox('friends')->send_request($_POST);
			$this->request_sent($data['friends']);
		} elseif (isset($this->route->param1) && !empty($this->route->param1)) {
			$data['friends'] = $this->route->param1;
			$userid          = $this->model('Member')->get_member_id($this->route->param1);
			$this->toolbox('friends')->send_request($userid);
			$this->request_sent($data['friends']);
		} else {
			$this->index();
		}
	}

	public function request_sent($requests) {

		$data['friends'] = $requests;
		$this->load->view('friends/request_sent', $data);
	}

}