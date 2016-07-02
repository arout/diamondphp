<?php

function apc() {

	// Check for APC
	if (extension_loaded('apc'))
	    return true;
	return false;
	
	//	echo '<td class="alert alert-success">Enabled</td>';
	// else 
	//	echo '<td class="alert alert-danger">Not enabled. This is not a fatal error. APC is optional; you may still install Diamond PHP.</td>';

}

function memcached() {

	// Check for Memcached
	if (extension_loaded('memcached'))
		return true;
    return false;
}

function mod_rewrite() {

	if ( array_key_exists('mod_rewrite', $_SERVER) || array_key_exists('REDIRECT_mod_rewrite', $_SERVER) || array_key_exists('REDIRECT_HTTP_MOD_REWRITE', $_SERVER) ) 
		return true;
	return false;

}

function pdo() {
    if ( extension_loaded('pdo') )
        return true;
    return false;
}

function php_ver() {

	// Detect PHP version being run
	return PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION.'.'.PHP_RELEASE_VERSION;
}

$memcached = memcached();
$mod_rewrite = mod_rewrite();
$pdo = pdo();
$php_ver = php_ver();

function continue_install( $mod_rewrite, $pdo, $php_ver ) {

	if ($mod_rewrite == true && $pdo == true && $php_ver >= 7.0)
		echo '<div class="row alert alert-success text-center"><h3>Installation may continue</h3>
		Next, open the Config.php file, located in <code class="red">'.BASE_PATH.'app/code/core/Config.php</code>, and edit your site settings before using Diamond PHP.</div><button>Continue</button>';
	else 
		echo '<div class="row alert alert-danger text-center"><h3>Diamond PHP cannot be run on this system</h3>Please review the chart above to review and correct errors.</div><button disabled>Continue</button>';

}
?>

<br>
<legend>Installation information and requirements</legend>

<table class="table">

	<tr style="background-color: #F0F0F0"><th>System Check</th><th>Result</th></tr>
	
	<tr><td><strong>PHP version 7.0 or later</strong></td><td <?php if (php_ver() >= 7.0) echo 'class="alert alert-success"'; else echo 'class="alert alert-danger"'; ?> >
	<?php if (php_ver() >= 7.0) echo 'Your PHP version ('.php_ver().') meets the minimum requirements'; else echo 'Installation cannot continue. You must have PHP version 7.0 or higher. Your PHP version: <strong>'.php_ver().'</strong>'; ?></td></tr>
	
	<tr><td><strong>Memcached extension</strong></td><td <?php if(memcached()) echo 'class="alert alert-success"'; else echo 'class="alert alert-warning"'; ?> >
	<?php if(memcached()) echo 'Memcached installed and running'; 
	else echo 'Could not connect to Memcached server. Please confirm that you have Memcached installed, and that it is running. Many servers have it installed, but turned off by default.<br>This is not a fatal error. You may still use Diamond PHP.'; ?></td></tr>
	
	<tr><td><strong>Mod Rewrite</strong></td><td <?php if (mod_rewrite()) echo 'class="alert alert-success"'; else echo 'class="alert alert-danger"'; ?> >
	<?php if (mod_rewrite()) echo 'mod_rewrite is enabled'; else echo 'Apache module <code>mod_rewrite</code> was not detected. Installation cannot continue.'; ?></td></tr>
    
    <tr><td><strong>PDO extension</strong></td><td <?php if (pdo()) echo 'class="alert alert-success"'; else echo 'class="alert alert-danger"'; ?> >
	<?php if (pdo()) echo 'PDO extension is enabled'; else echo 'PHP extension <code>PDO</code> was not detected. Installation cannot continue.'; ?></td></tr>
	
</table>

<?php return continue_install( $mod_rewrite, $pdo, $php_ver ); ?>
