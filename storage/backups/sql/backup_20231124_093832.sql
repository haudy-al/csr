-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: csr
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','$2y$10$bu4YEejU7b5wDWMPy1BNbOFwVq5dkpadCJMZeZNB9Q6RpY3aBMdiW','65ba26c04a8ef4e96782f4d21a20edd5b7505648','2023-09-29 23:25:47','2023-11-24 01:03:15');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `berita` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` VALUES (4,'Peresmian Foodcourt Bogor Creative Center, CSR dari PT. Mayora Indah Tbk. ','<p>Pada hari Jumat, 11 November 2022 Wakil Walikota Bogor Dedie A Rachim meresmikan gerai makanan atau foodcourt Bogor Creative Center (BCC) yang berlokasi tepat di samping Kantor Kejaksaan Negeri (Kejari) Kota Bogor. Foodcourt ini merupakan CSR dari PT. Mayora Indah Tbk yang dibangun dengan nilai Rp 613.677.930.</p><p>Adanya foodcourt ini diharapkan dapat menambah nilai ekonomi, khususnya bagi para pelaku UMKM di Kota Bogor.</p>','berita-65266da202ffb231011044050.jpg','2023-10-11 08:46:52','2023-10-11 12:48:13'),(5,'Grand Launching Kampung Tematik di Kelurahan Curug, Kecamatan Bogor Barat ','<p>Pemerintah Kota (Pemkot) Bogor melalui Dinas Ketahanan Pangan dan Pertanian (DKPP) Kota Bogor bersama PT Astra International Tbk – Daihatsu membentuk satu kampung tematik baru dengan konsep kampung rambutan. Kerja sama pengembangan kampung tematik ini didukung Astra International Tbk – Daihatsu dengan memberikan 500 bibit pohon rambutan. Grand launching kampung tematik ini dilakukan dengan menanam bibit pohon rambutan oleh Wali Kota Bogor, Bima Arya di Villa Arum Sari, Kelurahan Curug, Kecamatan Bogor Barat, Kota Bogor, Selasa (11/10/2022)</p><p>&nbsp;</p>','berita-65269cd86db34231011080216.jpg','2023-10-11 13:02:16','2023-10-11 13:02:16');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bidang`
--

DROP TABLE IF EXISTS `bidang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bidang` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bidang`
--

LOCK TABLES `bidang` WRITE;
/*!40000 ALTER TABLE `bidang` DISABLE KEYS */;
INSERT INTO `bidang` VALUES (5,'Sosial','2023-10-17 03:08:16','2023-10-17 03:08:16'),(6,'Pendidikan','2023-10-17 03:08:26','2023-10-17 03:08:26'),(7,'Lingkungan Hidup','2023-10-17 03:08:37','2023-10-21 22:53:06'),(9,'Pelaporan','2023-10-21 22:51:57','2023-10-21 22:51:57'),(10,'Evaluasi','2023-10-21 22:52:23','2023-10-21 22:52:23'),(11,'Pengendalian','2023-10-21 22:52:34','2023-10-21 22:52:34'),(12,'Seni Budaya','2023-10-21 22:52:53','2023-10-21 22:52:53'),(13,'Infrastruktur','2023-10-21 22:53:19','2023-10-21 22:53:19'),(14,'Keagamaan dan Sosial','2023-10-21 22:53:33','2023-10-21 22:53:33'),(15,'Kesehatan','2023-10-21 22:54:16','2023-10-21 22:54:16'),(16,'Perencanaan','2023-10-21 22:54:55','2023-10-21 22:54:55');
/*!40000 ALTER TABLE `bidang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counter_view`
--

DROP TABLE IF EXISTS `counter_view`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `counter_view` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counter_view`
--

