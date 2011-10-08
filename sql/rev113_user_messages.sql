DROP TABLE IF EXISTS `alpha_user_messages`;
CREATE TABLE `alpha_user_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `checked_from` int(11) NOT NULL,
  `checked_to` int(11) NOT NULL,
  `deleted_from` int(11) NOT NULL,
  `deleted_to` int(11) NOT NULL,
  `archived_from` int(11) NOT NULL,
  `archived_to` int(11) NOT NULL,
  PRIMARY KEY (`id`,`from`,`to`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci