/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.4.32-MariaDB : Database - bmis
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `approval` */

DROP TABLE IF EXISTS `approval`;

CREATE TABLE `approval` (
  `id_approval` int(11) NOT NULL AUTO_INCREMENT,
  `id_resident` int(11) NOT NULL,
  `apstatus` varchar(50) NOT NULL,
  PRIMARY KEY (`id_approval`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `approval` */

/*Table structure for table `brgy_info` */

DROP TABLE IF EXISTS `brgy_info`;

CREATE TABLE `brgy_info` (
  `id_brgy_info` int(11) NOT NULL AUTO_INCREMENT,
  `brgy` varchar(50) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `openhours` text NOT NULL,
  `background` text NOT NULL,
  `vision` text NOT NULL,
  `mission` text NOT NULL,
  PRIMARY KEY (`id_brgy_info`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `brgy_info` */

insert  into `brgy_info`(`id_brgy_info`,`brgy`,`municipal`,`province`,`email`,`contact`,`openhours`,`background`,`vision`,`mission`) values (1,'Calaocan','Santiago City','Isabela','brgycalaocan@gmail.com','046-509-1664','Open Hours of Barangay: Monday to Friday (8:00 to 5:00)','Biclatan is a barangay in the city of General Trias, in the province of Cavite. Its population as determined by the 2020 census was 23,102. This represented 5.13% of the total population of General Trias.','To foster a united, sustainable, and inclusive community. Barangay Biclatan is committed to providing essential services, ensuring transparent governance, and preserving our cultural heritage and environment. We strive to empower residents through education, promote economic development, and enhance the overall well-being of our community while celebrating our unique identity and contributing to greater prosperity of Oriental Mindoro.','We aspire to be a model barangay that prioritizes the well-being of our people, foster unity, and embracing the progress while preserving our cultural heritage and natural resources. Through collective effort and participatory governance, we aim to create a safe, resilient and empowered community that values equity, environmental stewardship, and continuous learning. s');

/*Table structure for table `position` */

DROP TABLE IF EXISTS `position`;

CREATE TABLE `position` (
  `id_position` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(255) NOT NULL,
  `pos_order` int(11) NOT NULL,
  PRIMARY KEY (`id_position`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `position` */

insert  into `position`(`id_position`,`position`,`pos_order`) values (1,'Barangay Chairman',1),(2,'Sk Chairperson',2),(3,'Barangay Secretary',3),(4,'Barangay Treasurer',4),(5,'Councilor 1',5),(6,'Councilor 2',6),(7,'Councilor 3',7),(8,'Councilor 4',8),(9,'Councilor 5',9),(10,'Councilor 6',10);

/*Table structure for table `system_info` */

DROP TABLE IF EXISTS `system_info`;

CREATE TABLE `system_info` (
  `id_system` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `acronym` varchar(50) NOT NULL,
  `poweredBy` text NOT NULL,
  PRIMARY KEY (`id_system`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `system_info` */

insert  into `system_info`(`id_system`,`name`,`acronym`,`poweredBy`) values (1,'Barangay Calaocan Information System','BBIS','Ive Generalao');

/*Table structure for table `tbl_activities` */

DROP TABLE IF EXISTS `tbl_activities`;

CREATE TABLE `tbl_activities` (
  `id_activity` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id_activity`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_activities` */

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `user_status` text NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_admin` */

insert  into `tbl_admin`(`id_admin`,`email`,`password`,`lname`,`fname`,`mi`,`role`,`user_status`) values (1,'juancalaocan@gmail.com','21232f297a57a5a743894a0e4a801fc3','Tosper','Rafael Jr.','M','administrator',''),(2,'admin2@gmail.com','6964f527f011df8756f87c3e8a76884f','Simon','Marian','','administrator',''),(3,'admin3@gmail.com','6964f527f011df8756f87c3e8a76884f','Obena','Katrina','T','administrator',''),(4,'admin4@gmail.com','6964f527f011df8756f87c3e8a76884f','Villano','Kristine Joy','G','administrator','');

/*Table structure for table `tbl_announcement` */

DROP TABLE IF EXISTS `tbl_announcement`;

CREATE TABLE `tbl_announcement` (
  `id_announcement` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(1000) NOT NULL,
  `target` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `addedby` varchar(255) NOT NULL,
  PRIMARY KEY (`id_announcement`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_announcement` */

/*Table structure for table `tbl_blotter` */

DROP TABLE IF EXISTS `tbl_blotter`;

CREATE TABLE `tbl_blotter` (
  `id_blotter` int(11) NOT NULL AUTO_INCREMENT,
  `id_resident` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `blot_photo` mediumblob NOT NULL,
  `contact` varchar(20) NOT NULL,
  `narrative` mediumtext NOT NULL,
  `timeapplied` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_blotter`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_blotter` */

/*Table structure for table `tbl_brgyid` */

DROP TABLE IF EXISTS `tbl_brgyid`;

CREATE TABLE `tbl_brgyid` (
  `id_brgyid` int(11) DEFAULT NULL,
  `id_resident` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `bplace` varchar(255) NOT NULL,
  `bdate` varchar(255) NOT NULL,
  `res_photo` varchar(255) DEFAULT NULL,
  `inc_lname` varchar(255) NOT NULL,
  `inc_fname` varchar(255) NOT NULL,
  `inc_mi` varchar(255) NOT NULL,
  `inc_contact` varchar(255) NOT NULL,
  `inc_houseno` varchar(255) NOT NULL,
  `inc_street` varchar(255) NOT NULL,
  `inc_brgy` varchar(255) NOT NULL,
  `inc_municipal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_brgyid` */

insert  into `tbl_brgyid`(`id_brgyid`,`id_resident`,`lname`,`fname`,`mi`,`houseno`,`street`,`brgy`,`municipal`,`bplace`,`bdate`,`res_photo`,`inc_lname`,`inc_fname`,`inc_mi`,`inc_contact`,`inc_houseno`,`inc_street`,`inc_brgy`,`inc_municipal`) values (NULL,23,'Vilfamat','Vincent','Briongos','Blk. 2 Lot 5','Kamatisan','Dalig','Antipolo City','2011-06-15','1999-07-30',NULL,'Vilfamat','Teresita','Briongos','09515496436','Antipolo City','2011-06-15','1999-07-30',NULL),(NULL,23,'Vilfamat','Vincent','Briongos','Blk. 2 Lot 5','Kamatisan','Dalig','Antipolo City','2011-06-15','1999-11-29',NULL,'Vilfamat','Teresita','Briongos','09654165465','Antipolo City','2011-06-15','1999-11-29','Array'),(NULL,23,'Vilfamat','Vincent','Briongos','Blk. 2 Lot 5','Kamatisan','Dalig','Antipolo City','Antipolo, Rizal','1999-11-30',NULL,'Vilfamat','Teresita','Briongos','09564815496','Antipolo City','Antipolo, Rizal','1999-11-30','Array');

/*Table structure for table `tbl_bspermit` */

DROP TABLE IF EXISTS `tbl_bspermit`;

CREATE TABLE `tbl_bspermit` (
  `id_bspermit` int(11) NOT NULL AUTO_INCREMENT,
  `cert_no` varchar(255) NOT NULL,
  `id_resident` int(11) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mi` varchar(255) DEFAULT NULL,
  `age` tinyint(4) NOT NULL,
  `bsname` varchar(255) DEFAULT NULL,
  `houseno` varchar(255) DEFAULT NULL,
  `street` varchar(252) DEFAULT NULL,
  `brgy` varchar(255) DEFAULT NULL,
  `municipal` varchar(255) DEFAULT NULL,
  `bsindustry` varchar(255) DEFAULT NULL,
  `aoe` int(11) NOT NULL,
  PRIMARY KEY (`id_bspermit`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_bspermit` */

/*Table structure for table `tbl_clearance` */

DROP TABLE IF EXISTS `tbl_clearance`;

CREATE TABLE `tbl_clearance` (
  `id_clearance` int(11) NOT NULL AUTO_INCREMENT,
  `cert_no` varchar(255) NOT NULL,
  `id_resident` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  PRIMARY KEY (`id_clearance`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_clearance` */

/*Table structure for table `tbl_indigency` */

DROP TABLE IF EXISTS `tbl_indigency`;

CREATE TABLE `tbl_indigency` (
  `id_indigency` int(11) NOT NULL AUTO_INCREMENT,
  `cert_no` varchar(255) NOT NULL,
  `id_resident` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_indigency`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_indigency` */

/*Table structure for table `tbl_officials` */

DROP TABLE IF EXISTS `tbl_officials`;

CREATE TABLE `tbl_officials` (
  `id_official` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `termstart` date NOT NULL,
  `termend` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `avatar` varchar(150) NOT NULL,
  PRIMARY KEY (`id_official`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_officials` */

insert  into `tbl_officials`(`id_official`,`name`,`position`,`termstart`,`termend`,`status`,`avatar`) values (1,'              Hon. Dionido U. Quitain','Presiding Officer','2018-06-08','2026-06-28','Active',''),(2,'  Hon. Criswin P. Roxas','Sk Chairperson','2021-05-01','2025-05-15','Not Active',''),(3,'Josue G. Ortega','Barangay Secretary','2017-06-06','2027-09-30','Active','');

/*Table structure for table `tbl_rescert` */

DROP TABLE IF EXISTS `tbl_rescert`;

CREATE TABLE `tbl_rescert` (
  `id_rescert` int(11) NOT NULL AUTO_INCREMENT,
  `cert_no` varchar(255) NOT NULL,
  `id_resident` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `purpose` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rescert`)
) ENGINE=InnoDB AUTO_INCREMENT=111137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_rescert` */

insert  into `tbl_rescert`(`id_rescert`,`cert_no`,`id_resident`,`lname`,`fname`,`mi`,`age`,`nationality`,`houseno`,`street`,`brgy`,`municipal`,`date`,`purpose`) values (111132,'49165014101',45,'Coloma','Charmaine','Baldo','26','Filipino','123','Purok 2','Biclatan','Nueva Ecija','2024-11-06','Job/Employment'),(111135,'39550084257',78,'Medina','Jan Clifford','Calad','32','Filipino','24','Purok 2 Laurel','Calaocan','Santiago City','2024-11-07','Job/Employment'),(111136,'95182355823',79,'DelaCruz','Manilyn','Bernardo','37','Filipino','24','Purok 2 Laurel','Calaocan','Santiago City','2024-11-12','Job/Employment');

/*Table structure for table `tbl_resident` */

DROP TABLE IF EXISTS `tbl_resident`;

CREATE TABLE `tbl_resident` (
  `id_resident` int(11) NOT NULL AUTO_INCREMENT,
  `request_status` varchar(50) NOT NULL DEFAULT 'Pending',
  `res_photo` mediumblob DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `houseno` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `brgy` varchar(255) DEFAULT NULL,
  `municipal` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `bdate` date NOT NULL,
  `bplace` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `family_role` varchar(255) DEFAULT NULL,
  `voter` varchar(255) DEFAULT NULL,
  `pwd` varchar(10) NOT NULL,
  `indigent` varchar(255) NOT NULL,
  `single_parent` varchar(255) NOT NULL,
  `malnourished` varchar(255) NOT NULL,
  `four_ps` varchar(255) NOT NULL,
  `vaccinated` varchar(255) DEFAULT NULL,
  `pregnancy` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `ip_community` varchar(255) DEFAULT NULL,
  `out_of_school_youth` enum('Yes','No') DEFAULT NULL,
  `lgbtq` enum('Yes','No') DEFAULT NULL,
  `addedby` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_resident`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_resident` */

insert  into `tbl_resident`(`id_resident`,`request_status`,`res_photo`,`email`,`password`,`lname`,`fname`,`mi`,`age`,`sex`,`status`,`houseno`,`street`,`brgy`,`municipal`,`address`,`contact`,`bdate`,`bplace`,`nationality`,`family_role`,`voter`,`pwd`,`indigent`,`single_parent`,`malnourished`,`four_ps`,`vaccinated`,`pregnancy`,`role`,`ip_community`,`out_of_school_youth`,`lgbtq`,`addedby`) values (45,'approved',NULL,'coloma@gmail.com','','Coloma','Charmaine','Baldo',26,'Female','Single','123','Purok 2','Biclatan','Nueva Ecija',NULL,'09952650331','1999-11-20','Veronica','Filipino','','Yes','Yes','Yes','Yes','','Yes','Yes','Yes','resident',NULL,NULL,NULL,NULL),(56,'approved',NULL,'balmores@gmail.com','6964f527f011df8756f87c3e8a76884f','Balmores','Santy','Palma',20,'Male','pending','1234','Santiago','Biclatan','General Trias',NULL,'09672518471','2003-08-29','Veronica','Filipino','Yes','Yes','Yes','Yes','Yes','Yes','Yes','Yes','No','resident',NULL,NULL,NULL,''),(59,'approved',NULL,'almira@gmail.com','6964f527f011df8756f87c3e8a76884f','Coloma','Almira Jane','Baldo',21,'Female','Single','2342','Macamias','Biclatan','General Trias',NULL,'09789876564','2003-03-06','Maturanoc','Filipino','No','Yes','Yes','No','No','No','No','Yes','No','resident',NULL,NULL,NULL,NULL),(60,'pending',NULL,'johannah@gmail.com','6964f527f011df8756f87c3e8a76884f','Reyes','Johannah','Dizon',23,'Female','Single','6547','Macamias','Biclatan','General Trias',NULL,'09786543578','2000-11-20','Veronica','Filipino','Yes','Yes','Yes','No','Yes','Yes','Yes','Yes','No','resident',NULL,NULL,NULL,NULL),(69,'approved',NULL,'norlyn@gmail.com','6964f527f011df8756f87c3e8a76884f','Reyes','Norlyn','',31,'Female','Married','12','Macamias','Biclatan','General Trias',NULL,'09553194514','1992-11-15','Maturanoc','Filipino','Yes','Yes','No','No','Yes','No','No','','','resident',NULL,NULL,NULL,NULL),(71,'approved',NULL,'buyer@gmail.com','cce5101d28fc68509470d27b56b19dcb','Reyess','James','Casna',15,'Male','Single','211','davao','Biclatan','General Trias',NULL,'09213891221','2008-10-30','davao','Filipino','','Yes','No','No','No','No','No','','','resident',NULL,NULL,NULL,NULL),(72,'approved',NULL,'ronald@gmail.com','cce5101d28fc68509470d27b56b19dcb','Reyess','Ronald','cassaa',22,'Male','Single','111','davao','Biclatan','General Trias',NULL,'09213891221','2001-11-30','davao','Filipino','','Yes','No','No','No','No','No','','','resident',NULL,NULL,NULL,NULL),(73,'approved',NULL,'lance@gmail.com','cce5101d28fc68509470d27b56b19dcb','Reyess','lance','asda',31,'Male','Single','321','davao','Biclatan','General Trias',NULL,'09213891221','1993-01-31','davao','Filipino','','Yes','No','No','No','No','No','','','resident',NULL,NULL,NULL,NULL),(74,'approved',NULL,'harryden@gmail.com','cce5101d28fc68509470d27b56b19dcb','DelaCruz','James','Natoy',24,'Male','Single','1123','davao','Biclatan','General Trias',NULL,'09213891221','2000-02-28','davao','Filipino','Yes','Yes','No','No','No','No','No','','','resident',NULL,NULL,NULL,NULL),(75,'pending',NULL,'admin@admin.com','cce5101d28fc68509470d27b56b19dcb','Reyess','garet','cassaa',9,'Male','Single','1112','davao','Biclatan','General Trias',NULL,'09213891221','2014-10-28','davao','Filipino','No','No','No','No','No','No','No','','','resident',NULL,NULL,NULL,NULL),(76,'pending',NULL,'buyer12@gmail.com','cce5101d28fc68509470d27b56b19dcb','Reyess','james bond','cassaa',16,'Male','Married','221','davao','Biclatan','General Trias',NULL,'09289713213','2007-10-29','davao','Filipino','','No','No','No','No','No','No','','','resident',NULL,NULL,NULL,NULL),(77,'pending',NULL,'buyer@gmail.com','cce5101d28fc68509470d27b56b19dcb','reyes','althea','canoy',12,'Male','Single','1123','davao','Biclatan','General Trias',NULL,'09913737050','2011-10-11','davao','Filipino','','Yes','No','Yes','No','No','No','','','resident',NULL,NULL,NULL,NULL),(78,'approved',NULL,'mdnclifford@gmail.com','714ef4ed3a07cf327f38642f82d975a4','Medina','Jan Clifford','Calad',32,'Male','Single','24','Purok 2 Laurel','Calaocan','Santiago City',NULL,'09196658131','1992-02-14','Santiago City','Filipino','','No','Yes','Yes','Yes','Yes','No','','No','resident',NULL,NULL,NULL,NULL),(79,'approved',NULL,'manilyn@gmail.com','95eec177371233139084c2c237aee55e','DelaCruz','Manilyn','Bernardo',37,'Female','Married','24','Purok 2 Laurel','Calaocan','Santiago City',NULL,'09196658131','1987-08-23','Santiago City','Filipino','','No','No','No','No','No','No','','Yes','resident',NULL,NULL,NULL,NULL),(80,'pending',NULL,'cevyqeliv@mailinator.com','b173700de6cd24b4504b3454deeebcd5','aaa','aaa','aaa',32,'Male','Single','z0','Possimus in pariatu','Calaocan','Santiago City',NULL,'93233323333','1992-10-22','Exercitationem volup','Filipino',NULL,'Yes','No','Yes','No','No','No',NULL,'Yes','resident','IBANAG',NULL,NULL,NULL),(81,'pending',NULL,'zuzam@mailinator.com','b173700de6cd24b4504b3454deeebcd5','aa','aa','aa',17,'Female','Married','z0','Qui mollit numquam d','Calaocan','Santiago City',NULL,'93233323333','2007-03-03','Saepe rerum dolorum ','French',NULL,'No','No','No','No','No','No',NULL,'No','resident','YOGAD','No',NULL,NULL),(82,'pending',NULL,'cacohecu@mailinator.com','b173700de6cd24b4504b3454deeebcd5','aaaa','aaaa','aaaa',21,'Male','Widowed','z0','Omnis aliquid quisqu','Calaocan','Santiago City',NULL,'93233323333','2003-05-07','Libero et aut fuga ','British',NULL,'No','Yes','No','Yes','No','Yes',NULL,'No','resident','ITAWIS','No','No',NULL),(83,'pending',NULL,'darn@gmail.com','03a006d5f872e1cab834afbe2783a6ed','Acuna','Darren','',23,'Male','Single','23','skldjflj','Calaocan','Santiago City',NULL,'09611917651','2001-09-19','sdfaf','Filipino',NULL,'Yes','Yes','Yes','Yes','No','Yes',NULL,'No','resident','YOGAD','Yes','No',NULL),(84,'pending',NULL,'dar@gmail.com','03a006d5f872e1cab834afbe2783a6ed','Auasdfasf','asfasdf','asdfasfa',23,'Male','Single','12','asfasdf','Calaocan','Santiago City',NULL,'09711918761','2001-12-09','asdfasfas','Filipino',NULL,'Yes','Yes','No','No','No','No',NULL,'No','resident','N/A','No','No',NULL),(85,'pending',NULL,'darren@gmail.com','c626181119eed6ca7e1b7d499a0353e9','adfas','fadfs','adfsasdf',23,'Male','Single','12','asdfasf','Calaocan','Santiago City',NULL,'09611917651','2001-11-06','asfasdf','Filipino',NULL,'Yes','Yes','Yes','Yes','Yes','Yes',NULL,'Yes','resident','N/A','Yes','Yes',NULL),(86,'pending',NULL,'darren@gmail.com','2d594a6caec93845aeff0cc0a6133475','adfas','fadfs','adfsasdf',0,'Male','Single','12','asdfasf','Calaocan','Santiago City',NULL,'09611917651','2001-11-06','asfasdf','Filipino',NULL,'Yes','Yes','Yes','Yes','Yes','Yes',NULL,'Yes','resident','N/A','Yes','Yes',NULL),(87,'pending',NULL,'dar@gmail.com','de0c9eca97d7685621fd59d856458415','asfkahf','kjhkjasdhf','kjhaskjfhkj',23,'Male','Married','21','xs','Calaocan','Santiago City',NULL,'09611976151','2001-12-09','sdf','Filipino',NULL,'Yes','Yes','Yes','Yes','Yes','Yes',NULL,'Yes','resident','YOGAD','Yes','Yes',NULL);

/*Table structure for table `tbl_services` */

DROP TABLE IF EXISTS `tbl_services`;

CREATE TABLE `tbl_services` (
  `id_services` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `fees` decimal(10,2) NOT NULL,
  `requires` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `image_service` text NOT NULL,
  PRIMARY KEY (`id_services`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_services` */

insert  into `tbl_services`(`id_services`,`title`,`description`,`fees`,`requires`,`status`,`image_service`) values (1,'BARANGAY CLEARANCE','','35.00','CEDULA','Active','uploads/clearance.png'),(4,'CERTIFICATE OF RESIDENCY','','35.00','CEDULA & BRGY CLEARANCE','Active','uploads/residency.png'),(5,'CERTIFICATE OF INDIGENCY','','35.00','CEDULA','Active','uploads/indigency.png'),(6,'BUSINESS CLEARANCE','','35.00','CEDULA','Active','uploads/busper.png');

/*Table structure for table `tbl_travelpermit` */

DROP TABLE IF EXISTS `tbl_travelpermit`;

CREATE TABLE `tbl_travelpermit` (
  `id_travel` int(11) NOT NULL AUTO_INCREMENT,
  `id_resident` int(11) NOT NULL,
  `prev_owner` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `brgy` varchar(50) NOT NULL,
  `municipal` varchar(50) NOT NULL,
  `buyers_name` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  PRIMARY KEY (`id_travel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_travelpermit` */

insert  into `tbl_travelpermit`(`id_travel`,`id_resident`,`prev_owner`,`breed`,`gender`,`color`,`destination`,`date`,`brgy`,`municipal`,`buyers_name`,`purpose`) values (2,44,'Reyes Hannah Joy','Sheep','Female','Spotted','Farm','2024-03-25','Yuson','Guimba','Charmaine Joyce Coloma','Breeding');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `addedby` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`email`,`password`,`lname`,`fname`,`mi`,`age`,`sex`,`address`,`contact`,`position`,`role`,`addedby`) values (11,'obena@gmail.com','melinda12345','Obena','Katrina','T',24,'Female','San Miguel, Guimba','09564123321','Barangay Secretary','user','Rafael Tosper'),(12,'mangalino@gmail.com','earl12345','Mangalino','Jayvee','Tayong',28,'Male','Pasong Inchik, Guimba','09785631125','Barangay Treasurer','user','Rafael Tosper'),(13,'marian@gmail.com','adminMarian@','Simon','Marian','Cabiso',24,'Female','1234, Purok 5, Cavite, Guimba','09876543211','Kagawad','user','Tosper, Rafael Jr.');

/*Table structure for table `masked_users` */

DROP TABLE IF EXISTS `masked_users`;

/*!50001 DROP VIEW IF EXISTS `masked_users` */;
/*!50001 DROP TABLE IF EXISTS `masked_users` */;

/*!50001 CREATE TABLE  `masked_users`(
 `id_user` int(1) ,
 `masked_email` int(1) ,
 `masked_password` int(1) ,
 `masked_lname` int(1) ,
 `masked_fname` int(1) ,
 `masked_address` int(1) ,
 `masked_position` int(1) 
)*/;

/*View structure for view masked_users */

/*!50001 DROP TABLE IF EXISTS `masked_users` */;
/*!50001 DROP VIEW IF EXISTS `masked_users` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`u680385054_bmis`@`127.0.0.1` SQL SECURITY DEFINER VIEW `masked_users` AS select 1 AS `id_user`,1 AS `masked_email`,1 AS `masked_password`,1 AS `masked_lname`,1 AS `masked_fname`,1 AS `masked_address`,1 AS `masked_position` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
