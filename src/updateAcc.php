<?php
    include_once 'config.php';
?>
<?php

    session_start();
    $email = $_SESSION['Email'];
    $accType = $_SESSION['AccType'];
    
    //put the values from the reg form into variables
    $firstName = htmlspecialchars($_POST['firstname']);
    $lastName = htmlspecialchars($_POST['lastname']);
    $address = htmlspecialchars($_POST['addrs']);
    $phone = $_POST['phonenumber'];
    $pwd = $_POST['pwd'];

    
    //getting profile value

    $target_dir = "images/Profiles/";
    $target_file = $target_dir . $email . "_" . $accType . "_" .basename($_FILES["dp"]["name"]);
   
    move_uploaded_file($_FILES["dp"]["tmp_name"],$target_file);

    $_SESSION['profile'] = "$target_file";

    //update values
    $sql = "UPDATE users
            SET fName = '$firstName',
                lName = '$lastName',
                addrs = '$address',
                phoneNo = $phone,
                password = '$pwd',
                profile = '$target_file'
            WHERE email = '$email' AND accType = '$accType';";  
            

    if(mysqli_query($conn,$sql)){
        echo "<script>
                var acctype = '$accType';
                alert('Successfully Update!');
                window.location.replace(acctype+'Dash.php');
              </script>";
        
    }
    else{
        echo "<script>
                var acctype = '$accType';
                alert('Registration Unsuccessful!');
                window.location.replace(acctype+'Dash.php');
              </script>";
    }


    mysqli_close($conn);
?>