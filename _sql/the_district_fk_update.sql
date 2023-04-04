-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.6.12-MariaDB-0ubuntu0.22.04.1 - Ubuntu 22.04
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour the_district
CREATE DATABASE IF NOT EXISTS `the_district` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `the_district`;

-- Listage de la structure de table the_district. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id_categorie`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Listage des données de la table the_district.categorie : ~0 rows (environ)
DELETE FROM `categorie`;

-- Listage de la structure de table the_district. commande
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_plat` int(10) unsigned NOT NULL DEFAULT 0,
  `quantite` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date_commande` datetime NOT NULL,
  `etat` varchar(50) NOT NULL,
  `nom_client` varchar(150) NOT NULL,
  `telephone_client` varchar(20) NOT NULL,
  `email_client` varchar(150) NOT NULL,
  `adresse_client` varchar(255) NOT NULL,
  PRIMARY KEY (`id_commande`) USING BTREE,
  KEY `id_plat` (`id_plat`),
  CONSTRAINT `command_fk1` FOREIGN KEY (`id_plat`) REFERENCES `plat` (`id_plat`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Listage des données de la table the_district.commande : ~0 rows (environ)
DELETE FROM `commande`;

-- Listage de la structure de table the_district. plat
CREATE TABLE IF NOT EXISTS `plat` (
  `id_plat` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_categorie` int(10) unsigned NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id_plat`) USING BTREE,
  KEY `id_categorie` (`id_categorie`),
  CONSTRAINT `plat_fk1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Listage des données de la table the_district.plat : ~0 rows (environ)
DELETE FROM `plat`;

-- Listage de la structure de table the_district. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_utilisateur`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Listage des données de la table the_district.utilisateur : ~0 rows (environ)
DELETE FROM `utilisateur`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
