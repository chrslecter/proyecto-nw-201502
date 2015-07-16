-- MySQL Script generated by MySQL Workbench
-- Tue Jul 14 19:50:16 2015
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema nw201502
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema nw201502
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `nw201502` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `nw201502` ;

-- -----------------------------------------------------
-- Table `nw201502`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nw201502`.`roles` (
  `rolcod` VARCHAR(45) NOT NULL,
  `roldsc` VARCHAR(70) NULL,
  `rolest` CHAR(3) NULL,
  PRIMARY KEY (`rolcod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nw201502`.`funciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nw201502`.`funciones` (
  `fnccod` CHAR(8) NOT NULL,
  `fncdsc` VARCHAR(45) NULL,
  `fncest` CHAR(3) NULL,
  PRIMARY KEY (`fnccod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nw201502`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nw201502`.`usuarios` (
  `usrcod` BIGINT(10) NOT NULL AUTO_INCREMENT,
  `usremail` VARCHAR(125) NULL,
  `usrpwd` VARCHAR(256) NULL,
  `usrnom` VARCHAR(70) NULL,
  `usrfoto` VARCHAR(60) NULL,
  `usrdir` VARCHAR(70) NULL,
  `usrtel` VARCHAR(20) NULL,
  `usrtel2` VARCHAR(20) NULL,
  `usrgen` CHAR(1) NULL,
  `usrfching` DATETIME NULL,
  `usrlstlgn` DATETIME NULL,
  `usrpwdexp` DATETIME NULL,
  `usrest` CHAR(3) NULL,
  PRIMARY KEY (`usrcod`),
  UNIQUE INDEX `usremail_UNIQUE` (`usremail` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nw201502`.`usrroles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nw201502`.`usrroles` (
  `usuarios_usrcod` BIGINT(10) NOT NULL,
  `roles_rolcod` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`usuarios_usrcod`, `roles_rolcod`),
  INDEX `fk_usuarios_has_roles_roles1_idx` (`roles_rolcod` ASC),
  INDEX `fk_usuarios_has_roles_usuarios_idx` (`usuarios_usrcod` ASC),
  CONSTRAINT `fk_usuarios_has_roles_usuarios`
    FOREIGN KEY (`usuarios_usrcod`)
    REFERENCES `nw201502`.`usuarios` (`usrcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_roles_roles1`
    FOREIGN KEY (`roles_rolcod`)
    REFERENCES `nw201502`.`roles` (`rolcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nw201502`.`rolesfnc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nw201502`.`rolesfnc` (
  `roles_rolcod` VARCHAR(45) NOT NULL,
  `funciones_fnccod` CHAR(8) NOT NULL,
  PRIMARY KEY (`roles_rolcod`, `funciones_fnccod`),
  INDEX `fk_roles_has_funciones_funciones1_idx` (`funciones_fnccod` ASC),
  INDEX `fk_roles_has_funciones_roles1_idx` (`roles_rolcod` ASC),
  CONSTRAINT `fk_roles_has_funciones_roles1`
    FOREIGN KEY (`roles_rolcod`)
    REFERENCES `nw201502`.`roles` (`rolcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_roles_has_funciones_funciones1`
    FOREIGN KEY (`funciones_fnccod`)
    REFERENCES `nw201502`.`funciones` (`fnccod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
