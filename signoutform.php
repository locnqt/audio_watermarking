<?php
	if($_SESSION['permission']==1){
		echo '<li><a href="index.php?act=mms">My Music</a></li>';
		echo '<li><a href="index.php?act=upload">UpLoad</a></li>';
		echo '<li><a href="index.php?act=dx">SignOut</a></li>';
	}
	else{ 
		echo '<li><a href="index.php?act=mms">My Music</a></li>';
		echo '<li style="margin-left:70px"><a></a></li>';
		echo '<li><a href="index.php?act=dx">SignOut</a></li>';
	}
?>