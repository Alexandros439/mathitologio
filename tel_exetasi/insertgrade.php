<?php 
  $grade_id=$_POST['grade_id'];
  $eponymo=$_POST['eponimo'];
  $onoma=$_POST['onoma'];
  $taxi=$_POST['taji'];
  $subject=$_POST['subject'];
  $grade=$_POST['grade'];

  $servername = "localhost";
  $username = "root";
  $passwiord = "";
  $dbname = "mathitologio_db";


  $connect = mysqli_connect($servername,  $username, $passwiord,$dbname);

  if(!$connect){
    die("Σφαλμα στην συνδεση με την βαση δεδομενων.");
  }

  mysqli_query($connect,"SET NAMES 'UTF8'");

  $sql = "INSERT INTO grade VALUES ('$grade_id','$subject','$eponymo','$onoma','$taxi','$grade')";

  if($result = mysqli_query($connect,$sql)){
    echo "Η εγγραφη ποστεθηκε επιτυχος";
  }else{
    echo  "Λαθος" . mysqli_error($connect);
  }
?>
  <a href="index.html">Επιστροφη</a>