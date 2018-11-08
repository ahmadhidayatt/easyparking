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
                                $query = ("SELECT * FROM tb_customer WHERE id_customer='$_GET[kd]'");
                                $result = mysqli_query($connect, $query)or die(mysqli_error());
                                $data = mysqli_fetch_array($result);
                                ?>
                                <form action="../proses/admin_edit_pemesan.php" method="post">
                                    <table class="table table-condensed">
                                        <tr>
                                            <td><label for="kode_kar">ID Pemesan</label></td>
                                            <td><input name="id_pemesan" type="text" class="form-control" id="kode_kar" value="<?php echo $data['id_customer']; ?>" placeholder="Kode Karyawan" readonly="readonly"/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="nama_kar">Nama</label></td>
                                            <td><input name="nama" type="text" class="form-control" id="nama" placeholder="Nama" value="<?php echo $data['nama']; ?>" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="alamat_kar">NPWP</label></td>
                                            <td><input name="npwp" type="text" class="form-control" id="npwp"onkeypress="return isNumberKey(event)" value="<?php echo $data['npwp']; ?>"required/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="no_rek">No KTP</label></td>
                                            <td><input name="no_ktp" type="text" class="form-control" id="no_rek" placeholder="Telpon" value="<?php echo $data['no_ktp']; ?>" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="no_rek">Email</label></td>
                                            <td><input name="email" type="text" class="form-control" id="no_rek" placeholder="Telpon" value="<?php echo $data['email']; ?>" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="no_rek">No Telpon</label></td>
                                            <td><input name="telpon" type="text" class="form-control" id="no_rek" placeholder="Telpon" value="<?php echo $data['telp']; ?>" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="no_rek">Alamat</label></td>
                                            <td><textarea name="alamat" type="text" class="form-control" id="no_rek" placeholder="Telpon"required><?php echo $data['alamat']; ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><label for="no_rek">Asal Perusahaan</label></td>
                                            <td><input name="asal_perusahaan" type="text" class="form-control" id="no_rek" placeholder="Telpon" value="<?php echo $data['asal_perusahaan']; ?>" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="pas">Password</label></td>
                                            <td><input type="text" id="password" name="password" class="form-control" data-toggle="password" value="<?php echo $data['password']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label for="no_rek">Status</label></td>
                                            <td><input name="status" type="text" class="form-control" id="no_rek" placeholder="Telpon" value="<?php echo $data['status']; ?>" readonly/></td>
                                        </tr> 
                                       
                                        <tr>
                                            <td><label for="tgl_transfer">Tanggal Buat</label></td>
                                            <td><input name="tanggal" type="text" class="form-control" id="tgl_transfer" value="<?php echo $data['tanggal_daftar']; ?>" readonly="readonly"/></td>
                                            <!--<td><input style="visibility: hidden" name="tanggal" type="text" class="form-control" id="tgl_transfer" value="<?php echo $data['id']; ?>" readonly="readonly"/></td>-->
                                        </tr>
                                        <tr>

                                            <td><input type="submit" value="Simpan Data"  class="btn btn-sm btn-primary"/>&nbsp;<a href="hal_admin_data_customer.php" class="btn btn-sm btn-primary">Kembali</a></td>
                                            <input style="visibility: hidden" name="id" type="text" class="form-control" id="tgl_transfer" value="<?php echo $data['id']; ?>" readonly="readonly"/>
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

    <script>
       $('#example23').dataTable( {
    destroy: true,
    dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
    ordering: false
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
                                                                $("#npwp").mask("99-999-999-9-999-999");
                                                            });

                                                
            </SCRIPT>


</html>