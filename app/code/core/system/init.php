<?php

$file = BASE_PATH.'.env';
if (!file_exists($file)) {
	exit('<h3><span style="color: red;">.env</span> global configuration file not found. Exiting...</h3>');
}

require_once BASE_PATH.'vendor/autoload.php';
require_once BASE_PATH.'app/code/core/system/factory.php';
require_once BASE_PATH.'app/code/core/system/paths.php';