<?php
session_start();
if(!isset($_SESSION['fname'])){
    header('location: ../../../index.php');
}
include "../connection.php"; 
// quizid
$id=$_GET['id'];
$_SESSION['quizid']=$id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Question</title>
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
                                Quiz Question
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                            <a href="insert.php?id=<?php echo $id?>"><input type="submit" value="Add New Quiz Question" class="btn btn-success"/></a><br><br>
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Option1</th>
                                        <th>Option2</th>
                                        <th>Option3</th>
                                        <th>Option4</th>
                                        <th>Mark</th>
                                        <th>Answer</th>
                                        <th>Quiz</th>
                                        <th>Option</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $query = "SELECT * FROM quizquestion WHERE qq_quizid='$id'";
                                        $result = mysqli_query($link, $query);
                                        if($result){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                    echo "<tr>";
                                                        echo "<td>" . $row['qq_id'] . "</td>";
                                                        echo "<td>" . $row['qq_question'] . "</td>";
                                                        echo "<td>" . $row['qq_option1'] . "</td>";
                                                        echo "<td>" . $row['qq_option2'] . "</td>";
                                                        echo "<td>" . $row['qq_option3'] . "</td>";
                                                        echo "<td>" . $row['qq_option4'] . "</td>";
                                                        echo "<td>" . $row['qq_marks'] . "</td>";
                                                        echo "<td>" . $row['qq_correctans'] . "</td>";
                                                        echo "<td>" . $row['qq_quizid'] . "</td>";
                                                        echo "<td>";
                                                            echo "<a href='update.php?id=". $row['qq_id'] ."'><input type='submit' value='Update' class='btn btn-info'/></a>&nbsp&nbsp";
                                                            echo "<a href='delete.php?id=". $row['qq_id'] ."'><input type='submit' value='Delete' class='btn btn-danger'/></a>";
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