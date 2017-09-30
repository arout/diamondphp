<?php

class MemberModel extends Hal\Model\System_Model
{
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
			$search_query = str_replace("%", "", $search_query);
			$results = str_replace("$search_query", "<span style='background-color: yellow;'>$search_query</span>", $results);
			$data['username'][] = $results;
			$data['headline'][] = $results;
			$data['about_me'][] = $results;
			$data['city'][] = $results;
			$data['state'][] = $results;
			$data['looking_for'][] = $results;
			$data['personal_website'][] = $results;
		}
		return $data;
	}

	public function img_gallery($id)
	{
		# Get user image gallery
		$r = $this->db->prepare("SELECT * FROM images WHERE owner_id = ?");
		$r->execute([$id]);
		if ($r->rowCount() >= 1)
		{
			return $r;
		}
		else
		{
			return FALSE;
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

	public function search_filters($post)
	{
		# POST data already sanitized in controller
		$gender = $post['gender'];
		$age_min = $post['age_min'];
		$age_max = $post['age_max'];
		$distance = $post['distance'];

		$r = $this->db->prepare("SELECT member_id FROM users WHERE username = ?");
		$r->execute([$username]);
		if ($r)
		{
			foreach ($r as $r)
			{
				return $r['member_id'];
			}

		}
		return FALSE;
	}

}