<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Participant</title>
        <link rel="stylesheet" href="accstyle.css">
        <link rel="stylesheet" href="participantstyle.css">
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico"> <!--change this to logo-->
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <!--body-->
    <body>
       
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
                <div class="myaccount">
                    <div class="dropdown">
                        <button class="dropbtn"><i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>&nbsp; MyAccount</button>
                        <div class="dropdown-content">
                            <a href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        
        <div class="find" style="text-align: center;clear:both;">
            <?php
                    if(isset($_POST['search'])){
            $search = $_POST['search'];

            // Connect to the database
            $mysqli = mysqli_connect("localhost", "root", "", "AMIT2043");
            if (!$mysqli) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Execute the SQL query
            $query = "SELECT * FROM activities WHERE act_title LIKE '%$search%'";
            $result = mysqli_query($mysqli, $query);

            // Display the search results to the user
            if (mysqli_num_rows($result) > 0) {
        echo "<table style='margin:auto;'>";
        echo "<tr style='background-color:grey;font-weight:bold;'><th>Title</th><th>Status</th><th>Category</th><th>Pax</th><th>Location</th><th>Date</th><th>Time</th><th>Remarks</th><th>Price (RM)</th><th>Activity code</th><th>Action</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['act_title']."</td>";
            $currentDate = date('Y-m-d');
            $recordedDate = $row['act_date']; 
            if ($currentDate >= $recordedDate) {
                echo "<td><b style='color:red;'>Expired</b></td>";
            } else {
                echo "<td><b>Coming Soon</b></td>";
            }
            echo "<td>".$row['act_type']."</td>";
            echo "<td>".$row['act_pax']."</td>";
            echo "<td>".$row['act_location']."</td>";
            echo "<td>".$row['act_date']."</td>";
            echo "<td>".$row['act_time']."</td>";
            echo "<td>".$row['act_remarks']."</td>";
            echo "<td>".$row['act_price']."</td>";
            echo "<td>".$row['act_id']."</td>";
            echo "<td><input type='submit' name='join' id='join' value='Join' onclick='return confirm(\"Are you sure you want to join this activity?\");'></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }


            // Close the database connection
            mysqli_close($mysqli);
        } ?>
            <form action="participant_search.php" method="post">
                <input type="text" id="search" name="search" placeholder="Search for.." style="padding:7px 15px;">
                <button type="submit" style="padding:7px 15px;font-weight:bold;">Search</button>
            </form>
    </body>

    <!--footer-->
    <footer>
        <p>TAR UMT Games Society &#169; All Right Reserved 2023</p>
    </footer>

</html>
