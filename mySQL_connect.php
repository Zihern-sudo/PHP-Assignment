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
            DEFINE ('DB_USER', 'root');
            DEFINE ('DB_PASSWORD', '');
            DEFINE ('DB_HOST', 'localhost');
            DEFINE ('DB_NAME', 'AMIT2043');

            $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
        ?>
    </body>
</html>
