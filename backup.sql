-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 10 mai 2021 à 07:22
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `spotevent`
--

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `conversions`
--

CREATE TABLE `conversions` (
  `id` int(11) NOT NULL,
  `id_part_un` int(11) NOT NULL,
  `id_part_deux` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fiches`
--

CREATE TABLE `fiches` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `localisation` varchar(100) NOT NULL,
  `id_prestations` int(11) NOT NULL,
  `description` text NOT NULL,
  `path_img` varchar(200) NOT NULL,
  `phone_service` varchar(12) NOT NULL,
  `phone2_service` varchar(11) DEFAULT NULL,
  `phone_whastapp` varchar(12) DEFAULT NULL,
  `lien_facebook` varchar(100) DEFAULT NULL,
  `line_instagram` int(11) DEFAULT NULL,
  `email_service` varchar(50) DEFAULT NULL,
  `montant_max_prest` int(11) NOT NULL,
  `montant_min_prest` int(11) NOT NULL,
  `statu_fiche` int(11) NOT NULL,
  `messagerie` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `favoris` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fiches`
--

INSERT INTO `fiches` (`id`, `id_user`, `name`, `localisation`, `id_prestations`, `description`, `path_img`, `phone_service`, `phone2_service`, `phone_whastapp`, `lien_facebook`, `line_instagram`, `email_service`, `montant_max_prest`, `montant_min_prest`, `statu_fiche`, `messagerie`, `position`, `favoris`, `created_at`, `updated_at`) VALUES
(1, 0, 'maria traiter', 'abidjan cocody', 3, 'In this Tutorial, I will explain you to multiple image upload in laravel 6. we will upload multiple image with validation in laravel 6. we will use laravel image validation and store to folder and database for laravel 6 multiple image upload.\r\n\r\nWe will create simple multiple image upload in laravel 6. So you basically use this code on your laravel 6 application.\r\n\r\nWe are going from starch so, we will upload multiple file and store on server then after we will store database too. so in this example we will create \"files\" table using laravel migration and write code for route, controller and view step by step.', '1620162553.164899709_115211717307313_5359831592726545244_o.jpeg', '748997945', '748997945', '00000', 'https://stackoverflow.com/questions', NULL, 'talouama@gmail.com', 1000000, 50000, 0, 0, 0, NULL, '2021-05-09 12:31:36', '2021-05-05 22:03:13'),
(2, 13, 'AKOFOUR SONO', 'abidjan', 3, 'In this Tutorial, I will explain you to multiple image upload in laravel 6. we will upload multiple image with validation in laravel 6. we will use laravel image validation and store to folder and database for laravel 6 multiple image upload.\r\n\r\nWe will create simple multiple image upload in laravel 6. So you basically use this code on your laravel 6 application.\r\n\r\nWe are going from starch so, we will upload multiple file and store on server then after we will store database too. so in this example we will create \"files\" table using laravel migration and write code for route, controller and view step by step.', '1620162553.164899709_115211717307313_5359831592726545244_o.jpeg', '748997945', '748997945', '00000', 'https://stackoverflow.com/questions', NULL, 'talouama@gmail.com', 1000000, 50000, 0, 0, 0, NULL, '2021-05-06 21:59:24', '2021-05-05 22:03:13');

-- --------------------------------------------------------

--
-- Structure de la table `galeries`
--

CREATE TABLE `galeries` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `messageries`
--

CREATE TABLE `messageries` (
  `id` int(11) NOT NULL,
  `id_user_emet` int(11) NOT NULL,
  `id_user_dest` int(11) NOT NULL,
  `contenus` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prestations`
--

CREATE TABLE `prestations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prestations`
--

INSERT INTO `prestations` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'sonorisation', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', '2021-05-02 21:41:29', '0000-00-00 00:00:00'),
(2, 'restauration', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', '2021-05-02 21:41:29', '0000-00-00 00:00:00'),
(3, 'salle événement', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', '2021-05-02 21:41:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'prestataire', '2-in-1 WIRELESS CHARGING - features a magnetic wireless charger designed for iPhone 12 (7.5W) and a designated wireless charging pad for your AirPods Pro (5W) to power both devices with ease\r\nMAGNETIC & HANDS-FREE - equipped with a built-in magnetic wireless charger, the Stand elevates and recharges your iPhone 12, while its adjustable ball mount allows you to maneuver for optimal hands-free viewing\r\nCHARGE YOUR AIRPODS PRO - includes a designated wireless charging pad for your AirPods Pro with a grooved indentation for perfect placement and to prevent it from sliding around\r\nELEGANT DESIGN - with an ultra-sleek stainless steel and aluminum build, the Stand complements your Apple devices and adds an elegant touch to your nightstand or home office setup\r\nCOMPATIBILITY - iPhone 12 Pro Max/12 Pro/12 & AirPods Pro/AirPods with wireless charging case. iPhones without magnet will not be supported. Includes USB-C cable, adapter sold separately', '2021-05-03 13:39:56', '0000-00-00 00:00:00'),
(2, 'utilisateur', '2-in-1 WIRELESS CHARGING - features a magnetic wireless charger designed for iPhone 12 (7.5W) and a designated wireless charging pad for your AirPods Pro (5W) to power both devices with ease\r\nMAGNETIC & HANDS-FREE - equipped with a built-in magnetic wireless charger, the Stand elevates and recharges your iPhone 12, while its adjustable ball mount allows you to maneuver for optimal hands-free viewing\r\nCHARGE YOUR AIRPODS PRO - includes a designated wireless charging pad for your AirPods Pro with a grooved indentation for perfect placement and to prevent it from sliding around\r\nELEGANT DESIGN - with an ultra-sleek stainless steel and aluminum build, the Stand complements your Apple devices and adds an elegant touch to your nightstand or home office setup\r\nCOMPATIBILITY - iPhone 12 Pro Max/12 Pro/12 & AirPods Pro/AirPods with wireless charging case. iPhones without magnet will not be supported. Includes USB-C cable, adapter sold separately', '2021-05-03 13:39:56', '0000-00-00 00:00:00'),
(3, 'administrateur', '2-in-1 WIRELESS CHARGING - features a magnetic wireless charger designed for iPhone 12 (7.5W) and a designated wireless charging pad for your AirPods Pro (5W) to power both devices with ease\r\nMAGNETIC & HANDS-FREE - equipped with a built-in magnetic wireless charger, the Stand elevates and recharges your iPhone 12, while its adjustable ball mount allows you to maneuver for optimal hands-free viewing\r\nCHARGE YOUR AIRPODS PRO - includes a designated wireless charging pad for your AirPods Pro with a grooved indentation for perfect placement and to prevent it from sliding around\r\nELEGANT DESIGN - with an ultra-sleek stainless steel and aluminum build, the Stand complements your Apple devices and adds an elegant touch to your nightstand or home office setup\r\nCOMPATIBILITY - iPhone 12 Pro Max/12 Pro/12 & AirPods Pro/AirPods with wireless charging case. iPhones without magnet will not be supported. Includes USB-C cable, adapter sold separately', '2021-05-03 13:39:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `statu`
--

CREATE TABLE `statu` (
  `id` int(11) NOT NULL,
  `libele` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `statu`
--

INSERT INTO `statu` (`id`, `libele`, `created_at`, `updated_at`) VALUES
(1, 'En cours', NULL, NULL),
(2, 'Activer', NULL, NULL),
(3, 'Désactiver', NULL, NULL),
(4, 'En attente', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `confirmation_token` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `confirmation_token`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 'alexis', 'alexisdjidonou@gmail.com', 48997945, 2, '$2y$10$ZyPxKkpwSF.KIui7ZvSfP.MXYnACnqwp6YDkMPDY7CZYbteOKgfJC', '2021-05-03 21:33:38', '$2y$10$uQmj1D49.BnfXDLDzD6w6OsTW/mqHBLBIHRGKXgUPJvlep0S3YWDu', NULL, '2021-05-03 21:06:55', '2021-05-03 21:06:55'),
(13, 'rolant kone', 'romeo@gmail.com', 48997945, 3, NULL, '2021-05-06 00:31:35', '$2y$10$1lcv13gHWcUvFE/hhIqGNemJ.kAWHNFy7QFp6RgZ51eVOtzNTx1ai', NULL, '2021-05-03 21:35:24', '2021-05-03 21:36:00'),
(15, 'Marcel Kouadio', 'marcel@gmail.com', 48997945, 2, NULL, '2021-05-10 05:02:24', '$2y$10$wCE90j8QmaXrlAjNOcV0T.2rFdkZuyH1rBrSwVwbsMFatVD3jPvIm', NULL, '2021-05-10 05:01:06', '2021-05-10 05:01:47');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conversions`
--
ALTER TABLE `conversions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fiches`
--
ALTER TABLE `fiches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `galeries`
--
ALTER TABLE `galeries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messageries`
--
ALTER TABLE `messageries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `prestations`
--
ALTER TABLE `prestations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `statu`
--
ALTER TABLE `statu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `conversions`
--
ALTER TABLE `conversions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fiches`
--
ALTER TABLE `fiches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `galeries`
--
ALTER TABLE `galeries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `messageries`
--
ALTER TABLE `messageries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `prestations`
--
ALTER TABLE `prestations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `statu`
--
ALTER TABLE `statu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
