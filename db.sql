-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 23-Out-2012 às 07:58
-- Versão do servidor: 5.1.36
-- versão do PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de Dados: `happygroup_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`id`, `active`, `name`, `email`, `password`, `date`) VALUES
(1, 1, 'jowan wondergem', 'jowanwondergem@gmail.com', '', '2012-09-26 14:00:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL,
  `id_country` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `text` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `areas`
--

INSERT INTO `areas` (`id`, `id_country`, `code`, `text`) VALUES
(1, 1, 'NOR', 'Norte'),
(2, 1, 'CEN', 'Centro'),
(3, 1, 'LIS', 'Lisboa'),
(4, 1, 'ALE', 'Alentejo'),
(5, 1, 'ALG', 'Algarve');

-- --------------------------------------------------------

--
-- Estrutura da tabela `areas_lan`
--

CREATE TABLE IF NOT EXISTS `areas_lan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lan` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `area` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `areas_lan`
--

INSERT INTO `areas_lan` (`id`, `id_lan`, `id_area`, `area`) VALUES
(1, 2, 1, 'Norte'),
(2, 2, 2, 'Centro'),
(3, 2, 3, 'Lisboa'),
(4, 2, 4, 'Alentejo'),
(5, 2, 5, 'Algarve');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartholders`
--

CREATE TABLE IF NOT EXISTS `cartholders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_agent` int(11) NOT NULL,
  `card_type` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `telephone` varchar(40) NOT NULL,
  `mobile` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(100) NOT NULL,
  `id_country` int(11) NOT NULL,
  `date_register` date NOT NULL,
  `date_edited` date NOT NULL,
  `is_partner` int(11) NOT NULL,
  `partner_package_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `cartholders`
--

INSERT INTO `cartholders` (`id`, `id_agent`, `card_type`, `first_name`, `last_name`, `birth_date`, `telephone`, `mobile`, `email`, `address`, `id_country`, `date_register`, `date_edited`, `is_partner`, `partner_package_type`) VALUES
(1, 0, 1, '42', '3134', '0000-00-00', '4134', '1341', 'aa@dfadf.com', 'efsdf', 1, '2012-10-15', '2012-10-15', 0, 0),
(2, 0, 1, '42', '3134', '0000-00-00', '4134', '1341', '43@dfadf.com', 'efsdf', 1, '2012-10-15', '2012-10-15', 0, 0),
(3, 0, 1, '42', '3134', '0000-00-00', '4134', '1341', '43@dfadf.com', 'efsdf', 1, '2012-10-15', '2012-10-15', 0, 0),
(4, 0, 1, '42', '3134', '0000-00-00', '4134', '1341', '43@dfadf.com', 'efsdf', 1, '2012-10-15', '2012-10-15', 0, 0),
(5, 0, 1, 'rwrwer', 'werwer', '2012-10-09', '423432', '44234234', 'dfdfsdf@sfsff.com', 'ewrwr', 1, '2012-10-16', '2012-10-16', 0, 0),
(6, 0, 1, 'afdfsdfasÃ§Ã§Ã§df', 'dsfsdfÃ§Ã§sdfÃ§df', '2012-10-10', '123', '21323', 'sdffdsffs@dfdfs.com', 'dsdfsfsd', 1, '2012-10-16', '2012-10-16', 0, 0),
(7, 0, 1, 'asd''aa"sdsd', 'sadasd', '2012-10-10', '312323', '213213', 'fffff@fff.com', 'fdsfsdf', 1, '2012-10-16', '2012-10-16', 0, 0),
(8, 0, 1, 'ççaá´´gg''''jj""', 'asd', '2012-10-19', '2132', '3123123', 'dfdsfsdf@sdfsdf.com', 'sdasda', 1, '2012-10-16', '2012-10-16', 0, 0),
(9, 0, 1, 'João d´Abrões', 'Ãngel'' o', '2012-10-11', '123 1233 123', '123 123 123', 'ssss@ss.com', 'Rua da f´orentínas', 1, '2012-10-16', '2012-10-16', 0, 0),
(10, 0, 1, 'sdasd', '123', '2012-10-03', '123', '13123', 'fffsddff@fff.com', '3123', 1, '2012-10-16', '2012-10-16', 0, 0),
(11, 123, 2, '123', '123', '2012-10-17', '123', '123', '123@fsdf.com', '123', 172, '2012-10-19', '2012-10-19', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `text`) VALUES
(1, 'Gastronomia'),
(2, 'Instituto de Beleza'),
(3, 'Clínicas'),
(4, 'Oficinas'),
(5, 'Saúde e Bem Estar'),
(6, 'Farmácias'),
(7, 'Lojas'),
(8, 'Lojas'),
(9, 'Rent a Car'),
(10, 'Prestação de Serviços');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories_lan`
--

CREATE TABLE IF NOT EXISTS `categories_lan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lan` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `category` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `categories_lan`
--

INSERT INTO `categories_lan` (`id`, `id_lan`, `id_category`, `category`) VALUES
(1, 2, 1, 'Gastronomia'),
(2, 2, 2, 'Instituto de Beleza'),
(3, 2, 3, 'Clínicas'),
(4, 2, 4, 'Oficinas'),
(5, 2, 5, 'Saúde e Bem Estar'),
(6, 2, 6, 'Farmácias'),
(7, 2, 7, 'Lojas'),
(8, 2, 8, 'Discotecas'),
(9, 2, 9, 'Rent a Car'),
(10, 2, 10, 'Prestação de Serviços');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_country` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `code` varchar(11) NOT NULL,
  `text` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `cities`
--

INSERT INTO `cities` (`id`, `id_country`, `id_area`, `code`, `text`) VALUES
(1, 1, 3, 'LIS', 'Lisboa'),
(2, 1, 5, 'ALB', 'Albufeira'),
(3, 1, 1, 'POR', 'Porto'),
(4, 1, 2, 'LEI', 'Leiria'),
(5, 1, 4, 'SET', 'Setubal'),
(6, 1, 2, 'FAT', 'Fátima');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cities_lan`
--

CREATE TABLE IF NOT EXISTS `cities_lan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lan` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `cities_lan`
--

INSERT INTO `cities_lan` (`id`, `id_lan`, `id_city`, `city`) VALUES
(1, 2, 1, 'Lisboa'),
(2, 2, 2, 'Albufeira'),
(3, 2, 3, 'Porto'),
(4, 2, 4, 'Leiria'),
(5, 2, 5, 'Sétubal'),
(6, 2, 6, 'Fátima');

-- --------------------------------------------------------

--
-- Estrutura da tabela `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_2_letter` varchar(3) NOT NULL,
  `text_capitalized` varchar(100) NOT NULL,
  `text_normal` varchar(100) NOT NULL,
  `code_3_letter` varchar(4) DEFAULT NULL,
  `code_international` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=240 ;

--
-- Extraindo dados da tabela `countries`
--

INSERT INTO `countries` (`id`, `code_2_letter`, `text_capitalized`, `text_normal`, `code_3_letter`, `code_international`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56),
(22, 'BZ', 'BELIZE', 'Belize', 'bele', 84),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152),
(44, 'CN', 'CHINA', 'China', 'CHN', 156),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188),
(53, 'CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191),
(55, 'c*', 'CUBA', 'Cuba', 'CUB', 192),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352),
(99, 'IN', 'INDIA', 'India', 'IND', 356),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417),
(116, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600),
(168, 'PE', 'PERU', 'Peru', 'PER', 604),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666),
(183, 'voc', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716);

-- --------------------------------------------------------

--
-- Estrutura da tabela `countries_lan`
--

CREATE TABLE IF NOT EXISTS `countries_lan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lan` int(11) NOT NULL,
  `id_country` int(11) NOT NULL,
  `country` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `countries_lan`
--

