-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql300.infinityfree.com
-- Tempo de geração: 30/05/2026 às 20:07
-- Versão do servidor: 11.4.11-MariaDB
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `if0_42057878_bd_cadastro_ifto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `idade` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT 'default.png',
  `tipo` varchar(30) NOT NULL,
  `curso` varchar(100) DEFAULT NULL,
  `funcao` varchar(100) DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `observacoes` text DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `cpf`, `idade`, `email`, `foto`, `tipo`, `curso`, `funcao`, `salario`, `observacoes`, `data_cadastro`) VALUES
(4, 'Marcos Raimundo Mendes Ramos', '17645678935', 28, 'marcos.ramos@professor.ifto.edu.br', '30fb65443c00a8ba34961616179c0cfc.png', 'Professor', NULL, 'Professor de Informática', '7000.00', 'Professor de Informática do IFTO Campus Paraíso do Tocantins.', '2026-05-30 21:04:41'),
(5, 'João Emanuel Câmara Castro', '12345678993', 28, 'joao.castro@estudante.ifto.edu.br', 'f62758dc319e3de9060880bbea345737.png', 'Estudante', 'Bacharelado em Sistemas de Informação', NULL, NULL, 'Estudante do 3º Período do Curso de Bacharelado em Sistemas de Informação do IFTO Campus Paraíso do Tocantins.', '2026-05-30 21:08:08'),
(6, 'Vinicio Moreira Carvalho', '66666666666', 18, 'vinicio.carvalho@estudante.ifto.edu.br', 'c7bc34cdca0b70362132db8d4c12c03c.png', 'Estudante', 'Bacharelado em Sistemas de Informação', NULL, NULL, 'Estudante do 3º Período do curso de Bacharelado em Sistemas de Informação do IFTO.', '2026-05-30 21:10:43'),
(7, 'Maria Silva Costa', '23458776790', 25, 'maria.costa@gmail.com', '7edb88dc55e8c093a7ee4d6fd4005f69.png', 'Visitante', NULL, NULL, NULL, 'Visitante do Campus Paraíso do Tocantins', '2026-05-30 21:20:46'),
(8, 'Lúcia Soares Miranda', '34567795943', 45, 'lucia.miranda@ifto.edu.br', 'default.png', 'Servidor', NULL, 'Técnico Administrativo', '4000.00', 'Técnico Administrativo do IFTO Campus Paraíso do Tocantins.', '2026-05-30 21:50:47'),
(9, 'Gustavo Romão Elástico', '67676767676', 20, 'gustavo.elastico@estudante.ifto.edu.br', '3f8e6f2ac7f66f2dbc9d8d01fb989be7.png', 'Estudante', 'Bacharelado em Sistemas de Informação', NULL, NULL, 'Estudante do 3º Período do curso de bacharelado em Sistemas de Informação - IFTO Campus Paraíso.', '2026-05-30 23:50:23');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
