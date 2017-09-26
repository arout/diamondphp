<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

require_once '/../../../../../vendor/autoload.php';
require_once '/../../../../code/core/system/factory.php';

$mid = str_replace('read_', '', $_POST['mid']);

if (!isset($mid) || is_null($mid) || empty($mid) || !$_POST)
{
	header('Location:' . $app['config']->setting('site_url') . 'error/_404');
	exit;
}

$sql = $app['database'];

$q = "UPDATE messenger_inbox SET flag_read = 1 WHERE mid = ?";
$s = $sql->prepare($q);
$s->execute([$mid]);
