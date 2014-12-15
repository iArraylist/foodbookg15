
<html>
<head>
	<title>Foodbook</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.min.css" rel="stylesheet">
	
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	<link href="css/soponCss.css" rel="stylesheet">
	<link href="css/bootstrap-tagsinput.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap-tagsinput.js"></script>
	<script src="js/bootstrap-tagsinput-angular.js"></script>
	<script src="js/bootstrap-typeahead.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
	<?php
	include_once"header.php";
	include_once"confic.inc.php";
	?>

	<?php
	$error='';
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
						header("location: index.php");
					} else{
						$error="Error for register, Please register again<br>";
					}
				} else{
					$error="Password not match.<br>";
				}
			} else{
				$error="Password need 4-16 character.<br>";
			}
		} else {
			$error="Someone already has that username. Try another.<br>";
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

		background-color: #3a57af;
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
		background-color: #3a57af; 
		-webkit-box-shadow: 0 3px rgba(58,87,175,.75); 
		-moz-box-shadow: 0 3px rgba(58,87,175,.75); 
		box-shadow: 0 3px rgba(58,87,175,.75);
		transition: all 0.1s linear 0s; 
		top: 0px;
		position: relative;
	}	

	.regisbutton:hover {
		top: 3px;
		background-color:#2e458b;
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



	<div class="testbox">
		<h1>Registration</h1>

		<form action"" method="post">
			<center>
			<?php echo "$error"; ?>
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
</body>
</html>


