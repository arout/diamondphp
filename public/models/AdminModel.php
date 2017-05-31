<?php
use Hal\Model\System_Model;

class AdminModel extends System_Model
{

	public function select()
	{
		$q = "SELECT * FROM users";
		$r = $this->db->prepare($q);
		$r->execute();
		return $r;
	}

	public function count($table)
	{
		//get the number of rows from our query
		$query = $this->db->prepare("SELECT COUNT(*) as count FROM $table");
		$query->execute();
		$count        = $query->fetch(PDO::FETCH_ASSOC);
		return $count = $count['count'];
	}

	public function count_where($table, $col, $clause, $val)
	{
		//get the number of rows from our query
		$query = $this->db->prepare("SELECT COUNT(*) as count FROM $table WHERE $col {$clause} ?");
		$query->execute([$val]);
		$count        = $query->fetch(PDO::FETCH_ASSOC);
		return $count = $count['count'];
	}

	/**
	 * Check if login is valid
	 */
	public function check_login($form)
	{

		$query = "
		SELECT member_id, username, password, role, confirmed, email, first_name, last_name
		FROM users
		WHERE username = ?
		AND role = ?
		AND confirmed = ?";
		$row = $this->db->prepare($query);
		$row->execute(array($form['username'], 'admin', 1));

		foreach ($row as $result)
		{

			if (empty($result))
			{
				// Username not found
				$attempts = $this->session->get('login_attempts');
				$this->session->set('login_attempts', $attempts + 1);
				return FALSE;
			}
			elseif ($this->verify($form['password'], $result['password']) == FALSE)
			{
				// Username found, wrong password
				$attempts = $this->session->get('login_attempts');
				$this->session->set('login_attempts', $attempts + 1);
				return FALSE;
			}
			else
			{
				$attempts = $this->session->get('login_attempts');
				$this->session->set('login_attempts', $attempts + 1);

				$avatar = USER_PICS_URL . $result['username'] . '/' . $result['member_id'] . '_0.jpg';
				// Email and password are both correct -- valid login
				$this->session->set('admin_username', $result['first_name'] . ' ' . $result['last_name']);
				$this->session->set('admin_email', $result['email']);
				$this->session->set('admin_first_name', $result['first_name']);
				$this->session->set('admin_last_name', $result['last_name']);
				$this->session->set('role', $result['role']);
				$this->session->set('admin_img', $avatar);

				return TRUE;
			}
		}

	}

	/**
	 * Create a new member; i.e. signup form
	 */
	public function create_member($form)
	{

		$form['password'] = $this->encrypt($form['password']);
		$form['phone']    = $this->toolbox('Formatter')->PhoneNumber($form['phone']);
		$latitude         = $this->toolbox('Geoip')->latitude;
		$longitude        = $this->toolbox('Geoip')->longitude;

		$query = "INSERT INTO users( username, password, first_name, last_name, email, dob, gender, phone, city, state, zip, latitude, longitude )
				  VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$r = $this->db->prepare($query);
		$r->execute(array($form['username'], $form['password'], $form['first_name'], $form['last_name'], $form['email'],
			$form['dob'], $form['gender'], $form['phone'], $form['city'], $form['state'], $form['zip'], $latitude, $longitude));

	}

	public function update_password($password, $email)
	{

		$password = $this->encrypt($password);
		$q        = "UPDATE users SET password = ? WHERE email = ?";
		$r        = $this->db->prepare($q);
		$r->execute(array($password, $email));

	}

}