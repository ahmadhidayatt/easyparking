<?php
include('koneksi.php');


if(isset($_POST['view'])){

// $connect = mysqli_connectnect("localhost", "root", "", "notif");
if($_POST["view"] != '')
{
    $update_query = "UPDATE tb_okk SET notif_status = 1 WHERE notif_status=0";
    mysqli_query($connect, $update_query);
}

$query = "SELECT * FROM tb_okk WHERE status = 'pending' ORDER BY id_sewa DESC LIMIT 5";
$result = mysqli_query($connect, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
   $output .= '
    <li>
         <div class="drop-title">Notifikasi Order Kendaraan</div>
   </li><li >
   <div class="message-center">';
 while($row = mysqli_fetch_array($result))
 {
   $output .= '<a href="hal_admin_approve_okk.php?hal=edit&kd='.$row["id_sewa"].' ">
                <div class="btn btn-primary btn-circle m-r-10"><i class="ti-truck"></i></div>
                 <div class="mail-contnet">
                    <strong>'.$row["nama_customer"].'</strong>
                       <small><em>'.$row["asal_perusahaan"].'</em></small>
                       <br> <small><em>To '.$row["kota_tujuan"].'</em></small>
                       <span class="time">'.$row["tgl_sewa"].'</span>
                          </div>
                  </a><br>
                   ';
 }
 $output .='  </div>
   </li>
   <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>';
}
else{
     $output .= '
     <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}



$status_query = "SELECT * FROM tb_customer WHERE notif_status=0";
$result_query = mysqli_query($connect, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
    'notification' => $output,
    'unseen_notification'  => $count
);

echo json_encode($data);

}


?>
