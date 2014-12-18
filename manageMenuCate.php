<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">\
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/categoryType.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/docs.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.min.js"></script>
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

    if(isset($_POST['savenewing'])){
     $result=mysql_query("insert into reci_categories(reci_category) values ('$_POST[newing]')");
     echo '<script language="javascript">';
     echo 'alert("เพิ่มวัตถุดิบเรียบร้อยแล้ว")';
     echo '</script>';

   }

   if(isset($_POST['savenewname'])){
     $result=mysql_query("update reci_categories set reci_category='$_POST[newname]' where reci_category_id='$_POST[savenewname]'");
      echo '<script language="javascript">';
     echo 'alert("บันทึกเรียบร้อยแล้ว")';
     echo '</script>';
   }

   if(isset($_POST['edit'])){ 
    $result=mysql_query("select * from reci_categories where reci_category_id='$_POST[edit]'");
    $resultData=mysql_fetch_array($result);
    ?>
    <div style="padding:15px;background-color:#C9C9C9;color:#fff;margin-bottom:10px;">
      <form action="" method="POST">
        <input name="newname" class="form-control" value="<?php echo $resultData['reci_category']; ?>" style="margin-bottom:5px;" required />
        <button type="submit" name="savenewname" value="<?php echo $_POST['edit']; ?>" class="btn btn-primary" >บันทึก</button>
      </form>
    </div>

    <?php }

    ?>

    <div style="padding:15px;background-color:gray;color:#fff;margin-bottom:10px;">
      <form action="" method="POST">
        <label>เพิ่มประเภทอาหาร</label><input name="newing" class="form-control"  style="margin-bottom:5px;" required>
        <button type="submit" name="savenewing" class="btn btn-primary">เพิ่ม</button>
      </form>
    </div>

    <div style="padding:15px;background-color:#fff;margin-bottom:10px;">
      <table class="table table-bordered table-hover">
        <tr class="r-row">
          <td>ประเภทอาหาร</td>
          <td>แก้ไข</td>
          <td>ลบ</td>
        </tr>
        <?php 
        $result=mysql_query("SELECT * FROM reci_categories");

        while($resultDate = mysql_fetch_array($result)){ ?>
        <tr>
          <td><?php echo $resultDate['reci_category']; ?></td>
          <td><form action="" method="POST"><button name="edit" value="<?php echo $resultDate['reci_category_id']; ?>" class="btn btn-success">แก้ไข</button></form></td>
          <td>
            <?php 
            $checkdelete=mysql_query("select * from reci_categories_has_recipes where reci_category_id='$resultDate[reci_category_id]'");
            if(mysql_num_rows($checkdelete) == 0){
              ?>
              <a data-href="<?php echo $resultDate['reci_category_id']; ?>" data-toggle="modal" data-target="#confirm-delete" href="#" class="btn btn-danger">ลบ</a>
              <?php } else{ ?>
              <a data-href="<?php echo $resultDate['reci_category_id']; ?>" data-toggle="modal" data-target="#cannot-delete" href="#" class="btn btn-danger">ลบ</a>
              <?php } ?>
            </td>

          </form>
        </td>
      </tr>

      <?php }
      ?>

    </table>
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


  <?php 
  include "footer.html";
  ?>
</div>
</body>
</html>