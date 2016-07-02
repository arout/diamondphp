<?php
namespace App\Plugin;

class Distance{

		function get_distance_point_to_point($latitude1, $longitude1, $latitude2, $longitude2) {
			
			# This function will get the distance from one city to another
			# This could be useful for when viewing a profile, and you want to know how far away
			# the person is from you
			
			$earth_radius = 3959;	# radius in miles
			
			$dLat = deg2rad($latitude2 - $latitude1);
			$dLon = deg2rad($longitude2 - $longitude1);
			
			$a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
			$c = 2 * asin(sqrt($a));
			$d = $earth_radius * $c;
			
			return $d;	# return distance in miles
			# echo get_distance_point_to_point(39.7966, -77.0014, 39.8517, -77.2607);		#Insert first city's lat & long, then the second city

		}
				
		function search_radius_5_miles(){	
		
		# This function will try to find all cities within a given radius
		# Simply change the HAVING distance < 25 in order to adjust the search radius
		
			$q = mysql_query("SELECT DISTINCT citycode, statecode, code,( 3959 * acos( cos( radians('".$_SESSION['lat']."') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('".$_SESSION['long']."') ) + sin( radians('".$_SESSION['lat']."') ) * sin( radians( latitude ) ) ) ) AS distance 
		FROM zips HAVING distance < 5 ORDER BY citycode LIMIT 0 , 40;");
		
		while($radius = mysql_fetch_assoc($q))
		{
			$z = mysql_query("SELECT DISTINCT username, city, state FROM user WHERE city = '". $radius['citycode']."' AND state = '".$radius['statecode']."' AND zip = '".$radius['code']."' ");
			while($z1 = mysql_fetch_assoc($z))
			echo $z1['username'] . $z1['city'] .', ' .$z1['state']. '<br>';	
		}
}
	
		function search_radius_10_miles(){	
		
		# This function will try to find all cities within a given radius
		# Simply change the HAVING distance < 25 in order to adjust the search radius
		
			$q = mysql_query("SELECT DISTINCT citycode, statecode, code,( 3959 * acos( cos( radians('".$_SESSION['lat']."') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('".$_SESSION['long']."') ) + sin( radians('".$_SESSION['lat']."') ) * sin( radians( latitude ) ) ) ) AS distance 
		FROM zips HAVING distance < 10 ORDER BY citycode LIMIT 0 , 50;");
		
		while($radius = mysql_fetch_assoc($q))
		{
			$z = mysql_query("SELECT DISTINCT username, city, state FROM user WHERE city = '". $radius['citycode']."' AND state = '".$radius['statecode']."' AND zip = '".$radius['code']."' ");
			while($z1 = mysql_fetch_assoc($z))
			echo $z1['username'] . $z1['city'] .', ' .$z1['state']. '<br>';	
		}

	}
	
		function search_radius_25_miles(){	
		
		# This function will try to find all cities within a given radius
		# Simply change the HAVING distance < 25 in order to adjust the search radius
		
			$q = mysql_query("SELECT DISTINCT citycode, statecode, code,( 3959 * acos( cos( radians('".$_SESSION['lat']."') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('".$_SESSION['long']."') ) + sin( radians('".$_SESSION['lat']."') ) * sin( radians( latitude ) ) ) ) AS distance 
		FROM zips HAVING distance < 25 ORDER BY citycode LIMIT 0 , 100;");
		
		while($radius = mysql_fetch_assoc($q))
		{
			$z = mysql_query("SELECT DISTINCT username, city, state FROM user WHERE city = '". $radius['citycode']."' AND state = '".$radius['statecode']."' AND zip = '".$radius['code']."' ");
			while($z1 = mysql_fetch_assoc($z))
			echo $z1['username'] . $z1['city'] .', ' .$z1['state']. '<br>';	
		}

	}
	
		function search_radius_50_miles(){	
		
		# This function will try to find all cities within a given radius
		# Simply change the HAVING distance < 25 in order to adjust the search radius
		
			$q = mysql_query("SELECT DISTINCT citycode, statecode, code,( 3959 * acos( cos( radians('".$_SESSION['lat']."') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('".$_SESSION['long']."') ) + sin( radians('".$_SESSION['lat']."') ) * sin( radians( latitude ) ) ) ) AS distance 
		FROM zips HAVING distance < 50 ORDER BY distance LIMIT 0 , 250;");
		
		while($radius = mysql_fetch_assoc($q))
		{
			$z = mysql_query("SELECT DISTINCT username, city, state FROM user WHERE city = '". $radius['citycode']."' AND state = '".$radius['statecode']."' AND zip = '".$radius['code']."' ");
			while($z1 = mysql_fetch_assoc($z))
			echo $z1['username'] . $z1['city'] .', ' .$z1['state']. '<br>';	
		}

	}
	
		function search_radius_100_miles(){	
		
		# This function will try to find all cities within a given radius
		# Simply change the HAVING distance < 25 in order to adjust the search radius
		
			$q = mysql_query("SELECT DISTINCT citycode, statecode, code,( 3959 * acos( cos( radians('".$_SESSION['lat']."') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('".$_SESSION['long']."') ) + sin( radians('".$_SESSION['lat']."') ) * sin( radians( latitude ) ) ) ) AS distance 
		FROM zips HAVING distance < 100 ORDER BY distance LIMIT 0 , 500;");
		
		while($radius = mysql_fetch_assoc($q))
		{
			$z = mysql_query("SELECT DISTINCT username, city, state FROM user WHERE city = '". $radius['citycode']."' AND state = '".$radius['statecode']."' AND zip = '".$radius['code']."' ");
			while($z1 = mysql_fetch_assoc($z))
			echo $z1['username'] . $z1['city'] .', ' .$z1['state']. '<br>';	
		}

	}
	
}
######################################
#	GeoIP
######################################
require_once(GEOIP_DIR.'geoipcity.inc');
require_once(GEOIP_DIR.'geoipregionvars.php');

$gi = geoip_open(GEOIP_DIR."GeoLiteCity.dat",GEOIP_STANDARD);

if( !function_exists('getRealIpAddr') )
{
	function getRealIpAddr()  
	{  
	 if (!empty($_SERVER['HTTP_CLIENT_IP']))  
	 {  
		$ip = $_SERVER['HTTP_CLIENT_IP'];  
	 }  
	 elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
	 {  
	 	//IP was passed from a proxy 
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];  
	 }  
	 else  
	  {  
		$ip = $_SERVER['REMOTE_ADDR'];  
	  }  
		 return $ip;  
	}  
}
$ip = getenv( 'HTTP_CLIENT_IP' )?:
		getenv( 'HTTP_X_FORWARDED_FOR' )?:
		getenv( 'HTTP_X_FORWARDED' )?:
		getenv( 'HTTP_FORWARDED_FOR' )?:
		getenv( 'HTTP_FORWARDED' )?:
		getenv( 'REMOTE_ADDR' );

$record = geoip_record_by_addr($gi,$ip);

// $record->region . " " . $GEOIP_REGION_NAME[$record->country_code][$record->region] . "\n";  // State code, state name
// $record->latitude . "\n";
// $record->longitude . "\n";
// $record->metro_code . "\n";
// $record->city . "\n";
// $record->postal_code . "\n";
// $record->area_code . "\n";
// $record->continent_code . "\n";

/*
define('CITY', $record->city);
define('STATE', $record->region);
define('ZIP', $record->postal_code);
define('LATITUDE', $record->latitude);
define('LONGITUDE', $record->longitude);
*/
geoip_close($gi);