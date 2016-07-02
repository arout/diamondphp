<?php

class GeoipModel extends Hal\Model\System_Model {

	public function count_cities($zip) {

		$zip = trim(htmlspecialchars($zip));

		$q     = "SELECT citycode FROM zips WHERE code = ?";
		$query = $this->db->prepare($q);
		$query->execute(array($zip));

		$num_rows = $query->rowCount();
		return $num_rows;

	}

	public function get_cities($zip) {

		$zip = trim(htmlspecialchars($zip));

		$q     = "SELECT DISTINCT citycode FROM zips WHERE code = ?";
		$query = $this->db->prepare($q);
		$query->execute(array($zip));

		return $query;

	}

	public function get_states($zip) {

		$zip = trim(htmlspecialchars($zip));

		$q     = "SELECT DISTINCT statecode FROM zips WHERE code = ?";
		$query = $this->db->prepare($q);
		$query->execute(array($zip));

		return $query;

	}

	public function get_all_cities() {

		$q     = "SELECT citycode FROM zips";
		$query = $this->db->prepare($q);
		$query->execute();

		foreach ($query as $query) {
			$this->cache()->set('cities', $query['citycode']);
		}

	}

}
