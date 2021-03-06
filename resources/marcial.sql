-- MySQL Script generated by MySQL Workbench
-- 07/24/15 14:00:08
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema marcial
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema marcial
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `marcial` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `marcial` ;

-- -----------------------------------------------------
-- Table `marcial`.`detalleMatricula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `marcial`.`detalleMatricula` (
  `detalleCod` INT NOT NULL COMMENT '',
  `asignaturaCod` INT NOT NULL COMMENT '',
  `matriculaCod` INT NOT NULL COMMENT '',
  `aulaCod` INT NOT NULL COMMENT '',
  `alumnoCod` INT NOT NULL COMMENT '',
  PRIMARY KEY (`detalleCod`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marcial`.`docente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `marcial`.`docente` (
  `docenteCod` INT NOT NULL COMMENT '',
  `docenteNom` VARCHAR(45) NOT NULL COMMENT '',
  `docenteDir` VARCHAR(45) NOT NULL COMMENT '',
  `docenteNac` VARCHAR(45) NOT NULL COMMENT '',
  `docenteNombre` VARCHAR(50) NOT NULL COMMENT '',
  `docenteSexo` INT NULL COMMENT '',
  PRIMARY KEY (`docenteCod`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marcial`.`asignatura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `marcial`.`asignatura` (
  `asignaturaCod` INT NOT NULL COMMENT '',
  `asignaturaNombre` VARCHAR(100) NOT NULL COMMENT '',
  `maestroCod` INT NULL COMMENT '',
  `detalleMatricula_detalleCod` INT NOT NULL COMMENT '',
  `docente_docenteCod` INT NOT NULL COMMENT '',
  PRIMARY KEY (`asignaturaCod`, `detalleMatricula_detalleCod`, `docente_docenteCod`)  COMMENT '',
  INDEX `fk_asignatura_detalleMatricula1_idx` (`detalleMatricula_detalleCod` ASC)  COMMENT '',
  INDEX `fk_asignatura_docente1_idx` (`docente_docenteCod` ASC)  COMMENT '',
  CONSTRAINT `fk_asignatura_detalleMatricula1`
    FOREIGN KEY (`detalleMatricula_detalleCod`)
    REFERENCES `marcial`.`detalleMatricula` (`detalleCod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignatura_docente1`
    FOREIGN KEY (`docente_docenteCod`)
    REFERENCES `marcial`.`docente` (`docenteCod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marcial`.`aportaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `marcial`.`aportaciones` (
  `aportacionesCod` INT NOT NULL COMMENT '',
  `aportacionesCant` INT NOT NULL COMMENT '',
  `aportacionesDes` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`aportacionesCod`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marcial`.`encargado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `marcial`.`encargado` (
  `encargadoCod` INT NOT NULL COMMENT '',
  `encargadoNom` VARCHAR(100) NOT NULL COMMENT '',
  `encargadoEstadoCivil` VARCHAR(45) NOT NULL COMMENT '',
  `encargadoCel` INT NOT NULL COMMENT '',
  `encargadoDir` VARCHAR(100) NOT NULL COMMENT '',
  `encargadoGenero` VARCHAR(45) NOT NULL COMMENT '',
  `encargadoEstado` VARCHAR(45) NULL COMMENT '',
  `encargadoAporId` INT NULL COMMENT '',
  `aportaciones_aportacionesCod` INT NOT NULL COMMENT '',
  PRIMARY KEY (`encargadoCod`, `aportaciones_aportacionesCod`)  COMMENT '',
  INDEX `fk_encargado_aportaciones1_idx` (`aportaciones_aportacionesCod` ASC)  COMMENT '',
  CONSTRAINT `fk_encargado_aportaciones1`
    FOREIGN KEY (`aportaciones_aportacionesCod`)
    REFERENCES `marcial`.`aportaciones` (`aportacionesCod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marcial`.`alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `marcial`.`alumno` (
  `alumnoCod` INT NOT NULL COMMENT '',
  `alumnoNom` VARCHAR(45) NULL COMMENT '',
  `alumnoDireccion` VARCHAR(45) NULL COMMENT '',
  `alumnoNac` VARCHAR(45) NULL COMMENT '',
  `alumnoProblemaMedico` VARCHAR(250) NULL COMMENT '',
  `alumnoEstado` VARCHAR(45) NULL COMMENT '',
  `alumnoSangre` VARCHAR(45) NULL COMMENT '',
  `alumnoGenero` VARCHAR(45) NULL COMMENT '',
  `detalleMatricula_detalleCod` INT NOT NULL COMMENT '',
  `encargadoCod` INT NULL COMMENT '',
  `encargado_encargadoCod` INT NOT NULL COMMENT '',
  `encargado_aportaciones_aportacionesCod` INT NOT NULL COMMENT '',
  PRIMARY KEY (`alumnoCod`, `detalleMatricula_detalleCod`, `encargado_encargadoCod`, `encargado_aportaciones_aportacionesCod`)  COMMENT '',
  INDEX `fk_alumno_detalleMatricula1_idx` (`detalleMatricula_detalleCod` ASC)  COMMENT '',
  INDEX `fk_alumno_encargado1_idx` (`encargado_encargadoCod` ASC, `encargado_aportaciones_aportacionesCod` ASC)  COMMENT '',
  CONSTRAINT `fk_alumno_detalleMatricula1`
    FOREIGN KEY (`detalleMatricula_detalleCod`)
    REFERENCES `marcial`.`detalleMatricula` (`detalleCod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumno_encargado1`
    FOREIGN KEY (`encargado_encargadoCod` , `encargado_aportaciones_aportacionesCod`)
    REFERENCES `marcial`.`encargado` (`encargadoCod` , `aportaciones_aportacionesCod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marcial`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `marcial`.`usuarios` (
  `usrcod` BIGINT(10) NOT NULL AUTO_INCREMENT COMMENT '',
  `usrnom` VARCHAR(70) NULL COMMENT '',
  `usuariopwd` VARCHAR(256) NULL COMMENT '',
  `usrtel` VARCHAR(20) NULL COMMENT '',
  `usremail` VARCHAR(125) NOT NULL COMMENT '',
  `usrfching` VARCHAR(15) NULL COMMENT '',
  PRIMARY KEY (`usrcod`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marcial`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `marcial`.`roles` (
  `rolcod` VARCHAR(45) NOT NULL COMMENT '',
  `roldsc` VARCHAR(70) NULL COMMENT '',
  `rolest` CHAR(3) NULL COMMENT '',
  PRIMARY KEY (`rolcod`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marcial`.`funciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `marcial`.`funciones` (
  `fnccod` CHAR(8) NOT NULL COMMENT '',
  `fncdsc` VARCHAR(45) NULL COMMENT '',
  `fncest` CHAR(3) NULL COMMENT '',
  PRIMARY KEY (`fnccod`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marcial`.`usuarios_has_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `marcial`.`usuarios_has_roles` (
  `usuarios_usuarioCod` BIGINT(10) NOT NULL COMMENT '',
  `roles_rolCod` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`usuarios_usuarioCod`, `roles_rolCod`)  COMMENT '',
  INDEX `fk_usuarios_has_roles_roles1_idx` (`roles_rolCod` ASC)  COMMENT '',
  INDEX `fk_usuarios_has_roles_usuarios1_idx` (`usuarios_usuarioCod` ASC)  COMMENT '',
  CONSTRAINT `fk_usuarios_has_roles_usuarios1`
    FOREIGN KEY (`usuarios_usuarioCod`)
    REFERENCES `marcial`.`usuarios` (`usrcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_roles_roles1`
    FOREIGN KEY (`roles_rolCod`)
    REFERENCES `marcial`.`roles` (`rolcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marcial`.`roles_has_funciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `marcial`.`roles_has_funciones` (
  `roles_rolCod` VARCHAR(45) NOT NULL COMMENT '',
  `funciones_funcionCod` CHAR(8) NOT NULL COMMENT '',
  PRIMARY KEY (`roles_rolCod`, `funciones_funcionCod`)  COMMENT '',
  INDEX `fk_roles_has_funciones_funciones1_idx` (`funciones_funcionCod` ASC)  COMMENT '',
  INDEX `fk_roles_has_funciones_roles1_idx` (`roles_rolCod` ASC)  COMMENT '',
  CONSTRAINT `fk_roles_has_funciones_roles1`
    FOREIGN KEY (`roles_rolCod`)
    REFERENCES `marcial`.`roles` (`rolcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_roles_has_funciones_funciones1`
    FOREIGN KEY (`funciones_funcionCod`)
    REFERENCES `marcial`.`funciones` (`fnccod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
