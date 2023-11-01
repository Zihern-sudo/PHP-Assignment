<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
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
            $sql = "CREATE TABLE Activities (
            act_title VARCHAR (30) NOT NULL,
            act_type VARCHAR(20) CHECK (act_type IN ('Games/Entertainment', 'Competition', 'Talk', 'Discussion')),
            act_pax INT NOT NULL,
            act_location VARCHAR(30) NOT NULL,
            act_date DATE NOT NULL,
            act_time TIME NOT NULL,
            act_remarks VARCHAR (50) DEFAULT NULL,
            act_price VARCHAR(10) NOT NULL,
            act_id INT(6) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY
            );";

            if (mysqli_query($dbc, $sql)) {
              echo "Table Activities created successfully";
            } else {
              echo "Error creating table: " . mysqli_error($dbc);
            }

            mysqli_close($dbc);
        ?>
    </body>
</html>
