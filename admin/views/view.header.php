<?php
include_once('_class/class.quinta.php');
$Quinta = new Quinta();
$quintas_pendientes = $Quinta->quintas_pendientes();
$cambios_pendientes = $Quinta->cambios_pendientes();
function cmp($a, $b){
    $ad = strtotime($a['created_at']);
    $bd = strtotime($b['created_at']);
    return ($ad<$bd);
}
if(!$quintas_pendientes) $pendientes = $cambios_pendientes; else if(!$cambios_pendientes) $pendientes = $quintas_pendientes;
else $pendientes = array_merge($cambios_pendientes, $quintas_pendientes);
usort($pendientes, 'cmp');
$notificaciones = count($pendientes);
if($pendientes){foreach ($pendientes as $key => $pendiente) {
  if($pendiente['cambio']) {$titulo = "Tienes un cambio por aprobar";$url = $pendiente['id_quinta']."&cambio=".$pendiente['id'];}
  else  {$titulo = "Tienes una Quinta por aprobar";$url = $pendiente['id'];}
  $buffer_quintas .= '<a href="index.php?call=quinta_detalle&id='.$url.'" class="list-group-item">
                    <div class="media">
                      <div class="media-left valign-middle"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading">'.$titulo.'</h6>
                        <p class="notification-text font-small-3 text-muted">'.$pendiente['nombre'].'</p><small>
                          <time class="media-meta text-muted">'.calculate_time_span($pendiente['created_at']).'</time></small>
                      </div>
                    </div></a>';
}}
?>
<!-- navbar-fixed-top-->
<nav class="header-navbar navbar navbar-with-menu navbar-static-top navbar-dark bg-gradient-x-grey-blue navbar-border navbar-brand-center">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav">
        <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1"></i></a></li>
        <li class="nav-item"><a href="index.html" class="navbar-brand"><img alt="stack admin logo" src="assets/images/logo/stack-logo-light.png" class="brand-logo">
            <h2 class="brand-text">Stack</h2></a></li>
        <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="fa fa-ellipsis-v"></i></a></li>
      </ul>
    </div>
    <div class="navbar-container content container-fluid">
      <div id="navbar-mobile" class="collapse navbar-toggleable-sm">

        <ul class="nav navbar-nav float-xs-right">

          <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon ft-bell"></i><span class="tag tag-pill tag-default tag-danger tag-default tag-up"><?php echo $notificaciones; ?></span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0"><span class="grey darken-2">Notificaciones</span><span class="notification-tag tag tag-default tag-danger float-xs-right m-0"><?php if($notificaciones > 1) echo $notificaciones.' nuevas'; else echo $notificaciones.' nueva'; ?></span></h6>
              </li>
              <li class="list-group scrollable-container">
                <?php echo $buffer_quintas ?>
                </li>
            </ul>
          </li>
          <!-- <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon ft-mail"></i><span class="tag tag-pill tag-default tag-warning tag-default tag-up">3</span></a> -->
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span><span class="notification-tag tag tag-default tag-warning float-xs-right m-0">4 New</span></h6>
              </li>
              <li class="list-group scrollable-container"><a href="javascript:void(0)" class="list-group-item">
                  <div class="media">
                    <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span></div>
                    <div class="media-body">
                      <h6 class="media-heading">Margaret Govan</h6>
                      <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start the project.</p><small>
                        <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Today</time></small>
                    </div>
                  </div></a><a href="javascript:void(0)" class="list-group-item">
                  <div class="media">
                    <div class="media-left"><span class="avatar avatar-sm avatar-busy rounded-circle"><img src="assets/images/portrait/small/avatar-s-2.png" alt="avatar"><i></i></span></div>
                    <div class="media-body">
                      <h6 class="media-heading">Bret Lezama</h6>
                      <p class="notification-text font-small-3 text-muted">I have seen your work, there is</p><small>
                        <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Tuesday</time></small>
                    </div>
                  </div></a><a href="javascript:void(0)" class="list-group-item">
                  <div class="media">
                    <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="assets/images/portrait/small/avatar-s-3.png" alt="avatar"><i></i></span></div>
                    <div class="media-body">
                      <h6 class="media-heading">Carie Berra</h6>
                      <p class="notification-text font-small-3 text-muted">Can we have call in this week ?</p><small>
                        <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Friday</time></small>
                    </div>
                  </div></a><a href="javascript:void(0)" class="list-group-item">
                  <div class="media">
                    <div class="media-left"><span class="avatar avatar-sm avatar-away rounded-circle"><img src="assets/images/portrait/small/avatar-s-6.png" alt="avatar"><i></i></span></div>
                    <div class="media-body">
                      <h6 class="media-heading">Eric Alsobrook</h6>
                      <p class="notification-text font-small-3 text-muted">We have project party this saturday night.</p><small>
                        <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">last month</time></small>
                    </div>
                  </div></a></li>
              <li class="dropdown-menu-footer"><a href="javascript:void(0)" class="dropdown-item text-muted text-xs-center">Read all messages</a></li>
            </ul>
          </li>
          <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span><span class="user-name">John Doe</span></a>
            <div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item"><i class="ft-user"></i> Edit Profile</a><a href="#" class="dropdown-item"><i class="ft-mail"></i> My Inbox</a><a href="#" class="dropdown-item"><i class="ft-check-square"></i> Task</a><a href="#" class="dropdown-item"><i class="ft-comment-square"></i> Chats</a>
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item"><i class="ft-power"></i> Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<!-- ////////////////////////////////////////////////////////////////////////////-->
