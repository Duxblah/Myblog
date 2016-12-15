-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Jeu 15 Décembre 2016 à 02:29
-- Version du serveur :  5.6.28
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ecv_myblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `id_user`, `title`, `content`, `created`, `updated`) VALUES
(4, 10, 'Lorem ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut libero vitae magna suscipit tempor. Maecenas sit amet mi sit amet risus fringilla faucibus. Duis tincidunt id leo eget rhoncus. Vestibulum vel semper dolor. Quisque ac rhoncus nunc, id ultrices leo. Fusce vitae efficitur ipsum, et iaculis odio. Praesent et placerat nibh, in pulvinar diam. Morbi in mi sit amet risus egestas porttitor sed eu tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean auctor velit sed dui suscipit consequat. Morbi id bibendum libero, quis facilisis magna. Nunc rutrum diam finibus sem ullamcorper molestie. Praesent augue sapien, commodo et lorem in, tempor semper felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>', '2016-12-13 23:52:38', '2016-12-13 23:52:38'),
(7, 10, 'Lorem ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut libero vitae magna suscipit tempor. Maecenas sit amet mi sit amet risus fringilla faucibus. Duis tincidunt id leo eget rhoncus. Vestibulum vel semper dolor. Quisque ac rhoncus nunc, id ultrices leo. Fusce vitae efficitur ipsum, et iaculis odio. Praesent et placerat nibh, in pulvinar diam. Morbi in mi sit amet risus egestas porttitor sed eu tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean auctor velit sed dui suscipit consequat. Morbi id bibendum libero, quis facilisis magna. Nunc rutrum diam finibus sem ullamcorper molestie. Praesent augue sapien, commodo et lorem in, tempor semper felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>', '2016-12-13 23:52:38', '2016-12-13 23:52:38'),
(9, 11, 'NOUVELLE CHAUSSURE', '<div id="TheTexte" class="Texte" lang="zxx">\n<p>Ex his quidam aeternitati se commendari posse per statuas aestimantes eas ardenter adfectant quasi plus praemii de figmentis aereis sensu carentibus adepturi, quam ex conscientia honeste recteque factorum, easque auro curant inbracteari, quod Acilio Glabrioni delatum est primo, cum consiliis armisque regem superasset Antiochum. quam autem sit pulchrum exigua haec spernentem et minima ad ascensus verae gloriae tendere longos et arduos, ut memorat vates Ascraeus, Censorius Cato monstravit. qui interrogatus quam ob rem inter multos... statuam non haberet malo inquit ambigere bonos quam ob rem id non meruerim, quam quod est gravius cur inpetraverim mussitare.</p>\n<p>Vide, quantum, inquam, fallare, Torquate. oratio me istius philosophi non offendit; nam et complectitur verbis, quod vult, et dicit plane, quod intellegam; et tamen ego a philosopho, si afferat eloquentiam, non asperner, si non habeat, non admodum flagitem. re mihi non aeque satisfacit, et quidem locis pluribus. sed quot homines, tot sententiae; falli igitur possumus.</p>\n<p>Cum saepe multa, tum memini domi in hemicyclio sedentem, ut solebat, cum et ego essem una et pauci admodum familiares, in eum sermonem illum incidere qui tum forte multis erat in ore. Meministi enim profecto, Attice, et eo magis, quod P. Sulpicio utebare multum, cum is tribunus plebis capitali odio a Q. Pompeio, qui tum erat consul, dissideret, quocum coniunctissime et amantissime vixerat, quanta esset hominum vel admiratio vel querella.</p>\n</div>', '2016-12-14 00:28:49', '2016-12-14 00:28:49'),
(35, 10, 'ss', '<p>ss</p>', '2016-12-15 02:19:16', '2016-12-15 02:19:16');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `content` varchar(1024) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_article`, `content`, `created`) VALUES
(1, 10, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae varius nisi. Aliquam gravida sit amet est sit amet vehicula. Sed id rutrum leo. In finibus lacinia nisi quis tincidunt. Fusce tempus ultrices sapien id semper. Suspendisse nibh eros, lobortis vitae lobortis sit amet, ullamcorper eu lacus. Aliquam lobortis, leo id egestas aliquam, urna lectus lobortis felis, at aliquet neque massa luctus elit. Duis consectetur iaculis enim eu varius. ', '2016-12-13 21:28:43'),
(2, 0, 9, '<p>sss</p>', '2016-12-14 22:38:48');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `label` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `label`) VALUES
(1, 'Membre'),
(2, 'Blogger'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `id_role` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `password`, `email`, `id_role`, `created`) VALUES
(10, 'Kize', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test@test.com', 3, '2016-12-13 23:20:55'),
(11, 'Kize2', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test@test2.com', 1, '2016-12-13 23:28:07');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;