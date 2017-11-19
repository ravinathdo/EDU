/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.1.21-MariaDB : Database - stumsdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`stumsdb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `stumsdb`;

/*Table structure for table `batch_course` */

DROP TABLE IF EXISTS `batch_course`;

CREATE TABLE `batch_course` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `course_id` int(5) DEFAULT NULL,
  `year` int(5) DEFAULT NULL,
  `course_year` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `batch_course` */

insert  into `batch_course`(`id`,`course_id`,`year`,`course_year`) values (1,1,2017,'12017'),(2,1,2917,'12917'),(3,1,2018,'12018'),(4,1,3009,'13009');

/*Table structure for table `batch_course_event` */

DROP TABLE IF EXISTS `batch_course_event`;

CREATE TABLE `batch_course_event` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `batch_id` int(5) DEFAULT NULL,
  `course_id` int(5) DEFAULT NULL,
  `event_title` varchar(100) DEFAULT NULL,
  `type_code` varchar(5) DEFAULT NULL,
  `event_date` varchar(50) DEFAULT NULL,
  `marks` int(5) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lecture_created` int(5) DEFAULT NULL,
  `course_subject_id` int(5) DEFAULT NULL,
  `question` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `batch_course_event` */

insert  into `batch_course_event`(`id`,`batch_id`,`course_id`,`event_title`,`type_code`,`event_date`,`marks`,`date_created`,`lecture_created`,`course_subject_id`,`question`) values (1,2,1,'Assognment','ASSI','2017-11-16',100,'2017-11-16 05:22:12',1,2,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.'),(2,1,1,'sss','ASSI','2017-11-16',34,'2017-11-16 06:03:53',1,2,NULL);

/*Table structure for table `course` */

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'ACT' COMMENT 'ACT|DACT',
  `fee` decimal(10,2) DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL,
  `course_sig` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`course_sig`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `course` */

insert  into `course`(`id`,`course_name`,`description`,`status`,`fee`,`duration`,`course_sig`) values (1,'Informatin Tech','this is full time course','ACT','2334445.00','FULL TIME','Informatin Tech-FULL TIME');

/*Table structure for table `course_subject` */

DROP TABLE IF EXISTS `course_subject`;

CREATE TABLE `course_subject` (
  `course_id` int(5) NOT NULL,
  `year_semester` varchar(50) NOT NULL,
  `subject_id` int(5) NOT NULL,
  `lecture_id` int(5) DEFAULT NULL,
  `course_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`course_id`,`year_semester`,`subject_id`),
  UNIQUE KEY `autoid` (`course_subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `course_subject` */

insert  into `course_subject`(`course_id`,`year_semester`,`subject_id`,`lecture_id`,`course_subject_id`) values (1,'Year1-semester1',4,1,1),(1,'Year3-semester1',4,2,2);

/*Table structure for table `lecture` */

DROP TABLE IF EXISTS `lecture`;

CREATE TABLE `lecture` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `lecture_name` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `profile_info` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `lecture` */

insert  into `lecture`(`id`,`username`,`lecture_name`,`description`,`profile_info`) values (1,'LEC1','Mr. Chandika','HOD',NULL),(2,'LEC2','Ravinath','HID','Degress UK '),(3,'LEC3','Gyana','Perea','Msc in IT '),(4,'LEC4','','',' ');

/*Table structure for table `student` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `nic` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_user` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `student` */

insert  into `student`(`id`,`fname`,`lname`,`username`,`email`,`gender`,`address`,`nic`,`mobile`,`created_date`,`created_user`) values (1,'Gayan','Promod','STU1','pramod@gmail.com',NULL,NULL,NULL,NULL,'2017-10-29 08:31:49',3),(2,'xxx','yyy','STU2','aaa@gmail.com','Male','Raddoluwa','0716766677','0998887788','2017-11-14 21:35:14',3),(3,'xxx','yyy','STU3','aaa@gmail.com','Male','Raddoluwa','0716766677','0998887788','2017-11-14 21:50:47',3),(4,'vvvvv','bbbb','STU4','sadasdas','sss','sdsds','222','3333','2017-11-14 21:53:32',3);

/*Table structure for table `student_attendance` */

DROP TABLE IF EXISTS `student_attendance`;

CREATE TABLE `student_attendance` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `student_id` int(5) DEFAULT NULL,
  `attend_date` varchar(20) DEFAULT NULL,
  `usercreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `student_attendance` */

insert  into `student_attendance`(`id`,`student_id`,`attend_date`,`usercreated`) values (1,1,'2017-11-15','2017-11-15 22:02:56'),(2,2,'2017-11-13','2017-11-15 22:04:49');

/*Table structure for table `student_batch` */

DROP TABLE IF EXISTS `student_batch`;

CREATE TABLE `student_batch` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `student_id` int(5) DEFAULT NULL,
  `batch_id` int(5) DEFAULT NULL,
  `student_batch` int(5) DEFAULT NULL,
  `datecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `student_batch` */

insert  into `student_batch`(`id`,`student_id`,`batch_id`,`student_batch`,`datecreated`) values (1,1,2,1,'2017-11-14 22:29:37');

/*Table structure for table `student_event` */

DROP TABLE IF EXISTS `student_event`;

CREATE TABLE `student_event` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `event_id` int(5) DEFAULT NULL,
  `student_id` int(5) DEFAULT NULL,
  `doc_path` varchar(50) DEFAULT NULL,
  `marks` int(5) DEFAULT NULL,
  `marked_lecture` int(5) DEFAULT NULL,
  `submitdate_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `student_event` */

insert  into `student_event`(`id`,`event_id`,`student_id`,`doc_path`,`marks`,`marked_lecture`,`submitdate_time`) values (2,0,1,'2.doc',NULL,NULL,'2017-11-17 20:49:09');

/*Table structure for table `student_marks` */

DROP TABLE IF EXISTS `student_marks`;

CREATE TABLE `student_marks` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `event_id` int(5) DEFAULT NULL,
  `student_id` int(5) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL,
  `created_user` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `student_marks` */

/*Table structure for table `student_payment` */

DROP TABLE IF EXISTS `student_payment`;

CREATE TABLE `student_payment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `student_course_id` int(5) DEFAULT NULL,
  `batch_id` int(5) DEFAULT NULL,
  `payment_amount` decimal(10,5) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `student_payment` */

/*Table structure for table `subject` */

DROP TABLE IF EXISTS `subject`;

CREATE TABLE `subject` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `subject` */

insert  into `subject`(`id`,`subject_name`) values (1,'Java'),(2,'XML'),(3,'Phy'),(4,'PHP EE');

/*Table structure for table `type` */

DROP TABLE IF EXISTS `type`;

CREATE TABLE `type` (
  `type_code` varchar(5) NOT NULL,
  `type_description` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`type_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `type` */

insert  into `type`(`type_code`,`type_description`) values ('ASSI','Assignment'),('EXAM','Examp');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `status` varchar(10) DEFAULT 'ACT',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role_code` varchar(10) DEFAULT NULL,
  `firstlog` int(2) DEFAULT '0',
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`status`,`created_date`,`role_code`,`firstlog`,`created_by`) values (1,'STU1','*667F407DE7C6AD07358FA38DAED7828A72014B4E','ACT','2017-10-29 08:25:23','STUDENT',0,NULL),(2,'LEC1','*667F407DE7C6AD07358FA38DAED7828A72014B4E','ACT','2017-10-29 08:26:20','LECTURE',0,NULL),(3,'admin','*667F407DE7C6AD07358FA38DAED7828A72014B4E','ACT','2017-10-29 08:28:56','ADMIN',0,NULL),(4,'LEC3','*CE571C076956A52011255997D875CDD0952FF6E7','ACT','2017-11-12 08:19:12','LECTURE',1,'admin'),(5,'LEC4','*31575248DBD7048A05FC603F4468F7AC6D209FF1','ACT','2017-11-12 08:19:13','LECTURE',1,'admin'),(6,'STU2','*DA8326AE85698F38E9D3754C814C2E69B1DAE74D','ACT','2017-11-14 21:35:14','LECTURE',1,'admin'),(7,'STU3','*7DD68802BF6C1F67BA93B01049639BE619A16F37','ACT','2017-11-14 21:50:47','LECTURE',1,'admin'),(8,'STU4','*2F3541E196872CD2114EB9A7EF272110F2D305BE','ACT','2017-11-14 21:53:32','LECTURE',1,'admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
