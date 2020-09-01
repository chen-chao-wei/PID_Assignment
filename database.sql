CREATE DATABASE PID;
USE PID;
CREATE TABLE users (userID int NOT NULL PRIMARY KEY AUTO_INCREMENT,account varchar(30),password varchar(60),personID varchar(30),ban enum('Y','N'));
CREATE TABLE userDetail(userID int NOT NULL ,account varchar(30),datatime timestamp  DEFAULT CURRENT_TIMESTAMP,actionName varchar(30),amount varchar(30),status varchar(30),sellerID varchar(30) NOT NULL,commodityID varchar(30) NOT NULL);
CREATE TABLE commodity (userID int NOT NULL,commodityID int ZEROFILL NOT NULL PRIMARY KEY  AUTO_INCREMENT,datatime timestamp  DEFAULT CURRENT_TIMESTAMP,name varchar(30)NOT NULL,category varchar(30)NOT NULL,quantity int(10) NOT NULL,price int(10) NOT NULL,description varchar(200),img longblob NOT NULL);
CREATE TABLE inventory (userID int NOT NULL PRIMARY KEY,commodityID int ZEROFILL NOT NULL ,quantity int(10),quantitySold int(10));

DELIMITER $$
CREATE TRIGGER ins_commodity
AFTER INSERT ON commodity FOR EACH ROW BEGIN
INSERT INTO inventory (userID, commodityID, quantity)
Values (new.userID, new.commodityID, new.quantity);
END;
$$


$sqlStatement.="ON DUPLICATE KEY UPDATE obsTime=VALUES(obsTime),HOUR_24=VALUES(HOUR_24),RAIN=VALUES(RAIN);";