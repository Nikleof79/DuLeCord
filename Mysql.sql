/*
    This file is for re-create the database and tables in MySQL.
    😎 <- this is me;
*/
CREATE DATABASE IF NOT EXISTS `dulecord` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `dulecord`;
/* Create the tables */
/* Table: users */
CREATE TABLE `dulecord`.`users` (`username` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `name` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `password` VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'here is bcrypt algorithm' , `hasAvatar` BOOLEAN NOT NULL DEFAULT FALSE , `about` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL , `setting` TINYTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'json format setting' ) ENGINE = InnoDB; 

/* Table: messages */