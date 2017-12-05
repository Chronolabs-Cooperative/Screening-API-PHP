
CREATE TABLE `emails_addresses` (
  `id` mediumint(32) NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '',
  `referee` varchar(12) NOT NULL DEFAULT '',
  `batch-id` mediumint(32) NOT NULL DEFAULT '0',
  `managers-ids` tinytext,
  `email` varchar(196) NOT NULL DEFAULT '',
  `name` varchar(128) NOT NULL DEFAULT '',
  `when` int(12) NOT NULL DEFAULT '0',
  `hits` int(8) NOT NULL DEFAULT '0',
  `created` int(12) NOT NULL DEFAULT '0',
  `reminded` int(12) NOT NULL DEFAULT '0',
  `emailed` int(12) NOT NULL DEFAULT '0',
  `reading` int(12) NOT NULL DEFAULT '0',
  `acknowledged` int(12) NOT NULL DEFAULT '0',
  `tested` int(12) NOT NULL DEFAULT '0',
  `finished` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `emails_queue` (
  `id` mediumint(32) NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '',
  `referee` varchar(12) NOT NULL DEFAULT '',
  `batch-id` mediumint(32) NOT NULL DEFAULT '0',
  `message-id` mediumint(32) NOT NULL DEFAULT '0',
  `to-addresses-ids` tinytext,
  `cc-addresses-ids` tinytext,
  `bcc-addresses-ids` tinytext,
  `reply-addresses-id` mediumint(32) NOT NULL DEFAULT '0',
  `from-addresses-id` mediumint(32) NOT NULL DEFAULT '0',
  `subject` varchar(250) NOT NULL DEFAULT '',
  `body` longtext,
  `attachments` longtext,
  `html` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `delete-attachments` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `created` int(12) NOT NULL DEFAULT '0',
  `emailed` int(12) NOT NULL DEFAULT '0',
  `rejected` int(12) NOT NULL DEFAULT '0',
  `reading` int(12) NOT NULL DEFAULT '0',
  `acknowledged` int(12) NOT NULL DEFAULT '0',
  `expires` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
