

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

 <!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Surat Jalan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="../proses/admin_tambah_suratjl.php" id="form1" method="post" enctype="multipart/form-data">
         <table class="table table-user-information">
                    <tbody>
                    <tr>
                        <tr>
                        <td>ID Sewa</td>
                        <td><input name="idsewaa" id="idsewa" placeholder="" type="text" class="form-control" readonly="" /></td>
                      </tr>
                      <tr>
                        <td>ID Customer</td>
                        <td><input name="idcust" id="idcus" placeholder="" type="text" class="form-control" readonly/></td>
                      </tr>
                        <td>ID Surat Jalan:</td>
                        <td><input name="id_srt_jl" placeholder="" value="<?php echo $newID ?>" type="text" class="form-control" readonly/></td>
                      </tr>
                      <tr>
                        <td>Surat Jalan</td>
                        <td><input name="srt_jl"  placeholder="" type="file" class="form-control file" /></td>
                      </tr>
                       <tr>
                        <td>Nama file</td>
                        <td><input name="nama" placeholder="" type="text" class="form-control" /></td>
                      </tr>
                      
      </tbody>
                  </table>
              </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="dismis">Close</button>
        <button type="submit" name="submit" form="form1"  class="btn btn-primary">Save changes</button>
    
      </div>
    </div>
  </div>
</div>
<?php
                                    
                                   

                                     $raw_results = mysqli_query($connect, "select * from tb_surat_jalan where id_sewa='$_GET[kd]'") or die(mysql_error());
                                     $tampil = ("select * from tb_okk where id_sewa='$_GET[kd]' order by id_sewa desc");
                                     $result = mysqli_query($connect, $tampil)or die(mysqli_error());
                                      $rows = mysqli_fetch_array($result);
                                     ?>
                                     <div class="card">
                           <center><h3>Data pengiriman & surat jalan</h3></center> 
                           <div class="text-left" style="margin-bottom: -30px;">
                                     <?php
                if (mysqli_num_rows($raw_results) == 0) {
                                    ?>
                            
                                        <a href="hal_admin_tambah_supir.php" data-toggle="modal" data-target="#basicExampleModal" data-idsewa="<?php echo $rows['id_sewa'];?>"  data-idcust="<?php echo $rows['id_customer'];?>" id="open-AddBookDialog" class="btn btn-sm btn-warning">Tambah Surat Jalan Baru <i class="fa fa-arrow-circle-right"></i></a>
                                          <p style="margin-top: 10px;">Surat jalan belum tersedia, Silahkan upload surat jalan jika pengiriman ini belim memiliki surat jalan</p>
                                    </div>
                           <?php
                } else { // if there is no matching rows do following
                           ?> 
                          <a style="visibility: hidden;" href="hal_admin_tambah_supir.php" data-toggle="modal" data-target="#basicExampleModal" data-idsewa="<?php echo $rows['id_sewa'];?>"  data-idcust="<?php echo $rows['id_customer'];?>" id="open-AddBookDialog" class="btn btn-sm btn-warning">Tambah Surat Jalan Baru <i class="fa fa-arrow-circle-right"></i></a>
                                          <p style="margin-top: 10px;">Surat jalan sudah tersedia silahkan masukan surat jalan</p>
                                    </div>
                           <?php 
                            }
                           ?>
                           
                         
                            <div class="table-responsive m-t-40">
                    <form action="../proses/admin_edit_okk.php" id="formokk" method="post">
                    <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>ID Mobil :</td>
                         <td> <?php
                                    $query = ("select * from tb_mobil WHERE status = 'ready' order by id_mobil ASC");
                                     $result = mysqli_query($connect, $query)or die(mysqli_error());
                                  $jsArray = "var mobil = new Array();\n";
                                     echo '<select class="form-control" name="mobilid" onchange="changeValue(this.value)" required>';
                                     echo '<option>  </option>';
                                  while ($row = mysqli_fetch_array($result)) {
                                                   
                                     echo '<option value="' . $row['id_mobil'] . '">' . $row['id_mobil'] . ' - ' . $row['no_polisi'] . '</option>';
                                                     $jsArray .= "mobil['" . $row['id_mobil'] . "'] = {name:'" . addslashes($row['no_polisi']) . "', name2:'" . addslashes($row['status']) . "' };\n";
                                            }
                                        ?> </td>
                                        </tr>


                       
                      </tr>
                      
                      <tr>
                        <td>ID Surat Jalan</td>
                        <td> <?php
                                    $query = ("select * from tb_surat_jalan WHERE id_sewa = '$_GET[kd]' order by id_surat ASC");
                                     $result = mysqli_query($connect, $query)or die(mysqli_error());
                                  $jsArray = "var surat = new Array();\n";
                                     echo '<select class="form-control" name="suratid" onchange="changeValue(this.value)" required>';
                                     echo '<option>  </option>';
                                  while ($row = mysqli_fetch_array($result)) {
                                                   
                                     echo '<option value="' . $row['id_surat'] . '">' . $row['id_surat'] . ' - ' . $row['nama_file'] . '</option>';
                                            } 
                                        ?> 
                                        
                        </td>
                      </tr>

                        <tr>
                        <td>Nama Supir</td>
                        <td> <?php
                                    $query = ("select * from tb_supir order by id_supir ASC");
                                     $result = mysqli_query($connect, $query)or die(mysqli_error());
                                  $jsArray = "var supirm = new Array();\n";
                                     echo '<select class="form-control" name="id_supir" onchange="changeValue(this.value)" required>';
                                     echo '<option>  </option>';
                                  while ($row = mysqli_fetch_array($result)) {
                                                   
                                     echo '<option value="' . $row['id_supir'] . '">' . $row['id_supir'] . '</option>';
                                                     $jsArray .= "supirm['" . $row['id_supir'] . "'] = {name:'" . addslashes($row['nama_supir']) . "', name2:'" . addslashes($row['status']) . "' };\n";
                                            }
                                        ?> </td>
                      </tr>

                       <tr>
                        <td>Nama Supir</td>
                        <td><input name="namasupir" readonly="" placeholder="" id="Supir" type="text" class="form-control" /></td>

                        <input name="idsewa" style="visibility: hidden;" placeholder="" value="<?php echo $data['id_sewa']; ?>" type="text" class="form-control" />


                      </tr>
                      
                    </tbody>
                  </table>
              </form>
                            </div>

                            <div class="panel-footer" style="margin-top: 50px;">
                        <a data-original-title="Broadcast Message"  href="mail.php?hal=edit&kd=<?php echo $data['id_customer']; ?>" data-toggle="tooltip" class="btn btn-sm btn-primary"><i class="fa fa-envelope fa-2x" style="color: #FFFFFF;"></i></a>
                        <span class="pull-right">
                             <button type="submit" name="submit" form="formokk"  class="btn btn-sm btn-primary">Save </button>
                            <a class="btn btn-sm btn-danger" href="hal_admin_data_order.php" onclick="return confirm('Apakah anda yakin ingin meninggalkan halaman?');"><i class="fa fa-remove"></i> kembali</a></i></a>
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