<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
    <!-- navbar-header -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php?act=dashboard">
            <strong style="color: white;font-size: 30px">RPMS</strong>
        </a>
    </div>
    <!-- end navbar-header -->
    <!-- navbar-top-links -->
    <ul class="nav navbar-top-links navbar-right">
        <!-- main dropdown -->



        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-3x"></i>
            </a>
            <!-- dropdown user-->
            <ul class="dropdown-menu dropdown-user">
                <li><a href="index.php?act=admin_profile"><i class="fa fa-user fa-fw"></i>User Profile</a>
                </li>
                <li><a href="index.php?act=change_password"><i class="fa fa-gear fa-fw"></i>Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="index.php?act=logout"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                </li>
            </ul>
            <!-- end dropdown-user -->
        </li>
        <!-- end main dropdown -->
    </ul>
    <!-- end navbar-top-links -->

</nav>