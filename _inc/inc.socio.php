<?php

// if(!isset($_SESSION["onSession"]) || is_null($_SESSION["onSession"])){ header("Location: login.php"); }
session_start();
$uid = false;
if(isset($_SESSION["uid"])){$uid = $_SESSION['uid'];include('../../admin/_class/class.usuario.php');
}else{header("Location: login.php");}
 ?>
