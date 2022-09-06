<?php
 session_start();
 if(!isset($_SESSION['fname'])){
     header('location: ../../../index.php');
 }
 include "../connection.php"; 
 $bcfid=$_SESSION['BCFid'];
        $id=$_GET['id'];
        $query = "DELETE FROM quiz WHERE q_id = '$id'";
        $result = mysqli_query($link, $query);
        if($result)
        {
            $query1 = "DELETE FROM quizquestion WHERE qq_quizid = '$id'";
            $result1 = mysqli_query($link, $query1);
            if($result1)
            {
                echo "<script>
                window.location.href='table.php?id=$bcfid';
                </script>";
            exit();
            }else{
                echo "Try Again";    
            }
        }
        else
        {
            echo "Try Again";
        }
        mysqli_close($link);
?>
