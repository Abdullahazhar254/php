<?php
session_start();
if(!isset($_SESSION['stname'])){
    header('location: ../../index.php');
}
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../Admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../Admin/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../Admin/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../Admin/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../Admin/css/themes/all-themes.css" rel="stylesheet" />    
</head>
<body>
<?php include '../StudentDashboard.php'; ?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <span>HOME</span>
                </h2>
            </div>
                
                        <?php
                        $bid=$_SESSION['stbatch_id'];
                        
                        $query = "SELECT bcf.bcf_id,b.b_name,c.c_name,f.f_fname FROM batchcf bcf JOIN batch b ON bcf.bcf_batchId = b.b_id JOIN course c ON bcf.bcf_courseId = c.c_id JOIN faculty f ON bcf.bcf_facultyId = f.f_id Where bcf.bcf_batchId='$bid'";
                        $result = mysqli_query($link, $query);
                        if($result){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    ?>
                                <a href ="Gallery.php?id=<?php echo $row['bcf_id']?>"><div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="card">
                                        <div class="header bg-cyan">
                                            <h2>
                                                <?php echo $row['c_name']; ?>
                                                <small> Batch : <?php echo $row['b_name']; ?> </small>
                                            </h2>
                                        </div>
                                        <div class="body">
                                            Faculty : <?php echo $row['f_fname']; ?>
                                        </div>
                                    </div>
                                </div></a>    
                                    <?php                      
                                }
                            } 
                        } else{
                            echo "Failed";
                        }
                        mysqli_close($link);
                        ?>
            
            </div>
    </section>
<!-- Jquery Core Js -->
<script src="../../Admin/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../../Admin/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="../../Admin/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../../Admin/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../../Admin/plugins/node-waves/waves.js"></script>

<!-- Chart Plugins Js -->
<script src="../../Admin/plugins/chartjs/Chart.bundle.js"></script>

<!-- Custom Js -->
<script src="../../Admin/js/admin.js"></script>
<script src="../../Admin/js/pages/charts/chartjs.js"></script>

<!-- Demo Js -->
<script src="../../Admin/js/demo.js"></script>
</body>
</html>