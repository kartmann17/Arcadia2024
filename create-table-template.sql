-- Active: 1725541943115@@mysql-blanchet.alwaysdata.net@3306@blanchet_ecf_arcadia

CREATE TABLE `addavis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etoiles` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `commentaire` text NOT NULL,
  `date` date NOT NULL,
  `valide` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
)

CREATE TABLE `Animal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `id_race` int(11) DEFAULT NULL,
  `id_habitat` int(11) NOT NULL,
  `visite` int(11) DEFAULT 0,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_race` (`id_race`),
  KEY `Animal_ibfk_2` (`id_habitat`),
  CONSTRAINT `Animal_ibfk_1` FOREIGN KEY (`id_race`) REFERENCES `Race` (`id`),
  CONSTRAINT `Animal_ibfk_2` FOREIGN KEY (`id_habitat`) REFERENCES `Habitat` (`id`) ON UPDATE CASCADE
)

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
)

CREATE TABLE `Habitat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  UNIQUE KEY `img` (`img`)
)
CREATE TABLE `Race` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `race` (`race`)
)
CREATE TABLE `Rapport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `nourriture_reco` varchar(255) DEFAULT NULL,
  `grammage_reco` int(11) DEFAULT NULL,
  `sante` varchar(255) DEFAULT NULL,
  `repas_donnees` varchar(255) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `commentaire` text DEFAULT NULL,
  `id_User` int(11) NOT NULL,
  `id_animal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_User` (`id_User`),
  KEY `id_animal` (`id_animal`),
  CONSTRAINT `Rapport_ibfk_1` FOREIGN KEY (`id_User`) REFERENCES `User` (`id`),
  CONSTRAINT `Rapport_ibfk_2` FOREIGN KEY (`id_animal`) REFERENCES `Animal` (`id`)
)

CREATE TABLE `Role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role` (`role`)
)

CREATE TABLE `Service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `Service_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `User` (`id`)
)

CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `User_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `Role` (`id`)
)
