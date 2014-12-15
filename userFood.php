	

<!DOCTYPE html>
<html lang="en">
<head>
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
	<title>Food</title>
</head>
<body>

	<?php
	include "confic.inc.php";
	include "header.php";
	?>
	<div class="container">
		<h1 id="r-foodheader">Food</h1>
		<table class="table table-bordered table-hover">
			<tr id="r-texttable">

				<td class="col-md-1">Food Picture</td>
				<td class="col-xs-6 col-sm-3">Food Name</td>
				<td class="col-xs-6 col-sm-3">Food Desc</td>
				<td class="col-xs-6 col-sm-3">Food Action</td>
			</tr>
			<?php
			$sql = "select * from recipes where member_id = '$_SESSION[login_id]' ";
			
			$dbquery = mysql_query($sql);
			$num_rows = mysql_num_rows($dbquery);
			$i=0;
			while ($i<$num_rows) {
				$fetarray = mysql_fetch_array($dbquery);
				$i = $i+1; ?>
				<tr class="r-row">
					<td ><img class="r-img" src="images/food_img/<?php echo $fetarray['picture'] ;?>"></td>
					<td ><a href="showDetail.php?recipe_id=<?php echo $fetarray['recipe_id'];?>"><?php echo $fetarray['recipe_name'] ; ?> </a></td>
					<td ><?php echo $fetarray['descripShort'] ; ?> </td>
					<td > 	
						<form action="editFood.php" method="get">	
							<input type="submit" value="Edit Food" >
							<input type="hidden" name="editFood" value="<?php echo $fetarray['recipe_id'] ?>">
						</form>	
						<form action="UserFood.php" method="POST">	
							<input type="hidden" name="del" value="<?php echo $fetarray['recipe_id'];?>">
							<input type="submit" value="Delete">
						</form> 
					</td>
				</tr>
				<?php  } ?>
			</table>


			<?php if(isset($_POST["del"])) {
				$sql2 = "Delete from foodbookdb.recipes where recipe_id = {$_POST["del"]} ";
				mysql_query($sql2);
				mysql_close();
				header("location:UserFood.php");
			} 
			?>



		</div>


	</body>
	</html>