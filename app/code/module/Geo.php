<?php
namespace Hal\Module;
require_once( $_SERVER['DOCUMENT_ROOT'].'/app/code/module/geoip/geoipcity.inc' );
require_once( $_SERVER['DOCUMENT_ROOT'].'/app/code/module/geoip/geoipregionvars.php' );

class Geo 
{
	# Use MaxMind GeoIP data to determine user location
	public $record;
	public 	$ip_address;
	public 	$latitude;
	public 	$longitude;
	public 	$city;
	public 	$state;
	public 	$state_code;
	public 	$zipcode;
	public  $country;
	protected $db;

	# Search radius properties
	public $radius = [];

	public function __construct( $db ) 
	{
	    $this->db = $db;
	    
		# Testing Puroses Only: $ip = '66.87.83.245';
		$ip = 	getenv( 'HTTP_CLIENT_IP' )?:
				getenv( 'HTTP_X_FORWARDED_FOR' )?:
				getenv( 'HTTP_X_FORWARDED' )?:
				getenv( 'HTTP_FORWARDED_FOR' )?:
				getenv( 'HTTP_FORWARDED' )?:
				getenv( 'REMOTE_ADDR' );
	
		$this->ip_address = $ip;


		$gi = \geoip_open( $_SERVER['DOCUMENT_ROOT']."/app/code/module/geoip/GeoLiteCity.dat",\GEOIP_STANDARD );

		$this->record = \geoip_record_by_addr( $gi, $this->ip_address );
		$this->city = $this->record->city;
		$this->state = $this->record->region;
		$this->state_code = $this->record->region;	// Two letter abbreviation
		$this->latitude = $this->record->latitude;
		$this->longitude = $this->record->longitude;
		$this->zipcode = $this->record->postal_code;
		$this->country = $this->record->country_code;

		\geoip_close($gi);
	}
    
    public function ip() 
    {
        return $this->ip_address;   
    }

    // $record->region . " " . $GEOIP_REGION_NAME[$record->country_code][$record->region] . "\n";  // State code, state name
	// $record->latitude . "\n";
	// $record->longitude . "\n";
	// $record->metro_code . "\n";
	// $record->city . "\n";
	// $record->postal_code . "\n";
	// $record->area_code . "\n";
	// $record->continent_code . "\n";

	public function distance( $lat1, $lon1, $lat2, $lon2, $unit = "M" ) 
	{
		$theta    = $lon1 - $lon2;
		$dist     = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist     = acos($dist);
		$dist     = rad2deg($dist);
		$miles    = $dist * 60 * 1.1515;
		$unit     = strtoupper($unit);

		if ($unit == "K") {
			return ($miles * 1.609344);
		} 
		else if ($unit == "N") {
			return ($miles * 0.8684);
		}
		else {
			if( $miles < 10 )
				$miles = number_format($miles, 1, '.', '');
			else
				$miles = number_format($miles);
		    return $miles;
		}
	}
				
	public function search_radius( $miles ) 
	{	
		/*
		 * This function will try to find all cities within a given radius based on
		 * the current visitor's location
		 */
		$miles = $miles++;
		$q = "SELECT DISTINCT citycode, statecode, code,( 3959 * acos( cos( radians( ? ) ) 
			* cos( radians( latitude ) ) * cos( radians( longitude ) - radians( ? ) ) + sin( radians( ? ) ) 
			* sin( radians( latitude ) ) ) ) AS distance FROM zips HAVING distance < $miles ORDER BY distance ASC;";
		$r = $this->db->prepare( $q );
		$r->fetch(\PDO::FETCH_ASSOC);
		$r->execute( array( $this->latitude, $this->longitude, $this->latitude ) );
                
        return $r;
		/*
		foreach($r as $r) {
			yield $r;
		}
                */
	}

	public function cities( $zip ) 
	{
            
        # Return a list of cities for the specified state or zip code
        if( strlen( $zip ) === 5 ) 
        {
	        # Search by zip code
			$q = " SELECT citycode, statecode FROM zips WHERE code = ? ";
			$s = $this->db->prepare( $q );
			$s->execute( array( $zip ) );
        }
        else {
            # Search by state
            $q = " SELECT citycode FROM zips WHERE statecode = ? ";
			$s = $this->db->prepare( $q );
			$s->execute( array( $zip ) );
        }
            
        if( $s )
            return $s;
        else
            return 'No cities found that matches the submitted zip code or state';
        // while($city = $s->fetch())
        //    echo "<option value='" . $city['citycode'] ."'>" . $city['citycode'] . "</option>";
	}
        
    public function states( $zip ) 
    {
		$q = " SELECT statecode FROM zips WHERE code = ? ";
		$s = $this->db->prepare( $q );
		$s->execute( array( $zip ) );
		
        return $s;
		// while($city = $s->fetch())
                //    echo "<option value='" . $city['citycode'] ."'>" . $city['citycode'] . "</option>";
	}
    
    public function zipcode( $city, $state ) 
    {
		$q = " SELECT code FROM zips WHERE citycode = ? AND statecode = ? ";
		$s = $this->db->prepare( $q );
		$s->execute( array( $city, $state ) );
		return $s['code'];
		// while($city = $s->fetch())
	            //    echo "<option value='" . $city['citycode'] ."'>" . $city['citycode'] . "</option>";
	}
}
