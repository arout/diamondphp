<?php
$zip = $_POST['zip'];
if( ! isset( $zip ) || is_null( $zip ) || empty( $zip ) || ! $_POST ) {
    header('Location: ../../../error/_404');
    exit;
}

ini_set('display_errors', '0');
error_reporting(0);
define('BASEPATH', dirname(__FILE__).'/../../../');
define('VENDOR_PATH', BASEPATH.'vendor/');
require_once(VENDOR_PATH.'pimple/pimple/src/Pimple/Container.php');
require_once(VENDOR_PATH.'pimple/pimple/src/Pimple/ServiceProviderInterface.php');
require_once('../../../vendor/Fusion/Config/Config.php');
require_once('../../../vendor/Fusion/Config/Database.php');
require_once('../../../vendor/Fusion/System/Init.php');

$sql = $container['database'];

$q = "SELECT citycode FROM zips WHERE code = ?";
$s = $sql->prepare($q);
$s->execute( array($zip) );

while($city = $s->fetch())
    echo "<option value='" . $city['citycode'] ."'>" . $city['citycode'] . "</option>";