/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.26-MariaDB : Database - aischi
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`aischi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `aischi`;

/*Table structure for table `a_about` */

DROP TABLE IF EXISTS `a_about`;

CREATE TABLE `a_about` (
  `a_no` int(11) NOT NULL AUTO_INCREMENT,
  `a_history` varchar(1000) DEFAULT NULL,
  `a_mission` varchar(1000) DEFAULT NULL,
  `a_vision` varchar(1000) DEFAULT NULL,
  `a_image` varchar(255) DEFAULT NULL,
  KEY `a_no` (`a_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `a_about` */

insert  into `a_about`(`a_no`,`a_history`,`a_mission`,`a_vision`,`a_image`) values (1,'history','mission','vision','burger-promo.png');

/*Table structure for table `a_contact` */

DROP TABLE IF EXISTS `a_contact`;

CREATE TABLE `a_contact` (
  `c_no` int(11) NOT NULL AUTO_INCREMENT,
  `c_address` varchar(1000) DEFAULT NULL,
  `c_number` varchar(255) DEFAULT NULL,
  `c_emailadd` varchar(255) DEFAULT NULL,
  `c_workingweekdays` varchar(255) DEFAULT NULL,
  `c_workingweekends` varchar(255) DEFAULT NULL,
  KEY `c_no` (`c_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `a_contact` */

insert  into `a_contact`(`c_no`,`c_address`,`c_number`,`c_emailadd`,`c_workingweekdays`,`c_workingweekends`) values (1,'San Rafael III Noveleta Cavite Philippines','+63956 465 0194','inquiry@aischi.com','Tuesday - Friday : 10:30 AM - 08:00 PM','Saturday : 10:30 AM - 08:00 PM');

/*Table structure for table `admin_menu_main` */

DROP TABLE IF EXISTS `admin_menu_main`;

CREATE TABLE `admin_menu_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) DEFAULT NULL,
  `module_description` text,
  `pri` int(11) DEFAULT NULL,
  `font_icon` varchar(225) DEFAULT NULL,
  `url_link` varchar(225) DEFAULT NULL,
  `act` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `admin_menu_main` */

insert  into `admin_menu_main`(`id`,`title`,`module_description`,`pri`,`font_icon`,`url_link`,`act`) values (1,'Web Design',NULL,1,'fa fa-home',NULL,1),(2,'Menu Management',NULL,1,'fa fa-cutlery',NULL,1),(3,'Online Orders',NULL,1,'fa fa-money',NULL,1),(4,'Settings',NULL,3,'fa fa-cogs',NULL,1),(5,'Message',NULL,2,'fa fa-envelope-o',NULL,1),(6,'Reservation',NULL,1,'fa fa-calendar',NULL,1);

/*Table structure for table `admin_menu_sub` */

DROP TABLE IF EXISTS `admin_menu_sub`;

CREATE TABLE `admin_menu_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) DEFAULT NULL,
  `module_description` text,
  `pri` int(11) DEFAULT NULL,
  `font_icon` varchar(225) DEFAULT NULL,
  `url_link` varchar(225) DEFAULT NULL,
  `act` int(1) DEFAULT NULL,
  `main_menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `admin_menu_sub` */

insert  into `admin_menu_sub`(`id`,`title`,`module_description`,`pri`,`font_icon`,`url_link`,`act`,`main_menu_id`) values (1,'Images',NULL,2,NULL,'admin/j_gallery_item',1,1),(2,'Gallery',NULL,1,NULL,'admin/j_gallery',1,1),(3,'About Us',NULL,1,NULL,'admin/a_about',1,1),(4,'Contact Us',NULL,1,NULL,'admin/a_contact',1,1),(5,'Category',NULL,1,NULL,'admin/j_menu_category',1,2),(6,'Menu',NULL,1,NULL,'admin/j_menu_item',1,2),(7,'Inbox',NULL,1,NULL,'admin/inbox',1,5),(8,'Feedback',NULL,1,NULL,'admin/feedback',1,5),(9,'New Orders',NULL,1,NULL,'admin/new_order',1,3),(10,'Processed Orders',NULL,1,NULL,'admin/processed',1,3),(11,'Delivered Orders',NULL,1,NULL,'admin/delivered',1,3),(16,'Change Password',NULL,2,NULL,'admin/change_password',1,4),(17,'Logout',NULL,3,NULL,'admin/logout',1,4),(18,'Table Reservation',NULL,1,NULL,'admin/table_reserve',1,6);

/*Table structure for table `customer_account` */

DROP TABLE IF EXISTS `customer_account`;

CREATE TABLE `customer_account` (
  `c_no` int(11) NOT NULL AUTO_INCREMENT,
  `c_fname` varchar(255) DEFAULT NULL,
  `c_lname` varchar(255) DEFAULT NULL,
  `c_address` varchar(255) DEFAULT NULL,
  `c_contact` varchar(255) DEFAULT NULL,
  `c_email` varchar(255) DEFAULT NULL,
  `c_password` varchar(255) DEFAULT NULL,
  `c_status` int(11) DEFAULT '0',
  KEY `c_no` (`c_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `customer_account` */

insert  into `customer_account`(`c_no`,`c_fname`,`c_lname`,`c_address`,`c_contact`,`c_email`,`c_password`,`c_status`) values (1,'Juan','Dela Cruz','Cavite City','094745474595','customer@aischi.com','1234',1);

/*Table structure for table `customer_purchase` */

DROP TABLE IF EXISTS `customer_purchase`;

CREATE TABLE `customer_purchase` (
  `rec_no` int(11) NOT NULL AUTO_INCREMENT,
  `reference_num` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `complete_address` varchar(500) DEFAULT NULL,
  `nearest_landmark` varchar(255) DEFAULT NULL,
  `email_add` varchar(255) DEFAULT NULL,
  `contact_num` varchar(255) DEFAULT NULL,
  `bills_payment` int(11) DEFAULT NULL,
  `order_notes` varchar(1000) DEFAULT NULL,
  `order_status` int(11) DEFAULT '0',
  `order_datetime` datetime DEFAULT NULL,
  KEY `rec_no` (`rec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `customer_purchase` */

insert  into `customer_purchase`(`rec_no`,`reference_num`,`first_name`,`last_name`,`complete_address`,`nearest_landmark`,`email_add`,`contact_num`,`bills_payment`,`order_notes`,`order_status`,`order_datetime`) values (3,'63685dddbe067','Juan','Dela Cruz','Cavite City','','customer@aischi.com','094745474595',NULL,'',1,'2022-11-07 04:01:58');

/*Table structure for table `h_menu` */

DROP TABLE IF EXISTS `h_menu`;

CREATE TABLE `h_menu` (
  `m_No` int(11) NOT NULL AUTO_INCREMENT,
  `m_Name` varchar(255) DEFAULT NULL,
  `m_Link` varchar(255) DEFAULT NULL,
  `m_Sub` int(11) DEFAULT NULL,
  `m_Status` int(11) DEFAULT NULL,
  KEY `m_No` (`m_No`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `h_menu` */

insert  into `h_menu`(`m_No`,`m_Name`,`m_Link`,`m_Sub`,`m_Status`) values (1,'Home','Home',0,1),(2,'Services','Home',1,1),(3,'Menu','Home',1,1),(4,'Gallery','Home/gallery',0,1),(5,'About Us','Home/about',0,1),(6,'Contact Us','Home/contact',0,1),(7,'Login or Sign Up','Home/account',0,1);

/*Table structure for table `h_menu_sub` */

DROP TABLE IF EXISTS `h_menu_sub`;

CREATE TABLE `h_menu_sub` (
  `sm_No` int(11) NOT NULL AUTO_INCREMENT,
  `sm_Main` int(11) DEFAULT NULL,
  `sm_Name` varchar(255) DEFAULT NULL,
  `sm_Link` varchar(255) DEFAULT NULL,
  `sm_Status` int(11) DEFAULT NULL,
  KEY `sm_No` (`sm_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `h_menu_sub` */

/*Table structure for table `h_services` */

DROP TABLE IF EXISTS `h_services`;

CREATE TABLE `h_services` (
  `rec_no` int(11) NOT NULL AUTO_INCREMENT,
  `s_title` varchar(255) DEFAULT NULL,
  `s_desc` varchar(2000) DEFAULT NULL,
  `s_image` varchar(255) DEFAULT NULL,
  KEY `rec_no` (`rec_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `h_services` */

/*Table structure for table `j_gallery` */

DROP TABLE IF EXISTS `j_gallery`;

CREATE TABLE `j_gallery` (
  `g_no` int(11) NOT NULL AUTO_INCREMENT,
  `g_title` varchar(255) DEFAULT NULL,
  `g_image` varchar(255) DEFAULT NULL,
  KEY `g_no` (`g_no`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `j_gallery` */

insert  into `j_gallery`(`g_no`,`g_title`,`g_image`) values (1,'Chicken',NULL),(2,'Events',NULL);

/*Table structure for table `j_gallery_item` */

DROP TABLE IF EXISTS `j_gallery_item`;

CREATE TABLE `j_gallery_item` (
  `gi_no` int(11) NOT NULL AUTO_INCREMENT,
  `gi_category` varchar(255) DEFAULT NULL,
  `gi_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`gi_no`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `j_gallery_item` */

insert  into `j_gallery_item`(`gi_no`,`gi_category`,`gi_image`) values (1,'Chicken','c3.png'),(2,'Events','donar.png');

/*Table structure for table `j_menu_category` */

DROP TABLE IF EXISTS `j_menu_category`;

CREATE TABLE `j_menu_category` (
  `m_no` int(11) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(255) DEFAULT NULL,
  `m_featured` int(11) DEFAULT '0',
  KEY `m_no` (`m_no`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `j_menu_category` */

insert  into `j_menu_category`(`m_no`,`m_name`,`m_featured`) values (1,'Inihaw',1),(2,'Silog',1),(3,'Piniritos',1),(4,'Combo Meals',1),(5,'Pancit',1),(6,'Rice',1),(7,'Drinks',0),(8,'Bilao',1);

/*Table structure for table `j_menu_item` */

DROP TABLE IF EXISTS `j_menu_item`;

CREATE TABLE `j_menu_item` (
  `i_no` int(11) NOT NULL AUTO_INCREMENT,
  `i_category` varchar(255) DEFAULT NULL,
  `i_name` varchar(255) DEFAULT NULL,
  `i_description` varchar(2000) DEFAULT NULL,
  `i_price` int(11) DEFAULT NULL,
  `i_best` int(11) DEFAULT '0',
  `i_image` varchar(255) DEFAULT NULL,
  KEY `i_no` (`i_no`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `j_menu_item` */

insert  into `j_menu_item`(`i_no`,`i_category`,`i_name`,`i_description`,`i_price`,`i_best`,`i_image`) values (1,'Inihaw','Liempo','Delicious liempo',150,1,'c1.png'),(2,'Inihaw','Isaw_manok','Masarap Kahit Walang Sabaw',125,1,'Isaw_manok.png');

/*Table structure for table `message_feedback` */

DROP TABLE IF EXISTS `message_feedback`;

CREATE TABLE `message_feedback` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_datetime` datetime DEFAULT NULL,
  `msg_Name` varchar(255) DEFAULT NULL,
  `msg_Email` varchar(255) DEFAULT NULL,
  `msg_Message` varchar(1000) DEFAULT NULL,
  `msg_Attachment` varchar(255) DEFAULT NULL,
  KEY `msg_id` (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `message_feedback` */

/*Table structure for table `message_inbox` */

DROP TABLE IF EXISTS `message_inbox`;

CREATE TABLE `message_inbox` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_datetime` datetime DEFAULT NULL,
  `msg_Name` varchar(255) DEFAULT NULL,
  `msg_Email` varchar(255) DEFAULT NULL,
  `msg_Message` varchar(1000) DEFAULT NULL,
  `msg_Attachment` varchar(255) DEFAULT NULL,
  KEY `msg_id` (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `message_inbox` */

insert  into `message_inbox`(`msg_id`,`msg_datetime`,`msg_Name`,`msg_Email`,`msg_Message`,`msg_Attachment`) values (1,'2022-11-08 07:03:20','weqwe','qwe@asd.com','123123',NULL);

/*Table structure for table `online_orders` */

DROP TABLE IF EXISTS `online_orders`;

CREATE TABLE `online_orders` (
  `web_session` varchar(255) DEFAULT NULL,
  `mnu_no` int(11) DEFAULT NULL,
  `mnu_price` int(11) DEFAULT NULL,
  `mnu_qty` int(11) DEFAULT NULL,
  `mnu_status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `online_orders` */

insert  into `online_orders`(`web_session`,`mnu_no`,`mnu_price`,`mnu_qty`,`mnu_status`) values ('63685dddbe067',1,150,2,1);

/*Table structure for table `reservation_catering` */

DROP TABLE IF EXISTS `reservation_catering`;

CREATE TABLE `reservation_catering` (
  `r_no` int(11) NOT NULL AUTO_INCREMENT,
  `r_transdate` date DEFAULT NULL,
  `r_date` date DEFAULT NULL,
  `r_time` time DEFAULT NULL,
  `r_event` varchar(255) DEFAULT NULL,
  `r_package` varchar(255) DEFAULT NULL,
  `r_guest` int(11) DEFAULT NULL,
  `r_fname` varchar(255) DEFAULT NULL,
  `r_email` varchar(255) DEFAULT NULL,
  `r_contact` varchar(255) DEFAULT NULL,
  KEY `r_no` (`r_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `reservation_catering` */

/*Table structure for table `reservation_table` */

DROP TABLE IF EXISTS `reservation_table`;

CREATE TABLE `reservation_table` (
  `rt_no` int(11) NOT NULL AUTO_INCREMENT,
  `rt_transdate` date DEFAULT NULL,
  `rt_date` date DEFAULT NULL,
  `rt_time` varchar(255) DEFAULT NULL,
  `rt_count` int(11) DEFAULT NULL,
  `rt_name` varchar(255) DEFAULT NULL,
  `rt_contact` varchar(255) DEFAULT NULL,
  `rt_email` varchar(255) DEFAULT NULL,
  `rt_status` int(11) DEFAULT '0',
  KEY `rt_no` (`rt_no`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `reservation_table` */

insert  into `reservation_table`(`rt_no`,`rt_transdate`,`rt_date`,`rt_time`,`rt_count`,`rt_name`,`rt_contact`,`rt_email`,`rt_status`) values (1,'2022-11-08','2022-11-10','3:30pm',3,'afasf','2315136123','as@as.com',2),(2,'2022-11-08','2022-11-16','2:30pm',3,'asdasd','15161234123','ad@asd.com',2);

/*Table structure for table `user_info` */

DROP TABLE IF EXISTS `user_info`;

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_role` varchar(255) DEFAULT NULL,
  `user_fn` varchar(255) DEFAULT NULL,
  `user_ln` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `user_sq` varchar(255) DEFAULT NULL,
  `user_sa` varchar(255) DEFAULT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user_info` */

insert  into `user_info`(`user_id`,`user_name`,`user_pass`,`user_role`,`user_fn`,`user_ln`,`user_image`,`user_sq`,`user_sa`) values (1,'admin','827ccb0eea8a706c4c34a16891f84e7b','Administrator','Michie','De Guzman','user.png','What is your year of birth?','1996');

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sub_menu_id` int(11) NOT NULL,
  `main_menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `user_roles` */

insert  into `user_roles`(`id`,`user_id`,`sub_menu_id`,`main_menu_id`) values (1,1,1,1),(2,1,2,1),(3,1,3,1),(4,1,4,1),(5,1,5,2),(6,1,6,2),(7,1,7,5),(8,1,8,2),(9,1,9,2),(10,1,10,2),(11,1,11,3),(12,1,12,3),(13,1,13,3),(14,1,14,3),(15,1,15,3),(16,1,16,4),(17,1,17,4),(18,1,18,6);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
