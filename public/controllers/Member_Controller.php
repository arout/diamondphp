<?php
namespace Web\Controller;
use Hal\Controller\Base_Controller;

class Member_Controller extends Base_Controller
{

	public function __construct($container)
	{
		parent::__construct($container);

		if ($this->session->get('email') === FALSE &&
			$this->route->action != 'signup' &&
			$this->route->action != 'register' &&
			$this->route->action != 'password_reset')
		{
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
		$userid = $this->session->get('member_id');
		$search_prefs_completed = $this->model("Member")->search_prefs_completed($userid);
		if (!$search_prefs_completed)
		{
			$this->template->assign('content', 'forms/search_prefs.tpl');
		}
		else
		{
			$this->template->assign('content', 'member/index.tpl');
		}

	}

	public function home()
	{
		return self::index();
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
			{
				return FALSE;
			}

			if ($this->model('Member')->update_password($password, $this->toolbox('session')->get('email')))
			{
				$data['saved'] = 'Password successfully updated';
				$data['saved_message'] = 'To keep your account secure, it is recommended to change your passwords at least every 90 days, and create a unique password for different sites.';
				$data['data_saved_btn'] = '<a href="#" data-dismiss="alert" class="btn btn-dark btn-sm">Close</a>';
			}
			else
			{
				$data['saved'] = 'Problem updating password';
				$data['saved_message'] = 'There was a problem saving your password. Please make sure that your passwords match, and do not contain any illegal characters.';
				$data['data_saved_btn'] = '<a href="#" data-dismiss="alert" class="btn btn-dark btn-sm">Close</a>';
			}

			$this->template->assign('new_pw_saved', $data['saved']);
			$this->template->assign('data_saved_message', $data['saved_message']);
			$this->template->assign('data_saved_btn', $data['data_saved_btn']);
			$this->template->assign('content', 'forms/change_password.tpl');
		}
		else
		{
			$this->template->assign('content', 'forms/change_password.tpl');
		}
	}

	public function edit()
	{

		$img_gallery = $this->toolbox('image')->get_images();

		$data['notify_max_size'] = $this->config->setting['notify_img_size'];
		$data['max_size'] = $this->config->setting['img_size'];
		$data['member_id'] = $this->session->get('member_id');
		$max_size = $this->config->setting['img_file_size'];
		$allowed_types = $this->config->setting['img_type'];
		$max_imgs_allowed = $this->config->setting['total_img_allowed'];
		# Display edit profile page
		if (!empty($_POST['edit_profile']))
		{
			if ($this->model('Member')->update_profile_data())
			{
				$info = [
					'Did you know that profiles with images on average recieve 173% more views and 112% more responses?',
					'Completing your profile helps us find the best possible matches according to your criteria.',
				];
				$display = array_rand($info, 1);
				$data['saved'] = 'Profile settings saved';
				$data['saved_message'] = $info[$display];
				$data['data_saved_btn'] = '<a href="#" data-dismiss="alert" class="btn btn-dark btn-sm">Close</a>';
			}
			else
			{
				$data['saved'] = 'There was a problem saving your profile information';
				$data['saved_message'] = 'Profile settings were not saved';
				$data['data_saved_btn'] = '<a href="#" data-dismiss="alert" class="btn btn-dark btn-sm">Close</a>';
			}
		}

		if (!empty($_POST['edit_avatar']))
		{
			$upload = $this->toolbox('image')->upload();

			if (!$upload)
			{
				$data['saved'] = 'There was a problem saving your profile image';
				$data['saved_message'] = 'An unknown error occured while uploading your image. Please try again later. If the problem persists, contact support.';
				$data['data_saved_btn'] = '<a href="#" data-dismiss="alert" class="btn btn-dark btn-sm">Close</a>';
			}

		}

		$data['username'] = $this->session->get('username');
		$data['profile'] = $this->model('Member')->profile_data($this->session->get('username'));
		$data['avatar'] = USER_PICS_URL . $data['username'] . '/' . $this->model('Member')->get_avatar($this->session->get('member_id'));

		$this->template->assign('profile_data_saved', $data['saved']);
		$this->template->assign('data_saved_message', $data['saved_message']);
		$this->template->assign('data_saved_btn', $data['data_saved_btn']);
		$this->template->assign('avatar', $data['avatar']);
		$this->template->assign('max_allowed_imgs', $max_imgs_allowed);
		$this->template->assign('max_size', $max_size);
		$this->template->assign('allowed_types', $allowed_types);
		$this->template->assign('profile_data', $data['profile']);
		$this->template->assign('content', 'member/edit.tpl');
	}

	public function profile()
	{
		if (empty($this->route->param1) || $this->route->param1 === $this->session->get('username') || !isset($this->route->param1) || $this->route->param1 == 'edit')
		{
			$this->edit();
		}
		else
		{
			$this->view();
		}

	}

	public function view()
	{
		$data['username'] = urldecode($this->route->param1);
		$data['profile'] = $this->model('Member')->profile_data($data['username']);
		$data['member_id'] = $this->model('Member')->get_member_id($data['username']);
		$data['img_gallery'] = $this->model('Member')->img_gallery($data['member_id']);
		$profile = $data['profile'];

		if ($_POST['search_filters'])
		{
			$post = $this->toolbox('sanitize')->xss($_POST);
		}

		if (empty($data['username']) || $data['username'] === $this->session->get('username'))
		{
			$this->edit();
		}
		elseif ($data['username'] == 'all')
		{
			$this->template->assign('content', 'member/all.tpl');
		}
		else
		{
			# Track who is viewing who's profile
			if ($this->model('Member')->member_view($data['username'], $this->session->get('username')))
			{

				foreach ($this->model('Member')->profile_data($data['username']) as $profile)
				{
					$age = $this->toolbox('formatter')->age($profile['dob']);
				}

				$this->template->assign('current_age', $age);
				$this->template->assign('img_gallery', $data['img_gallery']);
				$this->template->assign('profile', $data['profile']);
				$this->template->assign('content', 'member/view.tpl');
			}
			else
			{
				$this->redirect('error/_404');
			}
		}
	}

	public function all()
	{
		// $data['avatar'] = $this->model('Member')->get_avatar();
		// $data['images'] = $this->model('Member')->get_images();
		$limit = $this->route->param1;

		$query = "SELECT * FROM users WHERE hidden = 0";
		$data['pager'] = $this->toolbox('pagination');
		$data['pager']->config($query, $this->route->param1, 20);
		$data['profiles'] = $this->model('Member')->select($limit);
		$this->load->view('member/all', $data);
	}

	public function search_settings()
	{

		$user = $this->session->get('member_id');

		$data['profiles'] = $this->model('Member')->select($limit);
		$this->load->view('member/all', $data);
	}

}
