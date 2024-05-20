
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.php?act=dashboard">Home</a></li>
                    <li><span>Dashboard</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="admin/assets/images/author/avatar.png" alt="avatar">
                <?php
                $adid = $_SESSION['zmsaid'];
                $ret = mysqli_query($con, "select AdminName from tbladmin where ID='$adid'");
                $row = mysqli_fetch_array($ret);
                $name = $row['AdminName'];

                ?>
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $name; ?> <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?act=profile">Profile</a>
                    <a class="dropdown-item" href="index.php?act=change-password">Settings</a>
                    <a class="dropdown-item" href="index.php?act=logout">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>