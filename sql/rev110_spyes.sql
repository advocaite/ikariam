CREATE TABLE `alpha_spyes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `risk` int(11) NOT NULL,
  `last_update` int(11) NOT NULL,
  `mission_type` int(11) NOT NULL,
  `mission_start` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user`,`from`,`to`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci