<?php

include "koneksi.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

$res = mysqli_query($connect, "SELECT * FROM tb_pemilik_kendaraan WHERE id_pemilik_kendaraan='$_GET[hal]'") or die(mysqli_error($connect));
$query = mysqli_query($connect, "SELECT * FROM tb_pembayaran WHERE id_pembayaran='$_GET[kd]'") or die(mysqli_error($connect));
$query10 = "SELECT max(id_sewa_lahan) as maxid FROM tb_sewa_lahan";
$hasil = mysqli_query($connect, $query10)or die(mysqli_error());
$hslidmax = mysqli_fetch_array($hasil);
$idmax = $hslidmax['maxid'];
$nourut = (int) substr($idmax, 3, 4);

$nourut++;

$newID = 'SL' . sprintf('%03s', $nourut);

$query101 = "SELECT max(id_audit) as maxid FROM tb_audit";
$hasil = mysqli_query($connect, $query10)or die(mysqli_error());
$hslidmax = mysqli_fetch_array($hasil);
$idmax = $hslidmax['maxid'];
$nourut = (int) substr($idmax, 3, 4);

$nourut++;

$newIDA = 'A' . sprintf('%03s', $nourut);

if ($res && mysqli_num_rows($res) > 0) {
    $data = mysqli_fetch_assoc($res);
    $rows = mysqli_fetch_assoc($query);
    $userEmail = $data['email']; // now this is your email id variable for user's email address.
    $nama = $data['nama'];

    $idtrans = $rows['id_pembayaran'];
    $ids = $rows['id_transaksi'];
    $tgl_sewa = $rows['tgl_pembayaran'];

    $total_harga = $rows['harga'];

    $query2 = mysqli_query($connect, "SELECT * FROM tb_transaksi WHERE id_transaksi='$ids'") or die(mysqli_error($connect));
    $rows2 = mysqli_fetch_assoc($query2);
    $id_lahan = $rows2['id_lahan'];
    $id_pemilik_lahan = $rows2['id_pemilik_lahan'];
    $query3 = mysqli_query($connect, "SELECT * FROM tb_lahan WHERE id_lahan='$id_lahan'") or die(mysqli_error($connect));
    $rows3 = mysqli_fetch_assoc($query3);
    $query4 = mysqli_query($connect, "SELECT * FROM tb_pemilik_lahan WHERE id_pemilik_lahan='$id_pemilik_lahan'") or die(mysqli_error($connect));
    $rows4 = mysqli_fetch_assoc($query4);
    $tgl_mulai = $rows2['tgl_sewa'];
    $tgl_akhir = date('Y-m-d',strtotime('+30 days',strtotime(str_replace('/', '-',$rows2['tgl_sewa'])))) . PHP_EOL;
    $plat = $rows2['plat_nomor'];
    $alamat = $rows3['alamat'];
    $namapem = $rows4['nama'];
    $hp = $rows4['no_hp'];
    $mulai = $rows2['tgl_sewa'];
    $akhir = $rows2['tanggal_akhir'];
    $nama_lahan = $rows2['nama_lahan'];
    $id_kendaraan = $rows2['id_kendaraan'];

    $query11 = "select * from tb_sewa_lahan where id_transaksi ='$ids'";
    $hasil11 = mysqli_query($connect, $query11)or die(mysqli_error());
    $hslidmax11 = mysqli_fetch_array($hasil11);

    if ($hslidmax11 > 0) {
        $newID = $hslidmax11['id_sewa_lahan'];
    }


    $mail = new PHPMailer(true);
    try {
        $subject = "CONGRULATIONS!!";
        $content = '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta name="format-detection" content="telephone=no"/>

    

    <style>
/* Reset styles */ 
body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
#outlook a { padding: 0; }
.ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }

/* Rounded corners for advanced mail clients only */ 
@media all and (min-width: 560px) {
    .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
}

/* Set color for auto links (addresses, dates, etc.) */ 
a, a:hover {
    color: #FFFFFF;
}
.footer a, .footer a:hover {
    color: #828999;
}

    </style>
    <!-- MESSAGE SUBJECT -->
    <title>Get this responsive email template</title>

</head>

<!-- BODY -->
<!-- Set message background color (twice) and text color (twice) -->
<body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
    background-color: #2D3445;
    color: #FFFFFF;"
    bgcolor="#2D3445"
    text="#FFFFFF">

<!-- SECTION / BACKGROUND -->
<!-- Set message background color one again -->
<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background"><tr><td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;"
    bgcolor="#F0F0F0">

<!-- WRAPPER -->
<!-- Set wrapper width (twice) -->
<table border="0" cellpadding="0" cellspacing="0" align="center"
    width="1000" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
    max-width: 1000px;" class="wrapper">

    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
            padding-top: 20px;
            padding-bottom: 20px;">

            

<!-- WRAPPER / CONTEINER -->
<!-- Set conteiner background color -->
<table border="0" cellpadding="0" cellspacing="0" align="center"
    bgcolor="#FFFFFF"
    width="900" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
    max-width: 1000px;" class="container">

    <!-- HEADER -->
    <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
            padding-top: 25px;
            color: #000000;
            font-family: sans-serif;" class="header">
                 Pembayaran Diterima
        </td>
    </tr>
    
    <!-- SUBHEADER -->
    <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 18px; font-weight: 300; line-height: 150%;
            padding-top: 5px;
            color: #000000;
            font-family: sans-serif;" class="subheader">
                Terimakasih ' . $nama . ' &nbsp; Pembayaran anda telah kami terima.&nbsp;
        </td>
    </tr>

    <!-- HERO IMAGE -->
    <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including "auto"). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
            padding-top: 20px;" class="hero"><a target="_blank" style="text-decoration: none;"
            href="https://github.com/konsav/email-templates/"><img border="0" vspace="0" hspace="0"
            src="https://raw.githubusercontent.com/konsav/email-templates/master/images/hero-wide.png"
            alt="Please enable images to view this content" title="Hero Image"
            width="560" style="
            width: 100%;
            max-width: 560px;
            color: #000000; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;"/></a></td>
    </tr>
    
    <!-- LINE -->
    <!-- Set line color -->
    <tr>    
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
            padding-top: 25px;" class="line"><h3>Data Pengajuan Transaksi Anda</h3><hr
            color="black" align="center" width="100%" size="1" noshade style="margin: 0; padding: 0;" />
        </td>
    </tr>
        

    <!-- LIST -->
    <tr>
        <td align="left" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%;" class="list-item"><table align="center" border="0" cellspacing="0" cellpadding="0" style="width: inherit; margin: 0; padding: 0; border-collapse: collapse; border-spacing: 0;">
            
            <!-- LIST ITEM -->
            <tr>

                <!-- LIST ITEM IMAGE -->
                <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
            

                <!-- LIST ITEM TEXT -->
                <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
            
                <td align="left" valign="top" style="font-size: 17px; font-weight: 400; line-height: 160%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                    padding-top: 25px;
                    color: #000000;
                    font-family: sans-serif;" class="paragraph">
                        <b style="color: #333333;">ID Transaksi</b><br/>
                        ' . $ids . '
                </td>

            </tr>
            <!-- LIST ITEM -->
          
           
            <!-- LIST ITEM -->
            <tr>

                <!-- LIST ITEM IMAGE -->
                <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
                

                <!-- LIST ITEM TEXT -->
                <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
            
                <td align="left" valign="top" style="font-size: 17px; font-weight: 400; line-height: 160%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                    padding-top: 25px;
                    color: #000000;
                    font-family: sans-serif;" class="paragraph">
                        <b style="color: #333333;">Tanggal Sewa Anda </b><br/>
                        ' . $mulai . ' -  ' . $akhir . '
                </td>

            </tr>
             <!-- LIST ITEM -->
            <tr>

                <!-- LIST ITEM IMAGE -->
                <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
                

                <!-- LIST ITEM TEXT -->
                <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
            
                <td align="left" valign="top" style="font-size: 17px; font-weight: 400; line-height: 160%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                    padding-top: 25px;
                    color: #000000;
                    font-family: sans-serif;" class="paragraph">
                        <b style="color: #333333;">Tanggal Pembayaran </b><br/>
                        ' . $tgl_sewa . ' 
                </td>

            </tr>
            <!-- LIST ITEM -->
            
            <!-- LIST ITEM -->
            <!-- LIST ITEM -->
            <tr>

                <!-- LIST ITEM IMAGE -->
                <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
            

                <!-- LIST ITEM TEXT -->
                <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
            
                <td align="left" valign="top" style="font-size: 17px; font-weight: 400; line-height: 160%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                    padding-top: 25px;
                    color: #000000;
                    font-family: sans-serif;" class="paragraph">
                        <b style="color: #333333;"> Harga</b><br/>
                        ' . $total_harga . '
                </td>

            </tr>
              <tr>
                 <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                 padding-top: 25px; 
                 color: #000000;
                 font-family: sans-serif;" class="paragraph">
                Kami telah menerima Pembayaran anda, Penyewaan anda telah berhasil dengan  :
                    </td>
            </tr>
            <!-- LIST ITEM -->
            <tr>

                <!-- LIST ITEM IMAGE -->
                <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
        

                <!-- LIST ITEM TEXT -->
                <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
            
                <td align="left" valign="top" style="font-size: 17px; font-weight: 400; line-height: 160%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                    padding-top: 25px;
                    color: #000000;
                    font-family: sans-serif;" class="paragraph">
                        <b style="color: #333333;">Plat Nomor</b><br/>
                        ' . $plat . ' 
                </td>

            </tr>
             <!-- LIST ITEM -->
            <tr>

                <!-- LIST ITEM IMAGE -->
                <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
                

                <!-- LIST ITEM TEXT -->
                <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
            
                <td align="left" valign="top" style="font-size: 17px; font-weight: 400; line-height: 160%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                    padding-top: 25px;
                    color: #000000;
                    font-family: sans-serif;" class="paragraph">
                        <b style="color: #333333;">Pemilik Lahan</b><br/>
                        ' . $namapem . '(' . $hp . ')
                </td>

            </tr>
             <!-- LIST ITEM -->
            <tr>

                <!-- LIST ITEM IMAGE -->
                <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
                

                <!-- LIST ITEM TEXT -->
                <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
            
                <td align="left" valign="top" style="font-size: 17px; font-weight: 400; line-height: 160%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                    padding-top: 25px;
                    color: #000000;
                    font-family: sans-serif;" class="paragraph">
                        <b style="color: #333333;">ID Sewa Anda</b><br/>
                        ' . $newID . '
                </td>

            </tr>
            <tr>

                <!-- LIST ITEM IMAGE -->
                <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
        

                <!-- LIST ITEM TEXT -->
                <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
            
                <td align="left" valign="top" style="font-size: 17px; font-weight: 400; line-height: 160%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                    padding-top: 25px;
                    color: #000000;
                    font-family: sans-serif;" class="paragraph">
                        <b style="color: #333333;">Alamat Lahan Parkir</b><br/>
                          ' . $alamat . '  
                </td>

            </tr>
             <tr>

                <!-- LIST ITEM IMAGE -->
                <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
        

                <!-- LIST ITEM TEXT -->
                <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
            
                <td align="left" valign="top" style="font-size: 17px; font-weight: 400; line-height: 160%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                    padding-top: 25px;
                    color: #000000;
                    font-family: sans-serif;" class="paragraph">
                        <b style="color: #333333;">Nama Lahan Anda</b><br/>
                          ' . $nama_lahan . '  
                </td>

            </tr>
 <tr>
                 <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                 padding-top: 25px; 
                 color: #000000;
                 font-family: sans-serif;" class="paragraph">
               Selamat Parkir Dan Enjoy !!
                    </td>
            </tr>
           

        </table></td>
    </tr>

    <!-- LINE -->
    <!-- Set line color -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
            padding-top: 25px;" class="line"><hr
            color="#E0E0E0" align="center" width="100%" size="1" noshade style="margin: 0; padding: 0;" />
        </td>
    </tr>
    
    <!-- PARAGRAPH -->
    <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
            padding-top: 25px; 
            color: #000000;
            font-family: sans-serif;" class="paragraph">
               @EASYPARKING 
        </td>
    </tr>

  

