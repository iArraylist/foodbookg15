<?php
	include "confic.inc.php";
?>
<div class="r-header-container">
	
</div>
<div class="r-menu">
	<div class="container">
	<p>
		<img src="MENU_01.png">
	</p>
	<nav>
		<ul>
			<li>
				<a href="#">หน้าหลัก</a>
			</li>
			<li>
				|
			</li>
			<li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">เมนูอาหาร<span class="caret"></span></a>
          		<ul class="dropdown-menu" role="menu">
          			<?php 
          				$sql = "select * from reci_categories";
          				$dbquery = mysql_query($sql);
          				$num_rows = mysql_num_rows($dbquery);
          				$count = 0;
          				while($count<$num_rows){
          					$fetcharray = mysql_fetch_array($dbquery);
          					$count = $count+1;
          			?>
          					<li><a id="r-menu-drop" href="test7.php?cate_type=<?php echo $fetcharray['reci_category'] ?>"><?php echo $fetcharray['reci_category']; ?></a></li>
          			<?php 
          				} 
          			?>
          		</ul>
        	</li>
			<li>
				|
			</li>
			<li>
				<a href="#">อาหารที่ได้รับความนิยม</a>
			</li>
			<li>
				|
			</li>
			<li>
				<a href="#">ติดต่อเรา</a>
			</li>
		</ul>
		</nav>
	</div>
</div>