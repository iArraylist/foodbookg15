<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">\
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/categoryType.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/docs.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
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
		<div class="r-header-container">

		</div>

		<?php 
		include "navbarV2.php";
		?>
		<?php
	if(isset($_POST['btn_mngusToP'])){
		mysql_query("UPDATE members SET status='PERMIT' WHERE member_id='$_POST[btn_mngusToP]'");
		
	}
	if(isset($_POST['btn_mngusToB'])){
		mysql_query("UPDATE members SET status='BAN' WHERE member_id='$_POST[btn_mngusToB]'");

	}



	?>

	<div style="padding:15px;background-color:#fff;margin-bottom:10px;">
	<table class="table table-bordered table-hover">
		<tr class="r-row">
			<td>ชื่อผู้ใช้งาน</td>
			<td>บทบาท</td>
			<td>ตั้งค่าการใช้งาน</td>
		</tr>
		<?php 
		$result=mysql_query("SELECT * FROM members WHERE username != 'admin'");

		while($resultDate = mysql_fetch_array($result)){ ?>
		<tr>
			<td><?php echo $resultDate['username']; ?></td>
			<td><?php echo $resultDate['role']; ?></td>
			<td><form action="" method="POST">
				<?php 
				if($resultDate['status'] == "PERMIT"){
					?> <button type="submit"  name="btn_mngusToB"  value="<?php echo $resultDate['member_id']; ?>"class="btn btn-success" >ใช้งานปกติ</button> <?php
				} else{
					?> <button type="submit"  name="btn_mngusToP"  value="<?php echo $resultDate['member_id']; ?>" class="btn btn-danger" >ถูกระงับการใช้งาน</button><?php
				}
				?>
			</form>
		</td>
	</tr>

	<?php }
	?>

</table>
</div>

		<?php 
		include "footer.html";
		?>
	</div>
</body>
</html>