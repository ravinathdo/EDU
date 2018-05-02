/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.2.7-MariaDB : Database - stumsdb
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`course_year`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `batch_course` */

insert  into `batch_course`(`id`,`course_id`,`year`,`course_year`) values (1,1,2017,'12017'),(2,1,2917,'12917'),(3,1,2018,'12018'),(4,1,3009,'13009'),(5,2,2018,'2-2018'),(6,5,2018,'5-2018');

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
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `lecture_created` int(5) DEFAULT NULL,
  `course_subject_id` int(5) DEFAULT NULL,
  `question` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `batch_course_event` */

insert  into `batch_course_event`(`id`,`batch_id`,`course_id`,`event_title`,`type_code`,`event_date`,`marks`,`date_created`,`lecture_created`,`course_subject_id`,`question`) values (1,2,1,'Assognment','ASSI','2017-11-20',100,'2017-11-16 05:22:12',2,2,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.'),(2,1,1,'sss','ASSI','2017-11-16',34,'2017-11-16 06:03:53',1,2,NULL),(3,6,5,'Project Submitions','ASSI','2018-04-20',100,'2018-04-17 12:12:05',1,3,'This is a project document submit'),(4,1,5,'Samplex','ASSI','2018-04-20',14,'2018-04-17 12:17:03',1,3,'sadsadsa'),(5,1,5,'Sample','ASSI','2018-04-20',14,'2018-04-17 12:21:35',1,3,'sadsadsa');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `course` */

insert  into `course`(`id`,`course_name`,`description`,`status`,`fee`,`duration`,`course_sig`) values (1,'Informatin Tech','this is full time course','ACT','2334445.00','FULL TIME','Informatin Tech-FULL TIME'),(2,'Agriculture','This is full yim','ACT','15200.00','FULL TIME','Agriculture-FULL TIME'),(5,'Business IT','Full time','ACT','25000.00','FULL TIME','Business IT-FULL TIME');

/*Table structure for table `course_aditional` */

DROP TABLE IF EXISTS `course_aditional`;

CREATE TABLE `course_aditional` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fee_details` varchar(250) DEFAULT NULL,
  `assignments` varchar(250) DEFAULT NULL,
  `marking_schemes` varchar(250) DEFAULT NULL,
  `projects` varchar(250) DEFAULT NULL,
  `examination` varchar(250) DEFAULT NULL,
  `course_id` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `course_aditional` */

insert  into `course_aditional`(`id`,`fee_details`,`assignments`,`marking_schemes`,`projects`,`examination`,`course_id`) values (1,'1500 two instal ments',NULL,NULL,NULL,NULL,'1'),(10,'Fee details','Assignments details','Marking schemes','Projects Details XX XX XX XX','','5');

/*Table structure for table `course_subject` */

DROP TABLE IF EXISTS `course_subject`;

CREATE TABLE `course_subject` (
  `course_id` int(5) NOT NULL,
  `year_semester` varchar(50) NOT NULL,
  `subject_id` int(5) NOT NULL,
  `lecture_id` int(5) NOT NULL,
  `course_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`course_id`,`year_semester`,`subject_id`),
  UNIQUE KEY `autoid` (`course_subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `course_subject` */

insert  into `course_subject`(`course_id`,`year_semester`,`subject_id`,`lecture_id`,`course_subject_id`) values (1,'Year1-semester1',4,1,1),(1,'Year3-semester1',4,2,2),(5,'Year1-semester1',1,1,3),(5,'Year1-semester2',8,7,5);

/*Table structure for table `lecture` */

DROP TABLE IF EXISTS `lecture`;

CREATE TABLE `lecture` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `nic` varchar(20) DEFAULT NULL,
  `lecture_name` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `profile_info` varchar(200) DEFAULT NULL,
  `photo` varchar(250) DEFAULT 'default.jpg',
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`nic`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `lecture` */

insert  into `lecture`(`id`,`username`,`nic`,`lecture_name`,`description`,`profile_info`,`photo`) values (1,'LEC1','1','Mr. Chandika','HOD',NULL,'default.jpg'),(2,'LEC2','22','Ravinath','HID','Degress UK ','default.jpg'),(3,'LEC3','33','Gyana','Perea','Msc in IT ','default.jpg'),(4,'LEC4','555','','',' ','default.jpg'),(5,'LEC5','5556','Kumara','Seb',' sad','default.jpg'),(6,'LEC6','88','Kumara G','Seb',' sad','default.jpg'),(7,'LEC7','853352144','Kumara','SF',' ','default.jpg'),(8,'LEC8','2222111','Chandika','SF','Software Professinal','LEC8.png');

/*Table structure for table `lecture_slides` */

DROP TABLE IF EXISTS `lecture_slides`;

CREATE TABLE `lecture_slides` (
  `course_id` int(5) DEFAULT NULL,
  `year_semester` varchar(20) DEFAULT NULL,
  `subject_id` int(5) DEFAULT NULL,
  `slide_title` varchar(50) DEFAULT NULL,
  `slide_doc` varchar(100) DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `lecture_slides` */

insert  into `lecture_slides`(`course_id`,`year_semester`,`subject_id`,`slide_title`,`slide_doc`,`created_datetime`) values (1,'Year1-semester1',4,'sadsadsad','Vision (2).jpg','2018-04-18 11:31:21'),(5,'Year1-semester1',1,'The Business','WhatsApp Image 2017-12-20 at 9.45.57 AM.jpeg','2018-04-18 12:08:49');

/*Table structure for table `ozekimessagein` */

DROP TABLE IF EXISTS `ozekimessagein`;

CREATE TABLE `ozekimessagein` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(30) DEFAULT NULL,
  `receiver` varchar(30) DEFAULT NULL,
  `msg` text DEFAULT NULL,
  `senttime` varchar(100) DEFAULT NULL,
  `receivedtime` varchar(100) DEFAULT NULL,
  `operator` varchar(100) DEFAULT NULL,
  `msgtype` varchar(160) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ozekimessagein` */

/*Table structure for table `ozekimessageout` */

DROP TABLE IF EXISTS `ozekimessageout`;

CREATE TABLE `ozekimessageout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(30) DEFAULT NULL,
  `receiver` varchar(30) DEFAULT NULL,
  `msg` text DEFAULT NULL,
  `senttime` varchar(100) DEFAULT NULL,
  `receivedtime` varchar(100) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `msgtype` varchar(160) DEFAULT NULL,
  `operator` varchar(100) DEFAULT NULL,
  `errormsg` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

/*Data for the table `ozekimessageout` */

insert  into `ozekimessageout`(`id`,`sender`,`receiver`,`msg`,`senttime`,`receivedtime`,`reference`,`status`,`msgtype`,`operator`,`errormsg`) values (1,'0772703069','','',NULL,NULL,NULL,'send',NULL,NULL,NULL),(2,'0772703069','34344','STU6',NULL,NULL,NULL,'send',NULL,NULL,NULL),(3,'0772703069','24244','STU7',NULL,NULL,NULL,'send',NULL,NULL,NULL),(4,'0772703069','3453554','Welcome to EDU Your user id : isSTU8',NULL,NULL,NULL,'send',NULL,NULL,NULL),(5,'0772703069','0715233470','Welcome to EDU Your user id : isSTU9',NULL,NULL,NULL,'send',NULL,NULL,NULL),(6,'0772703069','213213','Welcome to EDU Your user id : isSTU10',NULL,NULL,NULL,'send',NULL,NULL,NULL),(7,'0772703069','0752554411','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(8,'0772703069','0998887788','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(9,'0772703069','0998887788','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(10,'0772703069','0715887742','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(11,'0772703069','343444','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(12,'0772703069','34344','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(13,'0772703069','24244','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(14,'0772703069','3453554','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(15,'0772703069','0715233470','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(16,'0772703069','213213','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(17,'0772703069','0752554411','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(18,'0772703069','0998887788','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(19,'0772703069','0998887788','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(20,'0772703069','0715887742','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(21,'0772703069','343444','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(22,'0772703069','34344','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(23,'0772703069','24244','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(24,'0772703069','3453554','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(25,'0772703069','0715233470','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(26,'0772703069','213213','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(27,'0772703069','0752554411','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(28,'0772703069','0998887788','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(29,'0772703069','0998887788','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(30,'0772703069','0715887742','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(31,'0772703069','343444','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(32,'0772703069','34344','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(33,'0772703069','24244','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(34,'0772703069','3453554','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(35,'0772703069','0715233470','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL),(36,'0772703069','213213','New Event creaated ',NULL,NULL,NULL,'send',NULL,NULL,NULL);

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
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` int(5) DEFAULT NULL,
  `parent_mobile` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `student` */

insert  into `student`(`id`,`fname`,`lname`,`username`,`email`,`gender`,`address`,`nic`,`mobile`,`created_date`,`created_user`,`parent_mobile`) values (1,'Gayan','Promod','STU1','pramod@gmail.com',NULL,NULL,NULL,'0752554411','2017-10-29 08:31:49',3,NULL),(2,'xxx','yyy','STU2','aaa@gmail.com','Male','Raddoluwa','0716766677','0998887788','2017-11-14 21:35:14',3,NULL),(3,'xxx','yyy','STU3','aaa@gmail.com','Male','Raddoluwa','0716766677','0998887788','2017-11-14 21:50:47',3,NULL),(4,'vvvvv','bbbb','STU4','sadasdas','sss','sdsds','222','0715887742','2017-11-14 21:53:32',3,NULL),(5,'xczxczx','zxczxczx','STU5','sadasd@dfd.com','MALE','ddff','34344','343444','2017-11-22 21:33:57',3,'42442'),(6,'dasdsadas','asdasdasd','STU6','wdasdasd@sdasd.com','FEMALE','adsadasd','443434','34344','2017-11-22 21:39:24',3,'44345'),(7,'sdsadasd','dfdf','STU7','s@gmail.com','MALE','dfsaf','3424','24244','2017-11-22 21:40:21',3,'454545'),(8,'sadsadas','asdasd','STU8','a@gmail.com','MALE','sfsf','453454','3453554','2017-11-22 21:41:07',3,'34244'),(9,'Kumani','Gamang','STU9','kuma@gmail.com','FEMALE','Ragama','8635125824V','0715233470','2018-04-17 10:19:24',3,''),(10,'sdsds','sdsd','STU10','super@embc.lk','MALE','sadsad','234321321213','213213','2018-04-17 11:32:22',3,'');

/*Table structure for table `student_attendance` */

DROP TABLE IF EXISTS `student_attendance`;

CREATE TABLE `student_attendance` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `student_id` int(5) DEFAULT NULL,
  `attend_date` varchar(20) DEFAULT NULL,
  `usercreated` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`student_id`,`attend_date`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `student_attendance` */

insert  into `student_attendance`(`id`,`student_id`,`attend_date`,`usercreated`) values (1,1,'2018-04-10','2018-04-17 10:28:33'),(6,10,'2018-04-10','2018-04-17 11:45:34'),(7,1,'2018-05-16','2018-05-02 16:21:39');

/*Table structure for table `student_batch` */

DROP TABLE IF EXISTS `student_batch`;

CREATE TABLE `student_batch` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `student_id` int(5) DEFAULT NULL,
  `batch_id` int(5) DEFAULT NULL,
  `student_batch` int(5) DEFAULT NULL,
  `datecreated` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`student_id`,`batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `student_batch` */

insert  into `student_batch`(`id`,`student_id`,`batch_id`,`student_batch`,`datecreated`) values (1,1,6,16,'2018-04-17 10:52:22'),(3,4,6,46,'2018-04-17 10:52:38'),(7,10,6,106,'2018-04-17 11:35:25');

/*Table structure for table `student_event` */

DROP TABLE IF EXISTS `student_event`;

CREATE TABLE `student_event` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `event_id` int(5) DEFAULT NULL,
  `student_id` int(5) DEFAULT NULL,
  `doc_path` varchar(50) DEFAULT NULL,
  `marks` int(5) DEFAULT NULL,
  `marked_lecture` int(5) DEFAULT NULL,
  `submitdate_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `student_event` */

insert  into `student_event`(`id`,`event_id`,`student_id`,`doc_path`,`marks`,`marked_lecture`,`submitdate_time`) values (2,1,1,'2.doc',25,12,'2017-11-17 20:49:09'),(3,3,10,'Vision (2)1dd.jpg',50,2,'2018-04-18 15:32:50');

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
  `course_id` int(5) DEFAULT NULL,
  `payment_amount` decimal(10,5) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `student_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `student_payment` */

insert  into `student_payment`(`id`,`course_id`,`payment_amount`,`created_date`,`student_id`) values (1,1,'99999.99999','2017-11-22 22:48:25',1);

/*Table structure for table `subject` */

DROP TABLE IF EXISTS `subject`;

CREATE TABLE `subject` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`subject_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `subject` */

insert  into `subject`(`id`,`subject_name`) values (8,'Final Project'),(1,'Java'),(4,'PHP EE'),(3,'Phy'),(2,'XML');

/*Table structure for table `subject_passpaper` */

DROP TABLE IF EXISTS `subject_passpaper`;

CREATE TABLE `subject_passpaper` (
  `course_id` int(5) DEFAULT NULL,
  `year_semester` varchar(20) DEFAULT NULL,
  `subject_id` int(5) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `passpaper_doc` varchar(100) DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `subject_passpaper` */

insert  into `subject_passpaper`(`course_id`,`year_semester`,`subject_id`,`description`,`passpaper_doc`,`created_datetime`) values (5,'Year1-semester1',1,'sample paper','Vision (2)1.jpg','2018-04-18 15:16:06');

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
  `password` text DEFAULT NULL,
  `status` varchar(10) DEFAULT 'ACT',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_code` varchar(10) DEFAULT NULL,
  `firstlog` int(2) DEFAULT 0,
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`status`,`created_date`,`role_code`,`firstlog`,`created_by`) values (1,'STU1','*F33AE6DD04EF4C7C1D3105568E7FB7C1EE16C937','ACT','2017-10-29 08:25:23','STUDENT',0,NULL),(2,'LEC1','*667F407DE7C6AD07358FA38DAED7828A72014B4E','ACT','2017-10-29 08:26:20','LECTURE',0,NULL),(3,'admin','*667F407DE7C6AD07358FA38DAED7828A72014B4E','ACT','2017-10-29 08:28:56','ADMIN',0,NULL),(4,'LEC3','*CE571C076956A52011255997D875CDD0952FF6E7','ACT','2017-11-12 08:19:12','LECTURE',1,'admin'),(5,'LEC4','*31575248DBD7048A05FC603F4468F7AC6D209FF1','ACT','2017-11-12 08:19:13','LECTURE',1,'admin'),(6,'STU2','*DA8326AE85698F38E9D3754C814C2E69B1DAE74D','ACT','2017-11-14 21:35:14','LECTURE',1,'admin'),(7,'STU3','*7DD68802BF6C1F67BA93B01049639BE619A16F37','ACT','2017-11-14 21:50:47','LECTURE',1,'admin'),(8,'STU4','*2F3541E196872CD2114EB9A7EF272110F2D305BE','ACT','2017-11-14 21:53:32','LECTURE',1,'admin'),(9,'STU5','*8ECC3D2F7D195D20ABF649A69710844077D9EEF8','ACT','2017-11-22 21:33:57','LECTURE',1,'admin'),(10,'STU6','*F1CB37F3EDA6C948C075493FD68DEA3860590708','ACT','2017-11-22 21:39:24','LECTURE',1,'admin'),(11,'STU7','*CFB674B38C9EE375276A8512EAB9939B0053781A','ACT','2017-11-22 21:40:21','LECTURE',1,'admin'),(12,'STU8','*11EBF35B30F6A00447A34E057AB8F28478EC846D','ACT','2017-11-22 21:41:07','LECTURE',1,'admin'),(13,'LEC5','*84D59A03751CF660F86A11CB9A7DEC58CDB2DA07','ACT','2018-04-17 09:42:52','LECTURE',1,'admin'),(14,'LEC6','*2F270707DFF353FA82EB20629BB2E639BCBE3C54','ACT','2018-04-17 09:43:25','LECTURE',1,'admin'),(15,'LEC7','*81BBFFFF85FF6404C8D62A6BAAB3577D3DC2E69B','ACT','2018-04-17 09:47:00','LECTURE',1,'admin'),(16,'STU9','*ED2F41940396EF372E07662536B857E53AB4B519','ACT','2018-04-17 10:19:24','LECTURE',1,'admin'),(17,'LEC8','*539C69FE32707293C8BE3343E0AAB0716062F750','ACT','2018-04-17 11:29:53','LECTURE',1,'admin'),(18,'STU10','*0B298C84E512CDAB12250B0A7FA30ED5E8FEF660','ACT','2018-04-17 11:32:22','STUDENT',1,'admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
