-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2023 at 12:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MyResources`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nom_categorie` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom_categorie`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'JavaScript'),
(4, 'Backend Development'),
(5, 'Database'),
(6, 'Frameworks'),
(7, 'Version Control'),
(8, 'Web Design');

-- --------------------------------------------------------

--
-- Table structure for table `projets`
--

CREATE TABLE `projets` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nom_projet` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `squad_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projet_ressources`
--

CREATE TABLE `projet_ressources` (
  `projet_id` smallint(5) UNSIGNED NOT NULL,
  `ressource_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ressources`
--

CREATE TABLE `ressources` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nom_ressource` varchar(50) NOT NULL,
  `description` varchar(80) NOT NULL,
  `souscategorie_id` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ressources`
--

INSERT INTO `ressources` (`id`, `nom_ressource`, `description`, `souscategorie_id`) VALUES
(1, 'Java Programming Guide', 'A comprehensive guide to Java programming', 3),
(2, 'HTML5 and CSS3 Basics', 'Introduction to frontend development', 2),
(4, 'Java Programming Guide', 'A comprehensive guide to Java programming', 3),
(5, 'HTML5 and CSS3 Basics', 'Introduction to frontend development', 2),
(6, 'Web Design Principles', 'Fundamental principles of UI/UX design', 24),
(7, 'Project Management Best Practices', 'Effective project management tips', 4);

-- --------------------------------------------------------

--
-- Table structure for table `souscategories`
--

CREATE TABLE `souscategories` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nom_souscategorie` varchar(30) NOT NULL,
  `categorie_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `souscategories`
--

INSERT INTO `souscategories` (`id`, `nom_souscategorie`, `categorie_id`) VALUES
(1, 'HTML Basics', 1),
(2, 'HTML5 Features', 1),
(3, 'Java', 1),
(4, 'CSS Basics', 2),
(5, 'CSS Layout', 2),
(6, 'CSS Flexbox', 2),
(7, 'CSS Grid', 2),
(8, 'JavaScript Basics', 3),
(9, 'DOM Manipulation', 3),
(10, 'AJAX', 3),
(11, 'ES6 Features', 3),
(12, 'Node.js', 4),
(13, 'Django', 4),
(14, 'Express.js', 4),
(15, 'MySQL', 5),
(16, 'MongoDB', 5),
(17, 'SQL Queries', 5),
(18, 'React.js', 6),
(19, 'Vue.js', 6),
(20, 'Angular', 6),
(21, 'Git Basics', 7),
(22, 'Branching', 7),
(23, 'Merging', 7),
(24, 'UI/UX Principles', 8),
(25, 'Responsive Design', 8),
(26, 'Wireframing', 8);

-- --------------------------------------------------------

--
-- Table structure for table `squads`
--

CREATE TABLE `squads` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nom_squad` varchar(30) NOT NULL,
  `leader_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `squads`
--

INSERT INTO `squads` (`id`, `nom_squad`, `leader_id`) VALUES
(1, 'Brogrammers', 12),
(2, 'ProDevs', 14),
(3, 'CODEZILLA', 4),
(4, 'cell13', 1),
(5, 'Alpha', 3);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nom_utilisateur` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `squad_id` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom_utilisateur`, `email`, `squad_id`) VALUES
(1, 'Abdellah Bardich', 'abdellahbardichwork@gmail.com', 4),
(2, 'Otman Kharbouch', 'otmankharbouch813@gmail.com', 2),
(3, 'Rabia Ait imghi', 'rabiaaitimghi7@gmail.com', 5),
(4, 'Anass Drissi', 'anasdrissi77@gmail.com', 3),
(5, 'Hamza EL IDRISSI', 'hamza.ezzharelidrissi1@gmail.com', 4),
(6, 'Khalid Znnouhi', 'khalidzennouhi08@gmail.com', 2),
(7, 'Abdeljabar Ait Ayoub', 'abdeljabarayoubi@gmail.com', 1),
(8, 'Mohamed Amine Baih', 'baihmohamedamine@gmail.com', 3),
(9, 'Anass Ait Ouaguerd', 'aitouageurdanass@gmail.com', 3),
(10, 'Abdeljalil El Filaly', 'elfilalyabdeljalil@gmail.com', 5),
(11, 'Aicha Ettabet', 'aicha70tabite@gmail.com', 4),
(12, 'Khalid El Mati', 'khalidgara8@gmail.com', 1),
(13, 'Latifa Chakir', 'chakirlatifa2001@gmail.com', 3),
(14, 'Nabil El Hakimi', 'nabilelhakimi2023@gmail.com', 2),
(15, 'Mohammed-Amine Benmade', 'aminebenmade1999@gmail.com', 3),
(16, 'Niama El Hrychy', 'niamaelhry@gmail.com', 2),
(17, 'Mbarek El Adraoui', 'elaadraouimbarek2023@gmail.com', 1),
(18, 'Zouhair Zerzkhane', 'zerzkhanezouhair@gmail.com', 2),
(19, 'Omaima El baz', 'elbazouma70@gmail.com', 5),
(20, 'Khalid Haiddou', 'khalid.haiddou01@gmail.com', 5),
(21, 'Soumaya Ait Lmqaddam', 'soumiatinghir119@gmail.com', 1),
(22, 'Youness Erbai', 'younesserbai@gmail.com', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `squad_id` (`squad_id`);

--
-- Indexes for table `projet_ressources`
--
ALTER TABLE `projet_ressources`
  ADD PRIMARY KEY (`projet_id`,`ressource_id`),
  ADD KEY `ressource_id` (`ressource_id`);

--
-- Indexes for table `ressources`
--
ALTER TABLE `ressources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `souscategorie_id` (`souscategorie_id`);

--
-- Indexes for table `souscategories`
--
ALTER TABLE `souscategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Indexes for table `squads`
--
ALTER TABLE `squads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leader_id` (`leader_id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `squad_id` (`squad_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ressources`
--
ALTER TABLE `ressources`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `souscategories`
--
ALTER TABLE `souscategories`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `squads`
--
ALTER TABLE `squads`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `projets_ibfk_1` FOREIGN KEY (`squad_id`) REFERENCES `squads` (`id`);

--
-- Constraints for table `projet_ressources`
--
ALTER TABLE `projet_ressources`
  ADD CONSTRAINT `projet_ressources_ibfk_1` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`),
  ADD CONSTRAINT `projet_ressources_ibfk_2` FOREIGN KEY (`ressource_id`) REFERENCES `ressources` (`id`);

--
-- Constraints for table `ressources`
--
ALTER TABLE `ressources`
  ADD CONSTRAINT `ressources_ibfk_1` FOREIGN KEY (`souscategorie_id`) REFERENCES `souscategories` (`id`);

--
-- Constraints for table `souscategories`
--
ALTER TABLE `souscategories`
  ADD CONSTRAINT `souscategories_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `squads`
--
ALTER TABLE `squads`
  ADD CONSTRAINT `squads_ibfk_1` FOREIGN KEY (`leader_id`) REFERENCES `utilisateurs` (`id`);

--
-- Constraints for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`squad_id`) REFERENCES `squads` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
