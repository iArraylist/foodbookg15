<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/test10.css" rel="stylesheet">
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
<div class="container">
	<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">เมนูต้ม</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">เมนูผัด</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">เมนูแกง</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">เมนูทอด</a></li>
    <li role="presentation"><a href="#a" aria-controls="a" role="tab" data-toggle="tab">เมนูปิ้ง/ย่าง/อบ</a></li>
    <li role="presentation"><a href="#b" aria-controls="b" role="tab" data-toggle="tab">เมนูนึ่ง</a></li>
    <li role="presentation"><a href="#c" aria-controls="c" role="tab" data-toggle="tab">เมนูยำ</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    	<table class="table table-bordered table-hover">
 			<tr>
 				<td class="col-md-7" >ชื่อเมนู</td>
 				<td class="col-md-3">ชื่อผู้ใช้</td>
 				<td class="col-md-2">action</td>
 			</tr>   
    		
    	


    	<?php 
    		$sql = "select recipes.recipe_id, recipes.recipe_name, recipes.member_id from recipes join reci_categories_has_recipes on recipes.recipe_id = reci_categories_has_recipes.recipe_id join reci_categories on reci_categories_has_recipes.reci_category_id = reci_categories.reci_category_id where reci_categories.reci_category_id = 0000000001";
    		$dbquery = mysql_query($sql);
			$num_rows = mysql_num_rows($dbquery);
			$num_count = 0;
			while ($num_count<$num_rows) {
				$fetcharray = mysql_fetch_array($dbquery);
				$num_count = $num_count+1; ?>
				<tr>
					<td><?php echo $fetcharray['recipe_name'];?></td>
					<td>
					<a href=""><?php echo $fetcharray['member_id'];?></a></td>
					<td><form action="test10.php" method="POST">	
							<input type="hidden" name="del" value="<?php echo $fetcharray['recipe_id'];?>">
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
				header("location:test10.php");
			} 
		?>


    </div>
    <!---------------------------------------------------------------------------------------->
    <div role="tabpanel" class="tab-pane" id="profile">
    	<table class="table table-bordered table-hover">
 			<tr>
 				<td class="col-md-7" >ชื่อเมนู</td>
 				<td class="col-md-3">ชื่อผู้ใช้</td>
 				<td class="col-md-2">action</td>
 			</tr>   
    		
    	


    	<?php 
    		$sql = "select recipes.recipe_id, recipes.recipe_name, recipes.member_id from recipes join reci_categories_has_recipes on recipes.recipe_id = reci_categories_has_recipes.recipe_id join reci_categories on reci_categories_has_recipes.reci_category_id = reci_categories.reci_category_id where reci_categories.reci_category_id = 0000000002";
    		$dbquery = mysql_query($sql);
			$num_rows = mysql_num_rows($dbquery);
			$num_count = 0;
			while ($num_count<$num_rows) {
				$fetcharray = mysql_fetch_array($dbquery);
				$num_count = $num_count+1; ?>
				<tr>
					<td><?php echo $fetcharray['recipe_name'];?></td>
					<td>
					<a href=""><?php echo $fetcharray['member_id'];?></a></td>
					<td><form action="test10.php" method="POST">	
							<input type="hidden" name="del" value="<?php echo $fetcharray['recipe_id'];?>">
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
				header("location:test10.php");
			} 
		?>

    </div>
    <!---------------------------------------------------------------------------------------->
    <div role="tabpanel" class="tab-pane" id="messages">
    	<table class="table table-bordered table-hover">
 			<tr>
 				<td class="col-md-7" >ชื่อเมนู</td>
 				<td class="col-md-3">ชื่อผู้ใช้</td>
 				<td class="col-md-2">action</td>
 			</tr>   
    		
    	


    	<?php 
    		$sql = "select recipes.recipe_id, recipes.recipe_name, recipes.member_id from recipes join reci_categories_has_recipes on recipes.recipe_id = reci_categories_has_recipes.recipe_id join reci_categories on reci_categories_has_recipes.reci_category_id = reci_categories.reci_category_id where reci_categories.reci_category_id = 0000000003";
    		$dbquery = mysql_query($sql);
			$num_rows = mysql_num_rows($dbquery);
			$num_count = 0;
			while ($num_count<$num_rows) {
				$fetcharray = mysql_fetch_array($dbquery);
				$num_count = $num_count+1; ?>
				<tr>
					<td><?php echo $fetcharray['recipe_name'];?></td>
					<td>
					<a href=""><?php echo $fetcharray['member_id'];?></a></td>
					<td><form action="test10.php" method="POST">	
							<input type="hidden" name="del" value="<?php echo $fetcharray['recipe_id'];?>">
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
				header("location:test10.php");
			} 
		?>

    </div>
    <!---------------------------------------------------------------------------------------->
    <div role="tabpanel" class="tab-pane" id="settings">
    	<table class="table table-bordered table-hover">
 			<tr>
 				<td class="col-md-7" >ชื่อเมนู</td>
 				<td class="col-md-3">ชื่อผู้ใช้</td>
 				<td class="col-md-2">action</td>
 			</tr>   
    		
    	


    	<?php 
    		$sql = "select recipes.recipe_id, recipes.recipe_name, recipes.member_id from recipes join reci_categories_has_recipes on recipes.recipe_id = reci_categories_has_recipes.recipe_id join reci_categories on reci_categories_has_recipes.reci_category_id = reci_categories.reci_category_id where reci_categories.reci_category_id = 0000000004";
    		$dbquery = mysql_query($sql);
			$num_rows = mysql_num_rows($dbquery);
			$num_count = 0;
			while ($num_count<$num_rows) {
				$fetcharray = mysql_fetch_array($dbquery);
				$num_count = $num_count+1; ?>
				<tr>
					<td><?php echo $fetcharray['recipe_name'];?></td>
					<td>
					<a href=""><?php echo $fetcharray['member_id'];?></a></td>
					<td><form action="test10.php" method="POST">	
							<input type="hidden" name="del" value="<?php echo $fetcharray['recipe_id'];?>">
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
				header("location:test10.php");
			} 
		?>



    </div>
    <!---------------------------------------------------------------------------------------->
    <div role="tabpanel" class="tab-pane" id="a">
    	<table class="table table-bordered table-hover">
 			<tr>
 				<td class="col-md-7" >ชื่อเมนู</td>
 				<td class="col-md-3">ชื่อผู้ใช้</td>
 				<td class="col-md-2">action</td>
 			</tr>   
    		
    	


    	<?php 
    		$sql = "select recipes.recipe_id, recipes.recipe_name, recipes.member_id from recipes join reci_categories_has_recipes on recipes.recipe_id = reci_categories_has_recipes.recipe_id join reci_categories on reci_categories_has_recipes.reci_category_id = reci_categories.reci_category_id where reci_categories.reci_category_id = 0000000005";
    		$dbquery = mysql_query($sql);
			$num_rows = mysql_num_rows($dbquery);
			$num_count = 0;
			while ($num_count<$num_rows) {
				$fetcharray = mysql_fetch_array($dbquery);
				$num_count = $num_count+1; ?>
				<tr>
					<td><?php echo $fetcharray['recipe_name'];?></td>
					<td>
					<a href=""><?php echo $fetcharray['member_id'];?></a></td>
					<td><form action="test10.php" method="POST">	
							<input type="hidden" name="del" value="<?php echo $fetcharray['recipe_id'];?>">
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
				header("location:test10.php");
			} 
		?>
    </div>
	<!---------------------------------------------------------------------------------------->
    <div role="tabpanel" class="tab-pane" id="b">
    	<table class="table table-bordered table-hover">
 			<tr>
 				<td class="col-md-7" >ชื่อเมนู</td>
 				<td class="col-md-3">ชื่อผู้ใช้</td>
 				<td class="col-md-2">action</td>
 			</tr>   
    		
    	


    	<?php 
    		$sql = "select recipes.recipe_id, recipes.recipe_name, recipes.member_id from recipes join reci_categories_has_recipes on recipes.recipe_id = reci_categories_has_recipes.recipe_id join reci_categories on reci_categories_has_recipes.reci_category_id = reci_categories.reci_category_id where reci_categories.reci_category_id = 0000000006";
    		$dbquery = mysql_query($sql);
			$num_rows = mysql_num_rows($dbquery);
			$num_count = 0;
			while ($num_count<$num_rows) {
				$fetcharray = mysql_fetch_array($dbquery);
				$num_count = $num_count+1; ?>
				<tr>
					<td><?php echo $fetcharray['recipe_name'];?></td>
					<td>
					<a href=""><?php echo $fetcharray['member_id'];?></a></td>
					<td><form action="test10.php" method="POST">	
							<input type="hidden" name="del" value="<?php echo $fetcharray['recipe_id'];?>">
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
				header("location:test10.php");
			} 
		?>
    </div>
    <!---------------------------------------------------------------------------------------->
    <div role="tabpanel" class="tab-pane" id="c">
    	<table class="table table-bordered table-hover">
 			<tr>
 				<td class="col-md-7" >ชื่อเมนู</td>
 				<td class="col-md-3">ชื่อผู้ใช้</td>
 				<td class="col-md-2">action</td>
 			</tr>   
    		
    	


    	<?php 
    		$sql = "select recipes.recipe_id, recipes.recipe_name, recipes.member_id from recipes join reci_categories_has_recipes on recipes.recipe_id = reci_categories_has_recipes.recipe_id join reci_categories on reci_categories_has_recipes.reci_category_id = reci_categories.reci_category_id where reci_categories.reci_category_id = 0000000007";
    		$dbquery = mysql_query($sql);
			$num_rows = mysql_num_rows($dbquery);
			$num_count = 0;
			while ($num_count<$num_rows) {
				$fetcharray = mysql_fetch_array($dbquery);
				$num_count = $num_count+1; ?>
				<tr>
					<td><?php echo $fetcharray['recipe_name'];?></td>
					<td>
					<a href=""><?php echo $fetcharray['member_id'];?></a></td>
					<td><form action="test10.php" method="POST">	
							<input type="hidden" name="del" value="<?php echo $fetcharray['recipe_id'];?>">
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
				header("location:test10.php");
			} 
		?>
    </div>





  </div>

</div>
</div>
	
</body>
</html>