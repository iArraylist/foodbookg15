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
  ?>

  <?php 

  if(isset($_POST['savenewing'])){
   $result=mysql_query("insert into ingrediants(ing_name,ing_category_id) values ('$_POST[newing]','$_POST[ing_cate]')");
   echo "เพิ่มวัตถุดิบเรียบร้อยแล้ว";
 }

  if(isset($_POST['savenewname'])){
   $result=mysql_query("update ingrediants set ing_name='$_POST[newname]' where ing_id='$_POST[savenewname]'");
   echo "บันทึกเรียบร้อยแล้ว";
 }

 if(isset($_POST['edit'])){ 
  $result=mysql_query("select * from ingrediants where ing_id='$_POST[edit]'");
  $resultData=mysql_fetch_array($result);
  ?>
  <div style="width:400px">
    <form action="" method="POST">
      <input name="newname" class="form-control" value="<?php echo $resultData['ing_name']; ?>" required />
      <button type="submit" name="savenewname" value="<?php echo $_POST['edit']; ?>" >บันทึก</button>
    </form>
  </div>

  <?php }

  ?>

  <div>
    <form action="" method="POST">
      <label>เพิ่มวัตถุดิบ</label><input name="newing" class="form-control" required>
      <input type="radio" name="ing_cate" value="0000000001" checked>ผักและผลไม้
      <input type="radio" name="ing_cate" value="0000000002">เนื้อสัตว์
      <input type="radio" name="ing_cate" value="0000000003">จำพวกแป้ง
      <input type="radio" name="ing_cate" value="0000000004">อื่นๆ
      <br><button type="submit" name="savenewing">เพิ่ม</button>
    </form>
  </div>

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
              <td>แก้ไข</td>
              <td>ลบ</td>
            </tr>
            <?php
            $sql2 = "select * from ingrediants"; 
            $dbquery2 = mysql_query($sql2);
            $num_rows2 = mysql_num_rows($dbquery2);
            $num_count2 = 0;
            while($num_count2 < $num_rows2){
              $fetcharray2 = mysql_fetch_array($dbquery2);?>
              <tr>
                <td><p><?php echo $fetcharray2['ing_name'] ?></p>
                </td>
                <td><form action="" method="POST"><button name="edit" value="<?php echo $fetcharray2['ing_id'] ?>">แก้ไข</button></form></td>
                <td><a data-href="<?php echo $fetcharray2['ing_id'] ?>" data-toggle="modal" data-target="#confirm-delete" href="#">ลบ</a>
                </td>

              </tr>
              <?php $num_count2 = $num_count2+1;
            }
            ?>
          </table>
        </div>
      </div>
    </div>
    <?php
    $sql = "select * from ing_categories";
    $dbquery = mysql_query($sql);
    $num_rows = mysql_num_rows($dbquery);
    $num_count = 0;
    $keep_cate = array();
    while($num_count < $num_rows) {
      $fetcharray = mysql_fetch_array($dbquery);
      $keep_cate[$num_count] = $fetcharray['ing_category'];
      ?>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion"  href="#<?php echo $fetcharray['ing_category_id']; ?>" aria-expanded="true" >
              <?php echo $fetcharray['ing_category'] ;?>
            </a> 
          </h4>
        </div>
        <div id="<?php echo $fetcharray['ing_category_id']; ?>"  class="panel-collapse collapse" >
          <div class="panel-body" >
            <table class="table table-bordered table-hover" >
              <tr class="r-row">
                <td>ชื่อเมนู</td>
                <td>แก้ไข</td>
                <td>ลบ</td>
              </tr>
              <?php
              $sql2 = "select * from ingrediants join ing_categories on ingrediants.ing_category_id = ing_categories.ing_category_id where ing_category = '$keep_cate[$num_count]'"; 
              $dbquery2 = mysql_query($sql2);
              $num_rows2 = mysql_num_rows($dbquery2);
              $num_count2 = 0;
              while($num_count2 < $num_rows2){
                $fetcharray2 = mysql_fetch_array($dbquery2);?>
                <tr>
                  <td><?php echo $fetcharray2['ing_name'] ?></td>
                  <td><form action="" method="POST"><button name="edit" value="<?php echo $fetcharray2['ing_id'] ?>">แก้ไข</button></form></td>
                  <td>
                    <a data-href="<?php echo $fetcharray2['ing_id'] ?>" data-toggle="modal" data-target="#confirm-delete" href="#">ลบ</a>
                  </td>

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
            คุณต้องการที่จะลบวัตถุดิบอาหารนี้ใช่หรือไม่
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            <button class="btn btn-danger danger" id="btn_delete" onclick="ing_delete();" >ลบ</button>
          </div>
        </div>
      </div>
    </div>

    <script>

    $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.danger').attr('value', $(e.relatedTarget).data('href'));
    });

    function ing_delete(){
      $('#confirm-delete').hide();
      console.log($('#btn_delete').attr('value'));
      var id = $('#btn_delete').attr('value');
      $.ajax({
        url: "deleteIng.php",
        type: "GET",
        data: { 'id': id },
        success: function(){
          alert("ลบรายการเรียบร้อยแล้ว");
          location.reload();

        }                   

      });
    }
    </script>



  </body>
  </html>