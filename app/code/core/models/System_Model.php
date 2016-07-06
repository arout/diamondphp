<?php
namespace Hal\Model;
ob_start();

class System_Model 
{	
	public 		$cache;
	protected 	$config;
	public 		$data;
	protected 	$db;
	public 		$errors = [];
	public 		$hash;
	public 		$load;
	public 		$log;
	public 		$session;
	protected 	$toolbox;
	
	public function __construct( $app ) 
	{
		$this->cache        = self::cache();
		$this->config       = $app['config'];
		$this->db           = $app['database'];
		$this->log          = $app['log'];
		$this->session      = self::session();
		$this->toolbox 	    = $app['toolbox'];
		//$this->load       = $load;
	}
	
	public function cache() 
	{
		// return \Application::run('Cache');
	}

	public function encrypt( $string ) 
	{
		# Encrypt using password_hash()
		$hash = new \Hal\Module\Hash;
		return $hash->encrypt($string);
	}
	
	public function verify($string, $base) 
	{
        # Decrypt hash from encrypt() 
        $hash = new \Hal\Module\Hash;
		return $hash->verify($string, $base);
	}

	public function session() 
	{
		return $this->toolbox["session"];
	}

	public function toolbox($helper) 
	{
		# Load a Toolbox helper
		return $this->toolbox["$helper"];
	}

}
ob_clean();
ob_flush();