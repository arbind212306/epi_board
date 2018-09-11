/*
SQLyog - Free MySQL GUI v5.15
Host - 5.6.22 : Database - springboardv2
*********************************************************************
Server version : 5.6.22
*/

SET NAMES utf8;

SET SQL_MODE='';

create database if not exists `springboardv2`;

USE `springboardv2`;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

/*Table structure for table `access_categories` */

DROP TABLE IF EXISTS `access_categories`;

CREATE TABLE `access_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `controller` varchar(30) DEFAULT NULL,
  `action` varchar(30) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `access_categories` */

insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (1,'Onboarding Management',0,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (2,'Feedback',0,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (3,'Roadmap',0,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (4,'Header Menu',0,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (5,'Manage Joinee',1,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (6,'Logistics Management',1,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (7,'Confirmation',1,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (8,'Supervisor Feedback',2,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (9,'Joinee Feedback',2,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (10,'Arrange',3,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (11,'Add / Edit',3,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (12,'View',3,'Users','roadmap',1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (13,'Manage Joinee',4,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (14,'Logistics',4,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (15,'Confirmation',4,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (16,'Roadmap',4,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (17,'Feedback',4,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (18,'Roles',4,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (19,'Users',4,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (20,'Manage Logistics',4,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (21,'Add / Edit',5,'Users','addUser',1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (22,'View',5,'Users','manageUser',1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (23,'Add / Edit',6,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (24,'View',6,'Users','logistics',1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (25,'Add / Edit',7,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (26,'View',7,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (27,'Add / Edit',8,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (28,'View',8,NULL,NULL,1);
insert into `access_categories` (`id`,`name`,`parent_id`,`controller`,`action`,`status`) values (29,'View',9,NULL,NULL,1);

/*Table structure for table `add_sessions` */

DROP TABLE IF EXISTS `add_sessions`;

CREATE TABLE `add_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `joinee_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `business_unit_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `sub_department_id` int(11) DEFAULT NULL,
  `note` text,
  `session_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `time_created` datetime DEFAULT NULL,
  `time_modified` datetime DEFAULT NULL,
  `is_accepted` int(1) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1' COMMENT '2=acepted by Superviosr',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `add_sessions` */

insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (3,3,1,1,1,7,'Hey Dear You have to meet with this Employee','2018-09-03','10:00:00','11:00:00','2018-08-31 13:30:16','2018-09-04 12:21:36',0,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (5,3,1,1,1,7,'Hey Dear You have to meet with this Employee','2018-09-04','13:00:00','14:00:00','2018-09-03 08:02:24','2018-09-04 13:55:00',0,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (6,3,1,1,1,7,' You have to meet with this Employee','2018-09-05','11:00:00','12:00:00','2018-09-03 08:02:24',NULL,0,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (7,3,1,1,1,7,'Hey Dear You have to meet with this Employee','0000-00-00','00:00:00','00:00:00','2018-09-03 14:14:43',NULL,0,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (8,1,1,1,1,7,'Hey Dear You have to meet with this Employee','2018-09-11','16:41:00','21:42:00','2018-09-04 06:22:51',NULL,0,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (9,1,1,1,1,7,'Hello its changed','2018-09-07','13:05:00','15:07:00','2018-09-04 06:29:26','2018-09-04 13:52:17',0,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (10,6,1,1,1,7,'Hey Dear You have to meet with this Employee','2018-09-05','07:08:00','08:09:00','2018-09-04 06:33:25','2018-09-06 08:26:09',0,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (11,1,7,1,2,7,'Hey Dear You have to meet with this Employee','2018-09-05','17:00:00','18:00:00','2018-09-04 13:23:22',NULL,0,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (12,6,28,1,1,7,'Hello its on 5sep eve changed','2018-09-06','10:00:00','11:00:00','2018-09-05 12:40:16','2018-09-06 09:31:05',0,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (15,2,1,1,1,7,'Need to discuss the career path','2018-09-07','01:00:00','02:30:00','2018-09-06 13:42:17','2018-09-11 06:54:33',0,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (17,2,NULL,1,1,8,'Testing text ','2018-09-11','01:01:00','11:25:00','2018-09-10 05:35:49','2018-09-11 06:55:04',1,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (18,2,1,1,1,7,'','2018-09-12','13:00:00','15:00:00','2018-09-10 05:35:49',NULL,0,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (19,5,35,1,1,7,'Hello 10 sep atul vs rajiv','2018-09-11','13:00:00','15:00:00','2018-09-10 09:54:12',NULL,0,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (20,7,28,1,1,7,'mukul vs supervisor','2018-09-13','12:00:00','13:00:00','2018-09-10 09:55:03',NULL,0,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (21,7,47,1,1,8,'mukul vs employee','2018-09-28','01:00:00','14:00:00','2018-09-10 09:56:06',NULL,0,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (22,47,35,1,1,7,'Hey..you have to attend the meeting  with Rajiv shukla','2018-09-13','19:45:00','20:00:00','2018-09-10 14:06:24','2018-09-10 14:13:42',1,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (23,47,NULL,2,29,53,'Hey..you have to attend the meeting  with Akash','2018-09-11','07:38:00','00:00:00','2018-09-10 14:06:24','2018-09-11 06:15:20',0,1);
insert into `add_sessions` (`id`,`joinee_id`,`user_id`,`business_unit_id`,`department_id`,`sub_department_id`,`note`,`session_date`,`start_time`,`end_time`,`time_created`,`time_modified`,`is_accepted`,`status`) values (24,34,28,1,1,7,'Hey Bro you have scheduled meeting','2018-09-12','15:00:00','17:00:00','2018-09-11 13:38:45',NULL,1,1);

/*Table structure for table `business_units` */

DROP TABLE IF EXISTS `business_units`;

CREATE TABLE `business_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `business_units` */

insert into `business_units` (`id`,`title`,`status`) values (1,'Quatrro Global Services Private Limited',1);
insert into `business_units` (`id`,`title`,`status`) values (2,'Quatrro Business Support Solutions Private Limited',1);
insert into `business_units` (`id`,`title`,`status`) values (3,'Quatrro Processing Services Private Limited',1);
insert into `business_units` (`id`,`title`,`status`) values (4,'Quatrro Legal Solutions Private Limited',1);

/*Table structure for table `departments` */

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `sub_department_id` int(11) DEFAULT NULL,
  `business_unit_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

/*Data for the table `departments` */

insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (1,'Commercial',0,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (2,'Finance',0,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (3,'Technology',0,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (4,'Accounts',0,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (7,'Commercial Subdepartment',1,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (8,'Another Commercial Subdepartment',1,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (9,'Finance Subdepartment',2,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (10,'Another Finance Subdepartment',2,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (15,'Technology Subdepartment',3,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (16,'Another Technology Subdepartment',3,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (17,'Technology Subdepartment',3,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (18,'Another Technology Subdepartment',3,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (19,'Technology Subdepartment',3,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (20,'Another Technology Subdepartment',3,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (21,'Technology Subdepartment',3,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (22,'Another Technology Subdepartment',3,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (23,'Account Subdepartment',4,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (24,'Another Account Subdepartment',4,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (25,'Account Subdepartment',4,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (26,'Another Account Subdepartment',4,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (27,'Account Subdepartment',4,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (28,'Another Account Subdepartment',4,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (29,'Finance',0,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (30,'Technology',0,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (31,'Accounts',0,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (32,'Technology',0,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (41,'Quality and Operations',0,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (42,'Quality and Operations',0,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (43,'Quality and Operations',0,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (46,'Human Resources',0,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (49,'Legal',0,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (50,'Legal',0,4,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (52,'Finance',29,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (53,'Finance',29,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (54,'Finance',29,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (55,'Information Technology',30,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (56,'Information Technology',30,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (57,'Information Technology',30,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (58,'Development',30,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (59,'Development',30,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (60,'Development',30,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (61,'Information Technology',32,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (62,'Information Technology',32,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (63,'Information Technology',32,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (64,'Development',32,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (65,'Development',32,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (66,'Development',32,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (67,'Accounts',31,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (68,'Accounts',31,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (69,'Accounts',31,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (70,'Accounts',31,4,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (71,'Quality and Operations',41,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (72,'Quality and Operations',41,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (73,'Quality and Operations',41,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (74,'Quality and Operations',42,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (75,'Quality and Operations',42,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (76,'Quality and Operations',42,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (77,'Quality and Operations',43,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (78,'Quality and Operations',43,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (79,'Quality and Operations',43,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (80,'Human Resources',0,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (81,'Human Resources',0,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (82,'Human Resources',0,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (83,'Human Resources',0,4,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (84,'Human Resources',46,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (85,'Human Resources',46,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (86,'Human Resources',46,3,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (87,'Human Resources',46,4,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (88,'Legal',49,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (89,'Legal',49,4,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (90,'Legal',50,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (91,'Legal',50,4,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (92,'Finance',2,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (93,'Finance',29,2,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (94,'Information technology',3,1,1);
insert into `departments` (`id`,`title`,`sub_department_id`,`business_unit_id`,`status`) values (95,'Accounts',4,1,1);

/*Table structure for table `feedback_questions` */

DROP TABLE IF EXISTS `feedback_questions`;

CREATE TABLE `feedback_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `question_for` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

/*Data for the table `feedback_questions` */

insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (29,2,3,1);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (30,2,4,1);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (31,2,20,1);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (32,3,2,1);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (33,3,3,1);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (34,3,4,2);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (35,3,5,2);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (36,3,19,2);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (55,1,2,1);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (56,1,3,1);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (57,1,4,1);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (58,1,3,2);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (59,1,4,2);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (60,1,20,2);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (74,4,29,1);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (75,4,34,1);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (76,4,36,1);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (77,4,37,1);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (78,4,38,1);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (79,4,39,1);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (80,5,2,2);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (81,5,3,2);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (82,5,4,2);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (83,5,37,2);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (84,5,38,2);
insert into `feedback_questions` (`id`,`feedback_id`,`question_id`,`question_for`) values (85,5,39,2);

/*Table structure for table `feedback_responses` */

DROP TABLE IF EXISTS `feedback_responses`;

