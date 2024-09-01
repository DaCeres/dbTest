<?php 
require_once("./inc/dbconnect.php");


?>


<html>
    <head>
        <h1>Login</h1>
        <meta charset="utf-8" lang="de">
    </head>
    <body>
        <form action="" method="post">
            <label for="fname">First name:</label>
            <input type="text" id="fname" name="fname"><br><br>
            <label for="lname">Last name:</label>
            <input type="text" id="lname" name="lname"><br><br>
            <label for="lname">Password:</label>
            <input type="password" id="pwd" name="pwd"><br><br>
            <input type="submit" value="Submit">
        </form>
    </body>


    <?php 
    if (!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["pwd"])) {
        
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $pwd = $_POST["pwd"];
        echo($fname . ", " . $lname . ", " . $pwd);


        /*$sql=  "SELECT Vorname, Nachname, Password
                FROM tbl_user
                WHERE Vorname = '$fname'
                AND Nachname =  '$lname'
                AND Password = '$pwd'";*/

        $sql = "SELECT tbl_name.Name, tbl_name.Lastname, Password
                FROM tbl_user
                INNER JOIN tbl_name
                ON tbl_name.IDUser=tbl_user.IDUser
                INNER JOIN tbl_password
                ON tbl_name.ID=tbl_password.IDName
                WHERE tbl_name.Name = '$fname'
                AND tbl_name.Lastname =  '$lname'
                AND tbl_password.pwd = '$pwd'";


    $result = $conn -> query($sql);
        if ($result->num_rows > 0) {
            echo '<script>alert("Willkommen")</script>';
        }
        else {
            echo '<script>alert("Angaben falsch")</script>';
        }
    }

$conn->close();
    ?>
</html>
