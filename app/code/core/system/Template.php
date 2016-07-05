<?php

namespace Hal\Core;

class Template 
{
	public 		$app;
	protected 	$config;
	protected 	$load;
	protected 	$route;
	public 		$session;
	# Is this the admin area?
	private 	$is_admin = FALSE;

	public function __construct($c, $data = NULL) 
	{
		$this->app 		= $c;
		$this->config 	= $c['config'];
		$this->load 	= $c['load'];
		$this->route 	= $c['router'];
		$this->session 	= $c['session'];
		if( $this->route->controller == 'Admin' )
			$this->is_admin = TRUE;
	}

	public function header() 
	{
		$data['file'] = 'header.php';
		$app = $this->app;

		if( $this->is_admin === FALSE ) 
		{
			if ( is_readable( $this->config->setting('template_folder') . 'header.php' ) )
				$this->load->template( 'header.php', null, $this->app );
			else
				// $this->session->error['template']['header_not_found'] = 'Could not load '. $data['file'];
				$this->load->view( 'error/template_header', $data );
		}
		else {
			if ( is_readable( $this->config->setting('admin_template_folder') . 'header.php' ) )
				$this->load->admin_template( 'header.php', null, $this->app );
			else
				// $this->session->error['template']['header_not_found'] = 'Could not load '. $data['file'];
				$this->load->view( 'error/template_header', $data );
		}
	}

	public function body() 
	{
		$data['file'] = 'body.php';
		$app = $this->app;

		if ( is_readable( $this->config->setting('template_folder') . $data['file'] ) )
		{
			$this->load->template( $data['file'], $data, $app );
		}
		else {
			// $this->session->error['template']['body_not_found'] = 'Could not load '. $data['file'];
			$this->load->view( 'error/template_body', $data );
		}
	}

	public function footer() 
	{
		$data['file'] = 'footer.php';
		$app = $this->app;

		if( $this->is_admin === FALSE ) 
		{
			if ( is_readable( $this->config->setting('template_folder') . 'footer.php' ) )
				$this->load->template( 'footer.php', null, $this->app );
			else
				// $this->session->error['template']['footer_not_found'] = 'Could not load '. $data['file'];
				$this->load->view( 'error/template_footer', $data );
		}
		else {
			if ( is_readable( $this->config->setting('admin_template_folder') . 'footer.php' ) )
				$this->load->admin_template( 'footer.php', null, $this->app );
			else
				// $this->session->error['template']['footer_not_found'] = 'Could not load '. $data['file'];
				$this->load->view( 'error/template_footer', $data );
		}
	}

}