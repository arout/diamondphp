<?php

class MemberModel extends Hal\Model\System_Model
{
	public function select($limit = 0)
	{
		# Get all member profiles
		if ($limit !== 0)
		{
			$limit1 = (int) $this->toolbox('sanitize')->xss($limit * 10);
			$query  = "SELECT * FROM users WHERE hidden = 0 LIMIT $limit1, 20";
		}
		else
		{
			$limit = $this->toolbox('sanitize')->xss("0, 20");
			$query = "SELECT * FROM users WHERE hidden = 0 LIMIT {$limit}";
		}

		$r = $this->db->prepare($query);
		$r->execute();

		return $r;
	}

	public function select_from_users($search_query, $limit = 0)
	{
		$search_query = '%' . $search_query . '%';
		# Generator to get column from member profiles
		if ($limit !== 0)
		{
			$query = "SELECT username, headline, about_me, city, state, looking_for, personal_website FROM users WHERE hidden = 0 AND
			CONCAT(username, headline, about_me, city, state, looking_for, personal_website) LIKE ? LIMIT $limit, 20";
		}
		else
		{
			$query = "SELECT username, headline, about_me, city, state, looking_for, personal_website FROM users WHERE hidden = 0 AND
			CONCAT(username, headline, about_me, city, state, looking_for, personal_website) LIKE ?";
		}
		$r = $this->db->prepare($query);
		$r->execute([$search_query]);
		foreach ($r as $user)
		{
			yield $user;
		}

	}

	public function select_from_users_results($search_query, $limit = 0)
	{
		# Iterate through generator
		foreach (self::select_from_users($search_query, $limit) as $key => $results)
		{
			# We want to highlight the search keywords in the results, so we'll
			# need to remove the % symbols from the search query that we added
			# to the search query as part of the SQL in select_from_users()
			$search_query               = str_replace("%", "", $search_query);
			$results                    = str_replace("$search_query", "<span style='background-color: yellow;'>$search_query</span>", $results);
			$data['username'][]         = $results;
			$data['headline'][]         = $results;
			$data['about_me'][]         = $results;
			$data['city'][]             = $results;
			$data['state'][]            = $results;
			$data['looking_for'][]      = $results;
			$data['personal_website'][] = $results;
		}
		return $data;
	}

	public function select_gender($limit = 0, $gender = 'all')
	{
		# Get all member profiles
		if ($limit !== 0)
		{
			$limit1 = (int) $this->toolbox('sanitize')->xss($limit * 10);
			$query  = "SELECT * FROM users WHERE hidden = ? AND gender = ? LIMIT $limit1, 20";
		}
		else
		{
			$limit = $this->toolbox('sanitize')->xss("0, 20");
			$query = "SELECT * FROM users WHERE hidden = ? AND gender = ? LIMIT {$limit}";
		}

		$r = $this->db->prepare($query);
		$r->execute([0, "$gender"]);

		return $r;
	}

	public function get_member_id($username)
	{
		# Fetch member ID
		$username = $this->toolbox('sanitize')->xss($username);
		$r        = $this->db->prepare("SELECT member_id FROM users WHERE username = ?");
		$r->execute(array($username));
		if ($r)
		{
			foreach ($r as $r)
			{
				return $r['member_id'];
			}

		}
		return FALSE;
	}

	public function email_exists($email)
	{
		# Check if the submitted email already exists; reurns true/false
		$email = $this->toolbox('sanitize')->xss($email);
		$r     = $this->db->prepare("SELECT email FROM users WHERE email = ?");
		$r->execute(array($email));
		if ($r)
		{
			foreach ($r as $r)
			{
				return TRUE;
			}

		}
		return FALSE;
	}

	public function get_username($memberid)
	{
		# Fetch username
		$id = (int) $this->toolbox('sanitize')->xss($memberid);
		$r  = $this->db->prepare("SELECT username FROM users WHERE member_id = ?");
		$r->execute(array($id));
		foreach ($r as $r)
		{
			return $r['username'];
		}

	}

	public function get_avatar($id)
	{
		# Get user avatar
		$r = $this->db->prepare("SELECT pic FROM users WHERE member_id = ?");
		$r->execute(array($id));
		if ($r->rowCount() >= 1)
		{
			return $r;
		}
		else
		{
			return FALSE;
		}

	}

	public function img_gallery($id)
	{
		# Get user image gallery
		$r = $this->db->prepare("SELECT * FROM images WHERE owner_id = ?");
		$r->execute(array($id));
		if ($r->rowCount() >= 1)
		{
			return $r;
		}
		else
		{
			return FALSE;
		}

	}

	public function profile_data($user)
	{
		# Get profile data for selected user
		# Used for viewing profiles
		$r = $this->db->prepare("SELECT * FROM users WHERE username = ?");
		$r->execute(array($user));
		return $r;
	}

