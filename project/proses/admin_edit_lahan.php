<?php
include "koneksi.php";
$id_mobil	= $_POST['idmobil'];
 $plat = $_POST['plat'];
 $al = $_POST['al'];
 $id = $_POST['id'];
 

$query = ("UPDATE `tb_lahan` SET  `nama_lahan` = '$plat',`alamat` = '$al' WHERE id_lahan ='$id_mobil'");
$result = mysqli_query($connect, $query)or die(mysqli_error());
if ($query){
	echo "<script>alert('Data  Kendaraan Berhasil Di Edit!'); window.location = '../admin/hal_admin_data_lahan.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = '../hal_admin_list_kasir.php'</script>";	
}
?>