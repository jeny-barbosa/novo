-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 27-Ago-2019 às 21:15
-- Versão do servidor: 5.7.26
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_pontos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaborador`
--

DROP TABLE IF EXISTS `colaborador`;
CREATE TABLE IF NOT EXISTS `colaborador` (
  `ID` int(25) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `colaborador`
--

INSERT INTO `colaborador` (`ID`, `NOME`) VALUES
(1, 'Juliano Nardelli'),
(2, 'Erick Jordy'),
(3, 'Jennefer Barbosa'),
(4, 'Carlos Alberto'),
(5, 'Ruan Felipe'),
(6, 'Sila Siebert'),
(7, 'Gustavo Carletto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movidesk`
--

DROP TABLE IF EXISTS `movidesk`;
CREATE TABLE IF NOT EXISTS `movidesk` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `TICKET` varchar(10) DEFAULT NULL,
  `CHAMADO` varchar(100) DEFAULT NULL,
  `DATA_PONTO` varchar(10) DEFAULT NULL,
  `HORA_INICIO` time DEFAULT NULL,
  `HORA_FIM` time DEFAULT NULL,
  `HORA_APONTADA` time DEFAULT NULL,
  `HORA_TRABALHADA` time DEFAULT NULL,
  `ID_COLABORADOR` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `COLABORADOR` (`ID_COLABORADOR`)
) ENGINE=MyISAM AUTO_INCREMENT=1045 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `movidesk`
--

INSERT INTO `movidesk` (`ID`, `TICKET`, `CHAMADO`, `DATA_PONTO`, `HORA_INICIO`, `HORA_FIM`, `HORA_APONTADA`, `HORA_TRABALHADA`, `ID_COLABORADOR`) VALUES
(1038, '25436', 'GrÃ¡fico total de compras parceiros pÃ¡gina inicial - base de cÃ¡lculo', '01/08/2019', '08:00:58', '10:00:30', '01:00:32', '01:00:32', 3),
(1039, '25436', 'GrÃ¡fico total de compras parceiros pÃ¡gina inicial - base de cÃ¡lculo', '01/08/2019', '11:00:22', '12:00:00', '00:00:38', '00:00:38', 3),
(1040, '25436', 'GrÃ¡fico total de compras parceiros pÃ¡gina inicial - base de cÃ¡lculo', '01/08/2019', '14:00:20', '15:00:39', '01:00:19', '01:00:19', 3),
(1041, '25436', 'GrÃ¡fico total de compras parceiros pÃ¡gina inicial - base de cÃ¡lculo', '02/08/2019', '09:00:30', '12:00:00', '02:00:30', '02:00:30', 3),
(1042, '25436', 'GrÃ¡fico total de compras parceiros pÃ¡gina inicial - base de cÃ¡lculo', '02/08/2019', '13:00:33', '17:00:00', '03:00:27', '03:00:27', 3),
(1043, '25436', 'GrÃ¡fico total de compras parceiros pÃ¡gina inicial - base de cÃ¡lculo', '02/08/2019', '17:00:02', '17:00:04', '00:00:02', '00:00:02', 3),
(1044, '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tangerino`
--

DROP TABLE IF EXISTS `tangerino`;
CREATE TABLE IF NOT EXISTS `tangerino` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `DATA_PONTO` varchar(10) NOT NULL,
  `HORA_PONTO` varchar(10) NOT NULL,
  `ID_COLABORADOR` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1172 DEFAULT CHARSET=utf8mb4 COMMENT='2019-07-23\r\n18:00:00';

--
-- Extraindo dados da tabela `tangerino`
--

INSERT INTO `tangerino` (`ID`, `DATA_PONTO`, `HORA_PONTO`, `ID_COLABORADOR`) VALUES
(1159, '2019-08-01', '08:00:00', 3),
(1160, '2019-08-01', '12:00:00', 3),
(1161, '2019-08-01', '13:31:00', 3),
(1162, '2019-08-01', '18:19:00', 3),
(1163, '2019-08-02', '07:59:00', 3),
(1164, '2019-08-02', '12:00:00', 3),
(1165, '2019-08-02', '13:30:00', 3),
(1166, '2019-08-02', '18:14:00', 3),
(1167, '2019-08-05', '08:00:00', 3),
(1168, '2019-08-05', '12:01:00', 3),
(1169, '2019-08-05', '13:12:00', 3),
(1170, '2019-08-05', '18:01:00', 3),
(1171, '0000-00-00', '', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
