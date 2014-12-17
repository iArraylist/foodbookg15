<?php
include_once"confic.inc.php";
?>

<?php
$error='';
if(isset($_POST['login'])){

	$username=mysql_real_escape_string(stripcslashes($_POST['username']));
	$password=mysql_real_escape_string(stripcslashes($_POST['password']));

	$result=mysql_query("select * from members where username='$username' and password='$password'");
	$rows=mysql_num_rows($result);
	if($rows==1){
		$resultData=mysql_fetch_array($result);
		if($resultData['status']=='PERMIT'){
			$_SESSION['login_username']=$username;
			$_SESSION['login_id']=$resultData['member_id'];
		} else {
			$error="Username id banned, Please contact Admin.";
		}
	} else {
		$error="Username or Password id invalid.";
	}

		// --------- Disconnect Database ---------
	mysql_free_result($result);
	mysql_close($conn);
	
}
?>

<style>
.loginbar {
	padding: 5px;
	border-radius:7px;
	border:0px;
	background: rgba(1,1,1,0.6);
	width: auto;  
	color: #e74c3c;
	font-size:13px;

}

.loginbar:focus {
	outline-color: rgba(0,0,0,0);
	background: rgba(0,0,0,.95);
	color: #e74c3c;
}

.btn-danger{
	height: 27px;
	padding: 3px 8px 8px 8px;
	color: #000000;
}

.btn-primary{
	height: 27px;
	padding: 3px 8px 8px 8px;
	color: #000000;
	margin-top: 5px;
}

</style>


	<form action="" method="post">
		<input  class="loginbar" name="username" placeholder="Username" data-required="required" required >
		<input  class="loginbar" type="password" placeholder="Password" name="password" data-required="required" required>
		<button class="btn btn-danger" type="submit" name="login">Login</button>
	</form>
	<form action="register.php" method="post">
		<button class="btn btn-primary " type="submit" name="gotoRegisForm">Register</button>
	</form>

