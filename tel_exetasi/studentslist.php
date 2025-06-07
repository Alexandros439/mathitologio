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
    <p>Διαχειρηση Μαθητων</p>
    <?php 
  $servername = "localhost";
  $username = "root";
  $passwiord = "";
  $dbname = "mathitologio_db";


  $connect = mysqli_connect($servername,  $username, $passwiord,$dbname);
  mysqli_query($connect,"SET NAMES 'UTF8'");

  $sql = "SELECT * FROM students";
    ?>
    <table align="center">
        <ta>
            <th>Κωδικος</th>
            <th>Επωνυμο</th>
            <th>Ονομα</th>
            <th>Ταξη</th>
            <th>Τμημα</th>
            <th>Επιλογες</th>
            <?php 

            $student = mysqli_query($connect, $sql);
            if(mysqli_num_rows($student) == 0){
                echo ("</table>");
                echo ("<p>Λαθος στην ανακτηση των μαθητων απο την βαση<br>" . "Error" . mysqli_error($connect) . "<br><br>");
                echo ("<a href='index.html'>Επιστροφη</a>");
                exit();
            }

            $i = 0;

            while($students = mysqli_fetch_assoc($student)){
                if(fmod($i,2)==0){
                    echo '<tr style="background-color:#D7D7D7;">';
                }else{
                    echo '<tr style="background-color:#C0C0C0;">';
                }

                echo ("<tr>");
                $student_id=$students["student_id"];
                $eponymo=$students["eponymo"];
                $onoma=$students["onoma"];
                $taxi=$students["taxi"];
                $tmima=$students["tmima"];
                echo("<td>$student_id</td>");
                echo("<td>$eponymo</td>");
                echo("<td>$onoma</td>");
                echo("<td>$taxi</td>");
                echo("<td>$tmima</td>");
                echo("<td>[<a href='editstudent.php?student_id=$student_id'>" . "Επεξεργασια</a> <a href='deletestudent.php?student_id=$student_id'>" . "Διαγραφη</a>]");
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