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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `batch_course` */

/*Table structure for table `batch_course_event` */

DROP TABLE IF EXISTS `batch_course_event`;

CREATE TABLE `batch_course_event` (
  `int` int(5) NOT NULL AUTO_INCREMENT,
  `batch_id` int(5) DEFAULT NULL,
  `course_id` int(5) DEFAULT NULL,
  `event_title` varchar(100) DEFAULT NULL,
  `type_code` varchar(5) DEFAULT NULL,
  `event_date` varchar(50) DEFAULT NULL,
  `marks` int(5) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_created` int(5) DEFAULT NULL,
  PRIMARY KEY (`int`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `batch_course_event` */

/*Table structure for table `course` */

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'ACT' COMMENT 'ACT|DACT',
  `fee` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `course` */

/*Table structure for table `course_subject` */

DROP TABLE IF EXISTS `course_subject`;

CREATE TABLE `course_subject` (
  `course_id` int(5) NOT NULL,
  `year_semester` varchar(50) DEFAULT NULL,
  `subject_id` int(5) NOT NULL,
  `lecture_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`course_id`,`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `course_subject` */

/*Table structure for table `lecture` */

DROP TABLE IF EXISTS `lecture`;

CREATE TABLE `lecture` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `lecture_name` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `lecture` */

insert  into `lecture`(`id`,`username`,`lecture_name`,`description`) values (1,'LEC1','Mr. Chandika','HOD');

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
  `tp` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_user` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `student` */

insert  into `student`(`id`,`fname`,`lname`,`username`,`email`,`gender`,`address`,`tp`,`mobile`,`created_date`,`created_user`) values (1,'Gayan','Promod','STU1','pramod@gmail.com',NULL,NULL,NULL,NULL,'2017-10-29 08:31:49',3);

/*Table structure for table `student_attendance` */

DROP TABLE IF EXISTS `student_attendance`;

CREATE TABLE `student_attendance` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `student_id` int(5) DEFAULT NULL,
  `batch_id` int(5) DEFAULT NULL,
  `attend_date` varchar(20) DEFAULT NULL,
  `usercreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `student_attendance` */

/*Table structure for table `student_batch` */

DROP TABLE IF EXISTS `student_batch`;

CREATE TABLE `student_batch` (
  `id` int(5) NOT NULL,
  `student_id` int(5) DEFAULT NULL,
  `batch_id` int(5) DEFAULT NULL,
  `student_batch` int(5) DEFAULT NULL,
  `datecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `student_batch` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `subject` */

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
  `status` varchar(10) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role_code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`status`,`created_date`,`role_code`) values (1,'STU1','*667F407DE7C6AD07358FA38DAED7828A72014B4E','ACT','2017-10-29 08:25:23','STUDENT'),(2,'LEC1','*667F407DE7C6AD07358FA38DAED7828A72014B4E','ACT','2017-10-29 08:26:20','LECTURE'),(3,'admin','*667F407DE7C6AD07358FA38DAED7828A72014B4E','ACT','2017-10-29 08:28:56','ADMIN');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
