<?php
ob_start();
session_start();
if(!isset($_SESSION['stid'])){
    header('location: ../../index.php');
}
include "connection.php";
$id=$_GET['id'];
$_SESSION['BCFid']=$id;
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../Admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../Admin/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../Admin/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../Admin/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../Admin/css/themes/all-themes.css" rel="stylesheet" />    
</head>
<body>
<?php include '../StudentDashboard.php'; ?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <span>Course</span>
                </h2>
            </div>
            
            <!-- Widgets -->
            <div class="row clearfix">
            <a href="Lecture/table.php?id=<?php echo $id?>">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">library_books</i>
                        </div>
                        <div class="content">
                            <div class="text"><h3>LECTURE</h3></div>
                        </div>
                    </div>
                </div>
                </a>

                <a href="assignment/Gallery.php?id=<?php echo $id?>" >
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text"><h3>ASSIGNMENT</h3></div>
                        </div>
                    </div>
                </div>
                </a>
                <a href="quiz/Gallery.php?id=<?php echo $id?>">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">question_answer</i>
                        </div>
                        <div class="content">
                            <div class="text"><h3>QUIZ</h3></div>
                        </div>
                    </div>
                </div>
                </a>
                <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW VISITORS</div>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- #END# Widgets -->
            
        </div>
    </section>
<!-- Jquery Core Js -->
<script src="../../Admin/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../../Admin/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="../../Admin/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../../Admin/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../../Admin/plugins/node-waves/waves.js"></script>

<!-- Chart Plugins Js -->
<script src="../../Admin/plugins/chartjs/Chart.bundle.js"></script>

<!-- Custom Js -->
<script src="../../Admin/js/admin.js"></script>
<script src="../../Admin/js/pages/charts/chartjs.js"></script>

<!-- Demo Js -->
<script src="../../Admin/js/demo.js"></script>
</body>
</html>