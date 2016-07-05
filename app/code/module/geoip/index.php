<?php
if(!isset($_SERVER['HTTP_REFERER']))
{
	# Direct access to this script is not allowed. Fire off a 404
	header('Location: ../../../error/_404');
	exit;	
}
include("geoipcity.inc");
include("geoipregionvars.php");
// include 'config.php';
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

print $record->country_code . " " . $record->country_code3 . " " . $record->country_name . "<br>";
print $record->region . " " . $GEOIP_REGION_NAME[$record->country_code][$record->region] . "<br>";  // State code, state name
print $record->latitude . "<br>";
print $record->longitude . "<br>";
print $record->metro_code . "<br>";
print $record->city . "<br>";
print $record->postal_code . "<br>";
print $record->area_code . "<br>";

print $record->continent_code . "<br>";

geoip_close($gi);

// $thisurl = $_SERVER['SCRIPT_FILENAME'];

?>

<table>
	<tr><td>IP Address</td><td><?= $ip; ?></td></tr>
	<tr><td>City</td><td><?= $record->city; ?></td></tr>
	<tr><td>State</td><td><?= $record->region; ?></td></tr>
</table>