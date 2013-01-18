-- 
-- Tabellenstruktur für Tabelle `tl_timelinr_timeline`
-- 

CREATE TABLE `tl_timelinr_timeline` (
  `id` int(10) NOT NULL auto_increment,
  `tstamp` int(10) unsigned NOT NULL default '0',
  `bezeichnung` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `tl_timelinr_timelineDaten`
-- 

CREATE TABLE `tl_timelinr_timelineDaten` (
  `id` int(10) NOT NULL auto_increment,
  `pid` int(10) NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `jahr` int(11) NOT NULL default '0',
  `bezeichnung` text NULL,
  `invisible` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `tl_module` (
`timeline` int(10) NOT NULL default '',
ENGINE=MyISAM DEFAULT CHARSET=utf8;