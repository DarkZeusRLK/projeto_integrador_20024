-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Set-2024 às 14:56
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
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `genero ENUM`('Masculino', 'Feminino'),
  `tipo_usuario` varchar(200) NOT NULL DEFAULT 'cliente',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_hoteis`
--

DROP TABLE IF EXISTS `cadastro_hoteis`;
CREATE TABLE IF NOT EXISTS `cadastro_hoteis` (
  `id_hotel` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `valor_diaria` decimal(10,2) NOT NULL,
  `arquivo_caminho` varchar(255) NOT NULL,
  PRIMARY KEY (`id_hotel`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `cadastro_hoteis`
--

INSERT INTO `cadastro_hoteis` (`id_hotel`, `nome`, `descricao`, `valor_diaria`, `arquivo_caminho`) VALUES
(19, 'Hotel Vilhar Palace', 'O melhor hotel de Ivaiporã, com excelentes avaliações e um atendimento impecável, todos os hóspedes já elogiaram o hotel vilhar.', '800.00', 'recebidos/66d8703e88331.jpg');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
