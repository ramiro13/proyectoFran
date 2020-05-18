CREATE TABLE `tienda_master`.`servicios_cliente` ( `id` SERIAL NOT NULL , `idCategoria` INT NOT NULL , `categoria` VARCHAR(200) NOT NULL , `cliente` VARCHAR(200) NOT NULL , `inicio` DATETIME NOT NULL , `fin` DATETIME NOT NULL , `tiempo` INT NOT NULL , `usuario` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `tienda_master`.`servicios_cliente_accion` ( `id` SERIAL NOT NULL , `idServicioCliente` BIGINT UNSIGNED NOT NULL , `idAccion` BIGINT UNSIGNED NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `servicios_cliente` ADD FOREIGN KEY (`idCategoria`) REFERENCES `categorias`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `servicios_cliente_accion` ADD FOREIGN KEY (`idAccion`) REFERENCES `acciones`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `servicios_cliente_accion` ADD FOREIGN KEY (`idServicioCliente`) REFERENCES `servicios_cliente`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;