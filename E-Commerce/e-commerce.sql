-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 12:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `idCategorie` int(11) NOT NULL,
  `designationCat` varchar(30) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`idCategorie`, `designationCat`, `description`) VALUES
(1, 'Produits de beauté', 'conçus pour sublimer votre peau, vos cheveux et votre style. Des crèmes hydratantes aux parfums en passant par les palettes de maquillage, trouvez tout ce dont vous avez besoin pour rayonner au quotidien.'),
(2, 'Équipement de sport', 'un adepte de la musculation ou un passionné de course à pied, nous avons tout ce qu\'il vous faut pour vous aider à atteindre vos objectifs de remise en forme.'),
(3, 'Électronique', 'Des smartphones aux ordinateurs portables en passant par les enceintes Bluetooth, trouvez les dernières nouveautés pour rester connecté et divertir.'),
(4, 'Mode', 'Des robes de soirée aux jeans slim en passant par les sacs à main en cuir, trouvez les pièces essentielles pour compléter votre garde-robe avec élégance.'),
(5, 'Articles de sport ', 'des équipements de camping, des vêtements de sport, des chaussures de randonnée, des vélos, des équipements de fitness, des tentes, des sacs à dos, des équipements de pêche');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `idClient` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`idClient`, `nom`, `prenom`, `tel`, `email`, `adresse`, `login`, `pwd`) VALUES
(1, 'Smith', 'Emma', '1234567891', 'emma.smith@example.com', '456 rue Belle', 'login1', 'password1'),
(2, 'Johnson', 'Michael', '1234567892', 'michael.johnson@example.com', '789 avenue Magnifique', 'login2', 'password2'),
(3, 'Williams', 'Sophia', '1234567893', 'sophia.williams@example.com', '1011 boulevard Charmant', 'login3', 'password3'),
(4, 'Brown', 'James', '1234567894', 'james.brown@example.com', '1213 rue Jolie', 'login4', 'password4'),
(5, 'Jones', 'Olivia', '1234567895', 'olivia.jones@example.com', '1415 avenue Belle', 'login5', 'password5'),
(6, 'Garcia', 'Daniel', '1234567896', 'daniel.garcia@example.com', '1617 boulevard Magnifique', 'login6', 'password6'),
(7, 'Miller', 'Isabella', '1234567897', 'isabella.miller@example.com', '1819 rue Charmant', 'login7', 'password7'),
(8, 'Davis', 'Matthew', '1234567898', 'matthew.davis@example.com', '2021 avenue Jolie', 'login8', 'password8'),
(9, 'Rodriguez', 'Emily', '1234567899', 'emily.rodriguez@example.com', '2223 boulevard Belle', 'login9', 'password9'),
(10, 'Martinez', 'David', '1234567800', 'david.martinez@example.com', '2425 rue Magnifique', 'login10', 'password10'),
(11, 'El Haddadi', 'Fatima', '0612345678', 'fatima.elhaddadi@example.ma', 'Rue Ibn Sina, Casablanca', 'login11', 'password11'),
(12, 'Bouazzaoui', 'Mohammed', '0612345679', 'mohammed.bouazzaoui@example.ma', 'Avenue Hassan II, Rabat', 'login12', 'password12'),
(13, 'Ouahbi', 'Nadia', '0612345680', 'nadia.ouahbi@example.ma', 'Boulevard Mohammed V, Marrakech', 'login13', 'password13'),
(14, 'Sidiqi', 'Ahmed', '0612345681', 'ahmed.sidiqi@example.ma', 'Rue Ibn Khaldoun, Fès', 'login14', 'password14'),
(15, 'Zerouali', 'Zineb', '0612345682', 'zineb.zerouali@example.ma', 'Avenue Mohammed VI, Tanger', 'login15', 'password15'),
(16, 'El Khattabi', 'Sofia', '0612345683', 'sofia.elkhattabi@example.ma', 'Boulevard Al Massira, Agadir', 'login16', 'password16'),
(17, 'Hakimi', 'Youssef', '0612345684', 'youssef.hakimi@example.ma', 'Rue Mohammed El Qorry, Oujda', 'login17', 'password17'),
(18, 'Bentaleb', 'Fatima Zahra', '0612345685', 'fzahra.bentaleb@example.ma', 'Avenue Moulay Ismaïl, Meknès', 'login18', 'password18'),
(19, 'Fassi', 'Ali', '0612345686', 'ali.fassi@example.ma', 'Rue Ahmed El Majdoubi, Tangier', 'login19', 'password19'),
(20, 'Chakir', 'Nawal', '0612345687', 'nawal.chakir@example.ma', 'Boulevard Al Massira Al Khadra, Marrakech', 'login20', 'password20'),
(21, 'Al-Mansouri', 'Layla', '0612345688', 'layla.almansouri@example.com', 'Rue Al-Khwarizmi, Riyadh, Saudi Arabia', 'login21', 'password21'),
(22, 'Abdelhakim', 'Youssef', '0612345689', 'youssef.abdelhakim@example.com', 'Avenue Al-Mutanabbi, Baghdad, Iraq', 'login22', 'password22'),
(23, 'Omar', 'Aisha', '0612345690', 'aisha.omar@example.com', 'Boulevard Ibn Battuta, Cairo, Egypt', 'login23', 'password23'),
(24, 'Al-Farsi', 'Ali', '0612345691', 'ali.alfarsi@example.com', 'Rue Al-Mutanabbi, Baghdad, Iraq', 'login24', 'password24'),
(25, 'Ahmad', 'Nour', '0612345692', 'nour.ahmad@example.com', 'Avenue Al-Qasim, Medina, Saudi Arabia', 'login25', 'password25'),
(26, 'Saeed', 'Lina', '0612345693', 'lina.saeed@example.com', 'Rue Al-Ghazali, Damascus, Syria', 'login26', 'password26'),
(27, 'Khalid', 'Amira', '0612345694', 'amira.khalid@example.com', 'Boulevard Al-Mansur, Baghdad, Iraq', 'login27', 'password27'),
(28, 'Mahmoud', 'Yara', '0612345695', 'yara.mahmoud@example.com', 'Avenue Al-Razi, Aleppo, Syria', 'login28', 'password28'),
(29, 'Al-Maghribi', 'Omar', '0612345696', 'omar.almaghribi@example.com', 'Rue Al-Sayyid, Tripoli, Libya', 'login29', 'password29'),
(30, 'Al-Jamal', 'Hassan', '0612345697', 'hassan.aljamal@example.com', 'Avenue Al-Khaldiya, Sanaa, Yemen', 'login30', 'password30');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `idCommande` int(11) NOT NULL,
  `dateCommande` datetime NOT NULL,
  `etat` int(11) NOT NULL,
  `adresseLivraison` varchar(150) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`idCommande`, `dateCommande`, `etat`, `adresseLivraison`, `idClient`) VALUES
