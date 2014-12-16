
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="CSS/bootstrap.min.css" rel="stylesheet">
	<link href="CSS/soponCss.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href="css/bootstrap-tagsinput.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap-tagsinput.js"></script>
	<script src="js/bootstrap-tagsinput-angular.js"></script>
	<script src="js/bootstrap-typeahead.js"></script>
	<title>Show Detail</title>
</head>
<body>

	<?php
	include "confic.inc.php";
	include_once"header.php";
	?>
	<?php 
	
	function check_data($sql){
		#check data success??
		$retval = mysql_query( $sql);
		if(! $retval ){
			die('Could not enter data: ' . mysql_error()); }
			echo "Entered data successfully"; }	
		#query from database
			$sql = "select * from recipes where recipe_id = '".$_GET["recipe_id"]."'";
			$dbname = "foodbookdb";
			mysql_query("SET NAMES UTF8"); //show thai 
			$dbquery = mysql_db_query($dbname, $sql);
			$fetarray = mysql_fetch_array($dbquery);	

			?>		
			<form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data" >
				<h1> <center></center> </h1>
				<div class="r-container">
					<div class="row">
						<div class="col-sm-4">
							<h2><?php echo $fetarray['recipe_name'] ; ?></h2>
						</div>
						<div class="col-sm-6">
							<?php include ("showRates.php");?><!-- ที่คิดไว้คือหลังจากชื่อเมนูจะเป็น rate -->
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<h4>Picture</h4>
							<img class="focal-point" src="images/food_img/<?php echo $fetarray['picture'] ;?>">
						</div>
						<div class="col-sm-6">
							<h4>วัตถุดิบ</h4>
							<textarea  readonly="readonly" class="form-control" rows="5" name="" style="resize : none;">
								<?php
								echo " ";
								$rec_id=$fetarray['recipe_id'];
								$rec_with_ing=mysql_query("SELECT * FROM reci_has_ing WHERE recipe_id='$rec_id'");
								while ($rec=mysql_fetch_array($rec_with_ing)) {
									$ing_id=$rec['ing_id'];
									$ing=mysql_query("SELECT * FROM ingrediants WHERE ing_id='$ing_id'");
									$ingg=mysql_fetch_array($ing);

									echo $ingg['ing_name'];
									echo " ";
									echo $rec['quantity'];
									echo "&#13;&#10;";
								}



								?>
							</textarea>
							<h4>เครื่องปรุง</h4>
							<textarea readonly="readonly" class="form-control" rows="5" name="" style="resize : none;"><?php echo $fetarray['seasoning'] ; ?></textarea>
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-12">
							<h4>คำอธิบายเมนู</h4>
							<textarea readonly="readonly" class="form-control" rows="2" name="" style="resize : none;"><?php echo $fetarray['descripShort'] ; ?></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<h4>วิธีทำ</h4>
							<textarea readonly="readonly" class="form-control" rows="4" name="" style="resize : none;"><?php echo $fetarray['howTo'] ; ?></textarea>
						</div>
					</div>
				</div>
			</form>

			
			
			
		</body>
		</html>  			
		
		