<?php 
require 'fbconfig.php';
$facebook->destroySession();  // to destroy facebook sesssion
header("Location: " ."http://weatherapp.fian.me");        // you can enter home page here ( Eg : header("Location: " ."http://www.krizna.com"); 
?>