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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Listage des données de la table the_district.categorie : ~8 rows (environ)
DELETE FROM `categorie`;
INSERT INTO `categorie` (`id_categorie`, `libelle`, `image`, `active`) VALUES
	(4, 'Pizza', 'pizza_cat.jpg', 'Yes'),
	(5, 'Burger', 'burger_cat.jpg', 'Yes'),
	(9, 'Wraps', 'wrap_cat.jpg', 'Yes'),
	(10, 'Pasta', 'pasta_cat.jpg', 'Yes'),
	(11, 'Sandwich', 'sandwich_cat.jpg', 'Yes'),
	(12, 'Asian Food', 'asian_food_cat.jpg', 'No'),
	(13, 'Salade', 'salade_cat.jpg', 'YES'),
	(14, 'Veggie', 'veggie_cat.jpg', 'Yes');

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

-- Listage des données de la table the_district.commande : ~8 rows (environ)
DELETE FROM `commande`;
INSERT INTO `commande` (`id_commande`, `id_plat`, `quantite`, `total`, `date_commande`, `etat`, `nom_client`, `telephone_client`, `email_client`, `adresse_client`) VALUES
	(2, 4, 4, 16.00, '2020-11-30 03:52:43', 'Livrée', 'Kelly Dillard', '7896547800', 'kelly@gmail.com', '308 Post Avenue'),
	(3, 5, 2, 20.00, '2020-11-30 04:07:17', 'Livrée', 'Thomas Gilchrist', '7410001450', 'thom@gmail.com', '1277 Sunburst Drive'),
	(4, 5, 1, 10.00, '2021-05-04 01:35:34', 'Livrée', 'Martha Woods', '78540001200', 'marthagmail.com', '478 Avenue Street'),
	(6, 9, 1, 7.00, '2021-07-20 06:10:37', 'Livrée', 'Charlie', '7458965550', 'charlie@gmail.com', '3140 Bartlett Avenue'),
	(7, 10, 2, 8.00, '2021-07-20 06:40:21', 'En cours de livraison', 'Claudia Hedley', '7451114400', 'hedley@gmail.com', '1119 Kinney Street'),
	(8, 14, 1, 6.00, '2021-07-20 06:40:57', 'En préparation', 'Vernon Vargas', '7414744440', 'venno@gmail.com', '1234 Hazelwood Avenue'),
	(9, 9, 4, 20.00, '2021-07-20 07:06:06', 'Annulée', 'Carlos Grayson', '7401456980', 'carlos@gmail.com', '2969 Hartland Avenue'),
	(10, 16, 4, 12.00, '2021-07-20 07:11:06', 'Livrée', 'Jonathan Caudill', '7410256996', 'jonathan@gmail.com', '1959 Limer Street');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Listage des données de la table the_district.plat : ~10 rows (environ)
DELETE FROM `plat`;
INSERT INTO `plat` (`id_plat`, `libelle`, `description`, `prix`, `image`, `id_categorie`, `active`) VALUES
	(4, 'District Burger', 'Burger composé d\'un bun\'s du boulanger, deux steaks de 80g (origine française), de deux tranches poitrine de porc fumée, de deux tranches cheddar affiné, salade et oignons confits. .', 8.00, 'hamburger.jpg', 5, 'Yes'),
	(5, 'Pizza Bianca', 'Une pizza fine et croustillante garnie de crème mascarpone légèrement citronnée et de tranches de saumon fumé, le tout relevé de baies roses et de basilic frais.', 14.00, 'pizza-salmon.png', 4, 'Yes'),
	(9, 'Buffalo Chicken Wrap', 'Du bon filet de poulet mariné dans notre spécialité sucrée & épicée, enveloppé dans une tortilla blanche douce faite maison.', 5.00, 'buffalo-chicken.jpg', 9, 'Yes'),
	(10, 'Cheeseburger', 'Burger composé d’un bun’s du boulanger, de salade, oignons rouges, pickles, oignon confit, tomate, d’un steak d’origine Française, d’une tranche de cheddar affiné, et de notre sauce maison.', 8.00, 'cheesburger.jpg', 5, 'Yes'),
	(12, 'Spaghetti aux légumes', 'Un plat de spaghetti au pesto de basilic et légumes poêlés, très parfumé et rapide', 10.00, 'spaghetti-legumes.jpg', 10, 'Yes'),
	(13, 'Salade César', 'Une délicieuse salade Caesar (César) composée de filets de poulet grillés, de feuilles croquantes de salade romaine, de croutons à l\'ail, de tomates cerise et surtout de sa fameuse sauce Caesar. Le tout agrémenté de copeaux de parmesan.', 7.00, 'cesar_salad.jpg', 13, 'Yes'),
	(14, 'Pizza Margherita', 'Une authentique pizza margarita, un classique de la cuisine italienne! Une pâte faite maison, une sauce tomate fraîche, de la mozzarella Fior di latte, du basilic, origan, ail, sucre, sel & poivre...', 14.00, 'pizza-margherita.jpg', 4, 'Yes'),
	(15, 'Courgettes farcies au quinoa', 'Voici une recette équilibrée à base de courgettes, quinoa et champignons, 100% vegan et sans gluten!', 8.00, 'courgettes_farcies.jpg', 14, 'Yes'),
	(16, 'Lasagnes', 'Découvrez notre recette des lasagnes, l\'une des spécialités italiennes que tout le monde aime avec sa viande hachée et gratinée à l\'emmental. Et bien sûr, une inoubliable béchamel à la noix de muscade.', 12.00, 'lasagnes_viande.jpg', 10, 'Yes'),
	(17, 'Tagliatelles au saumon', 'Découvrez notre recette délicieuse de tagliatelles au saumon frais et à la crème qui qui vous assure un véritable régal!', 12.00, 'tagliatelles-saumon.jpg', 10, 'Yes');

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
