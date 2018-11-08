<?php
include "koneksi.php";
$customer_id 	= $_GET['kd'];

$query = ("DELETE FROM tb_customer WHERE id_customer ='$customer_id'");
$result = mysqli_query($connect, $query)or die(mysqli_error());
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = '../admin/hal_admin_data_customer.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = '../hal_admin_list_kasir.php'</script>";	
}
?>