<?php
declare(strict_types=1);

class WelcomeModel extends Hal\Core\SystemModel {

    public $results;
		
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
		$count = $query->fetch(PDO::FETCH_ASSOC);
		return $count = $count['count'];
	}

	public function cities()
	{
		$query = $this->db->prepare("SELECT * FROM zips");
		$query->execute();
        
        return $query;
	}

	public function state($table, $start, $limit)
	{

		$query = $this->db->prepare("SELECT * FROM $table LIMIT $start, $limit");
		$query->execute();

		//a loop to pull out data
		foreach($query->fetchAll() as $row)
			yield $row['citycode'].'<br>';
	}
	
}
