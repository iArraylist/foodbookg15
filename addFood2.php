
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Food 2</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/test6.css">
	<link href="css/bootstrap-tagsinput.css" rel="stylesheet">
	<script src="js/docs.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap-tagsinput.js"></script>
	<script src="js/bootstrap-tagsinput-angular.js"></script>
	<script src="js/bootstrap-typeahead.js"></script>
</head>
<body>
	<?php
	include_once"confic.inc.php";
	include_once"header.php";
	?>
	<?php
	function check_data($sql){
		#check data success??
		$retval = mysql_query( $sql);
		if(! $retval ){
			die('Could not enter data: ' . mysql_error());
		}
		echo "Entered data successfully";
	}	 
			
	if (isset($_POST['submit'])){
		if (move_uploaded_file ($_FILES["imgUp"]["tmp_name"],"images/food_img/".$_FILES["imgUp"]["name"])){
			echo "Upload Complete <br>";}
		#add data to database
			mysql_query("SET NAMES UTF8");
			$sql = "INSERT INTO recipes (recipe_name, descripShort, seasoning, howTo, member_id, picture)
			VALUES ('$_POST[foodName]','$_POST[des]','$_POST[seasoning]','$_POST[howTo]', '$_SESSION[login_id]', '".$_FILES['imgUp']['name']."')";
			check_data($sql); 
		}
		else{ ?>
		<form action="addFood.php" method="post" enctype="multipart/form-data" >
			<div class="r-menupage-1">
				<a href="#">เพิ่มรายการอาหาร</a><br>
				<i class="fa fa-caret-down fa-5x"></i>
			</div>
			<div class="r-container">
				<div class="row">
					<div class="col-sm-4">
						<h4>ชื่อเมนู</h4><input type = "text" name="foodName" size="20">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<h4>Picture</h4>
						<!--preview image -->
						<img  class="focal-point" id="uploadPreview" />
						<input id="uploadImage" type="file" name="imgUp" onchange="PreviewImage();" />
						<script type="text/javascript">
						function PreviewImage() {
							var oFReader = new FileReader();
							oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
							oFReader.onload = function (oFREvent) {
								document.getElementById("uploadPreview").src = oFREvent.target.result;
							};
						};
						</script>
						<!-- <img class="r-img2" > -->
					</div>
					<div class="col-sm-6">
						<h4>วัตถุดิบ</h4>

						<button type="button" class="btn btn-defult" style="margin-bottom: 2px;" onclick="myFunction()">Add</button>
						<div id="myList"></div>

						<script>
						var i = 1;
						function myFunction() {
							var newItem = document
							.createElement("input");
							newItem.setAttribute('type', 'text');
							newItem.setAttribute('id',
								'addingrediants');
							newItem.setAttribute('data-role',
								'tagsinput');
							newItem.setAttribute('name', 'ing' + i);
							var textnode = document.createTextNode("");
							newItem.appendChild(textnode);

							var list = document
							.getElementById("myList");
							list.insertBefore(newItem,
								list.childNodes[0]);
							i = i + 1;
							$('#addingrediants').tagsinput({
								typeahead: {
									source:ingrediants2
								},
								freeInput: false,
								maxTags: 1
							});

							$('#addingrediants').tagsinput('refresh');

						}

						var ingrediants2=[<?php include 'queryIngrediants.php' ?>];
						$('#addingrediants').tagsinput({
							typeahead: {
								source:ingrediants2
							},
							freeInput: false,
							maxTags: 1
						});
						</script>

						<h4>เครื่องปรุง</h4>
						<textarea class="form-control" rows="5" name="seasoning" style="resize : none;"></textarea>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<h4>คำอธิบายเมนู</h4>
						<textarea class="form-control" rows="2" name="des" style="resize : none;"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<h4>วิธีทำ</h4>
						<textarea class="form-control" rows="4" name="howTo" style="resize : none;"></textarea>
					</div>
				</div>
				<div class="row">
					<center>
						<input class="btn btn-primary" type="submit" name="submit" value="Submit">
						<input class="btn btn-default" type="reset" name="reset" value="Reset">
					</center>
				</div>
			</div>
		</form>
		<?php } ?>



	</body>
	</html>