<?php

if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:index.php?act=logout');
} else {

?>
    <!DOCTYPE html>
    <html>

    <head>

        <title>Railway Pass Management System | Dashboard</title>
        <!-- Core CSS - Include with every page -->
        <link href="assets/admin/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/admin/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
        <link href="assets/admin/assets/css/style.css" rel="stylesheet" />
        <link href="assets/admin/assets/css/main-style.css" rel="stylesheet" />

        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>

    </head>

    <body>
        <!--  wrapper -->
        <div id="wrapper">
            <!-- navbar top -->
            <?php include_once('lib/header.php'); ?>
            <!-- end navbar top -->

            <!-- navbar side -->
            <?php include_once('lib/sidebar.php'); ?>
            <!-- end navbar side -->
            <!--  page-wrapper -->
            <div id="page-wrapper">
                <div class="row">
                    <!-- page header -->
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!--end page header -->
                </div>

                <div class="row">
                    <!--quick info section -->
                    <div class="col-lg-6">

                        <div class="alert alert-danger text-center">
                            <div class="panel-body red">
                                <i class="fa fa-file fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo htmlentities($totalcat); ?> </b>
                                <a href="manage-category.php" style="color:#fff">Total Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="alert alert-success text-center">
                            <div class="panel-body yellow">
                                <i class="fa  fa-users fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo htmlentities($totalpass); ?></b>
                                <a href="manage-pass.php" style="color:#000"> Total Pass</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="alert alert-info text-center">

                            <div class="panel-body red">
                                <i class="fa fa-file fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo htmlentities($today_pass); ?></b> <a href="todays-pass.php" style="color:#fff">Pass Created Today</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="alert alert-warning text-center">
                            <div class="panel-body yellow">
                                <i class="fa  fa-file fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo htmlentities($yes_pass); ?></b> <a href="yesterdays-pass.php">Pass Created Yesterday </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="alert alert-info text-center">
                            <div class="panel-body green">
                                <i class="fa  fa-file fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo htmlentities($seven_pass); ?></b> <a href="last-7days-pass.php">Pass Created in Seven Days</a>
                            </div>
                        </div>
                    </div>
                    <!--end quick info section -->

                    <div class="col-lg-6">

                        <div class="alert alert-danger text-center">
                            <div class="panel-body red">
                                <i class="fa fa-file fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b style="color:#fff"><?php echo htmlentities($totalunreadquery); ?> </b>
                                <a href="unreadenq.php" style="color:#fff">Total Unread Query</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">

                        <div class="alert alert-success text-center">
                            <div class="panel-body blue">
                                <i class="fa fa-file fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b style="color:#fff"><?php echo htmlentities($totalreadquery); ?> </b>
                                <a href="readenq.php" style="color:#fff">Total Read Query</a>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <!-- end page-wrapper -->

        </div>
        <!-- end wrapper -->

        <!-- Core Scripts - Include with every page -->
        <script src="assets/admin/assets/plugins/jquery-1.10.2.js"></script>
        <script src="assets/admin/assets/plugins/bootstrap/bootstrap.min.js"></script>
        <script src="assets/admin/assets/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="assets/admin/assets/plugins/pace/pace.js"></script>
        <script src="assets/admin/assets/scripts/siminta.js"></script>

    </body>

    </html>
<?php }  ?>