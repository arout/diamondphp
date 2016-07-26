<?php 

class Contact_Controller extends Hal\Controller\Base_Controller 
{

    public function index() 
    {
    	return $this->load->view('contact/index');
    }
    
    public function support() 
    {
        $data = '';

        if( $_POST )
        {
            # Sanitize user input
            $allowable_tags = '<h1><a><p><br>';
            $post 			= $this->toolbox('sanitize')->xss( $_POST );
        	$data 			= $post;
            $validate 		= $this->toolbox('validate');
            # Now we can check the submitted form to see if it is filled out properly
            $check_if_valid = $validate->form( $post, array(
                'email' => 'required|valid_email',
                'subject' => 'required|max_len,100',
                'message' => 'required|max_len,5000|min_len,10',
            ));

            if( $check_if_valid === TRUE )
            {
	            $mail = $this->toolbox('email');
	            $mail->send('andrew@diamondphp.com', 'Customer Care', $post['name'], $post['email'], $post['subject'], nl2br($post['message']) );
	            echo '<div class="alert alert-success">Thank you for contacting support. We will respond as soon as possible.</div>';
	        }
	        else {
	        	echo '<div class="alert alert-danger">';
	        	foreach( $check_if_valid as $error )
	        		echo $error .'<br>';
	        	echo '</div>';
	        }
        }

        return $this->load->view('contact/support', $data);
    }
}
