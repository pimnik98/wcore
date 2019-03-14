<?php
$t = 'Редактирование пользователей';
require_once '../../wcore/core.php';
require_once '../../wcore/head.php';
iank(3);
if (isset($_GET['id'])){
    if (isset($_POST['ok'])){
        if ($_SESSION['csrf_token'] != antixs($_POST['csrf'])){echo msg_err('err',$lang['csrf']);require_once '../../wcore/foot.php';exit();}
        mysqli_query($mysqli,"UPDATE `users` SET `prv` = '".intval($_POST['dolz'])."', `bits` = '".antixs($_POST['bits'])."' WHERE `id` = '".intval($_GET['id'])."'");
        echo msg_err('suc',$lang['savech']);
    } else {
        $profile = mysqli_query($mysqli,"SELECT * FROM `users` WHERE `id` = ".intval($_GET['id']));
        if (mysqli_num_rows($profile) != 0) {$user = mysqli_fetch_object($profile);} else {echo msg_err('err',$lang['emptylogin']);require_once '../../wcore/foot.php';exit();}
        if ($user->prv == 3){$select['prv'] = 'a';} elseif ($user->prv == 2){$select['prv'] = 'm';} else {$select['prv'] = 'u';}
        echo $twig->render('admin_users.tpl', array('lang' =>$lang,'userq'=>intval($_GET['id']),'user'=>$user,'select'=>$select,'crfs'=>_csrf()));
    }
} else {
    echo $twig->render('admin_users.tpl', array('lang' =>$lang,'userq'=>'0'));
}
require_once '../../wcore/foot.php';
?>