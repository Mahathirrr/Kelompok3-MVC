<?php
if (strlen($_SESSION['bpmsaid'] == 0)) {
  header('location:index.php?act=logout');
} else {

?>
  <!DOCTYPE html>
  <html>

  <head>

    <title>Railway Pass Management System | Update Image</title>
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
            <h1 class="page-header">Update Image</h1>
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
                          <div class="form-group"> <label for="exampleInputEmail1">Full Name</label> <input type="text" name="fullname" value="<?php echo $row->FullName; ?>" class="form-control" readonly='true'> </div>
                          <div class="form-group"> <label for="exampleInputEmail1">Old Photo</label> <img src="admin/images/<?php echo $row->ProfileImage; ?>" width="50" height="50" value="<?php echo $row->ProfileImage; ?>"> </div>
                          <div class="form-group"> <label for="exampleInputEmail1">New Photo</label> <input type="file" name="propic" accept="image/*"> </div>
                      <?php $cnt = $cnt + 1;
                        }
                      } ?>
                      <p style="padding-left: 450px"><button type="submit" class="btn btn-primary" name="submit" id="submit">Update</button></p>
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