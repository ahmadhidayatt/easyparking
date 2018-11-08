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
    include "../proses/koneksi.php";
    $counter = 1;
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <script src="js/lib/jquery/jquery.min.js"></script>
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
                            <h3 class="text-primary">Data Transaksi</h3> </div>
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
                                    <h4 class="card-title">Data Sewa Lahan Anda</h4>
                                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                    <div class="x_content">

                                        <div class="table-responsive m-t-40">
                                            <?php
                                            $tampil = ("select * from tb_sewa_lahan order by id_sewa_lahan desc");
                                            $result = mysqli_query($connect, $tampil)or die(mysqli_error());
                                            ?>
                                            <table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="10" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th><center>ID Sewa Lahan</center></th>
                                                <th>ID Pengajuan </th>
                                                <th>ID Lahan </th>
                                                <th>ID kendaraan </th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Selesei</th>
                                                <th>Tagihan</th>
                                                <th ><center>Status</center></th>
                                                <th>Aksi</th>
                                                </tr>
                                                </thead>

                                                <tbody>                                           
                                                    <?php
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $now = new DateTime;

                                                        $otherDate = new DateTime($row['tanggal_selesei']);
                                                        ?><tr>

                                                            <td style="width: 10px;"><?php echo $counter++ ?></td>
                                                            <td style="width: 50px;"><?php echo $row['id_sewa_lahan']; ?></td>
                                                            <td style="width: 50px;"><?php echo $row['id_transaksi']; ?></td>
                                                            <td style=""><?php echo $row['id_lahan']; ?></td>
                                                            <td style=""><?php echo $row['id_kendaraan']; ?></td>
                                                            <td style=""><?php echo $row['tanggal_mulai']; ?></td>
                                                            <td style=""><?php echo $row['tanggal_selesei']; ?></td>
                                                            <td style=""><?php echo $row['tagihan']; ?></td>
                                                            <td style=""><?php echo $row['status']; ?></td>
                                                            <?php
                                                            $diff=date_diff($now,$otherDate);
                                                           
                                                            ?> 

                                                                <!--<td style="width: 150px;"></td>-->
                                                            <td style="width: 130px;"> <a type="button" id='<?php echo $row['id_sewa_lahan'] ?>'  class="btn btn-sm btn-primary" href="../proses/admin_kirim_tagihan_perpanjang.php?hal=''&kd=<?php echo $row['id_transaksi']; ?>&kds=<?php echo $row['id_sewa_lahan']; ?>"><i class="fa fa-edit"></i>Perpanjang</a> 
                                                                <a class="btn btn-sm btn-danger" href="../proses/admin_tolak_transaksi.php?hal=<?php echo $row['id_kendaraan']; ?>&kd=<?php echo $row['id_transaksi']; ?>" onclick="return confirm('Apakah anda yakin ingin menolak ?');"><i class="fa fa-wrench"></i> Selesei</a></td>
                                                        </tr>

                                                        <?php
                                                        if ($diff->format("%R")=="-" ||$diff->format("%a")=="0" ) {
                                                            echo "<script> document.getElementById('$row[id_sewa_lahan]').style.visibility = 'visible'</script>";
//                                                            echo "<script>$row[id_sewa_lahan]').prop('disabled', false)</script>";
                                                        } else {
                                                            echo "<script> document.getElementById('$row[id_sewa_lahan]').style.visibility = 'hidden';</script>";
                                                        }
                                                        ?>

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
                                                                            {
                                                                                extend: "copy",
                                                                                exportOptions: {
                                                                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                                                                                }
                                                                            },
                                                                            {
                                                                                extend: "csv",
                                                                                exportOptions: {
                                                                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                                                                                }
                                                                            },
                                                                            {
                                                                                extend: "excel",
                                                                                exportOptions: {
                                                                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                                                                                }
                                                                            },
                                                                            {
                                                                                extend: "pdf",
                                                                                exportOptions: {
                                                                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                                                                                }
                                                                            },
                                                                            {
                                                                                extend: "print",
                                                                                exportOptions: {
                                                                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                                                                                }
                                                                            }
                                                                        ],
                                                                        ordering: false
                                                                    });
                </script>

                </body>


                </html>