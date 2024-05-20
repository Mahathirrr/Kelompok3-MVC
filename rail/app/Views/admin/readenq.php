<?php
if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:index.php?act=logout');
} else {


?>
    <!DOCTYPE html>
    <html>

    <head>

        <title>Railway Pass Management System | Read Enquiry</title>
        <!-- Core CSS - Include with every page -->
        <link href="assets/admin/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/admin/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
        <link href="assets/admin/assets/css/style.css" rel="stylesheet" />
        <link href="assets/admin/assets/css/main-style.css" rel="stylesheet" />

        <!-- Page-Level CSS -->
        <link href="assets/admin/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

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
                    <!--  page header -->
                    <div class="col-lg-12">
                        <h1 class="page-header">Read Enquiry</h1>
                    </div>
                    <!-- end  page header -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>
                                                <th>Email</th>

                                                <th>Enquiry Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $row) {               ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo htmlentities($cnt); ?></td>
                                                        <td><?php echo htmlentities($row->Name); ?></td>
                                                        <td><?php echo htmlentities($row->Email); ?></td>
                                                        <td>
                                                            <span class="badge badge-primary"><?php echo htmlentities($row->EnquiryDate); ?></span>
                                                        </td>
                                                        <td><a href="index.php?act=view_enquiry&viewid=<?php echo htmlentities($row->ID); ?>">View Details</a></td>
                                                    </tr>
                                            <?php $cnt = $cnt + 1;
                                                }
                                            } ?>


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
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
        <!-- Page-Level Plugin Scripts-->
        <script src="assets/admin/assets/plugins/dataTables/jquery.dataTables.js"></script>
        <script src="assets/admin/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>

    </body>

    </html>
<?php }  ?>