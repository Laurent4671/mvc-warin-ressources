
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- -----------------------------------------------------------

-- Base de données :  `mvc_warin_ressources`

CREATE DATABASE IF NOT EXISTS `mvc_warin_ressources` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;


USE `mvc_warin_ressources`;



/* -----------------------------------------------------------
   USERS
----------------------------------------------------------- */

-- Structure de la table `user`

DROP TABLE IF EXISTS `users`;
	CREATE TABLE `users` (
	`user_id` int(3) NOT NULL AUTO_INCREMENT,
	`user_login` varchar(255) NOT NULL,
	`user_password` varchar(32) NOT NULL,
	`user_pseudo` varchar(20) NOT NULL,
	PRIMARY KEY (user_id)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Vider la table avant d'insérer `user`

TRUNCATE TABLE `users`;



-- Contenu de la table `user`

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_pseudo`) VALUES
(1, 'admin@admin.be', '21232f297a57a5a743894a0e4a801fc3', 'Laurent');



/* -----------------------------------------------------------
   ACCUEIL
----------------------------------------------------------- */



/* -----------------------------------------------------------
   SNIPPETS
----------------------------------------------------------- */



/* -----------------------------------------------------------
   CATEGORIES
----------------------------------------------------------- */

-- Structure de la table `categories`

DROP TABLE IF EXISTS `categories`;
	CREATE TABLE `categories` (
	`categorie_id` int(2) NOT NULL AUTO_INCREMENT,
	  `categorie_titre` varchar(50) NOT NULL,
	  `is_visible` enum('0','1') NOT NULL DEFAULT '1',
	  PRIMARY KEY (categorie_id)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Vider la table avant d'insérer `categories`

TRUNCATE TABLE `categories`;



-- Contenu de la table `categories`

INSERT INTO `categories` (`categorie_id`, `categorie_titre`, `is_visible`) VALUES
(1, 'HTML &amp; CSS', '1'),
(2, 'Préprocesseur SASS', '1'),
(3, 'Grilles', '1'),
(4, 'Responsive', '1'),
(5, 'SVG', '1'),
(6, 'PHP', '1'),
(7, 'Javascript', '1'),
(8, 'Frameworks', '1'),
(9, 'Faux contenu', '1'),
(10, 'Unicode', '1'),
(11, 'Polices d\'écriture', '1'),
(12, 'Images', '1'),
(13, 'Couleur', '1'),
(14, 'Icones &amp; Logos', '1'),
(15, 'Corrections', '1'),
(16, 'SEO', '1'),
(17, 'Extensions navigateurs', '1'),
(18, 'Photoshop', '1'),
(19, 'Partage de fichiers', '1'),
(20, 'Non classé', '1');



/* -----------------------------------------------------------
   SOUS-CATEGORIES
----------------------------------------------------------- */

-- Structure de la table `sous_categ`

DROP TABLE IF EXISTS `sous_categs`;
	CREATE TABLE `sous_categs` (
	`sous_categ_id` int(2) NOT NULL AUTO_INCREMENT,
	  `categorie_id` int(2) NOT NULL,
	  `sous_categ_titre` varchar(50) NOT NULL,
	  `is_visible` enum('0','1') NOT NULL DEFAULT '1',
	  PRIMARY KEY (sous_categ_id)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;


/* -----------------------------------------------------------
-- CONTRAINTES pour les tables exportées
----------------------------------------------------------- */

-- Recréation de la clé avec les bonnes options

ALTER TABLE sous_categs

ADD CONSTRAINT sous_categ_id
	FOREIGN KEY (categorie_id)
	REFERENCES categories(categorie_id)
	ON DELETE RESTRICT
	ON UPDATE RESTRICT;



-- Vider la table avant d'insérer `sous_categ`

TRUNCATE TABLE `sous_categs`;



-- Contenu de la table `sous_categ`

INSERT INTO `sous_categs` (`sous_categ_id`, `categorie_id`, `sous_categ_titre`, `is_visible`) VALUES
(1, 1, 'Documentation', '1'),
(2, 1, 'HTML', '1'),
(3, 1, 'CSS', '1'),
(4, 1, 'Générateurs', '1'),
(5, 1, 'Convertisseurs', '1'),
(6, 1, 'Divers', '1'),
(7, 2, 'SASS', '1'),
(8, 2, 'Documentation', '1'),
(9, 3, 'Générateurs', '1'),
(10, 3, 'Grilles CSS', '1'),
(11, 4, 'Informations', '1'),
(12, 4, 'Emulateurs', '1'),
(13, 4, 'SVG', '1'),
(14, 4, 'Générateurs', '1'),
(15, 4, 'Navigation', '1'),
(16, 5, 'Documentation', '1'),
(17, 5, 'Icônes', '1'),
(18, 5, 'Motifs', '1'),
(19, 5, 'Effets', '1'),
(20, 5, 'Divers', '1'),
(21, 6, 'Snippets &amp; fonctions', '1'),
(22, 7, 'Navigation', '1'),
(23, 7, 'Lightbox', '1'),
(24, 7, 'Formulaires', '1'),
(25, 7, 'Calendriers', '1'),
(26, 7, 'Navigateurs périmés', '1'),
(27, 8, 'Frameworks HTML/CSS', '1'),
(28, 8, 'Générateurs', '1'),
(29, 8, 'Divers', '1'),
(30, 9, 'Texte', '1'),
(31, 9, 'Images', '1'),
(32, 10, 'Caractères spéciaux', '1'),
(33, 11, 'Comparateurs &amp; testeurs', '1'),
(34, 11, 'Convertisseur polices', '1'),
(35, 11, 'Fontes à télécharger', '1'),
(36, 11, 'Fontes en ligne', '1'),
(37, 11, 'Divers', '1'),
(38, 12, 'Compression', '1'),
(39, 12, 'Motifs', '1'),
(40, 12, 'Banques d\'images libres', '1'),
(41, 12, 'Divers', '1'),
(42, 13, 'Divers', '1'),
(43, 14, 'Images', '1'),
(44, 14, 'CSS', '1'),
(45, 14, 'Divers', '1'),
(46, 15, 'Validation', '1'),
(47, 15, 'Optimisation', '1'),
(48, 16, 'Audit de site web', '1'),
(49, 16, 'Recherche de backlinks', '1'),
(50, 16, 'Divers', '1'),
(51, 17, 'Mozilla Firefox', '1'),
(52, 17, 'Google Chrome', '1'),
(53, 18, 'Squelettes', '1'),
(54, 18, 'Scripts (gratuits)', '1'),
(55, 18, 'Articles', '1'),
(56, 18, 'Divers', '1'),
(57, 19, 'Divers', '1'),
(58, 20, 'NetBeans', '1'),
(59, 20, 'Divers', '1');



/* -----------------------------------------------------------
   RESSOURCES
----------------------------------------------------------- */

-- Structure de la table `ressources`

DROP TABLE IF EXISTS `ressources`;
	CREATE TABLE `ressources` (
	`ressource_id` int(4) NOT NULL AUTO_INCREMENT,
	  `sous_categ_id` int(2) NOT NULL,
	  `ressource_titre` varchar(255) NOT NULL,
	  `ressource_url_href` text NOT NULL,
	  `ressource_url_title` text NOT NULL,
	  `ressource_img_src` varchar(255) NOT NULL,
	  `ressource_img_alt` text,
	  `ressource_date` date DEFAULT NULL,
	  `is_visible` enum('0','1') NOT NULL DEFAULT '1',
	  PRIMARY KEY (ressource_id)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;


/* -----------------------------------------------------------
-- CONTRAINTES pour les tables exportées
----------------------------------------------------------- */

ALTER TABLE ressources

ADD CONSTRAINT ressource_id
	FOREIGN KEY (sous_categ_id)
	REFERENCES sous_categs(sous_categ_id)
	ON DELETE RESTRICT
	ON UPDATE RESTRICT;



-- Vider la table avant d'insérer `ressources`

TRUNCATE TABLE `ressources`;



-- Contenu de la table `ressources`

INSERT INTO `ressources` (`ressource_id`, `sous_categ_id`, `ressource_titre`, `ressource_url_href`, `ressource_url_title`, `ressource_img_src`, `ressource_img_alt`, `ressource_date`, `is_visible`) VALUES
(1, 1, 'Mozilla Developer Network', 'https://developer.mozilla.org/fr/', 'Documentation sur les technologies Web pour Développeurs', 'mozilla-developer-network.jpg', 'Mozilla Developer Network', '2016-01-15', '1'),
(2, 1, '24 jours de web', 'http://www.24joursdeweb.fr/', 'Le calendrier de l\'avent des gens qui font le web d\'après', '24jours-de-web.jpg', '24 jours de web', '2016-01-15', '1'),



(3, 2, 'Commentaires conditionnels', 'http://www.alsacreations.com/astuce/lire/48-commentaires-conditionnels.html', 'Notation des commentaires conditionnels pour Internet Explorer', 'commentaires-conditionnels-alsacreations.jpg', 'commentaires conditionnels pour IE', '2016-01-15', '1'),
(4, 2, 'Balises HTML5', 'https://www.vectorskin.com/referentiels-standards-w3c/balises-html5/', 'Liste des balises HTML5 - Aide mémoire et liens vers le W3C', 'liste-balises-html5.jpg', 'Liste des balises HTML5', '2016-01-15', '1'),
(5, 2, 'Attributs globaux HTML5', 'http://www.alsacreations.com/tuto/lire/1401-attributs-hidden-contenteditable-contextmenu-spellcheck.html', 'Attributs globaux (hidden, contenteditable, contextmenu et spellcheck)', 'attributs-globaux.jpg', 'Attributs globaux HTML5', '2016-01-15', '1'),
(6, 2, 'La balise BASE', 'http://lilleweb.fr/html/2014/08/22/balise-html-base/', 'Découvrez la balise base qui vous permet de spécifier un préfixe pour les URL relative', 'balise-base.jpg', 'La balise base', '2016-01-15', '1'),
(7, 2, 'Balises META courantes', 'http://devset.be/518-la-danse-des-metas/', 'De Facebook à Google en passant par Apple, voici les balises META les plus courantes', 'danse-des-metas.jpg', 'La danse des balises metas', '2016-01-15', '1');


-- -----------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
