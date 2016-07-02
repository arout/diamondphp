<?php

class AssessmentsModel extends Hal\Core\SystemModel {

	public function generate_tags($company) {

		/**
		 * === PURPOSE ===
		 * We want to take each column from the wizard table, and create
		 * a reusable "placeholder" variable that we can use in the final
		 * document for editing. The placeholder variable has the following
		 * format:   {{ VARIABLE }}
		 *
		 * So for example, the company's name variable would be {{ COMPANY }}
		 *
		 * The generate_tags function is run after the first step of the wizard,
		 * and will create a column var_$somecolumn if it does not exist, and then
		 * populate it with the data that we collect from the wizard.
		 *
		 * This function should only run near or at the end of the wizard,
		 * once all of the data has been collected.
		 */
		$query = "SELECT * FROM assessment_wizard WHERE company = ?";
		$r     = $this->db->prepare($query);
		$r->execute(array($company));

		foreach ($r as $tag => $value) {

			$tag     = strtoupper($tag);
			$var_tag = define('{{ ' . $tag . ' }}', $value);

			/**
			 * If the column does not exist, create it
			 */
			if (!$tag[$tag]) {
				$sql = "
				ALTER TABLE assessment_wizard
				ADD var_" . $tag . " varchar(40) NOT NULL,
				ADD var_" . $tag . "_value varchar(150) NOT NULL;";
				$alter = $this->db->prepare($sql);
				$alter->execute();
			}
		}

	}

	public function save_draft($company, $filename) {

		$query = "REPLACE INTO assessment_drafts( company, filename ) VALUES( ?, ? )";
		$save  = $db->prepare($query);
		$save->execute(array($company, $filename));

		if ($save) {
			return TRUE;
		} else {
			return FALSE;
		}

	}

	public function count($table) {

		//get the number of rows from our query
		$query = $this->db->prepare("SELECT COUNT(*) as count FROM $table");
		$query->execute();
		$count        = $query->fetch(PDO::FETCH_ASSOC);
		return $count = $count['count'];
	}

	public function count_where($table, $where, $where_equals) {

		//get the number of rows from our query
		$query = $this->db->prepare("SELECT COUNT(*) as count FROM $table WHERE $where = ?");
		$query->execute(array($where_equals));
		$count        = $query->fetch(PDO::FETCH_ASSOC);
		return $count = $count['count'];
	}

	public function template_tags() {

		//get the template tags from wizard as well as var_tags table
		$query = $this->db->prepare("SELECT string, description, value, document FROM assessment_var_tags ORDER BY string ASC");
		$query->execute();

		return $query;
	}

	public function get_all_documents() {

		//get the template tags
		$query = $this->db->prepare("SELECT filename FROM assessment_wizard ORDER BY filename ASC");
		$query->execute();

		return $query;

	}

	public function create_template_tag($tag, $value, $descr, $doc) {

		$query  = "INSERT INTO assessment_var_tags( string, value, description, document ) VALUES( ?, ?, ?, ? )";
		$insert = $this->db->prepare($query);
		$insert->execute(array($tag, $value, $descr, $doc));

	}

	/**
	 * Network speeds collected from Wizard
	 */
	public function network_speed($latency, $download, $company) {

		$query  = "INSERT INTO assessment_tests( latency, download_speed, company ) VALUES( ?, ?, ? )";
		$insert = $this->db->prepare($query);
		$insert->execute(array($latency, $download, $company));
	}

	/*************************************\
	 *
	 *	WIZARD activities
	 *
	\*************************************/
	public function wizard_step_one($company, $url, $fname = NULL, $lname = NULL, $consultant, $filename, $author) {

		try {

			$query  = "INSERT INTO assessment_wizard( company, url, first_name, last_name, consultant, filename, author, date ) VALUES( ?, ?, ?, ?, ?, ?, ?, ? )";
			$insert = $this->db->prepare($query);
			$insert->execute(array($company, $url, $fname, $lname, $consultant, $filename, $author, time()));

		} catch (Exception $e) {
			echo 'Caught exception: ', $e->getMessage(), "\n";
		} finally {
			// Step to perform regardless of error
		}

		if ($insert) {
			return TRUE;
		} else {
			return FALSE;
		}

	}

	/*
public function initialize_var_tags( $company, $url, $consultant, $doc ) {

// We need to establish some base variable tags each time an assessment is created
$var = array( "{{ COMPANY }}" => $company, "{{ URL }}" => $url, "{{ CONSULTANT }}" => $consultant, "{{ DOCUMENT }}" => $doc );

foreach( $var as $string => $val ) {

$query = "REPLACE INTO assessment_var_tags( string, value, document ) VALUES( ?, ?, ? )";
$insert = $this->db->prepare( $query );
$insert->execute( array(  $string, $val, $doc ) );
}
}
 */
}