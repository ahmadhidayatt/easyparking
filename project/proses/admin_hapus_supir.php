<?php
include "koneksi.php";
$id_supir 	= $_GET['kd'];

$query = ("DELETE FROM tb_supir WHERE id_supir ='$id_supir'");
$result = mysqli_query($connect, $query)or die(mysqli_error());
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = '../admin/hal_admin_data_supir.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = '../hal_admin_list_kasir.php'</script>";	
}
?>