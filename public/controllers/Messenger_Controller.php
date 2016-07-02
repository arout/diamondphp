<?php

class Messenger_Controller extends Hal\Core\SystemController {

	# for the check_new() method
	public $new_message = [];

	public function index() {

		/*-------------------------
		 * Show entire inbox
		------------------------*/
		if ($this->session->get('email') == FALSE) {
			$this->redirect('login');
		}

		$data['inbox_limit']  = $this->toolbox('messenger')->max_limit();
		$data['all_messages'] = $this->toolbox('messenger')->view_all();
		if ($data['all_messages'] !== FALSE) {
			$this->load->view('messenger/view_all_messages', $data);
		} else {
			$this->load->view('messenger/inbox', $data);
		}

	}

	public function send() {

		/*-------------------------
		 * Send a message to a user
		------------------------*/
		if ($this->session->get('email') == FALSE) {
			$this->redirect('login');
		}

		$data['recipient']      = $this->route->param1;
		$data['recipient_info'] = $this->model('Member')->profile_data($data['recipient']);
		$data['history']        = $this->toolbox('messenger')->view_message_history($data['recipient']);

		$this->load->view('messenger/send', $data);
	}

	public function unread() {

		/*-------------------------
		 * Display unread messages
		------------------------*/
		if ($this->session->get('email') == FALSE) {
			$this->redirect('login');
		}

		$data['mail'] = $this->toolbox('messenger')->view_unread();

		if ($data['mail']) {
			$this->load->view('messenger/unread', $data);
		} else {
			$this->load->view('messenger/notfound', $data);
		}

	}

	public function view() {

		/*-------------------------
		 * Display selected message
		------------------------*/
		if ($this->session->get('email') == FALSE) {
			$this->redirect('login');
		}

		$data['mail'] = $this->toolbox('messenger')->view();

		if ($data['mail']) {
			$this->load->view('messenger/view', $data);
		} else {
			$this->load->view('messenger/notfound', $data);
		}

	}

	/*-----------------------------------------------------------
	 *  Icon table toggle functions
	 *---------------------------------------------------------*/
	public function flag_important() {

		// Toggle flag message as important / normal
		$this->toolbox('messenger')->toggle_star($_POST['mid']);
	}

	public function flag_read() {

		// Toggle flag message as read / unread
		$this->toolbox('messenger')->toggle_read($_POST['mid']);
	}

	public function total() {

		return $this->toolbox('messenger')->count_all();
	}

	public function total_unread() {

		return $this->toolbox('messenger')->count_unread();
	}
	/*-----------------------------------------------------------
	 *  End icon table toggle functions
	 *---------------------------------------------------------*/

	/*-----------------------------------------------------------
	 *  Check for new messages
	 *  Do not access directly; this is for AJAX notifications
	 *---------------------------------------------------------*/
	public function check_new() {

		$this->load->view('messenger/index');
	}
}
