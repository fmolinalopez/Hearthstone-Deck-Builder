-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2017 at 07:46 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hearthstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `cost` int(11) NOT NULL,
  `type` text NOT NULL,
  `attack` int(11) DEFAULT NULL,
  `health` int(11) DEFAULT NULL,
  `effect` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `image`, `name`, `cost`, `type`, `attack`, `health`, `effect`) VALUES
(1, 'http://c-8oqtgrjgwu46x24ogfkcx2eugtx78kegux2ebcox2eeqo.g00.hearthhead.com/g00/3_c-8yyy.jgctvjjgcf.eqo_/c-8OQTGRJGWU46x24jvvrx3ax2fx2fogfkc.ugtx78kegu.bco.eqox2fx783x2fogfkcx2fdaPcogx2fjux2fectfux2fgpwux2fcpkocvgfx2fEU4_301_rtgokwo.ikhx3fk32e.octm.kocig.varg_$/$/$/$/$/$/$/$/$', 'Elven Archer', 1, 'VanillaMinion', 1, 1, 'Battlecry: Deal 1 damage.'),
(2, 'http://c-8oqtgrjgwu46x24ogfkcx2eugtx78kegux2ebcox2eeqo.g00.hearthhead.com/g00/3_c-8yyy.jgctvjjgcf.eqo_/c-8OQTGRJGWU46x24jvvrx3ax2fx2fogfkc.ugtx78kegu.bco.eqox2fx783x2fogfkcx2fdaPcogx2fjux2fectfux2fgpwux2fcpkocvgfx2fEU4_393_rtgokwo.ikhx3fk32e.octm.kocig.varg_$/$/$/$/$/$/$/$/$', 'Stonetusk Boar', 1, 'minion', 1, 1, 'Charge'),
(3, 'http://media.services.zam.com/v1/media/byName/hs/cards/enus/animated/EX1_066_premium.gif', 'Acidic Swamp Ooze', 2, 'minion', 3, 2, 'Battlecry: Destroy your opponent\'s weapon.'),
(4, 'http://c-8oqtgrjgwu46x24ogfkcx2eugtx78kegux2ebcox2eeqo.g00.hearthhead.com/g00/3_c-8yyy.jgctvjjgcf.eqo_/c-8OQTGRJGWU46x24jvvrx3ax2fx2fogfkc.ugtx78kegu.bco.eqox2fx783x2fogfkcx2fdaPcogx2fjux2fectfux2fgpwux2fcpkocvgfx2fEU4_342_rtgokwo.ikhx3fk32e.octm.kocig.varg_$/$/$/$/$/$/$/$/$', 'River Crocolisk', 2, 'minion', 2, 3, ''),
(5, 'http://media.services.zam.com/v1/media/byName/hs/cards/enus/animated/CS2_118_premium.gif', 'Magma Rager', 3, 'minion', 5, 1, 'Best card in the game'),
(6, 'http://c-8oqtgrjgwu46x24ogfkcx2eugtx78kegux2ebcox2eeqo.g00.hearthhead.com/g00/3_c-8yyy.jgctvjjgcf.eqo_/c-8OQTGRJGWU46x24jvvrx3ax2fx2fogfkc.ugtx78kegu.bco.eqox2fx783x2fogfkcx2fdaPcogx2fjux2fectfux2fgpwux2fcpkocvgfx2fGZ3_231_rtgokwo.ikhx3fk32e.octm.kocig.varg_$/$/$/$/$/$/$/$/$', 'Shattered Sun Cleric', 3, 'minion', 3, 2, 'Battlecry: Give a friendly minion +1/+1.'),
(7, 'http://c-8oqtgrjgwu46x24ogfkcx2eugtx78kegux2ebcox2eeqo.g00.hearthhead.com/g00/3_c-8yyy.jgctvjjgcf.eqo_/c-8OQTGRJGWU46x24jvvrx3ax2fx2fogfkc.ugtx78kegu.bco.eqox2fx783x2fogfkcx2fdaPcogx2fjux2fectfux2fgpwux2fcpkocvgfx2fEU4_346_rtgokwo.ikhx3fk32e.octm.kocig.varg_$/$/$/$/$/$/$/$/$', 'Wolfrider', 3, 'minion', 3, 1, 'Charger'),
(8, 'http://c-8oqtgrjgwu46x24ogfkcx2eugtx78kegux2ebcox2eeqo.g00.hearthhead.com/g00/3_c-8yyy.jgctvjjgcf.eqo_/c-8OQTGRJGWU46x24jvvrx3ax2fx2fogfkc.ugtx78kegu.bco.eqox2fx783x2fogfkcx2fdaPcogx2fjux2fectfux2fgpwux2fcpkocvgfx2fEU4_304_rtgokwo.ikhx3fk32e.octm.kocig.varg_$/$/$/$/$/$/$/$/$', 'Chillwind Yeti', 4, 'minion', 4, 5, ''),
(9, 'http://c-8oqtgrjgwu46x24ogfkcx2eugtx78kegux2ebcox2eeqo.g00.hearthhead.com/g00/3_c-8yyy.jgctvjjgcf.eqo_/c-8OQTGRJGWU46x24jvvrx3ax2fx2fogfkc.ugtx78kegu.bco.eqox2fx783x2fogfkcx2fdaPcogx2fjux2fectfux2fgpwux2fcpkocvgfx2fEU4_369_rtgokwo.ikhx3fk32e.octm.kocig.varg_$/$/$/$/$/$/$/$/$', 'Gnomish Inventor', 4, 'minion', 2, 4, 'Battlecry: Draw a card.'),
(10, 'http://c-8oqtgrjgwu46x24ogfkcx2eugtx78kegux2ebcox2eeqo.g00.hearthhead.com/g00/3_c-8yyy.jgctvjjgcf.eqo_/c-8OQTGRJGWU46x24jvvrx3ax2fx2fogfkc.ugtx78kegu.bco.eqox2fx783x2fogfkcx2fdaPcogx2fjux2fectfux2fgpwux2fcpkocvgfx2fEU4_391_rtgokwo.ikhx3fk32e.octm.kocig.varg_$/$/$/$/$/$/$/$/$', 'Sen\'jin Shieldmasta', 4, 'minion', 3, 5, 'Taunt'),
(11, 'http://media.services.zam.com/v1/media/byName/hs/cards/enus/animated/EX1_399_premium.gif', 'Gurubashi Berserker', 5, 'minion', 2, 7, 'Whenever this minion takes damage, gain +3 Attack.'),
(12, 'http://media.services.zam.com/v1/media/byName/hs/cards/enus/animated/DS1_055_premium.gif', 'Darkscale Healer', 5, 'minion', 4, 5, 'Battlecry: Restore 2 Health to all friendly characters.'),
(13, 'http://media.services.zam.com/v1/media/byName/hs/cards/enus/animated/CS2_226_premium.gif', 'Frostwolf Warlord', 5, 'minion', 4, 4, 'Battlecry: Gain +1/+1 for each other friendly minion on the battlefield.'),
(14, 'http://c-8oqtgrjgwu46x24ogfkcx2eugtx78kegux2ebcox2eeqo.g00.hearthhead.com/g00/3_c-8yyy.jgctvjjgcf.eqo_/c-8OQTGRJGWU46x24jvvrx3ax2fx2fogfkc.ugtx78kegu.bco.eqox2fx783x2fogfkcx2fdaPcogx2fjux2fectfux2fgpwux2fcpkocvgfx2fEU4_422_rtgokwo.ikhx3fk32e.octm.kocig.varg_$/$/$/$/$/$/$/$/$', 'Boulderfist Ogre', 6, 'minion', 6, 7, ''),
(15, 'http://c-8oqtgrjgwu46x24ogfkcx2eugtx78kegux2ebcox2eeqo.g00.hearthhead.com/g00/3_c-8yyy.jgctvjjgcf.eqo_/c-8OQTGRJGWU46x24jvvrx3ax2fx2fogfkc.ugtx78kegu.bco.eqox2fx783x2fogfkcx2fdaPcogx2fjux2fectfux2fgpwux2fcpkocvgfx2fEU4_435_rtgokwo.ikhx3fk32e.octm.kocig.varg_$/$/$/$/$/$/$/$/$', 'Reckless Rocketeer', 6, 'minion', 5, 2, 'Charge'),
(16, 'http://media.services.zam.com/v1/media/byName/hs/cards/enus/animated/CS2_162_premium.gif', 'Lord of the Arena', 6, 'minion', 6, 5, 'Taunt'),
(17, 'http://c-8oqtgrjgwu46x24ogfkcx2eugtx78kegux2ebcox2eeqo.g00.hearthhead.com/g00/3_c-8yyy.jgctvjjgcf.eqo_/c-8OQTGRJGWU46x24jvvrx3ax2fx2fogfkc.ugtx78kegu.bco.eqox2fx783x2fogfkcx2fdaPcogx2fjux2fectfux2fgpwux2fcpkocvgfx2fEU4_444_rtgokwo.ikhx3fk32e.octm.kocig.varg_$/$/$/$/$/$/$/$/$', 'Stormwind Champion', 7, 'minion', 6, 6, 'Your other minions have +1/+1.'),
(18, 'http://c-8oqtgrjgwu46x24ogfkcx2eugtx78kegux2ebcox2eeqo.g00.hearthhead.com/g00/3_c-8yyy.jgctvjjgcf.eqo_/c-8OQTGRJGWU46x24jvvrx3ax2fx2fogfkc.ugtx78kegu.bco.eqox2fx783x2fogfkcx2fdaPcogx2fjux2fectfux2fgpwux2fcpkocvgfx2fEU4_308_rtgokwo.ikhx3fk32e.octm.kocig.varg_$/$/$/$/$/$/$/$/$', 'War Golem', 7, 'minion', 7, 7, ''),
(19, 'http://c-8oqtgrjgwu46x24ogfkcx2eugtx78kegux2ebcox2eeqo.g00.hearthhead.com/g00/3_c-8yyy.jgctvjjgcf.eqo_/c-8OQTGRJGWU46x24jvvrx3ax2fx2fogfkc.ugtx78kegu.bco.eqox2fx783x2fogfkcx2fdaPcogx2fjux2fectfux2fgpwux2fcpkocvgfx2fEU4_423_rtgokwo.ikhx3fk32e.octm.kocig.varg_$/$/$/$/$/$/$/$/$', 'Core Hound', 7, 'minion', 9, 5, ''),
(20, 'http://c-8oqtgrjgwu46x24ogfkcx2eugtx78kegux2ebcox2eeqo.g00.hearthhead.com/g00/3_c-8yyy.jgctvjjgcf.eqo_/c-8OQTGRJGWU46x24jvvrx3ax2fx2fogfkc.ugtx78kegu.bco.eqox2fx783x2fogfkcx2fdaPcogx2fjux2fectfux2fgpwux2fcpkocvgfx2fEU4_395_rtgokwo.ikhx3fk32e.octm.kocig.varg_$/$/$/$/$/$/$/$/$', 'Bluegill Warrior', 2, 'MurlocMinion', 2, 1, 'Charge');

