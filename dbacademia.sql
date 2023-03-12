-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.24-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para dbacademia
CREATE DATABASE IF NOT EXISTS `dbacademia` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `dbacademia`;

-- Copiando estrutura para tabela dbacademia.tbaluno
CREATE TABLE IF NOT EXISTS `tbaluno` (
  `idaluno` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idusu` int(11) unsigned DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `sexo` char(1) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero_casa` int(5) NOT NULL,
  PRIMARY KEY (`idaluno`),
  KEY `fk_usu` (`idusu`),
  CONSTRAINT `fk_usu` FOREIGN KEY (`idusu`) REFERENCES `tbusu` (`idusu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela dbacademia.tbaluno: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dbacademia.tbavaliacao
CREATE TABLE IF NOT EXISTS `tbavaliacao` (
  `idava` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idaluno` int(11) unsigned DEFAULT NULL,
  `ideducador` int(11) unsigned DEFAULT NULL,
  `idgrupo` int(11) unsigned DEFAULT NULL,
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
  KEY `fk_grupo` (`idgrupo`),
  CONSTRAINT `fk_aluno` FOREIGN KEY (`idaluno`) REFERENCES `tbaluno` (`idaluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_educador` FOREIGN KEY (`ideducador`) REFERENCES `tbeducador` (`ideducador`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_grupo` FOREIGN KEY (`idgrupo`) REFERENCES `tbgrupo` (`idgrupo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela dbacademia.tbavaliacao: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dbacademia.tbeducador
CREATE TABLE IF NOT EXISTS `tbeducador` (
  `ideducador` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idusu` int(11) unsigned DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf` varchar(14) NOT NULL,
  PRIMARY KEY (`ideducador`),
  KEY `fk_usu2` (`idusu`),
  CONSTRAINT `fk_usu2` FOREIGN KEY (`idusu`) REFERENCES `tbusu` (`idusu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela dbacademia.tbeducador: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dbacademia.tbexercicio
CREATE TABLE IF NOT EXISTS `tbexercicio` (
  `idexercicio` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idgrupo` int(11) unsigned DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`idexercicio`),
  KEY `fk_grupo2` (`idgrupo`),
  CONSTRAINT `fk_grupo2` FOREIGN KEY (`idgrupo`) REFERENCES `tbgrupo` (`idgrupo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela dbacademia.tbexercicio: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dbacademia.tbficha
CREATE TABLE IF NOT EXISTS `tbficha` (
  `idficha` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idava` int(11) unsigned DEFAULT NULL,
  `datficha` date NOT NULL,
  PRIMARY KEY (`idficha`),
  KEY `fk_ava` (`idava`),
  CONSTRAINT `fk_ava` FOREIGN KEY (`idava`) REFERENCES `tbavaliacao` (`idava`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela dbacademia.tbficha: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dbacademia.tbgrupo
CREATE TABLE IF NOT EXISTS `tbgrupo` (
  `idgrupo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`idgrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela dbacademia.tbgrupo: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dbacademia.tbitem_ficha
CREATE TABLE IF NOT EXISTS `tbitem_ficha` (
  `iditem_ficha` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idficha` int(11) unsigned DEFAULT NULL,
  `idexercicio` int(11) unsigned DEFAULT NULL,
  `serie` int(2) unsigned NOT NULL,
  `repeticoes` int(2) unsigned NOT NULL,
  `tipo_treino` char(1) NOT NULL,
  PRIMARY KEY (`iditem_ficha`),
  KEY `fk_ficha` (`idficha`),
  KEY `fk_exercicio` (`idexercicio`),
  CONSTRAINT `fk_exercicio` FOREIGN KEY (`idexercicio`) REFERENCES `tbexercicio` (`idexercicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ficha` FOREIGN KEY (`idficha`) REFERENCES `tbficha` (`idficha`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela dbacademia.tbitem_ficha: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dbacademia.tbusu
CREATE TABLE IF NOT EXISTS `tbusu` (
  `idusu` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cargo` char(1) NOT NULL DEFAULT 'G' COMMENT 'G = Gerente(admin), A = Aluno, E = Educador Físico',
  PRIMARY KEY (`idusu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela dbacademia.tbusu: ~3 rows (aproximadamente)
INSERT INTO `tbusu` (`idusu`, `email`, `senha`, `cargo`) VALUES
	(1, 'admin@admin.com', '123', 'G'),
	(2, 'aluno@aluno.com', '456', 'A'),
	(3, 'educador@edu.com', '123', 'E');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
