-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema Trasportadora_DB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Trasportadora_DB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Trasportadora_DB` DEFAULT CHARACTER SET utf8 ;
USE `Trasportadora_DB` ;

-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`Veiculos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`Veiculos` (
  `veiID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `veiDescr` CHAR(20) NULL DEFAULT NULL,
  `veiAno` INT(11) NULL DEFAULT NULL,
  `veiPlaca` CHAR(8) NULL DEFAULT NULL,
  `veiCateg` CHAR(5) NULL DEFAULT NULL,
  PRIMARY KEY (`veiID`),
  UNIQUE INDEX `veiID` (`veiID` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`Funcionarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`Funcionarios` (
  `funID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `funNome` CHAR(30) NULL DEFAULT NULL,
  `funEnder` CHAR(30) NULL DEFAULT NULL,
  `funFone` CHAR(15) NULL DEFAULT NULL,
  `funDtNasc` DATE NULL DEFAULT NULL,
  `funClasse` CHAR(1) NULL DEFAULT NULL,
  `funCateg` CHAR(4) NULL DEFAULT NULL,
  PRIMARY KEY (`funID`),
  UNIQUE INDEX `funID` (`funID` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`Localidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`Localidades` (
  `locID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `locNome` CHAR(25) NULL DEFAULT NULL,
  `locUF` CHAR(2) NULL DEFAULT NULL,
  `locDistFil` INT(11) NULL DEFAULT NULL,
  `locISS` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`locID`),
  UNIQUE INDEX `locID` (`locID` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`Filiais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`Filiais` (
  `filID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `filEnder` CHAR(30) NULL DEFAULT NULL,
  `filBairro` CHAR(20) NULL DEFAULT NULL,
  `filFone` CHAR(15) NULL DEFAULT NULL,
  `locID` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`filID`),
  UNIQUE INDEX `filID` (`filID` ASC),
  INDEX `FK_Filiais_16` (`locID` ASC),
  CONSTRAINT `FK_Filiais_16`
    FOREIGN KEY (`locID`)
    REFERENCES `Trasportadora_DB`.`Localidades` (`locID`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`Rotas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`Rotas` (
  `rtaID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rtaNome` CHAR(15) NULL DEFAULT NULL,
  `rtaQtInterm` INT(11) NULL DEFAULT NULL,
  `filID` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`rtaID`),
  UNIQUE INDEX `rtaID` (`rtaID` ASC),
  INDEX `FK_Rotas_18` (`filID` ASC),
  CONSTRAINT `FK_Rotas_18`
    FOREIGN KEY (`filID`)
    REFERENCES `Trasportadora_DB`.`Filiais` (`filID`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`Viagens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`Viagens` (
  `viaID` INT(11) NOT NULL,
  `viaData` DATE NULL DEFAULT NULL,
  `viaObs` CHAR(80) NULL DEFAULT NULL,
  `viaKmIni` INT(11) NULL DEFAULT NULL,
  `viaKmFim` INT(11) NULL DEFAULT NULL,
  `funID` BIGINT(20) UNSIGNED NOT NULL,
  `veiID` BIGINT(20) UNSIGNED NOT NULL,
  `rtaID` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`viaID`),
  INDEX `FK_Viagens_22` (`veiID` ASC),
  INDEX `FK_Viagens_24` (`funID` ASC),
  INDEX `FK_Viagens_37` (`rtaID` ASC),
  CONSTRAINT `FK_Viagens_22`
    FOREIGN KEY (`veiID`)
    REFERENCES `Trasportadora_DB`.`Veiculos` (`veiID`),
  CONSTRAINT `FK_Viagens_24`
    FOREIGN KEY (`funID`)
    REFERENCES `Trasportadora_DB`.`Funcionarios` (`funID`),
  CONSTRAINT `FK_Viagens_37`
    FOREIGN KEY (`rtaID`)
    REFERENCES `Trasportadora_DB`.`Rotas` (`rtaID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`Cargas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`Cargas` (
  `viaID` INT(11) NOT NULL,
  `cgaNumero` INT(11) NOT NULL,
  `funID` BIGINT(20) UNSIGNED NOT NULL,
  `filID` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`viaID`, `cgaNumero`),
  INDEX `FK_Cargas_38` (`filID` ASC),
  INDEX `FK_Cargas_59` (`funID` ASC),
  CONSTRAINT `FK_Cargas_25`
    FOREIGN KEY (`viaID`)
    REFERENCES `Trasportadora_DB`.`Viagens` (`viaID`),
  CONSTRAINT `FK_Cargas_38`
    FOREIGN KEY (`filID`)
    REFERENCES `Trasportadora_DB`.`Filiais` (`filID`),
  CONSTRAINT `FK_Cargas_59`
    FOREIGN KEY (`funID`)
    REFERENCES `Trasportadora_DB`.`Funcionarios` (`funID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`Clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`Clientes` (
  `cliID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cliNome` CHAR(30) NULL DEFAULT NULL,
  `cliFone` CHAR(15) NULL DEFAULT NULL,
  `cliCPF` CHAR(15) NULL DEFAULT NULL,
  `cliRG` CHAR(15) NULL DEFAULT NULL,
  `cliEndereco` CHAR(30) NULL DEFAULT NULL,
  `cliCEP` CHAR(8) NULL DEFAULT NULL,
  `locID` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`cliID`),
  UNIQUE INDEX `cliID` (`cliID` ASC),
  INDEX `FK_Clientes_40` (`locID` ASC),
  CONSTRAINT `FK_Clientes_40`
    FOREIGN KEY (`locID`)
    REFERENCES `Trasportadora_DB`.`Localidades` (`locID`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`Ordens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`Ordens` (
  `ordNumero` INT(11) NOT NULL,
  `ordData` DATE NULL DEFAULT NULL,
  `ordQtItens` INT(11) NULL DEFAULT NULL,
  `ordVltotal` DECIMAL(10,2) NULL DEFAULT NULL,
  `CodOrigem` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
  `CodDestino` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
  `CodCliRem` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
  `CodCliDes` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
  `ordICMS` DECIMAL(10,2) NULL DEFAULT NULL,
  `ordISS` DECIMAL(10,2) NULL DEFAULT NULL,
  `ordTipo` CHAR(1) NULL DEFAULT NULL,
  `funID` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`ordNumero`),
  INDEX `FK_Ordens_20` (`funID` ASC),
  INDEX `FK_Ordens_21` (`CodCliRem` ASC),
  INDEX `FK_Ordens_34` (`CodOrigem` ASC),
  INDEX `FK_Ordens_41` (`CodCliDes` ASC),
  INDEX `FK_Ordens_49` (`CodDestino` ASC),
  CONSTRAINT `FK_Ordens_20`
    FOREIGN KEY (`funID`)
    REFERENCES `Trasportadora_DB`.`Funcionarios` (`funID`),
  CONSTRAINT `FK_Ordens_21`
    FOREIGN KEY (`CodCliRem`)
    REFERENCES `Trasportadora_DB`.`Clientes` (`cliID`),
  CONSTRAINT `FK_Ordens_34`
    FOREIGN KEY (`CodOrigem`)
    REFERENCES `Trasportadora_DB`.`Filiais` (`filID`),
  CONSTRAINT `FK_Ordens_41`
    FOREIGN KEY (`CodCliDes`)
    REFERENCES `Trasportadora_DB`.`Clientes` (`cliID`),
  CONSTRAINT `FK_Ordens_49`
    FOREIGN KEY (`CodDestino`)
    REFERENCES `Trasportadora_DB`.`Localidades` (`locID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`CargasItens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`CargasItens` (
  `cgaNumero` INT(11) NOT NULL,
  `viaID` INT(11) NOT NULL,
  `SeqCarga` CHAR(10) NOT NULL,
  `ordNumero` INT(11) NOT NULL,
  PRIMARY KEY (`cgaNumero`, `viaID`, `SeqCarga`),
  INDEX `FK_CargasItens_28` (`viaID` ASC, `cgaNumero` ASC),
  INDEX `FK_CargasItens_42` (`ordNumero` ASC),
  CONSTRAINT `FK_CargasItens_28`
    FOREIGN KEY (`viaID` , `cgaNumero`)
    REFERENCES `Trasportadora_DB`.`Cargas` (`viaID` , `cgaNumero`),
  CONSTRAINT `FK_CargasItens_42`
    FOREIGN KEY (`ordNumero`)
    REFERENCES `Trasportadora_DB`.`Ordens` (`ordNumero`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`Descargas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`Descargas` (
  `viaID` INT(11) NOT NULL,
  `dscNumero` INT(11) NOT NULL,
  `dscData` DATE NULL DEFAULT NULL,
  `funID` BIGINT(20) UNSIGNED NOT NULL,
  `filID` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`viaID`, `dscNumero`),
  INDEX `FK_Descargas_39` (`filID` ASC),
  INDEX `FK_Descargas_58` (`funID` ASC),
  CONSTRAINT `FK_Descargas_27`
    FOREIGN KEY (`viaID`)
    REFERENCES `Trasportadora_DB`.`Viagens` (`viaID`),
  CONSTRAINT `FK_Descargas_39`
    FOREIGN KEY (`filID`)
    REFERENCES `Trasportadora_DB`.`Filiais` (`filID`),
  CONSTRAINT `FK_Descargas_58`
    FOREIGN KEY (`funID`)
    REFERENCES `Trasportadora_DB`.`Funcionarios` (`funID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`DescargasItens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`DescargasItens` (
  `dscNumero` INT(11) NOT NULL,
  `viaID` INT(11) NOT NULL,
  `SeqDescg` CHAR(10) NOT NULL,
  `ordNumero` INT(11) NOT NULL,
  PRIMARY KEY (`dscNumero`, `viaID`, `SeqDescg`),
  INDEX `FK_DescargasItens_29` (`viaID` ASC, `dscNumero` ASC),
  INDEX `FK_DescargasItens_43` (`ordNumero` ASC),
  CONSTRAINT `FK_DescargasItens_29`
    FOREIGN KEY (`viaID` , `dscNumero`)
    REFERENCES `Trasportadora_DB`.`Descargas` (`viaID` , `dscNumero`),
  CONSTRAINT `FK_DescargasItens_43`
    FOREIGN KEY (`ordNumero`)
    REFERENCES `Trasportadora_DB`.`Ordens` (`ordNumero`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`Despesas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`Despesas` (
  `dspSeq` INT(11) NOT NULL,
  `dspData` DATE NULL DEFAULT NULL,
  `dspDescr` CHAR(20) NULL DEFAULT NULL,
  `dspValor` DECIMAL(10,2) NULL DEFAULT NULL,
  `viaID` INT(11) NOT NULL,
  PRIMARY KEY (`dspSeq`),
  INDEX `viaID` (`viaID` ASC),
  CONSTRAINT `Despesas_ibfk_1`
    FOREIGN KEY (`viaID`)
    REFERENCES `Trasportadora_DB`.`Viagens` (`viaID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`FiliaisDist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`FiliaisDist` (
  `CodOrigem` BIGINT(20) UNSIGNED NOT NULL,
  `CodDestino` BIGINT(20) UNSIGNED NOT NULL,
  `Distancia` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`CodOrigem`, `CodDestino`),
  INDEX `FK_FiliaisDist_45` (`CodDestino` ASC),
  CONSTRAINT `FK_FiliaisDist_45`
    FOREIGN KEY (`CodDestino`)
    REFERENCES `Trasportadora_DB`.`Filiais` (`filID`),
  CONSTRAINT `FK_FiliaisDist_46`
    FOREIGN KEY (`CodOrigem`)
    REFERENCES `Trasportadora_DB`.`Filiais` (`filID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`Precos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`Precos` (
  `prcDtVig` DATE NOT NULL,
  `prcVlFixo` DECIMAL(10,2) NULL DEFAULT NULL,
  `prcKmKg` DECIMAL(10,2) NULL DEFAULT NULL,
  `prcKmEsp` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`prcDtVig`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`Rodovias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`Rodovias` (
  `rodID` CHAR(10) NOT NULL,
  `rodNome` CHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`rodID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`RotasInterm`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`RotasInterm` (
  `rtaID` BIGINT(20) UNSIGNED NOT NULL,
  `rtiSeq` INT(11) NOT NULL,
  `rtiKm` CHAR(10) NULL DEFAULT NULL,
  `filID` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`rtaID`, `rtiSeq`),
  INDEX `FK_RotasInterm_36` (`filID` ASC),
  CONSTRAINT `FK_RotasInterm_19`
    FOREIGN KEY (`rtaID`)
    REFERENCES `Trasportadora_DB`.`Rotas` (`rtaID`),
  CONSTRAINT `FK_RotasInterm_36`
    FOREIGN KEY (`filID`)
    REFERENCES `Trasportadora_DB`.`Filiais` (`filID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`RotasRodovias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`RotasRodovias` (
  `rtaID` BIGINT(20) UNSIGNED NOT NULL,
  `rodID` CHAR(10) NOT NULL,
  `rrvSeq` INT(11) NOT NULL,
  `rrvKmIni` INT(11) NULL DEFAULT NULL,
  `rrvKmFim` INT(11) NULL DEFAULT NULL,
  `rrvQtPed` INT(11) NULL DEFAULT NULL,
  `rrvVlPed` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`rtaID`, `rodID`, `rrvSeq`),
  INDEX `FK_RotasRodovias_57` (`rodID` ASC),
  CONSTRAINT `FK_RotasRodovias_56`
    FOREIGN KEY (`rtaID`)
    REFERENCES `Trasportadora_DB`.`Rotas` (`rtaID`),
  CONSTRAINT `FK_RotasRodovias_57`
    FOREIGN KEY (`rodID`)
    REFERENCES `Trasportadora_DB`.`Rodovias` (`rodID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`Vencimentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`Vencimentos` (
  `veiID` BIGINT(20) UNSIGNED NOT NULL,
  `venSeq` INT(11) NOT NULL,
  `venDescr` CHAR(20) NULL DEFAULT NULL,
  `venValor` DECIMAL(10,2) NULL DEFAULT NULL,
  `venDtVenc` DATE NULL DEFAULT NULL,
  `venDtQuit` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`veiID`, `venSeq`),
  CONSTRAINT `FK_Vencimentos_51`
    FOREIGN KEY (`veiID`)
    REFERENCES `Trasportadora_DB`.`Veiculos` (`veiID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Trasportadora_DB`.`Volumes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Trasportadora_DB`.`Volumes` (
  `ordNumero` INT(11) NOT NULL,
  `volSeq` INT(11) NOT NULL,
  `volDescr` CHAR(30) NULL DEFAULT NULL,
  `volPeso` DECIMAL(10,3) NULL DEFAULT NULL,
  `volValor` DECIMAL(10,2) NULL DEFAULT NULL,
  `volVlFrete` DECIMAL(10,2) NULL DEFAULT NULL,
  `volVolume` DECIMAL(10,2) NULL DEFAULT NULL,
  `volCubagem` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`ordNumero`, `volSeq`),
  CONSTRAINT `FK_Volumes_23`
    FOREIGN KEY (`ordNumero`)
    REFERENCES `Trasportadora_DB`.`Ordens` (`ordNumero`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `Trasportadora_DB` ;

-- -----------------------------------------------------
-- procedure getQtdVeiculosPorAno
-- -----------------------------------------------------

DELIMITER $$
USE `Trasportadora_DB`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getQtdVeiculosPorAno`()
BEGIN
	select veiAno as Ano, count(veiAno) Qtd
	from Veiculos v
	group by v.veiAno;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure simpleproc
-- -----------------------------------------------------

DELIMITER $$
USE `Trasportadora_DB`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `simpleproc`(OUT param1 INT)
BEGIN
	select veiAno as Ano, count(veiAno) Qtd
	from Veiculos v
	group by v.veiAno;
END$$

DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
