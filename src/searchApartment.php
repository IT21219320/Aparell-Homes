<?php
require_once "config.php";
if (isset($_POST["SearchSubmitbtn"])){
    $type = $_POST["type"];
    $SearchPhrase = $_POST["search"];
    $propertyType = $_POST["proptype"];
    $noOfRooms = $_POST["noOfRooms"];
    $noOfBaths = $_POST["noOfBaths"];

    echo "$type  $SearchPhrase  $propertyType $noOfRooms $noOfBaths";
}



?>
<?php
    session_start();

    if(isset($_SESSION['LoginStat'])){
        $logStat = $_SESSION['LoginStat'];

        if($_SESSION['LoginStat'] == true){

            $acc = $_SESSION['AccType'];
            $dp = $_SESSION['profile'];
            
        }   

    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Search | Aparell</title>
        <link rel="icon" type="image" href="images/Favicon.png">
        <link rel="stylesheet" href="style/searchstyle.css" id="stylesheet">
    </head>

    <body>

        <!-- Navigation panel -->
        <nav>

            <!-- Logo -->
            <a href="index.php"><img src="images/Logo(light).png" id="logo" alt="logo"></a>

            <!-- Nav buttons -->
            <ul>
                <li><a href="index.php" ><font class="hov">Home</font></a></li>
                <li><a href="searchApartment.php" class="active"><font class="hov">Apartments</font></a></li>
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
        <!-- search bar -->
        <div class="searchArea">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <select name="type" id="type" class="selectSearch">
                    <option value="ForSell">For sell</option>
                    <option value="ForRent">For rent</option>
                </select>
                <input type="text" name="search" placeholder="search.." value="<?php if(isset($_POST["SearchSubmitbtn"])){echo "$SearchPhrase";} ?>" class="search">
                <select name="proptype" id="proptype" class="selectSearch">
                    <option value="PropertyType"><?php if(isset($_POST["SearchSubmitbtn"])){echo "$propertyType";}else{echo "Property type";}; ?></option>
                    <option value="Apartments">Apartments</option>
                    <option value="Houses">Houses</option>
                </select>
                <div class="dropdown">
                    <p style="margin:0px 0px ; font-size: 18px;">Filter</p>
                <div class="dropdown-content">
                        <label class="filterLabel">No of Beds</label>
                        <select id="noOfRooms" name="noOfRooms">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select><br>
                        <label class="filterLabel">No of Baths</label>
                        <select id="noOfBaths" name="noOfBaths">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>  
                </div>   
            </div>
                <input name="SearchSubmitbtn" type="submit" value="Search" class="submitBtn"> 
            </form>
        </div>
        <div class="searchWeltxt">
            <h1>Property for Sale</h1>
            <p> Here are many aprtments that you can select as you want and as matched to your reqiurements</p>
            
            <div class="storebyArea">
            <form method="POST">
                <select name="storeBy" id="storeBY" class="selectStoreBy">
                    <option value="Store By">Store By</option>
                    <option value="Low Price">Low Price</option>
                    <option value="High Price">High Price</option>
                </select>
            </form>
            </div>
        </div>
        
        <hr>
        <div class="DisplayedAds">
            <div class="AdPictures">
                <img src="images/Apartments/apartmentpic_01.jpg" class="pics">
            </div>
            <div class="Adsdis">
                <p id="title">House for Sale in Frankline Road</p>
                <p id="address">22B, sude road, losAngalese</p>
            </div>
            <div class="price">
                <p id="price">2,160,000/=</p>
                <p id="noOfBeds">4 Beds</p>
                <p id="baths">2 Baths</p>
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