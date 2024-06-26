<?php
if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:index.php?act=logout');
} else {

?>

    <!DOCTYPE html>
    <html>

    <head>

        <title>Railway Pass Management System | Add Pass</title>
        <!-- Core CSS - Include with every page -->
        <link href="assets/admin/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/admin/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
        <link href="assets/admin/assets/css/style.css" rel="stylesheet" />
        <link href="assets/admin/assets/css/main-style.css" rel="stylesheet" />



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
                        <h1 class="page-header">Add Pass</h1>
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

                                            <div class="form-group"> <label for="exampleInputEmail1">Full Name</label> <input type="text" name="fullname" value="" class="form-control" required='true'> </div>
                                            <div class="form-group"> <label for="exampleInputEmail1">Profile Image</label> <input type="file" name="propic" value="" class="form-control" required='true'> </div>
                                            <div class="form-group"> <label for="exampleInputEmail1">Contact Number</label> <input type="text" name="cnumber" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+"> </div>
                                            <div class="form-group"> <label for="exampleInputEmail1">Email Address</label> <input type="email" name="email" value="" class="form-control" required='true'> </div>
                                            <div class="form-group"> <label for="exampleInputEmail1">Identity Type</label><select type="text" name="identitytype" value="" class="form-control" required='true'>
                                                    <option value="">Choose Identity Type</option>
                                                    <option value="Voter Card">Voter Card</option>
                                                    <option value="PAN Card">PAN Card</option>
                                                    <option value="Adhar Card">Adhar Card</option>
                                                    <option value="Student Card">Student Card</option>
                                                    <option value="Driving License">Driving License</option>
                                                    <option value="Passport">Passport</option>
                                                    <option value="Any Official Card">Any Official Card</option>
                                                    <option value="Any Other Govt Issued Doc">Any Other Govt Issued Doc</option>
                                                </select></div>
                                            <div class="form-group"> <label for="exampleInputEmail1">Identity Card No.</label> <input type="text" name="icnum" value="" class="form-control" required='true'> </div>
                                            <div class="form-group"> <label for="exampleInputEmail1">Category</label><select type="text" name="category" value="" class="form-control" required='true'>
                                                    <?php
                                                    foreach ($result2 as $row) {
                                                    ?>
                                                        <option value="<?php echo htmlentities($row->CategoryName); ?>"><?php echo htmlentities($row->CategoryName); ?></option>
                                                    <?php } ?>
                                                </select></div>
                                            <div class="form-group"> <label for="exampleInputEmail1">Source</label> <input type="text" name="source" value="" class="form-control" required='true'> </div>
                                            <div class="form-group"> <label for="exampleInputEmail1">Destination</label> <input type="text" name="destination" value="" class="form-control" required='true'> </div>
                                            <div class="form-group"> <label for="exampleInputEmail1">Class of Pass Eligible</label><select type="text" name="trainclass" value="" class="form-control" required='true'>
                                                    <option value="">Choose Class</option>
                                                    <option value="IA">IA</option>
                                                    <option value="I">I</option>
                                                    <option value="IIA">IIA</option>
                                                    <option value="II Class">II Class</option>
                                                    <option value="Slepper">Slepper</option>
                                                    <option value="General">General</option>

                                                </select></div>
                                            <div class="form-group"> <label for="exampleInputEmail1">From Date</label> <input type="date" name="fromdate" value="" class="form-control" required='true'> </div>
                                            <div class="form-group"> <label for="exampleInputEmail1">To Date</label> <input type="date" name="todate" value="" class="form-control" required='true'> </div>

                                            <div class="form-group"> <label for="waytype">Way Type</label><select type="text" name="waytype" value="" class="form-control" required='true'>
                                                    <option value="">Choose type</option>
                                                    <option value="Single Way">Single Way</option>
                                                    <option value="Two Way">Two Way</option>


                                                </select></div>

                                            <div class="form-group"> <label for="exampleInputEmail1">Cost</label> <input type="text" name="cost" value="" class="form-control" required='true'> </div>
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