<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Activities Lists</title>
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

           

            <?php
                $db = new mysqli('localhost', 'root', '', 'AMIT2043');
                $query = "SELECT * FROM activities";
                $result = $db->query($query);
                $total_activities = $result->num_rows;

                $activities = array(); // initialize the $activities array

                while($row = $result->fetch_assoc()) {
                              $activities[] = $row; // add each row to the $activities array
                            }
                            
                            
                            
                 ////
                 $query1 = "SELECT * FROM activities WHERE act_type='Games/Entertainment'";
                $result1 = $db->query($query1);
                $total_activities1 = $result1->num_rows;

                $activities1 = array(); // initialize the $activities array

                while($row1 = $result->fetch_assoc()) {
                              $activities[] = $row1; // add each row to the $activities array
                            }        
                ////

                if(isset($_POST['delete'])){
                $delete_id = $_POST['delete_id'];
                $delete_query = "DELETE FROM activities WHERE act_id='$delete_id'";
                if($db->query($delete_query)){
                    
                $r_message = "Record deleted successfully!";
                echo "<script>alert('$r_message');window.location.href = 'admin_activitieslist.php';</script>";
                } else {
                echo "<p>Error deleting record: " . $db->error . "</p>";
                }
                }
                
                
                 if(isset($_POST['deleteall'])){
                $deleteall_query = "DELETE FROM activities";
                if($db->query($deleteall_query)){
                $w_message = "All records deleted successfully!";
                echo "<script>alert('$w_message');window.location.href = 'admin_activitieslist.php';s</script>";
                } else {
                echo "<p>Error deleting record: " . $db->error . "</p>";
                }
                }
                            
                            
                if (isset($_POST['update'])) {
                    $act_title = $_POST['act_title'];
                    $act_type = $_POST['act_type'];
                    $act_pax = $_POST['act_pax'];
                    $act_location = $_POST['act_location'];
                    $act_date = $_POST['act_date'];
                    $act_time = $_POST['act_time'];
                    $act_remarks = $_POST['act_remarks'];
                    $act_price = $_POST['act_price'];
                    $update_id = $_POST['update_id'];

                    $update_query = "UPDATE activities SET act_title='$act_title', act_type='$act_type', act_pax='$act_pax', act_location='$act_location', act_date='$act_date', act_time='$act_time', act_remarks='$act_remarks', act_price='$act_price' WHERE act_id='$update_id'";

                    if ($db->query($update_query)) {
                        $z_message = "Updated Successful!";
                        echo "<script>alert('$z_message');window.location.href = 'admin_activitieslist.php';s</script>";
                    } else {
                        echo "<p>Error updating record: " . $db->error . "</p>";
                    }
                }

            ?>
            
            <div class="main">
                <div id="all">
                    <h3 style="text-align:center"><i class="fa fa-calendar-o fa-1x" aria-hidden="true"></i> Total activities: <?php echo $total_activities; ?></h3>
                    <h2>All activities</h2>
                        <form method="post" action="admin_activitieslist.php" class="deleteall">
                            <input type="submit" name="deleteall" value="Delete All" onclick="return confirm('Are you sure you want to delete all records?');">
                        </form>
                    <?php foreach($activities as $row) { ?>
                    <div class="activity">
                        <form action="admin_activitieslist.php" method="post">
                        <table style="margin:auto;">
                            <tr>
                              <td>Title :</td>
                              <td colspan="2"><input type="text" name="act_title" value="<?php echo $row['act_title']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td>
                                    <?php 
                                    $currentDate = date('Y-m-d');
                                    $recordedDate = $row['act_date']; 
                                    if ($currentDate >= $recordedDate) {
                                        echo '<b style="color:red;">Expired</b>';
                                    } else {
                                        echo '<b>Coming Soon</b>';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Category:</td>
                                <td>
                                    <select name="act_type">
                                        <option value="Games/Entertainment" <?php if ($row['act_type'] == 'Games/Entertainment') echo 'selected'; ?>>Games/Entertainment</option>
                                        <option value="Competition" <?php if ($row['act_type'] == 'Competition') echo 'selected'; ?>>Competition</option>
                                        <option value="Talk" <?php if ($row['act_type'] == 'Talk') echo 'selected'; ?>>Talk</option>
                                        <option value="Discussion" <?php if ($row['act_type'] == 'Discussion') echo 'selected'; ?>>Discussion</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                              <td>Pax:</td>
                              <td><input type="number" min="0" name="act_pax" value="<?php echo $row['act_pax']; ?>"></td>
                            </tr>
                            <tr>
                              <td>Location:</td>
                              <td><input type="text" name="act_location" value="<?php echo $row['act_location']; ?>"></td>
                            </tr>
                            <tr>
                              <td>Date:</td>
                              <td><input type="date" name="act_date" value="<?php echo $row['act_date']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Time:</td>
                                <td><input type="time" name="act_time" value="<?php echo $row['act_time']; ?>">
                                </td>
                            </tr>
                            <tr>
                              <td>Remarks:</td>
                              <td><input type="text" name="act_remarks" value="<?php echo $row['act_remarks']; ?>"></td>
                            </tr>
                            <tr>
                              <td>Price (RM) :</td>
                              <td><input type="text" name="act_price" value="<?php echo $row['act_price']; ?>"></td>
                            </tr>
                            <tr>
                              <td>Activity code:</td>
                              <td><?php echo $row['act_id']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="btn">
                                    <input type="hidden" name="update_id" value="<?php echo $row['act_id']; ?>">
                                    <input type="submit" name="update" id="updatebtn" value="Update" onclick="return confirm('Are you sure you want to update this details?');">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['act_id']; ?>">
                                    <input type="submit" name="delete" id="deletebtn" value="Delete" onclick="return confirm('Are you sure you want to delete this activity?');">
                                    <input type="button" name="participants" id="viewbtn" value="View Details">
                                </td>
                            </tr>
                        </table>
                        </form>
                    </div>
                    <?php }?>      
            </div>
        </div>

    </body>

    <!--footer-->
    <footer>
        <p>TAR UMT Games Society &#169; All Right Reserved 2023</p>
    </footer>

</html>