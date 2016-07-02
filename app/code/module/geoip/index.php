<?php
if(!isset($_SERVER['HTTP_REFERER']))
{
	# Direct access to this script is not allowed. Fire off a 403
	header('Location: ../../../error/_404');
	exit;	
}
include("geoipcity.inc");
include("geoipregionvars.php");

// uncomment for Shared Memory support
// geoip_load_shared_mem("/usr/local/share/GeoIP/GeoIPCity.dat");
// $gi = geoip_open("/usr/local/share/GeoIP/GeoIPCity.dat",GEOIP_SHARED_MEMORY);

$gi = geoip_open("GeoLiteCity.dat",GEOIP_STANDARD);

$ip = 		getenv( 'HTTP_CLIENT_IP' )?:
			getenv( 'HTTP_X_FORWARDED_FOR' )?:
			getenv( 'HTTP_X_FORWARDED' )?:
			getenv( 'HTTP_FORWARDED_FOR' )?:
			getenv( 'HTTP_FORWARDED' )?:
			getenv( 'REMOTE_ADDR' );


$record = geoip_record_by_addr( $gi, $ip );

//print $record->country_code . " " . $record->country_code3 . " " . $record->country_name . "\n";
$record->region . " " . $GEOIP_REGION_NAME[$record->country_code][$record->region] . "\n";  // State code, state name
$record->latitude . "\n";
$record->longitude . "\n";
$record->metro_code . "\n";
$record->city . "\n";
$record->postal_code . "\n";
$record->area_code . "\n";

$record->continent_code . "\n";

geoip_close($gi);

$thisurl = $_SERVER['SCRIPT_FILENAME'];