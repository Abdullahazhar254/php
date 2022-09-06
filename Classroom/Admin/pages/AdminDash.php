<?php 
session_start();
if(!isset($_SESSION['adname'])){
    header('location: ../../index.php');
}
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />    
</head>
<body>
<?php include '../adminDashboardstart.php'; ?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <span>HOME</span>
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Batch Details
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $query = "SELECT * FROM batch";
                                        $result = mysqli_query($link, $query);
                                        if($result){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                    echo "<tr>";
                                                        echo "<td>" . $row['b_id'] . "</td>";
                                                        echo "<td>" . $row['b_name'] . "</td>";
                                                    echo "</tr>";
                                                }
                                            } 
                                        } else{
                                            echo "Failed";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# 1 Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Batch Course Faculty Details
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                        <th>ID</th>
                                        <th>Batch</th>
                                        <th>Course</th>
                                        <th>Faculty</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>ID</th>
                                        <th>Batch</th>
                                        <th>Course</th>
                                        <th>Faculty</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $query1 = "SELECT bcf.bcf_id,b.b_name,c.c_name,f.f_fname FROM batchcf bcf JOIN batch b ON bcf.bcf_batchId = b.b_id JOIN course c ON bcf.bcf_courseId = c.c_id JOIN faculty f ON bcf.bcf_facultyId = f.f_id";
                                        $result1 = mysqli_query($link, $query1);
                                        if($result1){
                                            if(mysqli_num_rows($result1) > 0){
                                                while($row = mysqli_fetch_array($result1)){
                                                    echo "<tr>";
                                                        echo "<td>" . $row['bcf_id'] . "</td>";
                                                        echo "<td>" . $row['b_name'] . "</td>";
                                                        echo "<td>" . $row['c_name'] . "</td>";
                                                        echo "<td>" . $row['f_fname'] . "</td>";
                                                    echo "</tr>";
                                                }
                                            } 
                                        } else{
                                            echo "Failed";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# 2 Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Course Details
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $query2 = "SELECT * FROM course";
                                        $result2 = mysqli_query($link, $query2);
                                        if($result2){
                                            if(mysqli_num_rows($result2) > 0){
                                                while($row = mysqli_fetch_array($result2)){
                                                    echo "<tr>";
                                                        echo "<td>" . $row['c_id'] . "</td>";
                                                        echo "<td>" . $row['c_name'] . "</td>";
                                                    echo "</tr>";
                                                }
                                            } 
                                        } else{
                                            echo "Failed";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# 3 Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Faculty Details
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $query3 = "SELECT f.f_id,f.f_fname,f.f_lname,f.f_email,s.s_status FROM faculty f JOIN status s ON f.f_status=s.s_id";
                                        $result3 = mysqli_query($link, $query3);
                                        if($result3){
                                            if(mysqli_num_rows($result3) > 0){
                                                while($row = mysqli_fetch_array($result3)){
                                                    echo "<tr>";
                                                        echo "<td>" . $row['f_id'] . "</td>";
                                                        echo "<td>" . $row['f_fname'] . "</td>";
                                                        echo "<td>" . $row['f_lname'] . "</td>";
                                                        echo "<td>" . $row['f_email'] . "</td>";
                                                        echo "<td>" . $row['s_status'] . "</td>";
                                                    echo "</tr>";
                                                }
                                            } 
                                        } else{
                                            echo "Failed";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# 4 Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Student Details
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Registration Number</th>
                                            <th>Batch</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Registration Number</th>
                                            <th>Batch</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $query4 = "SELECT st.s_id,st.s_fname,st.s_lname,st.s_email,st.s_registrationNo,b.b_name,s.s_status FROM student st JOIN batch b ON st.s_batchId=b.b_id JOIN status s ON st.st_status=s.s_id";
                                        $result4 = mysqli_query($link, $query4);
                                        if($result4){
                                            if(mysqli_num_rows($result4) > 0){
                                                while($row = mysqli_fetch_array($result4)){
                                                    echo "<tr>";
                                                        echo "<td>" . $row['s_id'] . "</td>";
                                                        echo "<td>" . $row['s_fname'] . "</td>";
                                                        echo "<td>" . $row['s_lname'] . "</td>";
                                                        echo "<td>" . $row['s_email'] . "</td>";
                                                        echo "<td>" . $row['s_registrationNo'] . "</td>";
                                                        echo "<td>" . $row['b_name'] . "</td>";
                                                        echo "<td>" . $row['s_status'] . "</td>";
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
            <!-- #END# 5 Basic Examples -->
            </div>
    </section>
<!-- Jquery Core Js -->
<script src="../plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../plugins/node-waves/waves.js"></script>

<!-- Chart Plugins Js -->
<script src="../plugins/chartjs/Chart.bundle.js"></script>

<!-- Custom Js -->
<script src="../js/admin.js"></script>
<script src="../js/pages/charts/chartjs.js"></script>

<!-- Demo Js -->
<script src="../js/demo.js"></script>
</body>
</html>