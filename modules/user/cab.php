<?php
$t = 'Личный кабинет пользователя';
require_once '../../wcore/core.php';
require_once '../../wcore/head.php';
iank();
echo $twig->render('pages_cabinet.tpl', array('lang' =>$lang,'user'=>$ank));
require_once '../../wcore/foot.php';
?>