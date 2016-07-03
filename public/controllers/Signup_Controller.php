<?php

class Signup_Controller extends Hal\Controller\Base_Controller {

	public function index() {
       if ($_POST)
			$data = $_POST;
		else
			$data = NULL;

		if( $this->route->action != 'complete' )
			$this->load->view('forms/signup_form', $data);
		else
			$this->load->view('static/signup_complete', $data);
	}

	public function logout() {

		$this->session->flush();
		$this->redirect('home/index');
	}

	public function complete() {
		return self::index();
	}

	public function login_validate_math($data) {

		$data['a'] = rand(1, 5);
		$data['b'] = rand(1, 5);

		$response = (int) $data['math'];
		$answer = (int) $data['math_answer'];
		if ($response !== $answer) {
			// Did not pass validation -- Show errors
			echo '<div class="alert alert-danger">';
			echo '<i class="fa fa-exclamation-triangle"></i> Math answer is incorrect<br>';
			echo '</div>';
			$this->load->view('forms/login_form', $data);
		} else {
			// Now we can check the submitted form to see if it is filled out properly
			$check_if_valid = $this->toolbox('validate')->form($data, array(

				'email' => 'required|valid_email',
				'password' => 'required|max_len,100|min_len,6',
			));

			if ($check_if_valid === FALSE) {

				// Did not pass validation -- Show errors
				echo '<div class="alert alert-danger">';
				foreach ($check_if_valid as $invalid) {
					echo '<i class="fa fa-exclamation-triangle"></i> ' . $invalid . '<br>';
				}

				echo '</div>';
				$this->load->view('forms/login_form');

			} else {
				// Form is valid -- continue to login query
				$result = $this->model('Member')->check_login($data);

				if ($result == "Account not verified") {
					$this->redirect('login/index/verify');
				} elseif ($result && $result != "Account not verified") {
					// Valid login
					/*
					You can set session variables either in controller or model

					$this->toolbox('session')->set('username', $result['username']);
					$this->toolbox('session')->set('email', $result['email']);
					$this->toolbox('session')->set('first_name', $result['first_name']);
					$this->toolbox('session')->set('last_name', $result['last_name']);
					 */
					$this->redirect('member/home');
				} else {

					// Invalid login -- redirect to login error page
					$this->redirect('login/index/error');
				}
			}
		}
	}

	public function login_validate() {

		// Begin form validation by sanitizing all $_POST submitted
		$data = $this->toolbox('sanitize')->xss($_POST);

		if ($this->config->setting['login_math'] === TRUE) {

			$this->login_validate_math($data);
		} else {
			// Now we can check the submitted form to see if it is filled out properly
			$check_if_valid = $this->toolbox('validate')->form($data, array(

				'email' => 'required|valid_email',
				'password' => 'required|max_len,100|min_len,6',
			));

			if ($check_if_valid === FALSE) {

				// Did not pass validation -- Show errors
				echo '<div class="alert alert-danger">';
				foreach ($check_if_valid as $invalid) {
					echo '<i class="fa fa-exclamation-triangle"></i> ' . $invalid . '<br>';
				}

				echo '</div>';
				$this->load->view('forms/login_form');

			} else {
				// Form is valid -- continue to login query
				$result = $this->model('Member')->check_login($data);

				if ($result == "Account not verified") {
					$this->redirect('login/index/verify');
				} elseif ($result && $result != "Account not verified") {
					// Valid login
					/*
					You can set session variables either in controller or model

					$this->toolbox('session')->set('username', $result['username']);
					$this->toolbox('session')->set('email', $result['email']);
					$this->toolbox('session')->set('first_name', $result['first_name']);
					$this->toolbox('session')->set('last_name', $result['last_name']);
					 */
					$this->redirect('member/home');
				} else {

					// Invalid login -- redirect to login error page
					$this->redirect('login/index/error');
				}
			}

		}
	}

