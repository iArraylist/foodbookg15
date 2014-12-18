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
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
			<div class="panel-heading" role="tab">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion"  href="#allcate" aria-expanded="true" >
						ประเภททั้งหมด
					</a>	
				</h4>
			</div>
			<div id="allcate"  class="panel-collapse collapse" >
				<div class="panel-body" >
					<table class="table table-bordered table-hover" >
						<tr class="r-row">
							<td>ชื่อเมนู</td>
							<td>ผู้ใช้</td>
							<td>จัดการ</td>
						</tr>
						<?php
						$sql2 = "select * from recipes join members on members.member_id = recipes.member_id"; 
						$dbquery2 = mysql_query($sql2);
						$num_rows2 = mysql_num_rows($dbquery2);
						$num_count2 = 0;
						while($num_count2 < $num_rows2){
							$fetcharray2 = mysql_fetch_array($dbquery2);?>
							<tr>
								<td><?php echo $fetcharray2['recipe_name'] ?></td>
								<td><?php echo $fetcharray2['username'] ?></td>
								<td><a data-href="<?php echo $fetcharray2['recipe_id'] ?>" data-toggle="modal" data-target="#confirm-delete" href="#">Delete</a><br></td>

							</tr>
							<?php $num_count2 = $num_count2+1;
						}
						?>
					</table>
				</div>
			</div>
		</div>
		<?php
		$sql = "select * from reci_categories";
		$dbquery = mysql_query($sql);
		$num_rows = mysql_num_rows($dbquery);
		$num_count = 0;
		$keep_cate = array();
		while($num_count < $num_rows) {
			$fetcharray = mysql_fetch_array($dbquery);
			$keep_cate[$num_count] = $fetcharray['reci_category'];
			?>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab">
					<h4 class="panel-title">
						<?php if($num_count == 0){ ?>
						<a data-toggle="collapse" data-parent="#accordion"  href="#<?php echo $fetcharray['reci_category_id']; ?>" aria-expanded="true" >
							<?php echo $fetcharray['reci_category'] ;?>
						</a>
						<?php } 
						else {?>
						<a data-toggle="collapse" data-parent="#accordion"  href="#<?php echo $fetcharray['reci_category_id']; ?>" aria-expanded="false" >
							<?php echo $fetcharray['reci_category'] ;?>
						</a>
						<?php } ?>	
					</h4>
				</div>
				<div id="<?php echo $fetcharray['reci_category_id']; ?>"  class="panel-collapse collapse" >
					<div class="panel-body" >
						<table class="table table-bordered table-hover" >
							<tr class="r-row">
								<td>ชื่อเมนู</td>
								<td>ผู้ใช้</td>
								<td>จัดการ</td>
							</tr>
							<?php
							$sql2 = "select recipes.recipe_id, recipes.recipe_name, recipes.member_id, members.username, members.member_id from recipes join reci_categories_has_recipes on recipes.recipe_id = reci_categories_has_recipes.recipe_id join reci_categories on reci_categories_has_recipes.reci_category_id = reci_categories.reci_category_id join members on members.member_id = recipes.member_id where reci_categories.reci_category ='$keep_cate[$num_count]'"; 
							$dbquery2 = mysql_query($sql2);
							$num_rows2 = mysql_num_rows($dbquery2);
							$num_count2 = 0;
							while($num_count2 < $num_rows2){
								$fetcharray2 = mysql_fetch_array($dbquery2);?>
								<tr>
									<td><?php echo $fetcharray2['recipe_name'] ?></td>
									<td><?php echo $fetcharray2['username'] ?></td>
									<td><a data-href="<?php echo $fetcharray2['recipe_id'] ?>" data-toggle="modal" data-target="#confirm-delete" href="#">Delete</a><br></td>

								</tr>
								<?php $num_count2 = $num_count2+1;
							}
							$num_count = $num_count+1;
							?>
						</table>
					</div>
				</div>
			</div>

			<?php }

			?>
		</div>

		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						ยืนกันการจัดการ
					</div>
					<div class="modal-body">
						คุณต้องการที่จะลบเมนูอาหารนี้ใช่หรือไม่
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
						<button class="btn btn-danger danger" id="btn_delete" onclick="menu_delete();" >ลบ</button>
					</div>
				</div>
			</div>
		</div>

		<script>

		$('#confirm-delete').on('show.bs.modal', function(e) {
			$(this).find('.danger').attr('value', $(e.relatedTarget).data('href'));
		});

		function menu_delete(){
			$('#confirm-delete').hide();
			console.log($('#btn_delete').attr('value'));
			var id = $('#btn_delete').attr('value');
			$.ajax({
				url: "deleteMenu.php",
				type: "GET",
				data: { 'id': id },
				success: function(){
					alert("ลบรายการเรียบร้อยแล้ว");
					location.reload();

				}                   

			});
		}
		</script>

		<div class="container">

		</div>



	</body>
	</html>