-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Фев 09 2022 г., 23:17
-- Версия сервера: 5.7.35-cll-lve
-- Версия PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `d91808_Hourdatadb`
--
CREATE DATABASE IF NOT EXISTS `d91808_Hourdatadb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `d91808_Hourdatadb`;

-- --------------------------------------------------------

--
-- Структура таблицы `HourdataGROM`
--

CREATE TABLE `HourdataGROM` (
  `Hour` text NOT NULL,
  `Data25` float NOT NULL,
  `DataC02` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Структура таблицы `HourdataPetrYur`
--

CREATE TABLE `HourdataPetrYur` (
  `Hour` text NOT NULL,
  `Data25` float NOT NULL,
  `DataC02` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Структура таблицы `HourdataPushk`
--

CREATE TABLE `HourdataPushk` (
  `Hour` text NOT NULL,
  `Data25` float NOT NULL,
  `DataC02` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Структура таблицы `HourdataShev`
--

CREATE TABLE `HourdataShev` (
  `Hour` text NOT NULL,
  `Data25` float NOT NULL,
  `DataC02` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Структура таблицы `HourdataSkilny`
--

CREATE TABLE `HourdataSkilny` (
  `Hour` text NOT NULL,
  `Data25` float NOT NULL,
  `DataC02` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Структура таблицы `HourdataVel`
--

CREATE TABLE `HourdataVel` (
  `Hour` text NOT NULL,
  `Data25` float NOT NULL,
  `DataC02` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Структура таблицы `TempPresureHum`
--

CREATE TABLE `TempPresureHum` (
  `Hour` text NOT NULL,
  `Temp` float NOT NULL,
  `Hum` float NOT NULL,
  `Presure` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Структура таблицы `Userid`
--

CREATE TABLE `Userid` (
  `Id` int(11) NOT NULL,
  `Streetid` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `State` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Структура таблицы `UserStreetid`
--

CREATE TABLE `UserStreetid` (
  `Id` int(11) NOT NULL,
  `Streetid` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Userid`
--
ALTER TABLE `Userid`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `UserStreetid`
--
ALTER TABLE `UserStreetid`
  ADD PRIMARY KEY (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
