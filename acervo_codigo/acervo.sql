-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Nov-2022 às 02:21
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `acervo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `id_arquivo` int(11) NOT NULL,
  `nome_arquivo` varchar(50) NOT NULL,
  `autor_arquivo` varchar(50) NOT NULL,
  `descricao_arquivo` varchar(50) NOT NULL,
  `data_e_ano_arquivo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento`
--

CREATE TABLE `documento` (
  `id_documento` int(11) NOT NULL,
  `nome_documento` varchar(50) DEFAULT NULL,
  `autor_documento` varchar(50) DEFAULT NULL,
  `descricao_documento` varchar(50) DEFAULT NULL,
  `data_e_ano_documento` date DEFAULT NULL,
  `imagem_documento` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `objeto`
--

CREATE TABLE `objeto` (
  `id_objeto` int(11) NOT NULL,
  `nome_objeto` varchar(50) DEFAULT NULL,
  `autor_objeto` varchar(50) DEFAULT NULL,
  `descricao_objeto` varchar(100) DEFAULT NULL,
  `patrimonio_objeto` varchar(50) DEFAULT NULL,
  `data_e_ano_objeto` date DEFAULT NULL,
  `imagem_objeto` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `planta`
--

CREATE TABLE `planta` (
  `id_planta` int(11) NOT NULL,
  `nome_planta` varchar(50) DEFAULT NULL,
  `autor_planta` varchar(50) DEFAULT NULL,
  `descricao_planta` varchar(50) DEFAULT NULL,
  `data_e_ano_planta` date DEFAULT NULL,
  `imagem_planta` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `login_usuario` varchar(50) DEFAULT NULL,
  `senha_usuario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `login_usuario`, `senha_usuario`) VALUES
(1, 'Tais', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`id_arquivo`);

--
-- Índices para tabela `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id_documento`);

--
-- Índices para tabela `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`id_objeto`);

--
-- Índices para tabela `planta`
--
ALTER TABLE `planta`
  ADD PRIMARY KEY (`id_planta`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `id_arquivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `documento`
--
ALTER TABLE `documento`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT de tabela `objeto`
--
ALTER TABLE `objeto`
  MODIFY `id_objeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `planta`
--
ALTER TABLE `planta`
  MODIFY `id_planta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
