-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 08 juin 2021 à 01:36
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
-- Base de données : `spoteventcars`
--

-- -------------------------------------spoteventspotevent-------------------

--
-- Structure de la table `clicfiches`
--

CREATE TABLE `clicfiches` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_prestataire` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clicfiches`
--

INSERT INTO `clicfiches` (`id`, `id_user`, `id_prestataire`, `created_at`, `updated_at`) VALUES
(1, 15, 33, '2021-06-02 19:26:54', '2021-06-02 19:26:54'),
(2, 15, 33, '2021-06-02 19:27:02', '2021-06-02 19:27:02'),
(3, 0, 16, '2021-06-05 12:37:34', '2021-06-05 12:37:34'),
(4, 0, 12, '2021-06-05 12:37:42', '2021-06-05 12:37:42'),
(5, 0, 15, '2021-06-05 12:38:19', '2021-06-05 12:38:19'),
(6, 0, 13, '2021-06-05 12:38:35', '2021-06-05 12:38:35'),
(7, 0, 16, '2021-06-05 12:41:00', '2021-06-05 12:41:00'),
(8, 0, 15, '2021-06-05 12:41:17', '2021-06-05 12:41:17'),
(9, 0, 15, '2021-06-05 12:41:22', '2021-06-05 12:41:22'),
(10, 0, 16, '2021-06-05 12:42:17', '2021-06-05 12:42:17'),
(11, 0, 15, '2021-06-05 12:43:23', '2021-06-05 12:43:23'),
(12, 0, 13, '2021-06-05 12:47:32', '2021-06-05 12:47:32'),
(13, 0, 16, '2021-06-05 12:55:30', '2021-06-05 12:55:30'),
(14, 0, 12, '2021-06-05 12:55:40', '2021-06-05 12:55:40'),
(15, 0, 15, '2021-06-05 12:55:50', '2021-06-05 12:55:50'),
(16, 0, 12, '2021-06-05 12:56:04', '2021-06-05 12:56:04'),
(17, 0, 13, '2021-06-05 12:56:28', '2021-06-05 12:56:28'),
(18, 0, 12, '2021-06-05 12:56:51', '2021-06-05 12:56:51'),
(19, 0, 16, '2021-06-05 12:57:15', '2021-06-05 12:57:15'),
(20, 0, 15, '2021-06-05 12:59:17', '2021-06-05 12:59:17'),
(21, 0, 12, '2021-06-05 12:59:39', '2021-06-05 12:59:39'),
(22, 0, 15, '2021-06-05 13:00:24', '2021-06-05 13:00:24'),
(23, 0, 15, '2021-06-05 13:06:09', '2021-06-05 13:06:09'),
(24, 0, 16, '2021-06-05 13:07:04', '2021-06-05 13:07:04'),
(25, 0, 15, '2021-06-05 13:07:10', '2021-06-05 13:07:10'),
(26, 0, 16, '2021-06-05 13:07:16', '2021-06-05 13:07:16'),
(27, 0, 12, '2021-06-05 13:07:21', '2021-06-05 13:07:21'),
(28, 0, 12, '2021-06-05 13:07:32', '2021-06-05 13:07:32'),
(29, 0, 15, '2021-06-05 13:07:39', '2021-06-05 13:07:39'),
(30, 0, 12, '2021-06-05 13:07:42', '2021-06-05 13:07:42'),
(31, 0, 12, '2021-06-05 13:08:04', '2021-06-05 13:08:04'),
(32, 0, 13, '2021-06-05 13:08:11', '2021-06-05 13:08:11'),
(33, 0, 15, '2021-06-05 13:08:18', '2021-06-05 13:08:18'),
(34, 0, 16, '2021-06-05 13:08:24', '2021-06-05 13:08:24'),
(35, 0, 16, '2021-06-05 13:08:43', '2021-06-05 13:08:43'),
(36, 0, 12, '2021-06-05 13:08:53', '2021-06-05 13:08:53'),
(37, 0, 15, '2021-06-05 13:09:11', '2021-06-05 13:09:11'),
(38, 0, 16, '2021-06-05 13:09:15', '2021-06-05 13:09:15'),
(39, 0, 16, '2021-06-05 14:56:35', '2021-06-05 14:56:35'),
(40, 0, 12, '2021-06-05 14:56:51', '2021-06-05 14:56:51'),
(41, 0, 13, '2021-06-05 14:58:06', '2021-06-05 14:58:06'),
(42, 0, 15, '2021-06-05 14:58:10', '2021-06-05 14:58:10'),
(43, 15, 16, '2021-06-05 15:02:38', '2021-06-05 15:02:38'),
(44, 15, 12, '2021-06-05 15:04:11', '2021-06-05 15:04:11'),
(45, 0, 12, '2021-06-05 15:10:16', '2021-06-05 15:10:16'),
(46, 15, 12, '2021-06-05 15:12:07', '2021-06-05 15:12:07'),
(47, 15, 12, '2021-06-05 15:19:54', '2021-06-05 15:19:54');

