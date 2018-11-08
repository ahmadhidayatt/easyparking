<?php
  session_start();
  session_destroy();
  header('location:../hal_login.php');
?>