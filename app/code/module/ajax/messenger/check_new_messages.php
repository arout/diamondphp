<?php
ini_set('display_errors', '0');
error_reporting(E_NONE);

require_once '/../../../../../vendor/autoload.php';
require_once '/../../../../code/core/system/factory.php';

$rid = str_replace('read_', '', $_POST['rid']);

if( ! isset( $rid ) || is_null( $rid ) || empty( $rid ) || ! $_POST ) 
{
    header('Location:' . $app['config']->setting('site_url') .'error/_404');
    exit;
}

$sql = $app['database'];

$get = $sql->prepare("SELECT * FROM messenger_inbox WHERE flag_read = 0 AND flag_delete = 0 AND rid = ?");
$get->execute( array( $rid ) );

foreach( $get as $new ) {
    # Check for new messages, sent within the last 30 seconds        
    if( ( time() - 30 ) <= $new['date'] )
        echo '<a href='.$app['config']->setting('site_url').'/messenger/view/'.$new['mid'].'><strong>'.$new['sender'] . ':</strong> '.$new['subject'] . '</a><br>';
}