CREATE TABLE IF NOT EXISTS `sector` (
  `idsector` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idsector`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

INSERT INTO `sector` (`idsector`, `nombre`) VALUES
(1, 'Recursos Humanos'),
(2, 'Comunicacion'),
(3, 'Gerencia'),
(4, 'Campo');
