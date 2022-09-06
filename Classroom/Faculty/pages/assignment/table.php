<?php
ob_start();
session_start();
include "../connection.php";
if(!isset($_SESSION['fname'])){
    header('location: ../../../index.php');
}
// BATCH COURSE ID
$id=$_GET['id'];
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment Record</title>
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
            <div class="block-header">
                <h2>
                    <span>Course</span>
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Assignment
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                            <a href="insert.php?id=<?php echo $id?>"><input type="submit" value="Add New Assignment" class="btn btn-success"/></a><br><br>
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Marks</th>
                                            <th>File</th>
                                            <th>Batch Course</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $query = "SELECT * FROM assignment WHERE a_BCFid='$id'";
                                    $result = mysqli_query($link, $query);
                                    if($result){
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){
                                                echo "<tr>";
                                                    echo "<td>" . $row['a_id'] . "</td>";
                                                    echo "<td>" . $row['a_name'] . "</td>";
                                                    echo "<td>" . $row['a_description'] . "</td>";
                                                    echo "<td>" . $row['a_startDate'] . "</td>";
                                                    echo "<td>" . $row['a_endDate'] . "</td>";
                                                    echo "<td>" . $row['a_mark'] . "</td>";
                                                    echo "<td><a href='../File/".$row['a_file']."' target='_blank' > File </a></td>" . $row['a_file'] . "</td>";
                                                    echo "<td>" . $row['a_BCFid'] . "</td>";
                                                    echo "<td>";
                                                        echo "<a href='update.php?id=". $row['a_id'] ."'><input type='submit' value='Update' class='btn btn-info'/></a>&nbsp&nbsp";
                                                        echo "<a href='delete.php?id=". $row['a_id'] ."'><input type='submit' value='Delete' class='btn btn-danger'/></a>";
                                                    echo "</td>";
                                                echo "</tr>";
                                            }
                                        } 
                                    } else{
                                        echo "Failed";
                                    }
                                    mysqli_close($link);
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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