-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 04, 2019 at 06:10 AM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a2dot37r_mac_world`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(500) NOT NULL DEFAULT '',
  `mobile` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `name`, `email`, `mobile`, `password`, `status`, `created_at`) VALUES
(1, 'Venki', 'iamvenkat@gmail.com', '9884794962', '123456', 1, '2018-10-28 12:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(500) NOT NULL DEFAULT 'default_preview.jpg',
  `description` varchar(1000) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `name`, `image`, `description`, `status`, `created_at`, `created_by`) VALUES
(1, 'COOKING OIL / FRYING OIL', 'uploads/39fbbfeaa9237243a54b20c93bb1be5c.jpg', 'Cooking oil is plant, animal, or synthetic fat used in frying, baking, and other types of cooking. It is also used in food preparation and flavouring not involving heat, such as salad dressings and bread dips, and in this sense might be more accurately termed edible oil. Cooking oil is typically a liquid at room temperature, although some oils contain saturated fat, such as coconut oil, palm oil and palm kernel oil are solid at lower temperatures.', 1, '2019-06-20 11:44:55', 0),
(2, 'BAKERY AND CONFECTIONERY FATS', 'uploads/4da359da96978daefec4d7aedaa7b7e9.jpg', 'Bakery and confectionery fats are specialized Fats that is designed to suit its application in confectionery, pastries, biscuit, cakes, wafers etc. Our bakery and confectionery fats are uniquely designed to meet every bakery and confectionery demands, from mouldings, coatings, dips and topping to fillings and sperads for confectioneries. It gives good aeration, elasticity, flakiness, tenderness and richness for bakery goods providing the end product with improved taste properties and shelf life at an efficient cost.', 1, '2019-06-20 11:45:33', 0),
(3, 'FOOD INGREDIENTS', 'uploads/827ec2ff634fe42f01b094b62f4afd0a.jpg', 'Food ingredients are food additives that aid in improving the end products shelf life, quality, appearance and consistency. These ingredients are sourced from reputable and quality sources to ensure that the ingredients are at its optimum quality when it is delivered to you. We offer vegetarian products and non-vegetarian products, organic and conventional, Halal and non-Halal and more to add value for both manufacturers and consumers.', 1, '2019-06-20 11:47:31', 0),
(4, 'OLEO CHEMICALS', 'uploads/f78e385dc975bebf818031092ce68750.jpg', 'Oleo chemicals are chemicals derived from plant fats, produced by splitting of oils or fats through various chemical and enzymatic reactions. They are commonly used in pharmaceuticals, food industry, soap and laundry detergents, candles, waxes, lubricants, paints and coatings etc. Our Oleo chemicals are an effective high-quality substitute to many petroleum based products, providing a sustainable solution for a better future.', 1, '2019-06-20 11:48:13', 0),
(5, 'SOFT OILS', 'uploads/ad346fd380c255bdad224ec53edd1ebb.jpg', 'Soft oils are one of the most commonly used oil as they are liquid at roon temperature. The oils are derived from the plant and further refined to be suitable for human consumption. To name a few, they are corn oil, sunflower seed oil, canola oil and soya bean oil. These oils are commonly used as cooking oil, food dressings and can also be used in soap making. Mac World offers various packing for there soft oils , catered to our customerâ€™ requirements.', 1, '2019-06-20 11:49:40', 0),
(6, 'LAURIC OILS', 'uploads/66922a00356ac2b969bbb2b7cf0b1921.jpg', 'Coconut Oil and Palm Kernel Oil are categorized as lauric oils, as both consists to a large degree of lauric acid (C12 saturated fatty acid). Lauric Oils and their derivatives have diverse applications, in the food and chemical industries. Further hydrogenation of lauric oils can further enhance their stability and colour, which is particularly useful in production of mild surfactants, soft vegetable waxes, cosmetics, etc', 1, '2019-06-20 11:50:01', 0),
(7, 'AGRO COMMODITIES', 'uploads/e3c2c8a8b0a858d89fbf51020b27f3f9.jpg', 'Agricultural Commodities comes from the raising of staple crops and/or animals. Most agricultural commodities such as grains, livestock and dairy provide a sourcs of food for people and animals across the globe. With the expansion of technology, access to agricultural commodities is now easier than ever. Commodities such as pulses, cereals, grains will come under this category.', 1, '2019-06-20 11:50:22', 0),
(8, 'CATTLE FEED PRODUCTS', 'uploads/430b67392ae6658e81286d5a1e206dfb.jpg', 'Cattle feed is a mixture of various concentrate feed ingredients in suitable proportion. Commonly used ingredients in cattle feed will induce palatability as they are good source of nutrients for growing, lactating and pregnant animals. They are an economical source of concentrate supplements and are available in the form of mesh, pellets, de-oiled cake, meal etc. Through regular use of our cattle feed along with its base diet the cost of milk production from dairy animals can be optimized and net profitability can be increased.', 1, '2019-06-20 11:50:44', 0),
(9, 'PROCESSED & CANNED FOOD', 'uploads/fcdef7bbce7705eb48ec640f7f0b785b.jpg', 'Processed and canned food are those food products which are fully or semi processed products in various packed form for the convenience of usage. They can either be consumed directly or with minimal processing or cooking enabling for quick / easier usage. These products are stable with a longer shelf life, making it suitable for long shipments and storage.', 1, '2019-06-20 11:51:27', 0),
(11, 'GENERAL COMMODITIES / RAW MATERIALS', 'uploads/21717426db9df15ea2ebc06d2f615401.jpg', '', 1, '2019-06-20 11:54:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `ID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `display_name` varchar(250) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`ID`, `name`, `display_name`, `value`) VALUES
(1, 'txtlcl_sender', 'Textlocal Sender', 'BLOCKS'),
(2, 'txtlcl_email', 'Textlocal Email', 'info@4blocksinc.com'),
(3, 'txtlcl_api', 'Textlocal API', '186b61cc2dfc2c83c365f66c2b07493909c4d7f020dbbcabd8bee56107a45380'),
(4, 'sms', 'SMS', 'IN'),
(5, 'push_id', 'Push ID', '55b9d640-9ea5-4692-b819-e6e699e36755'),
(6, 'push_icon', 'Push Icon', 'http://4blocksinc.com/ischool/v1/logo.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `category_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL DEFAULT 'default_preview.jpg',
  `normal_icon` varchar(500) NOT NULL DEFAULT 'default_preview.jpg',
  `hover_icon` varchar(500) NOT NULL DEFAULT 'default_preview.jpg',
  `description` varchar(1000) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`ID`, `title`, `category_id`, `image`, `normal_icon`, `hover_icon`, `description`, `status`, `created_at`, `created_by`) VALUES
