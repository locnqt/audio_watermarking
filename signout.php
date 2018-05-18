 <meta charset="UTF-8">
<?php
session_start();
ini_set('display_errors',0);
if($_SESSION['username'])
{
	unset($_SESSION['username']);
	unset($_SESSION['permission']);
	?>
    <script>
    alert('Đăng xuất thành công!');
	location.href='<?php echo $url_host ?>index.php';
	</script>
    <?php

}
else {

	?>
    <script>
	location.href='<?php echo $url_host ?>index.php';
	</script>
    <?php
}

?>