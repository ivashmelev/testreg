-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.37 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных test_reg
DROP DATABASE IF EXISTS `test_reg`;
CREATE DATABASE IF NOT EXISTS `test_reg` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `test_reg`;

-- Дамп структуры для таблица test_reg.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text,
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_reg.admin: ~0 rows (приблизительно)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `login`, `password`) VALUES
	(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Дамп структуры для таблица test_reg.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `price` float DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_reg.products: ~3 rows (приблизительно)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `price`, `description`) VALUES
	(1, 'Товар 1', 100, 'Описание товара 1'),
	(2, 'Товар 2', 100, 'Описание товара 2'),
	(3, 'Товар 3', 100, 'Описание товара 3');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Дамп структуры для таблица test_reg.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FIO` text NOT NULL,
  `status` text NOT NULL,
  `number` text NOT NULL,
  `city` text NOT NULL,
  `street` text NOT NULL,
  `home` text NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_reg.users: ~5 rows (приблизительно)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `FIO`, `status`, `number`, `city`, `street`, `home`, `login`, `password`) VALUES
	(0, 'Шмелев Иван Сергеевич', 'Юридическое лицо', '8 222 222 22 22', 'Нижний Новгород', 'Московское шоссе ', '137', 'log', 'c4ca4238a0b923820dcc509a6f75849b'),
	(19, '121', 'Физическое лицо', '12', 'Москва', '', '', '1', '2'),
	(20, '121', 'Физическое лицо', '12', 'Санкт-Петербург', '', '', '1', '2'),
	(21, '111', 'Физическое лицо', '121', 'Казань', '', '', 'login', '1a1dc91c907325c69271ddf0c944bc72'),
	(22, '111', 'Физическое лицо', '121', 'Германия', '', '', 'login', '5f4dcc3b5aa765d61d8327deb882cf99');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
