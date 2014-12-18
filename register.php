<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/HomePage.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/docs.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<link href='http://font-awesomets.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href="css/animate.css" rel='stylesheet' type='text/css' />
	<script>
	new WOW().init();
	</script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
		});
	});
	</script>
</head>
<body>
	<div class="container">
		
		<div class="main-logo wow bounceIn animated">
			<p>
				<img src="LOGO_01.png" alt="">
			</p>
		</div>
	<!-- <a id="login" href=""></a>
	<a id="regis" href=""></a> -->

	<p>
		<img class="login" src="LOGIN_ORI.png" alt="">
	</p>
	

	<?php
	include "confic.inc.php";
	include "navbarV2.php";
	?>

	<?php
	$errorregis='';
	if(isset($_POST['regis'])){

		$username=mysql_real_escape_string(stripcslashes($_POST['username']));
		$password=$_POST['password'];

		$result=mysql_query("select username from members where username='$username'");
		$rows=mysql_num_rows($result);
		if($rows==0){
			if (strlen($password)>=4 && strlen($password)<=16) {
				if($_POST['password']==$_POST['repassword']){
					$result=mysql_query("insert into members (username, password, role) values ('$username', '$password', 'USER')");
					if($result){
						$result=mysql_query("select member_id from members where username='$username'");
						$_SESSION['login_username']=$username;
						$_SESSION['login_id']=$result['member_id'];
						header("location: HomePage.php");
					} else{
						$errorregis="Error for register, Please register again<br>";
					}
				} else{
					$errorregis="Password not match.<br>";
				}
			} else{
				$errorregis="Password need 4-16 character.<br>";
			}
		} else {
			$errorregis="Someone already has that username. Try another.<br>";
		}

		// --------- Disconnect Database ---------
		mysql_free_result($result);
		mysql_close($conn);

	}
	?>
<?php
$errorlogin='';
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
			header("location: HomePage.php");
		} else {
			$errorlogin="Username id banned, Please contact Admin.";
		}
	} else {
		$errorlogin="Username or Password id invalid.";
	}

		// --------- Disconnect Database ---------
	mysql_free_result($result);
	mysql_close($conn);
	
}
?>



	<style>



	h1 {
		font-size: 32px;
		font-weight: 300;
		color: #4c4c4c;
		text-align: center;
		padding-top: 40px;
		margin-bottom: 10px;
	}
	.testbox {
		margin: 50px auto;
		width: 343px; 	
		height: 364px; 
		-webkit-border-radius: 8px/7px; 
		-moz-border-radius: 8px/7px; 
		border-radius: 8px/7px; 
		background-color: #ebebeb; 
		-webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
		-moz-box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
		box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
		border: solid 1px #cbc9c9;
		color: #4c4c4c;
	}

	#regis{
		background-color: black;
		width: 260px;
		position: absolute;
		height: 250px;
		z-index: 15;
		top: 30%;
		left: 50%;
		margin: -125px 0 0 -130px;
	}



	#icon {
		display: inline-block;
		width: 40px;

		background-color: #F34141;
		padding: 8px 0px 8px 0px;
		margin-left: 15px;
		-webkit-border-radius: 4px 0px 0px 4px; 
		-moz-border-radius: 4px 0px 0px 4px; 
		border-radius: 4px 0px 0px 4px;
		color: white;
		-webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.09);
		-moz-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
		box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
		border: solid 0px #cbc9c9;
	}

	
	.regisbutton {
		font-size: 14px;
		font-weight: 600;
		color: white;
		padding: 6px 25px 0px 20px;
		margin: 10px 8px 20px 0px;
		text-decoration: none;
		width: 50px; height: 27px; 
		-webkit-border-radius: 5px; 
		-moz-border-radius: 5px; 
		border-radius: 5px; 
		background-color: #F34141 ; 
		-webkit-box-shadow: 0 3px rgba(58,87,175,.75); 
		-moz-box-shadow: 0 3px rgba(58,87,175,.75); 
		box-shadow: 0 3px rgba(58,87,175,.75);
		transition: all 0.1s linear 0s; 
		top: 0px;
		position: relative;
	}	

	.regisbutton:hover {
		top: 3px;
		background-color:#EC1704;
		-webkit-box-shadow: none; 
		-moz-box-shadow: none; 
		box-shadow: none;

	}

	.regisinput{
		width: 200px; 
		height: 30px; 
		-webkit-border-radius: 0px 4px 4px 0px/5px 5px 4px 4px; 
		-moz-border-radius: 0px 4px 4px 0px/0px 0px 4px 4px; 
		border-radius: 0px 4px 4px 0px/5px 5px 4px 4px; 
		background-color: #fff; 
		-webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
		-moz-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
		box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
		border: solid 1px #cbc9c9;
		margin-left: -5px;
		margin-top: 13px; 
		padding-left: 10px;
	}


	</style>

	<section id="r-search-login" style="padding: 15px;">
	<div class="col-md-6 loginpage">
		<h4>ยังไมไ่ด้เป็นสมาชิก ?</h4>
		<p>*ลงทะเบียนเพื่อประสบการณ์ที่ดีกว่า*<p5>
		<div class="testbox">
			<h1>Registration</h1>
			<form action"" method="post">
				<center>
					<?php echo "$errorregis"; ?><br>
					<label id="icon" for="name"><i class="icon-user"></i></label>
					<input class="regisinput" type="text" name="username" placeholder="Username" required/><br>
					<label id="icon" for="name"><i class="icon-shield"></i></label>
					<input class="regisinput" type="password" name="password" placeholder="Password" required/><br>
					<label id="icon" for="name"><i class="icon-shield"></i></label>
					<input class="regisinput" type="password" name="repassword" placeholder="Re-Password" required/><br>
					<button style="height: 33px;width: 93px;padding-bottom: 6px;" class="regisbutton" type="submit" name="regis">Register</button>
				</center>
			</form>
		</div>
	</div>
	<div class="col-md-6">
	<h4>เข้าสู่ระบบ</h4>
	<p>*สำหรับผู้ที่เป็นสมาชิกอยู่เเล้ว*<p5>
		<div class="testbox">
			<h1>Login</h1>
			<form action"" method="post">
				<center>
					<?php echo "$errorlogin"; ?><br>
					<label id="icon" for="name"><i class="icon-user"></i></label>
					<input class="regisinput" type="text" name="username" placeholder="Username" required/><br>
					<label id="icon" for="name"><i class="icon-shield"></i></label>
					<input class="regisinput" type="password" name="password" placeholder="Password" required/><br>
					
					<button style="height: 33px;width: 93px;padding-bottom: 6px;" class="regisbutton" type="submit" name="login">Login</button>
				</center>

			</form>
		</div>
	</div>
	</section>

		<!--

		<div id="regis">
			<center><h2>Register</h2></center>
			<form action"" method="post">
				<span><?php echo "$error"; ?></span>
				Username <input name="username" placeholder="Username" data-required="required" required /><br/>
				Password <input type="password" placeholder="4-16 chracters" name="password" data-required="required" required><br/>
				Re-Password <input type="password" name="repassword" data-required="required" required><br\>
				<input type="submit" name="regis" value="Register">
				<p>By clicking Register, you agree on our <a href="#">terms and condition</a>.</p>
			</form>
		</div>
	-->
</div>	


</body>
</html>

