drop database if exists fortidsminderdb;
create database fortidsminderdb;
use fortidsminderdb;

CREATE TABLE IF NOT EXISTS `steder` (
  `id` varchar(100) NOT NULL primary key,
  `hovedtype` varchar(200) NOT NULL,
  `undertype` varchar(200) NOT NULL,
  `primærtnavn` varchar(200) NOT NULL,
  `primærnavnstatus` varchar(200) NOT NULL,
  `kommunenavn` varchar(200) NOT NULL,
  `kommunekode` varchar(100) NOT NULL,
  `længde` float NOT NULL,
  `bredde` float NOT NULL,
  `adresse` varchar(100) NOT NULL
);

SET GLOBAL max_allowed_packet=524288000;