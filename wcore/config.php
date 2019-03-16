<?php

# Сервер БД (По умолчанию: localhost)
define('mysqli_host','localhost');  
# Логин БД
define('mysqli_login',''); 
# Имя БД
define('mysqli_db','');    
# Пароль БД
define('mysqli_ps',''); 

## Информация о сайте
# Название сайта
define('site_name','WCore v5.0');
# Описание сайта
define('site_opis','WCore v5.0 beta удобная система для разработки проектов.');
# Ключевые слова
define('site_key','');

## Настройка ядра
# Версия ядра (Не изменяйте)
define('wcore_ver','5.0');
# Временная зона (По умолчанию: Europe/Moscow)
define('wcore_timezone','Europe/Moscow');
# Режим разработчика (По умолчанию: 0) {Параметры: 0-выкл;1-вкл}
define('wcore_debug',1);
# Временная зона (По умолчанию: Europe/Moscow)
define('wcore_timezone','Europe/Moscow');
# Путь до текущей папки (По умолчанию: $_SERVER['DOCUMENT_ROOT'])
# Не рекомендуется измениять
define('WCORE_ROOT',$_SERVER['DOCUMENT_ROOT']);
# Локализация по умолчанию (По умолчанию: ru)
define('wcore_lang','ru');
# Принудительно использовать системный язык (По умолчанию: 1) {Параметры: 0-нет;1-да}
define('wcore_syslang',1);
# Режим работы через Apache (По умолчанию: 0) {Параметры: 0-нет;1-да}
define('wcore_apache',0);

## Настройка шаблонизатора
# Включение кеша (По умолчанию: 0) {Параметры: 0-выкл;1-вкл}
define('wcore_twig_power',0);
# Путь к кешу (По умочанию: WCORE_ROOT.'/data/cache')
define('wcore_twig_path',WCORE_ROOT.'/data/cache');
# Перестройка кеша (По умолчанию: true) {Параметры: true-вкл;false-выкл}
define('wcore_twig_reload',true);
# Шаблон по-умолчанию (По умолчанию:default)
define('wcore_twig_tpl','default');
# Принудительно использовать системный шаблон (По умолчанию: 1) {Параметры: 0-нет;1-да}
define('wcore_twig_systpl',1);
