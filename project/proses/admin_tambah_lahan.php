<?php


include "koneksi.php";

$id = $_POST['idmobil'];
$idpl = $_POST['idpl'];
$nama = $_POST['nama'];
$luas = $_POST['luas'];
$kapasitas = $_POST['kapasitas'];
$jambuka = $_POST['jambuka'];
$jamtutup = $_POST['jamtutup'];
$alamat = $_POST['alamat'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$harga = $_POST['harga'];
$stat = 'Tersedia';
$query10 = "SELECT max(id_audit) as maxid FROM tb_audit";
$hasil = mysqli_query($connect, $query10)or die(mysqli_error());
$hslidmax = mysqli_fetch_array($hasil);
$idmax = $hslidmax['maxid'];
$nourut = (int) substr($idmax, 3, 4);
$time = date("h:i:sa");
$date = date("d/m/Y");
$nourut++;

$newIDA = 'A' . sprintf('%03s', $nourut);

//$paket_to_sql = substr(strrev($paketnya), 1);
$simpan = ("insert into tb_lahan (id_lahan,id_pemilik_lahan,nama_lahan,luas_lahan,kapasitas_lahan,kapasitas_tersedia,alamat,jam_buka,jam_tutup,status,latitude,longitude,harga)"
        . "VALUES ('$id',"
        . "'$idpl'," . "'$nama'," . "'$luas'," . "'$kapasitas'," . "'$kapasitas'," . "'$alamat'," . "'$jambuka'," . "'$jamtutup',"
        . "'$stat'," . "'$latitude'," . "'$longitude'," . "'$harga')");

$result = mysqli_query($connect, $simpan)or die(mysqli_error());

$simpan3 = ("insert into tb_audit(id_audit,tanggal,jam,deskripsi,id_pemilik_lahan)
                     VALUES ('$newIDA '," . "'$date'," . "'$time','Approve Pembayaran'," . "'$idpl')");

$resultt3 = mysqli_query($connect, $simpan3)or die(mysqli_error());

echo "<script>alert('Data Lahan Berhasil dimasukan!'); window.location = '../admin/hal_admin_data_lahan.php'</script>";
// AKHIR PROSES PENYIMPAAN
?>