(1, '2024-02-18 21:53:37', 0, '456 rue Belle', 1),
(2, '2024-02-18 21:54:49', 0, '456 rue Belle', 1),
(3, '2024-02-18 21:58:13', 0, '456 rue Belle', 1),
(4, '2024-02-18 21:58:36', 0, '456 rue Belle', 1),
(5, '2024-02-18 21:58:36', 0, '456 rue Belle', 1),
(6, '2024-02-18 21:58:49', 0, '456 rue Belle', 1),
(7, '2024-02-18 22:02:20', 0, '789 avenue Magnifique', 2),
(8, '2024-02-18 22:18:12', 0, '1415 avenue Belle', 5),
(9, '2024-02-18 22:20:11', 0, '1415 avenue Belle', 5),
(10, '2024-02-18 22:23:58', 0, '456 rue Belle', 1),
(11, '2024-02-18 22:24:32', 0, '456 rue Belle', 1),
(12, '2024-02-18 22:27:38', 0, '456 rue Belle', 1),
(13, '2024-02-18 22:32:01', 0, '456 rue Belle', 1),
(14, '2024-02-18 23:11:13', 0, '456 rue Belle', 1),
(15, '2024-02-18 23:11:37', 0, '456 rue Belle', 1),
(16, '2024-02-18 23:12:59', 0, '456 rue Belle', 1),
(17, '2024-02-18 23:14:12', 0, '456 rue Belle', 1),
(18, '2024-02-18 23:15:33', 0, '456 rue Belle', 1),
(19, '2024-02-18 23:17:52', 0, '456 rue Belle', 1),
(20, '2024-02-18 23:19:37', 0, '456 rue Belle', 1),
(21, '2024-02-18 23:42:54', 0, '456 rue Belle', 1),
(22, '2024-02-18 23:47:02', 0, '456 rue Belle', 1),
(23, '2024-02-18 23:48:13', 0, '456 rue Belle', 1),
(24, '2024-02-18 23:56:29', 0, '456 rue Belle', 1),
(25, '2024-02-18 23:57:25', 0, '456 rue Belle', 1),
(26, '2024-02-19 00:03:42', 0, '456 rue Belle', 1),
(27, '2024-02-19 00:05:54', 0, '456 rue Belle', 1),
(28, '2024-02-19 00:06:26', 0, '456 rue Belle', 1),
(29, '2024-02-19 00:06:55', 0, '456 rue Belle', 1),
(30, '2024-02-19 00:07:14', 0, '456 rue Belle', 1),
(31, '2024-02-19 00:07:41', 0, '456 rue Belle', 1),
(32, '2024-02-19 00:09:31', 0, '456 rue Belle', 1),
(33, '2024-02-19 00:09:41', 0, '456 rue Belle', 1),
(34, '2024-02-19 00:25:14', 0, '456 rue Belle', 1),
(35, '2024-02-19 00:25:56', 0, '456 rue Belle', 1),
(36, '2024-02-19 00:27:12', 0, '456 rue Belle', 1),
(37, '2024-02-19 00:30:03', 0, '456 rue Belle', 1),
(38, '2024-02-19 00:32:16', 0, '456 rue Belle', 1),
(39, '2024-02-19 00:33:22', 0, '456 rue Belle', 1),
(40, '2024-02-19 00:34:10', 0, '456 rue Belle', 1),
(41, '2024-02-19 00:34:53', 0, '456 rue Belle', 1),
(42, '2024-02-19 00:35:28', 0, '456 rue Belle', 1),
(43, '2024-02-19 00:37:07', 0, '456 rue Belle', 1),
(44, '2024-02-19 00:37:27', 0, '456 rue Belle', 1),
(45, '2024-02-19 00:40:46', 0, '456 rue Belle', 1),
(46, '2024-02-19 00:41:31', 0, '456 rue Belle', 1),
(47, '2024-02-19 00:44:20', 0, '456 rue Belle', 1),
(48, '2024-02-19 00:46:06', 0, '456 rue Belle', 1),
(49, '2024-02-19 00:46:56', 0, '456 rue Belle', 1),
(50, '2024-02-19 00:48:20', 0, '456 rue Belle', 1),
(51, '2024-02-19 00:55:14', 0, '456 rue Belle', 1),
(52, '2024-02-19 00:56:38', 0, '456 rue Belle', 1),
(53, '2024-02-19 00:57:06', 0, '456 rue Belle', 1),
(54, '2024-02-19 00:59:06', 0, '456 rue Belle', 1),
(55, '2024-02-19 01:03:03', 0, '456 rue Belle', 1),
(56, '2024-03-02 00:20:09', 0, '456 rue Belle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `idCommentaire` int(11) NOT NULL,
  `commentaire` varchar(400) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`idCommentaire`, `commentaire`, `idClient`, `idProduit`) VALUES
