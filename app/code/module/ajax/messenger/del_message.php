<?php
ini_set('display_errors', '0');
error_reporting(E_NONE);

$mid = str_replace('del_', '', $_POST['mid']);
require_once '/../../../../../vendor/autoload.php';
require_once '/../../../../code/core/system/factory.php';

if( ! isset( $mid ) || is_null( $mid ) || empty( $mid ) || ! $_POST ) 
{
    header('Location:' . $app['config']->setting('site_url') .'error/_404');
    exit;
}

$sql = $app['database'];

$q = "UPDATE messenger_inbox SET flag_delete = 1 WHERE mid = ?";
$s = $sql->prepare($q);
$s->execute( array($mid) );
