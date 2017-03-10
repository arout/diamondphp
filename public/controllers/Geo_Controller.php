<?php
declare(strict_types=1);

class Geo_Controller extends Hal\Controller\Base_Controller {

	public function index() {

		$p = $this->toolbox("pagination");

		$url_segment = (int) (empty($this->route->request[2]) ? 1 : $this->route->request[2]);
		$per_page    = 20;
		# Optional; send to paginate()
		$adjacent_links = 3;

		# Table being queried; needed to count results
		$table = "zips";

		//count records
		$sql = "SELECT DISTINCT citycode, statecode FROM {$table} ORDER BY citycode ASC";
		$p->config($sql, $url_segment, $per_page);

		$query = $this->db->prepare("{$sql} LIMIT {$p->startpoint}, {$per_page}");
		$query->execute();

		foreach ($query as $row) {
			// Send results to view file
			$data['location'][] = $row;
		}

		$data['pagination_links'] = $p->paginate($adjacent_links);

		$this->load->view('geo/index', $data);
	}

	public function all_cities() {

		// $get_cities = $this->model('Geoip')->get_all_cities();
		$this->model('Geoip')->get_all_cities();
		echo $this->cache()->get('cities');

	}

	public function get_city() {

		$zip = (int) $this->route->request[2];
		$get_city = $this->model('Geoip')->get_cities( $zip );

		foreach( $get_city as $city )
			echo "<option value='{$city['citycode']}'>{$city['citycode']}</option>";
	}

	public function get_state() {

		$zip = (int) $this->route->request[2];
		$get_state = $this->model('Geoip')->get_states( $zip );

		foreach( $get_state as $state )
			echo "<option value='{$state['statecode']}'>{$state['statecode']}</option>";
	}

}
