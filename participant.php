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
    <?php
session_start();

$db = new mysqli('localhost', 'root', '', 'AMIT2043');

if ($db->connect_errno) {
  echo "Failed to connect to MySQL: " . $db->connect_error;
  exit();
}

$query = "SELECT * FROM activities";
$result = $db->query($query);

if (!$result) {
  echo "Sorry, there was an error retrieving activities. Please try again later.";
  exit();
}

$activities = array();

while($row = $result->fetch_assoc()) {
  $activities[] = $row;
}

foreach($activities as $row) {
  $activity_id = $row['act_id'];

  if(isset($_POST['join'])) {
    $studentid = $_SESSION['studentid'];

    $query = "INSERT INTO activity_participants (act_id, studentid) VALUES ('$activity_id', '$studentid')";
    $result = $db->query($query);

    if($result) {
      echo "You have successfully joined this activity!";
    } else {
      echo "Sorry, there was an error joining this activity. Please try again later.";
    }
  }
?>
<!--side navigation-->

<!--main event list-->
<div class="main">
  <div class="activity">
    <form action="participant_activities.php" method="post">
      <table>
        <tr>
          <td style="width:45%;">Title :</td>
          <td><?php echo $row['act_title'];?></td>
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
                              <td><?php echo $row['act_remarks']; ?></td>
                            </tr>
                            <tr>
                              <td>Price (RM):</td>
                              <td><?php echo $row['act_price']; ?></td>
                            </tr>
                            <tr>
                              <td>Activity code:</td>
                              <td><?php echo $row['act_id']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="btn">
                                    <input type="submit" name="join" id="join" value="Join" onclick="return confirm('Are you sure you want to join this activity?');">
                                </td>
                            </tr>
                        </table>
                        </form>
                    </div>
                    <?php }?> 
                </div>       

    </body>

    <!--footer-->
    <footer>
        <p>TAR UMT Games Society &#169; All Right Reserved 2023</p>
    </footer>
</html>
