<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
	if($act=="dn") include ('signin.php');
	else if($act=="dx") include('signout.php');
	else if($act=="dk") include('signup.php');
	else if($act=="checksignature") include('checksignature.php');
	else if($act=="upload") include('upload.php');
	else if($act=="mms") include('mymusic.php');
	
}else include ('listmusic.php');
?>