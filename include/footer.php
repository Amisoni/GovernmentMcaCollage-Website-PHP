<!--Footer Widget Area Start-->
<?php
include './include/config.php';
?>
<style>
.social-icons > a:hover
{
    background: #2D3E50;
}
#scrollUp
{
    background: #2D3E50;
}
.noborder:hover
{
    text-decoration:none;
    color:#2D3E50 !important;
}
</style>
<div class="footer-widget-area">
    <div class="container" style="padding-bottom:2%;">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="single-footer-widget">
                    <div class="footer-logo">
                        <a href="index.php"><img src="img/logo.png" alt="GMCA" style="padding-top: 50PX;"></a>
                    </div>
                    <!-- <p>GOVERNMENT MCA COLLEGE,MANINAGAR,AHMEDABAD</p> -->
                    <div class="social-icons" style="padding-top: 20px;">
                        <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                        <a href="#"><i class="zmdi zmdi-rss"></i></a>
                        <a href="#"><i class="zmdi zmdi-google-plus"></i></a>
                        <a href="#"><i class="zmdi zmdi-pinterest"></i></a>
                        <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="single-footer-widget">
                    <h3>GET IN TOUCH</h3>
                    <hr>
                    <div class="col-md-1 col-xs-2" style="color:#fff;padding-bottom:5px;"><i class="fa fa-phone"></i>
                    </div>
                    <div class="col-md-10 col-xs-10" style="padding-bottom:5px;"><a class="noborder" href="tel:+91 792 293 0176"
                            style="color:#fff">+91 792 293
                            0176</a></div>

                    <div class="col-md-1 col-xs-2" style="padding-bottom:5px;"><i class="fa fa-envelope"></i></div>
                    <div class="col-md-10 col-xs-10" style="padding-bottom:5px;">
                        <a href="mailto:gmcacmnagar@gmail.com" class="noborder" style="color:#fff">gmcacmnagar@gmail.com</a>
                    </div>

                    <div class="col-md-1 col-xs-2" style="padding-bottom:5px;"><i class="fa fa-globe"></i></div>
                    <div  class="col-md-10 col-xs-10" style="padding-bottom:5px;"><span>www.educat.com</span></div>

                    <div class="col-md-1 col-xs-2" style="padding-bottom:5px;"><i class="fa fa-map-marker"></i></div>
                    <div class="col-md-10 col-xs-10" style="padding-bottom:5px;"><a class="noborder" href="../contact.php"
                            style="color:#fff"><span>
                                Government MCA College, <br> K. K. Shashtri Education
                                Campus, <br> Maninagar (East),
                                <br> Ahmedabad - 380008, INDIA</span>
                        </a></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="single-footer-widget">
                    <h3>Useful Links</h3>
                    <hr>
                    <a class="noborder" href="http://localhost/GMCA/index.php">Home</a>
                    <a class="noborder" href="http://localhost/GMCA/staff.php">Teachers &amp; Staff</a>
                    <a class="noborder" href="http://localhost/GMCA/About.php">About</a>
                    <a class="noborder" href="http://localhost/GMCA/event.php">Events</a>
                    <a class="noborder" href="http://localhost/GMCA/Gallrey.php">Gallery</a>
                    <a class="noborder" href="http://localhost/GMCA/academic.php">Academics</a>
                    <a class="noborder" href="http://localhost/GMCA/contact.php">Contact US</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="google-map-area" alt="GMCA MAP" style="padding-top: 20px;">
                    <!--  Map Section -->
                    <div class="map-area">
                        <div id=""style="width:271px;height:182px;">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d58760.11486242859!2d72.617823!3d23.005143!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd79c4285bf4f7081!2sGovernment%20MCA%20College!5e0!3m2!1sen!2sin!4v1611344713218!5m2!1sen!2sin" width="100%" height="182px"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container-fluid" style="padding-bottom: 15PX;padding-top: 15PX;background-color:#2d3e50;color: white;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-7">
                    <span>Copyright © 2016 - CTE Gandhinagar</span>
                </div>
                <div class="col-md-6 col-sm-5">
                    <div class="column-right">
                        <span>Privacy Policy , Terms &amp; Conditions</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Bg White-->
<!-- </div> -->
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFr5PKEUaw45PLBusmppl8z9tgk6bL1PA&callback=initMap"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
function initialize() {
    var mapOptions = {
        zoom: 15,
        scrollwheel: false,
        center: new google.maps.LatLng(23.0051431, 72.6178231)
    };

    var map = new google.maps.Map(document.getElementById('googleMap'),
        mapOptions);


    var marker = new google.maps.Marker({
        position: map.getCenter(),
        animation: google.maps.Animation.BOUNCE,
        icon: 'img/map-marker.png',
        map: map
    });

}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

<!--End of Main Wrapper Area-->
<?php include 'include_js.php'; ?>
</body>