<?php
    include_once 'config.php';
?>
<!-- uploading file -->
<?php 
    $id = $_GET['aprtID'];

    //insert values
    $sql = "DELETE FROM apartments 
            WHERE aprtID = $id";

    if(mysqli_query($conn,$sql)){
        echo "<script>
                alert('Successfully deleted!');
                window.location.replace('pendingAprovals.php');
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
