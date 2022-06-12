-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2022 at 03:50 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeuxvideo1`
--

-- --------------------------------------------------------

--
-- Table structure for table `console`
--

CREATE TABLE `console` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `color` varchar(10) NOT NULL,
  `usercolor` varchar(255) NOT NULL,
  `publiccolor` varchar(255) NOT NULL,
  `imageback` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `console`
--

INSERT INTO `console` (`id`, `name`, `color`, `usercolor`, `publiccolor`, `imageback`) VALUES
(1, 'PC', '#CC1111', '#ff5733', '#ff8333', 'pcfilesForum.jpg'),
(2, 'PS4', '#0078FF', '#0728bd', '#3358ff', 'ps4filesForum.jpg'),
(3, 'XBOXONE', 'green', '#2ef137', '#0cb40a', 'xboxfilesForum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `propri` int(11) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `sujet` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `propri`, `contenu`, `date`, `sujet`) VALUES
(38, 1, 'lol', '2020-04-03 13:37:15', 'PC'),
(69, 1, 'cava', '2020-06-29 14:42:22', 'PC'),
(48, 1, 'wow', '2020-04-16 15:47:40', 'XBOXONE'),
(47, 3, 'omg', '2020-04-16 15:47:13', 'XBOXONE'),
(68, 3, 'wooooow', '2020-05-14 16:25:28', 'PS4'),
(66, 3, 'salut comment cava moi cool bien et toi ?', '2020-05-14 16:20:19', 'PC'),
(67, 3, 'le nouveau PS5 !', '2020-05-14 16:25:16', 'PS4'),
(70, 58, 'bien bien', '2021-10-08 14:28:38', 'PC'),
(71, 58, 'hhhhhhhh', '2021-10-29 19:31:39', 'XBOXONE');

-- --------------------------------------------------------

--
-- Table structure for table `jeux`
--

CREATE TABLE `jeux` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `entreprise` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `video` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jeux`
--

