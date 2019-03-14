-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 14 2019 г., 23:37
-- Версия сервера: 5.5.60-MariaDB
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vhostapi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `modules_news`
--

CREATE TABLE IF NOT EXISTS `modules_news` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `txt` varchar(5000) NOT NULL,
  `time` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `modules_news`
--

INSERT INTO `modules_news` (`id`, `name`, `txt`, `time`, `id_user`) VALUES
(1, 'Установка WCore v5.0 Beta', 'Спасибо за установку [b]WCore v5.0 Beta[/b]!\r\nЭто бета версия, так что может содержать ошибки или недоработки в некоторых местах, обо всех ошибках вы можете сообщить мне в [url=https://vk.com/piminov_remont]вконтакте[/url].\r\nВ общем данное ядро было переведено на MySQLi.\r\nТак же по желаниям пользователей скрипт к скрипту были добавлены следующие функции, такие как шаблонизатор (используется Twig) и мультиязычность.\r\nТо есть чтобы сменить дизайн сайта, нужно просто сменить папку с шаблоном, а чтобы сменить локализацию, нужно сменить его файл.\r\nТакже добавлена ББ-панель, и защита csrf атак.\r\nА также еще пару мелких фикч.\r\nСпасибо тем, кто ждал данное ядро.', 1552595539, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `ps` varchar(255) NOT NULL,
  `prv` int(1) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `bits` float(255,2) NOT NULL DEFAULT '0.00',
  `lang` varchar(255) NOT NULL DEFAULT 'ru',
  `tpl` varchar(255) NOT NULL DEFAULT 'default'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `ps`, `prv`, `email`, `bits`, `lang`, `tpl`) VALUES
(1, 'Admin', 'da77cf3b8d2fac311597b84576a67b0f', 3, 'admin@wcore.ru', 0.00, 'ru', 'default');

-- --------------------------------------------------------

--
-- Структура таблицы `wcore_mmenu`
--

CREATE TABLE IF NOT EXISTS `wcore_mmenu` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT 'empty.png',
  `count_table` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wcore_mmenu`
--

INSERT INTO `wcore_mmenu` (`id`, `name`, `icon`, `link`, `count_table`) VALUES
(1, 'Новости', 'empty.png', '/modules/news/', '`modules_news`');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `modules_news`
--
ALTER TABLE `modules_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `wcore_mmenu`
--
ALTER TABLE `wcore_mmenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `modules_news`
--
ALTER TABLE `modules_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `wcore_mmenu`
--
ALTER TABLE `wcore_mmenu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
