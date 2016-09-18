# Host: localhost  (Version: 5.5.40)
# Date: 2016-06-30 13:48:01
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "sc_user"
#

DROP TABLE IF EXISTS `sc_user`;
CREATE TABLE `sc_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_number` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(255) NOT NULL DEFAULT '',
  `user_identityid` tinyint(3) NOT NULL DEFAULT '0',
  `user_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_number` (`user_number`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=gbk;

#
# Data for table "sc_user"
#

INSERT INTO `sc_user` VALUES (1,141304121,'陈扣扣',2,'827ccb0eea8a706c4c34a16891f84e7b'),(2,141304122,'胡爱梅',2,'e10adc3949ba59abbe56e057f20f883e'),(3,141304123,'pyl',1,'e10adc3949ba59abbe56e057f20f883e'),(4,141304120,'韦神',1,'e10adc3949ba59abbe56e057f20f883e'),(26,141304126,'李小龙',1,'e10adc3949ba59abbe56e057f20f883e'),(27,141304125,'imp',1,'e10adc3949ba59abbe56e057f20f883e'),(28,141304128,'徐永安',4,'e10adc3949ba59abbe56e057f20f883e'),(29,141304129,'葛桂萍',4,'e10adc3949ba59abbe56e057f20f883e'),(30,10000,'admin',3,'e10adc3949ba59abbe56e057f20f883e');

#
# Structure for table "sc_course"
#

DROP TABLE IF EXISTS `sc_course`;
CREATE TABLE `sc_course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_title` varchar(255) NOT NULL DEFAULT '',
  `course_content` text,
  `course_teacherid` int(11) DEFAULT NULL,
  `course_create_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`course_id`),
  KEY `course_teacherid` (`course_teacherid`),
  CONSTRAINT `sc_course_ibfk_1` FOREIGN KEY (`course_teacherid`) REFERENCES `sc_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=gbk;

#
# Data for table "sc_course"
#

INSERT INTO `sc_course` VALUES (2,'大学英语修改','这是大学英语的内容修改还',2,'2016-06-05 16:01:00'),(3,'编译原理','这是编译原理的内容',1,'20140303'),(4,'计算方法','这是计算方法的内容修改',1,'2016-06-03 20:43:05'),(5,'英语口语','这是英语口语的内容',2,'20160102'),(7,'计算机网络','这是计算机网络可的课程设计的要求',1,'2016-06-03 21:10:15'),(8,'PHP开发技术','论如何开发PHP',1,'2016-06-04 00:32:10');

#
# Structure for table "sc_course_user"
#

DROP TABLE IF EXISTS `sc_course_user`;
CREATE TABLE `sc_course_user` (
  `sc_userid` int(11) NOT NULL DEFAULT '0',
  `sc_courseid` int(11) NOT NULL DEFAULT '0',
  `sc_isconfirm` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sc_userid`,`sc_courseid`),
  KEY `sc_course_user_ibfk_2` (`sc_courseid`),
  CONSTRAINT `fk_courseid` FOREIGN KEY (`sc_courseid`) REFERENCES `sc_course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sc_course_user_ibfk_1` FOREIGN KEY (`sc_userid`) REFERENCES `sc_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sc_course_user_ibfk_2` FOREIGN KEY (`sc_courseid`) REFERENCES `sc_course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

#
# Data for table "sc_course_user"
#

INSERT INTO `sc_course_user` VALUES (3,3,0),(3,5,1),(4,4,1),(4,5,0),(4,7,0),(4,8,0);

DROP VIEW IF EXISTS `sc_view_no_confirm`;
CREATE VIEW `sc_view_no_confirm` AS 
  select `student_course`.`sc_user`.`user_id` AS `user_id`,`student_course`.`sc_course`.`course_title` AS `course_title`,`student_course`.`sc_course`.`course_id` AS `course_id`,`student_course`.`sc_course_user`.`sc_userid` AS `sc_userid`,`student_course`.`sc_course_user`.`sc_isconfirm` AS `sc_sc_isconfirm` from ((`student_course`.`sc_course` join `student_course`.`sc_course_user`) join `student_course`.`sc_user`) where ((`student_course`.`sc_course`.`course_id` = `student_course`.`sc_course_user`.`sc_courseid`) and (`student_course`.`sc_course`.`course_teacherid` = `student_course`.`sc_user`.`user_id`));

DROP VIEW IF EXISTS `sc_view_no_confirm_1`;
CREATE VIEW `sc_view_no_confirm_1` AS 
  select `student_course`.`sc_user`.`user_id` AS `s_user_id`,`student_course`.`sc_user`.`user_number` AS `user_number`,`student_course`.`sc_user`.`user_name` AS `user_name`,`sc_view_no_confirm`.`user_id` AS `user_id`,`sc_view_no_confirm`.`course_title` AS `course_title`,`sc_view_no_confirm`.`course_id` AS `course_id`,`sc_view_no_confirm`.`sc_userid` AS `sc_userid`,`sc_view_no_confirm`.`sc_sc_isconfirm` AS `sc_isconfirm` from (`student_course`.`sc_user` join `student_course`.`sc_view_no_confirm`) where (`student_course`.`sc_user`.`user_id` = `sc_view_no_confirm`.`sc_userid`);

#
# Trigger "trigger_insert_course"
#

DROP TRIGGER IF EXISTS `trigger_insert_course`;
CREATE DEFINER='root'@'localhost' TRIGGER `student_course`.`trigger_insert_course` BEFORE INSERT ON `student_course`.`sc_course`
  FOR EACH ROW SET new.course_create_time = CURRENT_TIMESTAMP;

#
# Trigger "trigger_update_course"
#

DROP TRIGGER IF EXISTS `trigger_update_course`;
CREATE DEFINER='root'@'localhost' TRIGGER `student_course`.`trigger_update_course` BEFORE UPDATE ON `student_course`.`sc_course`
  FOR EACH ROW SET new.course_create_time = CURRENT_TIMESTAMP;
