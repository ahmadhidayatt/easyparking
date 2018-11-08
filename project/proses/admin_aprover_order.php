<?php
include "koneksi.php";
$id_pemesan	= $_GET['kd'];

$query = ("UPDATE tb_okk SET status = 'aprove' WHERE id_sewa ='$id_pemesan'");
$result = mysqli_query($connect, $query)or die(mysqli_error());
if ($query){
	echo "<script>alert('Data  Order Kendaraan Berhasil Di Aprove!'); window.location = '../admin/hal_admin_data_customer.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = '../hal_admin_list_kasir.php'</script>";	
}
?>