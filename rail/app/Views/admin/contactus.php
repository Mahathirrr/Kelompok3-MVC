<?php
if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:index.php?act=logout');
} else {

?>

    <!DOCTYPE html>
    <html>

    <head>

        <title>Railway Pass Management System | Contact Us Page</title>
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
                        <h1 class="page-header">Contact Us</h1>
                    </div>
                    <!--end page header -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form method="post" enctype="multipart/form-data">
                                            <?php

                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $row) {               ?>
                                                    <div class="form-group"> <label for="exampleInputEmail1">Page Title</label> <input type="text" name="pagetitle" id="pagetitle" required="true" value="<?php echo $row->PageTitle; ?>" class="form-control"> </div>
                                                    <div class="form-group"> <label for="exampleInputEmail1">Page Description</label> <textarea type="text" name="pagedes" id="pagedes" required="true" class="form-control"><?php echo $row->PageDescription; ?></textarea> </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email</label>
                                                        <input type="text" name="email" id="email" required="true" value="<?php echo $row->Email; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Mobile Number</label>
                                                        <input type="text" name="mobnum" id="mobnum" required="true" value="<?php echo $row->MobileNumber; ?>" class="form-control" maxlength="10" pattern="[0-9]+">
                                                    </div>
                                            <?php $cnt = $cnt + 1;
                                                }
                                            } ?>


                                            <p style="padding-left: 450px"><button type="submit" class="btn btn-primary" name="submit" id="submit">Add</button></p>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End Form Elements -->
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