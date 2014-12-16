
<html>
<head>
	<title>Foodbook</title>
	<meta http-equiv="Content-Type" content="text/html5; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="css/bootstrap-tagsinput.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/addFood.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap-tagsinput.js"></script>
	<script src="js/bootstrap-tagsinput-angular.js"></script>
	<script src="js/bootstrap-typeahead.js"></script>
	<script src="js/jquery.sortable.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	
</head>
<body>
	<?php
	include "confic.inc.php";
	?>

	<?php
	function check_data($sql){
		#check data success??
		$retval = mysql_query( $sql);
		if(! $retval ){
			die('Could not enter data: ' . mysql_error()); }
			echo "Entered data successfully";}	 		
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
				

				<!---------------------------------------------------------->
				<form action="addFood.php" method="post" enctype="multipart/form-data" >
					<div class="r-addfoodpage">
						<div class="container">
							<div class="r-addfoodpage-1">
								<a href="#">เพิ่มรายการอาหาร</a><br>
								<i class="fa fa-caret-down fa-5x" style="height: 50px;"></i>
							</div>
							<div class="form-addfood">
								<label>ชื่อรายการอาหาร:</label>
								<input class="form-control" name="foodName" style="width:85%;display:initial;margin-bottom:15px;">
								<div class="row">
									<div class="col-xs-6">
										<label>รายละเอียดคร่าวๆ:</label>
										<textarea class="form-control" name="des" style="margin-bottom:15px;resize: none;" rows="10" ></textarea>
									</div>
									<div class="col-xs-6">
										<label>รูปภาพประกอบ:</label>	
										<input id="uploadImage" type="file" name="imgUp" onchange="PreviewMImage();"  style="display:initial;" />
										<div id="crop">
											<img id="uploadPreview" />
											<script type="text/javascript">
											function PreviewMImage() {
												var oFReader = new FileReader();
												oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
												oFReader.onload = function (oFREvent) {
													document.getElementById("uploadPreview").src = oFREvent.target.result;
													document.getElementById("crop").setAttribute('class', 'crop')
												};
											};
											</script>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-xs-6">

										<ul id="Steps" class="handles list">
											<li id="li_step_1"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
												<div id="div_step_1" >
													<label>Step: Title</label>
													<input type="text" class="form-control" placeholder="Enter title" name="title_step_1">
													<label>Picture</label><br>
													<img id="uploadPreview_1" />
													<input style="margin-bottom:20px" id="uploadImage_1" type="file" name="imgStep_1" onchange="PreviewImage('uploadImage_1','uploadPreview_1');" />
													<label>How to</label>
													<textarea style="max-width: 578px;" class="form-control" rows="5" placeholder="Enter description" name="howto_step_1"></textarea>
												</div>
											</li>
										</ul>

										<script>
										var i = 2;
										function addSteps() {

											var labelTitle = document
											.createElement("label");
											labelTitle.innerHTML = "Step: Title";

											var newStep = document
											.createElement("input");
											newStep.setAttribute('type', 'text');
											newStep.setAttribute('placeholder',
												'Enter title');
											newStep.setAttribute('class',
												'form-control');
											newStep.setAttribute('name', 'title_step_' + i);

											var labelPicture = document
											.createElement("label");
											labelPicture.innerHTML = "Picture";

											var br = document.createElement("br");

											var img = document
											.createElement("img");
											img.setAttribute('id', 'uploadPreview_' + i);

											var upimg = document
											.createElement("input");
											upimg.setAttribute('style','margin-bottom:20px');
											upimg.setAttribute('id', 'uploadImage_' + i);
											upimg.setAttribute('type', 'file');
											upimg.setAttribute('name', 'imgStep_' + i);
											upimg.setAttribute('onchange', 'PreviewImage(\'uploadImage_' + i +'\',\'uploadPreview_'+ i +'\');')

											var labelHowTo = document
											.createElement("label");
											labelHowTo.innerHTML = "How to";

											var howto = document
											.createElement("textarea");
											howto.setAttribute('style', 'max-width: 578px;');
											howto.setAttribute('placeholder',
												'Enter description');
											howto.setAttribute('class',
												'form-control');
											howto.setAttribute('name', 'howto_step_' + i);
											howto.setAttribute('rows', '5');

											var div = document
											.createElement("div")
											div.setAttribute('id', 'div_step_' + i);
											div.appendChild(labelTitle);
											div.appendChild(newStep);
											div.appendChild(labelPicture);
											div.appendChild(br);
											div.appendChild(img);
											div.appendChild(upimg);
											div.appendChild(labelHowTo);
											div.appendChild(howto);


											var span = document
											.createElement("span");
											span.setAttribute('class', 'ui-icon ui-icon-arrowthick-2-n-s');

											var li = document
											.createElement("li");
											li.setAttribute('id', 'li_step_' + i);
											li.setAttribute('draggable', true);
											li.appendChild(span);
											li.appendChild(div);


								//var textnode = document.createTextNode("");
								//newItem.appendChild(textnode);



								var steps = document
								.getElementById("Steps");
								steps.appendChild(li);
								i = i + 1;

								$('.handles').sortable('refresh');
								console.log("test");

							}



							function PreviewImage(upimgID,imgID) {
								var oFReader = new FileReader();
								oFReader.readAsDataURL(document.getElementById(upimgID).files[0]);
								oFReader.onload = function (oFREvent) {
									document.getElementById(imgID).src = oFREvent.target.result;
									document.getElementById(imgID).setAttribute('style', 'height:150px;margin-bottom:5px;')
								};
							};

							</script>

							<button type="button" class="btn btn-defult" style="margin-bottom: 2px;" onclick="addSteps()">เพิ่มขั้นตอนทำอาหาร</button>

						</div>
						<div class="col-xs-6">
							<label>วัตถุดิบ:</label>	
							<button type="button" class="btn btn-defult" style="margin-bottom: 2px;" onclick="myFunction()">เพิ่มวัตถุดิบ</button>
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
								newItem.setAttribute('name', 'ing_' + i);
								newItem.setAttribute('row', '1');
								var textnode = document.createTextNode("");
								newItem.appendChild(textnode);

								var newItem2 = document
								.createElement("input");
								newItem2.setAttribute('class','form-control');
								newItem2.setAttribute('style','display:initial;width:140px;margin-left:3px;');
								newItem2.setAttribute('name', 'ing_amount_' + i);
								newItem2.setAttribute('placeholder', 'ปริมาณที่ใช้');

								var div = document
								.createElement("div");
								div.setAttribute('style','height:10px');

								var list = document
								.getElementById("myList");
								list.insertBefore(div,
									list.childNodes[0]);
								list.insertBefore(newItem,
									list.childNodes[1]);
								list.insertBefore(newItem2,
									list.childNodes[2]);
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
						</div>
					</div>
				</div>

				<center>
					<button type="submit" name="submit" class="btn btn-success">ยืนยันรายการอาหาร</button>
					<button type="reset" name="reset" class="btn btn-default">ล้างข้อมูล</button>
					<br><br>
				</center>
			</div>
		</div>

	</form>

	



	<script>
	function getOrderli(){

		var liIds = $('#Steps2 li').map(function(i,n) {
			return $(n).attr('id');
		}).get().join(',');
		console.log(liIds);
	}

	</script>


	<script>

	$(function() {

		$('.handles').sortable({
			handle: 'span'
		});

	});



	</script>

	<?php } ?>



	<!---------------------------------------------------------->
	<div class="footer">
	</div>	
	<div class="r-header-container-2">
		<div class="container">
			<p>2014 All rights Reserved | Template มั่วๆ by โจ๋วววววววววว</p>
		</div>
	</div>

</body>
</html>

