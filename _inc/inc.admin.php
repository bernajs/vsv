<?php
// session_start();
// if(!isset($_SESSION["onSessionAdmin"]) || is_null($_SESSION["onSessionAdmin"])){ header("Location: login.php"); }
// $uid = $_SESSION['uid'];
//
// if($uid){
//     require_once('_class/class.staff.php');
//     $Staff = new Staff();
//     $staff = $Staff->getData($uid);
//     $nombre = $staff[0]['nombre'];
//     $tipo = $staff[0]['tipo'];
// }

function calculate_time_span($date){
        $seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($date);
        $months = floor($seconds / (3600*24*30));
        $day = floor($seconds / (3600*24));
        $hours = floor($seconds / 3600);
        $mins = floor($seconds / 60);
        $secs = floor($seconds);
        $days = date("t");
        if($seconds < 60)
            $time = "hace ".$secs." segundos";
        else if($mins < 60 )
            $time = "hace ".$mins." minutos";
        else if($hours < 24)
            $time = "hace ".$hours." horas";
        else if($day < $days)
            $time = "hace ".$day." días";
        else
            $time = "hace ".$months." meses";

        return $time;
}
