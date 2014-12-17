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
   $result=mysql_query("insert into reci_categories(reci_category) values ('$_POST[newing]')");
   echo "เพิ่มวัตถุดิบเรียบร้อยแล้ว";
 }

  if(isset($_POST['savenewname'])){
   $result=mysql_query("update reci_categories set reci_category='$_POST[newname]' where reci_category_id='$_POST[savenewname]'");
   echo "บันทึกเรียบร้อยแล้ว";
 }

 if(isset($_POST['edit'])){ 
  $result=mysql_query("select * from reci_categories where reci_category_id='$_POST[edit]'");
  $resultData=mysql_fetch_array($result);
  ?>
  <div style="width:400px">
    <form action="" method="POST">
      <input name="newname" class="form-control" value="<?php echo $resultData['reci_category']; ?>" required />
      <button type="submit" name="savenewname" value="<?php echo $_POST['edit']; ?>" >บันทึก</button>
    </form>
  </div>

  <?php }

  ?>

  <div>
    <form action="" method="POST">
      <label>เพิ่มประเภทอาหาร</label><input name="newing" class="form-control" required>
      <br><button type="submit" name="savenewing">เพิ่ม</button>
    </form>
  </div>


    <table>
    <tr>
      <td>ประเภทอาหาร</td>
      <td>แก้ไข</td>
      <td>ลบ</td>
    </tr>
    <?php 
    $result=mysql_query("SELECT * FROM reci_categories");

    while($resultDate = mysql_fetch_array($result)){ ?>
    <tr>
      <td><?php echo $resultDate['reci_category']; ?></td>
      <td><form action="" method="POST"><button name="edit" value="<?php echo $resultDate['reci_category_id']; ?>">แก้ไข</button></form></td>
      <td>
        <?php 
        $checkdelete=mysql_query("select * from reci_categories_has_recipes where reci_category_id='$resultDate[reci_category_id]'");
        if(mysql_num_rows($checkdelete) == 0){
        ?>
        <a data-href="<?php echo $resultDate['reci_category_id']; ?>" data-toggle="modal" data-target="#confirm-delete" href="#">ลบ</a>
        <?php } else{ ?>
         <a data-href="<?php echo $resultDate['reci_category_id']; ?>" data-toggle="modal" data-target="#cannot-delete" href="#">ลบ</a>
         <?php } ?>
      </td>
        
      </form>
    </td>
  </tr>

  <?php }
  ?>

</table>

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
            <button class="btn btn-danger danger" id="btn_delete" onclick="cate_delete();" >ลบ</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="cannot-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            เกิดข้อผิดพลาด
          </div>
          <div class="modal-body">
            ไม่สามารถทำการลบ<br>
            เนื่องจากยังคงมีเมนูอาหารอยู่ในประเภทนี้
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">ตกลง</button>
          </div>
        </div>
      </div>
    </div>

    <script>

    $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.danger').attr('value', $(e.relatedTarget).data('href'));
    });

    function cate_delete(){
      $('#confirm-delete').hide();
      console.log($('#btn_delete').attr('value'));
      var id = $('#btn_delete').attr('value');
      $.ajax({
        url: "deleteCate.php",
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