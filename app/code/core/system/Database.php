<?php
namespace Hal\Core;
use \PDO as PDO;

/*
 * working example
 * 
 * $query = $_application['database']->sql->prepare('SELECT * FROM users');
 * $query->execute();
 * 
 * foreach ($query as $u)
 *	echo $u['username'];
 *
 */
class Database extends PDO {
	
	public $sql;
	
	public function __construct( $config ) 
	{
		parent::__construct("mysql:host=".$config->setting('db_host').";dbname=".$config->setting('db_name')."", $config->setting('db_user'), $config->setting('db_pass'));
		PDO::setAttribute( PDO::ATTR_EMULATE_PREPARES, false ); 
		PDO::setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}

	public function run()
	{
		return;
	}
}
