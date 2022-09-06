<?php
ob_start();
session_start();
if(!isset($_SESSION['stid'])){
    header('location: ../../../index.php');
}
include "../connection.php";
// assignmentid
$id=$_GET['id'];
$bcfid=$_SESSION['BCFid'];
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
<?php 
include '../../StudentDashboard.php'; 
$file;
if(isset($_POST['btninsert']))
{
    $file = $_FILES['File']['name'];
    $target = "../../../File/".basename($file);
    if (move_uploaded_file($_FILES['File']['tmp_name'], $target)) {
        $msg = "File uploaded successfully";
    }else{
        $msg = "File to upload image";
    }
    $date=date("Y-m-d h:i:sa");
    $assignid=$id;
    $stdid=$_SESSION['stid'];
    $query1="INSERT INTO assignmentsub(as_file,as_date,as_assignId,as_studentId) VALUES ('$file','$date','$assignid','$stdid')";
	$result1=mysqli_query($link,$query1);
	if($result1)
	{
        echo "<script>
                window.location.href='table.php?id=$bcfid';
                </script>";
        echo 'Successfull';
	}
	else
	{
		echo 'Failed';	
    }
    
}
?>

<section class="content">
        <div class="container-fluid">
            <!-- No Header Card -->
            <div class="block-header">
                <h2><span>Course > Assignment</span></h2>
            </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                        <?php
                        $query = "SELECT * FROM assignment WHERE a_id='$id' ";
                        $result = mysqli_query($link, $query);
                        if($result){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                ?>
                                    <h3><?php echo $row['a_name']; ?></h3>
                                    <p><?php echo $row['a_description']; ?></p>
                                    <p>Start Date : <?php echo $row['a_startDate']; ?></p>
                                    <p>End Date : <?php echo $row['a_endDate']; ?></p>
                                    <p>Total Marks : <?php echo $row['a_mark']; ?></p>
                                    <?php if($row['a_file']== null){
                                        ?>
                                        <p>File : No file</p>
                                    <?php
                                    }else{
                                        ?>
                                        <p>File : <a href="../../../File/<?php echo $row['a_file']?>" target="_blank" ><?php echo $row['a_file']; ?></a></p>
                                    <?php
                                        }
                                    } 
                                } 
                            } else{
                                echo "Failed";
                            }
                            mysqli_close($link);
                        ?>
                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h2>
                                Upload Assignment
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                <form method="post" enctype="multipart/form-data">    
                                    <div class="form-group">
                                        <div class="form-line ">
                                            <input name="File" type="file" />
                                        </div>
                                    </div>
                                    <input type="submit" name="btninsert" value="Submit" class="btn btn-success" />
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>

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