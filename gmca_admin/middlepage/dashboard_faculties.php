    <div class="ks-page-content">
        <div class="ks-page-content-body" style="width: 100%;">
            <div class="ks-dashboard-tabbed-sidebar">
                <div class="ks-dashboard-tabbed-sidebar-widgets">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="card ks-widget-payment-simple-amount-item ks-orange">
                                <a href="home2.php?page=work_list"><div class="payment-simple-amount-item-icon-block">
                                        <span class="la la-briefcase ks-icon"></span>
                                    </div></a>
                                <a href="home2.php?page=faculties_list">
                                    <div class="payment-simple-amount-item-body">
                                        <div class="payment-simple-amount-item-amount">
                                            <span class="ks-amount"> 
                                                <?php
                                                $query = "select count(*) as count from work_exp WHERE `reg_id`='".$_SESSION['reg_id']."'";
                                                $result = mysqli_query($con, $query);
                                                if ($result) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    echo $row['count'];
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="payment-simple-amount-item-description">
                                            Total Work Experience
                                        </div>
                                </div></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card ks-widget-payment-simple-amount-item ks-orange">
                                <a href="home2.php?page=award_list"><div class="payment-simple-amount-item-icon-block">
                                        <span class="la la-trophy ks-icon"></span>
                                    </div></a>
                                <a href="home2.php?page=admin_list">
                                    <div class="payment-simple-amount-item-body">
                                        <div class="payment-simple-amount-item-amount">
                                            <span class="ks-amount">
                                            <!--<span class="ks-amount-icon ks-icon-circled-up-right"></span>-->
                                                <?php
                                                $query = "select count(*) as count from award WHERE `reg_id`='".$_SESSION['reg_id']."'";
                                                $result = mysqli_query($con, $query);
                                                if ($result) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    echo $row['count'];
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="payment-simple-amount-item-description">
                                            Total Award 
                                            <!--<span class="ks-progress-type">(+$1.89)</span>-->
                                        </div>
                                    </div></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="card ks-widget-payment-simple-amount-item ks-orange">
                                <a href="home2.php?page=research_project_list"><div class="payment-simple-amount-item-icon-block">
                                        <span class="la la-cubes ks-icon"></span>
                                    </div></a>
                                <a href="home2.php?page=feedback_list">
                                    <div class="payment-simple-amount-item-body">
                                        <div class="payment-simple-amount-item-amount">
                                            <span class="ks-amount"> 
                                                <?php
                                                $query = "select count(*) as count from research_project WHERE `reg_id`='".$_SESSION['reg_id']."'";
                                                $result = mysqli_query($con, $query);
                                                if ($result) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    echo $row['count'];
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="payment-simple-amount-item-description">
                                            Total Research Project
                                        </div>
                                </div></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card ks-widget-payment-simple-amount-item ks-orange">
                                <a href="home2.php?page=academic_project_list"><div class="payment-simple-amount-item-icon-block">
                                        <span class="la la-university ks-icon"></span>
                                    </div></a>
                                <a href="home2.php?page=contact_us_list">
                                    <div class="payment-simple-amount-item-body">
                                        <div class="payment-simple-amount-item-amount">
                                            <span class="ks-amount">
                                            <!--<span class="ks-amount-icon ks-icon-circled-up-right"></span>-->
                                                <?php
                                                $query = "select count(*) as count from  academic_project WHERE `reg_id`='".$_SESSION['reg_id']."'";
                                                $result = mysqli_query($con, $query);
                                                if ($result) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    echo $row['count'];
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="payment-simple-amount-item-description">
                                            Total Academic Project
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