<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['zmsaid'] == 0)) {
    header('location:logout.php');
} else {
    //Code Deletion
    if ($_GET['del']) {
        $aid = $_GET['id'];
        mysqli_query($con, "delete from tblanimal where ID ='$aid'");
        echo "<script>alert('Data Deleted');</script>";
        echo "<script>window.location.href='index.php?act=manage-animals'</script>";
    }
?>

    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Manage Animals - Zoo Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="admin/assets/images/icon/favicon.ico">
        <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="admin/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="admin/assets/css/themify-icons.css">
        <link rel="stylesheet" href="admin/assets/css/metisMenu.css">
        <link rel="stylesheet" href="admin/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="admin/assets/css/slicknav.min.css">
        <!-- amcharts css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
        <!-- Start datatable css -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
        <!-- style css -->
        <link rel="stylesheet" href="admin/assets/css/typography.css">
        <link rel="stylesheet" href="admin/assets/css/default-css.css">
        <link rel="stylesheet" href="admin/assets/css/styles.css">
        <link rel="stylesheet" href="admin/assets/css/responsive.css">
        <!-- modernizr css -->
        <script src="admin/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>

        <!-- page container area start -->
        <div class="page-container">
            <!-- sidebar menu area start -->
            <?php include_once('includes/sidebar.php'); ?>
            <!-- sidebar menu area end -->
            <!-- main content area start -->
            <div class="main-content">
                <!-- header area start -->
                <?php include_once('includes/header.php'); ?>
                <!-- header area end -->
                <!-- page title area start -->
                <?php include_once('includes/pagetitle.php'); ?>
                <!-- page title area end -->
                <div class="main-content-inner">
                    <div class="row">
                        <!-- data table start -->
                        <div class="col-12 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Manage Animals</h4>
                                    <div class="data-tables">
                                        <table class="table text-center">
                                            <thead class="bg-light text-capitalize">
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>Cage Number</th>
                                                    <th>Animal Name</th>
                                                    <th>Creation Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $cnt = 1;
                                            foreach ($animals as $row) {

                                            ?>
                                                <tbody>
                                                    <tr data-expanded="true">
                                                        <td><?php echo $cnt; ?></td>

                                                        <td><?php echo $row['CageNumber']; ?></td>
                                                        <td><?php echo $row['AnimalName']; ?>(<?php echo $row['Breed']; ?>)</td>
                                                        <td><?php echo $row['CreationDate']; ?></td>
                                                        <td><a href="index.php?act=edit-animal-details&editid=<?php echo $row['ID']; ?>" class="btn btn-primary btn-xs">Edit</a>
                                                            <a href="index.php?act=manage-animals&id=<?php echo $row['ID'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-xs">Delete</a>

                                                    </tr>
                                                <?php
                                                $cnt = $cnt + 1;
                                            } ?>
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- data table end -->


                    </div>
                </div>
            </div>
            <!-- main content area end -->
            <!-- footer area start-->
            <?php include_once('includes/footer.php'); ?>
            <!-- footer area end-->
        </div>
        <!-- page container area end -->


        <!-- jquery latest version -->
        <script src="admin/assets/js/vendor/jquery-2.2.4.min.js"></script>
        <!-- bootstrap 4 js -->
        <script src="admin/assets/js/popper.min.js"></script>
        <script src="admin/assets/js/bootstrap.min.js"></script>
        <script src="admin/assets/js/owl.carousel.min.js"></script>
        <script src="admin/assets/js/metisMenu.min.js"></script>
        <script src="admin/assets/js/jquery.slimscroll.min.js"></script>
        <script src="admin/assets/js/jquery.slicknav.min.js"></script>

        <!-- Start datatable js -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
        <!-- others plugins -->
        <script src="admin/assets/js/plugins.js"></script>
        <script src="admin/assets/js/scripts.js"></script>
    </body>

    </html>
<?php }  ?>