<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Memberslist</title>
        <link rel="stylesheet" href="accstyle.css">
        <link rel="stylesheet" href="admin_membersliststyle.css">
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
            <div class="main">
                <div class="memberslist" id="members">
                    <div class="tablemove">
                        <h2>Members of Games Society</h2>
                        <?php
                            $db = new mysqli('localhost', 'root', '', 'AMIT2043');
                            $query = "SELECT * FROM members";
                            $result = $db->query($query);
                            $total_members = $result->num_rows;
                            

                            $members = array(); // initialize the $members array

                            while($row = $result->fetch_assoc()) {
                              $members[] = $row; // add each row to the $members array
                            }
                            
                            if(isset($_POST['delete'])){
                                $delete_id = $_POST['delete_id'];
                                $delete_query = "DELETE FROM members WHERE studentid='$delete_id'";
                                if($db->query($delete_query)){
                                  $m_message = "The record deleted successfully!";
                                  echo "<script>alert('$m_message');window.location.href = 'admin_memberslist.php';s</script>";
                                } else {
                                  echo "<p>Error deleting record: " . $db->error . "</p>";
                                }
                            }
                            
                            if(isset($_POST['deleteall'])){
                                $deleteall_query = "DELETE FROM members";
                                if($db->query($deleteall_query)){
                                    $w_message = "All records deleted successfully!";
                                    echo "<script>alert('$w_message');window.location.href = 'admin_memberslist.php';s</script>";
                                } else {
                                    echo "<p>Error deleting record: " . $db->error . "</p>";
                                }
                            }
                            
                            
                            if (isset($_POST['save'])) {
                                $studentid = $_POST['studentid'];
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $gender = $_POST['gender'];
                                $faculty = $_POST['faculty'];
                                $admin = $_POST['admin'];

                                $query = "UPDATE members SET name='$name', email='$email', gender='$gender', faculty='$faculty', admin='$admin' WHERE studentid='$studentid'";
                                if ($db->query($query)) {
                                    $q_message = "Record updated successfully!";
                                    echo "<script>alert('$q_message');window.location.href = 'admin_memberslist.php';s</script>";
                                    }else{
                                    echo "<p>Error updating record: " . $db->error . "</p>";
                                }
                            }
                        ?>
                        <table>
                            <h3 style="text-align:center"><i class="fa fa-users fa-1x" aria-hidden="true"></i> Total members: <?php echo $total_members; ?></h3>

                            <tr style="background-color:grey;">
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Faculty</th>
                                <th>Password</th>
                                <th>Admin</th>
                                <th colspan="2">Action</th>
                            </tr>
                            
                            <?php foreach($members as $row) { ?>
                            <tr>
                                <td><?php echo $row['studentid']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['faculty']; ?></td>
                                <td><?php echo $row['password']; ?></td>
                                <td><?php echo $row['admin']; ?></td>
                                <td>
                                    <form action="admin_memberslist.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['studentid']; ?>">
                                        <div class="delete"><input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this record?');"></div>
                                    </form>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                        <br>
                        <form method="post" action="admin_memberslist.php" class="deleteall">
                            <input type="submit" name="deleteall" value="Delete All" onclick="return confirm('Are you sure you want to delete all records?');">
                            <input type="button" name="edit" value="Edit" onclick="window.location.href='admin_memberslist.php#edit';">
                        </form>
                        <br><br><br><br><br><br><br><br><br><br><br>
                        <br><br><br><br><br><br><br><br><br><br><br>
                        <br><br><br><br><br><br><br><br><br><br><br>
                        <!--Edit section-->
                        <div id="edit">
                            <h2>Edit Member Details</h2>
                            <table>
                                <tr style="background-color:grey;">
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Faculty</th>
                                    <th>Admin</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            <?php foreach($members as $row) { ?>

                            <form action="admin_memberslist.php" method="post">
                                <tr>
                                    <input type="hidden" name="studentid" value="<?php echo $row['studentid']; ?>">
                                    <td><?php echo $row['studentid']; ?></td>
                                    <td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
                                    <td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
                                    <td>
                                        <select name="gender">
                                            <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                            <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="faculty">
                                            <option value="FAS" <?php if ($row['faculty'] == 'FAS') echo 'selected'; ?>>FAS</option>
                                            <option value="FCCI" <?php if ($row['faculty'] == 'FCCI') echo 'selected'; ?>>FCCI</option>
                                            <option value="FAFB" <?php if ($row['faculty'] == 'FAFB') echo 'selected'; ?>>FAFB</option>
                                            <option value="FBE" <?php if ($row['faculty'] == 'FBE') echo 'selected'; ?>>FBE</option>
                                            <option value="FEOT" <?php if ($row['faculty'] == 'FEOT') echo 'selected'; ?>>FEOT</option>
                                            <option value="FOCS" <?php if ($row['faculty'] == 'FOCS') echo 'selected'; ?>>FOCS</option>
                                            <option value="FSSH" <?php if ($row['faculty'] == 'FSSH') echo 'selected'; ?>>FSSH</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="admin">
                                            <option value="YES" <?php if ($row['admin'] == 'YES') echo 'selected'; ?>>YES</option>
                                            <option value="NO" <?php if ($row['admin'] == 'NO') echo 'selected'; ?>>NO</option>
                                        </select>
                                    </td>
                                    <td class="save"><input type="submit" name="save" value="Save" onclick="return confirm('Are you sure you want to save the changes?');"></td>
                                </tr>
                            </form>
                            <?php } ?>
                            </table>
                        </div>      
                    </div>
                </div>
            </div>
        </div>
    
       

    </body>

    <!--footer-->
    <footer>
        <p>TAR UMT Games Society &#169; All Right Reserved 2023</p>
    </footer>   

</html>