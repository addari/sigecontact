/*
SQLyog Ultimate v8.54 
MySQL - 5.5.27 : Database - contact
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`contact` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `contact`;

/*Table structure for table `cruge_authassignment` */

DROP TABLE IF EXISTS `cruge_authassignment`;

CREATE TABLE `cruge_authassignment` (
  `userid` int(11) NOT NULL,
  `bizrule` text,
  `data` text,
  `itemname` varchar(64) NOT NULL,
  PRIMARY KEY (`userid`,`itemname`),
  KEY `fk_cruge_authassignment_cruge_authitem1` (`itemname`),
  KEY `fk_cruge_authassignment_user` (`userid`),
  CONSTRAINT `fk_cruge_authassignment_cruge_authitem1` FOREIGN KEY (`itemname`) REFERENCES `cruge_authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_authassignment_user` FOREIGN KEY (`userid`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cruge_authassignment` */

/*Table structure for table `cruge_authitem` */

DROP TABLE IF EXISTS `cruge_authitem`;

CREATE TABLE `cruge_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cruge_authitem` */

insert  into `cruge_authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('action_erpMaContactValorT_create',0,'',NULL,'N;'),('action_erpMaContactValorT_index',0,'',NULL,'N;'),('action_erpMaContactValor_create',0,'',NULL,'N;'),('action_erpMaContactValor_index',0,'',NULL,'N;'),('action_erpMaContactValor_view',0,'',NULL,'N;'),('action_erpMaContact_create',0,'',NULL,'N;'),('action_erpMaContact_delete',0,'',NULL,'N;'),('action_erpMaContact_index',0,'',NULL,'N;'),('action_erpMaContact_update',0,'',NULL,'N;'),('action_erpMaContact_view',0,'',NULL,'N;'),('action_erpMaValoresTipoCateg_create',0,'',NULL,'N;'),('action_erpMaValoresTipoCateg_index',0,'',NULL,'N;'),('action_erpMaValoresTipoCateg_update',0,'',NULL,'N;'),('action_erpMaValoresTipoCateg_view',0,'',NULL,'N;'),('action_erpMaValoresTipo_create',0,'',NULL,'N;'),('action_erpMaValoresTipo_GenerateExcel',0,'',NULL,'N;'),('action_erpMaValoresTipo_GeneratePdf',0,'',NULL,'N;'),('action_erpMaValoresTipo_index',0,'',NULL,'N;'),('action_erpMaValoresTipo_update',0,'',NULL,'N;'),('action_erpMaValoresTipo_view',0,'',NULL,'N;'),('action_test_create',0,'',NULL,'N;'),('action_test_index',0,'',NULL,'N;'),('action_test_update',0,'',NULL,'N;'),('action_test_view',0,'',NULL,'N;'),('action_ui_systemupdate',0,'',NULL,'N;');

/*Table structure for table `cruge_authitemchild` */

DROP TABLE IF EXISTS `cruge_authitemchild`;

CREATE TABLE `cruge_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `crugeauthitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `crugeauthitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cruge_authitemchild` */

/*Table structure for table `cruge_field` */

DROP TABLE IF EXISTS `cruge_field`;

CREATE TABLE `cruge_field` (
  `idfield` int(11) NOT NULL AUTO_INCREMENT,
  `fieldname` varchar(20) NOT NULL,
  `longname` varchar(50) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `required` int(11) DEFAULT '0',
  `fieldtype` int(11) DEFAULT '0',
  `fieldsize` int(11) DEFAULT '20',
  `maxlength` int(11) DEFAULT '45',
  `showinreports` int(11) DEFAULT '0',
  `useregexp` varchar(512) DEFAULT NULL,
  `useregexpmsg` varchar(512) DEFAULT NULL,
  `predetvalue` mediumblob,
  PRIMARY KEY (`idfield`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cruge_field` */

/*Table structure for table `cruge_fieldvalue` */

DROP TABLE IF EXISTS `cruge_fieldvalue`;

CREATE TABLE `cruge_fieldvalue` (
  `idfieldvalue` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfield` int(11) NOT NULL,
  `value` blob,
  PRIMARY KEY (`idfieldvalue`),
  KEY `fk_cruge_fieldvalue_cruge_user1` (`iduser`),
  KEY `fk_cruge_fieldvalue_cruge_field1` (`idfield`),
  CONSTRAINT `fk_cruge_fieldvalue_cruge_user1` FOREIGN KEY (`iduser`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_fieldvalue_cruge_field1` FOREIGN KEY (`idfield`) REFERENCES `cruge_field` (`idfield`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cruge_fieldvalue` */

/*Table structure for table `cruge_session` */

DROP TABLE IF EXISTS `cruge_session`;

CREATE TABLE `cruge_session` (
  `idsession` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `created` bigint(30) DEFAULT NULL,
  `expire` bigint(30) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `ipaddress` varchar(45) DEFAULT NULL,
  `usagecount` int(11) DEFAULT '0',
  `lastusage` bigint(30) DEFAULT NULL,
  `logoutdate` bigint(30) DEFAULT NULL,
  `ipaddressout` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsession`),
  KEY `crugesession_iduser` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `cruge_session` */

insert  into `cruge_session`(`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) values (1,1,1372969650,1372971450,0,'::1',1,1372969650,NULL,NULL),(2,1,1372972623,1372974423,0,'::1',1,1372972623,NULL,NULL),(3,1,1372978696,1373578636,1,'::1',1,1372978696,NULL,NULL);

/*Table structure for table `cruge_system` */

DROP TABLE IF EXISTS `cruge_system`;

CREATE TABLE `cruge_system` (
  `idsystem` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `largename` varchar(45) DEFAULT NULL,
  `sessionmaxdurationmins` int(11) DEFAULT '30',
  `sessionmaxsameipconnections` int(11) DEFAULT '10',
  `sessionreusesessions` int(11) DEFAULT '1' COMMENT '1yes 0no',
  `sessionmaxsessionsperday` int(11) DEFAULT '-1',
  `sessionmaxsessionsperuser` int(11) DEFAULT '-1',
  `systemnonewsessions` int(11) DEFAULT '0' COMMENT '1yes 0no',
  `systemdown` int(11) DEFAULT '0',
  `registerusingcaptcha` int(11) DEFAULT '0',
  `registerusingterms` int(11) DEFAULT '0',
  `terms` blob,
  `registerusingactivation` int(11) DEFAULT '1',
  `defaultroleforregistration` varchar(64) DEFAULT NULL,
  `registerusingtermslabel` varchar(100) DEFAULT NULL,
  `registrationonlogin` int(11) DEFAULT '1',
  PRIMARY KEY (`idsystem`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `cruge_system` */

insert  into `cruge_system`(`idsystem`,`name`,`largename`,`sessionmaxdurationmins`,`sessionmaxsameipconnections`,`sessionreusesessions`,`sessionmaxsessionsperday`,`sessionmaxsessionsperuser`,`systemnonewsessions`,`systemdown`,`registerusingcaptcha`,`registerusingterms`,`terms`,`registerusingactivation`,`defaultroleforregistration`,`registerusingtermslabel`,`registrationonlogin`) values (1,'default',NULL,9999,10,1,-1,-1,0,0,0,0,'',0,'','',1);

/*Table structure for table `cruge_user` */

DROP TABLE IF EXISTS `cruge_user`;

CREATE TABLE `cruge_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `regdate` bigint(30) DEFAULT NULL,
  `actdate` bigint(30) DEFAULT NULL,
  `logondate` bigint(30) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL COMMENT 'Hashed password',
  `authkey` varchar(100) DEFAULT NULL COMMENT 'llave de autentificacion',
  `state` int(11) DEFAULT '0',
  `totalsessioncounter` int(11) DEFAULT '0',
  `currentsessioncounter` int(11) DEFAULT '0',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `cruge_user` */

insert  into `cruge_user`(`iduser`,`regdate`,`actdate`,`logondate`,`username`,`email`,`password`,`authkey`,`state`,`totalsessioncounter`,`currentsessioncounter`) values (1,NULL,NULL,1372978696,'admin','admin@tucorreo.com','admin',NULL,1,0,0),(2,NULL,NULL,NULL,'invitado','invitado','nopassword',NULL,1,0,0);

/*Table structure for table `erp_ma_contact` */

DROP TABLE IF EXISTS `erp_ma_contact`;

CREATE TABLE `erp_ma_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `erp_ma_contact` */

insert  into `erp_ma_contact`(`id`,`nombre`,`timestamp`) values (1,'Argenis Bolivar','2013-07-04 18:16:26'),(2,'Yervis Colmenares','2013-07-05 13:08:42'),(3,'Prueba','2013-07-05 15:39:58'),(4,'Test 2','2013-07-05 19:59:47'),(5,'Test 3','2013-07-05 20:10:35'),(8,'Para Borrar','2013-07-05 20:35:34'),(11,'rtrtrtrtr','2013-07-06 10:16:38'),(13,'sdsdsdsd','2013-07-06 10:51:09'),(15,'Test 8','2013-07-06 11:30:07');

/*Table structure for table `erp_ma_contact_valor` */

DROP TABLE IF EXISTS `erp_ma_contact_valor`;

CREATE TABLE `erp_ma_contact_valor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_contact` int(11) NOT NULL,
  `id_tipo_valor` int(11) NOT NULL,
  `valor` varchar(256) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_erp_ma_contact_valor_1` (`id_contact`),
  KEY `FK_erp_ma_contact_valor` (`id_tipo_valor`),
  CONSTRAINT `FK_erp_ma_contact_valor` FOREIGN KEY (`id_tipo_valor`) REFERENCES `erp_ma_valores_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_erp_ma_contact_valor_1` FOREIGN KEY (`id_contact`) REFERENCES `erp_ma_contact` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `erp_ma_contact_valor` */

insert  into `erp_ma_contact_valor`(`id`,`id_contact`,`id_tipo_valor`,`valor`,`timestamp`) values (1,1,1,'+507-6215-9630','2013-07-05 13:02:11'),(2,1,3,'abolivar@gmail.com','2013-07-05 13:06:27'),(3,1,5,'Chanis','2013-07-05 13:06:45'),(4,1,6,'NYBC','2013-07-05 13:06:59'),(5,2,1,'+507-6674-3010','2013-07-05 13:09:10'),(6,2,2,'+507-390-1701','2013-07-05 13:10:09'),(7,2,3,'yervis@gmail.com','2013-07-05 13:10:32'),(8,2,4,'yervis@tecnologiapty.com','2013-07-05 13:10:58'),(9,2,7,'16-05-1977','2013-07-05 13:20:00'),(10,2,8,'Si','2013-07-05 13:24:40'),(11,2,10,'1','2013-07-05 13:26:44'),(15,15,1,'fdfdfd','2013-07-06 11:30:07'),(16,4,1,'12345678','2013-07-08 08:50:55'),(17,5,3,'saa@dsdsdsd.com','2013-07-08 09:05:16'),(18,8,1,'+507-1245-4587','2013-07-08 09:07:21'),(19,8,2,'+507-789-1234','2013-07-08 09:07:21'),(20,8,3,'ddsdsd@gmail.com','2013-07-08 09:07:21'),(21,5,1,'+507-7899-45678','2013-07-08 09:09:56'),(23,5,1,'','2013-07-08 09:12:33'),(24,1,4,'abolivar@tecnologiapty.com','2013-07-08 19:33:25');

/*Table structure for table `erp_ma_valores_tipo` */

DROP TABLE IF EXISTS `erp_ma_valores_tipo`;

CREATE TABLE `erp_ma_valores_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `validacion` varchar(256) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_erp_ma_valores_tipo` (`id_categoria`),
  CONSTRAINT `FK_erp_ma_valores_tipo` FOREIGN KEY (`id_categoria`) REFERENCES `erp_ma_valores_tipo_categ` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `erp_ma_valores_tipo` */

insert  into `erp_ma_valores_tipo`(`id`,`id_categoria`,`nombre`,`validacion`,`timestamp`) values (1,1,'Movil Personal',NULL,'2013-07-05 10:58:26'),(2,1,'Fijo Trabajo',NULL,'2013-07-05 12:18:35'),(3,2,'Personal',NULL,'2013-07-05 12:19:56'),(4,2,'Trabajo',NULL,'2013-07-05 12:20:12'),(5,3,'Personal',NULL,'2013-07-05 12:20:30'),(6,3,'Trabajo',NULL,'2013-07-05 12:20:45'),(7,4,'Cumpleaños',NULL,'2013-07-05 13:19:25'),(8,5,'Casado(a)',NULL,'2013-07-05 13:22:58'),(9,5,'Soltero(a)',NULL,'2013-07-05 13:23:12'),(10,6,'Cantidad de Hijos',NULL,'2013-07-05 13:26:10');

/*Table structure for table `erp_ma_valores_tipo_categ` */

DROP TABLE IF EXISTS `erp_ma_valores_tipo_categ`;

CREATE TABLE `erp_ma_valores_tipo_categ` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `erp_ma_valores_tipo_categ` */

insert  into `erp_ma_valores_tipo_categ`(`id`,`nombre`,`timestamp`) values (1,'Teléfono','2013-07-04 18:15:11'),(2,'Correo Electrónico','2013-07-04 18:15:37'),(3,'Dirección','2013-07-04 18:16:00'),(4,'Fecha','2013-07-05 13:18:56'),(5,'Estado Civil','2013-07-05 13:21:44'),(6,'Familia','2013-07-05 13:25:50');

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(11) NOT NULL DEFAULT '0',
  `LANGUAGE` varchar(16) NOT NULL DEFAULT '',
  `translation` text,
  PRIMARY KEY (`id`,`LANGUAGE`),
  CONSTRAINT `FK_Message_SourceMessage` FOREIGN KEY (`id`) REFERENCES `sourcemessage` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `message` */

/*Table structure for table `sourcemessage` */

DROP TABLE IF EXISTS `sourcemessage`;

CREATE TABLE `sourcemessage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(32) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;

/*Data for the table `sourcemessage` */

insert  into `sourcemessage`(`id`,`category`,`message`) values (1,'app','Login'),(2,'app','Please fill out the following form with your login credentials:'),(3,'CrugeModule.logon','Username'),(4,'CrugeModule.logon','or'),(5,'CrugeModule.logon','Email'),(6,'CrugeModule.logon','Password'),(7,'CrugeModule.logon','Remember this machine'),(8,'CrugeModule.logon','Security code'),(9,'app','Recover Password'),(10,'app','Status'),(11,'app','Contactos'),(12,'app','Carga de Tracking desde Archivo'),(13,'app','Lista de Tracking'),(14,'app','Movimientos de Tracking'),(15,'app','Buscar Movimientos por Tracking'),(16,'app','Asignar Tracking a Clientes'),(17,'app','Asignar Status a Tracking'),(18,'app','Reporte1'),(19,'app','Reporte2'),(20,'app','Reporte3'),(21,'app','Reporte4'),(22,'app','Reporte5'),(23,'app','Tipos de Identificación'),(24,'app','Mensajes de Origen'),(25,'app','Traducción de Mensajes'),(26,'CrugeModule.admin','User Manager'),(27,'CrugeModule.admin','Update Profile'),(28,'CrugeModule.admin','Create User'),(29,'CrugeModule.admin','Manage Users'),(30,'CrugeModule.admin','Custom Fields'),(31,'CrugeModule.admin','List Profile Fields'),(32,'CrugeModule.admin','Create Profile Field'),(33,'CrugeModule.admin','Roles and Assignments'),(34,'CrugeModule.admin','Roles'),(35,'CrugeModule.admin','Tasks'),(36,'CrugeModule.admin','Operations'),(37,'CrugeModule.admin','Assign Roles to Users'),(38,'CrugeModule.admin','System'),(39,'CrugeModule.admin','Sessions'),(40,'CrugeModule.admin','System Variables'),(41,'CrugeModule.logger','Returned User'),(42,'CrugeModule.logon','Invalid username'),(43,'CrugeModule.logon','Password may contain numbers or symbols ({symbols}) and between {min} and {max} characters'),(44,'CrugeModule.logon','Please, confirm checking the checkbox'),(45,'CrugeModule.logon','Please, check if you understand and accept the terms of use'),(46,'CrugeModule.logon','Security code is mandatory'),(47,'CrugeModule.logon','Security code is invalid'),(48,'CrugeModule.logon','\'{attribute}\' already in use'),(49,'app','Logout'),(50,'app','Load File'),(51,'app','Load URL'),(52,'title','ErpMaContacts'),(53,'app','Create'),(54,'app','List'),(55,'app','Search'),(56,'app','Export to PDF'),(57,'app','Export to CSV'),(58,'app','Information'),(59,'app','You may optionally enter a comparison operator'),(60,'app','or'),(61,'app','at the beginning of each of your search values to specify how the comparison should be done.'),(62,'label','ErpMaContact.id'),(63,'label','ErpMaContact.nombre'),(64,'app','Reset'),(65,'title','ErpMaContact'),(66,'app','Fields with'),(67,'app','are required'),(68,'app','Save'),(69,'app','Cancel'),(70,'CrugeModule.logger','PERMISSION IS REQUIRED'),(71,'CrugeModule.logger','This page displays the roles, tasks and operations that are required by the current user but unassigned. This message is displayed because CrugeModule::rbacSetupEnabled = true'),(72,'CrugeModule.logger','Assignments required by the user'),(73,'app','Categorias de Tipos de Valores'),(74,'app','Tipos de Valores'),(75,'app','Tipos de Valores para Contacto'),(76,'app','Valores para Contacto'),(77,'title','ErpMaValoresTipoCategs'),(78,'label','ErpMaValoresTipoCateg.id'),(79,'label','ErpMaValoresTipoCateg.nombre'),(80,'title','ErpMaValoresTipos'),(81,'label','ErpMaValoresTipo.id'),(82,'label','ErpMaValoresTipo.id_categoria'),(83,'label','ErpMaValoresTipo.nombre'),(84,'label','ErpMaValoresTipo.validacion'),(85,'app','Select'),(86,'title','ErpMaContactValorTs'),(87,'label','ErpMaContactValorT.id'),(88,'label','ErpMaContactValorT.id_tipo'),(89,'label','ErpMaContactValorT.nombre'),(90,'title','ErpMaContactValors'),(91,'label','ErpMaContactValor.id'),(92,'label','ErpMaContactValor.id_contact'),(93,'label','ErpMaContactValor.id_tipo_valor'),(94,'label','ErpMaContactValor.valor'),(95,'title','ErpMaContactValor'),(96,'title','ErpMaValoresTipoCateg'),(97,'app','View'),(98,'app','Update'),(99,'app','Print'),(100,'app','ErpMaValoresTipos'),(101,'app','ErpMaContactValors'),(102,'title','ErpMaValoresTipo'),(103,'ESelect2.select2','No matches found'),(104,'ESelect2.select2','Please enter {chars} more characters'),(105,'ESelect2.select2','Please enter {chars} less characters'),(106,'ESelect2.select2','You can only select {count} items'),(107,'ESelect2.select2','Loading more results...'),(108,'ESelect2.select2','Searching...'),(109,'title','Tests'),(110,'label','Test.id'),(111,'label','Test.nombre'),(112,'label','Test.email'),(113,'label','Test.image'),(114,'label','Test.url'),(115,'label','Test.descripcion'),(116,'title','Test'),(117,'app','ErpMaContactValorTs'),(118,'AweCrud.app','password'),(119,'AweCrud.app','Create'),(120,'app','Test|Tests'),(121,'AweCrud.app','Manage'),(122,'AweCrud.app','List'),(123,'app','ID'),(124,'app','Nombre'),(125,'app','Email'),(126,'app','Image'),(127,'app','Url'),(128,'app','Descripcion'),(129,'AweCrud.app','Advanced Search'),(130,'app','Field is required'),(131,'AweCrud.app','Search'),(132,'AweCrud.app','Update'),(133,'AweCrud.app','Delete'),(134,'AweCrud.app','Are you sure you want to delete this item?'),(135,'AweCrud.app','View'),(136,'app','1'),(137,'AweCrud.app','Fields with'),(138,'AweCrud.app','are required'),(139,'AweCrud.app','Cancel'),(140,'title','ErpMaContactValorT'),(141,'app','Remove'),(142,'app','Add Items'),(143,'label','ErpMaContactValor.valorxxx'),(144,'label','ErpMaContactValor.valoryyy'),(145,'label','ErpMaContactValor.id_tipo_valor.categoria'),(146,'label','ErpMaContactValor.id_tipo_valor.nombre'),(147,'label','ErpMaContactValor.valorrrrr'),(148,'label','ErpMaContactValor.idTipoValor.categoria'),(149,'label','ErpMaContactValor.idTipoValor.nombre');

/*Table structure for table `test` */

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `descripcion` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `test` */

insert  into `test`(`id`,`nombre`,`email`,`image`,`url`,`descripcion`) values (1,'Prueba','cacaca@gagag.com','F:\\xampp\\htdocs\\desarrollo\\sigecontact\\themes\\classic\\images\\prueba.jpg','http://wewewewewe.com','<table id=\"table38538\"><tbody><tr><td><br></td><td><br></td><td class=\"redactor-current-td\" style=\"text-align: right;\"><ol><li><span style=\"line-height: 21.75px;\">dsd</span></li><li><span style=\"line-height: 21.75px;\">sdsds</span></li><li><span style=\"line-height: 21.75px;\">sdsd</span></li><li><span style=\"line-height: 21.75px;\">sdsd</span></li><li><span style=\"line-height: 21.75px;\">sdsd</span></li><li><span style=\"line-height: 21.75px;\">sdsd</span></li><li><span style=\"line-height: 21.75px;\">dsds</span></li></ol></td></tr><tr><td><br></td><td><br></td><td><br></td></tr></tbody></table><p></p><p><b>Hola, Como estas?</b></p><p>asasasa</p><p>asasas</p><p>asasasa</p>\r\n'),(2,'aasas','asasa@fdfdfd.com',NULL,'ffdfdf',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
