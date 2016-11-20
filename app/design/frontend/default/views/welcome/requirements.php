<?php

function apc() {

	// Check for APC
	if (extension_loaded('apc'))
		echo '<td class="alert alert-success">Enabled</td>';
	else 
		echo '<td class="alert alert-danger">Not enabled. This is not a fatal error. APC is optional; you may still install Diamond PHP.</td>';

}

function continue_install() {

	$php = PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION.'.'.PHP_RELEASE_VERSION;
	if (array_key_exists('HTTP_MOD_REWRITE', $_SERVER)&$php >= 7.0)
		echo '<div class="row alert alert-success text-center"><h3>Installation may continue</h3>
		Next, open the Config.php file, located in <code class="red">'.BASE_PATH.'app/code/core/Config.php</code>, and edit your site settings before using Diamond PHP.</div>';
	else 
		echo '<div class="row alert alert-danger text-center"><h3>Diamond PHP cannot be run on this system</h3>Please review the chart above to review and correct errors.</div>';

}

function memcached() {

	// Check for Memcached
	if (extension_loaded('memcached'))
		echo '<td class="alert alert-success">Enabled</td>';
	else
		echo '<td class="alert alert-warning">Could not connect to Memcache server. Please confirm that you have Memcached installed, and that it is running.
            Many servers have it installed, but turned off by default.<br>
            This is not a fatal error. You may still use Diamond PHP; however, to improve the scalability of your website as it attracts higher amounts
            of traffic, it is highly recommended to install Memcached.</td>';
}

function mod_rewrite() {

	if (array_key_exists('HTTP_MOD_REWRITE', $_SERVER)) 
		echo '<td class="alert alert-success">Enabled</td>';
	else 
		echo '<td class="alert alert-danger">Not enabled</td>';

}

function php_ver() {

	// Detect PHP version being run
	$php = PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION.'.'.PHP_RELEASE_VERSION;
	if ($php >= 7.0) 
		echo '<td class="alert alert-success">Your PHP version ('.$php.') meets the minimum requirements</td>';
	else 
		echo '<td class="alert alert-danger">Installation cannot continue. You must have PHP version 7.0 or higher.
	Your PHP version: <strong>'.$php.'</strong></td>';

}

?>

<legend>Installation information and requirements</legend>

<table class="table">

	<tr><th>Required</th><th>Result</th></tr>
	<tr><td>PHP version 7.0 or later</td><td <?php if ($php >= 7.0) echo 'class="alert alert-success"'; else echo 'class="alert alert-danger"'; ?> >
	<?php if ($php >= 7.0) echo 'Your PHP version ('.$php.') meets the minimum requirements'; else echo 'Installation cannot continue. You must have PHP version 7.0 or higher. 
	Your PHP version: <strong>'.$php.'</strong>'; ?></td></tr>
	<tr><td>Memcache installed and running</td><td <?php if($mcache == 'pass') echo 'class="alert alert-success"'; else echo 'class="alert alert-danger"'; ?> >
	<?php if($mcache == 'pass') echo 'Memcache installed and running'; 
	else echo 'Could not connect to Memcache server. Please confirm that you have Memcache installed, and that it is running. Many servers have it installed, but turned off
		by default.<br>This is not a fatal error. You may still use Diamond PHP; however, the session management and caching features will not be functional, and you will need 
	to use PHP\'s builtin functions (or create your own) if those features are needed.'; ?></td></tr>

</table>
