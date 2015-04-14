-- MySQL Script generated by MySQL Workbench
-- 04/14/15 09:45:56
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- Nasza baza.

-- -----------------------------------------------------
-- Schema mydb
--
-- Nasza baza.
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Ankiety`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Ankiety` (
  `idAnkiety` INT NOT NULL,
  `Rodzaj pytania` VARCHAR(45) NULL,
  `Typ ankiety` VARCHAR(45) NULL,
  `Anonimowość` VARCHAR(45) NULL,
  `Wstęp` VARCHAR(45) NULL,
  PRIMARY KEY (`idAnkiety`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Pytania`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Pytania` (
  `idPytania` INT NOT NULL,
  `Treść pytania 1` VARCHAR(45) NULL,
  `Odpowiedź 1` VARCHAR(45) NULL,
  `Treść pytania 2` VARCHAR(45) NULL,
  `Odpowiedź 2` VARCHAR(45) NULL,
  `Treść pytania 3` VARCHAR(45) NULL,
  `Odpowiedź 3` VARCHAR(45) NULL,
  PRIMARY KEY (`idPytania`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Użytkownicy`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Użytkownicy` (
  `idUżytkownicy` INT NOT NULL,
  `Imię` VARCHAR(45) NULL,
  `Nazwisko` VARCHAR(45) NULL,
  `Płeć` VARCHAR(45) NULL,
  `Data urodzenia` DATE NULL,
  `Miejsce zamieszkania` VARCHAR(45) NULL,
  `Adres e-mail` VARCHAR(45) NULL,
  `Informacja` VARCHAR(200) NULL,
  `Data założenia konta` DATE NULL,
  `Wypełnione ankiety` INT NULL,
  `Zamieszczone ankiety` INT NULL,
  `Login` VARCHAR(45) NULL,
  `Hasło` VARCHAR(45) NULL,
  `Pełniona funkcja` VARCHAR(45) NULL,
  PRIMARY KEY (`idUżytkownicy`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Wykresy`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Wykresy` (
  `idWykresy` INT NOT NULL,
  `Kolumnowy` VARCHAR(45) NULL,
  `Liniowy` VARCHAR(45) NULL,
  `Słupkowy` VARCHAR(45) NULL,
  PRIMARY KEY (`idWykresy`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Zaproszenia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Zaproszenia` (
  `idZaproszenia` INT NOT NULL,
  `Tytuł ankiety` VARCHAR(45) NULL,
  `Cel ankiety` VARCHAR(45) NULL,
  `Krótki opis` VARCHAR(45) NULL,
  PRIMARY KEY (`idZaproszenia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Typy użytkowników`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Typy użytkowników` (
  `idTypy użytkowników` INT NOT NULL,
  `Administrator` INT NULL,
  `Ankietujący` INT NULL,
  `Ankietowany` INT NULL,
  PRIMARY KEY (`idTypy użytkowników`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
