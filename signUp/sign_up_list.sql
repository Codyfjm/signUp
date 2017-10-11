/*
Navicat MySQL Data Transfer

Source Server         : signUp
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : signup

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2017-10-11 22:09:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sign_up_list
-- ----------------------------
DROP TABLE IF EXISTS `sign_up_list`;
CREATE TABLE `sign_up_list` (
  `openid` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phonenum` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `signtime` varchar(255) NOT NULL,
  PRIMARY KEY (`openid`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;
