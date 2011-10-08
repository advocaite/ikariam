/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50024
Source Host           : localhost:3306
Source Database       : ik_game

Target Server Type    : MYSQL
Target Server Version : 50024
File Encoding         : 65001

Date: 2010-04-18 13:38:30
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `alpha_army`
-- ----------------------------
DROP TABLE IF EXISTS `alpha_army`;
CREATE TABLE `alpha_army` (
  `city` int(11) NOT NULL,
  `army_line` varchar(255) character set utf8 NOT NULL,
  `army_start` int(11) NOT NULL,
  `ships_line` varchar(255) character set utf8 NOT NULL,
  `ships_start` int(11) NOT NULL,
  `phalanx` int(11) NOT NULL,
  `steamgiant` int(11) NOT NULL,
  `spearman` int(11) NOT NULL,
  `swordsman` int(11) NOT NULL,
  `slinger` int(11) NOT NULL,
  `archer` int(11) NOT NULL,
  `marksman` int(11) NOT NULL,
  `ram` int(11) NOT NULL,
  `catapult` int(11) NOT NULL,
  `mortar` int(11) NOT NULL,
  `gyrocopter` int(11) NOT NULL,
  `bombardier` int(11) NOT NULL,
  `cook` int(11) NOT NULL,
  `medic` int(11) NOT NULL,
  `barbarian` int(11) NOT NULL,
  `ship_ram` int(11) NOT NULL,
  `ship_flamethrower` int(11) NOT NULL,
  `ship_steamboat` int(11) NOT NULL,
  `ship_ballista` int(11) NOT NULL,
  `ship_catapult` int(11) NOT NULL,
  `ship_mortar` int(11) NOT NULL,
  `ship_submarine` int(11) NOT NULL,
  `ship_transport` int(11) NOT NULL,
  PRIMARY KEY  (`city`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of alpha_army
-- ----------------------------

-- ----------------------------
-- Table structure for `alpha_banners`
-- ----------------------------
DROP TABLE IF EXISTS `alpha_banners`;
CREATE TABLE `alpha_banners` (
  `id` int(11) NOT NULL auto_increment,
  `frame` text character set utf8 NOT NULL,
  `image` text character set utf8 NOT NULL,
  `link` text character set utf8 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of alpha_banners
-- ----------------------------

-- ----------------------------
-- Table structure for `alpha_double_login`
-- ----------------------------
DROP TABLE IF EXISTS `alpha_double_login`;
CREATE TABLE `alpha_double_login` (
  `id` int(11) NOT NULL auto_increment,
  `account_from` int(11) NOT NULL,
  `account_to` int(11) NOT NULL,
  `login_time` int(11) NOT NULL,
  `ip_address` varchar(15) character set utf8 NOT NULL,
  PRIMARY KEY  (`id`,`account_from`,`account_to`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of alpha_double_login
-- ----------------------------

-- ----------------------------
-- Table structure for `alpha_islands`
-- ----------------------------
DROP TABLE IF EXISTS `alpha_islands`;
CREATE TABLE `alpha_islands` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) character set utf8 NOT NULL default 'Остров',
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `type` int(11) NOT NULL default '1',
  `trade_resource` int(11) NOT NULL default '3',
  `wonder` int(11) NOT NULL default '0',
  `wood_level` int(11) NOT NULL default '1',
  `trade_level` int(11) NOT NULL default '1',
  `wood_count` int(11) NOT NULL default '0',
  `trade_count` int(11) NOT NULL default '0',
  `wood_start` int(11) NOT NULL default '0',
  `trade_start` int(11) NOT NULL default '0',
  `city0` int(11) NOT NULL default '0',
  `city1` int(11) NOT NULL default '0',
  `city2` int(11) NOT NULL default '0',
  `city3` int(11) NOT NULL default '0',
  `city4` int(11) NOT NULL default '0',
  `city5` int(11) NOT NULL default '0',
  `city6` int(11) NOT NULL default '0',
  `city7` int(11) NOT NULL default '0',
  `city8` int(11) NOT NULL default '0',
  `city9` int(11) NOT NULL default '0',
  `city10` int(11) NOT NULL default '0',
  `city11` int(11) NOT NULL default '0',
  `city12` int(11) NOT NULL default '0',
  `city13` int(11) NOT NULL default '0',
  `city14` int(11) NOT NULL default '0',
  `city15` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`,`name`,`x`,`y`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of alpha_islands
-- ----------------------------

-- ----------------------------
-- Table structure for `alpha_missions`
-- ----------------------------
DROP TABLE IF EXISTS `alpha_missions`;
CREATE TABLE `alpha_missions` (
  `id` int(11) NOT NULL auto_increment,
  `user` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `loading_from_start` int(11) NOT NULL,
  `loading_to_start` int(11) NOT NULL,
  `mission_type` int(11) NOT NULL,
  `mission_start` int(11) NOT NULL,
  `return_start` int(11) NOT NULL,
  `wood` int(11) NOT NULL,
  `wine` int(11) NOT NULL,
  `marble` int(11) NOT NULL,
  `crystal` int(11) NOT NULL,
  `sulfur` int(11) NOT NULL,
  `gold` int(11) NOT NULL default '0',
  `peoples` int(11) NOT NULL,
  `phalanx` int(11) NOT NULL,
  `steamgiant` int(11) NOT NULL,
  `spearman` int(11) NOT NULL,
  `swordsman` int(11) NOT NULL,
  `slinger` int(11) NOT NULL,
  `archer` int(11) NOT NULL,
  `marksman` int(11) NOT NULL,
  `ram` int(11) NOT NULL,
  `catapult` int(11) NOT NULL,
  `mortar` int(11) NOT NULL,
  `gyrocopter` int(11) NOT NULL,
  `bombardier` int(11) NOT NULL,
  `cook` int(11) NOT NULL,
  `medic` int(11) NOT NULL,
  `barbarian` int(11) NOT NULL,
  `ship_ram` int(11) NOT NULL,
  `ship_flamethrower` int(11) NOT NULL,
  `ship_steamboat` int(11) NOT NULL,
  `ship_ballista` int(11) NOT NULL,
  `ship_catapult` int(11) NOT NULL,
  `ship_mortar` int(11) NOT NULL,
  `ship_submarine` int(11) NOT NULL,
  `ship_transport` int(11) NOT NULL,
  `percent` varchar(11) character set utf8 NOT NULL default '0',
  `trade_wood_count` int(11) NOT NULL,
  `trade_wine_count` int(11) NOT NULL,
  `trade_marble_count` int(11) NOT NULL,
  `trade_crystal_count` int(11) NOT NULL,
  `trade_sulfur_count` int(11) NOT NULL,
  `trade_gold_count` int(11) NOT NULL,
  `trade_wood_cost` int(11) NOT NULL,
  `trade_wine_cost` int(11) NOT NULL,
  `trade_marble_cost` int(11) NOT NULL,
  `trade_crystal_cost` int(11) NOT NULL,
  `trade_sulfur_cost` int(11) NOT NULL,
  PRIMARY KEY  (`id`,`user`,`from`,`to`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of alpha_missions
-- ----------------------------

-- ----------------------------
-- Table structure for `alpha_notes`
-- ----------------------------
DROP TABLE IF EXISTS `alpha_notes`;
CREATE TABLE `alpha_notes` (
  `user` int(11) NOT NULL,
  `text` text character set utf8 NOT NULL,
  PRIMARY KEY  (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of alpha_notes
-- ----------------------------

-- ----------------------------
-- Table structure for `alpha_research`
-- ----------------------------
DROP TABLE IF EXISTS `alpha_research`;
CREATE TABLE `alpha_research` (
  `user` int(11) NOT NULL,
  `points` varchar(255) collate latin1_general_ci NOT NULL default '0',
  `res1_1` int(11) NOT NULL,
  `res1_2` int(11) NOT NULL,
  `res1_3` int(11) NOT NULL,
  `res1_4` int(11) NOT NULL,
  `res1_5` int(11) NOT NULL,
  `res1_6` int(11) NOT NULL,
  `res1_7` int(11) NOT NULL,
  `res1_8` int(11) NOT NULL,
  `res1_9` int(11) NOT NULL,
  `res1_10` int(11) NOT NULL,
  `res1_11` int(11) NOT NULL,
  `res1_12` int(11) NOT NULL,
  `res1_13` int(11) NOT NULL,
  `res1_14` int(11) NOT NULL,
  `res2_1` int(11) NOT NULL,
  `res2_2` int(11) NOT NULL,
  `res2_3` int(11) NOT NULL,
  `res2_4` int(11) NOT NULL,
  `res2_5` int(11) NOT NULL,
  `res2_6` int(11) NOT NULL,
  `res2_7` int(11) NOT NULL,
  `res2_8` int(11) NOT NULL,
  `res2_9` int(11) NOT NULL,
  `res2_10` int(11) NOT NULL,
  `res2_11` int(11) NOT NULL,
  `res2_12` int(11) NOT NULL,
  `res2_13` int(11) NOT NULL,
  `res2_14` int(11) NOT NULL,
  `res2_15` int(11) NOT NULL,
  `res3_1` int(11) NOT NULL,
  `res3_2` int(11) NOT NULL,
  `res3_3` int(11) NOT NULL,
  `res3_4` int(11) NOT NULL,
  `res3_5` int(11) NOT NULL,
  `res3_6` int(11) NOT NULL,
  `res3_7` int(11) NOT NULL,
  `res3_8` int(11) NOT NULL,
  `res3_9` int(11) NOT NULL,
  `res3_10` int(11) NOT NULL,
  `res3_11` int(11) NOT NULL,
  `res3_12` int(11) NOT NULL,
  `res3_13` int(11) NOT NULL,
  `res3_14` int(11) NOT NULL,
  `res3_15` int(11) NOT NULL,
  `res3_16` int(11) NOT NULL,
  `res4_1` int(11) NOT NULL,
  `res4_2` int(11) NOT NULL,
  `res4_3` int(11) NOT NULL,
  `res4_4` int(11) NOT NULL,
  `res4_5` int(11) NOT NULL,
  `res4_6` int(11) NOT NULL,
  `res4_7` int(11) NOT NULL,
  `res4_8` int(11) NOT NULL,
  `res4_9` int(11) NOT NULL,
  `res4_10` int(11) NOT NULL,
  `res4_11` int(11) NOT NULL,
  `res4_12` int(11) NOT NULL,
  `res4_13` int(11) NOT NULL,
  `res4_14` int(11) NOT NULL,
  `way1_checked` int(11) NOT NULL,
  `way2_checked` int(11) NOT NULL,
  `way3_checked` int(11) NOT NULL,
  `way4_checked` int(11) NOT NULL,
  PRIMARY KEY  (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of alpha_research
-- ----------------------------

-- ----------------------------
-- Table structure for `alpha_town_messages`
-- ----------------------------
DROP TABLE IF EXISTS `alpha_town_messages`;
CREATE TABLE `alpha_town_messages` (
  `id` int(11) NOT NULL auto_increment,
  `user` int(11) NOT NULL,
  `town` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `text` text character set utf8 NOT NULL,
  `checked` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`,`user`,`town`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of alpha_town_messages
-- ----------------------------

-- ----------------------------
-- Table structure for `alpha_towns`
-- ----------------------------
DROP TABLE IF EXISTS `alpha_towns`;
CREATE TABLE `alpha_towns` (
  `id` int(11) NOT NULL auto_increment,
  `user` int(11) NOT NULL,
  `island` int(11) NOT NULL,
  `position` int(11) NOT NULL default '0',
  `last_update` int(11) NOT NULL,
  `name` varchar(255) character set utf8 NOT NULL default 'Полис',
  `wood` varchar(255) character set utf8 NOT NULL default '160',
  `wine` varchar(255) character set utf8 NOT NULL default '0',
  `marble` varchar(255) character set utf8 NOT NULL default '0',
  `crystal` varchar(255) character set utf8 NOT NULL default '0',
  `sulfur` varchar(255) character set utf8 NOT NULL default '0',
  `pos0_type` int(11) NOT NULL default '1',
  `pos0_level` int(11) NOT NULL default '1',
  `pos1_type` int(11) NOT NULL default '0',
  `pos1_level` int(11) NOT NULL default '0',
  `pos2_type` int(11) NOT NULL default '0',
  `pos2_level` int(11) NOT NULL default '0',
  `pos3_type` int(11) NOT NULL default '0',
  `pos3_level` int(11) NOT NULL default '0',
  `pos4_type` int(11) NOT NULL default '0',
  `pos4_level` int(11) NOT NULL default '0',
  `pos5_type` int(11) NOT NULL default '0',
  `pos5_level` int(11) NOT NULL default '0',
  `pos6_type` int(11) NOT NULL default '0',
  `pos6_level` int(11) NOT NULL default '0',
  `pos7_type` int(11) NOT NULL default '0',
  `pos7_level` int(11) NOT NULL default '0',
  `pos8_type` int(11) NOT NULL default '0',
  `pos8_level` int(11) NOT NULL default '0',
  `pos9_type` int(11) NOT NULL default '0',
  `pos9_level` int(11) NOT NULL,
  `pos10_type` int(11) NOT NULL default '0',
  `pos10_level` int(11) NOT NULL default '0',
  `pos11_type` int(11) NOT NULL default '0',
  `pos11_level` int(11) NOT NULL default '0',
  `pos12_type` int(11) NOT NULL default '0',
  `pos12_level` int(11) NOT NULL default '0',
  `pos13_type` int(11) NOT NULL default '0',
  `pos13_level` int(11) NOT NULL default '0',
  `pos14_type` int(11) NOT NULL default '0',
  `pos14_level` int(11) NOT NULL default '0',
  `build_line` varchar(255) collate latin1_general_ci NOT NULL,
  `build_start` int(11) NOT NULL default '0',
  `peoples` varchar(255) character set utf8 NOT NULL default '40',
  `workers` varchar(255) character set utf8 NOT NULL default '0',
  `tradegood` varchar(255) character set utf8 NOT NULL default '0',
  `scientists` varchar(255) character set utf8 NOT NULL default '0',
  `templer` varchar(255) character set utf8 NOT NULL default '0',
  `workers_wood` int(11) NOT NULL default '0',
  `tradegood_wood` int(11) NOT NULL default '0',
  `actions` varchar(255) character set utf8 NOT NULL default '3',
  `tavern_wine` int(11) NOT NULL default '0',
  `branch_search_type` int(11) NOT NULL default '0',
  `branch_search_resource` int(11) NOT NULL default '0',
  `branch_search_radius` int(11) NOT NULL default '1',
  `branch_trade_wood_type` int(11) NOT NULL default '1',
  `branch_trade_wine_type` int(11) NOT NULL default '1',
  `branch_trade_marble_type` int(11) NOT NULL default '1',
  `branch_trade_crystal_type` int(11) NOT NULL default '1',
  `branch_trade_sulfur_type` int(11) NOT NULL default '1',
  `branch_trade_wood_count` int(11) NOT NULL default '0',
  `branch_trade_wine_count` int(11) NOT NULL default '0',
  `branch_trade_marble_count` int(11) NOT NULL default '0',
  `branch_trade_crystal_count` int(11) NOT NULL default '0',
  `branch_trade_sulfur_count` int(11) NOT NULL default '0',
  `branch_trade_wood_cost` int(11) NOT NULL default '0',
  `branch_trade_wine_cost` int(11) NOT NULL default '0',
  `branch_trade_marble_cost` int(11) NOT NULL default '0',
  `branch_trade_crystal_cost` int(11) NOT NULL default '0',
  `branch_trade_sulfur_cost` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`,`user`,`island`,`position`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of alpha_towns
-- ----------------------------

-- ----------------------------
-- Table structure for `alpha_users`
-- ----------------------------
DROP TABLE IF EXISTS `alpha_users`;
CREATE TABLE `alpha_users` (
  `id` int(11) NOT NULL auto_increment,
  `login` varchar(255) character set utf8 NOT NULL,
  `password` varchar(255) character set utf8 NOT NULL,
  `email` varchar(255) character set utf8 NOT NULL,
  `register_key` varchar(255) character set utf8 NOT NULL,
  `register_complete` int(11) NOT NULL default '0',
  `last_visit` int(11) NOT NULL,
  `double_login` int(11) NOT NULL default '0',
  `blocked_time` int(11) NOT NULL default '0',
  `blocked_why` text character set utf8 NOT NULL,
  `town` int(11) NOT NULL,
  `capital` int(11) NOT NULL,
  `gold` varchar(255) character set utf8 NOT NULL default '100',
  `ambrosy` int(11) NOT NULL default '0',
  `transports` int(11) NOT NULL default '0',
  `tutorial` int(11) NOT NULL default '0',
  `premium_account` int(11) NOT NULL default '0',
  `premium_wood` int(11) NOT NULL default '0',
  `premium_marble` int(11) NOT NULL default '0',
  `premium_sulfur` int(11) NOT NULL default '0',
  `premium_crystal` int(11) NOT NULL default '0',
  `premium_wine` int(11) NOT NULL default '0',
  `premium_capacity` int(11) NOT NULL default '0',
  `options_select` int(11) NOT NULL default '1',
  PRIMARY KEY  (`id`,`login`,`town`,`capital`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of alpha_users
-- ----------------------------
