<?php
//insert.php

 include("koneksi.php");
 $id = mysqli_real_escape_string($connect, $_POST["id"]);
 $nama = mysqli_real_escape_string($connect, $_POST["nama"]);
 $email = mysqli_real_escape_string($connect, $_POST["email"]);
 $telp = mysqli_real_escape_string($connect, $_POST["telp"]);
 $alamat = mysqli_real_escape_string($connect, $_POST["alamat"]);

 $password = mysqli_real_escape_string($connect, $_POST["password"]);
 
  $user = mysqli_real_escape_string($connect, $_POST["username"]);
 $tgl = mysqli_real_escape_string($connect, $_POST["tanggal"]);

 $query = "
 INSERT INTO tb_pemilik_kendaraan(id_pemilik_kendaraan, nama, email, no_hp, alamat, password, tanggal, notif_status,username)
 VALUES ('$id', '$nama', '$email', '$telp', '$alamat', '$password', '$tgl', '0','$user')";
$result = mysqli_query($connect, $query)or die(mysqli_error());
if ($query) {
    echo "<script>alert('Data Paket Berhasil dimasukan!'); window.location = '../hal_login.php'</script>";
} else {
    echo "<script>alert('Data Karyawan Gagal dimasukan!'); window.location = 'index.php'</script>";
}
?>