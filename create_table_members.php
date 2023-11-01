<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AMIT2043";

            // Create connection
            $dbc = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$dbc) {
              die("Connection failed: " . mysqli_connect_error());
            }

            // sql to create table
            $sql = "CREATE TABLE Members (
            studentid VARCHAR (7) NOT NULL,
            name VARCHAR(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            gender VARCHAR(6) CHECK (gender IN ('Female', 'Male')),
            faculty VARCHAR(4) CHECK (faculty IN ('FAS', 'FCCI', 'FAFB', 'FBE', 'FEOT', 'FOCS', 'FSSH')),
            password VARCHAR(50) NOT NULL,
            admin VARCHAR(3) CHECK (admin IN ('YES', 'NO'))
            )";

            if (mysqli_query($dbc, $sql)) {
              echo "Table Members created successfully";
            } else {
              echo "Error creating table: " . mysqli_error($dbc);
            }

            mysqli_close($dbc);
        ?>
    </body>
</html>
