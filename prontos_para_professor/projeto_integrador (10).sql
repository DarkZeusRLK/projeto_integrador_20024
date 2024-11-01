-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Nov-2024 às 13:36
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
  `arquivo_foto` varchar(300) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id_usuario`, `nome`, `email`, `senha`, `telefone`, `cpf`, `genero`, `tipo_usuario`, `arquivo_foto`) VALUES
(8, 'Matheus1', 'josefino@gmail.com', '$2y$10$Uk1eE6EwJi6LlsGCaIRfBuwkWVI2QwAwdgSFrQLj5lJqe4pBFOkkK', '(43)99433432542352', '123.123.123-12', 'Masculino', 'administrador', '../recebidos/Banner Turismo (2).png'),
(10, 'Dieimes1', 'dieimes@dieimes', '$2y$10$YU6Y2YQR6VDAB0k737m8C.ihVoQtTvKVCMAr8z5XIhdlK3nXjEJ4e', '12351515', '12345678914', 'Masculino', 'administrador', '../Imagens/avatar2.png'),
(11, 'Zere', 'teste@gmail.com', '$2y$10$B3fwmIJGlnNyVrAKC/wwSORL//SAtfz4wGZYz1U5zLpWjQrPfTG4m', '43999745207', '141414341242141', 'Feminino', 'cliente', '../Imagens/avatar2.png'),
(13, 'jose da silva', 'zere01010@gmail.com', '$2y$10$gDDbH6QZjvqg/MepTSxjmu7lOmSCiuYAjbEjO.2WPP2E0CY2FyIzW', '(43) 99433-4325', '235.424.542-52', 'Masculino', 'cliente', '../Imagens/avatar2.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_hoteis`
--

