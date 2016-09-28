/*
Navicat MySQL Data Transfer

Source Server         : lumba_lumba
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : nyoba_anu

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-09-28 23:31:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_anu
-- ----------------------------
DROP TABLE IF EXISTS `tb_anu`;
CREATE TABLE `tb_anu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_anu
-- ----------------------------
