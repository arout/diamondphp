<?php
$mid = $_POST['mid'];
$mid = str_replace('star_', '', $mid);

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

        /**
         * Flag message as important
         */
        $check = $sql->prepare(" SELECT flag_star FROM messenger_inbox WHERE mid = ? ");
        $check->execute( array( $mid ) );
        
        foreach( $check as $c ) {
            
            if( $c['flag_read'] == 'star_1' ) {
                $read = $sql->prepare(" UPDATE messenger_inbox SET flag_star = 'star_0' WHERE mid = ? ");
                $read->execute( array( $mid ) );
            }
            else {
                $read = $sql->prepare(" UPDATE messenger_inbox SET flag_star = 'star_1' WHERE mid = ? ");
                $read->execute( array( $mid ) );
            }
            
            return $read;
        }
