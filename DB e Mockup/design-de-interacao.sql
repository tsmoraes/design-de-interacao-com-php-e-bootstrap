-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 01-Out-2018 às 06:53
-- Versão do servidor: 5.7.23
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `design-de-interacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` char(14) NOT NULL,
  `rg` char(10) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `estado` char(2) NOT NULL,
  `funcao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `rg`, `endereco`, `estado`, `funcao`) VALUES
(3, 'Juca Armstron', '568.034.286-30', '389773645', 'Rua Major José Barbosa - Limoeiro de Anadia', 'AL', 'Administrador'),
(4, 'Joana Almeida', '504.324.007-53', '468238992', 'Rua Quino 301 - Centro - Pacaraima', 'RO', 'Vendedora'),
(5, 'Cleberson Lins', '397.703.703-04', '438133018', 'Avenida Gentil Bittencourt - Belém', 'PA', 'Operador de Caixa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gerentes`
--

CREATE TABLE `gerentes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` char(14) NOT NULL,
  `rg` char(10) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `estado` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `gerentes`
--

INSERT INTO `gerentes` (`id`, `nome`, `cpf`, `rg`, `endereco`, `estado`) VALUES
(2, 'Laiz Matos Ribeiro', '232.801.038-51', '271117813', 'Florianópolis', 'SC'),
(3, 'Letícia da Silva', '058.146.538-50', '337310026', 'Plácido de Castro', 'AC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gerentes`
--
ALTER TABLE `gerentes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gerentes`
--
ALTER TABLE `gerentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
