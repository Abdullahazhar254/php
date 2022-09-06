<?php 
session_start();
if(!isset($_SESSION['adname'])){
    header('location: ../../../index.php');
}
include "../connection.php"; 
        $id=$_GET['id'];
        $query1 = "DELETE FROM student WHERE s_id = '$id'";
        $result = mysqli_query($link, $query1);
        if($result)
        {
            echo "<script>
            window.location.href='table.php';
            </script>";
            exit();
        }
        else
        {
            echo "Try Again";
        }
        mysqli_close($link);
?>
