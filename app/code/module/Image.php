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

	public function __construct($config, $toolbox)
	{
		$this->config = $config;
		$this->toolbox = $toolbox;
	}

	public function upload_single_img()
	{
		$data['notify_max_size'] = $this->config->setting['notify_img_size'];
		$data['max_size'] = $this->config->setting['img_size'];
		$data['member_id'] = $this->session->get('member_id');
		$img_gallery = $this->toolbox('image')->get_images();

		$target_dir = USER_PICS . $this->session->get('username') . '/';
		$target_file = $target_dir . basename($_FILES["img_single"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

		$newfilename = $data['member_id'] . '_0.' . $imageFileType;
		$target_file = str_replace($_FILES["img_single"]["name"], $newfilename, $target_file);

		// Check if image file is a actual image or fake image
		if (isset($_POST["submit"]))
		{
			$check = getimagesize($_FILES["img_single"]["tmp_name"]);
			if ($check !== false)
			{
				echo json_encode("File is an image - " . $check["mime"] . ".");
				$uploadOk = 1;
			}
			else
			{
				echo json_encode("File is not an image.");
				$uploadOk = 0;
			}
		}

		// Check if file already exists
		if (file_exists($target_file))
		{
			// Image already exists, so we'll get all the current images,
			// find the last img number (the "_0", "_1", etc portion of the img names)
			// and assign the next number to the img

			# Get the full filename of most recently uploaded image
			$get_last_img = array_pop($img_gallery);
			# Explode the file name at the '.'
			$get_last_img_num = explode('.', $get_last_img);
			# and get the number to the left of the decimal
			$img_int = substr($get_last_img_num[0], -1, 1);
			# Add 1 to the above number and assign it to our uploaded image
			$next_number = $img_int + 1;
			$newfilename2 = $data['member_id'] . '_' . $next_number . '.' . $imageFileType;
			$target_file = str_replace($data['member_id'] . '_0.' . $imageFileType, $newfilename2, $target_file);
		}
		// Check file size
		if ($_FILES["img_single"]["size"] > $data['max_size'])
		{
			echo json_encode("Sorry, your file is too large.");
			$uploadOk = 0;
		}
		// Allow certain file formats
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif")
		{
			echo json_encode("Sorry, only JPG, JPEG, PNG and GIF files are allowed.");
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0)
		{
			echo json_encode("Sorry, your file was not uploaded.");
			// if everything is ok, try to upload file
		}
		else
		{
			if (move_uploaded_file($_FILES["img_single"]["tmp_name"], $target_file))
			{
				// If $newfilename2 was set, use that, otherwise use $newfilename
				$new_avatar = $newfilename2 ?? $newfilename;
				// File has been uploaded and moved to the user directory successfully
				// Finally, we need to update the database to let it know that this is the new avatar
				$sql = $this->db->prepare("UPDATE users SET pic = ? WHERE member_id = ?");
				$sql->execute([$new_avatar, $data['member_id']]);

				$imguploaded = basename($_FILES["img_single"]["name"]);
				echo json_encode("The file $imguploaded has been uploaded.");
			}
			else
			{
				echo json_encode("Sorry, there was an error uploading your file.");
			}
		}

		// if (!is_dir($target_path))
		// {
		// 	mkdir(USER_PICS);
		// 	chmod(USER_PICS, 0755);
		// }

		if (!empty($_FILES["img_single"]))
		{
			$avatar = $_FILES["img_single"];

			if ($avatar["error"] !== UPLOAD_ERR_OK)
			{
				echo json_encode("An error occurred.");
				exit;
			}

			// don't overwrite an existing file
			$i = 0;
			$parts = pathinfo($name);
			while (file_exists(USER_PICS . $name))
			{
				$i++;
				$name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
			}

			// preserve file from temporary directory
			$success = move_uploaded_file($avatar["tmp_name"],
				USER_PICS . $name);
			// if (!$success)
			// {
			// 	echo json_encode("Unable to save file.");
			// 	exit;
			// }

			// set proper permissions on the new file
			//chmod(USER_PICS . $name, 0644);
		}
	}

	public function get_images()
	{
		$user_img_dir = USER_PICS . $this->toolbox('session')->get('username') . '/';
		$imgs = [];

		foreach (glob($user_img_dir . '*') as $filename)
		{
			$imgs[basename($filename)] = basename($filename);
		}

		return $imgs;
	}

	public function upload()
	{
		$data['notify_max_size'] = $this->config->setting['notify_img_size'];
		$data['max_size'] = $this->config->setting['img_file_size'];

		$error = 0; //Variable for indexing uploaded image

		$target_path = USER_PICS;

		$new_name = $this->toolbox('session')->get('username');
		$target_path = $target_path . $new_name;

		if (!is_dir($target_path))
		{
			mkdir($target_path);
			chmod($target_path, 0755);
		}

		for ($i = 0; $i < count($_FILES); $i++)
		{
//loop to get individual element from the array
			$validextensions = ["jpeg", "jpg", "png"]; //Extensions which are allowed
			$ext = explode('.', basename($_FILES['image']['name'])); //explode file name from dot(.)
			$file_extension = end($ext); //store extensions in the variable

			// var_dump($file_extension);exit;
			$target_path = $target_path . '/' . $this->toolbox('session')->get('member_id') . "_0." . $ext[count($ext) - 1]; //set the target path with a new name of image
			$error = $error + 1; //increment the number of uploaded images according to the files in array
			if (($_FILES["image"]["size"] < $data['max_size']) && in_array($file_extension, $validextensions))
			{
				if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path))
				{
//if file moved to uploads folder
					$avatar = $this->toolbox('session')->get('username') . '/' . $this->toolbox('session')->get('member_id') . "_0." . $ext[count($ext) - 1];
					echo $error . ').<div class="alert alert-success text-center">
	                				<img src="' . USER_PICS_URL . $avatar . '" style="max-height: 68px" class="pull-left">
	                				<h3><i class="fa fa-check"></i> Profile image updated</div></h3><br/><br/>';
					$r = $this->toolbox('database')->prepare("
						UPDATE users
						SET pic = ?
						WHERE username = ?
				    ");

					$new_pic = $this->toolbox('session')->get('member_id') . "_0." . $ext[count($ext) - 1];
					$r->execute([$new_pic, $this->toolbox('session')->get('username')]);
					return TRUE;
				}
				else
				{
//if file was not moved.
					echo $error . ').<span id="error">please try again!.</span><br/><br/>';
					$this->error_count = $this->error_count + 1;
					$this->toolbox("log")->save('File not moved');
					return FALSE;
				}
			}
			else
			{
//if file size and file type was incorrect.
				echo $error . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
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
