 /**
 * =========================================================================
 * 
 *                      XingHan-Team 官网程序 
 * =========================================================================
 * 
 * @package     XingHan-Team Official Website
 * @author      XingHan Development Team
 * @copyright   Copyright (c) 2024, XingHan-Team
 * @link        https://www.ococn.cn
 * @since       Version 1.0.0
 * @filesource  By 奉天
 * 
 * =========================================================================
 * 
 * XingHan-Team 星涵网络工作室官方网站管理系统
 * 版权所有 (C) 2024 XingHan-Team。保留所有权利。
 * 
 * 本软件受著作权法和国际公约的保护。
 * 
 * 感谢您选择 XingHan-Team 的产品。如有任何问题或建议，请联系我们。
 * 
 * =========================================================================
 */ 

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `carousel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text,
  `image_url` varchar(255) NOT NULL,
  `order_num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carousel`
--

LOCK TABLES `carousel` WRITE;
/*!40000 ALTER TABLE `carousel` DISABLE KEYS */;
/*!40000 ALTER TABLE `carousel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (1,'hero','欢迎来到星涵工作室','我们致力于创造卓越的设计和创新解决方案','https://api.qqsuu.cn/api/dm-bing','2024-10-09 00:17:56','2024-10-09 20:23:57'),(2,'about','关于我们','现代工作室是一个充满激情的创意团队，专注于为客户提供最佳的设计和技术解决方案。','https://api.qqsuu.cn/api/dm-bing','2024-10-09 00:17:56','2024-10-09 11:05:28'),(3,'services','网页设计','创建美观、响应式的网站','https://api.qqsuu.cn/api/dm-bing','2024-10-09 00:17:56','2024-10-09 09:10:44'),(4,'services','品牌设计','打造独特的品牌形象',NULL,'2024-10-09 00:17:56','2024-10-09 00:17:56'),(5,'services','用户体验设计','优化用户交互和体验',NULL,'2024-10-09 00:17:56','2024-10-09 00:17:56'),(6,'hero','创造卓越的设计','我们致力于创造卓越的设计和创新解决方案','https://api.qqsuu.cn/api/dm-bing','2024-10-09 00:28:32','2024-10-09 20:23:57'),(11,'hero','创新的解决方案','我们致力于创造卓越的设计和创新解决方案','https://api.qqsuu.cn/api/dm-bing','2024-10-09 00:28:32','2024-10-09 20:23:57'),(12,'hero','欢迎来到星涵网络工作室','我们提供专业的网络解决方案','https://api.qqsuu.cn/api/dm-bing','2024-10-09 11:46:32','2024-10-09 12:41:18'),(13,'about','关于我们','星涵网络工作室是一家专业的网络服务提供商...',NULL,'2024-10-09 11:46:32','2024-10-09 19:15:30'),(14,'services','网站开发','我们提供高质量的网站开发服务...',NULL,'2024-10-09 11:46:32','2024-10-09 19:15:27'),(15,'services','网络营销','我们帮助您提升网络营销效果...',NULL,'2024-10-09 11:46:32','2024-10-09 19:15:32'),(17,'services','网站运维','我们提供全面的网站运维服务，确保您的网站始终保持最佳状态和性能...',NULL,'2024-10-09 15:45:46','2024-10-09 15:45:46'),(19,'culture','创新精神','我们鼓励团队成员不断探索新技术，勇于尝试新方法，以创新的思维解决问题。',NULL,'2024-10-09 18:39:40','2024-10-09 18:39:40'),(20,'culture','团队协作','我们相信通过有效的沟通和紧密的合作，可以实现1+1>2的效果。',NULL,'2024-10-09 18:39:40','2024-10-09 18:39:40'),(21,'culture','持续学习','在快速变化的互联网行业中，我们倡导终身学习的理念，不断提升自己的技能和知识。',NULL,'2024-10-09 18:39:40','2024-10-09 18:39:40'),(23,'environment','开放式办公区','我们的开放式办公区促进团队协作和交流，创造一个充满活力的工作环境。','/assets/img/office.png','2024-10-09 18:46:47','2024-10-09 19:05:17'),(24,'environment','会议室','配备现代化设备的会议室，为团队讨论和客户会议提供理想场所。','/assets/img/meeting.png','2024-10-09 18:46:47','2024-10-09 19:06:00'),(25,'environment','休息区','舒适的休息区让员工在工作之余放松身心，增进团队感情。','/assets/img/lounge.png','2024-10-09 18:46:47','2024-10-09 19:06:00'),(26,'environment','待增加','这是一个介绍','https://api.qqsuu.cn/api/dm-bing','2024-10-09 19:14:38','2024-10-09 19:15:21');
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `tag` varchar(50) DEFAULT '6年老品牌',
  `status` enum('show','hide') DEFAULT 'show',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio`
--

LOCK TABLES `portfolio` WRITE;
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` VALUES (9,'网站一','网站一','https://yuanxiapi.cn/api/touxiang/img/34541095.jpg','/','老品牌','show'),(10,'网站二','网站二','https://yuanxiapi.cn/api/touxiang/img/34541095.jpg','/','老品牌','show'),(11,'网站三','网站三','https://yuanxiapi.cn/api/touxiang/img/34541095.jpg','/','老品牌','show');
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_settings` (
  `setting_key` varchar(50) NOT NULL,
  `setting_value` text,
  PRIMARY KEY (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
INSERT INTO `site_settings` VALUES ('captcha_enabled','0'),('footer_text','Copyright © 2019 - 2024 星涵网络工作室官网 All Rights Reserved.'),('from_email',''),('from_name',''),('logo_image','/assets/img/logo.png'),('logo_text','星涵网络工作室'),('logo_type','text'),('site_description','这是一个描述。'),('site_keywords','星涵网络工作室,星涵工作室,星涵网络'),('site_title','星涵网络工作室 - 梦之理想 与你共筑'),('smtp_host','smtp.qq.com'),('smtp_pass',''),('smtp_port','465'),('smtp_secure','ssl'),('smtp_user','');
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_members`
--

DROP TABLE IF EXISTS `team_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `bio` text,
  `image_url` varchar(255) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `wechat` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` enum('normal','paused') DEFAULT 'normal',
  `review_status` enum('approved','pending','rejected') DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_members`
--

LOCK TABLES `team_members` WRITE;
/*!40000 ALTER TABLE `team_members` DISABLE KEYS */;
INSERT INTO `team_members` VALUES (1,'张三','首席执行官','张三拥有10年的网络技术经验...','https://yuanxiapi.cn/api/touxiang/img/34541095.jpg','123456','123456','123456@qq.com','normal','approved'),(2,'李四','技术总监','李四专注于前端开发和用户体验设计...','https://yuanxiapi.cn/api/touxiang/img/34541095.jpg','123456','123456','123456@qq.com','normal','approved'),(3,'王五','市场经理','王五在数字营销领域有着丰富的经验...','https://yuanxiapi.cn/api/touxiang/img/34541095.jpg','123456','123456','123456@qq.com','normal','approved');
/*!40000 ALTER TABLE `team_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verification_codes`
--

DROP TABLE IF EXISTS `verification_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `verification_codes` (
  `email` varchar(100) NOT NULL,
  `code` varchar(6) NOT NULL,
  `expires_at` datetime NOT NULL,
  `last_sent_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verification_codes`
--

LOCK TABLES `verification_codes` WRITE;
/*!40000 ALTER TABLE `verification_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `verification_codes` ENABLE KEYS */;
UNLOCK TABLES;