CREATE TABLE `feedback_responses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback_question_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `answer` text,
  `feedback_id` int(11) DEFAULT NULL COMMENT 'To check if complete',
  `feedback_user_id` int(11) DEFAULT NULL,
  `response_by` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'Temporary , will use feedback_user_id later',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

/*Data for the table `feedback_responses` */

insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (1,55,1,'1',1,34,28,'2018-09-06 09:36:26','2018-09-06 09:36:26',34);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (2,56,2,'2',1,34,28,'2018-09-06 09:36:26','2018-09-06 09:36:26',34);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (3,57,3,'3',1,34,28,'2018-09-06 09:36:26','2018-09-06 09:36:26',34);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (4,58,4,'4',1,34,28,'2018-09-06 09:36:26','2018-09-06 09:36:26',34);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (5,59,5,'5',1,34,28,'2018-09-06 09:36:26','2018-09-06 09:36:26',34);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (6,60,0,'sdf',1,34,28,'2018-09-06 09:36:26','2018-09-06 09:36:26',34);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (7,32,5,'5',3,34,28,'2018-09-06 10:32:48','2018-09-06 10:32:48',34);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (8,33,0,'0',3,34,28,'2018-09-06 10:32:48','2018-09-06 10:32:48',34);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (9,34,0,'0',3,34,28,'2018-09-06 10:32:48','2018-09-06 10:32:48',34);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (10,35,0,'0',3,34,28,'2018-09-06 10:32:49','2018-09-06 10:32:49',34);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (11,36,0,'0',3,34,28,'2018-09-06 10:32:49','2018-09-06 10:32:49',34);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (12,55,4,'4',1,7,28,'2018-09-06 11:10:49','2018-09-06 11:10:49',7);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (13,56,4,'4',1,7,28,'2018-09-06 11:10:49','2018-09-06 11:10:49',7);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (14,57,4,'4',1,7,28,'2018-09-06 11:10:49','2018-09-06 11:10:49',7);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (15,58,5,'5',1,7,28,'2018-09-06 11:10:49','2018-09-06 11:10:49',7);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (16,59,4,'1',1,7,28,'2018-09-06 11:10:49','2018-09-06 11:10:49',7);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (17,60,0,'Nice guy',1,7,28,'2018-09-06 11:10:49','2018-09-06 11:10:49',1);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (36,55,4,'4',1,NULL,5,'2018-09-07 09:36:11','2018-09-07 09:36:11',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (37,56,3,'3',1,NULL,5,'2018-09-07 09:36:11','2018-09-07 09:36:11',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (38,57,4,'4',1,NULL,5,'2018-09-07 09:36:11','2018-09-07 09:36:11',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (39,58,2,'2',1,NULL,5,'2018-09-07 09:36:11','2018-09-07 09:36:11',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (40,59,4,'4',1,NULL,5,'2018-09-07 09:36:11','2018-09-07 09:36:11',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (41,60,0,'sadf',1,NULL,5,'2018-09-07 09:36:11','2018-09-07 09:36:11',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (42,29,3,'3',2,NULL,5,'2018-09-07 10:03:19','2018-09-07 10:03:19',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (43,30,3,'3',2,NULL,5,'2018-09-07 10:03:19','2018-09-07 10:03:19',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (44,31,0,'asdf',2,NULL,5,'2018-09-07 10:03:19','2018-09-07 10:03:19',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (45,55,4,'4',1,6,28,'2018-09-10 11:10:18','2018-09-10 11:10:18',6);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (46,56,5,'5',1,6,28,'2018-09-10 11:10:18','2018-09-10 11:10:18',6);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (47,57,3,'3',1,6,28,'2018-09-10 11:10:18','2018-09-10 11:10:18',6);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (48,58,0,'0',1,6,28,'2018-09-10 11:10:18','2018-09-10 11:10:18',6);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (49,59,0,'0',1,6,28,'2018-09-10 11:10:18','2018-09-10 11:10:18',6);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (50,60,0,'jv',1,6,28,'2018-09-10 11:10:18','2018-09-10 11:10:18',6);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (51,32,3,'3',3,NULL,5,'2018-09-10 11:20:28','2018-09-10 11:20:28',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (52,33,3,'3',3,NULL,5,'2018-09-10 11:20:28','2018-09-10 11:20:28',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (53,34,4,'4',3,NULL,5,'2018-09-10 11:20:28','2018-09-10 11:20:28',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (54,35,4,'4',3,NULL,5,'2018-09-10 11:20:28','2018-09-10 11:20:28',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (55,36,4,'4',3,NULL,5,'2018-09-10 11:20:28','2018-09-10 11:20:28',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (56,61,0,'Yes I am',4,NULL,5,'2018-09-11 05:34:57','2018-09-11 05:34:57',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (57,62,0,'Yes I am',4,NULL,5,'2018-09-11 05:34:57','2018-09-11 05:34:57',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (58,63,0,'Yes I am',4,NULL,5,'2018-09-11 05:34:57','2018-09-11 05:34:57',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (59,64,0,'Yes I am',4,NULL,5,'2018-09-11 05:34:58','2018-09-11 05:34:58',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (60,65,0,'Yes I am',4,NULL,5,'2018-09-11 05:34:58','2018-09-11 05:34:58',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (61,66,0,'Yes',4,NULL,5,'2018-09-11 05:34:58','2018-09-11 05:34:58',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (62,55,4,'4',1,NULL,2,'2018-09-11 09:26:50','2018-09-11 09:26:50',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (63,56,2,'2',1,NULL,2,'2018-09-11 09:26:50','2018-09-11 09:26:50',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (64,57,4,'4',1,NULL,2,'2018-09-11 09:26:50','2018-09-11 09:26:50',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (65,58,2,'2',1,NULL,2,'2018-09-11 09:26:50','2018-09-11 09:26:50',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (66,59,3,'3',1,NULL,2,'2018-09-11 09:26:50','2018-09-11 09:26:50',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (67,60,0,'Hi feedback',1,NULL,2,'2018-09-11 09:26:50','2018-09-11 09:26:50',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (68,61,0,'Yes',4,NULL,2,'2018-09-11 09:36:45','2018-09-11 09:36:45',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (69,62,0,'Yes',4,NULL,2,'2018-09-11 09:36:46','2018-09-11 09:36:46',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (70,63,0,'Yes',4,NULL,2,'2018-09-11 09:36:46','2018-09-11 09:36:46',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (71,64,0,'Yes',4,NULL,2,'2018-09-11 09:36:46','2018-09-11 09:36:46',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (72,65,0,'Yes',4,NULL,2,'2018-09-11 09:36:46','2018-09-11 09:36:46',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (73,66,0,'Yes',4,NULL,2,'2018-09-11 09:36:46','2018-09-11 09:36:46',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (74,29,4,'4',2,NULL,2,'2018-09-11 13:04:51','2018-09-11 13:04:51',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (75,30,2,'2',2,NULL,2,'2018-09-11 13:04:51','2018-09-11 13:04:51',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (76,31,0,'Answer for qustion',2,NULL,2,'2018-09-11 13:04:51','2018-09-11 13:04:51',NULL);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (77,55,5,'5',1,2,28,'2018-09-11 13:06:32','2018-09-11 13:06:32',2);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (78,56,0,'0',1,2,28,'2018-09-11 13:06:32','2018-09-11 13:06:32',2);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (79,57,0,'0',1,2,28,'2018-09-11 13:06:32','2018-09-11 13:06:32',2);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (80,58,2,'2',1,2,28,'2018-09-11 13:06:32','2018-09-11 13:06:32',2);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (81,59,4,'4',1,2,28,'2018-09-11 13:06:32','2018-09-11 13:06:32',2);
insert into `feedback_responses` (`id`,`feedback_question_id`,`rating`,`answer`,`feedback_id`,`feedback_user_id`,`response_by`,`created`,`modified`,`user_id`) values (82,60,0,'asdasd',1,2,28,'2018-09-11 13:06:32','2018-09-11 13:06:32',2);

/*Table structure for table `feedback_users` */

DROP TABLE IF EXISTS `feedback_users`;

CREATE TABLE `feedback_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `feedback_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '0' COMMENT '0=pending;1=complate',
  `completed_on` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `feedback_users` */

insert into `feedback_users` (`id`,`user_id`,`feedback_id`,`status`,`completed_on`) values (1,6,1,1,'2018-09-06');

/*Table structure for table `feedbacks` */

DROP TABLE IF EXISTS `feedbacks`;

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `interval_days` int(11) DEFAULT '0' COMMENT 'interval in days',
  `description` varchar(200) DEFAULT NULL,
  `for_joinee` int(1) DEFAULT '0',
  `for_supervisor` int(1) DEFAULT '0',
  `status` int(1) DEFAULT '1',
  `list_type` int(11) DEFAULT NULL COMMENT '1=checklist',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `feedbacks` */

insert into `feedbacks` (`id`,`title`,`interval_days`,`description`,`for_joinee`,`for_supervisor`,`status`,`list_type`) values (1,'Feedback 15 Days',15,'Desc',1,1,1,NULL);
insert into `feedbacks` (`id`,`title`,`interval_days`,`description`,`for_joinee`,`for_supervisor`,`status`,`list_type`) values (2,'Feedback after 1st week',7,'Joininig day',1,0,1,NULL);
insert into `feedbacks` (`id`,`title`,`interval_days`,`description`,`for_joinee`,`for_supervisor`,`status`,`list_type`) values (3,'1st month feedback',30,'1st month feedback',1,1,1,NULL);
insert into `feedbacks` (`id`,`title`,`interval_days`,`description`,`for_joinee`,`for_supervisor`,`status`,`list_type`) values (4,'15 Day Checklist',15,'15 Day Checklist for user',1,0,1,1);
insert into `feedbacks` (`id`,`title`,`interval_days`,`description`,`for_joinee`,`for_supervisor`,`status`,`list_type`) values (5,'45 Days checklist',45,'45 Days Checklist Description',0,1,0,NULL);

/*Table structure for table `hrms_users` */

DROP TABLE IF EXISTS `hrms_users`;

CREATE TABLE `hrms_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `city` varchar(126) DEFAULT NULL,
  `state` varchar(126) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `businees_unit` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `sub_department` varchar(100) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `band` varchar(15) DEFAULT NULL,
  `manager_emp_id` varchar(50) DEFAULT NULL,
  `bhr_emp_id` varchar(50) DEFAULT NULL,
  `time_created` datetime NOT NULL,
  `time_modified` datetime DEFAULT NULL,
  `status` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `hrms_users` */

