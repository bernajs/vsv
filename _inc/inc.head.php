<?php
session_start();
$uid = false;
if(isset($_SESSION["uid"])){
    $uid = $_SESSION['uid'];
}else{
}

function get_calificacion($calificacion){
  $calificacion_pr .=  str_repeat('<i class="fa fa-star positivo mx-2" aria-hidden="true"></i>', $calificacion);
  if($calificacion < 5){$calificacion_pr .= str_repeat('<i class="fa fa-star negavito mx-2" aria-hidden="true"></i>', (5 - $calificacion));}
  return $calificacion_pr;
}

function Redirect($url, $permanent = false){
  // if (headers_sent() === false){
  //   header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
  // }
  // exit();
  echo "<script>location.href='index.php'</script>";
}

?>
