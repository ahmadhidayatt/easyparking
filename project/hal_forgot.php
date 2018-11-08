

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Aplikasi Penyewaan Towing</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- google fonts -->

        <!-- Css link -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/owl.carousel.css">
        <link rel="stylesheet" href="../css/owl.transitions.css">
        <link rel="stylesheet" href="../css/animate.min.css">
        <link rel="stylesheet" href="../css/lightbox.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/preloader.css">
        <link rel="stylesheet" href="../css/image.css">
        <link rel="stylesheet" href="../css/icon.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="../css/login.css">
        <style type="text/css">

            body {
                background-image: url("img/lahan.png");
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>


        <!------ Include the above in your HEAD tag ---------->

    </head>
    <body id="top" >
        <?php include("header_landing_page.php"); ?>
        <div class="wrapper">
            <section id="features" class="baner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div style="padding-top: 50px;" class="container">

                                <div class="alert-placeholder"></div>
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center"><h2><b>Recover Account</b></h2></div>
                                                <form id="register-form" action="proses/admin_forgot.php" method="post" role="form" autocomplete="off">
                                                    <div class="form-group">
                                                        <label for="email">Email Address</label>
                                                        <input name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" autocomplete="off" required="" type="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                                                                <input name="emails" id="emails" tabindex="2" class="form-control btn btn-success" value="Recover Account" type="submit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input class="hide" name="token" id="token" value="e0a4e3ad1d7667a20551b5a885181da4" type="hidden">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>
        <!-- load Js -->
        <script src="../js/jquery-1.11.3.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>
        <script src="../js/waypoints.min.js"></script>
        <script src="../js/lightbox.js"></script>
        <script src="../js/jquery.counterup.min.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/html5lightbox.js"></script>
        <script src="../js/jquery.mixitup.js"></script>
        <script src="../js/wow.min.js"></script>
        <script src="../js/jquery.scrollUp.js"></script>
        <script src="../js/jquery.sticky.js"></script>
        <script src="../js/jquery.nav.js"></script>
        <script src="../js/main.js"></script>
        <script src="../js/login.js"></script>

        <script src="../js/maskedinput.js"></script>


    </body>
</html>