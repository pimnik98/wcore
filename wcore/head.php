<?php
$_tmp_k = 'wcore, WCore v5.0, pimnik98, core, ядро, сайт, создать сайт'.site_key;
if (!isset($t))$t = 'Страница';
if (!isset($d))$d = site_opis;
if (isset($k)) $_tmp_k .= $k;

if (isset($ank)){
    if (wcore_twig_systpl == 1){ $tpl_load = WCORE_ROOT.'/data/tpl/'.wcore_twig_tpl.'/';} 
    else {$tpl_load = WCORE_ROOT.'/data/tpl/'.$ank->tpl.'/';}
    $loader = new Twig_Loader_Filesystem($tpl_load);
    if (wcore_twig_power == 1){$twig = new Twig_Environment($loader, array('cache' => wcore_twig_path,'auto_reload' => wcore_twig_reload));}
    else {$twig = new Twig_Environment($loader);}
    if (wcore_syslang == 1){$lang = parse_ini_file('lang/'.wcore_lang.'.ini', true); } 
    else {$lang = parse_ini_file('lang/'.$ank->lang.'.ini', true);}
    $thecfg = parse_ini_file(WCORE_ROOT.'/data/tpl/'.wcore_twig_tpl.'/theme.ini', true);
    $head = array('title' => $t,'keywords' => $_tmp_k,'description' => $d);
    if ($thecfg['type'] == 2){$_tmp_main = wcore_mmenu();} else {$_tmp_main = '';}
    echo $twig->render('head_log.tpl', array('head' => $head,'lang' => $lang,'main'=>$_tmp_main));
} else {
    $loader = new Twig_Loader_Filesystem(WCORE_ROOT.'/data/tpl/'.wcore_twig_tpl.'/');
    $twig = new Twig_Environment($loader);
    $lang = parse_ini_file('lang/'.wcore_lang.'.ini', true);
    $thecfg = parse_ini_file(WCORE_ROOT.'/data/tpl/'.wcore_twig_tpl.'/theme.ini', true);
    $head = array('title' => $t,'keywords' => $_tmp_k,'description' => $d);
    echo $twig->render('head_unlog.tpl', array('head' => $head,'lang' => $lang));
}

?>