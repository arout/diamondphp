<?php
namespace Hal\Module;

/**
 * PhoneNumber public function provides a method to define
 * how phone numbers should be formatted, regardless
 * of how the user submits their #.
 * It works by stripping all non-integer characters
 * from the input, then assembling the number back together
 * using the defined formatting options.
 * For example, 123-456-7890 and 123 456.7890 would both return
 * (123) 456-7890 after public function processes the input.
 *
 * By default, the output will return numbers in the following
 * format: (xxx) xxx-xxxx
 *
 * To change the default format, edit lines 35, 44 and 52 below
 * to whatever you wish
 */
class Formatter {

	public function PhoneNumber($phoneNumber) {

		// Strip all non-integers from input
		$phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

		if (strlen($phoneNumber) > 10) {
			// Prepend country code to phone number
			$countryCode = substr($phoneNumber, 0, strlen($phoneNumber) - 10);
			$areaCode = substr($phoneNumber, -10, 3);
			$nextThree = substr($phoneNumber, -7, 3);
			$lastFour = substr($phoneNumber, -4, 4);

			$phoneNumber = '+' . $countryCode . ' (' . $areaCode . ') ' . $nextThree . '-' . $lastFour;
		} else if (strlen($phoneNumber) == 10) {
			// 10 digit phone number (Area code + number)
			$areaCode = substr($phoneNumber, 0, 3);
			$nextThree = substr($phoneNumber, 3, 3);
			$lastFour = substr($phoneNumber, 6, 4);

			$phoneNumber = '(' . $areaCode . ') ' . $nextThree . '-' . $lastFour;
		} else if (strlen($phoneNumber) == 7) {
			// 7 digit number
			$nextThree = substr($phoneNumber, 0, 3);
			$lastFour = substr($phoneNumber, 3, 4);

			$phoneNumber = $nextThree . '-' . $lastFour;
		}

		return $phoneNumber;
	}

	### Convert birth date to age (in years) ###

	public function age($string) {

		/**
		 * For consistency, $string MUST be in the YYYY-MM-DD format
		 * DateTime is capable of attempting to convert MM-DD-YYYY or DD-MM-YYYY,
		 * but it isn't quite as reliable when the Day is equal to or less than 12;
		 * as it may confuse the day and month.
		 */
		$from = new \DateTime($string);
		$to = new \DateTime('today');
		return $from->diff($to)->y;
	}

	### Date and time formats ###

	public function time($string) {
		/* Example output:  7:17am */
		return gmdate("g:ia", $string);
	}

	public function date($string) {
		/* Example output: 11/27/2013 */
		return gmdate("n/d/Y", $string);
	}

	public function datereverse($string) {
		/* Example output: 2013/19/03 */
		return gmdate("Y/d/n", $string);
	}

	public function datewords($string) {
		/* Example output: Monday, March 8, 2003 */
		return gmdate("l, F d, Y", $string);
	}

	public function datewords_no_prefix($string) {
		/* Example output: March 8, 2003 */
		return gmdate("F d, Y", $string);
	}

	public function datetime($string) {
		/* Example output: 11/27/2013 8:08am */
		return gmdate("n/d/Y  g:ia", $string);
	}

	public function date_to_timestamp($date) {
		/* Convert given month, day and year to a Unix timestamp */
		return strtotime($date);
	}

}