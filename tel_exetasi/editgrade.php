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
   if(isset($_GET['grade_id'])) $grade_id = $_GET['grade_id'];
   if(isset($_POST['update'])) $update = $_POST['update'];
    ?>
    <p>Επεξεργασία βαθμου</p>
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
    $grade_id=$_POST['grade_id'];
    $eponymo=$_POST['eponimo'];
    $onoma=$_POST['onoma'];
    $taxi=$_POST['taji'];
    $subject=$_POST['subject'];
    $grade=$_POST['grade'];

    $sql = "UPDATE grade SET grade_id='$grade_id',subject='$subject',surname='$eponymo',name='$onoma',class='$taxi',grade='$grade' WHERE grade_id = $grade_id";
  

    $result = mysqli_query($connect,$sql);
    if($result){
       echo "Eπιτυχης ενημερωση";
    }
}
 $result = mysqli_query($connect,"SELECT * FROM grade WHERE grade_id = $grade_id");
 $myrow = mysqli_fetch_array($result);
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="grade_id" value="<?php echo $myrow["grade_id"]; ?>"><br>
        <table align="center">
            <tr>
                <td>Μαθημα</td>
                <td><input type="text" name="subject" value="<?php echo $myrow["subject"]; ?>"></td>
            </tr>
            <tr>
                <td>Όνομα</td>
                <td><input type="text" name="eponimo" value="<?php echo $myrow["surname"]; ?>"></td>
            </tr>
            <tr>
                <td>Τάξη</td>
                <td><input type="text" name="onoma" value="<?php echo $myrow["name"]; ?>"></td>
            </tr>
            <tr>
                <td>Τμήμα</td>
                <td><input type="text" name="taji" value="<?php echo $myrow["class"]; ?>"></td>
            </tr>
            <tr>
                <td>Τμήμα</td>
                <td><input type="text" name="grade" value="<?php echo $myrow["grade"]; ?>"></td>
            </tr>
        </table>
        <p><input type="submit" value="Ενημέρωση" name="update"></p>
    </form>
    <p><a href="gradeslist.php">Επιστροφη</a></p>
</body>
</html>