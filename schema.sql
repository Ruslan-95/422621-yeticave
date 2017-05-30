CREATE DATABASE `YetiCave`;

USE `YetiCave`;

CREATE TABLE `category`(
  `id` INT AUTO_INCREMENT PRIMARY KEY ,
  `name` CHAR(255)
);

CREATE TABLE `lot`(
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `category_id` INT,
  `user_id` INT,
  `winner_id` INT,
  `date_add` DATETIME,
  `date_final` DATETIME,
  `name` CHAR(128),
  `img` CHAR(128),
  `price` INT,
  `favorit` INT,
  `step_price` INT,
  `description` TEXT
);

CREATE TABLE `bet`(
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `lot_id` INT,
  `user_id` INT,
  `date_add` DATETIME,
  `price` INT
);

CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `email` CHAR(128),
  `name` CHAR(255),
  `date` CHAR(255),
  `avatar` CHAR(128),
  `password` CHAR(32),
  `contact` TEXT
);


CREATE INDEX `name` ON `lot`(`name`);
CREATE UNIQUE INDEX `lot_id` ON `lot`(`id`);
CREATE UNIQUE INDEX `email` ON `users`(`email`);