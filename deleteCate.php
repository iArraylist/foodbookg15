<?php

$hostname="localhost";
$username="root";
$password="root";
$dbname="foodbookdb";
$conn=mysql_connect($hostname,$username,$password);
if($conn){
	mysql_select_db($dbname);
	mysql_query("SET NAMES UTF8");
}else{
	echo "connect fail.";
}

?>

<?php

	mysql_query("DELETE FROM reci_categories WHERE reci_category_id='$_GET[id]'");
	
?>