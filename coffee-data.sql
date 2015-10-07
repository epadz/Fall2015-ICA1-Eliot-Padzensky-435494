CREATE DATABASE 'coffee';
CREATE TABLE `coffee`.`coffees` ( `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `coffee`.`ratings` ( `coffeeId` SMALLINT UNSIGNED NOT NULL , `user` VARCHAR(50) NOT NULL , `rating` DECIMAL(1,1) NOT NULL , `comment` TINYTEXT NOT NULL, FOREIGN KEY (`coffeeId`) REFERENCES `coffee`.`coffees`(`id`)) ENGINE = InnoDB;
