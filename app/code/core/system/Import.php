<?php
namespace Hal\Core;

class Import {

	public $error = [];
	public $file;

	public function __construct($file) {
		$this->file = $file;
	}

	public function get_global_configuration($setting) {
		// Locate the global .env file
		$getLine = $setting;

		// prevent the browser from parsing .env as HTML.
		header('Content-Type: text/plain');

		// get the file contents, assuming the file to be readable (and exist)
		$contents = file_get_contents($this->file);
		// escape special characters in the query
		$pattern = preg_quote($getLine, '/');
		// finalise the regular expression, matching the whole line
		$pattern = "/^.*$pattern.*\$/m";

		// search, and store all matching occurences in $matches
		if (preg_match_all($pattern, $contents, $matches)) {

			// Return the line from the .env file
			$line = implode("\n", $matches[0]);
			header('Content-Type: text/html');
			return self::setting_value($line);
		}
		header('Content-Type: text/html');
		return $this->error = "Invalid configuration setting: {$setting}";
	}

	private function setting_value($line) {

		// Now extracting the double-quoted value
		if (preg_match('/"([^"]+)"/', $line, $m)) {
			return $m[1];
		}

		return false;
	}

}