/*Table structure for table `locations` */

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `locations` */

insert into `locations` (`id`,`title`,`status`) values (1,'Chennai',1);
insert into `locations` (`id`,`title`,`status`) values (2,'Mumbai',1);
insert into `locations` (`id`,`title`,`status`) values (3,'Gurgaon',1);
insert into `locations` (`id`,`title`,`status`) values (4,'Noida',1);

/*Table structure for table `logistics` */

DROP TABLE IF EXISTS `logistics`;

CREATE TABLE `logistics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `business_unit_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `sub_department_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `time_created` datetime DEFAULT NULL,
  `time_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `logistics` */

insert into `logistics` (`id`,`title`,`description`,`business_unit_id`,`location_id`,`department_id`,`sub_department_id`,`status`,`time_created`,`time_modified`) values (1,'LAN Id Creation','Description of LAN ID Creation',1,1,1,7,1,'0000-00-00 00:00:00',NULL);
insert into `logistics` (`id`,`title`,`description`,`business_unit_id`,`location_id`,`department_id`,`sub_department_id`,`status`,`time_created`,`time_modified`) values (2,'Business Card','Description of business Card providing',2,2,2,9,1,'0000-00-00 00:00:00',NULL);
insert into `logistics` (`id`,`title`,`description`,`business_unit_id`,`location_id`,`department_id`,`sub_department_id`,`status`,`time_created`,`time_modified`) values (3,'Voice Support','Description for Voice Support in Gurgaon',3,3,3,15,1,'0000-00-00 00:00:00','2018-09-07 06:30:48');
insert into `logistics` (`id`,`title`,`description`,`business_unit_id`,`location_id`,`department_id`,`sub_department_id`,`status`,`time_created`,`time_modified`) values (4,'Car Parking Sticker','Description of Car Parking Sticker',1,4,4,23,1,'0000-00-00 00:00:00',NULL);
insert into `logistics` (`id`,`title`,`description`,`business_unit_id`,`location_id`,`department_id`,`sub_department_id`,`status`,`time_created`,`time_modified`) values (5,'Access Card/Photo ID card','This logistic arrangements for  Access Card/Photo ID card in gurgaon plot -119',1,3,1,7,1,'2018-09-05 07:48:22','2018-09-07 06:25:55');
insert into `logistics` (`id`,`title`,`description`,`business_unit_id`,`location_id`,`department_id`,`sub_department_id`,`status`,`time_created`,`time_modified`) values (6,'System request','This is System request for Gurgaon plot -119.',1,3,3,NULL,1,'2018-09-05 07:50:09',NULL);
insert into `logistics` (`id`,`title`,`description`,`business_unit_id`,`location_id`,`department_id`,`sub_department_id`,`status`,`time_created`,`time_modified`) values (7,'Desktop Configuration','Description for desktop configuration',4,2,50,91,1,'2018-09-07 06:32:22',NULL);

