-- MySQL Script generated by MySQL Workbench
-- Sex 21 Set 2018 20:05:36 -03
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema sysbiblioteca
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sysbiblioteca
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sysbiblioteca` DEFAULT CHARACTER SET utf8 ;
USE `sysbiblioteca` ;

-- -----------------------------------------------------
-- Table `sysbiblioteca`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysbiblioteca`.`usuario` (
	`idusuario` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(45) NOT NULL,
	`email` VARCHAR(45) NOT NULL,
	`senha` VARCHAR(45) NOT NULL,
	`tipo` CHAR(3) NOT NULL,
	`endereco` VARCHAR(45) NOT NULL,
	`teleone` VARCHAR(45) NOT NULL,
	`status` TINYINT NOT NULL,
	PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sysbiblioteca`.`livro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysbiblioteca`.`livro` (
	`idlivro` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(45) NOT NULL,
	`categoria` VARCHAR(45) NOT NULL,
	`quantidade` INT NOT NULL,
	`autor` VARCHAR(45) NOT NULL,
	`editora` VARCHAR(45) NOT NULL,
	`edicao` VARCHAR(45) NOT NULL,
	`ano` VARCHAR(45) NOT NULL,
	`qtd_disponivel` INT NOT NULL,
	`descricao` TEXT(150) NULL,
	PRIMARY KEY (`idlivro`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sysbiblioteca`.`emprestimo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysbiblioteca`.`emprestimo` (
	
	`usuario_idusuario` INT NOT NULL,
	`livro_idlivro` INT NOT NULL,
	`data_emprestimo` DATE NOT NULL,
	`data_prevista` DATE NOT NULL,
	`data_devolucao` DATE NOT NULL,
	`revalidado` TINYINT NOT NULL DEFAULT 0,
	PRIMARY KEY (`usuario_idusuario`, `livro_idlivro`),
	INDEX `fk_usuario_has_livro_livro1_idx` (`livro_idlivro` ASC),
	INDEX `fk_usuario_has_livro_usuario_idx` (`usuario_idusuario` ASC),
	CONSTRAINT `fk_usuario_has_livro_usuario`
		FOREIGN KEY (`usuario_idusuario`)
		REFERENCES `sysbiblioteca`.`usuario` (`idusuario`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	CONSTRAINT `fk_usuario_has_livro_livro1`
		FOREIGN KEY (`livro_idlivro`)
		REFERENCES `sysbiblioteca`.`livro` (`idlivro`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
