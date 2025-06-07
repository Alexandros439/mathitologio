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
   if(isset($_GET['subject_id'])) $subject_id = $_GET['subject_id'];
   if(isset($_POST['update'])) $update = $_POST['update'];
    ?>
    <p>Επεξεργασία Μαθηματος</p>
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
    $subject_id=$_POST['subject_id'];
    $name=$_POST['name'];
    $class=$_POST['class'];
    $subject=$_POST['subject'];
    $teacher_id=$_POST['teacher_id'];

    $sql = "UPDATE subjects SET subject_id='$subject_id',name='$name',class='$class',subject='$subject',teacher_id='$teacher_id' WHERE subject_id = $subject_id";
  

    $result = mysqli_query($connect,$sql);
    if($result){
       echo "Eπιτυχης ενημερωση";
    }
}
 $result = mysqli_query($connect,"SELECT * FROM subjects WHERE subject_id = $subject_id");
 $myrow = mysqli_fetch_array($result);
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="subject_id" value="<?php echo $myrow["subject_id"]; ?>"><br>
        <table align="center">
            <tr>
                <td>Όνομα</td>
                <td><input type="text" name="name" value="<?php echo $myrow["name"]; ?>"></td>
            </tr>
            <tr>
                <td>Τάξη</td>
                <td><input type="text" name="class" value="<?php echo $myrow["class"]; ?>"></td>
            </tr>
            <tr>
                <td>Mαθημα</td>
                <td><input type="text" name="subject" value="<?php echo $myrow["subject"]; ?>"></td>
            </tr>
            <tr>
                <td>Κωδικος Καθηγητη</td>
                <td><input type="text" name="teacher_id" value="<?php echo $myrow["teacher_id"]; ?>"></td>
            </tr>
        </table>
        <p><input type="submit" value="Ενημέρωση" name="update"></p>
    </form>
    <p><a href="subjectslist.php">Επιστροφη</a></p>
</body>
</html>