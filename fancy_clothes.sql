-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 28. 06 2019 kl. 09:30:07
-- Serverversion: 10.1.37-MariaDB
-- PHP-version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fancy_clothes`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(10) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
(1, 'Jakker'),
(2, 'Bukser'),
(3, 'Skjorter'),
(4, 'Strik'),
(5, 'T-shirts & Tank tops'),
(6, 'Tasker'),
(7, 'Sko');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `products`
--

CREATE TABLE `products` (
  `productId` int(10) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `imgSrc` varchar(200) NOT NULL,
  `imgAlt` varchar(100) NOT NULL,
  `productTimestamp` int(15) NOT NULL,
  `content` varchar(200) NOT NULL,
  `authorId` int(10) NOT NULL,
  `stars` int(1) NOT NULL,
  `productCategory` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `products`
--

INSERT INTO `products` (`productId`, `heading`, `imgSrc`, `imgAlt`, `productTimestamp`, `content`, `authorId`, `stars`, `productCategory`) VALUES
(4, 'Lækker læderjakke', 'produkt1.jpg', 'Lækker læderjakke', 1561461960, 'Odd Molly er et svensk luksusbrand stiftet af Per Holknekt – tidligere pro skateboarder. Verdenseliten tiltrak dengang mange kvindelige fans, og de fleste af dem gjorde, hvad de kunne for at få fyrene', 1, 3, 'jakker'),
(5, 'Samsø & Samsø Trøje', 'produkt2.jpg', 'Samsø & Samsø Trøje', 1561462133, 'Petite fit curved hem 100% cotton flat measurement machine wash checks and stripes. Smart rich stretch viscose green yellow poly- blend fabric spaghetti straps figure-skimming fit. Foam padding in the', 1, 4, 'skjorter'),
(6, 'Fede Støvler', 'produkt3.jpg', 'Fede Støvler', 1561462264, 'Suede fabric pointed toe stylish cut front low heel sharp on-trend toe point raised heel drop sides unique silhouette. Effortless comfortable full leather lining eye-catching unique detail to the toe ', 1, 5, 'sko'),
(7, 'Flere Støvler', 'produkt4.jpg', 'Flere Støvler', 1561462305, 'Flats elegant pointed toe design cut-out sides luxe leather lining versatile shoe must-have new season glamorous. Polished finish elegant court shoe work duty stretchy slingback strap mid kitten heel ', 1, 3, 'sko'),
(8, 'Højhælede Sko', 'produkt5.jpg', 'Højhælede Sko', 1561462338, 'Workwear bow detailing a slingback buckle strap stiletto heel timeless go-to shoe sophistication slipper shoe. Flats elegant pointed toe design cut-out sides luxe leather lining versatile shoe must-ha', 1, 4, 'sko'),
(9, 'Stretch Bukser', 'produkt6.jpg', 'Stretch Bukser', 1561462461, 'Button concelead zip front fastening strech micro modal straight-leg drawstring waste. Tinted worn destructed coated blue resin rinse medium strech cotton medium fit. Machine wash cold slim fit premiu', 1, 4, 'bukser'),
(10, 'Stribet Trøje', 'produkt7.jpg', 'Stribet Trøje', 1561462519, 'Crisp fresh iconic elegant timeless clean perfume neck straight sharp silhouette and dart detail. Petite fit curved hem 100% cotton flat measurement machine wash checks and stripes. Sophisticated kymo', 1, 3, 'strik'),
(11, 'Outfit', 'produkt8.jpg', 'Outfit', 1561462547, 'Western-inspired suede jacket denim blue metallic button fastening summer white pure hue subtle distressed casual appeal. Capsule wardrobe double breasted jacket chic lightweight contemporary luxury c', 2, 4, 'jakker'),
(15, 'test', 'beholder_blue.jpg', 'ny', 1561619468, 'lorem', 2, 5, 'Jakker');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `userId` int(10) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userPassword` varchar(200) NOT NULL,
  `accessLevel` int(1) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`userId`, `userName`, `userPassword`, `accessLevel`) VALUES
(1, 'birk', '$2y$10$Hr0ONQDQudSRoHD46/Ghn.MfQdFGDekpNEJEV77gt0bEzA.WD0wye', 1),
(2, 'test', '$2y$10$TIwx16uzuRB/XCVwuKBSIe/NCmC/pSA9SYBJDIIYeoBNenQ/6cYW6', 2),
(3, 'hash', '$2y$10$/h0UtoHlsKoueEfM5DPCoeY.GxgXjEXZlQoJOhWgCmfy/ZlRDh/by', 3),
(4, 'john', '$2y$10$xcx/lhcCpa1neow7ygPHxePDBU1GEd586GVVJWPML0cEmEagTAP.m', 3);

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indeks for tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tilføj AUTO_INCREMENT i tabel `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
