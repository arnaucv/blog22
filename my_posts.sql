-- MySQL dump 10.19  Distrib 10.3.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: my_posts
-- ------------------------------------------------------
-- Server version	10.3.34-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_users_id_foreign` (`user_id`),
  KEY `comments_posts_id_foreign` (`post_id`),
  CONSTRAINT `comments_posts_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `comments_users_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Vaya ostias nos esperan',1,1,NULL,NULL),(2,'Meh, al final no fue para tanto',2,1,NULL,NULL),(3,'Mc Laren al pozo',2,1,'2022-03-31 15:14:33','2022-03-31 15:14:33'),(4,'Puntos para todos!',2,1,'2022-03-31 15:17:20','2022-03-31 15:17:20'),(5,'yee',2,18,'2022-04-25 13:06:29','2022-04-25 13:06:29');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2013_01_27_192225_create_rols_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2022_01_27_174723_create_posts_table',1),(6,'2022_01_27_190306_create_tags_table',1),(7,'2022_01_27_191021_create_post_has_tags_table',1),(8,'2022_01_27_191230_create_comments_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_tag` (
  `post_id` bigint(20) unsigned NOT NULL,
  `tag_id` bigint(20) unsigned NOT NULL,
  KEY `post_has_tags_posts_id_foreign` (`post_id`),
  KEY `post_has_tags_tags_id_foreign` (`tag_id`),
  CONSTRAINT `post_has_tags_posts_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_has_tags_tags_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag`
--

LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
INSERT INTO `post_tag` VALUES (17,15),(17,16),(17,17),(18,18);
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_users_id_foreign` (`user_id`),
  CONSTRAINT `posts_users_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'F1 - Mundial de Destructores','Et cumque harum minus inventore amet. Eum corrupti impedit aut corporis sint non sed. Repellat quo ad expedita voluptas magni natus. Dolores impedit pariatur ut nobis sit. Quos aut quia eius libero vitae ut et.',2,'2022-02-04 14:54:26','2022-02-04 14:54:26'),(2,'Domingo en Bahrain: se avecina una catastrofe','Ipsam qui ut consequuntur nemo aut ut. Omnis architecto veritatis ut qui qui inventore. Libero accusamus aspernatur commodi quia aspernatur est rerum. Hic qui nam vero. Doloribus atque debitis nesciunt debitis adipisci.',2,'2022-02-04 14:54:26','2022-02-04 14:54:26'),(3,'Paissa intenta conquistar el mundo?','Ducimus sit non ratione velit. Ut libero quasi aliquam esse earum. Odit temporibus molestias sit ducimus et. Ipsa optio voluptas voluptatibus impedit.',2,'2022-02-04 14:54:26','2022-02-04 14:54:26'),(4,'Hoy toca comer churros con chocolate','Tempore enim rerum ab rerum. Ex alias consequatur quod necessitatibus magnam. Dicta cupiditate quasi molestiae. Adipisci sit nisi repellendus cumque et.',2,'2022-02-04 14:54:27','2022-02-04 14:54:27'),(6,'Miss','Quo aut dolores harum quaerat quaerat voluptatum. Blanditiis dolore laudantium pariatur velit rem ea. Nostrum suscipit dicta culpa fuga.',1,'2022-02-10 17:53:37','2022-02-10 17:53:37'),(14,'Don Quijote de la Mancha','Hay que leerse el libro!',2,'2022-04-21 16:06:47','2022-04-21 16:06:47'),(17,'El dia del libro mojado','Se han mojado cientos de libros en el dia de Sant Jordi, vaya cobaya',1,'2022-04-25 12:38:56','2022-04-25 12:38:56'),(18,'Me duele la espalda','Estoy por irme a casa',2,'2022-04-25 13:06:11','2022-04-25 13:06:11');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rols`
--

DROP TABLE IF EXISTS `rols`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rols` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rol` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rols_rol_unique` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rols`
--

LOCK TABLES `rols` WRITE;
/*!40000 ALTER TABLE `rols` DISABLE KEYS */;
INSERT INTO `rols` VALUES (1,'admin','2022-02-04 14:53:10','2022-02-04 14:53:10'),(2,'user','2022-02-04 14:53:10','2022-02-04 14:53:10'),(3,'loader','2022-02-04 14:53:11','2022-02-04 14:53:11'),(4,'guest','2022-02-04 14:53:11','2022-02-04 14:53:11');
/*!40000 ALTER TABLE `rols` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (13,'default','2022-04-25 12:37:52','2022-04-25 12:37:52'),(14,' news','2022-04-25 12:37:52','2022-04-25 12:37:52'),(15,'noticias','2022-04-25 12:38:56','2022-04-25 12:38:56'),(16,' actualidad','2022-04-25 12:38:56','2022-04-25 12:38:56'),(17,' economia','2022-04-25 12:38:56','2022-04-25 12:38:56'),(18,'salud','2022-04-25 13:06:11','2022-04-25 13:06:11');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_id` bigint(20) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_rol_id_foreign` (`rol_id`),
  CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `rols` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'User','user@example.com',NULL,'$2y$10$CXCv0cLhgpUFxHRW8Tge5Okf.MS3rF0ewdQPS63oiHn5i6z/k.rnW',2,NULL,'2022-02-04 14:53:11','2022-02-04 14:53:11'),(2,'Admin','admin@example.com',NULL,'$2y$10$6tfKYqKf9OzTRpiLnRF.t.3qpLejqkRQ7jwDZECIGXqhVUIc0mp56',1,NULL,'2022-02-04 14:53:11','2022-02-04 14:53:11'),(3,'Loader','loader@example.com',NULL,'$2y$10$yllYgODX4b7OlXzgaNcDFuYwufhJTZZIh6cxhVFFFdfmX.0jcwfzq',3,NULL,'2022-02-04 14:53:11','2022-02-04 14:53:11'),(4,'Guest','guest@example.com',NULL,'$2y$10$jOKTspNvFoUGJ.jpcblqFOp..qzGEvM43Wx423fJL5AUm6uDAcxvy',4,NULL,'2022-02-04 14:53:11','2022-02-04 14:53:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-27 15:40:00
