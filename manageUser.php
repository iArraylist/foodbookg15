<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
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

	<table>
	<?php 
	$result=mysql_query("SELECT * FROM members WHERE username != 'admin'");

	while($resultDate = mysql_fetch_array($result)){
		echo $resultDate['username'];
		echo $resultDate['role'];
		echo $resultDate['status'];
	}
	?>

	</table>


</body>
</html>