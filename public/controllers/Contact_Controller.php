<?php 

class Contact_Controller extends Hal\Controller\Base_Controller 
{

    public function index() 
    {
    	return $this->load->view('contact/index');
    }
    
    public function support() 
    {
        if( $_POST )
        {
            $mail = $this->toolbox('email');
            # Sanitize user input
            $allowable_tags = '<h1><a>';
            $post = $this->toolbox('validate')->xss_clean( $_POST );
            # Now we can check the submitted form to see if it is filled out properly
            $check_if_valid = $this->toolbox('validate')->form( $post, array(
                'email' => 'required|valid_email',
                'subject' => 'required|max_len,100',
                'message' => 'required|max_len,5000|min_len,10',
            ));

            echo $post['message'];
        }

        return $this->load->view('contact/support');
    }
}
