<?php
session_start();
if (!isset($_SESSION['nama'])) {
    include 'eror_sesion.php';
    die(""); //
} elseif ($_SESSION['level'] !== 'user') {
    include 'eror_sesion.php';
}
//cek level user
else {
    include "../proses/koneksi.php";
    $counter = 1;
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <body class="fix-header fix-sidebar">
            <!-- Preloader - style you can find in spinners.css -->
            <div class="preloader">
                <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
            </div>
            <!-- Main wrapper  -->
            <div id="main-wrapper">
                <!-- header header  -->
                <?php include("header_user.php"); ?>
                <!-- End header header -->
                <?php include("side-bar_nav_user.php"); ?>
                <!-- Page wrapper  -->
                <div class="page-wrapper">
                    <!-- Bread crumb -->
                    <div class="row page-titles">
                        <div class="col-md-5 align-self-center">

                            <h3 class="text-primary">Dashboard</h3> </div>
                        <div class="col-md-7 align-self-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                    <!-- End Bread crumb -->
                    <!-- Container fluid  -->
                    <div class="container-fluid">
                        <!-- Start Page Content -->
<!--                        <main class=" m-0 p-0">
                            <div class="container-fluid m-0 p-0">

                                Google map
                                <div id="map-container-4" style="height: 100vh"></div>

                            </div>
                        </main>-->
                        <?php include("widged_admin.php"); ?>
                    <?php } ?>

                    <!-- End PAge Content -->
                </div>
                <!-- End Container fluid  -->
                <!-- footer -->
                <script src="js/lib/jquery/jquery.min.js"></script>
                <!-- Bootstrap tether Core JavaScript -->
                <script src="js/lib/bootstrap/js/popper.min.js"></script>
                <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
                <!-- slimscrollbar scrollbar JavaScript -->
                <script src="js/jquery.slimscroll.js"></script>
                <!--Menu sidebar -->
                <script src="js/sidebarmenu.js"></script>
                <!--stickey kit -->
                <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
                <!--Custom JavaScript -->


                <!-- Amchart -->
                <script src="js/lib/morris-chart/raphael-min.js"></script>
                <script src="js/lib/morris-chart/morris.js"></script>
                <script src="js/lib/morris-chart/dashboard1-init.js"></script>


                <script src="js/lib/calendar-2/moment.latest.min.js"></script>
                <!-- scripit init-->
                <script src="js/lib/calendar-2/semantic.ui.min.js"></script>
                <!-- scripit init-->
                <script src="js/lib/calendar-2/prism.min.js"></script>
                <!-- scripit init-->
                <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
                <!-- scripit init-->
                <script src="js/lib/calendar-2/pignose.init.js"></script>

                <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
                <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>

                <!-- scripit init-->
                <!--  Google Maps Plugin    -->
                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDH14wu19k7JwjAdEu2iQLLDV8B-OBKdhU&sensor=true&libraries=places"></script>

                <script src="js/scripts.js"></script>
                <?php include("footer_admin.php"); ?>
                </body>
                <script>
                    function init_map() {

                    var var_location = new google.maps.LatLng(40.725118, -73.997699);

                    var var_mapoptions = {
                    center: var_location,
                    zoom: 14
                    };

                    var var_marker = new google.maps.Marker({
                    position: var_location,
                    map: var_map,
                    title: "Jakarta"
                    });

                    var var_map = new google.maps.Map(document.getElementById("map-container-4"),
                    var_mapoptions);

                    var_marker.setMap(var_map);

                    }

                    google.maps.event.addDomListener(window, 'load', init_map);
            </script>
            </html>