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
            // Set the database access information as constants:
            DEFINE ('DB_USER', 'root');
            DEFINE ('DB_PASSWORD', '');
            DEFINE ('DB_HOST', 'localhost');
            DEFINE ('DB_NAME', 'society');

            // Make the connection:

            
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            // Check the connection:
            if (mysqli_connect_errno()) {
                die("Failed to connect to MySQL: " . mysqli_connect_error());
            }


            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $errors = array(); // Display error messages if any

                // name validation
                if (empty($_POST['studentid'])) {
                        $errors[] = 'Student ID is required.';
                } else {
                        $i = trim($_POST['studentid']);
                }

                // studentID validation:
                if (empty($_POST['name'])) {
                        $errors[] = 'Name is required.';
                } else {
                        $n = trim($_POST['name']);
                }

                // email validation
                if (empty($_POST['email'])) {
                        $errors[] = 'Email is required';
                } else {
                        $e = trim($_POST['email']);
                }

                // gender validation
                if (empty($_POST['gender'])) {
                        $errors[] = 'Gender is required';
                } else {
                        $g = trim($_POST['gender']);
                }

                // faculty validation
                if (empty($_POST['faculty'])) {
                        $errors[] = 'Faculty is required';
                } else {
                        $f = trim($_POST['faculty']);
                }

                // check both password same or not
                if (!empty($_POST['password'])) {
                        if ($_POST['password'] != $_POST['comfirm_password']) {
                                $errors[] = 'Password are not matched.';
                        } else {
                                $p = trim($_POST['password']);
                        }
                } else {
                        $errors[] = 'Password is required';
                }
        
	
            if (empty($errors)) { // If everything's OK.

		$q = "INSERT INTO members_list (Student ID, Name, Email, Gender, Faculty, Password, DateOfJoin) VALUES ('$i', '$n', '$e', '$g', '$f', SHA1('$p'), NOW() )";		
		$r = @mysqli_query ($dbc, $q); // Run the query.

                if ($r) { // If complted

			echo '<h1>Thank you!</h1><p>You are now registered. <br /></p>';
		
		} else { // If failed
			
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
			
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';			
		} 
		
		
	} else { // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.

        } 
        ?>
        <form method="post" action="test.php">
                
                <h2 style="text-align:center;">Registration</h2>
                <p>Be part of us!</p>
                <!--student ID-->
                <input class="inputicon" type="text" placeholder="Student ID" name="studentid" required>
                
                <br><br>
                <input type="text" placeholder="Name" name="name" id="name" required>

                <br><br>
                <input type="email" placeholder="College Email" name="email" id="email" required>

                <br><br>
                <input type="radio" name="gender" value="MALE">
                <label for="male">Male</label>
                <input type="radio" name="gender" value="FEMALE">
                <label for="female">Female</label>

                <br><br>
                <select name="faculty" >
                    <option value="0">Select your faculty</option>
                    <option value="1">FBE</option>
                    <option value="2">FSSH</option>
                    <option value="3">FEOT</option>
                    <option value="4">FOCS</option>
                    <option value="5">FAFB</option>
                    <option value="6">FAS</option>
                    <option value="7">FCCI</option>
                  </select>

                <br><br>
                <input type="password" placeholder="Password" name="password" id="password" required>
    
                <br><br>
                <input type="password" placeholder="Comfirm Password" name="comfirm_password" id="password" required>

                <br><br>
    
                <input type="submit" value="Sign Up">
    
                <br><br>
                <a href="login.php">Already have an account</a>
            </form>
    </body>
</html>
