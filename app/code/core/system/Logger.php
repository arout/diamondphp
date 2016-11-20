<?php
namespace Hal\Core;

/**
 * File:    /app/code/core/system/Logger.php
 * Purpose: Handles system and user-defined event logging
 */

class Logger
{

	public function save($message = NULL, $logfile = 'system.log')
	{

		if (!is_dir(LOG_PATH))
		{
			mkdir(LOG_PATH, 0755, true);
			chmod(LOG_PATH, 0755);
		}

		# Logging function for both user-defined and system errors
		if (!is_null($message))
		{

			if ($message instanceof Exception)
			{

				$print_to_file = "EXCEPTION OCCURED\r\nDate\Time: " . date("Y-m-d H:i:s") . "\r\n
	            File name: $message->getFile()\r\nLine Number: $message->getLine()\nMessage: $message->getMessage()" . PHP_EOL;

				$open = fopen(LOG_PATH . $logfile, "a");
				fwrite($open, $print_to_file);
				fclose($open);

				return true;
			}
			else
			{

				$print_to_file = "### Log Entry ###\r\nDate\Time: " . date("Y-m-d H:i:s") . "\r\n$message\r\n" . PHP_EOL;

				$open = fopen(LOG_PATH . $logfile, "a");
				fwrite($open, $print_to_file);
				fclose($open);

				return true;
			}

		}
		else
		{
			$print_to_file = "### NOTICE ###\nDate\Time: " . date("Y-m-d H:i:s") . "\n
	            Cannot print a <null> message" . PHP_EOL;

			$open = fopen(LOG_PATH . $logfile, "a");
			fwrite($open, $print_to_file);
			fclose($open);

			return false;
		}
	}

	public function clean()
	{

		# Maximum size of log file allowed
		$max_size = $this->config->setting('log_file_max_size') * 1000000;

		chdir(LOG_PATH);

		foreach (glob("*.log") as $_file)
		{

			if (filesize($_file) >= $max_size)
			{

				$tar = new \PharData(basename($_file, ".log") . '-error-log-archive.tar');
				$tar->addFile($_file);
				$tar->compress(\Phar::GZ);

				# Move tarball to archives folder once complete
				if (is_readable('archive/' . $_file . '-error-log-archive.tar'))
				{
					rename($_file . '-error-log-archive.tar', 'archive/' . $_file . '-error-log-archive.tar');
				}
				else
				{
					rename($_file . '-error-log-archive.tar', 'archive/' . $_file . '_' . time() . '-error-log-archive.tar');
				}

			}
		}
	}
}