(1, 'J\'adore ce produit, il a vraiment amélioré ma peau.', 1, 1),
(2, 'Le shampooing laisse mes cheveux doux et brillants, super !', 2, 3),
(3, 'Ce parfum a une odeur incroyable, je ne peux pas m\'en passer !', 3, 4),
(4, 'Le masque facial purifiant est très efficace, ma peau est plus nette.', 4, 5),
(5, 'Livraison rapide, produit conforme à la description.', 5, 6),
(6, 'Je suis très satisfaite de mon achat, merci beaucoup !', 6, 7),
(7, 'Produit de qualité, je recommande cette marque.', 7, 8),
(8, 'Le service clientèle est très réactif, je suis impressionné.', 8, 9),
(9, 'Ce produit a dépassé mes attentes, je le rachèterai sûrement.', 9, 10),
(10, 'Très bon produit, je le recommande vivement !', 10, 11),
(11, 'Ce produit est incroyable, je le recommande à tout le monde !', 2, 8),
(12, 'Le parfum a une odeur envoûtante, je suis fan !', 4, 4),
(13, 'Le masque facial est devenu un incontournable dans ma routine de soins.', 5, 5),
(14, 'J\'ai acheté ce produit en cadeau et il a beaucoup plu.', 7, 9),
(15, 'Livraison rapide et emballage soigné, je suis ravie.', 8, 3),
(16, 'Je ne peux plus me passer de ce rouge à lèvres, il tient toute la journée.', 10, 6),
(17, 'Produit de qualité supérieure, je suis très satisfait de mon achat.', 3, 2),
(18, 'Excellent rapport qualité-prix, je recommande vivement !', 6, 1),
(19, 'Le service clientèle a été très serviable, merci beaucoup.', 9, 7),
(20, 'Ce produit a changé ma vie, je ne peux plus m\'en passer.', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `descriptions`
--

CREATE TABLE `descriptions` (
  `idDescription` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `definition` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `idDetail` int(11) NOT NULL,
  `prixVente` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`idDetail`, `prixVente`, `quantite`, `idCommande`, `idProduit`) VALUES
(1, 300, 2, 1, 15),
(2, 300, 1, 1, 15),
(3, 300, 3, 2, 15),
(4, 500, 1, 2, 4),
(5, 200, 2, 3, 5),
(6, 100, 2, 3, 6),
(7, 100, 1, 4, 7),
(8, 100, 1, 5, 8),
(9, 90, 1, 6, 9),
(10, 250, 1, 7, 10),
(11, 500, 2, 8, 11),
(12, 150, 1, 8, 12),
(13, 300, 1, 9, 13),
(14, 800, 1, 10, 14),
(15, 200, 3, 11, 15),
(16, 400, 1, 12, 16),
(17, 350, 2, 13, 17),
(18, 150, 1, 14, 18),
(19, 5000, 1, 15, 19),
(20, 1000, 1, 16, 20),
(21, 1000, 1, 17, 21),
(22, 700, 1, 18, 22),
(23, 1500, 1, 19, 23),
(24, 4000, 1, 20, 24),
(25, 500, 2, 21, 25),
(26, 1200, 1, 22, 26),
(27, 800, 1, 23, 27),
(28, 1200, 1, 24, 28),
(29, 800, 1, 25, 29),
(30, 1000, 1, 26, 30),
(31, 300, 1, 3, 1),
(32, 300, 1, 4, 1),
(33, 300, 1, 4, 1),
(34, 300, 1, 5, 1),
(35, 300, 1, 5, 1),
(36, 300, 1, 6, 1),
(37, 300, 1, 6, 1),
(38, 300, 4, 7, 1),
(39, 340, 4, 8, 2),
(40, 340, 7, 9, 2),
(41, 120, 3, 10, 3),
(42, 475, 3, 11, 4),
(43, 340, 1, 12, 2),
(44, 340, 1, 13, 2),
(45, 120, 3, 14, 3),
(46, 340, 2, 15, 2),
(47, 340, 5, 16, 2),
(48, 340, 2, 17, 2),
(49, 475, 1, 18, 4),
(50, 176, 1, 19, 5),
(51, 176, 1, 20, 5),
(52, 300, 5, 21, 1),
(53, 300, 5, 22, 1),
(54, 340, 1, 23, 2),
(55, 340, 1, 24, 2),
(56, 340, 1, 25, 2),
(57, 340, 1, 26, 2),
(58, 340, 1, 27, 2),
(59, 340, 1, 28, 2),
(60, 300, 1, 29, 1),
(61, 120, 1, 30, 3),
(62, 475, 1, 31, 4),
(63, 300, 1, 32, 1),
(64, 92, 1, 33, 6),
(65, 120, 1, 34, 3),
(66, 340, 2, 35, 2),
(67, 120, 3, 36, 3),
(68, 340, 1, 37, 2),
(69, 475, 2, 38, 4),
(70, 300, 2, 39, 1),
(71, 90, 2, 40, 8),
(72, 90, 2, 41, 8),
(73, 92, 2, 42, 6),
(74, 90, 1, 43, 8),
(75, 90, 2, 44, 8),
(76, 90, 2, 45, 8),
(77, 90, 2, 46, 8),
(78, 90, 5, 47, 8),
(79, 90, 2, 48, 8),
(80, 92, 2, 49, 6),
(81, 300, 2, 50, 1),
(82, 90, 2, 51, 8),
(83, 90, 2, 52, 8),
(84, 90, 1, 53, 8),
(85, 90, 1, 54, 8),
(86, 90, 1, 55, 8),
(87, 300, 1, 56, 31);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `idPhoto` int(11) NOT NULL,
  `photo` varchar(10) NOT NULL,
  `idProduit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`idPhoto`, `photo`, `idProduit`) VALUES
(1, '1.jpg', 1),
(2, '2.png', 2),
(3, 'img3.png', 3),
(4, '4.jpg', 4),
(5, '5.webp', 5),
(6, '6.webp', 6),
(7, '7.webp', 7),
(8, '8.jpg', 8),
(9, '9.webp', 9),
(10, '10.jpg', 10),
(11, '11.jpg', 11),
(12, '12.webp', 12),
(13, '13.png', 13),
(14, '14.png', 14),
(15, '15.jpg', 15),
(16, '16.jpg', 16),
(17, '17.webp', 17),
(18, '18.jpg', 18),
(19, '19.webp', 19),
(20, '20.png', 20),
(21, '21.webp', 21),
(22, '22.png', 22),
(23, '23.png', 23),
(24, '24.png', 24),
(25, '25.png', 25),
(26, '26.png', 26),
(27, '27.jpg', 27),
(28, '28.png', 28),
(29, '30.png', 30),
(30, '31.jpg', 31),
(31, '32.png', 32),
(32, '33.jpg', 33),
(33, '34.jpg', 34),
(34, '35.png', 35),
(35, '1-1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `idProduit` int(11) NOT NULL,
  `libelle` varchar(40) NOT NULL,
  `description` varchar(300) NOT NULL,
  `prix` int(11) NOT NULL,
  `qteStock` int(11) NOT NULL,
  `dateMiseEnVente` date NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`idProduit`, `libelle`, `description`, `prix`, `qteStock`, `dateMiseEnVente`, `idCategorie`) VALUES
(1, 'Crème hydratante au collagène', 'Une crème hydratante enrichie en collagène pour une peau douce et éclatante.', 300, 73, '2024-03-01', 1),
(2, 'Palette de maquillage professionnelle', 'Une palette de maquillage complète avec des nuances variées pour créer un look parfait pour toutes les occasions.', 400, 89, '2024-02-01', 1),
(3, 'Shampooing revitalisant', 'Un shampooing revitalisant enrichi en vitamines pour des cheveux doux et brillants.', 150, 79, '2024-02-02', 1),
(4, 'Parfum floral', 'Un parfum floral léger et frais, parfait pour une touche de féminité subtile.', 500, 88, '2024-02-02', 1),
(5, 'Masque facial purifiant', 'Un masque facial purifiant à l\'argile pour nettoyer et rafraîchir la peau en profondeur.', 200, 198, '2024-02-03', 1),
(6, 'Crayon à sourcils rétractable', 'Un crayon à sourcils rétractable pour définir et remplir les sourcils avec précision.', 100, 195, '2024-02-03', 1),
(7, 'Vernis à ongles longue tenue', 'Un vernis à ongles longue tenue avec une gamme de couleurs vibrantes pour une manucure éclatante.', 100, 60, '2024-02-04', 1),
(8, 'Rouge à lèvres mat', 'Un rouge à lèvres mat longue tenue avec une formule crémeuse et pigmentée pour des lèvres audacieuses.', 100, 45, '2024-02-05', 1),
(9, 'Coffret cadeau spa', 'Un coffret cadeau luxueux comprenant des produits pour le bain et le corps pour une expérience spa à domicile.', 90, 50, '2024-02-06', 1),
(10, 'Tapis de yoga épais', 'Un tapis de yoga épais et antidérapant pour une pratique confortable et sécurisée.', 250, 70, '2024-02-07', 2),
(11, 'Haltères ajustables', 'Des haltères ajustables pour un entraînement de musculation polyvalent à domicile.', 500, 80, '2024-02-07', 2),
(12, 'Montre de sport GPS', 'Une montre de sport GPS avec suivi d\'activité, fréquence cardiaque et fonctionnalités de navigation.', 150, 50, '2024-02-16', 2),
(13, 'Sac de sport imperméable', 'Un sac de sport spacieux et imperméable pour transporter vos affaires de sport en toute sécurité.', 300, 90, '2024-02-16', 2),
(14, 'Chaussures de course sur sentier', 'Des chaussures de course robustes conçues pour une traction optimale sur les sentiers.', 800, 65, '2024-02-17', 2),
(15, 'Gourde isotherme', 'Une gourde isotherme en acier inoxydable pour garder vos boissons fraîches pendant vos séances d\'entraînement.', 200, 55, '2024-02-15', 2),
(16, 'Tapis de fitness pliable', 'Un tapis de fitness pliable et léger pour les exercices au sol à domicile ou en déplacement.', 400, 50, '2024-02-18', 2),
(17, 'Vêtements de compression', 'Des vêtements de compression ajustés pour améliorer la circulation sanguine et favoriser la récupération musculaire.', 350, 75, '2024-02-19', 2),
(18, 'Corde à sauter rapide', 'Une corde à sauter légère et rapide pour un entraînement cardio efficace.', 150, 80, '2024-02-21', 2),
(19, 'Smartphone XYZ', 'Un smartphone dernier cri avec un grand écran et une caméra haute résolution.', 5000, 35, '2024-02-10', 3),
(20, 'Ordinateur portable ABC', 'Un ordinateur portable léger et puissant, idéal pour le travail et les loisirs.', 1000, 22, '2024-02-01', 3),
(21, 'Casque sans fil DEF', 'Un casque audio sans fil offrant un son de qualité supérieure et un confort optimal.', 1000, 45, '2024-02-01', 3),
(22, 'Enceinte Bluetooth GHI', ' Une enceinte portable avec une excellente qualité audio, parfaite pour les fêtes en plein air.', 700, 40, '2024-02-22', 3),
(23, 'Caméra de sécurité JKL', 'Une caméra de sécurité HD avec vision nocturne pour surveiller votre maison ou votre bureau.', 1500, 30, '2024-02-02', 3),
(24, 'Console de jeux vidéo MNO', 'Une console de jeu de nouvelle génération avec des graphismes époustouflants et une grande bibliothèque de jeux.', 4000, 10, '2024-02-01', 3),
(25, 'Écouteurs sport PQR', 'Des écouteurs résistants à la transpiration et confortables, parfaits pour les séances d\'entraînement.', 500, 15, '2024-02-02', 3),
(26, 'Liseuse électronique STU', 'Une liseuse légère et compacte pour lire vos livres numériques préférés partout où vous allez.', 1200, 9, '2024-02-03', 3),
(27, 'Souris de jeu VWX', 'Une souris de jeu ergonomique avec des boutons programmables et un capteur de haute précision.', 800, 55, '2024-02-05', 3),
(28, 'Liseuse électronique STU', 'Une liseuse légère et compacte pour lire vos livres numériques préférés partout où vous allez.', 1200, 12, '2024-02-13', 3),
(30, 'Robe de soirée', 'Une robe élégante généralement portée lors d\'occasions spéciales telles que les mariages, les cocktails ou les galas.', 1500, 50, '2024-02-23', 5),
(31, 'Chaussures de sport', 'Des chaussures confortables et durables conçues pour la pratique d\'activités sportives ou de loisirs.', 300, 79, '2024-02-24', 5),
(32, 'Chemise habillée', 'Une chemise formelle souvent portée au bureau, lors d\'événements professionnels ou pour des occasions spéciales. ', 600, 65, '2024-02-14', 5),
(33, 'Jean slim', 'Un pantalon en denim ajusté et élégant, adapté à un usage quotidien ou décontracté.', 100, 120, '2024-02-22', 5),
(34, 'Sac à main en cuir', 'Un accessoire de mode pratique et élégant utilisé pour transporter des effets personnels.', 150, 72, '2024-02-17', 5),
(35, 'Montre-bracelet', 'Un accessoire fonctionnel et stylé porté autour du poignet pour indiquer l\'heure. ', 1000, 50, '2024-02-14', 5);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `idPromotion` int(11) NOT NULL,
  `tauxPromotion` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `idProduit` int(11) NOT NULL,
  `dateFin` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`idPromotion`, `tauxPromotion`, `dateDebut`, `idProduit`, `dateFin`) VALUES
(1, 10, '2024-02-01', 1, '2024-02-15'),
(2, 15, '2024-02-05', 2, '2024-02-20'),
(3, 20, '2024-02-10', 3, '2024-02-25'),
(4, 5, '2024-02-08', 4, '2024-02-20'),
(5, 12, '2024-02-03', 5, '2024-02-18'),
(6, 8, '2024-02-12', 6, '2024-02-28'),
(7, 18, '2024-02-15', 7, '2024-03-01'),
(8, 10, '2024-02-17', 8, '2024-02-28'),
(9, 15, '2024-02-20', 9, '2024-03-10'),
(10, 20, '2024-02-21', 10, '2024-03-15'),
(11, 7, '2024-02-25', 11, '2024-03-10'),
(12, 10, '2024-02-28', 12, '2024-03-20'),
(13, 12, '2024-02-03', 13, '2024-02-18'),
(14, 15, '2024-02-10', 14, '2024-02-25'),
(15, 5, '2024-02-15', 15, '2024-03-01'),
(16, 10, '2024-02-18', 16, '2024-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `publicites`
--

CREATE TABLE `publicites` (
  `idPublicite` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `photoPub` int(11) NOT NULL,
  `datePub` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`idClient`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`idCommande`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`idCommentaire`);

--
-- Indexes for table `descriptions`
--
ALTER TABLE `descriptions`
  ADD PRIMARY KEY (`idDescription`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`idDetail`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`idPhoto`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`idProduit`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`idPromotion`);

--
-- Indexes for table `publicites`
--
ALTER TABLE `publicites`
  ADD PRIMARY KEY (`idPublicite`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `descriptions`
--
ALTER TABLE `descriptions`
  MODIFY `idDescription` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `idDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `idPromotion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `publicites`
--
ALTER TABLE `publicites`
  MODIFY `idPublicite` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
