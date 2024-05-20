<?php
session_start();
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
    $adminuser = $_POST['username'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['zmsaid'] = $ret['ID'];
        header('location:index.php?act=dashboard');
    } else {
        echo '<script>alert("Invalid Detail.")</script>';
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - Zoo Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="admin/admin/assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="admin/assets/css/metisMenu.css">
    <link rel="stylesheet" href="admin/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="admin/assets/css/typography.css">
    <link rel="stylesheet" href="admin/assets/css/default-css.css">
    <link rel="stylesheet" href="admin/assets/css/styles.css">
    <link rel="stylesheet" href="admin/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="admin/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="#" method="post" name="login">

                    <div class="login-form-head">
                        <h4>Zoo Management System</h4>
                        <p>Hello there, Sign in and start managing your Admin Template</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">User Name</label>
                            <input type="text" id="username" name="username" required="true">
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="password" name="password" required="true">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">

                            </div>
                            <div class="col-6 text-right">
                                <a href="forgot-password.php">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit" name="login">Submit <i class="ti-arrow-right"></i></button>

                        </div>
                        <div style="padding-top: 20px">
                            <a href="../index.php">Back Home!!</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="admin/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="admin/assets/js/popper.min.js"></script>
    <script src="admin/assets/js/bootstrap.min.js"></script>
    <script src="admin/assets/js/owl.carousel.min.js"></script>
    <script src="admin/assets/js/metisMenu.min.js"></script>
    <script src="admin/assets/js/jquery.slimscroll.min.js"></script>
    <script src="admin/assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="admin/assets/js/plugins.js"></script>
    <script src="admin/assets/js/scripts.js"></script>
</body>

</html>