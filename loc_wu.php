<?php
 	 $json_geo = file_get_contents("https://freegeoip.net/json/".$_SERVER['REMOTE_ADDR']);
 	 $parsed_geo = json_decode($json_geo);
 	 $ip = $parsed_geo->{'ip'};
	?>
<?php
$tags = get_meta_tags("http://www.geobytes.com/IpLocator.htm?GetLocation&template=php3.txt&IpAddress=$ip");
$coordinate = $tags['latitude'].','.$tags['longitude'];
?>
<?php	
 	 $json_string = file_get_contents("http://api.wunderground.com/api/021208692ff1dc01/geolookup/forecast/q/$coordinate.json");
 	 $parsed_json = json_decode($json_string);
 	 $wu_simple = $parsed_json->{'forecast'}->{'simpleforecast'}->{'forecastday'}[0];
 	 $wu_forecast = $parsed_json->{'forecast'}->{'txt_forecast'}->{'forecastday'}[0];
 	 $city = $parsed_json->{'location'}->{'city'};
 	 $country = $parsed_json->{'location'}->{'country_name'};
 	 $location = $city.', '.$country;
 	 $month = $wu_simple->{'date'}->{'monthname'};
 	 $day = $wu_simple->{'date'}->{'day'};
 	 $year = $wu_simple->{'date'}->{'year'};
 	 $date = $month.' '.$day.', '.$year;
 	 $hi_temp = $wu_simple->{'high'}->{'celsius'};
 	 $lo_temp = $wu_simple->{'low'}->{'celsius'};
 	$temp = $lo_temp.'&degC - '.$hi_temp. '&degC';
	$icon = $wu_forecast->{'icon_url'};
	$text = $wu_forecast->{'fcttext_metric'};
	
	
	?>