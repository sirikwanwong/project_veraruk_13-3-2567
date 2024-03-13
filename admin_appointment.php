<?php
    $pdo = new PDO("mysql:host=localhost;dbname=veraruk;charset=utf8", "root", "");
    $stmt = $pdo->prepare("SELECT * FROM appointment_admin_page "); 
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="admin_appointment.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function showform(){

                var popup = document.getElementById("bd-modal");
                popup.style.display = "flex";
            };
        function close_modal(){
            document.getElementById('close')
            var popup = document.getElementById("bd-modal");
            popup.style.display = "none"; 
        };
    $(document).on('click','.edit-data',function(){
        var patient_id = $(this).val();
        // alert(patient_id);
        $.ajax({
            type : "GET",
            url : "add-data.php?patient_id=" + patient_id,
            success: function(response){

            }
        });
    });
            
  </script>
  <div class="bg-modal"id="bd-modal">
    <div class="modal-content">
        <form id="form_data"action="admin_add_data_appointment.php" method="post" >
        <span onclick="close_modal()" class="close">&times;</span>
            <label>เพศ : <select id="typegender" name="gender">
                <option value="หญิง">หญิง</option>
                <option value="ชาย">ชาย</option></select></label><br>
                <label>อาชีพ : <input  type="text" name="career">
                <label>สถานภาพ : <input type="checkbox" value="โสด" name="status_id"> โสด
                <input type="checkbox" value="สมรส" name="status_id">สมรส
                <input type="checkbox" value="หย่าร้าง" name="status_id"> หย่าร้าง</label><br>
            <input id="submit" type="submit" value="เพิ่มประวัติผู้ป่วย">
            
        </form>
    </div>

</div>
<body>
  <header>
   <?php include('homepage_admin.php');?>
  </header>
  <div class="container">
      <div class="sidebar">
          <div class="side-nav">
            <a href="#" class="sidebar-item">การนัดหมาย</a>
            <a href="#" class="sidebar-item">พบแพทย์</a>
            <a href="#" class="sidebar-item">จ่ายยา</a>
          </div>
      </div>
      <div class="content">
          <div class="select_date">
              <h3>ตารางการนัดหมาย</h3>
              <label for="date_appoint">วันเดือนปีที่นัดหมาย :<input type="date" id="date_appoint"></label>
          </div>
              <table>
                    <tr>
                          <th>วันเดือนปีที่นัดหมาย</th>
                          <th>เวลาที่นัดหมาย</th>
                          <th>รหัสผู้ป่วย</th>
                          <th>ชื่อผู้ป่วย</th>
                          <th>ชักประวัติ</th>
                          <th>check in </th>
                    </tr>
                <?php while($row=$stmt->fetch()): ?>
                      <tr>
                          <td><?=$row ["date"] ?></td>
                          <td><?=$row ["time"] ?></td>
                          <td><?=$row ["patient_id"] ?></td>
                          <td><?=$row ["name_patient"] ?></td>
                          <td><button class="edit-data" value="<?=$row ['patient_id'] ?>" >เพิ่มข้อมูล <i class='far fa-edit'></i></button></td><br>   
                          <td><button class="button-booking">เพิ่มลงในการนัดหมาย</button></td><br>     
                      </tr>
                <?php endwhile; ?>
              </table>
          </div>
      </div>
      







</body>
</html>