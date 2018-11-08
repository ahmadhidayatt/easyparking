<?php
include "koneksi.php";
$id_pemesan	= $_POST['idsewa'];
 $id_mobil = $_POST['mobilid'];
 $id_surat = $_POST['suratid'];
 $id_supir = $_POST['id_supir'];
 $nama_supir = $_POST['namasupir'];
 $stats = 'Di proses';
 
 

$query = ("UPDATE `tb_okk` SET `id_mobil` = '$id_mobil', `id_surat` = '$id_surat', `id_supir` = '$id_supir', `nama_supir` = '$nama_supir', status = '$stats' WHERE id_sewa ='$id_pemesan'");
$result = mysqli_query($connect, $query)or die(mysqli_error());
if ($query){
	echo "<script>alert('Data  Order Kendaraan Berhasil Di Aprove!'); window.location = '../admin/hal_admin_data_order.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = '../hal_admin_list_kasir.php'</script>";	
}
?>