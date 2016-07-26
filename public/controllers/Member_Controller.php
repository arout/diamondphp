<?php

class Member_Controller extends Hal\Controller\Base_Controller 
{

	public function __construct($container) 
	{
		parent::__construct($container);

		if ($this->session->get('email') === FALSE && 
		    $this->route->action != 'signup' && 
		    $this->route->action != 'register' && 
		    $this->route->action != 'password_reset') {
			$this->redirect('login');
			exit;
		}
	}

	public function __toString()
	{
		return 'Member_Controller';
	}

	public function index() 
	{
		$data['session_username'] = $this->toolbox('session')->get('username');
		$this->load->view('member/index', $data);
	}
    
    public function password_reset() 
    {
		$this->load->view('forms/password_reset');
	}
	
	public function change_password() 
	{
		if ($_POST) 
		{
			$password = $_POST['password'];
			$cpassword = $_POST['confirm_password'];
			if ($password !== $cpassword)
				return FALSE;
			
			$this->model('Member')->update_password($password, $this->toolbox('session')->get('email'));
			$data['status'] = '<div class="alert alert-success text-center">Password successfully updated</div>';
			$this->load->view('forms/change_password', $data);
		} 
		else {
			$this->load->view('forms/change_password');
		}
	}

	public function edit() 
	{
		$this->toolbox('image')->get_images();
		# Display edit profile page
		if (! empty($_POST['edit_profile']))
		{
			if ($this->model('Member')->update_profile_data())
				$data['saved'] = '<div class="alert alert-success text-center"><i class="fa fa-check"></i> Profile settings saved</div>';
			else
				$data['saved'] = '<div class="alert alert-danger text-center"><i class="fa fa-ban"></i> There was a problem saving your profile information</div>';
		}

		if (! empty($_POST['edit_avatar']))
		{
			$upload = $this->toolbox('image')->upload();

			if ( ! $upload ) 
				$data['saved'] = '<div class="alert alert-danger text-center"><i class="fa fa-ban"></i> There was a problem saving your profile image</div>';
		}

		$data['username'] = $this->session->get('username');
		$data['profile'] = $this->model('Member')->profile_data($this->session->get('username'));
		$this->load->view('member/edit', $data);
	}

	public function home() 
	{
		$data['session_username'] = $this->toolbox('session')->get('username');
		$data['day'] = ['Monday', 'Tuesday', 'Wednesday'];
		$data['users'] = $this->model('Member')->select();
		// $this->load->file( 'maintenance.php' );
		$this->load->view('member/index', $data);
	}

	public function profile() 
	{
		if (empty($this->route->param1) || $this->route->param1 === $this->session->get('username') || !isset($this->route->param1) || $this->route->param1 == 'edit')
			$this->edit();
		else
			$this->view();
	}

	public function view() 
	{
		$data['username'] = urldecode($this->route->param1);
		$data['profile'] = $this->model('Member')->profile_data($data['username']);
		$data['img_gallery'] = $this->model('Member')->img_gallery($data['member_id']);

		if (empty($data['username']) || $data['username'] === $this->session->get('username'))
			$this->edit();
		elseif ($data['username'] == 'all')
			$this->load->view('member/all', $data);
		else 
			$this->load->view('member/view', $data);
	}

	public function all() 
	{
		// $data['avatar'] = $this->model('Member')->get_avatar();
		// $data['images'] = $this->model('Member')->get_images();
		$limit = $this->route->param1;

		$query = "SELECT * FROM users WHERE hidden = 0";
		$data['pager'] = $this->toolbox('pagination');
		$data['pager']->config( $query, $this->route->param1, 20 );
		$data['profiles'] = $this->model('Member')->select($limit);
		$this->load->view('member/all', $data);
	}

}