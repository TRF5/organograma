-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Out-2022 às 15:47
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste-organograma`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestao`
--

CREATE TABLE `gestao` (
  `id` int(11) NOT NULL,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestao_composicao_unidade`
--

CREATE TABLE `gestao_composicao_unidade` (
  `id` int(11) NOT NULL,
  `id_gestao` int(11) DEFAULT NULL,
  `id_unidade` int(11) DEFAULT NULL,
  `matricula` varchar(10) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE `instituicao` (
  `id` int(11) NOT NULL,
  `instituicao` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `instituicao`
--

INSERT INTO `instituicao` (`id`, `instituicao`) VALUES
(1, 'TRF5'),
(2, 'SJAL'),
(3, 'SJCE'),
(4, 'SJPB'),
(5, 'SJPE'),
(6, 'SJRN'),
(7, 'SJSE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `legislacao`
--

CREATE TABLE `legislacao` (
  `id` int(11) NOT NULL,
  `id_instituicao` int(11) DEFAULT NULL,
  `id_gestao` int(11) DEFAULT NULL,
  `id_tipo_legislacao` int(11) DEFAULT NULL,
  `numero_legislacao` varchar(10) DEFAULT NULL,
  `data_legislacao` date DEFAULT NULL,
  `url_legislacao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `magistrado`
--

CREATE TABLE `magistrado` (
  `matricula` varchar(10) NOT NULL,
  `nome_autoridade` tinytext NOT NULL,
  `ordem_antiguidade` int(11) NOT NULL,
  `situacao` tinytext DEFAULT NULL,
  `genero` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_cargo`
--

CREATE TABLE `tipo_cargo` (
  `id` int(11) NOT NULL,
  `cargo` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_cargo`
--

INSERT INTO `tipo_cargo` (`id`, `cargo`) VALUES
(1, 'Presidente'),
(2, 'Vice-Presidente'),
(3, 'Corregedor Regional'),
(4, 'Diretor do Gabinete da Revista'),
(5, 'Diretor da Escola de Magistratura Federal da 5ª Região (ESMAFE)'),
(6, 'Vice-Diretor da Escola de Magistratura Federal da 5ª Região (ESMAFE)'),
(7, 'Coordenadoria dos Juizados Especiais Federais (JEFs)'),
(8, 'Vice-Diretor da Escola de Magistratura Federal da 5ª Região (ESMAFE)'),
(9, 'Coordenadoria dos Juizados Especiais Federais (JEFs)'),
(10, 'Coordenador do Gabinete de Conciliação)'),
(11, 'Presidente de turma'),
(12, 'Presidente de seção'),
(13, 'Sem cargo específico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_legislacao`
--

CREATE TABLE `tipo_legislacao` (
  `id` int(11) NOT NULL,
  `legislacao` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_legislacao`
--

INSERT INTO `tipo_legislacao` (`id`, `legislacao`) VALUES
(1, 'Portaria'),
(2, 'Resolução'),
(3, 'Ato'),
(4, 'Instrução Normativa'),
(5, 'Provimentos'),
(6, 'Emendas Regimentais'),
(7, 'Súmulas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `id` int(11) NOT NULL,
  `unidade` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`id`, `unidade`) VALUES
(1, 'Comissão'),
(2, 'Seção'),
(3, 'Turma'),
(4, 'Estrutura Principal');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `gestao`
--
ALTER TABLE `gestao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `gestao_composicao_unidade`
--
ALTER TABLE `gestao_composicao_unidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gestao` (`id_gestao`),
  ADD KEY `id_unidade` (`id_unidade`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Índices para tabela `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `legislacao`
--
ALTER TABLE `legislacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gestao` (`id_gestao`),
  ADD KEY `id_instituicao` (`id_instituicao`),
  ADD KEY `id_tipo_legislacao` (`id_tipo_legislacao`);

--
-- Índices para tabela `magistrado`
--
ALTER TABLE `magistrado`
  ADD PRIMARY KEY (`matricula`);

--
-- Índices para tabela `tipo_cargo`
--
ALTER TABLE `tipo_cargo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipo_legislacao`
--
ALTER TABLE `tipo_legislacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `gestao`
--
ALTER TABLE `gestao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `gestao_composicao_unidade`
--
ALTER TABLE `gestao_composicao_unidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `legislacao`
--
ALTER TABLE `legislacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_cargo`
--
ALTER TABLE `tipo_cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tipo_legislacao`
--
ALTER TABLE `tipo_legislacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `gestao_composicao_unidade`
--
ALTER TABLE `gestao_composicao_unidade`
  ADD CONSTRAINT `gestao_composicao_unidade_ibfk_1` FOREIGN KEY (`id_gestao`) REFERENCES `gestao` (`id`),
  ADD CONSTRAINT `gestao_composicao_unidade_ibfk_2` FOREIGN KEY (`id_unidade`) REFERENCES `unidade` (`id`),
  ADD CONSTRAINT `gestao_composicao_unidade_ibfk_3` FOREIGN KEY (`matricula`) REFERENCES `magistrado` (`matricula`),
  ADD CONSTRAINT `gestao_composicao_unidade_ibfk_4` FOREIGN KEY (`id_cargo`) REFERENCES `tipo_cargo` (`id`);

--
-- Limitadores para a tabela `legislacao`
--
ALTER TABLE `legislacao`
  ADD CONSTRAINT `legislacao_ibfk_1` FOREIGN KEY (`id_gestao`) REFERENCES `gestao` (`id`),
  ADD CONSTRAINT `legislacao_ibfk_2` FOREIGN KEY (`id_instituicao`) REFERENCES `instituicao` (`id`),
  ADD CONSTRAINT `legislacao_ibfk_3` FOREIGN KEY (`id_tipo_legislacao`) REFERENCES `tipo_legislacao` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
