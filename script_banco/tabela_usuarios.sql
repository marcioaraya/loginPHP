--  ATENÇÃO: é preciso criar o schema 'cliente' antes de executar o comando abaixo

CREATE TABLE `usuarios` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `login` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;