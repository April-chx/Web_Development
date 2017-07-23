-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2016 at 07:28 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodie`
--

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `UserID` int(11) NOT NULL,
  `1` int(11) DEFAULT NULL,
  `2` int(11) DEFAULT NULL,
  `3` int(11) DEFAULT NULL,
  `4` int(11) DEFAULT NULL,
  `5` int(11) DEFAULT NULL,
  `6` int(11) DEFAULT NULL,
  `7` int(11) DEFAULT NULL,
  `8` int(11) DEFAULT NULL,
  `9` int(11) DEFAULT NULL,
  `10` int(11) DEFAULT NULL,
  `11` int(11) DEFAULT NULL,
  `12` int(11) DEFAULT NULL,
  `13` int(11) DEFAULT NULL,
  `14` int(11) DEFAULT NULL,
  `15` int(11) DEFAULT NULL,
  `16` int(11) DEFAULT NULL,
  `17` int(11) DEFAULT NULL,
  `18` int(11) DEFAULT NULL,
  `19` int(11) DEFAULT NULL,
  `20` int(11) DEFAULT NULL,
  `21` int(11) DEFAULT NULL,
  `22` int(11) DEFAULT NULL,
  `23` int(11) DEFAULT NULL,
  `24` int(11) DEFAULT NULL,
  `25` int(11) DEFAULT NULL,
  `26` int(11) DEFAULT NULL,
  `27` int(11) DEFAULT NULL,
  `28` int(11) DEFAULT NULL,
  `29` int(11) DEFAULT NULL,
  `30` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`UserID`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`) VALUES
