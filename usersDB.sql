CREATE DATABASE PHPUsersDB

--Generated in phpMyAdmin.
CREATE TABLE `phpusersdb`.`users` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `username` VARCHAR(50) NOT NULL ,
    `email` VARCHAR(50) NOT NULL ,
    `user_password` VARCHAR(150) NOT NULL ,
    `phone` VARCHAR(15) NOT NULL ,
    PRIMARY KEY (`id`)
 ) ENGINE = InnoDB; 
GO