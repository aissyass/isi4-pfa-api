-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 29 mai 2020 à 14:20
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pfa_api`
--

-- --------------------------------------------------------

--
-- Structure de la table `classwork`
--

CREATE TABLE `classwork` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `classwork_type`
--

CREATE TABLE `classwork_type` (
  `id` int(11) NOT NULL,
  `classwork_id` int(11) DEFAULT NULL,
  `libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200427155508', '2020-04-27 15:59:37');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `classwork_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `room_user`
--

CREATE TABLE `room_user` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `room_user_room`
--

CREATE TABLE `room_user_room` (
  `room_user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `room_user_user`
--

CREATE TABLE `room_user_user` (
  `room_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `uploaded_file`
--

CREATE TABLE `uploaded_file` (
  `id` int(11) NOT NULL,
  `post_id_id` int(11) DEFAULT NULL,
  `classwork_id_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `classwork_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classwork`
--
ALTER TABLE `classwork`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classwork_type`
--
ALTER TABLE `classwork_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EF1368218D5BF6E0` (`classwork_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_729F519B8D5BF6E0` (`classwork_id`),
  ADD KEY `IDX_729F519B4B89032C` (`post_id`);

--
-- Index pour la table `room_user`
--
ALTER TABLE `room_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `room_user_room`
--
ALTER TABLE `room_user_room`
  ADD PRIMARY KEY (`room_user_id`,`room_id`),
  ADD KEY `IDX_94B7FD3B4B4C6F75` (`room_user_id`),
  ADD KEY `IDX_94B7FD3B54177093` (`room_id`);

--
-- Index pour la table `room_user_user`
--
ALTER TABLE `room_user_user`
  ADD PRIMARY KEY (`room_user_id`,`user_id`),
  ADD KEY `IDX_6BBB7AE94B4C6F75` (`room_user_id`),
  ADD KEY `IDX_6BBB7AE9A76ED395` (`user_id`);

--
-- Index pour la table `uploaded_file`
--
ALTER TABLE `uploaded_file`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B40DF75DE85F12B8` (`post_id_id`),
  ADD UNIQUE KEY `UNIQ_B40DF75D71FCDB5A` (`classwork_id_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8D93D64954177093` (`room_id`),
  ADD KEY `IDX_8D93D6498D5BF6E0` (`classwork_id`),
  ADD KEY `IDX_8D93D6494B89032C` (`post_id`);

--
-- Index pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2DE8C6A3A76ED395` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classwork`
--
ALTER TABLE `classwork`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `classwork_type`
--
ALTER TABLE `classwork_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `room_user`
--
ALTER TABLE `room_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uploaded_file`
--
ALTER TABLE `uploaded_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `classwork_type`
--
ALTER TABLE `classwork_type`
  ADD CONSTRAINT `FK_EF1368218D5BF6E0` FOREIGN KEY (`classwork_id`) REFERENCES `classwork` (`id`);

--
-- Contraintes pour la table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `FK_729F519B4B89032C` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `FK_729F519B8D5BF6E0` FOREIGN KEY (`classwork_id`) REFERENCES `classwork` (`id`);

--
-- Contraintes pour la table `room_user_room`
--
ALTER TABLE `room_user_room`
  ADD CONSTRAINT `FK_94B7FD3B4B4C6F75` FOREIGN KEY (`room_user_id`) REFERENCES `room_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_94B7FD3B54177093` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `room_user_user`
--
ALTER TABLE `room_user_user`
  ADD CONSTRAINT `FK_6BBB7AE94B4C6F75` FOREIGN KEY (`room_user_id`) REFERENCES `room_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6BBB7AE9A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `uploaded_file`
--
ALTER TABLE `uploaded_file`
  ADD CONSTRAINT `FK_B40DF75D71FCDB5A` FOREIGN KEY (`classwork_id_id`) REFERENCES `classwork` (`id`),
  ADD CONSTRAINT `FK_B40DF75DE85F12B8` FOREIGN KEY (`post_id_id`) REFERENCES `post` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6494B89032C` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `FK_8D93D64954177093` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`),
  ADD CONSTRAINT `FK_8D93D6498D5BF6E0` FOREIGN KEY (`classwork_id`) REFERENCES `classwork` (`id`);

--
-- Contraintes pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `FK_2DE8C6A3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
