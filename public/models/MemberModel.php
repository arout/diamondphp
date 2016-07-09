<?php

class MemberModel extends Hal\Model\System_Model 
{
	public function select($limit="0") 
	{
		if( $limit != "0" ) {
			$limit1 = $limit*10;
			$q = "SELECT * FROM users LIMIT $limit1, 20";
		}
		else {
			$limit = "0, 20";
			$q = "SELECT * FROM users LIMIT {$limit}";
		}

		$r = $this->db->prepare($q);
		$r->execute();
		
		return $r;
	}
    
    public function get_member_id( $username ) 
    {
        # Fetch member ID
        $username = $this->toolbox('sanitize')->xss( $username );
		$r = $this->db->prepare("SELECT member_id FROM users WHERE username = ?");
		$r->execute( array( $username ) );
		if( $r ) 
		{
			foreach( $r as $r )
            	return $r['member_id'];
		}
        return FALSE;
	}

	public function email_exists( $email ) 
    {
        # Fetch member ID
        $email = $this->toolbox('sanitize')->xss( $email );
		$r = $this->db->prepare("SELECT email FROM users WHERE email = ?");
		$r->execute( array( $email ) );
		if( $r ) 
		{
			foreach( $r as $r )
            	return TRUE;
		}
        return FALSE;
	}
    
    public function get_username( $memberid ) 
    {
        # Fetch username
        $id = $memberid;
		$r = $this->db->prepare("SELECT username FROM users WHERE member_id = ?");
		$r->execute( array( $id ) );
		foreach( $r as $r )
            return $r['username'];
	}

	public function get_images() 
	{
		# Get user images
		$r = $this->db->prepare("SELECT * FROM images");
		$r->execute();
		if( $r->rowCount() >= 1 )
            return $r;
        else
            return FALSE;
	}
    
    public function img_gallery( $username ) 
    {
        # Get user image gallery
		$r = $this->db->prepare("SELECT img_name FROM image_gallery WHERE owner = ?");
		$r->execute( array( $username ) );
		if( $r->rowCount() >= 1 )
            return $r;
        else
            return FALSE;
	}
    
    public function profile_data( $user ) 
    {
		# Get profile data for selected user
		$r = $this->db->prepare("SELECT * FROM users WHERE username = ?");
		$r->execute( array( $user ) );
		return $r;
    }
    
    public function update_profile_data() 
    {
		# Update profile data for selected user
		if( $_POST ) {
		    
		    $form	= $this->toolbox('sanitize')->xss( $_POST );
		    $phone	= $this->toolbox('formatter')->PhoneNumber( $form['phone'] );
		    
		    $r = $this->db->prepare("
				UPDATE users 
				SET username = ?, first_name = ?, last_name = ?, email = ?, dob = ?, about_me = ?, personal_website = ?, facebook_page = ?, phone = ?, city = ?, state = ?, zip = ?
				WHERE username = ?
		    ");
		    $r->execute( array( $form['username'], $form['first_name'], $form['last_name'], $form['email'], $form['dob'], $form['about_me'], $form['personal_website'], $form['facebook_page'], $phone, $form['city'], $form['state'], $form['zip'], $form['username'] ) );
		    return $r;
		}
    }
    
	public function count($table) 
	{
	
		# get the number of rows from our query
		$query = $this->db->prepare("SELECT COUNT(*) as count FROM $table");
		$query->execute();
		$count = $query->fetch(PDO::FETCH_ASSOC);
		return $count = $count['count'];
	}

	# Check if login is valid
	public function check_login($form) 
	{
		$query = "SELECT * FROM `users` WHERE `email` = ?";

		$row = $this->db->prepare($query);
		$row->execute( array( $form['email'] ) );

		foreach( $row as $result ) 
		{

			if( empty($result) ) 
			{
				# Email not found, or not confirmed
				return FALSE;
			}
			elseif ( $this->toolbox('hash')->verify( $form['password'], $result['password'] ) == FALSE ) {
				# Email found, wrong password
				return FALSE;
			}
            elseif ( $result['confirmed'] == '0' ) {
				# Has not verified account yet
				return "Account not verified";
			}
			elseif ( $this->verify($form['password'], $result['password']) == TRUE ) {
				
				# Email and password are both correct -- valid login
                $this->session->set('member_id', $result['member_id']);
				$this->session->set('username', $result['username']);
				$this->session->set('email', $result['email']);
				$this->session->set('first_name', $result['first_name']);
				$this->session->set('last_name', $result['last_name']);
                $this->session->set('role', $result['role']);
                $this->session->set('age', $this->toolbox('formatter')->age($result['dob']) );
				$this->session->set('gender', $result['gender']);
				$this->session->set('latitude', $result['latitude']);
				$this->session->set('longitude', $result['longitude']);
                                    
                # Update user table
                $ip 	= $this->toolbox('geoip')->ip();
                $lat 	= $this->toolbox('geoip')->latitude;
                $long 	= $this->toolbox('geoip')->longitude;
                                    
                $update = $this->db->prepare("
                	UPDATE users 
                	SET last_login_ip = ?, latitude = ?, longitude = ?, last_login_time = ? 
                	WHERE member_id = ?
                ");
                $update->execute( array( $ip, $lat, $long, time(), $result['member_id'] ) );
				return $result;
			}
			else {
				return FALSE;
			}
		}
	}

	# Create a new member; i.e. signup form
	public function create_member($form) 
	{
		try 
		{
			$form['password'] 	= $this->toolbox('hash')->encrypt($form['password']);
			$form['phone'] 		= $this->toolbox('formatter')->PhoneNumber($form['phone']);
			$latitude 			= $this->toolbox('geoip')->latitude;
			$longitude 			= $this->toolbox('geoip')->longitude;
			$ip 				= $this->toolbox('geoip')->ip();
			if( $this->config->setting('signup_email_confirmation') === TRUE )
				$confirmed = (int) 0;
			else
				$confirmed = (int) 1;
			
			$query = "INSERT INTO users( confirmed, username, password, first_name, last_name, email, dob, phone, city, state, zip, latitude, longitude, registration_ip, registration_date ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$create_new_member = $this->db->prepare($query);
			$create_new_member->execute([ 
				$confirmed, $form['username'], $form['password'], $form['first_name'], $form['last_name'], $form['email'], 
				$form['dob'], $form['phone'], $form['city'], $form['state'], $form['zip'], $latitude, $longitude, $ip, time()
			]);

			if( $this->config->setting('signup_email_confirmation') === TRUE ) {
				$confirmation_code = md5( $form['email'] );
				$sql = "INSERT INTO signup_confirm( email, code ) VALUES( ?, ? )";
				$confirm = $this->db->prepare($sql);
				$confirm->execute( [$form['email'], $confirmation_code] );
			}

			return $create_new_member;
		}
		catch( \Exception $e ) {
			$this->log->save( "Error occured during signup: ". $e->getMessage(), 'signup-errors.log' );
			$this->error['signup'] = 'Username already exists';
			return FALSE;
		}
	}
	
	public function update_password($password, $email) 
	{
		$password = $this->toolbox('hash')->encrypt($password);
		$q = "UPDATE users SET password = ? WHERE email = ?";
		$r = $this->db->prepare($q);
		$r->execute( array($password, $email) );
	}
	
}