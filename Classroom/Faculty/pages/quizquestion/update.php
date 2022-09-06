<?php
session_start();
if(!isset($_SESSION['fname'])){
    header('location: ../../../index.php');
}
include "../connection.php"; 
$qid=$_SESSION['quizid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Quiz Question</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script> 
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
    if(isset($_POST['btnupdate']))
    {
        $id=$_GET['id'];
        $ques=$_POST['txtques'];
        $opt1=$_POST['opt1'];
        $opt2=$_POST['opt2'];
        $opt3=$_POST['opt3'];
        $opt4=$_POST['opt4'];
        $mark=$_POST['mark'];
        $ans=$_POST['ans'];
        $query1 = "UPDATE quizquestion SET qq_question='$ques', qq_option1='$opt1', qq_option2='$opt2', qq_option3='$opt3', qq_option4='$opt4', qq_marks='$mark', qq_correctans='$ans', qq_quizid='$qid' WHERE qq_id = '$id'";
        $result1 = mysqli_query($link, $query1);
        if($result1)
        {
            echo "<script>
                window.location.href='table.php?id=$qid';
                </script>";
            exit();
        }
        else
        {
            echo "Try Again";
        }
        mysqli_close($link);
    }
    else{
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $query = "SELECT * FROM quizquestion WHERE qq_id = '$id'";
            $result = mysqli_query($link, $query);
            if(mysqli_num_rows($result) == 1)
            {
                $row = mysqli_fetch_array($result , MYSQLI_ASSOC);
            }
            mysqli_close($link);
        }
    }
    

    if(isset($_POST['btnback']))
    {
        echo "<script>
                window.location.href='table.php?id=$qid';
                </script>";
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
                                Add New Quiz Question
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                            <form  method="post">
                                    
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="txtques" class="form-control inputelement" value="<?php echo $row["qq_question"]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="opt1" class="form-control inputelement" value="<?php echo $row["qq_option1"]; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="opt2" class="form-control inputelement" value="<?php echo $row["qq_option2"]; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="opt3" class="form-control inputelement" value="<?php echo $row["qq_option3"]; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="opt4" class="form-control inputelement" value="<?php echo $row["qq_option4"]; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="number" name="mark" class="form-control inputelement" value="<?php echo $row["qq_marks"]; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="ans" class="form-control inputelement" value="<?php echo $row["qq_correctans"]; ?>" required />
                                        </div>
                                    </div>
                                    <input type="submit" name="btnupdate" value="Update" class="btn btn-success" />
                                    <input type="submit" name="btnback" value="Back" class="btn btn-info" />                
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