<!-- End of WRAPPER -->
</table>

            
            
<!-- WRAPPER -->
<!-- Set wrapper width (twice) -->
<table border="0" cellpadding="0" cellspacing="0" align="center"
    width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
    max-width: 560px;" class="wrapper">

    <!-- SOCIAL NETWORKS -->
    <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
            padding-top: 25px;" class="social-icons"><table
            width="256" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse: collapse; border-spacing: 0; padding: 0;">
            <tr>

                <!-- ICON 1 -->
                <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                    href="https://raw.githubusercontent.com/konsav/email-templates/"
                style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                    color: #000000;"
                    alt="F" title="Facebook"
                    width="44" height="44"
                    src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/facebook.png"></a></td>

                <!-- ICON 2 -->
                <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                    href="https://raw.githubusercontent.com/konsav/email-templates/"
                style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                    color: #000000;"
                    alt="T" title="Twitter"
                    width="44" height="44"
                    src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/twitter.png"></a></td>             

                <!-- ICON 3 -->
                <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                    href="https://raw.githubusercontent.com/konsav/email-templates/"
                style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                    color: #000000;"
                    alt="G" title="Google Plus"
                    width="44" height="44"
                    src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/googleplus.png"></a></td>      

                <!-- ICON 4 -->
                <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                    href="https://raw.githubusercontent.com/konsav/email-templates/"
                style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                    color: #000000;"
                    alt="I" title="Instagram"
                    width="44" height="44"
                    src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/instagram.png"></a></td>

            </tr>
            </table>
        </td>
    </tr>
