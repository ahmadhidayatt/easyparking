<?php

include "koneksi.php";
if(isset($_POST['submit']))
 {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'pdf');
    $pas_foto = $_FILES['pas_foto']['name'];
    $sim = $_FILES['sim']['name'];
    $id_supir = $_POST['id_supir'];
    $nama = $_POST['nama'];
    $no_ktp = $_POST['no_ktp'];
    $no_sim = $_POST['no_sim'];
    $telpon = $_POST['telpon'];
    $alamat = $_POST['alamat'];
    $ttl = $_POST['ttl'];
    $tanggal = $_POST['tanggal'];
    $x = explode('.', $pas_foto);
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['pas_foto']['size'];
        $file_tmp = $_FILES['pas_foto']['tmp_name'];
        $file_tmp2 = $_FILES['sim']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 1044070) {
                move_uploaded_file($file_tmp, '../admin/foto/' . $pas_foto);
                move_uploaded_file($file_tmp2, '../admin/foto/' . $sim);
                $query = ("UPDATE tb_supir SET id_supir='$id_supir', 
	nama_supir='$nama',
	alamat='$alamat',
	tempat_tgl_lahir='$ttl', 
	no_telp='$telpon', 
	no_ktp='$no_ktp',
	no_sim='$no_sim',
	sim='$sim',
	pas_foto='$pas_foto'
 WHERE id_supir='$id_supir'");
               $result = mysqli_query($connect, $query)or die(mysqli_error());
        if ($query) {
        echo "<script>alert('Data Supir berhasil diedit!'); window.location = '../admin/hal_admin_data_supir.php'</script>";
    } else {
        echo "<script>alert('Data Kasir Gagal dimasukan!'); window.location = 'index.php'</script>";
    }
            } else {
                echo 'UKURAN FILE TERLALU BESAR';
            }
        } else {
            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
        }
}
?>