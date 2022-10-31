<!DOCTYPE html>
<html>
    <head>
        <title>Home | Aparell</title>
        <link rel="icon" type="image" href="images/Favicon.png">
        <link rel="stylesheet" href="style/lightstyle.css" >
    </head>
    <style>
input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=password], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type=button] {
  width: 10%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 100%;
  cursor: pointer;
  position: absolute;
    left: 45%;
    top: 400px;
    border-radius: 4;
    font-family: "Arial", Impact, Charcoal, sans-serif;
    font-weight: bold;
    font-size:13px;

    text-shadow: 2px 2px 4px black;
    padding: 5px 10px;
    margin:5px 60px;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 10%;
  background-color: #f2f2f2;
  padding: 20px;
}
.form{
    margin-left:10%;
    display:inline;

}
.formName{
    margin-left:10%;
}
.profiles{
    display:flex;
    justify-content: space-around;
    margin:20px 80px;
}
.profile1{
    flex-basis: 260px;
}
.profile1 .profile1-img{
    height: 260px;
    width:260;
    border-radius: 50%;
    transition: 400ms;
}
.profile1 .editicon{
    height: 60px;
    width:60;
    border-radius: 100%;
}

.position{
    font-size: 13px;
    font-weight: 1000;
    letter-spacing: 1px;
    color:#093d72;
}
.user-name{
    font-size: 18px;
    font-weight: 100;
    letter-spacing: 2px;
    color:#021930;
    text-align:center;
}

.profile1 p{
    font-size: 16px;
    margin-top:20px;
    text-align:justify;
}
</style>

    <body>

        <!-- Navigation panel -->
        <nav>

            <!-- Logo -->
            <a href="index.php"><img src="images/Logo(light).png" id="logo" alt="logo"></a>

            <!-- Nav buttons -->
            <div style="margin-right:20px">
                <ul>
                    <li><a href="index.php" class="active"><font class="hov">Home</font></a></li>
                    <li><a href="searchApartment.php"><font class="hov">Apartments</font></a></li>
                    <li><a href="aboutus.html"><font class="hov">About Us</font></a></li>
                    <li><a href="contactUs.php" ><font class="hov">Contact Us</font></a></li>
                </ul>
            </div>
        </nav>
        


<div>
  <form action="/action_page.php">
  <div class="profiles" style="text-align:center">
            <div class ="profile1">
                <img src="images/Sachi.jpg" class="profile1-img">
                <input type="file">
                <h3 class="user-name">Sachinthaka</h3>
                
            </div>
  </div>
    <div class="formName">
    <label for="fname">First Name</label>
    </div>
    <div class="form">
        <input type="text" id="fname" name="firstname" placeholder="Your name.."><br>
    </div>

    <div class="formName">
    <label for="lname">Last Name</label>
    </div>
    <div class="form">
    <input type="text" id="lname" name="lastname" placeholder="Your last name.."><br>
    </div>

    <div class="formName">
    <label for="email">E-mail</label>
    </div>
    <div class="form">
    <input type="text" id="email" name="mail" placeholder="Your email.."><br>
    </div>

    <div class="formName">
    <label for="pnumber">Phone Number</label>
    </div>
    <div class="form">
    <input type="text" id="pnumber" name="phonenumber" placeholder="Your phone number.."><br>
    </div>

    <div class="formName">
    <label for="password">Password</label>
    </div>
    <div class="form">
    <input type="password" id="password" name="pwd" placeholder="Enter password.."><br>
    </div>

    <div class="formName">
    <label for="address">Address</label>
    </div>
    <div class="form">
    <textarea name="addrs" id="addrs" cols="46" rows="2" placeholder="Optional"></textarea>
    </div>

    <div class="formName">
    <input type="submit" value="Submit">
    </div>
  </form>
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
                    <a href="aboutus.html">Info</a> &#x2022 <a href="contactUs.php">Support</a> &#x2022 <a href="contactUs.php">Marketing</a><br>
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