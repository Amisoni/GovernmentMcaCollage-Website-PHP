<?php include('includes/config.php');

    if(!isset($_SESSION['reg_id']) || $_SESSION['reg_id']=="" || $_SESSION['no']==0)
    {
        header("location:index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Government MCA College</title>

        <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
        <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link rel="stylesheet" type="text/css" href="libs/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/fonts/line-awesome/css/line-awesome.min.css">
        <!--<link rel="stylesheet" type="text/css" href="assets/fonts/open-sans/styles.css">-->

        <link rel="stylesheet" type="text/css" href="assets/fonts/montserrat/styles.css">

        <link rel="stylesheet" type="text/css" href="libs/tether/css/tether.min.css">
        <link rel="stylesheet" type="text/css" href="libs/jscrollpane/jquery.jscrollpane.css">
        <link rel="stylesheet" type="text/css" href="libs/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" type="text/css" href="assets/styles/common.min.css">
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN THEME STYLES -->
        <link rel="stylesheet" type="text/css" href="assets/styles/themes/primary.min.css">
        <link class="ks-sidebar-dark-style" rel="stylesheet" type="text/css" href="assets/styles/themes/sidebar-black.min.css">

        <link rel="stylesheet" type="text/css" href="assets/fonts/kosmo/styles.css">
        <link rel="stylesheet" type="text/css" href="assets/fonts/weather/css/weather-icons.min.css">
        <link rel="stylesheet" type="text/css" href="libs/c3js/c3.min.css">
        <link rel="stylesheet" type="text/css" href="libs/noty/noty.css">
        <link rel="stylesheet" type="text/css" href="assets/styles/widgets/payment.min.css">
        <link rel="stylesheet" type="text/css" href="assets/styles/widgets/panels.min.css">
        <link rel="stylesheet" type="text/css" href="assets/styles/dashboard/tabbed-sidebar.min.css">
</head>

<body>
    
    <!-- Header Start -->
    <?php include('template/header.php'); ?>
    <!-- /#header -->

    <!--Nav Start  -->
    <?php include('template/sidebar_faculties.php') ?>
    <!-- /#nav -->

    <!-- /#content -->
    <?php

         @$page=$_REQUEST['page'];
     //  echo "<pre>";
       //print_r($_SERVER);
        if($page=='' && basename($_SERVER['PHP_SELF'])=='home2.php')
        {
            $page='dashboard_faculties';
        }
        if($page!='' && file_exists('middlepage/'.$page.'.php'))
        {
            include('middlepage/'.$page.'.php');

        }
        else
        {
            include('middlepage/error_admin.php');
        }

     ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="libs/jquery/jquery.min.js"></script>
        <script src="libs/responsejs/response.min.js"></script>
        <script src="libs/loading-overlay/loadingoverlay.min.js"></script>
        <script src="libs/tether/js/tether.min.js"></script>
        <script src="libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="libs/jscrollpane/jquery.jscrollpane.min.js"></script>
        <script src="libs/jscrollpane/jquery.mousewheel.js"></script>
        <script src="libs/flexibility/flexibility.js"></script>
        <script src="libs/noty/noty.min.js"></script>
        <script src="velocity/velocity.min.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/scripts/common.min.js"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <script src="libs/datatables-net/media/js/jquery.dataTables.min.js"></script>
        <script src="libs/datatables-net/media/js/dataTables.bootstrap4.min.js"></script>
        <script src="libs/datatables-net/extensions/buttons/js/dataTables.buttons.min.js"></script>
        <script src="libs/datatables-net/extensions/buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="libs/jszip/jszip.min.js"></script>
        <script src="libs/pdfmake/pdfmake.min.js"></script>
        <script src="libs/pdfmake/vfs_fonts.js"></script>
        <script src="libs/datatables-net/extensions/buttons/js/buttons.html5.min.js"></script>
        <script src="libs/datatables-net/extensions/buttons/js/buttons.print.min.js"></script>
        <script src="libs/datatables-net/extensions/buttons/js/buttons.colVis.min.js"></script>
        <script src="libs/select2/js/select2.min.js"></script>
        <script type="application/javascript">
        (function ($) {
            $(document).ready(function() {
                var table = $('#ks-datatable').DataTable({
                    lengthChange: false,
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5',
                        <!--'colvis'-->
                    ],
                    initComplete: function () {
                        $('.dataTables_wrapper select').select2({
                            minimumResultsForSearch: Infinity
                        });
                    }
                });

                table.buttons().container().appendTo( '#ks-datatable_wrapper .col-md-6:eq(0)' );
            });
        })(jQuery);
        </script>
</body>
</html>
