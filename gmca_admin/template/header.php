
<body class="ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary ks-page-loading"> <!-- remove ks-page-header-fixed to unfix header -->


        <!-- BEGIN HEADER -->
        <nav class="navbar ks-navbar" style="height: 110px">
            <!-- BEGIN LOGO -->
            <div href="index.php" class="navbar-brand">
                <!-- BEGIN RESPONSIVE SIDEBAR TOGGLER -->
                <a href="#" class="ks-sidebar-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>
                <a href="#" class="ks-sidebar-mobile-toggle mt-5" style="font-size: 30px;"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>
                <!-- END RESPONSIVE SIDEBAR TOGGLER -->
                <div class="ks-navbar-logo">
                    <a href="index.php" class="ks-logo"></a>
                    <div class="col-md-2"> 
                        <img class="centerMe mt-5" src="assets/img/clglogo.png" alt=""/> 
                    </div>
                </div>
            </div>
            <!-- END LOGO -->

            <!-- BEGIN MENUS -->
            <div class="ks-wrapper">
                <nav class="nav navbar-nav">
                    <!-- BEGIN NAVBAR MENU -->
                    <div class="ks-navbar-menu">

                    </div>
                    <!--BEGIN NAVBAR USER--> 
                    <div class="ks-user mt-3">
                        <a class="nav-link"  href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php
                                $sel="SELECT * FROM `registration` WHERE `reg_id`='".$_SESSION['reg_id']."'";
                                $qry=mysqli_query($con,$sel);
                                $row=mysqli_fetch_assoc($qry);

                            if(!$row['profile']==""){
                                $img_path=$row['profile'];
                            }else{
                                $img_path="avatar.png";
                            }

                            ?>
                            <img src="<?Php echo 'assets/img/registration/'.$img_path; ?>" width="46" height="46" class="ks-avatar rounded-circle">
                            &nbsp;<div class="ks-info">
                                <div class="ks-name"><?php echo ucwords($_SESSION['name']); ?></div>
                            </div>
                        </a>

                        <!-- END NAVBAR USER -->
                    </div>
                    <!--</nav>-->
                    <!-- END NAVBAR ACTIONS -->
                </nav>

                <!-- END NAVBAR MENU TOGGLER -->
            </div>
            <!-- END MENUS -->
            <!-- END HEADER INNER -->
        </nav>
        <!-- END HEADER -->
</body>
</html>