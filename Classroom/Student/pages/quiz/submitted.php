<?php
ob_start();
session_start();
if(!isset($_SESSION['stid'])){
    header('location: ../../../index.php');
}
include "../connection.php";
// batchcourseid
$id=$_GET['id'];
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
<?php include '../../StudentDashboard.php'; ?>

<section class="content">
        <div class="container-fluid">
            <!-- No Header Card -->
            <div class="block-header">
                <h2><span>Course > Assignment</span></h2>
            </div>
            <div class="row">
                <?php
                    $stid=$_SESSION['stid'];
                    $query1 = "SELECT * FROM quiz WHERE q_BCFid='$id' ";
                    $result1 = mysqli_query($link, $query1);
                    if($result1){
                        if(mysqli_num_rows($result1) > 0){
                            while($row = mysqli_fetch_array($result1)){
                                $q_id=$row['q_id'];
                                $querysub="SELECT *FROM quizsubmit WHERE qs_quizid='$q_id' AND qs_studentid='$stid'";
                                $resultsub = mysqli_query($link, $querysub);
                                if($resultsub){
                                    if(mysqli_num_rows($resultsub) > 0){
                                    

                                            
                            ?>
                <a href="result.php?id=<?php echo $row['q_id'] ?>" >
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body  bg-light-green">
                            <h3><?php echo $row['q_name'] ?></h3>
                            <h4>Start Date : <?php echo $row['q_startdate'] ?></h4>
                            <h4>End Date : <?php echo $row['q_enddate'] ?></h4>
                            <h4>Click to view Quiz result.</h4>
                        </div>
                    </div>
                </div>
                </a>
                <?php
                }
                else{
                                    }
                                }
                                else{
                                }
                            }
                        } 
                    } else{
                        echo mysqli_error($link);
                        echo "Failed";
                    }
                    mysqli_close($link);
                ?>
            </div>
            <!-- #END# No Header Card -->
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