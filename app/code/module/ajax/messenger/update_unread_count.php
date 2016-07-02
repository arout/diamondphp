<?php
$rid = $_POST['rid'];
if( ! isset( $rid ) || is_null( $rid ) || empty( $rid ) || ! $_POST ) {
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

$q = "SELECT COUNT(rid) as count FROM messenger_inbox WHERE rid = ? AND flag_read = 0 AND flag_delete = 0";
$s = $sql->prepare($q);
$s->execute( array($rid) );
$count = $s->fetch(\PDO::FETCH_ASSOC);

echo $count = $count['count'];
