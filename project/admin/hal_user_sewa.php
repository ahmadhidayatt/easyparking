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
    $id = $_SESSION['id'];
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
                <!-- End Left Sidebar  -->
                <!-- Page wrapper  -->
                <div class="page-wrapper">
                    <!-- Bread crumb -->
                    <div class="row page-titles">
                        <div class="col-md-5 align-self-center">
                            <h3 class="text-primary">Data Sewa</h3> </div>
                        <div class="col-md-7 align-self-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Data Sewa</li>
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
                                    <h4 class="card-title">Data kendaraan</h4>
                                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                    <div class="x_content">
                                       

                                        <div class="table-responsive m-t-40">
                                            <?php
                                            $tampil = ("select tk.id_kendaraan,tk.plat_nomot,ts.id_sewa_lahan,ts.id_sewa_lahan,ts.id_lahan,ts.tanggal_mulai,ts.tanggal_selesei,ts.status from tb_kendaraan tk,tb_pemilik_kendaraan tpk,tb_sewa_lahan ts where ts.id_kendaraan =tk.id_kendaraan and tk.id_pemilik_kendaraan= tpk.id_pemilik_kendaraan and tpk.id_pemilik_kendaraan='$id' and ts.status='disewa' ORDER by tpk.id_pemilik_kendaraan desc");
                                            $result = mysqli_query($connect, $tampil)or die(mysqli_error());
                                            ?>
                                            <table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="10" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th><center>ID kendaraan</center></th>
                                                <th>Plat Nomor </th>
                                                <th>ID Sewa Lahan</th>
                                                <th>ID_Lahan</th>
                                                <th>Tanggal_Mulai</th>
                                                <th>Tanggal_Selesei</th>
                                                <th>Status</th>

                                                </tr>
                                                </thead>

                                                <tbody>                                           
                                                    <?php while ($row = mysqli_fetch_array($result)) {
                                                        ?><tr>

                                                            <td style="width: 10px;"><?php echo $counter++ ?></td>
                                                            <td style="width: 50px;"><?php echo $row['id_kendaraan']; ?></td>
                                                            <td style=""><?php echo $row['plat_nomot']; ?></td>
                                                            <td style=""><?php echo $row['id_sewa_lahan']; ?></td>

                                                            <td style=""><?php echo $row['id_lahan']; ?></td>
                                                            <td style=""><?php echo $row['tanggal_mulai']; ?></td>
                                                            <td style=""><?php echo $row['tanggal_selesei']; ?></td>
                                                            <td style=""><?php echo $row['status']; ?></td>       
                                                            
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
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


                <script src="js/lib/datatables/datatables.min.js"></script>
                <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
                <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
                <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
                <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
                <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
                <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
                <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
                <script src="js/lib/datatables/datatables-init.js"></script>
                <script>
                                                                $('#example23').dataTable({
                                                                    destroy: true,
                                                                    dom: 'Bfrtip',
                                                                    buttons: [
                                                                        'excel', 'pdf', 'print'
                                                                    ],
                                                                    ordering: false
                                                                });
                </script>

                </body>


                </html>