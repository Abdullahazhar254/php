<?php
ob_start();
session_start();
if(!isset($_SESSION['stid'])){
    header('location: ../../../index.php');
}
include "../connection.php";
// quizid
$id=$_GET['id'];
$stdid=$_SESSION['stid'];
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../../Admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../../Admin/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../../Admin/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="../../../Admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="../../../Admin/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="../../../Admin/plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="../../../Admin/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../../Admin/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../../Admin/css/themes/all-themes.css" rel="stylesheet" />       
    <style>
        input[type="radio"]{
            position : relative !important;
            left : 1px !important;
            opacity:1 !important;
        }
    </style>
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
                                        $query = "SELECT * FROM quizquestion WHERE qq_quizid='$id'";
                                        $result = mysqli_query($link, $query);
                                        $count=0;
                                        if($result){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                        $obtmark=0;
                                                        $quesid=$row['qq_id'];
                                                        ?>
                                    <form method="post">
                                            <p> <?php echo $row['qq_question']; ?>   (Marks : <?php echo $row['qq_marks']; ?>) </p>
                                            
                                            <div class="demo-radio-button">
                                            <input name="option<?php echo $count ?>" type="radio" class="radio-col-light-green" value="<?php echo $row['qq_option1']; ?>" />
                                                <?php echo $row['qq_option1']; ?></br>
                                                <input name="option<?php echo $count ?>" type="radio" class="radio-col-light-green" value="<?php echo $row['qq_option2']; ?>" />
                                                <?php echo $row['qq_option2']; ?></br>
                                                <input name="option<?php echo $count ?>" type="radio" class="radio-col-light-green" value="<?php echo $row['qq_option3']; ?>" />
                                                <?php echo $row['qq_option3']; ?></br>
                                                <input name="option<?php echo $count ?>" type="radio" class="radio-col-light-green" value="<?php echo $row['qq_option4']; ?>" />
                                                <?php echo $row['qq_option4']; ?>
                                            </div>
                                        <?php
                                                        $correctAns=$row['qq_correctans'];
                                                        $tmarks=$row['qq_marks'];
                                                        if(isset($_POST['btninsert'])){
                                                            if($qrow['q_enddate']>=date("Y-m-d")){
                                                                $var='option'.$count;
                                                                $answer=$_POST[$var];
                                                                if($answer == $correctAns){
                                                                    $obtmark=$tmarks;
                                                                }else{
                                                                    $obtmark=0;
                                                                }
                                                                $subquery="INSERT INTO quizsubmit(qs_quizid,qs_questionid,qs_studentid,qs_answer,qs_obtmark,qs_tmark) VALUES('$id','$quesid','$stdid','$answer','$obtmark','$tmarks')";
                                                                $subresult=mysqli_query($link,$subquery);
                                                                if($subresult){
                                                                    echo "<script>
                                                                    window.location.href='result.php?id=$id';
                                                                    </script>";
                                                                }else{
                                                                    echo 'Failed';
                                                                }
                                                            }elseif($qrow['q_enddate']<date("Y-m-d")){
                                                                $var='option'.$count;
                                                                $answer=$_POST[$var];
                                                                if($answer == $correctAns){
                                                                    $tttmarks=$tmarks/2;
                                                                    $obtmark=$tttmarks;
                                                                }else{
                                                                    $obtmark=0;
                                                                }
                                                                $subquery="INSERT INTO quizsubmit(qs_quizid,qs_questionid,qs_studentid,qs_answer,qs_obtmark,qs_tmark) VALUES('$id','$quesid','$stdid','$answer','$obtmark','$tmarks')";
                                                                $subresult=mysqli_query($link,$subquery);
                                                                if($subresult){
                                                                    echo "<script>
                                                                    window.location.href='result.php?id=$id';
                                                                    </script>";
                                                                }else{
                                                                    echo 'Failed';
                                                                }    
                                                            }
                                                            
                                                        
                                                        }
                                                        $count++;
                                                }//while close
                                            } 
                                        } else{
                                            echo "Failed";
                                        }
                                        
                                        mysqli_close($link);
                                                ?>
                                        <input type="submit" name="btninsert" value="Submit" class="btn btn-success" /><br><br>                
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

<!-- Autosize Plugin Js -->
<script src="../../../Admin/plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="../../../Admin/plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="../../../Admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Bootstrap Datepicker Plugin Js -->
<script src="../../../Admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!-- Custom Js -->
<script src="../../../Admin/js/admin.js"></script>
<script src="../../../Admin/js/pages/forms/basic-form-elements.js"></script>

<!-- Demo Js -->
<script src="../../../Admin/js/demo.js"></script>



</body>
</html>