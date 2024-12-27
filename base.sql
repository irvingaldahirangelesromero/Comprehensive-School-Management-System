/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - dbsige
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbsige` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `dbsige`;

/*Table structure for table `pertenecen` */

DROP TABLE IF EXISTS `pertenecen`;

CREATE TABLE `pertenecen` (
  `IDmunicipios` int(11) NOT NULL,
  `IDmatricula` varchar(50) NOT NULL,
  PRIMARY KEY (`IDmunicipios`,`IDmatricula`),
  KEY `IDmatricula` (`IDmatricula`),
  CONSTRAINT `pertenecen_ibfk_1` FOREIGN KEY (`IDmunicipios`) REFERENCES `tblmunicipios` (`IDmunicipios`),
  CONSTRAINT `pertenecen_ibfk_2` FOREIGN KEY (`IDmatricula`) REFERENCES `tblalumnos` (`IDmatricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pertenecen` */

insert  into `pertenecen`(`IDmunicipios`,`IDmatricula`) values 
(1,'20230001'),
(2,'20230002'),
(3,'20230003'),
(4,'20230004');

/*Table structure for table `tblalumnos` */

DROP TABLE IF EXISTS `tblalumnos`;

CREATE TABLE `tblalumnos` (
  `IDmatricula` varchar(50) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `APaterno` varchar(50) DEFAULT NULL,
  `AMaterno` varchar(50) DEFAULT NULL,
  `dtHorarios` datetime DEFAULT NULL,
  `Sexo` varchar(10) DEFAULT NULL,
  `NombreTutor` varchar(100) DEFAULT NULL,
  `IDUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDmatricula`),
  KEY `IDUsuario` (`IDUsuario`),
  KEY `idx_tblalumnos` (`IDmatricula`,`Nombre`,`APaterno`,`AMaterno`),
  CONSTRAINT `tblalumnos_ibfk_2` FOREIGN KEY (`IDUsuario`) REFERENCES `tblusuario` (`IDUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblalumnos` */

insert  into `tblalumnos`(`IDmatricula`,`Nombre`,`APaterno`,`AMaterno`,`dtHorarios`,`Sexo`,`NombreTutor`,`IDUsuario`) values 
('20230001','Luis','Hernandez','Garcia','2022-09-01 08:00:00','Masculino','Jose Hernandez',3),
('20230002','Ana','Martinez','Lopez','2022-09-01 08:00:00','Femenino','Maria Martinez',4),
('20230003','Carlos','Perez','Rodriguez','2022-09-01 08:00:00','Masculino','Juan Perez',1),
('20230004','Sofia','Gonzalez','Ramirez','2022-09-01 08:00:00','Femenino','Luis Gonzalez',2),
('20230500','Ivan','Lara','Solis','0000-00-00 00:00:00','masculino','Teresa',NULL),
('2024601','Ivan','s','j','0000-00-00 00:00:00','masculino','maria',7),
('2025','Esequiel','Ramos','Garcia','0000-00-00 00:00:00','masculino','Teresa',NULL),
('2026','Juan','Espinoza','Paz','0000-00-00 00:00:00','masculino','Teresa',6);

/*Table structure for table `tblasistencia` */

DROP TABLE IF EXISTS `tblasistencia`;

CREATE TABLE `tblasistencia` (
  `IDasistencias` int(11) NOT NULL AUTO_INCREMENT,
  `HoraEntrada` time DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `HoraSalida` time DEFAULT NULL,
  `IDmatricula` varchar(50) DEFAULT NULL,
  `IDmaterias` int(11) DEFAULT NULL,
  `Asistencia` tinyint(1) DEFAULT NULL,
  `Periodo` varchar(30) DEFAULT NULL,
  `Cuatrimestre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`IDasistencias`),
  KEY `IDmatricula` (`IDmatricula`),
  KEY `IDmaterias` (`IDmaterias`),
  CONSTRAINT `tblasistencia_ibfk_1` FOREIGN KEY (`IDmatricula`) REFERENCES `tblalumnos` (`IDmatricula`),
  CONSTRAINT `tblasistencia_ibfk_2` FOREIGN KEY (`IDmaterias`) REFERENCES `tblmaterias` (`IDmaterias`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblasistencia` */

insert  into `tblasistencia`(`IDasistencias`,`HoraEntrada`,`Fecha`,`HoraSalida`,`IDmatricula`,`IDmaterias`,`Asistencia`,`Periodo`,`Cuatrimestre`) values 
(1,'08:00:00','2023-08-01','14:00:00','20230001',1,0,'2022','1'),
(2,'08:30:00','2022-07-18','12:30:00','20230002',2,0,NULL,NULL),
(3,'09:00:00','2022-07-18','13:00:00','20230003',3,0,NULL,NULL),
(4,'09:30:00','2022-07-18','13:30:00','20230004',4,0,NULL,NULL),
(5,'08:40:00','2024-07-26','12:30:00','20230001',2,1,NULL,NULL),
(7,'08:00:00','2022-07-19','12:00:00','20230004',1,0,NULL,NULL);

/*Table structure for table `tblbitacora` */

DROP TABLE IF EXISTS `tblbitacora`;

CREATE TABLE `tblbitacora` (
  `idBitacora` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(50) DEFAULT NULL,
  `DatosEliminados` varchar(400) DEFAULT NULL,
  `Tabla` varchar(50) DEFAULT NULL,
  `Operacion` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idBitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `tblbitacora` */

insert  into `tblbitacora`(`idBitacora`,`Usuario`,`DatosEliminados`,`Tabla`,`Operacion`,`fecha`) values 
(11,'root@localhost','35 20230001 2022-2 7.00 8.00 8.00 10.00 3','tblcalificaciones','update','2024-07-25'),
(12,'root@localhost','33 20230001 2022-2 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-02'),
(13,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(14,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(15,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(16,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(17,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(18,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(19,'root@localhost','12 20230004 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(20,'root@localhost','13 20230004 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(21,'root@localhost','14 20230004 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(22,'root@localhost','15 20230004 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(23,'root@localhost','17 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(24,'root@localhost','18 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(25,'root@localhost','19 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(26,'root@localhost','20 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(27,'root@localhost','21 20230002 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(28,'root@localhost','22 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(29,'root@localhost','23 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(30,'root@localhost','25 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(31,'root@localhost','26 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(32,'root@localhost','27 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(33,'root@localhost','28 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(34,'root@localhost','29 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(35,'root@localhost','30 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(36,'root@localhost','31 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(37,'root@localhost','32 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(38,'root@localhost','33 20230001 2022-2 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-02'),
(39,'root@localhost','34 20230001 2022-2 10.00 10.00 10.00 10.00 3','tblcalificaciones','update','2024-08-02'),
(40,'root@localhost','35 20230001 2022-2 9.00 10.00 8.00 7.00 1','tblcalificaciones','update','2024-08-02'),
(41,'root@localhost','12 20230004 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(42,'root@localhost','13 20230004 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(43,'root@localhost','14 20230004 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(44,'root@localhost','15 20230004 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(45,'root@localhost','17 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(46,'root@localhost','18 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(47,'root@localhost','19 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(48,'root@localhost','20 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(49,'root@localhost','21 20230002 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(50,'root@localhost','22 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(51,'root@localhost','23 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(52,'root@localhost','25 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(53,'root@localhost','26 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(54,'root@localhost','27 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(55,'root@localhost','28 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(56,'root@localhost','29 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(57,'root@localhost','30 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(58,'root@localhost','31 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(59,'root@localhost','32 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(60,'root@localhost','33 20230001 2022-2 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-02'),
(61,'root@localhost','34 20230001 2022-2 10.00 10.00 10.00 10.00 3','tblcalificaciones','update','2024-08-02'),
(62,'root@localhost','35 20230001 2022-2 9.00 10.00 8.00 7.00 1','tblcalificaciones','update','2024-08-02'),
(63,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(64,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(65,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(66,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(67,'root@localhost','12 20230004 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(68,'root@localhost','13 20230004 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(69,'root@localhost','12 20230004 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(70,'root@localhost','13 20230004 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(71,'root@localhost','12 20230004 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(72,'root@localhost','13 20230004 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(73,'root@localhost','13 20230004 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(74,'root@localhost','14 20230004 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(75,'root@localhost','15 20230004 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(76,'root@localhost','14 20230004 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(77,'root@localhost','15 20230004 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(78,'root@localhost','14 20230004 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(79,'root@localhost','15 20230004 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(80,'root@localhost','15 20230004 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(81,'root@localhost','15 20230004 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(82,'root@localhost','15 20230004 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(83,'root@localhost','15 20230004 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(84,'root@localhost','15 20230004 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(85,'root@localhost','15 20230004 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(86,'root@localhost','15 20230004 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(87,'root@localhost','15 20230004 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(88,'root@localhost','17 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(89,'root@localhost','18 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(90,'root@localhost','17 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(91,'root@localhost','17 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(92,'root@localhost','18 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(93,'root@localhost','17 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(94,'root@localhost','18 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(95,'root@localhost','19 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(96,'root@localhost','20 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(97,'root@localhost','19 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(98,'root@localhost','20 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(99,'root@localhost','20 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(100,'root@localhost','20 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(101,'root@localhost','20 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(102,'root@localhost','20 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(103,'root@localhost','20 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(104,'root@localhost','20 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(105,'root@localhost','20 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(106,'root@localhost','19 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-02'),
(107,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(108,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(109,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(110,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(111,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(112,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(113,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(114,'root@localhost',NULL,'tblcalificaciones','update','2024-08-02'),
(115,'root@localhost','2 20230004 1 78.00 82.50 80.00 80.20 1','tblcalificaciones','update','2024-08-02'),
(116,'root@localhost','1 20230004 1 85.50 90.00 88.00 87.80 1','tblcalificaciones','update','2024-08-02'),
(117,'root@localhost','1 20230004 1 85.50 90.00 88.00 87.80 10','tblcalificaciones','update','2024-08-03'),
(118,'root@localhost','2 20230004 1 78.00 82.50 80.00 80.20 10','tblcalificaciones','update','2024-08-03'),
(119,'root@localhost','1 20230004 1 85.50 90.00 88.00 87.80 1','tblcalificaciones','update','2024-08-03'),
(120,'root@localhost','1 20230002 2024A 8.00 7.50 9.00 8.50 1','tblcalificaciones','update','2024-08-03'),
(121,'root@localhost','1 20230004 2024A 8.00 7.50 9.00 8.50 1','tblcalificaciones','update','2024-08-03'),
(122,'root@localhost','2 20230004 1 78.00 82.50 80.00 80.20 1','tblcalificaciones','update','2024-08-03'),
(123,'root@localhost','1 20230004 2024A 8.00 7.50 9.00 8.50 2','tblcalificaciones','update','2024-08-03'),
(124,'root@localhost','2 20230004 1 78.00 82.50 80.00 80.20 2','tblcalificaciones','update','2024-08-03'),
(125,'root@localhost','2 20230004 1 78.00 82.50 80.00 80.20 1','tblcalificaciones','update','2024-08-03'),
(126,'root@localhost','2 20230004 1 78.00 82.50 80.00 80.20 1','tblcalificaciones','update','2024-08-03'),
(127,'root@localhost','2 20230004 1 78.00 82.50 80.00 80.20 1','tblcalificaciones','update','2024-08-03'),
(128,'root@localhost','35 20230001 2022-2 9.00 10.00 8.00 7.00 1','tblcalificaciones','update','2024-08-03'),
(129,'root@localhost','35 20230001 2022-2 9.00 10.00 8.00 7.00 1','tblcalificaciones','update','2024-08-03'),
(130,'root@localhost','2 20230004 1 78.00 82.50 80.00 80.20 1','tblcalificaciones','update','2024-08-03'),
(131,'root@localhost','2 20230004 1 78.00 82.50 80.00 80.20 1','tblcalificaciones','update','2024-08-03'),
(132,'root@localhost','35 20230001 2022-2 9.00 10.00 8.00 7.00 1','tblcalificaciones','update','2024-08-03'),
(133,'root@localhost','2 20230004 1 78.00 82.50 80.00 80.20 1','tblcalificaciones','update','2024-08-03'),
(134,'root@localhost','1 20230004 1 8.00 7.50 9.00 8.50 1','tblcalificaciones','update','2024-08-03'),
(135,'root@localhost','2 20230004 1 78.00 82.50 80.00 80.20 1','tblcalificaciones','update','2024-08-03'),
(136,'root@localhost','1 20230004 1 8.00 7.50 9.00 8.50 2','tblcalificaciones','update','2024-08-03'),
(137,'root@localhost','2 20230004 1 78.00 82.50 80.00 80.20 2','tblcalificaciones','update','2024-08-03'),
(138,'root@localhost','2 20230004 1 78.00 82.50 80.00 80.20 1','tblcalificaciones','update','2024-08-03'),
(139,'root@localhost','2 20230004 1 78.00 82.50 80.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(140,'root@localhost','35 20230001 2022-2 9.00 10.00 8.00 7.00 1','tblcalificaciones','update','2024-08-03'),
(141,'root@localhost','2 20230004 1 78.00 82.50 80.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(142,'root@localhost','2 20230004 1 78.00 82.50 80.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(143,'root@localhost','1 20230004 1 8.00 7.50 9.00 8.50 1','tblcalificaciones','update','2024-08-03'),
(144,'root@localhost','1 20230004 2023A 85.50 90.00 88.75 88.08 2','tblcalificaciones','update','2024-08-03'),
(145,'root@localhost','2 20230004 1 78.00 82.50 80.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(146,'root@localhost','2 20230004 1 78.00 82.50 80.00 10.00 2','tblcalificaciones','update','2024-08-03'),
(147,'root@localhost','12 20230004 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-03'),
(148,'root@localhost','17 20230001 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-03'),
(149,'root@localhost','17 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(150,'root@localhost','17 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(151,'root@localhost','17 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(152,'root@localhost','17 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(153,'root@localhost','17 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(154,'root@localhost','1 20230004 2023A 85.50 90.00 88.75 10.00 2','tblcalificaciones','update','2024-08-03'),
(155,'root@localhost','1 20230004 2023ABC 85.50 90.00 88.75 10.00 2','tblcalificaciones','update','2024-08-03'),
(156,'root@localhost','1 20230004 2023ABC 85.50 90.00 88.75 10.00 1','tblcalificaciones','update','2024-08-03'),
(157,'root@localhost','17 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(158,'root@localhost','35 20230001 2022-2 9.00 10.00 8.00 7.00 1','tblcalificaciones','update','2024-08-03'),
(159,'root@localhost','17 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(160,'root@localhost','35 20230001 2022-2 9.00 10.00 8.00 7.00 1','tblcalificaciones','update','2024-08-03'),
(161,'root@localhost','12 20230004 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(162,'root@localhost','12 20230004 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-03'),
(163,'root@localhost','17 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(164,'root@localhost','17 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(165,'root@localhost','21 20230002 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(166,'root@localhost','21 20230002 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(167,'root@localhost','23 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(168,'root@localhost','25 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(169,'root@localhost','23 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(170,'root@localhost','25 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(171,'root@localhost','21 20230002 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-03'),
(172,'root@localhost','22 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(173,'root@localhost','21 20230002 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(174,'root@localhost','22 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(175,'root@localhost','22 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(176,'root@localhost','20 20230001 1 10.00 10.00 10.00 10.00 10','tblcalificaciones','update','2024-08-03'),
(177,'root@localhost','21 20230002 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-03'),
(178,'root@localhost','20 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(179,'root@localhost','21 20230002 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(180,'root@localhost','20 20230001 1 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(181,'root@localhost','1 20230004 2023ABC 85.50 90.00 88.75 10.00 2','tblcalificaciones','update','2024-08-03'),
(182,'root@localhost','2 20230004 1 78.00 82.50 80.00 10.00 2','tblcalificaciones','update','2024-08-03'),
(183,'root@localhost','1 20230004 1 85.50 90.00 88.75 10.00 1','tblcalificaciones','update','2024-08-03'),
(184,'root@localhost','2 20230004 1 78.00 82.50 80.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(185,'root@localhost','1 20230004 1 85.50 90.00 88.75 9.00 1','tblcalificaciones','update','2024-08-03'),
(186,'root@localhost','2 20230004 1 78.00 82.50 80.00 10.00 1','tblcalificaciones','update','2024-08-03'),
(187,'root@localhost','1 20230004 1 85.50 90.00 88.75 9.00 2','tblcalificaciones','update','2024-08-05'),
(188,'root@localhost','1 20230004 1 85.50 90.00 88.75 9.00 1','tblcalificaciones','update','2024-08-05'),
(189,'root@localhost','2 20230004 1 78.00 82.50 80.00 10.00 1','tblcalificaciones','update','2024-08-05'),
(190,'sige@localhost','1 20230004 1 85.50 90.00 88.75 9.00 1','tblcalificaciones','update','2024-08-05'),
(191,'sige@localhost','2 20230004 1 78.00 82.50 80.00 10.00 1','tblcalificaciones','update','2024-08-05'),
(192,'root@localhost','3 20230004 2022-1 92.00 95.50 94.00 93.80 3','tblcalificaciones','update','2024-08-06'),
(193,'root@localhost','4 20230004 2022-2 70.00 75.00 73.00 72.70 4','tblcalificaciones','update','2024-08-06'),
(194,'root@localhost','12 20230004 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(195,'root@localhost','13 20230004 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(196,'root@localhost','14 20230004 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(197,'root@localhost','15 20230004 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(198,'root@localhost','17 20230001 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(199,'root@localhost','18 20230001 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(200,'root@localhost','19 20230001 1 10.00 10.00 10.00 10.00 10','tblcalificaciones','update','2024-08-06'),
(201,'root@localhost','20 20230001 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(202,'root@localhost','21 20230002 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(203,'root@localhost','22 20230001 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(204,'root@localhost','23 20230001 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(205,'root@localhost','25 20230001 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(206,'root@localhost','26 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(207,'root@localhost','27 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(208,'root@localhost','28 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(209,'root@localhost','29 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(210,'root@localhost','30 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(211,'root@localhost','31 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(212,'root@localhost','32 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(213,'root@localhost','33 20230001 2022-2 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(214,'root@localhost','34 20230001 2022-2 10.00 10.00 10.00 10.00 3','tblcalificaciones','update','2024-08-06'),
(215,'root@localhost','35 20230001 2022-2 9.00 10.00 8.00 7.00 1','tblcalificaciones','update','2024-08-06'),
(216,'root@localhost',NULL,'tblcalificaciones','update','2024-08-06'),
(217,'root@localhost','3 20230004 2022-1 92.00 95.50 94.00 93.80 3','tblcalificaciones','update','2024-08-06'),
(218,'root@localhost','4 20230004 2022-2 70.00 75.00 73.00 72.70 4','tblcalificaciones','update','2024-08-06'),
(219,'root@localhost',NULL,'tblcalificaciones','update','2024-08-06'),
(220,'root@localhost','35 20230001 2022-2 9.00 10.00 8.00 7.00 1','tblcalificaciones','update','2024-08-06'),
(221,'root@localhost','34 20230001 2022-2 10.00 10.00 10.00 10.00 3','tblcalificaciones','update','2024-08-06'),
(222,'root@localhost','33 20230001 2022-2 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(223,'root@localhost','32 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(224,'root@localhost','31 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(225,'root@localhost','30 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(226,'root@localhost','29 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(227,'root@localhost','28 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(228,'root@localhost','27 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(229,'root@localhost','26 20230001 2022-2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(230,'root@localhost','25 20230001 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(231,'root@localhost','23 20230001 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(232,'root@localhost','22 20230001 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(233,'root@localhost','21 20230002 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(234,'root@localhost','20 20230001 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(235,'root@localhost','19 20230001 1 10.00 10.00 10.00 10.00 10','tblcalificaciones','update','2024-08-06'),
(236,'root@localhost','18 20230001 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(237,'root@localhost','17 20230001 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(238,'root@localhost','21 20230002 2 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(239,'root@localhost','20 20230001 2 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(240,'root@localhost','19 20230001 2 10.00 10.00 10.00 10.00 10','tblcalificaciones','update','2024-08-06'),
(241,'root@localhost','18 20230001 2 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(242,'root@localhost','17 20230001 2 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(243,'root@localhost','15 20230004 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(244,'root@localhost','14 20230004 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(245,'root@localhost','13 20230004 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(246,'root@localhost','12 20230004 1 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(247,'root@localhost','4 20230004 1 70.00 75.00 73.00 72.70 4','tblcalificaciones','update','2024-08-06'),
(248,'root@localhost','3 20230004 1 92.00 95.50 94.00 93.80 3','tblcalificaciones','update','2024-08-06'),
(249,'root@localhost','2 20230004 1 78.00 82.50 80.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(250,'root@localhost','1 20230004 1 85.50 90.00 88.75 9.00 1','tblcalificaciones','update','2024-08-06'),
(251,'root@localhost',NULL,'tblcalificaciones','update','2024-08-06'),
(252,'root@localhost','1 20230004 3 85.50 90.00 88.75 9.00 1','tblcalificaciones','update','2024-08-06'),
(253,'root@localhost','2 20230004 3 78.00 82.50 80.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(254,'root@localhost','3 20230004 3 92.00 95.50 94.00 93.80 3','tblcalificaciones','update','2024-08-06'),
(255,'root@localhost','26 20230001 2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(256,'root@localhost','27 20230001 2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(257,'root@localhost','28 20230001 2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(258,'root@localhost','29 20230001 2 10.00 10.00 10.00 10.00 1','tblcalificaciones','update','2024-08-06'),
(259,'root@localhost','4 20230004 3 70.00 75.00 73.00 72.70 4','tblcalificaciones','update','2024-08-06'),
(260,'root@localhost','18 20230001 3 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(261,'root@localhost','21 20230002 3 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06'),
(262,'root@localhost','13 20230004 3 10.00 10.00 10.00 10.00 2','tblcalificaciones','update','2024-08-06');

/*Table structure for table `tblcalificaciones` */

DROP TABLE IF EXISTS `tblcalificaciones`;

CREATE TABLE `tblcalificaciones` (
  `Periodo` varchar(20) DEFAULT NULL,
  `IDcalificaciones` int(11) NOT NULL AUTO_INCREMENT,
  `Matricula` varchar(20) DEFAULT NULL,
  `Cuatrimestre` varchar(50) DEFAULT NULL,
  `Par1` decimal(5,2) DEFAULT NULL,
  `Par2` decimal(5,2) DEFAULT NULL,
  `Par3` decimal(5,2) DEFAULT NULL,
  `PromFinal` decimal(5,2) DEFAULT NULL,
  `IDmaterias` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDcalificaciones`),
  KEY `IDmaterias` (`IDmaterias`),
  KEY `tblcalificaciones_ibfk_2` (`Matricula`),
  CONSTRAINT `tblcalificaciones_ibfk_1` FOREIGN KEY (`IDmaterias`) REFERENCES `tblmaterias` (`IDmaterias`),
  CONSTRAINT `tblcalificaciones_ibfk_2` FOREIGN KEY (`Matricula`) REFERENCES `tblalumnos` (`IDmatricula`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblcalificaciones` */

insert  into `tblcalificaciones`(`Periodo`,`IDcalificaciones`,`Matricula`,`Cuatrimestre`,`Par1`,`Par2`,`Par3`,`PromFinal`,`IDmaterias`) values 
('2022',1,'20230001','3',85.50,90.00,88.75,9.00,1),
('2022',2,'20230002','3',78.00,82.50,80.00,10.00,1),
('2022',3,'20230003','3',92.00,95.50,94.00,93.80,3),
('2022',4,'2024601','3',70.00,75.00,73.00,72.70,4),
('2022',12,'20230004','3',10.00,10.00,10.00,10.00,2),
('2022',13,'2024601','3',10.00,10.00,10.00,10.00,2),
('2022',14,'20230004','3',10.00,10.00,10.00,10.00,2),
('2022',15,'20230004','3',10.00,10.00,10.00,10.00,2),
('2022',17,'20230001','3',10.00,10.00,10.00,10.00,2),
('2022',18,'2024601','3',10.00,10.00,10.00,10.00,2),
('2022',19,'20230001','3',10.00,10.00,10.00,10.00,10),
('2022',20,'20230001','3',10.00,10.00,10.00,10.00,2),
('2022',21,'2024601','3',10.00,10.00,10.00,10.00,2),
('2021',22,'20230001','2',10.00,10.00,10.00,10.00,2),
('2021',23,'20230001','2',10.00,10.00,10.00,10.00,2),
('2021',25,'20230001','2',10.00,10.00,10.00,10.00,2),
('2021',26,'20230001','2',10.00,10.00,10.00,10.00,3),
('2021',27,'20230002','2',10.00,10.00,10.00,10.00,1),
('2021',28,'20230002','2',10.00,10.00,10.00,10.00,2),
('2021',29,'20230002','2',10.00,10.00,10.00,10.00,3),
('2021',30,'20230001','2',10.00,10.00,10.00,10.00,1),
('2021',31,'20230001','2',10.00,10.00,10.00,10.00,1),
('2021',32,'20230001','2',10.00,10.00,10.00,10.00,1),
('2021',33,'20230001','2',10.00,10.00,10.00,10.00,2),
('2021',34,'20230001','2',10.00,10.00,10.00,10.00,3),
('2020',35,'20230001','1',9.00,10.00,8.00,7.00,1),
('2020',37,'20230002','1',10.00,10.00,10.00,10.00,3);

/*Table structure for table `tblcarrera` */

DROP TABLE IF EXISTS `tblcarrera`;

CREATE TABLE `tblcarrera` (
  `IDCarrera` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `logoCarrera` varchar(100) NOT NULL,
  PRIMARY KEY (`IDCarrera`),
  KEY `idx_tblcarrera` (`IDCarrera`,`Nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblcarrera` */

insert  into `tblcarrera`(`IDCarrera`,`Nombre`,`logoCarrera`) values 
(23,'mecatronica','mecatronica.png');

/*Table structure for table `tblestados` */

DROP TABLE IF EXISTS `tblestados`;

CREATE TABLE `tblestados` (
  `IDestados` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IDestados`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblestados` */

insert  into `tblestados`(`IDestados`,`Nombre`) values 
(1,'Estado1'),
(2,'Estado2'),
(3,'Estado3'),
(4,'Estado4');

/*Table structure for table `tblhorarios` */

DROP TABLE IF EXISTS `tblhorarios`;

CREATE TABLE `tblhorarios` (
  `IDhorarios` int(11) NOT NULL AUTO_INCREMENT,
  `imgHorario` varchar(100) DEFAULT NULL,
  `IDCarrera` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDhorarios`),
  KEY `IDCarrera` (`IDCarrera`),
  CONSTRAINT `tblhorarios_ibfk_2` FOREIGN KEY (`IDCarrera`) REFERENCES `tblcarrera` (`IDCarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblhorarios` */

/*Table structure for table `tblmaterias` */

DROP TABLE IF EXISTS `tblmaterias`;

CREATE TABLE `tblmaterias` (
  `IDmaterias` int(11) NOT NULL AUTO_INCREMENT,
  `NombreMateria` varchar(100) DEFAULT NULL,
  `Nivel` varchar(50) DEFAULT NULL,
  `Horas` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDmaterias`),
  UNIQUE KEY `nombremat_unico` (`NombreMateria`),
  KEY `idx_tblmaterias` (`IDmaterias`,`NombreMateria`,`Nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblmaterias` */

insert  into `tblmaterias`(`IDmaterias`,`NombreMateria`,`Nivel`,`Horas`) values 
(1,'Matematicas','Basico',40),
(2,'Fisica','Intermedio',60),
(3,'Quimica','Avanzado',80),
(4,'Historia','Basico',50),
(10,'Cardiologia','Basico',30);

/*Table structure for table `tblmatxasignatura` */

DROP TABLE IF EXISTS `tblmatxasignatura`;

CREATE TABLE `tblmatxasignatura` (
  `IDdocente` int(11) NOT NULL AUTO_INCREMENT,
  `Grupo` varchar(50) DEFAULT NULL,
  `Periodo` varchar(50) DEFAULT NULL,
  `Cuatrimestre` varchar(50) DEFAULT NULL,
  `IDmaterias` int(11) DEFAULT NULL,
  `IDTrabajador` int(11) DEFAULT NULL,
  `IDCarrera` int(11) DEFAULT NULL,
  `IDHorario` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDdocente`),
  KEY `IDmaterias` (`IDmaterias`),
  KEY `IDTrabajador` (`IDTrabajador`),
  KEY `IDCarrera` (`IDCarrera`),
  KEY `IDHorario` (`IDHorario`),
  CONSTRAINT `tblmatxasignatura_ibfk_1` FOREIGN KEY (`IDmaterias`) REFERENCES `tblmaterias` (`IDmaterias`),
  CONSTRAINT `tblmatxasignatura_ibfk_2` FOREIGN KEY (`IDTrabajador`) REFERENCES `tbltrabajador` (`IDTrabajador`),
  CONSTRAINT `tblmatxasignatura_ibfk_3` FOREIGN KEY (`IDCarrera`) REFERENCES `tblcarrera` (`IDCarrera`),
  CONSTRAINT `tblmatxasignatura_ibfk_4` FOREIGN KEY (`IDHorario`) REFERENCES `tblhorarios` (`IDhorarios`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblmatxasignatura` */

/*Table structure for table `tblmunicipios` */

DROP TABLE IF EXISTS `tblmunicipios`;

CREATE TABLE `tblmunicipios` (
  `IDmunicipios` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `IDestados` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDmunicipios`),
  KEY `IDestados` (`IDestados`),
  CONSTRAINT `tblmunicipios_ibfk_1` FOREIGN KEY (`IDestados`) REFERENCES `tblestados` (`IDestados`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblmunicipios` */

insert  into `tblmunicipios`(`IDmunicipios`,`Nombre`,`IDestados`) values 
(1,'Municipio1',1),
(2,'Municipio2',2),
(3,'Municipio3',3),
(4,'Municipio4',4);

/*Table structure for table `tbltrabajador` */

DROP TABLE IF EXISTS `tbltrabajador`;

CREATE TABLE `tbltrabajador` (
  `IDTrabajador` int(11) NOT NULL AUTO_INCREMENT,
  `AMaterno` varchar(50) DEFAULT NULL,
  `APaterno` varchar(50) DEFAULT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `IDmunicipios` int(11) DEFAULT NULL,
  `IDUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDTrabajador`),
  KEY `IDmunicipios` (`IDmunicipios`),
  KEY `IDUsuario` (`IDUsuario`),
  CONSTRAINT `tbltrabajador_ibfk_1` FOREIGN KEY (`IDmunicipios`) REFERENCES `tblmunicipios` (`IDmunicipios`),
  CONSTRAINT `tbltrabajador_ibfk_2` FOREIGN KEY (`IDUsuario`) REFERENCES `tblusuario` (`IDUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbltrabajador` */

insert  into `tbltrabajador`(`IDTrabajador`,`AMaterno`,`APaterno`,`Nombre`,`IDmunicipios`,`IDUsuario`) values 
(1,'Garcia','Lopez','Juan',1,2),
(2,'Martinez','Hernandez','Maria',2,3),
(3,'Perez','Ramirez','Carlos',3,4),
(4,'Rodriguez','Gomez','Ana',4,1);

/*Table structure for table `tblusuario` */

DROP TABLE IF EXISTS `tblusuario`;

CREATE TABLE `tblusuario` (
  `IDUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `TipoUsuario` varchar(50) DEFAULT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `Contraseña` varchar(50) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IDUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tblusuario` */

insert  into `tblusuario`(`IDUsuario`,`TipoUsuario`,`Usuario`,`Contraseña`,`Telefono`,`Correo`) values 
(1,'Administrador','admin1','a722c63db8ec8625af6cf71cb8c2d939','1234567890','admin1@example.com'),
(2,'Profesor','profesor1','a3224611fd03510682690769d0195d66','0987654321','profesor1@example.com'),
(3,'Alumno','20230004','90bfa11df19a9b9d429ccfa6997104df','1112223333','alumno1@example.com'),
(4,'Alumno','20240002','fc2921d9057ac44e549efaf0048b2512','4445556666','tutor1@example.com'),
(5,'Alumno','2025','202cb962ac59075b964b07152d234b70','1122334455','example@gmail.com'),
(6,'Alumno','2026','202cb962ac59075b964b07152d234b70','7712717123','example@gmail.com'),
(7,'Alumno','2024601','202cb962ac59075b964b07152d234b70','82919298','example@gmail.com'),
(8,'Alumno','2023010','a94652aa97c7211ba8954dd15a3cf838','7712715713','aldahir@gmail.com');

/* Trigger structure for table `tblcalificaciones` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tgrInsertarBitacora` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tgrInsertarBitacora` AFTER UPDATE ON `tblcalificaciones` FOR EACH ROW BEGIN
INSERT INTO tblbitacora(usuario, DatosEliminados, Tabla, Operacion, fecha)
VALUES(USER(), CONCAT(old.IDcalificaciones,' ',old.Matricula,' ',old.Cuatrimestre,' ',old.Par1,' ',old.Par2,' ',old.Par3,' ',old.PromFinal,' ',old.IDmaterias),'tblcalificaciones','update',NOW());
END */$$


DELIMITER ;

/* Procedure structure for procedure `spActualizarAsistencia` */

/*!50003 DROP PROCEDURE IF EXISTS  `spActualizarAsistencia` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spActualizarAsistencia`(
    IN p_IDAsistencia INT,
    IN p_HoraEntrada TIME,
    IN p_Fecha DATE,
    IN p_HoraSalida TIME,
    IN p_IDmatricula VARCHAR(50),
    IN p_NombreMateria VARCHAR(100),
    IN p_Asistencia TINYINT(1),
    IN p_Periodo VARCHAR(30),
    IN p_Cuatrimestre VARCHAR(30)
)
BEGIN
    DECLARE v_IDmaterias INT;
    SELECT IDmaterias INTO v_IDmaterias
    FROM tblmaterias
    WHERE NombreMateria = p_NombreMateria;
    UPDATE tblasistencia
    SET HoraEntrada = p_HoraEntrada,
        Fecha = p_Fecha,
        HoraSalida = p_HoraSalida,
        IDmatricula = p_IDmatricula,
        IDmaterias = v_IDmaterias,
        Asistencia = p_Asistencia,
        Periodo = p_Periodo,
        Cuatrimestre = p_Cuatrimestre
    WHERE IDasistencias = p_IDAsistencia;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spActualizarCalificaciones` */

/*!50003 DROP PROCEDURE IF EXISTS  `spActualizarCalificaciones` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spActualizarCalificaciones`(
    IN p_IDCalificaciones INT,
    IN p_Matricula VARCHAR(50),
    IN p_Par1 DECIMAL(5,2),
    IN p_Par2 DECIMAL(5,2),
    IN p_Par3 DECIMAL(5,2),
    IN p_PromFinal DECIMAL(5,2),
    IN p_NombreMateria VARCHAR(100)
)
BEGIN
    DECLARE v_IDmaterias INT;
    DECLARE v_Periodo VARCHAR(50);
    DECLARE v_Cuatrimestre VARCHAR(50);

    -- Obtener el IDmaterias basado en el NombreMateria
    SELECT IDmaterias INTO v_IDmaterias
    FROM tblMaterias
    WHERE NombreMateria = p_NombreMateria
    LIMIT 1;

    -- Si no se encuentra IDmaterias, asignar NULL
    IF v_IDmaterias IS NULL THEN
        SET v_IDmaterias = NULL;
    END IF;

    -- Obtener Periodo y Cuatrimestre desde tblMatxAsignatura
    SELECT Periodo, Cuatrimestre INTO v_Periodo, v_Cuatrimestre
    FROM tblMatxAsignatura
    WHERE IDmaterias = v_IDmaterias
    LIMIT 1;

    -- Actualizar la tabla tblCalificaciones
    UPDATE tblCalificaciones
    SET Matricula = p_Matricula,
        Periodo = v_Periodo,
        Cuatrimestre = v_Cuatrimestre,
        Par1 = p_Par1,
        Par2 = p_Par2,
        Par3 = p_Par3,
        PromFinal = p_PromFinal,
        IDmaterias = v_IDmaterias
    WHERE IDcalificaciones = p_IDCalificaciones;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spActualizarMaterias` */

/*!50003 DROP PROCEDURE IF EXISTS  `spActualizarMaterias` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spActualizarMaterias`(
    IN pIDmaterias INT,
    IN pNombreMateria VARCHAR(100),
    IN pNivel VARCHAR(50),
    IN pHoras INT
)
BEGIN
    UPDATE tblMaterias
    SET NombreMateria = pNombreMateria, Nivel = pNivel, Horas = pHoras
    WHERE IDmaterias = pIDmaterias;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spActualizarProfesor` */

/*!50003 DROP PROCEDURE IF EXISTS  `spActualizarProfesor` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spActualizarProfesor`(
    IN pIDTrabajador INT,
    IN pAMaterno VARCHAR(50),
    IN pAPaterno VARCHAR(50),
    IN pNombre VARCHAR(50),
    IN pIDmunicipios INT,
    IN pIDUsuario INT
)
BEGIN
    UPDATE tblTrabajador
    SET AMaterno = pAMaterno, APaterno = pAPaterno, Nombre = pNombre, IDmunicipios = pIDmunicipios, IDUsuario = pIDUsuario
    WHERE IDTrabajador = pIDTrabajador;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spConsultaCarreras` */

/*!50003 DROP PROCEDURE IF EXISTS  `spConsultaCarreras` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultaCarreras`()
BEGIN
		SELECT Nombre,logoCarrera FROM tblcarrera;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spEliminarAsistencias` */

/*!50003 DROP PROCEDURE IF EXISTS  `spEliminarAsistencias` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spEliminarAsistencias`(
    IN pIDasistencias INT
)
BEGIN
    DELETE FROM tblAsistencia WHERE IDasistencias = pIDasistencias;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spEliminarProfesor` */

/*!50003 DROP PROCEDURE IF EXISTS  `spEliminarProfesor` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spEliminarProfesor`(
    IN pIDTrabajador INT
)
BEGIN
    DELETE FROM tblTrabajador WHERE IDTrabajador = pIDTrabajador;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spFiltrarAsistencias` */

/*!50003 DROP PROCEDURE IF EXISTS  `spFiltrarAsistencias` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spFiltrarAsistencias`(
    IN p_Usuario VARCHAR(50),
    IN p_Materia VARCHAR(100),
    IN p_Periodo VARCHAR(30),
    IN p_Cuatrimestre VARCHAR(30),
    IN p_Grupo VARCHAR(50)
)
BEGIN
    SELECT 
        a.IDasistencias,
        a.Fecha,
        a.HoraEntrada,
        a.HoraSalida,
        a.IDmatricula,
        a.Asistencia,
        m.NombreMateria AS NombreMateria,  -- Asegúrate de que este alias sea el que estás usando en el formulario
        a.Periodo,
        a.Cuatrimestre
    FROM tblasistencia a
    INNER JOIN tblmaterias m ON a.IDmaterias = m.IDmaterias
    INNER JOIN tblmatxasignatura ma ON m.IDmaterias = ma.IDmaterias
    WHERE ma.Grupo = p_Grupo
      AND a.Periodo = p_Periodo
      AND a.Cuatrimestre = p_Cuatrimestre
      AND m.NombreMateria = p_Materia
      AND EXISTS (
          SELECT 1
          FROM tblmatxasignatura ma
          INNER JOIN tbltrabajador t ON ma.IDTrabajador = t.IDTrabajador
          INNER JOIN tblusuario u ON t.IDUsuario = u.IDUsuario
          WHERE u.Usuario = p_Usuario
            AND ma.IDmaterias = a.IDmaterias
      );
END */$$
DELIMITER ;

/* Procedure structure for procedure `spFiltrarCalificaciones` */

/*!50003 DROP PROCEDURE IF EXISTS  `spFiltrarCalificaciones` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spFiltrarCalificaciones`(
    IN userIn VARCHAR(50), 
    IN mat VARCHAR(50), 
    IN periodo VARCHAR(50), 
    IN cuatri VARCHAR(50), 
    IN gpo VARCHAR(50)
)
BEGIN
    SELECT 
        c.IDcalificaciones, 
        c.Periodo, 
        c.Cuatrimestre,
        a.Grupo, 
        m.NombreMateria,
        c.Matricula,
        c.Par1, 
        c.Par2, 
        c.Par3, 
        c.PromFinal
    FROM tblcalificaciones c
    INNER JOIN tblmatxasignatura a ON c.IDmaterias = a.IDmaterias
    INNER JOIN tblmaterias m ON c.IDmaterias = m.IDmaterias
    INNER JOIN tbltrabajador t ON a.IDTrabajador = t.IDTrabajador
    INNER JOIN tblusuario u ON t.IDUsuario = u.IDUsuario
    WHERE u.Usuario = userIn
      AND m.NombreMateria = mat
      AND c.Periodo = periodo
      AND c.Cuatrimestre = cuatri
      AND a.Grupo = gpo;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spInsertarAlumnos` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertarAlumnos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarAlumnos`(
    IN pMatricula VARCHAR(50),
    IN pNombre VARCHAR(50),
    IN pAPaterno VARCHAR(50),
    IN pAMaterno VARCHAR(50),
    IN pDtHorarios DATETIME,
    IN pSexo VARCHAR(10),
    IN pNombreTutor VARCHAR(100),
    out pMensaje varchar(255),
    out pRespuesta int
)
BEGIN
    DECLARE vCount INT;
    DECLARE vIDUsuario INT;
    -- Validar si la matricula existe en la tabla tblusuario y obtener el IDUsuario
    SELECT COUNT(*), IDUsuario INTO vCount, vIDUsuario
    FROM tblusuario
    WHERE Usuario = pMatricula;
    IF vCount = 0 THEN
        set pRespuesta = 0;
        SET pMensaje = 'Primero se tiene que registrar al usuario del tipo Alumno'    ;
    ELSE
        INSERT INTO tblAlumnos (IDmatricula, Nombre, APaterno, AMaterno, dtHorarios, Sexo, NombreTutor, IDUsuario)
        VALUES (pMatricula, pNombre, pAPaterno, pAMaterno, pDtHorarios, pSexo, pNombreTutor, vIDUsuario);
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spInsertarCarrera` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertarCarrera` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarCarrera`(
    IN pNombre VARCHAR(100),
    IN pLogoCarrera VARCHAR(100),
    OUT pRespuesta INT,
    OUT pMensaje VARCHAR(255)
)
BEGIN
    -- Intentar insertar la carrera
    INSERT INTO tblcarrera (Nombre, logoCarrera)
    VALUES (pNombre, pLogoCarrera);
    -- Verificar si la inserción fue exitosa
    IF ROW_COUNT() > 0 THEN
        SET pRespuesta = 1;
        SET pMensaje = 'Carrera agregada correctamente';
    ELSE
        SET pRespuesta = 0;
        SET pMensaje = 'Error al agregar la carrera';
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spInsertarHorario` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertarHorario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarHorario`(
    IN pImgHorario VARCHAR(100),
    IN pNombreCarrera VARCHAR(100),
    OUT pRespuesta INT,
    OUT pMensaje VARCHAR(255)
)
BEGIN
    DECLARE vIDCarrera INT;
    DECLARE vCount INT;
    -- Contar cuántas carreras con el mismo nombre existen
    SELECT COUNT(IDCarrera) INTO vCount
    FROM tblcarrera
    WHERE Nombre = pNombreCarrera;
    -- Verificar si existe exactamente una carrera con el nombre proporcionado
    IF vCount = 1 THEN
        -- Obtener el ID de la carrera
        SELECT IDCarrera INTO vIDCarrera
        FROM tblcarrera
        WHERE Nombre = pNombreCarrera;
        -- Insertar el horario
        INSERT INTO tblhorarios (imgHorario, IDCarrera)
        VALUES (pImgHorario, vIDCarrera);
        -- Verificar si la inserción fue exitosa
        IF ROW_COUNT() > 0 THEN
            SET pRespuesta = 1;
            SET pMensaje = 'Horario agregado correctamente';
        ELSE
            SET pRespuesta = 0;
            SET pMensaje = 'Error al agregar el horario';
        END IF;
    ELSEIF vCount = 0 THEN
        -- No se encontró ninguna carrera con el nombre proporcionado
        SET pRespuesta = 0;
        SET pMensaje = 'Carrera no encontrada';
    ELSE
        -- Se encontraron múltiples carreras con el nombre proporcionado
        SET pRespuesta = 0;
        SET pMensaje = 'Existen múltiples carreras con ese nombre';
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spInsertarHorarios` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertarHorarios` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarHorarios`(
    IN pImgHorario VARCHAR(255),
    IN pImgLogoUniversidad VARCHAR(255),
    IN pImgLogoCarrera VARCHAR(255),
    IN pNombreMateria VARCHAR(100)
)
BEGIN
    DECLARE vIDmaterias INT;
    -- Obtener el IDmaterias basado en el nombre de la materia
    SELECT IDmaterias INTO vIDmaterias
    FROM tblmaterias
    WHERE NombreMateria = pNombreMateria;
    -- Si no se encuentra la materia, lanzar una excepción
    IF vIDmaterias IS NULL THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La materia especificada no existe';
    ELSE
        -- Insertar el horario con el IDmaterias obtenido
        INSERT INTO tblhorarios (imgHorario, imgLogoUniversidad, imgLogoCarrera, IDmaterias)
        VALUES (pImgHorario, pImgLogoUniversidad, pImgLogoCarrera, vIDmaterias);
        SELECT 'Horario registrado con éxito' AS Mensaje;
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spInsertarMaterias` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertarMaterias` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarMaterias`(
    IN pNombreMateria VARCHAR(100),
    IN pNivel VARCHAR(50),
    IN pHoras INT,
    OUT pRespuesta BOOL,
    OUT pMensaje VARCHAR(255)
)
BEGIN
    SET pRespuesta = FALSE;
    SET pMensaje = 'Error al insertar la materia';
    -- Verificamos si la materia ya existe
    IF EXISTS (SELECT 1 FROM tblMaterias WHERE NombreMateria = pNombreMateria) THEN
        SET pMensaje = 'La materia ya existe';
    ELSE
        -- Insertamos la nueva materia
        INSERT INTO tblMaterias (NombreMateria, Nivel, Horas)
        VALUES (pNombreMateria, pNivel, pHoras);
        SET pRespuesta = TRUE;
        SET pMensaje = 'Materia insertada correctamente';
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spInsertarMatxAsignatura` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertarMatxAsignatura` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarMatxAsignatura`(
    IN pNumTrabajador INT,
    IN pNomCarrera VARCHAR(100),
    IN pPeriodo VARCHAR(50),
    IN pCuatrimestre VARCHAR(50),
    IN pGrupo VARCHAR(50),
    IN pMateria VARCHAR(100),
    IN pNumHorario INT,
    OUT pRespuesta INT,
    OUT pMensaje VARCHAR(255)
)
BEGIN
    DECLARE vIDTrabajador INT DEFAULT NULL;
    DECLARE vIDCarrera INT DEFAULT NULL;
    DECLARE vIDMaterias INT DEFAULT NULL;
    DECLARE vIDHorario INT DEFAULT NULL;
    SET pRespuesta = 0;
    SET pMensaje = 'Operación no realizada';
    -- Verificar si el trabajador existe
    SELECT IDTrabajador INTO vIDTrabajador FROM tbltrabajador WHERE IDTrabajador = pNumTrabajador;
    IF vIDTrabajador IS NULL THEN
        SET pMensaje = 'Trabajador no encontrado';
    ELSE
        -- Verificar si la carrera existe
        SELECT IDCarrera INTO vIDCarrera FROM tblcarrera WHERE Nombre = pNomCarrera;
        IF vIDCarrera IS NULL THEN
            SET pMensaje = 'Carrera no encontrada';
        ELSE
            -- Verificar si la materia existe
            SELECT IDmaterias INTO vIDMaterias FROM tblmaterias WHERE NombreMateria = pMateria;
            IF vIDMaterias IS NULL THEN
                SET pMensaje = 'Materia no encontrada';
            ELSE
                -- Verificar si el horario existe
                SELECT IDhorarios INTO vIDHorario FROM tblhorarios WHERE IDhorarios = pNumHorario;
                IF vIDHorario IS NULL THEN
                    SET pMensaje = 'Horario no encontrado';
                ELSE
                    INSERT INTO tblmatxasignatura (IDTrabajador, IDCarrera, IDmaterias, IDHorario, Periodo, Cuatrimestre, Grupo)
                    VALUES (vIDTrabajador, vIDCarrera, vIDMaterias, vIDHorario, pPeriodo, pCuatrimestre, pGrupo);
                    IF ROW_COUNT() > 0 THEN
                        SET pRespuesta = 1;
                        SET pMensaje = 'Asignación de materia al docente realizada correctamente';
                    ELSE
                        SET pMensaje = 'Error al realizar la asignación';
                    END IF;
                END IF;
            END IF;
        END IF;
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spInsertarUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertarUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarUsuario`(
    IN pTipoUsuario VARCHAR(50),
    IN pUsuario VARCHAR(50),
    IN pContraseña VARCHAR(50),
    IN pTelefono VARCHAR(15),
    IN pCorreo VARCHAR(100),
    OUT pRespuesta INT,
    OUT pMensaje VARCHAR(255)
)
BEGIN
    INSERT INTO tblusuario (TipoUsuario, Usuario, Contraseña, Telefono, Correo)
    VALUES (pTipoUsuario, pUsuario, MD5(pContraseña), pTelefono, pCorreo);
    IF ROW_COUNT() > 0 THEN
        SET pRespuesta = 1;
        SET pMensaje = 'Usuario insertado exitosamente';
    ELSE
        SET pRespuesta = 0;
        SET pMensaje = 'Error al insertar el usuario';
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spLogin` */

/*!50003 DROP PROCEDURE IF EXISTS  `spLogin` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spLogin`(
    IN pRol VARCHAR(50),
    IN pUsuario VARCHAR(50),
    IN pContrasena VARCHAR(50),
    OUT pRespuesta BOOL,
    OUT pMensaje VARCHAR(100)
)
BEGIN
    IF EXISTS (
        SELECT 1 
        FROM tblusuario 
        WHERE TipoUsuario = pRol AND Usuario = pUsuario AND Contraseña = md5(pContraseña)
    ) THEN
        SET pRespuesta = TRUE;
        SET pMensaje = CONCAT('Has accedido correctamente como ', pRol);
    ELSE
        SET pRespuesta = FALSE;
        SET pMensaje = 'Error al acceder';
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spRegistrarAsistencias` */

/*!50003 DROP PROCEDURE IF EXISTS  `spRegistrarAsistencias` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spRegistrarAsistencias`(
    IN pHoraEntrada TIME,
    IN pFecha DATE,
    IN pHoraSalida TIME,
    IN pIDmatricula INT,
    IN pIDmaterias INT
)
BEGIN
    INSERT INTO tblAsistencia (HoraEntrada, Fecha, HoraSalida, IDmatricula, IDmaterias)
    VALUES (pHoraEntrada, pFecha, pHoraSalida, pIDmatricula, pIDmaterias);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spRegistrarCalificaciones` */

/*!50003 DROP PROCEDURE IF EXISTS  `spRegistrarCalificaciones` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spRegistrarCalificaciones`(
    IN pmatricula VARCHAR(20),
    IN pCuatrimestre VARCHAR(50),
    IN pPar1 DECIMAL(5,2),
    IN pPar2 DECIMAL(5,2),
    IN pPar3 DECIMAL(5,2),
    IN pPromFinal DECIMAL(5,2),
    IN pNombreMateria VARCHAR(100)
)
BEGIN
    DECLARE pIDmaterias INT;
    SELECT IDmaterias INTO pIDmaterias
    FROM tblMaterias
    WHERE NombreMateria = pNombreMateria
    LIMIT 1;
   -- Signaisql para todo por asi decirlo cuando hay un error
    IF pIDmaterias IS NULL THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La materia especificada no existe';
    ELSE
        INSERT INTO tblCalificaciones (Matricula, Cuatrimestre, Par1, Par2, Par3, PromFinal, IDmaterias)
        VALUES (pmatricula, pCuatrimestre, pPar1, pPar2, pPar3, pPromFinal, pIDmaterias);
        SELECT 'Calificaciones registradas con éxito' AS Mensaje;
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spReiniciarContraseña` */

/*!50003 DROP PROCEDURE IF EXISTS  `spReiniciarContraseña` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spReiniciarContraseña`(
    IN pUsuario VARCHAR(50),
    IN pNuevaContraseña VARCHAR(50),
    OUT pRespuesta BOOL,
    OUT pMensaje VARCHAR(100)
)
BEGIN
    UPDATE tblusuario
    SET Contraseña = pNuevaContraseña
    WHERE Usuario = pUsuario;
    
    IF ROW_COUNT() > 0 THEN
        SET pRespuesta = TRUE;
        SET pMensaje = 'Contraseña actualizada correctamente';
    ELSE
        SET pRespuesta = FALSE;
        SET pMensaje = 'Usuario no encontrado';
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spTraerAlumnos` */

/*!50003 DROP PROCEDURE IF EXISTS  `spTraerAlumnos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spTraerAlumnos`(
    IN pIDCarrera INT
)
BEGIN
    SELECT a.*
    FROM tblAlumnos a
    JOIN tblMatXAsignatura ma ON a.IDmatricula = ma.IDdocente
    WHERE ma.IDCarrera = pIDCarrera;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spTraerAsistencias` */

/*!50003 DROP PROCEDURE IF EXISTS  `spTraerAsistencias` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spTraerAsistencias`(IN pIDMatricula INT, IN p_NombreMateria VARCHAR(100))
BEGIN
    SELECT a.IDasistencias, a.HoraEntrada, a.Fecha, a.HoraSalida, a.IDMatricula, m.NombreMateria, a.Asistencia
    FROM tblAsistencia a
    JOIN tblMaterias m ON a.IDmaterias = m.IDmaterias
    WHERE a.IDMatricula = pIDMatricula
    AND m.NombreMateria = p_NombreMateria;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spTraerCalificaciones` */

/*!50003 DROP PROCEDURE IF EXISTS  `spTraerCalificaciones` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spTraerCalificaciones`()
BEGIN
    SELECT 
        c.IDcalificaciones, 
        c.Matricula, 
        c.Cuatrimestre, 
        c.Par1, 
        c.Par2, 
        c.Par3, 
        c.PromFinal, 
        m.NombreMateria
    FROM 
        tblcalificaciones c
    INNER JOIN 
        tblMaterias m ON c.IDmaterias = m.IDmaterias
    ORDER BY 
        c.IDcalificaciones;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spTraerCalificacionesAlumno` */

/*!50003 DROP PROCEDURE IF EXISTS  `spTraerCalificacionesAlumno` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spTraerCalificacionesAlumno`(
    IN pIDmatricula VARCHAR(20)
)
BEGIN
    SELECT 
        c.IDcalificaciones, 
        c.Matricula, 
        c.Cuatrimestre, 
        c.Par1, 
        c.Par2, 
        c.Par3, 
        c.PromFinal, 
        m.NombreMateria
    FROM 
        tblcalificaciones c
    INNER JOIN 
        tblMaterias m ON c.IDmaterias = m.IDmaterias
    WHERE 
        c.Matricula = pIDmatricula;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spTraerCarreras` */

/*!50003 DROP PROCEDURE IF EXISTS  `spTraerCarreras` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spTraerCarreras`()
BEGIN
    SELECT * FROM tblCarrera;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spTraerHorarios` */

/*!50003 DROP PROCEDURE IF EXISTS  `spTraerHorarios` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spTraerHorarios`(
    IN pNombreCarrera VARCHAR(100),
    IN pCuatrimestre VARCHAR(50),
    IN pGrupo VARCHAR(50),
    OUT pMensaje VARCHAR(255)
)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
    BEGIN
        SET pMensaje = 'Error al consultar los horarios.';
        ROLLBACK;
    END;
    START TRANSACTION;
    SELECT 
        c.Nombre AS NombreCarrera,
        c.logoCarrera,
        h.imgHorario,
        m.Cuatrimestre,
        m.Grupo,
        m.Periodo
    FROM 
        tblmatxasignatura m
    INNER JOIN 
        tblcarrera c ON m.IDCarrera = c.IDCarrera
    INNER JOIN 
        tblhorarios h ON m.IDHorario = h.IDhorarios
    WHERE 
        c.Nombre = pNombreCarrera
        AND m.Cuatrimestre = pCuatrimestre
        AND m.Grupo = pGrupo
    ORDER BY 
        m.Periodo DESC
    LIMIT 1;
    IF ROW_COUNT() = 0 THEN
        SET pMensaje = 'No se encontraron registros para los criterios proporcionados.';
    ELSE
        SET pMensaje = 'Consulta exitosa.';
    END IF;
    COMMIT;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spTraerMaterias` */

/*!50003 DROP PROCEDURE IF EXISTS  `spTraerMaterias` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spTraerMaterias`(
    IN pIDCarrera INT
)
BEGIN
    SELECT m.*
    FROM tblMaterias m
    JOIN tblMatXAsignatura ma ON m.IDmaterias = ma.IDmaterias
    WHERE ma.IDCarrera = pIDCarrera;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spTraerProfesores` */

/*!50003 DROP PROCEDURE IF EXISTS  `spTraerProfesores` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spTraerProfesores`(
    IN pIDCarrera INT
)
BEGIN
    SELECT t.*
    FROM tblTrabajador t
    JOIN tblMatXAsignatura ma ON t.IDTrabajador = ma.IDTrabajador
    WHERE ma.IDCarrera = pIDCarrera;
END */$$
DELIMITER ;

/*Table structure for table `vwasistencias` */

DROP TABLE IF EXISTS `vwasistencias`;

/*!50001 DROP VIEW IF EXISTS `vwasistencias` */;
/*!50001 DROP TABLE IF EXISTS `vwasistencias` */;

/*!50001 CREATE TABLE  `vwasistencias`(
 `Matricula` varchar(50) ,
 `NombreEstudiante` varchar(50) ,
 `ApellidoPaterno` varchar(50) ,
 `ApellidoMaterno` varchar(50) ,
 `FechaAsistencia` date ,
 `HoraEntrada` time ,
 `HoraSalida` time ,
 `NombreMateria` varchar(100) 
)*/;

/*Table structure for table `vwinformacionalumno` */

DROP TABLE IF EXISTS `vwinformacionalumno`;

/*!50001 DROP VIEW IF EXISTS `vwinformacionalumno` */;
/*!50001 DROP TABLE IF EXISTS `vwinformacionalumno` */;

/*!50001 CREATE TABLE  `vwinformacionalumno`(
 `Matricula` varchar(50) ,
 `NombreEstudiante` varchar(50) ,
 `ApellidoPaterno` varchar(50) ,
 `ApellidoMaterno` varchar(50) ,
 `Horario` datetime ,
 `Sexo` varchar(10) ,
 `NombreTutor` varchar(100) ,
 `NombreCarrera` varchar(100) ,
 `NombreMateria` varchar(100) ,
 `NivelMateria` varchar(50) ,
 `HorasMateria` int(11) 
)*/;

/*View structure for view vwasistencias */

/*!50001 DROP TABLE IF EXISTS `vwasistencias` */;
/*!50001 DROP VIEW IF EXISTS `vwasistencias` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwasistencias` AS select `a`.`IDmatricula` AS `Matricula`,`a`.`Nombre` AS `NombreEstudiante`,`a`.`APaterno` AS `ApellidoPaterno`,`a`.`AMaterno` AS `ApellidoMaterno`,`ast`.`Fecha` AS `FechaAsistencia`,`ast`.`HoraEntrada` AS `HoraEntrada`,`ast`.`HoraSalida` AS `HoraSalida`,`m`.`NombreMateria` AS `NombreMateria` from ((`tblalumnos` `a` left join `tblasistencia` `ast` on(`a`.`IDmatricula` = `ast`.`IDmatricula`)) left join `tblmaterias` `m` on(`m`.`IDmaterias` = `ast`.`IDmaterias`)) */;

/*View structure for view vwinformacionalumno */

/*!50001 DROP TABLE IF EXISTS `vwinformacionalumno` */;
/*!50001 DROP VIEW IF EXISTS `vwinformacionalumno` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwinformacionalumno` AS select `a`.`IDmatricula` AS `Matricula`,`a`.`Nombre` AS `NombreEstudiante`,`a`.`APaterno` AS `ApellidoPaterno`,`a`.`AMaterno` AS `ApellidoMaterno`,`a`.`dtHorarios` AS `Horario`,`a`.`Sexo` AS `Sexo`,`a`.`NombreTutor` AS `NombreTutor`,`c`.`Nombre` AS `NombreCarrera`,`m`.`NombreMateria` AS `NombreMateria`,`m`.`Nivel` AS `NivelMateria`,`m`.`Horas` AS `HorasMateria` from ((`tblalumnos` `a` left join `tblcarrera` `c` on(`a`.`IDUsuario` = `c`.`IDCarrera`)) left join `tblmaterias` `m` on(`a`.`IDUsuario` = `m`.`IDmaterias`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
