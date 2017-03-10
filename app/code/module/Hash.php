<?php
declare(strict_types=1);
namespace Hal\Module;

 /**
  * Hash the password using PHP's default settings
  * (currently BCRYPT encryption and cost factor of 10)
  */

class Hash {
 	
	public $data;
	
	public function encrypt( $password, $key = NULL ) {
		/**
		 * Primary use is to hash passwords, but can also be used to hash
		 * other data, such as credit card numbers, etc
		 */
		$encrypt = password_hash( $password, PASSWORD_DEFAULT );
		return $this->data[$key] = $encrypt;
	}
	
	public function verify( $check_this_hash, $stored_hash ) {
		
		return password_verify( $check_this_hash, $stored_hash );
	}
}
