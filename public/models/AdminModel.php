<?php

class AdminModel extends Hal\Core\SystemModel {

	public function select() {

		$q = "SELECT * FROM users";
		$r = $this->db->prepare($q);
		$r->execute();

		return $r;
	}

	public function count($table) {

		//get the number of rows from our query
		$query = $this->db->prepare("SELECT COUNT(*) as count FROM $table");
		$query->execute();
		$count        = $query->fetch(PDO::FETCH_ASSOC);
		return $count = $count['count'];
	}

	/**
	 * Check if login is valid
	 */
	public function check_login($form) {

		$query = "
		SELECT username, password
		FROM admin_users
		WHERE username = ?";
		$row = $this->db->prepare($query);
		$row->execute(array($form['username']));

		foreach ($row as $result) {

			if (empty($result)) {
				// Username not found
				return FALSE;
			} elseif (Toolbox::helper('Hash')->verify($form['password'], $result['password']) == FALSE) {
				// Username found, wrong password
				return FALSE;
			} elseif (Toolbox::helper('Hash')->verify($form['password'], $result['password']) == TRUE) {

				// Email and password are both correct -- valid login
				$this->cache()->set('admin_username', $result['username']);
				$this->cache()->set('admin_email', $result['email']);
				$this->cache()->set('admin_first_name', $result['first_name']);
				$this->cache()->set('admin_last_name', $result['last_name']);

				return TRUE;
			} else {
				return FALSE;
			}
		}

	}

	/**
	 * Create a new member; i.e. signup form
	 */
	public function create_member($form) {

		$form['password'] = Toolbox::helper('Hash')->encrypt($form['password']);
		$form['phone']    = Toolbox::helper('Formatter')->PhoneNumber($form['phone']);
		$latitude         = Toolbox::helper('Geoip')->latitude;
		$longitude        = Toolbox::helper('Geoip')->longitude;

		$query = "INSERT INTO users( username, password, first_name, last_name, email, dob, gender, phone, city, state, zip, latitude, longitude )
				  VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$r = $this->db->prepare($query);
		$r->execute(array($form['username'], $form['password'], $form['first_name'], $form['last_name'], $form['email'],
			$form['dob'], $form['gender'], $form['phone'], $form['city'], $form['state'], $form['zip'], $latitude, $longitude));

	}

	public function update_password($password, $email) {

		$password = Toolbox::helper('Hash')->encrypt($password);
		$q        = "UPDATE users SET password = ? WHERE email = ?";
		$r        = $this->db->prepare($q);
		$r->execute(array($password, $email));

	}

}