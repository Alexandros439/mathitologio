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
   if(isset($_GET['teacher_id'])) $teacher_id = $_GET['teacher_id'];
   if(isset($_POST['update'])) $update = $_POST['update'];
    ?>
    <p>Επεξεργασία Kαθηγητη</p>
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
    $teacher_id=$_POST['teacher_id'];
    $eponymo=$_POST['eponimo'];
    $onoma=$_POST['onoma'];
    $subject=$_POST['subject'];

    $sql = "UPDATE teachers SET teacher_id='$teacher_id',eponymo='$eponymo',subject='$subject' WHERE teacher_id = $teacher_id";
  

    $result = mysqli_query($connect,$sql);
    if($result){
       echo "Eπιτυχης ενημερωση";
    }
}
 $result = mysqli_query($connect,"SELECT * FROM teachers WHERE teacher_id = $teacher_id");
 $myrow = mysqli_fetch_array($result);
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="teacher_id" value="<?php echo $myrow["teacher_id"]; ?>"><br>
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
                <td>Μαθημα</td>
                <td><input type="text" name="subject" value="<?php echo $myrow["subject"]; ?>"></td>
            </tr>
        </table>
        <p><input type="submit" value="Ενημέρωση" name="update"></p>
    </form>
    <p><a href="teachersslist.php">Επιστροφη</a></p>
</body>
</html>