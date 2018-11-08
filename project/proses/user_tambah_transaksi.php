<?php

// PROSES PENYIMPANAN
include "koneksi.php";

$id = $_POST['idmobil'];
$idpk = $_POST['id_pem'];
$namapem = $_POST['nama_pem'];
$kendaraan = $_POST['nama_kendaraan'];
$idken = $_POST['id_ken'];
$plat = $_POST['plat'];
$id_lahan = $_POST['id_lahan'];
$nama_lahan = $_POST['nama_lahan'];
$idpl = $_POST['idpl'];
$tanggal = $_POST['tanggal'];
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];
$harga = $_POST['harga'];
$status = 'di proses';


//$paket_to_sql = substr(strrev($paketnya), 1);
$simpan = ("insert into tb_transaksi (id_kendaraan,id_transaksi,id_pemilik_kendaraan,nama_pemilik_kendaraan,plat_nomor,id_pemilik_lahan,id_lahan,nama_lahan,tanggal,tgl_sewa,tanggal_akhir,harga,status)"
        . "VALUES ('$idken',"."'$id',". "'$idpk',"."'$namapem',". "'$plat',"."'$idpl',". "'$id_lahan',"."'$nama_lahan',". "'$tanggal',". "'$date1',". "'$date2',"
        . "'$harga',"
        . "'$status')");

$result = mysqli_query($connect, $simpan)or die(mysqli_error());

echo "<script>alert('Data Transaksi Berhasil dimasukan!'); window.location = '../admin/hal_user_data_kendaraan.php'</script>";
 // AKHIR PROSES PENYIMPAAN
?>