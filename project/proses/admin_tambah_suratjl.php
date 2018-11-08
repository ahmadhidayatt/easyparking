<?php

include "koneksi.php";
 if(isset($_POST['submit']))
 {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'pdf');
    $srt_jl = $_FILES['srt_jl']['name'];
    $id_surat = $_POST['id_srt_jl'];
    $namafile = $_POST['nama'];
    $idsewa = $_POST['idsewaa'];
    $idcust = $_POST['idcust'];
   
    $x = explode('.', $srt_jl);
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['srt_jl']['size'];
        $file_tmp = $_FILES['srt_jl']['tmp_name'];
      

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 1044070) {
                move_uploaded_file($file_tmp, '../admin/foto/suratjl/' . $srt_jl);
               
                $query = ("INSERT INTO tb_surat_jalan (id_surat, surat_jalan, nama_file, id_sewa, id_customer)"
            . "VALUES ('$id_surat', "
            . "'$srt_jl', "
            . "'$namafile', "
            . "'$idsewa', "
            . "'$idcust')");
               $result = mysqli_query($connect, $query)or die(mysqli_error());
        if ($query) {
        echo "<script>alert('Data Surat Jalan Berhasil dimasukan!'); window.history.back(); </script>";
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