DROP TABLE IF EXISTS `cadastro_hoteis`;
CREATE TABLE IF NOT EXISTS `cadastro_hoteis` (
  `id_hotel` int(200) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `breve_descricao` varchar(300) NOT NULL,
  `descricao` varchar(800) NOT NULL,
  `cidades` varchar(200) NOT NULL,
  `valor_diaria` varchar(200) NOT NULL,
  `arquivo_caminho` varchar(200) NOT NULL,
  `localizacao` varchar(700) NOT NULL,
  PRIMARY KEY (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `cadastro_hoteis`
--

INSERT INTO `cadastro_hoteis` (`id_hotel`, `nome`, `breve_descricao`, `descricao`, `cidades`, `valor_diaria`, `arquivo_caminho`, `localizacao`) VALUES
(29, 'Chale na Terra das Cachoeiras', ' Refugio encantador em Faxinal, o Chale na Terra das Cachoeiras e perfeito para quem busca imersao em paisagens naturais. Oferece proximidade com trilhas e cachoeiras deslumbrantes, ideal para amantes de ecoturismo e aventuras.', 'Alem de sua localizacao estrategica em meio a natureza exuberante, o chale oferece acomodacoes rusticas que garantem uma experiencia de tranquilidade e conforto. Rodeado por vegetacao nativa e cachoeiras de rara beleza, e o destino ideal para casais, familias e aventureiros que desejam vivenciar a mata atlantica de forma unica.', 'Faxinal', '200,00', 'recebidos/66d8760cb5f07.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4334.985694469894!2d-51.22746784713632!3d-23.986102093424357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94eb8d0a17541d33%3A0x516427d36ef91c0e!2sEst%C3%A2ncia%20Cachoeira%20da%20Fonte%20-%20Camping%20e%20Chal%C3%A9!5e0!3m2!1spt-BR!2sbr!4v1729860664101!5m2!1spt-BR!2sbr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(34, 'Copacabana Palace', 'Icone de luxo na orla de Copacabana, o Copacabana Palace oferece hospedagem cinco estrelas com suites amplas, piscina olimpica, spa e restaurantes renomados. O hotel combina requinte e exclusividade.', ' Frequentado por celebridades e personalidades ao longo das decadas, o Copacabana Palace conta com servicos exclusivos que incluem spa de alto padrao, diversas opcoes gastronomicas e espacos de lazer impressionantes. Com sua arquitetura classica e atmosfera refinada, proporciona uma experiencia incomparavel no Rio de Janeiro.', 'Rio de Janeiro', '4150', 'recebidos/66f6ab3d971f8.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3673.5360891865403!2d-43.18152902393158!3d-22.96730614003826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9bd5540e4f928d%3A0xef2e5118ccad88ae!2sCopacabana%20Palace!5e0!3m2!1spt-BR!2sbr!4v1729860780104!5m2!1spt-BR!2sbr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(28, 'Hotel Fazenda Luar de Agosto', 'Com atividades tipicas da vida no campo, o Hotel Fazenda Luar de Agosto e ideal para familias e grupos que buscam tranquilidade. Conta com trilhas, passeios a cavalo e piscina em meio a natureza.', 'Esse hotel fazenda e uma otima opcao para quem busca um ambiente natural, tranquilo e repleto de atividades ao ar livre. Com espacos amplos e verdes, areas de lazer completas e diversos animais tipicos da fazenda, e o destino perfeito para um passeio rural que une descanso e diversao para todas as idades.', 'Faxinal', '400,00', 'recebidos/66d8751cebf16.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3644.3638744726527!2d-51.359065023900804!3d-24.018230378537197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ec75fac928c5b5%3A0x90ae9cc2a2a06e78!2sHotel%20Fazenda%20Luar%20de%20Agosto!5e0!3m2!1spt-BR!2sbr!4v1729860839165!5m2!1spt-BR!2sbr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(25, 'Vilhar Palace Hotel', 'Moderno e acolhedor, o Vilhar Palace Hotel oferece suites confortaveis e espaco para eventos, sendo uma excelente escolha para viagens de negocios ou lazer.', 'O Vilhar Palace destaca-se pelo ambiente contemporaneo e praticidade nas acomodacoes, ideais tanto para descanso quanto para o trabalho. Alem das suites bem decoradas, conta com restaurante, estrutura para eventos e uma equipe atenciosa, garantindo aos hospedes conforto e atendimento de primeira.\r\n\r\n', 'Ivaiporã', '285,00', 'recebidos/66d871cc1be1c.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3637.9713501958827!2d-51.67369512389391!3d-24.242780786981157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ec1585babeb31d%3A0xedf2bb5b85f5a98c!2sVilhar%20Palace%20Hotel!5e0!3m2!1spt-BR!2sbr!4v1729860899444!5m2!1spt-BR!2sbr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(26, 'Hotel do Vale', 'Simples e acessivel, o Hotel do Vale oferece acomodacoes confortaveis e atendimento acolhedor para viajantes em busca de praticidade.', ' Com uma atmosfera familiar, o Hotel do Vale proporciona uma estadia acolhedora para quem esta de passagem ou a trabalho. A equipe, sempre simpatica e prestativa, torna a experiencia tranquila e agradavel, tornando-o uma opcao solida para uma parada conveniente e economica.', 'São João do Ivaí', '150,00', 'recebidos/66d8731a2cece.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3645.0866587829596!2d-51.82644542390167!3d-23.99271677758272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ec5be7c7f32343%3A0x395a0a646c8c8fdf!2sHotel%20do%20Vale!5e0!3m2!1spt-BR!2sbr!4v1729860943572!5m2!1spt-BR!2sbr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(27, 'Braz Hotel e Restaurante', 'O Braz Hotel e Restaurante e conhecido pelo ambiente familiar, com quartos confortaveis e um restaurante que serve pratos tradicionais e da culinaria local.', 'O hotel e ideal para quem busca uma experiencia completa de descanso e gastronomia em um ambiente acolhedor. As acomodacoes sao bem cuidadas, e o restaurante do local e reconhecido pela qualidade, oferecendo sabores autenticos que encantam os hospedes e visitantes.', 'São Pedro do Ivaí', '175,00', 'recebidos/66d874733b479.jpeg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.709116056847!2d-51.86093602390536!3d-23.864460872799064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ecf9c95e7194f3%3A0xc1f8872d8d38eaf9!2sBraz%20Hotel%20e%20Restaurante!5e0!3m2!1spt-BR!2sbr!4v1729860987819!5m2!1spt-BR!2sbr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(30, 'Recanto da Serra', 'Situado em regiao serrana, o Recanto da Serra e ideal para quem busca frescor e tranquilidade. Oferece suites elegantes, spa, areas de lazer e vistas panoramicas.', 'Rodeado pela beleza das montanhas, o Recanto da Serra combina conforto e relaxamento com espacos ao ar livre e vistas deslumbrantes. O ambiente sofisticado e acolhedor permite que casais e familias aproveitem o melhor que a serra tem a oferecer, criando momentos de paz e sossego junto a natureza.', 'Mauá da Serra', '454,00', 'recebidos/66d8774aa686a.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3661265.9187579416!2d-54.718508265065104!3d-26.344141672844945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94eb931330a531b3%3A0x2efebe80efa4b5c8!2sRecanto%20da%20Serra!5e0!3m2!1spt-BR!2sbr!4v1729861046651!5m2!1spt-BR!2sbr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(31, 'Hotel Apucarana Palace', 'O Hotel Apucarana Palace oferece acomodações confortaveis e modernas, bem localizado no centro de Apucarana, ideal para viajantes de negocios e lazer.', 'Suas acomodações são projetadas para proporcionar uma estadia pratica e funcional, com espaco para eventos e servicos que atendem especialmente os viajantes a trabalho. A facilidade de acesso a pontos de interesse da cidade torna-o uma otima opcao para uma estadia conveniente.\r\n\r\n', 'Apucarana', '300,00', 'recebidos/66d877e219efb.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.4922720794534!2d-51.45960952391472!3d-23.550757161204128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ec996666c2537b%3A0xe24d200be9649fca!2sHotel%20Apucarana%20Palace!5e0!3m2!1spt-BR!2sbr!4v1729861088645!5m2!1spt-BR!2sbr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(32, 'Hotel Fazenda Ãgua Azul', 'Hotel fazenda com lagoas e atividades rurais, o Agua Azul proporciona lazer para toda a familia, com acomodacoes rusticas e opcoes de passeios ao ar livre.', 'Com ampla area verde e atmosfera tranquila, o Hotel Fazenda Agua Azul oferece uma experiencia autentica de vida no campo. As acomodacoes sao confortaveis e o local e perfeito para atividades em familia, garantindo momentos de desconexao e proximidade com a natureza.', 'São do Pedro do Ivaí', '485,00', 'recebidos/66d878a76c390.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3646.9997742422797!2d-52.1132909239035!3d-23.925062075056083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ed06b4119654a5%3A0x8cb35ecbf0802ea4!2sHotel%20Fazenda%20%C3%81gua%20Azul!5e0!3m2!1spt-BR!2sbr!4v1729861132923!5m2!1spt-BR!2sbr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(33, 'Hotel Pires', 'Bem localizado, o Hotel Pires e conhecido pela qualidade no atendimento e conforto de suas instalacoes, ideal para viagens de negocios ou lazer.', 'O hotel conta com instalacoes modernas e funcionais, oferecendo excelente relacao custo-beneficio. Com quartos confortaveis e uma equipe dedicada, proporciona uma estadia conveniente e tranquila, atendendo desde viajantes a trabalho ate turistas que buscam comodidade', 'Faxinal', '200,00', 'recebidos/66d879dfc4ebf.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3644.930296592842!2d-51.32841482390155!3d-23.998238377789196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94eb898b2a8392b5%3A0xa7916d9731ff82a2!2sHotel%20Pires!5e0!3m2!1spt-BR!2sbr!4v1729861256755!5m2!1spt-BR!2sbr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(35, 'Grand Hyatt', ' Resort urbano na Barra da Tijuca, o Grand Hyatt Rio oferece suites de luxo, spa completo, piscinas e opcoes gastronomicas refinadas, ideal para uma estadia sofisticada.', ' Com vistas para a Praia da Barra, o hotel combina sofisticação e conforto com a energia do Rio de Janeiro. Conta com espacos de lazer amplos e privativos, proporcionando aos hospedes um ambiente tranquilo, repleto de comodidades e rodeado pela natureza exuberante da regiao.', 'Rio de Janeiro', '1.120,00', 'recebidos/66f6ac925c7ef.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.369221273726!2d-43.37457372393041!3d-23.010211741576917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9bdb71850ae80d%3A0xd28011cb74ca578e!2sGrand%20Hyatt%20Rio%20de%20Janeiro!5e0!3m2!1spt-BR!2sbr!4v1729861311482!5m2!1spt-BR!2sbr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(36, 'Wyndham Rio Barra', 'Na Barra da Tijuca, o Wyndham Rio Barra combina conforto e estilo com vistas para o mar, piscina e academia, ideal para familias e viajantes a negocios.', 'Este hotel moderno oferece diversas opcoes de lazer e um ambiente acolhedor que proporciona uma estadia completa, seja para trabalho ou descanso. Proximo a diversos pontos turisticos e facilidades, e uma escolha bem localizada para explorar o Rio com conforto e praticidade.', 'Rio de Janeiro', '450,00', 'recebidos/66f6abeba104b.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.3523227770825!2d-43.329536423930435!3d-23.01083254159928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9bd09f07c30ff7%3A0xa4b860733fa16434!2sWyndham%20Rio%20Barra!5e0!3m2!1spt-BR!2sbr!4v1729861359858!5m2!1spt-BR!2sbr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `hoteis_gramado`
--

INSERT INTO `hoteis_gramado` (`id_hotel`, `nome`, `valor_diaria`, `descricao`, `arquivo_caminho`) VALUES
(2, 'Matheus12', 'R$ 1.200,00 a DiÃ¡ria', 'Uma elegante bebida destilada para degustacao.', 'recebidos/67090b520696b.png'),
(3, 'Matheus12', 'R$ 1.200,00 a DiÃ¡ria', 'Uma elegante bebida destilada para degustacao.', 'recebidos/67090b60efcc1.png'),
(4, 'Matheus12', 'R$ 1.200,00 a DiÃ¡ria', 'Uma elegante bebida destilada para degustacao.', 'recebidos/67090b77b8974.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hoteis_rj`
--

DROP TABLE IF EXISTS `hoteis_rj`;
CREATE TABLE IF NOT EXISTS `hoteis_rj` (
  `id_hotel` int(200) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `valor_diaria` varchar(200) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `arquivo_caminho` varchar(200) NOT NULL,
  PRIMARY KEY (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `hoteis_rj`
--

INSERT INTO `hoteis_rj` (`id_hotel`, `nome`, `valor_diaria`, `descricao`, `arquivo_caminho`) VALUES
(4, 'Copacabana Palace', '4.150,00', 'O Copacabana Palace Ã© um dos hotÃ©is mais icÃ´nicos do Brasil, localizado na famosa Praia de Copacabana, no Rio de Janeiro. Inaugurado em 1923.', 'recebidos/66f6ab3d971f8.jpg'),
(5, 'Wyndham Rio Barra', '450,00', 'O Wyndham Barra Ã© um hotel moderno localizado na Barra da Tijuca, uma das zonas mais conhecidas do Rio de Janeiro. Inaugurado em 2016.', 'recebidos/66f6abeba104b.jpg'),
(6, 'Grand Hyatt', '1.120,00', 'Com piscina ao ar livre e spa, o Grand Hyatt Rio de Janeiro estÃ¡ localizado no centro da Barra da Tijuca, entre o mar, a lagoa e as montanhas, do outro lado da rua da Praia da Reserva.', 'recebidos/66f6ac925c7ef.jpg'),
(7, 'Laghetto Stilo Barra', '470,00', 'Com uma piscina ao ar livre aberta o ano inteiro, uma academia e um business center, o Laghetto Stilo Barra Ã© um hotel Ã  beira-mar localizado na Barra da Tijuca, no Rio de Janeiro.', 'recebidos/66f6ad337c7c0.png'),
(8, 'Windsor Marapendi', '580,00', 'O Windsor Marapendi Hotel oferece acomodaÃ§Ãµes no animado bairro da Barra da Tijuca, no Rio de Janeiro. Este hotel 5 estrelas dispÃµe de localizaÃ§Ã£o ideal Ã  beira-mar.', 'recebidos/66f6ada7d893b.jpg'),
(9, 'Hotel Fazenda Santa Barbara', '350,00', 'Localizado no municÃ­pio Engenheiro Paulo de Frontin, no estado do Rio de Janeiro, a menos de 100km da capital estÃ¡ o Hotel Fazenda Santa BÃ¡rbara.', 'recebidos/66f6aec507a16.jpg'),
(10, 'Hotel Shangrila', 'R$ 490,00', 'O Hotel ShangrilÃ¡ estÃ¡ localizado em Nova Friburgo, uma das Ã¡reas mais bonitas da RegiÃ£o Serrana do Estado do Rio de Janeiro e do Brasil.', 'recebidos/66f6b09112c24.jpg'),
(11, 'Hotel Vila Verde', 'R$ 818,00', ' O Hotel Vila Verde, em Nova Friburgo, Ã© um refÃºgio na natureza, com acomodaÃ§Ãµes confortÃ¡veis, piscina e restaurante. Ideal para relaxar na serra.', 'recebidos/66f6b15928fd3.jpg'),
(14, 'Hotel Bucsky', 'R$ 265,00', ' O Hotel Nativa BÃºzios oferece conforto prÃ³ximo Ã s praias, com piscina e cafÃ© da manhÃ£, ideal para relaxar.', 'recebidos/66f6b43608a64.jpg'),
(15, 'La ChimÃ¨re', 'R$ 523,00', ' O La ChimÃ¨re Ã© um hotel encantador prÃ³ximo Ã  praia, com acomodaÃ§Ãµes confortÃ¡veis e piscina, ideal para relaxar.', 'recebidos/66f6b4db7c920.jpg'),
(13, 'A Concept Hotel & Spa', 'R$ 2.688,00', 'Um refÃºgio de luxo e sofisticaÃ§Ã£o, ideal para quem busca exclusividade Ã  beira-mar.', 'recebidos/66f6b2efb851b.jpg'),
(16, 'Abracadabra Pousada', 'R$ 1.230,00 ', ' A  Abracadabra Pousada, em BÃºzios, oferece um ambiente acolhedor, com quartos confortÃ¡veis e piscina, ideal para relaxar perto das praias.', 'recebidos/66f6b5a17699b.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem_contato`
--

DROP TABLE IF EXISTS `mensagem_contato`;
CREATE TABLE IF NOT EXISTS `mensagem_contato` (
  `id_mensagem` int(200) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mensagem` varchar(200) NOT NULL,
  PRIMARY KEY (`id_mensagem`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `mensagem_contato`
--

INSERT INTO `mensagem_contato` (`id_mensagem`, `nome`, `email`, `mensagem`) VALUES
(37, 'Luiz', 'matzere@gmail.com', '3132312321'),
(36, 'DIRSEL123', 'dirsel@gmail', 'TESTE 18/10/24'),
(35, 'DIRSEL123', 'dirsel@gmail', 'TESTE 18/10/24'),
(34, 'Dieimes', 'jp@gmail.com', 'Teste 10/10/2024'),
(33, 'Joaquim', 'zeres@gmail.com', 'Mensagem teste 123'),
(32, 'adadada', 'zeres@gmail.com', '07/10/2024'),
(31, 'Dieimes', 'zere@gmail.com', '1313'),
(30, 'adadada', '12@gmail.com', '13131'),
(29, 'adadada', '12@gmail.com', '13131'),
(28, 'Dieimes', 'zere@gmail.com', '12341'),
(27, 'Dieimes', 'zere@gmail.com', 'Dieimes, mensagem Teste.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacotes_viagens`
--

DROP TABLE IF EXISTS `pacotes_viagens`;
CREATE TABLE IF NOT EXISTS `pacotes_viagens` (
  `id_pacote` int(200) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `valor` varchar(200) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `foto_pacote` varchar(300) NOT NULL,
  PRIMARY KEY (`id_pacote`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `pacotes_viagens`
--

INSERT INTO `pacotes_viagens` (`id_pacote`, `nome`, `valor`, `descricao`, `foto_pacote`) VALUES
(1, 'Pacote Aventura e Magia - Hopi Hari + Hospedagem em Campinas (SP)', 'R$ 1.200,00 a R$ 2.000,00 por pessoa', 'Explore o universo magico do Hopi Hari com seus brinquedos emocionantes, como montanhas-russas, simuladores e shows teatrais. Ideal para quem busca aventura e entretenimento! O pacote tambem oferece hospedagem em Campinas.\r\n\r\n', '../recebidos/1.png'),
(2, 'Pacote Diversao Total - Beto Carrero World + Hospedagem em Penha (SC)\r\n', 'R$ 1.500,00 a R$ 2.500,00 por pessoa', 'Viva momentos inesqueciveis no maior parque tematico da America Latina, o Beto Carrero World! Aproveite as emocionantes montanhas-russas, shows tematicos e areas interativas para todas as idades. O pacote inclui hospedagem em Penha.', '../recebidos/2.png'),
(3, 'Pacote Fantasia em Familia - Beach Park + Hospedagem em Fortaleza (CE)\r\n', 'R$ 2.000,00 a R$ 3.500,00 por pessoa', 'Mergulhe na diversao do Beach Park, um dos maiores parques aquaticos do Brasil, com toboaguas radicais, rios tranquilos e areas infantis. Perfeito para curtir em familia! O pacote inclui hospedagem em Fortaleza.\r\n\r\n', '../recebidos/3.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `senha_reset`
--

DROP TABLE IF EXISTS `senha_reset`;
CREATE TABLE IF NOT EXISTS `senha_reset` (
  `id_token` int(11) NOT NULL AUTO_INCREMENT,
  `email` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  PRIMARY KEY (`id_token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
