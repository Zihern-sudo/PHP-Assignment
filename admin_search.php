<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Search</title>
        <link rel="stylesheet" href="accstyle.css">
        <link rel="stylesheet" href="adminstyle.css">
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico"> <!--change this to logo-->
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
       
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
        
        <div class="find" style="text-align: center;clear:both;">
            <?php
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
            
            if(isset($_POST['search'])){
            $search = $_POST['search'];

            // Connect to the database
            $mysqli = mysqli_connect("localhost", "root", "", "AMIT2043");
            if (!$mysqli) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Execute the SQL query
            $query = "SELECT * FROM members WHERE studentid LIKE '%$search%' OR name LIKE '%$search%'";

            $result = mysqli_query($mysqli, $query);

            // Display the search results to the user
            if (mysqli_num_rows($result) > 0) {
        echo "<table style='margin:auto;'>";
        echo "<tr style='background-color:grey;font-weight:bold;'><th>Student ID</th><th>Name</th><th>Email</th><th>Gender</th><th>Faculty</th>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['studentid']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['faculty']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }


            // Close the database connection
            mysqli_close($mysqli);
        } ?>
            <form action="admin_search.php" method="post">
                <input type="text" id="search" name="search" placeholder="Search for people.." style="padding:7px 15px;">
                <button type="submit" style="padding:7px 15px;font-weight:bold;">Search</button>
            </form>
    </body>
</html>
