<?php
session_start();
if(!isset($_SESSION['adname'])){
    header('location: ../../../index.php');
} 
    include "../connection.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Add Faculty</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
</head>
<body>
<?php 
include '../../adminDashboardstart.php'; 
if(isset($_POST['btninsert']))
{
    $fname=$_POST['txtfname'];
    $lname=$_POST['txtlname'];
    $email=$_POST['txtemail'];
    $pass=$_POST['txtpass'];
    $stat=1;
	$query="INSERT INTO faculty(f_fname,f_lname,f_email,f_password,f_status) VALUES ('$fname','$lname','$email','$pass','$stat')";
	$result=mysqli_query($link,$query);
	if($result)
	{
        echo 'Successfull';
        echo "<script>
        window.location.href='table.php';
        </script>";
	}
	else
	{
		echo 'Failed';	
    }
    mysqli_close($link);
}

?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Faculty</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add New Faculty
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                            <form  method="post">
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="txtfname" class="form-control inputelement" placeholder="Enter Name" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="txtlname" class="form-control inputelement" placeholder="Enter Username" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="email" name="txtemail" class="form-control inputelement" placeholder="Enter Email" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="password" name="txtpass" class="form-control inputelement" placeholder="Enter Password" required />
                                        </div>
                                    </div>
                                <input type="submit" name="btninsert" value="Insert" class="btn btn-success" /><br><br>                
                            </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
        </div>
    </section>
    
<!-- Jquery Core Js -->
<script src="../../plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../../plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../../plugins/node-waves/waves.js"></script>

<!-- Chart Plugins Js -->
<script src="../../plugins/chartjs/Chart.bundle.js"></script>

<!-- Custom Js -->
<script src="../../js/admin.js"></script>
<script src="../../js/pages/charts/chartjs.js"></script>

<!-- Demo Js -->
<script src="../../js/demo.js"></script>
</body>
</html>