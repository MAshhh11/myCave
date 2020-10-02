-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 02 oct. 2020 à 16:02
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mycave`
--

-- --------------------------------------------------------

--
-- Structure de la table `rate`
--

CREATE TABLE `rate` (
  `id_rate` int(11) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_wine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rate`
--

INSERT INTO `rate` (`id_rate`, `user_fullname`, `rate`, `comment`, `id_user`, `id_wine`) VALUES
(7, 'Marion Londero', 4, 'Not bad at all! I would recommend this wine!', 3, 5),
(8, 'Marion Londero', 3, 'I had fun drinking that wine!', 3, 4),
(9, 'Marion Londero', 5, 'I absolutely love that wine!', 3, 6),
(10, 'Marion Londero', 4, 'My mum would recommend that wine without a doubt!', 3, 7),
(11, 'Marion Londero', 1, 'This wine is poor... it\'s a shame!', 3, 8),
(12, 'Dana Scully', 5, 'I love this wine!', 4, 5),
(13, 'Dana Scully', 2, 'Im not sure to like it!', 4, 4),
(14, 'Dana Scully', 5, 'Im a fan of that wine! So tasty!', 4, 6),
(15, 'Marion Londero', 3, 'Im not sur about that wine, i think it is a bit young..', 3, 12),
(16, 'Marion Londero', 5, 'Perfect!', 3, 10),
(18, 'Marion Londero', 5, 'Superb!', 3, 11),
(19, 'Marion Londero', 3, 'Im ok with this wine!', 3, 16);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(3, 'Marion', 'Londero', 'marion@mail.com', '$2y$10$UwFiG/umESyzYqsJ9LlDLeXPQb21yKLZ08lfb0VX/Mhm.hyDIhzqO'),
(4, 'Dana', 'Scully', 'user@mail.com', '$2y$10$2b/eHMFupFdFGSNMNwyhB.fDi0dtajuYA0UL50.zbj5V29SmTdXRm'),
(8, 'Fox', 'Mulder', 'user2@mail.com', '$2y$10$wTG2gNi8If8kT5DP.zow2OK5f3LcGshAmHKetsbUK7nZJfMWak7b6');

-- --------------------------------------------------------

--
-- Structure de la table `wine`
--

CREATE TABLE `wine` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `grapes` varchar(255) NOT NULL,
  `wine_year` varchar(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `region` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `publishDate` date DEFAULT current_timestamp(),
  `count_rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `wine`
--

INSERT INTO `wine` (`id`, `name`, `grapes`, `wine_year`, `country`, `region`, `description`, `picture`, `id_user`, `publishDate`, `count_rate`) VALUES
(4, 'CHATEAU DE SAINT COSME', 'Grenache / Syrah', '2009', 'FRANCE', 'Southern Rhone / Gigondas', 'The aromas of fruit and spice give one a hint of the light drinkability of this lovely wine, which makes an excellent complement to fish dishes.', 'upload/img/5f64b22b3f975_generic.jpg', 4, '2020-09-18', 2),
(5, 'LAN RIOJA CRIANZA', 'Tempranillo', '2006', 'SPAIN', 'Rioja', 'A resurgence of interest in boutique vineyards has opened the door for this excellent foray into the dessert wine market. Light and bouncy, with a hint of black truffle, this wine will not fail to tickle the taste buds.', 'upload/img/5f64b26b4da21_lan_rioja.jpg', 4, '2020-09-18', 2),
(7, 'OWEN ROE &quot;EX UMBRIS&quot;', 'Syrah', '2009', 'USA', 'Washington', '&quot;A one-two punch of black pepper and jalapeno will send your senses reeling, as the orange essence snaps you back to reality. Don\'t miss this award-winning taste sensation.&quot;', 'upload/img/5f64b76ec1a46_ex_umbris.jpg', 4, '2020-09-18', 1),
(8, 'REX HILL', 'Pinot Noir', '2009', 'USA', 'Oregon', '&quot;One cannot doubt that this will be the wine served at the Hollywood award shows, because it has undeniable star power. Be the first to catch the debut that everyone will be talking about tomorrow.&quot;', 'upload/img/5f64b887d94ec_rex_hill.jpg', 4, '2020-09-18', 1),
(9, 'VITICCIO CLASSICO RISERVA', 'Sangiovese Merlot', '2007', 'ITALY', 'Tuscany', 'Though soft and rounded in texture, the body of this wine is full and rich and oh-so-appealing. This delivery is even more impressive when one takes note of the tender tannins that leave the taste buds wholly satisfied.', 'upload/img/5f64b8cd7bde6_viticcio.jpg', 4, '2020-09-18', 0),
(10, 'CHATEAU LE DOYENNE', 'Merlot', '2005', 'FRANCE', 'Bordeaux', '&quot;Though dense and chewy, this wine does not overpower with its finely balanced depth and structure. It is a truly luxurious experience for the senses.&quot;', 'upload/img/5f64b903710f6_le_doyenne.jpg', 6, '2020-09-18', 1),
(11, 'DOMAINE DU BOUSCAT', 'Merlot', '2009', 'FRANCE', 'Bordeaux', 'The light golden color of this wine belies the bright flavor it holds. A true summer wine, it begs for a picnic lunch in a sun-soaked vineyard.', 'upload/img/5f64b9f503a39_bouscat.jpg', 6, '2020-09-18', 1),
(12, 'BLOCK NINE', 'Pinot Noir', '2009', 'USA', 'California', 'With hints of ginger and spice, this wine makes an excellent complement to light appetizer and dessert fare for a holiday gathering.', 'upload/img/5f64ba435a946_block_nine.jpg', 6, '2020-09-18', 1),
(13, 'DOMAINE SERENE', 'Pinot Noir', '2007', 'USA', 'Oregon', 'Though subtle in its complexities, this wine is sure to please a wide range of enthusiasts. Notes of pomegranate will delight as the nutty finish completes the picture of a fine sipping experience.', 'upload/img/5f6b0e811433f_domaine_serene.jpg', 3, '2020-09-18', 0),
(14, 'BODEGA LURTON', 'Pinot Gris', '2011', 'ARGENTINA', 'Mendoza', 'Solid notes of black currant blended with a light citrus make this wine an easy pour for varied palates.', 'upload/img/5f6b245bd246d_bodega_lurton.jpg', 6, '2020-09-23', 0),
(15, 'LES MORIZOTTES', 'Chardonnay', '2009', 'FRANCE', 'Burgundy', 'Breaking the mold of the classics, this offering will surprise and undoubtedly get tongues wagging with the hints of coffee and tobacco in perfect alignment with more traditional notes. ', 'upload/img/5f6b4f8d384f9_morizottes.jpg', 6, '2020-09-23', 0),
(16, 'MARGERUM SYBARITE', 'Sauvignon Blanc', '2010', 'USA', 'California Central Cosat', 'The cache of a fine Cabernet in ones wine cellar can now be replaced with a childishly playful wine bubbling over with tempting tastes of black cherry and licorice. This is a taste sure to transport you back in time.', 'upload/img/5f773286d38d9_margerum.jpg', 3, '2020-10-02', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id_rate`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `wine`
--
ALTER TABLE `wine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `rate`
--
ALTER TABLE `rate`
  MODIFY `id_rate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `wine`
--
ALTER TABLE `wine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
