-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/08/2023 às 15:08
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




--
-- Banco de dados: `bd_chamado`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_chamados`
--

CREATE TABLE `tb_chamados` (
  `id_chamado` int(3) NOT NULL,
  `tipo_problema` varchar(75) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pendente',
  `sala` varchar(45) DEFAULT NULL,
  `iditem` varchar(5) DEFAULT NULL,
  `data_envio` varchar(18) DEFAULT NULL,
  `iduser` varchar(50) DEFAULT NULL,
  `idtec` varchar(50) DEFAULT NULL,
  `iduser_adm` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_chamados`
--

INSERT INTO `tb_chamados` (`id_chamado`, `tipo_problema`, `descricao`, `status`, `sala`, `iditem`, `data_envio`, `iduser`, `idtec`, `iduser_adm`) VALUES
(19, 'reserva de sala', 'saesdasdasd', 'atendido', 'Auditorio', NULL, '02/08/2023 11:11', 'Rafael Santos', '', 'Rafael Santos'),
(22, 'Suporte TI', 'Minha impressora queimou, gostaria de um soporte por gentileza', 'pendente', 'Setor Secretaria', NULL, '02/08/2023 11:13', 'Rafael Santos', 'Rafael', 'Rafael Santos'),
(23, 'Suporte TI', 'Estou sem acesso as pastas compartilhadas', 'pendente', 'Setor Diplomas', NULL, '02/08/2023 11:14', 'Rafael Santos', NULL, NULL),
(24, 'Suporte TI', 'asdsadasdasd', 'pendente', 'Auditorio', NULL, '02/08/2023 11:20', 'Rafael Santos', NULL, NULL),
(25, 'Suporte TI', 'esotu sem internet', 'pendente', 'Setor Secretaria', NULL, '02/08/2023 11:20', 'Barreto', NULL, NULL),
(26, 'Suporte TI', 'impressora com problema', 'pendente', 'Setor Cobrança', NULL, '02/08/2023 11:20', 'Barreto', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_item`
--

CREATE TABLE `tb_item` (
  `id_item` int(11) NOT NULL,
  `tipo_item` varchar(75) NOT NULL,
  `descricao_item` varchar(300) NOT NULL,
  `quem_cadastrou` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_item`
--

INSERT INTO `tb_item` (`id_item`, `tipo_item`, `descricao_item`, `quem_cadastrou`) VALUES
(36, 'Setor ', 'Secretaria', 'Rafael Santos'),
(38, 'Auditorio', '', 'Rafael Santos'),
(39, 'Setor ', 'Cobrança', 'Rafael Santos'),
(40, 'Setor ', 'Diplomas', 'Rafael Santos'),
(41, 'Setor ', 'Coordenação', 'Rafael Santos'),
(42, 'Setor ', 'NPEP', 'Rafael Santos'),
(43, 'Setor ', 'Comercial', 'Rafael Santos'),
(44, 'Setor ', 'Direção', 'Rafael Santos'),
(45, 'Setor ', 'Fasiclin', 'Rafael Santos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_tecnico`
--

CREATE TABLE `tb_tecnico` (
  `id_tec` int(11) NOT NULL,
  `nome_tec` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `nivel` varchar(1) NOT NULL,
  `quem_cadastrou` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_tecnico`
--

INSERT INTO `tb_tecnico` (`id_tec`, `nome_tec`, `email`, `nivel`, `quem_cadastrou`) VALUES
(4, 'Rafael', 'ssouzarafaelxd@gmail.com', '2', 'Rafael Santos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(75) NOT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `categoria` int(3) NOT NULL,
  `status` varchar(30) NOT NULL,
  `quem_cadastrou` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_user`, `nome_user`, `login`, `email`, `senha`, `categoria`, `status`, `quem_cadastrou`) VALUES
(21, 'Rafael Santos', 'rafael', 'ssouzarafaelxd@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'ativo', ''),
(22, 'Barreto', 'barreto', 'barreto@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 'ativo', 'Rafael Santos');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_chamados`
--
ALTER TABLE `tb_chamados`
  ADD PRIMARY KEY (`id_chamado`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `iditem` (`iditem`),
  ADD KEY `idtec` (`idtec`);

--
-- Índices de tabela `tb_item`
--
ALTER TABLE `tb_item`
  ADD PRIMARY KEY (`id_item`);

--
-- Índices de tabela `tb_tecnico`
--
ALTER TABLE `tb_tecnico`
  ADD PRIMARY KEY (`id_tec`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_chamados`
--
ALTER TABLE `tb_chamados`
  MODIFY `id_chamado` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tb_item`
--
ALTER TABLE `tb_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `tb_tecnico`
--
ALTER TABLE `tb_tecnico`
  MODIFY `id_tec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
