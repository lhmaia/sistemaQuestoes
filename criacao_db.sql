-- MySQL Script generated by MySQL Workbench
-- 12/23/14 21:22:09
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema sist_questoes
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sist_questoes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sist_questoes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `sist_questoes` ;

-- -----------------------------------------------------
-- Table `sist_questoes`.`autores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sist_questoes`.`autores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `observacoes` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sist_questoes`.`questoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sist_questoes`.`questoes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `enunciado` VARCHAR(512) NULL,
  `dificuldade` VARCHAR(45) NULL,
  `palavras-chave` VARCHAR(45) NULL,
  `autor_id` INT NOT NULL,
  `tipo_prova` TINYINT(1) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Questao_Autor1_idx` (`autor_id` ASC),
  CONSTRAINT `fk_Questao_Autor1`
    FOREIGN KEY (`autor_id`)
    REFERENCES `sist_questoes`.`autores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sist_questoes`.`niveis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sist_questoes`.`niveis` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL COMMENT 'Pode ser superior, médio, fundamental, técnico, etc.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sist_questoes`.`provas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sist_questoes`.`provas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ano` VARCHAR(4) NULL,
  `objetivo` VARCHAR(45) NULL COMMENT 'Descreve para qual órgão, série, instituto será a prova. Pode ser utilizado para descrever se é uma prova final ou intermediária por exemplo.',
  `observacoes` VARCHAR(100) NULL,
  `nivel_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Prova_Nivel1_idx` (`nivel_id` ASC),
  CONSTRAINT `fk_Prova_Nivel1`
    FOREIGN KEY (`nivel_id`)
    REFERENCES `sist_questoes`.`niveis` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sist_questoes`.`provas_questoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sist_questoes`.`provas_questoes` (
  `prova_id` INT NOT NULL,
  `questao_id` INT NOT NULL,
  PRIMARY KEY (`prova_id`, `questao_id`),
  INDEX `fk_Prova_has_Questao_Questao1_idx` (`questao_id` ASC),
  INDEX `fk_Prova_has_Questao_Prova_idx` (`prova_id` ASC),
  CONSTRAINT `fk_Prova_has_Questao_Prova`
    FOREIGN KEY (`prova_id`)
    REFERENCES `sist_questoes`.`provas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prova_has_Questao_Questao1`
    FOREIGN KEY (`questao_id`)
    REFERENCES `sist_questoes`.`questoes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sist_questoes`.`disciplinas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sist_questoes`.`disciplinas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sist_questoes`.`assuntos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sist_questoes`.`assuntos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NULL,
  `disciplina_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Assunto_Disciplina1_idx` (`disciplina_id` ASC),
  CONSTRAINT `fk_Assunto_Disciplina1`
    FOREIGN KEY (`disciplina_id`)
    REFERENCES `sist_questoes`.`disciplinas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sist_questoes`.`assuntos_questoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sist_questoes`.`assuntos_questoes` (
  `questao_id` INT NOT NULL,
  `assunto_id` INT NOT NULL,
  PRIMARY KEY (`questao_id`, `assunto_id`),
  INDEX `fk_Questao_has_Assunto_Assunto1_idx` (`assunto_id` ASC),
  INDEX `fk_Questao_has_Assunto_Questao1_idx` (`questao_id` ASC),
  CONSTRAINT `fk_Questao_has_Assunto_Questao1`
    FOREIGN KEY (`questao_id`)
    REFERENCES `sist_questoes`.`questoes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Questao_has_Assunto_Assunto1`
    FOREIGN KEY (`assunto_id`)
    REFERENCES `sist_questoes`.`assuntos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sist_questoes`.`alternativas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sist_questoes`.`alternativas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `questao_id` INT NOT NULL,
  `letra` VARCHAR(1) NOT NULL,
  `texto` VARCHAR(45) NULL,
  `certo` TINYINT(1) NULL,
  INDEX `fk_alternativa_Questao1_idx` (`questao_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_alternativa_Questao1`
    FOREIGN KEY (`questao_id`)
    REFERENCES `sist_questoes`.`questoes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
