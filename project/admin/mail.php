
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

 include "../proses/koneksi.php";
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
 }
	} catch (Exception $e) {
	    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}
   




?>

<style type="text/css">
	
	.main-container{
    
background: #d53369; /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #d53369 , #cbad6d); /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #d53369 , #cbad6d); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        
    }
.highlight  {
    width: 600px;
    color: white;
    background: rgba(0, 0, 0, 0.26);
    border-radius: 10px;
    padding: 3%;
    
	}
    
.highlight img {
    
    float: left;
    width: 100px;
    height: 100px; 
    margin: 10px;
    }
    
.highlight ul {
    list-style-image: url('http://icons.iconarchive.com/icons/yusuke-kamiyamane/fugue/16/tick-small-icon.png');
    margin-left: 1%;
    float: left; 
    clear: right
    }
    
.highlight button {
   margin-left: 1%;
    float: right;
    }

.highlight h1,h2,h3,h4,h5,h6 {
    padding-bottom: 2%;
  border-bottom: 2px dashed rgba(255, 255, 255, 0.41);
    font-size:20px;
    text-align : center;
    text-transform: uppercase;
    }
    
.highlight p {
    text-align: justify;
    }
</style>