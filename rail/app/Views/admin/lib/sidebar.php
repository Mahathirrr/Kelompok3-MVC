<nav class="navbar-default navbar-static-side" role="navigation">
    <!-- sidebar-collapse -->
    <div class="sidebar-collapse">
        <!-- side-menu -->
        <ul class="nav" id="side-menu">
            <li>
                <!-- user image section-->
                <div class="user-section">

                    <div class="user-section-inner">
                        <img src="/rail/assets/admin/assets/img/user.jpg" alt="">
                    </div>
                    <div class="user-info">
                        <?php
                        $cnt = 1;
                        if ($menu['query']->rowCount() > 0) {
                            foreach ($menu['results'] as $row) {               ?>
                                <div><strong><?php echo $row->AdminName; ?></strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                    </div>
            <?php $cnt = $cnt + 1;
                            }
                        } ?>
                </div>

                <!--end user image section-->
            </li>

            <li>
                <a href="index.php?act=dashboard"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="index.php?act=add_category">Add Category</a>
                    </li>
                    <li>
                        <a href="index.php?act=manage_category">Manage Category</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Passes<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="index.php?act=add_pass">Add Pass</a>
                    </li>
                    <li>
                        <a href="index.php?act=manage_pass">Manage Pass</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="index.php?act=edit_about_us">About Us</a>
                    </li>
                    <li>
                        <a href="index.php?act=edit_contact_us">Contact Us</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Enquiry<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="index.php?act=readenq">Read Enquiry</a>
                    </li>
                    <li>
                        <a href="index.php?act=unreadenq">Unread Enquiry</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>

            <li>
                <a href="index.php?act=search_pass"><i class="fa fa-search"></i> Search</a>

            </li>
            <li>
                <a href="index.php?act=pass_bwdates_report"><i class="fa fa-folder"></i> Report of Pass</a>

            </li>



        </ul>
        <!-- end side-menu -->
    </div>
    <!-- end sidebar-collapse -->
</nav>