<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link rel="stylesheet" href="mainstyle.css">
        <link rel="stylesheet" href="indexstyle.css">
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico"> <!--change this to logo-->
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <!--body-->
    <body>
        <!--navigation bar-->
        <div class="navigation">
            <nav>
                <ul>
                    <img src="media/logo1.png" alt="Society Logo" width="200px;">
                    <div class="rightnav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="faq.php">Enquiry</a></li>
                        <li><a href="login.php">Member</a></li>
                    </div>
                </ul>
            </nav> 

        </div>

        <!--main banner section-->
        <div class="banner">
            <video autoplay muted loop id="bannervideo">
                <source src="media/main_banner_video.mp4" type="video/mp4">
                Your browser does not support HTML video.
            </video>
            <div id="banner_text"></div>
        </div>

        <!--activities list section-->
        <!--javascript requried for later-->
        <div class="activities">
            <!--activity 1-->
            <div class="act" id="act1">
                <img src="media/chess1.jpg" alt="activity photo">
                <h2>Activity 1</h2>
                <p>Detail 1</p>
            </div>
            <!--activity 2-->
            <div class="act" id="act1">
                <img src="media/basketball.jpg" alt="activity photo">
                <h2>Activity 2</h2>
                <p>Detail 2</p>
            </div>
            <!--activity 3-->
            <div class="act" id="act1">
                <img src="media/pubg.jpg" alt="activity photo">
                <h2>Activity 3</h2>
                <p>Detail 3</p>
            </div>
        </div>

        <!--youtube video section-->
        <div class="ytvbg">
            <div class="youtube_video">
                <table class="videotable">
                    <tr>
                        <td id="deschead">
                            <h1>Heading</h1>
                        </td id="vdcont">
                        <td rowspan="2" id="youtube">
                            <iframe width="700" height="394" src="https://www.youtube.com/embed/ewZ_YWbIWXI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </td>
                    </tr>
                    <tr>
                        <td id="descdetail"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></td>
                    </tr>
                </table>
            </div>
        </div>

        <!--Member section-->
        <div class="index_member">
            <div class="member_cont">
                <table>
                    <tr>
                        <td>
                            <h1>Member of Games Society</h1>
                            <p>As a member of <b>Games Society</b>, you are able to join all the event provided by the society.</p>
                            <div class="btnlct">
                                <a href="signup.php" id="signupbtn"><button>Sign Up</button></a>
                                <a href="login.php" id="loginbtn"><button>Log In</button></a>
                            </div>
                        </td>
                        <td>
                            <img src="media/member.png" alt="member_icon">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>

    <!--footer-->
    <footer>
        <!--footer society detail list-->
        <div class="societydetails">
            <ul>
                <li><img src="logo.png" alt="Society Logo" width="200px;"></li>
                <li><h3>Games Society TAR UMT</h3></li>
                <li><p>Kampus Utama, Jalan Genting Kelang, 53300 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</p></li>
                <li><p>Business Hour : <br>Monday - Saturday (Not PH)<br>08:00 AM - 08:00 PM</p></li>
                <li>
                    <table>
                        <tr>
                            <td><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp; Email :</td>
                            <td id="mailto"><a href="mailto:tarumtgs_contact@tarc.edu.my"><b>tarumtgs_contact@tarc.edu.my</b></a></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-phone" aria-hidden="true"></i> &nbsp; Tel:</td>
                            <td><b>(+60)03-4145 0123</b></td>
                        </tr>
                    </table>
                </li>
            </ul>
        </div>
        
        <!--navigation-->
        <div class="footnav">
            <ul>
                <li><h4>Our Society</h4></li>
                <li><a href="login.php">About Us</a></li>
                <li><a href="login.php">Commitee Members</a></li>
                <li><a href="login.php">Contact Us</a></li>
                <li><a href="login.php">Enquiry</a></li>
            </ul>
        </div>

        <!--member-->
        <div class="footmember">
            <ul>
                <li><h4>Member</h4></li>
                <li><a href="login.php">Log In</a></li>
                <li><a href="signup.php">Sign Up</a></li>
                <li><a href="#">Why Join Us</a></li>
            </ul>
        </div>

        <!--social and copyright-->
        <div class="socialNcopyright">
            <ul>
                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="https://web.whatsapp.com/"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                <li><a href="mailto:someone@tarc.edu.my"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                <li><a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
            <ul>
                <li><p><i>TAR UMT Games Society &#169; All Right Reserved 2023</i></p></li>
            </ul>
        </div>
    </footer>

</html>
