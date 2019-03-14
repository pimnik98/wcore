<?php
$t = 'Новости проекта';
require_once '../../wcore/core.php';
require_once '../../wcore/head.php';
$k_post=_mc('modules_news');
$k_page = k_page($k_post, 10);
$page = page($k_page);
$start = 10*$page-10;
$_tmp_news = mysqli_query($mysqli,"SELECT * FROM `modules_news` ORDER BY `id` DESC LIMIT $start, 10") or die("Ошибка запроса: ".mysqli_error($mysqli));
while ($ns = mysqli_fetch_assoc($_tmp_news)){
    $array_news[] = array('id'=>$ns['id'],'title' => $ns['name'],'msg' => output($ns['txt']),'time' => ptime($ns['time']), 'who' => acc($ns['id_user']));
}
if (!isset($array_news)){$array_news = FALSE;}
echo $twig->render('pages_modules_news.tpl', array('news' => $array_news,'created'=>$k_post,'lang' =>$lang));
if ($k_page > 1){str('?',$k_page,$page);}
require_once '../../wcore/foot.php';
?>