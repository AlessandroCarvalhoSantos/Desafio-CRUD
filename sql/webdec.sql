-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Maio-2022 às 04:49
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `webdec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `estado_id`, `cep`, `endereco`, `numero`) VALUES
(1, 18, '29290000', 'Avenida x perto da rua Y', 55);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `ufSigla` char(2) NOT NULL,
  `ufNome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id`, `ufSigla`, `ufNome`) VALUES
(1, 'RO', 'Rondônia'),
(2, 'AC', 'Acre'),
(3, 'AM', 'Amazonas'),
(4, 'RR', 'Roraima'),
(5, 'PA', 'Pará'),
(6, 'AP', 'Amapá'),
(7, 'TO', 'Tocantins'),
(8, 'MA', 'Maranhão'),
(9, 'PI', 'Piauí'),
(10, 'CE', 'Ceará'),
(11, 'RN', 'Rio Grande do Norte'),
(12, 'PB', 'Paraíba'),
(13, 'PE', 'Pernambuco'),
(14, 'AL', 'Alagoas'),
(15, 'SE', 'Sergipe'),
(16, 'BA', 'Bahia'),
(17, 'MG', 'Minas Gerais'),
(18, 'ES', 'Espírito Santo'),
(19, 'RJ', 'Rio de Janeiro'),
(20, 'SP', 'São Paulo'),
(21, 'PR', 'Paraná'),
(22, 'SC', 'Santa Catarina'),
(23, 'RS', 'Rio Grande do Sul'),
(24, 'MS', 'Mato Grosso do Sul'),
(25, 'MT', 'Mato Grosso'),
(26, 'GO', 'Goiás'),
(27, 'DF', 'Distrito Federal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL,
  `endereco_id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `data_nascimento` date NOT NULL,
  `data_cadastro` date NOT NULL,
  `data_atualizacao` date DEFAULT NULL,
  `data_exclusao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `endereco_id`, `nome`, `senha`, `cpf`, `rg`, `data_nascimento`, `data_cadastro`, `data_atualizacao`, `data_exclusao`) VALUES
(1, 1, 'Alessandro Carvalho Santos', 'swj26dUc5gIVBTYrn--AKA', '46086722072', '000000-ES', '2000-07-08', '2022-05-26', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE `telefones` (
  `id` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `telefones`
--

INSERT INTO `telefones` (`id`, `id_pessoa`, `telefone`) VALUES
(1, 1, '28999762587'),
(2, 1, '28999298577');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_EnderecoEstado` (`estado_id`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PessoaEndereco` (`endereco_id`);

--
-- Índices para tabela `telefones`
--
ALTER TABLE `telefones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TelefonePessoa` (`id_pessoa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `telefones`
--
ALTER TABLE `telefones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `FK_EnderecoEstado` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`);

--
-- Limitadores para a tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD CONSTRAINT `FK_PessoaEndereco` FOREIGN KEY (`endereco_id`) REFERENCES `enderecos` (`id`);

--
-- Limitadores para a tabela `telefones`
--
ALTER TABLE `telefones`
  ADD CONSTRAINT `FK_TelefonePessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
