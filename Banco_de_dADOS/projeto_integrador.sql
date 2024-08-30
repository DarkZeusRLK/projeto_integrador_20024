-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Ago-2024 às 13:32
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_hoteis`
--

DROP TABLE IF EXISTS `cadastro_hoteis`;
CREATE TABLE IF NOT EXISTS `cadastro_hoteis` (
  `id_hotel` int(200) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `valor_diaria` varchar(200) NOT NULL,
  `arquivo_caminho` varchar(200) NOT NULL,
  PRIMARY KEY (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `cadastro_hoteis`
--

INSERT INTO `cadastro_hoteis` (`id_hotel`, `nome`, `descricao`, `valor_diaria`, `arquivo_caminho`) VALUES
(10, 'Hotel Foz do IguaÃ§u', 'Um hotel avaliado em 5 estrelas, pelos melhores crÃ­ticos do estado.', 'R$ 1.200,00 a diÃ¡ria', 'recebidos/66b6315f9b656.jpg'),
(11, 'Hotel Foz do IguaÃ§u', 'Um hotel avaliado em 5 estrelas, pelos melhores crÃ­ticos do estado.', 'R$ 1.200,00 a diÃ¡ria', 'recebidos/66b631f7410ad.jpg'),
(12, 'Matheus', 'Um hotel avaliado em 5 estrelas, pelos melhores crÃ­ticos do estado.', 'R$ 1.230,00 a DiÃ¡ria', 'recebidos/66bddb7cb6fae.png'),
(13, 'jose da silva', 'O elegante conhaque frances esta na nossa loja.', 'R$ 1.200,00 a DiÃ¡ria', 'recebidos/66bddc2d2409d.png'),
(14, 'matheus zanoni bittencourt de oliveira', 'Um hotel avaliado em 5 estrelas, pelos melhores crÃ­ticos do estado.', 'R$ 1.200,00 a DiÃ¡ria', 'recebidos/66bddc4de3279.jpg'),
(15, 'matheus zanoni bittencourt de oliveira', 'Um hotel avaliado em 5 estrelas, pelos melhores crÃ­ticos do estado.', 'R$ 1.200,00 a DiÃ¡ria', 'recebidos/66bdddbeaf63c.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
