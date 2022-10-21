create database crudphp;

use crudphp;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `edad` int(3) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `conocido_por` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);
