<?php
    include_once 'config.php';
?>
<!-- uploading file -->
<?php 
    session_start();
    if(isset($_SESSION['count'])){

    }
    else{
        $_SESSION['count'] = 1;
    }    

    $id = $_SESSION['count'];

    $target_dir = "images/Apartments/";
    $fileCount = count($_FILES['imgFrm']['name']);
    $target_file = array();

    for($i = 0; $i < $fileCount; $i++){
        $target_file[$i] = $target_dir . $id . "_" .basename($_FILES["imgFrm"]["name"][$i]);
        if(isset($_FILES["imgFrm"])) {
            //check if file exists
            if (file_exists($target_file[$i])) {
                echo "Sorry, file already exists.";
            }
            elseif (move_uploaded_file($_FILES["imgFrm"]["tmp_name"][$i],$target_file[$i])){
                continue;
            }
            else{
                echo "Error while uploading your file.";
            }
        }
        else{
            echo "File not available";
        }
    }    

    $_SESSION['count'] += 1;

    $adType = $_POST['type'];
    $beds = $_POST['beds'];
    $baths = $_POST['baths'];
    $size = $_POST['size'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $town = $_POST['town'];
    $addrs = $_POST['addrs'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $nego = isset($_POST['nego']);

    //insert values
    $sql = "INSERT INTO users(email,fName,lName,addrs,accType,phoneNo,password) VALUES('$email','$firstName','$lastName','$address','$accType','$phone','$pwd');";

    if(mysqli_query($conn,$sql)){
        echo "<script>
                alert('Successfully Posted!');
                window.location.replace('pendingAds.php');
              </script>";
        
    }
    else{
        echo "<script>
                alert('Unsuccessfull!');
                window.location.replace('postAd.php');
              </script>";
    }


    mysqli_close($conn);
?>
