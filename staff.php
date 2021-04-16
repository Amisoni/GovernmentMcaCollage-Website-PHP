<?php
include './include/header.php';
include './include/config.php';
?>
<style>
.single-teacher-item
{
    border-bottom-right-radius: 14px;
    border-bottom-left-radius: 14px;
    padding: 10px;
    border-bottom: solid;
    border-color: #2D3E50;    
}
.single-teacher-item:hover{
    border-color: #E67F22;
}
.single-teacher-text2
{
    text-align: center;
    border-radius: 44px !important;
}
</style>
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Staff</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb text-center">
                            <li><a href="index.php">Home</a>
                            </li>
                            <li>Staff</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Teachers Area Start-->
<div class="teachers-area padding-top" style="padding-top: 50px;padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>OUR STAFF</h3>
                        <!--<p>There are many variations of passages of Lorem Ipsum</p>-->
                        <p></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            $sel = "SELECT * FROM `registration` WHERE no=1";
            $qry = mysqli_query($con, $sel);
            while ($row = mysqli_fetch_assoc($qry)) {
                $sel_user = "SELECT * FROM `user_type` WHERE `no`='" . $row['no'] . "' ";
                $qry_user = mysqli_query($con, $sel_user);
                $row_user = mysqli_fetch_assoc($qry_user);
                $img_path = $row['profile'];
                ?>
                <?php
                $sel1 = "SELECT * FROM `personal_dtls` WHERE `reg_id`='" . $row['reg_id'] . "'";
                $qry1 = mysqli_query($con, $sel1);
                $row1 = mysqli_fetch_assoc($qry1);
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-teacher-item">
                        <div class="single-teacher-image">
                            <a href="staff_detail.php?id=<?php echo $row['reg_id'] ?>">
                                <img src="<?php 
                                if($row['profile']=="")
                                {
                                    echo 'http://localhost/GMCA/gmca_admin/assets/img/registration/avatar.png';
                                }
                                else
                                {
                                echo 'http://localhost/GMCA/gmca_admin/assets/img/registration/' . $img_path;
                                }
                                 ?>" alt="" style="height: 200px;width: 500px;">
                            </a>
                        </div>
                        <div class="single-teacher-text2">
                            <h3><a href="staff_detail.php?id=<?php echo $row['reg_id'] ?>"></a></h3>
                            <h4><?php echo $row['name']; ?></h4>
                            <h4><?php echo $row1['designation']; ?></h4>
                        </div>
                    </div>
                </div>
            <?php } ?>  
        </div>
    </div>
</div>
<!--End of Teachers Area-->
<?php
include './include/footer.php';
?>