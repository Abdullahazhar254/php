<?php
session_start();
if(!isset($_SESSION['adname'])){
    header('location: ../../../index.php');
} 
    include "../connection.php";
    $sql1=" SELECT * FROM batch";
    $result1=mysqli_query($link,$sql1);
    if(mysqli_num_rows($result1) == 1)
            {
                $row1 = mysqli_fetch_array($result1 , MYSQLI_ASSOC);
            }

    $sql2=" SELECT * FROM course";
    $result2=mysqli_query($link,$sql2);
    if(mysqli_num_rows($result2) == 1)
            {
                $row2 = mysqli_fetch_array($result2 , MYSQLI_ASSOC);
            }
    
    $sql3=" SELECT * FROM faculty";
    $result3=mysqli_query($link,$sql3);
    if(mysqli_num_rows($result3) == 1)
            {
                $row3 = mysqli_fetch_array($result3 , MYSQLI_ASSOC);
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Batch Course</title>
    
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
<?php 
include '../../adminDashboardstart.php'; 
if(isset($_POST['btnupdate']))
    {
        $id=$_GET['id'];
        $batch=$_POST['txtbatch'];
        $course=$_POST['txtcourse'];
        $faculty=$_POST['txtfaculty'];
        $query1 = "UPDATE batchcf SET bcf_batchId='$batch',bcf_courseId='$course',bcf_facultyId='$faculty' WHERE bcf_id = '$id'";
        $result1 = mysqli_query($link, $query1);
        if($result1)
        {
            echo "<script>
                window.location.href='table.php';
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
            $query = "SELECT * FROM batchcf WHERE bcf_id = '$id'";
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
                window.location.href='table.php';
                </script>";
    }
?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Batch Course</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Update Batch Course
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                            <form  method="post">
                                
                                    <div class="form-group">
                                    <select name="txtbatch" class="form-control inputelement" >
                                            <option><?php echo $row["bcf_batchId"]; ?></option>
                                            <?php
                                            while ($row1 = mysqli_fetch_array($result1,MYSQLI_NUM)) {
                                                echo "<option value=".$row1["0"].">".$row1["1"]."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <select name="txtcourse" class="form-control inputelement" >
                                            <option><?php echo $row["bcf_courseId"]; ?></option>
                                            <?php
                                            while ($row2 = mysqli_fetch_array($result2,MYSQLI_NUM)) {
                                                echo "<option value=".$row2["0"].">".$row2["1"]."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <select name="txtfaculty" class="form-control inputelement" >
                                            <option><?php echo $row["bcf_facultyId"]; ?></option>
                                            <?php
                                            while ($row3 = mysqli_fetch_array($result3,MYSQLI_NUM)) {
                                                echo "<option value=".$row3["0"].">".$row3["1"]."</option>";
                                            }
                                            ?>
                                        </select>
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