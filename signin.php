
<?php 
include_once('classmusic.php');
$t = new MyMusic;
if(isset($_POST['username'])&&isset($_POST['password'])){
	$kn= mysqli_connect("localhost","root","","audioweb");
	$user = mysqli_real_escape_string($kn,$_POST['username']);
	$pass = $_POST['password'];
	$resultuser= $t->checkuser($user,$pass);
	$n=mysqli_num_rows($resultuser);
	if($n==0){
		?>
<script>
			alert('Tên đăng nhập hoặc mật khẩu chưa đúng!');
		</script>
<?php	
	}
	else {

		$rowuser=mysqli_fetch_array($resultuser);
		$_SESSION['username']=$rowuser['username'];
		$_SESSION['permission']=$rowuser['permission'];


		?>
<script>
			alert('Đăng nhập thành công!');
			location.href='index.php';
		</script>
<?php
	}
}
?>
<div>
  <form action='' method='post'>
    <div class="signin_form">
      <div class="title_form_row" style="margin-left:35px;"><h1>SIGN IN FORM</h1></div>
      <div class="form_row">
        <label class="signin"><strong>Username: </strong></label>
        <input type='text' name='username' class="signin_input" />
      </div>
      <div class="form_row">
        <label class="signin"><strong>Password: </strong></label>
        <input type='password' name='password' class="signin_input" />
      </div>
      <div class="form_row">
        <input type='submit' name='ok' class="signin" value=" Sign in " style="color:#000"/>
      </div>
      <div class="form_row" style="margin-left:35px;">
      <h5 style="color:#ffff; padding:15px; margin-top:35px;">Don't have account <a href="index.php?act=dk">Sign Up </a> NOW. </h5>
      </div>
    </div>
  </form>
</div>