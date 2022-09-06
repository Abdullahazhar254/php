<?php
ob_start();
session_start();
if(!isset($_SESSION['fname'])){
    header('location: ../../../index.php');
}
include "../connection.php";
// assignmentid
$id=$_GET['id'];
$_SESSION['asgnid']=$id;
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Assignment Record</title>
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
            <!-- No Header Card -->
            <div class="block-header">
                <h2><span>Course > Assignment</span></h2>
            </div>
            <div class="row">
                <?php
                    $query1 = "SELECT ags.as_id,ag.a_name,ag.a_endDate,ags.as_file,ags.as_date,st.s_fname,st.s_registrationNo,ags.as_marks,ag.a_mark FROM assignmentsub ags JOIN student st ON ags.as_studentId=st.s_id JOIN assignment ag ON ags.as_assignId=ag.a_id WHERE ags.as_assignId='$id' ";
                    $result1 = mysqli_query($link, $query1);
                    if($result1){
                        if(mysqli_num_rows($result1) > 0){
                            while($row = mysqli_fetch_array($result1)){
                            ?>
                
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                    <div class="card">
                        <a href="uploadmark.php?id=<?php echo $row['as_id'];?>">
                        <div class="body">
                            <p><b>Assignment :</b> <?php echo $row['a_name']; ?></p>    
                            <p><b>Student :</b> <?php echo $row['s_fname']; ?></p>
                            <p><b>Student Registration :</b> <?php echo $row['s_registrationNo']; ?></p>
                            <p><b>Submitted On :</b> <?php echo $row['as_date']; ?></p>
                            <p><b>Submit Status :</b> <?php if($row['as_date']<=$row['a_endDate']){
                                echo "Submitted On time";
                            }else{
                                echo "Submitted Late";
                            } ?></p>
                            <p><b>Marks :</b> <?php if($row['as_marks']==null){
                                echo "Marks not given out of ".$row['a_mark'];
                            }else{
                                echo $row['as_marks']. "/" .$row['a_mark'];
                            } ?></p>
                        </div>
                        </a>
                        <a href="../../../File/<?php echo $row['as_file']; ?>" target="_blank" >
                        <div class="header  bg-cyan">
                            <h3><?php echo $row['as_file']; ?></h3>
                        </div>
                        </a>
                    </div>
                </div>
                
                <?php
                            }
                        } 
                    } else{
                        echo "Failed";
                    }
                    mysqli_close($link);
                ?>
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