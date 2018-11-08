<?php

// PROSES PENYIMPANAN
include "koneksi.php";

$id_Sewa = $_POST['id_Sewa'];
$id_pemesan = $_POST['id_pemesan'];
$nama = $_POST['nama'];
$asal_perusahaan = $_POST['asal_perusahaan'];
$tipe = $_POST['tipe'];
$no_rangka = $_POST['no_rangka'];
$no_mesin = $_POST['no_mesin'];
$ruteid = $_POST['ruteid'];
$tujuan_asal = $_POST['tujuan_asal'];
$kota_tujuan = $_POST['kota_tujuan'];
$harga = $_POST['harga_order'];
$alamat_tujuan = $_POST['alamat_tujuan'];
$Keterangan = $_POST['Keterangan'];
$tanggal = $_POST['tanggal'];
$stat = 'pending';
$id_mobil = "NULL";
$id_surat = "NULL";
$id_supir = "NULL";
$nama_supir = "NULL";

$paketnya = '';
$paket_dipilih = $_POST['paket'];
for ($b = 0; $b < count($_POST['paket']); $b++) {
    $paketnya = $paketnya . $paket_dipilih[$b] . ',';
}

$paket_to_sql = rtrim($paketnya,",");

//$paket_to_sql = substr(strrev($paketnya), 1);
$simpan = ("insert into tb_okk (id_sewa, id_customer, nama_customer, asal_perusahaan, tipe, no_rangka, no_mesin, id_rute, lokasi_asal, alamat_tujuan, kota_tujuan, perlengkapan_std, deskripsi_muatan, tgl_sewa, id_mobil, id_surat, id_supir, nama_supir, harga, status)"
        . "VALUES ('$id_Sewa',"
        . "'$id_pemesan',"
        . "'$nama',"
        . "'$asal_perusahaan',"
        . "'$tipe',"
        . "'$no_rangka',"
        . "'$no_mesin',"
        . "'$ruteid',"
        . "'$tujuan_asal',"
        . "'$alamat_tujuan',"
        . "'$kota_tujuan',"
        . "'$paket_to_sql',"
        . "'$Keterangan',"
        . "'$tanggal',"
        . "NULL,"
        . "NULL,"
        . "NULL,"
        . "NULL,"
        . "'$harga',"
        . "'$stat')");
$result = mysqli_query($connect, $simpan)or die(mysqli_error());
echo "<script>alert('Data Order Kendaraan Berhasil dimasukan!'); window.location = '../admin/hal_user.php'</script>";
 // AKHIR PROSES PENYIMPAAN
?>