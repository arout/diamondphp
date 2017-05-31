<?php
namespace Web\Controller;
use Hal\Controller\Base_Controller;

class Download_Controller extends Base_Controller
{
	public function index()
	{
		// $this->data['cache'] = new System\Core\Apc;
		$email = $this->toolbox('sanitize')->xss($_POST['email']);

		if ($_POST)
		{
			$email = $this->toolbox('sanitize')->xss($_POST['email']);
			$q     = "INSERT INTO notify_releases(email, timestamp) VALUES(?, ?)";
			$s     = $this->db->prepare($q);
			$s->execute(array($email, time()));

			$subject = 'Someone is waiting for Diamond PHP';
			$message = 'Please send a notification to ' . $email . ' as soon as Diamond PHP is ready!';
			// message lines should not exceed 70 characters (PHP rule), so wrap it
			$message = wordwrap($message, 70);
			$from    = "From: Diamond PHP\n";
			// send mail
			$this->toolbox('email')->send($email, 'DiamondPHP Subscriber', $from, 'andrew@diamondphp.com', $subject, $message);
			// @mail("andrew@diamondphp.com", $subject, $message, $from);
		}

		$this->template->assign('today', time());
		$this->template->assign('email', $email);
		$this->template->assign('uri', $this->route->param2);
		$this->template->assign('content', 'static/download.tpl');
	}

	public function demo()
	{
		echo '<div class="bs-callout text-center styleSecondBackground">Demo action loaded!!!  :)</div>';
	}

}