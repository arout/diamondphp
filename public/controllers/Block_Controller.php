<?php 
ini_set('max_execution_time', 3000000); //300 seconds = 5 minutes
ini_set('memory_limit',-1);

class Block_Controller extends Hal\Block\System_Block {
    
    # System Geo functions; do not remove
	public function get_city() 
	{
		$zip = (int) $this->route->param1;
		$get_city = $this->model('Geoip')->get_cities( $zip );
		// $this->load->block('geo/get_city.php');

		foreach( $get_city as $city )
			echo "<option value='{$city['citycode']}'>{$city['citycode']}</option>";
	}
    
    public function get_state() 
    {
		$zip = (int) $this->route->param1;
		$get_state = $this->model('Geoip')->get_states( $zip );

		foreach( $get_state as $state )
			echo "<option value='{$state['statecode']}'>{$state['statecode']}</option>";
	}
	# End system geo functions

	# Signup form user checks. Do not remove
	public function check_username() 
	{
		$username 	= $this->route->param1;
		$check 		= $this->model('Member')->get_member_id( $username );
		if( $check >= 1 )
			echo $check;
		else
			echo 0;
	}

	public function check_email() 
	{
		$email 		= $_REQUEST['email'];
		$check 		= $this->model('Member')->email_exists( $email );
		if( $check == TRUE )
			echo 1;
		else
			echo 0;
	}
	# End signup form user checks

	# Check for new messages
	public function check_new_messages()
	{
		$unread = $this->toolbox('messenger')->view_unread();
		if( $unread ) 
		{
			echo "<table>";
			foreach( $unread as $mail ) 
			{
				echo "<tr><td>{$mail['sender']}</td><td>{$mail['subject']}</td></tr>";
			}
			echo "</table>";
		}

	}

	public function update_unread_count()
	{
		$unread = $this->toolbox('messenger')->count_unread();
		if( $unread !== FALSE ) return $unread;
		return 0;
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
