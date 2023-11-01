<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log In</title>
        <link rel="stylesheet" href="loginstyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <!--body-->
    <body>

        <!--video background-->
        <video autoplay muted loop id="video">
            <source src="media/chess-board.mp4" type="video/mp4">
        </video>

        <!--Logo-->
        <div id="logosignin">
            <img src="media/logo.png" width="200px;" margin-top="20px;">
        </div>
        
        <!--back section-->
        <div id="home">
            <a href="index.php"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;Home</a>
        </div>

        <!--login form-->
        <div class="containercenter">
            <?php
                session_start();

                if(isset($_POST['submit'])) {
                    include('mySQL_connect.php');

                    $studentid = mysqli_real_escape_string($dbc, $_POST['studentid']);
                    $password = mysqli_real_escape_string($dbc, $_POST['password']);

                    $query = "SELECT * FROM members WHERE studentid='$studentid' AND password='$password'";
                    $result = mysqli_query($dbc, $query);

                    if(mysqli_num_rows($result) == 1) {
                        // Save user info in session variables
                        $row = mysqli_fetch_array($result);
                        $_SESSION['studentid'] = $row['studentid'];
                        $_SESSION['loggedin'] = true;
                        if ($row['admin'] == 'YES') {
                            header('Location: admin_index.php');
                        } else {
                            header('Location: participant.php');
                        }
                    } else {
                        // Display error message for incorrect login
                        echo "<b style='color:white; text-align:center;'>Incorrect username or password.</b>";
                    }
                }
            ?>

           
            <form method="post" action="login.php">
                <h2>Member Log-in</h2>
                <p>Browse more event or activities</p>
                <br><br>
                <!--student ID-->
                <input class="inputicon" type="text" placeholder="Student ID" name="studentid" required>

                <br><br><br>
                <input type="password" placeholder="Password" name="password" id="password" required>
    
                <br>
                <br>
                <div id="buttonsubmit">
                    <input type="submit" name="submit" value="Log In">
                </div>

                <br><br>
                <!--signup-->
                <div class="containercenter">
                    <div id="signupdesc">
                        <p>Don't have account?&nbsp;<a href="signup.php"><b>Join now</b></a></p>
                    </div>
                </div>
            </form>
        </div>      
    </body>

    <footer>
        <div id="copyright">
            <p><i>2023 &#169; <b>All Right Reserved</b> by TAR UMT Games Society</i></p>
        </div>
    </footer>
</html>
