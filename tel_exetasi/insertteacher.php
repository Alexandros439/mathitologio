<?php 
  $teacher_id=$_POST['teacher_id'];
  $eponymo=$_POST['eponimo'];
  $onoma=$_POST['onoma'];
  $subject=$_POST['subject'];
 

  $servername = "localhost";
  $username = "root";
  $passwiord = "";
  $dbname = "mathitologio_db";


  $connect = mysqli_connect($servername,  $username, $passwiord,$dbname);

  if(!$connect){
    die("Σφαλμα στην συνδεση με την βαση δεδομενων.");
  }

  mysqli_query($connect,"SET NAMES 'UTF8'");

  $sql = "INSERT INTO teachers VALUES ('$teacher_id','$eponymo','$onoma','$subject')";

  if($result = mysqli_query($connect,$sql)){
    echo "Η εγγραφη ποστεθηκε επιτυχος";
  }else{
    echo  "Λαθος" . mysqli_error($connect);
  }
?>
  <a href="index.html">Επιστροφη</a>