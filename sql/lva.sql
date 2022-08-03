-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Sie 2022, 16:29
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `lva`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `playlist`
--

CREATE TABLE `playlist` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` varchar(30) NOT NULL,
  `icon` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `playlist`
--

INSERT INTO `playlist` (`id`, `title`, `icon`) VALUES
(1, 'AC/DC #1', NULL),
(2, 'Guns N Rose', 'Guns_N_Rose');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `plso`
--

CREATE TABLE `plso` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `id_playlist` mediumint(8) UNSIGNED NOT NULL,
  `id_song` mediumint(8) UNSIGNED NOT NULL,
  `id_user` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `plso`
--

INSERT INTO `plso` (`id`, `id_playlist`, `id_song`, `id_user`) VALUES
(2, 1, 3, 4),
(3, 1, 1, 4),
(4, 1, 2, 4),
(5, 1, 4, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `song`
--

CREATE TABLE `song` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `id_author` mediumint(8) UNSIGNED DEFAULT NULL,
  `src` varchar(20) DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `song`
--

INSERT INTO `song` (`id`, `title`, `id_author`, `src`, `icon`) VALUES
(1, 'Hells Bells', 5, 'Hells_Bells', 'Hells_Bells'),
(2, 'Highway to Hell', 5, 'Highway_to_Hell', 'Highway_to_Hell'),
(3, 'Back in Black', 5, 'Back_in_Black', 'Back_in_Black'),
(4, 'Rock N Roll Train', 5, 'Rock_N_Roll_Train', 'Rock_N_Roll_Train');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` mediumint(5) UNSIGNED NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `typeaccount` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `typeaccount`) VALUES
(2, 'Biedronka', '$2y$10$PI0/6v42OhUZTacuGS/h2u18aWqy19NadnGzJMLgLzQXCYKDZ/.De', 'filip20011129@gmail.com', 1),
(3, 'Lewiatan', '$2y$10$KDLhsK2Sj066hAEum6/oCuObd8QGObMIzP/ZjGZPRkrZqX001BYpu', 'filip20011129wp@gmail.com', 1),
(4, 'xyz', '$2y$10$BMu.uIFWp72wAV1d8r2md.6QU2epiF043RGkPvVCnp0yeaS2C0Fgu', 'xyz@gmail.com', 1),
(5, 'ACDC', '$2y$10$4qjieDRTjDkeUx21rYruGO1Rp0bbXQRBrMJ53/OnhA9//VsAiUtj2', 'xyz2@gmail.com', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uspl_create`
--

CREATE TABLE `uspl_create` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `id_user` mediumint(8) UNSIGNED NOT NULL,
  `id_playlist` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `uspl_create`
--

INSERT INTO `uspl_create` (`id`, `id_user`, `id_playlist`) VALUES
(1, 4, 1),
(2, 4, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uspl_edit`
--

CREATE TABLE `uspl_edit` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `id_user` mediumint(8) UNSIGNED NOT NULL,
  `id_playlist` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `usso`
--

CREATE TABLE `usso` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `id_user` mediumint(8) UNSIGNED NOT NULL,
  `id_song` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `plso`
--
ALTER TABLE `plso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_playlist` (`id_playlist`),
  ADD KEY `id_song` (`id_song`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeksy dla tabeli `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_author` (`id_author`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uspl_create`
--
ALTER TABLE `uspl_create`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_playlist` (`id_playlist`);

--
-- Indeksy dla tabeli `uspl_edit`
--
ALTER TABLE `uspl_edit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uspl_edit_ibfk_1` (`id_user`),
  ADD KEY `id_playlist` (`id_playlist`);

--
-- Indeksy dla tabeli `usso`
--
ALTER TABLE `usso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_song` (`id_song`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `plso`
--
ALTER TABLE `plso`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `song`
--
ALTER TABLE `song`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` mediumint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `uspl_create`
--
ALTER TABLE `uspl_create`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `uspl_edit`
--
ALTER TABLE `uspl_edit`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `usso`
--
ALTER TABLE `usso`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `plso`
--
ALTER TABLE `plso`
  ADD CONSTRAINT `plso_ibfk_1` FOREIGN KEY (`id_playlist`) REFERENCES `playlist` (`id`),
  ADD CONSTRAINT `plso_ibfk_2` FOREIGN KEY (`id_song`) REFERENCES `song` (`id`),
  ADD CONSTRAINT `plso_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ograniczenia dla tabeli `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `song_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `user` (`id`);

--
-- Ograniczenia dla tabeli `uspl_create`
--
ALTER TABLE `uspl_create`
  ADD CONSTRAINT `uspl_create_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `uspl_create_ibfk_2` FOREIGN KEY (`id_playlist`) REFERENCES `playlist` (`id`);

--
-- Ograniczenia dla tabeli `uspl_edit`
--
ALTER TABLE `uspl_edit`
  ADD CONSTRAINT `uspl_edit_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `uspl_edit_ibfk_2` FOREIGN KEY (`id_playlist`) REFERENCES `playlist` (`id`);

--
-- Ograniczenia dla tabeli `usso`
--
ALTER TABLE `usso`
  ADD CONSTRAINT `usso_ibfk_1` FOREIGN KEY (`id_song`) REFERENCES `song` (`id`),
  ADD CONSTRAINT `usso_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
