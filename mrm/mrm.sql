-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 144.22.176.81
-- Generation Time: Jun 06, 2024 at 04:55 AM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `entrega_atividade`
--

CREATE TABLE `entrega_atividade` (
  `atividade_codigo` int NOT NULL,
  `atividade_nome` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `atividade_aluno` int NOT NULL,
  `atividade_nota` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `atividade_data_entrega` datetime DEFAULT CURRENT_TIMESTAMP,
  `atividade_observacoes` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entrega_atividade`
--

INSERT INTO `entrega_atividade` (`atividade_codigo`, `atividade_nome`, `atividade_aluno`, `atividade_nota`, `atividade_data_entrega`, `atividade_observacoes`) VALUES
(10, 'Maycola', 81123, '10', '2024-06-06 02:12:43', 'Mort'),
(11, 'Bob Marley', 81123, '10', '2024-06-06 02:53:58', 'Three Little Birds...');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int NOT NULL,
  `ra` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `adm` char(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `ra`, `nome`, `sobrenome`, `email`, `senha`, `adm`) VALUES
(1, 81123, 'Caique', 'Moreira', 'caique@mrmoreira.com', 'martin', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entrega_atividade`
--
ALTER TABLE `entrega_atividade`
  ADD PRIMARY KEY (`atividade_codigo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD UNIQUE KEY `ra` (`ra`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entrega_atividade`
--
ALTER TABLE `entrega_atividade`
  MODIFY `atividade_codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
