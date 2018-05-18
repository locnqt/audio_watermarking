<?php
include_once("classmusic.php");
$sp= new MyMusic;
$user = $_POST['username'];

$resultuser = $sp->checkusername($user);
if($resultuser){
	echo 'true';
}
else echo 'false';

?>
