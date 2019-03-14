</div>
<?php
if ($thecfg['type'] == 3){$_tmp_main = wcore_mmenu();} else {$_tmp_main = null;}
echo $twig->render('foot.tpl',array('lang'=>$lang,'main'=>$_tmp_main,'path'=>$_SERVER['PHP_SELF']));
?>