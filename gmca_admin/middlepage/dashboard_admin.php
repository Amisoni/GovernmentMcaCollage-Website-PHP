    <div class="ks-page-content">
        <div class="ks-page-content-body" style="width: 100%;">
            <div class="ks-dashboard-tabbed-sidebar">
                <div class="ks-dashboard-tabbed-sidebar-widgets">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="card ks-widget-payment-simple-amount-item ks-orange">
                                <a href="home.php?page=faculties_list"><div class="payment-simple-amount-item-icon-block">
                                        <span class="la la-users ks-icon"></span>
                                    </div></a>
                                <a href="home.php?page=faculties_list">
                                    <div class="payment-simple-amount-item-body">
                                        <div class="payment-simple-amount-item-amount">
                                            <span class="ks-amount"> 
                                                <?php
                                                $query = "select count(*) as count from registration where no=1";
                                                $result = mysqli_query($con, $query);
                                                if ($result) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    echo $row['count'];
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="payment-simple-amount-item-description">
                                            Total Faculties
                                        </div>
                                </div></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card ks-widget-payment-simple-amount-item ks-orange">
                                <a href="home.php?page=admin_list"><div class="payment-simple-amount-item-icon-block">
                                        <span class="la la-user ks-icon"></span>
                                    </div></a>
                                <a href="home.php?page=admin_list">
                                    <div class="payment-simple-amount-item-body">
                                        <div class="payment-simple-amount-item-amount">
                                            <span class="ks-amount">
                                            <!--<span class="ks-amount-icon ks-icon-circled-up-right"></span>-->
                                                <?php
                                                $query = "select count(*) as count from  registration where no=0";
                                                $result = mysqli_query($con, $query);
                                                if ($result) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    echo $row['count'];
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="payment-simple-amount-item-description">
                                            Total Admin 
                                            <!--<span class="ks-progress-type">(+$1.89)</span>-->
                                        </div>
                                    </div></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="card ks-widget-payment-simple-amount-item ks-orange">
                                <a href="home.php?page=feedback_list"><div class="payment-simple-amount-item-icon-block">
                                        <span class="la la-comment ks-icon"></span>
                                    </div></a>
                                <a href="home.php?page=feedback_list">
                                    <div class="payment-simple-amount-item-body">
                                        <div class="payment-simple-amount-item-amount">
                                            <span class="ks-amount"> 
                                                <?php
                                                $query = "select count(*) as count from feedback";
                                                $result = mysqli_query($con, $query);
                                                if ($result) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    echo $row['count'];
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="payment-simple-amount-item-description">
                                            Total Feedback
                                        </div>
                                </div></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card ks-widget-payment-simple-amount-item ks-orange">
                                <a href="home.php?page=contact_us_list"><div class="payment-simple-amount-item-icon-block">
                                        <span class="la la-envelope ks-icon"></span>
                                    </div></a>
                                <a href="home.php?page=contact_us_list">
                                    <div class="payment-simple-amount-item-body">
                                        <div class="payment-simple-amount-item-amount">
                                            <span class="ks-amount">
                                            <!--<span class="ks-amount-icon ks-icon-circled-up-right"></span>-->
                                                <?php
                                                $query = "select count(*) as count from  contact_us";
                                                $result = mysqli_query($con, $query);
                                                if ($result) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    echo $row['count'];
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="payment-simple-amount-item-description">
                                            Total Contact Us
                                            <!--<span class="ks-progress-type">(+$1.89)</span>-->
                                        </div>
                                    </div></a>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>