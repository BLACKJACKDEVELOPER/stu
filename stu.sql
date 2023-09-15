-- Adminer 4.8.1 MySQL 8.0.17 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dater` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'วันเดือนปี',
  `descript` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รายละเอียดกิจกรรม',
  `name_stu` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'id ของ user',
  `name_control` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อผู้ควบคุม',
  `signature` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ลายเซ้น',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8;

INSERT INTO `activities` (`id`, `dater`, `descript`, `name_stu`, `name_control`, `signature`) VALUES
(36,	'2023-07-05',	'Html , css ,js, php , mysql3',	'2',	'นางสุปราณี บุริจันทร์',	'96439530100000.png'),
(37,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	'37.png'),
(38,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	'38.png'),
(39,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	'39.png'),
(40,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	'40.png'),
(41,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	'41.png'),
(42,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นางสุปราณี บุริจันทร์',	'189913794300000.png'),
(43,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(44,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(45,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(46,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(47,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(48,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(49,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(50,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(51,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(52,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(53,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(54,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(55,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(56,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(57,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(58,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(59,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(60,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(61,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(62,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(63,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(64,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(65,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(66,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(67,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(68,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(69,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(70,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(71,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(72,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(73,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(74,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(75,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(76,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(77,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(78,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(79,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(80,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(81,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(82,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(83,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(84,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(85,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(86,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(87,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(88,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(89,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(90,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(91,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(92,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(93,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(94,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(95,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(96,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(97,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'0',	''),
(98,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(99,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(100,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(101,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(102,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(103,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(104,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(105,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(106,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(107,	'2023-07-05',	'Html , css ,js, php , mysql',	'2',	'นาย ว้าววว ว้าววว',	''),
(108,	'2023-07-09',	'Docker',	'2',	'นาย ว้าววว ว้าววว',	'108.png'),
(109,	'2023-07-06',	'พัฒนาระบบวิสาหกิจศึกษา',	'9',	'นาย สาวดี  สวัสดีครับ',	'109.png'),
(110,	'2023-07-06',	'นำเสนอผลงานเว็บสหกิจศึกษา',	'10',	'นาย วงดี วงคำภี',	'110.png'),
(116,	'2023-07-23',	'zxc',	'2',	'zxc',	'116.png'),
(121,	'2023-07-11',	'DADATATA',	'2',	'นางสาวโสภิตา สามารถ\r\n',	'121.png'),
(123,	'2023-07-12',	'DEVELOPING',	'11',	'นายอธิ กลมเกลียว',	'123.png'),
(124,	'2023-07-15',	'414141414',	'11',	'0',	'124.png'),
(125,	'2023-07-13',	'Silent Day',	'11',	'นางสุปราณี บุริจันทร์',	'122291123200000.png'),
(126,	'2023-07-13',	'asdasd',	'11',	'นางสุปราณี บุริจันทร์',	'124439010000000.png'),
(127,	'2023-07-13',	'asdasd',	'11',	'นางสุปราณี บุริจันทร์',	'6812005700000.png'),
(128,	'2023-07-13',	'asdasd',	'11',	'นางสุปราณี บุริจันทร์',	'146914791400000.png'),
(129,	'2023-07-13',	'asdasd',	'11',	'นางสุปราณี บุริจันทร์',	'179908909600000.png'),
(130,	'2023-07-13',	'asdasd',	'11',	'นางสุปราณี บุริจันทร์',	'190592957400000.png'),
(131,	'2023-07-13',	'asdasd',	'11',	'นางสุปราณี บุริจันทร์',	'48974825800000.png'),
(132,	'2023-07-18',	'adasdasd',	'11',	'นางสุปราณี บุริจันทร์',	'48078939600000.png'),
(133,	'2023-08-25',	'asdasdasd',	'2',	'นางสาวสุกัญญา เรืองสุวรรณ\r\n',	''),
(134,	'2023-08-25',	'Hello World',	'2',	'นายเกรียงไกร คำภาพงษ์\r\n',	''),
(135,	'2023-08-25',	'Hello World',	'2',	'นายเกรียงไกร คำภาพงษ์\r\n',	''),
(136,	'2023-08-25',	'asdasd',	'2',	'นางสุปราณี บุริจันทร์',	'130558335900000.png'),
(137,	'2023-08-25',	'asdasd',	'2',	'นางสุปราณี บุริจันทร์',	'144876428400000.png'),
(138,	'2023-08-25',	'asdasdasd',	'2',	'นางสาวโสภิตา สามารถ\r\n',	''),
(139,	'2023-08-25',	'asdasdasd',	'2',	'นางสาวโสภิตา สามารถ\r\n',	''),
(140,	'2023-08-25',	'asdasd',	'2',	'นางสุปราณี บุริจันทร์',	'198745289600000.png'),
(141,	'2023-08-27',	'Hello World',	'2',	'นายเกรียงไกร คำภาพงษ์\r\n',	''),
(142,	'2023-08-27',	'Hello World',	'2',	'นายเกรียงไกร คำภาพงษ์\r\n',	''),
(143,	'2023-08-25',	'Hello World',	'2',	'นางสุปราณี บุริจันทร์',	'138092604300000.png'),
(144,	'2023-08-25',	'Hello World',	'2',	'นางสุปราณี บุริจันทร์',	'14632386000000.png'),
(145,	'2023-08-25',	'Hello World',	'2',	'นางสุปราณี บุริจันทร์',	'162590449700000.png'),
(146,	'2023-08-25',	'Hello World',	'2',	'นางสุปราณี บุริจันทร์',	'52657986600000.png'),
(147,	'2023-08-25',	'Hello World',	'2',	'นางสุปราณี บุริจันทร์',	'121421962400000.png'),
(148,	'2023-08-25',	'Hello World',	'2',	'นางสาวโสภิตา สามารถ\r\n',	''),
(149,	'2023-08-25',	'Hello World',	'2',	'นางสาวโสภิตา สามารถ\r\n',	''),
(152,	'2022-10-12',	'Test',	'2',	'นางสาวสุกัญญา เรืองสุวรรณ\r\n',	''),
(153,	'2000-10-26',	'ทดสอบๆ',	'2',	'นางสาวโสภิตา สามารถ\r\n',	''),
(154,	'2022-12-10',	'Minising',	'2',	'นางสาวสุกัญญา เรืองสุวรรณ\r\n',	''),
(156,	'2023-08-31',	'Tester',	'8',	'นายเกรียงไกร คำภาพงษ์\r\n',	''),
(157,	'2023-08-31',	'Tst',	'12',	'นางสาวโสภิตา สามารถ\r\n',	'')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `dater` = VALUES(`dater`), `descript` = VALUES(`descript`), `name_stu` = VALUES(`name_stu`), `name_control` = VALUES(`name_control`), `signature` = VALUES(`signature`);

DROP TABLE IF EXISTS `controler`;
CREATE TABLE `controler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `profile` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'normal.png',
  `fullname` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `position` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `verify` tinyint(4) NOT NULL DEFAULT '1',
  `number_phone` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `controler` (`id`, `email`, `password`, `profile`, `fullname`, `position`, `verify`, `number_phone`) VALUES
