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
    <p>Διαχειρηση Βαθμων</p>
    <?php 
  $servername = "localhost";
  $username = "root";
  $passwiord = "";
  $dbname = "mathitologio_db";


  $connect = mysqli_connect($servername,  $username, $passwiord,$dbname);
  mysqli_query($connect,"SET NAMES 'UTF8'");

  $sql = "SELECT * FROM grade";
    ?>
    <table align="center">
        <ta>
            <th>Κωδικος Μαθητη </th>
            <th>Κωδικος Μαθηματος</th>
            <th>Μαθημα</th>
            <th>Επωνυμο</th>
            <th>Ονομα</th>
            <th>Ταξη</th>
            <th>Βαθμος</th>
            <th>Επιλογες</th>
            <?php 

            $grades = mysqli_query($connect, $sql);
            if(mysqli_num_rows($grades) == 0){
                echo ("</table>");
                echo ("<p>Λαθος στην ανακτηση των βαθμων απο την βαση<br>" . "Error" . mysqli_error($connect) . "<br><br>");
                echo ("<a href='index.html'>Επιστροφη</a>");
                exit();
            }

            $i = 0;

            while($grd = mysqli_fetch_assoc($grades)){
                if(fmod($i,2)==0){
                    echo '<tr style="background-color:#D7D7D7;">';
                }else{
                    echo '<tr style="background-color:#C0C0C0;">';
                }

                echo ("<tr>");
              

                
                $student_id=$grd["student_id"];
                $subject_id=$grd["subject_id"];
                $subject=$grd["subject"];
                $surname=$grd["surname"];
                $name=$grd["name"];
                $class=$grd["class"];
                $grade=$grd["grade"];
                
                echo("<td>$student_id</td>");
                echo("<td>$subject_id</td>");
                echo("<td>$subject</td>");
                echo("<td>$surname</td>");
                echo("<td>$name</td>");
                echo("<td>$class</td>");
                echo("<td>$grade</td>");
                echo("<td>[<a href='editgrade.php?student_id=$student_id'>" . "Επεξεργασια</a> <a href='deletegrade.php?student_id=$student_id'>" . "Διαγραφη</a>]");
                
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