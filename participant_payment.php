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
        <link rel="stylesheet" href="participant_paymentstyle.css">
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico"> <!--change this to logo-->
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <!--body-->
    <body>
    

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

            <div class="main">
                <h2><em>LOGO SOCIETY</em></h2>
                <form>
                    <table>
                        <tr>
                            <th colspan="2" style="font-size:larger; letter-spacing:2px; text-align: center; padding:10px 0; text-decoration: underline;">Payment</th>
                        </tr>

                        <tr>
                            <td>Activity Title :</td>
                            <td><b>Testing payment</b></td>
                        </tr>

                        <tr>
                            <td>Ticket ID :</td>
                            <td><b>G001C001</b></td>
                        </tr>

                        <tr>
                            <td>Member ID :</td>
                            <td><b>2209354</b></td>
                        </tr>

                        <tr>
                            <td>Seat :</td>
                            <td><b>-</b></td>
                        </tr>

                        <tr>
                            <td style="border-bottom:2px dotted black;">Total (MYR) :</td>
                            <td style="text-align:right; border-bottom:2px dotted black;"><b>RM 7.90</b></td>
                        </tr>

                        <tr>
                            <td colspan ="3">Payment Method :</td>
                        </tr>

                        <tr>
                            <td style="width:50%; text-align: center; cursor:pointer;"><img src="/image/tng.png" width="100px;"></td>
                            <td style="width:50%; text-align: center;"><a href="participant_payment.php#card"><img src="/image/card.png" width="100px;"></a></td>
                        </tr>

                        <tr>
                            <td style="width:50%; text-align: center;"><b>Touch n Go</b></td>
                            <td style="width:50%; text-align: center;"><b>Credit/Debit Card</b></td>
                        </tr>

                        <tr>
                            <td colspan ="3" class="ccl" style="padding:20px 0; text-align: center;;">
                                <a href="participant.php">Cancel</a>
                            </td>
                        </tr>
                    </table>
                </form>   
                

                <br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br>
                <div id="card">
                    <h2>--Fill in Card details--</h2>
                    <form>
                        <table>
                            <tr>
                                <th colspan="2">Card Detals</th>
                            </tr>
    
                            <tr>
                                <td>Card Number:</td>
                                <td><input type="number" placeholder="1111 2222 3333 4444"></td>
                            </tr>
    
                            <tr>
                                <td>Card Holder Name:</td>
                                <td><input type="name" placeholder="Tan Ah Kaw"></td>
                            </tr>
    
                            <tr>
                                <td>Exp Date</td>
                                <td><input type="month" placeholder="Tan Ah Kaw"></td>
                            </tr>
    
                            <tr>
                                <td>CVC :</td>
                                <td><input type="number" placeholder="123"></td>
                            </tr>
    
                            <tr>
                                <td colspan ="3" class="btns" style="padding:20px 0;">
                                    <a href="participant.php">Pay</a>
                                </td>
                            </tr>
                            
                        </table>
                    </form>
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

        /*create popup alert*/
        function myCreate() {
            var proceed = confirm("Create Now?");
            if (proceed) {
                creAction();
            }
            }

            function creAction() {
            alert("Activity Created!");
            }
    </script>
</html>