-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2018. Jan 27. 01:08
-- Kiszolgáló verziója: 10.1.26-MariaDB
-- PHP verzió: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `mydb`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalo`
--
-- Létrehozva: 2018. Jan 15. 11:34
--

CREATE TABLE `felhasznalo` (
  `f_azon` int(11) NOT NULL,
  `f_nev` text NOT NULL,
  `f_jel` text NOT NULL,
  `f_neme` int(1) NOT NULL,
  `f_tiltva` int(11) NOT NULL,
  `f_felnev` text NOT NULL,
  `f_admin` int(1) NOT NULL,
  `f_bejelentkezve` tinyint(1) NOT NULL,
  `f_emailcim` text NOT NULL,
  `f_szul_date` date NOT NULL,
  `f_reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- RELATIONSHIPS FOR TABLE `felhasznalo`:
--

--
-- A tábla adatainak kiíratása `felhasznalo`
--

INSERT INTO `felhasznalo` (`f_azon`, `f_nev`, `f_jel`, `f_neme`, `f_tiltva`, `f_felnev`, `f_admin`, `f_bejelentkezve`, `f_emailcim`, `f_szul_date`, `f_reg_date`) VALUES
(1, 'Bakos Rich??rd', 'asdasd', 1, 0, 'asd', 0, 0, 'ax@b.c', '2020-04-03', '2018-01-16'),
(2, 'Bakos Rich??rd', 'asdasd', 1, 0, 'asda', 0, 0, 'xa@xa.xa', '2020-04-03', '2018-01-16'),
(3, 'Bakos Rich??rd', 'asdasd', 1, 0, 'asdaasd', 0, 0, 'rcsbakos2@gmail.com', '2020-04-03', '2018-01-16');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szavazatok`
--
-- Létrehozva: 2018. Jan 15. 11:34
--

CREATE TABLE `szavazatok` (
  `f_azon` int(11) NOT NULL,
  `szav_id` int(11) NOT NULL,
  `a` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `c` int(11) NOT NULL,
  `d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- RELATIONSHIPS FOR TABLE `szavazatok`:
--   `szav_id`
--       `szavazat_temak` -> `sz_id`
--   `f_azon`
--       `felhasznalo` -> `f_azon`
--

--
-- A tábla adatainak kiíratása `szavazatok`
--

INSERT INTO `szavazatok` (`f_azon`, `szav_id`, `a`, `b`, `c`, `d`) VALUES
(1, 1, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szavazat_temak`
--
-- Létrehozva: 2018. Jan 18. 13:52
--

CREATE TABLE `szavazat_temak` (
  `sz_id` int(11) NOT NULL,
  `megnevezés` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- RELATIONSHIPS FOR TABLE `szavazat_temak`:
--

--
-- A tábla adatainak kiíratása `szavazat_temak`
--

INSERT INTO `szavazat_temak` (`sz_id`, `megnevezés`) VALUES
(1, 'Oldal ?rt?kel?s'),
(4, 'áááéééé'),
(5, 'áááéééé');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `valami`
--
-- Létrehozva: 2018. Jan 18. 14:20
--

CREATE TABLE `valami` (
  `a` int(11) NOT NULL,
  `b` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COMMENT='asd';

--
-- RELATIONSHIPS FOR TABLE `valami`:
--

--
-- A tábla adatainak kiíratása `valami`
--

INSERT INTO `valami` (`a`, `b`) VALUES
(0, 'Megbízások'),
(0, 'Megbízások'),
(0, 'Címlapi fotózás'),
(0, '???');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalo`
--
ALTER TABLE `felhasznalo`
  ADD PRIMARY KEY (`f_azon`);

--
-- A tábla indexei `szavazatok`
--
ALTER TABLE `szavazatok`
  ADD KEY `f_azon` (`f_azon`,`szav_id`),
  ADD KEY `szav_id` (`szav_id`);

--
-- A tábla indexei `szavazat_temak`
--
ALTER TABLE `szavazat_temak`
  ADD PRIMARY KEY (`sz_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalo`
--
ALTER TABLE `felhasznalo`
  MODIFY `f_azon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT a táblához `szavazat_temak`
--
ALTER TABLE `szavazat_temak`
  MODIFY `sz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `szavazatok`
--
ALTER TABLE `szavazatok`
  ADD CONSTRAINT `szavazatok_ibfk_1` FOREIGN KEY (`szav_id`) REFERENCES `szavazat_temak` (`sz_id`),
  ADD CONSTRAINT `szavazatok_ibfk_2` FOREIGN KEY (`f_azon`) REFERENCES `felhasznalo` (`f_azon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
