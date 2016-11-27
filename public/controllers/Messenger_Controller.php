<?php

class Messenger_Controller extends Hal\Controller\Base_Controller
{
	# for the check_new() method
	public $new_message = [];

	public function __construct($app)
	{
		parent::__construct($app);

		if ($this->session->get('email') == FALSE)
		{
			return $this->redirect('login');
		}

	}

	public function __toString()
	{
		return 'Messenger_Controller';
	}

	public function index()
	{
		# Show entire inbox
		$data['inbox_limit']  = $this->toolbox('messenger')->max_limit();
		$data['all_messages'] = $this->toolbox('messenger')->view_all();

		if ($data['all_messages'] !== FALSE)
		{
			$this->load->view('messenger/view_all_messages', $data);
		}
		else
		{
			$this->load->view('messenger/inbox', $data);
		}

	}

	/*-----------------------------------------------------------
		     *  Check for new messages
		     *  Do not access directly; this is for AJAX notifications
	*/
	public function check_new()
	{
		$this->load->view('messenger/index');
	}

	public function send()
	{
		# Send a message to a user
		$data['recipient']      = $this->route->param1;
		$data['recipient_info'] = $this->model('Member')->profile_data($data['recipient']);
		$data['history']        = $this->toolbox('messenger')->view_message_history($data['recipient']);
		foreach ($data['history'] as $prev => $v)
		{
			$date[] = $this->toolbox('formatter')->datetime($prev);
		}
		$this->template->assign('recipient', $data['recipient']);
		$this->template->assign('recipient_info', $data['recipient_info']);
		$this->template->assign('history', $data['history']);
		$this->template->assign('history', $date);
		$this->template->assign('content', 'messenger/send.tpl');
	}

	public function unread()
	{
		# Display unread messages
		$data['mail'] = $this->toolbox('messenger')->view_unread();

		if ($data['mail'])
		{
			$this->load->view('messenger/unread', $data);
		}
		else
		{
			$this->load->view('messenger/notfound', $data);
		}

	}

	public function view()
	{
		# Display selected message
		$data['mail'] = $this->toolbox('messenger')->view();

		if ($data['mail'])
		{
			$this->load->view('messenger/view', $data);
		}
		else
		{
			$this->load->view('messenger/notfound', $data);
		}

	}

	#  Icon table toggle functions
	public function flag_important()
	{
		# Toggle flag message as important / normal
		$this->toolbox('messenger')->toggle_star($_POST['mid']);
	}

	public function flag_read()
	{
		# Toggle flag message as read / unread
		$this->toolbox('messenger')->toggle_read($_POST['mid']);
	}

	public function total()
	{
		return $this->toolbox('messenger')->count_all();
	}

	public function total_unread()
	{
		return $this->toolbox('messenger')->count_unread();
	}

	public static function all()
	{
		return $this->toolbox('messenger')->count_all();
	}

}
