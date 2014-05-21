SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for bash_approved
-- ----------------------------
CREATE TABLE `bash_approved` (
  `bash_app_id` int(25) NOT NULL auto_increment,
  `bash_date_post` varchar(30) NOT NULL,
  `bash_text` mediumtext NOT NULL,
  `bash_rating` int(11) NOT NULL default '0',
  `bash_appBY` char(30) NOT NULL default 'Admin',
  `bash_poster_IP` varchar(30) default NULL,
  `bash_razdel` enum('abyss','index') NOT NULL default 'abyss',
  PRIMARY KEY  (`bash_app_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bash_odmins
-- ----------------------------
CREATE TABLE `bash_odmins` (
  `odm_login` varchar(30) NOT NULL,
  `odm_passw` varchar(50) NOT NULL,
  `odm_status` enum('moder','admin') NOT NULL default 'moder'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bash_quotegolos
-- ----------------------------
CREATE TABLE `bash_quotegolos` (
  `user_ip` varchar(30) NOT NULL,
  `bash_quote_id` int(20) NOT NULL,
  KEY `user_ip` (`user_ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------

INSERT INTO `bash_odmins` VALUES ('Admin', 'e3afed0047b08059d0fada10f400c1e5', 'admin');
