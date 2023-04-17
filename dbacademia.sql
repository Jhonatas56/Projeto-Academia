-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Mar-2023 às 17:05
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbacademia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbaluno`
--

CREATE TABLE IF NOT EXISTS `tbaluno` (
  `idaluno` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idusu` int(11) UNSIGNED DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `sexo` char(1) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero_casa` int(5) NOT NULL,
  PRIMARY KEY (`idaluno`),
  KEY `fk_usu` (`idusu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbavaliacao`
--

CREATE TABLE IF NOT EXISTS `tbavaliacao` (
  `idava` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idaluno` int(11) UNSIGNED DEFAULT NULL,
  `ideducador` int(11) UNSIGNED DEFAULT NULL,
  `idgrupo` int(11) UNSIGNED DEFAULT NULL,
  `datava` date NOT NULL,
  `horaava` time NOT NULL,
  `med_braco` int(3) NOT NULL,
  `med_antebraco` int(3) NOT NULL,
  `med_coxa` int(3) NOT NULL,
  `med_panturrilha` int(3) NOT NULL,
  `objetivo` varchar(30) NOT NULL,
  PRIMARY KEY (`idava`),
  KEY `fk_aluno` (`idaluno`),
  KEY `fk_educador` (`ideducador`),
  KEY `fk_grupo` (`idgrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbeducador`
--

CREATE TABLE IF NOT EXISTS `tbeducador` (
  `ideducador` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idusu` int(11) UNSIGNED DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf` varchar(14) NOT NULL,
  PRIMARY KEY (`ideducador`),
  KEY `fk_usu2` (`idusu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbexercicio`
--

CREATE TABLE IF NOT EXISTS `tbexercicio` (
  `idexercicio` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idgrupo` int(11) UNSIGNED DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`idexercicio`),
  KEY `fk_grupo2` (`idgrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbficha`
--

CREATE TABLE IF NOT EXISTS `tbficha` (
  `idficha` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idava` int(11) UNSIGNED DEFAULT NULL,
  `datficha` date NOT NULL,
  PRIMARY KEY (`idficha`),
  KEY `fk_ava` (`idava`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbgrupo`
--

CREATE TABLE IF NOT EXISTS `tbgrupo` (
  `idgrupo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`idgrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbitem_ficha`
--

CREATE TABLE IF NOT EXISTS `tbitem_ficha` (
  `iditem_ficha` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idficha` int(11) UNSIGNED DEFAULT NULL,
  `idexercicio` int(11) UNSIGNED DEFAULT NULL,
  `serie` int(2) UNSIGNED NOT NULL,
  `repeticoes` int(2) UNSIGNED NOT NULL,
  `tipo_treino` char(1) NOT NULL,
  PRIMARY KEY (`iditem_ficha`),
  KEY `fk_ficha` (`idficha`),
  KEY `fk_exercicio` (`idexercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusu`
--

CREATE TABLE IF NOT EXISTS `tbusu` (
  `idusu` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cargo` varchar(15) NOT NULL,
  PRIMARY KEY (`idusu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbaluno`
--
ALTER TABLE `tbaluno`
  ADD CONSTRAINT `fk_usu` FOREIGN KEY (`idusu`) REFERENCES `tbusu` (`idusu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD CONSTRAINT `fk_aluno` FOREIGN KEY (`idaluno`) REFERENCES `tbaluno` (`idaluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_educador` FOREIGN KEY (`ideducador`) REFERENCES `tbeducador` (`ideducador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_grupo` FOREIGN KEY (`idgrupo`) REFERENCES `tbgrupo` (`idgrupo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbeducador`
--
ALTER TABLE `tbeducador`
  ADD CONSTRAINT `fk_usu2` FOREIGN KEY (`idusu`) REFERENCES `tbusu` (`idusu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbexercicio`
--
ALTER TABLE `tbexercicio`
  ADD CONSTRAINT `fk_grupo2` FOREIGN KEY (`idgrupo`) REFERENCES `tbgrupo` (`idgrupo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbficha`
--
ALTER TABLE `tbficha`
  ADD CONSTRAINT `fk_ava` FOREIGN KEY (`idava`) REFERENCES `tbavaliacao` (`idava`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbitem_ficha`
--
ALTER TABLE `tbitem_ficha`
  ADD CONSTRAINT `fk_exercicio` FOREIGN KEY (`idexercicio`) REFERENCES `tbexercicio` (`idexercicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ficha` FOREIGN KEY (`idficha`) REFERENCES `tbficha` (`idficha`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
