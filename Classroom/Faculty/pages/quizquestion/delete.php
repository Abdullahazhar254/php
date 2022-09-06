<?php
session_start();
if(!isset($_SESSION['fname'])){
    header('location: ../../../index.php');
}
 include "../connection.php"; 
 $qid=$_SESSION['quizid'];
        $id=$_GET['id'];
        $query1 = "DELETE FROM quizquestion WHERE qq_id = '$id'";
        $result = mysqli_query($link, $query1);
        if($result)
        {
            echo "<script>
                window.location.href='table.php?id=$qid';
                </script>";
            exit();
        }
        else
        {
            echo "Try Again";
        }
        mysqli_close($link);
?>