(2, 'RBD PALM OLEIN', 1, 'uploads/ab93762bb09dca85462a5078fce89bc2.jpg', 'uploads/ba7019e0861d5848bf0ea5199ba78dd5.png', 'uploads/ef8f496b4bfa2d203f93bba41aabfe30.png', 'RBD Palm Olein is obtained by fractionating Refined Palm Oil to Olein in liquid form and Stearin in solid form. It is a clear yellow liquid at room temperature. RBD Palm Olein is used for cooking as well as frying oil for food industries such as snack food and ready-to-eat food products. \n\nPacking in : PET Bottles, Jerry Cans, Tins, Bag in Box, New Steel Drums, Flexi Bag', 1, '2019-06-15 11:17:03', 0),
(3, 'BLENDED OIL', 1, 'uploads/e9b3ac49ab6bcea04c6465efade3453f.jpg', 'uploads/e7c5d7fe834642e4e6be0744a7f7103d.png', 'uploads/bb09a4d339cb5d501a5f791f1dbad87a.png', 'Blended Oil is obtained by blending of 02 or more types of Oil mainly to retard the chances of Plam Olein to cloud due to high melting point of this product. Usually the blend constitutes Soya Bean Oil and Palm Oil, Sunflower Oil and Palm Oil, Canola Oil and Palm Oil.\n\nPacking in : PET Bottles, Jerry Cans, Tins, Bag in Box, New Steel Drums, Flexi Bag', 1, '2019-06-15 11:17:28', 0),
(5, 'VEGETABLE SHORTENING', 2, 'uploads/34093a6d66773b4ba50328e82dfb3442.jpg', 'uploads/cdec86663ac28ccd73afb6b8bfd19d56.png', 'uploads/d48bba442a24a6d762582082dcbed016.png', 'Our Vegetable shortening product is made from Pure Refined Palm Oil which are free from Trans Fatty Acids. They are used in all confectionery and frying applications with low oxidation property. They are excellent for use in creaming products, appeals white in colour and is available in various melting points from 36 Deg C to 52 Deg C.  \n\nPacking in : Cartons with PE Liner', 1, '2019-06-15 10:59:56', 0),
(6, 'RBD PALM STEARIN', 2, 'uploads/c9a6cbc77d37cba973ac2d6f7c05153c.jpg', 'uploads/61470e9160b124508c142a1f8d810b07.png', 'uploads/39068e5ef629d6be8927f5d261e010b9.png', 'RBD Palm Stearin is obtained by fractionating Refined Palm Oil. It is a white solid fat at room temperature, melting to a clear yellow liquid on heating. RBD Palm Stearin is used in edible products such as Margarine and Shortening industries. It is also used in Non Edbile range of Soaps, Candles and in Oleo-chemical industries.\n\nPacking in : Cartons with PE Liner, Steel Drums, Flexibags', 1, '2019-06-15 11:00:28', 0),
(7, 'MARGARINE [CAKE/PASTRY/CROISSANT]', 2, 'uploads/56f7f237e3975fe46caadf429edd004f.jpg', 'uploads/f5978120deafd81971a3eeade737af73.png', 'uploads/94fcf1379fc7c6821e237542463cc280.png', 'Margarine is a water-in-oil emulsion, similar to butter in appearance and composition, and an alternative to dairy based butter. Margarine is a low priced substitute for butter, it offers better spreadability and nutritional qualities, improved baking performance and has a longer shelf life. \n\nPacking in : Pouches, Tubs, Cartons with PE Liner', 1, '2019-06-15 11:01:08', 0),
(8, 'VEGETABLE GHEE', 2, 'uploads/d93a9b2bbd7ad1113556670c49b258ad.jpg', 'uploads/ee96e78cf4d710e86741acb4983cd5df.png', 'uploads/539ee51e93eb7378d25e88b68845ff59.png', 'Vegetable Ghee serves as a substitute for traditional ghee, an important ingredient in many Indian & Arabic dishes and desserts. Vegetable Ghee has fine texture and flavour that is an immediate substitute to dairy based ghee. Some regions prefer texturised ghee which provides granulated consistency for the product over the smooth texture.\n\nPacking in : Tins, Cartons with PE Liner', 1, '2019-06-15 11:01:32', 0),
(9, 'COCOA BUTTER SUBSTITUTES [CBS]', 2, 'uploads/2c008fdee639f30f9d8d59a44653aca1.png', 'uploads/1ec37e9f5c36d3ae5adaae5c611de7f1.png', 'uploads/8a7938166be530812b3236de8bcc01bc.png', 'Cocoa Butter Substitutes are fats which have similar physical properties to cocoa butter but different triglyceride composition. Cocoa Butter Substitute is basically fractionated Palm Kernel Oil base, either partially or fully hydrogenated, with or without emulsifiers. It is hard, yet melts sharply below body temperature with good mouth-feel.This is commonly used in chocolate moulding as well as Ice Cream manufacturing.\n\nPacking in : Cartons with PE Liner, New Steel Drums', 1, '2019-06-15 11:02:16', 0),
(10, 'COCOA BUTTER EQUIVALENT [CBE]', 2, 'uploads/d6923ab04a510b0276a75b19cd9fa3d3.png', 'uploads/42f7090ad049961754538dbfac55e026.png', 'uploads/93aae0753cf2f095ad3b04a0df7f3deb.png', 'Cocoa Butter Equivalents are vegetable fats with symmetrical 2-oleochemical triglycerides of C16 and C18 fatty acids, similar to those in cocoa butter. They should be compatible with cocoa butter in the proportions normally used in chocolate.\n\nPacking in : Cartons with PE Liner, New Steel Drums', 1, '2019-06-15 11:02:53', 0),
(11, 'HYDROGENATED PALM KERNEL OIL', 2, 'uploads/1aebac1f64768f1d7e889c8080b4047f.png', 'uploads/0d67001b8a5bdb1ac4bc8a219b607393.png', 'uploads/fb0ea8f1c845976eb11bf327932b6026.png', 'Hydrogenated Palm Kernel Oil is a partially hydrogenated non fractionated palm kernel oil base product. It is a food grade hard fat with excellent qualities. It is bland and odourless with excellent palatability. This is mainly used for chocolate coating as well as chocolate filling application depending on the required melting point and texture for the Chocolate..\n\nPacking in : Cartons with PE Liner, New Steel Drums', 1, '2019-06-15 11:03:22', 0),
(12, 'BLENDED BUTTER', 2, 'uploads/368724c79a080d7e91eb5af64b2c596a.jpg', 'uploads/b7d8312a7fb7413834c03e1ed90b2a11.png', 'uploads/d3fa71410f8be568832a6e129509ef37.png', 'Blended Butter is a formulation of milk fat solids, pure vegetable oil, emulsifiers and butter flavour to provide a smooth, creamy textured butter alternative. It is rich in taste and cost-effective blend that can be used for baking, frying, grilling, sautÃ©ing, as a spread on toast/ breads and any other application where butter is used.\n\nPacking in : Tins, New Steel Drums', 1, '2019-06-15 11:04:08', 0),
(14, 'HYDROGENATED COCONUT OIL [HCNO]', 2, 'uploads/f718ec0d51196c5a1df4b251d203cb72.png', 'uploads/38ecc49a0a86a4b4d1ab5611d54a0cd3.png', 'uploads/9dc89d2179d1f17e456d1f4874953fa8.png', 'HCNO is a hydrogenated lauric based fraction of hardened white vegetable fat with bland colour and flavour which provides excellent mouth feel characteristics at the best value. This is commonly used as the fat medium in the manufacturing of Ice Creams as it imparts smooth taste profile and mouthfeel for Ice Creams.\n\nPacking in : Cartons with PE Liner', 1, '2019-06-15 11:04:34', 0),
(15, 'SORBITOL SOLUTION BP GRADE', 3, 'uploads/7e266d02c724f35add56e911468557a7.jpg', 'uploads/d67c77962c0f5faf34f1e5a07fa73dd4.png', 'uploads/8a117463694289add65fda807d455fc0.png', 'Sorbitol, a polyol (sugar alcohol) is a bulk sweetener, syrupy liquid found in numerous food products. Most sorbitol is made from corn syrup, but it is also found in nature, for example in apples, pears, peaches, and prunes. In addition to providing sweetness, it is an excellent humectant and texturizing agent. It is used in a wide variety of oral care, pharmaceuticals, soaps, paints, food, confectionary, industrial applications.\n\nPacking in : 270 kg/ 300 kg HDPE drums', 1, '2019-06-15 11:18:20', 0),
(16, 'INSTANT FAT FILLED MILK POWDER', 3, 'uploads/b73e6a5387efa127d909b37c562f1469.jpg', 'uploads/e037b548e46c279a8fbeb43d8ed21a17.png', 'uploads/a16899c0050b38390d845f8a514e5754.png', 'Fat filled milk powder is a total or partial whole milk substitute. It is obtained by blending high quality skimmed milk powder with vegetable fat. Powder is atomized (spray drying) in order to easily reconstitute the product. This substitute has the same physical, chemical and organoleptical properties as a dairy product. It helps reducing formulation costs for a product without any impact on its quality. In fat filled milk powders, proteins come indeed from non-fat milk solids, whereas fat is of vegetable origin.\n\nPacking in : 25 kg Multiwall Paper bag with PE Inner Liner, Pouch Packing- 260 gm, 380 gm, Tin Packing- 2.5 kg, 900 gm, 400gm', 1, '2019-06-15 11:18:39', 0),
(17, 'SOYA LECITHIN', 3, 'uploads/01775a6184d85aa684d1ea740d3fbf7d.jpg', 'uploads/5acde42cf577ff2b1dc40d0200b5a085.png', 'uploads/84f52f9a7c680f70d130959773bff688.png', 'Lecithin is a food additive that comes from several sources â€” one of them being soy. It is generally used as an emulsifier, or lubricant, when added to food, but also used as an antioxidant and flavor protector. Soya lecithin is found in dietary supplements, ice cream and dairy products, infant formulas, breads, margarine, and other convenience foods.\n \nPacking in : HDPE/ MS Drums of 200 kgs/ 240 kgs, ISO container, IBC Tank', 1, '2019-06-15 11:18:59', 0),
(18, 'POLYSORBATE', 3, 'uploads/aa7854f7a30552379d5463dc0c569a26.jpg', 'uploads/a4a5510bd63d89b63f4b39e93604b8da.png', 'uploads/047e83184ec836896a86b65b47667c5d.png', 'Polysorbate also known as Sorbitan Monooleate is used as an emulsifier and stabilizer. It is used to bind some ice-creams to keep their creamy texture without separating. It is also used to bulk foods up and keep sauces smooth such as creamy sauces, mayonnaise, margarine, smooth chocolate.\n\nPacking in : HDPE Barrels of 220 kgs/ 880 kgs', 1, '2019-06-15 11:19:22', 0),
(19, 'R. GLYCERINE 99.7 % BP GRADE', 4, 'uploads/46da89237c28151f8cf898daae06468d.jpg', 'uploads/ef4f2165afb8c61cc53ade6811a8ea68.jpg', 'uploads/583a742427eaa2e358dbdc4994ae7097.jpg', 'Refined Glycerine is colourless and odourless, sweet-tasting viscous and hygroscopic liquid produced from the vegetable oils upon splitting them. It has the properties as solublizer, plasticizer, moisturizing and preserving agent. Refined Glycerine is widely used in pharmaceuticals, food applications, paints, textiles, cosmetics, daily chemicals etc.\n\nPacking in : New Steel Drums. / HDPE Drums, Flexibags', 1, '2019-06-15 11:24:42', 0),
(20, 'SOAP NOODLES - TOILET GRADE / LAUNDRY GRADE', 4, 'uploads/41106f732bcb446e8f26ffe22ecb90ae.jpg', 'uploads/dd20629dcdac10da73f8d73a39517474.jpg', 'uploads/cc0e3097dda0bd6053e79b4113dcaac7.jpg', 'Soap Noodles are the sodium salt of fatty acids derived from oils or fats of Palm Oil, Palm Kernel Oil and Coconut Oil with required composition blend for soap making. Soap Noodles is of 100% vegetable origin. The process and the raw materials used enable us to retain all the good nutrients of the palm oil in the end products together with high glycerine content, the essential moisturizer for hand and body, softener for textile.\n\nPacking in : 25 kg PP Bags/ Kraft Paper Bags, Jumbo Bags', 1, '2019-06-15 11:25:06', 0),
(21, 'LAURIC ACID', 4, 'uploads/2b256982872ba29b1dbd1faa120350e8.jpg', 'uploads/8e4c5036fff15b107b3169952d0d9fe5.jpg', 'uploads/f429d1960e8464fa2581f9e60e67513d.jpg', 'Lauric Acid, is a saturated fatty acid with a 12-Carbon atom chain, thus having many properties of medium-chain fatty acids. Itâ€™s appearance is bright white in beads/ flake form with a faint odor of bay oil or soap. It is mainly used as raw material in various cosmetic products as well as in making soaps.  \n\nPacking in : 25 kg PP Bags/ Kraft Paper Bags', 1, '2019-06-15 11:25:25', 0),
(22, 'CRUDE / REFINED SUNFLOWER OIL', 5, 'uploads/349aa1601eee5d96cf77b73167703a8a.jpg', 'uploads/667399c3aa3bee5bcb89e4a93ea7e838.png', 'uploads/63a0971b60863ab243a86561062821af.png', 'Crude/ Refined Sunflower Oil is derived from crushing of Sunflower seeds, which preserves all the nutrients during the production process. This oil can be used in conditions of extremely high cooking temperatures.\n\nPacking in : Reconditioned/ New Steel Drums, Flexibags', 1, '2019-06-15 11:31:53', 0),
(23, 'CRUDE / REFINED SOYBEAN OIL', 5, 'uploads/9f192a2715fbfc4d3b64ed89b189280a.jpg', 'uploads/d5adca334c4d03a97eb52d84596911b9.png', 'uploads/dbd31c7083b468afe7f534c61cb01788.png', 'Crude Soya Bean Oil is obtained by heat treatment, crushed, dehulled and conditioned soybean, which is pressed. Oil is released of sediment through sedimentation and filtering in frame filter press, and then oil is stored. RBD Soybean Oil is refined, bleached, and deodorized from crude for use in paints, varnishes, alkyd resins, carriers, inks, pharmaceutical manufacturing and similar applications\n\nPacking in : PET Bottles, Tins, Jerry Cans, New Steel Drums, Flexibags', 1, '2019-06-15 11:32:14', 0),
(24, 'CRUDE / REFINED CORN OIL', 5, 'uploads/9483145b2881ff1bd87589c9ae4aa5ad.jpg', 'uploads/602669a5c7529f94aac349f8e8371108.png', 'uploads/92bcef3b52856ead47e0d0e4c3a7a461.png', 'Crude Corn Oil is a germ expeller oil as such, contains significantly more essential elements than simple seed oil. Obtained from the fractionation of conventional maize, crude corn oil is extracted from the germ by pressing.\n\nPacking in : PET Bottles, Tins, Jerry Cans, New Steel Drums, Flexibags', 1, '2019-06-15 11:32:34', 0),
(25, 'CRUDE / REFINED CANOLA OIL', 5, 'uploads/a46216fa3661f77858c7a6c68f029f44.jpg', 'uploads/97d59afa110d1693572061e32db3d733.png', 'uploads/28c2b1c07c404c911cdad5915e356d90.png', 'Canola Oil is produced from pods of canola plant which are harvested and crushed to create canola oil and meal. This oil is low in saturated fat and is an excellent food choice for a healthy diet. Canola oil is used for cooking and baking at home, restaurants and in food processing plants. Canola oil also has non-food uses such as in biodiesel and bio-plastics.\n\nPacking in : New Steel Drums, Flexibags', 1, '2019-06-15 11:32:53', 0),
(26, 'CRUDE / REFINED PALM KERNEL OIL', 6, 'uploads/91248d00229051e203dc7f2f0e3185f3.jpg', 'uploads/e2816142bf7fe33861836619f2e160e9.png', 'uploads/87cff1431af9f601d1efcceded0f80d8.png', 'RBD Palm Kernel Oil is derived from the kernel of the oil palm fruit. It is light yellow in color and refined physically to a very light color for both edible and non-edible use. Due to its rapid crystallization, it is often used in enrobing or dipping products. \n\nPacking in : New Steel Drums, Flexibags', 1, '2019-06-15 11:22:08', 0),
(27, 'CRUDE / REFINED PALM KERNEL OLEIN', 6, 'uploads/a49198d722821a94d4407d4123bac80f.jpg', 'uploads/7761b1b2562daa4c48ae5c155daa0607.png', 'uploads/590c8aabef01ae7403f4be5de926a6bf.png', 'RBD Palm Kernel Olein is the liquid fraction of palm kernel oil from fractionation. The olein can be hydrogenated for a sharper melting profile, enabling its use in coating fats. It is also very useful for margarine fats when combined and interesterified with palm stearin. \n\nPacking in : Jerry Cans, New Steel Drums, Flexibags', 1, '2019-06-15 11:22:32', 0),
(28, 'CRUDE / REFINED PALM KERNEL STEARIN', 6, 'uploads/6121ab33412665ed6d74ef434c3ecbd7.jpg', 'uploads/f166bc366c8d442bcd9bf4c816b02798.jpg', 'uploads/5776364b9c496277480ea4330ec419a3.jpg', 'RBD Palm Kernel Stearin is the solid fraction of palm kernel oil upon fractionation. The Stearin can be hydrogenated for a sharper melting profile, enabling its use in chocolate moulding as well as filling fats. \n\nPacking in : New Steel Drums, Flexibags', 1, '2019-06-15 11:23:22', 0),
(29, 'CRUDE / REFINED COCONUT OIL (CCNO)', 6, 'uploads/b414b134cfaae92588310d70ae0a9c72.jpg', 'uploads/84283274457a4b063cea0b31bb956ba5.png', 'uploads/a7e0c375f3396ebaf6a3f58f6e98da75.png', 'Crude Coconut Oil is produced by crushing coconut copra, which is the dried coconut meat. It is commonly utilized in many industries including beauty, food, healthcare, nutraceuticals, soap, as well as a replacement for petroleum oil such as industrial grade oils and more recently, as a feedstock in the production of Biodiesel. \n\nRBD Coconut Oil is produced by processing the crude coconut oil by refining, bleaching, and then deodorizing (RBD) to make it suitable for food applications. It is excellent as cooking oil and can withstand high temperatures and it does not breakdown easily compared to other oils. \n\nPacking in : Jerry Cans, Tins, New Steel Drums, Flexibags', 1, '2019-06-15 11:23:46', 0),
(30, 'RAW CASHEW NUTS', 7, 'uploads/814a6d962618ed76c7d959e7070fd564.jpg', 'uploads/6879a6e2af62704fa4dd8daa7e917b33.png', 'uploads/91bfc3386f8c7c5d4fff8e5140077692.png', 'The cashew nut is the seed nestled inside a shell that grows on the fruit of the cashew tree. The shell is toxic, so the nut has to be removed before it can be eaten. This is typically done by roasting the nut in the shell, the shells are then removed by hand. Raw cashews, therefore, are not really raw, they have already been roasted to remove the shell.\n \nPacking in : 80 kg Jute Bags', 1, '2019-06-15 10:13:54', 0),
(31, 'CASHEW KERNELS', 7, 'uploads/11745a1ec4f710e5340d85828f310116.jpg', 'uploads/58f54826ec220735ed11aa5431c275cc.jpg', 'uploads/fa59f2b30496af28cde10153468c6d22.jpg', 'The cashew nut, often simply called a cashew, is widely consumed. It is eaten on its own, used in recipes, or processed into cashew cheese or cashew butter. Cashew Kernels are graded into white/ scorched wholes, pieces, splits, etc. depending on the shape, size & color of the kernel. Scorched wholes are another grade of cashew kernels, which have a slight brown color due to longer roasting. They have all the other characteristics of white kernels and have the same nutritional qualities.\n \nPacking in : Tins - 25 lbs. (11.340 kg) Tin & 10 kg Tin, Pouch - 50 lbs. & 25 lbs.', 1, '2019-06-15 10:14:08', 0),
(32, 'REFINED SUGAR', 7, 'uploads/9e4af8b92ca5b8c68d4988e47215dee2.jpg', 'uploads/9e544b9153e2263bf1d6d9db283a3447.jpg', 'uploads/85ad775b51d0ebf3d4c0e0927f8c04ee.jpg', 'Sugar is a natural ingredient that has been part of our diet for thousands of years. Sugars are carbohydrates that provide energy for the body. The most common sugar in the body is glucose which your brain, major organs and muscles need to function properly. Sucrose is often called table sugar which is made up from glucose and fructose, it is extracted from sugar cane or sugar beet and also naturally present in most fruits and vegetables\n \nPacking in : 50 kg PP Bags', 1, '2019-06-15 10:14:26', 0),
(33, 'SESAME SEEDS', 7, 'uploads/f64356e7901983a6d91ff0dc0ce92c6b.jpg', 'uploads/25e50c1e70583f98dc49240ebd977228.png', 'uploads/23facabd7dfdab2a8277793cb4dd8384.png', 'Sesame seeds are derived from a flowering sesame plant in the genus Sesamum. Sesame seed pods burst open when they reach full maturity, revealing the seeds of the sesame seed plant, which hold its valuable oils. With a rich, nutty flavor, it is a common ingredient in cuisines across the world.\n\nPacking in :-50 kg PP Bags', 1, '2019-06-15 10:14:59', 0),
(34, 'SPLIT DRIED GINGER', 7, 'uploads/ae324ec0ffb6cbcc9c205af3cf151133.jpg', 'uploads/94f2c3143041615ff7397ed712531d18.png', 'uploads/67f94c9ff539b009c364ad1629c221c4.png', 'Ginger is a commodity that is highly valued in international markets for its aroma, pungency and high oil and Oleo resin content. Dried ginger is usually presented in a split or sliced form. Splitting is said to be preferred to slicing, as slicing loses more flavour, but the sliced are easier to grind and this is the predominant form of dried ginger currently in the market.\n \nPacking in : 40 kg PP Bags', 1, '2019-06-15 10:15:25', 0),
(35, 'CHICKPEAS', 7, 'uploads/e82b720009aff165cbbd046727d6bd6e.jpg', 'uploads/e1a662cd6a510ee329d80a7a3ec414e6.png', 'uploads/9c081f897b2f869b567490ee36a30050.png', 'Chickpeas have high protein and fiber content. It is a very versatile legume and are a noted ingredient in many Middle Eastern and Indian dishes such as hummus, falafels and curries. While many people think of chickpeas as being in beige in color, but there are other varieties as well which feature colors such as black, green, red and brown.\n \nWe have various size of chickpeas like :-\nA) 58/60 Count (9 mm)\nB) 44/46 Count (11 mm)\nC) 42/44 Count (12 mm)\nD) 40/42 Count (14 mm)\nE) 75/80 Count (7/8 mm)\n \nPacking in : 25/50 kg PP Bags', 1, '2019-06-15 10:15:53', 0),
(36, 'GUM ARABICA', 7, 'uploads/cb1f680fd3016f67d74fdc0130131173.jpg', 'uploads/fdd864e55280006d4cb2460a578c7f2d.jpg', 'uploads/f3cb38bdc473142e66b7d7203103ac6f.jpg', 'Gum Arabic is a fibrous product made from the natural hardened sap of two types of wild Acacia trees. It is considered to be natural, edible and generally safe for human consumption. Research suggests that itâ€™s non-toxic, especially when used in normal/moderate amounts, and tolerated by people with sensitivities to gluten. Arabic gum is used to help stabilize products including desserts and baking ingredients, dairy products like ice cream, syrups, hard and soft candies, ink, paint, water colors, photography and printing materials etc.\n \nPacking in : 50 kg pp bags', 1, '2019-06-15 10:16:09', 0),
(37, 'MAC PLUS - RUMEN PROTECTED FAT', 8, 'default_preview.jpg', 'uploads/d7c0885f70caf01f2c08450afb3ba917.png', 'uploads/3a3373d369d0614ac5b909617feb2987.png', 'Mac Plus is rumen bypass fat, made from pure vegetable oil. It has min 75% Palmitic Acid which is saturated and highly digestible in the lower gut. Since it has high melting point and saturated, it bypasses the rumen with minimal digestion. Dairy cattle demand for energy increases tremendously after calving, especially the first 100 days post-partum which leads to drawing energy from its body reserve to meet the demands of milk production and ends up with negative energy balance. Mac Plus enables to overcome such situation in cows as it is the high energy supplement for dairy cows.\n \nPacking in : 25 kg PP/ Paper Bag', 1, '2019-06-15 11:10:44', 0),
(38, 'CALCIUM SOAP', 8, 'uploads/1f5bc31b72f30eb314143b1ed02bc3fa.jpg', 'uploads/cd7dfe1991c61a69407ccf54e67989a8.png', 'uploads/3779ed5b701a354e0b10a99a00bc5ef5.png', 'The Calcium Soap (Rumen bypass fat) is made by combining long chain fatty acids for high milk yielding dairy ruminants with a calcium source resulting in a soap that will stay inert in the rumen. Because its main structure consists of fatty acids (which essentially is unattached triglycerides)- the main ingredient in an oil or fat is converted to energy, the Calcium Soap once broken up in the acidic 4th stomach, allow the fatty acids to be digested and converted into energy. Due to high requirement of energy to produce more milk and to recover from birthing (needed to get the animal to lactate), there is a need to provide a diet of highly intense energy feed.\n \nPacking in :- 25 kg PP/Paper Bag', 1, '2019-06-15 11:11:19', 0),
(40, 'PALM KERNEL PELLET / MEAL / CAKE / EXPELLER', 8, 'uploads/7834b8cc49f4ebdf77c3ffa5c8897f0e.jpg', 'uploads/f5b097ee2ce6eaeeb8086d273deb39c0.png', 'uploads/08e6c2b3c0ca179198f2bdc696b2eb69.png', 'PKP/PKM/PKC/PKE is an important feed ingredient that is obtained from the kernel after the oil has been extracted. It is a good source for animal feed as it supplies protein, energy and fiber. The PKP/PKM/PKC/PKE extracted by the solvent method unlike the mechanical method ensures that the nutritional profile of the product is not destroyed and external undesirable substances are separated. Higher energy made available through PKP/PKM/PKC/PKE can be used to replace other additives or sources of fats that feed manufacturers add in order to gain the desired growth in animals.\n \nPacking in : 50 kg Bag/ Loose stuffed in Bulk', 1, '2019-06-15 11:12:54', 0),
(43, 'SUNFLOWER DE-OILED CAKE/ MEAL', 8, 'uploads/47032fca02c8e1e2ce996eb970095b1d.jpg', 'uploads/b526979bf0e42dc5abf228ccb7b169b5.png', 'uploads/d3da950dfe9064e0c1eee1b63925ee82.png', 'Sunflower meal is another name for sunflower de-oiled cake. This is a by-product of extraction of oil from sunflower seeds. It is high in nutrition and is a rich source of protein and fiber. It is an excellent livestock feed and is ideal for composting purpose for the production of mushrooms. It is usually feed to dairy cows that have a high energy requirement.\n \nPacking in : 50 kg Bag/ Loose stuffed in Bulk', 1, '2019-06-15 11:14:03', 0),
(44, 'SOYBEANS / SOYBEAN MEAL / SOYBEAN DE-OILED CAKE', 8, 'uploads/91bf87af837ecd02c74badfbabdb8a60.jpg', 'uploads/475733877db46e80ef2db2fcb2cd46d4.png', 'uploads/78282f56d463bd95ed2b0152343b8aea.png', 'Soybean is generally recognized as a source of edible and industrial oil. In oil extraction, soybeans undergo a solvent extraction process to produce the meal. On the other hand Soya De-Oiled Cake is a free flowing coarse granular material, produced from cleaned soybean seeds after series of preparatory physical processes followed by multistage extraction. Soybean Meal and Soybean de-oiled cake is an excellent source of protein commonly used in livestock, poultry feed and also as a source of metabolizable energy.\n \nPacking in : 50 kg Bag/ Loose stuffed in Bulk', 1, '2019-06-15 11:14:26', 0),
(46, 'SAFFLOWER MEAL', 8, 'uploads/211dc0b0c566eaad69f85c0322f92625.jpg', 'uploads/9416a5ddb9f0f49af2099e9efc38c521.png', 'uploads/58cafcaf3b3aa5fdf836ba207ae3d47d.png', 'Safflower meal is made from the seeds that remain after oil extraction. The quality of the safflower meal is variable and depends on the amount of hulls and the extent of the oil extraction. Safflower oil can be obtained from the seeds by cold-pressing, expeller pressing, or solvent extraction. Solvent extraction is more effective at oil removal than mechanical extraction.\n \nPacking in : 50 kg Bag/ Loose stuffed in Bulk', 1, '2019-06-15 11:14:49', 0),
(49, 'PEANUT MEAL/ GROUNDNUT OIL CAKE', 8, 'uploads/7ee53a8f85800216c80ec3ee0c9aff64.jpg', 'uploads/3fd3e7c81b8cd02f9021d2b1c107e8d0.png', 'uploads/651ff054addce80c64b67c5f9a5cd3ad.png', 'Peanut meal/ Groundnut oil cake is a protein-rich ingredient that is widely used to feed all classes of livestock. It is generally considered as an excellent feed ingredient due to its high protein content, low fibre, high oil (for expeller meal) and relative absence of antinutritional factors.\n \nPacking in : 50 kg Bag/ Loose stuffed in Bulk', 1, '2019-06-15 11:15:13', 0),
(50, 'CORN GLUTEN MEAL', 8, 'uploads/cef467a5c0a9e4fa3c3db991b1ff873d.jpg', 'uploads/ef03bf5401ee3bf92326de45a3523fdc.png', 'uploads/3502273dd5e2d2560db0c0ef060cc246.png', 'Corn gluten meal is a protein-rich feed. It is a byproduct of corn processing that has historically been used as an animal feed. Despite the name, \"corn gluten\" does not contain true gluten, which is formed by the interaction of gliadin and glutenin proteins. It is also valued in pet food for its high protein digestibility\n \nPacking in : 50 kg Bag/ Loose stuffed in Bulk', 1, '2019-06-15 11:15:36', 0),
(51, 'COPRA MEAL/ CAKE', 8, 'uploads/0959d42a5f1a46e9268237d0074dca58.jpg', 'uploads/f28ad6eae7e29561bee2cfd398cb6ce2.png', 'uploads/6a3047497f07923c5e892fc36c5dd431.png', 'Copra meal/Copra cake is the left over residue of a coconut after its oil extraction. Its high oil and protein levels are fattening for stock. The protein in copra meal/cake has been heat treated and it does not break down in the rumen and provides a source of high-quality protein for cattle, sheep and deer.\n \nPacking in : 50 kg Gunny Bags', 1, '2019-06-15 11:16:04', 0),
(52, 'SWEETENED CONDENSED FILLED MILK', 9, 'uploads/3cf3d8b68bfab367817ba332b5d3395a.jpg', 'uploads/68146954f907635afa7978440f5ea69e.png', 'uploads/44c204c00dbfe1b16ac87773ca4d9ba5.png', 'Sweetened condensed milk is a milk substitute with milk solids and vegetable fat which is very thick, sweet product and when canned can last for years without refrigeration if not opened. Sweetened Condensed milk is used in numerous dessert dishes in many countries. It is used largely as the most popular source of milk solids for the sugar confectionery industry.\n\nPacking in : 170 g/ 390 g/ 1000 g Tins', 1, '2019-06-15 11:30:37', 0),
(53, 'EVAPORATED MILK', 9, 'uploads/052151484ac8a992e5f9ca8ce1be2e04.jpg', 'uploads/720e0cd03e9ff480f689f4f7d6edab67.png', 'uploads/c9579908c196defd8e75bf0fbcefab0e.png', 'Evaporated Milk is a shelf-stable canned milk product with about 60% of the water removed from fresh milk. It possesses the appearance of cream. It is also used as a substitute for cooking and as coffee cream and is primarily used for recombination in various processed foods such as breads and confectionery. \n\nPacking in : 170 g/ 390 g/ 1000 g Tins', 1, '2019-06-15 11:30:53', 0),
(54, 'DESICCATED COCONUT POWDER', 9, 'uploads/93b0d69997b029f16b07468fda627ee9.jpg', 'uploads/e8a05c31142440e8bb4a8aabcddb34ae.png', 'uploads/d6dd9b0fdd7eaab66bb0019926597d52.png', 'Desiccated coconut is finely grated, dried, unsweetened form of coconut, obtained by drying shredded or ground kernel. It is used as a substitute to raw grated coconut in confectioneries, desserts like puddings, cookies, cakes, pastries, and other food preparations.\n \nPacking in : 25 kg PP bags', 1, '2019-06-15 11:31:07', 0),
(55, 'MYRISTIC ACID', 4, 'uploads/2af9943e349be25d3e4032d4a66207b2.jpg', 'uploads/101412aef781e7ccceb856055408c6dd.jpg', 'uploads/c5031e064b16800d92ca6e79f0e1ae7d.jpg', 'Myristic Acid is a fatty acid with a 14-Carbon atom chain found in Palm oil. It has a variety of uses in the beauty industry including as a: Fragrance Ingredient, Opacifying Agent, Surfactant, Cleansing Agent and Emulsifier.\n\nPacking in : 25 kg PP Bags/ Kraft Paper Bags', 1, '2019-06-15 11:25:49', 0),
(56, 'PALMITIC ACID', 4, 'uploads/0f27b25b88277197e6e54d5ce8fbcbaa.jpg', 'uploads/029947937a573c76516c2653fe723b81.jpg', 'uploads/76157cf175d11b5819cf32d0ca137f69.jpg', 'Palmitic Acid is a common saturated fatty acid found in fats and waxes naturally in palm oil and palm kernel oil. It is used as an ingredient in detergents, soaps and cleaning products, and as a surfactant. It is also used in beauty products and cosmetics for a variety of properties including as a fragrance ingredient, opacifying agent, surfactant, cleansing agent, emulsifying agent and emollient. \n\nPacking in : 25 kg PP Bags/ Kraft Paper Bags', 1, '2019-06-15 11:26:15', 0),
(57, 'TRIPLE PRESSED STEARIC ACID', 4, 'uploads/2577f898dc67e68635acf0e208ec016e.jpg', 'uploads/a7b322e51d0a32d8a3a053c086caf909.jpg', 'uploads/f17eefe092f6695af8870c174c8c747d.jpg', 'Triple Pressed Stearic Acid is used in a multitude of products that we use every day like shaving cream, cosmetics, medicines, skincare products, soaps, detergents and candles. It is also used in the manufacturing process of many more products due to its versatility. \n\nPacking in : 25 Kg PP Bags/ Kraft Paper Bags', 1, '2019-06-15 11:26:37', 0),
(58, 'RUBBER GRADE STEARIC ACID', 4, 'uploads/806f83839c7206d0c69c3f188457f94d.jpg', 'uploads/ff19b0907f90e4ff3668de7b4d0d7ef2.jpg', 'uploads/bae29597dd577dda686350eaeb844f8c.jpg', 'Rubber Grade Stearic Acid is used in various applications as an activator, dispersing agent, plasticizer and lubricant in rubber compound processing as well as an external lubricant and viscosity depressant in PVC processing.\n\nPacking in : 25 Kg PP Bags/ Kraft Paper Bags', 1, '2019-06-15 11:27:03', 0),
(59, 'ALUMINIUM INGOTS', 11, 'uploads/da341f5983556a0d03d43139ce6b4f06.jpg', 'uploads/f82cb7ff933c8a4ae3236affb57ac12e.jpg', 'uploads/a7b5125ae42c30ea900cf4d4b66ae0e4.jpg', 'Aluminium Ingots are manufactured by the freezing of a molten liquid (known as the melt) in a mold. The mold is designed to completely solidify and form an appropriate grain structure required for later processing, as the structure formed by the freezing melt controls the physical properties of the material. The shape and size of the mold is designed to allow for ease of ingot handling and downstream processing. An ingot is a piece of relatively pure material, usually metal, that is cast into a shape suitable for further processing. Ingots usually require a second procedure of shaping, such as cold/hot working, cutting, or milling to produce a useful final product. \n\nPacking in : Loose stuffed blocks', 1, '2019-06-15 11:20:09', 0),
(60, 'FLEXI BAGS', 11, 'uploads/c1550a3cf87659ddcbb95667786bf440.jpg', 'uploads/fcf71535db9044fb4470e9f368cc04d7.jpg', 'uploads/2e49768dd8bc2e9a782927fc5c9fd930.jpg', 'Flexibags are a good alternative to a tank container, ISO tanks, barrels and other packaging materials for non-hazardous liquids or non-hazardous powder. It can be suspended in a standard 20 ft, 40 ft container and it can even be loaded onto a truck. The flexibag measures between 10,000 and 24,000 litres, which depends on the density of the liquid to be transported. \n\nPacking in : Cartons', 1, '2019-06-15 11:20:42', 0),
(61, 'HDPE RESIN', 11, 'uploads/01cae69052fc75e1afe9016c2f2dfd67.jpg', 'uploads/4af18aab443b16d560ec14c839edb60e.jpg', 'uploads/e854d5d21a286027ce94b2b69dfdcaa2.jpg', 'HDPE Resin is a polyethylene thermoplastic made from petroleum. It offers an excellent combination of stiffness and environmental stress crack resistance, making them the materials of choice for many applications in personal care, household, industrial containers and bottle products in general.  \n\nPacking in : 25 kg Bags', 1, '2019-06-15 11:20:59', 0),
(62, 'PALMFIBRE', 11, 'uploads/af1908b7d534d7c1bb2ed103518899d2.jpg', 'uploads/aae16dbf392947bf16a873e79d2961b1.jpg', 'uploads/7c5ff0793df1e67051b60fc11ec02080.jpg', 'Palm Fibre is produced from oil palm\'s vascular bundles in the Empty Fruit Bunch (EFB). EFB is considered as waste products after the Fresh Fruit Bunch (FFB) have been processed. Palm fiber itself is 100% natural, non-hazardous, biodegradable and environmentally friendly. Palm Fiber is a superior substitute to coconut fiber due to its strong bond that are commonly used in making mattress and cushion production, rope manufacturing, rugs and carpets production, erosion control, livestock care and many others. \n\nPacking in : In Bales', 1, '2019-06-15 11:21:15', 0),
(63, 'RBD PALM OIL', 1, 'uploads/feb411dbc6d26eac95be1a5de6079216.jpg', 'uploads/2308250b45d8c957611edf06179058ca.jpg', 'uploads/22a748200463917cf076ac6fa6a33f29.jpg', 'RBD Palm Oil is obtained through refining process of Crude Palm Oil. It is in light cream colour and remains semi-liquid at room temperature, melting to a clear yellow liquid on slight heating. They are used as frying oil for food industries such as instant noodles and snack food. It is also used in manufacturing of margarine, shortening, vanaspathy, ice cream, condensed milk and soap.\n\nPacking in : Jerry Cans, Tins, Bag in Box, New Steel Drums, Flexi Bag', 1, '2019-06-15 11:17:54', 0),
(64, 'CETYL ALCOHOL', 4, 'uploads/9def34edd1920e7ef753e4285414961d.jpg', 'uploads/8ad66ea63345726e59178f4b8644551d.jpg', 'uploads/f5b11b58616f281d8716927bc73bd7d6.jpg', 'Cetyl alcohol, also known as 1-hexadecanol and palmityl alcohol, is a common ingredient in a variety of personal care products and cosmetics. It is derived from vegetable oils such as palm or coconut oil. It is available in the form of pastelles.\n\nPacking in : 25 Kg PP Bags/ Kraft Paper Bags', 1, '2019-06-15 11:27:20', 0),
(65, 'STEARYL ALCOHOL', 4, 'uploads/ed75d663b6cf8689afc46183280ffa82.jpg', 'uploads/6e2e2bea59e514e13e04966121d30f61.jpg', 'uploads/913eac643862ace864caf94a76b69e6d.jpg', 'Stearyl Alcohol is a natural fatty alcohol derived from stearic acid, coconut oil or vegetable fatty acids, and is used to soothen and soften as a conditioning agent and as an emulsifier. It is often found as a hair coating ingredient in shampoos and conditioners, and an emollient in creams and lotions for the skin. It is available in the form of pastelles.\n\nPacking in : 25 Kg PP Bags/ Kraft Paper Bags', 1, '2019-06-15 11:27:46', 0),
(66, 'PALM FATTY ACID DISTILLATE', 4, 'uploads/3431d6c41c6b03c145458e2ee1551efe.jpg', 'uploads/bb67fd53d5a60e82e9c41a7b5996ceda.jpg', 'uploads/b6ac8b75ca65e20b16fe8e057bb8233b.jpg', 'Palm Fatty Acid Distillate is a by-product derived during the refining process of crude palm oil. It is used for many industries such as soap manufacturing, animal feed and also is used as raw materials for bio-diesel and chemical industries.\n\nPacking in : Reconditioned Drums, Flexibags', 1, '2019-06-15 11:28:02', 0),
(67, 'PALM KERNEL FATTY ACID DISTILLATE', 4, 'uploads/bab4c8ee4fe40df9d27feb56cc6c8ca9.png', 'uploads/030b4013ee7663b0a243a5d713cb5efa.png', 'uploads/8f07594b5e302d98efe036123e48cc99.png', 'Palm Kernel Fatty Acid Distillate or commonly known as PKFAD is produced during the refining process of the Palm Kernel based oils. It is light brown liquid at room temperature and is used as raw material in soap, grease, oleo and bio-diesel industries.\n\nPacking in : Reconditioned Drums, Flexibags', 1, '2019-06-15 11:28:24', 0),
(69, 'DCFA', 4, 'uploads/947897650e699a35fd8fdf560ff5a39d.jpg', 'uploads/25ab6c662cf0c9a905d9abcea6775961.jpg', 'uploads/600dd6c7e9fe0b7cefc38c66c8480508.jpg', 'Distilled Coconut Fatty Acid is derived from Coconut Oil by the splitting of fats at high temperature and pressure. They are then distilled, obtaining a product with a white appearance and a soapy feel which is used in making soaps and cosmetics.\n\nPacking in : Reconditioned/ New Steel Drums, Flexibags', 1, '2019-06-15 11:28:45', 0),
(70, 'CDEA', 4, 'uploads/f7c705278f8643c04228880c366aea05.jpg', 'uploads/0dc0bf6415453aa856297f9d4daf3c8a.jpg', 'uploads/b6fa5c6c90c8514f18ea82f8a0d42e2e.jpg', 'Coconut Di Ethanolamide, is made by reacting the mixture of fatty acid from coconut oil with diethanolamine. It is a viscous liquid and is used as a foaming agent in bath products like shampoos and hand soaps, and in cosmetics as an emulsifying agent.\n\nPacking in : Reconditioned/ New Steel Drums, Flexibags', 1, '2019-06-15 11:29:00', 0),
(72, 'RICE', 7, 'uploads/f1d78bd591e7fc5e691249c489618402.jpg', 'uploads/6125237043606da959553e5d65704fb6.jpg', 'uploads/b81cb92a47e07ecab52243113db6446f.jpg', 'Rice is available in a variety of forms. While it is not edible in its rough form, it has to be processed and milled to get the desired form of rice. There are more than 40,000 varieties of cultivated rice in the world, here are the most common type of rice you will come across:-\n \nA) Basmati rice - Basmati rice is a long-grain rice known for its fragrant taste and smell. t is mainly grown in India and Pakistan in the Himalayan foothills. Some names of basmati rice are 1121, Sona Masoori Rice, Pusa Basmati Rice.\n \nB) Non- basmati rice - Non- basmati rice comes in all kinds of different shapes and sizes. Some are long and slender, some are short and thick, some are like beads, and some may be round. None have the same characteristics as basmati rice. Some names of non-basmati rice are Parboiled Rice, Broken Rice, Sella Rice, Swarna Rice and Sona Masoori Rice.\n \nPacking in : 50 kg PP Bags', 1, '2019-06-15 10:16:51', 0),
(73, 'BARLEY', 7, 'uploads/f6f22e101500ec632e7a569cbf4e0202.jpg', 'uploads/70c5bd9ac029e394c564c3d89300712d.png', 'uploads/50620a33eb55c6f8a142ea5d915e46fe.png', 'Barley is a major cereal grain grown in temperate climates globally. It is a wonderfully versatile cereal grain with a rich nutlike flavor and an appealing chewy, pasta-like consistency. Its appearance resembles wheat berries, although it is slightly lighter in color. Sprouted barley is naturally high in maltose, a sugar that serves as the basis for both malt syrup sweeteners. When fermented, barley is used as an ingredient in beer and other alcoholic beverages.\n \nPacking in : 50 kg Bag/ Loose stuffed in Bulk', 1, '2019-06-15 10:17:08', 0),
(74, 'PEANUT', 7, 'uploads/456e559b4782b6e39ebc2037b5a0358e.jpg', 'uploads/ee69be43fb905da7f635816778fd058a.jpg', 'uploads/02cc3c990881efd21a5b09cb1ee43a86.jpg', 'Peanut also known as the groundnut, is a legume crop grown mainly for its edible seeds. They are comprehensively  used for the  extraction of  edible  oil  from  it. The peanut is unusual because it flowers above the ground, but fruits below the ground. From planting to harvesting, the growing cycle takes about four to five months, depending on the type or variety\n \nPacking in : 50 kg jute bags', 1, '2019-06-15 10:17:50', 0),
(75, 'COCOA POWDER', 7, 'uploads/609564f71d8fdb44ecd5de2a3d205302.jpg', 'uploads/a542c1523ff50ba925d07e9c7dd75d60.png', 'uploads/c915db530e0a69b317d90d12c45e4638.png', 'Cocoa powder is an unsweetened powder produced by grinding cacao beans and pressing out the cocoa butter, better known as fat. The resulting cocoa powder is low in fat, but has an intense chocolate taste.\n \nPacking in : 25 kg net weight, packed in 3 ply Kraft paper bags with 1 inner layer of plastic HDPE 35 micron complying with International Standards.', 1, '2019-06-15 10:18:12', 0),
(76, 'DISTILLER DRIED GRAINS WITH SOLUBLES [DDGS]', 8, 'uploads/c45035e8ac45457c14083c634b64476a.jpg', 'uploads/2cd550488ca5b74622695d7345703b88.jpg', 'uploads/b69017c0f5cc7fa81a4e1dd5e8f48285.jpg', 'DDGS is a commodity by-product of the distillation process of corn. This process starts with removing the bran by grinding before steeping the grain in water. The wet cakes resulting from this process are then dried off resulting in DDGS feed.\n\nPacking in : In Bulk', 1, '2019-06-15 11:16:21', 0),
(77, 'COCONUT FATTY ACID DISTILLATE', 4, 'uploads/8414d7006fed7cf92c29319f73ad9c16.png', 'uploads/7460e0e3240678c434190776325bd4f2.png', 'uploads/45dc732c2ba2d54aba8ac2013cf86137.png', 'CFAD contains most of the free fatty acids isolated from crude coconut oil during the refining process. This product is a raw material for fatty acid producers. Crude fatty acid oil is good for fat source in animal feeds. Coconut fatty acid has a bland taste, characteristic odour.\n\nPacking in : Reconditioned/ New Steel Drums, Flexibags', 1, '2019-06-15 11:29:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `ID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `display` varchar(250) NOT NULL,
  `body` text NOT NULL,
  `type` varchar(200) NOT NULL,
  `target` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `to_email` varchar(300) NOT NULL,
  `to_name` varchar(300) NOT NULL,
  `cc_email` varchar(300) NOT NULL,
  `cc_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`ID`, `name`, `subject`, `display`, `body`, `type`, `target`, `status`, `to_email`, `to_name`, `cc_email`, `cc_name`) VALUES
(1, 'register', 'Welcome email', 'User Register', 'Hi [name],\r\n     Welcome to our community', 'email', 'user', 1, 'info@4blocksinc.com', 'Support', '', ''),
(2, 'register', 'New user registered', 'User Register Admin', 'Dear Admin, New user [name] registered with us', 'email', 'admin', 1, 'info@4blocksinc.com', 'Support', '', ''),
(3, 'register', 'Register OTP', 'Sign in OTP', 'Use this code [otp] to complete your registration', 'sms', 'user', 1, 'info@4blocksinc.com', 'Support', '', ''),
(13, 'forgot_password', 'Forgot Password', 'Forgot Password', 'Your password is [password]', 'email', 'user', 1, 'info@4blocksinc.com', 'Support', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