	public function update_profile_data()
	{
		# Update profile data for selected user
		# Used for editing profiles
		if ($_POST)
		{

			$form  = $this->toolbox('sanitize')->xss($_POST);
			$phone = $this->toolbox('formatter')->PhoneNumber($form['phone']);

			$r = $this->db->prepare("
				UPDATE users
				SET username = ?, first_name = ?, last_name = ?, email = ?, dob = ?, about_me = ?, personal_website = ?, facebook_page = ?, phone = ?, city = ?, state = ?, zip = ?
				WHERE username = ?
		    ");
			$r->execute(array($form['username'], $form['first_name'], $form['last_name'], $form['email'], $form['dob'], $form['about_me'], $form['personal_website'], $form['facebook_page'], $phone, $form['city'], $form['state'], $form['zip'], $form['username']));
			return $r;
		}
	}

	public function image_update()
	{
		# Update profile avatar
		if ($_POST)
		{
			$form = $this->toolbox('sanitize')->xss($_POST);

			$r = $this->db->prepare("
				UPDATE users
				SET pic = ?
				WHERE username = ?
		    ");

			$r->execute(array($this->session->get('username'), $form['image']));
			return $r;
		}
	}

	public function count($table)
	{

		# get the number of rows from our query
		$query = $this->db->prepare("SELECT COUNT(*) as count FROM $table");
		$query->execute();
		$count        = $query->fetch(PDO::FETCH_ASSOC);
		return $count = $count['count'];
	}

	public function member_view($member, $viewed_by)
	{
		if (self::get_member_id($member) !== FALSE)
		{
			if (!is_null($member) && !is_null($viewed_by))
			{
				# Track who is viewing who's profile
				$timestamp = time();
				$query     = $this->db->prepare("INSERT INTO profile_views(member, viewed_by, view_timestamp) VALUES(?,?,?)");
				return $query->execute([$member, $viewed_by, $timestamp]);
			}
		}
		return FALSE;
	}

	public function search_filters($post)
	{
		# POST data already sanitized in controller
		$gender   = $post['gender'];
		$age_min  = $post['age_min'];
		$age_max  = $post['age_max'];
		$distance = $post['distance'];

		$r = $this->db->prepare("SELECT member_id FROM users WHERE username = ?");
		$r->execute(array($username));
		if ($r)
		{
			foreach ($r as $r)
			{
				return $r['member_id'];
			}

		}
		return FALSE;
	}

	public function check_login($form)
	{
		# Check if login is valid
		$query = "SELECT * FROM `users` WHERE `email` = ?";

		$row = $this->db->prepare($query);
		$row->execute(array($form['email']));

		foreach ($row as $result)
		{

			if (empty($result))
			{
				# Email not found, or not confirmed
				return FALSE;
			}
			elseif ($this->toolbox('hash')->verify($form['password'], $result['password']) == FALSE)
			{
				# Email found, wrong password
				return FALSE;
			}
			elseif ($result['confirmed'] == '0')
			{
				# Has not verified account yet
				return "Account not verified";
			}
			elseif ($this->verify($form['password'], $result['password']) == TRUE)
			{

				# Email and password are both correct -- valid login
				$this->session->set('member_id', $result['member_id']);
				$this->session->set('username', $result['username']);
				$this->session->set('email', $result['email']);
				$this->session->set('first_name', $result['first_name']);
				$this->session->set('last_name', $result['last_name']);
				$this->session->set('role', $result['role']);
				$this->session->set('age', $this->toolbox('formatter')->age($result['dob']));
				$this->session->set('gender', $result['gender']);
				$this->session->set('latitude', $result['latitude']);
				$this->session->set('longitude', $result['longitude']);

				# Update user table
				$ip   = $this->toolbox('geoip')->ip();
				$lat  = $this->toolbox('geoip')->latitude;
				$long = $this->toolbox('geoip')->longitude;

				$update = $this->db->prepare("
                	UPDATE users
                	SET last_login_ip = ?, latitude = ?, longitude = ?, last_login_time = ?
                	WHERE member_id = ?
                ");
				$update->execute(array($ip, $lat, $long, time(), $result['member_id']));
				return $result;
			}
			else
			{
				return FALSE;
			}
		}
	}

	public function create_member($form)
	{
		# Create a new member; i.e. signup form
		try
		{
			$form['password'] = $this->toolbox('hash')->encrypt($form['password']);
			$form['phone']    = $this->toolbox('formatter')->PhoneNumber($form['phone']);
			$latitude         = $this->toolbox('geoip')->latitude;
			$longitude        = $this->toolbox('geoip')->longitude;
			$ip               = $this->toolbox('geoip')->ip();
			if ($this->config->setting('signup_email_confirmation') === TRUE)
			{
				$confirmed = (int) 0;
			}
			else
			{
				$confirmed = (int) 1;
			}

			$query             = "INSERT INTO users( confirmed, username, password, first_name, last_name, email, dob, phone, city, state, zip, latitude, longitude, registration_ip, registration_date ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$create_new_member = $this->db->prepare($query);
			$create_new_member->execute([
				$confirmed, $form['username'], $form['password'], $form['first_name'], $form['last_name'], $form['email'],
				$form['dob'], $form['phone'], $form['city'], $form['state'], $form['zip'], $latitude, $longitude, $ip, time(),
			]);

			if ($this->config->setting('signup_email_confirmation') === TRUE)
			{
				$confirmation_code = md5($form['email']);
				$sql               = "INSERT INTO signup_confirm( email, code ) VALUES( ?, ? )";
				$confirm           = $this->db->prepare($sql);
				$confirm->execute([$form['email'], $confirmation_code]);
			}

			return $create_new_member;
		}
		catch (\Exception $e)
		{
			$this->log->save("Error occured during signup: " . $e->getMessage(), 'signup-errors.log');
			$this->error['signup'] = 'Username already exists';
			return FALSE;
		}
	}

	public function update_password($password, $email)
	{
		$password = $this->toolbox('hash')->encrypt($password);
		$q        = "UPDATE users SET password = ? WHERE email = ?";
		$r        = $this->db->prepare($q);
		$r->execute(array($password, $email));
	}

}