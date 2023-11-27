-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 27 nov. 2023 à 09:51
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `brief1_sql`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateCategorie` (`c_name` VARCHAR(50))   BEGIN
    INSERT INTO categorie (name_categorie)
    VALUES (c_name);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateProject` (`p_name` VARCHAR(50), `p_description` VARCHAR(255), `p_date_debut` DATE, `p_date_fin` DATE)   BEGIN
    INSERT INTO project(nom_project,description_project,startDate,endDate)
    VALUES(p_name,p_description,p_date_debut,p_date_fin);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateRessources` (`ressource_cat_id` INT, `ressource_sub_cat_id` INT, `ressource_squad_id` INT, `ressource_project_id` INT, `ressource_name` VARCHAR(255))   BEGIN
    INSERT INTO ressources(categorie_id,sub_categorie_id,squad_id,projet_id,name_ressource)
    VALUES(ressource_cat_id,ressource_sub_cat_id,ressource_squad_id,ressource_project_id,ressource_name);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateSquad` (`s_name` VARCHAR(50), `s_projet_id` INT)   BEGIN
   INSERT INTO squad(name_squad,projet_id)
   VALUES(s_name,s_projet_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `createSubCategory` (`sub_cat_name` VARCHAR(50), `sub_cat_id` INT)   BEGIN
    INSERT INTO subCategory(name_sub_categorie,categorie_id)
    VALUES(sub_cat_name,sub_cat_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateUser` (`p_nom` VARCHAR(50), `p_email` VARCHAR(100), `p_squad_id` INT, `p_role_user` VARCHAR(100))   BEGIN
    INSERT INTO Utilisateur (nom, email,squad_id,role_utilisateur)
    VALUES (p_nom, p_email,p_squad_id,p_role_user);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectProject` (IN `p_squad_name` VARCHAR(255))   BEGIN
    SELECT project.*
    FROM project
    JOIN squad ON project.projet_id = squad.projet_id
    WHERE squad.name_squad = p_squad_name;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateProject` (IN `update_project_id` INT, IN `update_project_nom` VARCHAR(255), IN `update_project_description` VARCHAR(255), IN `update_project_startDate` DATE, IN `update_project_endDate` DATE)   BEGIN 
   UPDATE project SET nom_project= update_project_nom, description_project= update_project_description, startDate= update_project_startDate,endDate= update_project_endDate
WHERE projet_id=update_project_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateRessources` (IN `update_Ressource_id` INT, IN `update_Ressource_categorie_id` INT, IN `update_Ressource_sub_categorie_id` INT, IN `update_Ressource_squad_id` INT, IN `update_Ressource_projet_id` INT, IN `update_Ressource_name_ressource` VARCHAR(255))   BEGIN 
   UPDATE ressources SET categorie_id= update_Ressource_categorie_id, sub_categorie_id= update_Ressource_sub_categorie_id, squad_id= update_Ressource_squad_id, projet_id= update_Ressource_projet_id, name_ressource=update_Ressource_name_ressource
   WHERE ressource_id= update_Ressource_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateSquad` (IN `update_squad_id` INT, IN `update_squad_nom` VARCHAR(255), IN `update_squad_project` VARCHAR(255))   BEGIN 
    UPDATE squad SET name_squad = update_squad_nom, projet_id = update_squad_project
    WHERE squad_id = update_squad_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUser` (IN `update_user_id` INT, IN `update_user_nom` VARCHAR(255), IN `update_user_email` VARCHAR(255), IN `update_user_sqaud_id` INT, IN `update_user_role` VARCHAR(255))   BEGIN 
    UPDATE Utilisateur SET nom = update_user_nom, email = update_user_email, squad_id=update_user_sqaud_id, role_utilisateur =update_user_role
    WHERE user_id = update_user_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `categorie_id` int(11) NOT NULL,
  `name_categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`categorie_id`, `name_categorie`) VALUES
(2, 'sport baskett'),
(3, 'nourriture'),
(11, 'dev'),
(13, 'web');

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `projet_id` int(11) NOT NULL,
  `nom_project` varchar(50) NOT NULL,
  `description_project` varchar(255) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `project`
--

INSERT INTO `project` (`projet_id`, `nom_project`, `description_project`, `startDate`, `endDate`) VALUES
(1, 'MyRessources', 'realiser le projet', '2023-02-12', '2023-11-15'),
(2, 'ScrumBoard', 'realiser mon projet', '2023-02-12', '2023-11-17'),
(3, 'Amazon', 'realiser interface utilisateur', '2023-06-12', '2023-06-18');

-- --------------------------------------------------------

--
-- Structure de la table `ressources`
--

CREATE TABLE `ressources` (
  `ressource_id` int(11) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `sub_categorie_id` int(11) DEFAULT NULL,
  `squad_id` int(11) DEFAULT NULL,
  `projet_id` int(11) DEFAULT NULL,
  `name_ressource` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ressources`
--

INSERT INTO `ressources` (`ressource_id`, `categorie_id`, `sub_categorie_id`, `squad_id`, `projet_id`, `name_ressource`) VALUES
(3, 2, 2, 1, 1, 'udemy'),
(5, 2, 2, NULL, NULL, 'hello'),
(8, 11, 34, NULL, NULL, 'sololearn');

-- --------------------------------------------------------

--
-- Structure de la table `squad`
--

CREATE TABLE `squad` (
  `squad_id` int(11) NOT NULL,
  `name_squad` varchar(50) NOT NULL,
  `projet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `squad`
--

INSERT INTO `squad` (`squad_id`, `name_squad`, `projet_id`) VALUES
(1, 'dev', 1),
(2, 'codezilla', 2),
(3, 'dev', 1),
(4, 'dev', 2);

-- --------------------------------------------------------

--
-- Structure de la table `subcategory`
--

CREATE TABLE `subcategory` (
  `sub_categorie_id` int(11) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `name_sub_categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `subcategory`
--

INSERT INTO `subcategory` (`sub_categorie_id`, `categorie_id`, `name_sub_categorie`) VALUES
(2, 2, 'shoes sport '),
(34, 3, 'php mysql'),
(37, 3, 'latifa'),
(39, 11, 'youcode');

-- --------------------------------------------------------

--
-- Structure de la table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `useraccounts`
--

INSERT INTO `useraccounts` (`user_id`, `username`, `password_hash`, `email`) VALUES
(5, 'latifa', '$2y$10$Y9xQZKiRHSXznnkcR4BK2uQDU91od9cRkg9FYSDZNcTpJQ6y3ic8m', ''),
(10, 'user', '$2y$10$oJoTvKm/t5dinnf6MwmOWumw0pLKwanl4TmyLB00OZZes41eBMIxy', ''),
(16, 'admin', '$2y$10$z7fPY8LkxeXXi0Z7JFUdEe8JJE8btDYnrqLqtuU/k2Y7rPp//R/fW', 'chakirlatifa2001@gmail.com'),
(17, 'mama', '$2y$10$dCNSTltY79xl83jUvboyRuRtZP0MtBpPcRIcMy5CWL3a9btuV50Xy', 'mam@gmail.com'),
(18, 'chakir', '$2y$10$ZJAwl89UfvcvwhYDo16bHu0Osr95yBNyufoXIvfpS65GRsbza382O', 'chakir@gmail.com'),
(19, 'khadija', '$2y$10$Zaydw2DyiomD7LUHavTG3OuRyl2SKtR/KPzdvdM9n5IEuE.JFGrlS', 'chakirrrr@gmail.com'),
(20, 'assma', '$2y$10$pFguy.X73jlO6EENODV5q.GEmnDw040rGLahALKFeJaQQ2FitnDcy', 'assma@gmail.com'),
(21, 'zayna', '$2y$10$cQRdiSpYMNcksYOpFMtzr.cak85XLASEiYd6QGfUEjHD9SYb2fxnO', 'id@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `user_id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `squad_id` int(11) DEFAULT NULL,
  `role_utilisateur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`user_id`, `nom`, `email`, `squad_id`, `role_utilisateur`) VALUES
(56, 'chakir  baba omar ', 'omarchakir1976@gmail.com', NULL, NULL),
(70, 'assma', 'assma@gmail.com', 2, 'membre'),
(71, 'meryam', 'meryam@gmail.com', 2, 'membre'),
(72, 'ezzahra', 'ezzahra@gmail.com', 2, 'membre'),
(73, 'kawtar', 'kawtar2001@gmail.com', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projet_id`);

--
-- Index pour la table `ressources`
--
ALTER TABLE `ressources`
  ADD PRIMARY KEY (`ressource_id`),
  ADD KEY `ressources_ibfk_1` (`categorie_id`),
  ADD KEY `ressources_ibfk_2` (`sub_categorie_id`),
  ADD KEY `ressources_ibfk_3` (`squad_id`),
  ADD KEY `ressources_ibfk_4` (`projet_id`);

--
-- Index pour la table `squad`
--
ALTER TABLE `squad`
  ADD PRIMARY KEY (`squad_id`),
  ADD KEY `projet_id` (`projet_id`);

--
-- Index pour la table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`sub_categorie_id`),
  ADD KEY `subcategory_ibfk_1` (`categorie_id`);

--
-- Index pour la table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `utilisateur_ibfk_1` (`squad_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `categorie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `projet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ressources`
--
ALTER TABLE `ressources`
  MODIFY `ressource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `squad`
--
ALTER TABLE `squad`
  MODIFY `squad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `sub_categorie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ressources`
--
ALTER TABLE `ressources`
  ADD CONSTRAINT `ressources_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`categorie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ressources_ibfk_2` FOREIGN KEY (`sub_categorie_id`) REFERENCES `subcategory` (`sub_categorie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ressources_ibfk_3` FOREIGN KEY (`squad_id`) REFERENCES `squad` (`squad_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ressources_ibfk_4` FOREIGN KEY (`projet_id`) REFERENCES `project` (`projet_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `squad`
--
ALTER TABLE `squad`
  ADD CONSTRAINT `squad_ibfk_1` FOREIGN KEY (`projet_id`) REFERENCES `project` (`projet_id`);

--
-- Contraintes pour la table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`categorie_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`squad_id`) REFERENCES `squad` (`squad_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
