<?php 
session_start();
if(!isset($_SESSION['fname'])){
    header('location: ../../../index.php');
}
include "../connection.php"; 
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title></title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../../Admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../../Admin/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../../Admin/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../../Admin/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../../Admin/css/themes/all-themes.css" rel="stylesheet" />
</head>
<body>
<?php
include '../../FacultyDashboard.php';
if(isset($_POST['btninsert']))
{
    $name=$_POST['txtname'];
    $sdate=$_POST['stdate'];
    $edate=$_POST['endDate'];
    $question=$_POST['question'];
    $id=$_GET['id'];
	$query="INSERT INTO quiz(q_name, q_startdate, q_enddate, q_question, q_BCFid) VALUES ('$name','$sdate','$edate','$question','$id')";
	$result=mysqli_query($link,$query);
	if($result)
	{
        echo 'Successfull';
        echo "<script>
                window.location.href='table.php?id=$id';
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
                <h2>Course</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add New Quiz
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                            <form  method="post">
                                    
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="txtname" class="form-control inputelement" placeholder="Enter Quiz title" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="date" name="stdate" class="form-control inputelement" placeholder="Enter Start Date" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="date" name="endDate" class="form-control inputelement" placeholder="Enter End Date" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="number" name="question" class="form-control inputelement" placeholder="Enter Total Question number" required />
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
<script src="../../../Admin/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../../../Admin/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="../../../Admin/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../../../Admin/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../../../Admin/plugins/node-waves/waves.js"></script>

<!-- Chart Plugins Js -->
<script src="../../../Admin/plugins/chartjs/Chart.bundle.js"></script>

<!-- Custom Js -->
<script src="../../../Admin/js/admin.js"></script>
<script src="../../../Admin/js/pages/charts/chartjs.js"></script>

<!-- Demo Js -->
<script src="../../../Admin/js/demo.js"></script>


</body>
</html>