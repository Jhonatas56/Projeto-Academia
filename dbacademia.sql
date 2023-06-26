@ -3,9 +3,9 @@
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Jun-2023 às 06:08
-- Tempo de geração: 12-Jun-2023 às 15:37
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
@ -163,12 +163,7 @@ INSERT INTO `tbexercicio` (`idexercicio`, `idgrupo`, `nome`) VALUES
(42, 9, 'Elevação de Panturrilha em Pé no Smith'),
(43, 9, 'Elevação de Panturrilha no Leg Press'),
(44, 9, 'Elevação de panturrilha com carga em uma perna'),
(45, 9, 'Elevação de Panturrilha Sentado'),
(46, 10, 'Abdominal no Crossover'),
(47, 10, 'Abdominal infra'),
(48, 10, 'Prancha'),
(49, 10, 'Abdominal Crunch'),
(50, 10, 'Abdominal Russso');
(45, 9, 'Elevação de Panturrilha Sentado');

-- --------------------------------------------------------

@ -214,8 +209,7 @@ INSERT INTO `tbgrupo` (`idgrupo`, `descricao`) VALUES
(6, 'Quadríceps'),
(7, 'Posterior de Coxa'),
(8, 'Glúteos'),
(9, 'Panturrilha'),
(10, 'Abdômen');
(9, 'Panturrilha');

-- --------------------------------------------------------

@ -250,6 +244,27 @@ INSERT INTO `tbitem_ficha` (`iditem_ficha`, `idficha`, `idexercicio`, `serie`, `

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtreinodiario`
--

CREATE TABLE `tbtreinodiario` (
  `idtreinodiario` int(11) UNSIGNED NOT NULL,
  `idaluno` int(11) NOT NULL,
  `tipo` char(1) NOT NULL,
  `concluido` char(1) NOT NULL DEFAULT 'N' COMMENT 'N = Não e S= Sim',
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbtreinodiario`
--

INSERT INTO `tbtreinodiario` (`idtreinodiario`, `idaluno`, `tipo`, `concluido`, `data`) VALUES
(1, 3, 'A', 'S', '2023-06-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusu`
--
@ -331,6 +346,12 @@ ALTER TABLE `tbitem_ficha`
  ADD KEY `fk_ficha` (`idficha`),
  ADD KEY `fk_exercicio` (`idexercicio`);

--
-- Índices para tabela `tbtreinodiario`
--
ALTER TABLE `tbtreinodiario`
  ADD PRIMARY KEY (`idtreinodiario`);

--
-- Índices para tabela `tbusu`
--
@ -363,7 +384,7 @@ ALTER TABLE `tbeducador`
-- AUTO_INCREMENT de tabela `tbexercicio`
--
ALTER TABLE `tbexercicio`
  MODIFY `idexercicio` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
  MODIFY `idexercicio` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `tbficha`
@ -383,6 +404,12 @@ ALTER TABLE `tbgrupo`
ALTER TABLE `tbitem_ficha`
  MODIFY `iditem_ficha` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tbtreinodiario`
--
ALTER TABLE `tbtreinodiario`
  MODIFY `idtreinodiario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbusu`
--
