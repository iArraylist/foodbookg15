
<!DOCTYPE html>
<html>
<head>
	<title>Edit Food</title>
	<meta charset="UTF-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/soponCss.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href="css/bootstrap-tagsinput.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap-tagsinput.js"></script>
	<script src="js/bootstrap-tagsinput-angular.js"></script>
	<script src="js/bootstrap-typeahead.js"></script>
</head>
<body>

	<?php
	include "confic.inc.php";
	include "header.php";
	?>
	<?php 
	function check_data($sql){
		#check data success??
		$retval = mysql_query( $sql);
		if(! $retval ){
			die('Could not enter data: ' . mysql_error()); }
			echo "Entered data successfully"; 
		}	
		#query from database
		$sql = "select * from recipes where recipe_id = {$_GET['editFood']}";
		$dbname = "foodbookdb";
			mysql_query("SET NAMES UTF8"); //ให้มันเเสดงภาษาไทยได้
			$dbquery = mysql_db_query($dbname, $sql);
			$fetarray = mysql_fetch_array($dbquery);			
			if (isset($_POST['submit'])){
		#update data to database
				$sql = "UPDATE  recipes
				SET recipe_name ='$_POST[foodName]' , descripShort = '$_POST[des]' , seasoning = '$_POST[seasoning]',
				howTo = '$_POST[howTo]' , picture = '$_POST[imgUpload]'
				WHERE recipe_id = {$_GET["editFood"]}  ";
				check_data($sql);
				header("location:UserFood.php");
			}
			else{ ?>
			<!--<div class="container">-->
			<h1 id="r-foodheader">Edit Your Food : <?php echo $fetarray['recipe_name'] ; ?> </h1>
			<div class="r-form">
				<form action="<?php $_PHP_SELF ?>" method="POST">
					<div class="form-group row">
						<div class="r-h">
							<p class="col-sm-3 control-label" >Menu Name :</p>
						</div>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="menuName"  name="foodName"  value="<?php echo $fetarray['recipe_name'] ; ?>">
						</div>
					</div>

					<div class="form-group row">
						<div class="r-h">
							<p class="col-sm-3 control-label" >Ingredients :</p>
						</div>
						<div class="col-sm-8">
							<textarea style="resize : none;" class="form-control" name="seasoning" rows="4" ><?php echo $fetarray['seasoning'] ; ?></textarea>
						</div>
					</div>

					<div class="form-group row">
						<div class="r-h">
							<p class="col-sm-3 control-label" >Picture :</p>
						</div>
						<div class="col-sm-6 r-hh">
							<!--preview image -->
							<!-- <img class="focal-point" src="images/food_img/<?php echo $fetarray['picture'] ;?>"> -->
							<img  class="focal-point" id="uploadPreview" />
							<input id="uploadImage" type="file" name="imgUp" onchange="PreviewImage();" />
							<script type="text/javascript">
							function PreviewImage() {
								var oFReader = new FileReader();
								oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
								oFReader.onload = function (oFREvent) {
									document.getElementById("uploadPreview").src = oFREvent.target.result;
								};
							};
							</script>
						</div>
					</div>

					<div class="form-group row">
						<div class="r-h">
							<p class="col-sm-3 control-label" >raw material :</p>
						</div>
						<div class="col-sm-8">
							<textarea class="form-control" rows="4" name="ingredient" style="resize : none;"></textarea>
						</div>
					</div>

					<div class="form-group row">
						<div class="r-h">
							<p class="col-sm-3 control-label" >Menu Desc :</p>
						</div>
						<div class="col-sm-8">
							<textarea style="resize : none;" class="form-control" rows="4" name="des"><?php echo $fetarray['descripShort'] ; ?></textarea>
						</div>
					</div>

					<div class="form-group row">
						<div class="r-h">
							<p class="col-sm-3 control-label" >How to :</p>
						</div>
						<div class="col-sm-8">
							<textarea style="resize : none;"class="form-control" rows="4" name="howTo"><?php echo $fetarray['howTo']; ?></textarea>
						</div>
					</div>

					<center><input class="btn btn-primary" type="submit" name="submit" value="Submit"></center>
				</form>
			</div>
			<!--</div>-->
			
			<?php }; mysql_close();?>




		</body>
		</html>