<?php
$t = 'Регистрация на сайте';
require_once '../../wcore/core.php';
require_once '../../wcore/head.php';
if (isset($ank)){go('/');}
if(isset($_POST['wcore'])){
    $login = antixs($_POST['login']);
    $ps = security(antixs($_POST['ps']));
    $ps2 = security(antixs($_POST['ps2']));
    $email = antixs($_POST['email']);
    if (empty($_POST['login']) || empty($_POST['ps']) || empty($_POST['ps2']) || empty($_POST['email'])){echo msg_err('err',$lang['emptyinput']);require_once '../../wcore/foot.php';exit();}
    if (strlen($_POST['login']) < 4) {echo msg_err('err',$lang['ilm']);require_once '../../wcore/foot.php';exit();}
    if (strlen($_POST['login']) > 24) {echo msg_err('err',$lang['ilx']);require_once '../../wcore/foot.php';exit();}
    if(!preg_match("#^([A-z0-9\_])+$#ui", $_POST['login'])) {echo msg_err('err',$lang['sle']);require_once '../../wcore/foot.php';exit();}
    if (strlen($_POST['ps']) < 6) {echo msg_err('err',$lang['ipm']);require_once '../../wcore/foot.php';exit();}
    if (strlen($_POST['ps']) > 32) {echo msg_err('err',$lang['ipx']);require_once '../../wcore/foot.php';exit();}
    if ($ps != $ps2){echo msg_err('err',$lang['pserr']);require_once '../../wcore/foot.php';exit();}
    $sql = mysqli_query($mysqli,"SELECT `id` FROM `users` WHERE `login` = '". $login ."' LIMIT 1");
	if (mysqli_num_rows($sql) == 1) {echo msg_err('err',$lang['logzz']);require_once '../../wcore/foot.php';exit();}
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {echo msg_err('err',$lang['iem']);require_once '../../wcore/foot.php';exit();}
    if($_POST['capcha'] != $_SESSION['capcha'])  {echo msg_err('err',$lang['ice']);require_once '../../wcore/foot.php';exit();}
    mysqli_query($mysqli,"INSERT INTO `users`(`login`, `ps`, `email`) VALUES ('$login','$ps','$email')");
    $_SESSION['user_id'] = mysqli_insert_id($mysqli);
    $_SESSION['login'] = $login;
    $_SESSION['ps'] = $ps;
    setcookie('login', $login, time()+60*60*24,'/');
    setcookie('ps', $ps, time()+60*60*24,'/');
    header("Location: /modules/user/cab.php");
    exit;
    
} else {
    echo $twig->render('pages_reg.tpl', array('lang' =>$lang));
}
require_once '../../wcore/foot.php';