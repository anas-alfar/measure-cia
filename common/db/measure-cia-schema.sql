# ************************************************************
# Sequel Pro SQL dump
# Version 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.22)
# Database: vulnerability
# Generation Time: 2016-05-14 11:33:19 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table research_cve_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `research_cve_details`;

CREATE TABLE `research_cve_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product` varchar(255) DEFAULT NULL,
  `cve` varchar(255) DEFAULT NULL,
  `vulnerability` varchar(255) DEFAULT NULL,
  `conf` varchar(255) DEFAULT NULL,
  `integrity` varchar(255) DEFAULT NULL,
  `availability` varchar(255) DEFAULT NULL,
  `description` varchar(32767) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_cve` (`cve`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table research_cve_file
# ------------------------------------------------------------

DROP TABLE IF EXISTS `research_cve_file`;

CREATE TABLE `research_cve_file` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cve` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table research_file_code_metrics
# ------------------------------------------------------------

DROP TABLE IF EXISTS `research_file_code_metrics`;

CREATE TABLE `research_file_code_metrics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `loc` int(11) DEFAULT NULL,
  `logicalLoc` int(11) DEFAULT NULL,
  `volume` varchar(255) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `vocabulary` int(11) DEFAULT NULL,
  `effort` varchar(255) DEFAULT NULL,
  `difficulty` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `bugs` varchar(255) DEFAULT NULL,
  `intelligentContent` varchar(255) DEFAULT NULL,
  `maintainabilityIndexWithoutComment` varchar(255) DEFAULT NULL,
  `maintainabilityIndex` varchar(255) DEFAULT NULL,
  `commentWeight` varchar(255) DEFAULT NULL,
  `instability` int(11) DEFAULT NULL,
  `afferentCoupling` int(11) DEFAULT NULL,
  `efferentCoupling` int(11) DEFAULT NULL,
  `noc` int(11) DEFAULT NULL,
  `noca` int(11) DEFAULT NULL,
  `nocc` int(11) DEFAULT NULL,
  `noc-anon` int(11) DEFAULT NULL,
  `noi` int(11) DEFAULT NULL,
  `nom` int(11) DEFAULT NULL,
  `cyclomaticComplexity` int(11) DEFAULT NULL,
  `myerInterval` varchar(255) DEFAULT NULL,
  `myerDistance` int(11) DEFAULT NULL,
  `operators` int(11) DEFAULT NULL,
  `lcom` int(11) DEFAULT NULL,
  `sysc` int(11) DEFAULT NULL,
  `rsysc` int(11) DEFAULT NULL,
  `dc` int(11) DEFAULT NULL,
  `rdc` int(11) DEFAULT NULL,
  `sc` int(11) DEFAULT NULL,
  `rsc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tool_cve_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tool_cve_details`;

CREATE TABLE `tool_cve_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product` varchar(255) DEFAULT NULL,
  `cve` varchar(255) DEFAULT NULL,
  `vulnerability` varchar(255) DEFAULT NULL,
  `conf` varchar(255) DEFAULT NULL,
  `integrity` varchar(255) DEFAULT NULL,
  `availability` varchar(255) DEFAULT NULL,
  `description` varchar(32767) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_cve` (`cve`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tool_cve_file
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tool_cve_file`;

CREATE TABLE `tool_cve_file` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cve` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_cve_file` (`cve`,`filename`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
