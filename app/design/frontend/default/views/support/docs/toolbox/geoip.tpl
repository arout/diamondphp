<div class="white-row styleSecondBackground">
    
    <div class="row">
        <div class="col-xs-12 text-center"><h1><i class="featured-icon fa fa-crosshairs"></i> GeoIP Helper</h1></div>
    </div>
        <div class="clear"></div>
        <p class="text-center">
	The GeoIP helper uses Maxmind's geolocation database to give you accurate access to visitors' location data.
        </p>
</div>

<h1 class="text-center">Use it: <code>$this->toolbox('geoip')</code></h1>

<div class="white-row">
    <legend>Syntax and Usage</legend>
    <p>
        The Geoip helper provides easy access to geolocation data and distance calculations. The following methods are available:<br>
    <ul>
        <li><a href="#cities">cities()</a></li>
        <li><a href="#distance">distance()</a></li>
        <li><a href="#ip">ip()</a></li>
        <li><a href="#radius">search_radius()</a></li>
        <li><a href="#zipcode">zipcode()</a></li>
    </ul>
    
    To quickly access visitor location data, view the list of functions <a href="#misc">view the list of functions</a>
    </p>
    
    <legend><a id="cities" style="text-decoration: none !important; color: inherit;">cities()</a></legend>
    <p>
        The cities() function returns an array of cities located in the specified zip code or state. To use the cities function,
        you may pass either a <strong>five digit</strong> zip code, or the two letter state abbreviation:<br><br>
        <code>$this->toolbox('geoip')->cities( 10120 )</code><br><br>
        <code>$this->toolbox('geoip')->cities( "NY" )</code>
    </p> 
    <p>
        <strong>Example usage</strong><br>
        <code>
            $cities = $this->toolbox('geoip')->cities( "NY" );<br>
            foreach( $cities as $city )<br>
            &nbsp;&nbsp;&nbsp;&nbsp;echo $city['citycode'] .', '.$city['statecode'];
        </code>
    </p>
    
    <legend><a id="distance" style="text-decoration: none !important; color: inherit;">distance()</a></legend>
    <p>
        <code>$this->toolbox('geoip')->distance()</code>
    </p>
    <p>
        The distance() function returns the distance (in miles, km or nautical miles) between two coordinates. This is especially useful for 
        finding the distance between two cities; or any two locations in which you know the latitude and longitude for.
    </p>
    <div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> 
    The distance() function has a margin of error of approximately 1% - 2%, since it cannot account for elevation changes.
    Also keep in mind that it measures distance in a straight line from point to point; it is not necessarily indicative of 
    driving mileage.
    </div>
    <p>
        The function expects five parameters: the latitude and longitude for both locations, and the desired format to display the results
        ( miles / km / nm ).<br>
        <code>$this->toolbox('geoip')->distance( $latitude_1, $longitude_1, $latitude_2, $longitude_2, 'M' )</code><br>
        <em>For the final parameter, 'M' = miles, 'K' = kilometers, 'N' = nautical miles</em>
    </p>
    <p>
        If you know the latitude and longitude for both locations, you may pass those coordinates directly to the function as
        a either float or string, in the order specified above.<br>
        
        <code>$this->toolbox('geoip')->distance( '31.0989', '-71.934424', '31.7765', '-69.244358', 'M' )</code><br><br>
        
        If you do not know the coordinates, then you will need to use a third party API of your choice to obtain that information.
    </p>
    <p class="alert alert-info"><i class="fa fa-info-circle"></i> 
        If you are trying to find the distance between two cities, you manipulate the Geoip helper to get the necessary coordinates
        for you.
    </p>
    <p>
        To get the latitude and longitude coordinates for two cities using the helper, you will need to know the zipcode for each 
        city. If you do not know the zipcodes either, then the Geoip helper can get that data for you as well, by looking up the 
        city and state. Let's see an example of how to get the zip codes, and then use those zipcodes to retrieve the latitude and longitude information.
    </p>
    <p>
        <strong>From inside your controller or model:</strong>
    </p>
<pre>
# Define the first city and state to search
$city  = 'Sacramento';
$state = 'CA';      // State must ALWAYS be the two letter abbreviation, in upppercase letters

