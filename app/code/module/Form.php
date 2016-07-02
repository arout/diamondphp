<?php
namespace Fusion\Toolbox;

class Form {
	
	private $config;
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


	public function __construct( $config ) {

		$this->config = $config;
	}

	public function image( $data ) {
	    
	    $data['notify_max_size'] = $this->config->setting['notify_img_size'];
    	$data['max_size'] = $this->config->setting['img_size'];

		$j = 0; //Variable for indexing uploaded image 
					    
			$target_path = USER_PICS;
			
			if( ! is_dir( $target_path ) ) {
				mkdir( USER_PICS );
				chmod( USER_PICS, 0755 );
			}

			for ($i = 0; $i < count($_FILES['file']['name']); $i++) 
			{//loop to get individual element from the array
				$validextensions = array("jpeg", "jpg", "png", "gif");  //Extensions which are allowed
				$ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
				$file_extension = end($ext); //store extensions in the variable

				$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
				$j = $j + 1;//increment the number of uploaded images according to the files in array       
					      
				if (( filesize( $_FILES['file']['tmp_name'][$i] ) <= $data['max_size'] ) && in_array($file_extension, $validextensions)) 
				{
					if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
						$this->error[$j] = '<span class="label label-success">'.$j.'. Image uploaded successfully</span>';
						$this->img =[$_FILES['file']['name'][$i]];
					}
					else {//if file was not moved.
						$this->error[$j] = '<span class="label label-danger">'.$j.'. System error occured. Please try again.</span>';
						$this->error_count = $this->error_count + 1;
					}
					
				} 
				else {//if file size and file type was incorrect.
					$this->error[$j] = '<span class="label label-danger">'.$j.'. Invalid file size or extension</span>';
					$this->error_count = $this->error_count + 1;
				}
			}

	}
	
}