<legend>Validation Helper</legend>
<p>
	The Validation helper is used to validate forms. It is accessible in the same way as other Toolbox helpers -- <code>Toolbox::helper('Validate')</code>,
	however, it is also built into controllers, and it is recommended to access it from your controllers only. By keeping access restricted to your controllers, 
	you can take advantage of the framework's ability to sanitize all input data by default, as well as keeping application responsibilities where they belong 
	(for example, Views should not have to validate data, only present it; and so on).
</p>

<p>
	The syntax for controller access is a bit different from other Toolbox helpers. Normally, you call a helper in your controller by using 
	<code>$this->toolbox('name_of_helper')</code>. Since the validation helper is intended to be one component of a larger security/validation system, 
	it is implemented a bit differently than other helpers.
</p>

<p>
	To load the validation helper, we call it as follows: <code>$this->input->validate->form($param_one, $param_two)</code>.<br>
	<em class="alert-danger"><i class="fa fa-exclamation-triangle"></i> Note that $param_one and $param_two are generic placeholders for demonstration purposes only. 
	See below for more details.</em>
</p>

<p>
	The form() function takes two parameters ($param_one and $param_two in the above example). Both parameters <strong>must be an array</strong>.
</p>

<p>
	The first parameter is the data to be validated. For example, if you are processing a $_POST form, you would use $_POST as the first parameter: 
	<code>$this->input->validate->form($_POST, $param_two)</code>.
</p>

<p>
	The second parameter must be an array containing the validation rules to apply: <code>$this->input->validate->form($_POST, array(
		
			'input1' => '-- rules --',
			'input2' => '-- rules --',
			'input3' => '-- rules --'
		))</code>
</p>

<p>
	Let's assume our fictional $_POST form above is a login form. Like most login forms, it contains an input field named "username" and a password field 
	named "password". We want to make sure that both the username and password fields are filled out (or 'required'), the username is alphanumeric, and the password 
	is at least 6 characters in length. We specify the rules by specifying the input field name (i.e. 'username', 'password', etc) and bind the rules to them as shown 
	below:
</p>

<p>
	<code>array( </code><br>
	<code>'username' => 'required|alpha_numeric',</code><br>
	<code>'password' => 'required|min_len,6'</code><br>
	<code>)</code>
</p>

<p>
So our complete validation call in our function should look like this:
</p>

<p><code>
	$this->input->validate->form($form, array(<br>
		&nbsp;&nbsp;&nbsp;&nbsp;	// Note that each rule is seperated by a | pipe<br>
		&nbsp;&nbsp;&nbsp;&nbsp;	'username' => 'required|alpha_numeric',<br>
		&nbsp;&nbsp;&nbsp;&nbsp;	'password' => 'required|min_len,6'<br>
		));
	</code>
</p>


<?php $this->view('support/helpers'); ?>