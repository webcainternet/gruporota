-- DROP TABLE IF EXISTS `#__ganalytics_profiles`;
-- DROP TABLE IF EXISTS `#__ganalytics_stats`;

CREATE TABLE IF NOT EXISTS `#__ganalytics_profiles` (
  `id` int(11) NOT NULL auto_increment,
  `accountID` varchar(100) NOT NULL,
  `accountName` varchar(100) NOT NULL,
  `profileID` varchar(100) NOT NULL,
  `profileName` varchar(100) NOT NULL,
  `webPropertyId` varchar(100) NOT NULL,
  `startDate` DATE NOT NULL,
  PRIMARY KEY  (`id`)
);

CREATE TABLE  IF NOT EXISTS`#__ganalytics_stats` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `metrics` varchar(250) NOT NULL,
  `dimensions` varchar(250) NOT NULL,
  `sort` varchar(250) NOT NULL,
  `filter` varchar(250) NOT NULL,
  `max_result` int(20) NOT NULL,
  PRIMARY KEY  (`id`)
);

INSERT IGNORE INTO `#__ganalytics_stats` (`id`, `name`, `metrics`, `dimensions`, `sort`, `filter`, `max_result`)
VALUES (1, 'Visitors per day', 'ga:visits', 'ga:date', '', '', 1000);
INSERT IGNORE INTO `#__ganalytics_stats` (`id`, `name`, `metrics`, `dimensions`, `sort`, `filter`, `max_result`)
VALUES (2, 'Top pages', 'ga:visits', 'ga:pagePath', '-ga:visits', '', 10);
INSERT IGNORE INTO `#__ganalytics_stats` (`id`, `name`, `metrics`, `dimensions`, `sort`, `filter`, `max_result`)
VALUES (3, 'Referring Sites', 'ga:visits', 'ga:source', '-ga:visits', '', 10);
INSERT IGNORE INTO `#__ganalytics_stats` (`id`, `name`, `metrics`, `dimensions`, `sort`, `filter`, `max_result`)
VALUES (4, 'Countrys', 'ga:visits', 'ga:country', '-ga:visits', '', 300);
INSERT IGNORE INTO `#__ganalytics_stats` (`id`, `name`, `metrics`, `dimensions`, `sort`, `filter`, `max_result`)
VALUES (5, 'Browsers', 'ga:visits', 'ga:browser', '-ga:visits', '', 10);
INSERT IGNORE INTO `#__ganalytics_stats` (`id`, `name`, `metrics`, `dimensions`, `sort`, `filter`, `max_result`)
VALUES (6, 'OS', 'ga:visits', 'ga:operatingSystem', '-ga:visits', '', 10);
