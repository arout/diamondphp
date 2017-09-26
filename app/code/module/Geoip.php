<?php
namespace Hal\Module;
/*
 * DOCUMENTATION:
 * https://github.com/maxmind/GeoIP2-php
 */
class Geoip extends \GeoIp2\Database\Reader
{
	# Database access needed for some calculations
	private $db;
	# Search radius properties
	public $radius = [];
	# Use MaxMind GeoIP data to determine user location
	private $record;
	public $ip_address;
	public $latitude;
	public $longitude;
	public $city;
	public $state;
	public $state_abbr;
	public $zipcode;
	public $country;
	public $country_abbr;

	public function __construct($geo_db_file, $db)
	{
		parent::__construct($geo_db_file);
		$this->db = $db;

		$ip = getenv('HTTP_CLIENT_IP') ?:
		getenv('HTTP_X_FORWARDED_FOR') ?:
		getenv('HTTP_X_FORWARDED') ?:
		getenv('HTTP_FORWARDED_FOR') ?:
		getenv('HTTP_FORWARDED') ?:
		getenv('REMOTE_ADDR');

		if (gethostname() == 'localhost.localdomain' || gethostname() == 'DESKTOP-JQEEVE9')
		{
			$ip = '73.187.22.165';
		}
		$this->ip_address = $ip;

		$this->record = $this->city($ip);
		// City name
		$this->city = $this->record->city->name;
		// State name
		$this->state = $this->record->mostSpecificSubdivision->name;
		// Two letter abbreviation for state
		$this->state_abbr = $this->record->mostSpecificSubdivision->isoCode;
		// Five digit zip code
		$this->zipcode = $this->record->postal->code;
		// Country name
		$this->country = $record->country->name;
		// Two letter abbreviation for country
		$this->country_abbr = $record->country->isoCode;
		// Latitude and longitude
		$this->latitude  = $this->record->location->latitude;
		$this->longitude = $this->record->location->longitude;
	}

	public function ip()
	{
		return $this->ip_address;
	}

	public function distance($lat1, $lon1, $lat2, $lon2, $unit = "M")
	{
		$theta = $lon1 - $lon2;
		$dist  = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist  = acos($dist);
		$dist  = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit  = strtoupper($unit);

		if ($unit == "K")
		{
			return ($miles * 1.609344);
		}
		else if ($unit == "N")
		{
			return ($miles * 0.8684);
		}
		else
		{
			if ($miles < 10)
			{
				$miles = number_format($miles, 1, '.', '');
			}
			else
			{
				$miles = number_format($miles);
			}

			return $miles;
		}
	}

	public function search_radius($miles): \PDOStatement
	{
		# This function will try to find all cities within a given radius based on
		# the current visitor's location
		$query = "SELECT DISTINCT citycode, statecode, code,
		(
			3959 * acos( cos( radians( ? ) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( latitude ) ) )
		)
		AS distance
		FROM zips
		HAVING distance <= $milesORDER BY distance ASC;
";

		$cities_in_radius = $this->db->prepare($query);
		$cities_in_radius->execute([$this->latitude, $this->longitude, $this->latitude]);

		return $cities_in_radius;
	}

	public function cities($zip)
	{
		# Return a list of cities for the specified state or zip code
		if (strlen($zip) === 5)
		{
			# Search by zip code
			$q = "SELECT citycode, statecode FROM zips WHERE code = ? ";
			$s = $this->db->prepare($q);
			$s->execute([$zip]);
		}
		else
		{
			# Search by state
			$q = "SELECT citycode FROM zips WHERE statecode = ? ";
			$s = $this->db->prepare($q);
			$s->execute([$zip]);
		}

		if ($s)
		{
			return $s;
		}

		return false;
	}

	public function states($zip)
	{
		$q = "SELECT statecode FROM zips WHERE code = ? ";
		$s = $this->db->prepare($q);
		$s->execute([$zip]);

		return $s;
	}

	public function zipcode($city, $state)
	{
		$q = "SELECT code FROM zips WHERE citycode = ? AND statecode = ? ";
		$s = $this->db->prepare($q);
		$s->execute([$city, $state]);
		return $s['code'];
	}

}
