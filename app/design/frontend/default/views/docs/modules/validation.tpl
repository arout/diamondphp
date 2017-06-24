{include file=$sidebar}
{include file=$layout}

<p>
	To load the validation helper, we call it as follows:<br> 
	<code>$this->toolbox('validate')->form($param_one, $param_two)</code>.<br>
	<em><i class="fa fa-info-circle"></i> Note that $param_one and $param_two are generic placeholders for demonstration purposes only. 
	See below for more details.</em>
</p>

<p>
	The form() function takes two parameters ($param_one and $param_two in the above example). Both parameters <strong>must be an array</strong>.
</p>

<p>
	The first parameter is the data to be validated. For example, if you are processing a $_POST form, you would use $_POST as the first parameter: <br>
	<code>$this->toolbox('validate')->form($_POST, $param_two)</code>.
</p>

<p>
	The second parameter must be an array containing the validation rules to apply: <br><code>$this->toolbox('validate')->form($_POST, array(
		
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

<pre>
array( 
	'username' => 'required|alpha_numeric',
	'password' => 'required|min_len,6'
)
</pre>

<p>
So our complete validation call in our function, with the rules, should look like this:
</p>

<pre class="prettyprint">
$this->toolbox('validate')->form($form, 
[
	// Note that each rule is seperated by a '|' pipe
	'username' => 'required|alpha_numeric',
	'password' => 'required|min_len,6'
]);
</pre>
<p>
A complete list of all the available rules are listed below:
</p>
<p>
<legend>AVAILABLE RULES</legend>
<pre class="prettyprint"> 
'required'       // Ensures the specified key value exists and is not empty
'valid_email'    // Checks for a valid email address
'max_len,n'      // Checks key value length, makes sure it is not longer than the specified length. n = length parameter.
'min_len,n'      // Checks key value length, makes sure it is not shorter than the specified length. n = length parameter.
'exact_len,n'    // Ensures that the key value length precisely matches the specified length. n = length parameter.
'alpha'          // Ensure only alpha characters are present in the key value (a-z, A-Z)
'alpha_numeric'  // Ensure only alpha-numeric characters are present in the key value (a-z, A-Z, 0-9)
'alpha_dash'     // Ensure only alpha-numeric characters + dashes and underscores are present in the key value (a-z, A-Z, 0-9, _-)
'numeric'        // Ensure only numeric key values
'integer'        // Ensure only integer key values
'boolean'        // Checks for PHP accepted boolean values, returns TRUE for "1", "true", "on" and "yes"
'float'          // Checks for float values
'valid_url'      // Check for valid URL or subdomain
'url_exists'     // Check to see if the url exists and is accessible
'valid_ip'       // Check for valid generic IP address
'valid_ipv4'     // Check for valid IPv4 address
'valid_ipv6'     // Check for valid IPv6 address
'valid_cc'       // Check for a valid credit card number (Uses the MOD10 Checksum Algorithm)
'valid_name'     // Check for a valid format human name
'contains,n'     // Verify that a value is contained within the pre-defined value set
'street_address' // Checks that the provided string is a likely street address. 1 number, 1 or more space, 1 or more letters
'iban'           // Check for a valid IBAN
</pre>

</p>
<legend>METHODS AVAILABLE</legend>
<pre class="prettyprint">
// Shorthand form validation
form(array $data, array $rules) 
// Get or set the validation rules
validation_rules(array $rules); 
// Get or set the filtering rules
filter_rules(array $rules); 
// Runs the filter and validation routines
run(array $data); 
// Strips and encodes unwanted characters
xss_clean(array $data); 
// Sanitizes data and converts strings to UTF-8 (if available)
sanitize(array $input, $fields = NULL); 
// Validates input data according to the provided ruleset (see example)
validate(array $input, array $ruleset); 
// Filters input data according to the provided filterset (see example)
filter(array $input, array $filterset); 
// Filters input data according to the provided filterset (see example)
get_readable_errors($convert_to_string = false); // Returns human readable error text in an array or string
</pre>


{include file=$layout_close}