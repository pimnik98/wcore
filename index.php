<?php
$t = 'Главная';
require_once 'wcore/core.php';
require_once 'wcore/head.php';

$news = array('created' => 0);
$_tmp_news = mysqli_query($mysqli,"SELECT * FROM `modules_news` ORDER BY `id` DESC LIMIT 1") or die("Ошибка запроса: ".mysqli_error($mysqli));
while ($ns = mysqli_fetch_assoc($_tmp_news)){
    $news = array('created' => 1,'title' => $ns['name'],'msg' => output($ns['txt']),'time' => ptime($ns['time']), 'who' => acc($ns['id_user']));
}
if ($thecfg['type'] == 1){
    echo $twig->render('pages_home.tpl', array('news' => $news,'lang' =>$lang,'main'=>wcore_mmenu()));
} else {
    go($thecfg['r_url']);
}
require_once 'wcore/foot.php';