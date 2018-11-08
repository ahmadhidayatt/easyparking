<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Aplikasi Penyewaan Lahan Parkir</title>
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


        <!------ Include the above in your HEAD tag ---------->

    </head>
    <body id="top">
        <?php include("header_landing_page.php"); ?>
        <div class="wrapper">
            <section id="features">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div style="padding-top: 20px;" class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="panel panel-login">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <a href="#" class="active" id="register-form-link">Register</a>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <a href="#" id="login-form-link">Login</a>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <form id="login-form" action="proses/login.php" method="post" role="form" style="display: none;">
                                                            <div class="form-group">
                                                                <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required="">
                                                            </div>
                                                            <div class="form-group text-center">
                                                                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                                                <label for="remember"> Remember Me</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-sm-offset-3">
                                                                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="text-center">
                                                                            <a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <?php
                                                        include("proses/koneksi.php");
                                                        $query2 = "SELECT max(id_pemilik_kendaraan) as maxid FROM tb_pemilik_kendaraan";
                                                        $hasil = mysqli_query($connect, $query2)or die(mysqli_error());
                                                        $hslidmax = mysqli_fetch_array($hasil);
                                                        $idmax = $hslidmax['maxid'];
                                                        $nourut = (int) substr($idmax, 3, 4);

                                                        $nourut++;

                                                        $newID = 'PK' . sprintf('%03s', $nourut);
                                                        ?>

                                                        <form id="register-form" action="proses/register.php" method="post" role="form" style="display: block;">
                                                            <div class="form-group">
                                                                <input type="text" name="id" id="username" tabindex="1" class="form-control" placeholder="ID Pemilik" value="<?php echo $newID; ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" name="nama" id="username" tabindex="1" class="form-control" placeholder="Nama" value="" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" name="telp" tabindex="1" class="form-control" placeholder="No Telp" onkeypress="return isNumberKey(event)" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea name="alamat" id="alamat" tabindex="1" class="form-control" placeholder="Alamat" required></textarea> 
                                                            </div>




                                                            <div class="form-group">
                                                                <input type="password" name="" id="pass2" onkeyup="checkPass();
                                                                                        return false;" tabindex="2" class="form-control" placeholder="Repassword" required>
                                                                <span id="confirmMessage" class="confirmMessage"></span>
                                                            </div>
                                                            <input type="text" style="visibility: hidden;" name="tanggal" class="form-control" value="<?php echo date('M/d/Y'); ?>" readonly />
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-sm-offset-3">
                                                                        <input type="submit" name="post" id="view" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <a href="#"><img src="img/logo.png" alt=""></a>
                                <p>© 2018 All rights reserved <a href="https://themefisher.com/" target="_blank">Angga Rno</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
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
        <SCRIPT language=Javascript>
                                                                                    function isNumberKey(evt)
                                                                                    {
                                                                                        var charCode = (evt.which) ? evt.which : event.keyCode
                                                                                        if (charCode > 31 && (charCode < 48 || charCode > 57))
                                                                                            return false;
                                                                                        return true;
                                                                                    }
                                                                                    ;

                                                                                    jQuery(function ($) {
                                                                                        $("#npwp").mask("99-999-999-9-999-999");
                                                                                        $("#ktp").mask("99-99-99-99-99-9999");
                                                                                    });

                                                                                    function checkPass()
                                                                                    {
                                                                                        //Store the password field objects into variables ...
                                                                                        var pass1 = document.getElementById('pass1');
                                                                                        var pass2 = document.getElementById('pass2');
                                                                                        //Store the Confimation Message Object ...
                                                                                        var message = document.getElementById('confirmMessage');
                                                                                        //Set the colors we will be using ...
                                                                                        var goodColor = "#66cc66";
                                                                                        var badColor = "#ff6666";
                                                                                        //Compare the values in the password field 
                                                                                        //and the confirmation field
                                                                                        if (pass1.value == pass2.value) {
                                                                                            //The passwords match. 
                                                                                            //Set the color to the good color and inform
                                                                                            //the user that they have entered the correct password 
                                                                                            pass2.style.backgroundColor = goodColor;
                                                                                            message.style.color = goodColor;
                                                                                            message.innerHTML = "Passwords sama!"
                                                                                        } else {
                                                                                            //The passwords do not match.
                                                                                            //Set the color to the bad color and
                                                                                            //notify the user.
                                                                                            pass2.style.backgroundColor = badColor;
                                                                                            message.style.color = badColor;
                                                                                            message.innerHTML = "Passwords tidak sama!"
                                                                                        }
                                                                                    }
                                                                                    ;

        </SCRIPT>
    </body>
</html>