INSERT INTO `countries_lan` (`id`, `id_lan`, `id_country`, `country`) VALUES
(1, 1, 172, 'Portugal'),
(2, 2, 172, 'Portugal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `flash_discounts`
--

CREATE TABLE IF NOT EXISTS `flash_discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lan` int(11) NOT NULL,
  `text` varchar(300) NOT NULL,
  `link` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `flash_discounts`
--

INSERT INTO `flash_discounts` (`id`, `id_lan`, `text`, `link`) VALUES
(1, 2, 'Novos Veículos até 30% Desconto', ''),
(2, 2, 'PROVA DE VINHOS', 'qweweqwe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `flyers`
--

CREATE TABLE IF NOT EXISTS `flyers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_city` int(11) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `id_theme` int(11) DEFAULT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `flyers`
--

INSERT INTO `flyers` (`id`, `id_lan`, `id_admin`, `id_city`, `id_area`, `id_theme`, `url`) VALUES
(8, 2, 1, 6, NULL, NULL, 'fatima.png'),
(9, 2, 1, 6, NULL, NULL, 'fatima_2.png'),
(10, 2, 1, 4, NULL, NULL, 'leiria.png'),
(5, 2, 1, 2, NULL, NULL, 'albufeira.png'),
(6, 2, 1, 2, NULL, NULL, 'albufeira_2.png'),
(11, 2, 1, 4, NULL, NULL, 'leiria_2.png'),
(12, 2, 1, 3, NULL, NULL, 'porto.png'),
(13, 2, 1, 5, NULL, NULL, 'setubal.png'),
(14, 2, 1, 5, NULL, NULL, 'setubal_2.png'),
(15, 2, 1, NULL, NULL, 1, 'party.png'),
(16, 2, 1, NULL, 5, NULL, 'algarve.png'),
(17, 2, 1, NULL, 5, NULL, 'algarve_2.png'),
(18, 2, 1, NULL, 5, NULL, 'algarve_3.png'),
(19, 2, 1, NULL, 5, NULL, 'algarve_4.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `interface`
--

CREATE TABLE IF NOT EXISTS `interface` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(100) NOT NULL,
  `part` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `interface`
--

INSERT INTO `interface` (`id`, `section`, `part`) VALUES
(1, 'about_us', 'title'),
(2, 'about_us', 'subtitle'),
(3, 'about_us', 'text'),
(4, 'website_partner', 'title_discounts'),
(5, 'website_partner', 'title_contacts'),
(6, 'website_partner', 'country'),
(7, 'website_partner', 'location'),
(8, 'website_partner', 'address'),
(10, 'website_partner', 'phone'),
(11, 'website_partner', 'email'),
(12, 'website_partner', 'website'),
(14, 'website_partner', 'partner_of_happygroup'),
(15, 'website_partner', 'back_to_happygroup'),
(16, 'flyers', 'page_title'),
(17, 'flyers', 'cities'),
(18, 'flyers', 'areas'),
(19, 'flyers', 'themes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `interface_lan`
--

CREATE TABLE IF NOT EXISTS `interface_lan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lan` int(11) NOT NULL,
  `id_interface` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `interface_lan`
--

INSERT INTO `interface_lan` (`id`, `id_lan`, `id_interface`, `text`) VALUES
(1, 2, 1, 'Sobre Nós'),
(2, 2, 2, 'Presentação'),
(3, 2, 3, 'A   GROUP  " happy  " trabalha há mais de <font class="text_green text_bold">onze anos</font> na indústria de Turismo e Viagens.\r\n                Durante  todo este tempo, ganhámos considerável experiência nesta área.\r\n                Com o objectivo de proporcionar aos nossos clientes e agentes ainda mais vantagens e benefícios,  lançámos agora um cartão: \r\n                \r\n                <br /><br />\r\n                 <font class="text_green text_bold">HAPPY-GROUP BONUS CARD</font>, que foi criado para tornar mais fácil e económica a vida dos nossos\r\n                associados.\r\n                <br /><br />\r\n                 <font class="text_green text_bold">HAPPY CLUB</font>, dispõe actualmente de  <font class="text_green text_bold">2500 associados</font> que \r\n                publicitam e posicionam os nossos produtos em Portugal.\r\n                <br /><br />\r\n                Em conjunto com a nossa empresa mãe, a HAPPY CLUB, dispomos \r\n                de  <font class="text_green text_bold">5500 parceiros</font> nacionais e internacionais, com um potencial de \r\n                rápido crescimento na Alemanha, França, Espanha e Inglaterra. \r\n                '),
(4, 2, 4, 'Descontos'),
(5, 2, 5, 'Contatos'),
(6, 2, 6, 'País'),
(7, 2, 7, 'Localização'),
(8, 2, 8, 'Morada'),
(9, 2, 10, 'Tel'),
(10, 2, 11, 'Email'),
(11, 2, 12, 'Website'),
(12, 2, 14, 'PARCEIRO DE HAPPYGROUP'),
(13, 2, 15, 'VOLTAR AO HAPPYGROUP'),
(14, 2, 16, 'Flyers'),
(15, 2, 17, 'Cidades'),
(16, 2, 18, 'Zonas'),
(17, 2, 19, 'Noite');

-- --------------------------------------------------------

--
-- Estrutura da tabela `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(4) NOT NULL,
  `text` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `languages`
--

INSERT INTO `languages` (`id`, `code`, `text`) VALUES
(1, 'EN', 'English'),
(2, 'PT', 'Português');

-- --------------------------------------------------------

--
-- Estrutura da tabela `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_country` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `img_s` varchar(300) NOT NULL,
  `img_b` varchar(300) NOT NULL,
  `url` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `partners`
--

INSERT INTO `partners` (`id`, `active`, `id_admin`, `id_category`, `id_country`, `id_area`, `id_city`, `name`, `img_s`, `img_b`, `url`, `email`, `phone`, `mobile_phone`, `date_creation`) VALUES
(1, 1, 0, 1, 1, 1, 3, 'lalala', '1/1_large.jpg', '1/1_large.jpg', 'https://www.google.com', '', '', '', '2012-09-26 17:45:42'),
(2, 1, 1, 1, 1, 1, 3, 'Hapçpy', '4/4_large.png', '4/4_large.png', 'ggj', '', '', '', '2012-09-26 17:45:49'),
(3, 1, 0, 2, 1, 2, 4, 'Esteticista Natali', '5/5_large.png', '5/5_large.png', 'sdasdsd', '', '', '', '2012-09-26 18:42:34'),
(4, 1, 1, 2, 1, 2, 4, 'Esteticista Nataliya', '6/6_large.jpg', '6/6_large.jpg', 'dsfsdfdf', '', '', '', '2012-09-26 18:45:16'),
(5, 1, 1, 2, 1, 2, 4, 'Zen Life', '7/7_large.png', '7/7_large.png', 'asdasd', '', '', '', '2012-09-26 18:47:28'),
(6, 1, 1, 2, 1, 2, 4, 'Summer Bronze', '8/8_large.png', '8/8_large.png', 'dasd', '', '', '', '2012-09-26 18:48:37'),
(7, 1, 1, 2, 1, 2, 4, 'LeiriBeleza', '9/9_large.png', '9/9_large.png', 'http/www.leiribeleza.pt', '', '', '', '2012-09-26 18:52:16'),
(8, 1, 1, 2, 1, 2, 4, 'Corpus Brilhantes', '10/10_large.jpg', '10/10_large.jpg', 'cadasd', '', '', '', '2012-09-26 18:54:54'),
(9, 1, 1, 2, 1, 2, 4, 'Vip Clinic', '11/11_large.jpg', '11/11_large.jpg', 'sdfsdf', '', '', '', '2012-09-26 18:54:54'),
(10, 1, 1, 2, 1, 2, 4, 'Pipilankas', '12/12_large.jpg', '12/12_large.jpg', 'asdasdasd', '', '', '', '2012-09-26 19:01:07'),
(11, 1, 1, 2, 1, 2, 4, 'Cabelereiro Euro Afro', '13/13_large.jpg', '13/13_large.jpg', 'dasdasd', '', '', '', '2012-09-26 19:01:07'),
(12, 1, 1, 2, 1, 2, 4, 'Louro Moreno', '14/14_large.jpg', '14/14_large.jpg', 'asdasd', '', '', '', '2012-09-26 19:01:07'),
(13, 1, 1, 2, 1, 2, 4, 'Cabeleireiro e Estética Brasil', '15/15_large.png', '15/15_large.png', 'sasdsad', '', '', '', '2012-09-26 19:01:07'),
(14, 1, 1, 2, 1, 2, 4, 'Irene Cabeleireiros', '16/16_large.jpg', '16/16_large.jpg', 'asdasd', '', '', '', '2012-09-26 19:01:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `partners_lan`
--

CREATE TABLE IF NOT EXISTS `partners_lan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lan` int(11) NOT NULL,
  `id_partner` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `partners_lan`
--

INSERT INTO `partners_lan` (`id`, `id_lan`, `id_partner`, `description`) VALUES
(1, 2, 1, 'dfsdfafafadfasdf'),
(2, 2, 2, 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens com Lorem Ipsum, e mais recentemente com os programas de publicação como o Aldus PageMaker que incluem versões do Lorem Ipsum.O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens com Lorem Ipsum, e mais recentemente com os programas de publicação como o Aldus PageMaker que incluem versões do Lorem Ipsum.O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens com Lorem Ipsum, e mais recentemente com os programas de publicação como o Aldus PageMaker que incluem versões do Lorem Ipsum.O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens com Lorem Ipsum, e mais recentemente com os programas de publicação como o Aldus PageMaker que incluem versões do Lorem Ipsum.O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens com Lorem Ipsum, e mais recentemente com os programas de publicação como o Aldus PageMaker que incluem versões do Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `p_partners`
--

CREATE TABLE IF NOT EXISTS `p_partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `website` varchar(200) NOT NULL,
  `redirect` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `p_partners`
--

INSERT INTO `p_partners` (`id`, `id_admin`, `name`, `logo`, `url`, `telephone`, `email`, `address`, `website`, `redirect`) VALUES
(1, 1, 'BIERGARTEN', '1/logo.png', '/biergarten', '9834234445', 'visitus@vila.pt', '8125-901 Vilamoura', 'biergarten', ''),
(2, 1, 'jowandesign', '17/logo.png', 'jowandesign', '91790544', 'info@jowandesign.com', '', 'jowandesign', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `p_partners_discounts`
--

CREATE TABLE IF NOT EXISTS `p_partners_discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_partner` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `p_partners_discounts`
--

INSERT INTO `p_partners_discounts` (`id`, `id_partner`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `p_partners_discounts_lan`
--

CREATE TABLE IF NOT EXISTS `p_partners_discounts_lan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_partner` int(11) NOT NULL,
  `id_lan` int(11) NOT NULL,
  `discount_perc` varchar(50) NOT NULL,
  `discount_text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `p_partners_discounts_lan`
--

INSERT INTO `p_partners_discounts_lan` (`id`, `id_partner`, `id_lan`, `discount_perc`, `discount_text`) VALUES
(1, 1, 2, '64% DESCONTO.', 'Sessão de Crioterapia + Eletroestimulação. O tratamento eficaz na redução das gorduras localizadas.'),
(2, 1, 2, '50% DESCONTO', 'Anadia: Estadia 3 Dias 2 Noites com Pequeno Almoço na Estalagem Sangalhos****.'),
(3, 1, 2, '52% DESCONTO', 'SMOOTH AWAY VIBE: O novo sistema europeu de depilação: Sem dor, sem produtos químicos e sem irritação.'),
(4, 2, 2, '40%', ' Para desenho de layout do seu website até 56 de Dezembro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `p_partners_images`
--

CREATE TABLE IF NOT EXISTS `p_partners_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_partner` int(11) NOT NULL,
  `url` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `p_partners_images`
--

INSERT INTO `p_partners_images` (`id`, `id_partner`, `url`) VALUES
(1, 1, '1/website/1.jpg'),
(2, 1, '1/website/2.jpg'),
(3, 1, '1/website/3.jpg'),
(4, 1, '1/website/4.jpg'),
(5, 1, '1/website/5.jpg'),
(6, 2, '17/website/1.jpg'),
(7, 2, '17/website/2.jpg'),
(8, 2, '17/website/3.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `p_partners_lan`
--

CREATE TABLE IF NOT EXISTS `p_partners_lan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_partner` int(11) NOT NULL,
  `id_lan` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `p_partners_lan`
--

INSERT INTO `p_partners_lan` (`id`, `id_partner`, `id_lan`, `description`) VALUES
(1, 1, 2, 'Ao contrário da crença popular, o Lorem Ipsum não é simplesmente texto aleatório. Tem raízes numa peça de literatura clássica em Latim, de 45 AC, tornando-o com mais de 2000 anos. Richard McClintock, um professor de Latim no Colégio Hampden-Sydney, na Virgínia, procurou\r\n\r\numa das palavras em Latim mais obscuras (consectetur) numa passagem Lorem Ipsum, e atravessando as cidades do mundo na literatura clássica, descobriu a sua origem. Lorem Ipsum vem das secções 1.10.32 e 1.10.33 do "de Finibus Bonorum et Malorum" (Os Extremos do Bem e do Mal), por Cícero, escrito a 45AC. Este livro é um tratado na teoria da ética, muito popular durante a Renascença. A primeira linha de Lorem Ipsum, "Lorem ipsum dolor sit amet..." aparece de uma linha na secção 1.10.32.\r\n\r\nO pedaço mais habitual do Lorem Ipsum usado desde os anos 1500 é reproduzido abaixo para os interessados. As secções 1.10.32 e 1.10.33 do "de Finibus Bonorum et Malorum" do Cícero também estão reproduzidos na sua forma original, acompanhados pela sua tradução em Inglês, versões da tradução de 1914 por H. Rackham.'),
(2, 2, 2, 'Um freelancer jovem, com um objectivo. Criar productos satisfeitórios para clientes satisfeitos. Residente em Lisboa - Portugal, mas ofereçendo os serviços internacionalmente\r\n<br><br>\r\n\r\nCombinando ideias, pontos de vista e culturas para chegar ao resultado desejado, de uma forma fluente e agradável. Durante o processo mantemo-nos de mente aberta para ideias e sugestões.\r\n<br><br><br>\r\nWeb Design é uma abordagem completamente diferente do que o design gráfico. Aqui deve-se ter um conta outros critérios, tal como : funcionalidade, interactividade e tempo de carregamento. Este serviço é mais exacto, portanto é preciso um conhecimento específico.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `p_partners_layout`
--

CREATE TABLE IF NOT EXISTS `p_partners_layout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_partner` int(11) NOT NULL,
  `color_header` varchar(100) NOT NULL,
  `color_background` varchar(100) NOT NULL,
  `color_lines` varchar(100) NOT NULL,
  `top_left` varchar(50) NOT NULL,
  `top_right` varchar(50) NOT NULL,
  `bottom_left` varchar(50) NOT NULL,
  `bottom_right` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `p_partners_layout`
--

INSERT INTO `p_partners_layout` (`id`, `id_partner`, `color_header`, `color_background`, `color_lines`, `top_left`, `top_right`, `bottom_left`, `bottom_right`) VALUES
(3, 1, '', '#E4E4E4', '', 'images', 'contacts', 'discounts', 'texts'),
(4, 2, '#FF9933', '#484848 ', '#FF6600', 'images', 'discounts', 'texts', 'contacts');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `slider`
--

INSERT INTO `slider` (`id`, `image`) VALUES
(1, 'relax.jpg'),
(2, 'flower.jpg'),
(3, 'happy.jpg'),
(4, '1.jpg'),
(5, '2.jpg'),
(6, 'happy people.jpg'),
(7, 'Five_Happy_Kids_.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slider_lan`
--

CREATE TABLE IF NOT EXISTS `slider_lan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lan` int(11) NOT NULL,
  `id_slider` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subtitle` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `slider_lan`
--

INSERT INTO `slider_lan` (`id`, `id_lan`, `id_slider`, `title`, `subtitle`) VALUES
(1, 2, 1, 'Mente', 'Pense Positivo'),
(2, 2, 2, 'Sorte', 'Não vem sozinha! Creie-a!'),
(3, 2, 3, 'Relações', 'Não esqueça de amar!'),
(4, 2, 4, 'Relações', 'Vive a sua liberdade!'),
(5, 2, 5, 'Relações', 'Trabalhar com um sorriso!'),
(6, 2, 6, 'Casal', 'Hmmm jantar à praia'),
(7, 2, 7, 'Crianças', 'Brincar ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `themes`
--

INSERT INTO `themes` (`id`, `theme`) VALUES
(1, 'night');

-- --------------------------------------------------------

--
-- Estrutura da tabela `themes_lan`
--

CREATE TABLE IF NOT EXISTS `themes_lan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lan` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL,
  `theme` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `themes_lan`
--

INSERT INTO `themes_lan` (`id`, `id_lan`, `id_theme`, `theme`) VALUES
(1, 2, 1, 'Noite');
