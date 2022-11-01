<?php
    include_once 'config.php';
?>
<?php
    session_start();

    if(isset($_SESSION['LoginStat'])){
        $logStat = $_SESSION['LoginStat'];
        
        if($_SESSION['LoginStat'] == true){

            if($_SESSION['SellerSignedIn'] == true){
                header('Location:staffDash.php');
            }
            elseif($_SESSION['BuyerSignedIn'] == true){
                header('Location:buyerDash.php');
            }
            elseif($_SESSION['StaffSignedIn'] != true){
                echo "<script>
                        alert('Please login to proceed!');
                        window.location.replace('loginHTML.php');
                    </script>";
            }
            else{
                $email = $_SESSION['Email'];
                $acc = $_SESSION['AccType'];
                $fname = $_SESSION['fName'];
                $lname = $_SESSION['lName'];
                $addrs = $_SESSION['addrs'];
                $phone = $_SESSION['mobile'];
                $pwd = $_SESSION['Pwd'];
                $dp = $_SESSION['profile'];
            }  
        }    
        else{
            echo "<script>
                            alert('Please login to proceed!');
                            window.location.replace('loginHTML.php');
                        </script>";
        }        
    }
    else{
        echo "<script>
                        alert('Please login to proceed!');
                        window.location.replace('loginHTML.php');
                    </script>";
    }

    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Ads | Aparell</title>
        <link rel="icon" type="image" href="images/Favicon.png">
        <link rel="stylesheet" href="style/dashStyle.css" id="stylesheet">
    </head>

    <body>

        <!-- Navigation panel -->
        <nav>

            <!-- Logo -->
            <a href="index.php"><img src="images/Logo(light).png" id="logo" alt="logo"></a>

            <!-- Nav buttons -->
            <ul>
                <li><a href="index.php"><font class="hov">Home</font></a></li>
                <li><a href="searchApartment.php"><font class="hov">Apartments</font></a></li>
                <li><a href="aboutus.html"><font class="hov">About Us</font></a></li>
                <li><a href="contactUs.php" ><font class="hov">Contact Us</font></a></li>
            </ul>

            <!-- Profile icon -->
            <div id="profile">
                <img src="<?php echo $dp ?>" height="50px" alt="profile" style="border-radius:50%";>
            </div>

            <!-- Dark Mode toggle switch
            <div id="drkmode">
                <img src="images/night.png" alt="dark" id="dark" class="mode" width="20px" onclick="light('OFF')">
                <img src="images/day.png" alt="light" id="light" class="mode" width="20px" onclick="light('ON')">
            </div> -->

        </nav>       

<br><br><br>
        
        <!-- Ads -->
        <section>
            <nav>
                <ul>
                    <li><a href="staffDash.php" class="hover">Dashboard</a></li>
                    <li><a href="toApprove.php" class="hover">To Approve</a></li>
                    <li><a href="manageUsers.php" class="hover activeNav">Manage Users</a></li>
                    <li><a href="staffsettings.php" class="hover">Settings</a></li>
                </ul>
            </nav>
            <hr>
            <nav id="nav2">
                <ul>
                    <li class="userType typeActive" onclick="changeTbl('buy')">Buyers</li>
                    <li class="userType" onclick="changeTbl('sell')">Sellers</li>
                </ul>
            </nav>
            <center>
                <div id="Buyers" class="tbldiv">
                    <table class="Tbl" border=1>
                        <tr>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Phone No</th>
                        </tr>
                        <?php
                            $sql1 = "SELECT * FROM users WHERE accType = 'seller'";
                            $result1 = $conn->query($sql1);
                    
                            if($result1->num_rows>0){
                                while($row1 = $result1->fetch_assoc()){

                                    $email = $row1['email'];
                                    $fname = $row1['fName'];
                                    $lname = $row1['lName'];
                                    $addrs = $row1['addrs'];
                                    $phone = $row1['phoneNo'];

                                    echo"<tr>
                                            <td>$email</td>  
                                            <td>$fname</td>  
                                            <td>$lname</td>  
                                            <td>$addrs</td>  
                                            <td>$phone</td>                                        
                                         </tr>";
                                }
                            }
                            
                        ?>
                    </table>
                </div>
                <div id="Sellers" class="tbldiv">
                    <table class="Tbl" border=1>
                        <tr>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Phone No</th>
                        </tr>
                        <?php
                            $sql2 = "SELECT * FROM users WHERE accType = 'seller'";
                            $result2 = $conn->query($sql2);

                            if($result2->num_rows>0){
                                while($row2 = $result2->fetch_assoc()){
                                    
                                    $email = $row2['email'];
                                    $fname = $row2['fName'];
                                    $lname = $row2['lName'];
                                    $addrs = $row2['addrs'];
                                    $phone = $row2 ['phoneNo'];

                                    echo"<tr>
                                            <td>$email</td>  
                                            <td>$fname</td>  
                                            <td>$lname</td>  
                                            <td>$addrs</td>  
                                            <td>$phone</td>                                        
                                        </tr>";
                                }
                            }
                            
                        ?>
                    </table>
                </div>
            </center>    
            
            <br><br> 
        </section> 

        <!-- Footer -->
        <footer>
            <center>
                <!-- Social Media -->
                <div id="icons">
                    <a href="https://www.facebook.com/profile.php?id=100086685492601" target="_blank"><img src="images/facebook.png" width="30px"></a>
                    <a href="https://www.instagram.com/aparellhomes/" target="_blank"><img src="images/instagram.png" width="30px"></a>
                    <a href="https://twitter.com/AparellHomes" target="_blank"><img src="images/twitter.png" width="30px"></a>
                    <a href="mailto: aparellhomes@gmail.com"><img src="images/mail.png" width="30px"></a>
                    <a href="https://wa.me/0740276949" target="_blank"><img src="images/whatsapp.png" width="30px"></a>
                </div>
                <!-- Links -->
                <div id="links">
                    <a href="aboutus.html">Info</a> &#x2022 <a href="contactus.html">Support</a> &#x2022 <a href="contactus.html">Marketing</a><br>
                    <a href="terms.html">Terms of Use</a> &#x2022 <a href="privacy.html">Privacy Policy</a>
                </div>
                <!-- Copyrights -->
                <div id="cpyryt">
                    &#x00A9 2022 Aparell Homes
                </div>
            </center>
        </footer>

        <script src="js/script.js"></script>
        <script>
            function decision(id){
                var confirmation = confirm('This will permenantly delete your ad! Please Confirm.');
                if(confirmation){
                    window.location.replace('deleteAd.php?aprtID='+id);
                }
            };

        </script>
    </body>
</html>