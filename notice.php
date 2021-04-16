<?php
include './include/header.php';
include './include/config.php';
?>

<div class="breadcrumb-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Notice</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb text-center">
                            <li><a href="index.php">Home</a>
                            </li>
                            <li>Notice</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Latest News Area Start--> 
<div class="latest-area bg-white" style="padding-top: 50px;padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>Latest Notice</h3>
                        <p>GMCA organizes many training programs for students, faculty members, and industrial persona</p>
                        </div>
                </div>
            </div>
        </div>
        <div class="row">
                   <div class="single-latest-text">
                    <ul>
<?php $sel = "SELECT * FROM `notice`"; $qry = mysqli_query($con, $sel); while
($row = mysqli_fetch_assoc($qry)) { //               ?> <h4><li style="list-style-type: circle;"><?php echo
$row['details']?></li></h4> <?php }?>
</ul>
 </div>
        </div>        
    </div>
</div>

<!--End of Latest News Area--> 
<?php
include './include/footer.php';
?>