<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" href="loginstyle.css">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <!--body-->    
    <body>
        
        <?php
        if (isset($_POST['submitted'])) {
        
	$errors = array(); //display error messages if any
        
            // check student id:
            if (empty($_POST['studentid'])) {
                    $errors[] = 'Student ID is required.';
            } else {
                    $i = trim($_POST['studentid']);
            }
            
            // check name:
            if (empty($_POST['name'])) {
                    $errors[] = 'Name is required.';
            } else {
                    $n = trim($_POST['name']);
            }
            
            // check email:
            if (empty($_POST['email'])) {
                    $errors[] = 'Email is required.';
            } else {
                    $e = trim($_POST['email']);
            }
            
            // check gender:
            if (empty($_POST['gender'])) {
                    $errors[] = 'Gender is required.';
            } else {
                    $g = trim($_POST['gender']);
            }
            
            // check faculty:
            if (empty($_POST['faculty'])) {
                    $errors[] = 'Faculty is required.';
            } else {
                    $f = trim($_POST['faculty']);
            }
        
        
            // Check for a password and match against the confirmed password:
            if (!empty($_POST['password'])) {
                    if ($_POST['password'] != $_POST['comfirm_password']) {
                            $errors[] = 'Your password did not match the confirmed password.';
                    }elseif (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 20) {
                $errors[] = 'Your password must be between 8 and 20 characters.';
                    }else {
                            $p = trim($_POST['password']);
                    }
            } else {
                    $errors[] = 'You forgot to enter your password.';
            }
            
            if (empty($errors)) { 
		
		require_once ('mySQL_connect.php'); 
		
		$q = "INSERT INTO members (studentid, name, email, gender, faculty, password, admin) VALUES ('$i', '$n', '$e', '$g', '$f', '$p', 'NO')";		
		$r = @mysqli_query ($dbc, $q); // Run the query.

                if ($r) { 
                        $r_message = "Thank you, your account has been created.";
                        echo "<script>alert('$r_message');</script>";
		} else { 
			$r_message_1 = "System Error! You could not be registered due to a system error. We apologize for any inconvenience.";
                        echo "<script>alert('$r_message_1');</script>";
			
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} // End of if ($r) IF.
		
            } else { // Report the errors.

                echo '<h1>Failed to register!</h1>
                <p style="color:white;">The following error(s) occurred:<br/>
                <ul>';
                foreach ($errors as $msg) { // Print each error.
                        echo " <li style='color:white;font-weight:bold;'> $msg</li><br/>\n";
                }
                echo '</ul>';
                echo '</p><p style="color:white;font-weight:bold;">Please try again.</p><p><br /></p>';
                
                } // End of if (empty($errors)) IF.

        }
        ?>

        <!--video background-->
        <video autoplay muted loop id="video2">
            <source src="media/basketball.mp4" type="video/mp4">
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
            <form method="post" action="signup.php">
                
                <h2 style="text-align:center;">Registration</h2>
                <input class="inputicon" type="text" placeholder="Student ID" name="studentid" >
                
                <br><br>
                <input type="text" placeholder="Name" name="name" id="name" >

                <br><br>
                <input type="email" placeholder="College Email" name="email" id="email" >

                <br><br>
                <input type="radio" name="gender" value="MALE">
                <label for="male">Male</label>
                <input type="radio" name="gender" value="FEMALE">
                <label for="female">Female</label>

                <br><br>
                <select name="faculty">
                    <option value="none">Select your faculty</option>
                    <option value="FAS">FAS</option>
                    <option value="FCCI">FCCI</option>
                    <option value="FAFB">FAFB</option>
                    <option value="FBE">FBE</option>
                    <option value="FEOT">FEOT</option>
                    <option value="FOCS">FOCS</option>
                    <option value="FSSH">FSSH</option>
                  </select>

                <br><br>
                <input type="password" placeholder="Password" name="password" id="password" >
    
                <br><br>
                <input type="password" placeholder="Comfirm Password" name="comfirm_password" id="password" >

                <br><br>
    
                <input type="submit" value="Sign Up" name="submitted" id="submitted">
    
                <br><br>
                <a href="login.php"><b>Already have an account</b></a>
            </form>
        </div>
    </body>
    
    <footer>
        <div id="copyright">
            <p><i>2023 &#169; <b>All Right Reserved</b> by TAR UMT Games Society</i></p>
        </div>
    </footer>
</html>