(1, 3, 2, 3, 4, 4, NULL, 5, 5, NULL, 2, NULL, NULL, 3, NULL, NULL, 4, NULL, NULL, 3, 3, NULL, NULL, 4, NULL, NULL, 5, 3, NULL, 1, 5),
(2, 3, NULL, 4, NULL, 5, 4, 1, NULL, 2, 3, NULL, 1, NULL, 3, 4, NULL, NULL, 4, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 4, 5, NULL, 2, NULL, 3, 1, NULL, NULL, 4, NULL, NULL, 3, 4, NULL, 2, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 4, NULL),
(4, 5, NULL, NULL, 3, 2, NULL, 3, NULL, 4, NULL, 1, NULL, NULL, 2, NULL, 3, 4, NULL, 5, NULL, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, 3),
(5, 4, NULL, NULL, 3, NULL, 2, NULL, 1, 4, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, 3, NULL, NULL, 4, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, NULL),
(6, NULL, 3, NULL, NULL, NULL, 4, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, 1),
(7, NULL, 2, 3, NULL, 4, NULL, 2, NULL, 3, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 5),
(8, NULL, 1, NULL, 2, 3, NULL, 4, NULL, NULL, NULL, NULL, 5, NULL, 3, NULL, 4, NULL, 2, NULL, 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, 1, 2, 4, NULL, NULL, 3, NULL, 5, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 3, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL),
(10, 2, NULL, 3, NULL, 4, 5, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, 3, NULL, NULL, 5, NULL, NULL, 3, NULL),
(11, 3, NULL, NULL, 4, NULL, 5, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, 3, NULL, 2, NULL, NULL, 5, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(12, NULL, 3, NULL, 4, 5, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 2, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 5),
(13, NULL, 4, NULL, 2, NULL, 3, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(14, NULL, 5, 2, NULL, NULL, 4, NULL, NULL, 3, NULL, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 3, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(15, 1, NULL, 3, NULL, NULL, NULL, NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 5, 4, NULL, NULL, 3, NULL, NULL, 2),
(16, 1, NULL, 3, NULL, NULL, 2, NULL, 5, NULL, 3, NULL, NULL, NULL, 2, NULL, NULL, 4, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(17, 4, NULL, NULL, NULL, 2, NULL, NULL, 3, NULL, 4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, 2, 3),
(18, 3, NULL, NULL, NULL, 2, NULL, 3, NULL, NULL, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, 3, NULL, NULL, 2, NULL, NULL, 4),
(19, 2, NULL, 3, NULL, 4, NULL, NULL, 3, NULL, NULL, 3, NULL, NULL, NULL, 3, NULL, NULL, NULL, 3, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 5, 2),
(20, 1, 3, 4, NULL, 2, NULL, NULL, NULL, NULL, NULL, 5, 3, NULL, 4, NULL, NULL, NULL, 5, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(21, NULL, 4, NULL, 2, NULL, 4, NULL, NULL, 2, NULL, 3, NULL, NULL, NULL, NULL, 4, NULL, 4, NULL, NULL, 5, NULL, NULL, 2, NULL, NULL, NULL, 3, NULL, NULL),
(22, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 2, NULL, NULL, NULL, 4, NULL, 4, NULL, 5, NULL, 3, NULL, 4, NULL, 2, NULL, NULL, NULL),
(23, 1, NULL, NULL, NULL, 5, NULL, NULL, 4, 3, NULL, 3, NULL, 2, NULL, 3, NULL, NULL, 4, NULL, NULL, 5, NULL, 2, NULL, NULL, 1, NULL, NULL, 3, NULL),
(24, 4, NULL, NULL, 2, NULL, NULL, 4, 3, NULL, NULL, 2, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, 3, 1),
(25, 3, NULL, 4, NULL, 2, NULL, NULL, 3, NULL, 5, NULL, NULL, NULL, NULL, 3, NULL, 2, NULL, 2, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 1, NULL, 5),
(26, NULL, 3, 4, NULL, NULL, NULL, 5, NULL, 2, NULL, NULL, 3, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 3, NULL, 4, NULL, NULL, 5),
(27, 3, 4, NULL, NULL, NULL, 4, NULL, 2, NULL, 3, NULL, NULL, NULL, 4, NULL, NULL, 2, NULL, 5, NULL, NULL, 1, NULL, NULL, 2, NULL, 3, NULL, NULL, 4),
(28, NULL, 4, NULL, NULL, 5, NULL, 1, NULL, 4, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 5, NULL, 3, NULL, NULL, NULL, 4, 3, 2),
(29, NULL, 4, NULL, 2, NULL, 1, NULL, NULL, 4, NULL, NULL, 5, NULL, 5, NULL, NULL, 3, NULL, 2, NULL, NULL, NULL, 2, NULL, NULL, 4, NULL, NULL, NULL, 1),
(30, 5, NULL, 2, NULL, 1, NULL, 3, NULL, 4, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 3, NULL, 2, NULL, NULL, 4, NULL, 3, NULL, NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `RecipeID` int(11) NOT NULL,
  `RecipeName` varchar(50) NOT NULL,
  `RestaurantID` int(11) NOT NULL,
  `RestaurantName` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `Description` longtext,
  `Img_path` longtext,
  `Frequency` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`RecipeID`, `RecipeName`, `RestaurantID`, `RestaurantName`, `Price`, `Description`, `Img_path`, `Frequency`) VALUES
(0, 'Chicken Shawarma', 1, 'Almustafa Lebanese Restaurant', 18, 'Freshly sliced chicken thigh and breast fillet, marinated in herbs, spices and olive oil, grilled and served topped with onion, tomato and cream garlic sauce on the side.', './images/Almustafa Lebanese Restaurant/menu/Chicken Shawarma.jpg', 0),
(1, 'Cousa Wara-aneb', 1, 'Almustafa Lebanese Restaurant', 24, 'An Almustafa Speciality, Zucchinis stuffed with rice, minced lamb, herbs and spices simmered in a pot of fresh tomatoes and a leg of lamb. On its own or acompanied with Lamb Vinesleaves, rice and lean lamb mince stuffed in grapevine leaves.', './images/Almustafa Lebanese Restaurant/menu/Cousa Wara-aneb.jpg', 0),
(2, 'Fatouche', 1, 'Almustafa Lebanese Restaurant', 15, 'A diced salad of tomatoes, shallots, cucumber, radish, parsley, onion, capsicum, mint, crispy Lebanese bread all tossed with pomegranate and lemon dressing', './images/Almustafa Lebanese Restaurant/menu/Fatouche.jpg'',''Frequency', 0),
(3, 'Lamb Mansaf', 1, 'Almustafa Lebanese Restaurant', 26, 'An Almustafa Speciality, Baked leg of lamb served on a bed of special rice cooked with herb and minced lamb and served topped with cashews and pine-nuts, with yoghurt and chilli on the side.', './images/Almustafa Lebanese Restaurant/menu/Lamb Mansaf.jpg', 0),
(4, 'Potato Coriander', 1, 'Almustafa Lebanese Restaurant', 15, 'Cubes of fried potato mixed with coriander, garlic, lemon and salt (optional chiilli)', './images/Almustafa Lebanese Restaurant/menu/Potato Coriander.jpg', 0),
(5, 'Shishtawook (3 Skewers) (Chicken Breast)', 1, 'Almustafa Lebanese Restaurant', 18.9, 'Flame grilled marinated chicken breast fillets served with pureed garlic on the side (option to purchase additional pieces)', './images/Almustafa Lebanese Restaurant/menu/Shishtawook (3 Skewers) (Chicken Breast).jpg', 0),
(6, 'Hummus, Chickpea Dip', 1, 'Almustafa Lebanese Restaurant', 11.5, 'Chickpeas simmered then blended with tahini, lemon juice and garlic, served with light dressing of olive oil', './images/Almustafa Lebanese Restaurant/menu/Hummus, Chickpea Dip.jpg', 0),
(7, 'Raw Organic Burdock Salad', 2, 'Green Gourmet', 13.8, 'Japanese style shredded burdock roots. snow pea, lettuce & carrot, seasoned with sesame seeds and vinegar.', './images/Green Gourmet/menu/Raw Organic Burdock Salad.jpg', 0),
(8, 'Raw Nut Walnut Salad', 2, 'Green Gourmet', 15.8, 'Diced cucumber, celery, pickled vegetable, carrot, cashew nuts, pine nuts with sweet miso dressing.', './images/Green Gourmet/menu/Raw Nut Walnut Salad.jpg', 0),
(9, 'Spring Roll (3 pieces)', 2, 'Green Gourmet', 5.8, 'Wheat pastry with carrot, cabbage, wood fungi & celery.', './images/Green Gourmet/menu/Spring Roll (3 pieces).jpg', 0),
(10, 'Soy Drumstick (3 pieces)', 2, 'Green Gourmet', 5.8, 'Marinated soy skin rolled in the shape of a drumstick deep fried', './images/Green Gourmet/menu/Soy Drumstick (3 pieces).jpg', 0),
(11, 'Green Bean in Chilli Black Bean Sauce', 2, 'Green Gourmet', 19.8, 'Fresh green beans & sliced shitake mushroom sautéed in spicy black bean sauce with a hint of chilli.', './images/Green Gourmet/menu/Green Bean in Chilli Black Bean Sauce.jpg', 0),
(12, 'Caesar Salad', 3, 'Blue Fish', 19.5, 'Bacon, Egg, Croutons, Cos Lettuce, Freshly Shaved Parmesan & Anchovies', './images/Blue Fish/menu/Caesar Salad.jpg', 1),
(13, 'Atlantic Salmon', 3, 'Blue Fish', 36.5, 'Served on a Butter Bean, Asparagus & Watecress Salad with Spiced KimChee', './images/Blue Fish/menu/Atlantic Salmon.jpg', 2),
(14, 'seafood paella', 3, 'Blue Fish', 37.5, 'Chorizo, chicken, mussels, clams,prawns and calamari topped with bbq king prawn', './images/Blue Fish/menu/seafood paella.jpg', 3),
(15, 'giant family seafood platter', 3, 'Blue Fish', 195, 'Natural Oysters, Fresh Cooked Queensland Tiger Prawns, Smoked Salmon, Moreton Bay Bugs, Rockmelon, Steamed Mussels, BBQ King Prawns, Calamari, Crumbed Prawns, Octopus, Squid Rings served with Chips, Sauces, Lemon & Crowned with a W.A. Rock Lobster Mornay, Atlantic Salmon & Barramundi. ', './images/Blue Fish/menu/giant family seafood platter.jpg', 6),
(16, 'fudge shop waffle', 3, 'Blue Fish', 19.5, 'Belgian Waffle with Warm Caramel Fudge, Banana & Peanut Disaster Ice-Cream', './images/Blue Fish/menu/fudge shop waffle.jpg', 0),
(17, 'CHICKEN CACCIATORE', 4, 'Jamies Italian Sydney', 32, 'Grilled free-range chicken & seasonal vegetables in a rich tomato & Chianti sauce with black olives, rocket, Parmesan, & garlicky ciabatta', './images/Jamie\\''s Italian Sydney/menu/CHICKEN CACCIATORE.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `RestaurantID` int(11) NOT NULL,
  `RestaurantName` varchar(50) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Contact` varchar(30) DEFAULT NULL,
  `Tags` varchar(50) DEFAULT NULL,
  `Frequency` int(11) DEFAULT NULL,
  `Img_path` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`RestaurantID`, `RestaurantName`, `Address`, `Contact`, `Tags`, `Frequency`, `Img_path`) VALUES
(1, 'Almustafa Lebanese Restaurant', '23 Glebe Point Rd, Glebe, Sydney NSW 2037, Australia', '(02) 9660 9006', 'Lebanese', 1, './images/Almustafa Lebanese Restaurant/1.jpg'),
(2, 'Green Gourmet', '115 King Street, Newtown, Sydney NSW 2042, Australia', '(02) 9519 5330', 'Vegetarian Restaurant', 2, './images/Green Gourmet/1.jpg'),
(3, 'Blue Fish', '287 Harbourside Shopping Centre, Harbourside Shopping Centre, Darling Dr, Sydney NSW 2000, Australia', '(02) 9211 0315', 'Seafood', 1, './images/Blue Fish/1.jpg'),
(4, 'Jamies Italian Sydney', '107 Pitt St, Sydney NSW 2000, Australia', '(02) 8240 9000', 'Italian', 44, './images/Jamie''s Italian Sydney/1.jpg'),
(5, 'Chat Thai', '20 Campbell St, Haymarket, Sydney NSW 2000, Australia', '+61 2 9211 1808', 'Thai', 0, './images/Chat Thai/1.jpg'),
(6, 'Home Thai Restaurant', '1-2/299 Sussex St, Sydney NSW 2000, Australia', '+61 2 9261 5058', 'Thai', 1, './images/Home Thai Restaurant/1.jpg'),
(7, 'Nicks Seafood Restaurant', 'The Promenade/Cockle Bay Wharf, Sydney NSW 2000, Australia', '+61 1300 989 989', 'Seafood', 0, './images/Nicks Seafood Restaurant/1.jpg'),
(8, 'Masuya Japanese Seafood Restaurant', '12-14 O\\''Connell St, Sydney NSW 2000, Australia', '+61 2 9235 2717', 'Japanese, Seafood', 0, './images/Masuya Japanese Seafood Restaurant/1.jpg'),
(9, 'Hibachi Japanese Grill', '230 King St, Melbourne VIC 3000, Australia', '+61 3 9670 1661', 'Japanese', 0, './images/Hibachi Japanese Grill/1.jpg'),
(10, 'Tetsuya''s Restaurant', '529 Kent St, Sydney NSW 2000, Australia', '+61 2 9267 2900', 'Fine Dining Restaurant', 0, './images/Tetsuya''s Restaurant/1.jpg'),
(11, 'Zaaffran', '10 Darling Drive, Harbourside Centre, Darling Harbour, Sydney NSW 2000, Australia', '+61 2 9211 8900', 'Indian Restaurant', 0, './images/Zaaffran/1.jpg'),
(12, 'Diethnes Greek Restaurant', '336 Pitt St, Sydney NSW 2000, Australia', '+61 2 9267 8956', 'Greek Restaurant', 0, './images/Diethnes Greek Restaurant/1.jpg'),
(13, 'Nel Restaurant', '75 Wentworth Ave, Sydney NSW 2000, Australia', '+61 2 9212 2206', 'Modern Australian Restaurant', 0, './images/Nel Restaurant/1.jpg'),
(14, 'Madame Nhu', '82 Campbell St, Surry Hills NSW 2010, Australia', '+61 2 9212 3311', 'Vietnamese Restaurant', 0, './images/Madame Nhu/1.jpg'),
(15, 'The Cidery Bar & Kitchen', '389 Pitt St, Sydney NSW 2000, Australia', '+61 2 8268 1670', 'Bar', 0, './images/The Cidery Bar & Kitchen/1.jpg'),
(16, 'Medusa Greek Taverna', '2 Market St, Sydney NSW 2000, Australia', '+61 2 9267 0799', 'Greek Restaurant', 2, './images/Medusa Greek Taverna/1.jpg'),
(17, 'Mad Mex Fresh Mexican Grill', '156 - 158 King Street, Newtown NSW 2042, Australia', '+61 2 9557 3603', 'Greek Restaurant', 0, './images/Mad Mex Fresh Mexican Grill/1.jpg'),
(18, 'Fortune Village Chinese Restaurant', '209 Clarence St, Sydney NSW 2000, Australia', '+61 2 9299 7273', 'Chinese Restaurant', 0, './images/Fortune Village Chinese Restaurant/1.jpg'),
(19, 'Bistro Papillon', '98 Clarence St, Sydney NSW 2000, Australia', '+61 2 9262 2402', 'French Restaurant', 0, './images/Bistro Papillon/1.jpg'),
(20, 'Palace Chinese Restaurant', '38/133-145 Castlereagh St, Sydney NSW 2000, Australia', '+61 2 9283 6288', 'Chinese Restaurant', 0, './images/Palace Chinese Restaurant/1.jpg'),
(21, 'Vapiano', 'Cnr King St &, York St, Sydney NSW 2000, Australia', '+61 2 9299 0079', 'Italian Restaurant', 0, './images/Vapiano/1.jpg'),
(22, 'Wharf Teppanyaki', '21 Lime St, Sydney NSW 2000, Australia', '+61 2 9299 5290', 'Japanese Restaurant', 0, './images/Wharf Teppanyaki/1.jpg'),
(23, 'Sky Phoenix', '188 Pitt St, Sydney NSW 2000, Australia', '+61 2 9223 8822', 'Chinese Restaurant', 0, './images/Sky Phoenix/1.jpg'),
(24, 'Athenian Greek Restaurant', '11 Barrack St, Sydney NSW 2000, Australia', '+61 2 9262 2624', 'Greek Restaurant', 0, './images/Athenian Greek Restaurant/1.jpg'),
(25, 'Prime Steak Restaurant', 'Lower Ground Floor, Sydney GPO Building, No., 1 Martin Pl, Sydney NSW 2000, Australia', '+61 2 9229 7777', 'Steak House', 0, './images/Prime Steak Restaurant/1.jpg'),
(26, 'Intermezzo Italian Restaurant', 'Ground, 1 Martin Pl, Sydney NSW 2000, Australia', '+61 2 9229 7788', 'Italian Restaurant', 0, './images/Intermezzo Italian Restaurant/1.jpg'),
(27, 'Felix', ' 2 Ash St, Sydney NSW 2000, Australia', '+61 2 9240 3000', 'French Restaurant', 0, './images/Felix/1.jpg'),
(28, 'Rockpool Bar & Grill', '66 Hunter St, Sydney NSW 2000, Australia', '+61 2 8078 1900', 'Bar & Grill', 0, './images/Rockpool Bar & Grill/1.jpg'),
(29, 'Spice Temple', '10 Bligh St, Sydney NSW 2000, Australia', '+61 2 8078 1888', 'Chinese Restaurant', 0, './images/Spice Temple/1.jpg'),
(30, 'Uccello', '320 George St, Sydney NSW 2000, Australia', '+61 2 9240 3000', 'Italian Restaurant', 0, './images/Uccello/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Account` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Account`, `Password`, `Firstname`, `Lastname`, `Email`) VALUES
(1, 'A', 'a', '', '', ''),
(2, 'B', 'b', '', '', ''),
(3, 'C', 'c', '', '', ''),
(4, 'D', 'd', '', '', ''),
(5, 'E', 'e', '', '', ''),
(6, 'F', 'f', '', '', ''),
(7, 'G', 'g', '', '', ''),
(8, 'H', 'h', '', '', ''),
(9, 'I', 'i', '', '', ''),
(10, 'J', 'j', '', '', ''),
(11, 'K', 'k', '', '', ''),
(12, 'L', 'l', '', '', ''),
(13, 'M', 'm', '', '', ''),
(14, 'N', 'n', '', '', ''),
(15, 'O', 'o', '', '', ''),
(16, 'P', 'p', '', '', ''),
(17, 'Q', 'q', '', '', ''),
(18, 'R', 'r', '', '', ''),
(19, 'S', 's', '', '', ''),
(20, 'T', 't', '', '', ''),
(21, 'U', 'u', '', '', ''),
(22, 'V', 'v', '', '', ''),
(23, 'W', 'w', '', '', ''),
(24, 'X', 'x', '', '', ''),
(25, 'Y', 'y', '', '', ''),
(26, 'Z', 'z', '', '', ''),
(27, 'AA', 'aa', '', '', ''),
(28, 'BB', 'bb', '', '', ''),
(29, 'CC', 'cc', '', '', ''),
(30, 'DD', 'dd', '', '', ''),
(31, 'YY', '123', 'Y', 'Y', 'YYY'),
(32, 'QQ', '123', 'QQ', 'Q', 'QQQQ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`RecipeID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`RestaurantID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Account` (`Account`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
