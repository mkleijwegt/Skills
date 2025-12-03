-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 dec 2025 om 14:37
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alcohol`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vodka`
--

CREATE TABLE `vodka` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `percent` decimal(8,2) NOT NULL,
  `beschrijving` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `vodka`
--

INSERT INTO `vodka` (`id`, `naam`, `percent`, `beschrijving`) VALUES
(1, 'Absolut Vodka\r\n', 40.00, 'Absolut Vodka is een Zweedse Vodka die wordt gemaakt uit uitsluitend natuurlijke ingrediënten, zonder toegevoegde suikers. Toch heeft het een bijzondere smaak: vol en complex, maar ook subtiel en licht.\r\n\r\n'),
(2, 'Smirnoff', 37.00, 'Smirnoff No. 21 is een uitzonderlijk pure vodka. Een prijswinnende vodka die een basis vormt voor veel van \'s werelds beroemdste cocktails zoals vodka met limoen en spuitwater en natuurlijk de vodka Martini.\r\n\r\n'),
(3, 'grey goose', 44.00, 'rey Goose Vodka is een synoniem voor luxe en kwaliteit. Deze premium vodka, afkomstig uit de vruchtbare Picardië regio in Noord-Frankrijk, begint met 100% van het fijnste wintergraan. Dankzij een uniek fermentatieproces en het gebruik van puur bronwater, wordt deze vodka vijf keer gedistilleerd in koperen ketels. Dit resulteert in een uitzonderlijk zachte, elegante en volle smaak die wereldwijd wordt erkend.');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `vodka`
--
ALTER TABLE `vodka`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `vodka`
--
ALTER TABLE `vodka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
