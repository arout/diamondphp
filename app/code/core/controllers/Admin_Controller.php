<?php

class Admin_Controller extends Hal\Controller\Base_Controller
{
	public function __construct($app)
	{
		parent::__construct($app);

		if( $this->session->get('username') == FALSE || $this->session->get('role') != 'admin' )
		{
			$this->redirect('admin/login');
			exit;
		}
		// var_dump($this->toolbox('geoip')); exit;	
	}

	public function index()
	{
		$data['city'] = $this->toolbox('geoip')->city;
		$data['state'] = $this->toolbox('geoip')->state;
		$data['state_code'] = $this->toolbox('geoip')->state_code;
		$data['zipcode'] = $this->toolbox('geoip')->ip_address;
		$data['country'] = $this->toolbox('geoip')->country; //Two digit country code
		$data['admin_username'] = $this->session->get('username');
		$this->load->view('admin/index', $data);
	}
	
	public function cms()
	{
		$data['session_username'] = $this->cache()->get('username');
		$this->view('admin/index', $data);
	}

	public function home()
	{
		$data['session_username'] = $this->cache()->get('username');
		$this->view('admin/index', $data);
	}
	
	public function login()
	{
		$data['a']      = rand(1, 5);
		$data['b']      = rand(1, 5);
		$data['answer'] = $data['a'] * $data['b'];
		$this->view('admin/forms/login_form', $data);
	}
	
	public function logout()
	{
		$this->cache->flush();
		$this->redirect('admin/index');
	}
	
	public function login_validate()
	{
		# Begin form validation by sanitizing all $_POST submitted
		$form = $this->input->sanitize->form($_POST);
		
		# Math problem not solved correctly, no need to continue
		if($form['math'] !== $form['math_answer'])
		{
			$this->redirect('admin/login/error');
			exit;
		}
		# Now we can check the submitted form to see if it is filled out properly
		$check_if_valid = $this->input->validate->form($form, array(
			'username' => 'required|alpha_numeric',
			'password' => 'required|max_len,100|min_len,6'
		));
		
		if($check_if_valid == TRUE)
		{
			# Form is valid -- continue to login query
			if($this->model('Member')->check_login($form))
			# Valid login
			{
				$this->redirect('admin/home');
			}
			else
			{
				# Invalid login -- redirect to login error page
				$this->redirect('admin/login/error');
			}
		}
		else
		{
			# Did not pass validation -- Show errors
			echo '<div class="alert alert-danger">';
			foreach($check_if_valid as $invalid)
				echo '<i class="fa fa-exclamation-triangle"></i> ' . $invalid . '<br>';
			echo '</div>';
			$this->view('admin/forms/login_form', $data = NULL);
		}
		
	}
}