(3,	'work1@gmail.com',	'lion4333',	'1122233729.jpg',	'นางสุปราณี บุริจันทร์',	'นักเทคโนโลยีสารสนเทศปฏิบัติการ',	1,	'0999999999'),
(4,	'work2@gmail.com',	'lion4333',	'normal.png',	'นายอธิ กลมเกลียว',	'นักวิชาการคอมพิวเตอร์\r\n',	1,	''),
(5,	'work3@gmail.com',	'lion4333',	'normal.png',	'นายชาญณรงค์ กางจันทา\r\n',	'นักเทคโนโลยีสารสนเทศปฏิบัติการ\r\n',	1,	''),
(6,	'work4@gmail.com',	'lion4333',	'normal.png',	'นายเกรียงไกร คำภาพงษ์\r\n',	'นักวิชาการคอมพิวเตอร์ปฏิบัติการ\r\n',	1,	''),
(7,	'work5@gmail.com',	'lion4333',	'normal.png',	'นางสาวสุกัญญา เรืองสุวรรณ\r\n',	'นักเทคโนโลยีสารสนเทศปฏิบัติการ\r\n',	1,	''),
(8,	'work6@gmail.com',	'lion4333',	'normal.png',	'นางสาวโสภิตา สามารถ\r\n',	'นักวิชาการคอมพิวเตอร์ปฏิบัติการ\r\n',	1,	''),
(9,	'work7@gmail.com',	'lion4333',	'normal.png',	'นายพัฒนพงศ์ หอมวุฒิวงศ์\r\n',	'เจ้าพนักงานเครื่องคอมพิวเตอร์\r\n',	1,	'')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `email` = VALUES(`email`), `password` = VALUES(`password`), `profile` = VALUES(`profile`), `fullname` = VALUES(`fullname`), `position` = VALUES(`position`), `verify` = VALUES(`verify`), `number_phone` = VALUES(`number_phone`);

