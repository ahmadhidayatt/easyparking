<?php

include "koneksi.php";
$term = trim(strip_tags($_GET['term']));

$query = "SELECT * FROM tb_rute_pengiriman WHERE kota_tujuan LIKE '" . $term . "%'";
//query database untuk mengecek tabel anime 
$result = mysqli_query($connect, $query)or die(mysqli_error());

while ($row = mysqli_fetch_array($result)) {
    $row['value'] = htmlentities(stripslashes($row['kota_tujuan']));
    $row['harga'] = $row['harga'];
//buat array yang nantinya akan di konversi ke json
    $row_set[] = $row;
}
//data hasil query yang dikirim kembali dalam format json

echo json_encode($row_set);
?>