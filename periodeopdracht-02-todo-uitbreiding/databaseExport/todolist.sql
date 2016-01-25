-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 jan 2016 om 19:17
-- Serverversie: 5.6.26
-- PHP-versie: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_01_15_163338_create_task_table', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sepperenty@hotmail.com', '25a905d538b09df7e2b7bc9120500b0b8f19de0ccdc2e02ef96d0285f73b5639', '2016-01-17 12:21:05');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `done` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `done`, `name`, `created_at`, `updated_at`) VALUES
(5, 2, '0', 'Wow', '2016-01-16 17:05:59', '2016-01-16 16:05:59'),
(6, 2, '0', 'jeppa', '2016-01-16 17:06:01', '2016-01-16 16:06:01'),
(12, 3, '1', 'test', '2016-01-20 14:07:22', '2016-01-20 13:07:22'),
(17, 1, '0', 'Lees boek webdesign', '2016-01-25 18:10:56', '2016-01-25 17:10:56'),
(18, 1, '1', 'Dit is een nieuwe task', '2016-01-25 18:10:54', '2016-01-25 17:10:54'),
(19, 1, '0', 'test5', '2016-01-25 18:10:59', '2016-01-25 17:10:59');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Seppe Renty', 'sepperenty@hotmail.com', '$2y$10$iExZsAPpcEA0mGr9F4gp6ujuFHURTZvQZ0t8ZB8x0hFjEHM7hgR.y', 'gj6aOnQZCrckKHaT5WODBN5vZH3kzUaDr74n32RotHGvsUfT19Gf4537YISA', '2016-01-25 18:15:24', '2016-01-25 17:15:24'),
(2, 'lotte Renty', 'lotterenty@hotmail.com', '$2y$10$afISONFCqmddTuuzxwEA.uGsbup03jz29eggJyeITmYsHLh8dt8Oi', '8lQiUgkQRil0x7S3uR80N2ysDc10bOo72uFylenicKoKUWLZvm0YtHrg8l4B', '2016-01-16 16:50:01', '2016-01-16 15:50:01'),
(3, 'test', 'test@hotmaom.com', '$2y$10$xc9EqiB/MKmpnvJ.pa7cqOYAzlKCG4YXJHxo3/1BlAZnN.LFaUIOm', 'f3GaZn5PSPOQFbe8KRKK6uDtNBGGC1KNrkITisp5fqYy7A11MowXBYbH3ONr', '2016-01-20 14:07:50', '2016-01-20 13:07:50'),
(4, 'frank', 'frankrenty@htomail.com', '$2y$10$JKwsPuOzGOeDhdyoyNgB/.GDX4/wKmdEwORl/4ZCTUp6fejsfnXIi', 'O4GBhhzXxDDwvInFEKxdw1AcW9uYT1NLhqj004CHuLatSf984SnF4Z1W4daQ', '2016-01-24 13:48:55', '2016-01-24 12:48:55');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexen voor tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_user_id_index` (`user_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
