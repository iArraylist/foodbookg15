<?php
session_start();
include "confic.inc.php";
?>
<div class="menu-bar">
	<nav>
		<ul>
			<li>
				<a href="HomePage.php">หน้าหลัก</a>
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
						<li><a id="r-menu-drop" href="categoryType.php?cate_type=<?php echo $fetcharray['reci_category'] ?>"><?php echo $fetcharray['reci_category']; ?></a></li>
						<?php } ?>
					</ul>
				</li>
				<li>
					|
				</li>
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">เมนูยอดนิยม<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a id="r-menu-drop" href="showRanking.php">ทุกประเภท</a></li>
					<li><a id="r-menu-drop" href="stirFried.php">ผัด</a></li>
            		<li><a id="r-menu-drop" href="boil.php">ต้ม</a></li>
            		<li><a id="r-menu-drop" href="curry.php">แกง</a></li>
            		<li><a id="r-menu-drop" href="fry.php">ทอด</a></li>
            		<li><a id="r-menu-drop" href="grill.php">ปิ้ง/ย่าง/อบ</a>
            		<li><a id="r-menu-drop" href="steam.php">นึ่ง</a></li>
            		<li><a id="r-menu-drop" href="salad.php">ยำ</a></li>
            		</li>
            		</ul>

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