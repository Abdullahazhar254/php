<?php 
session_start();
if(!isset($_SESSION['stid'])){
    header('location: ../../../index.php');
}
include "../connection.php"; 
    $bcfid=$_SESSION['BCFid'];
        $id=$_GET['id'];
        $query1 = "DELETE FROM assignmentsub WHERE as_id = '$id'";
        $result = mysqli_query($link, $query1);
        if($result)
        {
            echo "<script>
                window.location.href='Uploaded.php?id=$bcfid';
                </script>";
            exit();
        }
        else
        {
            echo "Try Again";
        }
        mysqli_close($link);
    
?>