<?php
ob_start();
session_start();
if(!isset($_SESSION['stid'])){
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
            <div class="block-header">
                <h2>Course > Quiz</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                            <?php
                            $tmarks=0;
                            $obtmarks=0;
                            $qsql=" SELECT * FROM quiz WHERE q_id= '$id'";
                            $qresult=mysqli_query($link,$qsql);
                            if(mysqli_num_rows($qresult) == 1)
                            {
                                $qrow = mysqli_fetch_array($qresult , MYSQLI_ASSOC);
                            }
                                echo $qrow['q_name']; 
                            ?>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                <?php
                                        $stdid=$_SESSION['stid'];
                                        $qsquery = "SELECT q.q_name,qq.qq_question,qs.qs_answer,qq.qq_correctans,qs.qs_obtmark,qs.qs_tmark FROM quizsubmit qs JOIN quiz q ON qs.qs_quizid=q.q_id JOIN quizquestion qq ON qs.qs_questionid=qq.qq_id WHERE qs_quizid='$id' AND qs_studentid='$stdid'";
                                        $qsresult = mysqli_query($link, $qsquery);
                                        if($qsresult){
                                            if(mysqli_num_rows($qsresult) > 0){
                                                while($qsrow = mysqli_fetch_array($qsresult)){
                                                        
                                                        ?>
                                        <p><?php echo $qsrow['qq_question']; ?>  (Marks : <?php echo $qsrow['qs_obtmark']."/".$qsrow['qs_tmark']; ?> )</p>
                                        <p><b>Your Answer:</b><?php echo $qsrow['qs_answer']; ?></p>
                                        <p><b>Correct Answer: <?php echo $qsrow['qq_correctans']; ?></b></p>
                                            <?php
                                                $tmarks+=$qsrow['qs_tmark'];
                                                $obtmarks+=$qsrow['qs_obtmark'];

                                                }//while close
                                                ?>                
                                    </form>
                                    <?php
                                            } 
                                        } else{
                                            echo "Failed";
                                        }
                                        mysqli_close($link);
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h3>
                            <?php echo "TOTAL MARKS : ".$obtmarks."/".$tmarks ?>
                            </h3>
                            <a href="../StudentDash.php"><input type="submit" value="Go to Home" class="btn btn-success" /></a>
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