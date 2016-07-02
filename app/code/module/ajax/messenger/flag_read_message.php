<?php
$mid = str_replace('read_', '', $_POST['mid']);
if( ! isset( $mid ) || is_null( $mid ) || empty( $mid ) || ! $_POST ) {
    header('Location: ../../../../error/_404');
    exit;
}

ini_set('display_errors', '0');
error_reporting(0);
define('BASEPATH', dirname(__FILE__).'/../../../../');
define('VENDOR_PATH', BASEPATH.'vendor/');
require_once(VENDOR_PATH.'pimple/pimple/src/Pimple/Container.php');
require_once(VENDOR_PATH.'pimple/pimple/src/Pimple/ServiceProviderInterface.php');
require_once('../../../../vendor/Fusion/Config/Config.php');
require_once('../../../../vendor/Fusion/Config/Database.php');
require_once('../../../../vendor/Fusion/System/Init.php');

$sql = $container['database'];

$q = "UPDATE messenger_inbox SET flag_read = 1 WHERE mid = ?";
$s = $sql->prepare($q);
$s->execute( array($mid) );
