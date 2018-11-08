<?php

include "koneksi.php";

$username = $_POST['username'];
$pass = $_POST['password'];

$login = mysqli_query($connect, "SELECT * FROM tb_pemilik_kendaraan WHERE username = '$username' AND password='$pass' ");
if (mysqli_num_rows($login) == 0) {
    $login = mysqli_query($connect, "SELECT * FROM tb_pemilik_lahan WHERE username = '$username' AND password='$pass'");
}
$ketemu = mysqli_num_rows($login);
$row = mysqli_fetch_array($login);
if ($ketemu > 0) {
    session_start();
    $_SESSION['nama'] = $row['nama'];
   
    $_SESSION['password'] = $password;
    $_SESSION['level'] = $row['level'];
    $username = $username;
    $level = $_SESSION['level'];
    $pass = $_SESSION['pwd'];
    if ($row['level'] == "admin") {
          $_SESSION['id'] = $row['id_pemilik_lahan'];
        header('location: ../admin/index.php');
    }  else {
        $_SESSION['level'] = 'user';
          $_SESSION['id'] = $row['id_pemilik_kendaraan'];
        header('location:../admin/hal_user.php');
    }
} else {
    echo "<center><br><br><br><br><br><br><b>LOGIN GAGAL! </b><br>
        Username atau Password Anda tidak benar.<br>";
    echo "<br>";
    echo "<input class='btn btn-blue' type=button value='ULANGI LAGI' onclick=location.href='../hal_login.php'></a></center>";
}
?>
