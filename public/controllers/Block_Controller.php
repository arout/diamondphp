<?php 

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

}
