<?php
use Hal\Model\System_Model;

class OrmModel extends System_Model
{
	public function count(String $table)
	{
		// get the number of rows from our query
		$query = $this->db->prepare("SELECT COUNT(*) as count FROM $table");
		$query->execute();
		$count        = $query->fetch(PDO::FETCH_ASSOC);
		return $count = $count['count'];
	}

	public function count_where($table, $col, $clause, $val)
	{
		// get the number of rows from our query including a WHERE clause
		$query = $this->db->prepare("SELECT COUNT(*) as count FROM $table WHERE $col {$clause} ?");
		$query->execute([$val]);
		$count        = $query->fetch(PDO::FETCH_ASSOC);
		return $count = $count['count'];
	}

	public function select_all(String $table)
	{
		// select all from a table
		$q = "SELECT * FROM $table";
		$r = $this->db->prepare($q);
		$r->execute();
		return $r;
	}

	public function select_where(Array $table, Array $where_col, Array $where_val)
	{
		foreach ($table as $t)
		{
			$db_table = $t;
		}

		// select from a table with WHERE clasue
		$query = "SELECT * FROM {$db_table} WHERE ";

		foreach ($where_col as $where)
		{
			$query .= "$where = ? AND ";
		}
		$query .= "WHERE 1";

		$r = $this->db->prepare($query);
		$r->execute("$db_table", $where_val);
		echo $r->debugDumpParams();

	}
}