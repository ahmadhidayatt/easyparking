<?php
include "koneksi.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

$res  = mysqli_query($connect,"SELECT * FROM tb_customer WHERE id_customer='$_GET[kd]'") or die(mysqli_error($connect));


if($res && mysqli_num_rows($res)>0)
{
    $data = mysqli_fetch_assoc($res);
    $userEmail = $data['email']; // now this is your email id variable for user's email address.
  	$nama = $data['nama'];	


    $mail = new PHPMailer(true);
try {
    $subject = "Akun Telah Aktif";
    $content = "<div class ='main-container'>

<div class='highlight' style='margin-left:0;'>
<h2><b>Hello $nama.</b></h2>
	<div class='row'>
  
		
        <img src ='http://davidnaylor.org/temp/thunderbird-logo-200x200.png' /> 
    
        </div>
        <div class='row'>
        <p> <h2>Registrasi anda teah di setujui oleh pihak kami silahkan login untuk dapat mengakses Website kami</h2></p>
        <a href='http://localhost/Aplikasi_Towing/project/hal_login.php' class='btn btn-sm btn-primary'>Login now</a>
      
        </div>
    </div>
	</div>
</div>
</div>";
    

     //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'angga.reno99@gmail.com';                 // SMTP username
    $mail->Password = 'reno1996';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587; // or 587


    $mail->SetFrom("scnd.anggareno@gmail.com", "Admin HSP");
    $mail->AddReplyTo("scnd.anggareno@gmail.com", "Admin HSP");
    $mail->AddAddress($userEmail); // you can't pass php variables in single goutes like '$userEmail'. 
    $mail->Subject = $subject;
    $mail->MsgHTML($content);
    $mail->IsHTML(true);
 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo 'Message has been sent to '; 
    echo $userEmail;
    echo "<br/>";
    echo "<a href='hal_admin_data_customer.php' class='btn btn-sm btn-primary'>Kembali</a>";
    $id_pemesan	= $_GET['kd'];

	$query = ("UPDATE tb_customer SET status = 'aprove' WHERE id_customer ='$id_pemesan'");
	$result = mysqli_query($connect, $query)or die(mysqli_error());
if ($query){
	echo "<script>alert('Data Berhasil Aprove!'); window.location = '../admin/hal_admin_data_customer.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = '../hal_admin_list_kasir.php'</script>";	
}
 }
	} catch (Exception $e) {
	    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}
?>