-- Ecrire des requêtes d'interrogation de la base de données

-- Vous devez écrire les requêtes suivantes:

--     Afficher la liste des commandes ( la liste doit faire apparaitre la date, les informations du client, le plat et le prix )

SELECT date_commande, nom_client, telephone_client, email_client, adresse_client, id_plat, total FROM commande

--     Afficher la liste des plats en spécifiant la catégorie

SELECT plat.libelle, categorie.libelle, plat.image, prix FROM plat JOIN categorie ON plat.id_categorie = categorie.id_categorie

--     Afficher les catégories et le nombre de plats actifs dans chaque catégorie

SELECT categorie.libelle, COUNT(*) AS nbr_plat FROM plat JOIN categorie ON plat.id_categorie = categorie.id_categorie GROUP BY plat.id_categorie

--     Liste des plats les plus vendus par ordre décroissant

SELECT COUNT(*) AS nbr_vente, plat.libelle FROM commande JOIN plat ON plat.id_plat = commande.id_plat GROUP BY plat.libelle ORDER BY nbr_vente DESC

--     Le plat le plus rémunérateur

SELECT plat.libelle, (COUNT(*)*plat.prix) AS total_p FROM commande JOIN plat ON plat.id_plat = commande.id_plat GROUP BY plat.libelle ORDER BY total_p DESC

--     liste des clients et le chiffre d'affaire généré par client (par ordre décroissant)

SELECT nom_client, email_client, total FROM commande WHERE etat = "Livrée" GROUP BY email_client ORDER BY total DESC

-- Ecrire des requêtes de modification de la base de données

--     Ecrivez une requête permettant de supprimer les plats non actif de la base de données

DELETE FROM plat WHERE active = "No"

--     Ecrivez une requête permettant de supprimer les commandes avec le statut livré

DELETE FROM commande WHERE etat = "Livrée"

--     Ecrivez un script sql permettant d'ajouter une nouvelle catégorie et un plat dans cette nouvelle catégorie.

INSERT INTO categorie (categorie.libelle,categorie.image,categorie.active) VALUES (:lib,:img,:act)

INSERT INTO plat (plat.libelle,plat.description,plat.prix,plat.image,plat.active) WHERE plat.id_categorie = :lib

?

--     Ecrivez une requête permettant d'augmenter de 10% le prix des plats de la catégorie 'Pizza'

UPDATE plat SET prix = prix + (prix*0.10) WHERE plat.id_categorie = (SELECT id_categorie FROM categorie WHERE categorie.libelle = "Pizza")