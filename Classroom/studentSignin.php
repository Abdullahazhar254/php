<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Student Sign In</title>
    <!-- Favicon-->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="Admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="Admin/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="Admin/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="Admin/css/style.css" rel="stylesheet">
</head>

<body class="login-page">

<?php
ob_start(); 
session_start();
include 'Head.php';
include "connection.php";

if (isset($_POST['login']))
{
    $stat=1;
    $username= ($_POST['username']);
	$password= ($_POST['password']);
	$select="SELECT * FROM student WHERE (s_email='$username' OR s_lname='$username') AND s_password='$password' AND st_status='$stat'";
    $run=mysqli_query($link, $select);
    if ($run) { 
	  $row=mysqli_fetch_row($run);
	  $_SESSION['stid']=$row[0];
	  $_SESSION['stname']=$row[1];
      $_SESSION['stbatch_id']=$row[11];
      echo 'Successfull';
	  header("location: Student/pages/StudentDash.php");
    }
    else{
      echo "<script>alert('Invalid Username or Password')</script>";
    }
    mysqli_close($link);
}
ob_end_flush();
?>

<div class="login-box">
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Student Signin</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username or Email" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" name="login">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="studentSignup.php">Register Now!</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Jquery Core Js -->
    <script src="Admin/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="Admin/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="Admin/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="Admin/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="Admin/js/admin.js"></script>
    <script src="Admin/js/pages/examples/sign-in.js"></script>
</body>

</html>