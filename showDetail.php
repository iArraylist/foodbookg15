
<!DOCTYPE HTML>
<html>
<head>
	<title>Foodbook</title>
	<meta http-equiv="Content-Type" content="text/html5; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="css/bootstrap-tagsinput.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/showDetail2.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-2.1.1.min.js"></script>

	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap-tagsinput.js"></script>
	<!-- <script src="js/bootstrap-tagsinput-angular.js"></script>-->
	<script src="js/bootstrap-typeahead.js"></script>
	<script src="js/jquery.sortable.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<style type="text/css">
	.static {
		margin-right: 4px;
		cursor: default;
	}
	</style>
</head>
<body>
	<div class="container">

		<div class="r-header-container">
		</div>
	</div>


	<?php

	include "navbarV2.php";
	?>
	
	<?php 
	
	#query from database

	$sql = "select * from recipes where recipe_id = '".$_GET['recipe_id']."' ";

	$dbname = "foodbookdb";
	mysql_query("SET NAMES UTF8"); //show thai 
	$dbquery = mysql_db_query($dbname, $sql);
	$faterrayrecipe = mysql_fetch_array($dbquery);
	$recipe_id = $faterrayrecipe['recipe_id'];
	?>

	<div class="r-showdetailpage">
		<div class="container">
			<div class="r-showdetailpage-1">
				<img src="showlist.png" alt="">
				<!-- <a href="#">รายการอาหาร</a><br>
				<i class="fa fa-caret-down fa-5x" style="height: 50px;"></i> -->
			</div>
			<div class="form-showdetail">
				<div class="row">
					<div class="col-md-10">
						<h3><label>ชื่อรายการอาหาร: </label><?php echo " " . $faterrayrecipe['recipe_name']; ?></h3>
					</div>
					<div class="col-md-2" style="text-align: -webkit-right;margin-top:15px;">
						<?php 
						if(isset($_SESSION['login_id'])){
							$favsql="select * FROM favorites WHERE recipe_id='$recipe_id' AND member_id='$_SESSION[login_id]'";
							$dbquery = mysql_db_query($dbname, $favsql);
							if(mysql_num_rows($dbquery) == 1){
								?> <input type="checkbox" class="input_fav_checkbox" checked name="fav" id="<?php echo $recipe_id; ?>" /> <?php
							} else{
								?> <input type="checkbox" class="input_fav_checkbox" name="fav" id="<?php echo $recipe_id; ?>" /> <?php
							}
						}

						?>

						<script>

						$('.input_fav_checkbox').each(function(){
							$(this).hide().after('<div class="fav_checkbox" />');
							if(document.getElementById($('.input_fav_checkbox').attr('id')).checked){
								console.log("C");
								$('.fav_checkbox').toggleClass('checked').prev().prop('checked',$(this).is('.checked'));
							} else console.log("F");
						});

						$('.fav_checkbox').on('click',function(){
							$(this).toggleClass('checked').prev().prop('checked',$(this).is('.checked'));

							var id = $('.input_fav_checkbox').attr('id');

							if($(this).is('.checked')) {
								var favorite = 1;
							} else {
								var favorite = 0;
							}
							console.log(id);
							console.log(favorite);
					// var url = 'fav_update.php?id='+id+'&favorite='+favorite;
					// window.location.href = url;
					// return false;

					$.ajax({
						url: "fav_update.php",
						type: "GET",
						data: { 'id': id, 'favorite': favorite },                   
						
					});

					console.log("blah blah");
				});
						</script>
					</div>
				</div>


				<?php
				if(isset($_SESSION['login_id'])){
					include 'fiveStars.php';
				}
				?>
				
				<label>Rate </label> 
				
				
				<?php 
				$getAvgRateByRecipeId = "select * from recipes_ranking where recipe_id ='".$recipe_id."'";
				$dbname = "foodbookdb";
				$dbqueryByCategory = mysql_db_query($dbname, $getAvgRateByRecipeId);
				$row = mysql_fetch_array($dbqueryByCategory);

				if($row{'average_rate'}==0){
					echo "ยังไม่มีการโหวต";

				}
				else{
					echo round($row{'average_rate'},1);
				}
				
				?>
				<br>
				<br>
				<div style="margin-left: 115px;">
					<div id="cropstep" class="cropstep">
						<img id="uploadPreview" src="images/food_img/<?php echo $faterrayrecipe['picture'] ;?>" />
					</div>
				</div>
				<br>
				<label>รายละเอียดคร่าวๆ: </label><?php echo " " . $faterrayrecipe['descripShort']; ?><br>
				
				<br>
				<label>ประเภทอาหาร: </label>
				<?php 
				$sql = "select * from reci_categories_has_recipes join reci_categories on reci_categories.reci_category_id = reci_categories_has_recipes.reci_category_id where reci_categories_has_recipes.recipe_id=$recipe_id";
				$dbname = "foodbookdb";
				mysql_query("SET NAMES UTF8"); //show thai 
				$dbquery = mysql_db_query($dbname, $sql);
				$rows=mysql_num_rows($dbquery);
				$row=0;
				while ($resultData=mysql_fetch_array($dbquery)) {
					echo $resultData['reci_category'];
					$row++;
					if($row<$rows){
						echo ", ";
					}
				}
				?>

				<br><label>วัตถุดิบ: </label>
				<?php 
				$sql = "select * from reci_has_ing join ingrediants on ingrediants.ing_id = reci_has_ing.ing_id where reci_has_ing.recipe_id=$recipe_id";
				$dbname = "foodbookdb";
				mysql_query("SET NAMES UTF8"); //show thai 
				$dbquery = mysql_db_query($dbname, $sql);
				$rows=mysql_num_rows($dbquery);
				$row=0;
				while ($resultData=mysql_fetch_array($dbquery)) {
					echo $resultData['ing_name'];
					$row++;
					if($row<$rows){
						echo ", ";
					}
				}
				?>

				<br><label>ส่วนประกอบเพิ่มเติม: </label><?php echo " " . $faterrayrecipe['seasoning']; ?>

				<?php 
				$sql = "select * from reci_steps where recipe_id=$recipe_id";
				$dbname = "foodbookdb";
				mysql_query("SET NAMES UTF8"); //show thai 
				$dbquery = mysql_db_query($dbname, $sql);
				$rows=mysql_num_rows($dbquery);
				while ($resultData=mysql_fetch_array($dbquery)) {
					echo "<br><br><label>ขั้นตอน: </label>" . $resultData['step_title'];
					if($resultData['picture']!=""){
						?>
						
							<br><img style="height:350px;margin-bottom:10px;" src="images/food_img/<?php echo $resultData['picture'] ;?>" />
						

						<?php }
						echo "<br><label>วิธีทำ: </label>" . $resultData['howTo'];
						echo "<br>";
					}
					?>


				</div>
			</div>
		</div>









		<!---------------------------------------------------------->
<?php 
		include "footer.html";
	?>
</div>
	</body>
	</html>
