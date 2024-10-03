-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03-Out-2024 às 13:19
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `hoteis_aracaju`
--

DROP TABLE IF EXISTS `hoteis_aracaju`;
CREATE TABLE IF NOT EXISTS `hoteis_aracaju` (
  `id_hotel` int(200) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `valor_diaria` varchar(200) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `arquivo_caminho` varchar(200) NOT NULL,
  PRIMARY KEY (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `hoteis_aracaju`
--

INSERT INTO `hoteis_aracaju` (`id_hotel`, `nome`, `valor_diaria`, `descricao`, `arquivo_caminho`) VALUES
(1, 'Hotel Sesc Atalaia', 'R$ 290,00', 'Situado em uma das belas cidades do Sergipe, o Hotel Sesc Atalaia proporciona para vocÃª e sua famÃ­lia uma estrutura com todo o conforto e praticidade.\r\n', 'recebidos/66fe78a189046.jpg'),
(3, 'VIDAM Hotel Aracaju', 'R$ 1081,00', 'O Vidam Hotel Aracaju Ã© um dos principais hotÃ©is de luxo da regiÃ£o, localizado em frente Ã  praia de Atalaia a apenas 5 minutos do Aeroporto de Aracaju.\r\n', 'recebidos/66fe7adbdb0d4.jpg'),
(4, 'Real Classic Hotel', 'R$ 906,00', 'O Real Classic Hotel possui 136 aptos equipados com o melhor para te atender, dentre eles sÃ£o suÃ­tes executivas, suÃ­tes master e com vista para o mar.', 'recebidos/66fe7c24075d8.jpg'),
(5, 'Quality Hotel Aracaju', 'R$ 800,00', 'O Quality Hotel Aracaju Ã© um hotel que oferece TV de tela plana, minibar, ar-condicionado nos quartos e wi-fi gratuito para os hÃ³spedes usarem a nossa internet.', 'recebidos/66fe92b3225b3.jpg'),
(6, 'Celi Hotel', 'R$ 1139,00', 'O Celi Hotel apresenta design contemporÃ¢neo e elegante, com mÃ³veis sustentÃ¡veis de grifes nacionais. Descubra um destino verdadeiramente Ãºnico em Sergipe.', 'recebidos/66fe93fbc7d96.jpg'),
(7, 'NB Hoteis', 'R$ 380,00', 'O NB Hoteis fica no agradÃ¡vel bairro Jardins, e Ã© um empreendimento moderno e com arquitetura arrojada. Oferecendo conforto e com um excelente custo benefÃ­cio.', 'recebidos/66fe9466ed406.jpg'),
(8, 'AruanÃ£ Eco Praia Hotel', 'R$ 1140,00', 'O AruanÃ£ Eco Praia Hotel oferece piscina com Bar molhado, redÃ¡rio, Ã¡rea zen, academia, brinquedoteca, salÃ£o de jogos, restaurante carte e room service. ', 'recebidos/66fe950a71134.jpg'),
(9, 'Go Inn Aracaju', 'R$ 370,00', 'O Go Inn Aracaju oferece piscina e cafÃ© da manhÃ£, o que garante momentos de relaxamento em um dia agitado. Para hÃ³spedes com carros, hÃ¡ estacionamento grÃ¡tis.', 'recebidos/66fe955c6ae42.jpg'),
(10, 'Del Mar Hotel', 'R$ 1060,00', 'Del Mar Hotel Ã© sua melhor opÃ§Ã£o de hospedagem em Aracaju, grande estrutura de lazer, piscina adulta com cascata e bar molhado, piscina infantil, mata  e quadra.', 'recebidos/66fe95f9e7cf7.jpg'),
(11, 'Aquarios Praia Hotel', 'R$ 724,00', 'O AquÃ¡rios Praia Hotel Ã© uma Ã³tima opÃ§Ã£o para pessoas que visitam Aracaju. Tem um ambiente familiar, alÃ©m de vÃ¡rias comodidades para enriquecer a sua estadia.', 'recebidos/66fe9674046b4.jpg'),
(12, 'Real Praia Hotel', 'R$ 195,00', 'O Real Praia Hotel apresenta um Ã³timo preÃ§o, conforto e conveniÃªncia, com um, ambiente familiar com vÃ¡rias comodidades projetadas para viajantes como vocÃª.', 'recebidos/66fe97357c8f9.jpg'),
(13, 'Ibis Budget Aracaju', 'R$ 294,00', 'O Ibis Budget Aracaju oferece TV de tela plana e ar-condicionado, wi-fi gratuito aos hÃ³spedes e cafÃ© da manhÃ£, que garante uma boa pausa antes de um dia agitado.', 'recebidos/66fe98360eece.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
