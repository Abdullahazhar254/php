<?php 
session_start();
if(!isset($_SESSION['stname'])){
    header('location: ../../index.php');
}
$id=$_SESSION['stid'];
include "connection.php";
$sql=" SELECT * FROM student WHERE s_id= '$id'";
$result=mysqli_query($link,$sql);
if(mysqli_num_rows($result) == 1)
{
    $srow = mysqli_fetch_array($result , MYSQLI_ASSOC);
}

if(isset($_POST['btnupdate']))
{
    $name=$_POST['txtfname'];
    $email=$_POST['txtemail'];
    $user=$_POST['txtlname'];
    $phone=$_POST['txtphoneno'];
    $parentno=$_POST['txtparentno'];
    $city=$_POST['txtcity'];
    $country=$_POST['txtcountry'];
    $query1 = "UPDATE student SET s_fname='$name',s_email='$email',s_lname='$user',s_phoneNo='$phone',s_parentContact='$parentno',s_city='$city',s_country='$country' WHERE s_id = '$id'";
    $result1 = mysqli_query($link, $query1);
    if($result1)
    {
        echo "<script>
        window.location.href='profile.php';
        </script>";
        exit();
    }
    else
    {
        echo "Try Again";
    }
    mysqli_close($link);
}

if(isset($_POST['btnpass']))
{
    $oldpass=$_POST['OldPass'];
    $newpass=$_POST['txtnewpass'];
    if($oldpass == $row['s_password'])
    {
        $query2 = "UPDATE student SET s_password='$newpass'  WHERE s_id = '$id'";
        $result2 = mysqli_query($link, $query2);
        if($result2)
        {
            echo "<script>
            window.location.href='profile.php';
            </script>";
            exit();
        }
        else
        {
            echo "<script>alert('Try Again')</script>";
        }
    }
    else{
        echo "<script>alert('Invalid Old Password')</script>";
    }
    mysqli_close($link);
}

$file;
if(isset($_POST['btnimg']))
{
    $file = $_FILES['File']['name'];
    $target = "../image/".basename($file);
    if (move_uploaded_file($_FILES['File']['tmp_name'], $target)) {
        $msg = "File uploaded successfully";
    }else{
        $msg = "File to upload image";
    }
    $query3="UPDATE student SET s_image='$file' WHERE s_id = '$id' ";
	$result3=mysqli_query($link,$query3);
	if($result3)
	{
        echo "<script>
                window.location.href='profile.php';
                </script>";
        exit();
	}
	else
	{
		echo "<script>alert('Try Again')</script>";	
    }
    
}
                                    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
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
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="../image/<?php echo $srow['s_image']; ?>" alt="AdminBSB - Profile Image" width="150" height="150"/>
                            </div>
                            <div class="content-area">
                                
                                <?php

                                    echo "<h3>".$srow['s_fname']."</h3>";
                                    echo "<p>".$srow['s_email']."</p>";
                                
                                ?>
                                <p>STUDENT</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                    <li role="presentation"><a href="#edit_image" aria-controls="settings" role="tab" data-toggle="tab">Edit Image</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-body">
                                                <div class="post">
                                                    <div class="post-heading">
                                                        <h4>Name</h4>
                                                        <p><?php echo $srow['s_fname']; ?></p>
                                                        <h4>Email</h4>
                                                        <p><?php echo $srow['s_email']; ?></p>
                                                        <h4>Username</h4>
                                                        <p><?php echo $srow['s_lname']; ?></p>
                                                        <h4>Registration Number</h4>
                                                        <p><?php echo $srow['s_registrationNo']; ?></p>
                                                        <h4>Phone Number</h4>
                                                        <p><?php 
                                                        if($srow['s_phoneNo']==null){
                                                            echo "Edit Number";
                                                        }
                                                        else{
                                                            echo $srow['s_phoneNo'];
                                                        } ?></p>
                                                        <h4>Parent Contact Number</h4>
                                                        <p><?php 
                                                        if($srow['s_parentContact']==null){
                                                            echo "Edit Parent Number";
                                                        }
                                                        else{
                                                            echo $srow['s_parentContact'];
                                                        } ?></p>
                                                        <h4>City</h4>
                                                        <p><?php echo $srow['s_city']; ?></p>
                                                        <h4>Country</h4>
                                                        <p><?php echo $srow['s_country']; ?></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- profile form start -->

                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                        <form class="form-horizontal" method="post">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="txtfname" value="<?php echo $srow['s_fname'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" name="txtemail" value="<?php echo $srow['s_email'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Username</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="txtlname" value="<?php echo $srow['s_lname'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Phone Number</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="txtphoneno" value="<?php echo $srow['s_phoneNo'] ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Parent Contact</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="txtparentno" value="<?php echo $srow['s_parentContact'] ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">City</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="txtcity" value="<?php echo $srow['s_city'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Country</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="txtcountry" value="<?php echo $srow['s_country'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                <input type="submit" name="btnupdate" value="Update" class="btn btn-info" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    
                                    <!-- Password form -->

                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal" method="post">
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="OldPassword" name="OldPass" placeholder="Old Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="txtnewpass" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                <input type="submit" name="btnpass" value="Update Password" class="btn btn-danger" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <!-- image form  -->

                                    <div role="tabpanel" class="tab-pane fade in" id="edit_image">
                                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Image</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input name="File" type="file" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                <input type="submit" name="btnimg" value="Edit Image" class="btn btn-info" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- image form end  -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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