-- --------------------------------------------------------

--
-- Table structure for table `decks`
--

CREATE TABLE `decks` (
  `id` int(11) NOT NULL,
  `deckName` text NOT NULL,
  `cardList` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decks`
--

INSERT INTO `decks` (`id`, `deckName`, `cardList`, `created_at`, `updated_at`) VALUES
(4, 'updateTest', 'Bluegill Warriorx2,\r\nCore Houndx2,\r\nWar Golemx2,\r\nStormwind Championx2,\r\nLord of the Arenax2,\r\nReckless Rocketeerx2,\r\nBoulderfist Ogrex2,\r\nFrostwolf Warlord,\r\n', '0000-00-00 00:00:00', '2017-12-07 01:33:01'),
(7, 'test deck', 'Bluegill Warriorx2, \r\nCore Houndx2, \r\nWar Golemx2, \r\nStormwind Championx2, \r\nLord of the Arenax2, \r\nReckless Rocketeerx2, \r\nBoulderfist Ogrex2, \r\nFrostwolf Warlord', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'test', 'Elven Archer, \r\nStonetusk Boarx2, \r\nAcidic Swamp Oozex2, \r\nRiver Crocoliskx2, \r\nShattered Sun Cleric, \r\nChillwind Yetix2, \r\nBluegill Warriorx2, \r\nCore Houndx2, \r\nWar Golem', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'saddasd', 'Elven Archer,\r\nStonetusk Boar,\r\nAcidic Swamp Oozex2,\r\nRiver Crocoliskx2,\r\nMagma Rager,\r\nShattered Sun Clericx2,\r\nSen\'jin Shieldmastax2,\r\nBluegill Warriorx2,\r\npepex2,\r\n', '2017-12-06 18:45:09', '2017-12-06 18:45:09'),
(14, 'zserdtfhyu', 'Acidic Swamp Oozex2,\r\nMagma Rager,\r\n', '2017-12-06 19:19:21', '2017-12-06 19:19:21'),
(15, '98uyhadiojfda', 'Elven Archer,\r\nStonetusk Boarx2,\r\nAcidic Swamp Oozex2,\r\nRiver Crocoliskx2,\r\nMagma Ragerx2,\r\nShattered Sun Clericx2,\r\nStormwind Championx2,\r\npepex2,\r\n', '2017-12-06 19:29:37', '2017-12-06 19:29:37'),
(16, 'new deck', 'Elven Archer, \r\nStonetusk Boarx2, \r\nAcidic Swamp Ooze, \r\nRiver Crocoliskx2, \r\nMagma Ragerx2, \r\nShattered Sun Clericx2, \r\nBluegill Warrior, \r\nCore Hound, \r\nLord of the Arenax2, \r\npepe', '2017-12-06 20:36:34', '2017-12-06 20:36:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decks`
--
ALTER TABLE `decks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `decks`
--
ALTER TABLE `decks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
