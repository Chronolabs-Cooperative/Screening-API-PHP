
CREATE TABLE `results` (
  `id` mediumint(128) NOT NULL AUTO_INCREMENT,
  `hash` varchar(44) NOT NULL DEFAULT '',
  `email-id` mediumint(32) NOT NULL DEFAULT '0',
  `batch-id` mediumint(32) NOT NULL DEFAULT '0',
  `result` mediumtext,
  `created` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
