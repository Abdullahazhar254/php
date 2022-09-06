<?php
ob_start();
session_start();
if(!isset($_SESSION['fname'])){
    header('location: ../../../index.php');
}
include "../connection.php";
// quizid
$id=$_GET['id'];
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Recived Record</title>
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
<?php include '../../FacultyDashboard.php'; ?>

<section class="content">
        <div class="container-fluid">
            <!-- No Header Card -->
            <div class="block-header">
                <h2><span>Course > Quiz</span></h2>
            </div>
            <div class="row">
                <?php
                    $qsquery1 = "SELECT q.q_name,st.s_id,st.s_fname,st.s_registrationNo,qq.qq_question,qs.qs_answer,qq.qq_correctans,SUM(qs.qs_obtmark),SUM(qs.qs_tmark) FROM quizsubmit qs JOIN quiz q ON qs.qs_quizid=q.q_id JOIN student st ON qs.qs_studentid=st.s_id JOIN quizquestion qq ON qs.qs_questionid=qq.qq_id WHERE qs.qs_quizid='$id' AND qs.qs_studentid=st.s_id group by st.s_fname";
                    $qsresult1 = mysqli_query($link, $qsquery1);
                    if($qsresult1){
                        if(mysqli_num_rows($qsresult1) > 0){
                            while($qsrow = mysqli_fetch_array($qsresult1)){
                                $name=$qsrow['s_fname'];
                                $reg=$qsrow['s_registrationNo'];
                                $quiz=$qsrow['q_name'];
                            
                            ?>
                
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                    <div class="card">
                        
                        <div class="body">
                            <p><?php echo $name; ?></p>
                            <p><?php echo $reg; ?></p>
                            <p><?php echo $quiz; ?></p>
                        </div>
                        <div class="header  bg-light-green">
                            <h3><?php echo "TOTAL MARKS : ".$qsrow['SUM(qs.qs_obtmark)']."/".$qsrow['SUM(qs.qs_tmark)'] ?></h3>
                        </div>
                        
                    </div>
                </div>
                
                <?php
                            }
                        } 
                    } else{
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