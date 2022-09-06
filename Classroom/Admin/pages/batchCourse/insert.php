<?php
session_start();
if(!isset($_SESSION['adname'])){
    header('location: ../../../index.php');
} 
    include "../connection.php";
    $sql1=" SELECT * FROM batch";
    $result1=mysqli_query($link,$sql1);

    $sql2=" SELECT * FROM course";
    $result2=mysqli_query($link,$sql2);
    
    $sql3=" SELECT * FROM faculty";
    $result3=mysqli_query($link,$sql3);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Add Batch Course</title>
    

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
if(isset($_POST['btninsert']))
{
    $batch=$_POST['txtbatch'];
    $course=$_POST['txtcourse'];
    $faculty=$_POST['txtfaculty'];
	$query="INSERT INTO batchcf(bcf_batchId,bcf_courseId,bcf_facultyId) VALUES ('$batch','$course','$faculty')";
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
                <h2>Batch Course</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add New Batch Course
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                            <form  method="post">
                                
                                    <div class="form group">
                                    <select name="txtbatch" class="form-control">
                                            <option>Select Batch</option>
                                            <?php
                                            while ($row = mysqli_fetch_array($result1,MYSQLI_NUM)) {
                                                echo "<option value=".$row["0"].">".$row["1"]."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div><br />
                                    <div class="form group">
                                    <select name="txtcourse" class="form-control" >
                                            <option>Select Course</option>
                                            <?php
                                            while ($row = mysqli_fetch_array($result2,MYSQLI_NUM)) {
                                                echo "<option value=".$row["0"].">".$row["1"]."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div><br />
                                    <div class="form group">
                                    <select name="txtfaculty" class="form-control">
                                            <option>Select Faculty</option>
                                            <?php
                                            while ($row = mysqli_fetch_array($result3,MYSQLI_NUM)) {
                                                echo "<option value=".$row["0"].">".$row["1"]."</option>";
                                            }
                                            ?>
                                        </select>
                                        </div><br />
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