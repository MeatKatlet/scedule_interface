-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.38-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица vi.couriers
CREATE TABLE IF NOT EXISTS `couriers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы vi.couriers: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `couriers` DISABLE KEYS */;
INSERT INTO `couriers` (`id`, `name`) VALUES
	(1, 'Иван1'),
	(2, 'Иван2'),
	(3, 'Иван3'),
	(4, 'Иван4'),
	(5, 'Иван5'),
	(6, 'Иван6'),
	(7, 'Иван7'),
	(8, 'Иван8'),
	(9, 'Иван9'),
	(10, 'Иван10');
/*!40000 ALTER TABLE `couriers` ENABLE KEYS */;


-- Дамп структуры для таблица vi.regions
CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travel_time` int(11) NOT NULL,
  `region_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы vi.regions: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` (`id`, `travel_time`, `region_name`) VALUES
	(1, 5, 'Санкт-Петербург'),
	(2, 6, 'Уфа'),
	(3, 10, 'Нижний Новгород'),
	(4, 3, 'Владимир'),
	(5, 5, 'Кострома'),
	(6, 7, 'Екатеринбург'),
	(7, 8, 'Ковров'),
	(8, 9, 'Воронеж'),
	(9, 6, 'Самара'),
	(10, 4, 'Астрахань');
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;


-- Дамп структуры для таблица vi.schedule
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NOT NULL,
  `curier_id` int(11) NOT NULL,
  `departure_date` int(11) NOT NULL,
  `arrival_date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `region_id` (`region_id`),
  KEY `curier_id` (`curier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COMMENT='arrival_date - это день прибытия в регион';

-- Дамп данных таблицы vi.schedule: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` (`id`, `region_id`, `curier_id`, `departure_date`, `arrival_date`) VALUES
	(70, 1, 1, 1484251200, 1484467200),
	(71, 1, 2, 1484337600, 1484553600),
	(72, 1, 4, 1484251200, 1484467200),
	(73, 4, 7, 1484769600, 1484899200),
	(74, 5, 7, 1485460800, 1485676800),
	(75, 8, 8, 1485460800, 1485849600),
	(76, 3, 8, 1486497600, 1486929600),
	(77, 7, 9, 1486497600, 1486843200),
	(78, 9, 10, 1486497600, 1486756800),
	(79, 9, 10, 1487188800, 1487448000);
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
