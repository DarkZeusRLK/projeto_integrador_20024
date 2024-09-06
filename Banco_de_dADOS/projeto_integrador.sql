-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06-Set-2024 às 14:55
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
  `cpf` varchar(200) NOT NULL,
  `genero` varchar(200) NOT NULL,
  `tipo_usuario` varchar(200) NOT NULL,
  `arquivo_foto` varchar(200) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id_usuario`, `nome`, `email`, `senha`, `telefone`, `cpf`, `genero`, `tipo_usuario`, `arquivo_foto`) VALUES
(8, 'Matheus', 'josefino@gmail.com', '$2y$10$Uk1eE6EwJi6LlsGCaIRfBuwkWVI2QwAwdgSFrQLj5lJqe4pBFOkkK', '(43)99433432542352', '123.123.123-12', 'Masculino', 'administrador', 'Imagens/foto_padrao.png'),
(9, 'Matheus', 'zeres@gmail.com', '$2y$10$2tM8cxPmTW79Z3ObuGIRUO99p.V74cBJmIJILTd9zR2ZS38PNPh.6', '(43)99433432542352', '123.123.123-12', 'Feminino', 'cliente', 'Imagens/a733d129bf370f5085507c89b6f3272c.gif'),
(10, 'Dieimes', 'dieimes@dieimes', '$2y$10$YU6Y2YQR6VDAB0k737m8C.ihVoQtTvKVCMAr8z5XIhdlK3nXjEJ4e', '12351515', '12345678914', 'Masculino', 'administrador', 'Imagens/foto_padrao.png');

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `cadastro_hoteis`
--

INSERT INTO `cadastro_hoteis` (`id_hotel`, `nome`, `descricao`, `valor_diaria`, `arquivo_caminho`) VALUES
(19, 'Hotel Vilhar Palace', 'O melhor hotel de IvaiporÃ£, com excelentes avaliaÃ§oes e um atendimento impecÃ¡vel, todos os hospÃ©des jÃ¡ elogiaram o hotel vilhar.', 'R$ 800.00', 'recebidos/66d8703e88331.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
