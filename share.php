<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Simple WeatherApp</title>
<link href="http://www.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"> 
 
 </head>


<?php
  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
  require_once('sdk/facebook.php');

  $config = array(
    'appId'  => '228253414039526',   // Facebook App ID 
  'secret' => '010242f3fab519cd0ba04a479df9adc3',  // Facebook App Secret
    'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
?>

<?php
require 'loc_wu.php';   // Include loc_wu.php to get lat long and forecast info
?>

  <body >
<div class="container"  align="center">
  <?php
    if($user_id) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {
        $ret_obj = $facebook->api('/me/feed', 'POST',
                                    array(
                                      'link' => 'weatherapp.fian.me',
                                      'picture' => $icon ,
                                      'title' => 'Check your current weather here',
                                      'message' =>'Today '.$date.'. Current weather in '.$location.' is '.$text
                                 ));
        echo 'Shared succesfully';

        // Give the user a logout link 
        echo '<br /><button onclick="goBack()">Back</button>';
      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl( array(
                       'scope' => 'publish_actions'
                       )); 
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, so print a link for the user to login
      // To post to a user's wall, we need publish_actions permission
      // We'll use the current URL as the redirect_uri, so we don't
      // need to specify it here.
      $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_actions' ) );
      echo 'Please <a href="' . $login_url . '">login.</a>';

    } 

  ?>      
</div>
<script> function goBack()
  {
  window.history.back()
  }
</script>
  </body> 
</html> 