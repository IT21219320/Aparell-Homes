<?php
    include_once 'config.php';
?>
<?php
    //start the session
    session_start();
    $email = $_SESSION['Email'];
    $accType = $_SESSION['AccType'];
    
    //put the values from the reg form into variables
    $firstN = htmlspecialchars($_POST['firstname']);
    $lastN = htmlspecialchars($_POST['lastname']);
    $addr = htmlspecialchars($_POST['addrs']);
    $phone = $_POST['phonenumber'];
    $pwd = $_POST['pwd'];

    $sql = "SELECT profile FROM users WHERE  email = '$email' AND accType = '$accType'";
    $result = $conn -> query($sql);
    While($row = $result -> fetch_assoc()){
        $target_file = $row['profile'];
    }


    //getting profile value

    $target_dir = "images/Profiles/";
    $imgName = basename($_FILES["dp"]["name"]);
   
    if($imgName != ''){
        if($target_file != "images/user.png"){
            unlink("$target_file");
        }
        $target_file = $target_dir . $email . "_" . $accType . "_" .$imgName;
        move_uploaded_file($_FILES["dp"]["tmp_name"],$target_file);
    }
    
    $_SESSION['profile'] = "$target_file";

    //update values
    $sql2 = "UPDATE users
            SET fName = '$firstN',
                lName = '$lastN',
                addrs = '$addr',
                phoneNo = $phone,
                password = '$pwd',
                profile = '$target_file'
            WHERE email = '$email' AND accType = '$accType';";  
    
    //check connection        
    //display sccessful message
    if(mysqli_query($conn,$sql2)){
        echo "<script>
                var acctype = '$accType';
                alert('Successfully Updated!');
                window.location.replace(acctype+'Dash.php');
              </script>";
        
    }
    //display unsuccessful message
    else{
        echo "<script>
                var acctype = '$accType';
                alert('Update Unsuccessful!');
                window.location.replace(acctype+'Dash.php');
              </script>";
    }


    mysqli_close($conn);
?>