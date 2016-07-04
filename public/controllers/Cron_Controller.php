<?php 

class Cron_Controller extends Hal\Controller\Base_Controller {
    
    private $ip_address;

    public function __construct($app) {
    	parent::__construct($app);
    	$this->ip_address = $this->toolbox('geoip')->ip();

    	# IPv4 and IPv6 addresses that are allowed access to cron management
    	$whitelist = 
    	[
    		'v4' => [ '73.187.22.165' ],
    		'v6' => [ '2601:983:801:d4f3:5db6:3c7d:3329:ac44' ]
    	];

    	if( ! in_array( $this->ip_address, $whitelist['v4'] ) && 
    		! in_array( $this->ip_address, $whitelist['v6'] ) )
    		return $this->redirect('error/_404');
    }
    
    public function index() {

    	return $this->load->view('cron/index');
    }
    
}
