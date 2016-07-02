<?php 

class Block_Controller extends Hal\Block\System_Block {
    
    /*
     * System Geo functions; do not remove
     */
	public function get_city() {

		$zip = (int) $this->route->param1;
		$get_city = $this->model('Geoip')->get_cities( $zip );
		// $this->load->block('geo/get_city.php');

		foreach( $get_city as $city )
			echo "<option value='{$city['citycode']}'>{$city['citycode']}</option>";
	}
    
    public function get_state() {

		$zip = (int) $this->route->param1;
		$get_state = $this->model('Geoip')->get_states( $zip );

		foreach( $get_state as $state )
			echo "<option value='{$state['statecode']}'>{$state['statecode']}</option>";
	}
}
