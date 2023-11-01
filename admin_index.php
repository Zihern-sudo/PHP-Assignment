<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <link rel="stylesheet" href="accstyle.css">
        <link rel="stylesheet" href="adminstyle.css">
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico"> <!--change this to logo-->
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <!--body-->
    <body>
        <!--side navigation-->
        <div class="navigation_side">
            <nav>
                <ul>
                    <li id="logo"><img src="media/logo.png" width="200px;" margin-top="20px;"></li>
                    <li id="create_act"><a href="admin_index.php#create"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Create</a></li>
                    <li class="normal"><a href="admin_index.php">Home</a></li>
                    <li class="normal"><a href="admin_activitieslist.php">Activities</a></li>
                    <li class="normal"><a href="admin_search.php">Search</a></li>
                    <li class="normal"><a href="admin_memberslist.php">Members</a></li>
                </ul>
            </nav>
        </div>

        <div class="maincontent">  
            <!--myaccount_section-->

            <div class="myaccount">
                <div class="dropdown">
                    <button class="dropbtn"><i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>&nbsp; MyAccount</button>
                    <div class="dropdown-content">
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </div>

            <!--main details-->
            <?php
                            $db = new mysqli('localhost', 'root', '', 'AMIT2043');
                            $query = "SELECT * FROM members";
                            $query1 = "SELECT * FROM activities";
                            $result = $db->query($query);
                            $result1 = $db->query($query1);
                            $total_members = $result->num_rows;
                            $total_activities = $result1->num_rows;

                            $activites = array();
                            $members = array(); // initialize the $members array

                            while($row = $result->fetch_assoc()) {
                              $members[] = $row; // add each row to the $members array
                            }
                            
            ?>
            <div class="main_count">
                <div class="count_heading">
                    <h3>Activities</h3>
                    <i class="fa fa-calendar-o fa-2x" aria-hidden="true"></i><h1><?php echo $total_activities; ?></h1>
                </div>

                <div class="count_heading">
                    <h3>Members</h3>
                    <i class="fa fa-users fa-2x" aria-hidden="true"></i><h1><?php echo $total_members; ?></h1>
                </div>

            </div>

            <!--main event list-->
            <div class="main">

                <!--testing for create-->
                <div id="create">
                    <h2>Create</h2>
                    <div class="testing">
                    <?php
        
                        if (isset($_POST['submitted'])) {

                            $errors = array(); //display error messages if any          

                            if (empty($_POST['act_title'])) {
                                $errors[] = 'Title is required.';
                            } else {
                                $t = trim($_POST['act_title']);
                            }

                            if (empty($_POST['act_type'])) {
                                $errors[] = 'Category is required.';
                            } else {
                                $c = trim($_POST['act_type']);
                            }

                            if (empty($_POST['act_pax'])) {
                                $errors[] = 'Pax is required.';
                            } else {
                                $p = trim($_POST['act_pax']);
                            }

                            if (empty($_POST['act_location'])) {
                                $errors[] = 'Location is required.';
                            } else {
                                $l = trim($_POST['act_location']);
                            }

                            if (empty($_POST['act_date'])) {
                                $errors[] = 'Date is required.';
                            } else {
                                $d = trim($_POST['act_date']);
                            }

                            if (empty($_POST['act_time'])) {
                                $errors[] = 'Time is required.';
                            } else {
                                $m = trim($_POST['act_time']);
                            }

                            $n = trim($_POST['act_remarks']);

                            $z = trim($_POST['act_price']);

                            if (empty($errors)) { 

                                require_once ('mySQL_connect.php');

                                $q = "INSERT INTO Activities (act_title, act_type, act_pax, act_location, act_date, act_time, act_remarks, act_price) VALUES ('$t', '$c', '$p', '$l', '$d', '$m', '$n', '$z')";
                                $r = @mysqli_query ($dbc, $q); // Run the query.

                                $activity_name = $_POST["act_title"];
                                $activity_name = str_replace(' ', '_', $activity_name);

                                $sql = "CREATE TABLE $activity_name (
                                    studentid VARCHAR(7) NOT NULL PRIMARY KEY,
                                    dateofjoin DATE,
                                    payment VARCHAR(20) CHECK (payment IN ('Paid', 'Pending', 'Cancel'))
                                )";

                                $ct = @mysqli_query ($dbc,$sql);

                                
                                if ($r) { 
                                    $r_message = "Activity created.";
                                    echo "<script>alert('$r_message');window.location.href = 'admin_index.php';</script>";

                                } else { 

                                    echo '<h1>System Error</h1>

                                        <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 

                                        // Debugging message:
                                        echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

                                } // End of if ($r) IF.

                            } else { // Report the errors.

                                echo '<h1>Error!</h1>
                                <p class="error">The following error(s) occurred:<br/>
                                <ul>';
                                foreach ($errors as $msg) { // Print each error.
                                        echo " <li> $msg</li><br/>\n";
                                }
                                echo '</ul>';
                                echo '</p><p>Please try again.</p><p><br /></p>';

                                } // End of if (empty($errors)) IF.

                    } // End of the main (Submit).

                    ?>
                    <form method="post" action="admin_index.php">
                                <table style="margin:auto;">
                                    <tr>
                                        <td>TITLE :</td>
                                        <td colspan="2"><input type="text" name="act_title" placeholder="Title"></td>
                                    </tr>
                                    <tr>
                                        <td>Category:</td>
                                        <td>
                                            <select name="act_type">
                                                <option value="0">Select category:</option>
                                                <option value="Games/Entertainment">Games/Entertainment</option>
                                                <option value="Competition">Competition</option>
                                                <option value="Talk">Talk</option>
                                                <option value="Discussion">Discussion</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pax:</td>
                                        <td><input type="number" min="0" name="act_pax" placeholder="Number (Eg.25)"></td>
                                    </tr>
                                    <tr>
                                        <td>Location:</td>
                                        <td><input type="text" name="act_location" placeholder="Block K203"></td>
                                    </tr>
                                    <tr>
                                        <td>Date:</td>
                                        <td><input type="date" name="act_date" placeholder="Title"></td>
                                    </tr>
                                    <tr>
                                        <td>Time:</td>
                                        <td><input type="time" name="act_time" placeholder="Title"></td>
                                    </tr>
                                    <tr>
                                        <td>Remarks:</td>
                                        <td><input type="text" name="act_remarks" placeholder="Remarks"></td>
                                    </tr>
                                    <tr>
                                        <td>Price (RM) :</td>
                                        <td><input type="text" name="act_price" placeholder="RM99.99"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" name="submitted" value="Create" class="create" onclick="return confirm('Are you sure you want to create this activity?');">
                                            <input type="reset" name="act_reset" value="Reset"  class="reset">
                                        </td>
                                    </tr>
                                </table>
                        </form>
                    </div>
                </div>
            </div>
                
 




        </div>
    
       

    </body>

    <!--footer-->
    <footer>
        <p>TAR UMT Games Society &#169; All Right Reserved 2023</p>
    </footer>

    <!--javascript-->
    <script>
        /*delete popup alert*/
        function myDel() {
            var proceed = confirm("Are you sure you want to Delete?");
            if (proceed) {
                delAction();
            }
            }

            function delAction() {
            alert("Activity Deleted!");
            }              

        /*save popup alert*/
        function mySave() {
            var proceed = confirm("Are you sure you want to Save Changes?");
            if (proceed) {
                saveAction();
            }
            }

            function saveAction() {
            alert("Updated!");
            }

    </script>
</html>
