<?php include("confic.inc.php");?>
<!DOCTYPE html>
<head>
	<title>Most Popular</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/test7.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>
<body>


<div class="rating">
<?php
	$i = 0;
	while ($i <= 4) {
		echo "<img id='".$i."'src='images/emptyStar.png'>";
		$i = $i + 1;
	}
?>
</div>
<div class="rating">
<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>

<style>
.rating {
  unicode-bidi: bidi-override;
  direction: rtl;
}
.rating > span {
  display: inline-block;
  position: relative;
  width: 1.1em;
}
.rating > span:hover:before,
.rating > span:hover ~ span:before {
   content: "\2605";
   position: absolute;
}

</style>
</div>
<script type="text/javascript">
	var emptyStarObject = new Image();
	emptyStarObject.src = "images/emptyStar.png";

	var fillStarObject = new Image();
	fillStarObject.src = "images/fillStar.png";
</script>
<script>
	$("#1").mouseover (function() {
		// $("#3").attr("src", "images/fillStar.png");
		$(this).src = fillStarObject.src;
		// fillStarObject.id = "1";
		// $(this).replaceWith(fillStarObject);
		// console.log("efwfwefkewp")

	});
	$("#1").mouseout (function() {
		emptyStarObject.id = "1";
		$(this).replaceWith(emptyStarObject);
	});
</script>
</body>