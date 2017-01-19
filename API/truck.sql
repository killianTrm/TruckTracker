-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Janvier 2017 à 15:22
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `truck`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

-- CREATE TABLE `address` (
--   `id` int(11) NOT NULL,
--   `city` varchar(255) DEFAULT NULL,
--   `zipcode` varchar(45) DEFAULT NULL,
--   `street` varchar(255) DEFAULT NULL,
--   `longitude` varchar(45) DEFAULT NULL,
--   `latitude` varchar(45) DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `address`
--

INSERT INTO `address` (`id`, `city`, `zipcode`, `street`, `longitude`, `latitude`) VALUES
(1, 'Seborga', '9368JX', 'Ap #559-1418 Auctor Ave', '-102.46693', '44.5041'),
(2, 'Schriek', '632899', '502-6438 Ad Avenue', '-104.62669', '79.70913'),
(3, 'Overmere', '30106', 'P.O. Box 845, 3352 Libero Ave', '39.20235', '24.37108'),
(4, 'Floreffe', 'B9N 2R2', 'Ap #859-1658 Egestas. Av.', '172.67861', '-4.35261'),
(5, 'Hilo', '46176', 'Ap #561-8610 Ac Ave', '50.18782', '-48.69232'),
(6, 'Kitzbühel', '5150', '4025 Arcu. Road', '91.92663', '-48.76301'),
(7, 'Ibadan', '742235', '633-4952 Magnis Rd.', '-162.52303', '-27.40543'),
(8, 'Fürstenwalde', '2378', 'Ap #364-5165 Natoque Road', '115.69497', '42.18697'),
(9, 'Niterói', '644778', 'P.O. Box 855, 763 A Rd.', '-134.54668', '69.0353'),
(10, 'Penzance', '781652', '7395 Eu Rd.', '59.5442', '58.09861'),
(11, 'Hulshout', '17892', 'P.O. Box 192, 2127 Lacus. Av.', '7.85992', '-25.58346'),
(12, 'Belgrade', '50414-003', '858-5151 Nulla. Street', '87.91914', '-11.8066'),
(13, 'Haasdonk', '490683', '272-3720 Felis. Street', '-163.89729', '49.04282'),
(14, 'Ourense', '5012', 'P.O. Box 290, 864 Cursus Ave', '-82.17822', '-14.66354'),
(15, 'Vancouver', '6784', 'P.O. Box 682, 3424 Bibendum Rd.', '79.56433', '53.41094'),
(16, 'Banff', '811279', '1479 Scelerisque Rd.', '127.62755', '20.14625'),
(17, 'Chattanooga', '51116', 'Ap #321-1712 Lorem Road', '6.2195', '-42.25864'),
(18, 'Seevetal', '67248', '6338 Tristique Street', '-63.21496', '4.91429'),
(19, 'Thunder Bay', 'C1L 5B7', '161 Nunc, St.', '145.0863', '-40.09734'),
(20, 'Güstrow', '049733', 'Ap #284-9188 Nisi. St.', '-150.35688', '-41.5774'),
(21, 'Olivola', '02472', '3641 Nulla Street', '37.3973', '-49.46763'),
(22, 'Hualqui', '65-067', 'P.O. Box 626, 6762 Lorem St.', '-123.22197', '-14.65355'),
(23, 'Fort Smith', '6093', '9779 Turpis. Avenue', '162.81659', '-33.27857'),
(24, 'Lagonegro', '406560', '164-716 Nunc Av.', '84.60958', '86.71396'),
(25, 'Hamilton', '73935', 'P.O. Box 909, 4965 Duis Av.', '29.46881', '-68.10593'),
(26, 'Kumbakonam', '81330', '678-2250 Libero. St.', '51.92646', '66.02044'),
(27, 'Tongrinne', '634291', '954-485 Nulla St.', '9.67276', '21.45531'),
(28, 'Cavallino', '77928', 'Ap #869-9803 Aliquam Ave', '163.3193', '21.51441'),
(29, 'Norrköping', 'T1 7PO', 'P.O. Box 288, 7642 Cum St.', '-141.53342', '-2.10809'),
(30, 'Hassan', '61764', '301-2707 Ac Rd.', '18.71789', '-61.54284'),
(31, 'Ferrere', '21-975', '652-275 Mollis. St.', '11.59518', '63.28859'),
(32, 'Alto Biobío', '31972', '9378 At Rd.', '-152.88928', '10.35599'),
(33, 'Aiseau-Presles', '43853', 'P.O. Box 170, 2746 Mauris, Avenue', '1.76193', '-71.5632'),
(34, 'Kamoke', '56835', 'Ap #356-5330 Nisl Avenue', '-33.98766', '18.37785'),
(35, 'Geest-GŽrompont-Petit-RosiŽre', '122631', '584-1781 Pulvinar Street', '-138.04572', '-41.54315'),
(36, 'Port Blair', '67085-231', '606-3652 Augue, Street', '-126.91813', '23.7288'),
(37, 'Aylmer', '85826', 'P.O. Box 878, 7477 Lobortis Rd.', '176.54463', '-88.50899'),
(38, 'B.S.D.', '53301', 'P.O. Box 183, 3560 Metus. Rd.', '156.34045', '53.07775'),
(39, 'Pike Creek', '27923', 'Ap #814-6641 Dolor Road', '82.91717', '-86.16199'),
(40, 'Mirzapur-cum-Vindhyachal', '58906', 'Ap #366-8185 Est Rd.', '71.12419', '47.57277'),
(41, 'Kirkintilloch', '0147', '4829 Turpis St.', '-34.25671', '-10.19861'),
(42, 'Swan Hills', '71219', '438-2425 Enim St.', '43.1738', '-18.45294'),
(43, 'Broxburn', '9347', '670 Et, St.', '72.55363', '-57.39785'),
(44, 'Verzegnis', '50112', 'P.O. Box 356, 2158 Rhoncus. Street', '-158.97783', '-57.3309'),
(45, 'Lang', 'YC4L 6PW', 'P.O. Box 706, 7587 Nec Street', '-78.43806', '43.74812'),
(46, 'Anchorage', '1196', 'Ap #218-5758 Mollis Street', '10.46602', '63.75779'),
(47, 'Punta Arenas', '5467', 'Ap #700-2171 Id Road', '131.23076', '24.78981'),
(48, 'Martello/Martell', '73720', '387-2685 A Ave', '156.96677', '39.68432'),
(49, 'Merzig', '84864', 'Ap #449-4855 Et Rd.', '69.59183', '60.05392'),
(50, 'Chieti', '416436', 'P.O. Box 579, 2045 Laoreet Av.', '-165.73692', '51.3391'),
(51, 'Polcenigo', '751073', '281-3207 Lorem, Avenue', '101.04737', '82.03955'),
(52, 'Salamanca', '67432', 'Ap #226-733 Id Av.', '-39.84912', '86.62233'),
(53, 'Barrow-in-Furness', '43458', 'P.O. Box 974, 6688 Adipiscing St.', '-129.91004', '-61.19254'),
(54, 'Charlottetown', '25451', 'P.O. Box 257, 119 Lectus. St.', '-84.23463', '26.46777'),
(55, 'Grey County', '27760', '696-5210 Quis, Av.', '113.47119', '10.95374'),
(56, 'Metairie', 'A4M 2L7', 'Ap #792-6688 Sit St.', '-107.67483', '43.70755'),
(57, 'Rhyl', '61817', '540-3758 Enim Av.', '-45.46705', '-0.2962'),
(58, 'St. Catharines', '10911', '8399 Nunc Street', '39.60805', '23.23823'),
(59, 'Bressoux', '728335', '416-4461 Non Avenue', '75.05358', '35.79145'),
(60, 'Nancagua', '4198', '556-8821 Neque Avenue', '153.19173', '29.73121'),
(61, 'Neunkirchen', 'K6V 6R9', '9774 Quisque Road', '-81.13588', '-20.52015'),
(62, 'Hisar', '175833', 'P.O. Box 385, 5560 Vel Av.', '-167.13612', '-66.39245'),
(63, 'Beauvechain', '37500', '334-6480 In, St.', '-69.8159', '23.14363'),
(64, 'San Rafael', '3842', 'P.O. Box 370, 4949 Nam St.', '-159.91495', '52.58871'),
(65, 'Ramsdonk', '0855', '672 Lectus Av.', '-85.31151', '-49.4112'),
(66, 'Chiusanico', '20307', '830-7293 Dui. Street', '-93.43952', '-26.77536'),
(67, 'Borgone Susa', '92164', 'P.O. Box 301, 3854 At Ave', '108.86757', '-79.6652'),
(68, 'Chillán Viejo', 'LX0 4ZP', '547-7192 Ac Road', '-168.74765', '-10.09262'),
(69, 'Soverzene', '73491', 'Ap #773-3984 Sed Road', '61.95475', '33.10833'),
(70, 'Eyemouth', '7847KX', '6514 Et Avenue', '152.67064', '89.22915'),
(71, 'Bendigo', '7298', '243-8074 Libero Road', '-83.29701', '-74.5608'),
(72, 'Witney', 'X4N 6C9', 'Ap #278-6947 Quisque Av.', '137.91231', '-67.5344'),
(73, 'Lanark County', '7031', '157-8664 Amet, Street', '-67.82061', '-22.38778'),
(74, 'Carcassonne', '72580', 'P.O. Box 317, 7794 Lacus Avenue', '66.58161', '-84.03109'),
(75, 'Hoyerswerda', 'V2V 9W7', '4134 Odio. Av.', '164.65386', '89.41073'),
(76, 'Wood Buffalo', '6757', 'Ap #548-3095 Consectetuer Street', '-159.05823', '20.93763'),
(77, 'Pathankot', '5055', '721-1644 Urna St.', '-63.75865', '21.91509'),
(78, 'St. Paul', '73291', '3599 Nec Ave', '107.27855', '61.53432'),
(80, 'Konstanz', '1866', '4786 Primis Street', '-114.96194', '71.15043'),
(81, 'Otricoli', '60712', '546-6381 Sed Avenue', '-139.34874', '-30.27168'),
(82, 'New Radnor', '357065', '592-3609 Sed St.', '154.60626', '23.83887'),
(83, 'Draguignan', '264885', '307-8018 Urna. St.', '-38.9539', '-5.61895'),
(84, 'Modena', '7915', 'Ap #423-2815 Malesuada Av.', '3.07359', '-14.24241'),
(85, 'Lacombe', '71337', 'Ap #780-9328 Tortor, Avenue', '153.38959', '60.33279'),
(86, 'Crotta d\'Adda', 'V8H 0M6', 'P.O. Box 597, 7434 Eget Rd.', '48.34048', '-28.39768'),
(87, 'Cognelee', '5889', '9116 Accumsan Rd.', '20.52598', '-50.95778'),
(88, 'Richmond', '67375', '992 Magna. St.', '-133.06515', '72.44073'),
(89, 'Ludwigsburg', '41337', 'Ap #623-3398 Tincidunt. Rd.', '57.98456', '-80.64273'),
(90, 'Borgone Susa', '3424', '145-4725 Nunc Rd.', '110.69942', '77.55782'),
(91, 'Picinisco', '1995', 'P.O. Box 967, 3526 Inceptos Avenue', '-156.55927', '-68.65351'),
(92, 'Foligno', '50915', '110-9549 Mauris St.', '122.36046', '7.4182'),
(93, 'Builth Wells', '7645', 'P.O. Box 892, 3322 In Street', '-118.27852', '12.78421'),
(94, 'Asti', '9394FZ', '307-9930 At, Rd.', '79.68322', '9.27042'),
(95, 'Castelló', '42115', 'P.O. Box 887, 5626 Facilisis Rd.', '-149.36541', '81.74291'),
(96, 'Edmonton', '13008', 'Ap #704-820 Vitae Street', '-80.51369', '-51.26267'),
(97, 'Skövde', '44308', '276-4449 Blandit Street', '38.7062', '30.72156'),
(98, 'Gretna', '6321', 'P.O. Box 942, 4159 Mauris, St.', '-148.13303', '76.57376'),
(99, 'Bonlez', '6094HG', 'Ap #145-1606 Fringilla Street', '-38.97651', '35.85937'),
(100, 'Penzance', '40251', '805-7004 Orci Road', '-37.53472', '35.15122');

-- --------------------------------------------------------

--
-- Structure de la table `delivery`
--

-- CREATE TABLE `delivery` (
--   `id` int(11) NOT NULL,
--   `name` varchar(45) DEFAULT NULL,
--   `date` datetime DEFAULT NULL,
--   `truck` int(11) NOT NULL,
--   `user` int(11) NOT NULL,
--   `address` int(11) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `delivery`
--

INSERT INTO `delivery` (`id`, `name`, `date`, `truck`, `user`, `address`) VALUES
(1, 'D1M 0D3', '2004-07-17 00:00:00', 40, 18, 3),
(2, 'L7O 6J7', '2021-09-17 00:00:00', 19, 65, 34),
(3, 'E9C 8X0', '2014-06-16 00:00:00', 12, 27, 49),
(4, 'F8I 3V2', '2019-10-16 00:00:00', 26, 91, 36),
(5, 'H5U 4X2', '2006-12-17 00:00:00', 9, 14, 47),
(63, 'R7W 9O9', '2002-02-16 00:00:00', 23, 28, 50),
(64, 'H8Q 8S6', '2017-06-16 00:00:00', 19, 47, 41),
(65, 'O2J 4Z0', '2008-10-16 00:00:00', 31, 96, 42),
(66, 'H2F 8W5', '2013-12-17 00:00:00', 29, 29, 22),
(67, 'A5V 5F7', '2018-10-17 00:00:00', 40, 30, 50),
(68, 'Q8O 9F7', '2006-02-16 00:00:00', 28, 13, 21),
(69, 'G5Q 3X9', '2010-12-16 00:00:00', 37, 20, 41),
(70, 'G1M 0I0', '2010-04-17 00:00:00', 8, 47, 3),
(71, 'F2J 5A5', '2015-12-16 00:00:00', 18, 52, 43),
(72, 'O4Y 4Q7', '2014-11-17 00:00:00', 36, 47, 36),
(73, 'M1M 0Q7', '2008-06-16 00:00:00', 13, 96, 7),
(74, 'M1X 3Y8', '2028-12-16 00:00:00', 14, 30, 49),
(75, 'K6R 9Y2', '2004-09-17 00:00:00', 1, 65, 33),
(76, 'I7S 0U0', '2013-05-17 00:00:00', 36, 54, 49),
(77, 'C3K 7A6', '2015-02-17 00:00:00', 29, 53, 16),
(78, 'Y1K 0M1', '2028-02-16 00:00:00', 21, 31, 24),
(91, 'X3V 6U9', '2005-05-16 00:00:00', 26, 60, 23),
(92, 'L0F 5Z7', '2023-09-17 00:00:00', 2, 42, 17),
(93, 'N7H 5J9', '2001-05-16 00:00:00', 34, 53, 30),
(94, 'C4C 7B1', '2011-03-17 00:00:00', 1, 86, 25),
(95, 'B2Q 6J1', '2007-09-16 00:00:00', 19, 64, 13),
(96, 'G1T 5J4', '2002-08-16 00:00:00', 40, 83, 1),
(97, 'T7Z 6Z4', '2030-08-16 00:00:00', 1, 67, 39),
(98, 'S2E 1F3', '2025-11-16 00:00:00', 10, 100, 21),
(99, 'V1U 3I5', '2015-12-16 00:00:00', 21, 75, 38),
(100, 'L1N 6B5', '2017-05-17 00:00:00', 40, 47, 18);

-- --------------------------------------------------------

--
-- Structure de la table `entity`
--

-- CREATE TABLE `entity` (
--   `id` int(11) NOT NULL,
--   `name` varchar(45) DEFAULT NULL,
--   `role` varchar(45) DEFAULT NULL,
--   `address` int(11) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entity`
--

INSERT INTO `entity` (`id`, `name`, `role`, `address`) VALUES
(1, 'Super-admin', '1', 1),
(2, 'admin', '2', 2),
(3, 'utilisateur', '3', 1);

-- --------------------------------------------------------

--
-- Structure de la table `truck`
--

-- CREATE TABLE `truck` (
--   `id` int(11) NOT NULL,
--   `gaz` int(11) DEFAULT NULL,
--   `speedMax` int(11) DEFAULT NULL,
--   `speedMin` int(11) DEFAULT NULL,
--   `speedAvg` int(11) DEFAULT NULL,
--   `acceleration` int(11) DEFAULT NULL,
--   `stoptime` int(11) DEFAULT NULL,
--   `breaktime` int(11) DEFAULT NULL,
--   `traficCorridor` varchar(255) DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `truck`
--

INSERT INTO `truck` (`id`, `gaz`, `speedMax`, `speedMin`, `speedAvg`, `acceleration`, `stoptime`, `breaktime`, `traficCorridor`) VALUES
(1, 45, 108, 6, 52, 28, 56, 36, 'Västra Götalands län'),
(2, 42, 107, 57, 49, 12, 98, 39, 'Jigawa'),
(3, 90, 65, 44, 58, 71, 1, 15, 'Katsina'),
(4, 81, 117, 33, 59, 28, 9, 37, 'Anambra'),
(5, 35, 113, 40, 59, 31, 63, 71, 'C'),
(7, 38, 74, 36, 43, 43, 42, 37, 'San José'),
(8, 83, 86, 8, 54, 50, 96, 1, 'Kocaeli'),
(9, 82, 89, 48, 35, 88, 87, 2, 'SK'),
(10, 34, 81, 30, 32, 19, 1, 70, 'Ohio'),
(11, 44, 76, 38, 33, 51, 14, 51, 'LD'),
(12, 24, 106, 8, 51, 58, 15, 8, 'Toscana'),
(13, 92, 93, 49, 51, 84, 66, 33, 'FVG'),
(14, 78, 107, 52, 30, 46, 90, 18, 'Calabria'),
(15, 96, 81, 23, 59, 76, 3, 30, 'IX'),
(16, 46, 108, 51, 42, 31, 35, 18, 'Wielkopolskie'),
(17, 17, 79, 49, 50, 67, 57, 10, 'Victoria'),
(18, 95, 73, 29, 46, 27, 68, 66, 'Istanbul'),
(19, 18, 85, 33, 66, 85, 68, 67, 'Saskatchewan'),
(20, 23, 97, 42, 58, 53, 84, 32, 'V'),
(21, 41, 103, 39, 58, 100, 28, 28, 'NL'),
(22, 100, 60, 40, 59, 22, 69, 43, 'NE'),
(23, 22, 105, 48, 61, 32, 98, 16, 'Wie'),
(24, 31, 100, 24, 59, 38, 8, 66, 'KN'),
(25, 93, 87, 53, 33, 86, 33, 47, 'OH'),
(26, 31, 64, 21, 62, 54, 71, 14, 'NI'),
(27, 93, 64, 44, 69, 2, 89, 48, 'Lorraine'),
(28, 41, 69, 46, 65, 69, 63, 88, 'ON'),
(29, 82, 113, 37, 53, 40, 28, 34, 'BC'),
(30, 59, 82, 40, 68, 7, 59, 78, 'NI'),
(31, 83, 74, 55, 44, 30, 22, 85, 'Ohio'),
(32, 80, 63, 26, 55, 93, 23, 39, 'Arizona'),
(33, 55, 65, 18, 41, 9, 67, 68, 'Madrid'),
(34, 96, 105, 40, 43, 15, 65, 46, 'ON'),
(35, 38, 61, 58, 57, 71, 38, 23, 'Tamil Nadu'),
(36, 56, 106, 22, 58, 58, 8, 93, 'PI'),
(37, 88, 99, 22, 35, 62, 71, 13, 'Alberta'),
(39, 26, 64, 7, 48, 82, 21, 76, 'Florida'),
(40, 69, 73, 11, 43, 89, 45, 58, 'HE'),
(41, 38, 89, 43, 50, 57, 20, 64, 'Saxony-Anhalt'),
(42, 5, 89, 41, 48, 53, 90, 13, 'Vienna');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

-- CREATE TABLE `user` (
--   `id` int(11) NOT NULL,
--   `firstname` varchar(45) DEFAULT NULL,
--   `lastname` varchar(45) DEFAULT NULL,
--   `password` varchar(45) DEFAULT NULL,
--   `Entity` int(11) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `password`, `Entity`) VALUES
(1, 'Macon', 'Kemp', 'ILB45NDF2IQ', 2),
(2, 'Lester', 'Stuart', 'ZUN44GUP5SX', 2),
(3, 'Jakeem', 'Francis', 'NKS21JLU3ST', 2),
(4, 'Emerson', 'Mcdonald', 'UMR12HCE0TV', 1),
(5, 'Harding', 'Mcdonald', 'CRN38PAS8WL', 1),
(6, 'Theodore', 'Dillard', 'RGG99QJI8QI', 1),
(7, 'Xavier', 'Vaughn', 'VEO64DNL3PF', 1),
(8, 'Cade', 'Park', 'ARF83MMC9ER', 3),
(9, 'Driscoll', 'Lane', 'FVF31HOZ5WQ', 1),
(10, 'Evan', 'Swanson', 'WVF22EOV8KC', 2),
(11, 'Kieran', 'Cain', 'SFJ56PJS2PB', 1),
(12, 'Adam', 'Baker', 'AFE66EFZ7SI', 1),
(13, 'Melvin', 'Warner', 'TBA75RTZ2CK', 1),
(14, 'Hayes', 'Joyner', 'QHP96WZD5MK', 2),
(15, 'Vaughan', 'Frank', 'UQG93KIR3FX', 2),
(16, 'Bruce', 'Bryant', 'AMU95KGI8FC', 2),
(17, 'Ferris', 'Decker', 'BRY54ADE0LZ', 2),
(18, 'Flynn', 'Parrish', 'FDK91DBM3MQ', 3),
(19, 'Gabriel', 'Aguilar', 'YOC76JQQ2TK', 2),
(20, 'Ivor', 'Delgado', 'FNY57VEI5RT', 3),
(21, 'Armando', 'Hernandez', 'NSK15YEC9LS', 1),
(22, 'Micah', 'Banks', 'IHU76VLX0MB', 3),
(23, 'Alden', 'Johnson', 'MWL65RSW5ST', 3),
(24, 'Murphy', 'Gordon', 'QBJ42MNM1TH', 2),
(25, 'Tiger', 'Elliott', 'LGF12MND2EV', 3),
(26, 'Tyrone', 'Ward', 'RDH92LTE8LO', 1),
(27, 'Hayden', 'Elliott', 'PKF17OMR4WO', 2),
(28, 'Merrill', 'Dillon', 'RQV43ZOF5XF', 1),
(29, 'Channing', 'Fields', 'YBO63RXV8LJ', 3),
(30, 'Curran', 'Gregory', 'MPS17OAQ1LW', 3),
(31, 'Lars', 'Alston', 'QTL41BGO0NC', 1),
(32, 'Burton', 'Ferrell', 'XUV85SYR8ED', 2),
(33, 'August', 'Simmons', 'DNO43RZK7KO', 1),
(34, 'Gavin', 'Ratliff', 'LSF24EAL9JV', 2),
(35, 'Aidan', 'Holmes', 'UFM66CZX6FS', 2),
(36, 'Xanthus', 'Williamson', 'ETB68FPU8ML', 3),
(37, 'Dieter', 'Montgomery', 'EWO20WBZ7XB', 2),
(38, 'Avram', 'Gray', 'GAM27EMI9PJ', 3),
(39, 'Chaney', 'Collier', 'HKZ23QKP6PR', 3),
(40, 'Berk', 'Clemons', 'FSH04UMG3SH', 3),
(41, 'John', 'Travis', 'WYR53RXI9JD', 3),
(42, 'Jerome', 'Ross', 'HJS24AYO8JX', 2),
(43, 'Baker', 'Jefferson', 'LRC80VZQ4GQ', 1),
(44, 'Jonas', 'Watson', 'DRV24GZL1SY', 3),
(45, 'Micah', 'Carroll', 'TMW92LEK7FM', 1),
(46, 'Phelan', 'Chaney', 'UCP03QUO1RF', 2),
(47, 'Macon', 'Guthrie', 'RDI82ZCN9NW', 1),
(48, 'Gabriel', 'Mccarthy', 'PCD07ABZ4NZ', 1),
(49, 'Rudyard', 'Richards', 'ZHD59PWK0PG', 3),
(50, 'Carter', 'Pace', 'DEN26NPG8ZL', 3),
(51, 'Brandon', 'Roberson', 'BEM79ULO6IM', 3),
(52, 'Lucas', 'Gibson', 'ZAO47IVT4FG', 1),
(53, 'Lyle', 'Kirby', 'OSR13COT5LK', 1),
(54, 'Travis', 'Weeks', 'UWT36SQN4SM', 3),
(55, 'Buckminster', 'Higgins', 'ZBE55UZM3IR', 2),
(56, 'Uriah', 'Rogers', 'ABQ67JKZ5FM', 2),
(57, 'Myles', 'Bush', 'DHP35EOU1DW', 3),
(58, 'Thaddeus', 'Hurley', 'DVN54PJA6PV', 2),
(59, 'Tiger', 'Levine', 'BAE36HVX9UY', 1),
(60, 'Ciaran', 'Travis', 'TXO79MHB3KO', 2),
(61, 'Cairo', 'Burgess', 'RCZ51DUK2DM', 2),
(62, 'Kenyon', 'Clay', 'XKQ56TTF1UD', 3),
(63, 'Jakeem', 'Parker', 'DSX27AYA3AS', 1),
(64, 'Reese', 'Pruitt', 'XYL09TPF1TQ', 1),
(65, 'Elvis', 'Castro', 'ZLU07PAI9GR', 1),
(66, 'Colorado', 'Hull', 'NWY49DIQ1FK', 2),
(67, 'Dane', 'Hebert', 'HHV43YKF0SO', 2),
(68, 'Kennan', 'Hicks', 'FHS74SID2SC', 1),
(69, 'Uriah', 'Atkinson', 'PSN15JBS6QZ', 2),
(70, 'Ali', 'Norton', 'SWZ86IVH0YK', 1),
(71, 'Cade', 'Dean', 'XXE48COK9JG', 1),
(72, 'Hashim', 'Hawkins', 'BZK89MZN4JW', 3),
(73, 'Hunter', 'Hester', 'WPY73NWI0TR', 3),
(74, 'Basil', 'Mcgowan', 'JLR51VYC7UZ', 1),
(75, 'Rashad', 'Casey', 'QYQ07UFW0NX', 3),
(76, 'Rafael', 'Keith', 'BGH25PMB7LC', 3),
(77, 'Magee', 'Kirkland', 'XWS44JTQ0FF', 3),
(78, 'Connor', 'Goff', 'MKK46LSL3GI', 3),
(79, 'Cruz', 'Johns', 'GHT36BUD7QS', 2),
(80, 'Declan', 'Mason', 'WMY84FYA5TE', 1),
(81, 'Alvin', 'Moss', 'KZW77FSC4XL', 2),
(82, 'Gil', 'Valentine', 'UHX05ZEF1TU', 1),
(83, 'Deacon', 'Morales', 'IQT44SDL3IH', 2),
(84, 'Zachery', 'Waller', 'MKM00HXY5WN', 1),
(85, 'Tucker', 'Mosley', 'QSU25NXU6EH', 3),
(86, 'Arthur', 'Lambert', 'RRU04KJE5EU', 2),
(87, 'Kermit', 'York', 'DXK40HKI1YR', 1),
(88, 'Brent', 'Coffey', 'ORQ43OQT6HH', 3),
(89, 'Emery', 'Kerr', 'KIV09JRH3CQ', 1),
(90, 'Valentine', 'Morin', 'AOT12AHD1TO', 2),
(91, 'Kirk', 'Hicks', 'GQJ96KST2KG', 3),
(92, 'Vance', 'Gilbert', 'LAF55GVH1HV', 2),
(93, 'Laith', 'Kelley', 'IVL58HZW3IB', 3),
(94, 'Victor', 'Fitzgerald', 'QWK85ULQ9BC', 3),
(95, 'Craig', 'Walker', 'ZTT46QBC9XO', 2),
(96, 'Chaim', 'Brock', 'ACT51PFX6PU', 2),
(97, 'Thor', 'Perkins', 'GGX00QOQ6UF', 1),
(98, 'Prescott', 'Bates', 'AKA66OLW4BD', 3),
(99, 'Rogan', 'Obrien', 'IPJ99IFY7XK', 1),
(100, 'Linus', 'Rowe', 'NIU01YBA6KT', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`,`truck`,`user`,`address`),
  ADD KEY `fk_delivery_truckx` (`truck`),
  ADD KEY `fk_delivery_user1x` (`user`),
  ADD KEY `fk_delivery_address1x` (`address`);

--
-- Index pour la table `entity`
--
ALTER TABLE `entity`
  ADD PRIMARY KEY (`id`,`address`),
  ADD KEY `fk_Entity_address1x` (`address`);

--
-- Index pour la table `truck`
--
ALTER TABLE `truck`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`Entity`),
  ADD KEY `fk_user_Entity1x` (`Entity`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `fk_delivery_address1` FOREIGN KEY (`address`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_delivery_truck` FOREIGN KEY (`truck`) REFERENCES `truck` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_delivery_user1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `entity`
--
ALTER TABLE `entity`
  ADD CONSTRAINT `fk_Entity_address1` FOREIGN KEY (`address`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_Entity1` FOREIGN KEY (`Entity`) REFERENCES `entity` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
