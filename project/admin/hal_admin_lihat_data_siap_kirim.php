

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

            <?php
                                 
                              $query2 = "SELECT max(id_surat) as maxid FROM tb_surat_jalan";
                        $hasil = mysqli_query($connect, $query2)or die(mysqli_error());
                        $hslidmax = mysqli_fetch_array($hasil);
                        $idmax = $hslidmax['maxid']; 
                        $nourut = (int) substr($idmax, 3,4);

                        $nourut++;

                        $newID = 'SRT' . sprintf('%03s', $nourut);
                                ?>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                 <?php } ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <center><h3>Data customer</h3></center><br>
                            <div style="margin-top: 30px;" class="container">
                <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg" class="img-circle img-responsive"> </div>
        
                <div class=" col-md-9 col-lg-9 "> 
                     <?php
                                $query = ("SELECT * FROM tb_okk WHERE id_sewa='$_GET[kd]'");
                                $result = mysqli_query($connect, $query)or die(mysqli_error());
                                $data = mysqli_fetch_array($result);
                                ?>
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>ID Sewa :</td>
                        <td><?php echo $data['id_sewa']; ?></td>
                      </tr>
                      <tr>
                        <td>ID Customer:</td>
                        <td><?php echo $data['id_customer']; ?></td>
                      </tr>
                      <tr>
                        <td>Nama Customer</td>
                        <td><?php echo $data['nama_customer']; ?></td>
                      </tr>
                      <tr>
                        <td>Asal Perusahaan</td>
                        <td><?php echo $data['asal_perusahaan']; ?></td>
                      </tr>

                        <tr>
                        <td>Lokasi Asal</td>
                        <td><?php echo $data['lokasi_asal']; ?></td>
                      </tr>
                    </tbody>
                  </table>
                
                </div>
            </div>
                
            
          </div>
        </div>
      </div>
    </div>
                        <div class="card">
                           <center><h3>Data perlengkapan kendaraan</h3></center> 
                            <div class="table-responsive m-t-40">
                                    <?php
                                    $tampil = ("SELECT * FROM tb_okk WHERE id_sewa='$_GET[kd]'");
                                    $result = mysqli_query($connect, $tampil)or die(mysqli_error());
                                    ?>
                                    <table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="10" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th><center>Tipe</center></th>
                                                <th>No Rangka</th>
                                                <th>No Mesin</th>
                                                <th>Alamat Lengkap</th>
                                                <th>Lokasi Pengiriman</th>
                                                <th>Perlengkapan Standart</th>
                                                <th>Deskripsi tambahan</th>
                                                <th>Tanggal</th>
                                                </tr>
                                        </thead>
                                        
                                        <tbody>                                           
                                            <?php while ($row = mysqli_fetch_array($result)) {
                                                ?><tr>

                                              <td style="width: 10px;"><?php echo $counter++ ?></td>
                                               <td style="width: 70px;"><?php echo $row['tipe']; ?></td>
                                              <td ><?php echo $row['no_rangka']; ?></td>
                                              
                                              <td ><?php echo $row['no_mesin']; ?></td>
                                              <td style="width: 190px;"><?php echo $row['alamat_tujuan']; ?></td>
                                              <td style="width: 50px;"><?php echo $row['kota_tujuan']; ?></td>
                                              <td style="width: 120px;"><?php echo $row['perlengkapan_std']; ?></td>
                                              <td style="width: 120px;"><?php echo $row['deskripsi_muatan']; ?></td>
                                              <td ><?php echo $row['tgl_sewa']; ?></td>
                                            </tr>
                                             <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                 
                            </div>

                                     <div class="card">
                           <center><h3>Data pengiriman & surat jalan</h3></center> 
                      
                            <div class="table-responsive m-t-40">
                    <form action="../proses/admin_edit_okk.php" id="formokk" method="post">
                    <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>ID Mobil :</td>
                         <td> <?php echo $data['id_mobil']; ?></td>
                      </tr>
                      <tr>
                        <td>ID Surat Jalan</td>
                        <td> <?php echo $data['id_surat']; ?>                                        
                        </td>
                      </tr>

                        <tr>
                        <td>Nama Supir</td>
                        <td> <?php echo $data['nama_supir']; ?></td>
                      </tr>

                       <tr>
                      

                        <input name="idsewa" style="visibility: hidden;" placeholder="" value="<?php echo $data['id_sewa']; ?>" type="text" class="form-control" />


                      </tr>
                      
                    </tbody>
                  </table>
              </form>
                            </div>

                            <div class="panel-footer" style="margin-top: 50px;">
                        <a data-original-title="Broadcast Message"  href="mail.php?hal=edit&kd=<?php echo $data['id_customer']; ?>" data-toggle="tooltip" class="btn btn-sm btn-primary"><i class="fa fa-envelope fa-2x" style="color: #FFFFFF;"></i></a>
                        <span class="pull-right">
                            
                            <a class="btn btn-sm btn-danger" href="hal_admin_data_siap_kirim.php" ><i class="fa fa-remove"></i> kembali</a></i></a>
                        </span>
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
    
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/scripts.js"></script>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>

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
    ordering: false
} );
    </script>
    <script>
$(document).on("click", "#open-AddBookDialog", function () {
     var myBookId = $(this).data('idsewa');
     var myBooknama = $(this).data('idcust');
     $("#idsewa").val( myBookId );
     $("#idcus").val( myBooknama );
      $("#harga_p").val( "Rp. " + accounting.formatNumber(myBookharga));
    
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>
 <script type="text/javascript">
<?php echo $jsArray; ?>
            function changeValue(id) {
//                alert(id);
                document.getElementById('Supir').value = supirm[id].name;
            }
            ;

        </script>
     <?php include("footer_admin.php"); ?>
</body>


</html>