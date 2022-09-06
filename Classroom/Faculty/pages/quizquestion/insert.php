<?php 
session_start();
if(!isset($_SESSION['fname'])){
    header('location: ../../../index.php');
}
include "../connection.php";
// $sql=" SELECT * FROM quiz";
// $result=mysqli_query($link,$sql); 
// quizid
$id=$_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Add Quiz Question</title>
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

if(isset($_POST['btninsert']))
{
    $ques=$_POST['txtques'];
    $opt1=$_POST['opt1'];
    $opt2=$_POST['opt2'];
    $opt3=$_POST['opt3'];
    $opt4=$_POST['opt4'];
    $mark=$_POST['mark'];
    $ans=$_POST['ans'];
    $quizid=$id;
	$query="INSERT INTO quizquestion(qq_question, qq_option1, qq_option2, qq_option3, qq_option4, qq_marks, qq_correctans, qq_quizid) VALUES ('$ques','$opt1','$opt2','$opt3','$opt4','$mark','$ans','$quizid')";
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
<?php include '../../FacultyDashboard.php'; ?>

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
                                Add New Quiz Question
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                            <form  method="post">
                                    
                                    <div class="form-group">
                                        <div class="form-line">
                                        <textarea type="text" name="txtques" class="form-control inputelement" placeholder="Enter Question" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="opt1" class="form-control inputelement" placeholder="Enter option 1" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="opt2" class="form-control inputelement" placeholder="Enter option 2" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="opt3" class="form-control inputelement" placeholder="Enter option 3" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="opt4" class="form-control inputelement" placeholder="Enter option 4" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="number" name="mark" class="form-control inputelement" placeholder="Enter question marks" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="ans" class="form-control inputelement" placeholder="Enter correct answer" required />
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