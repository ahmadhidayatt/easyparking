<?php
include "koneksi.php";
$id_mobil 	= $_GET['kd'];

$query = ("DELETE FROM tb_lahan WHERE id_lahan ='$id_mobil'");
$result = mysqli_query($connect, $query)or die(mysqli_error());
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = '../admin/hal_admin_data_lahan.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = '../hal_admin_list_kasir.php'</script>";	
}
?>