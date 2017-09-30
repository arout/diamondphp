{nocache}

Locations:<br>

{foreach $data.location as $city}

	<p>{$city.citycode}, {$city.statecode}</p>

{/foreach}

{$data['pagination_links']}

{/nocache}
