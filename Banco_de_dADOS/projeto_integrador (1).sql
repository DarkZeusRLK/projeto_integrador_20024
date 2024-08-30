-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Jul-2024 às 13:10
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_integrador`
--
CREATE DATABASE IF NOT EXISTS `projeto_integrador` DEFAULT CHARACTER SET utf32 COLLATE utf32_general_ci;
USE `projeto_integrador`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

DROP TABLE IF EXISTS `cadastro`;
CREATE TABLE IF NOT EXISTS `cadastro` (
  `id_usuario` int(200) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id_usuario`, `nome`, `email`, `senha`, `telefone`) VALUES
(1, 'João Pedro ', 'jpfernandes@outlook.com', '12345678', ''),
(2, 'JoÃ£o Pedro', 'jpfernandes@gmail.com', '$2y$10$EMX9Kz4nvxFZU504Hb9B2uf7SwgyWSi6kIMLJ.bI6sdtnLdg4Q8K.', '43996157712'),
(3, 'Matheus', 'zere@gmail.com', '$2y$10$VYmP.jyoCr2tUpEu6aLrp.3UnYpf4jg8fsMc4mE/VMcMVoSgx3M2a', '43996157712'),
(4, 'JoÃ£o Pedro', 'luiz@gmail.com', '$2y$10$86A6e3t2jRX8ivJFYoQKjuzUtUcSemvyk02arnyF5RW9mLKMs/wkC', '43996157712'),
(5, 'JoÃ£o Pedro', 'clever@gmail.com', '$2y$10$mnBGvX.KjIFKJKQehw7xT.gjd9/k4r5M.ABapD7lSlYvNDr/F0N2K', '43996157712'),
(6, 'Cleverson ', 'zere01011@gmail.com', '$2y$10$6kqOtl3Nv3b5XO8DbQuLAuip0IDDpRh5TMsVOstM7JePwvV7ao5QS', '43996157712'),
(7, 'Matheus', 'joaquim@gmail.com', '$2y$10$5M0EF.ZWfElk4S3DRd6SeOBwFq0wLUuExCROEFGUGwkKohP4DgFKe', '43996157712');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
