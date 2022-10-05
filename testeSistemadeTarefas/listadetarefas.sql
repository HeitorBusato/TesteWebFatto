-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Setembro-2022 às 01:27
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `listadetarefas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id_tarefa` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `custo` float NOT NULL,
  `dataLimite` date NOT NULL,
  `ordem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tarefas`
--

INSERT INTO `tarefas` (`id_tarefa`, `nome`, `custo`, `dataLimite`, `ordem`) VALUES
(1, 'tarefaA', '500.80', '2022-10-08' , 1),
(3, 'tarefat', '1000', '2022-10-05' , 7),
(4, 'tarefaf', '5000', '2022-10-22' , 6),
(2, 'tarefaB', '250.20', '2022-10-05' , 9);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tarefas`
--

ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id_tarefa`);
  
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tarefas`
--

ALTER TABLE `tarefas`
  MODIFY `id_tarefa` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- CONSTRAINT for UNIQUE table
--

ALTER TABLE `tarefas`
  ADD UNIQUE (nome);
