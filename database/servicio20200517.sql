CREATE TABLE `tienda_master`.`servicios` ( `id` SERIAL NOT NULL , `nombre` VARCHAR(100) NOT NULL , `descripcion` VARCHAR(500) NOT NULL , `activo` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `tienda_master`.`servicios_imagen` ( `id` SERIAL NOT NULL , `idServicio` BIGINT UNSIGNED NOT NULL , `imagen` VARCHAR(100) NOT NULL , `activo` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `servicios_imagen` ADD FOREIGN KEY (`idServicio`) REFERENCES `servicios`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `servicios` ADD `idCategoria` INT NOT NULL AFTER `id`;

ALTER TABLE `servicios` ADD FOREIGN KEY (`idCategoria`) REFERENCES `categorias`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;