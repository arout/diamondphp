<?php
$rid = str_replace('read_', '', $_POST['rid']);

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

$get = $sql->prepare("SELECT * FROM messenger_inbox WHERE flag_read = 0 AND flag_delete = 0 AND rid = ?");
$get->execute( array( $rid ) );

foreach( $get as $new ) {
    # Check for new messages, sent within the last 30 seconds        
    if( ( time() - 30 ) <= $new['date'] )
        echo '<a href='.$container['config']->setting('site_url').'/messenger/view/'.$new['mid'].'><strong>'.$new['sender'] . ':</strong> '.$new['subject'] . '</a><br>';
}