DROP TABLE IF EXISTS `outin`;
CREATE TABLE `outin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `getin` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `getout` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `stu_id` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

INSERT INTO `outin` (`id`, `date`, `getin`, `getout`, `stu_id`) VALUES
(24,	'2023-09-04',	'15:09',	'15:09',	'12'),
(25,	'2023-09-07',	'16:38',	'16:38',	'2'),
(26,	'2023-09-08',	'15:48',	'15:48',	'2'),
(28,	'2023-09-11',	'8:58',	'15:48',	'2'),
(29,	'2023-09-11',	'15:48',	'15:48',	'12'),
(30,	'2023-09-12',	'10:26',	'10:26',	'2')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `date` = VALUES(`date`), `getin` = VALUES(`getin`), `getout` = VALUES(`getout`), `stu_id` = VALUES(`stu_id`);

DROP VIEW IF EXISTS `report_activities`;
CREATE TABLE `report_activities` (`signature` text, `activity_id` int(11), `id` int(11), `dater` text, `descript` text, `fullname` text, `name_control` text);


DROP TABLE IF EXISTS `resetpasswords`;
CREATE TABLE `resetpasswords` (
  `token` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `resetpasswords` (`token`, `email`) VALUES
('96622889',	's64209010013@kktech.ac.th')
ON DUPLICATE KEY UPDATE `token` = VALUES(`token`), `email` = VALUES(`email`);

DROP TABLE IF EXISTS `stu_info`;
CREATE TABLE `stu_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id ข้อมูล',
  `email` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'อีเมลล์',
  `password` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รหัสผ่าน',
  `gender` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'เพศ',
  `fullname` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อ/นามสกุล',
  `stu_id` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รหัสนักศึกษา',
  `marjor` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'สาขาวิชา',
  `class` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ระดับชั้น',
  `year` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ปีการศึกษา',
  `university` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'สถานศึกษา',
  `term` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ภาคเรียน',
  `number_phone` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'เบอร์โทร',
  `profile` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'normal.png' COMMENT 'รูปโปรไฟล์',
  `permission` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'สิทธิ์การเข้าใช้งาน',
  `verify` tinyint(4) NOT NULL COMMENT 'ยืนยันการเข้าใช้งาน',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `stu_info` (`id`, `email`, `password`, `gender`, `fullname`, `stu_id`, `marjor`, `class`, `year`, `university`, `term`, `number_phone`, `profile`, `permission`, `verify`) VALUES
