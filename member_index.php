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
    <body>
         <!--side navigation-->
        <div class="navigation_side">
            <nav>
                <ul>
                    <li id="logo"><b><h1><i>LOGO SOCIETY</i></h1></b></li>
                    <li> 
                        <form>
                            <input type="text" name="search" placeholder="Search for..."><button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </li>
                    <li class="normal"><a href="participant.php">Home</a></li>
                    <li class="normal"><a href="participant_activities.php">Activities</a></li>
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
                        <a href="participant_changepassword.php">Change Password</a>
                        <a href="index.php">Logout</a>
                    </div>
                </div>
            </div>


            <!--main event list-->
            <div class="main">
                <div id="comingevent">
                    <h2>Your coming activities</h2>
                    <div class="activity">
                        <table>
                            <tr>
                                <td rowspan="9"><img src="/image/pubg1.jpeg" width="200px;"></td>
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
                                <td rowspan="">When:</td>
                                <td colspan="2">14th April 2023 (Fri)<br>6:00 PM - 9:00 PM</td>
                            </tr>
                            <tr>
                                <td>Remarks:</td>
                                <td colspan="2"><b>Bring you own device</b></td>
                            </tr>
                            <tr>
                                <td>Start in:</td>
                                <td colspan="2"><b><p id="countdown"></p></b></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="ticket" style="text-align:center;"><button><a href="participant.php#taicketsample">View Ticket</a></button></td> <!--testing section-->
                            </tr>
                        </table>
                    </div>
                </div>
                

                <h2>Recommend</h2>
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

                <br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br>
                <!--Booking-->
                <div id="booking">
                    <h2>Booking</h2>
                    <div class="activity">
                        <table>
                            <tr>
                                <td rowspan="8"><img src="/image/chess.jpg" width="200px;"></td>
                                <td colspan="3" style="text-align:center;"><h3>Chess Training Week 6</h3></td>
                            </tr>
                            <tr>
                                <td colspan="3"><b><i>Training strategy</i></b></td>
                            </tr>
                            <tr>
                                <td>Category:</td>
                                <td colspan="2">Games</td>
                            </tr>
                            <tr>
                                <td>Pax:</td>
                                <td colspan="2">24</td>
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
                                <td>Remarks:</td>
                                <td colspan="2">-</td>
                            </tr>
                            <tr>
                                <td class="ticket" style="text-align:center;"><button><a href="participant.php#taicketsample">View Ticket</a></button></td> <!--testing section-->
                                <td class="cancel" style="text-align:center;"><button onclick="myCan()"><a href="participant.php#taicketsample">Give up</a></button></td> <!--testing section-->
                            </tr>
                        </table>
                    </div>
                    <!--booking without payment complete-->
                    <div class="activity">
                        <table>
                            <tr>
                                <td rowspan="9"><img src="/image/chess.jpg" width="200px;"></td>
                                <td colspan="3" style="text-align:center;"><h3>Chess Training Week 6</h3></td>
                            </tr>
                            <tr>
                                <td colspan="3"><b><i>Training strategy</i></b></td>
                            </tr>
                            <tr>
                                <td>Category:</td>
                                <td colspan="2">Games</td>
                            </tr>
                            <tr>
                                <td>Pax:</td>
                                <td colspan="2">24</td>
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
                                <td>Remarks:</td>
                                <td colspan="2">-</td>
                            </tr>
                            <tr>
                                <td>Payment Status :</td>
                                <td colspan="2"><b>Waiting for payment</b></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="pay" style="text-align:center;"><button><a href="participant_payment.php">Pay Now</a></button></td> <!--testing section-->
                                <td class="cancel" style="text-align:center;"><button onclick="myCan()"><a href="participant.php#taicketsample">Give up</a></button></td> <!--testing section-->
                            </tr>
                        </table>
                    </div>
                </div>

                <br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br>
                <!--history section-->
                <div id="history">
                    <h2>History</h2>
                    <div class="activity">
                        <table>
                            <tr>
                                <td rowspan="8"><img src="/image/chess.jpg" width="200px;"></td>
                                <td colspan="3" style="text-align:center;"><h3>Chess Training Week 6</h3></td>
                            </tr>
                            <tr>
                                <td colspan="3"><b><i>Training strategy</i></b></td>
                            </tr>
                            <tr>
                                <td>Category:</td>
                                <td colspan="2">Games</td>
                            </tr>
                            <tr>
                                <td>Pax:</td>
                                <td colspan="2">24</td>
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
                                <td>Remarks:</td>
                                <td colspan="2">-</td>
                            </tr>
                            <tr>
                                <td  colspan="3" class="ticket" style="text-align:center;"><button><a href="participant.php#taicketsample">View Ticket</a></button></td> <!--testing section-->
                            </tr>
                        </table>
                    </div>
                </div>

                <br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br>
                <!--My ticket-->
                <div id="taicketsample">
                    <h2>--Ticket Sample--</h2>
                    <div class="activity">
                        <h2>My ticket</h2>
                        <table>
                            <tr>
                                <td rowspan="7"><img src="/image/chess.jpg" width="200px;"></td>
                                <td colspan="3" style="text-align:center;"><h3>Chess Training Week 6</h3></td>
                            </tr>
                            <tr>
                                <td colspan="3"><b><i>Training strategy</i></b></td>
                            </tr>
                            <tr>
                                <td>Category :</td>
                                <td colspan="2">Games</td>
                            </tr>
                            <tr>
                                <td>Pax :</td>
                                <td colspan="2">24</td>
                            </tr>
                            <tr>
                                <td>Location :</td>
                                <td colspan="2">Block H102</td>
                            </tr>
                            <tr>
                                <td>When :</td>
                                <td colspan="2">22nd March 2023 (Wed)<br>8:00 PM - 9:00 PM</td>
                            </tr>
                            <tr>
                                <td>Remarks :</td>
                                <td colspan="2">-</td>
                            </tr>
                            <tr>
                                <td  rowspan="7"><img src="/image/qr-code-1.png" width="200px;"></td>
                                <td>Ticket ID :</td>
                                <td colspan="2"><b>G001C001</b></td>
                            </tr>
                            <tr>
                                <td>Member ID :</td>
                                <td colspan="2"><b>2207584</b></td>
                            </tr>
                            <tr>
                                <td>Seat :</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Event Status :</td>
                                <td colspan="2"><b>Due</b></td>
                            </tr>
                            <tr>
                                <td>Payment Status :</td>
                                <td colspan="2"><b>Free</b></td>
                            </tr>
                            <tr>
                                <td>Payment Method :</td>
                                <td colspan="2"><b>-</b></td>
                            </tr>
                            <tr>
                                <td  colspan="3" class="back" style="text-align:center;"><button><a href="participant.php#history">Back</a></button></td> <!--testing section-->
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

    <!--javascript-->
    <script>
        /*delete popup alert*/
        function myCan() {
            var proceed = confirm("Don't want anymore?");
            if (proceed) {
                canAction();
            }
            }

            function canAction() {
            alert("Bye Activity!");
            }   
            
        /*time countdown*/
        // Set the date we're counting down to
        var countDownDate = new Date("Apr 14, 2023 18:00:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();
            
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
            
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
        // Output the result in an element with id="demo"
        document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";
            
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
        }, 1000);
    </script>
</html>
