<?php 
  $subject_id=$_POST['subject_id'];
  $onoma=$_POST['onoma'];
  $class=$_POST['class'];
  $subject=$_POST['subject'];
  $teacher_id=$_POST['teacher_id'];

  $servername = "localhost";
  $username = "root";
  $passwiord = "";
  $dbname = "mathitologio_db";


  $connect = mysqli_connect($servername,  $username, $passwiord,$dbname);

  if(!$connect){
    die("Σφαλμα στην συνδεση με την βαση δεδομενων.");
  }

  mysqli_query($connect,"SET NAMES 'UTF8'");

  $sql = "INSERT INTO subjects VALUES ('$subject_id','$onoma','$class','$subject','$teacher_id')";

  if($result = mysqli_query($connect,$sql)){
    echo "Η εγγραφη ποστεθηκε επιτυχος";
  }else{
    echo  "Λαθος" . mysqli_error($connect);
  }
?>
  <a href="index.html">Επιστροφη</a>