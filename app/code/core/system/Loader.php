<?php
namespace Hal\Core;

class Loader {	
	
	// The file being requested
	public $_file;
	// The directory containing requested file
	protected $_dir;
	protected $db;
	public $toolbox;
	public $data;
	protected $config;
	protected $session;
	
	public function __construct( $c ) {
	
	    $this->db 		= $c['database'];
	    $this->toolbox 	= $c['toolbox'];
	    $this->config 	= $c['config'];
	    $this->session 	= $c['session'];
	}

	public function block($file, $data = NULL ){
    	
        $dir = BLOCKS_DIR;

		if( is_readable($dir.$file) ) {
			require_once( $dir.$file );
		}
		else {
			$filename = $dir.$file;
			self::viewerror($filename, $data);
		}
    }
    
    public function file($file, $full_path = false) {
        
        if(!$full_path) {
        	# Start file search from root directory by default
			$filename = BASE_PATH.$file;
		}
		else {
			# Or search full path, if specified
			$filename = $file;
		}

		if ( is_readable( $filename ) ) {
			require_once $filename;
		} 
		else {
			echo '<div class="alert alert-danger"><h1>Fatal Error</h1>
			<h4>Could not load file: '. $filename .'</h4>
			Please ensure that the file exists and permission to read the file (644)
			</div>';
		}
	}

	public function model($file) {
	
        $dir = MODELS_DIR;
		$file = ucwords($file);
		
		if( is_readable( $dir.$file.'Model.php' ) ) {
			require_once( $dir.$file.'Model.php' );
			$this->model = $file.'Model';
			return $this->model = new $this->model($this->db, $this->toolbox, $this->toolbox, $this->config);
		}
		else
			require_once( $dir.'errors/model.php' );
    }

    public function tool($tool) {
		
		return $this->toolbox["$tool"];
	}

    public function toolbox($helper) {

	# Load a Toolbox helper
	return $this->toolbox["$helper"];
    }
	
    public function view($file, $data = NULL ){
    	
        $dir = VIEWS_DIR;

		if( is_readable($dir.$file.'.php') ) {
			require_once( $dir.$file.'.php' );
		}
		elseif( is_readable($dir.$file.'.inc') ) {
			require_once( $dir.$file.'.php' );
		}
		elseif( is_readable($dir.$file.'.html') ) {
			require_once( $dir.$file.'.php' );
		}
		elseif( is_readable($dir.$file.'.htm') ) {
			require_once( $dir.$file.'.php' );
		}
		elseif( is_readable($dir.$file.'.shtml') ) {
			require_once( $dir.$file.'.php' );
		}
		else {
			$filename = $dir.$file;
			self::viewerror($filename, $data);
		}
    }

    public function viewerror($file, $data = NULL){
    	
        $dir = VIEWS_DIR;

		if( is_readable($dir.$file.'.php') ) {
			require_once( $dir.$file.'.php' );
		}
		else {
			$filename = $file;
			require_once($dir.'error/view.php');
		}
    }

    public function template($file, $data = NULL, $app = null){
		
        $dir  = $this->config->setting('template_folder');
        $file = $dir.$file;

		if( is_readable($file) ) {
			require_once( $file );
		}
		else
			self::viewerror('errors/template.php', $data);
    }
}
