<?php
    $pdo = new PDO("mysql:host=localhost;dbname=veraruk;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="admin_viewdatapatient.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<body>
    
<?php
if(isset($_GET['patient_id'])) {
    // Retrieve the patient_id from the request
    $patient_id = $_GET['patient_id'];

    // Prepare and execute the query to fetch general information about the patient
    $stmt = $pdo->prepare("SELECT * FROM medical_records WHERE patient_id = ?");
    $stmt->execute([$patient_id]);
    
    // Fetch the data
    $patient_data = $stmt->fetch();
    if ($patient_data) {
                $html = "<div>ข้อมูล</div>";
                $html.= "<div class='patient_id'>รหัสผู้ป่วย:" .$patient_data["patient_id"]. "</label><br>" ;
                $html.= "<div>ชื่อ-สกุล :" .$patient_data["name_patient"]."</label><br>";
                $html.= "<div>เลขบัตรประชาชน :" .$patient_data["id_card"]."</label><br>";
                $html.= "<div>วัน เดือน ปี เกิด : ".$patient_data["date_of_birth"]."</div>";
                $html.= "<div>อายุ :" .$patient_data["age"].  "ปี</label></div>";
                $html.= "<div>เพศ :" .$patient_data["gender"]."</label><br>";
                $html.= "<div>อาชีพ :" .$patient_data["career"]."</label>";
                $html.= "<div>สถานภาพ :" .$patient_data["status_id"]."</label>";
                $html.= "<div>เชื้อชาติ :" .$patient_data["ethnicity"]."</label>";
                $html.= "<div>สัญชาติ :" .$patient_data["nationality"]."</label>";
                $html.= "<div>ศาสนา :" .$patient_data["religion"]."</label><br>";
                $html.= "<div>ที่อยู่ :" .$patient_data["address"]."</label>";
                $html.= "<div>จังหวัด :" .$patient_data["province"]."</label>";
                $html.= "<div>อำเภอ :" .$patient_data["district"]."</label>";
                $html.= "<div>ตำบล :" .$patient_data["sub_district"]."</label>";
                $html.= "<div>รหัสไปรษณีย์ :" .$patient_data["zip_code"]."</label>";
                $html.= "<div>เบอร์โทรศัพท์ :" .$patient_data["tel"]."<br></label>";
                $html.= "<div>โรคประจำตัว :".$patient_data["congenital_disease"]."</label><br>";
                $html.= "<div>ประวติแพ้ยา :" .$patient_data["allergy"]."</label><br>";
                $html.= "<div>ประวัติการผ่าตัด :" .$patient_data["surgery_history"]."</label><br>";
                $html.= "<div>ประวัติการประสบอุบัติเหตุ :" .$patient_data["accident_history"]."</label><br>";
                echo $html;
            } else {
                // If no data found, return an error message or handle it as needed
                echo "No data found for the provided patient ID.";
            }
        }
    
       


?>



    