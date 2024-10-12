-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11-Out-2024 às 12:11
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
-- Estrutura da tabela `hoteis_gramado`
--

DROP TABLE IF EXISTS `hoteis_gramado`;
CREATE TABLE IF NOT EXISTS `hoteis_gramado` (
  `id_hotel` int(200) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `valor_diaria` varchar(200) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `arquivo_caminho` varchar(200) NOT NULL,
  PRIMARY KEY (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `hoteis_gramado`
--

INSERT INTO `hoteis_gramado` (`id_hotel`, `nome`, `valor_diaria`, `descricao`, `arquivo_caminho`) VALUES
(2, 'Matheus12', 'R$ 1.200,00 a DiÃ¡ria', 'Uma elegante bebida destilada para degustacao.', 'recebidos/67090b520696b.png'),
(3, 'Matheus12', 'R$ 1.200,00 a DiÃ¡ria', 'Uma elegante bebida destilada para degustacao.', 'recebidos/67090b60efcc1.png'),
(4, 'Matheus12', 'R$ 1.200,00 a DiÃ¡ria', 'Uma elegante bebida destilada para degustacao.', 'recebidos/67090b77b8974.png'),
(5, ' Hotel Colline de France', 'R$ 2.897,00', 'O Hotel Colline de France Ã© referÃªncia em charme e conforto, com atendimento personalizado inspirado na delicadeza e elegÃ¢ncia francesa.\r\n\r\n', 'recebidos/67090cfba6a5f.jpg'),
(6, 'Hotel Cabanas Tio Muller', '524,00', 'O Hotel Cabanas Tio Muller estÃ¡ localizado em uma Ã¡rea nobre na cidade de Gramado, Nosso atendimento lhe proporcionarÃ¡ momentos inesquecÃ­veis para vocÃª.\r\n', 'recebidos/67090e4925f90.jpg'),
(7, ' Hotel Cercano', '608,00', 'Aconchego, qualidade e localizaÃ§Ã£o Ã  seu dispor. O Hotel Cercano estabeleceu uma nova e diferenciada proposta na hotelaria da regiÃ£o de Gramado.\r\n\r\n\r\n', 'recebidos/67090ebcacc79.jpg'),
(8, 'Hotel Sky', '297,00', 'O Hotel Sky proporciona aos hÃ³spedes, momentos de satisfaÃ§Ã£o, tanto no tratamento pessoal, quanto nas acomodaÃ§Ãµes que completam a estrutura do hotel. ', 'recebidos/67090f6254471.jpg'),
(9, 'Hotel Laghetto Gramado', '265,00', 'O hotel possui ampla Ã¡rea de lazer para vocÃª aproveitar o melhor que Gramado tem a oferecer. Para sua seguranÃ§a, temos estacionamento para seu veÃ­culo.', 'recebidos/67091030d447a.jpg'),
(10, 'Hotel Fioreze Centro', '427,00', 'O Hotel Fioreze Centro Ã© uma excelente opÃ§Ã£o para pessoas que visitam Gramado, oferecendo vÃ¡rias comodidades que vÃ£o tornar a sua estadia mais especial.\r\n\r\n', 'recebidos/6709109061e0d.jpg'),
(11, 'Wish Serrano Resort', '292,00', 'O Wish Serrano Resort em Gramado oferece acomodaÃ§Ãµes elegantes, piscinas, spa, e restaurantes. Ideal para quem busca conforto e lazer na Serra GaÃºcha.', 'recebidos/6709117f22ad0.jpg'),
(12, 'Micheline Hotel Tricot', '650,00', 'O Micheline Hotel Tricot Ã© um espaÃ§o Ãºnico no centro de Gramado. Aqui, cada detalhe foi pensado com muito carinho para que vocÃª seja bem recebido. ', 'recebidos/670912db00d25.jpg'),
(13, 'Hotel das HortÃªnsias', '265,00', 'O Hotel das HortÃªnsias Ã© um dos mais tradicionais da Serra GaÃºcha e sempre fez questÃ£o de manter sua autenticidade e o conforto de um verdadeiro hotel de montanha.', 'recebidos/670913668ee2d.jpg'),
(14, 'Hotel Casa da Montanha', '859,00', 'ReÃºne os privilÃ©gios de um grande hotel com o aconchego das melhores pousadas espalhadas pelo mundo. Ambientes  acolhedores para vocÃª se sentir em casa.', 'recebidos/6709140182fe4.jpg'),
(15, 'Hotel Monte Felice', '381,00', 'O Monte Felice Hotel oferece aos hÃ³spedes comodidades nos quartos, como minibar e ar-condicionado. AlÃ©m disso, acessar internet Ã© possÃ­vel com o wi-fi gratuito disponÃ­vel.', 'recebidos/670914cdd1833.jpg'),
(16, 'Hotel Valle Dâ€™Incanto', '245,00', 'O Hotel Valle Dâ€™Incanto em Gramado oferece charme e atendimento personalizado, com ambientes romÃ¢nticos e confortÃ¡veis, ideal para uma estadia especial na Serra GaÃºcha.', 'recebidos/670915ad13c1e.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
