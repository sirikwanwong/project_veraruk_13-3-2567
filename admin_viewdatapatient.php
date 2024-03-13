<?php
    $pdo = new PDO("mysql:host=localhost;dbname=veraruk;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
 <?php
    $stmt = $pdo->prepare("SELECT * FROM medical_records WHERE patient_id =?");
    $stmt->bindParam(1,$_GET["patient_id"]);
    $stmt->execute();
    $row=$stmt->fetch();?>
  <html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="admin_viewdatapatient.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function(){
        // Function to load data from the database and display it in the result div
        function loadData(url, data) {
            $.ajax({
                url: url,
                type: "GET",
                data: data, // Attach data to the request
                success: function(response){
                    $("#results").html(response);
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                }
            });
        }

        // Event listeners for clicking on sidebar items
        $("#general").click(function() {
            // Attach the patient_id to search for information
            loadData("fetch_general.php?patient_id=", { patient_id: <?=$row["patient_id"]?> });
        });

        $("#history").click(function() {
            // Attach the patient_id to search for information
            loadData("fetch_history.php", { patient_id: <?=$row["patient_id"]?> });
        });

        $("#course").click(function() {
            // Attach the patient_id to search for information
            loadData("fetch_course.php", { patient_id: <?=$row["patient_id"]?> });
        });
    });
</script>

<body>
<header>
<?php include('homepage_admin.php');?>
</header>
<div class="container">
    <div class="sidebar">
          <div class="sidebar-1">
            รหัสผู้ป่วย  : <?=$row["patient_id"]?><br>
            ชื่อ-สกุล : <?=$row ["name_patient"]?>
          </div>
        <div class="side-nav">
          <a href=" " class="sidebar-item" id="general" >ข้อมูลทั่วไป</a>
          <a href=" " class="sidebar-item" id="history">ประวัติการรักษา</a> 
          <a href=" " class="sidebar-item" id="course">คอร์สการรักษา</a>
        </div>
  </div>
    <div class="content">
        
            <div id="results"></div>
            
    </div>
    </div>

  </div>
</body>    
</html>