# Assign the zip code to a variable
$zipcode_1 = $this->toolbox('geoip')->zipcode( $city, $state );

# Define the second city and state to search
$city  = 'Las Vegas';
$state = 'NV';      // State must ALWAYS be the two letter abbreviation, in upppercase letters

# Assign the zip code to a variable
$zipcode_2 = $this->toolbox('geoip')->zipcode( $city, $state );
</pre>
    <blockquote>
    <h5>
        Now that we have the zip codes for our two locations (stored as $zipcode_1 and $zipcode_2), we can use them to find the 
        coordinates.
    </h5>
    </blockquote>

<pre>
# Get the lat / long for $zipcode_1
$query = "SELECT latitude, longitude FROM zips WHERE code = ?";
$coord  = $this->db->prepare( $query );
$coord->execute( array( $zipcode_1 ) );

# Store the latitude and longitude for this city
foreach( $coord as $geo ) {
    $lat_1  = $geo['latitude'];
    $long_1 = $geo['longitude'];
}

# Get the lat / long for $zipcode_2
$query = "SELECT latitude, longitude FROM zips WHERE code = ?";
$coord  = $this->db->prepare( $query );
$coord->execute( array( $zipcode_2 ) );

# Store the latitude and longitude for this city
foreach( $coord as $geo ) {
    $lat_2  = $geo['latitude'];
    $long_2 = $geo['longitude'];
}
</pre>    
    <p>
        <strong>
            Note
        </strong><br>
        The website visitor's latitude and longitude can be accessed directly from the Geoip helper. If you wish to find the 
        distance from the visitor's current physical location to another location, substitute <code>$lat_1</code> and 
        <code>$long_1</code> with the following:
    </p>
<pre>
$lat_1  = $this->toolbox('geoip')->latitude;
$long_1 = $this->toolbox('geoip')->longitude;
</pre>
    <blockquote>
    <h5>
        Finally, pass the coordinates to the distance() function
    </h5>
    </blockquote>
    <p>
        <code>$this->toolbox('geoip')->distance( $lat_1, $long_1, $lat_2, $long_2, 'M' )</code><br>
    </p>

    
    <legend><a id="ip" style="text-decoration: none !important; color: inherit;">ip()</a></legend>
    <p>
        The ip() function returns the visitor's true IP address (even if user is behind a proxy).<br>
        <code>echo $this->toolbox('geoip')->ip()</code>
    </p>
    
    <legend><a id="radius" style="text-decoration: none !important; color: inherit;">search_radius()</a></legend>
    <p>
        The search_radius() function returns an array containing all cities within a specified radius (in miles) of 
        the visitor's current location. It accepts one parameter, an integer, which indicates the search radius.
    </p>        
<pre>
// Search for all cities within a 25 mile radius
// Example output: Brooklyn, New York 10120

$search = $this->toolbox('geoip')->search_radius( 25 );
foreach( $search as $city )
    echo $city['citycode'] .', '. $city['statecode'] .' ' .$city['code'];
</pre>
<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> 
    The search_radius() function has a margin of error of approximately 1% - 2%, since it cannot account for elevation changes.
    Also keep in mind that it measures distance in a straight line from point to point; it is not necessarily indicative of 
    driving mileage.
    </div>    
    
    <legend><a id="zipcode" style="text-decoration: none !important; color: inherit;">zipcode()</a></legend>
    <p>
        The zipcode() function returns an array of zip codes that belong to a specified city and state. It accepts two parameters,
        $city and $state. The $state parameter must be the two letter state abbreviation.
    </p>
<pre>
$city = "Brooklyn";
$state = "NY";

$zipcodes = $this->toolbox('geoip')->zipcode( $city, $state);

foreach( $zipcodes as $zipcode )
    echo $zipcode['code'];
</pre>
    
    
    <legend><a id="misc" style="text-decoration: none !important; color: inherit;">Visitor data</a></legend>
    <p>
        To quickly access user location data, simply echo the below variables:
    </p>
<pre>
$this->toolbox('geoip')->city;
$this->toolbox('geoip')->state;
$this->toolbox('geoip')->zipcode;
$this->toolbox('geoip')->latitude;
$this->toolbox('geoip')->longitude;     
</pre>
    
</div>

<?php $this->view('support/helpers'); ?>