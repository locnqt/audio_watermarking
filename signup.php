<?php
include_once("classmusic.php");
$sp= new MyMusic;


$username=$_POST['username2'];

$password=$_POST['password'];
$confirm=$_POST['confirm'];

if (isset($_POST['signup'])) {
	$resultreg=$sp->insertuser($username,$password);
	echo $resultreg;
	if($resultreg){
		?>
<script>
			alert('Sign Up Successed!');
			location.href='index.php?act=dn';
		</script>
<?php	
	} else { 
		?>
<script>
			alert('Sign Up Fail!');
			location.href='index.php?act=dn';
		</script>
<?php
	} 
}
?>

<div>
  <form method='post' name="dangki" id="dangki" action="">
    <div class="signin_form">
      <div class="title_form_row" style="margin-left:35px;">
        <h1>SIGN UP FORM</h1>
      </div>
      <div class="form_row">
        <label class="signin"><strong>Username: </strong></label>
        <input type='text' name='username2' id="username2" class="signin_input"  maxlength="15" placeholder="Nhập tên tài khoản" required  onblur="checkUser(this.value)" value="<?php echo $_POST['username2'];    ?>"/>
        <div class="alert-danger text-center" id="user_error"></div>
      </div>
      <div class="form_row">
        <label class="signin"><strong>Password: </strong></label>
        <input type='password' class="signin_input" name="password" id="password2"  placeholder="Nhập mật khẩu" required />
        <div class="alert-danger text-center" id="pass_error"></div>
      </div>
      <div class="form_row">
        <label class="signin" style="margin-left:-40px"><strong>Confirm Password: </strong></label>
        <input type='password' class="signin_input" name="confirm" id="confirm"  placeholder="Xác nhận mật khẩu" required/>
        <div class="alert-danger text-center" id="pass_error2"></div>
      </div>
      <div class="form_row">
        <input type='submit' name='signup' class="signin" value=" Sign up" style="color:#000" id="reg2"/>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript">
	
	function checkUser(username){
		$.post('checkuser.php', {'username': username}, function(data) {
				if(data=="true"){
				
				$("#user_error").text("Username already used");
				$('#reg2').attr({
					"disabled": ''
				});
				

			}
			else{ $("#user_error").text("");
			$('#reg2').attr('disabled');
		}
	});
	}
	$('#username2').on('keyup change', function () {
		$("#username2").val($(this).val().split(' ').join(''));
	});
	$('#password2, #confirm').on('keyup', function () {
		if ($('#password2').val().length > 5) {
			$('#reg2').removeAttr('disabled');
			$('#pass_error').html('');
		} else {
			$('#pass_error').html('Week Password!');
			$('#reg2').attr({
				"disabled": ''
			});
		}
		if ($('#password2').val() == $('#confirm').val()) {
			$('#reg2').removeAttr('disabled');
			$('#pass_error2').html('');
		} else {
			$('#pass_error2').html('Not Match!');
			$('#reg2').attr({
				"disabled": ''
			});
		}
	});
	
</script>