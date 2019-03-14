<?php
$t = 'Авторизация на сайте';
require_once '../../wcore/core.php';
require_once '../../wcore/head.php';
if (isset($ank)){go('/');}
if(isset($_POST['wcore'])){
    $login = antixs($_POST['login']);
    $ps = security(antixs($_POST['ps']));
    
    if (empty($login) || empty($ps)){
        echo msg_err('err',$lang['emptyinput']);
        require_once '../../wcore/foot.php';
        exit();
    }
    $_tmp_login = mysqli_query($mysqli,"SELECT * FROM `users` WHERE `login` = '$login' AND `ps` = '$ps' LIMIT 1");
    if (mysqli_num_rows($_tmp_login) == 0) {
        echo msg_err('err',$lang['nologgined']);
        require_once '../../wcore/foot.php';
        exit();
    }
        $ank = mysqli_fetch_object(mysqli_query($mysqli,"SELECT `id` FROM `users` WHERE `login` = '$login' AND `ps` = '$ps' LIMIT 1"));
        $_SESSION['user_id'] = $ank->id;
        $_SESSION['login'] = $ank->login;
        $_SESSION['ps'] = $ank->ps;
        setcookie('login', $login, time()+60*60*24,'/');
        setcookie('ps', $ps, time()+60*60*24,'/');
        header("Location: /modules/user/cab.php");
        exit;
    
} else {
    $log_data = array('log_in'=>0);
}

echo $twig->render('pages_login.tpl', array('lang' =>$lang,'form'=>$log_data));



require_once '../../wcore/foot.php';