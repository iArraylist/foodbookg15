<meta charset="UTF-8">
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