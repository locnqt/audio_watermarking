<?php session_start(); 
ini_set("display_errors",0);
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 180);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Audio watermark</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<body>
<div class="main"> 
  <!--  HEADER START -->
  <div class="header">
    <h1>LOCNQT AUDIO WATERMARK</h1>
  </div>
  <!--  HEADER END --> 
  <!--  CONTENT START -->
  <div class="content"> 
    <!--  MENU -->
    <div id="menu">
      <div class="left_menu"></div>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?act=checksignature">Check signature</a></li>
        <?php 
            if(!isset($_SESSION['username'])){
                echo '<li style="margin-left:205px"><a></a></li><li><a href="index.php?act=dn">Sign In</a></li>';
            }
            else include_once('signoutform.php');
        ?>
      </ul>
      <div class="right_menu"></div>
    </div>
    <div class="clr"></div>
    <?php include('actindex.php'); ?>
  <!--  CONTENT END --> 
  <!--  FOOTER START -->
  <div class="footer">
    <div class="clr"></div>
    <div class="copyright">
      <p><img src="images/logo.jpg" alt="image footer" style="vertical-align:middle"/>Copyright © 2018 - Designed by <a href="https://www.facebook.com/profile.php?id=100008316695093" target="_blank">LOCNQT</p>
    </div>
  </div>
  <!--  FOOTER END --> 
</div>
</body>
</html>
