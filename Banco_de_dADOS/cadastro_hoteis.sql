-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20-Set-2024 às 14:19
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
-- Estrutura da tabela `cadastro_hoteis`
--

DROP TABLE IF EXISTS `cadastro_hoteis`;
CREATE TABLE IF NOT EXISTS `cadastro_hoteis` (
  `id_hotel` int(200) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `cidades` varchar(200) NOT NULL,
  `valor_diaria` varchar(200) NOT NULL,
  `arquivo_caminho` varchar(200) NOT NULL,
  PRIMARY KEY (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `cadastro_hoteis`
--

INSERT INTO `cadastro_hoteis` (`id_hotel`, `nome`, `descricao`, `cidades`, `valor_diaria`, `arquivo_caminho`) VALUES
(29, 'ChalÃ©s RÃºsticos e RomÃ¢nticos - Na terra das Cachoeiras - Chalet', 'ChalÃ©s RÃºticos situados em Faxinal, na terra das cachoeiras.', 'Faxinal', '200,00', 'recebidos/66d8760cb5f07.jpg'),
(28, 'Hotel Fazenda Luar de Agosto', 'Situado em uma fazenda cercada pelas montanhas, florestas e cachoeiras do Vale do IvaÃ­, este resort descontraÃ­do estÃ¡ a 5 km do centro da cidade e a 7 km da rodovia PRC-272.', 'Faxinal', '400,00', 'recebidos/66d8751cebf16.jpg'),
(25, 'Vilhar Palace Hotel', 'Hotel casual com quartos e suites simples, alem de cafe da manha incluso.', 'Ivaiporã', '285,00', 'recebidos/66d871cc1be1c.jpg'),
(26, 'Hotel do Vale', 'Um hotel aconchegante para toda familia, temos Ã³timos serviÃ§os e quartos e os melhores preÃ§os.', 'São João do Ivaí', '150,00', 'recebidos/66d8731a2cece.jpg'),
(27, 'Braz Hotel e Restaurante', 'O hotel oferece medidas de saÃºde e seguranÃ§a. Para mais detalhes, entre em contato com o hotel.', 'São Pedro do Ivaí', '175,00', 'recebidos/66d874733b479.jpeg'),
(30, 'Recanto da Serra', 'Dispondo de banheira de hidromassagem, o RECANTO DA SERRA estÃ¡ localizado em MauÃ¡ da Serra.', 'Mauá da Serra', '454,00', 'recebidos/66d8774aa686a.jpg'),
(31, 'Hotel Apucarana Palace', 'Procurando por um Hotel em Apucarana, o Apucarana Palace Ã© a sua melhor opÃ§Ã£o em conforto com valor acessÃ­vel, bem no coraÃ§Ã£o da cidade.', 'Apucarana', '300,00', 'recebidos/66d877e219efb.jpg'),
(32, 'Hotel Fazenda Ãgua Azul', 'Hotel Fazenda rodeado por 280 hectares de mata nativa, rico em fauna e flora, permitindo o verdadeiro contato com a natureza exuberante da regiÃ£o.', 'São do Pedro do Ivaí', '485,00', 'recebidos/66d878a76c390.jpg'),
(33, 'Hotel Pires', 'Um Ã³timo hotel para quem vai ficar em Faxinal, fica localizado bem no centro da cidade, com estacionamento prÃ³prio e bons quartos. ', 'Faxinal', '200,00', 'recebidos/66d879dfc4ebf.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
