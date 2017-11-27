-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Set-2017 às 05:14
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bancovaralsolidario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campanha`
--

CREATE TABLE `campanha` (
  `id_campanha` int(11) NOT NULL,
  `local_camp` varchar(100) NOT NULL,
  `cidade_camp` varchar(100) NOT NULL,
  `bairro_camp` varchar(255) NOT NULL,
  `endereco_camp` varchar(255) NOT NULL,
  `inicio_camp` date NOT NULL,
  `fim_camp` date NOT NULL,
  `descricao_camp` text NOT NULL,
  `email_camp` varchar(100) NOT NULL,
  `phone_camp` varchar(20) NOT NULL,
  `criadoem_camp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `campanha`
--

INSERT INTO `campanha` (`id_campanha`, `local_camp`, `cidade_camp`, `bairro_camp`, `endereco_camp`, `inicio_camp`, `fim_camp`, `descricao_camp`, `email_camp`, `phone_camp`, `criadoem_camp`) VALUES
(1, 'Colégio Anjo da Guarda', 'Taquaritinga', 'Laranjeiras', 'Rua Pastor Abel, 382', '2017-09-14', '2017-09-30', 'Venha ajudar para que o Varal Solidário aconteça em Taquaritinga.', 'mariana.com.br@gmail.com', '1699999999', '2017-09-12 16:08:07'),
(2, 'Colégio Anjo da Guarda', 'Taquaritinga', 'Laranjeiras', 'Rua Pastor Abel, 382', '2017-09-14', '2017-09-30', 'Venha ajudar para que o Varal Solidário aconteça em Taquaritinga.', 'mariana.com.br@gmail.com', '1699999999', '2017-09-12 16:08:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campanha`
--
ALTER TABLE `campanha`
  ADD PRIMARY KEY (`id_campanha`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campanha`
--
ALTER TABLE `campanha`
  MODIFY `id_campanha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
