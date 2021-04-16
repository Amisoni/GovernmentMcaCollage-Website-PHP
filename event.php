<?php
include './include/header.php';
include './include/config.php';
?>
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Our Events</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb text-center">
                            <li><a href="index.php">Home</a></li>
                            <li>Events</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Event Area Start-->
<div class="event-area section-padding bg-white" style="padding-top: 50px;padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>OUR EVENTS</h3>
                        <p>GMCA organizes many training programs for students, faculty members, and industrial personal</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            $sel = "SELECT * FROM `event`";
            $qry = mysqli_query($con, $sel);
            while ($row = mysqli_fetch_assoc($qry)) {
                $img_path = $row['image'];
                $date = $row['date'];
                $newDate = date("d-m-Y", strtotime($date));
                ?>
                <div class="col-md-4 col-sm-6" style="padding-bottom: 20px;">
                    <div class="single-event-item">
                        <div class="single-event-image">
                            <a href="#">
                                <span><?php echo $newDate; ?></span>
                                <img src="<?php echo 'http://localhost/GMCA/gmca_admin/assets/img/event/' . $img_path; ?>">
                            </a>
                        </div>

                        <div class="single-event-text">
                            <h4><a href="#"> <?php echo $row['name']; ?></a></h4>
                            <div class="single-item-comment-view">
                            </div>
                            <p> <?php echo $row['details'] ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!--End of Event Area-->

<?php
include './include/footer.php';
?>