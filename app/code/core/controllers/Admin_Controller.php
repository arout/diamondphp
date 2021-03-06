<?php

class Admin_Controller extends Hal\Controller\Base_Controller
{
	public function __construct($app)
	{
		parent::__construct($app);

		$this->session->set('login_attempts', 0);
		if ((!$this->session->get('admin_username') || $this->session->get('role') != 'admin') && $this->route->action != 'login' &&
			$this->session->get('login_attempts') < 1 && !isset($_POST))
		{
			$this->redirect('admin/login');
			exit;
		}
		$this->template->assign('admin_username', $this->session->get('admin_username'));
		$this->template->assign('admin_img', $this->session->get('admin_img'));
		$this->template->assign('site_name', $this->config->setting('site_name'));
		// var_dump($this->toolbox('geoip')); exit;
	}

	public function index()
	{
		return $this->home();
	}

	public function cms()
	{
		$data['session_username'] = $this->session->get('username');
		$this->view('admin/index', $data);
	}

	public function home()
	{
		$format     = $this->toolbox('formatter');
		$past_month = time() - 2592000;
		$this->template->assign('female_members', $format->int_format($this->model('Admin')->count_where('users', 'gender', '=', 'female')));
		$this->template->assign('male_members', $format->int_format($this->model('Admin')->count_where('users', 'gender', '=', 'male')));
		$this->template->assign('recent_members', $format->int_format($this->model('Admin')->count_where('users', 'registration_date', '>', $past_month)));
		$this->template->assign('total_members', $format->int_format($this->model('Admin')->count('users')));
		return $this->template->assign('content', 'index.tpl');
	}

	public function login()
	{
		$data['a']      = rand(1, 5);
		$data['b']      = rand(1, 5);
		$data['answer'] = $data['a'] * $data['b'];
		$data['route']  = $this->route->param2;
		$data['uri']    = $_SERVER['REQUEST_URI'];
		$login_math     = $this->toolbox('config')->setting['login_math'];

		$this->template->assign('a', $data['a']);
		$this->template->assign('b', $data['b']);
		$this->template->assign('answer', $data['answer']);
		$this->template->assign('route', $data['route']);
		$this->template->assign('login_math', $login_math);
		$this->template->assign('uri', $data['uri']);
		$this->template->assign('content', 'forms/login_form.tpl');
	}

	public function logout()
	{
		$this->session->flush();
		$this->redirect('admin/index');
	}

	public function login_validate_math($data)
	{

		$data['a'] = rand(1, 5);
		$data['b'] = rand(1, 5);

		$response = (int) $data['math'];
		$answer   = (int) $data['math_answer'];

		if ($response !== $answer)
		{
			// Did not pass validation -- Show errors
			return false;
		}
		return true;
	}

	public function login_validate()
	{
		// Begin form validation by sanitizing all $_POST submitted
		$data = $this->toolbox('sanitize')->xss($_POST);

		if ($this->config->setting['login_math'] === TRUE)
		{
			$this->login_validate_math($data);
			$data['math_error_response'] = '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Math answer is incorrect<br></div>';
		}

		if ($this->config->setting['login_math'] === TRUE && $this->login_validate_math($data) === FALSE)
		{
			$this->redirect('admin/login/index/error_math');
		}

		if ($this->config->setting['login_math'] === FALSE || ($this->config->setting['login_math'] === TRUE && $this->login_validate_math($data) !== FALSE))
		{
			// Now we can check the submitted form to see if it is filled out properly
			$check_if_valid = $this->toolbox('validate')->form($data, array(

				'username' => 'required|min_len,5',
				'password' => 'required|max_len,100|min_len,6',
			));

			if ($check_if_valid === FALSE)
			{

				// Did not pass form validation -- Show errors
				echo '<div class="alert alert-danger">';
				foreach ($check_if_valid as $invalid)
				{
					echo '<i class="fa fa-exclamation-triangle"></i> ' . $invalid . '<br>';
				}
				echo '</div>';
				$this->template->assign('content', 'forms/login_form.tpl');

			}
			else
			{
				// Form is valid -- continue to login query
				$result = $this->model('Admin')->check_login($data);

				if ($result)
				{
					// Valid login
					$this->redirect('admin/home');
				}
				else
				{
					// Invalid login -- redirect to login error page
					$this->redirect('admin/login/index/error');
				}
			}
		}

	}
}