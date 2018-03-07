-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 26 2018 г., 19:17
-- Версия сервера: 5.5.25
-- Версия PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Data of criminal cases`
--

CREATE TABLE `Data of criminal cases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `criminal` text NOT NULL,
  `investigator` text NOT NULL,
  `criminal_case` text NOT NULL,
  `contents` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `Data of criminal cases`
--

INSERT INTO `Data of criminal cases` (`id`, `criminal`, `investigator`, `criminal_case`, `contents`) VALUES
(1, 'Петров Александр Александрович', 'Иванов Иван Иванович', 'Кража', 'Кража воздушных шариков в цирке'),
(2, 'Зуев Валентин Иванович', 'Иванов Иван Иванович', 'Кража', 'Кража снега зимой'),
(3, 'Мамаев Карл Карлович', 'Сидоров Максим Максимович', 'Нарушение ПДД', 'Превышение скорости при езде на велосипеде');
