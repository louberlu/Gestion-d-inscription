-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 23 mai 2024 à 15:05
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pjinscription`
--

-- --------------------------------------------------------

--
-- Structure de la table `bulletins`
--

CREATE TABLE `bulletins` (
  `id_bulletin` int(11) NOT NULL,
  `lien` varchar(100) NOT NULL,
  `id_candidature` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `candidatures`
--

CREATE TABLE `candidatures` (
  `id_candidature` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `tel` int(9) NOT NULL,
  `adresse` varchar(55) NOT NULL,
  `email` varchar(55) DEFAULT NULL,
  `date_naissance` date NOT NULL,
  `date_candidature` date NOT NULL,
  `status` varchar(11) DEFAULT NULL,
  `id_cursus` int(11) NOT NULL,
  `nationalite` varchar(30) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `lieu_naissance` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cursus`
--

CREATE TABLE `cursus` (
  `id_cursus` int(11) NOT NULL,
  `nom_cursus` varchar(30) NOT NULL,
  `description_cursus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `cursus`
--

INSERT INTO `cursus` (`id_cursus`, `nom_cursus`, `description_cursus`) VALUES
(1, 'APLP', 'Les deux première années sont le cursus analyste programmeur avec à la clé un diplôme de DUT en Informatique.\r\nEnsuite la troisième année est la licence professionnel.'),
(2, 'ING', 'Il s\'agit du cycle ingénieur qui se fait en trois année. A la fin de ce cursus, l\'étudiant obtient un diplôme d\'ingénieur en conception informatique.');

-- --------------------------------------------------------

--
-- Structure de la table `diplomes`
--

CREATE TABLE `diplomes` (
  `id_diplome` int(11) NOT NULL,
  `nom_diplome` varchar(30) NOT NULL,
  `description_diplome` text NOT NULL,
  `id_candidature` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id_inscription` int(11) NOT NULL,
  `id_candidature` int(11) NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bulletins`
--
ALTER TABLE `bulletins`
  ADD PRIMARY KEY (`id_bulletin`),
  ADD KEY `fk_candidatureBulletin` (`id_candidature`);

--
-- Index pour la table `candidatures`
--
ALTER TABLE `candidatures`
  ADD PRIMARY KEY (`id_candidature`),
  ADD KEY `fk_cursusInscription` (`id_cursus`);

--
-- Index pour la table `cursus`
--
ALTER TABLE `cursus`
  ADD PRIMARY KEY (`id_cursus`);

--
-- Index pour la table `diplomes`
--
ALTER TABLE `diplomes`
  ADD PRIMARY KEY (`id_diplome`),
  ADD KEY `fk_candidatureDiplome` (`id_candidature`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id_inscription`),
  ADD KEY `fk_candidatureInscription` (`id_candidature`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidatures`
--
ALTER TABLE `candidatures`
  MODIFY `id_candidature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cursus`
--
ALTER TABLE `cursus`
  MODIFY `id_cursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `diplomes`
--
ALTER TABLE `diplomes`
  MODIFY `id_diplome` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id_inscription` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bulletins`
--
ALTER TABLE `bulletins`
  ADD CONSTRAINT `fk_candidatureBulletin` FOREIGN KEY (`id_candidature`) REFERENCES `candidatures` (`id_candidature`);

--
-- Contraintes pour la table `candidatures`
--
ALTER TABLE `candidatures`
  ADD CONSTRAINT `fk_cursusInscription` FOREIGN KEY (`id_cursus`) REFERENCES `cursus` (`id_cursus`);

--
-- Contraintes pour la table `diplomes`
--
ALTER TABLE `diplomes`
  ADD CONSTRAINT `fk_candidatureDiplome` FOREIGN KEY (`id_candidature`) REFERENCES `candidatures` (`id_candidature`);

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `fk_candidatureInscription` FOREIGN KEY (`id_candidature`) REFERENCES `candidatures` (`id_candidature`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
