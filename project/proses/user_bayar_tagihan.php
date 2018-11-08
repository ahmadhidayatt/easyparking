<?php

include "koneksi.php";
$query2 = "SELECT max(id_pembayaran) as maxid FROM tb_pembayaran";
$hasil = mysqli_query($connect, $query2)or die(mysqli_error());
$hslidmax = mysqli_fetch_array($hasil);
$idmax = $hslidmax['maxid'];
$nourut = (int) substr($idmax, 3, 4);

$nourut++;

$newID = 'PM' . sprintf('%03s', $nourut);
if (isset($_POST['submit'])) {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'pdf');
    $buktibayar = $_FILES['buktibayar']['name'];
    $id_customer = $_POST['custid'];
    $tanggal = $_POST['tanggal'];
    $hargatotal = $_POST['harga'];
    $id_pemesan = $_POST['sewaid'];
  $date = date("Y-m-d");
    $x = explode('.', $buktibayar);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['buktibayar']['size'];
    $file_tmp = $_FILES['buktibayar']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
               $date = date("Y-m-d");
                   $simpan = ("insert into tb_pembayaran (id_pembayaran,id_transaksi,tgl_sewa,id_pemilik_kendaraan,status,harga,tgl_tagihan,tgl_pembayaran,bukti_pembayaran)
                     VALUES ('$newID '," . "'$id_pemesan'," . "'$date'," . "'$id_customer','Menunggu Konfirmasi'," . "'$hargatotal'," . "'$tanggal'," . "'$date'," . "'$buktibayar')");

            $result2 = mysqli_query($connect, $simpan)or die(mysqli_error());

            
            
            move_uploaded_file($file_tmp, '../admin/foto/' . $buktibayar);
            $query = ("UPDATE tb_transaksi SET status='Menunggu Konfirmasi',tanggal='$tanggal',harga='$hargatotal'
   WHERE id_transaksi='$id_pemesan'");
            $result = mysqli_query($connect, $query)or die(mysqli_error());

     
            if ($simpan) {
                echo "<script>alert('Terima kasih telah membayar!'); window.location = '../admin/hal_user_data_tagihan.php'</script>";
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