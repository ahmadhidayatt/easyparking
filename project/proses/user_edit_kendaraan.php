<?php
include "koneksi.php";
$id_mobil	= $_POST['idmobil'];
 $plat = $_POST['plat'];
 $nama = $_POST['nama'];
  $tipe = $_POST['tipe'];
 
 

$query = ("UPDATE `tb_kendaraan` SET  `nama_kendaraan` = '$nama',`tipe_kendaraan` = '$tipe',`plat_nomot` = '$plat' WHERE id_kendaraan ='$id_mobil'");
$result = mysqli_query($connect, $query)or die(mysqli_error());
if ($query){
	echo "<script>alert('Data  Kendaraan Berhasil Di Edit!'); window.location = '../admin/hal_user_data_kendaraan.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = '../hal_admin_list_kasir.php'</script>";	
}
?>