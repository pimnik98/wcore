<?php
$t = 'Конфигунация системы';
require_once '../../wcore/core.php';
require_once '../../wcore/head.php';
iank(3);
$wcore['site_name'] = site_name;
$wcore['site_opis'] = site_opis;
$wcore['site_key'] = site_key;
$wcore['ver'] = wcore_ver;
$wcore['timezone'] = wcore_timezone;
$wcore['debug'] = wcore_debug;
$wcore['timezone'] = wcore_timezone;
$wcore['ROOT'] = WCORE_ROOT;
$wcore['lang'] = wcore_lang;
$wcore['syslang'] = wcore_syslang;
$wcore['apache'] = wcore_apache;
$wcore['twig_power'] = wcore_twig_power;
$wcore['twig_path'] = wcore_twig_path;
$wcore['twig_reload'] = wcore_twig_reload;
$wcore['twig_tpl'] = wcore_twig_tpl;
$wcore['twig_systpl'] = wcore_twig_systpl;

echo $twig->render('admin_core_config.tpl', array('lang' =>$lang,'wcore'=>$wcore,'theme'=>$thecfg,'php'=>$_SERVER));
require_once '../../wcore/foot.php';
?>