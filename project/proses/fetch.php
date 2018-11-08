<?php
include('koneksi.php');


if(isset($_POST['view'])){

// $connect = mysqli_connectnect("localhost", "root", "", "notif");
if($_POST["view"] != '')
{
    $update_query = "UPDATE tb_customer SET notif_status = 1 WHERE notif_status=0";
    mysqli_query($connect, $update_query);
}

$query = "SELECT * FROM tb_customer WHERE status = 'pending' ORDER BY id_customer DESC LIMIT 5";
$result = mysqli_query($connect, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
   $output .= '
   <li >
   <a href="hal_admin_approve_customer.php?hal=edit&kd='.$row["id_customer"].' ">
   <strong>'.$row["nama"].'</strong><span class="label label-rouded label-warning pull-right" style=" background-color: #6C757B;">'.$row["tanggal_daftar"].'</span><br />
   <small><em>'.$row["asal_perusahaan"].'</em></small>
   </a>
   </li>
   ';

 }
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
