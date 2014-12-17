
	<?php
	function check_data($sql){
		#check data success??
		$dbname = "foodbookdb";
		$dbquery = mysql_db_query($dbname, $sql);
		// $retval = mysql_query( $sql);
		if(! $dbquery ){
  			die('Could not enter data: ' . mysql_error()); 
  		}
  	}
	if(isset($_POST['rate'])){
		$sql = "INSERT INTO rates (member_id, recipe_id, rate)
		VALUES ('1', '5', '$_POST[rate]')";
		check_data($sql); 
		$i = 1;
		echo "<div>";
		while ($i <= 5) {
			if ($_POST['rate'] >= $i) {
				echo '<input class="static" type="image" name="rate" src="images/fillStar.png" rel="images/emptyStar.png" disabled>';
			} else {
				echo '<input class="static" type="image" name="rate" id="1" src="images/emptyStar.png" rel="images/fillStar.png" disabled>';
			}
			$i = $i + 1;
		}
		echo "</div>";
		echo "Voted!";
	} else {
	?>
	<div class="rollover">
	<form action="<?php $_php_self ?>" method="post">
		<input value="1" type="image" name="rate" id="star1" src="images/emptyStar.png" rel="images/fillStar.png">
		<input value="2" type="image" name="rate" id="star2" src="images/emptyStar.png" rel="images/fillStar.png">
		<input value="3" type="image" name="rate" id="star3" src="images/emptyStar.png" rel="images/fillStar.png">
		<input value="4" type="image" name="rate" id="star4" src="images/emptyStar.png" rel="images/fillStar.png">
		<input value="5" type="image" name="rate" id="star5" src="images/emptyStar.png" rel="images/fillStar.png">
	</form>
	</div>
	<?php
	}
	?>

	<script>
		$(document).ready(function($) {
			//rollover swap images with rel
			var img_src = "";
			var new_src = "";

			$("#star1").hover(function(){
			//mouseover

				img_src = $(this).attr('src'); //grab original image
				new_src = $(this).attr('rel'); //grab rollover image
				$(this).attr('src', new_src); //swap images
				$(this).attr('rel', img_src); //swap images

			},
			function(){
			//mouse out

				$(this).attr('src', img_src); //swap images
				$(this).attr('rel', new_src); //swap images
			});

			$("#star2").hover(function(){
			//mouseover

				img_src = $(this).attr('src'); //grab original image
				new_src = $(this).attr('rel'); //grab rollover image

				$("#star1").attr('src', new_src); //swap images
				$("#star1").attr('rel', img_src); //swap images

				$(this).attr('src', new_src); //swap images
				$(this).attr('rel', img_src); //swap images

			},
			function(){
			//mouse out
				$("#star1").attr('src', img_src); //swap images
				$("#star1").attr('rel', new_src); //swap images

				$(this).attr('src', img_src); //swap images
				$(this).attr('rel', new_src); //swap images
			});

			$("#star3").hover(function(){
			//mouseover

				img_src = $(this).attr('src'); //grab original image
				new_src = $(this).attr('rel'); //grab rollover image

				$("#star1").attr('src', new_src); //swap images
				$("#star1").attr('rel', img_src); //swap images

				$("#star2").attr('src', new_src); //swap images
				$("#star2").attr('rel', img_src); //swap images

				$(this).attr('src', new_src); //swap images
				$(this).attr('rel', img_src); //swap images

			},
			function(){
			//mouse out
				$("#star1").attr('src', img_src); //swap images
				$("#star1").attr('rel', new_src); //swap images

				$("#star2").attr('src', img_src); //swap images
				$("#star2").attr('rel', new_src); //swap images

				$(this).attr('src', img_src); //swap images
				$(this).attr('rel', new_src); //swap images
			});

			$("#star4").hover(function(){
			//mouseover

				img_src = $(this).attr('src'); //grab original image
				new_src = $(this).attr('rel'); //grab rollover image

				$("#star1").attr('src', new_src); //swap images
				$("#star1").attr('rel', img_src); //swap images

				$("#star2").attr('src', new_src); //swap images
				$("#star2").attr('rel', img_src); //swap images

				$("#star3").attr('src', new_src); //swap images
				$("#star3").attr('rel', img_src); //swap images

				$(this).attr('src', new_src); //swap images
				$(this).attr('rel', img_src); //swap images

			},
			function(){
			//mouse out
				$("#star1").attr('src', img_src); //swap images
				$("#star1").attr('rel', new_src); //swap images

				$("#star2").attr('src', img_src); //swap images
				$("#star2").attr('rel', new_src); //swap images

				$("#star3").attr('src', img_src); //swap images
				$("#star3").attr('rel', new_src); //swap images

				$(this).attr('src', img_src); //swap images
				$(this).attr('rel', new_src); //swap images
			});

			$("#star5").hover(function(){
			//mouseover

				img_src = $(this).attr('src'); //grab original image
				new_src = $(this).attr('rel'); //grab rollover image

				$("#star1").attr('src', new_src); //swap images
				$("#star1").attr('rel', img_src); //swap images

				$("#star2").attr('src', new_src); //swap images
				$("#star2").attr('rel', img_src); //swap images

				$("#star3").attr('src', new_src); //swap images
				$("#star3").attr('rel', img_src); //swap images

				$("#star4").attr('src', new_src); //swap images
				$("#star4").attr('rel', img_src); //swap images

				$(this).attr('src', new_src); //swap images
				$(this).attr('rel', img_src); //swap images

			},
			function(){
			//mouse out
				
				$("#star1").attr('src', img_src); //swap images
				$("#star1").attr('rel', new_src); //swap images

				$("#star2").attr('src', img_src); //swap images
				$("#star2").attr('rel', new_src); //swap images

				$("#star3").attr('src', img_src); //swap images
				$("#star3").attr('rel', new_src); //swap images

				$("#star4").attr('src', img_src); //swap images
				$("#star4").attr('rel', new_src); //swap images

				$(this).attr('src', img_src); //swap images
				$(this).attr('rel', new_src); //swap images
			});
			//preload images
			var cacheImage = document.createElement('img');
			cacheImage.src = $("#star1").attr('rel');
		
		});

	</script>