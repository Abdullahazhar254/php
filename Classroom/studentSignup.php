
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign Up | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="Admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="Admin/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="Admin/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="Admin/css/style.css" rel="stylesheet">
</head>

<body class="signup-page">
      
<?php
ob_start();
include "connection.php";
    $sql=" SELECT * FROM batch";
    $result=mysqli_query($link,$sql);
include 'Head.php';
if(isset($_POST['btninsert']))
{
    $fname=$_POST['txtfname'];
    $lname=$_POST['txtlname'];
    $email=$_POST['txtemail'];
    $pass=$_POST['txtpass'];
    $batch=$_POST['txtbatch'];
    $regist=$_POST['txtReg'];
    $stat=2;
	$query="INSERT INTO student(s_fname,s_lname,s_email,s_password,s_registrationNo,s_batchId,st_status) VALUES ('$fname','$lname','$email','$pass','$regist','$batch','$stat')";
	$result=mysqli_query($link,$query);
	if($result)
	{
        echo 'Successfull';
        header("location: index.php");
	}
	else
	{
		echo 'Failed';	
    }
    mysqli_close($link);
}
ob_end_flush();
?>

    <div class="signup-box">
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST">
                    <div class="msg">Student Signup</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="txtfname" placeholder="Full Name" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="txtemail" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="txtlname" placeholder="User Name" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="txtpass" minlength="4" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">assignment_ind</i>
                        </span>
                        <div class="form-line">
                            <input type="number" class="form-control" name="txtReg" placeholder="Registeration Number" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">book</i>
                        </span>
                        <div class="form-line">
                        <select class="form-control show-tick" name="txtbatch">
                            <option>Select Batch</option>
                            <?php
                            while ($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
                                echo "<option value=".$row["0"].">".$row["1"]."</option>";
                            }
                            ?>
                        </select>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name="btninsert" >SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="studentSignin.php">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="Admin/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="Admin/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="Admin/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="Admin/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="Admin/js/admin.js"></script>
    <script src="Admin/js/pages/examples/sign-up.js"></script>
</body>

</html>