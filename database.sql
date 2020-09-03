CREATE DATABASE PID;
USE PID;
CREATE TABLE `users` (userID int(10) ZEROFILL NOT NULL PRIMARY KEY AUTO_INCREMENT,account varchar(30),password varchar(60),personID varchar(30),ban enum ('Y','N') DEFAULT 'N' NOT NULL);
CREATE TABLE `userDetail`(userID int(10) ZEROFILL NOT NULL ,account varchar(30),orderID int(10) ZEROFILL NOT NULL,datatime timestamp  DEFAULT CURRENT_TIMESTAMP,actionName varchar(30),price int(30) UNSIGNED,status varchar(30),sellerID int(10) ZEROFILL NOT NULL);
CREATE TABLE `commodity` (userID int(10) ZEROFILL NOT NULL,commodityID int(10) ZEROFILL NOT NULL PRIMARY KEY  AUTO_INCREMENT,datatime timestamp  DEFAULT CURRENT_TIMESTAMP,name varchar(30)NOT NULL,category varchar(30)NOT NULL,quantity int(10) UNSIGNED NOT NULL,quantitySold int(10) UNSIGNED NOT NULL,price int(10) UNSIGNED NOT NULL,description varchar(200),img longblob NOT NULL);
CREATE TABLE `inventory` (userID int(10) ZEROFILL NOT NULL ,commodityID int(10) ZEROFILL NOT NULL ,quantity int(10) UNSIGNED NOT NULL,quantitySold int(10));
CREATE TABLE `order` (orderID int(10) ZEROFILL NOT NULL ,datatime timestamp  DEFAULT CURRENT_TIMESTAMP, userID int(10) ZEROFILL NOT NULL ,sellerID int(10) ZEROFILL NOT NULL,commodityID int(10) ZEROFILL NOT NULL ,quantity int(10) UNSIGNED NOT NULL,price int(10) UNSIGNED NOT NULL);
CREATE TABLE `shopCart` (userID int(10) ZEROFILL NOT NULL ,sellerID int(10) ZEROFILL NOT NULL,commodityID int(10) ZEROFILL NOT NULL ,quantity int(10) UNSIGNED NOT NULL,price int(10) UNSIGNED NOT NULL);

DELIMITER $$
CREATE TRIGGER ins_commodity
AFTER INSERT ON commodity FOR EACH ROW BEGIN
INSERT INTO inventory (userID, commodityID, quantity)
Values (new.userID, new.commodityID, new.quantity);
END;
$$
DELIMITER $$
CREATE TRIGGER upd_commodity
AFTER INSERT ON commodity FOR EACH ROW BEGIN
UPDATE inventory SET quantity = new.quantity
WHERE userID = new.userID && commodityID = new.commodityID;
END;
$$

$sqlStatement.="ON DUPLICATE KEY UPDATE obsTime=VALUES(obsTime),HOUR_24=VALUES(HOUR_24),RAIN=VALUES(RAIN);";




                