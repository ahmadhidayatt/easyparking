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
            #map {
                margin: 0;
                padding: 0;
                min-height: 600px;
                max-width: none;
            }
            #map img {
                max-width: none !important;
            }
            .gm-style-iw {
                width: auto;
                top: 15px !important;
                left: 0px !important;
                background-color: #fff;
                box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6);
                border: 1px solid rgba(72, 181, 233, 0.6);
                border-radius: 2px 2px 10px 10px;
            }
            #iw-container {
                margin-bottom: 10px;
            }
            #iw-container .iw-title {
                font-family: 'Open Sans Condensed', sans-serif;
                font-size: 22px;
                font-weight: 400;
                padding: 10px;
                background-color: #48b5e9;
                color: white;
                margin: 0;
                border-radius: 2px 2px 0 0;
            }
            #iw-container .iw-content {
                font-size: 13px;
                line-height: 18px;
                font-weight: 400;
                margin-right: 1px;
                padding: 15px 5px 20px 15px;
                max-height: auto;
                overflow-y: auto;
                overflow-x: hidden;
            }
            .iw-content img {
                float: right;
                margin: 0 5px 5px 10px;	
            }
            .iw-subTitle {
                font-size: 16px;
                font-weight: 700;
                padding: 5px 0;
            }
            .iw-bottom-gradient {
                position: absolute;
                width: 350px;
                height: 50px;
                bottom: 10px;
                right: 18px;
                background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
                background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
                background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
                background: -ms-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
            }

        </style>
        <script>
            var placelat = [];
            var placelong = [];
            var id1 = [];
            var id2 = [];
            var nama1 = [];
            var kapasitas1 = [];
            var harga1 = [];
            var alamat1 = [];
            var jam_buka1 = [];
            var jam_tutup1 = [];
            var kapasitas2 = [];
            var deskripsi1 = [];
            var features = [];


        </script>
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
                                    <h4 class="card-title"></h4>
                                    <h6 class="card-subtitle"></h6>
                                    <?php
                                    $query3 = "SELECT *  FROM tb_pemilik_kendaraan where id_pemilik_kendaraan = '$id'";
                                    $query1 = "SELECT *  FROM tb_kendaraan  where id_pemilik_kendaraan ='$id'";
                                    $query2 = "SELECT max(id_transaksi) as maxid FROM tb_transaksi";
                                    $query4 = "SELECT tl.deskripsi,tl.latitude,tl.longitude,tl.id_lahan,tl.nama_lahan,tl.kapasitas_lahan,tl.harga,tl.alamat,tl.jam_buka,tl.jam_tutup,tl.kapasitas_tersedia,tpl.id_pemilik_lahan FROM tb_lahan tl , tb_pemilik_lahan tpl where tl.id_pemilik_lahan = tpl.id_pemilik_lahan  ";

                                    $hasil1 = mysqli_query($connect, $query1)or die(mysqli_error());
                                    $hasil3 = mysqli_query($connect, $query3)or die(mysqli_error());
                                    $hasil = mysqli_query($connect, $query2)or die(mysqli_error());
                                    $hasil4 = mysqli_query($connect, $query4)or die(mysqli_error());


                                    $res_pem = mysqli_fetch_array($hasil3);

                                    $hslidmax = mysqli_fetch_array($hasil);

                                    $idmax = $hslidmax['maxid'];
                                    $nourut = (int) substr($idmax, 3, 4);

                                    $nourut++;

                                    $newID = 'TR' . sprintf('%03s', $nourut);
                                    ?>
                                    <!--                                    <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <input class="placepicker form-control" data-map-container-id="collapseOne"/>
                                                                                </div>
                                                                                <div id="collapseOne" class="collapse">
                                                                                    <div class="placepicker-map thumbnail"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>-->
                                    <form action="../proses/user_tambah_transaksi.php" method="post" >
                                        <table class="table table-condensed">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="map"></div>
                                                </div>
                                            </div>
                                            <tr>
                                                <td></div></td>
                                            </tr>
                                            <tr>
                                                <td><label for="kode_kar">ID Transaksi</label></td>
                                                <td><input name="idmobil" type="text" class="form-control" id="id_transaksi" value="<?php echo $newID; ?>" placeholder="Kode Karyawan" readonly="readonly"/></td>
                                            </tr>

                                            <tr>
                                                <td><label for="nama_kar">ID pemilik kendaraan</label></td>
                                                <td><input name="id_pem" type="text" class="form-control" id="nama" placeholder=""  value="<?php echo $id; ?>" readonly="readonly"/></td>
                                            </tr>
                                            <tr>
                                                <td><label for="nama_kar">Nama Pemilik kendaraan</label></td>
                                                <td><input name="nama_pem" type="text" class="form-control" id="nama" placeholder="" value="<?php echo $res_pem['nama']; ?>" readonly="readonly"/></td>
                                            </tr>
                                            <tr>
                                                <td><label for="gol_kar">Kendaraan</label></td>
                                                <td> <?php
                                                    $jsArray = "var nama = new Array();\n";
                                                    echo '<select class="form-control" name="nama_kendaraan" id="nama_kendaraan"  required>';
                                                    echo '<option>  </option>';
                                                    while ($row = mysqli_fetch_array($hasil1)) {

                                                        echo '<option value="' . $row['plat_nomot'] . ' ">' . $row['id_kendaraan'] . '</option>';
                                                        $jsArray .= "nama['" . $row['nama_kendaraan'] . "'] = {name:'" . addslashes($row['tipe_kendaraan']) . "', name2:'" . addslashes($row['plat_nomot']) . "' };\n";
                                                    }
                                                    ?> </td>
                                            </tr>
                                            <tr>

                                                <td><label for="gol_kar">Lahan Parkir</label></td>
                                                <td>

                                                    <?php
                                                    $jsArray = "var namas = new Array();\n";
                                                    echo '<select class="form-control" name="as" id="as"   required>';
                                                    echo '<option>  </option>';
                                                    ?>
                                                    <?php
                                                    while ($rows = mysqli_fetch_array($hasil4)) {
                                                        ?>
                                                        <script>




                                                            console.log('<?php echo $rows['alamat']; ?>');
                                                            deskripsi1.push('<?php echo $rows['deskripsi']; ?>');
                                                            placelat.push('<?php echo $rows['latitude']; ?>');
                                                            placelong.push('<?php echo $rows['longitude']; ?>');
                                                            id1.push('<?php echo $rows['id_lahan']; ?>');
                                                            id2.push('<?php echo $rows['id_pemilik_lahan']; ?>');
                                                            nama1.push('<?php echo $rows['nama_lahan']; ?>');
                                                            kapasitas1.push('<?php echo $rows['kapasitas_lahan']; ?>');
                                                            harga1.push('<?php echo $rows['harga']; ?>');
                                                            alamat1.push('<?php echo $rows['alamat']; ?>');
                                                            jam_buka1.push('<?php echo $rows['jam_buka']; ?>');
                                                            jam_tutup1.push('<?php echo $rows['jam_tutup']; ?>');
                                                            kapasitas2.push('<?php echo $rows['kapasitas_tersedia']; ?>');


                                                        </script>
                                                        <?php
                                                        $idpl = $rows['id_pemilik_lahan'];
                                                        echo '<option value="' . $rows['id_lahan'] . '" >' . $rows['nama_lahan'] . '</option>';
                                                        $jsArray .= "namas['" . $rows['id_lahan'] . "'] = {name:'" . addslashes($rows['id_lahan']) . "', name2:'" . addslashes($rows['nama_lahan']) . "' };\n";
                                                    }
                                                    ?>
                                                    <script>

                                                    </script>
                                                </td>
                                            </tr>

                                            <tr >

                                                <td><label for="nama_kar">
                                                        plat nomor </label></td >
                                                <td><input name="plat" type="text" class="form-control" id="plat" placeholder=""  required /></td>
                                            </tr>
                                            <tr >
                                                <td><label for="nama_kar">Id pemilik lahan</label></td>
                                                <td><input name="idpl" type="text" class="form-control" id="idpl" placeholder="" required/></td>
                                            </tr>
                                            <tr hidden>

                                                <td><label for="nama_kar">plat nomor</label></td>
                                                <td><input name="id_lahan" type="text" class="form-control" id="id_lahan" placeholder=""  required /></td>
                                            </tr>
                                            <tr hidden>

                                                <td><label for="nama_kar">plat nomor</label></td>
                                                <td><input name="id_ken" type="text" class="form-control" id="id_ken" placeholder=""  required /></td>
                                            </tr>
                                            <tr hidden>
                                                <td><label for="nama_kar">Id pemilik lahan</label></td>
                                                <td><input name="nama_lahan" type="text" class="form-control" id="nama_lahan" placeholder="" required/></td>
                                            </tr>


                                            <tr>
                                                <td><label for="nama_kar">Tanggal Transaksi</label></td>
                                                <td><input name="tanggal" type="text" class="form-control" id="nama" placeholder="" value="<?php echo date("Y-d-m"); ?> " required readonly/></td>
                                            </tr>

                                            <tr>
                                                <td><label for="nama_kar">Tanggal Mulai</label></td>
                                                <td><input type="date" name="date1" id="date1" class="form-control" onchange="changes();" required></td>
                                            </tr>
                                            <tr >
                                            <input type="date" >
                                            <td><label for="nama_kar">Tanggal Selesai   </label></td>
                                            <td><input  type="date" name="date2" id="date2" class="form-control" ></td>
                                            </tr>

                                            <tr>
                                                <td><label for="nama_kar">Harga per bulan</label></td>
                                                <td><input name="harga" type="text" class="form-control" id="harga" placeholder="" required/></td>
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

            <script async defer type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=geometry&sensor=false&key=AIzaSyBLdQEL_bQUbiSy6rXIOZgQdwsJyOFnNdU&callback=initMap"></script>

              <!--            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->

            <script>

                                                    console.log(placelat + " " + placelong);
                                                    console.log(id1 + " " + nama1);
                                                    for (var i = 0; i < placelat.length; i++) {
                                                        var data = {};
                                                        data.lat = parseFloat(placelat[i]),
                                                                data.long = parseFloat(placelong[i]),
                                                                data.type = 'info',
                                                                data.id = id1[i],
                                                                data.id2 = id2[i],
                                                                data.nama = nama1[i],
                                                                data.kapasitas = kapasitas1[i],
                                                                data.harga = harga1[i],
                                                                data.alamat = alamat1[i],
                                                                data.action = '<div id="iw-container">' +
                                                                '<div class="iw-title">' + nama1[i] + '</div>' +
                                                                '<div class="iw-content">' +
                                                                '<div class="iw-subTitle">' + nama1[i] + '     ID : ' + id1[i] + '</div>' +
                                                                '<img src="http://cdn2.tstatic.net/tribunnews/foto/images/preview/20131130_lahan-parkir-stasiun-bogor_8807.jpg" alt="Porcelain Factory of Vista Alegre" height="130" width="110">' +
                                                                '<p>' + deskripsi1[i] + ' </p>' +
                                                                '<div class="iw-subTitle">Jam Buka : ' + jam_buka1[i] + ' | Jam Tutup : ' + jam_tutup1[i] + '<br> Dengan Harga : <b>' + harga1[i] + ' perbulan</b></div>' +
                                                                '<p>' + alamat1[i] + '<br>' +
                                                                '<br>Masih Tersisa :' + kapasitas2[i] + '</p>' +
                                                                '</div>' +
                                                                '<div class="iw-bottom-gradient"> <button type="button" class="btn btn-info btn-lg" id="lahan' + [i] + '" onclick="set(' + [i] + ')" style="float:right;">pesan disini</button></div>' +
                                                                '</div>';
                                                        features.push(data);
                                                    }

                                                    var map;

                                                    var cityCircle;

                                                    function initMap() {


                                                        var curlat;
                                                        var curlong;
                                                        var markercurr;
                                                        var marker, i;
                                                        var infowindow;
                                                        map = new google.maps.Map(document.getElementById('map'), {
                                                            zoom: 14,
                                                            center: new google.maps.LatLng(-33.91722, 151.23064),
                                                            mapTypeId: 'roadmap'
                                                        });

                                                        var iconBase = 'http://maps.google.com/mapfiles/kml/pal2/';
                                                        var icons = {
                                                            info: {
                                                                icon: iconBase + 'icon13.png'
                                                            }
                                                        };
                                                        infowindow = new google.maps.InfoWindow({});
                                                        if (navigator.geolocation) {
                                                            navigator.geolocation.getCurrentPosition(function (position) {
                                                                var pos = {
                                                                    lat: position.coords.latitude,
                                                                    lng: position.coords.longitude
                                                                };
                                                                console.log('a1');
                                                                infowindow.setPosition(pos);
                                                                console.log('a2');
                                                                map.setCenter(pos);
                                                                console.log('a3');
                                                                markercurr = new google.maps.Marker(
                                                                        {
                                                                            position: pos,
                                                                            draggable: true
                                                                        }
                                                                );
                                                                markercurr.setMap(map);
                                                                console.log('a4');
                                                                curlat = position.coords.latitude;
                                                                console.log('a5');
                                                                curlong = position.coords.longitude;
                                                                change(pos);
                                                                console.log('a6');
                                                                google.maps.event.addListener(markercurr, 'dragend', function () {
                                                                    cityCircle.setMap(null);
                                                                    marker.setMap(null);
                                                                    clearMarkers();
                                                                    curlat = markercurr.position.lat();
                                                                    curlong = markercurr.position.lng();
                                                                    change(markercurr.getPosition());
                                                                    infowindow.setPosition(markercurr.getPosition());
                                                                    map.setCenter(markercurr.getPosition());
                                                                    console.log("lat: " + curlat)
                                                                    console.log("lng: " + curlong)
                                                                })

                                                                google.maps.event.addListener(markercurr, 'click', function () {
                                                                    map.setZoom(15);
                                                                    console.log("lat: " + curlat)
                                                                    console.log("lng: " + curlong)
                                                                    map.setCenter(markercurr.getPosition());
                                                                });





                                                            }, function () {
                                                                handleLocationError(true, infowindow, map.getCenter());
                                                            });
                                                        } else {
                                                            // Browser doesn't support Geolocation
                                                            handleLocationError(false, infowindow, map.getCenter());
                                                        }
                                                        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                                                            infoWindow.setPosition(pos);
                                                            infoWindow.setContent(browserHasGeolocation ?
                                                                    'Error: The Geolocation service failed.' :
                                                                    'Error: Your browser doesn\'t support geolocation.');
                                                            infoWindow.open(map);

                                                        }
                                                        function newLocation(newLat, newLng)
                                                        {
                                                            map.setCenter({
                                                                lat: newLat,
                                                                lng: newLng
                                                            });
                                                        }

                                                        function distance(lat1, lon1, lat2, lon2, unit) {
                                                            var radlat1 = Math.PI * lat1 / 180
                                                            var radlat2 = Math.PI * lat2 / 180
                                                            var theta = lon1 - lon2
                                                            var radtheta = Math.PI * theta / 180
                                                            var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
                                                            if (dist > 1) {
                                                                dist = 1;
                                                            }
                                                            dist = Math.acos(dist)
                                                            dist = dist * 180 / Math.PI
                                                            dist = dist * 60 * 1.1515
                                                            if (unit == "K") {
                                                                dist = dist * 1.609344
                                                            }
                                                            if (unit == "N") {
                                                                dist = dist * 0.8684
                                                            }
                                                            return dist
                                                        }
                                                        function change(pos) {
                                                            console.log(features);
                                                            cityCircle = new google.maps.Circle({
                                                                strokeColor: '#baf5e8',
                                                                strokeOpacity: 0.8,
                                                                strokeWeight: 2,
                                                                fillColor: '#baf5e8',
                                                                fillOpacity: 0.35,
                                                                map: map,
                                                                center: pos,
                                                                radius: 3000
                                                            });

                                                            for (i = 0; i < features.length; i++) {
                                                                console.log(i);
                                                                console.log(features[i].lat + "lat" + parseFloat(features[i].lat));
                                                                if (distance(curlat, curlong, features[i].lat, features[i].long, 'K') <= 3) {
                                                                    console.log(curlat, features[i].lat, distance(curlat, curlong, features[i].lat, features[i].long, 'K'));
                                                                    var position = new google.maps.LatLng(parseFloat(features[i].lat), parseFloat(features[i].long));
                                                                    console.log(position);
                                                                    marker = new google.maps.Marker({
                                                                        position: position,
                                                                        icon: icons[features[i].type].icon,
                                                                        map: map
                                                                    });



                                                                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                                                        return function () {
                                                                            console.log(i);
                                                                            infowindow.setContent(features[i].action);
                                                                            infowindow.open(map, marker);
                                                                        };
                                                                    })(marker, i));
                                                                }
                                                            }
                                                        }



                                                        function setMapOnAll(map) {
                                                            for (var i = 0; i < marker.length; i++) {
                                                                marker[i].setMap(map);
                                                                console.log(i);
                                                            }
                                                        }

                                                        // Removes the markers from the map, but keeps them in the array.
                                                        function clearMarkers() {
                                                            setMapOnAll(null);
                                                        }
                                                        $(document).ready(function ()
                                                        {
                                                            // click on map and set you marker to that position
                                                            google.maps.event.addListener(map, 'click', function (event) {
                                                                cityCircle.setMap(null);
                                                                marker.setMap(null);
                                                                clearMarkers();
                                                                curlat = event.latLng.lat();
                                                                curlong = event.latLng.lng();
                                                                change(event.latLng);
                                                                infowindow.setPosition(event.latLng);
                                                                map.setCenter(event.latLng);
                                                                console.log("lat: " + curlat)
                                                                console.log("lng: " + curlong)
                                                                markercurr.setPosition(event.latLng);
                                                            });
                                                        });

                                                    }
                                                    function set(i) {
                                                        $("#id_lahan").val(id1[i]);
                                                        $("#as").val(id1[i]);
                                                        $("#nama_lahan").val(nama1[i]);
                                                        $("#idpl").val(id2[i]);
                                                        $("#harga").val(harga1[i]);
                                                    }




            </script>

    </body>

    <SCRIPT language=Javascript>
        var currentLat = "";
        var currentLong = "";
        var currentaddrs = "";
        var values = "";



        function changes() {
            var invoiceDate = $("#date1").val();
//            var days = Number(document.querySelector("#days").value);
            var dueDateElement = document.querySelector("#date2");

           
                invoiceDate = invoiceDate.split("/");
                invoiceDate = new Date(invoiceDate[0], invoiceDate[1] , invoiceDate[2]);
                invoiceDate.setDate(invoiceDate.getDate() + 30);
               $("#date2").val(null);
                $("#date2").val(invoiceDate);
                //console.log(invoiceDate, dueDateElement.value);
            
        }



        $('body').on("change", "#as", function (event) {
            $("#id_lahan").val($("#as").val());

            $("#nama_lahan").val($("#as option:selected").text());
            $("#idpl").val('<?php echo $idpl; ?>');
            $("#id_lahan").val($("#as option:selected").val());
            $("#harga").val($("#as option:selected").val());
            console.log($("#as option:selected").text());
        });

        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
        ;
        jQuery(function ($) {
            $("#ktp").mask("99-99-99-99-99-9999");
            $("#sim").mask("99-99-99-99-99-999");
        }
        );
//        $(".placepicker").each(function () {
//            var target = this;
//            var $collapse = $(this).parents('.form-group').next('.collapse');
//            var $map = $collapse.find('.another-map-class');
//            var placepicker = $(this).placepicker({
//                map: $map.get(0),
//                placeChanged: function (place) {
//                    currentLat = this.getLocation().latitude;
//                    currentLong = this.getLocation().longitude;
//                    currentaddrs = place.formatted_address;
//                    console.log("place changed: ", place.formatted_address, this.getLocation().latitude, this.getLocation().longitude);
//                }
//            }).data('placepicker');
//        });
    </SCRIPT>
    <script>
<?php echo $jsArray; ?>
        $('body').on("change", "#nama_kendaraan", function (events) {
            $("#plat").val($("#nama_kendaraan option:selected").val());
            $("#id_ken").val($("#nama_kendaraan option:selected").text());
            console.log($("#nama_kendaraan option:selected").text());
        });

    </script>

</html>