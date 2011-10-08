/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : ik_game

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-04-24 19:05:27
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `alpha_trade_routes`
-- ----------------------------
DROP TABLE IF EXISTS `alpha_trade_routes`;
CREATE TABLE `alpha_trade_routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `start_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `send_resource` int(11) NOT NULL,
  `send_time` int(11) NOT NULL,
  `send_count` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user`,`from`,`to`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alpha_trade_routes
-- ----------------------------
