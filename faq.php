<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Enquiry</title>
        <link rel="stylesheet" href="mainstyle.css">
        <link rel="stylesheet" href="faqstyle.css">
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico"> <!--change this to logo-->
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <!--body-->
    <body>
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

        <!--FAQ question-->
        <div class="centerfaq" >

            <h1>FAQ</h1>

            <div class="faqsection">
                <button class="faq">What is Games Society?</button>
                <div class="panel">
                    <p>Games Society is a society that contain a lot of different games/activities for who interested in multiple activites.</p>
                </div>
            </div>

            <div class="faqsection">
                <button class="faq">Why join Games Society?</button>
                <div class="panel">
                    <p>By joining us, you can take you time in improvement skills, make you heathier by environment and also knowing as much as possible people.</p>                
                </div>
            </div>

            <div class="faqsection">
                <button class="faq">How to view activites details?</button>
                <div class="panel">
                    <p>You are required to sign up as a member to view more activities details.</p>                
                </div>
            </div>

            <div class="faqsection">
                <button class="faq">How Do I register as a member?</button>
                <div class="panel">
                    <p>You can register member through this website by clicking the top navigation bar "member" section.</p>                
                </div>
            </div>

            <div class="faqsection">
                <button class="faq">Any fee will be charged if become a member?</button>
                <div class="panel">
                    <p>Don't worry, we will not charge any fee on member registeration.</p>                
                </div>
            </div>

            <div class="faqsection">
                <button class="faq">All the activities or events provided need to pay for fee?</button>
                <div class="panel">
                    <p>It's depend on the category of the activities. Some of the activities might need some registeration fee or joining fee to keep its quality.</p>                
                </div>
            </div>
        </div>
        
    </body>

    <!--footer-->
    <footer>
        <!--footer society detail list-->
        <div class="societydetails">
            <ul>
                <li><img src="media/logo.png" alt="Society Logo" width="200px;"></li>
                <li><h3>Games Society TAR UMT</h3></li>
                <li><p>Kampus Utama, Jalan Genting Kelang, 53300 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</p></li>
                <li><p>Business Hour : <br>Monday - Saturday (Not PH)<br>08:00 AM - 08:00 PM</p></li>
            </ul>
        </div>
        
        <!--navigation-->
        <div class="footnav">
            <ul>
                <li><h4>Our Society</h4></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="about.php#commitee">Commitee</a></li>
                <li><a href="about.php#contact">Contact Us</a></li>
                <li><a href="faq.php">Enquiry</a></li>
            </ul>
        </div>

        <!--member-->
        <div class="footmember">
            <ul>
                <li><h4>Member</h4></li>
                <li><a href="login.php">Log In</a></li>
                <li><a href="signup.php">Sign Up</a></li>
                <li><a href="faq.php">Why Join Us</a></li>
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
            <ul>
                <li>Tel : <b>(+60) 03-4145 0123</b></li>
                <li>Email : <a href="mailto:tarumtgs@tarc.edu.my" style="text-decoration:none; color:black;"><b>tarumtgs@tarc.edu.my</b></a></li>
            </ul>
        </div>
    </footer>

    <script>
     var acc = document.getElementsByClassName("faq");
    var i;

    for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
        panel.style.display = "none";
        } else {
        panel.style.display = "block";
        }
    });
    }

    function alertMsg() {
    alert("Submitted");
    }
    </script>
</html>