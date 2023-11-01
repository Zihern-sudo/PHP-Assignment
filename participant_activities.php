<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Participant Activities</title>
        <link rel="stylesheet" href="accstyle.css">
        <link rel="stylesheet" href="participant_activitiesstyle.css">
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
                        <li class="normal"><a href="participant.php">Home</a></li>
                        <li class="normal"><a href="participant_activities.php">Activities</a></li>
                        <li class="normal"><a href="participant_search.php">Search</a></li>
                        <li class="normal"><a href="participant.php#booking">Booking</a></li>
                        <li class="normal"><a href="participant.php#history">History</a></li>
                </ul>
            </nav>
        </div>

        <div class="maincontent">  
            <!--myaccount_section-->

            <div class="myaccount">
                <div class="dropdown">
                    <button class="dropbtn"><i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>&nbsp; MyAccount</button>
                    <div class="dropdown-content">
                        <a href="admin_changepassword.php">Change Password</a>
                        <a href="#">Logout</a>
                    </div>
                </div>
            </div>

            

            <!--activities filter button-->

            <div class="main">
                <div id="all">
                    <h2>All activities</h2>
                    <div class="activities">
                         <?php
                            $db = new mysqli('localhost', 'root', '', 'AMIT2043');
                            $query = "SELECT * FROM activities";
                            $result = $db->query($query);
                            $total_activities = $result->num_rows;

                            $activities = array(); // initialize the $activities array

                            while($row = $result->fetch_assoc()) {
                                          $activities[] = $row; // add each row to the $activities array
                                        }

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
                                $update_id = $_POST['update_id'];

                                $update_query = "UPDATE activities SET act_title='$act_title', act_type='$act_type', act_pax='$act_pax', act_location='$act_location', act_date='$act_date', act_time='$act_time', act_remarks='$act_remarks' WHERE act_id='$update_id'";

                                if ($db->query($update_query)) {
                                    $z_message = "Updated Successful!";
                                    echo "<script>alert('$z_message');window.location.href = 'admin_activitieslist.php';s</script>";
                                } else {
                                    echo "<p>Error updating record: " . $db->error . "</p>";
                                }
                            }

                        ?>
            
                    <?php foreach($activities as $row) { ?>
                    <div class="activity">
                        <form action="participant_activities.php" method="post">
                            <?php 
                                if(isset($_POST['join']))
                                require_once ('mySQL_connect.php');
                                $in = "SELECT * FROM activities";
                                $result = $db->query($query);
                            ?>
                        <table>
                            <tr>
                              <td>Title :</td>
                              <td><?php echo $row['act_title']; ?></td>
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
                                <td><?php echo $row['act_type']; ?></td>
                            </tr>
                            <tr>
                              <td>Pax:</td>
                              <td><?php echo $row['act_pax']; ?></td>
                            </tr>
                            <tr>
                              <td>Location:</td>
                              <td><?php echo $row['act_location']; ?></td>
                            </tr>
                            <tr>
                              <td>Date:</td>
                              <td><?php echo $row['act_date']; ?></td>
                            </tr>
                            <tr>
                                <td>Time:</td>
                                <td><?php echo $row['act_time']; ?></td>
                            </tr>
                            <tr>
                              <td>Remarks:</td>
                              <td><b><?php echo $row['act_remarks']; ?></b></td>
                            </tr>
                            <tr>
                              <td>Activity code:</td>
                              <td><?php echo $row['act_id']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="btn">
                                    <input type="submit" name="join" value="Join" onclick="return confirm('Are you sure you want to join this activity?');">
                                </td>
                            </tr>
                        </table>
                        </form>
                    </div>
                    <?php }?> 
                    </div>    
                </div>

                <div id="coming">
                    <h2>Upcoming</h2>
                    <div class="activity">
                        <table>
                            <tr>
                                <td rowspan="8"><img src="/image/pubg1.jpeg" width="200px;"></td>
                                <td colspan="3"><h3>PUBG Mobile</h3></td>
                            </tr>
                            <tr>
                                <td colspan="3"><b><i>Training from noob to pro</i></b></td>
                            </tr>
                            <tr>
                                <td>Category:</td>
                                <td colspan="2">Games</td>
                            </tr>
                            <tr>
                                <td>Pax:</td>
                                <td colspan="2">24 (6 Groups)</td>
                            </tr>
                            <tr>
                                <td>Location:</td>
                                <td colspan="2">Block H102</td>
                            </tr>
                            <tr>
                                <td>When:</td>
                                <td colspan="2">14th April 2023 (Fri)<br>6:00 PM - 9:00 PM</td>
                            </tr>
                            <tr>
                                <td>Remarks:</td>
                                <td colspan="2"><b>Bring you own device</b></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="ticket" style="text-align:center;"><button><a href="participant.php#taicketsample">View Ticket</a></button></td> <!--testing section-->
                            </tr>
                        </table>
                    </div>

                    <div class="activity">
                        <table>
                            <tr>
                                <td rowspan="10"><img src="/image/valleyball.jpg" width="200px;"></td>
                                <td colspan="3"><h3>Valley Ball Intro</h3></td>
                            </tr>
                            <tr>
                                <td>Category:</td>
                                <td colspan="2">Talks</td>
                            </tr>
                            <tr>
                                <td>Pax:</td>
                                <td colspan="2"><b>13 left</b></td>
                            </tr>
                            <tr>
                                <td>Location:</td>
                                <td colspan="2">Block DK1</td>
                            </tr>
                            <tr>
                                <td>When:</td>
                                <td colspan="2">11th April 2023 (Tues)<br>5:00 PM - 7:00 PM</td>
                            </tr>
                            <tr>
                                <td>Remarks:</td>
                                <td colspan="2"><b>A talk about valleyball</b></td>
                            </tr>
                            <tr>
                                <td>Fee:</td>
                                <td colspan="2"><b>Free</b></td>
                            </tr>
                            <tr>
                                <td>Seat:</td>
                                <td colspan="2"><b>Random</b></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="join" style="text-align:center;"><button><a href="participant.php#taicketsample">Join</a></button></td> <!--testing section-->
                            </tr>
                        </table>
                    </div>
                </div>


                <br><br><br><br><br><br><br><br><br><br>

                <div id="due">
                    <h2>--Due--</h2>
                    <div class="activity">
                        <table>
                            <tr>
                                <td rowspan="7"><img src="/image/chess.jpg" width="200px;"></td>
                                <td colspan="3"><h3>Chess Training Week 6</h3></td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td colspan="2"><b>Succeed</b></td> <!--/UpComing/Terminated/Postponed-->
                            </tr>
                            <tr>
                                <td>Category:</td>
                                <td colspan="2">Games</td>
                            </tr>
                            <tr>
                                <td>Pax:</td>
                                <td colspan="2">24 Participants</td>
                            </tr>
                            <tr>
                                <td>Location:</td>
                                <td colspan="2">Block H102</td>
                            </tr>
                            <tr>
                                <td>When:</td>
                                <td colspan="2">22nd March 2023 (Wed)<br>8:00 PM - 9:00 PM</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="details" style="text-align:center"><button>View Details</button></td> <!--testing section-->
                            </tr>
                        </table>
                    </div>

                    <!--participated-->
                    <div class="activity">
                        <table>
                            <tr>
                                <td rowspan="8"><img src="/image/pubg1.jpeg" width="200px;"></td>
                                <td colspan="3"><h3>PUBG Mobile</h3></td>
                            </tr>
                            <tr>
                                <td colspan="3"><b><i>Training from noob to pro</i></b></td>
                            </tr>
                            <tr>
                                <td>Category:</td>
                                <td colspan="2">Games</td>
                            </tr>
                            <tr>
                                <td>Pax:</td>
                                <td colspan="2">24 (6 Groups)</td>
                            </tr>
                            <tr>
                                <td>Location:</td>
                                <td colspan="2">Block H102</td>
                            </tr>
                            <tr>
                                <td>When:</td>
                                <td colspan="2">14th April 2023 (Fri)<br>6:00 PM - 9:00 PM</td>
                            </tr>
                            <tr>
                                <td>Remarks:</td>
                                <td colspan="2"><b>Bring you own device</b></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="ticket" style="text-align:center;"><button><a href="participant.php#taicketsample">View Ticket</a></button></td> <!--testing section-->
                            </tr>
                        </table>
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