-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Dez-2019 às 15:37
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cademeumarido`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dispositivo`
--

CREATE TABLE `dispositivo` (
  `id` int(11) NOT NULL,
  `nomeDisp` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tipoDisp` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nSerieDisp` varchar(255) CHARACTER SET latin1 NOT NULL,
  `usuario` int(11) NOT NULL,
  `descricaoDisp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dispositivo`
--

INSERT INTO `dispositivo` (`id`, `nomeDisp`, `tipoDisp`, `nSerieDisp`, `usuario`, `descricaoDisp`) VALUES
(20, 'Dispositivo de Rastreamento', 'Celular', '13243141343113', 40, 'Meu Telefone');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loc`
--

CREATE TABLE `loc` (
  `id_loc` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `id_disp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `loc`
--

INSERT INTO `loc` (`id_loc`, `latitude`, `longitude`, `id_disp`) VALUES
(22, -22.816274, -42.993362, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `nivel` int(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `telefone` int(16) NOT NULL,
  `login` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `nivel`, `created`, `telefone`, `login`) VALUES
(1, 'Master', 'master@gmail.com', 'master', 1, '0000-00-00 00:00:00', 0, 'master'),
(40, 'Jonathas Guilherme', 'jonathas@cademeumarido.com', '123', 1, '2019-11-21 20:29:32', 981818181, 'jonathas'),
(41, 'Alex Modica', 'alex@cademeumarido.com', '123', 1, '2019-11-21 20:29:44', 981818181, 'alex'),
(52, 'Daniel Poujo', 'daniel@cademeumarido.com', '123', 1, '2019-12-08 11:15:05', 214333112, 'daniel'),
(53, 'Usuário Bios da Silva', 'usuario@empresa.com', '123', 2, '2019-12-08 11:15:18', 23134123, 'usuario');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Índices para tabela `loc`
--
ALTER TABLE `loc`
  ADD PRIMARY KEY (`id_loc`),
  ADD KEY `id_idx` (`id_disp`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dispositivo`
--
ALTER TABLE `dispositivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `loc`
--
ALTER TABLE `loc`
  MODIFY `id_loc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD CONSTRAINT `usuario_dispositivo` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `loc`
--
ALTER TABLE `loc`
  ADD CONSTRAINT `id_disp` FOREIGN KEY (`id_disp`) REFERENCES `dispositivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
