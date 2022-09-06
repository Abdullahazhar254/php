<?php
ob_start();
session_start();
include "../connection.php";
if(!isset($_SESSION['fname'])){
    header('location: ../../../index.php');
}
// batchcourseid
$id=$_GET['id'];
ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Add Assignment</title>
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
    $name=$_POST['txtname'];
    $descript=$_POST['txtdescript'];
    $sdate=$_POST['stdate'];
    $edate=$_POST['endDate'];
    $mark=$_POST['txtmark'];
    $query="INSERT INTO assignment(a_name,a_description,a_startDate,a_endDate,a_file,a_mark,a_BCFid) VALUES ('$name','$descript','$sdate','$edate','$file','$mark','$id')";
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
                                Add New Assignment
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                <form method="post" enctype="multipart/form-data">    
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="txtname" class="form-control" placeholder="Enter Assignment Title" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <textarea name="txtdescript" class="form-control inputelement" placeholder="Enter Details" required ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="date" name="stdate" class="form-control inputelement" placeholder="Enter Start Date" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="date" name="endDate" class="form-control inputelement" placeholder="Enter End Date" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="txtmark" class="form-control inputelement" placeholder="Enter Marks" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line ">
                                            <input name="File" type="file" multiple />
                                        </div>
                                    </div>
                                    <input type="submit" name="btninsert" value="Insert" class="btn btn-success" />
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