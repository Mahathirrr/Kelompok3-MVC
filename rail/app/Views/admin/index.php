<?php
error_reporting(0);
if (strlen($_SESSION['bpmsaid'] == 1)) {
    header('location:index.php?act=dashboard');
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Railway Pass Management System | Login Page</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/admin/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/admin/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/admin/assets/css/style.css" rel="stylesheet" />
    <link href="assets/admin/assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back">

    <div class="container">

        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
                <h3 style="color: white;">Railway Pass Management System</h3>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" name="login">
                            <fieldset>
                                <div class="form-group">
                                    <label for="login-username">Username</label>
                                    <input type="text" class="form-control" required="true" name="username" value="<?php if (isset($_COOKIE["user_login"])) {
                                                                                                                        echo $_COOKIE["user_login"];
                                                                                                                    } ?>">

                                </div>
                                <div class="form-group">
                                    <label for="login-password">Password</label>
                                    <input type="password" class="form-control" name="password" required="true" value="<?php if (isset($_COOKIE["userpassword"])) {
                                                                                                                            echo $_COOKIE["userpassword"];
                                                                                                                        } ?>">

                                </div>
                                <div class="checkbox">

                                    <input type="checkbox" id="remember" name="remember" <?php if (isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
                                    <label for="keep_me_logged_in">Keep me signed in</label>


                                    <label style="padding-left: 40px">
                                        <a href="forgot-password.php">Lost Password?</a></label>
                                </div>

                                <!-- Change this to a button or input when using this as a form -->

                                <input type="submit" value="Login" class="btn btn-lg btn-success btn-block" name="login">
                            </fieldset>
                        </form>
                        <div>
                            <i class="fa fa-home" style="font-size: 30px" aria-hidden="true"></i>
                            <p><a href="../index.php"> Back Home </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="assets/admin/assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/admin/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/admin/assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>