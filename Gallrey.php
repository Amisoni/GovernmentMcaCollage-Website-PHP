<style>
/* .fancybox-container fancybox-is-open fancybox-can-swipe{
    header-logo-menu sticker stick
 */
/* .zoom {
  padding: 50px;
  background-color: green;
  transition: transform .2s; Animation 
  width: 200px;
  height: 200px;
  margin: 0 auto;   
}

.zoom:hover {
  transform: scale(1.5);
   (150% zoom)
   
} */
.social-icons a 
{
    padding: 6px;
}
html
{
    overflow-x:hidden;
    width: 100%;
}
.fancybox-container
{
    z-index:99999999999999999999999 !important;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<?php
include './include/header.php';
include './include/config.php';

$tab_query = "SELECT * FROM event";
 $tab_result = mysqli_query($con, $tab_query);
$tab_menu = '';
$tab_content = '';
$i = 0;
while($row = mysqli_fetch_array($tab_result))
{
 if($i == 0)
 {
  $tab_menu .= '
   <li class="active"><a href="#'.$row["event_id"].'" data-toggle="tab">'.$row["name"].'</a></li>
  ';
  $tab_content .= '
   <div id="'.$row["event_id"].'" class="tab-pane fade in active">
  ';
 }
 else
 {
  $tab_menu .= '
   <li><a href="#'.$row["event_id"].'" data-toggle="tab">'.$row["name"].'</a></li>
  ';
  $tab_content .= '
   <div id="'.$row["event_id"].'" class="tab-pane fade">
  ';
 }
 $product_query = "SELECT * FROM gallery WHERE event_id = '".$row["event_id"]."'";
 $product_result = mysqli_query($con, $product_query);
 while($sub_row = mysqli_fetch_array($product_result))
 {
  $tab_content .= '
  <div class="col-md-3" style="margin-bottom:36px;">
    <a data-fancybox="gallery" href="http://localhost/GMCA/gmca_admin/assets/img/gallery/'.$sub_row["image"].'">
    <img src="http://localhost/GMCA/gmca_admin/assets/img/gallery/'.$sub_row["image"].'" class="img-responsive img-thumbnail" style="height: 200px;width: 250px;"/></a>
  </div>
  ';
 }
 $tab_content .= '<div style="clear:both"></div></div>';
 $i++;
}

?>
<div class="breadcrumb-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Gallery</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb text-center">
                            <li><a href="index.php">Home</a>
                            </li>
                            <li>Gallery</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <div class="row" style="padding-left: 80px;padding-top: 10px;">
   <ul class="nav nav-tabs">
    <li>
   <?php
   echo $tab_menu;
   ?>
   </ul>
    </label>
</div>
 </li>
   <div class="tab-content" style="padding-left: 80px;">
   <br />
   <?php
   
   echo $tab_content;
 
   ?>
   </div>
</div>
 
<?php
include './include/footer.php';
?>