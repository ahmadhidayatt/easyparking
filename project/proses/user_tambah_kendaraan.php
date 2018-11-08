<?php

// PROSES PENYIMPANAN
include "koneksi.php";

$id = $_POST['idmobil'];
$nama = $_POST['nama'];
$idpk = $_POST['idpk'];
$tipe = $_POST['tipe'];
$plat = $_POST['plat'];



//$paket_to_sql = substr(strrev($paketnya), 1);
$simpan = ("insert into tb_kendaraan (id_kendaraan,id_pemilik_kendaraan,nama_kendaraan,tipe_kendaraan,plat_nomot)"
        . "VALUES ('$id',". "'$idpk',"
        . "'$nama',". "'$tipe',"
        . "'$plat')");

$result = mysqli_query($connect, $simpan)or die(mysqli_error());

echo "<script>alert('Data Kendaraan Berhasil dimasukan!'); window.location = '../admin/hal_user_data_kendaraan.php'</script>";
 // AKHIR PROSES PENYIMPAAN
?>