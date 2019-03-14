<?php
$t = 'Профайл';
require_once '../../wcore/core.php';
require_once '../../wcore/head.php';
if (!isset($_GET['id'])){$p_id = $ank->id;} else {$p_id = intval($_GET['id']);}
iank();
$profile = mysqli_query($mysqli,"SELECT * FROM `users` WHERE `id` = ".$p_id);
if (mysqli_num_rows($profile) != 0) {$user = mysqli_fetch_object($profile);} else {echo msg_err('err',$lang['emptylogin']);require_once '../../wcore/foot.php';exit();}
echo $twig->render('pages_profile.tpl', array('lang' =>$lang,'user'=>$user,'ank'=>$ank));
require_once '../../wcore/foot.php';
?>