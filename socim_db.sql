-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 juin 2022 à 14:09
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `socim_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `email`, `password`) VALUES
(1, '	\r\nsatosho nakamoto', 'admin@esig.tg', '123456789');

-- --------------------------------------------------------

--
-- Structure de la table `appartement`
--

CREATE TABLE `appartement` (
  `id` int(11) NOT NULL,
  `num_porte` varchar(60) NOT NULL,
  `num_etage` varchar(60) NOT NULL,
  `num_appart` varchar(60) NOT NULL,
  `superficie` varchar(60) NOT NULL,
  `nombr_chambre` varchar(200) NOT NULL,
  `prix` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `nom_immeuble` varchar(200) NOT NULL,
  `adresse_immeuble` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `appartement`
--

INSERT INTO `appartement` (`id`, `num_porte`, `num_etage`, `num_appart`, `superficie`, `nombr_chambre`, `prix`, `description`, `nom_immeuble`, `adresse_immeuble`, `create_at`) VALUES
(11, '23', '6', '', '15m²', '60', '100000fcfa', '<p>ehettzjuykjyt</p>', 'togocom', 'lome', '2022-06-23 12:19:11'),
(12, '63', '6', '', '60m²', '200', '60fcfa', '<p>liuyioliolo</p>', 'togocom', 'lome', '2022-06-23 12:36:09'),
(13, '10', '9', '', '90m²', '4100', '5000FCFA', '<p>le togo est un pau</p>\r\n<p>ys de lafrique de l\'ouest</p>', 'esig', 'be-kpota', '2022-06-23 13:41:35'),
(14, '05', '56', '', '93M²', '90', '5000FCFA', '<p>NHIHFIOHFPMZHF&Iuml;EHF</p>', '2FEVRIER', 'ACCRA', '2022-06-23 13:45:41');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  `profession` varchar(200) NOT NULL,
  `num_crn` varchar(200) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `avis_clients` text NOT NULL,
  `appart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `telephone`, `profession`, `num_crn`, `adresse`, `avis_clients`, `appart_id`) VALUES
(35, 'kodjovi', 'kodjo', '93614867', 'etudiants', '58', 'lome', 'ergergerg', 13);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `appart_id` int(11) NOT NULL,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `appart_id`, `images`) VALUES
(1, 6, 'img_3.jpg'),
(2, 5, 'img_1.jpg'),
(11, 9, 'avion2.jpg'),
(12, 10, 'mercedes-amg-c63s-coupe-4k-sports-coupe-black-c63s-tuning-c-class-coupe.jpg'),
(13, 10, 'Mercedes-CLS-2018-2.jpg'),
(14, 10, 'paysage.jpg'),
(15, 10, 'paysage2.jpg'),
(16, 11, 'img_1.jpg'),
(17, 12, 'cascade.jpg'),
(18, 13, 'Mercedes-Benz_Vision.jpg'),
(19, 13, 'neige.jpg'),
(20, 13, 'pexels-pixabay-87772.jpg'),
(21, 13, 'pexels-pixabay-163358.jpg'),
(22, 14, 'carl-raw-8Gdayy2Lhi0-unsplash.jpg'),
(23, 14, '4-4 mercedes.jpg'),
(24, 14, 'banq.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `immeuble`
--

CREATE TABLE `immeuble` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `immeuble`
--

INSERT INTO `immeuble` (`id`, `nom`, `adresse`) VALUES
(1, 'gef', 'dfev'),
(2, 'dfvf', 'dfvqf'),
(3, 'qdfv', 'vfq'),
(4, 'vqfd', 'fvqf'),
(5, 'qdfv', 'vfq'),
(6, 'vqfd', 'fvqf');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `image` text NOT NULL,
  `info` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `image`, `info`) VALUES
(23, 'lil', 'kodjo', '../images/image-62b48dc62798c.jpg', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `appartement`
--
ALTER TABLE `appartement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `immeuble`
--
ALTER TABLE `immeuble`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `appartement`
--
ALTER TABLE `appartement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `immeuble`
--
ALTER TABLE `immeuble`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
