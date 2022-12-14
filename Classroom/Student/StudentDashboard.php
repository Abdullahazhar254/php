<?php
ob_start();
if(!isset($_SESSION)){ 
    session_start();
   
if(!isset($_SESSION['stname'])){
    header('location: ../../index.php');
}
}
include "connection.php";
$batch_id=$_SESSION['stbatch_id'];
$querys = "SELECT bcf.bcf_id,c.c_name FROM batchcf bcf JOIN course c ON bcf.bcf_courseId = c.c_id WHERE bcf.bcf_batchId = '$batch_id'";
$results = mysqli_query($link, $querys);
                            
ob_end_flush();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title></title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../Admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../Admin/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../Admin/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../Admin/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../Admin/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../Admin/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
<?php 
$try=dirname($_SERVER['PHP_SELF']);
?>
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <?php
                        if ($try=="/classroom/Student/pages")
                        {
                            ?>
                            <a class="navbar-brand" href="StudentDash.php">My Classroom</a>
                            <?php
                        }else if($try=="/classroom/Student/pages/Lecture"||$try=="/classroom/Student/pages/assignment"||$try=="/classroom/Student/pages/quiz")
                        {
                            ?>
                <a class="navbar-brand" href="../StudentDash.php">My Classroom</a>            
                            <?php
                        }
                        ?>
                
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                <?php
                        if ($try=="/classroom/Student/pages")
                        {
                            ?>
                            <li><a href="../../signout.php"><i class="material-icons">input</i></a></li>
                            <?php
                        }else if($try=="/classroom/Student/pages/Lecture"||$try=="/classroom/Student/pages/assignment"||$try=="/classroom/Student/pages/quiz")
                        {
                            ?>
                        <li><a href="../../../signout.php"><i class="material-icons">input</i></a></li>            
                            <?php
                        }
                        ?>    
                
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <p style="color:white;">Student</p>
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['stname']; ?></div>
                
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <?php
                        if ($try=="/classroom/Student/pages")
                        {
                            ?>
                            <a href="StudentDash.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                            </a>
                            <?php
                        }else if($try=="/classroom/Student/pages/Lecture"||$try=="/classroom/Student/pages/assignment"||$try=="/classroom/Student/pages/quiz")
                        {
                            ?>
                            <a href="../StudentDash.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                            </a>
                            
                            <?php
                        }
                        ?>
                        
                    </li>
                    <li>
                    <?php
                        if ($try=="/classroom/Student/pages")
                        {
                            ?>
                            <a href="profile.php">
                            <i class="material-icons">person</i>
                            <span>Profile</span>
                            </a>
                            <?php
                        }else if($try=="/classroom/Student/pages/Lecture"||$try=="/classroom/Student/pages/assignment"||$try=="/classroom/Student/pages/quiz")
                        {
                            ?>
                            <a href="../profile.php">
                            <i class="material-icons">person</i>
                            <span>Profile</span>
                            </a>
                            <?php
                        }
                        ?>
                        
                    </li>
                    <!-- <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons">insert_invitation</i>
                            <span>Calender</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">class</i>
                            <span>Course</span>
                        </a>
                        <ul class="ml-menu">
                        
                        <?php
                            while($rows = mysqli_fetch_array($results)){
                                echo "<li>";
                                if ($try=="/classroom/Student/pages")
                                {
                                    echo "<a href='Gallery.php?id=" .$rows['bcf_id']."' > " .$rows['c_name']. " </a>";
                                }else if($try=="/classroom/Student/pages/Lecture"||$try=="/classroom/Student/pages/assignment"||$try=="/classroom/Student/pages/quiz")
                                {
                                    echo "<a href='../Gallery.php?id=" .$rows['bcf_id']."' > " .$rows['c_name']. " </a>";
                                }
                                echo "</li>";
                            }
                        ?>

                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                <?php
                        if ($try=="/classroom/Student/pages")
                        {
                            ?>
                            &copy; 2020 <a href="StudentDash.php">My Classroom</a>.
                            <?php
                        }else if($try=="/classroom/Student/pages/Lecture"||$try=="/classroom/Student/pages/assignment"||$try=="/classroom/Student/pages/quiz")
                        {
                            ?>
                        &copy; 2020 <a href="../StudentDash.php">My Classroom</a>.            
                            <?php
                        }
                        ?>
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <!-- <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside> -->
        <!-- #END# Right Sidebar -->
    </section>

    

    <!-- Jquery Core Js -->
    <script src="../Admin/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../Admin/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../Admin/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../Admin/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../Admin/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../Admin/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="../Admin/plugins/raphael/raphael.min.js"></script>
    <script src="../Admin/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="../Admin/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="../Admin/plugins/flot-charts/jquery.flot.js"></script>
    <script src="../Admin/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="../Admin/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="../Admin/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="../Admin/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="../Admin/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="../Admin/js/admin.js"></script>
    <script src="../Admin/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="../Admin/js/demo.js"></script>
</body>

</html>
