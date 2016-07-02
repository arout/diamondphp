<?php
namespace Hal\Model;
ob_start();

class System_Model {
	
	protected $db;
	protected $config;
	// Sessions
	public $session;
	// Data caching helper
	public $cache;
	// Data accessed by views / controllers
	public $data;
	public $hash;
	public $load;
	protected $toolbox;
	
	public function __construct( $db, $_toolbox, $session, $config ) {
	
		$this->db           = $db;
		$this->config       = $config;
		//$this->load       = $load;
		$this->toolbox 	    = $_toolbox;
		$this->session      = self::session();
		//$this->hash         = self::hash();
		$this->cache        = self::cache();
	}
	
	public function cache() {
		// return \Application::run('Cache');
	}

	public function encrypt( $string ) {

		# Encrypt using password_hash()
		$hash = new \Hal\Module\Hash;
		return $hash->encrypt($string);
	}
	
	public function verify($string, $base) {
        
        # Decrypt hash from encrypt() 
        $hash = new \Hal\Module\Hash;
		return $hash->verify($string, $base);
	}

	public function session() {

		return $this->toolbox["session"];
	}

	public function toolbox($helper) {

		# Load a Toolbox helper
		return $this->toolbox["$helper"];
	}

}
ob_clean();
ob_flush();