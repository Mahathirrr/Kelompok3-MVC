<?php
if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:index.php?act=logout');
} else {



?>
    <!DOCTYPE html>
    <html>

    <head>

        <title>Railway Pass Management System | Search Pass</title>
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
                        <h1 class="page-header">Search Pass</h1>
                    </div>
                    <!-- end  page header -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <form method="post">
                                    <div class="form-group">
                                        <label>Search by Pass Number/Mobile Number / Name</label>
                                        <input id="searchdata" type="text" name="searchdata" required="true" class="form-control">
                                    </div>

                                    <br>
                                    <button type="submit" class="btn btn-primary" name="search" id="submit">Search</button>
                                </form>


                                <div class="table-responsive">
                                    <?php
                                    if (isset($_POST['search'])) {

                                        $sdata = $_POST['searchdata'];
                                    ?>
                                        <h4 align="center">Result against "<?php echo $sdata; ?>" keyword </h4>
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>Pass Number</th>
                                                    <th>Full Name</th>
                                                    <th>Contact Number</th>
                                                    <th>Email</th>
                                                    <th>Creation Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php


                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $row) {               ?>
                                                        <tr>
                                                            <td><?php echo htmlentities($cnt); ?></td>
                                                            <td><?php echo htmlentities($row->PassNumber); ?></td>
                                                            <td><?php echo htmlentities($row->FullName); ?></td>
                                                            <td><?php echo htmlentities($row->ContactNumber); ?></td>
                                                            <td><?php echo htmlentities($row->Email); ?></td>
                                                            <td><?php echo htmlentities($row->PasscreationDate); ?></td>
                                                            <td><a href="index.php?act=view_pass_detail&viewid=<?php echo htmlentities($row->ID); ?>" class="btn btn-primary btn-sm">View</a> <a href="index.php?act=edit_pass_detail&viewid=<?php echo htmlentities($row->ID); ?>" class="btn btn-info btn-sm">Edit</a></td>
                                                        </tr>
                                                    <?php
                                                        $cnt = $cnt + 1;
                                                    }
                                                } else { ?>
                                                    <tr>
                                                        <td colspan="8"> No record found against this search</td>

                                                    </tr>

                                            <?php }
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