-- --------------------------------------------------------

--
-- Structure de la table `clicphones`
--

CREATE TABLE `clicphones` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_prestataire` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clicphones`
--

INSERT INTO `clicphones` (`id`, `id_user`, `id_prestataire`, `created_at`, `updated_at`) VALUES
(1, 15, 33, '2021-06-02 19:33:12', '2021-06-02 19:33:12'),
(2, 15, 33, '2021-06-02 19:33:15', '2021-06-02 19:33:15'),
(3, 15, 16, '2021-06-05 15:02:41', '2021-06-05 15:02:41'),
(4, 15, 16, '2021-06-05 15:02:51', '2021-06-05 15:02:51');

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
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_prest` int(11) NOT NULL,
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
-- Structure de la table `demandes`
--

CREATE TABLE `demandes` (
  `id` int(11) NOT NULL,
  `id_prestataire` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `statu` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `demandes`
--

INSERT INTO `demandes` (`id`, `id_prestataire`, `name`, `phone`, `email`, `message`, `statu`, `created_at`, `updated_at`) VALUES
(1, 16, 'Alex Aley', '098765432', 'alexis@gmail>com', 'La fibre optique est la technologie internet de dernière génération qui transporte tous les contenus (sites, vidéos, photos) à une vitesse exceptionnelle. Avec CANALBOX, la fibre arrive directement chez vous pour connecter tous vos équipements et toute votre famille.', 1, '2021-06-04 23:13:08', '2021-06-02 22:17:57'),
(2, 16, 'Alex Rolant', '098765432', 'alexis@gmail>com', 'La fibre optique est la technologie internet de dernière génération qui transporte tous les contenus (sites, vidéos, photos) à une vitesse exceptionnelle. Avec CANALBOX, la fibre arrive directement chez vous pour connecter tous vos équipements et toute votre famille.', 0, '2021-06-05 00:07:17', '2021-06-02 22:19:00'),
(3, 15, 'marc henty', '48997945', 'talouama@gmail.com', 'bonjour mr je souhate organiser mes obserque et jeia besoin de vos serveices marc hemnry decede', 0, '2021-06-05 12:44:14', '2021-06-05 12:44:14'),
(4, 16, 'Marcel Kouadio', '48997945', 'marcel@gmail.com', 'provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la miseLe lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la miseLe lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise', 0, '2021-06-05 15:03:37', '2021-06-05 15:03:37'),
(5, 12, 'Marcel Kouadio', '48997945', 'marcel@gmail.com', 'In this Tutorial, I will explain you to multiple image upload in laravel 6. we will upload multiple image with validation in laravel 6. we will use laravel image validation and store to folder and database for laravel 6 multiple image upload.\n \n We will create simple multiple image upload in laravel 6. So you basically use this code on your laravel 6 application.\n \n We are going from starch so, we will upload multiple file and store on server then after we will store database too. so in this example we will create \"files\" table using laravel migration and write code for route, controller and view step by step.', 0, '2021-06-05 15:12:46', '2021-06-05 15:12:46');

-- --------------------------------------------------------

--
-- Structure de la table `estimations`
--

CREATE TABLE `estimations` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `estimations`
--

INSERT INTO `estimations` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, '50000', '2021-05-25 16:19:18', '0000-00-00 00:00:00'),
(2, '100000 ', '2021-05-25 16:19:22', '0000-00-00 00:00:00'),
(3, '150000 ', '2021-05-25 16:19:26', '0000-00-00 00:00:00'),
(4, '200000', '2021-05-25 16:19:29', '0000-00-00 00:00:00'),
(5, '250000 ', '2021-05-25 16:19:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_prestataire` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `id_user`, `id_prestataire`, `created_at`, `updated_at`) VALUES
(7, 15, 33, '2021-06-02 19:06:41', '2021-06-02 19:06:41'),
(14, 0, 15, '2021-06-05 12:47:11', '2021-06-05 12:47:11'),
(15, 0, 13, '2021-06-05 12:47:35', '2021-06-05 12:47:35');

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
  `presentation` varchar(400) NOT NULL,
  `description` text NOT NULL,
  `detail_localisation` varchar(100) NOT NULL,
  `path_img` varchar(200) NOT NULL,
  `phone_service` varchar(12) NOT NULL,
  `phone2_service` varchar(11) DEFAULT NULL,
  `phone_whastapp` varchar(12) DEFAULT NULL,
  `lien_facebook` varchar(100) DEFAULT NULL,
  `lien_instagram` varchar(200) DEFAULT NULL,
  `email_service` varchar(50) DEFAULT NULL,
  `estimation_min` int(11) NOT NULL,
  `estimation_max` int(11) NOT NULL,
  `statu_fiche` int(11) NOT NULL,
  `messagerie` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `favoris` int(11) DEFAULT NULL,
  `actif_phone` int(11) NOT NULL,
  `actif_whatsapp` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fiches`
--

INSERT INTO `fiches` (`id`, `id_user`, `name`, `localisation`, `id_prestations`, `presentation`, `description`, `detail_localisation`, `path_img`, `phone_service`, `phone2_service`, `phone_whastapp`, `lien_facebook`, `lien_instagram`, `email_service`, `estimation_min`, `estimation_max`, `statu_fiche`, `messagerie`, `position`, `favoris`, `actif_phone`, `actif_whatsapp`, `created_at`, `updated_at`) VALUES
(1, 0, 'maria traiter', 'abidjan cocody', 3, 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le', 'In this Tutorial, I will explain you to multiple image upload in laravel 6. we will upload multiple image with validation in laravel 6. we will use laravel image validation and store to folder and database for laravel 6 multiple image upload.\r\n\r\nWe will create simple multiple image upload in laravel 6. So you basically use this code on your laravel 6 application.\r\n\r\nWe are going from starch so, we will upload multiple file and store on server then after we will store database too. so in this example we will create \"files\" table using laravel migration and write code for route, controller and view step by step.', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre', 'img1.png', '748997945', '748997945', '00000', 'https://web.facebook.com/alexischristien.djidonou/', 'https://web.facebook.com/alexischristien.djidonou/', 'talouama@gmail.com', 50000, 1000000, 1, 0, 0, 0, 0, 0, '2021-06-05 15:15:15', '2021-06-05 15:10:48'),
(2, 13, 'AKOFOUR SONO', 'abidjan', 3, 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le ', 'In this Tutorial, I will explain you to multiple image upload in laravel 6. we will upload multiple image with validation in laravel 6. we will use laravel image validation and store to folder and database for laravel 6 multiple image upload.\r\n\r\nWe will create simple multiple image upload in laravel 6. So you basically use this code on your laravel 6 application.\r\n\r\nWe are going from starch so, we will upload multiple file and store on server then after we will store database too. so in this example we will create \"files\" table using laravel migration and write code for route, controller and view step by step.', 'fjff', 'img2.png', '748997945', '748997945', '00000', 'https://stackoverflow.com/questions', NULL, 'talouama@gmail.com', 50000, 0, 1, 1, 1, 1, 0, 0, '2021-06-07 23:18:17', '2021-06-02 11:48:39'),
(3, 15, 'EVENT PLUS', 'abidjan cocody', 1, 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le ', 'The capture attribute value is a string that specifies which camera to use for capture of image or video data, if the accept attribute indicates that the input should be of one of those types. A value of user indicates that the user-facing camera and/or microphone should be used. A value of environment specifies that the outward-facing camera and/or microphone should be used. If this attribute is missing, the user agent is free to decide on its own what to do. If the requested facing mode isn\'t available, the user agent may fall back to its preferred default mode.', '', 'img3.png', '48997945 09', '48997945', '48997945', 'https://stackoverflow.com/questions', 'https://stackoverflow.com/questions', 'talouama@gmail.com', 150000, 0, 1, 1, 1, 1, 0, 0, '2021-06-07 23:18:34', '2021-06-02 11:48:26'),
(4, 12, 'alice traiteur', 'abidjan cocody angre', 1, 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le ', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', '', 'img4.png', '48997945', '48997945', '48997945', 'https://stackoverflow.com/questions', 'https://stackoverflow.com/questions', 'talouama@gmail.com', 300000, 1, 1, 1, 1, 0, 0, 0, '2021-06-07 23:18:45', '2021-06-05 15:20:30'),
(5, 16, 'Eterna Stain paul', 'abidjan cocody', 4, 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la miseLe lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la miseLe lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la miseLe lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la miseLe lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la miseLe lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la miseLe lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre', 'img5.png', '48997945', '48997945', '48997945', 'https://stackoverflow.com/questions', 'https://stackoverflow.com/questions', 'talouama@gmail.com', 50000, 1000000, 1, 0, 1, 1, 0, 0, '2021-06-05 00:19:34', '2021-06-05 00:19:34');

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

--
-- Déchargement des données de la table `galeries`
--

INSERT INTO `galeries` (`id`, `id_user`, `path`, `created_at`, `updated_at`) VALUES
(31, 12, 'img1.png', NULL, NULL),
(32, 12, 'img3.png', NULL, NULL),
(33, 12, 'img3.png', '2021-05-28 18:33:09', '2021-05-28 18:33:09'),
(34, 12, 'img4.png', '2021-05-28 18:33:09', '2021-05-28 18:33:09'),
(50, 16, '1622561449.png', '2021-06-01 15:30:49', '2021-06-01 15:30:49'),
(51, 16, '1622561449.png', '2021-06-01 15:30:49', '2021-06-01 15:30:49');

-- --------------------------------------------------------

--
-- Structure de la table `messageries`
--

CREATE TABLE `messageries` (
  `id` int(11) NOT NULL,
  `id_conver` int(11) NOT NULL,
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
  `path_icone` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `statu` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prestations`
