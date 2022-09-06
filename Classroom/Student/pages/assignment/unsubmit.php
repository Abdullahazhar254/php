<?php
ob_start();
session_start();
if(!isset($_SESSION['stid'])){
    header('location: ../../../index.php');
}
include "../connection.php";
// assignmentid
$id=$_GET['id'];
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
<?php include '../../StudentDashboard.php'; ?>

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
                        $stdid=$_SESSION['stid'];
                        $query1 = "SELECT ags.as_marks,ags.as_id,ags.as_file,ags.as_date,st.s_fname,ag.a_name,ag.a_description,ag.a_startDate,ag.a_endDate,ag.a_mark,ag.a_file FROM assignmentsub ags JOIN student st ON ags.as_studentId=st.s_id JOIN assignment ag ON ags.as_assignId=ag.a_id WHERE ags.as_assignId='$id' AND ags.as_studentId='$stdid'";
                        $result1 = mysqli_query($link, $query1);
                        if($result1){
                            if(mysqli_num_rows($result1) > 0){
                                while($row1 = mysqli_fetch_array($result1)){
                                ?>
                                    <h3><?php echo $row1['a_name']; ?></h3>
                                    <p><?php echo $row1['a_description']; ?></p>
                                    <p><b>Start Date :</b> <?php echo $row1['a_startDate']; ?></p>
                                    <p><b>End Date :</b> <?php echo $row1['a_endDate']; ?></p>
                                    <p><b>Submitted On :</b> <?php echo $row1['as_date']; ?></p>
                                    <p><b>Submit Status :</b> <?php if($row1['as_date']<=$row1['a_endDate']){
                                        echo "Submitted On time";
                                    }else{
                                        echo "Submitted Late";
                                    } ?></p>
                                    <p><b>Assignment Marks :</b> <?php echo $row1['a_mark']; ?></p>
                                    <?php if($row1['a_file']== null){
                                        ?>
                                        <p><b>File :</b> No file</p>
                                    <?php
                                    }else{
                                        ?>
                                        <p><b>File :</b> <a href="../../../File/<?php echo $row1['a_file']?>" target="_blank" ><?php echo $row1['a_file']; ?></a></p>
                                    <?php
                                        }
                                    
                        ?>
                        
                            <p><b>Marks :</b> <?php if($row1['as_marks']==null){
                                echo "Assignment Not Graded out of ".$row1['a_mark'];
                            }else{
                                echo $row1['as_marks']. "/" .$row1['a_mark'];
                            } ?></p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h2>
                                Uploaded Assignment
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="body">
                                        
                                                <a href="../../../File/<?php echo $row1['as_file']; ?>" target="_blank" >
                                                <p><?php echo $row1['as_file']; ?></p>
                                                </a>
                                        <?php
                                        if($row1['as_marks']!=null){
                                            
                                        }else{
                                            echo "<a href='delete.php?id=". $row1['as_id'] ."'><input type='submit' value='UnSubmit' class='btn btn-danger'/></a>";
                                        }
                                        
                                                }
                                            } 
                                        } else{
                                            echo "Failed";
                                            echo mysqli_error($link);
                                        }
                                        mysqli_close($link);
                                        ?>
                                        </div>
                                    </div>
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