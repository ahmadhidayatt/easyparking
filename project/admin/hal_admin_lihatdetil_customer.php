

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
                <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg" class="img-circle img-responsive"> </div>
        
                <div class=" col-md-9 col-lg-9 "> 
                     <?php
                                $query = ("SELECT * FROM tb_customer WHERE id_customer='$_GET[kd]'");
                                $result = mysqli_query($connect, $query)or die(mysqli_error());
                                $data = mysqli_fetch_array($result);
                                ?>
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>ID Pemesan :</td>
                        <td><?php echo $data['id_customer']; ?></td>
                      </tr>
                      <tr>
                        <td>Nama:</td>
                        <td><?php echo $data['nama']; ?></td>
                      </tr>
                      <tr>
                        <td>NPWP</td>
                        <td><?php echo $data['npwp']; ?></td>
                      </tr>
                      <tr>
                        <td>No KTP</td>
                        <td><?php echo $data['no_ktp']; ?></td>
                      </tr>
                        <tr>
                        <td>Email </td>
                        <td><?php echo $data['email']; ?></td>
                      </tr>
                      <tr>
                        <td>No Telpon</td>
                        <td><?php echo $data['telp']; ?></td>
                      </tr>
                      <tr> <td>Alamat </td>
                        <td><?php echo $data['alamat']; ?>
                        </td> </tr>
                       <tr>
                        <td>Asal Perusahaan </td>
                        <td><?php echo $data['asal_perusahaan']; ?></td>  
                     </tr>
                     <tr>
                        <td>Password </td>
                        <td><?php echo $data['password']; ?></td>  
                     </tr>
                     <tr>
                        <td>Status </td>
                        <td><?php echo $data['status']; ?></td>  
                     </tr>
                     <tr>
                        <td>Tanggal Daftar </td>
                        <td><?php echo $data['tanggal_daftar']; ?></td>  
                     </tr>
                    </tbody>
                  </table>
                
                </div>
            </div>
                 <div class="panel-footer" style="margin-top: 50px;">
                        <a data-original-title="Broadcast Message"  href="mail.php?hal=edit&kd=<?php echo $data['id_customer']; ?>" data-toggle="tooltip" class="btn btn-sm btn-primary"><i class="fa fa-envelope fa-2x" style="color: #FFFFFF;"></i></a>
                        <span class="pull-right">
                            <a class="btn btn-sm btn-primary" href="hal_admin_edit_customer.php?hal=edit&kd=<?php echo $data['id_customer']; ?>"><i class="fa fa-edit fa-2x"></i> Edit</a>
                            <a class="btn btn-sm btn-danger" href="../proses/admin_hapus_pemesan.php?hal=hapus&kd=<?php echo $data['id_customer']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus Paket?');"><i class="fa fa-remove fa-2x"></i> Hapus</a></i></a>
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