/*Table structure for table `logistics_arrangement` */

DROP TABLE IF EXISTS `logistics_arrangement`;

CREATE TABLE `logistics_arrangement` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `logistic_id` varchar(11) NOT NULL,
  `r_status` int(1) NOT NULL,
  `time_created` datetime NOT NULL,
  `logistic_arrangement_add_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

/*Data for the table `logistics_arrangement` */

insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (30,3,'2',0,'2018-08-29 06:10:04',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (31,3,'3',0,'2018-08-29 06:10:04',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (32,9,'1',0,'2018-08-29 06:11:09',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (33,9,'2',0,'2018-08-29 06:11:09',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (34,9,'3',0,'2018-08-29 06:11:09',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (35,9,'4',0,'2018-08-29 06:11:09',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (36,1,'1',0,'2018-08-29 11:16:15',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (37,1,'2',0,'2018-08-29 11:16:15',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (38,1,'3',0,'2018-08-29 11:16:15',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (39,1,'1',0,'2018-08-29 11:17:04',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (40,1,'2',0,'2018-08-29 11:17:04',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (41,1,'3',0,'2018-08-29 11:17:04',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (42,1,'4',0,'2018-08-29 11:17:04',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (43,1,'2',0,'2018-08-29 11:17:26',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (44,1,'3',0,'2018-08-29 11:17:26',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (45,1,'4',0,'2018-08-29 11:17:26',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (46,1,'2',0,'2018-08-29 11:18:11',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (47,1,'4',0,'2018-08-29 11:18:11',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (77,5,'3',0,'2018-08-31 14:23:21',1);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (78,5,'4',0,'2018-08-31 14:23:21',1);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (79,34,'1',0,'2018-09-03 06:09:00',2);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (80,34,'3',1,'2018-09-03 06:09:00',2);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (81,34,'4',1,'2018-09-03 06:09:00',2);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (82,34,'2',0,'2018-09-04 10:38:00',2);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (83,5,'1',0,'2018-09-04 11:08:27',2);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (84,7,'4',0,'2018-09-04 11:11:40',2);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (85,3,'1',0,'2018-09-04 13:57:57',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (86,6,'1',0,'2018-09-05 06:30:04',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (87,6,'2',0,'2018-09-05 06:30:04',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (88,6,'3',0,'2018-09-05 06:30:04',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (98,47,'1',1,'2018-09-10 13:09:05',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (99,47,'2',0,'2018-09-10 13:09:05',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (100,47,'3',1,'2018-09-10 13:09:05',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (101,47,'4',0,'2018-09-10 13:09:05',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (102,2,'1',1,'2018-09-11 06:00:30',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (103,2,'2',1,'2018-09-11 06:00:30',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (104,2,'3',1,'2018-09-11 06:00:30',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (105,55,'1',0,'2018-09-11 07:24:09',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (106,55,'7',0,'2018-09-11 07:24:09',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (107,55,'5',0,'2018-09-11 07:24:58',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (108,55,'6',0,'2018-09-11 07:24:58',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (109,55,'4',0,'2018-09-11 07:31:19',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (117,48,'1',0,'2018-09-11 12:48:11',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (118,48,'4',0,'2018-09-11 12:48:11',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (123,48,'2',0,'2018-09-11 13:27:43',NULL);
insert into `logistics_arrangement` (`id`,`user_id`,`logistic_id`,`r_status`,`time_created`,`logistic_arrangement_add_by`) values (124,48,'5',0,'2018-09-11 13:27:43',NULL);

/*Table structure for table `questions` */

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `type` int(11) DEFAULT NULL COMMENT '1=text;2=rating;',
  `category` varchar(100) DEFAULT NULL,
  `describtion` text,
  `status` varchar(11) DEFAULT NULL COMMENT '0=inactive;1=active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `questions` */

insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (1,'How would you rate his/her performance up to this point?',1,'Organize Behaviour','','0');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (2,'Your overall experience',2,NULL,NULL,'1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (3,'How would you rate his/her performance up to this point?',2,NULL,NULL,'1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (4,'Your overall experience',2,NULL,NULL,'1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (5,'How would you rate his/her performance up to this point?',2,NULL,NULL,'1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (6,'Your overall experience',2,NULL,NULL,'1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (7,'How would you rate his/her performance up to this point?',2,NULL,NULL,'1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (8,'Your overall experience',2,NULL,NULL,'1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (9,'Process management skills',2,NULL,NULL,'0');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (10,'Do you feel any additional training is required over the period of next 3-6 months to help the new employee perform better.',1,NULL,NULL,'0');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (11,'Any additional feedback/Comment.',2,NULL,NULL,'1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (18,'its a new qns',2,'Support Resource','new desc','1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (19,'this is question new',2,'Human Resource','this is desc1','1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (20,'this is question2 updated',1,'Learning Outsource','this is desc2','1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (21,'this is question3new',2,'Human Resource','this is desc3','1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (22,'test rating question2s....',2,'Human Resource','desc....gfhfj....','1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (23,'this is text uped by abh',2,'Learning Outsource','this is desc added by abh','0');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (24,'this is text2 upd',2,'Support Resource','this is desc2 updateded by abhi..','0');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (25,'this is text3 updated by abhishek',1,'Human Resource','this is desc3  updated by abhishek','0');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (29,' I am aware of Quatrro values and its journey',1,'Organize Behaviour','','1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (30,'this is abhi type1',2,'Learning Outsource','this is abhi type desc1','1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (31,'this is abhi type2 updated',1,'Human Resource','this is abhi type desc2 updated','1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (32,'this is 1',2,'Process Overview','desc1','1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (33,'this is type2 updated',1,'Support Resource','desc2 updated','1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (34,'I am aware of Quatrro organisation structure',1,'Organize Behaviour','','1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (35,' I am aware of Quatrro policies',1,'Organize Behaviour','','1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (36,'I am aware of entire training process',1,'Process Overview','','1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (37,'I have gone through entire HR Communication process',1,'Process Overview','','1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (38,'I am aware of entire training process ',1,'Learning Outsource','','1');
insert into `questions` (`id`,`title`,`type`,`category`,`describtion`,`status`) values (39,'I already had a meeting with my team lead',1,'Learning Outsource','','1');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `access` text,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert into `roles` (`id`,`title`,`description`,`access`,`status`) values (1,'Admin','Admin','[\"5\",\"21\",\"22\",\"6\",\"23\",\"24\",\"7\",\"25\",\"26\",\"8\",\"27\",\"28\",\"9\",\"29\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\"]','1');
insert into `roles` (`id`,`title`,`description`,`access`,`status`) values (2,'Supervisor','supervisor','[\"5\",\"21\",\"22\",\"13\"]','1');
insert into `roles` (`id`,`title`,`description`,`access`,`status`) values (3,'SPOC','SPOC',NULL,'1');
insert into `roles` (`id`,`title`,`description`,`access`,`status`) values (4,'Employee','Employee',NULL,'1');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` int(2) DEFAULT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `city` varchar(126) DEFAULT NULL,
  `state` varchar(126) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `businees_unit` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `sub_department` varchar(100) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `band` varchar(15) DEFAULT NULL,
  `manager_emp_id` varchar(50) DEFAULT NULL,
  `bhr_emp_id` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  `status` int(1) unsigned NOT NULL DEFAULT '1' COMMENT '0=inactive;1=active;2=confirmed;3=rejected;',
  `auth_type` varchar(30) NOT NULL,
  `supervisor_name` varchar(50) DEFAULT NULL,
  `ob_status` int(1) DEFAULT NULL,
  `manager_name` varchar(50) DEFAULT NULL,
  `manager_email` varchar(150) DEFAULT NULL,
  `bhr_name` varchar(50) DEFAULT NULL,
  `bhr_email` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert into `users` (`id`,`user_type`,`username`,`password`,`emp_id`,`first_name`,`last_name`,`doj`,`email`,`mobile`,`city`,`state`,`country`,`businees_unit`,`department`,`sub_department`,`designation`,`band`,`manager_emp_id`,`bhr_emp_id`,`created`,`modified`,`last_login`,`status`,`auth_type`,`supervisor_name`,`ob_status`,`manager_name`,`manager_email`,`bhr_name`,`bhr_email`) values (1,1,'tss00065@gmail.com','0E0A9BFBCCA3F2321ED02EFCDE0D0527','QGS-001','Aditya','Jain','2018-08-15','tss00065@gmail.com',NULL,NULL,NULL,NULL,'1','1','7','PHP Developer',NULL,'QGS-002',NULL,'2018-08-29 00:00:00',NULL,NULL,1,'Manual',NULL,1,NULL,NULL,NULL,NULL);