<!-- FOOTER -->
    <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
    <tr>
        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
            padding-top: 20px;
            padding-bottom: 20px;
            color: #999999;
            font-family: sans-serif;" class="footer">

                This email template was sent to&nbsp;you becouse we&nbsp;want to&nbsp;make the&nbsp;world a&nbsp;better place. You&nbsp;could change your <a href="https://github.com/konsav/email-templates/" target="_blank" style="text-decoration: underline; color: #999999; font-family: sans-serif; font-size: 13px; font-weight: 400; line-height: 150%;">subscription settings</a> anytime.

                <!-- ANALYTICS -->
                <!-- https://www.google-analytics.com/collect?v=1&tid={{UA-Tracking-ID}}&cid={{Client-ID}}&t=event&ec=email&ea=open&cs={{Campaign-Source}}&cm=email&cn={{Campaign-Name}} -->
                <img width="1" height="1" border="0" vspace="0" hspace="0" style="margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;"
                src="https://raw.githubusercontent.com/konsav/email-templates/master/images/tracker.png" />

        </td>
    </tr>
    
<!-- End of WRAPPER -->
</table>

<!-- End of SECTION / BACKGROUND -->
</td></tr></table>

</body>
</html>';


        //Server settings
        $mail->SMTPDebug = 1;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'comp.ahmadhidayat@gmail.com';                 // SMTP username
        $mail->Password = 'donkkolgw';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // or 587


        $mail->SetFrom("ahmadhidayat.penyok@gmail.com", "Admin Easy Parking");
        $mail->AddReplyTo("ahmadhidayat.penyok@gmail.com", "Admin Easy Parking");
        $mail->AddAddress($userEmail); // you can't pass php variables in single goutes like '$userEmail'. 
        $mail->Subject = $subject;
        $mail->MsgHTML($content);
        $mail->IsHTML(true);
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent to ';
            echo $userEmail;
            echo "<br/>";

            $id_pemesan = $_GET['kd'];
            $queryy0 = ("UPDATE tb_pembayaran SET status = 'Lunas' WHERE id_pembayaran ='$id_pemesan'");
            $queryy = ("UPDATE tb_transaksi SET status = 'Lunas' WHERE id_transaksi ='$ids'");
            $queryyy = ("select * from tb_sewa_lahan where  id_transaksi ='$ids'");

            $resultt0 = mysqli_query($connect, $queryy0)or die(mysqli_error());
            $resultt = mysqli_query($connect, $queryy)or die(mysqli_error());
            $resulttt3 = mysqli_query($connect, $queryyy)or die(mysqli_error());
            $time = date("h:i:sa");
            $date = date("Y-m-d");
            $expire = date('Y-m-d',strtotime('+30 days',strtotime(str_replace('/', '-', $date)))) . PHP_EOL;
            $queryy1 = ("UPDATE tb_lahan SET kapasitas_tersedia = kapasitas_tersedia-1 WHERE id_lahan ='$id_lahan'");
            $resultt1 = mysqli_query($connect, $queryy1)or die(mysqli_error());
            if ($resulttt3 && mysqli_num_rows($resulttt3) > 0) {
                $query_sewa = ("UPDATE tb_sewa_lahan SET tanggal_mulai = '$date',tanggal_selesei='$expire',status='disewa' WHERE id_sewa_lahan ='$newID'");
                $result_sewa = mysqli_query($connect, $query_sewa)or die(mysqli_error());
            } else {
                $simpan = ("insert into tb_sewa_lahan (id_sewa_lahan,id_lahan,id_kendaraan,tanggal_mulai,tanggal_selesei,status,id_transaksi,tagihan)
                     VALUES ('$newID '," . "'$id_lahan'," . "'$id_kendaraan'," . "'$tgl_mulai','$tgl_akhir','disewa','$ids','$total_harga')");

                $resultt2 = mysqli_query($connect, $simpan)or die(mysqli_error());
            }


            $simpan3 = ("insert into tb_audit (id_audit,tanggal,jam,deskripsi,id_pemilik_lahan)
                     VALUES ('$newIDA '," . "'$date'," . "'$time','Approve Pembayaran'," . "'$id_pemilik_lahan')");

            $resultt3 = mysqli_query($connect, $simpan3)or die(mysqli_error());
            if ($query) {
                echo "<script>alert('Data Berhasil !'); window.location = '../admin/hal_admin_data_order.php'</script>";
            } else {
                echo "<script>alert('Data Gagal dihapus!'); window.location = '../hal_admin_data_order.php'</script>";
            }
        }
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>