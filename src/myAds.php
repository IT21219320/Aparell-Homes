<?php
    include_once "config.php";
?>
<?php
    session_start();

    if(isset($_SESSION['LoginStat'])){
        $logStat = $_SESSION['LoginStat'];

        if($_SESSION['LoginStat'] == true){

            if($_SESSION['StaffSignedIn'] == true){
                header('Location:staffDash.php');
            }
            elseif($_SESSION['BuyerSignedIn'] == true){
                header('Location:buyerDash.php');
            }
            elseif($_SESSION['SellerSignedIn'] != true){
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

    $sql = "SELECT * FROM apartments";

    $result = $conn->query($sql);

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
                <img src="images/<?php echo $dp ?>" height="50px" alt="profile">
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
                    <li><a href="sellerDash.php" class="hover">Dashboard</a></li>
                    <li><a href="myAds.php" class="hover activeNav">My Ads</a></li>
                    <li><a href="sellerDash.php" class="hover">Pending Aproval</a></li>
                    <li><a href="sellerDash.php" class="hover">History</a></li>
                    <li><a href="sellerDash.php" class="hover">Settings</a></li>
                </ul>
            </nav>
            <hr>
            <?php
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        $id = $row['aprtID'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $img = $row['img1'];

                        echo"<div class='ads'>
                                <img src='$img' width='25%' height='215px'>
                                <div class='adDisc'>
                                    <h2>$title</h2>
                                    <p>$description<br><br><br>Rs.$price</p>
                                    <div>
                                    <a href='editAd.php?aprtID=$id'><button>Edit</button></a><a href='deleteAd.php?aprtID=$id''><button>Delete</button></a>
                                    </div>
                                </div>
                                <div id='boost'>
                                    <p>Reach up to 10x more people by promoting your ad.</p>
                                    <a href='payment.php?aprtID=$id''><button>Boost Ad</button></a>
                                </div>
                            </div>";
                    }
                }
                
            ?>    
            <center>
                <a href="postAd.php"><button id="postAd">Post Ad</button></a>
            </center>    
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
    </body>
</html>