<?php
include "koneksi.php";
$id_mobil 	= $_GET['kd'];

$query = ("DELETE FROM tb_kendaraan WHERE id_kendaraan ='$id_mobil'");
$result = mysqli_query($connect, $query)or die(mysqli_error());
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = '../admin/hal_user_data_kendaraan.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = '../hal_admin_list_kasir.php'</script>";	
}
?>