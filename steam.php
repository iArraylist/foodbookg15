<?php include("confic.inc.php");?>
<!DOCTYPE html>
<head>
	<title>*Most Popular*</title>
</head>
<body>

== อาหารประเภทนึ่ง== <br>


</body>

<?php
$categoryName = $_POST['categoryName'];
echo "=======================";
echo "<br>";

$getRecipeByCategory = "select * from recipes_ranking2 where reci_category_id = '4' limit 2";
$dbname = "foodbookdb";
$dbqueryByCategory = mysql_db_query($dbname, $getRecipeByCategory);
while($row = mysql_fetch_array($dbqueryByCategory)){
#while($row = mysql_fetch_array($dbquery)){
	
	echo "Recipe_id". " : " .$row{'recipe_id'}; 
	echo "<br>";
	echo " " .$row{'recipe_name'};
	echo "<br>";
	echo " " .$row{'reci_category'};
	echo "<br>";
	echo " ". "Rate : ". round($row{'average_rate'},2);
	#echo "dwedwedw" . $row{'picture'};
	echo "<br>"; 
	if (!is_null($row['picture'])) {

?>

		<img src="data:image/jpeg;base64, <?php echo base64_encode($row['picture']);?>" />
		<br>
		------------------------------------------------------------------------------------------------------------------------------------
		<br>
<?php
	}
}
?>