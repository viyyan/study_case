<?php
require 'sdk/facebook.php';  
$facebook = new Facebook(array(
  'appId'  => '228253414039526',   // Facebook App ID 
  'secret' => '010242f3fab519cd0ba04a479df9adc3',  // Facebook App Secret
  'cookie' => true,	
));
$user = $facebook->getUser();
if ($user) {
  try {
    $user_profile = $facebook->api('/me');
  	    $fbid = $user_profile['id'];                 // To Get Facebook ID
 	    $fbuname = $user_profile['username'];  // To Get Facebook Username
 	    $fbfullname = $user_profile['name']; // To Get Facebook full name
	      $femail = $user_profile['email'];    // To Get Facebook email ID
    //       checkuser($fbid,$fbuname,$fbfullname,$femail);    // To update local DB
  } catch (FacebookApiException $e) {
    error_log($e);
   $user = null;
  }
}
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl(array(
		 'next' => 'http://weatherapp.fian.me/logout.php',  // Logout URL full path
		));
} else {
 $loginUrl = $facebook->getLoginUrl(array(
		'scope'		=> 'email', // Permissions to request from the user
		));
}
?>