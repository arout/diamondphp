<?php
namespace Web\Controller;
use Hal\Block\System_Block;

ini_set('max_execution_time', 3000000); //300 seconds = 5 minutes
ini_set('memory_limit', -1);

class Block_Controller extends System_Block
{

	# System Geo functions; do not remove
	public function get_city()
	{
		$zip      = (int) $this->route->param1;
		$get_city = $this->model('Geoip')->get_cities($zip);
		// $this->load->block('geo/get_city.php');

		foreach ($get_city as $city)
		{
			echo "<option value='{$city['citycode']}'>{$city['citycode']}</option>";
		}

	}

	public function get_state()
	{
		$zip       = (int) $this->route->param1;
		$get_state = $this->model('Geoip')->get_states($zip);

		foreach ($get_state as $state)
		{
			echo "<option value='{$state['statecode']}'>{$state['statecode']}</option>";
		}

	}
	# End system geo functions

	# Signup form user checks. Do not remove
	public function check_username()
	{
		$username = $this->route->param1;
		$check    = $this->model('Member')->get_member_id($username);
		if ($check >= 1)
		{
			echo $check;
		}
		else
		{
			echo 0;
		}

	}

	public function check_email()
	{
		$email = $_REQUEST['email'];
		$check = $this->model('Member')->email_exists($email);
		if ($check == TRUE)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}

	}
	# End signup form user checks

	# Check for new messages
	public function check_new_messages()
	{
		$unread = $this->toolbox('messenger')->view_unread();
		if ($unread)
		{
			echo "<table>";
			foreach ($unread as $mail)
			{
				echo "<tr><td>{$mail['sender']}</td><td>{$mail['subject']}</td></tr>";
			}
			echo "</table>";
		}

	}

	public function update_unread_count()
	{
		$unread = $this->toolbox('messenger')->count_unread();
		if ($unread !== FALSE)
		{
			return $unread;
		}

		return 0;
	}

	public function flag_read()
	{
		# Toggle flag message as read / unread
		return $this->toolbox('messenger')->toggle_read($_POST['mid']);
	}

	public function flag_unread($mid)
	{
		/**
		 * Flag message as unread
		 */
		$read = $this->db->prepare(" UPDATE messenger_inbox SET flag_read = 0 WHERE mid = ? ");
		$read->execute([
			$mid,
		]);
		return $read;
	}

	public function flag_delete($mid)
	{
		/**
		 * Flag message as deleted
		 */
		$read = $this->db->prepare(" UPDATE messenger_inbox SET flag_delete = 1 WHERE mid = ? ");
		$read->execute([
			$mid,
		]);
		return $read;
	}

	/*---------------------------------------------------
		     * Toggle methods are for message icon toggle tables
	*/
	public function toggle_star($mid)
	{
		/**
		 * Toggle flag message as important / normal
		 */
		$mid   = str_replace('star_', '', $mid);
		$check = $this->db->prepare(" SELECT flag_star FROM messenger_inbox WHERE mid = ? ");
		$check->execute([
			$mid,
		]);
		foreach ($check as $c)
		{
			if ($c['flag_star'] == 'star_1')
			{
				$read = $this->db->prepare(" UPDATE messenger_inbox SET flag_star = 'star_0' WHERE mid = ? ");
				$read->execute([
					$mid,
				]);
			}
			else
			{
				$read = $this->db->prepare(" UPDATE messenger_inbox SET flag_star = 'star_1' WHERE mid = ? ");
				$read->execute([
					$mid,
				]);
			}
			return $read;
		}
	}

	public function toggle_read($mid)
	{
		/**
		 * Toggle flag message as read / unread
		 */
		$mid   = str_replace('read_', '', $_POST['mid']);
		$check = $this->db->prepare(" SELECT flag_read FROM messenger_inbox WHERE mid = ? ");
		$check->execute([
			$mid,
		]);
		foreach ($check as $c)
		{
			if ($c['flag_read'] == '1')
			{
				$read = $this->db->prepare(" UPDATE messenger_inbox SET flag_read = 0 WHERE mid = ? ");
				$read->execute([
					$mid,
				]);
			}
			else
			{
				$read = $this->db->prepare(" UPDATE messenger_inbox SET flag_read = 1 WHERE mid = ? ");
				$read->execute([
					$mid,
				]);
			}
			return $read;
		}
	}

	public function upload_img()
	{
		return $this->toolbox('form')->image();
	}

	public function image($data = '')
	{
		// echo json_encode('I see U');exit;
		$data['notify_max_size'] = $this->config->setting['notify_img_size'];
		$data['max_size']        = $this->config->setting['img_size'];
		$data['allowed_types']   = [$this->config->setting['img_type']];
		$data['member_id']       = $this->session->get('member_id');
		$img_gallery             = $this->toolbox('image')->get_images();

		$target_dir    = USER_PICS . $this->session->get('username') . '/';
		$target_file   = $target_dir . basename($_FILES["avatar"]["name"]);
		$uploadOk      = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

		$newfilename = $data['member_id'] . '_0.' . $imageFileType;
		$target_file = str_replace($_FILES["avatar"]["name"], $newfilename, $target_file);

		// Check if image file is a actual image or fake image
		if (isset($_POST["submit"]))
		{
			$check = getimagesize($_FILES["avatar"]["tmp_name"]);
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
			$next_number  = $img_int + 1;
			$newfilename2 = $data['member_id'] . '_' . $next_number . '.' . $imageFileType;
			$target_file  = str_replace($data['member_id'] . '_0.' . $imageFileType, $newfilename2, $target_file);
		}
		// Check file size
		if ($_FILES["avatar"]["size"] > $data['max_size'])
		{
			echo json_encode("Sorry, your file is too large.");
			$uploadOk = 0;
		}
		// Allow certain file formats
		if ($imageFileType != "jpg" &&
			$imageFileType != "jpeg" &&
			$imageFileType != "png" &&
			$imageFileType != "gif" &&
			$imageFileType != "JPG" &&
			$imageFileType != "JPEG" &&
			$imageFileType != "PNG" &&
			$imageFileType != "GIF")
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
			if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file))
			{
				// If $newfilename2 was set, use that, otherwise use $newfilename
				$new_avatar = $newfilename2 ?? $newfilename;
				// File has been uploaded and moved to the user directory successfully
				// Finally, we need to update the database to let it know that this is the new avatar
				$sql = $this->db->prepare("UPDATE users SET pic = ? WHERE member_id = ?");
				$sql->execute([$new_avatar, $data['member_id']]);

				$imguploaded = basename($_FILES["avatar"]["name"]);
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

		if (!empty($_FILES["avatar"]))
		{
			$avatar = $_FILES["avatar"];

			if ($avatar["error"] !== UPLOAD_ERR_OK)
			{
				echo json_encode("An error occurred.");
				exit;
			}

			// don't overwrite an existing file
			$i     = 0;
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

	public function multi_image($data = '')
	{
		foreach ($_FILES as $_FILES)
		{
			// echo json_encode('I see U');exit;
			$data['notify_max_size'] = $this->config->setting['notify_img_size'];
			$data['max_size']        = $this->config->setting['img_size'];
			$data['allowed_types']   = [$this->config->setting['img_type']];
			$data['member_id']       = $this->session->get('member_id');
			$img_gallery             = $this->toolbox('image')->get_images();

			$target_dir    = USER_PICS . $this->session->get('username') . '/';
			$target_file   = $target_dir . basename($_FILES["img_multi"]["name"]);
			$uploadOk      = 1;
			$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

			$newfilename = $data['member_id'] . '_0.' . $imageFileType;
			$target_file = str_replace($_FILES["img_multi"]["name"], $newfilename, $target_file);

			// Check if image file is a actual image or fake image
			if (isset($_POST["submit"]))
			{
				$check = getimagesize($_FILES["img_multi"]["tmp_name"]);
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
				$next_number  = $img_int + 1;
				$newfilename2 = $data['member_id'] . '_' . $next_number . '.' . $imageFileType;
				$target_file  = str_replace($data['member_id'] . '_0.' . $imageFileType, $newfilename2, $target_file);
			}
			// Check file size
			if ($_FILES["img_multi"]["size"] > $data['max_size'])
			{
				echo json_encode("Sorry, your file is too large.");
				$uploadOk = 0;
			}
			// Allow certain file formats
			if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
				&& $imageFileType != "GIF")
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
				if (move_uploaded_file($_FILES["img_multi"]["tmp_name"], $target_file))
				{
					// If $newfilename2 was set, use that, otherwise use $newfilename
					$new_avatar = $newfilename2 ?? $newfilename;
					// File has been uploaded and moved to the user directory successfully
					// Finally, we need to update the database to let it know that this is the new avatar
					$sql = $this->db->prepare("UPDATE users SET pic = ? WHERE member_id = ?");
					$sql->execute([$new_avatar, $data['member_id']]);

					$imguploaded = basename($_FILES["img_multi"]["name"]);
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

			if (!empty($_FILES["img_multi"]))
			{
				$avatar = $_FILES["img_multi"];

				if ($avatar["error"] !== UPLOAD_ERR_OK)
				{
					echo json_encode("An error occurred.");
					exit;
				}

				// don't overwrite an existing file
				$i     = 0;
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

	}
	### Mass image relocation ###
	// public function stock_img()
	// {
	// 	/*
	// 	 * All images, excluding file path
	// 	 */
	// 	$images = [];
	// 	$source_path = BASE_PATH.'media/images/stock/';
	// 	foreach(glob($source_path.'*') as $filename)
	// 	{
	// 		if( ! is_null( $filename) && ! empty( $filename) )
	// 			$images[$filename] = basename($filename);
	// 	}

	// 	return $images;
	// }

	// public function user_img_map()
	// {
	// 	$sql = "SELECT member_id, username FROM users WHERE username IS NOT NULL ORDER BY member_id ASC";
	// 	$users = $this->db->prepare( $sql );
	// 	$users->execute();

	// 	$source_path = BASE_PATH.'media/images/stock/';
	// 	$target_path = [];

	// 	foreach( $users as $user )
	// 	{
	// 		$name = $user['username'];
	// 		$target_path[$name] = USER_PICS.$name.'/';
	// 	}

	// 	return $target_path;

	// }

	// public function memberName( $id )
	// {
	// 	$sql = "SELECT username FROM users WHERE member_id = ?";
	// 	$users = $this->db->prepare( $sql );
	// 	$users->execute( [$id] );
	// 	foreach( $users as $user )
	// 		return $user['username'];
	// }

	// public function update_imgs()
	// {
	// 	/*
	// 	 * Array containing all stock images
	// 	 * 100k images total
	// 	 */
	// 	$stockmap 	= self::stock_img();
	// 	/*
	// 	 * Move to this directory if match
	// 	 */
	// 	$target_dir = self::user_img_map();

	// 	$checkname = [];
	// 	$checkdir  = [];

	// 	foreach( $target_dir as $user => $destination)
	// 	{
	// 		$checkname[$user] = $user;
	// 		$checkdir[$user] = $destination;
	// 	}

	// 	foreach( $stockmap as $imgpath => $img ) {

	// 		$id = substr($img, 0, -6);
	// 		$user = self::memberName($id);

	// 		if( in_array( $user, $checkname ) )
	// 		{
	// 			rename( "{$imgpath}", $checkdir[$user].$img );
	// 			echo "Moving {$imgpath} to ---> {$checkdir[$user]}<br>";
	// 		}
	// 	}

	// }
	### Image relocation ###
}
