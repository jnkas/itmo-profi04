-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema new_schema1
-- -----------------------------------------------------
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`order` (
  `idorder` INT NOT NULL,
  PRIMARY KEY (`idorder`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`buyer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`buyer` (
  `idbuyer` INT NOT NULL,
  `user` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `date` DATE NOT NULL,
  `account ballance` INT NOT NULL,
  `descrip` VARCHAR(45) NOT NULL,
  `order_idorder` INT NOT NULL,
  PRIMARY KEY (`idbuyer`, `order_idorder`),
  INDEX `fk_buyer_order_idx` (`order_idorder` ASC),
  CONSTRAINT `fk_buyer_order`
    FOREIGN KEY (`order_idorder`)
    REFERENCES `mydb`.`order` (`idorder`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`product` (
  `idproduct` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `price` INT NOT NULL,
  `quantity` INT NULL,
  `` VARCHAR(45) NULL,
  `order_idorder` INT NOT NULL,
  PRIMARY KEY (`idproduct`, `order_idorder`),
  INDEX `fk_product_order1_idx` (`order_idorder` ASC),
  CONSTRAINT `fk_product_order1`
    FOREIGN KEY (`order_idorder`)
    REFERENCES `mydb`.`order` (`idorder`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`product characteristics`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`product characteristics` (
  `product_idproduct` INT NOT NULL,
  `product_order_idorder` INT NOT NULL,
  PRIMARY KEY (`product_idproduct`, `product_order_idorder`),
  CONSTRAINT `fk_product characteristics_product1`
    FOREIGN KEY (`product_idproduct` , `product_order_idorder`)
    REFERENCES `mydb`.`product` (`idproduct` , `order_idorder`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`characteristics`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`characteristics` (
  `color` VARCHAR(45) NOT NULL,
  `product characteristics_product_idproduct` INT NOT NULL,
  `product characteristics_product_order_idorder` INT NOT NULL,
  PRIMARY KEY (`product characteristics_product_idproduct`, `product characteristics_product_order_idorder`),
  CONSTRAINT `fk_characteristics_product characteristics1`
    FOREIGN KEY (`product characteristics_product_idproduct` , `product characteristics_product_order_idorder`)
    REFERENCES `mydb`.`product characteristics` (`product_idproduct` , `product_order_idorder`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`table1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`table1` (
  `characteristics_product characteristics_product_idproduct` INT NOT NULL,
  `characteristics_product characteristics_product_order_idorder` INT NOT NULL,
  PRIMARY KEY (`characteristics_product characteristics_product_idproduct`, `characteristics_product characteristics_product_order_idorder`),
  CONSTRAINT `fk_table1_characteristics1`
    FOREIGN KEY (`characteristics_product characteristics_product_idproduct` , `characteristics_product characteristics_product_order_idorder`)
    REFERENCES `mydb`.`characteristics` (`product characteristics_product_idproduct` , `product characteristics_product_order_idorder`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`unit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`unit` (
  `table1_characteristics_product characteristics_product_idproduct` INT NOT NULL,
  `table1_characteristics_product characteristics_product_order_idorder` INT NOT NULL,
  PRIMARY KEY (`table1_characteristics_product characteristics_product_idproduct`, `table1_characteristics_product characteristics_product_order_idorder`),
  CONSTRAINT `fk_unit_table11`
    FOREIGN KEY (`table1_characteristics_product characteristics_product_idproduct` , `table1_characteristics_product characteristics_product_order_idorder`)
    REFERENCES `mydb`.`table1` (`characteristics_product characteristics_product_idproduct` , `characteristics_product characteristics_product_order_idorder`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `mydb` ;

-- -----------------------------------------------------
-- Placeholder table for view `mydb`.`view1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`view1` (`id` INT);

-- -----------------------------------------------------
-- Placeholder table for view `mydb`.`view2`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`view2` (`id` INT);

-- -----------------------------------------------------
-- Placeholder table for view `mydb`.`view3`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`view3` (`id` INT);

-- -----------------------------------------------------
--  routine1
-- -----------------------------------------------------

DELIMITER $$
USE `mydb`$$
$$

DELIMITER ;

-- -----------------------------------------------------
--  routine2
-- -----------------------------------------------------

DELIMITER $$
USE `mydb`$$
$$

DELIMITER ;

-- -----------------------------------------------------
-- View `mydb`.`view1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`view1`;
USE `mydb`;


-- -----------------------------------------------------
-- View `mydb`.`view2`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`view2`;
USE `mydb`;


-- -----------------------------------------------------
-- View `mydb`.`view3`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`view3`;
USE `mydb`;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
