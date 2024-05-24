-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 16, 2024 at 07:19 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksiazki`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `czytelnicy`
--

CREATE TABLE `czytelnicy` (
  `id_czytelnika` int(11) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(40) NOT NULL,
  `miejscowosc` varchar(30) NOT NULL,
  `ulica_i_nr` varchar(25) NOT NULL,
  `telefon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `czytelnicy`
--

INSERT INTO `czytelnicy` (`id_czytelnika`, `imie`, `nazwisko`, `miejscowosc`, `ulica_i_nr`, `telefon`) VALUES
(1, 'Kacper', 'Gała', 'Szyszczyce', '24', '600500400'),
(2, 'Daniel', 'Grudzień', 'Suskrajowice', '32', '300200100'),
(3, 'Filip', 'Patyk', 'Skarżysko', 'Warszawska 10', '100200300'),
(4, 'Mateusz', 'Mazur', 'Kielce', 'Szydłówek 85', '120300900'),
(5, 'Mateusz', 'Sarbian', 'Piekoszów', 'Długa 18', '132987687'),
(6, 'Jakub', 'Sienniak', 'Daleszyce', 'Szydłowska 22', '987300200'),
(7, 'Filip', 'Sufin', 'Leszczyny', '12', '301201102'),
(8, 'Bartłomiej', 'Tomaszewski', 'Dyminy', 'Ściegiennego 23', '2030405114'),
(9, 'Maciej', 'Wróblewski', 'Posłowice', '46', '808603240'),
(10, 'Bartosz', 'Danielski', 'Mąchocice', '65', '304201402'),
(11, 'Kevin', 'Iwan', 'Cedzyna', 'Słoneczna 43', '708322910'),
(12, 'Piotr', 'Cudzik', 'Dąbrowa', 'Jagodowa 15', '303606909'),
(13, 'Norbert', 'Chrobot', 'Bilcza', 'Kielecka 20', '508330220'),
(14, 'Maksymilian', 'Wilman', 'Mójcza', 'Daleka 21', '506780224'),
(15, 'Bartłomiej', 'Szybalski', 'Borki', '32', '809909303'),
(16, 'Hubert', 'Bałaga', 'Ostojów', '49', '808366201'),
(17, 'Dorian', 'Biernacki', 'Ociesęki', '21', '400209432'),
(18, 'Mateusz', 'Kaczmarczyk', 'Tokarnia', 'Krakowska 15', '780243534'),
(19, 'Marcin', 'Pułka', 'Chmielnik', 'Szeroka 18', '606302100'),
(20, 'Olivier', 'Brudny', 'Łączna', '36', '502301403'),
(21, 'Julian', 'Ćwikliński', 'Radlin', '86', '808200120');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `czytelnicy`
--
ALTER TABLE `czytelnicy`
  ADD PRIMARY KEY (`id_czytelnika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `czytelnicy`
--
ALTER TABLE `czytelnicy`
  MODIFY `id_czytelnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;