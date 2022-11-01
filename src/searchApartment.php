<?php
    require_once "config.php";
    if(isset($_POST["SearchSubmitbtn"])){
    $SearchPhrase = $_POST["search"];
    $noOfRooms = $_POST["noOfRooms"];
    $noOfBaths = $_POST["noOfBaths"];
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
                <li><a href="contactUs.php" ><font class="hov">Contact Us</font></a></li>
            </ul>

            <!-- Login & Signup -->
            <div id="log">
                <a href="loginHTML.php"><button id="login">Login</button></a>
                <a href="register.html"><button id="signup">Sign up</button></a>
            </div>

            <!-- Profile icon -->
            <div id="profile">
                <img src="<?php echo $dp ?>" height="50px" alt="profile" onmouseover="showDpNav();" onmouseout="hideDpNav();" style="border-radius:50%";>
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
               
                <div class="dropdown">
                    <p style="margin:0px 0px ; font-size: 18px;">Filter</p>
                <div class="dropdown-content">
                        <label class="filterLabel" style="display:inline-block">No of Beds</label>
                        <select id="noOfRooms" name="noOfRooms" class="filterslect">
                            <option value="-">-</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select><br>
                        <label class="filterLabel">No of Baths</label>
                        <select id="noOfBaths" name="noOfBaths" class="filterslect">
                            <option value="-">-</option>
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
            
            <div class="sortbyArea">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id = "filterForm">
                <select name="sortBy" id="sortBY" class="selectSortBy">
                    <option>Sort By</option>
                    <option value="Low Price" onclick="filtersubmit()">Low Price</option>
                    <option value="High Price" onclick="filtersubmit()">High Price</option>
                </select>
                <input type="submit" name="filterSub" style="display:none">
            </form>
            </div>
        </div>
        <script>
            function filterSubmit(){
                decument.getElementById("filterForm").submit();
            }
        </script>
        
        <hr>
        <?php
            $sql = "select * from apartments where approved = '1'";
            $result = $conn->query($sql);
            $flag = True;
            if (isset($_POST["SearchSubmitbtn"])){
                $SearchPhrase = $_POST["search"];
                $noOfRooms = $_POST["noOfRooms"];
                $noOfBaths = $_POST["noOfBaths"];
                $flag = False;
                    
                $sql2 = "select * from apartments where (title like '%{$SearchPhrase}%') AND (beds = '{$noOfRooms}') AND (baths = '{$noOfBaths}') AND  approved = '1'";
                if($noOfRooms == '-'){
                    $sql2 = "select * from apartments where title like '%{$SearchPhrase}%' AND baths = '{$noOfBaths}' AND  approved = '1'";
                    if(isset($_POST["filterSub"])){
                        $sql2 = "select * from apartments where title like '%{$SearchPhrase}%' AND baths = '{$noOfBaths}' AND  approved = '1' order by "
                    }
                    if($noOfBaths == '-'){
                        $sql2 = "SELECT * FROM apartments WHERE title LIKE '%$SearchPhrase%' AND  approved = '1'";
                    }
                }
                elseif($noOfBaths == '-'){
                    $sql2 = "select * from apartments where title like '%{$SearchPhrase}%' AND beds = '{$noOfRooms}' AND  approved = '1'";
                }
                $result2 = $conn->query($sql2);

                if($result2 -> num_rows>0){
                    while($row = $result2 -> fetch_assoc()){
                        
                        echo "<a href='viewApartment.php' style='color:black'>
                        <div class='DisplayedAds'>
                            <div class='AdPictures'>
                                <img src='{$row['img1']}' class='pics'>
                            </div>
                            <div class='Adsdis'>
                                <p id='title'>{$row['title']}</p>
                                <p id='address'>{$row['addrs']}</p>
                            </div>
                            <div class='price'>
                                <p id='price'>Rs. {$row['price']}</p>
                                <p id='noOfBeds'>Beds {$row['beds']}</p>
                                <p id='baths'>Baths {$row['baths']}</p>
                            </div>
                            <div class= 'contactbtn'>
                                <button name='contact' id='contact'>Contact Seller</button>
                            </div>
                        </div></a>";
                    }
                }
            }
            if($flag==True){
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo "<a href='viewApartment.php' style='color:black'>
                    <div class='DisplayedAds'>
                        <div class='AdPictures'>
                            <img src='{$row['img1']}' class='pics'>
                        </div>
                        <div class='Adsdis'>
                            <p id='title'>{$row['title']}</p>
                            <p id='address'>{$row['addrs']}</p>
                        </div>
                        <div class='price'>
                            <p id='price'>Rs. {$row['price']}</p>
                            <p id='noOfBeds'>Beds {$row['beds']}</p>
                            <p id='baths'>Baths {$row['baths']}</p>
                        </div>
                        <div class= 'contactbtn'>
                            <button name='contact' id='contact'>Contact Seller</button>
                        </div>
                    </div></a>";
                    }
                }
            }
        ?>
        

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