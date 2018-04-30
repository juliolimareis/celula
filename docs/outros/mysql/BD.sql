CREATE SCHEMA IF NOT EXISTS `celula` DEFAULT CHARACTER SET utf8 ;
USE `celula` ;

CREATE TABLE IF NOT EXISTS `celula`.`element` (
  `id_element` INT NOT NULL AUTO_INCREMENT,
  `cito` INT NULL,
  `cloro` INT NULL,
  `comp` INT NULL,
  `memb_celu` INT NULL,
  `memb_nucl` INT NULL,
  `mito` INT NULL,
  `nucl` INT NULL,
  `reti` INT NULL,
  `vacu` INT NULL,
  PRIMARY KEY (`id_element`))
ENGINE = InnoDB

USE celula;

UPDATE `celula`.`element` SET `cito`='0', `cloro`='0', `comp`='0', `memb_celu`='0', `memb_nucl`='0', `mito`='0', `nucl`='0', `reti`='0', `vacu`='0' WHERE `id_element`='0';


CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
