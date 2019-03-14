<?php
###############################
### WCore v5.0 Beta 
### PHP 7.2.x
### Powered by pimnik98
###############################
# Запуск сессии
session_start();
ob_start();
### Loading libs
#### Loading to Config...
require_once 'config.php';
if (wcore_debug == 1){error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On');}
#### Loading to Twig...
    require_once WCORE_ROOT.'/wcore/libs/Twig/Autoloader.php';
    Twig_Autoloader::register();
    
### Loading to MySQLi...
    @$mysqli = mysqli_connect(mysqli_host,mysqli_login,mysqli_ps,mysqli_db);
    if (!$mysqli) { 
        printf("Невозможно подключиться к базе данных. <br>Код ошибки: %s\n", mysqli_connect_error()); 
        exit; 
    }
### Loading function...
 
    function go($url){header("Location: ".$url);exit();}
	function _csrf(){return $_SESSION['csrf_token'] = substr( str_shuffle( 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM' ), 0, 16 );}
	function antixs($data){global $mysqli;return trim(htmlspecialchars(mysqli_real_escape_string($mysqli,$data)));}
	
    mysqli_query($mysqli,"SET NAMES 'utf8'");
    if (isset($_COOKIE['login']) && isset($_COOKIE['ps'])) {
    $sql_user_2 = mysqli_query($mysqli,"SELECT * FROM `users` WHERE `login` = '".antixs($_COOKIE['login'])."' AND `ps` = '".antixs($_COOKIE['ps'])."' ");
        if (mysqli_num_rows($sql_user_2) != 0) {
            $ank = mysqli_fetch_object($sql_user_2);
        } else {
            go('/modules/user/exit.php'); 
        }
    }else { 
        $ank = NULL; 
    }

    function msg_err($type,$message){global $twig,$lang;return $twig->render('mess_err.tpl', array('lang' =>$lang,'notify'=>array('type'=>$type,'msg'=>$message)));}
	
	function iank($pp=NULL){
	    global $ank,$lang,$thecfg,$twig;
	    if (!isset($ank) || empty($ank)){echo msg_err('err',$lang['iank']);require_once '../../wcore/foot.php';exit();}
	    if (isset($pp) && $ank->prv < $pp){go('/');}
	}
	
    function bbcode($msg) {
        $bb = array('~\[url=(.*?)?\](.*?)\[\/url\]~si' => '<a href="$1" target="_blank">$2</a>',
        '/\[b\](.+)\[\/b\]/isU' => '<b>$1</b>',
        '/\[u\](.+)\[\/u\]/isU' => '<span style="text-decoration:underline;">$1</span>',
        '/\[s\](.+)\[\/s\]/isU' => '<s>$1</s>',
        '/\[i\](.+)\[\/i\]/isU' => '<i>$1</i>',
        '/\[color=(.+)\](.+)\[\/color\]/isU' => '<span style="color:$1;">$2</span>',
        '/\[quote\](.+)\[\/quote\]/isU' => '<div class="quote">$1</div>');
    $msg = preg_replace(array_keys($bb), array_values($bb), $msg);
    return $msg;
}


    function output($msg) {
        $msg = bbcode($msg);
        $msg = preg_replace('/\\r\\n/si', '<br/>', $msg);
        return $msg;
    }
    function ptime($time = NULL){
        ini_set('date.timezone', wcore_timezone);
        if ($time == NULL) $time = time(); $settime = 1;
        $full_time = date('d.m.Y / H:i', $time);
        $date = date('d.m.Y', $time);
        $timep = date('H:i', $time);
        if ($date == date('d.m.Y')) $full_time = date('Сегодня H:i', $time);
        if ($date == date('d.m.Y', time()-60*60*24)) $full_time = date('Вчера, H:i', $time);
        if ($settime == 1 && $date == date('d.m.Y')) $full_time = date('Сегодня, H:i', $time);
        return $full_time;
    }
    
    function security($string){
        $pass = md5(md5($string));
        $count_1 = strlen($pass);
        $return = NULL;
        for($i = 1; $i <= $count_1; $i++) {
            $n = ($i == 1 ? 0 : $i-1);
            $return .= md5(md5(substr($pass, $n, $i)));
        }
        return md5($return);
    }
    
    function page($k_page = 1) {
        $page = 1;
        if (isset($_GET['page'])) {
            if ($_GET['page'] == 'end') $page = intval($k_page);
            elseif (is_numeric($_GET['page'])) $page = intval($_GET['page']);
        }
        if ($page < 1) $page = 1;
        if ($page > $k_page) $page = $k_page;
        return $page;
    }
    function k_page($k_post = 0, $k_p_str = 10) {
        if ($k_post != 0) {
            $v_pages = ceil($k_post/$k_p_str);
            return $v_pages;
        } else {
            return 1;
        }
    }
    function str($link = '?', $k_page = 1, $page = 1) { 
        global $twig,$lang;
        if ($page < 1) $page = 1;
        if ($page > 1)  $page_z[] = array('code'=>1,'page'=>($page - 1),'info'=>'back','href'=>$link.'page='.($page - 1)); 
        if ($page != 1) $page_z[] = array('code'=>3,'page'=>1,'info'=>'page1','href'=>$link.'page=1'); 
        else            $page_z[] = array('code'=>2,'page'=>1,'info'=>'selectpage','href'=>'#'); 
        for ($ot = -3; $ot <= 3; $ot++) {
            if ($page + $ot > 1 && $page + $ot < $k_page) {
                if ($ot != 0)   $page_z[] = array('code'=>3,'page'=>$page + $ot,'info'=>'page','href'=>$link .'page='. ($page + $ot)); 
                else            $page_z[] = array('code'=>2,'page'=>($page + $ot),'info'=>'selectpage','href'=>'#'); 
            }  
        }
        if ($page != $k_page) $page_z[] = array('code'=>3,'page'=>$k_page,'info'=>'page','href'=>$link .'page=end'); 
        elseif ($k_page > 1)  $page_z[] = array('code'=>4,'page'=>$k_page,'info'=>'selectpage','href'=>'#'); 
	     if ($page < $k_page) $page_z[] = array('code'=>5,'page'=>($page + 1),'info'=>'end','href'=>$link .'page='. ($page + 1)); 
	     echo $twig->render('nav.tpl', array('nav' => $page_z,'lang' =>$lang));
    }
    function generate_password($number){
		$arr = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','r','s',  't','u','v','x','y','z', 'A','B','C','D','E','F','G','H','I','J','K','L', 'M','N','O','P','R','S', 'T','U','V','X','Y','Z','1','2','3','4','5','6','7','8','9','0');
		$pass = "";
		for($i = 0; $i < $number; $i++)
		{$index = rand(0, count($arr) - 1);
		$pass .= $arr[$index];}
		return $pass;
	}
	
	function acc($id){
	    global $mysqli;
	    $_tmp_d = mysqli_query($mysqli,"SELECT * FROM `users`  WHERE `id` = '$id' LIMIT 1");
	    $_tmp_c=mysqli_num_rows($_tmp_d);
	    if ($_tmp_c != 0){
	        $anks = mysqli_fetch_array($_tmp_d);
	        return array('id'=>$id,'login'=>$anks['login']);
	    } else {
	        return array('id'=>$id,'login'=>'Удален');
	    }
	}
	
	function wcore_mmenu(){
	    global $mysqli;
	    $_tmp_mmenu =  mysqli_query($mysqli,"SELECT * FROM `wcore_mmenu` ORDER BY `id`") or die("Ошибка запроса: ".mysqli_error($mysqli));
        $_tmp_mmenu_list = array();
        while ($mm = mysqli_fetch_assoc($_tmp_mmenu)){  
            $_tmp_mmenu_list[] = array(
                'link'=>$mm['link'],
                'icon'=>$mm['icon'],
                'name'=>$mm['name'],
                'count'=>(!empty($mm['count_table'])?mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM ".$mm['count_table'])):'n/a'),
            );
        }   
        return $_tmp_mmenu_list;
	}
	function _mc($who,$where=NULL){global $mysqli;$_mc = mysqli_fetch_array(mysqli_query($mysqli,"SELECT COUNT(*)FROM `$who` ".(isset($where) ? $where:null)." "), MYSQLI_NUM);return $_mc[0];}