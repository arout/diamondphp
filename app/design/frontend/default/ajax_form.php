<?php

$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$form   = $_POST['form'];
$errors = array();

$to = "";
		
// email headers
$headers  = "From: " . $_POST['email'] . "\r\n";
$headers .= "Reply-To: ". $_POST['email'] . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if($form == "email_friend"){
	
	// validate email
	if(!filter_var($_POST['friends_email'], FILTER_VALIDATE_EMAIL) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$errors[] = "Not a valid email";
	} else {
		$to = $_POST['friends_email'];
		
		$subject  = $_POST['name'] . " wants you to check this vehicle out";
		
		$message  = "I want you to check this vehicle out.<br><br>";
		
		$message .= "Message: " . $_POST['message'];
		
		$mail = @mail($to, $subject, $message, $headers);
	}
} else {
	
	// validate email
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$errors[] = "Not a valid email";
	} else {
		
		// determine email title
		if($form == "make_offer"){
			$subject = "Someone made an offer";
		} elseif($form == "schedule") {
			$subject = "Someone wants to schedule a test drive";
		} elseif($form == "trade_in"){
			$subject = "Someone wants to trade a vehicle in";
		}
		
		$post_vars = $_POST;
		// remove unwanted vars
		//unset($post_vars['email']);
		unset($post_vars['form']);
		
		if(isset($post_vars['recaptcha_challenge_field'])){
			unset($post_vars['recaptcha_challenge_field']);
		}
		if(isset($post_vars['recaptcha_response_field'])){
			unset($post_vars['recaptcha_response_field']);
		}
		
		$message  = "<table>";
		foreach($post_vars as $name => $var){
			$message .= "<tr><td>" . ucwords(str_replace("_", " ", $name)) . ": </td><td>" . $var . "</td></tr>";
		}
		$message .= "</table>";
	
		$mail = @mail($to, $subject, $message, $headers);
	}
}


if($mail && empty($errors)){
	echo "Sent Successfully";
} else {
	echo "<ul class='error_list'>";
	foreach($errors as $error){
		echo "<li>" . $error . "</li>";
	}
	echo "</ul>";
	
	/*echo "<pre>";
	print_r($_POST);
	echo "</pre>";*/
}

?>