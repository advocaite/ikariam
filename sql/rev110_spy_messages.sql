CREATE TABLE `alpha_spy_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `spy` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `mission` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `desc` text CHARACTER SET utf8 NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `checked` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user`,`spy`,`from`,`to`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci