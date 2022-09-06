<?php
session_start();
if(!isset($_SESSION['fname'])){
    header('location: ../../../index.php');
}
include "../connection.php"; 
$bcfid=$_SESSION['BCFid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Lecture</title>
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
    if(isset($_POST['btnupdate']))
    {
        $file = $_FILES['File']['name'];
        $target = "../../../File/".basename($file);
        if (move_uploaded_file($_FILES['File']['tmp_name'], $target)) {
            $msg = "File uploaded successfully";
        }else{
            $msg = "File to upload image";
        }
        $id=$_GET['id'];
        $name=$_POST['txtname'];
        $query1 = "UPDATE lecture SET l_name='$name',l_file='$file' l_bcfid='$bcfid' WHERE l_id = '$id'";
        $result1 = mysqli_query($link, $query1);
        if($result1)
        {
            echo "<script>
                window.location.href='table.php?id=$bcfid';
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
            $query = "SELECT * FROM lecture WHERE l_id = '$id'";
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
                window.location.href='table.php?id=$bcfid';
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
                                Update Lecture
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                <form method="post" enctype="multipart/form-data">    
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="txtname" class="form-control" value="<?php echo $row["l_name"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line ">
                                            <input name="File" type="file" multiple />
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