<?php include("config.inc.php");?>
<!DOCTYPE <html>
<head>
	<title>Rate Food</title>
</head>
<body>
	<?php
		function check_data($sql){
		#check data success??
			$retval = mysql_query( $sql);
			if(! $retval ){
  				die('Could not enter data: ' . mysql_error()); }
  			}
		if(isset($_POST['rateVote'])){
			$sql = "INSERT INTO rates (member_id, recipe_id, rate)
			VALUES ('1', '12', '$_POST[rate]')";
			check_data($sql); 
		}
		else {	?>

			<form action = "<?php $_php_self ?>" method = "post">
			<input type = "radio" name="rate" value="1"> 1
			<input type = "radio" name="rate" value="2"> 2
			<input type = "radio" name="rate" value="3"> 3
			<input type = "radio" name="rate" value="4"> 4
			<input type = "radio" name="rate" value="5"> 5
			<t><input type="submit" name="rateVote" value="Save">
			</form>
		<?php } ?>
	 


	 <?php
	function average($arr)
	{
	   if (!is_array($arr)) 
	   return false;
	   return array_sum($arr)/count($arr);
	}

	//$array = array(5, 10, 15);
	//echo average($array);
	

		$sql = "select * from rate where recipe_id = 1 ";
					$dbname = "foodbookdb";
					$dbquery = mysql_db_query($dbname, $sql);
					
					echo average($dbquery);
					
	?>
</body>
</html>