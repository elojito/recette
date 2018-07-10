--
-- Base de données :  `recettes`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idCat` int(11) NOT NULL,
  `nomCat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`idCat`, `nomCat`) VALUES
(1, 'cuisine sucrée'),
(2, 'cuisine salée'),
(3, 'recette cosmétique'),
(4, 'recette ménagère');

-- --------------------------------------------------------

--
-- Structure de la table `fiche`
--

CREATE TABLE `fiche` (
  `idFiche` int(11) NOT NULL,
  `nomFiche` text NOT NULL,
  `descriptif` text NOT NULL,
  `catFiche` int(11) NOT NULL,
  `modop` text NOT NULL,
  `imageFiche` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `idImage` int(11) NOT NULL,
  `nom` varchar(19) NOT NULL,
  `size` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `idIng` int(11) NOT NULL,
  `nomIng` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mesure`
--

CREATE TABLE `mesure` (
  `idMes` int(11) NOT NULL,
  `nomMesure` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mesure`
--

INSERT INTO `mesure` (`idMes`, `nomMesure`) VALUES
(1, 'g'),
(2, 'l'),
(3, 'kg'),
(4, 'cl'),
(5, 'ml');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `idRecette` int(11) NOT NULL,
  `ingredients` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `mesureIng` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCat`);

--
-- Index pour la table `fiche`
--
ALTER TABLE `fiche`
  ADD PRIMARY KEY (`idFiche`),
  ADD KEY `catFiche` (`catFiche`),
  ADD KEY `imageFiche` (`imageFiche`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idImage`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`idIng`);

--
-- Index pour la table `mesure`
--
ALTER TABLE `mesure`
  ADD PRIMARY KEY (`idMes`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD KEY `idRecette` (`idRecette`),
  ADD KEY `ingredients` (`ingredients`),
  ADD KEY `mesureIng` (`mesureIng`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `fiche`
--
ALTER TABLE `fiche`
  MODIFY `idFiche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `idIng` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `mesure`
--
ALTER TABLE `mesure`
  MODIFY `idMes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `fiche`
--
ALTER TABLE `fiche`
  ADD CONSTRAINT `fiche_ibfk_1` FOREIGN KEY (`catFiche`) REFERENCES `category` (`idCat`),
  ADD CONSTRAINT `fiche_ibfk_2` FOREIGN KEY (`imageFiche`) REFERENCES `image` (`idImage`);

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `recette_ibfk_1` FOREIGN KEY (`idRecette`) REFERENCES `fiche` (`idFiche`) ON DELETE CASCADE,
  ADD CONSTRAINT `recette_ibfk_2` FOREIGN KEY (`ingredients`) REFERENCES `ingredients` (`idIng`),
  ADD CONSTRAINT `recette_ibfk_3` FOREIGN KEY (`mesureIng`) REFERENCES `mesure` (`idMes`);