insert into `users` (`id`,`user_type`,`username`,`password`,`emp_id`,`first_name`,`last_name`,`doj`,`email`,`mobile`,`city`,`state`,`country`,`businees_unit`,`department`,`sub_department`,`designation`,`band`,`manager_emp_id`,`bhr_emp_id`,`created`,`modified`,`last_login`,`status`,`auth_type`,`supervisor_name`,`ob_status`,`manager_name`,`manager_email`,`bhr_name`,`bhr_email`) values (2,4,'akshay.jain836@gmail.com','$2y$10$rqJO1MDMvMHcHQYmvKFTderWnGm9FJ.HUr684eD3BhUdcjmwwl/D2','QGS-002','Akshay','Jain','2018-08-11','akshay.jain836@gmail.com','9784789956','Delhi',NULL,'Viyatnam','3','2','7','PHP Developer','B4','QGS-025','QUA96358','2018-08-11 00:00:00','2018-09-06 12:16:15',NULL,2,'Manual',NULL,1,'Amit Kumar','amit.kumar@quatrro.com','Rakesh Kumar','rakesh.kumar@quatrro.com');
insert into `users` (`id`,`user_type`,`username`,`password`,`emp_id`,`first_name`,`last_name`,`doj`,`email`,`mobile`,`city`,`state`,`country`,`businees_unit`,`department`,`sub_department`,`designation`,`band`,`manager_emp_id`,`bhr_emp_id`,`created`,`modified`,`last_login`,`status`,`auth_type`,`supervisor_name`,`ob_status`,`manager_name`,`manager_email`,`bhr_name`,`bhr_email`) values (3,0,'Abhishek','$2y$10$jQJn/.F.ymYuaMI6QfLm1eGDBGZbGrhSRDV1fIL.kGkM49hF2BrWW','QGS-003','Abhishek','Gupta','2018-08-21','abhishekkumargupta33@gmail.com','7503275011','Delhi',NULL,'India','1','3','7','software developer',NULL,'QGS-002','','2018-08-21 00:00:00',NULL,NULL,1,'Manual',NULL,1,NULL,NULL,NULL,NULL);
insert into `users` (`id`,`user_type`,`username`,`password`,`emp_id`,`first_name`,`last_name`,`doj`,`email`,`mobile`,`city`,`state`,`country`,`businees_unit`,`department`,`sub_department`,`designation`,`band`,`manager_emp_id`,`bhr_emp_id`,`created`,`modified`,`last_login`,`status`,`auth_type`,`supervisor_name`,`ob_status`,`manager_name`,`manager_email`,`bhr_name`,`bhr_email`) values (25,1,'admin','$2y$10$AvHB03bBHOmqzc/q2rnFwe73q73HEatvzGdvPWwe9TVQsJh3wNqZC','QGS-025','Admin','','2018-08-24','admin@quatrro.com','','Thane',NULL,'Select','1','4','7','PHP Developer','','QGS-002','','0000-00-00 00:00:00',NULL,NULL,1,'Manual',NULL,1,NULL,NULL,NULL,NULL);
insert into `users` (`id`,`user_type`,`username`,`password`,`emp_id`,`first_name`,`last_name`,`doj`,`email`,`mobile`,`city`,`state`,`country`,`businees_unit`,`department`,`sub_department`,`designation`,`band`,`manager_emp_id`,`bhr_emp_id`,`created`,`modified`,`last_login`,`status`,`auth_type`,`supervisor_name`,`ob_status`,`manager_name`,`manager_email`,`bhr_name`,`bhr_email`) values (26,0,'Testing','$2y$10$WKiLT4uJd/T8QT4.dzeg3eCDtVPGmETcZCSPdAf.EFWXhREbQKNHu','QGS-026','Admin','Admin','2018-08-30','','9874563215','Delhi',NULL,'India','2','1','9','PHP Developer','B1','QGS-002','QUA78549','0000-00-00 00:00:00',NULL,NULL,1,'Manual',NULL,1,NULL,NULL,NULL,NULL);
insert into `users` (`id`,`user_type`,`username`,`password`,`emp_id`,`first_name`,`last_name`,`doj`,`email`,`mobile`,`city`,`state`,`country`,`businees_unit`,`department`,`sub_department`,`designation`,`band`,`manager_emp_id`,`bhr_emp_id`,`created`,`modified`,`last_login`,`status`,`auth_type`,`supervisor_name`,`ob_status`,`manager_name`,`manager_email`,`bhr_name`,`bhr_email`) values (28,2,'supervisor','$2y$10$Cfg7k3jTMgJKfecpJO51lO0mhYsupZn0lLx.c5h1ZaktnYUEpl/0e','QGS-028','Supervisor','Spring','2018-08-28','supervisor@quatrro.com','7845784512','Delhi',NULL,'India','1','1','7','Team Lead','4','QGS-002','BHR','2018-08-28 06:54:50','2018-08-28 06:54:50',NULL,1,'Manual',NULL,1,NULL,NULL,NULL,NULL);
insert into `users` (`id`,`user_type`,`username`,`password`,`emp_id`,`first_name`,`last_name`,`doj`,`email`,`mobile`,`city`,`state`,`country`,`businees_unit`,`department`,`sub_department`,`designation`,`band`,`manager_emp_id`,`bhr_emp_id`,`created`,`modified`,`last_login`,`status`,`auth_type`,`supervisor_name`,`ob_status`,`manager_name`,`manager_email`,`bhr_name`,`bhr_email`) values (34,4,'kundan','$2y$10$rqJO1MDMvMHcHQYmvKFTderWnGm9FJ.HUr684eD3BhUdcjmwwl/D2','QGS-034','Kundan','Singh','2018-08-30','kundan@gmail.com','8287057800','Delhi',NULL,'India','1','3','7','SSE','B','QGS-002','BHR','2018-08-31 10:29:08','2018-09-07 07:52:13',NULL,1,'Manual',NULL,1,NULL,NULL,NULL,NULL);
insert into `users` (`id`,`user_type`,`username`,`password`,`emp_id`,`first_name`,`last_name`,`doj`,`email`,`mobile`,`city`,`state`,`country`,`businees_unit`,`department`,`sub_department`,`designation`,`band`,`manager_emp_id`,`bhr_emp_id`,`created`,`modified`,`last_login`,`status`,`auth_type`,`supervisor_name`,`ob_status`,`manager_name`,`manager_email`,`bhr_name`,`bhr_email`) values (35,2,'Rajiv','$2y$10$Q0cF9P82g3bVXqGZlo2WSuXsPTxYZu3oUeQvXq8xwOL/fDSQqU77W','QGS-035','Rajiv','Sukhla','2018-09-05','rajiv@gmail.com','9337180770','Delhi',NULL,'India','1','1','7','Engineer','2','QGS-002','QMA0024','2018-09-04 09:33:49','2018-09-05 09:33:49',NULL,2,'Manual',NULL,1,'Sanjeev','Sanjeev@gmail.com','Shiv','shiv@gmail.com');
insert into `users` (`id`,`user_type`,`username`,`password`,`emp_id`,`first_name`,`last_name`,`doj`,`email`,`mobile`,`city`,`state`,`country`,`businees_unit`,`department`,`sub_department`,`designation`,`band`,`manager_emp_id`,`bhr_emp_id`,`created`,`modified`,`last_login`,`status`,`auth_type`,`supervisor_name`,`ob_status`,`manager_name`,`manager_email`,`bhr_name`,`bhr_email`) values (48,4,'Abhishek','$2y$10$nxFik0qoDrlHP8e5yuF5OunjAGshDbnQW48b97kMF/yyOy5J.XYW.','QUA021R','Abhishek','Gupta','2018-09-10','abhishek@gmail.com','','Delhi',NULL,'USA','1','4','95','Developer','2','QGS-002','QMA0024','2018-09-09 13:25:30','2018-09-10 13:25:30',NULL,1,'Manual',NULL,1,'Sanjeev','Sanjeev@gmail.com','Shiv','shiv@gmail.com');
insert into `users` (`id`,`user_type`,`username`,`password`,`emp_id`,`first_name`,`last_name`,`doj`,`email`,`mobile`,`city`,`state`,`country`,`businees_unit`,`department`,`sub_department`,`designation`,`band`,`manager_emp_id`,`bhr_emp_id`,`created`,`modified`,`last_login`,`status`,`auth_type`,`supervisor_name`,`ob_status`,`manager_name`,`manager_email`,`bhr_name`,`bhr_email`) values (54,4,'Rajiv','$2y$10$kNt8xVE6wwNTFxOFZ.0wB.BlHYSCAgYf/2CNlNOqd95hZo8WT.vhW','QUA021R','Rajiv','','2018-09-10','rajiv1@gmail.com','pass','Thane',NULL,'India','2','80','','Developer','1','QGS-002','QMA0024','2018-08-08 13:38:47','2018-09-11 06:02:41',NULL,2,'Manual',NULL,1,'Sanjeev','Sanjeev@gmail.com','Shiv','shiv@gmail.com');
insert into `users` (`id`,`user_type`,`username`,`password`,`emp_id`,`first_name`,`last_name`,`doj`,`email`,`mobile`,`city`,`state`,`country`,`businees_unit`,`department`,`sub_department`,`designation`,`band`,`manager_emp_id`,`bhr_emp_id`,`created`,`modified`,`last_login`,`status`,`auth_type`,`supervisor_name`,`ob_status`,`manager_name`,`manager_email`,`bhr_name`,`bhr_email`) values (55,4,'Baren','$2y$10$mdTpalVq37uNpgWPew1Q2OYX7FVrlxPbavja41TUbb.SobCDTXqSi','QUA021R','Baren','','2018-09-10','baren@gmail.com','','Thane',NULL,'USA','2','42','76','Developer','2','QGS-002','QMA0024','2018-09-07 13:42:13','2018-09-10 13:42:13',NULL,1,'Manual',NULL,1,'Sanjeev','Sanjeev@gmail.com','Shiv','shiv@gmail.com');

SET SQL_MODE=@OLD_SQL_MODE;