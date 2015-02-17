CREATE TABLE `zip_code` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `zip_code` varchar(5) collate utf8_bin NOT NULL,
  `city` varchar(50) collate utf8_bin default NULL,
  `county` varchar(50) collate utf8_bin default NULL,
  `state_name` varchar(50) collate utf8_bin default NULL,
  `state_prefix` varchar(2) collate utf8_bin default NULL,
  `area_code` varchar(3) collate utf8_bin default NULL,
  `time_zone` varchar(50) collate utf8_bin default NULL,
  `lat` float NOT NULL,
  `lon` float NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `zip_code` (`zip_code`)
)