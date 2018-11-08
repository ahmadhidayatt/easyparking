<?php

include "koneksi.php";
$id = $_POST['id_pemesan'];
$nama = $_POST['nama'];
$npwp = $_POST['npwp'];
$no_ktp = $_POST['no_ktp'];
$email = $_POST['email'];
$tlp = $_POST['telpon'];
$alamat = $_POST['alamat'];
$asal_perusahaan = $_POST['asal_perusahaan'];
$passw = $_POST['password'];
$status = $_POST['status'];
$tanggal = $_POST['tanggal'];


$query = ("UPDATE tb_customer SET id_customer='$id', 
	nama='$nama',
	npwp='$npwp',
	no_ktp='$no_ktp', 
	email='$email', 
	telp='$tlp',
	alamat='$alamat',
	asal_perusahaan='$asal_perusahaan',
	password='$passw',
	status='$status', 
	tanggal_daftar='$tanggal'
 WHERE id_customer='$id'");
$result = mysqli_query($connect, $query)or die(mysqli_error());
if ($query) {
    echo "<script>alert('Data Pemesan Berhasil Diubah!'); window.location = '../admin/hal_admin_data_customer.php'</script>";
} else {
    echo "<script>alert('Data Karyawan Gagal diubah!'); window.location = 'edit.php?hal=edit&kd=$kary_id</script>";
}
?>