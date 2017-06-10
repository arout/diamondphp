<?php
namespace Hal\Module;

/**
 * Hash the password using PHP's default settings
 * (currently BCRYPT encryption and cost factor of 10)
 */

class Hash
{

	private $data;

	public function encrypt($password, $cost = 10, $algo = PASSWORD_DEFAULT)
	{
		/*
			 * Primary use is to hash passwords, but can also be used to hash
			 * other data, such as credit card numbers, etc
		*/

		// Generate random key for internal use
		$bytes = random_bytes(5);
		$key = bin2hex($bytes);

		$encrypt = password_hash($password, $algo, ["cost => $cost"]);
		return $this->data[$key] = $encrypt;
	}

	public function verify($check_this_hash, $stored_hash)
	{
		return password_verify($check_this_hash, $stored_hash);
	}
}
