<?php
session_start();
if (!isset($_SESSION['nama'])) {
    include 'eror_sesion.php';
    die(""); //
} elseif ($_SESSION['level'] !== 'admin') {
    include 'eror_sesion.php';
}
//cek level user
else {
    $id = $_SESSION['id'];
    include "../proses/koneksi.php";
    $counter = 1;
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <style>

            .placepicker-map {
                min-height: 400px;
            }
        </style>
        <body class="fix-header fix-sidebar">
            <!-- Preloader - style you can find in spinners.css -->
            <div class="preloader">
                <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
            </div>
            <!-- Main wrapper  -->
            <div id="main-wrapper">
                <!-- header header  -->
                <?php include("header_admin.php"); ?>
                <!-- End header header -->
                <?php include("side-bar_nav_admin.php"); ?>
                <!-- End Left Sidebar  -->
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
                    <?php } ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data Export</h4>
                                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                    <?php
                                    $query2 = "SELECT max(id_lahan) as maxid FROM tb_lahan";
                                    $hasil = mysqli_query($connect, $query2)or die(mysqli_error());
                                    $hslidmax = mysqli_fetch_array($hasil);
                                    $idmax = $hslidmax['maxid'];
                                    $nourut = (int) substr($idmax, 3, 4);

                                    $nourut++;

                                    $newID = 'L' . sprintf('%03s', $nourut);
                                    ?>
                                    <form action="../proses/admin_tambah_lahan.php" method="post" >
                                        <table class="table table-condensed">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input class="placepicker form-control" data-map-container-id="collapseOne"/>
                                                    </div>
                                                    <div id="collapseOne" class="collapse">
                                                        <div class="placepicker-map thumbnail"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <tr >
                                                <td ><label for="kode_kar">Latitude</label></td>
                                                <td ><input name="latitude" type="text" class="form-control" id="latitude"  placeholder="Latitude" readonly="readonly"/></td>
                                            </tr>
                                            <tr >
                                                <td ><label for="kode_kar">Longitude</label></td>
                                                <td ><input name="longitude" type="text" class="form-control" id="longitude"  placeholder="Longitude" readonly="readonly"/></td>

                                            </tr>
                                            <tr>
                                                <td><label for="nama_kar">alamat</label></td>
                                                <td><input name="alamat" type="text" class="form-control" id="alamat" placeholder="" required readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><label for="kode_kar">ID Lahan</label></td>
                                                <td><input name="idmobil" type="text" class="form-control" id="kode_kar" value="<?php echo $newID; ?>" placeholder="Kode Karyawan" readonly="readonly"/></td>
                                            </tr>
                                            <tr hidden>
                                                <td><label for="asss">ID pemilik lahan</label></td>
                                                <td><input name="idpl" type="text" class="form-control" id="kode_kar"  value="<?php echo $id; ?>" readonly="readonly"/></td>
                                            </tr>
                                            <tr>
                                                <td><label for="nama_kar">nama Lahan</label></td>
                                                <td><input name="nama" type="text" class="form-control" id="nama" placeholder="" required/></td>
                                            </tr>
                                            <tr>
                                                <td><label for="nama_kar">luas Lahan</label></td>
                                                <td><input name="luas" type="text" class="form-control" id="nama" placeholder="" required/></td>
                                            </tr>
                                            <tr>
                                                <td><label for="nama_kar">kapasitas Lahan</label></td>
                                                <td><input name="kapasitas" type="text" class="form-control" id="nama" placeholder="" required/></td>
                                            </tr>

                                            <tr>
                                                <td><label for="nama_kar">jam buka</label></td>
                                                <td><input name="jambuka" type="text" class="form-control" id="nama" placeholder="" required/></td>
                                            </tr>
                                            <tr>
                                                <td><label for="nama_kar">jam tutup</label></td>
                                                <td><input name="jamtutup" type="text" class="form-control" id="nama" placeholder="" required/></td>
                                            </tr>
                                                <tr>
                                                <td><label for="nama_kar">Harga per bulan</label></td>
                                                <td><input name="harga" type="text" class="form-control" id="nama" placeholder="" required/></td>
                                            </tr>
                                            

                                            <tr>
                                                <td><input type="submit" value="Simpan Data" name="submit" class="btn btn-sm btn-primary"/>&nbsp;<a href="hal_admin_data_supir.php" class="btn btn-sm btn-primary">Kembali</a></td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End PAge Content -->
                    </div>
                    <!-- End Container fluid  -->
                    <!-- footer -->

                    <!-- End footer -->
                </div>
                <!-- End Page wrapper  -->
            </div>
            <!-- End Wrapper -->
            <!-- All Jquery -->
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
            <script src="js/scripts.js"></script>



            <script src="js/maskedinput.js"></script>
            <script src="js/jqueryplacepicker.js"></script>

            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDH14wu19k7JwjAdEu2iQLLDV8B-OBKdhU&sensor=true&libraries=places"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

            <script>
                var currentLat = "";
                var currentLong = "";
                var currentaddrs = "";

                $(".placepicker").each(function () {
                    var target = this;
                    var $collapse = $(this).parents('.form-group').next('.collapse');
                    var $map = $collapse.find('.another-map-class');
                    var placepicker = $(this).placepicker({
                        map: $map.get(0),
                        placeChanged: function (place) {
                            currentLat = this.getLocation().latitude;
                            currentLong = this.getLocation().longitude;
                            currentaddrs = place.formatted_address;
                            console.log("place changed: ", place.formatted_address, this.getLocation().latitude, this.getLocation().longitude);
                            $("#latitude").val(currentLat);
                            $("#longitude").val(currentLong);
                            $("#alamat").val(currentaddrs);
                        }
                    }).data('placepicker');
                });
            </script>

    </body>
    <SCRIPT language=Javascript>
        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
        ;

     

    </SCRIPT>


</html>