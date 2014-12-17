<!DOCTYPE html>
<html>
<head>
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
		$sql = "select * from ing_categories" ;
		$dbquery = mysql_query($sql);
		$num_rows = mysql_num_rows($dbquery);
		$i=0;

		$keep_cat = array();


		while ($i < $num_rows) {
			$fetarray = mysql_fetch_array($dbquery);
			$keep_cat[$i] =  $fetarray['ing_category'];
			

			?>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  				<div class="panel panel-default">
    				<div class="panel-heading" role="tab">
      					<h4 class="panel-title">
      					<?php if ($i == 0){ ?>
      							<a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $fetarray['ing_category']; ?>" aria-expanded="true" >
          							<?php echo $fetarray['ing_category'] ;?>
        						</a>
        				<?php }
        						else{ ?>
        							<a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $fetarray['ing_category']; ?>" aria-expanded="false" >
        								<?php echo $fetarray['ing_category'] ;?>
        								</a>
        						<?php } ?>
      					</h4>
    				</div>
					<div id="<?php echo $fetarray['ing_category']; ?>" class="panel-collapse collapse in">
      					<div class="panel-body">
      						<table class="table table-bordered table-hover" >
      							<tr class="r-row">
      								<td>วัตถุดิบ</td>
      								<td>จัดการ</td>
      							</tr>
      						<?php 
								$sql2 = "select ing_name from ingrediants join ing_categories on ingrediants.ing_category_id = ing_categories.ing_category_id where ing_category = '$keep_cat[$i]' "; 
  								$dbquery2 = mysql_query($sql2);
  								$num_rows2 = mysql_num_rows($dbquery2);
  								$num_count = 0;
  								while ($num_count < $num_rows2) {
  									$fetarray2 = mysql_fetch_array($dbquery2); ?>
  									<tr><td><?php echo $fetarray2['ing_name'];?></td></tr>
  									<?php $num_count = $num_count + 1; 
  								}
  								$i = $i+1; 	
  							?>
        					</table>
      				</div>
    			</div>
  			</div>
  		</div>
			<?php } ?>

</body>
</html>