<?php
namespace Hal\Module;

class Image 
{
	private $config;
	private $toolbox;
	public $errors;
	/**
	 * Keep track of number of invalid uploads with $error_count below.
	 * It's primary purpose is for form processing; i.e.,
	 * 
	 * if( $this->toolbox('form')->error_count === 0 ) {
	 *
	 *		// Perform SQL query if no errors
	 *
	 *	}
	 *
	 */
	public $error_count = 0;
	/**
	 * Keep track of successful uploads for further processing.
	 * 
	 * i.e.,
	 * 
	 * foreach( $this->toolbox('form')->img as $image ) {
	 *
	 *		// Perform SQL query if no errors
	 *
	 *	}
	 *
	 */
	public $img = [];


	public function __construct( $config, $toolbox ) 
	{
		$this->config = $config;
		$this->toolbox = $toolbox;
	}

	public function get_images()
	{
		$user_img_dir = USER_PICS . $this->toolbox('session')->get('username').'/';

		foreach(glob($user_img_dir.'*') as $filename)
		{
		    echo basename($filename) . "\n";
		}
	}

	public function upload() 
	{
	    $data['notify_max_size'] = $this->config->setting['notify_img_size'];
    	$data['max_size'] = $this->config->setting['img_file_size'];

		$error = 0; //Variable for indexing uploaded image 
					    
		$target_path = USER_PICS;
		
		$new_name = $this->toolbox('session')->get('username');
		$target_path = $target_path . $new_name;
		
		if( ! is_dir( $target_path ) ) 
		{
			mkdir( $target_path );
			chmod( $target_path, 0755 );
		}

	    for ($i = 0; $i < count($_FILES); $i++) 
	    {//loop to get individual element from the array
	        $validextensions = ["jpeg", "jpg", "png"];  //Extensions which are allowed
	        $ext = explode('.', basename($_FILES['image']['name']));//explode file name from dot(.) 
	        $file_extension = end($ext); //store extensions in the variable
	        
	      	// var_dump($file_extension);exit;
			$target_path = $target_path .'/'. $this->toolbox('session')->get('member_id') . "_0." . $ext[count($ext) - 1];//set the target path with a new name of image
	        $error = $error + 1;//increment the number of uploaded images according to the files in array       
		  if (($_FILES["image"]["size"] < $data['max_size']) && in_array($file_extension, $validextensions)) 
		  {
	            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) 
	            {//if file moved to uploads folder
	            	$avatar = $this->toolbox('session')->get('username').'/'.$this->toolbox('session')->get('member_id') . "_0." . $ext[count($ext) - 1];
	                echo $error. ').<div class="alert alert-success text-center">
	                				<img src="'. USER_PICS_URL.$avatar .'" style="max-height: 68px" class="pull-left">
	                				<h3><i class="fa fa-check"></i> Profile image updated</div></h3><br/><br/>';
	                $r = $this->toolbox('database')->prepare("
						UPDATE users 
						SET pic = ?
						WHERE username = ?
				    ");


				    $new_pic = $this->toolbox('session')->get('member_id') . "_0." . $ext[count($ext) - 1];
				    $r->execute( array( $new_pic, $this->toolbox('session')->get('username') ) );
	                return TRUE;
	            } 
	            else 
	            {//if file was not moved.
	                echo $error. ').<span id="error">please try again!.</span><br/><br/>';
                    $this->error_count = $this->error_count + 1;
                    $this->toolbox("log")->save('File not moved');
                    return FALSE;
	            }
	        } 
	        else 
	        {//if file size and file type was incorrect.
	            echo $error. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
                $this->error_count = $this->error_count + 1;
                $this->toolbox("log")->save('File size or type incorrect');
                return FALSE;
	        }
	    }
			
	}
	
	public function toolbox($helper) 
	{
        # Load a Toolbox helper
        return $this->toolbox["$helper"];
    }

}
