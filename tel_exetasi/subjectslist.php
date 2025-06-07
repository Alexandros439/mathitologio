<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Διαχειρηση Μαθητων</title>
    <style>
body{
    background-image: url("background.gif");
    font-family: arial;
}

p{
    font-size: medium;
    font-weight: bold;
    text-align: center;
}

div{

}
table{
    font-size: small;

}
th{
    background-color: #A0C9C9;
}

div{
    font-size: small;
    font-weight: bold;
    text-align: center;
}
    </style>
</head>
<body>
    <p>Διαχειρηση Μαθηματων</p>
    <?php 
  $servername = "localhost";
  $username = "root";
  $passwiord = "";
  $dbname = "mathitologio_db";


  $connect = mysqli_connect($servername,  $username, $passwiord,$dbname);
  mysqli_query($connect,"SET NAMES 'UTF8'");

  $sql = "SELECT * FROM subjects";
    ?>
    <table align="center">
            <th>Κωδικος Μαθηματος</th>
            <th>Ονομα</th>
            <th>Ταξη</th>
            <th>Μαθημα</th>
            <th>Kωδικος Καθηγητη</th>
            <th>Επιλογες</th>
            <?php 

            $subject = mysqli_query($connect, $sql);
            if(mysqli_num_rows( $subject) == 0){
                echo ("</table>");
                echo ("<p>Λαθος στην ανακτηση των μαθηματων απο την βαση<br>" . "Error" . mysqli_error($connect) . "<br><br>");
                echo ("<a href='index.html'>Επιστροφη</a>");
                exit();
            }

            $i = 0;
            
            while($subjects = mysqli_fetch_assoc($subject)){
                if(fmod($i,2)==0){
                    echo '<tr style="background-color:#D7D7D7;">';
                }else{
                    echo '<tr style="background-color:#C0C0C0;">';
                }
                
                
                echo ("<tr>");
                
                $subject_id=$subjects["subject_id"];
                $name=$subjects["name"];
                $class=$subjects["class"];
                $subjec=$subjects["subject"];
                $teacher_id=$subjects["teacher_id"];
                echo("<td>$subject_id</td>");
                echo("<td>$name</td>");
                echo("<td>$class</td>");
                echo("<td>$subjec</td>");
                echo("<td>$teacher_id</td>");
                echo("<td>[<a href='editsubject.php?subject_id=$subject_id'>" . "Επεξεργασια</a> <a href='deletesubject.php?subject_id=$subject_id'>" . "Διαγραφη</a>]");
                echo("</tr>");
                
                $i++;
            }
            ?>
            </table>
            <br>
            <div><a href="index.html">Eπιστροφη</a></div>
        </tr>
    </table>
</body>
</html>