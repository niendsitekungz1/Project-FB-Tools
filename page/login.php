<?php
	session_start();
	include('config.php');
	if(isset($_SESSION["password"]))
	{
		header("location:index.php");
	}
	if(isset($_SESSION["password"]))
	{
		header("location:index.php");
	}
	if($_POST){
		$password = $_POST['password'];
			if($password == ""){
				echo '<script>ierror("Password Empty !", "กรุณาใส่รหัสผ่าน");</script>';
			} else{
				if($password == $admin_pass){
					$_SESSION['password'] = $password;
					$_SESSION['status'] = "admin";
					echo '<script>isuccess("Login Success !!", "เข้าสู่ระบบสำเร็จ");</script>';
				} else{
						echo '<script>ierror("Password Wrong !!", "รหัสผ่านไม่ถูกต้อง");</script>';
					}
				}
			}
?>
	   <form method="post" class="form-signin" name="mainform" role="form">
	   <label for="password" class="text-light float-left"><i class="fa fa-lock"></i> Password :</label>
        <div class="input-group">
        <input class="form-control" style="height: 40px;" name="password" type="password" placeholder="กรุณาใส่รหัสผ่าน">
        </div>
    <br>
        <button class="btn btn-outline-light btn-block" type="submit" onClick="mainform.act.value='login';mainform.submit();"><i class="fas fa-sign-in-alt"></i> Login</button>
    </form>
   </div>
  </div>
 </body>
</html>