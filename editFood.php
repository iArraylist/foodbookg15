<html>
<head>
	<title>Foodbook</title>
	<meta http-equiv="Content-Type" content="text/html5; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="css/bootstrap-tagsinput.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/addFoodV2.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap-tagsinput.js"></script>
	<script src="js/bootstrap-tagsinput-angular.js"></script>
	<script src="js/bootstrap-typeahead.js"></script>
	<script src="js/jquery.sortable.js"></script>
		<script src="js/wow.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
		<link href="css/animate.css" rel='stylesheet' type='text/css' />
	<script>
		new WOW().init();
	</script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
	</script>
	
</head>
<body>

	<div class="container">
		<div class="r-header-container">

		</div>
		<?php
		include "navbarV2.php";
		?>


		<?php
		function check_data($sql){
		#check data success??
			$retval = mysql_query( $sql);
			if(! $retval ){
				die('Could not enter data: ' . mysql_error());
			}
			echo "UPDAte data successfully";

			$recipe_id=$_POST['recipeidedit'];

			mysql_query("DELETE from reci_categories_has_recipes WHERE recipe_id='$recipe_id'");

			$s_cates=explode(",", $_POST['s_cates']);

			for ($count=0;$count<count($s_cates);$count++) {
				$cate=$s_cates[$count];
				$result=mysql_query("SELECT * FROM reci_categories WHERE reci_category='$cate'");
				$resultData=mysql_fetch_array($result);
				$cate_id = $resultData['reci_category_id'];
				mysql_query("INSERT INTO reci_categories_has_recipes (recipe_id,reci_category_id) VALUES ($recipe_id,$cate_id)");
			}

			mysql_query("DELETE from reci_has_ing WHERE recipe_id='$recipe_id'");
			for ($count=1;$count<=$_POST['count_ing'];$count++) {
				$k = "ing_" . $count;
				if($_POST[$k]!=""){

					$ing=$_POST[$k];
					$k = "ing_amount_" . $count;
					$quantity = $_POST[$k];

					$result=mysql_query("SELECT * FROM ingrediants WHERE ing_name='$ing'");
					$resultData=mysql_fetch_array($result);
					$ing_id=$resultData['ing_id'];

					$returnval = mysql_query("INSERT INTO reci_has_ing (recipe_id,ing_id,quantity) VALUES ($recipe_id,$ing_id,'$quantity')");
					if(! $returnval ){
						die('Could not enter data: ' . mysql_error());
					} else echo "Entered ingggg successfully";
				} else echo "f ";
			}
			echo "<br>";

			mysql_query("DELETE from reci_steps WHERE recipe_id='$recipe_id'");
			$s_step=explode(",", $_POST['ordersteps']);

			for ($count=0;$count<count($s_step);$count++) {

				$stepp=$s_step[$count];
				$k = "title_step_" . $stepp;
				$title_step=$_POST[$k];
				$k = "howto_step_" . $stepp;
				$howto_step = $_POST[$k];
				$k = "imgStep_" . $stepp;
				$img_step = $_FILES[$k]['name'];

				if(!move_uploaded_file ($_FILES[$k]["tmp_name"],"images/food_img/".$_FILES[$k]["name"])){
					$k = "oldImg_" . $stepp;
					if(isset($_POST[$k])){
						$img_step = $_POST[$k];
					}
				}


				echo $title_step . "t ";
				echo $howto_step . "h ";
				echo $img_step . "p ";


				$returnval = mysql_query("INSERT INTO reci_steps (step_title,howTo,picture,recipe_id) VALUES ('$title_step','$howto_step','$img_step',$recipe_id)");
				if(! $returnval ){
					die('Could not enter data: ' . mysql_error());
				}
				else echo "Entered steppp successfully";

			}

		}

		if (isset($_POST['submit'])){
		//echo $_POST['ordersteps'];
			if (move_uploaded_file ($_FILES["imgUp"]["tmp_name"],"images/food_img/".$_FILES["imgUp"]["name"])){
				echo "Upload Complete <br>";
				$sql = "UPDATE recipes SET recipe_name='$_POST[foodName]', descripShort='$_POST[des]', seasoning='$_POST[seasoning]', picture='".$_FILES['imgUp']['name']."' WHERE recipe_id='$_GET[editFood]'";
			}else{
				$sql = "UPDATE recipes SET recipe_name='$_POST[foodName]', descripShort='$_POST[des]', seasoning='$_POST[seasoning]' WHERE recipe_id='$_GET[editFood]'"; }
				mysql_query("SET NAMES UTF8");

				check_data($sql); 
			}
			else{ ?>

			<?php 
			$result=mysql_query("SELECT * FROM recipes WHERE recipe_id='$_GET[editFood]'");
			$resultData=mysql_fetch_array($result);
			?>

			<!---------------------------------------------------------->
			<form action="" method="post" enctype="multipart/form-data" id="form-id" >
				<div class="r-addfoodpage">
					<div class="container">
						<div class="r-img wow bounceIn animated">
							<img id="himg" src="editfood.png" alt="">
						</div>
						<div class="form-addfood">
							<h6 style="color:red;">* จำเป็น</h6>
							<br>
							<label>ชื่อรายการอาหาร*:</label>
							<input class="form-control" name="foodName" style="width:100%;display:initial;margin-bottom:15px;" value="<?php  echo $resultData['recipe_name']; ?>" required>
							<div class="row">
								<div class="col-xs-6">
									<label>รายละเอียดคร่าวๆ:</label>
									<textarea class="form-control" name="des" style="margin-bottom:15px;resize: none;" rows="10" ><?php  echo $resultData['descripShort']; ?></textarea>
								</div>
								<div class="col-xs-6">
									<label>รูปภาพประกอบ:</label>	
									<input id="uploadImage" type="file" name="imgUp" onchange="PreviewMImage();"  style="display:initial;" />
									<div id="crop" class="crop">
										<img id="uploadPreview" src="images/food_img/<?php echo $resultData['picture']; ?>" />
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
									<?php
									$result4=mysql_query("SELECT * FROM reci_steps
										WHERE recipe_id='$_GET[editFood]'");
									$q_title=array();
									$q_howto=array();
									$q_pic=array();
									$r4=0;
									while($resultData4=mysql_fetch_array($result4)){
										$q_title[$r4]=$resultData4['step_title'];
										$q_howto[$r4]=$resultData4['howTo'];
										if($resultData4['picture'] != ""){
											$q_pic[$r4]=$resultData4['picture'];
										}else $q_pic[$r4]='defultImg.png';
										$r4++;
									}
									$clone_id2=1;
									$stpp=0;
									?>
									<ul id="Steps" class="handles list">
										<?php 
										while($stpp<count($q_title)){
											?>
											<li id="<?php echo $clone_id2; ?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
												<div id="div_step_<?php echo $clone_id2; ?>" >
													<label>ชื่อขั้นตอน*</label>
													<input type="text" class="form-control" placeholder="พิมพ์ชื่อขั้นตอน" name="title_step_<?php echo $clone_id2; ?>" value="<?php echo $q_title[$stpp]; ?>" required>
													<label>รูปภาพประกอบ</label><br>
													<img id="uploadPreview_<?php echo $clone_id2; ?>" name="uploadPreview_<?php echo $clone_id2; ?>" src="images/food_img/<?php echo $q_pic[$stpp]; ?>" style="height:150px;margin-bottom:5px;" />
													<input type="hidden" name="oldImg_<?php echo $clone_id2; ?>" value="<?php echo $q_pic[$stpp]; ?>" >
													<input style="margin-bottom:20px" id="uploadImage_<?php echo $clone_id2; ?>" type="file" name="imgStep_<?php echo $clone_id2; ?>" onchange="PreviewImage('uploadImage_<?php echo $clone_id2; ?>','uploadPreview_<?php echo $clone_id2; ?>');" />
													<label>วิธีทำ*</label>
													<textarea style="max-width: 578px;" class="form-control" rows="5" placeholder="กรอกวิธีทำ" name="howto_step_<?php echo $clone_id2; ?>" required><?php echo $q_howto[$stpp]; ?></textarea>
												</div>
											</li>
											<?php 
											$stpp++;
											$clone_id2++;}
											?>
										</ul>

										<script>
										var s = <?php $r4++;echo $r4 ;?>;
										function addSteps() {

											var labelTitle = document
											.createElement("label");
											labelTitle.innerHTML = "ชื่อขั้นตอน*";

											var newStep = document
											.createElement("input");
											newStep.setAttribute('type', 'text');
											newStep.setAttribute('placeholder',
												'พิมพ์ชื่อขั้นตอน');
											newStep.setAttribute('class',
												'form-control');
											newStep.setAttribute('name', 'title_step_' + s);
											newStep.setAttribute('required','required');

											var labelPicture = document
											.createElement("label");
											labelPicture.innerHTML = "รูปภาพประกอบ";

											var br = document.createElement("br");

											var img = document
											.createElement("img");
											img.setAttribute('id', 'uploadPreview_' + s);

											var upimg = document
											.createElement("input");
											upimg.setAttribute('style','margin-bottom:20px');
											upimg.setAttribute('id', 'uploadImage_' + s);
											upimg.setAttribute('type', 'file');
											upimg.setAttribute('name', 'imgStep_' + s);
											upimg.setAttribute('onchange', 'PreviewImage(\'uploadImage_' + s +'\',\'uploadPreview_'+ s +'\');')

											var labelHowTo = document
											.createElement("label");
											labelHowTo.innerHTML = "วีธีทำ*";

											var howto = document
											.createElement("textarea");
											howto.setAttribute('style', 'max-width: 578px;');
											howto.setAttribute('placeholder',
												'กรอกวิธีทำ');
											howto.setAttribute('class',
												'form-control');
											howto.setAttribute('name', 'howto_step_' + s);
											howto.setAttribute('rows', '5');
											howto.setAttribute('required','required');

											var div = document
											.createElement("div")
											div.setAttribute('id', 'div_step_' + s);
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

											var btn = document
											.createElement("button");
											btn.setAttribute('class', 'btn btn-danger');
											btn.setAttribute('type', 'button');
											btn.setAttribute('style', 'float:right;margin-top:-10px;')
											btn.setAttribute('onclick', 'deletestep('+s+')'); 
											btn.innerHTML = "ลบ";

											var li = document
											.createElement("li");
											li.setAttribute('id', '' + s);
											li.setAttribute('draggable', true);
											li.appendChild(span);
											li.appendChild(btn);
											li.appendChild(div);


								//var textnode = document.createTextNode("");
								//newItem.appendChild(textnode);



								var steps = document
								.getElementById("Steps");
								steps.appendChild(li);
								document.getElementById("count_step").setAttribute('value', s);
								s = s + 1;

								$('.handles').sortable('refresh');
								console.log("test");

							}

							function deletestep(id) {
								console.log(id);  
								document.getElementById(id).remove();
							};


							function PreviewImage(upimgID,imgID) {
								var oFReader = new FileReader();
								oFReader.readAsDataURL(document.getElementById(upimgID).files[0]);
								oFReader.onload = function (oFREvent) {
									document.getElementById(imgID).src = oFREvent.target.result;
									document.getElementById(imgID).setAttribute('style', 'height:150px;margin-bottom:5px;')
								};
							};

							</script>
							<button type="button" class="btn btn-defult" style="margin-bottom: 2px; width:100%;" onclick="addSteps()">เพิ่มขั้นตอนทำอาหาร</button>

						</div>
						<div class="col-xs-6">
							<?php
							$result2=mysql_query("SELECT * FROM reci_categories_has_recipes JOIN reci_categories ON reci_categories.reci_category_id=reci_categories_has_recipes.reci_category_id
								WHERE reci_categories_has_recipes.recipe_id='$_GET[editFood]'");
							$q_cate="";
							$rows2=mysql_num_rows($result2);
							$row2=0;
							while($resultData2=mysql_fetch_array($result2)){
								$q_cate = $q_cate . $resultData2['reci_category'];
								$row2++;
								if($row2<$rows2){
									$q_cate = $q_cate . ",";
								}
							}
							?>
							<label>ประเภทอาหาร*:</label>
							<input type="text" id="cates" value="<?php echo $q_cate; ?>" data-role="tagsinput" name="s_cates" row="1" placeholder="กด Space Bar เพื่อดูทั้งหมด" required ><br>
							<br>
							<label>วัตถุดิบ:</label>	
							<?php
							$result3=mysql_query("SELECT * FROM ingrediants JOIN reci_has_ing ON ingrediants.ing_id = reci_has_ing.ing_id
								WHERE reci_has_ing.recipe_id='$_GET[editFood]'");
							$q_ing=array();
							$q_quan=array();
							$r3=0;
							while($resultData3=mysql_fetch_array($result3)){
								$q_ing[$r3]=$resultData3['ing_name'];
								$q_quan[$r3]=$resultData3['quantity'];
								$r3++;
							}
							$clone_id=1;
							$iing=0;
							?>
							<button type="button" class="btn btn-defult" style="margin-bottom: 2px;" onclick="myFunction()">เพิ่มวัตถุดิบ</button>
							<div id="myList">
								<?php 
								while($iing<count($q_ing)){
									?>
									<div style="height:10px"></div>
									<input type="text" id="addingrediants" data-role="tagsinput" name="ing_<?php echo $clone_id; ?>" row="1"
									value="<?php echo $q_ing[$iing]; ?>">
									<input class="form-control" style="display:initial;width:140px;margin-left3px;" placeholder="ปริมาณที่ใช้"
									name="ing_amount_<?php echo $clone_id; ?>" value="<?php echo $q_quan[$iing]; ?>">
									<?php 
									$iing++;
									$clone_id++;
								}
								?>
							</div>
							<br>
							<label>ส่วนประกอบเพิ่มเติม:</label>
							<textarea class="form-control" name="seasoning" style="margin-bottom:15px;resize: none;" rows="5" placeholder="ตัวอย่าง น้ำปลา, น้ำตาล, พริกไทยป่น (แนะนำให้เขียนปริมาณด้วย)" ><?php echo $resultData['seasoning']; ?></textarea>
							<script>
							var cates=[<?php include 'queryCategories.php' ?>];
							$('#cates').tagsinput({
								typeahead: {
									source:cates
								},
								freeInput: false
							});

							</script>

							<script>
							var i = <?php $r3++;echo $r3 ;?>;
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
								document.getElementById("count_ing").setAttribute('value', i);
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
					<input type="hidden" name="count_ing" id="count_ing">
					<input type="hidden" name="ordersteps" id="ordersteps">
					<input type="hidden" name="count_step" id="count_step">
					<input type="hidden" name="recipeidedit" value="<?php echo $_GET['editFood']; ?>">  
					<button type="submit" name="submit" class="btn btn-success" onclick="getOrderli();" >ยืนยันรายการอาหาร</button>
					<br><br>
				</center>
			</div>
		</div>

	</form>

	<script>
	function getOrderli(){

		var liIds = $('#Steps li').map(function(i,n) {
			return $(n).attr('id');
		}).get().join(',');
		console.log(liIds);
		document.getElementById("ordersteps").setAttribute('value', liIds);
		
	}

	</script>


	<script>

	$(function() {

		$('.handles').sortable({
			handle: 'span'
		});

	});


	</script>

	<script type="text/javascript"> 

	function stopRKey(evt) { 
		var evt = (evt) ? evt : ((event) ? event : null); 
		var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
		if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
	} 

	document.onkeypress = stopRKey; 

	</script>
	<?php } ?>

	<?php 
		include "footer.html";
	?>
	<!---------------------------------------------------------->
</div>
</body>
</html>