<?php

namespace Hal\Core;

class Template {

	public $app;
	protected $config;
	protected $load;
	public $session;

	public function __construct($c, $data = NULL) {

		$this->app 		= $c;
		$this->config 	= $c['config'];
		$this->load 	= $c['load'];
		$this->session 	= $c['session'];
	}

	public function header() {

		$data['file'] = 'header.php';
		$app = $this->app;

		if ( is_readable( $this->config->setting('template_folder') . 'header.php' ) ){
			$this->load->template( 'header.php', null, $this->app );
		}
		else{
			// $this->session->error['template']['header_not_found'] = 'Could not load '. $data['file'];
			$this->load->view( 'error/template_header', $data );
		}
		return $this->body();
	}

	public function body() {

		$data['file'] = 'body.php';
		$app = $this->app;

		if ( is_readable( $this->config->setting('template_folder') . $data['file'] ) ){
			$this->load->template( $data['file'], $data, $app );
		}
		else{
			// $this->session->error['template']['body_not_found'] = 'Could not load '. $data['file'];
			$this->load->view( 'error/template_body', $data );
		}
	}

	public function footer() {

		$data['file'] = 'footer.php';
		$app = $this->app;

		if ( is_readable( $this->config->setting('template_folder') . $data['file'] ) ) {
			$this->load->template( $data['file'], $data, $app );
		}
		else {
			// $this->session->error['template']['footer_not_found'] = 'Could not load '. $data['file'];
			$this->load->view( 'error/template_footer', $data );
		}
	}


}