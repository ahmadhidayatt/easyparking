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
    $nama = $_SESSION['nama'];
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
                                 <h4 class="card-title">Form Pembayaran Taguhan</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="x_content">
                                    <?php
                                    $tampil = ("select * from tb_transaksi where id_transaksi= '$_GET[kd]'   ");
                                    $result = mysqli_query($connect, $tampil)or die(mysqli_error());
                                    $data = mysqli_fetch_array($result);
                                    ?>
                                   <form action="../proses/user_bayar_tagihan.php" method="post" enctype="multipart/form-data">
                                        
                                         <table class="table table-condensed">
                                        <tr>
                                            <td><h4><label for="kode_kar">ID Pemilik Kendaaan</label> : <input name="cust" style="border: none;" value="<?php echo $data['id_pemilik_kendaraan']; ?>"></h4></td>
                                        </tr>

                                    </table><hr>
                                    <div class="text-left" style="margin-left: 7px;">
                                        <h4><label for="kode_kar">Nama Pemilik Kendaraan </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $data['nama_pemilik_kendaraan']; ?></h4>
                                        <h4><label for="kode_kar">Tanggal Pengajuan</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['tanggal']; ?></h4>
                                    </div>
                                    <hr>
                                     <?php
                                    $tampil = ("select * from tb_transaksi where id_transaksi= '$_GET[kd]' ");
                                    $result = mysqli_query($connect, $tampil)or die(mysqli_error());
                                    ?>
                                    <table id="datatable" class="table table-striped table-bordered">
                                       <thead>
                                            <tr>
                                                <th>No</th>
                                                <th><center>ID Transaksi</center></th>
                                                <th><center>ID Pemmilik Kendaraan</center></th>
                                                <th>Nama Pemilik kendaraan</th>
                                                <th>Tanggal Transaksi Anda</th>
                                                <th>Harga</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>                                           
                                            <?php while ($row = mysqli_fetch_array($result)) {
                                                ?><tr>
                                                <td style="width: 10px;"><?php echo $counter++ ?></td>
                                               <td><?php echo $row['id_transaksi']; ?></td>
                                              
                                               <td style="width: 100px;"><?php echo $row['id_pemilik_kendaraan']; ?></td>
                                              <td style="width: 200px;"><?php echo $row['nama_pemilik_kendaraan']; ?></td>
                                      
                                              <td style="width: 150px;"><?php echo $row['tgl_sewa']; ?></td>
                                              <td style="width: 150px;">Rp.<?php echo number_format($row['harga'], 2, ",", "."); ?></td>
                                            
                                              
                                            </tr>
                                           
                                        </tbody>
                                            
                                    </table>
                                     
                                    <div class="text-right" style="margin-right: 30px; margin-top: 20px;">
                                        <h2><label for="kode_kar">Total</label>: Rp.<?php echo number_format($row['harga'], 2, ",", "."); ?></h2>
                                    </div>  
                                    <div class="text-left" style="margin-right: 30px; margin-top: 20px;">
                                        <center><h2>Upload bukti pembayaran</h2></center>
                                        <div style="margin-top: 10px;" class="col-md-6">
                                <label for="norekmed">Bukti Pembayaran *</label>
                                <input id="norekmed" name="buktibayar"  class="form-control" type="file" > <input type="text" style="visibility: hidden;" name="tanggal" class="form-control" value="<?php echo date('Y-d-m');?>" readonly />
                                <span id="error_age" class="text-danger">
                                    <input type="text" style="visibility: hidden;" name="custid" class="form-control" value="<?php echo $row['id_pemilik_kendaraan'];?>" readonly />
                                    <input type="text" style="visibility: hidden;" name="sewaid" class="form-control" value="<?php echo $row['id_transaksi'];?>" readonly />
                                     <input type="text" style="visibility: hidden;" name="harga" class="form-control" value="<?php echo $row['harga'];?>" readonly />
                                <span id="error_age" class="text-danger">
                                </span>
                            </div>
                              <?php
                                            }
                                            ?>
                                    </div> 
                                    <input type="submit" name="submit" value="Simpan Data"  class="btn btn-sm btn-primary"/>
                                    </form>

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

    <script src="js/tanggal.js"></script>

       <script type="text/javascript">
<?php echo $jsArray; ?>
            function changeValue(id) {
//                alert(id);
                document.getElementById('harga').value = tujuan[id].name2;
                 document.getElementById('id_rute').value = tujuan[id].name;
            }
            ;

        </script>
</html>