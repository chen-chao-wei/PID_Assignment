CREATE DATABASE PID;
USE PID;
CREATE TABLE users (userID int NOT NULL PRIMARY KEY AUTO_INCREMENT,account varchar(30),password varchar(60),personID varchar(30));
CREATE TABLE userDetail(userID int NOT NULL ,account varchar(30),datatime timestamp  DEFAULT CURRENT_TIMESTAMP,actionName varchar(30),amount varchar(30),status varchar(30),sellerID varchar(30) NOT NULL,commodityID varchar(30) NOT NULL);
CREATE TABLE commodity (userID int NOT NULL,commodityID int NOT NULL PRIMARY KEY AUTO_INCREMENT,datatime timestamp  DEFAULT CURRENT_TIMESTAMP,name varchar(30),category varchar(30),price int(10),description varchar(200),img longblob);
CREATE TABLE inventory (userID int NOT NULL PRIMARY KEY,commodityID int,quantity int(10),quantitySold int(10));



$sqlStatement.="ON DUPLICATE KEY UPDATE obsTime=VALUES(obsTime),HOUR_24=VALUES(HOUR_24),RAIN=VALUES(RAIN);";