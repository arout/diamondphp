<?php

class Error_Controller extends Hal\Controller\Base_Controller {
    
    // public function __construct($app) {
    // 	parent::__construct($app);
    // }
    // Error type ( 403, 404, 500, etc )
    public $type;
    
    public function index() {
        
        $this->load->view('error/index');
    }
    
    public function _403() {
        
        $this->type = 403;
        $this->load->view('error/_403');
    }
    
    public function _404() {
        
        $this->type = 404;
        $this->load->view('error/_404');
    }
    
    public function _500() {
        
        $this->type = 500;
        $this->load->view('error/_500');
    }

}