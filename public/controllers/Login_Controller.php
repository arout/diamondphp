<?php
namespace Web\Controller;
use Hal\Controller\Base_Controller;

class Login_Controller extends Base_Controller
{

	public function index()
	{
		// $book          = R::dispense('book');
		// $book->title   = 'Learn to Program';
		// $book->rating  = 10;
		// $book['price'] = 29.99; //you can use array notation as well
		// $id            = R::store($book);

		// $post = R::find('zips', ' code = ?', [17331]);

		// foreach ($post as $post)
		// {
		// 	echo $post->citycode . '<br>';
		// }
		// $user        = R::dispense('user');
		// $user->name  = 'Joe Bloggs';
		// $user->email = 'joe.bloggs@example.com';
		// $id          = R::store($user);
		// print $id;

		// $user->password = 'secret';
		// R::store($user);

		// $user->age = 30;
		// R::store($user);

		// $users = R::batch('user', array(1, 2, 3));
		// $users = R::find('user', 'age = ?',
		// 	['NULL']
		// );
		// foreach ($users as $user)
		// {
		// 	R::wipe($user);
		// }

		// Is two-step login process enabled?
		if ($this->config->setting['login_math'] === "TRUE")
		{
			$data['a']      = rand(1, 5);
			$data['b']      = rand(1, 5);
			$data['answer'] = $data['a'] * $data['b'];
			$data['route']  = $this->route->param1;
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
		else
		{
			$this->template->assign('content', 'forms/login_form.tpl');
		}

		$this->_event_register();
	}

	public function __toString()
	{
		return 'Login_Controller';
	}

	public function _event_register()
	{
		# Create listener
		$this->event->_register('member.login', 'Login_Controller', 'hello');
		$this->dispatcher->dispatch('member.login');
	}

	public static function hello($event)
	{
		echo "Hello, events!";
		var_export($event);
		$this->log->save('login event worked', 'member.log');
	}

	public function logout()
	{

		$this->redirect('home/index');
		$this->session->flush();
		exit;
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
		$data = $this->toolbox('validate')->xss_clean($_POST);

		if ($this->config->setting['login_math'] === "TRUE")
		{
			$this->login_validate_math($data);
			$data['math_error_response'] = '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Math answer is incorrect<br></div>';
		}

		if ($this->config->setting['login_math'] === "TRUE" && $this->login_validate_math($data) === FALSE)
		{
			$this->redirect('login/index/error_math');
		}

		if ($this->config->setting['login_math'] === "FALSE" || ($this->config->setting['login_math'] === "TRUE" && $this->login_validate_math($data) !== FALSE))
		{
			// Now we can check the submitted form to see if it is filled out properly
			$check_if_valid = $this->toolbox('validate')->form($data, [

				'email'    => 'required|valid_email',
				'password' => 'required|max_len,100|min_len,6',
			]);

			if ($check_if_valid === FALSE)
			{

				// Did not pass form validation -- Show errors
				echo '<div class="alert alert-danger">';
				foreach ($check_if_valid as $invalid)
				{
					echo '<i class="fa fa-exclamation-triangle"></i> ' . $invalid . '<br>';
				}
				echo '</div>';
				$this->load->view('forms/login_form');

			}
			else
			{
				// Form is valid -- continue to login query
				$result = $this->model('Member')->check_login($data);

				if ($result == "Account not verified")
				{
					$this->redirect('login/index/verify');
				}
				elseif ($result && $result != "Account not verified")
				{
					// Valid login
					$this->redirect('member/home');
				}
				else
				{
					// Invalid login -- redirect to login error page
					$this->redirect('login/index/error');
				}
			}
		}

	}

	function forgot_password()
	{

		/*
			 *
			 * === Program workflow ===
			 *
			 * When password reset form is submitted, the email address is recorded
			 * into the password_reset table. A sha1 token is then generated and stored
			 * along with it, as well as a Unix timestamp of when the request was made.
			 * The timestamp is necessary as a security precaution -- the user has 24 hours
			 * to reset the password.
			 * An email is then dispatched, providing a link to update their password. The
			 * link simply fetches the email, using the the hash (which is a URL parameter)
			 * as the lookup index.
			 *
		*/
		$form = $this->toolbox('sanitize')->xss($_POST);

		$q      = "SELECT username, email, password FROM users WHERE email = ?";
		$result = $this->db->prepare($q);
		$result->execute([$form['email']]);

		if (!empty($result))
		{

			foreach ($result as $row)
			{
				$data['username'] = $row['username'];
				$data['email']    = $row['email'];

				$data['create_token'] = sha1($row['username'] . $row['email'] . time() . '#$!&^*(');
				$data['create_token'] = str_replace('3', '-', $data['create_token']);
				$data['create_token'] = str_replace('9', '_', $data['create_token']);
				$data['create_token'] = urlencode($data['create_token']);

				$q2 = "INSERT INTO password_reset(email, hash, timestamp) VALUES(?, ?, ?)";
				$r  = $this->db->prepare($q2);
				$r->execute([$row['email'], $data['create_token'], time()]);

				$to      = $data['email'];
				$subject = "Did You Forget Your Password?";
				$from    = $this->config->setting('site_name');
				$message = "You (or someone claiming to be you) has requested to reset your profile password on " . $this->config->setting('site_name') . ".<br>
				If you requested your password to be reset, please do so here: " . BASE_URL . 'member/password_reset/' . $data['create_token'] . ".<br>
				If you did not request a password reset, or otherwise feel this is in error, there is no need to do anything. Your password and other information
				is safe, and has not been accessed or changed in any way.";

				$this->toolbox('email')->send($to, $data['username'], $from, $this->config->setting('site_email'), $subject, $message);

			}
		}

		$this->load->view('static/forgot_password', $data);
	}

	public function password_reset()
	{

		$data['token'] = $this->route->param1;

		$q      = "SELECT email, hash, timestamp FROM password_reset WHERE hash = ?";
		$result = $this->db->prepare($q);
		$result->execute([$data['token']]);

		// It is only possible to have one (successful) result.
		// If zero found, it is likely a hack attempt or malformed URL
		// so just redirect them to the original password reset form
		$rows_found = $result->rowCount();

		if ($rows_found == 1)
		{
			foreach ($result as $row)
			{

				// 86400 seconds = 24 hours
				// Password must be reset within 24 hours, else must send a new request
				if (time() > ($row['timestamp'] + 86400))
				// More than 24 hours has passed; send new request
				{
					$this->redirect('member/forgot_password/expired');
				}
				else
				{

					$this->view('forms/password_reset', $data);
				}
			}
			// End foreach
		}
		else
		{
			$this->redirect('member/forgot_password');
			exit;
		} // End if/else

		if ($_POST)
		{
			// New password submitted
			$form = $this->input->sanitize->form($_POST);
			$this->model('Member')->update_password($_POST['password'], $row['email']);
			$this->redirect('member/login/password_reset_complete');
		}
	}
}