LOCK TABLES `counter_view` WRITE;
/*!40000 ALTER TABLE `counter_view` DISABLE KEYS */;
INSERT INTO `counter_view` VALUES (1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-10-19 05:09:16','2023-10-19 05:09:16'),(2,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','2023-11-15 08:24:59','2023-11-15 08:24:59');
/*!40000 ALTER TABLE `counter_view` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dokumen`
--

DROP TABLE IF EXISTS `dokumen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dokumen` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dokumen`
--

LOCK TABLES `dokumen` WRITE;
/*!40000 ALTER TABLE `dokumen` DISABLE KEYS */;
/*!40000 ALTER TABLE `dokumen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
INSERT INTO `failed_jobs` VALUES (1,'6e705f61-d20e-4906-be65-6365e71fd6c8','database','default','{\"uuid\":\"6e705f61-d20e-4906-be65-6365e71fd6c8\",\"displayName\":\"App\\\\Jobs\\\\SendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendEmailJob\\\":1:{s:9:\\\"emailData\\\";a:2:{s:5:\\\"email\\\";s:18:\\\"csdewa25@gmail.com\\\";s:14:\\\"target_sasaran\\\";s:4:\\\"t 10\\\";}}\"}}','ErrorException: Attempt to read property \"email\" on array in /home/haudy/dev/csr/app/Jobs/SendEmailJob.php:28\nStack trace:\n#0 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Foundation/Bootstrap/HandleExceptions.php(254): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError()\n#1 /home/haudy/dev/csr/app/Jobs/SendEmailJob.php(28): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}()\n#2 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\SendEmailJob->handle()\n#3 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#5 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#6 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#7 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#8 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#9 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#10 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#11 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#12 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#13 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#14 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then()\n#15 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#16 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call()\n#17 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(389): Illuminate\\Queue\\Worker->process()\n#19 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(176): Illuminate\\Queue\\Worker->runJob()\n#20 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon()\n#21 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#22 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#25 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#26 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#27 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#28 /home/haudy/dev/csr/vendor/symfony/console/Command/Command.php(326): Illuminate\\Console\\Command->execute()\n#29 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Console/Command.php(181): Symfony\\Component\\Console\\Command\\Command->run()\n#30 /home/haudy/dev/csr/vendor/symfony/console/Application.php(1081): Illuminate\\Console\\Command->run()\n#31 /home/haudy/dev/csr/vendor/symfony/console/Application.php(320): Symfony\\Component\\Console\\Application->doRunCommand()\n#32 /home/haudy/dev/csr/vendor/symfony/console/Application.php(174): Symfony\\Component\\Console\\Application->doRun()\n#33 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(201): Symfony\\Component\\Console\\Application->run()\n#34 /home/haudy/dev/csr/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#35 {main}','2023-11-23 05:42:04'),(2,'5ed6e02e-0cd8-43aa-a6f8-d89030e232f4','database','default','{\"uuid\":\"5ed6e02e-0cd8-43aa-a6f8-d89030e232f4\",\"displayName\":\"App\\\\Jobs\\\\SendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendEmailJob\\\":1:{s:9:\\\"emailData\\\";a:2:{s:5:\\\"email\\\";s:18:\\\"csdewa25@gmail.com\\\";s:14:\\\"target_sasaran\\\";s:4:\\\"t 10\\\";}}\"}}','ErrorException: Attempt to read property \"email\" on array in /home/haudy/dev/csr/app/Jobs/SendEmailJob.php:28\nStack trace:\n#0 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Foundation/Bootstrap/HandleExceptions.php(254): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError()\n#1 /home/haudy/dev/csr/app/Jobs/SendEmailJob.php(28): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}()\n#2 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\SendEmailJob->handle()\n#3 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#5 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#6 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#7 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#8 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#9 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#10 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#11 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#12 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#13 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#14 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then()\n#15 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#16 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call()\n#17 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(389): Illuminate\\Queue\\Worker->process()\n#19 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(176): Illuminate\\Queue\\Worker->runJob()\n#20 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon()\n#21 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#22 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#25 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#26 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#27 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#28 /home/haudy/dev/csr/vendor/symfony/console/Command/Command.php(326): Illuminate\\Console\\Command->execute()\n#29 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Console/Command.php(181): Symfony\\Component\\Console\\Command\\Command->run()\n#30 /home/haudy/dev/csr/vendor/symfony/console/Application.php(1081): Illuminate\\Console\\Command->run()\n#31 /home/haudy/dev/csr/vendor/symfony/console/Application.php(320): Symfony\\Component\\Console\\Application->doRunCommand()\n#32 /home/haudy/dev/csr/vendor/symfony/console/Application.php(174): Symfony\\Component\\Console\\Application->doRun()\n#33 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(201): Symfony\\Component\\Console\\Application->run()\n#34 /home/haudy/dev/csr/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#35 {main}','2023-11-23 05:43:31'),(3,'94db4d91-39b3-4500-b435-77311495fcbc','database','default','{\"uuid\":\"94db4d91-39b3-4500-b435-77311495fcbc\",\"displayName\":\"App\\\\Jobs\\\\SendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendEmailJob\\\":1:{s:9:\\\"emailData\\\";a:2:{s:5:\\\"email\\\";s:18:\\\"csdewa25@gmail.com\\\";s:14:\\\"target_sasaran\\\";s:4:\\\"t 10\\\";}}\"}}','ErrorException: Attempt to read property \"email\" on array in /home/haudy/dev/csr/app/Jobs/SendEmailJob.php:28\nStack trace:\n#0 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Foundation/Bootstrap/HandleExceptions.php(254): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError()\n#1 /home/haudy/dev/csr/app/Jobs/SendEmailJob.php(28): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}()\n#2 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\SendEmailJob->handle()\n#3 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#5 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#6 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#7 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#8 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#9 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#10 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#11 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#12 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#13 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#14 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then()\n#15 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#16 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call()\n#17 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(389): Illuminate\\Queue\\Worker->process()\n#19 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(176): Illuminate\\Queue\\Worker->runJob()\n#20 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon()\n#21 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#22 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#25 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#26 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#27 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#28 /home/haudy/dev/csr/vendor/symfony/console/Command/Command.php(326): Illuminate\\Console\\Command->execute()\n#29 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Console/Command.php(181): Symfony\\Component\\Console\\Command\\Command->run()\n#30 /home/haudy/dev/csr/vendor/symfony/console/Application.php(1081): Illuminate\\Console\\Command->run()\n#31 /home/haudy/dev/csr/vendor/symfony/console/Application.php(320): Symfony\\Component\\Console\\Application->doRunCommand()\n#32 /home/haudy/dev/csr/vendor/symfony/console/Application.php(174): Symfony\\Component\\Console\\Application->doRun()\n#33 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(201): Symfony\\Component\\Console\\Application->run()\n#34 /home/haudy/dev/csr/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#35 {main}','2023-11-23 05:44:43'),(4,'3ddc464a-08a9-4645-bd3d-76bd90afbffe','database','default','{\"uuid\":\"3ddc464a-08a9-4645-bd3d-76bd90afbffe\",\"displayName\":\"App\\\\Jobs\\\\SendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendEmailJob\\\":1:{s:9:\\\"emailData\\\";a:2:{s:5:\\\"email\\\";s:18:\\\"csdewa25@gmail.com\\\";s:14:\\\"target_sasaran\\\";s:4:\\\"t 10\\\";}}\"}}','ErrorException: Attempt to read property \"email\" on array in /home/haudy/dev/csr/app/Jobs/SendEmailJob.php:28\nStack trace:\n#0 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Foundation/Bootstrap/HandleExceptions.php(254): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError()\n#1 /home/haudy/dev/csr/app/Jobs/SendEmailJob.php(28): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}()\n#2 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\SendEmailJob->handle()\n#3 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#5 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#6 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#7 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#8 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#9 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#10 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#11 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#12 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#13 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#14 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then()\n#15 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#16 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call()\n#17 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(389): Illuminate\\Queue\\Worker->process()\n#19 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(176): Illuminate\\Queue\\Worker->runJob()\n#20 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon()\n#21 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#22 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#25 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#26 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#27 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#28 /home/haudy/dev/csr/vendor/symfony/console/Command/Command.php(326): Illuminate\\Console\\Command->execute()\n#29 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Console/Command.php(181): Symfony\\Component\\Console\\Command\\Command->run()\n#30 /home/haudy/dev/csr/vendor/symfony/console/Application.php(1081): Illuminate\\Console\\Command->run()\n#31 /home/haudy/dev/csr/vendor/symfony/console/Application.php(320): Symfony\\Component\\Console\\Application->doRunCommand()\n#32 /home/haudy/dev/csr/vendor/symfony/console/Application.php(174): Symfony\\Component\\Console\\Application->doRun()\n#33 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(201): Symfony\\Component\\Console\\Application->run()\n#34 /home/haudy/dev/csr/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#35 {main}','2023-11-23 05:45:47'),(5,'1f5993a0-0e84-415a-a151-d30e5bb614c4','database','default','{\"uuid\":\"1f5993a0-0e84-415a-a151-d30e5bb614c4\",\"displayName\":\"App\\\\Jobs\\\\SendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendEmailJob\\\":1:{s:9:\\\"emailData\\\";a:2:{s:5:\\\"email\\\";s:18:\\\"csdewa25@gmail.com\\\";s:14:\\\"target_sasaran\\\";s:4:\\\"t 10\\\";}}\"}}','ErrorException: Attempt to read property \"email\" on array in /home/haudy/dev/csr/app/Jobs/SendEmailJob.php:28\nStack trace:\n#0 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Foundation/Bootstrap/HandleExceptions.php(254): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError()\n#1 /home/haudy/dev/csr/app/Jobs/SendEmailJob.php(28): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}()\n#2 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\SendEmailJob->handle()\n#3 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#5 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#6 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#7 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#8 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#9 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#10 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#11 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#12 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#13 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#14 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then()\n#15 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#16 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call()\n#17 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(389): Illuminate\\Queue\\Worker->process()\n#19 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(176): Illuminate\\Queue\\Worker->runJob()\n#20 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon()\n#21 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#22 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#25 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#26 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#27 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#28 /home/haudy/dev/csr/vendor/symfony/console/Command/Command.php(326): Illuminate\\Console\\Command->execute()\n#29 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Console/Command.php(181): Symfony\\Component\\Console\\Command\\Command->run()\n#30 /home/haudy/dev/csr/vendor/symfony/console/Application.php(1081): Illuminate\\Console\\Command->run()\n#31 /home/haudy/dev/csr/vendor/symfony/console/Application.php(320): Symfony\\Component\\Console\\Application->doRunCommand()\n#32 /home/haudy/dev/csr/vendor/symfony/console/Application.php(174): Symfony\\Component\\Console\\Application->doRun()\n#33 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(201): Symfony\\Component\\Console\\Application->run()\n#34 /home/haudy/dev/csr/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#35 {main}','2023-11-23 05:46:41'),(6,'39bdeab2-d74c-484e-8851-71ae980333da','database','default','{\"uuid\":\"39bdeab2-d74c-484e-8851-71ae980333da\",\"displayName\":\"App\\\\Jobs\\\\SendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendEmailJob\\\":1:{s:9:\\\"emailData\\\";a:4:{s:5:\\\"email\\\";s:18:\\\"csdewa25@gmail.com\\\";s:15:\\\"nama_perusahaan\\\";s:7:\\\"sfafsaf\\\";s:14:\\\"target_sasaran\\\";s:4:\\\"t 10\\\";s:13:\\\"nama_kegiatan\\\";s:4:\\\"test\\\";}}\"}}','Illuminate\\Queue\\TimeoutExceededException: App\\Jobs\\SendEmailJob has timed out. in /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php:798\nStack trace:\n#0 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(217): Illuminate\\Queue\\Worker->timeoutExceededException()\n#1 /home/haudy/dev/csr/vendor/symfony/mailer/Transport/Smtp/Stream/AbstractStream.php(77): Illuminate\\Queue\\Worker->Illuminate\\Queue\\{closure}()\n#2 /home/haudy/dev/csr/vendor/symfony/mailer/Transport/Smtp/SmtpTransport.php(346): Symfony\\Component\\Mailer\\Transport\\Smtp\\Stream\\AbstractStream->readLine()\n#3 /home/haudy/dev/csr/vendor/symfony/mailer/Transport/Smtp/SmtpTransport.php(200): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->getFullResponse()\n#4 /home/haudy/dev/csr/vendor/symfony/mailer/Transport/Smtp/EsmtpTransport.php(117): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->executeCommand()\n#5 /home/haudy/dev/csr/vendor/symfony/mailer/Transport/Smtp/SmtpTransport.php(316): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->executeCommand()\n#6 /home/haudy/dev/csr/vendor/symfony/mailer/Transport/Smtp/SmtpTransport.php(209): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->ping()\n#7 /home/haudy/dev/csr/vendor/symfony/mailer/Transport/AbstractTransport.php(69): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->doSend()\n#8 /home/haudy/dev/csr/vendor/symfony/mailer/Transport/Smtp/SmtpTransport.php(137): Symfony\\Component\\Mailer\\Transport\\AbstractTransport->send()\n#9 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Mail/Mailer.php(573): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->send()\n#10 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Mail/Mailer.php(335): Illuminate\\Mail\\Mailer->sendSymfonyMessage()\n#11 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Mail/Mailable.php(213): Illuminate\\Mail\\Mailer->send()\n#12 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Support/Traits/Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#13 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Mail/Mailable.php(214): Illuminate\\Mail\\Mailable->withLocale()\n#14 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Mail/Mailer.php(357): Illuminate\\Mail\\Mailable->send()\n#15 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Mail/Mailer.php(301): Illuminate\\Mail\\Mailer->sendMailable()\n#16 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Mail/PendingMail.php(124): Illuminate\\Mail\\Mailer->send()\n#17 /home/haudy/dev/csr/app/Jobs/SendEmailJob.php(28): Illuminate\\Mail\\PendingMail->send()\n#18 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\SendEmailJob->handle()\n#19 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#20 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#21 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#22 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#23 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#24 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#25 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#26 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#27 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#28 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#29 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#30 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then()\n#31 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#32 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call()\n#33 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#34 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(389): Illuminate\\Queue\\Worker->process()\n#35 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(176): Illuminate\\Queue\\Worker->runJob()\n#36 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon()\n#37 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#38 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#39 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#40 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#41 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#42 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#43 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#44 /home/haudy/dev/csr/vendor/symfony/console/Command/Command.php(326): Illuminate\\Console\\Command->execute()\n#45 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Console/Command.php(181): Symfony\\Component\\Console\\Command\\Command->run()\n#46 /home/haudy/dev/csr/vendor/symfony/console/Application.php(1081): Illuminate\\Console\\Command->run()\n#47 /home/haudy/dev/csr/vendor/symfony/console/Application.php(320): Symfony\\Component\\Console\\Application->doRunCommand()\n#48 /home/haudy/dev/csr/vendor/symfony/console/Application.php(174): Symfony\\Component\\Console\\Application->doRun()\n#49 /home/haudy/dev/csr/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(201): Symfony\\Component\\Console\\Application->run()\n#50 /home/haudy/dev/csr/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#51 {main}','2023-11-23 08:52:41');
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` VALUES (3,'judul Faq','<p>test test</p>','2023-10-16 09:30:48','2023-11-05 15:20:10');
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeri_foto`
--

DROP TABLE IF EXISTS `galeri_foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galeri_foto` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri_foto`
--

LOCK TABLES `galeri_foto` WRITE;
/*!40000 ALTER TABLE `galeri_foto` DISABLE KEYS */;
INSERT INTO `galeri_foto` VALUES (1,'Saung Eling','<p>saung eling</p>','foto-652f2a288b228231018074320.jpg','2023-10-18 00:39:41','2023-11-09 13:03:05'),(2,'Pembuatan TPT Sentra Kuliner Malabar ','<p>CSR Pembuatan TPT di Lokasi Sentra Kuliner Malabar Kecamatan Bogor Ten</p>','foto-654cdd399f9f2231109082305.jpg','2023-11-09 13:23:05','2023-11-09 13:23:05');
/*!40000 ALTER TABLE `galeri_foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeri_video`
--

DROP TABLE IF EXISTS `galeri_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galeri_video` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `embed` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri_video`
--

LOCK TABLES `galeri_video` WRITE;
/*!40000 ALTER TABLE `galeri_video` DISABLE KEYS */;
INSERT INTO `galeri_video` VALUES (4,'admin','<p>Bima Arya</p>','6Ihq8aIE90g','thumbnail-652691d215298231011071514.png','2023-10-11 12:15:14','2023-11-09 13:02:20');
/*!40000 ALTER TABLE `galeri_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_member`
--

DROP TABLE IF EXISTS `kategori_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori_member` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_member`
--

LOCK TABLES `kategori_member` WRITE;
/*!40000 ALTER TABLE `kategori_member` DISABLE KEYS */;
INSERT INTO `kategori_member` VALUES (2,'Besar','2023-10-12 07:57:24','2023-10-15 09:05:48'),(3,'UMKM / Micro','2023-10-15 09:05:15','2023-10-15 09:05:15'),(4,'Kecil','2023-10-15 09:05:26','2023-10-15 09:05:26'),(5,'Menengah','2023-10-15 09:05:34','2023-10-15 09:05:34'),(7,'BUMN','2023-11-21 09:05:20','2023-11-21 09:05:20'),(8,'BUMD','2023-11-21 09:05:29','2023-11-21 09:05:29');
/*!40000 ALTER TABLE `kategori_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kecamatan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_kecamatan` bigint NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kecamatan`
--

LOCK TABLES `kecamatan` WRITE;
/*!40000 ALTER TABLE `kecamatan` DISABLE KEYS */;
INSERT INTO `kecamatan` VALUES (5,3271010,'BOGOR SELATAN',NULL,NULL),(6,3271020,'BOGOR TIMUR',NULL,NULL),(9,3271030,'BOGOR UTARA',NULL,NULL),(10,3271040,'BOGOR TENGAH',NULL,NULL),(11,3271050,'BOGOR BARAT',NULL,NULL),(12,3271060,'TANAH SEREAL',NULL,NULL);
/*!40000 ALTER TABLE `kecamatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelurahan`
--

DROP TABLE IF EXISTS `kelurahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelurahan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_kelurahan` bigint NOT NULL,
  `id_kecamatan` bigint unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelurahan`
--

LOCK TABLES `kelurahan` WRITE;
/*!40000 ALTER TABLE `kelurahan` DISABLE KEYS */;
INSERT INTO `kelurahan` VALUES (6,3271010001,3271010,'MULYAHARJA',NULL,NULL),(7,3271010002,3271010,'PAMOYANAN',NULL,NULL),(8,3271010003,3271010,'RANGGAMEKAR',NULL,NULL),(9,3271010004,3271010,'GENTENG',NULL,NULL),(10,3271010005,3271010,'KERTAMAYA',NULL,NULL),(11,3271010006,3271010,'RANCAMAYA',NULL,NULL),(12,3271010007,3271010,'BOJONGKERTA',NULL,NULL),(13,3271010008,3271010,'HARJASARI',NULL,NULL),(14,3271010009,3271010,'MUARASARI',NULL,NULL),(15,3271010010,3271010,'PAKUAN',NULL,NULL),(16,3271010011,3271010,'CIPAKU',NULL,NULL),(17,3271010012,3271010,'LAWANGGINTUNG',NULL,NULL),(18,3271010013,3271010,'BATUTULIS',NULL,NULL),(19,3271010014,3271010,'BONDONGAN',NULL,NULL),(20,3271010015,3271010,'EMPANG',NULL,NULL),(21,3271010016,3271010,'CIKARET',NULL,NULL),(22,3271020001,3271020,'SINDANGSARI',NULL,NULL),(23,3271020002,3271020,'SINDANGRASA',NULL,NULL),(24,3271020003,3271020,'TAJUR',NULL,NULL),(25,3271020004,3271020,'KATULAMPA',NULL,NULL),(26,3271020005,3271020,'BARANANGSIANG',NULL,NULL),(27,3271020006,3271020,'SUKASARI',NULL,NULL),(28,3271030001,3271030,'BANTARJATI',NULL,NULL),(29,3271030002,3271030,'TEGALGUNDIL',NULL,NULL),(30,3271030003,3271030,'TANAHBARU',NULL,NULL),(31,3271030004,3271030,'CIMAHPAR',NULL,NULL),(32,3271030005,3271030,'CILUAR',NULL,NULL),(33,3271030006,3271030,'CIBULUH',NULL,NULL),(34,3271030007,3271030,'KEDUNGHALANG',NULL,NULL),(35,3271030008,3271030,'CIPARIGI',NULL,NULL),(36,3271040001,3271040,'PALEDANG',NULL,NULL),(37,3271040002,3271040,'GUDANG',NULL,NULL),(38,3271040003,3271040,'BABAKANPASAR',NULL,NULL),(39,3271040004,3271040,'TEGALLEGA',NULL,NULL),(40,3271040005,3271040,'BABAKAN',NULL,NULL),(41,3271040006,3271040,'SEMPUR',NULL,NULL),(42,3271040007,3271040,'PABATON',NULL,NULL),(43,3271040008,3271040,'CIBOGOR',NULL,NULL),(44,3271040009,3271040,'PANARAGAN',NULL,NULL),(45,3271040010,3271040,'KEBONKELAPA',NULL,NULL),(46,3271040011,3271040,'CIWARINGIN',NULL,NULL),(47,3271050001,3271050,'PASIRMULYA',NULL,NULL),(48,3271050002,3271050,'PASIRKUDA',NULL,NULL),(49,3271050003,3271050,'PASIRJAYA',NULL,NULL),(50,3271050004,3271050,'GUNUNGBATU',NULL,NULL),(51,3271050005,3271050,'LOJI',NULL,NULL),(52,3271050006,3271050,'MENTENG',NULL,NULL),(53,3271050007,3271050,'CILENDEK TIMUR',NULL,NULL),(54,3271050008,3271050,'CILENDEK BARAT',NULL,NULL),(55,3271050009,3271050,'SINDANGBARANG',NULL,NULL),(56,3271050010,3271050,'MARGAJAYA',NULL,NULL),(57,3271050011,3271050,'BALUNGBANGJAYA',NULL,NULL),(58,3271050012,3271050,'SITUGEDE',NULL,NULL),(59,3271050013,3271050,'BUBULAK',NULL,NULL),(60,3271050014,3271050,'SEMPLAK',NULL,NULL),(61,3271050015,3271050,'CURUGMEKAR',NULL,NULL),(62,3271050016,3271050,'CURUG',NULL,NULL),(63,3271060001,3271060,'KEDUNGWARINGIN',NULL,NULL),(64,3271060002,3271060,'KEDUNGJAYA',NULL,NULL),(65,3271060003,3271060,'KEBONPEDES',NULL,NULL),(66,3271060004,3271060,'TANAHSAREAL',NULL,NULL),(67,3271060005,3271060,'KEDUNGBADAK',NULL,NULL),(68,3271060006,3271060,'SUKARESMI',NULL,NULL),(69,3271060007,3271060,'SUKADAMAI',NULL,NULL),(70,3271060008,3271060,'CIBADAK',NULL,NULL),(71,3271060009,3271060,'KAYUMANIS',NULL,NULL),(72,3271060010,3271060,'MEKARWANGI',NULL,NULL),(73,3172060004,3271060,'KENCANA',NULL,NULL);
/*!40000 ALTER TABLE `kelurahan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laporan`
--

DROP TABLE IF EXISTS `laporan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laporan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_usulan_kegiatan` bigint unsigned NOT NULL,
  `id_member` bigint unsigned NOT NULL,
  `id_transaksi` bigint unsigned NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan`
--

LOCK TABLES `laporan` WRITE;
/*!40000 ALTER TABLE `laporan` DISABLE KEYS */;
/*!40000 ALTER TABLE `laporan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_activities`
--

DROP TABLE IF EXISTS `log_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_activities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `level` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_akun` bigint unsigned NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_activities`
--

LOCK TABLES `log_activities` WRITE;
/*!40000 ALTER TABLE `log_activities` DISABLE KEYS */;
INSERT INTO `log_activities` VALUES (1,'user',215,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-21 05:07:25','2023-11-21 05:07:25'),(2,'user',230,'127.0.0.1:8000//livewire/update','Reset Password member (lupa password)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-21 05:17:56','2023-11-21 05:17:56'),(3,'user',230,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-21 05:25:06','2023-11-21 05:25:06'),(4,'user',230,'127.0.0.1:8000//livewire/update','Reset Password member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-21 05:25:31','2023-11-21 05:25:31'),(5,'user',230,'127.0.0.1:8000//livewire/update','Update Profile member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-21 05:29:16','2023-11-21 05:29:16'),(6,'user',215,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-21 07:26:28','2023-11-21 07:26:28'),(7,'user',215,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-21 07:54:17','2023-11-21 07:54:17'),(8,'user',1,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-21 09:10:07','2023-11-21 09:10:07'),(9,'user',1,'127.0.0.1:8000//livewire/update','Reset Password member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-21 09:10:27','2023-11-21 09:10:27'),(10,'user',215,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-21 09:12:47','2023-11-21 09:12:47'),(11,'user',215,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-21 16:51:56','2023-11-21 16:51:56'),(12,'user',1,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-21 16:53:26','2023-11-21 16:53:26'),(13,'user',1,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-22 00:33:50','2023-11-22 00:33:50'),(14,'user',1,'127.0.0.1:8000//livewire/update','Tambah Usulan Kegiatan member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-22 00:44:52','2023-11-22 00:44:52'),(15,'user',215,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-22 03:03:58','2023-11-22 03:03:58'),(16,'user',8,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-22 11:05:19','2023-11-22 11:05:19'),(17,'user',8,'127.0.0.1:8000//livewire/update','Reset Password member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-22 11:05:43','2023-11-22 11:05:43'),(18,'user',8,'127.0.0.1:8000//livewire/update','Tambah Usulan Kegiatan member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-22 11:10:57','2023-11-22 11:10:57'),(19,'user',8,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-22 11:22:54','2023-11-22 11:22:54'),(20,'user',8,'127.0.0.1:8000//member/data-usulan/hapus/6','Hapus Usulan Kegiatan member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-22 11:23:05','2023-11-22 11:23:05'),(21,'user',215,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-22 11:54:19','2023-11-22 11:54:19'),(22,'user',215,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-22 12:09:16','2023-11-22 12:09:16'),(23,'user',215,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-22 13:00:51','2023-11-22 13:00:51'),(24,'user',230,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-22 13:15:09','2023-11-22 13:15:09'),(25,'user',230,'127.0.0.1:8000//livewire/update','Tambah Usulan Kegiatan member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-22 13:16:00','2023-11-22 13:16:00'),(26,'user',215,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-22 13:16:29','2023-11-22 13:16:29'),(27,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (ditolak)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-22 14:22:26','2023-11-22 14:22:26'),(28,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (proses)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 03:32:19','2023-11-23 03:32:19'),(29,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (ditolak)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 03:37:43','2023-11-23 03:37:43'),(30,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (proses)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 03:39:08','2023-11-23 03:39:08'),(31,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (ditolak)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 03:40:49','2023-11-23 03:40:49'),(32,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (proses)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 03:42:16','2023-11-23 03:42:16'),(33,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (ditolak)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 03:44:56','2023-11-23 03:44:56'),(34,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (proses)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 03:48:14','2023-11-23 03:48:14'),(35,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (ditolak)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 03:54:21','2023-11-23 03:54:21'),(36,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (proses)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 03:55:18','2023-11-23 03:55:18'),(37,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (ditolak)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 03:57:42','2023-11-23 03:57:42'),(38,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (proses)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 04:02:14','2023-11-23 04:02:14'),(39,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (ditolak)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 05:42:01','2023-11-23 05:42:01'),(40,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (proses)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 05:43:31','2023-11-23 05:43:31'),(41,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (ditolak)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 05:44:41','2023-11-23 05:44:41'),(42,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (proses)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 05:45:44','2023-11-23 05:45:44'),(43,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (ditolak)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 05:46:40','2023-11-23 05:46:40'),(44,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (proses)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 05:47:37','2023-11-23 05:47:37'),(45,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (ditolak)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 05:48:22','2023-11-23 05:48:22'),(46,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (proses)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 05:49:09','2023-11-23 05:49:09'),(47,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (ditolak)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 05:52:05','2023-11-23 05:52:05'),(48,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (proses)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 05:52:58','2023-11-23 05:52:58'),(49,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (ditolak)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 05:57:55','2023-11-23 05:57:55'),(50,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (proses)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 05:59:52','2023-11-23 05:59:52'),(51,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (diterima)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 06:00:05','2023-11-23 06:00:05'),(52,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (proses)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 08:51:33','2023-11-23 08:51:33'),(53,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (diterima)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 08:51:40','2023-11-23 08:51:40'),(54,'user',215,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 08:53:17','2023-11-23 08:53:17'),(55,'user',215,'127.0.0.1:8000//livewire/update','Update Profile member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 08:54:24','2023-11-23 08:54:24'),(56,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (proses)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 08:55:04','2023-11-23 08:55:04'),(57,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (diterima)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 08:55:09','2023-11-23 08:55:09'),(58,'admin',1,'127.0.0.1:8000//livewire/update','Login Admin','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 09:11:19','2023-11-23 09:11:19'),(59,'admin',1,'127.0.0.1:8000//livewire/update','Tambah Usulan Kegiatan oleh (admin)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 09:21:00','2023-11-23 09:21:00'),(60,'admin',1,'127.0.0.1:8000//admin/logout','Logout Admin','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 09:27:07','2023-11-23 09:27:07'),(61,'admin',1,'127.0.0.1:8000//livewire/update','Login Admin','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 09:27:20','2023-11-23 09:27:20'),(62,'admin',1,'127.0.0.1:8000//livewire/update','Login Admin','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 09:42:10','2023-11-23 09:42:10'),(63,'admin',1,'127.0.0.1:8000//livewire/update','Tambah Usulan Kegiatan oleh (admin)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 09:46:55','2023-11-23 09:46:55'),(64,'admin',1,'127.0.0.1:8000//livewire/update','Tambah Usulan Kegiatan oleh (admin)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 10:04:19','2023-11-23 10:04:19'),(65,'admin',1,'127.0.0.1:8000//admin/data-usulan/hapus/10','Hapus Usulan Kegiatan member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 10:04:28','2023-11-23 10:04:28'),(66,'user',215,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 10:05:39','2023-11-23 10:05:39'),(67,'user',230,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 10:06:51','2023-11-23 10:06:51'),(68,'user',230,'127.0.0.1:8000//member/data-usulan/hapus/7','Hapus Usulan Kegiatan member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 10:08:18','2023-11-23 10:08:18'),(69,'user',215,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 10:10:49','2023-11-23 10:10:49'),(70,'user',215,'127.0.0.1:8000//livewire/update','Tambah Laporan member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 10:11:57','2023-11-23 10:11:57'),(71,'admin',1,'127.0.0.1:8000//admin/laporan/hapus/2','Hapus Laporan (admin)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 10:14:01','2023-11-23 10:14:01'),(72,'admin',1,'127.0.0.1:8000//livewire/update','Login Admin','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 10:53:51','2023-11-23 10:53:51'),(73,'admin',1,'127.0.0.1:8000//livewire/update','Login Admin','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-23 11:12:50','2023-11-23 11:12:50'),(74,'admin',1,'127.0.0.1:8000//livewire/update','Login Admin','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-24 00:08:56','2023-11-24 00:08:56'),(75,'user',215,'127.0.0.1:8000//livewire/update','Login member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-24 00:36:33','2023-11-24 00:36:33'),(76,'user',215,'127.0.0.1:8000//livewire/update','Reset Password member','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-24 00:48:50','2023-11-24 00:48:50'),(77,'admin',1,'127.0.0.1:8000//livewire/update','Login Admin','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-24 00:56:45','2023-11-24 00:56:45'),(78,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (proses)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-24 00:59:52','2023-11-24 00:59:52'),(79,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (diterima)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-24 00:59:56','2023-11-24 00:59:56'),(80,'admin',1,'127.0.0.1:8000//livewire/update','Login Admin','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-24 01:03:15','2023-11-24 01:03:15'),(81,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (proses)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-24 01:03:29','2023-11-24 01:03:29'),(82,'admin',1,'127.0.0.1:8000//admin/data-usulan-peminatan/status/23','Update Status Usulan Minat (diterima)','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','2023-11-24 01:03:34','2023-11-24 01:03:34');
/*!40000 ALTER TABLE `log_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_log`
--

DROP TABLE IF EXISTS `login_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_upaya_login` int NOT NULL,
  `waktu` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_log`
--

LOCK TABLES `login_log` WRITE;
/*!40000 ALTER TABLE `login_log` DISABLE KEYS */;
INSERT INTO `login_log` VALUES (1,'182.2.146.225','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0',0,NULL,'2023-10-02 01:48:21','2023-10-02 01:48:21'),(2,'182.2.147.129','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0',4,'2023-10-02 09:02:21','2023-10-02 01:50:01','2023-10-02 01:52:21'),(3,'182.2.146.237','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0',4,'2023-10-02 09:15:46','2023-10-02 02:04:49','2023-10-02 02:05:46'),(4,'182.2.146.105','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0',4,'2023-10-02 09:17:18','2023-10-02 02:07:08','2023-10-02 02:07:18'),(5,'182.2.146.117','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0',0,NULL,'2023-10-02 02:07:40','2023-10-02 02:07:40'),(6,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0',0,'2023-11-24 07:24:56','2023-10-02 02:09:06','2023-11-24 00:24:56'),(7,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',0,NULL,'2023-11-15 08:23:16','2023-11-15 08:23:16');
/*!40000 ALTER TABLE `login_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kontak_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori_perusahaan` bigint unsigned NOT NULL,
  `alamat_perusahaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelurahan` bigint unsigned DEFAULT NULL,
  `gambar_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci,
  `level` enum('pd','cp') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cp',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password_expire` date NOT NULL DEFAULT '1999-01-01',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'Dinas Pendidikan Kota Bogor','disdik@kotabogor.go.id','','','(0251)-8341101',5,'Jl. Padjadjaran No.125. Bantarjati. Bogor Utara. Kota Bogor. Jawa Barat 16153','-6.5731901','106.8064504',NULL,'NoPicture.jpg','disdik','$2y$10$aopp.46Gms4zu8CXmd2m2uOSX5EK4298DK2M3oYWclfDlw9vxJ4SK','1278fd9d41874b60812b028e63b3bee984fd4f3b','pd','1',NULL,'2023-11-22 00:33:50','2024-11-21'),(2,'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Kota Bogor','bkpsdm@kotabogor.go.id','','','(0251)-8356170',5,'Jl. Ir. Juanda. No. 10. Bogor Tengah. Kota Bogor. Jawa Barat 16122','-6.5953331','106.791566',NULL,'NoPicture.jpg','bkpsdm','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC','0','pd','0',NULL,'2023-11-15 13:28:07','1999-01-01'),(3,'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Bogor','dpmptsp@kotabogor.go.id','','','(0251)-8356167',5,'Jl. Kapt. Muslihat No. 19. Bogor Tengah. Kota Bogor. Jawa Barat 16121','-6.5962385','106.7908458',NULL,'NoPicture.jpg','dpmptsp','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC','0','pd','0',NULL,'2023-11-21 05:17:36','1999-01-01'),(5,'Badan Perencanaan Pembangunan Daerah Kota Bogor','bappeda@kotabogor.go.id','','','(0251)-8338052',5,'Jl. Kapt. Muslihat No. 19. Bogor Tengah. Kota Bogor. Jawa Barat 16121','-6.5965342','106.7907856',NULL,'NoPicture.jpg','bappeda','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC','0','pd','0',NULL,'2023-11-23 09:45:39','1999-01-01'),(6,'Dinas Pariwisata dan Kebudayaan Kota Bogor','disparbud@kotabogor.go.id','','','(0251)-8328827',5,'Jl. Pandu Raya No. 45. Tegal Gundil. Bogor Tengah. Kota Bogor. Jawa Barat 16121','-6.583761','106.8154865',NULL,'NoPicture.jpg','disparbud','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(7,'Dinas Kependudukan dan Pencatatan Sipil Kota Bogor','disdukcapil@kotabogor.go.id','','','(0251)-8328161',5,'Jl. Ahmad Adnawijaya (Pandu Raya) No. 45A. Jl. Achmad Adnawijaya. Tegal Gundil. Bogor Utara. Kota Bo','-6.5817143','106.8155492',NULL,'NoPicture.jpg','disdukcapil','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(8,'Dinas Kesehatan Kota Bogor','dinkes@kotabogor.go.id','','','(0251)-8331753',5,'Jl. Kesehatan No. 3. Tanah Sareal. Tanah Sereal. Kota Bogor. Jawa Barat 16161','-6.5752867','106.7973849',NULL,'NoPicture.jpg','dinkes','$2y$10$BBb81Az1fvKX3lWbzeXgZeyH5RYXXse7n9xN5XBWAMUfgZw9iohAa','d7d19443da2c471a20c3420582925e29e88f7886','pd','1',NULL,'2023-11-22 11:22:54','2024-11-22'),(9,'Badan Pendapatan Daerah Kota Bogor','bapenda@kotabogor.go.id','','','(0251)-8322871',5,'Jl. Pemuda No. 31. Tanah Sereal. Kota Bogor. Jawa Barat 16162','-6.5712457','106.7951169',NULL,'NoPicture.jpg','bapenda','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(10,'Dinas Perhubungan Kota Bogor','dishubkotabogor@gmail.com','','','(0251)-8333511',5,'Jl. Raya Tajur No. 54. Pakuan. Bogor Selatan. Pakuan. Bogor Sel.. Kota Bogor. Jawa Barat 16134','-6.6296512','106.821735',NULL,'NoPicture.jpg','dishub','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(11,'Dinas Perindustrian dan Perdagangan Kota Bogor','disperindag@kotabogor.go.id','','','(0251)-8338788',5,'Jl. Dadali No.4. Tanah Sareal. Tanah Sereal. Kota Bogor. Jawa Barat 16161','-6.569749','106.7973367',NULL,'NoPicture.jpg','disperindag','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(13,'Dinas Sosial Kota Bogor','dinsos@kotabogor.go.id','','','(0251)-8332315',5,'Jl. Merdeka No. 142. Bogor Tengah. Ciwaringin. Bogor. Kota Bogor. Jawa Barat 16111','-6.5850126','106.7855668',NULL,'NoPicture.jpg','dinsos','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(14,'Dinas Kearsipan dan Perpustakaan Kota Bogor','diskarpus@kotabogor.go.id','','','(0251)-8380247',5,'Jl. Medika 1A. No. 2. Perum Menteng Asri. Menteng. Bogor Bar.. Kota Bogor. Jawa Barat 16111','-6.5795983','106.7749486',NULL,'NoPicture.jpg','diskarpus','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(16,'Dinas Ketahanan Pangan dan Pertanian Kota Bogor','dkpp@kotabogor.go.id','','','(0251)-8322787',5,'Jl. Raya Cipaku No.5. Cipaku. Bogor Sel.. Kota Bogor. Jawa Barat 16133','-6.6304197','106.8089122',NULL,'NoPicture.jpg','dkpp','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(17,'Dinas Lingkungan Hidup Kota Bogor','dlh@kotabogor.go.id','','','(0251)-8321577',5,'Jl. Paledang No.43. Paledang. Bogor Tengah. Kota Bogor. Jawa Barat 16122','-6.5784221','106.7873871',NULL,'NoPicture.jpg','dlh','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(18,'Sekretariat KPU Kota Bogor','kpu@kotabogor.go.id','','','(0251)-8362669',5,'Jl. Loader No.7. Baranangsiang. Bogor. Jawa Barat. 16000','-6.6050211','106.8092118',NULL,'NoPicture.jpg','kpu','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(19,'Satuan Polisi Pamong Praja Kota Bogor','satpolpp@kotabogor.go.id','','','(0251)-8318191',5,'Jl. Padjadjaran No.121. Bantarjati. Bogor Utara. Bantarjati. Bogor Utara. Kota Bogor. Jawa Barat 161','-6.5736269','106.8064484',NULL,'NoPicture.jpg','satpolpp','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(20,'Sekretariat DPRD Kota Bogor','setdprd@kotabogor.go.id','','','(0251)-8323472',5,'Jl. Kapten Muslihat. No. 21. Pabaton. Bogor Tengah. Pabaton. Bogor Tengah. Kota Bogor. Jawa Barat 16','-6.5962389','106.7908404',NULL,'NoPicture.jpg','setdprd','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(21,'Dinas Pemuda dan Olahraga Kota Bogor','dispora@kotabogor.go.id','','','(0251)-8332882',5,'Jl. Pemuda. No. 4. Tanah Sareal. Tanah Sereal. Kota Bogor. Jawa Barat 16162','-6.5767529','106.7955671',NULL,'NoPicture.jpg','dispora','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(22,'Kecamatan Bogor Tengah Kota Bogor','kec.boteng@kotabogor.go.id','','','(0251)-8323351',5,'Jl. Kantin No. 2. Pabaton. Bogor Tengah. Bogor. Jawa Barat','-6.6286659','106.8345424',NULL,'NoPicture.jpg','kecboteng','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(23,'Kecamatan Bogor Barat Kota Bogor','kec.bobar@kotabogor.go.id','','','(0251)-7537866',5,'Jl. H.T. Sobari. Semplak. Bogor Bar.. Kota Bogor. Jawa Barat 16114','-6.5584496','106.7605599',NULL,'NoPicture.jpg','kecbobar','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(24,'Kecamatan Bogor Timur Kota Bogor','kec.botim@kotabogor.go.id','','','(0251)-8326773',5,'Jl. Padjadjaran No.16. Baranangsiang. Bogor Tim.. Kota Bogor. Jawa Barat 16143','-6.6120754','106.8100639',NULL,'NoPicture.jpg','kecbotim','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(25,'Kecamatan Bogor Selatan Kota Bogor','kec.bogorselatan@kotabogor.go.id','','','(0251)-8322812',5,'Jl. Layungsari III No. 41. Bondongan. Empang. Bogor Sel.. Kota Bogor. Jawa Barat 16132','-6.6130548','106.7958829',NULL,'NoPicture.jpg','kecbosel','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(26,'Kecamatan Bogor Utara Kota Bogor','kec.bout@kotabogor.go.id','','','(0251)-8323444',5,'Jl. Gagalur Raya No. 2. Tegal Gundil. Bogor Utara. Tegal Gundil. Bogor Utara. Kota Bogor. Jawa Barat','-6.571628','106.7836423',NULL,'NoPicture.jpg','kecbout','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(27,'Kecamatan Tanah Sareal Kota Bogor','kec_tansar@kotabogor.go.id','','','(0251)-328547',5,'Jl. Raya Kebon Pedes No.20. Tanah Sereal. Tanah Sareal. Bogor. Kota Bogor. Jawa Barat 16161','-6.5725901','106.7923467',NULL,'NoPicture.jpg','kectansar','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(28,'Sekretariat Daerah Kota Bogor','setda@kotabogor.go.id','','','(0251)-8324473',5,'Jl. Ir. Juanda. No. 10. Bogor Tengah. Kota Bogor. Jawa Barat 16122','-6.5949458','106.7911598',NULL,'NoPicture.jpg','setda','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(29,'Dinas Perumahan dan Permukiman Kota Bogor','disperumkim@kotabogor.go.id','','','(0251)-8322001',5,'Jl. Pengadilan No. 8A. Gadog. Megamendung. Pabaton. Bogor Tengah. Kota Bogor. Jawa Barat 16770','-6.5920783','106.7927823',NULL,'NoPicture.jpg','disperumkim','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(30,'Dinas Pekerjaan Umum dan Penataan Ruang  Kota Bogor','dpupr@kotabogor.go.id','','','(0251)-8380180',5,'Jl. Pemuda No.30 A. Tanahsareal. Tanah Sereal. Tanah Sareal. Bogor. Kota Bogor. Jawa Barat 16161','-6.57102','106.7955367',NULL,'NoPicture.jpg','dpupr','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(32,'Dinas Koperasi  Usaha Kecil dan Menengah Kota Bogor','dkukm@kotabogor.go.id','','','(0251)-8326661',5,'Jl. Dadali No.2. Tanah Sereal. Tanah Sareal. Tanah Sereal. Kota Bogor. Jawa Barat 16161','-6.5680256','106.8030826',NULL,'NoPicture.jpg','dkukm','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(33,'Dinas Komunikasi dan Informatika Kota Bogor','kominfo@kotabogor.go.id','','','(0251)-8321075',5,'Jl. Ir. Juanda. No. 10. Bogor Tengah. Kota Bogor. Jawa Barat 16122','-6.595095','106.7914763',NULL,'20191209142035.jpg','diskominfo','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(34,'Inspektorat Kota Bogor','inspektorat@kotabogor.go.id','','','(0251)-8313274',5,'Jl. Pahlawan Blk No.144. Bondongan. Bogor Sel.. Kota Bogor. Jawa Barat 16131','-6.6153052','106.8012701',NULL,'NoPicture.jpg','inspektorat','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(35,'RSUD Kota Bogor','rsud@kotabogor.go.id','','','(0251)-8312292',5,'Jl. Doktor Semeru No. 120. Bogor Barat. Menteng. Bogor Bar.. Kota Bogor. Jawa Barat 16112','-6.5804556','106.7758709',NULL,'NoPicture.jpg','rsud','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(36,'Badan Penanggulangan Bencana Daerah Kota Bogor','bpbd@kotabogor.go.id','','','(0251)-8322100',5,'Jl. Pajajaran No. 1. Sukasari. Bogor Timur. Sukasari. Bogor Tim.. Kota Bogor. Jawa Barat 16142','-6.6092607','106.8082753',NULL,'NoPicture.jpg','bpbd','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(37,'Dinas Tenaga Kerja dan Transmigrasi Kota Bogor','disnakertrans@kotabogor.go.id','','','(0251)-8332315',5,'Jl. Merdeka No. 142. Bogor Tengah. Ciwaringin. Bogor. Kota Bogor. Jawa Barat 16111','-6.5851227','106.7857911',NULL,'NoPicture.jpg','disnakertrans','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(38,'Dinas Pengendalian Penduduk dan Keluarga Berencana Kota Bogor','dppkb@kotabogor.go.id','','','(0251)-8353712',5,'Jl. Pemuda No.1A. Tanah Sareal. Tanah Sereal. Kota Bogor. Jawa Barat 16162','-6.5755797','106.7945393',NULL,'NoPicture.jpg','dppkb','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(39,'Perumda BPR  Bank Kota Bogor','perumdabpr@kotabogor.go.id','','','(0251) 8324601',5,'Jl.RE.Martadinata No.45 Bogor','-6.58353','106.7887567',NULL,'NoPicture.jpg','perumdabpr','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(40,'101 Hotel Bogor Suryakencana','hrm.suryakancana@the101hotels.com','','','(0251) 7565101',5,'Jl.Suryakencana no.179-181.Bogor','-6.6075769','106.8002522',NULL,'NoPicture.jpg','101hotelbogor','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(41,'The Mirah Hotel (PT Mirah Segar)','themirah@kotabogor.go.id','','','(0251)8348040',5,'Jl.Pangrango No.9A.Bogor','-6.6015613','106.8045169',NULL,'NoPicture.jpg','themirahhotel','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(42,'PT Taspen (Persero)','taspen@kotabogor.go.id','','','(0251)8316177',5,'Jl.Padjajaran No.17A.Bogor','-6.5797462','106.8046141',NULL,'NoPicture.jpg','taspen','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(43,'PT Bank Pembangunan Daerah(BJB Cabang  Bogor)','bpd@kotabogor.go.id','','','(0251)8324132',5,'Jl.Kapten Muslihat','-6.5959448','106.789675',NULL,'NoPicture.jpg','bpd','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(44,'Universitas Ibn Khaldun Bogor','mail@uika-bogor.ac.id','','','(0251) 8356884',5,'Jl. Sholeh Iskandar, RT.01/RW.10, Kedung Badak, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16162','-6.5608821','106.7899417',NULL,'NoPicture.jpg','uika','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(45,'PT. Bank Mandiri (Persero) TBK','mandiricare@bankmandiri.co.id','','','(0251) 8320008',5,'Jl. Ir. H. Juanda No.12, RT.01/RW.01, Pabaton, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16121','-6.596058','106.7913342',NULL,'NoPicture.jpg','mandiri','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(46,'Boehringer Ingelhim','zzJakInfo@boehringer-ingelhim.com','-','+6221 2555 25','0251 8321065',5,'Jl. Lawang Gintung No. 89, Bogor','-6.6202736','106.8108667',NULL,'NoPicture.jpg','boehringer','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(47,'Padjajaran Suites Resort &amp; Convention Hotel','secretary@padjadjaransuites.com','-','-','(0251) 7569000',5,'Jl. Inner Ring Road No. LOT XIX C2 No. 17 BNR','-6.640598','106.7843499',NULL,'NoPicture.jpg','padjajaransuitesresort','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(48,'Lemongrass','info@lemongrassresto.com','-','-','(0251) 8328800',5,'Jl. Padjajaran','-6.576638','106.8058516',NULL,'NoPicture.jpg','lemongrass','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(50,'Kelurahan Cimahpar','kel.cimahpar@kotabogor.go.id','-','-','(0251) 8651781',5,'Jl. Tumenggung Wiradireja No. 106  Bogor Utara','-6.585017','106.829887',NULL,'NoPicture.jpg','kelcimahpar','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(51,'Dinas Pemberdayaan Masyarakat  Perempuan  dan Perlindungan Anak Kota Bogor','dpmppa@kotabogor.go.id','-','-','(0251)-8321558',5,'Jl. Ciwaringin No.99 Bogor. Bogor Tengah. Kota Bogor','-6.5837617','106.7876109',NULL,'NoPicture.jpg','dpmppa','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(53,'PT. Kominfo','kominfo@pt.id','','','+ 62251- 832107',5,'Jl. Ir. H. Juanda No 10 Bogor','-6.595095','106.7914763',NULL,'20191209142035.jpg','ptkominfo','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(56,'PT. Waskita Jaya Purnama','waskitajayapurnama@gmail.com','Erik Irawan Suganda','','0251-8321089',5,'Jl. Merdeka No. 121','-6.5877384','106.7854219',NULL,'NoPicture.jpg','waskitajaya purnama','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(57,'Amaroossa Royal Bogor','hr.arb@amaroossahotel.com','Ardian Pratama','0251 8354333','0251 8354333',5,'Jl. Otto Iskandardinata No.84','-6.6020809','106.802835',NULL,'NoPicture.jpg','amaroossaroyalbogor','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(58,'CV. Agung Sejahtera','cvagung@gmail.com','Agung','088765447677','08786573376',5,'Jl. Ir. H. Juanda No 10 Bogor','-6.595095','106.7914763',NULL,'20200122112622.jpg','agung','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(59,'Hotel Permata','hrd@permatahotel.com','Burhan','081212517152','0251 8318007',5,'Jl. Pajajaran No. 35','','',NULL,'','IT@PERMATAHOTEL.COM','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(60,'Hotel Permata','hrd@permatahotel.com','Burhan','081212517152','0251 8318007',5,'Jl. Pajajaran No. 35','','',NULL,'','IT@PERMATAHOTEL.COM','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(61,'Perumda Pasar Pakuan Jaya','info@pasarpakuanjaya.co.id','Cep Hilman','081317135116','0251 8330313',5,'Jl. Siliwangi No.31 Sukasari, Bogor','','',NULL,'20200805120006.png','pasarpakuanjaya','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(63,'Arch Hotel Bogor','info@archhotelbogor.com','Maria Gloria','0811 1801802','02518377168',5,'Jl. Pajajaran No. 225','6.58','106.81',NULL,'','archhotel','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(64,'Zest Hotel Bogor','hrspv-zhbo@zesthotel.com','Hosna Loka Larasati','08990430950','02517568888',5,'Jl Pajajaran No 27 Bogor','6.59','106.81',NULL,'20201215141424.png','Zest Hotel Bogor','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(65,'Swiss-Belhotel Bogor','hrmsbbo@swiss-belhotel.com','Vira/ Puput Intan','08158007557/ ','0251 7565111',5,'Jalan Salak No. 38 - 40 Bogor','6.59 S, 106.8E','',NULL,'','sbbo','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(66,'THE 1O1 Bogor Suryakancana','hrm.suryakancana@the101hotels.com','ATIKA SEPTIANI','087873863833','02517565101',5,'jalan surykancana no. 179-181, Babakan Pasar - Bogor Tengah','6.61','106.8',NULL,'','hrm.suryakancana@the101hotels.com','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(67,'favehotel Padjajaran Bogor','bogorhrc@favehotels.com','Fachril Rezy Alvian','087870858784','8356100',5,'Jl. Cidangiang No. 1','6.6','106.81',NULL,'20201126095110.jpg','favehotelPadjajaranBogor','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(68,'Perumda Tirta Pakuan','corporate@tirtapakuan.co.id','fani','085776204292','0251-8324111',5,'Jl. Siliwangi No.121','6,62','106,82',NULL,'20201126095213.jpeg','Tirta Pakuan','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(69,'PT TASPEN (Persero) Kantor Cabang Bogor','taspen.bogor@yahoo.com','Cattetiana Dhevi','082231496686','02518316177',5,'Jl. Raya Padjadjaran No. 17A','6&deg;58&deg;S','106&deg;81&deg; E',NULL,'20201126095320.jpg','TASPENBOGOR','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(70,'Grand Savero Hotel Bogor','hr.admin1@grandsavero.com','Dede Permana','081292245929','0251 8358888',5,'jl.pajajaran no.27 ','6.60','106.80',NULL,'','hr.admin1@grandsavero.com','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(71,'arif','arifsez1977@gmail.com','arif','081514088390','081514088390',5,'jalan kapten muslihat','','',NULL,'','arif','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(72,'Grand Royal Padjadjaran Hotel Bogor','hrd@royalpadjadjaranhotel.com','Muhammad Iqbal','089681019049','0251 8385777',5,'Jl. Padjadjaran No.12, Rt. 002/Rw. 004','6.59','106.80',NULL,'','hrd@royalpadjadjaranhotel.com','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(73,'Padjadjaran Hotel eks Salak Padjadjaran Hotel','hrd.salakpadjadjaran@gmail.com','Irene Kusumadewi Praditya','081315976580','0251&nbsp;83590',5,'Jalan Pajajaran No 17','6.58','106.81',NULL,'20201201100753.jpeg','padjadjaranhotel','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(74,'Universitas Ibn Khaldun Bogor','budi.susetyo@uika-bogor.ac.id','Dr. Budi Susetyo, M.Sc','081510447076','0251-8356884',5,'Jl. KH. Sholeh Iskandar Km. 2','-6.56055','106.79216',NULL,'20201126105757.gif','budiuika','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(77,'PT.Bank Central Asia,Tbk Cabang Bogor','billy_lalamentik@bca.co.id','Billy Lalamentik','081231702053','02518314411',5,'Jl. Juanda No.28 Bogor','6.60','106.79',NULL,'','BCABGR','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(78,'bank mandiri','13300@bankmandiri.co.id','Edo','0895804561223','0895804561223',5,'jl. ir. h juanda no. 12','6.60','106.79',NULL,'','Bank Mandiri','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(79,'PT PLN (Persero) UP3 Bogor','ratu.nabilah@pln.co.id','Ratu Nabilah','081283804947',' 0251813200',5,'Jl.Pajajaran No. 233 Bogor','6.57','106.81',NULL,'','plnbogor','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(80,'PT. Bank Negara Indonesia','bnibgr46@gmail.com','Deris Kharisma','081287102278','0251 - 8311446',5,'Jl. Ir. H. Juanda No. 52 Kelurahan Paledang, Kecamatan Bogor Tengah, Kota Bogor','6.60','106.79',NULL,'20201126111117.JPG','bnibgr46','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(81,'Perumda BPR Bank Kota Bogor','infobkb@bankkotabogor.co.id','Aprillia Purwanti','089513955338','02518324601',5,'Jl. Re. Martadinata No.45, RT.01/RW.09, Ciwaringin, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 1','6.58','106.79',NULL,'20201126111159.jpg','Bankkota','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(82,'PT.Boehringer Ingelheim Indonesia','Ardiansyah.ardiansyah@boehringer-ingelheim.com','Ardiansyah','081288369602','+622518321065',5,'Jln.Lawang Gintung No 89','6.62','106.81',NULL,'20201126111218.jpg','boehringer-ingelheim-indonesia','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(83,'PT. TELKOM','hadiwi63@gmail.com','Hadi Wiratmo','082113326445','02518301234',5,'Jl. Pajajaran Bogor','6.59','106.81',NULL,'','Hadiwira','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(84,'PT. Bank DKI','capem.bogor@bankdki.co.id','Triari Casuarina','081291440054','0251 8396542',5,'Jl. Raya Pajajaran No. 88A','6.58','106.81',NULL,'','bankdki','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(88,'PT.TELKOM CDC','680501@telkom.co.id','08111121968','Darsono','02518301519',5,'jl.pajajaran no.37','6.59','106.81',NULL,'','telkom','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(89,'Dinas Koperasi Usaha Kecil dan Menengah','dkumkm.d24@gmail.com','Silva Salamah','082112532896','02518326661',5,'Jl. Dadali 2 no 3','','',NULL,'','dkumkm.d24','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(90,'DINAS KETAHANAN PANGAN DAN PERTANIAN KOTA BOGOR','distanikotbogor@gmail.com','Muhammad Sofa','082260061891','0251-8318670',5,'JL. RAYA CIPAKU N0. 5','','',NULL,'','dkpp','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(91,'Dinas Perindustrian dan Perdagangan Kota Bogor','disperindagkotabogor@yahoo.co.id','Susie Sulistiawaty Mudrik','0251 8338788','0251 8338788',5,'Jalan Dadali No. 4 Tanah Sareal ','','',NULL,'','Disperindag','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(92,'Dinas Perhubungan Kota Bogor','dishubkotabogor@gmail.com','Siti Nurlaeli','087874099291','0251-8333511',5,'Jl. Raya Tajur No. 54 Bogor','-6.62762709997818','106.82320555561034',NULL,'','dishubkotabogor','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(93,'RSUD Kota Bogor','rsudkotabogor@yahoo.co.id','Husnah Maryati','081384329274','02518312292',5,'Jl. Dr. Sumeru No. 120 Bogor ','-6.57990','106.77806',NULL,'20201202160044.jpeg','rsudkotabogor','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'pd','0',NULL,NULL,'1999-01-01'),(95,'YAYASAN BAITUL MAL PLN','budi.effendi@pln.co.id','BUDI EFFENDI','087879024096','0251 8314200',5,'JL. PAJAJARAN NO.233 BOGOR','','',NULL,'','ybmplnbgr','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(132,'Hagan','ahganahmaker6@gmail.com','082311311070','081981978881','085211212111',5,'Test','12&deg;','12&deg;',NULL,'20211203205328.jpeg','Hagan','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(153,'Perumda Pasar Pakuan Jaya','info@pasarpakuanjaya.co.id','Hidayat','085241207014','02518330313',5,'Blok F Trade Center Lt 3, Jl. Dewi Sartika','-6.59255','106.79319',NULL,'20220419094152.png','pasarpakuanjaya','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(166,'Kelurahan Kedunghalang','kelurahankedunghalang@gmail.com','','','-',5,'Jl. Raya Kedunghalang No.3 Kota Bogor - 16158','','',NULL,'','Kelkedunghalang','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(170,'PT Bank Pembangunan Jawa Barat dan Banten, Tbk  Cabang Bogor','gkasah@bankbjb.co.id','Gina Kasah','081298508170','02518324132',5,'Jl. Kapten Muslihat No. 11-13','','',NULL,'','bjbbogor','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(171,'ZAP','foo-bar@example.com','ZAP','ZAP','ZAP',5,'ZAP','ZAP','ZAP',NULL,'','ZAP','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(176,'PT Sejahtera Eka Graha','winda@klubbogorraya.com','Winda Haryati','08111157588','0251 8337770',5,'Perumahan Danau Bogor Raya','','',NULL,'20221027094931.jpeg','Bogor The Heritage &amp; Ecopark','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(177,'PT. GUNUNG SUWARNA ABADI','gnsuwarnaabadi@gmail.com','Gabriel Gunawan',' +62812-9736-','+6221 471 4567',5,'Summarecon Bogor Office Jl. Summarecon Bogor Boulevard Utama, Cibanon, Sukaraja, Kab. Bogor','-6.6222657682796955','106.83638037655',NULL,'','Suwarna Abadi','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(178,'PT GoTo Gojek Tokopedia Tbk (Gojek)','zidny.ilman@gojek.com','Zidny Ilman','08111400094','08111400094',5,'Pasaraya Blok M, Jakarta Selatan, DKI Jakarta','','',NULL,'','Gojek Indonesia','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(179,'PT Pos Indonesia KCU Bogor','987392967@posindonesia.co.id','Halimah','0852-9618-493','02518321460',5,'Jl Ir H Juanda No. 5 Kota Bogor','-6.5999786','106.7951818',NULL,'20221020113312.jpg','Kantorpos Bogor','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(180,'PT MIRAH SEGAR / THE MIRAH HOTEL','hrd@mirahhotelbogor.com','Indah Puspitasari','085797410120','0251 8348040',5,'JL PANGRANGO NO 9 A BOGOR','-6.5905300541508','106.80376084831.',NULL,'20221020141234.jpeg','Themirah','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(181,'Pt Graha Bogor Sentosa','ahcm@padjadjaransuitesresort.com','edwin khadam','087897972498','02517569000',5,'Inner ring road Lot XIX -C2 no 17','','',NULL,'','edwinkhadam','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(182,'Restoran Gurih 7 Bogor','dhandi@gurih7.com','Dhandi Rizal','087770898963','(0251) 831-7889',5,'Jalan Pajajaran No 102  Kota Bogor Jawa Barat','-6.5742166','106.806479',NULL,'20221021082135.jpeg','dhandigurih7','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(183,'PT TELKOM INDONESIA, Tbk','corporate_comm@telkom.co.id','Darsono','08111121968','02518301332',5,'Jl. Raya Pajajaran No.84, Bantarjati, Bogor Utara, Kota Bogor, Jawa Barat 16153, Indonesia','https://www.google.com/maps/dir/-6.597961,106.7824','https://www.google.com/maps/dir/-6.597961,106.7824',NULL,'20221021095947.png','680501','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(184,'PT. NUTRIFOOD INDONESIA','suselo@nutrifood.co.id','Suselo Harjo','082124087650','0251-8240257',5,'Jl. Raya Ciawi no. 280A Sindangsari Bogor Timur, Kota Bogor','-6 38.946','106 50.578',NULL,'20221024152107.jpeg','PT Nutrifood','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(185,'Zest Bogor','hrspv-zhbo@zesthotel.com','Dini Ramawati','081384135270','02517568888',5,'Jl. Pajajaran No. 27','-6.5933811304','106.805005474',NULL,'20221025132843.png','Zest Bogor','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(186,'PT. BOGOR ANGGANA CENDEKIA','renny_k@botanisquare.net','Renny Kur niastuti','087870524488','0251 8386658',5,'JL. RAYA PAJAJARAN , BOGOR','-6.6010823143033175','106.80714978546544',NULL,'','bogorangganacendekia','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(190,'PT TIRTA FRESINDO JAYA','wardani_ok@yahoo.com','Pak Surya','081973748836','081973748836',5,'Jl. Raya Kemang Parung Bogor No.698, Kemang, Kec.Kemang, Bogor, Jawa Barat 16310','-6.501346','106.757621',NULL,'20221108100914.jpeg','Mayora','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(191,'PT. Kharita Sejahtera Bersama / Padjadjaran Hotel','ksb.padjadjaran@gmail.com','Riesty Pratiwi Muhartono','085776600962','02518359000',5,'Jalan Pajajaran No. 17 Bantarjati, Bogor Utara, Kota Bogor','-6.576329192780962','106.80705169083286',NULL,'20221128134450.jpg','padjadjaranhotel','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(192,'m34n5t49718','m34n5t4@gmail.com','dfg','3456346354','m34n5t49718',5,'m34n5t49718','6','5',NULL,'','m34n5t49718','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(196,'PT MIRAH SEGAR / THE MIRAH HOTEL','hrd@mirahhotelbogor.com','Indah Puspitasari','085797410120','0251 8348040',5,'JL PANGRANGO NO 9 A BOGOR','-6.5905300541508','106.80376084831.',NULL,'20230110185729.jpeg','HRD@MIRAHHOTELBOGOR.COM','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(197,'PT Bank Central Asia Tbk','Gigihekapratama0190@gmail.com','Gigih Eka Pratama','082216114416','021-23588000',5,'Jl.Ir. H. Juanda No.28 Kota Bogor','-6.59988312096','106.794284682',NULL,'20230111225727.jpg','csrbca','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(198,'Royal Hotel Bogor','hrd@hotelroyalbogor.com','Vada Laras Sabrina','0838 7552 984','02518347123',5,'Jl.Ir.H.Juanda No. 16 Paledang, Bogor','106.7950672','6.6027580',NULL,'20230113123229.jpg','hrd@hotelroyalbogor.com','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(199,'Mall BTM Bogor','perijinan@mallbtm.com','Herdy Septian','081291996321','02518401000',5,'Jl. Ir. H. Djuanda No.68','','',NULL,'20230120134659.jpg','Mall BTM','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(201,'Pt Induk sejahra','kurawasix69@gmail.com','ewererwer','0899873847387','08993737973',5,'dsffsdfsd','56456.6456456','34545345.45345345',NULL,'20230309115600.jpg','ashuragns','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(202,'JAYA ABADI','badm99201@gmail.com','Ahmad','089659412234','089659412234',5,'Perum panorama indah','-0.476679','100.578999',NULL,'','ahmad123','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(205,'bimhy','bimhy@drowblock.com','dsa','089766554433','089755664422',5,'bum','324','32423',NULL,'20230403234447.jpg','bimhy','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(206,'janda','pozicqejz@bugfoo.com','435554354','354354543','453435354',5,'dsferwf','-6.888701','109.668289',NULL,'','janda','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(208,'siganns1337','viraaudri13@gmail.com','adawdwad','234324324','324324324324',5,'siganns1337','siganns1337','siganns1337',NULL,'20230511011435.jpg','siganns1337','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(210,'Swiss-Belhotel Bogor','hrmsbbo@swiss-belhotel.com','Puput Intan','087770006979','02517565111',5,'Jl. Salak No.38-40, RT.03/RW.04, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128','-6.588394','106.804251',NULL,'20230608112831.jpeg','SBBO','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(211,'wagyu','rifalas587@niback.com','dssdsda','086856746456','0877685555457',5,'jln tempik','-19.01226720244332','22.216642436704337',NULL,'20230717140014.png','wagyu','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(212,'Skksks','fayjfgoxjowfgxo@exelica.com','Sjsjjs','081244551166','081244551166',5,'Sksjs','Sjsjjs','Sjsjjs',NULL,'20230730202042.jpg','K4PUYU4K','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(214,'Swiss-Belhotel Bogor','hrmsbbo@swiss-belhotel.com','Puput Intan','087770006979','(0251) 7565111',5,'Jl. Salak No.38-40, RT.03/RW.04, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128','-6.5859460161850265','106.7974226354788',NULL,'20230905162750.jpeg','sbbo','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC',NULL,'cp','0',NULL,NULL,'1999-01-01'),(215,'sfafsaf','csdewa25@gmail.com','asfasfsf','5151261214161','515126121416141',5,'asfasfasf','asfsaf','asfsafsfsf',NULL,'','wantek','$2y$10$LnaJxU98lOZ9CHctTa4jZOEGnaJA8nuCXd0sWNX8V3O9u8Rmen9Rm','cb740e9f114d7159b1b8cf98889f88a32c75e9cd','cp','1',NULL,'2023-11-24 00:48:50','2024-11-24'),(230,'haudy dev','csdewa25@gmail.com','haudy','082125246091','082125246091',2,'Kenanga Catering, Jalan Mayor Oking Jayaatmaja, Bogor Tengah, Bogor, West Java, Java, 16121, Indonesia','-6.5921362989815','106.79002761841',NULL,'member-652bb338ec7b7231015043904.jpg','haudy_dev-2','$2y$10$BixhqmfoS/OK.a7StCO3tezVxNMXi3PDZ8u2udan5xrYzZux8xEYm','0','cp','1','2023-10-15 09:39:05','2023-11-23 10:10:36','2024-11-21'),(233,'haudy','csdewa26@gmail.com','haudy al','082125246091','082125246091',2,'Jalan Lawang Saketeng, Bogor Tengah, Bogor, West Java, Java, 16131, Indonesia','-6.6049256171486','106.79775238037',NULL,'member-654adc6a2ff96231108075506.png','haudy','$2y$10$oql9OKb0O2N4x.DK7jMCruTxqEtXqYS9IrEBqyC.JYc02GcI8tMzC','0','cp','0','2023-11-08 00:55:06','2023-11-16 00:49:45','1999-01-01');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_09_30_054452_create_admin_table',1),(6,'2023_10_02_081728_create_login_log_table',2),(7,'2023_10_11_132938_create_berita_table',3),(10,'2023_10_11_155352_create_galeri_foto_table',4),(11,'2023_10_11_164310_create_galeri_video_table',4),(13,'2023_10_12_121407_create_kecamatan_table',5),(14,'2023_10_12_125909_create_kelurahan_table',6),(15,'2023_10_12_144213_create_kategori_member_table',7),(25,'2023_10_12_222147_create_bidang_table',8),(29,'2023_10_12_155549_create_member_table',12),(30,'2023_10_16_001729_create_faq_table',13),(31,'2023_10_19_080006_create_counter_view_table',14),(43,'2023_10_25_122802_create_activities_table',15),(48,'2023_10_12_224712_create_usulan_kegiatan_table',16),(49,'2023_10_13_000906_create_transaksi_usulan_table',16),(50,'2023_10_13_021416_create_laporan_table',16),(51,'2023_10_23_180946_create_dokumen_table',16),(55,'2023_11_20_165122_create_log_activities_table',17),(56,'2023_11_23_103843_create_jobs_table',18);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi_usulan`
--

DROP TABLE IF EXISTS `transaksi_usulan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaksi_usulan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_usulan_kegiatan` bigint unsigned NOT NULL,
  `id_member` bigint unsigned NOT NULL,
  `status` enum('proses','diterima','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'proses',
  `target_sasaran` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi_usulan`
--

LOCK TABLES `transaksi_usulan` WRITE;
/*!40000 ALTER TABLE `transaksi_usulan` DISABLE KEYS */;
INSERT INTO `transaksi_usulan` VALUES (23,5,215,'diterima',10,'2023-11-22 13:09:07','2023-11-24 01:03:33');
/*!40000 ALTER TABLE `transaksi_usulan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usulan_kegiatan`
--

DROP TABLE IF EXISTS `usulan_kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usulan_kegiatan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_bidang` bigint unsigned NOT NULL,
  `id_member` bigint unsigned NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bentuk_kegiatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_kegiatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelurahan` bigint unsigned NOT NULL,
  `penerima_manfaat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_manfaat` enum('rupiah','buah','paket','kg','g','t') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'rupiah',
  `waktu_pelaksanaan` date NOT NULL,
  `proposal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_penerima_manfaat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usulan_kegiatan`
--

LOCK TABLES `usulan_kegiatan` WRITE;
/*!40000 ALTER TABLE `usulan_kegiatan` DISABLE KEYS */;
INSERT INTO `usulan_kegiatan` VALUES (5,5,1,'test','<p>test</p>','test',3271040008,'test','t','2023-11-29','usulan-kegiatan-655d4f04e21a0231122074452.pdf','20','2023-11-22 00:44:52','2023-11-22 00:44:52');
/*!40000 ALTER TABLE `usulan_kegiatan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-24  9:38:32
