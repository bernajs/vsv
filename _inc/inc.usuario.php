<?php
  session_start();
  include_once('../admin/_class/class.usuario.php');
  $Usuario = new Usuario();
  if(isset($_SESSION['uid'])) {$uid = $_SESSION['uid'];}
  else{header("Location: login.php");}
?>
