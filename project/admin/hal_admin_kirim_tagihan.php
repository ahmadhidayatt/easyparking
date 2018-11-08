

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
                                 
                              $query2 = "SELECT max(id_transaksi) as maxid FROM tb_transaksi";
                        $hasil = mysqli_query($connect, $query2)or die(mysqli_error());
                        $hslidmax = mysqli_fetch_array($hasil);
                        $idmax = $hslidmax['maxid']; 
                        $nourut = (int) substr($idmax, 3,4);

                        $nourut++;

                        $newID = 'TRS' . sprintf('%03s', $nourut);
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
                
        
                <div class=" col-md-9 col-lg-12 "> 
                     <?php
                                $query = ("SELECT * FROM tb_okk WHERE id_sewa='$_GET[kd]'");
                                $result = mysqli_query($connect, $query)or die(mysqli_error());
                                $data = mysqli_fetch_array($result);
                                ?>
                   <form action="../proses/admin_kirim_tagihan.php" method="post" >             
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>ID Transaksi :</td>
                        <td><input name="idtrans" style="border: none;" type="text" class="form-control" id="kode_kar" value="<?php echo $newID; ?>" placeholder="Kode Karyawan" readonly="readonly"/></td>
                      </tr>
                      <tr>
                        <td>ID Sewa :</td>
                        <td><input name="idsewa" style="border: none;" type="text" class="form-control" id="kode_kar" value="<?php echo $data['id_sewa']; ?>" placeholder="Kode Karyawan" readonly="readonly"/></td>
                      </tr>
                      <tr>
                        <td>ID Customer:</td>
                        <td><input name="idcust" type="text" class="form-control" id="kode_kar" value="<?php echo $data['id_customer']; ?>" placeholder="Kode Karyawan" readonly="readonly"/></td>
                      </tr>
                      <tr>
                        <td>Nama Customer</td>
                        <td><input name="nama_customer" type="text" class="form-control" id="kode_kar" value="<?php echo $data['nama_customer']; ?>" placeholder="Kode Karyawan" readonly="readonly"/></td>
                      </tr>
                      <tr>
                        <td>Asal Perusahaan</td>
                        <td><input name="" type="text" class="form-control" id="kode_kar" value="<?php echo $data['asal_perusahaan']; ?>" placeholder="Kode Karyawan" /></td>
                      </tr>

                        <tr>
                        <td>Lokasi Asal</td>
                        <td><input name="" type="text" class="form-control" id="kode_kar" value="<?php echo $data['lokasi_asal']; ?>" placeholder="Kode Karyawan" /></td>
                      </tr>
                      <tr>

                        <td>Tanggal Sewa</td>
                        <td><input name="sewatgl" type="text" class="form-control" id="kode_kar" value="<?php echo $data['tgl_sewa']; ?>" placeholder="Kode Karyawan" readonly="readonly"/>
                          <input name="tgl" type="text" style="visibility: hidden;" name="tanggal" class="form-control" value="<?php echo date('d/M/Y');?>" readonly /></td>
                      </tr>

                      <input name="harga" style="visibility: hidden;" placeholder="" value="<?php echo $data['harga']; ?>" type="text" class="form-control" />
                    </tbody>
                  </table>

                
                </div>
            </div>
                
            
          </div>
        </div>
      </div>
    </div>
                                                            <div class="card">
                           <center><h3>Total Tagihan</h3></center> 
                      
                            <div class="table-responsive m-t-40">
                    
                    <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><h2>Harga Total:</h2></td>
                         <td><h1>Rp.<?php echo number_format($data['harga'], 0, ",", "."); ?></h1> </td>
                      </tr>
                      

                       <tr>
                     


                      </tr>
                      
                    </tbody>
                  </table>
              
                            </div>

                            <div class="panel-footer" style="margin-top: 50px;">
                        <a data-original-title="Broadcast Message"  data-toggle="tooltip" class="btn btn-sm btn-primary"><i class="fa fa-envelope fa-2x" style="color: #FFFFFF;"></i></a>
                        <span class="pull-right">
                            <input type="submit" value="Kirim tagihan" name="submit" class="btn btn-sm btn-primary"/>
                            <a class="btn btn-sm btn-danger" href="hal_admin_data_siap_kirim.php" ><i class="fa fa-remove"></i> kembali</a></i></a>
                        </span>
                </div>
                </form>

                            </div>
 

                        <input name="idsewa" style="visibility: hidden;" placeholder="" value="<?php echo $data['id_sewa']; ?>" type="text" class="form-control" />

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