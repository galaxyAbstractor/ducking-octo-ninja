-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 14 apr 2013 kl 00:56
-- Serverversion: 5.5.16
-- PHP-version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `ducking-octo-ninja`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  KEY `aid` (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `messages_users`
--

CREATE TABLE IF NOT EXISTS `messages_users` (
  `mid` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `read` tinyint(1) NOT NULL,
  PRIMARY KEY (`mid`,`to`,`from`),
  KEY `to` (`to`),
  KEY `from` (`from`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `available` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `messages_users`
--
ALTER TABLE `messages_users`
  ADD CONSTRAINT `messages_users_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_users_ibfk_2` FOREIGN KEY (`to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_users_ibfk_3` FOREIGN KEY (`from`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
