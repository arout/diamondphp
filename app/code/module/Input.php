<?php
namespace Fusion\Toolbox;

/**
 * Used to sanitize inputs by default (file/post/get)
 * 
 * Validating filters:
 *
 *   Are used to validate user input
 *   Strict format rules (like URL or E-Mail validating)
 *   Returns the expected type on success or FALSE on failure
 *
 * Sanitizing filters:
 *
 *   Are used to allow or disallow specified characters in a string
 *   No data format rules
 *   Always return the string
 *
 */

class Input{
	
	public $errors = array();
	public $result = array();
	public $input = array();
	public $data = array();
	public $validate;
	public $sanitize;
	
	public function __construct( $sanitize, $validate ) {
		
		// Integrate the Sanitize and Validate helpers
		// into the Input class (this class)
		$this->sanitize = $sanitize;
		$this->validate = $validate;
	}

	public function get($input) {
		
		/**
		 * Sanitize $_GET, where $input is the $_GET parameter
		 * i.e. $_GET['example'] or $_GET['another_get_parameter']
		 */
		if( isset($_GET[$input]) )
			return preg_replace('/[^-a-zA-Z0-9~%.:_\-]/', '', $_GET[$input]);
	}
	
	public function post($input) {

		/**
		 * Sanitize $_POST where $input is the key to be processed
		 * i.e. $_POST['username'] or $_POST['password']
		 */
		if( isset($_POST[$input]) )
			return trim( htmlspecialchars($_POST[$input]) );
		else
			echo '<div class="alert alert-danger">
					<strong>Input Error:</strong> Invalid $_POST parameter: <strong>'.$input.'</strong> 
					</div>';
	}
	
	public function sanitize() {

		return $this->sanitize;
	}
	
	public function validate() {

		return $this->validate;
	}
}