	function forgot_password() {

		/**
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

		$q = "SELECT username, email, password FROM users WHERE email = ?";
		$result = $this->db->prepare($q);
		$result->execute(array($form['email']));

		if (!empty($result)) {

			foreach ($result as $row) {
				$data['username'] = $row['username'];
				$data['email'] = $row['email'];

				$data['create_token'] = sha1($row['username'] . $row['email'] . time() . '#$!&^*(');
				$data['create_token'] = str_replace('3', '-', $data['create_token']);
				$data['create_token'] = str_replace('9', '_', $data['create_token']);
				$data['create_token'] = urlencode($data['create_token']);

				$q2 = "INSERT INTO password_reset(email, hash, timestamp) VALUES(?, ?, ?)";
				$r = $this->db->prepare($q2);
				$r->execute(array($row['email'], $data['create_token'], time()));

				$to = $data['email'];
				$subject = "Did You Forget Your Password?";
				$from = $this->config->setting('site_name');
				$message = "You (or someone claiming to be you) has requested to reset your profile password on " . $this->config->setting('site_name') . ".<br>
				If you requested your password to be reset, please do so here: " . BASE_URL . 'member/password_reset/' . $data['create_token'] . ".<br>
				If you did not request a password reset, or otherwise feel this is in error, there is no need to do anything. Your password and other information
				is safe, and has not been accessed or changed in any way.";

				$this->toolbox('email')->send($to, $data['username'], $from, $this->config->setting('site_email'), $subject, $message);

			}
		}

		$this->load->view('static/forgot_password', $data);
	}

	public function password_reset() {

		$data['token'] = $this->route->param1;

		$q = "SELECT email, hash, timestamp FROM password_reset WHERE hash = ?";
		$result = $this->db->prepare($q);
		$result->execute(array($data['token']));

		// It is only possible to have one (successful) result.
		// If zero found, it is likely a hack attempt or malformed URL
		// so just redirect them to the original password reset form
		$rows_found = $result->rowCount();

		if ($rows_found == 1) {
			foreach ($result as $row) {

				// 86400 seconds = 24 hours
				// Password must be reset within 24 hours, else must send a new request
				if (time() > ($row['timestamp'] + 86400))
				// More than 24 hours has passed; send new request
				{
					$this->redirect('member/forgot_password/expired');
				} else {

					$this->view('forms/password_reset', $data);
				}
			}
			// End foreach
		} else {
			$this->redirect('member/forgot_password');
			exit;
		} // End if/else

		if ($_POST) {
			// New password submitted
			$form = $this->input->sanitize->form($_POST);
			$this->model('Member')->update_password($_POST['password'], $row['email']);
			$this->redirect('member/login/password_reset_complete');
		}
	}

	public function register() {
		$this->index();
	}

	public function signup_validate() {

		if (!$_POST || empty($_POST)) {
			$this->redirect('signup');
		}
		# Begin form validation by sanitizing all $_POST submitted
		$form = $this->toolbox('sanitize')->xss($_POST);

		/*
		 * Now set validation rules for each field.
		 * Pass the sanitized $form variable above
		 * to the function below
		 */
		$check_if_valid = $this->toolbox('validate')->form($_POST, array(

			'username' => 'required|alpha_numeric',
			'password' => 'required|max_len,40|min_len,6',
			'confirm_password' => 'required|contains,' . $_POST['password'] . '',
			'first_name' => 'required|valid_name',
			'last_name' => 'required|valid_name',
			'email' => 'required|valid_email',
			'dob' => 'required',
			'city' => 'required',
			'state' => 'required|exact_len,2',
			'zip' => 'required|numeric|exact_len,5',
			'phone' => 'numeric|exact_len, 10',
		));

		/*
		 * Now validate the form according to the rules set above.
		 * If $check_if_valid is true, form was successfully validated,
		 * so we can go ahead and process the data.
		 * Otherwise, display the errors encountered.
		 */
		if ($check_if_valid === TRUE) {
			$this->log->save( '$check_if_valid returned true', 'signup-errors.log' );
			# valid submission -- continue
			/*
			if( isset( $form['phone'] ) && ! empty( $form['phone'] ) ) {
			// NOTE THE []; $form must be converted to array
			foreach($form as $form[]) {

			$phone = $this->toolbox('formatter')->PhoneNumber($form['phone']);
			}
			}
			 */
			try {
				
				if( $this->model('Member')->create_member($form) ) {
					# Send confirmation email
					if( $this->config->setting('signup_email_confirmation') === TRUE ) {
						$confirmation_code = md5( $form['email'] );
						$to 			= $form['email'];
						$recipient_name = $form['first_name'] . ' ' . $form['last_name'];
						$from 			= $this->config->setting('site_name');
						$reply_to 		= $this->config->setting('site_email');
						$subject 		= "Confirm your registration on {$from}";
						$message 		= "<p>To activate your account, please visit the following link:</p>".
										  "<p>{$this->config->setting('site_url')}signup/activate/{$confirmation_code}</p>".
										  "<p>If you believe you received this email by mistake, no further action is necessary.</p>";

						$this->toolbox('email')->send( $to, $recipient_name, $from, $reply_to, $subject, $message );
						$this->log->save( 'mail apparently was successful', 'signup-errors.log' );
					}
				}

				$this->redirect('signup/complete');
			} 
			catch (\Exception $e) {
				$this->log->save($e->getMessage(), 'signup_errors.log');
				$this->signup();
			}

		} else {
			// Did not pass validation -- Show errors
			echo '<div class="alert alert-danger">';
			foreach ($check_if_valid as $invalid) {
				echo '<i class="fa fa-exclamation-triangle"></i> ' . $invalid . '<br>';
			}

			echo '</div>';
			$this->load->view('forms/signup_form', $data = $form);
		}
	}
}