--

INSERT INTO `prestations` (`id`, `name`, `path_icone`, `description`, `statu`, `created_at`, `updated_at`) VALUES
(1, 'sonorisation', 'sono.png', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', 0, '2021-06-02 12:00:32', '0000-00-00 00:00:00'),
(2, 'Eclairage', '', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', 0, '2021-05-24 17:53:27', '0000-00-00 00:00:00'),
(3, 'Decoration', 'deco.png', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', 0, '2021-06-02 11:59:16', '0000-00-00 00:00:00'),
(4, 'Salle évènementiel', '', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', 0, '2021-05-24 17:52:49', '2021-05-14 23:48:38'),
(5, 'Sonorisation', '', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', 0, '2021-05-24 17:53:03', '2021-05-16 23:55:43'),
(6, 'Resturation', '', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', 0, '2021-05-24 17:52:28', '2021-05-16 23:56:36'),
(7, 'Maitre de cerenomie', '1621209634.chat.png', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.', 0, '2021-05-24 17:54:15', '2021-05-17 00:00:34');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_prest` int(11) NOT NULL,
  `messages` text NOT NULL,
  `proposition_montant` varchar(100) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `path_user` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `path_user`, `confirmation_token`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 'alexis', 'alexisdjidonou@gmail.com', 48997945, 2, 'pr4.png', NULL, '2021-05-30 12:11:13', '$2y$10$uQmj1D49.BnfXDLDzD6w6OsTW/mqHBLBIHRGKXgUPJvlep0S3YWDu', NULL, '2021-05-03 21:06:55', '2021-05-03 21:06:55'),
(13, 'rolant kone', 'romeo@gmail.com', 48997945, 3, '', NULL, '2021-05-06 00:31:35', '$2y$10$1lcv13gHWcUvFE/hhIqGNemJ.kAWHNFy7QFp6RgZ51eVOtzNTx1ai', NULL, '2021-05-03 21:35:24', '2021-05-03 21:36:00'),
(15, 'Marcel Kouadio', 'marcel@gmail.com', 48997945, 1, '', NULL, '2021-05-17 21:08:04', '$2y$10$wCE90j8QmaXrlAjNOcV0T.2rFdkZuyH1rBrSwVwbsMFatVD3jPvIm', NULL, '2021-05-10 05:01:06', '2021-05-10 05:01:47'),
(16, 'talou ama', 'talouama@gmail.com', 48997945, 2, 'pr1.png', NULL, '2021-05-30 12:10:18', '$2y$10$wCE90j8QmaXrlAjNOcV0T.2rFdkZuyH1rBrSwVwbsMFatVD3jPvIm', NULL, '2021-05-17 22:15:56', '2021-05-17 22:28:08'),
(17, 'Micael dieu', 'die@gmail.com', 48997945, 1, '', NULL, '2021-05-17 22:27:48', '$2y$10$i34gbwLgV8CuyrIOHWM24.U2gkLjnA4HVlxKORL9iHNnfh0KwAdja', NULL, '2021-05-17 22:17:15', '2021-05-17 22:27:48'),
(20, 'adel kone', 'adel@gmail.com', 48997945, 2, 'pr2.png', NULL, '2021-05-30 12:10:41', '$2y$10$CQsgPqxnaoIGBZmLXl3NVe02tLo9iotz8jxUbojN9wx.oD0rFkj0y', NULL, '2021-05-18 23:05:52', '2021-05-18 23:06:24'),
(23, 'vaka inchaud', 'infos@alliancesolidaire.ci', 48997945, 2, 'pr3.png', NULL, '2021-05-30 12:10:56', '$2y$10$wh4p7UGENE3IEwjhVUeI6ea8Mag6aJnNqjAn6QdAGRXuq1h9a2Lk.', NULL, '2021-05-20 19:14:14', '2021-05-20 19:14:14'),
(24, 'kouassi adjo', 'adjo@gmail.com', 678833457, 1, '', '$2y$10$kd8kEViDNlrwyvRn202dcuS0cP3gGn1qOHiFkfjGysWLxvGmacNS', '2021-05-20 20:44:48', '$2y$10$KPy8y5S16JqYERWf2eCERe/PGhC93m4jEdOlTTdjiL14m0XIayYna', NULL, '2021-05-20 20:44:48', '2021-05-20 20:44:48'),
(31, 'awo liliane', 'awo@gmail.com', 766543213, 1, NULL, '$2y$10$eqsUfSAsmOIGfFvLUoeyFehcXkVMFNt1N1xvPkkiONf4tveEHL6B.', '2021-06-01 14:53:22', '$2y$10$pbiB.J9APjvCBjlXdU0.we.I9jz8iM20bUQ.hGQZdTq.1joOOF7pe', NULL, '2021-06-01 14:53:22', '2021-06-01 14:53:22'),
(32, 'liliane awo', 'liliane@gmail.com', 766543321, 2, NULL, '$2y$10$ynzqDGqHQg5MAepiOmmn.mDSIR8V9TzehcsfzJtcnX.g8uFgOK2u', '2021-06-01 14:54:53', '$2y$10$nNv0iqXW1obOzvDHbQ8QTu4dbHbI7p2/opcKIs6KqzP6qZYYXqesq', NULL, '2021-06-01 14:54:53', '2021-06-01 14:54:53'),
(35, 'Aka melissa', 'melissa@gmail.com', 709876654, 2, NULL, NULL, '2021-06-05 15:40:40', '$2y$10$ys7/9aN6aUeXSPJZaVAuV.He0Elmb0qBnB3M4QavYGLnS8vODtngq', NULL, '2021-06-05 15:40:29', '2021-06-05 15:40:40');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clicfiches`
--
ALTER TABLE `clicfiches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clicphones`
--
ALTER TABLE `clicphones`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conversions`
--
ALTER TABLE `conversions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `estimations`
--
ALTER TABLE `estimations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
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
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
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
-- AUTO_INCREMENT pour la table `clicfiches`
--
ALTER TABLE `clicfiches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `clicphones`
--
ALTER TABLE `clicphones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `conversions`
--
ALTER TABLE `conversions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `estimations`
--
ALTER TABLE `estimations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `fiches`
--
ALTER TABLE `fiches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `galeries`
--
ALTER TABLE `galeries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
