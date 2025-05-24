<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Επεξεργασία Μαθητή</title>
    <style>
       table{
            font-family: arial;
            font-size: small;
            border: thin solid;
            background-color: orange;
        }

        body{
            background-image: url("background.gif");
        }


        p{
            font-family: arial;
            font-weight: bold;
            text-align: center;
        }

        a{
             font-family: arial;
             font-size: small;
             font-weight: bold;
             text-indent: 10px;
        }
    </style>
</head>
<body>
    <?php 
   if(isset($_GET['student_id'])) $student_id = $_GET['student_id'];
   if(isset($_POST['update'])) $update = $_POST['update'];
    ?>
    <p>Επεξεργασία Μαθητή</p>
    <?php 
  $servername = "localhost";
  $username = "root";
  $passwiord = "";
  $dbname = "mathitologio_db";


  $connect = mysqli_connect($servername,  $username, $passwiord,$dbname);

  if(!$connect){
    die("Σφαλμα στην συνδεση με την βαση δεδομενων.");
  }

  if(isset($update)){
    $student_id=$_POST['student_id'];
    $eponymo=$_POST['eponimo'];
    $onoma=$_POST['onoma'];
    $taxi=$_POST['taji'];
    $tmima=$_POST['tmima'];

    $sql = "UPDATE students SET student_id='$student_id',eponymo='$eponymo',onoma='$onoma',taxi='$taxi',tmima='$tmima' WHERE student_id = $student_id";
  

    $result = mysqli_query($connect,$sql);
    if($result){
       echo "Eπιτυχης ενημερωση";
    }
}
 $result = mysqli_query($connect,"SELECT * FROM students WHERE student_id = $student_id");
 $myrow = mysqli_fetch_array($result);
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="student_id" value="<?php echo $myrow["student_id"]; ?>"><br>
        <table align="center">
            <tr>
                <td>Επώνυμο</td>
                <td><input type="text" name="eponimo" value="<?php echo $myrow["eponymo"]; ?>"></td>
            </tr>
            <tr>
                <td>Όνομα</td>
                <td><input type="text" name="onoma" value="<?php echo $myrow["onoma"]; ?>"></td>
            </tr>
            <tr>
                <td>Τάξη</td>
                <td><input type="text" name="taji" value="<?php echo $myrow["taxi"]; ?>"></td>
            </tr>
            <tr>
                <td>Τμήμα</td>
                <td><input type="text" name="tmima" value="<?php echo $myrow["tmima"]; ?>"></td>
            </tr>
        </table>
        <p><input type="submit" value="Ενημέρωση" name="update"></p>
    </form>
    <p><a href="studentslist.php">Επιστροφη</a></p>
</body>
</html>