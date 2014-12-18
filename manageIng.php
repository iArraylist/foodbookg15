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
   $result=mysql_query("insert into ingrediants(ing_name,ing_category_id) values ('$_POST[newing]','$_POST[ing_cate]')");
      echo '<script language="javascript">';
     echo 'alert("เพิ่มวัตถุดิบเรียบร้อยแล้ว")';
     echo '</script>';
 }

 if(isset($_POST['savenewname'])){
   $result=mysql_query("update ingrediants set ing_name='$_POST[newname]' where ing_id='$_POST[savenewname]'");
      echo '<script language="javascript">';
     echo 'alert("บันทึกเรียบร้อยแล้ว")';
     echo '</script>';
 }

 if(isset($_POST['edit'])){ 
  $result=mysql_query("select * from ingrediants where ing_id='$_POST[edit]'");
  $resultData=mysql_fetch_array($result);
  ?>
   <div style="padding:15px;background-color:#C9C9C9;color:#fff;margin-bottom:10px;">
    <form action="" method="POST">
      <input name="newname" class="form-control" value="<?php echo $resultData['ing_name']; ?>" style="margin-bottom:5px;" required />
      <button type="submit" name="savenewname" value="<?php echo $_POST['edit']; ?>" class="btn btn-primary">บันทึก</button>
    </form>
  </div>

  <?php }

  ?>

  <div>
    <form action="" method="POST">
      <div style="padding:15px;background-color:gray;color:#fff;margin-bottom:10px;">
      <label>เพิ่มวัตถุดิบ</label><input name="newing" class="form-control" style="margin-bottom:5px;" required>
      <?php 
      $rescate=mysql_query("select * from ing_categories");
      $c=0;
      while($rescateDate=mysql_fetch_array($rescate)){
        if($c==0){
          ?>
          <input type="radio" name="ing_cate" value="<?php echo $rescateDate['ing_category_id'];?>" checked><?php echo $rescateDate['ing_category'];?>
          <?php } else{ ?>
          <input type="radio" style="margin-left:10px;margin-right:3px" name="ing_cate" value="<?php echo $rescateDate['ing_category_id'];?>"><?php echo $rescateDate['ing_category'];?>
          <?php 
        } $c++;
      }
      ?>
      <br><button type="submit" name="savenewing" class="btn btn-primary">เพิ่ม</button><br><br>
    </div>
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
                <td><form action="" method="POST"><button name="edit" value="<?php echo $fetcharray2['ing_id'] ?>" class="btn btn-success">แก้ไข</button></form></td>
                <td><a data-href="<?php echo $fetcharray2['ing_id'] ?>" data-toggle="modal" data-target="#confirm-delete" href="#" class="btn btn-danger">ลบ</a>
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
                  <td><form action="" method="POST"><button name="edit" value="<?php echo $fetcharray2['ing_id'] ?>" class="btn btn-success">แก้ไข</button></form></td>
                  <td>
                    <a data-href="<?php echo $fetcharray2['ing_id'] ?>" data-toggle="modal" data-target="#confirm-delete" href="#" class="btn btn-danger">ลบ</a>
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


    <?php 
    include "footer.html";
    ?>
  </div>
</body>
</html>