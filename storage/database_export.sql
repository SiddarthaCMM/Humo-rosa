-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: web
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `cart_products`
--

DROP TABLE IF EXISTS `cart_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_products`
--

LOCK TABLES `cart_products` WRITE;
/*!40000 ALTER TABLE `cart_products` DISABLE KEYS */;
INSERT INTO `cart_products` VALUES (1,1,1,3,249.99,'images/YzfKtvlCUbYPnrrZ9l2XMUcxQc69HX6z09dV8Mve.jpg','2025-03-31 01:55:28','2025-03-31 07:18:26'),(2,1,3,2,49.99,'images/ivnEWog8Q6m1Io2UlqpAdkvs1hlmYsv5XFzzqTRY.jpg','2025-03-31 01:55:55','2025-03-31 05:18:06'),(3,1,8,1,324.99,'images/wFFD64gDpNGrygM0XvFSHfHfiEuWQRT7LVxmgiNe.jpg','2025-03-31 01:57:34','2025-03-31 01:57:34'),(4,1,7,1,324.99,'images/QkDRQ5l15p88jFab6NFypxsWEAP1a31oOWWIiSDz.jpg','2025-03-31 01:59:41','2025-03-31 01:59:41'),(5,1,12,1,49.99,'images/Xw4qgCUAp2Ihl7GCEOuvrJ36zl2UBLxemBmftjzf.jpg','2025-03-31 21:36:14','2025-03-31 21:36:14'),(6,1,13,1,119.99,'images/nbUEr9jZdcdiGB2T0osm5VELpQyni1E5QcKv2qkc.jpg','2025-03-31 21:36:46','2025-03-31 21:36:46');
/*!40000 ALTER TABLE `cart_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`),
  CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (1,1,'2025-03-31 01:55:28','2025-03-31 01:55:28');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (7,'2014_01_12_174423_create_roles_table',1),(8,'2014_10_12_000000_create_users_table',1),(9,'2014_10_12_100000_create_password_resets_table',1),(10,'2019_08_19_000000_create_failed_jobs_table',1),(11,'2019_12_14_000001_create_personal_access_tokens_table',1),(12,'2025_03_29_202733_create_products_table',1),(13,'2025_03_30_171933_create_carts_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` text COLLATE utf8mb4_unicode_ci,
  `aroma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Contenido` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Vasos de Fresitas','Anime','Cera de soja, ácido estéarico, fragancia.','Red Berries','2 velas de 160 g cada una.\r\n1 plantilla de stickers para personalizar.','Evoca la melancolía del anime con este juego de velas de cera de soja, que combina un dulce aroma a red berries con una encantadora decoración de fresas. Ideal para compartir.',249.99,'images/YzfKtvlCUbYPnrrZ9l2XMUcxQc69HX6z09dV8Mve.jpg',0,'2025-03-30 03:26:18','2025-03-30 03:26:18'),(2,'Black Stones Cake','Anime','Parafina, cera de soja, ácido estéarico, pigmento, fragancia.','Pastel de Vainilla','1 Vela de pastel blanca aroma pastel de vainilla (300g).\r\nFiguras de cera con forma de fresas y arándanos con aroma.\r\n1 Plantilla de stickers.\r\nInstructivo.','Kit para decorar tu vela al encantador estilo de Hachi.',249.99,'images/tI5PyB7r8fQ6nMLSnmrGxYL0tZF4gVFIdRoXVjtR.jpg',0,'2025-03-30 03:31:45','2025-03-30 03:31:45'),(3,'Guardián del Bosque','Anime','Parafina, cera de soja, fragancia, pigmento.','Flor de Cerezo','1 vela de 30gr.','Presentamos la vela inspirada en el personaje más adorable de Studio Ghibli una vela decorativa con la forma del querido personaje (30g) y está infusionada con el delicioso aroma de flor de cerezo. Este producto versátil sirve tanto como pieza decorativa como ambientador, ya que libera su encantador aroma incluso sin encender, llenando la habitación con una fragancia agradable y fácilmente perceptible. Simplemente colócala en un rincón de tu hogar y deja que haga su magia.\r\n\r\n \r\n\r\nTen en cuenta que, para encender la vela, debe colocarse sobre una base resistente al calor. Añade un toque de encanto y fragancia a tu espacio con esta encantadora velita.',49.99,'images/ivnEWog8Q6m1Io2UlqpAdkvs1hlmYsv5XFzzqTRY.jpg',0,'2025-03-30 03:36:30','2025-03-30 03:36:30'),(4,'Ghibli Lover','Anime','Cera de soja, fragancia.','Té Verde','324 gr.','Nuestro diseño está inspirado en los personajes y momentos más entrañables del mundo de Studio Ghibli para que guíen siempre tu camino de luz. Fresco y agradable aroma de té verde. Vaso 100% reutilizable que puedes lavar para usar en bebidas o como decoración (Florero, lapicero, etc)',324.99,'images/eCUKE1zVcOQEpBka8D8snv4AXygZDCltJh6H7iIZ.jpg',0,'2025-03-30 03:41:50','2025-03-30 03:41:50'),(5,'Ternurines','Anime','Cera de soja, fragancia.','Pastel de Fresas y Vainilla','324 gr.','Nuestro diseño está inspirado en el lado magico y adorable de los ternurines. ¡Elige entre nuestros dos diseños! Envolvente y dulce aroma de pastel de vainilla con notas de fresas. Vaso 100% reutilizable que puedes lavar para usar en bebidas o como decoración (Florero, lapicero, etc).',324.99,'images/4YVOJGamTcDLZ759JW3Nd5Q9nAvlZ9xd0yd8iiEc.jpg',0,'2025-03-30 11:00:21','2025-03-30 11:00:21'),(6,'Blank Space Cake','Celebridades','Parafina, cera de soja, fragancia, pigmento.','Betún de Vainilla y Notas de Frutos Rojos','120 gr.','Hermosa vela estilo pastel de corazón vintage (120g) con centro de color rojo que sale al derretirse. Aroma betún de vainilla (Cera blanca) y notas de frutos rojos (cera roja). Este producto versátil sirve tanto como pieza decorativa como ambientador, ya que libera su encantador aroma incluso sin encender, llenando la habitación con una fragancia agradable y fácilmente perceptible. Simplemente colócala en un rincón de tu hogar y deja que haga su magia.\r\n\r\n \r\n\r\nTen en cuenta que, para encender la vela, debe colocarse sobre una base resistente al calor.',169.99,'images/baYL1k6x2IJ9UleG94CfMRdxxaXgtBV2jNb08QCg.jpg',0,'2025-03-30 11:28:10','2025-03-30 11:28:10'),(7,'The Eras Tour','Celebridades','Cera de soja, fragancia.','Floral','324 gr.','Vibrante diseño para llevar a otro nivel \"The eras tour\". Aroma floral y amaderado para inspirarte hasta lo más profundo. Vaso 100% reutilizable que puedes lavar para usar en bebidas o como decoración (Florero, lapicero, etc)',324.99,'images/QkDRQ5l15p88jFab6NFypxsWEAP1a31oOWWIiSDz.jpg',0,'2025-03-30 11:31:35','2025-03-30 11:31:35'),(8,'Cherries and Wine','Celebridades','Cera de soja, ácido estéarico, fragancia.','Frutos Rojos','324.gr','Nuestro diseño está inspirado en la mística personalidad de Lana del Rey. Vaso 100% reutilizable.',324.99,'images/wFFD64gDpNGrygM0XvFSHfHfiEuWQRT7LVxmgiNe.jpg',0,'2025-03-30 11:33:54','2025-03-30 11:33:54'),(9,'Iced Coffee','Aromáticas','Parafina, cera de soja, acido esteárico, fragancia, pigmento.','Café con Leche','200 gr.','Vela (200g aprox) con refrescante diseño y aroma de vela de café con leche.',199.99,'images/II0eRCDrm5Fyyq1AewZE2eFmcNgczAZltUo4u4SF.jpg',0,'2025-03-30 11:37:59','2025-03-30 11:37:59'),(10,'Red Berries Love Latte','Aromáticas','Parafina, cera de soja, acido esteárico, fragancia, pigmento.','Frutos Rojos y Vainilla','200 gr.','Vela (200g aprox) con romantico diseño de bebida latte aroma frutos rojos y vainilla.',199.99,'images/qZMV8nkaUWOJK4vegZ7Ew3dEnyJzqn5CbuGPzWzm.jpg',0,'2025-03-30 11:41:53','2025-03-30 11:41:53'),(11,'Pastel Vintage','Aromáticas','Parafina, cera de soja, fragancia, pigmento.','Betún de Vainilla y Pastel de Fresas','200 gr.','Hermosa vela estilo pastel vintage decorado (200g). Dulce aroma a betún de vainilla. Pastel blanco con fresas.\r\n\r\nEste producto versátil sirve tanto como pieza decorativa como ambientador, ya que libera su encantador aroma incluso sin encender, llenando la habitación con una fragancia agradable y fácilmente perceptible. Simplemente colócala en un rincón de tu hogar y deja que haga su magia.\r\n\r\n \r\n\r\nTen en cuenta que, para encender la vela, debe colocarse sobre una base resistente al calor. Añade un toque de encanto y fragancia a tu espacio con la encantadora Pastel Vintage.',169.99,'images/VY0PVdm99lf25QQ6lKLaeYyIaqNfE4FyosgftbiX.jpg',0,'2025-03-30 11:44:23','2025-03-30 11:44:23'),(12,'Margatira','Aromáticas','Parafina, cera de soja, fragancia, pigmento.','Floral a Jazmines','20 gr.','Hermosa vela en forma de margarita (20 g) con un dulce aroma floral a jazmines. Encuentrála en diferentes colores.',49.99,'images/Xw4qgCUAp2Ihl7GCEOuvrJ36zl2UBLxemBmftjzf.jpg',0,'2025-03-30 11:47:50','2025-03-30 11:47:50'),(13,'Agua de Rosas','Cosmética Natural','Agua destilada de rosas, conservador a base de cítricos.','Herbal','125 ml','Descubre la pureza y frescura de nuestro hidrolato de rosas, un agua floral 100% natural diseñada para cuidar y revitalizar tu piel. Este producto ofrece múltiples beneficios, ayuda a:\r\n\r\n \r\n\r\nHumectar: Proporciona una hidratación profunda y duradera.\r\nRefrescar: Brinda una sensación de frescura instantánea.\r\nSuavizar: Deja la piel suave y tersa al tacto.\r\nTonificar: Ayuda a tonificar y fortalecer la piel.\r\nEquilibrar el pH: Mantiene el equilibrio natural del pH de tu piel.\r\n \r\n\r\nNuestro hidrolato no contiene fragancias añadidas, pero cuenta con un intenso aroma herbal resultante del proceso de destilado. Este aroma se disipa rápidamente al aplicar el producto sobre la piel, dejando solo sus beneficios.\r\n\r\n \r\n\r\nModo de uso:\r\n\r\nRostro: Ideal para aplicar antes del suero hidratante para potenciar su efecto y mantener la humectación por más tiempo.\r\nCualquier momento del día: Úsalo en cualquier momento para refrescar y revitalizar tu piel.',119.99,'images/nbUEr9jZdcdiGB2T0osm5VELpQyni1E5QcKv2qkc.jpg',0,'2025-03-30 11:53:19','2025-03-30 11:53:19'),(14,'Bálsamo Labial','Cosmética Natural','Theobroma Cacao Seed Butter (Manteca de Cacao), Prunus Amygdalus Dulcis Oil (Aceite de Almendras Dulces), Tocopherol (Vitamina E), Cera Alba (Cera de Abeja), Theobroma Cacao Powder (Cacao en Polvo), Iron Oxide (Óxido Rojo), y un Preservative (Conservante) a base de extracto de cítricos.','Cocoa','6 gr.','Bálsamo labial hidratante con cera de abeja y enriquecido con vitamina E.\r\n\r\n \r\n\r\nCocoa cherry\r\n\r\nAporta un toque de color tan intenso como quieras y repara tus labios con el poder de la cocoa natural.\r\n\r\n \r\n\r\nWild Mint\r\n\r\nAporta un acabado y brillo natural e hidrata a profundidad con las propiedades del aceite esencial de menta.',55.00,'images/lR09HMoTMK12kHpLDlTVFEv0UlhlgMsG8fCP98Su.jpg',0,'2025-03-30 11:55:07','2025-03-30 11:55:07'),(15,'Glow Girl Essentials','Cosmética Natural','Agua destilada de rosas, conservador a base de cítricos, jabón de glicerina, aceite de coco, fragancia, aceite esencial de menta, carbón activado en polvo y vitamina E.','Menta, Coco y Agua de Rosas','125 ml y 50 gr.','Glow Girl Essentials\r\n\r\nEleva tu rutina de cuidado personal con nuestro kit Glow Girl Essentials. Este conjunto encantador está diseñado especialmente para ti, fusionando la frescura del agua de rosas con dos jabones irresistibles, perfectos para mantener tu piel radiante y equilibrada, ideal para piel grasa.\r\n\r\nEste kit incluye:\r\n\r\nJabón de Carbón Activado: Enriquecido con menta y vitamina E, purifica y revitaliza tu piel, dejándola fresca y luminosa.\r\nJabón de Aceite de Coco: Con un delicioso aroma a frutos rojos, nutre tu piel mientras te envuelve en una fragancia suave y dulce.\r\nAgua de Rosas: 125 ml de pureza natural para refrescar y tonificar tu piel, aportando un brillo radiante.\r\n¡Descubre el ritual de belleza que tu piel merece con Glow Girl Essentials!',249.99,'images/sYHOuzMxp9N5wlMTCpJY9zFiXoxd3P0n00oDJ6tx.jpg',0,'2025-03-30 11:56:50','2025-03-30 11:56:50');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`),
  UNIQUE KEY `roles_key_name_unique` (`key_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Cliente','adminpwn',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
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
  `role_id` bigint unsigned NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'SiddarthaMM','c.meza.isw@unipolidgo.edu.mx',NULL,'$2y$10$zotxtB81DwJaCdcVl1hJJe4L/Sfd8Au4CP9k4gHxaL7/8BsU5hHCy',1,NULL,'2025-03-31 01:00:51','2025-03-31 01:00:51');
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

-- Dump completed on 2025-03-31 11:22:17