(2,	'doctype2005@gmail.com',	'lion4333',	'ชาย',	'ปิยพนธ์ แก้วเก็บคำ',	'64209010013',	'เททโนโลยีสารสนเทศ',	'ปวช.3',	'2566',	'วิทยาลัยเทคนิคขอนแก่น',	'1',	'0959211346',	'1603251603.jpg',	'user',	1),
(6,	'nataphon@gmail.com',	'l',	'--ระบุ--',	'ปิยพนธ์ แก้วเก็บคำ',	'64209010028',	'เทคโนโลยีสารสนเทศ',	'ปวช.3',	'2566',	'วิทยาลัยเทคนิคขอนแก่น',	'--ระบุ--',	'0971744568',	'228510639.jpg',	'user',	1),
(8,	'admin@gmail.com',	'lion4333',	'ชาย',	'ณัฐพล  ศรีหอมไชย',	'64209010028',	'เททโนโลยีสารสนเทศ',	'ปวช.3',	'2566',	'วิทยาลัยเทคนิคขอนแก่น',	'1',	'0959211346',	'864887459.jpg',	'admin',	1),
(9,	'hello@gmail.com',	'lion4333',	'ชาย',	'ปิยพนธ์ แก้วเก็บคำ',	'64209010044',	'เทคโนโลยีสารสนเทศ',	'ปวช.3',	'2566',	'วิทยาลัยเทคนิคขอนแก่น',	'1',	'0961857606',	'883148056.jpg',	'user',	1),
(10,	'jack@gmail.com',	'lion4333',	'ชาย',	'ปิยพนธ์ แก้วเก็บคำ',	'64209010013',	'เททโนโลยีสารสนเทศ',	'ปวช.3',	'2566',	'วิทยาลัยเทคนิคขอนแก่น',	'2',	'0961857606',	'185958591.jpg',	'admin',	1),
(11,	's64209010013@kktech.ac.th',	'1q2w3e4r',	'ชาย',	'ปิยพนธ์ แก้วเก็บคำ',	'64209010011',	'เททโนโลยีสารสนเทศ',	'ปวช.3',	'2566',	'วิทยาลัยเทคนิคขอนแก่น',	'1',	'0959211346',	'1654007483.jpg',	'user',	1),
(12,	'dex@gmail.com',	'lion4333',	'ชาย',	'ณัฐพล  ศรีหอมไชย',	'64209010028',	'เททโนโลยีสารสนเทศ',	'ปวช.3',	'2566',	'วิทยาลัยเทคนิคขอนแก่น',	'1',	'0959211346',	'1117744944.jpg',	'user',	1)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `email` = VALUES(`email`), `password` = VALUES(`password`), `gender` = VALUES(`gender`), `fullname` = VALUES(`fullname`), `stu_id` = VALUES(`stu_id`), `marjor` = VALUES(`marjor`), `class` = VALUES(`class`), `year` = VALUES(`year`), `university` = VALUES(`university`), `term` = VALUES(`term`), `number_phone` = VALUES(`number_phone`), `profile` = VALUES(`profile`), `permission` = VALUES(`permission`), `verify` = VALUES(`verify`);

DROP TABLE IF EXISTS `workinfo`;
CREATE TABLE `workinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typedeline` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dateStart` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dateEnd` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descript` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `stu_id` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `workinfo` (`id`, `typedeline`, `dateStart`, `dateEnd`, `descript`, `stu_id`) VALUES
(6,	'ลากิจธุร',	'2023-08-27',	'2023-08-29',	'Data Hello',	'2'),
(7,	'ลากิจธุร',	'2023-08-25',	'2023-08-26',	'Elliot Wave theory',	'2'),
(8,	'มาสาย',	'2023-08-30',	'2023-08-30',	'Joke with me?',	'2'),
(9,	'ลาป่วย',	'2023-08-01',	'2023-08-01',	'ลาป่วยการเมือง',	'2'),
(10,	'ลากิจธุร',	'2023-08-02',	'2023-08-02',	'kk',	'2'),
(11,	'ลากิจธุร',	'2023-08-31',	'2023-08-31',	'Test W',	'8')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `typedeline` = VALUES(`typedeline`), `dateStart` = VALUES(`dateStart`), `dateEnd` = VALUES(`dateEnd`), `descript` = VALUES(`descript`), `stu_id` = VALUES(`stu_id`);

DROP TABLE IF EXISTS `report_activities`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `report_activities` AS select `activities`.`signature` AS `signature`,`activities`.`id` AS `activity_id`,`stu_info`.`id` AS `id`,`activities`.`dater` AS `dater`,`activities`.`descript` AS `descript`,`stu_info`.`fullname` AS `fullname`,`activities`.`name_control` AS `name_control` from (`activities` join `stu_info` on((`activities`.`name_stu` = `stu_info`.`id`)));

-- 2023-09-12 06:52:55