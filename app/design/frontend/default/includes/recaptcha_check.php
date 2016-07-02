<?php

//echo $_POST['recaptcha_challenge_field'] . " " . $_POST['recaptcha_response_field'];

require_once('recaptchalib.php');
$privatekey = "your_key_here";

$resp = recaptcha_check_answer($privatekey,
							  $_SERVER["REMOTE_ADDR"],
							  $_POST["recaptcha_challenge_field"],
							  $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
  	die ("The reCAPTCHA wasn't entered correctly. Go back and try it again.");// ."(reCAPTCHA said: " . $resp->error . ")");
} else {
	echo "success";
}

?>