
CREATE TABLE `batch` (
  `id` mediumint(32) NOT NULL AUTO_INCREMENT,
  `hash` varchar(44) NOT NULL DEFAULT '',
  `email-ids` tinytext,
  `reminding-email-ids` tinytext,
  `callback-uri` varchar(250) NOT NULL DEFAULT '',
  `testers-callback-uri` varchar(250) NOT NULL DEFAULT '',
  `email-id` mediumint(32) NOT NULL DEFAULT '0',
  `tester-address` tinytext,
  `tester-email-id` mediumint(32) NOT NULL DEFAULT '0',
  `selected` int(8) NOT NULL DEFAULT '0',
  `total` int(8) NOT NULL DEFAULT '0',
  `reading` int(8) NOT NULL DEFAULT '0',
  `acknowledged` int(8) NOT NULL DEFAULT '0',
  `created` int(12) NOT NULL DEFAULT '0',
  `emailed` int(12) NOT NULL DEFAULT '0',
  `finished` int(12) NOT NULL DEFAULT '0',
  `reminded` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
