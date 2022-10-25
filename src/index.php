<?php
    session_start();

    if(isset($_SESSION['LoginStat'])){

        $logStat = $_SESSION['LoginStat'];
        $acc = $_SESSION['AccType'];
        $dp = $_SESSION['profile'];
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home | Aparell</title>
        <link rel="icon" type="image" href="images/Favicon.png">
        <link rel="stylesheet" href="style/lightstyle.css" id="stylesheet">
    </head>

    <body>

        <!-- Navigation panel -->
        <nav>

            <!-- Logo -->
            <a href="index.php"><img src="images/Logo(light).png" id="logo" alt="logo"></a>

            <!-- Nav buttons -->
            <ul>
                <li><a href="index.php" class="active"><font class="hov">Home</font></a></li>
                <li><a href="searchApartment.php"><font class="hov">Apartments</font></a></li>
                <li><a href="aboutus.html"><font class="hov">About Us</font></a></li>
                <li><a href="contacts.html" ><font class="hov">Contact Us</font></a></li>
            </ul>

            <!-- Login & Signup -->
            <div id="log">
                <a href="loginHTML.php"><button id="login">Login</button></a>
                <a href="register.html"><button id="signup">Sign up</button></a>
            </div>

            <!-- Profile icon -->
            <div id="profile">
                <img src="images/<?php echo $dp ?>" height="50px" alt="profile" onmouseover="showDpNav();" onmouseout="hideDpNav();">
                <div>
                    <ul id="dpNav" onmouseover="showDpNav();" onmouseout="hideDpNav();">
                        <a href="<?php echo $acc ?>Dash.php"><li style="margin-top: 35px; border-top-left-radius: 5px; border-top-right-radius: 5px;">Dashboard</li></a>
                        <a href="logout.php"><li>Log Out</li></a>
                    </ul>
                </div>
            </div>

            <!-- Dark Mode toggle switch
            <div id="drkmode">
                <img src="images/night.png" alt="dark" id="dark" class="mode" width="20px" onclick="light('OFF')">
                <img src="images/day.png" alt="light" id="light" class="mode" width="20px" onclick="light('ON')">
            </div> -->

        </nav>
        <!--background image and text-->
        <div class="home">
            <div class="pos70">
            <h2 class="Welcome">Wellcome to Aparell Homes</h2>
            <p class="welcometxt"><font class="textPadding">Your new Apartment is here. Do not waste your<br> time just go and find your dream Apartment with <br>fantastic features.</font></p>
            <a href="searchApartment.php" class="findButton">Find An Apartment</a>
            <a href="sellApartmnet" class="sellButton">Sell An Apartment</a>
            </div>
        </div>
        <div class="blank">

        </div>

        <div class="ad">
            <img src="images/Apartments/apartmentpic_01.jpg" alt="image" width="100%">
            <div class="ad_description">
                <h2>franklin road</h2>
                <p>afsfhalskehflkajshgaiwuehjksdbvsmdhfksfmsfgu</p>
            </div>

        </div>
        <div class="ad">
            <img src="images/Apartments/apartmentpic_01.jpg" alt="image" width="100%">
            <div class="ad_description">
                <h2>franklin road</h2>
                <p>afsfhalskehflkajshgaiwuehjksdbvsmdhfksfmsfgu</p>
            </div>

        </div>
        <div class="ad">
            <img src="images/Apartments/apartmentpic_01.jpg" alt="image" width="100%">
            <div class="ad_description">
                <h2>franklin road</h2>
                <p>afsfhalskehflkajshgaiwuehjksdbvsmdhfksfmsfgu</p>
            </div>

        </div>



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
<?php
    if(isset($_SESSION['LoginStat'])){

        if($logStat == true){
        //if logged in
            echo "<script>
                    document.getElementById('log').style.display = 'none';
                    document.getElementById('profile').style.display = 'block';
                </script>";
        }
        
    }
?>