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
                              $query2 = "SELECT max(id_supir) as maxid FROM tb_supir";
                        $hasil = mysqli_query($connect, $query2)or die(mysqli_error());
                        $hslidmax = mysqli_fetch_array($hasil);
                        $idmax = $hslidmax['maxid']; 
                        $nourut = (int) substr($idmax, 3,4);

                        $nourut++;

                        $newID = 'SP' . sprintf('%03s', $nourut);
                                ?>
                                <form action="../proses/admin_tambah_supir.php" method="post" enctype="multipart/form-data">
                                    <table class="table table-condensed">
                                        <tr>
                                            <td><label for="kode_kar">ID Supir</label></td>
                                            <td><input name="id_supir" type="text" class="form-control" id="kode_kar" value="<?php echo $newID; ?>" placeholder="Kode Karyawan" readonly="readonly"/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="nama_kar">Nama</label></td>
                                            <td><input name="nama" type="text" class="form-control" id="nama" placeholder="Nama" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="alamat_kar">No KTP</label></td>
                                            <td><input name="no_ktp" type="text" class="form-control" id="ktp" placeholder="Nomer KTP" onkeypress="return isNumberKey(event)"required/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="no_rek">No SIM</label></td>
                                            <td><input name="no_sim" type="text" class="form-control" id="sim" placeholder="Nomer SIM" value="" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="no_rek">No Telpon</label></td>
                                            <td><input name="telpon" type="text" class="form-control" id="no_rek" placeholder="Telpon" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="no_rek">Alamat</label></td>
                                            <td><textarea name="alamat" type="text" class="form-control" id="no_rek" placeholder="Alamat"required></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><label for="no_rek">Tempat Tanggal Lahir</label></td>
                                            <td><input name="ttl" type="text" class="form-control" id="no_rek" placeholder="Tempat Tanggal Lahir" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="tgl_transfer">Tanggal Registrasi</label></td>
                                            <td><input type="text" name="tanggal" class="form-control" value="<?php echo date('M/d/Y');?>" readonly/></td>
                                            </tr>
                                        <tr>
                                            <td><label for="tgl_transfer">Pass Foto</label></td>
                                            <td><input name="pas_foto" type="file" class="form-control"/></td>
                                              </tr>
                                        <tr>
                                            <td><label for="tgl_transfer">Foto SIM</label></td>
                                            <td><input name="sim" type="file" class="form-control" /></td>
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


    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
    <script src="js/maskedinput.js"></script>

    <script>
       $('#example23').dataTable( {
    destroy: true,
    dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
} );
    </script>
     <?php include("footer_admin.php"); ?>
</body>
<SCRIPT language=Javascript>
                                                            function isNumberKey(evt)
                                                            {
                                                                var charCode = (evt.which) ? evt.which : event.keyCode
                                                                if (charCode > 31 && (charCode < 48 || charCode > 57))
                                                                    return false;
                                                                return true;
                                                            };

                                                            jQuery(function ($) {
                                                                $("#ktp").mask("99-99-99-99-99-9999");
                                                                $("#sim").mask("99-99-99-99-99-999");
                                                            });

                                                
            </SCRIPT>


</html>