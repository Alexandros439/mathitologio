<?php
  $servername = "localhost";
  $username = "root";
  $passwiord = "";
  $dbname = "mathitologio_db";


  $connect = mysqli_connect($servername,  $username, $passwiord,$dbname);

 if (!$connect) {
    die("Σφάλμα στη σύνδεση με τη βάση δεδομένων.");
}


  mysqli_query($connect,"SET NAMES 'UTF8'");


  $student_id = $_GET["student_id"];
  $sql = "DELETE FROM grade WHERE student_id = $student_id";
  
  if($result = mysqli_query($connect,$sql)){
    echo "Η εγγραφη Διαγραφηκε";
  }else{
    echo  "Λαθος" . mysqli_error($connect);
  }
?>
<a href="gradeslist.php">Επιστροφη</a>