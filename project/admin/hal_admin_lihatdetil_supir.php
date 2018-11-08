

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
                            <div class="container">
                                  <?php
                                $query = ("SELECT * FROM tb_supir WHERE id_supir='$_GET[kd]'");
                                $result = mysqli_query($connect, $query)or die(mysqli_error());
                                $data = mysqli_fetch_array($result);
                                ?>
                <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo "foto/" . $data['pas_foto']; ?>" class="img-circle img-responsive"> </div>
        
                <div class=" col-md-9 col-lg-9 "> 
                    
                  <table class="table table-user-information">
                    <tbody>
                       <tr>
                                            <td><label for="kode_kar">ID Supir</label></td>
                                            <td><input name="id_supir" type="text" class="form-control" id="kode_kar" value="<?php echo $data['id_supir']; ?>" placeholder="Kode Karyawan" readonly="readonly"/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="nama_kar">Nama</label></td>
                                            <td><input name="nama" type="text" class="form-control" id="nama" value="<?php echo $data['nama_supir']; ?>" placeholder="Nama" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="alamat_kar">No KTP</label></td>
                                            <td><input name="no_ktp" type="text" class="form-control" value="<?php echo $data['no_ktp']; ?>" placeholder="Nomer KTP" onkeypress="return isNumberKey(event)"required/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="no_rek">No SIM</label></td>
                                            <td><input name="no_sim" type="text" class="form-control" value="<?php echo $data['no_sim']; ?>" placeholder="Nomer SIM" value="" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="no_rek">No Telpon</label></td>
                                            <td><input name="telpon" type="text" class="form-control" id="no_rek" value="<?php echo $data['no_telp']; ?>" placeholder="Telpon" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="no_rek">Alamat</label></td>
                                            <td><textarea name="alamat" type="text" class="form-control" value=""  placeholder="Alamat"required><?php echo $data['alamat']; ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><label for="no_rek">Tempat Tanggal Lahir</label></td>
                                            <td><input name="ttl" type="text" class="form-control" value="<?php echo $data['tempat_tgl_lahir']; ?>"  placeholder="Tempat Tanggal Lahir" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="tgl_transfer">Tanggal Registrasi</label></td>
                                            <td><input type="text" name="tanggal" class="form-control" value="<?php echo $data['tgl_registrasi']; ?>" readonly/></td>
                                            </tr>
                                  
                                        <tr>
                                            <td><label for="tgl_transfer">Foto SIM</label></td>
                                            <td><center><img style="width: 20%" src="<?php echo "foto/" . $data['sim']; ?>"></center></td>
                                        </tr >
                                        
                    </tbody>
                  </table>
                
                </div>
            </div>
                 <div class="panel-footer" style="margin-top: 50px;">
                        
                        <span class="pull-right">
                            
                            <a class="btn btn-sm btn-danger" href="hal_admin_data_supir.php"><i class="fa fa-back fa-2x"></i> Kembali</a></i></a>
                        </span>
                </div>
            
          </div>
        </div>
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
       $('#example23').dataTable( {
    destroy: true,
    dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
    ordering: false
} );

       $(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});
    </script>
     <?php include("footer_admin.php"); ?>
</body>


</html>