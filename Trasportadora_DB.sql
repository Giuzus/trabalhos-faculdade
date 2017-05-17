-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 16/05/2017 às 22:12
-- Versão do servidor: 5.7.18-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `Trasportadora_DB`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Cargas`
--

CREATE TABLE `Cargas` (
  `viaID` int(11) NOT NULL,
  `cgaNumero` int(11) NOT NULL,
  `funID` bigint(20) UNSIGNED NOT NULL,
  `filID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `CargasItens`
--

CREATE TABLE `CargasItens` (
  `cgaNumero` int(11) NOT NULL,
  `viaID` int(11) NOT NULL,
  `SeqCarga` char(10) NOT NULL,
  `ordNumero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Clientes`
--

CREATE TABLE `Clientes` (
  `cliID` bigint(20) UNSIGNED NOT NULL,
  `cliNome` char(30) DEFAULT NULL,
  `cliFone` char(15) DEFAULT NULL,
  `cliCPF` char(15) DEFAULT NULL,
  `cliRG` char(15) DEFAULT NULL,
  `cliEndereco` char(30) DEFAULT NULL,
  `cliCEP` char(8) DEFAULT NULL,
  `locID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Descargas`
--

CREATE TABLE `Descargas` (
  `viaID` int(11) NOT NULL,
  `dscNumero` int(11) NOT NULL,
  `dscData` date DEFAULT NULL,
  `funID` bigint(20) UNSIGNED NOT NULL,
  `filID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `DescargasItens`
--

CREATE TABLE `DescargasItens` (
  `dscNumero` int(11) NOT NULL,
  `viaID` int(11) NOT NULL,
  `SeqDescg` char(10) NOT NULL,
  `ordNumero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Despesas`
--

CREATE TABLE `Despesas` (
  `veiID` bigint(20) UNSIGNED NOT NULL,
  `dspSeq` int(11) NOT NULL,
  `dspData` date DEFAULT NULL,
  `dspDescr` char(20) DEFAULT NULL,
  `dspValor` decimal(10,2) DEFAULT NULL,
  `dspKmVei` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Filiais`
--

CREATE TABLE `Filiais` (
  `filID` bigint(20) UNSIGNED NOT NULL,
  `filEnder` char(30) DEFAULT NULL,
  `filBairro` char(20) DEFAULT NULL,
  `filFone` char(15) DEFAULT NULL,
  `locID` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `FiliaisDist`
--

CREATE TABLE `FiliaisDist` (
  `CodOrigem` bigint(20) UNSIGNED NOT NULL,
  `CodDestino` bigint(20) UNSIGNED NOT NULL,
  `Distancia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Funcionarios`
--

CREATE TABLE `Funcionarios` (
  `funID` bigint(20) UNSIGNED NOT NULL,
  `funNome` char(30) DEFAULT NULL,
  `funEnder` char(30) DEFAULT NULL,
  `funFone` char(15) DEFAULT NULL,
  `funDtNasc` date DEFAULT NULL,
  `funClasse` char(1) DEFAULT NULL,
  `funCateg` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `Funcionarios`
--

INSERT INTO `Funcionarios` (`funID`, `funNome`, `funEnder`, `funFone`, `funDtNasc`, `funClasse`, `funCateg`) VALUES
(1, 'Gui', 'Casa do Caralho', '(41) 99999-6666', '1997-07-04', 'A', 'cat1'),
(2, 'Rose Jico', 'Logo ali', '(41) 96666-9999', '1996-12-25', 'Z', 'cat0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Localidades`
--

CREATE TABLE `Localidades` (
  `locID` bigint(20) UNSIGNED NOT NULL,
  `locNome` char(25) DEFAULT NULL,
  `locUF` char(2) DEFAULT NULL,
  `locDistFil` int(11) DEFAULT NULL,
  `filID` bigint(20) UNSIGNED DEFAULT NULL,
  `locISS` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Ordens`
--

CREATE TABLE `Ordens` (
  `ordNumero` int(11) NOT NULL,
  `ordData` date DEFAULT NULL,
  `ordQtItens` int(11) DEFAULT NULL,
  `ordVltotal` decimal(10,2) DEFAULT NULL,
  `CodOrigem` bigint(20) UNSIGNED DEFAULT NULL,
  `CodDestino` bigint(20) UNSIGNED DEFAULT NULL,
  `CodCliRem` bigint(20) UNSIGNED DEFAULT NULL,
  `CodCliDes` bigint(20) UNSIGNED DEFAULT NULL,
  `ordICMS` decimal(10,2) DEFAULT NULL,
  `ordISS` decimal(10,2) DEFAULT NULL,
  `ordTipo` char(1) DEFAULT NULL,
  `funID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Precos`
--

CREATE TABLE `Precos` (
  `prcDtVig` date NOT NULL,
  `prcVlFixo` decimal(10,2) DEFAULT NULL,
  `prcKmKg` decimal(10,2) DEFAULT NULL,
  `prcKmEsp` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Rodovias`
--

CREATE TABLE `Rodovias` (
  `rodID` char(10) NOT NULL,
  `rodNome` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Rotas`
--

CREATE TABLE `Rotas` (
  `rtaID` bigint(20) UNSIGNED NOT NULL,
  `rtaNome` char(15) DEFAULT NULL,
  `rtaQtInterm` int(11) DEFAULT NULL,
  `filID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `RotasInterm`
--

CREATE TABLE `RotasInterm` (
  `rtaID` bigint(20) UNSIGNED NOT NULL,
  `rtiSeq` int(11) NOT NULL,
  `rtiKm` char(10) DEFAULT NULL,
  `filID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `RotasRodovias`
--

CREATE TABLE `RotasRodovias` (
  `rtaID` bigint(20) UNSIGNED NOT NULL,
  `rodID` char(10) NOT NULL,
  `rrvSeq` int(11) NOT NULL,
  `rrvKmIni` int(11) DEFAULT NULL,
  `rrvKmFim` int(11) DEFAULT NULL,
  `rrvQtPed` int(11) DEFAULT NULL,
  `rrvVlPed` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Veiculos`
--

CREATE TABLE `Veiculos` (
  `veiID` bigint(20) UNSIGNED NOT NULL,
  `veiDescr` char(20) DEFAULT NULL,
  `veiAno` int(11) DEFAULT NULL,
  `veiPlaca` char(8) DEFAULT NULL,
  `veiCateg` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Vencimentos`
--

CREATE TABLE `Vencimentos` (
  `veiID` bigint(20) UNSIGNED NOT NULL,
  `venSeq` int(11) NOT NULL,
  `venDescr` char(20) DEFAULT NULL,
  `venValor` decimal(10,2) DEFAULT NULL,
  `venDtVenc` date DEFAULT NULL,
  `venDtQuit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Viagens`
--

CREATE TABLE `Viagens` (
  `viaID` int(11) NOT NULL,
  `viaData` date DEFAULT NULL,
  `viaObs` char(80) DEFAULT NULL,
  `viaKmIni` int(11) DEFAULT NULL,
  `viaKmFim` int(11) DEFAULT NULL,
  `funID` bigint(20) UNSIGNED NOT NULL,
  `veiID` bigint(20) UNSIGNED NOT NULL,
  `rtaID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Volumes`
--

CREATE TABLE `Volumes` (
  `ordNumero` int(11) NOT NULL,
  `volSeq` int(11) NOT NULL,
  `volDescr` char(30) DEFAULT NULL,
  `volPeso` decimal(10,3) DEFAULT NULL,
  `volValor` decimal(10,2) DEFAULT NULL,
  `volVlFrete` decimal(10,2) DEFAULT NULL,
  `volVolume` decimal(10,2) DEFAULT NULL,
  `volCubagem` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Cargas`
--
ALTER TABLE `Cargas`
  ADD PRIMARY KEY (`viaID`,`cgaNumero`),
  ADD KEY `FK_Cargas_38` (`filID`),
  ADD KEY `FK_Cargas_59` (`funID`);

--
-- Índices de tabela `CargasItens`
--
ALTER TABLE `CargasItens`
  ADD PRIMARY KEY (`cgaNumero`,`viaID`,`SeqCarga`),
  ADD KEY `FK_CargasItens_28` (`viaID`,`cgaNumero`),
  ADD KEY `FK_CargasItens_42` (`ordNumero`);

--
-- Índices de tabela `Clientes`
--
ALTER TABLE `Clientes`
  ADD PRIMARY KEY (`cliID`),
  ADD UNIQUE KEY `cliID` (`cliID`),
  ADD KEY `FK_Clientes_40` (`locID`);

--
-- Índices de tabela `Descargas`
--
ALTER TABLE `Descargas`
  ADD PRIMARY KEY (`viaID`,`dscNumero`),
  ADD KEY `FK_Descargas_39` (`filID`),
  ADD KEY `FK_Descargas_58` (`funID`);

--
-- Índices de tabela `DescargasItens`
--
ALTER TABLE `DescargasItens`
  ADD PRIMARY KEY (`dscNumero`,`viaID`,`SeqDescg`),
  ADD KEY `FK_DescargasItens_29` (`viaID`,`dscNumero`),
  ADD KEY `FK_DescargasItens_43` (`ordNumero`);

--
-- Índices de tabela `Despesas`
--
ALTER TABLE `Despesas`
  ADD PRIMARY KEY (`veiID`,`dspSeq`);

--
-- Índices de tabela `Filiais`
--
ALTER TABLE `Filiais`
  ADD PRIMARY KEY (`filID`),
  ADD UNIQUE KEY `filID` (`filID`),
  ADD KEY `FK_Filiais_16` (`locID`);

--
-- Índices de tabela `FiliaisDist`
--
ALTER TABLE `FiliaisDist`
  ADD PRIMARY KEY (`CodOrigem`,`CodDestino`),
  ADD KEY `FK_FiliaisDist_45` (`CodDestino`);

--
-- Índices de tabela `Funcionarios`
--
ALTER TABLE `Funcionarios`
  ADD PRIMARY KEY (`funID`),
  ADD UNIQUE KEY `funID` (`funID`);

--
-- Índices de tabela `Localidades`
--
ALTER TABLE `Localidades`
  ADD PRIMARY KEY (`locID`),
  ADD UNIQUE KEY `locID` (`locID`),
  ADD KEY `FK_Localidades_17` (`filID`);

--
-- Índices de tabela `Ordens`
--
ALTER TABLE `Ordens`
  ADD PRIMARY KEY (`ordNumero`),
  ADD KEY `FK_Ordens_20` (`funID`),
  ADD KEY `FK_Ordens_21` (`CodCliRem`),
  ADD KEY `FK_Ordens_34` (`CodOrigem`),
  ADD KEY `FK_Ordens_41` (`CodCliDes`),
  ADD KEY `FK_Ordens_49` (`CodDestino`);

--
-- Índices de tabela `Precos`
--
ALTER TABLE `Precos`
  ADD PRIMARY KEY (`prcDtVig`);

--
-- Índices de tabela `Rodovias`
--
ALTER TABLE `Rodovias`
  ADD PRIMARY KEY (`rodID`);

--
-- Índices de tabela `Rotas`
--
ALTER TABLE `Rotas`
  ADD PRIMARY KEY (`rtaID`),
  ADD UNIQUE KEY `rtaID` (`rtaID`),
  ADD KEY `FK_Rotas_18` (`filID`);

--
-- Índices de tabela `RotasInterm`
--
ALTER TABLE `RotasInterm`
  ADD PRIMARY KEY (`rtaID`,`rtiSeq`),
  ADD KEY `FK_RotasInterm_36` (`filID`);

--
-- Índices de tabela `RotasRodovias`
--
ALTER TABLE `RotasRodovias`
  ADD PRIMARY KEY (`rtaID`,`rodID`,`rrvSeq`),
  ADD KEY `FK_RotasRodovias_57` (`rodID`);

--
-- Índices de tabela `Veiculos`
--
ALTER TABLE `Veiculos`
  ADD PRIMARY KEY (`veiID`),
  ADD UNIQUE KEY `veiID` (`veiID`);

--
-- Índices de tabela `Vencimentos`
--
ALTER TABLE `Vencimentos`
  ADD PRIMARY KEY (`veiID`,`venSeq`);

--
-- Índices de tabela `Viagens`
--
ALTER TABLE `Viagens`
  ADD PRIMARY KEY (`viaID`),
  ADD KEY `FK_Viagens_22` (`veiID`),
  ADD KEY `FK_Viagens_24` (`funID`),
  ADD KEY `FK_Viagens_37` (`rtaID`);

--
-- Índices de tabela `Volumes`
--
ALTER TABLE `Volumes`
  ADD PRIMARY KEY (`ordNumero`,`volSeq`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `Clientes`
--
ALTER TABLE `Clientes`
  MODIFY `cliID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `Filiais`
--
ALTER TABLE `Filiais`
  MODIFY `filID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `Funcionarios`
--
ALTER TABLE `Funcionarios`
  MODIFY `funID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `Localidades`
--
ALTER TABLE `Localidades`
  MODIFY `locID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `Rotas`
--
ALTER TABLE `Rotas`
  MODIFY `rtaID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `Veiculos`
--
ALTER TABLE `Veiculos`
  MODIFY `veiID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `Cargas`
--
ALTER TABLE `Cargas`
  ADD CONSTRAINT `FK_Cargas_25` FOREIGN KEY (`viaID`) REFERENCES `Viagens` (`viaID`),
  ADD CONSTRAINT `FK_Cargas_38` FOREIGN KEY (`filID`) REFERENCES `Filiais` (`filID`),
  ADD CONSTRAINT `FK_Cargas_59` FOREIGN KEY (`funID`) REFERENCES `Funcionarios` (`funID`);

--
-- Restrições para tabelas `CargasItens`
--
ALTER TABLE `CargasItens`
  ADD CONSTRAINT `FK_CargasItens_28` FOREIGN KEY (`viaID`,`cgaNumero`) REFERENCES `Cargas` (`viaID`, `cgaNumero`),
  ADD CONSTRAINT `FK_CargasItens_42` FOREIGN KEY (`ordNumero`) REFERENCES `Ordens` (`ordNumero`);

--
-- Restrições para tabelas `Clientes`
--
ALTER TABLE `Clientes`
  ADD CONSTRAINT `FK_Clientes_40` FOREIGN KEY (`locID`) REFERENCES `Localidades` (`locID`);

--
-- Restrições para tabelas `Descargas`
--
ALTER TABLE `Descargas`
  ADD CONSTRAINT `FK_Descargas_27` FOREIGN KEY (`viaID`) REFERENCES `Viagens` (`viaID`),
  ADD CONSTRAINT `FK_Descargas_39` FOREIGN KEY (`filID`) REFERENCES `Filiais` (`filID`),
  ADD CONSTRAINT `FK_Descargas_58` FOREIGN KEY (`funID`) REFERENCES `Funcionarios` (`funID`);

--
-- Restrições para tabelas `DescargasItens`
--
ALTER TABLE `DescargasItens`
  ADD CONSTRAINT `FK_DescargasItens_29` FOREIGN KEY (`viaID`,`dscNumero`) REFERENCES `Descargas` (`viaID`, `dscNumero`),
  ADD CONSTRAINT `FK_DescargasItens_43` FOREIGN KEY (`ordNumero`) REFERENCES `Ordens` (`ordNumero`);

--
-- Restrições para tabelas `Despesas`
--
ALTER TABLE `Despesas`
  ADD CONSTRAINT `FK_Despesas_53` FOREIGN KEY (`veiID`) REFERENCES `Veiculos` (`veiID`);

--
-- Restrições para tabelas `Filiais`
--
ALTER TABLE `Filiais`
  ADD CONSTRAINT `FK_Filiais_16` FOREIGN KEY (`locID`) REFERENCES `Localidades` (`locID`);

--
-- Restrições para tabelas `FiliaisDist`
--
ALTER TABLE `FiliaisDist`
  ADD CONSTRAINT `FK_FiliaisDist_45` FOREIGN KEY (`CodDestino`) REFERENCES `Filiais` (`filID`),
  ADD CONSTRAINT `FK_FiliaisDist_46` FOREIGN KEY (`CodOrigem`) REFERENCES `Filiais` (`filID`);

--
-- Restrições para tabelas `Localidades`
--
ALTER TABLE `Localidades`
  ADD CONSTRAINT `FK_Localidades_17` FOREIGN KEY (`filID`) REFERENCES `Filiais` (`filID`);

--
-- Restrições para tabelas `Ordens`
--
ALTER TABLE `Ordens`
  ADD CONSTRAINT `FK_Ordens_20` FOREIGN KEY (`funID`) REFERENCES `Funcionarios` (`funID`),
  ADD CONSTRAINT `FK_Ordens_21` FOREIGN KEY (`CodCliRem`) REFERENCES `Clientes` (`cliID`),
  ADD CONSTRAINT `FK_Ordens_34` FOREIGN KEY (`CodOrigem`) REFERENCES `Filiais` (`filID`),
  ADD CONSTRAINT `FK_Ordens_41` FOREIGN KEY (`CodCliDes`) REFERENCES `Clientes` (`cliID`),
  ADD CONSTRAINT `FK_Ordens_49` FOREIGN KEY (`CodDestino`) REFERENCES `Localidades` (`locID`);

--
-- Restrições para tabelas `Rotas`
--
ALTER TABLE `Rotas`
  ADD CONSTRAINT `FK_Rotas_18` FOREIGN KEY (`filID`) REFERENCES `Filiais` (`filID`);

--
-- Restrições para tabelas `RotasInterm`
--
ALTER TABLE `RotasInterm`
  ADD CONSTRAINT `FK_RotasInterm_19` FOREIGN KEY (`rtaID`) REFERENCES `Rotas` (`rtaID`),
  ADD CONSTRAINT `FK_RotasInterm_36` FOREIGN KEY (`filID`) REFERENCES `Filiais` (`filID`);

--
-- Restrições para tabelas `RotasRodovias`
--
ALTER TABLE `RotasRodovias`
  ADD CONSTRAINT `FK_RotasRodovias_56` FOREIGN KEY (`rtaID`) REFERENCES `Rotas` (`rtaID`),
  ADD CONSTRAINT `FK_RotasRodovias_57` FOREIGN KEY (`rodID`) REFERENCES `Rodovias` (`rodID`);

--
-- Restrições para tabelas `Vencimentos`
--
ALTER TABLE `Vencimentos`
  ADD CONSTRAINT `FK_Vencimentos_51` FOREIGN KEY (`veiID`) REFERENCES `Veiculos` (`veiID`);

--
-- Restrições para tabelas `Viagens`
--
ALTER TABLE `Viagens`
  ADD CONSTRAINT `FK_Viagens_22` FOREIGN KEY (`veiID`) REFERENCES `Veiculos` (`veiID`),
  ADD CONSTRAINT `FK_Viagens_24` FOREIGN KEY (`funID`) REFERENCES `Funcionarios` (`funID`),
  ADD CONSTRAINT `FK_Viagens_37` FOREIGN KEY (`rtaID`) REFERENCES `Rotas` (`rtaID`);

--
-- Restrições para tabelas `Volumes`
--
ALTER TABLE `Volumes`
  ADD CONSTRAINT `FK_Volumes_23` FOREIGN KEY (`ordNumero`) REFERENCES `Ordens` (`ordNumero`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
