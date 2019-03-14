<?php
$t = 'Редактор новостей';
require_once '../../wcore/core.php';
require_once '../../wcore/head.php';
iank(3);
$id = (isset($_GET['id']) && !empty($_GET['id'])?intval($_GET['id']):0);
if (isset($_GET['act']) && $_GET['act'] == 'del' && $id != 0){
    if (isset($_POST['ok'])){
        if ($_SESSION['csrf_token'] != antixs($_POST['csrf'])){echo msg_err('err',$lang['csrf']);require_once '../../wcore/foot.php';exit();}
        mysqli_query($mysqli,"DELETE FROM `modules_news` WHERE `id` = '$id'");
        echo msg_err('suc',$lang['act_suc']);
    } else {
        $news = mysqli_query($mysqli,"SELECT * FROM `modules_news` WHERE `id` = ".intval($_GET['id']));
        if (mysqli_num_rows($news) != 0) {$ns = mysqli_fetch_object($news);} else {echo msg_err('err',$lang['adm_news_t2']);require_once '../../wcore/foot.php';exit();}
        echo $twig->render('admin_modules_news.tpl', array('lang' =>$lang,'id'=>intval($_GET['id']),'news'=>$ns,'act'=>'del','csrf'=>_csrf()));
    }
} elseif (isset($_GET['act']) && $_GET['act'] == 'delall' && $id == 0){
    if (isset($_POST['ok'])){
        if ($_SESSION['csrf_token'] != antixs($_POST['csrf'])){echo msg_err('err',$lang['csrf']);require_once '../../wcore/foot.php';exit();}
        mysqli_query($mysqli,"TRUNCATE modules_news");
        echo msg_err('suc',$lang['act_suc']);
    } else {
        echo $twig->render('admin_modules_news.tpl', array('lang' =>$lang,'act'=>'delall','csrf'=>_csrf()));
    }
} elseif (isset($_GET['act']) && $_GET['act'] == 'create' && $id == 0){
    if (isset($_POST['ok'])){
        if ($_SESSION['csrf_token'] != antixs($_POST['csrf'])){echo msg_err('err',$lang['csrf']);require_once '../../wcore/foot.php';exit();}
        if ($_POST['capcha'] != $_SESSION['capcha'])  {echo msg_err('err',$lang['ice']);require_once '../../wcore/foot.php';exit();}
        if (empty($_POST['name'])){echo msg_err('err',$lang['adm_news_emp_name']);require_once '../../wcore/foot.php';exit();}
        if (empty($_POST['text'])){echo msg_err('err',$lang['adm_news_emp_text']);require_once '../../wcore/foot.php';exit();}
        mysqli_query($mysqli,"INSERT INTO `modules_news`(`name`, `txt`, `time`, `id_user`) VALUES ('".antixs($_POST['name'])."','".antixs($_POST['text'])."','".time()."','$ank->id')");
        echo msg_err('suc',$lang['act_suc']);
    } else {
        echo $twig->render('admin_modules_news.tpl', array('lang' =>$lang,'act'=>'create','csrf'=>_csrf()));
    }
} else {
    $k_post=_mc('modules_news');
    $k_page = k_page($k_post, 10);
    $page = page($k_page);
    $start = 10*$page-10;
    $_tmp_news = mysqli_query($mysqli,"SELECT * FROM `modules_news` ORDER BY `id` DESC LIMIT $start, 10") or die("Ошибка запроса: ".mysqli_error($mysqli));
    while ($ns = mysqli_fetch_assoc($_tmp_news)){
        $array_news[] = array('id'=>$ns['id'],'title' => $ns['name'],'msg' => output($ns['txt']),'time' => ptime($ns['time']), 'who' => acc($ns['id_user']));
    }
    if (!isset($array_news)){$array_news = FALSE;}
    echo $twig->render('admin_modules_news.tpl', array('news' => $array_news,'created'=>$k_post,'lang' =>$lang,'act'=>'home'));
    if ($k_page > 1){str('?',$k_page,$page);}
}
require_once '../../wcore/foot.php';
?>