<?php
include './include/header.php';
include './include/config.php';
?>

<div class="slider-area">
    <div class="preview-2">
        <div id="nivoslider" class="slides">
            <?php
            $sel = "SELECT * FROM `banner`";
            $qry = mysqli_query($con, $sel);
            $k = 1;
            while ($row = mysqli_fetch_assoc($qry)) {
                $img_path = $row['image'];
                ?>
                <img src= "<?php echo 'img/slider/' . $img_path ?>"  alt="" title="#slider-1-caption<?php echo $k; ?>"/>
                <?php
                $k++;
            }
            ?>
        </div>
        <?php
        $sel1 = "SELECT * FROM `banner`";
        $qry1 = mysqli_query($con, $sel1);
        $d = 1;
        while ($row = mysqli_fetch_assoc($qry1)) 
        {
            echo "<div id='slider-1-caption" . $d . "' class='nivo-html-caption nivo-caption'>";
            echo "<div class='banner-content slider-" . $d . "'>";
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-content-wrapper">
                            <?php
                            if ($d != 1) {
                                $class_d = "slide-" . $d;
                                echo "<div class='text-content" . $class_d . "'>";
                            } else {
                                $class_d = "";
                                echo "<div class='text-content'>";
                            }
                             echo "</div>";
//                            echo "</div>";
                            ?>

                            <h1 class="title1 wow fadeInUp" data-wow-duration="2000ms" data-wow-delay="0s">
                                <?php echo $row['caption']; ?></h1>
                            <p style="font-size: 20px;" class="sub-title wow fadeInUp hidden-sm hidden-xs" data-wow-duration="2900ms" data-wow-delay=".5s"> 
                              <?php echo $row['description']; ?></p>

                            <?php echo "</div>";
                            echo "</div>";
                            echo "</div>";
//                            echo "</div>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $d++;
    }
    ?>
<?php
//    echo "</div>";
//    echo "</div>";
?>
</div>
<!--End of Slider Area-->
<!--About Area Start--> 
<div class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="about-container">
                    <h3>About GMCA</h3>
                    <p style=" text-align: justify;font-size: 15px;">
                        Government MCA college Maninagar, Ahmedabad is the first Government MCA College in Gujarat. It was established in June 2012 with facilities to run Master of Computer Application. In the year 2012, course was introduced with an intake of 60 students. The college has well-established Central Learning resource centers like Central library, Central Computer Centre, Entrepreneurship Development Cell, Continuing Education Centre and Physical Education Section.
                    </p>
                    <a class="button-default" href="About.php">More</a>	      
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of About Area-->
<!--Latest News Area Start--> 
<!-- <?php
// include './news.php';
?> -->
<div class="latest-area bg-white" style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>Latest News</h3>
                        <p>GMCA organizes many training programs for students, faculty members, and industrial persona</p>
                        </div>
                </div>
            </div>
        </div>
        <div class="row">
                    <?php
            $sel = "SELECT * FROM `news` ORDER BY n_id desc limit 4";
            $qry = mysqli_query($con, $sel);
            while ($row = mysqli_fetch_assoc($qry)) {
//                $img_path = $row['file'];
                ?>
                <div class="col-md-3">
                    <div class="single-latest-item">
                        <div class="single-latest-text">
                            <h3>
                                <?php echo $row['title'] ?>
                            </h3>
                            <div class="single-item-comment-view">
                                <span><i class="zmdi zmdi-calendar-check"></i><?php echo $row['date'] ?></span>
                            </div>
                            <?php 
                            if ($row['file']=="")
                        {
                             echo "NO Download Available";
                        }
                            else
                            {
                            echo "<a href='http://localhost/GMCA/gmca_admin/assets/img/news/$row[file]'target=_blank> Click Here For Download </a>"; 
                        }
                          
                            ?> 
                        </div>
                    </div>
                </div> 

                     <?php } ?>

  </div> 
<a class="button-default" href="news.php">Read All News</a> 

<!-- </div> 
</div>
 -->
<!-- Notice --><!-- 
<div class="latest-area bg-white">
    <div class="container"> -->
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
                
                <!--  Notice   -->
            <div class="col-md-12 col-sm-12">
                 <div class="single-latest-item">
                <div class="single-latest-text" style="height: 200px;">
                                       <marquee direction="up" scrollamount="2" onmouseover="stop()";  onmouseout="start();"> 
<?php $sel = "SELECT * FROM `notice` ORDER BY n_id desc"; $qry = mysqli_query($con, $sel); while
($row = mysqli_fetch_assoc($qry)) { //               ?> <h4><?php echo
$row['details']?></h4> <?php }?><h3><a href="notice.php"> View All Notice </a></h3> </marquee>
 </div> </div> </div>
  </div> 
</div>
</div>
<!--End of Latest News Area-->

<!--Fun Factor Area Start-->
<div class="fun-factor-area" style="padding: 0px;">
    <div class="container">
        <div class="row" style="margin-bottom: 25px;">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="section-title-wrapper white" style="margin-top: 10px;margin-bottom:36px;">
                        <div class="section-title">
                            <h1>GMCA Mission</h1>
                        </div>
                    </div><div  style=" text-align: justify;"> 
                        <ul>
                            <li>To provide conducive academic environment to achieve excellence in teaching and learning.</li>
                            <li>  <br> To collaborate with industries for framing curricula, mutually exchanging expertise, and solving real – life problems.</li>
                            <li>    <br> To facilitate students to nurture entrepreneurial skills.</li>
                            <li> <br> To provide appropriate forum to develop professional ethics and interdisciplinary problem solution skills.</li>
                        </ul></div>
                </div>
                <div class="col-md-6">
                    <div class= "section-title-wrapper white" style="margin-top: 10px;margin-bottom:36px;">
                        <div class="section-title"> 
                            <h1>GMCA Vision</h1>
                        </div>
                    </div>
                    <p  style=" text-align: justify;"> 
                    <ul> <li>Provide value-based quality education of information technology which enable students to excel as professionals or entrepreneurs who can solve real-life problems of society.</li></ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Fun Factor Area--> 
<!--Footer Area Start-->
<div style="height: 50px;">
</div>
</html>
<?php
include './include/footer.php';
?>