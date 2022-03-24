use fortidsminderdb;

CREATE TABLE IF NOT EXISTS `restaurant` (
  `id` bigint NOT NULL AUTO_INCREMENT primary key,
  `navn` varchar(200),
  `adresse` varchar(200),
  `postnummer` int,
  `bynavn` varchar(200),
  `kontrolrapport` varchar(200),
  `geo_længde` float,
  `geo_bredde` float 
);

SET GLOBAL max_allowed_packet=524288000;