INSERT INTO `jeux` (`id`, `name`, `action`, `image`, `marque`, `prix`, `contenu`, `date`, `entreprise`, `age`, `video`) VALUES
(115, 'Diablo 3', 'arkada', 'Diablo-3-Eternal-Collection.jpg', 'PC', '200', 'Diablo III prend place dans le monde imaginaire médiéval-fantastique de Sanctuaire déjà développé dans les deux premiers opus de la série. L’histoire débute dans le royaume de Khanduras vingt ans après les événements décrits dans Diablo II et Diablo II: Lord of Destruction, qui racontent comment un aventurier est parvenu à vaincre les démons Mephisto, Diablo et Baal après leur retour dans le monde des hommes.', '05 mars 2020', 'Blizzard Entertainment', '12', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/M2TpNQhfkp4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(17, 'Fortnite', 'Battle Royal', '1496928029-3096-jaquette-avant.jpg', 'PC', '200', 'Fortnite est un jeu en ligne développé par Epic Games, Les modes de jeu comportent Fortnite : Sauver le monde, un jeu coopératif de tir et de survie conçu pour quatre joueurs au maximum et dont le but est de combattre les hordes de zombies et de défendre des objets avec des fortifications à construire par le ou les joueurs, et Fortnite Battle Royale, un jeu de bataille royale en free-to-play où jusqu\'à 100 joueurs se battent dans des espaces de plus en plus petits pour finir comme dernière personne debout.', '25 juillet 2017', 'Epic Games', '12', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/2gUtfBmw86Y\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(75, 'Destiny 2', 'FPS', 'capsule_616x353_koreana.jpg', 'PS4', '120', 'La dernière cité sur Terre, siège de l\'Avant-garde, est attaquée par les forces Cabals de la Légion Rouge dirigées par le général militaire Cabal : Dominus Ghaul. Les gardiens ont été dépouillés de leurs pouvoirs et de leurs armes, et contraints à fuir. Pour vaincre ces ennemis, ils devront retrouver leurs pouvoirs et s\'aventurer dans de nouveaux mondes pour acquérir de nouvelles armes.', '6 septembre 2017', 'Bungie', '16', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/hdWkpbPTpmE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(98, 'Yoshis', 'Aventure', 'H2x1_NSwitch_YoshisCraftedWorld.jpg', 'XBOXONE', '70', 'Découvrez la face cachée du monde de Yoshi !\r\n\r\nMenez Yoshi à travers une toute nouvelle aventure qui va renverser votre perspective des jeux de plateforme tels que vous les connaissez !\r\n\r\nExplorez un monde gigantesque décoré à la manière d\'un diorama miniature avec des objets du quotidien comme des boîtes ou des gobelets en papier, où chaque stage à défilement latéral possède à la fois un avant-plan, mais également une face cachée avec différents points de vue qui offrent bien des surprises.', '29 mars 2019', 'Good-Feel', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/sx_C9jJ0AlA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(153, 'Call of Duty: Modern Warfare', 'Jeu solo', 'image-original.jpg', 'ps4', '120', 'Call of Duty: Modern Warfare - un jeu d\'ordinateur dans le genre du jeu de tir Ã  la premiÃ¨re personne, le seiziÃ¨me de la franchise Call of Duty. Le jeu est sorti le 25 octobre 2019. Le jeu est un redÃ©marrage de la sous-sÃ©rie Modern Warfare et n\'est pas une continuation directe de Modern Warfare 3.', '23 aoÃ»t 2019', 'Infinity Ward', '16', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/bH1lHCirCGI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(154, 'Call of Duty: Modern Warfare', 'Jeu solo', 'image-original.jpg', 'xboxone', '120', 'Call of Duty: Modern Warfare - un jeu d\'ordinateur dans le genre du jeu de tir Ã  la premiÃ¨re personne, le seiziÃ¨me de la franchise Call of Duty. Le jeu est sorti le 25 octobre 2019. Le jeu est un redÃ©marrage de la sous-sÃ©rie Modern Warfare et n\'est pas une continuation directe de Modern Warfare 3.', '23 aoÃ»t 2019', 'Infinity Ward', '16', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/bH1lHCirCGI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(155, 'Call of Duty: Modern Warfare', 'Jeu solo', 'image-original.jpg', 'pc', '120', 'Call of Duty: Modern Warfare - un jeu d\'ordinateur dans le genre du jeu de tir Ã  la premiÃ¨re personne, le seiziÃ¨me de la franchise Call of Duty. Le jeu est sorti le 25 octobre 2019. Le jeu est un redÃ©marrage de la sous-sÃ©rie Modern Warfare et n\'est pas une continuation directe de Modern Warfare 3.', '23 aoÃ»t 2019', 'Infinity Ward', '16', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/bH1lHCirCGI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(156, 'MW', 'shooter', 'image-original.jpg', 'pc', '80', 'guerre', '05 mars 2020', 'avtion', '18', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/bH1lHCirCGI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `entreprise` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `video` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pc`
--

INSERT INTO `pc` (`id`, `name`, `action`, `image`, `marque`, `prix`, `contenu`, `date`, `entreprise`, `age`, `video`) VALUES
(115, 'Diablo 3', 'arkada', 'Diablo-3-Eternal-Collection.jpg', 'PC', '200', 'Diablo III prend place dans le monde imaginaire médiéval-fantastique de Sanctuaire déjà développé dans les deux premiers opus de la série. L’histoire débute dans le royaume de Khanduras vingt ans après les événements décrits dans Diablo II et Diablo II: Lord of Destruction, qui racontent comment un aventurier est parvenu à vaincre les démons Mephisto, Diablo et Baal après leur retour dans le monde des hommes.', '05 mars 2020', 'Blizzard Entertainment', '12', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/M2TpNQhfkp4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(17, 'Fortnite', 'Battle Royal', '1496928029-3096-jaquette-avant.jpg', 'PC', '200', 'Fortnite est un jeu en ligne développé par Epic Games, Les modes de jeu comportent Fortnite : Sauver le monde, un jeu coopératif de tir et de survie conçu pour quatre joueurs au maximum et dont le but est de combattre les hordes de zombies et de défendre des objets avec des fortifications à construire par le ou les joueurs, et Fortnite Battle Royale, un jeu de bataille royale en free-to-play où jusqu\'à 100 joueurs se battent dans des espaces de plus en plus petits pour finir comme dernière personne debout.', '25 juillet 2017', 'Epic Games', '12', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/2gUtfBmw86Y\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(151, 'Call of Duty: Modern Warfare', 'Jeu solo', 'image-original.jpg', 'pc', '120', 'Call of Duty: Modern Warfare - un jeu d\'ordinateur dans le genre du jeu de tir Ã  la premiÃ¨re personne, le seiziÃ¨me de la franchise Call of Duty. Le jeu est sorti le 25 octobre 2019. Le jeu est un redÃ©marrage de la sous-sÃ©rie Modern Warfare et n\'est pas une continuation directe de Modern Warfare 3.', '23 aoÃ»t 2019', 'Infinity Ward', '16', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/bH1lHCirCGI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `ps4`
--

CREATE TABLE `ps4` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `entreprise` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `video` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps4`
--

INSERT INTO `ps4` (`id`, `name`, `action`, `image`, `marque`, `prix`, `contenu`, `date`, `entreprise`, `age`, `video`) VALUES
(153, 'Call of Duty: Modern Warfare', 'Jeu solo', 'image-original.jpg', 'ps4', '120', 'Call of Duty: Modern Warfare - un jeu d\'ordinateur dans le genre du jeu de tir Ã  la premiÃ¨re personne, le seiziÃ¨me de la franchise Call of Duty. Le jeu est sorti le 25 octobre 2019. Le jeu est un redÃ©marrage de la sous-sÃ©rie Modern Warfare et n\'est pas une continuation directe de Modern Warfare 3.', '23 aoÃ»t 2019', 'Infinity Ward', '16', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/bH1lHCirCGI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(75, 'Destiny 2', 'FPS', 'capsule_616x353_koreana.jpg', 'PS4', '120', 'La dernière cité sur Terre, siège de l\'Avant-garde, est attaquée par les forces Cabals de la Légion Rouge dirigées par le général militaire Cabal : Dominus Ghaul. Les gardiens ont été dépouillés de leurs pouvoirs et de leurs armes, et contraints à fuir. Pour vaincre ces ennemis, ils devront retrouver leurs pouvoirs et s\'aventurer dans de nouveaux mondes pour acquérir de nouvelles armes.', '6 septembre 2017', 'Bungie', '16', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/hdWkpbPTpmE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilephoto` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `email`, `password`, `profilephoto`) VALUES
(1, 'sql', 'sql@sql.sql', '$2y$10$quycVQdomMTNUH7pELx.xOfrz.CD9IR7a6pJYZMBH8tL5qmtYxFHe', 'sql.jpg'),
(3, 'lol', 'lol@lol.lol', '$2y$10$h0BOrMEE5o92aY34.PPbOuAMkFlpN3XWxDXkAB.6zKV.n2fNFBBWy', 'lol.jpg'),
(58, 'alexalex', 'alex@alex', '$2y$10$tzqsssGwmOJPbc9UOxYyeO778.SclV434TEjDiBmyFAJIOWsxpye6', 'bitcoin-mining.png'),
(59, 'yoyoyo', 'yoyoyo@yoyoyo.com', '$2y$10$iOm5Jw4i6WrG2gUlbTGglunzcJ6.wqRjMjPi8bGz7aYE.9yp.NiiG', 'gameover.png');

-- --------------------------------------------------------

--
-- Table structure for table `xboxone`
--

CREATE TABLE `xboxone` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `entreprise` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `video` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xboxone`
--

INSERT INTO `xboxone` (`id`, `name`, `action`, `image`, `marque`, `prix`, `contenu`, `date`, `entreprise`, `age`, `video`) VALUES
(151, 'Call of Duty: Modern Warfare', 'Jeu solo', 'image-original.jpg', 'xboxone', '120', 'Call of Duty: Modern Warfare - un jeu d\'ordinateur dans le genre du jeu de tir Ã  la premiÃ¨re personne, le seiziÃ¨me de la franchise Call of Duty. Le jeu est sorti le 25 octobre 2019. Le jeu est un redÃ©marrage de la sous-sÃ©rie Modern Warfare et n\'est pas une continuation directe de Modern Warfare 3.', '23 aoÃ»t 2019', 'Infinity Ward', '16', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/bH1lHCirCGI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(98, 'Yoshis', 'Aventure', 'H2x1_NSwitch_YoshisCraftedWorld.jpg', 'XBOXONE', '70', 'Découvrez la face cachée du monde de Yoshi !\r\n\r\nMenez Yoshi à travers une toute nouvelle aventure qui va renverser votre perspective des jeux de plateforme tels que vous les connaissez !\r\n\r\nExplorez un monde gigantesque décoré à la manière d\'un diorama miniature avec des objets du quotidien comme des boîtes ou des gobelets en papier, où chaque stage à défilement latéral possède à la fois un avant-plan, mais également une face cachée avec différents points de vue qui offrent bien des surprises.', '29 mars 2019', 'Good-Feel', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/sx_C9jJ0AlA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps4`
--
ALTER TABLE `ps4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `xboxone`
--
ALTER TABLE `xboxone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `console`
--
ALTER TABLE `console`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `pc`
--
ALTER TABLE `pc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `ps4`
--
ALTER TABLE `ps4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `xboxone`
--
ALTER TABLE `xboxone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
