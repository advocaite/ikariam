ALTER TABLE  `alpha_users` ADD    `points` float(11,0) NOT NULL DEFAULT '0',
ADD  `points_buildings` float(11,0) NOT NULL DEFAULT '0' AFTER  `points`,
ADD  `points_levels` float(11,0) NOT NULL DEFAULT '0' AFTER  `points_buildings`,
ADD  `points_peoples` float(11,0) NOT NULL DEFAULT '0' AFTER  `points_levels`,
ADD  `points_research` float(11,0) NOT NULL DEFAULT '0' AFTER  `points_peoples`,
ADD  `points_complete` float(11,0) NOT NULL DEFAULT '0' AFTER  `points_research`,
ADD  `points_army` float(11,0) NOT NULL DEFAULT '0' AFTER  `points_complete`,
ADD  `points_gold` float(11,0) NOT NULL DEFAULT '0' AFTER  `points_army`,
ADD  `points_transports` float(11,0) NOT NULL DEFAULT '0'  AFTER  `points_gold`