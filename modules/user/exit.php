<?php
require_once '../../wcore/core.php';
iank();
setcookie('id_user', "", time() - 3600,'/');
setcookie('login', "", time() - 3600,'/');
setcookie('ps', "", time() - 3600,'/');
session_destroy();
go('/');
?>