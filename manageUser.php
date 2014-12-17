<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/showDetail.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap-tagsinput.js"></script>
	<script src="js/bootstrap-tagsinput-angular.js"></script>
	<script src="js/bootstrap-typeahead.js"></script>
</head>
<body>
	<?php 
	include "confic.inc.php";
	?>
	<?php 

	if(isset($_POST['btn_mngusToP'])){
		mysql_query("UPDATE members SET status='PERMIT' WHERE member_id='$_POST[btn_mngusToP]'");
		
	}
	if(isset($_POST['btn_mngusToB'])){
		mysql_query("UPDATE members SET status='BAN' WHERE member_id='$_POST[btn_mngusToB]'");

	}



	?>
	<table>
		<tr>
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
					?> <button type="submit"  name="btn_mngusToB"  value="<?php echo $resultDate['member_id']; ?>" >ระงับการใช้งาน</button> <?php
				} else{
					?> <button type="submit"  name="btn_mngusToP"  value="<?php echo $resultDate['member_id']; ?>" >เปิดการใช้งาน</button><?php
				}
				?>
			</form>
		</td>
	</tr>

	<?php }
	?>

</table>




</body>
</html>