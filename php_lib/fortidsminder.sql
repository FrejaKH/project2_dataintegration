drop database if exists fortidsminderdb;
create database fortidsminderdb;
use fortidsminderdb

CREATE TABLE IF NOT EXISTS `steder` (
  `hovedtype` varchar(200) NOT NULL,
  `undertype` varchar(200) NOT NULL,
  `primærnavn` varchar(200) NOT NULL,
  `primærnavnstatus` varchar(200) NOT NULL,
  `kommunenavn` varchar(200) NOT NULL,
  `kommunekode` float NOT NULL,
  `længde` float NOT NULL,
  `bredde` float NOT NULL
);