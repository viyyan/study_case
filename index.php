<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Simple WeatherApp</title>
<link href="http://www.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"> 
 
 </head>

<?php
require 'fbconfig.php';   // Include fbconfig.php file
?>

<?php
require 'loc_wu.php';   // Include loc_wu.php to get lat long and forecast info
?>

<!doctype html>

	
  <?php if ($user): ?> 

  <body >
	     <!--  After user login  -->
<div class="container"  align="center">
<h3>Simple Weather App</h3>
<table style="width:400px" >
<tr>
  <th style="width:100px"></th>
  <th style="width:300px"></th>		
  </tr>
<tr>
  <td><img src="https://graph.facebook.com/<?php echo $user; ?>/picture"></td>
  <td>Hello <?php echo $fbfullname; ?> <p>Current weather condition in your location </p></td>		
  </tr>
<tr>
  <td>Date</td>
  <td><?php echo $date;?></td>		
  </tr>
<tr>
  <td>Coordinate</td>
  <td><?php echo $coordinate;?></td>		
  </tr>
<tr>
  <td>Location</td>
  <td><?php echo $location;?></td>		
  </tr>
<tr>
  <td>Weather</br><img src="<?php echo $icon;?>"></br><?php echo $temp;?></td>
  <td><?php echo $text;?></td>		
  </tr>

<tr>

<tr>	
<td>
<div><a href="<?php echo $logoutUrl; ?>">Logout</a></div>	
</td>
	<td>
	<div><a href="share.php">
	Share</a</div>
</td>
</tr>
</table>
    <?php else: ?>    
     <!-- Before login --> 
<div class="container" align="center">
<h3>Check current weather in your location</h3>
           Not Connected
<div>
      <a href="<?php echo $loginUrl; ?>">Login with Facebook</a></div>
      </div>
    <?php endif ?>
    
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

  </body>
</html>