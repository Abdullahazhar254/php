<?php
session_start();
if(!isset($_SESSION['adname'])){
    header('location: ../../../index.php');
} 
    include "../connection.php";
    $sql=" SELECT * FROM batch";
    $result=mysqli_query($link,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Add Student</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="../../plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="../../plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
</head>
<body>
<?php include '../../adminDashboardstart.php'; ?>
<?php

if(isset($_POST['btninsert']))
{
    $fname=$_POST['txtfname'];
    $lname=$_POST['txtlname'];
    $email=$_POST['txtemail'];
    $pass=$_POST['txtpass'];
    $batch=$_POST['txtbatch'];
    $regist=$_POST['txtReg'];
    $stat=1;
	$query="INSERT INTO student(s_fname,s_lname,s_email,s_password,s_registrationNo,s_batchId,st_status) VALUES ('$fname','$lname','$email','$pass','$regist','$batch','$stat')";
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
                <h2>Student</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add New Student
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                            <form  method="post">
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="txtfname" class="form-control" placeholder="Enter Name" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="txtlname" class="form-control" placeholder="Enter Username" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="email" name="txtemail" class="form-control" placeholder="Enter Email" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="password" name="txtpass" class="form-control" placeholder="Enter Password" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" class="form-control" name="txtReg" placeholder="Enter Registeration Number" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select name="txtbatch" class="form-control show-tick" >
                                            <option>Select Batch</option>
                                            <?php
                                            while ($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
                                                echo "<option value=".$row["0"].">".$row["1"]."</option>";
                                            }
                                            ?>
                                        </select>
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

<!-- Autosize Plugin Js -->
<script src="../../plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="../../plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="../../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Bootstrap Datepicker Plugin Js -->
<script src="../../plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!-- Custom Js -->
<script src="../../js/admin.js"></script>
<script src="../../js/pages/forms/basic-form-elements.js"></script>

<!-- Demo Js -->
<script src="../../js/demo.js"></script>

</body>
</html>