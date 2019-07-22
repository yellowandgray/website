-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 17, 2019 at 09:19 AM
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
(1, 'COOKING OIL / FRYING OIL', 'uploads/edfc2749775b2ee8df356b5fe3570ea8.jpg', 'Cooking oil is plant, animal, or synthetic fat used in frying, baking, and other types of cooking. It is also used in food preparation and flavouring not involving heat, such as salad dressings and bread dips, and in this sense might be more accurately termed edible oil. Cooking oil is typically a liquid at room temperature, although some oils contain saturated fat, such as coconut oil, palm oil and palm kernel oil are solid at lower temperatures.', 1, '2019-07-15 15:02:05', 0),
(2, 'BAKERY AND CONFECTIONERY FATS', 'uploads/db6e60eb53d8b976582c3137b7950206.jpg', 'Bakery and confectionery fats are specialized Fats that is designed to suit its application in confectionery, pastries, biscuit, cakes, wafers etc. Our bakery and confectionery fats are uniquely designed to meet every bakery and confectionery demands, from mouldings, coatings, dips and topping to fillings and sperads for confectioneries. It gives good aeration, elasticity, flakiness, tenderness and richness for bakery goods providing the end product with improved taste properties and shelf life at an efficient cost.', 1, '2019-07-15 16:23:16', 0),
(3, 'FOOD INGREDIENTS', 'uploads/827ec2ff634fe42f01b094b62f4afd0a.jpg', 'Food ingredients are food additives that aid in improving the end products shelf life, quality, appearance and consistency. These ingredients are sourced from reputable and quality sources to ensure that the ingredients are at its optimum quality when it is delivered to you. We offer vegetarian products and non-vegetarian products, organic and conventional, Halal and non-Halal and more to add value for both manufacturers and consumers.', 1, '2019-06-20 11:47:31', 0),
(4, 'OLEO CHEMICALS', 'uploads/f78e385dc975bebf818031092ce68750.jpg', 'Oleo chemicals are chemicals derived from plant fats, produced by splitting of oils or fats through various chemical and enzymatic reactions. They are commonly used in pharmaceuticals, food industry, soap and laundry detergents, candles, waxes, lubricants, paints and coatings etc. Our Oleo chemicals are an effective high-quality substitute to many petroleum based products, providing a sustainable solution for a better future.', 1, '2019-06-20 11:48:13', 0),
(5, 'SOFT OILS', 'uploads/ad346fd380c255bdad224ec53edd1ebb.jpg', 'Soft oils are one of the most commonly used oil as they are liquid at roon temperature. The oils are derived from the plant and further refined to be suitable for human consumption. To name a few, they are corn oil, sunflower seed oil, canola oil and soya bean oil. These oils are commonly used as cooking oil, food dressings and can also be used in soap making. Mac World offers various packing for there soft oils , catered to our customerâ€™ requirements.', 1, '2019-06-20 11:49:40', 0),
(6, 'LAURIC OILS', 'uploads/f940761b21f9d9165af4b1f45a1e0354.jpg', 'Coconut Oil and Palm Kernel Oil are categorized as lauric oils, as both consists to a large degree of lauric acid (C12 saturated fatty acid). Lauric Oils and their derivatives have diverse applications, in the food and chemical industries. Further hydrogenation of lauric oils can further enhance their stability and colour, which is particularly useful in production of mild surfactants, soft vegetable waxes, cosmetics, etc', 1, '2019-07-15 15:02:28', 0),
(7, 'AGRO COMMODITIES', 'uploads/e3c2c8a8b0a858d89fbf51020b27f3f9.jpg', 'Agricultural Commodities comes from the raising of staple crops and/or animals. Most agricultural commodities such as grains, livestock and dairy provide a sourcs of food for people and animals across the globe. With the expansion of technology, access to agricultural commodities is now easier than ever. Commodities such as pulses, cereals, grains will come under this category.', 1, '2019-06-20 11:50:22', 0),
(8, 'CATTLE FEED PRODUCTS', 'uploads/0b396cdf11639bc0e53b31b94008076f.jpg', 'Cattle feed is a mixture of various concentrate feed ingredients in suitable proportion. Commonly used ingredients in cattle feed will induce palatability as they are good source of nutrients for growing, lactating and pregnant animals. They are an economical source of concentrate supplements and are available in the form of mesh, pellets, de-oiled cake, meal etc. Through regular use of our cattle feed along with its base diet the cost of milk production from dairy animals can be optimized and net profitability can be increased.', 1, '2019-07-15 15:01:56', 0),
(9, 'PROCESSED & CANNED FOOD', 'uploads/fcdef7bbce7705eb48ec640f7f0b785b.jpg', 'Processed and canned food are those food products which are fully or semi processed products in various packed form for the convenience of usage. They can either be consumed directly or with minimal processing or cooking enabling for quick / easier usage. These products are stable with a longer shelf life, making it suitable for long shipments and storage.', 1, '2019-06-20 11:51:27', 0),
(11, 'GENERAL COMMODITIES / RAW MATERIALS', 'uploads/21717426db9df15ea2ebc06d2f615401.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 1, '2019-07-12 15:25:11', 0);

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
(2, 'RBD PALM OLEIN', 1, 'uploads/38b32099b8830d66b818b413774a90c8.jpg', 'uploads/1c9276238b0cc4be2ae100ec95688efa.jpg', 'uploads/ef8f496b4bfa2d203f93bba41aabfe30.png', 'RBD Palm Olein is obtained by fractionating Refined Palm Oil to Olein in liquid form and Stearin in solid form. It is a clear yellow liquid at room temperature. RBD Palm Olein is used for cooking as well as frying oil for food industries such as snack food and ready-to-eat food products. \n\nPacking in : PET Bottles, Jerry Cans, Tins, Bag in Box, New Steel Drums, Flexi Bag', 1, '2019-07-16 11:23:17', 0),
(3, 'BLENDED OIL', 1, 'uploads/1feccb9d9043606a57cae097b4e97fde.jpg', 'uploads/eff51637d6cd585f9d1e93d29a6fb67a.jpg', 'uploads/bb09a4d339cb5d501a5f791f1dbad87a.png', 'Blended Oil is obtained by blending of 02 or more types of Oil mainly to retard the chances of Plam Olein to cloud due to high melting point of this product. Usually the blend constitutes Soya Bean Oil and Palm Oil, Sunflower Oil and Palm Oil, Canola Oil and Palm Oil.\n\nPacking in : PET Bottles, Jerry Cans, Tins, Bag in Box, New Steel Drums, Flexi Bag', 1, '2019-07-16 19:45:06', 0),
(5, 'VEGETABLE SHORTENING', 2, 'uploads/36c6816e7da6f6f2d4f43c18ea68bf2e.jpg', 'uploads/638ab95aa8f9cde6fbc23c7424507b89.jpg', 'uploads/d48bba442a24a6d762582082dcbed016.png', 'Our Vegetable shortening product is made from Pure Refined Palm Oil which are free from Trans Fatty Acids. They are used in all confectionery and frying applications with low oxidation property. They are excellent for use in creaming products, appeals white in colour and is available in various melting points from 36 Deg C to 52 Deg C.  \n\nPacking in : Cartons with PE Liner', 1, '2019-07-16 19:51:56', 0),
(6, 'RBD PALM STEARIN', 2, 'uploads/2ed6907b3f02ac5b7299a1d5f4764898.jpg', 'uploads/ef5f06209008a61dcfb0c67ea665badf.jpg', 'uploads/39068e5ef629d6be8927f5d261e010b9.png', 'RBD Palm Stearin is obtained by fractionating Refined Palm Oil. It is a white solid fat at room temperature, melting to a clear yellow liquid on heating. RBD Palm Stearin is used in edible products such as Margarine and Shortening industries. It is also used in Non Edbile range of Soaps, Candles and in Oleo-chemical industries.\n\nPacking in : Cartons with PE Liner, Steel Drums, Flexibags', 1, '2019-07-17 11:26:56', 0),
(7, 'MARGARINE [CAKE / PASTRY / CROISSANT]', 2, 'uploads/ebbc9039829f1f7c04e15554d459a5ae.jpg', 'uploads/41f3fe1e1c7b1abc0b1bf25f028498d3.jpg', 'uploads/94fcf1379fc7c6821e237542463cc280.png', 'Margarine is a water-in-oil emulsion, similar to butter in appearance and composition, and an alternative to dairy based butter. Margarine is a low priced substitute for butter, it offers better spreadability and nutritional qualities, improved baking performance and has a longer shelf life. \n\nPacking in : Pouches, Tubs, Cartons with PE Liner', 1, '2019-07-16 19:56:23', 0),
(8, 'VEGETABLE GHEE', 2, 'uploads/692ce1771f03d3955cd72a1f6239e205.jpg', 'uploads/905aabd1943556d73e8b938adc14e15c.jpg', 'uploads/539ee51e93eb7378d25e88b68845ff59.png', 'Vegetable Ghee serves as a substitute for traditional ghee, an important ingredient in many Indian & Arabic dishes and desserts. Vegetable Ghee has fine texture and flavour that is an immediate substitute to dairy based ghee. Some regions prefer texturised ghee which provides granulated consistency for the product over the smooth texture.\n\nPacking in : Tins, Cartons with PE Liner', 1, '2019-07-16 19:58:04', 0),
(9, 'COCOA BUTTER SUBSTITUTES [CBS]', 2, 'uploads/2c008fdee639f30f9d8d59a44653aca1.png', 'uploads/27efca8d991df633c427d933243ffd99.jpg', 'uploads/8a7938166be530812b3236de8bcc01bc.png', 'Cocoa Butter Substitutes are fats which have similar physical properties to cocoa butter but different triglyceride composition. Cocoa Butter Substitute is basically fractionated Palm Kernel Oil base, either partially or fully hydrogenated, with or without emulsifiers. It is hard, yet melts sharply below body temperature with good mouth-feel.This is commonly used in chocolate moulding as well as Ice Cream manufacturing.\n\nPacking in : Cartons with PE Liner, New Steel Drums', 1, '2019-07-16 20:00:26', 0),
(10, 'COCOA BUTTER EQUIVALENT [CBE]', 2, 'uploads/d6923ab04a510b0276a75b19cd9fa3d3.png', 'uploads/42f7090ad049961754538dbfac55e026.png', 'uploads/93aae0753cf2f095ad3b04a0df7f3deb.png', 'Cocoa Butter Equivalents are vegetable fats with symmetrical 2-oleochemical triglycerides of C16 and C18 fatty acids, similar to those in cocoa butter. They should be compatible with cocoa butter in the proportions normally used in chocolate.\n\nPacking in : Cartons with PE Liner, New Steel Drums', 1, '2019-06-15 11:02:53', 0),
(11, 'HYDROGENATED PALM KERNEL OIL', 2, 'uploads/ddc8b22cd1cedc30611e485e95ed9907.jpg', 'uploads/77c6fb662d3fe92d6f64304e6e0d2a79.jpg', 'uploads/fb0ea8f1c845976eb11bf327932b6026.png', 'Hydrogenated Palm Kernel Oil is a partially hydrogenated non fractionated palm kernel oil base product. It is a food grade hard fat with excellent qualities. It is bland and odourless with excellent palatability. This is mainly used for chocolate coating as well as chocolate filling application depending on the required melting point and texture for the Chocolate..\n\nPacking in : Cartons with PE Liner, New Steel Drums', 1, '2019-07-16 20:02:32', 0),
(12, 'BLENDED BUTTER', 2, 'uploads/4070b77ad9048c2d482511f7f598aee4.jpg', 'uploads/bb5c52dd2c40f3b4225bf6b91fb3ffde.jpg', 'uploads/d3fa71410f8be568832a6e129509ef37.png', 'Blended Butter is a formulation of milk fat solids, pure vegetable oil, emulsifiers and butter flavour to provide a smooth, creamy textured butter alternative. It is rich in taste and cost-effective blend that can be used for baking, frying, grilling, sautÃ©ing, as a spread on toast/ breads and any other application where butter is used.\n\nPacking in : Tins, New Steel Drums', 1, '2019-07-16 20:03:29', 0),
(14, 'HYDROGENATED COCONUT OIL [HCNO]', 2, 'uploads/b6a115177a1490d9457386b1c18a1020.jpg', 'uploads/096837c9d9957529a5d799c3d449fd1d.jpg', 'uploads/9dc89d2179d1f17e456d1f4874953fa8.png', 'HCNO is a hydrogenated lauric based fraction of hardened white vegetable fat with bland colour and flavour which provides excellent mouth feel characteristics at the best value. This is commonly used as the fat medium in the manufacturing of Ice Creams as it imparts smooth taste profile and mouthfeel for Ice Creams.\n\nPacking in : Cartons with PE Liner', 1, '2019-07-16 20:06:22', 0),
(15, 'SORBITOL SOLUTION BP GRADE', 3, 'uploads/bc535c2de900addc7386163790ebad91.jpg', 'uploads/5b2328996bebaa96772042fde3ba77e3.jpg', 'uploads/8a117463694289add65fda807d455fc0.png', 'Sorbitol, a polyol (sugar alcohol) is a bulk sweetener, syrupy liquid found in numerous food products. Most sorbitol is made from corn syrup, but it is also found in nature, for example in apples, pears, peaches, and prunes. In addition to providing sweetness, it is an excellent humectant and texturizing agent. It is used in a wide variety of oral care, pharmaceuticals, soaps, paints, food, confectionary, industrial applications.\n\nPacking in : 270 kg/ 300 kg HDPE drums', 1, '2019-07-17 11:27:25', 0),
(16, 'INSTANT FAT FILLED MILK POWDER', 3, 'uploads/ab10b6626aca6d1abb28401901f5c1c4.jpg', 'uploads/d2ded82662b69d6ce83a1bd6287a3a06.jpg', 'uploads/a16899c0050b38390d845f8a514e5754.png', 'Fat filled milk powder is a total or partial whole milk substitute. It is obtained by blending high quality skimmed milk powder with vegetable fat. Powder is atomized (spray drying) in order to easily reconstitute the product. This substitute has the same physical, chemical and organoleptical properties as a dairy product. It helps reducing formulation costs for a product without any impact on its quality. In fat filled milk powders, proteins come indeed from non-fat milk solids, whereas fat is of vegetable origin.\n\nPacking in : 25 kg Multiwall Paper bag with PE Inner Liner, Pouch Packing- 260 gm, 380 gm, Tin Packing- 2.5 kg, 900 gm, 400gm', 1, '2019-07-16 20:09:12', 0),
(17, 'SOYA LECITHIN', 3, 'uploads/18dc973652d05ab031d5ddc83a841737.jpg', 'uploads/fe0b564aa8db52c314c0f282b9c9adaf.jpg', 'uploads/84f52f9a7c680f70d130959773bff688.png', 'Lecithin is a food additive that comes from several sources â€” one of them being soy. It is generally used as an emulsifier, or lubricant, when added to food, but also used as an antioxidant and flavor protector. Soya lecithin is found in dietary supplements, ice cream and dairy products, infant formulas, breads, margarine, and other convenience foods.\n \nPacking in : HDPE/ MS Drums of 200 kgs/ 240 kgs, ISO container, IBC Tank', 1, '2019-07-16 20:16:57', 0),
(18, 'POLYSORBATE', 3, 'uploads/52998851388c79a74cb8de703ed8333d.jpg', 'uploads/ac5a6c2fc9f68363814c4a6ebb4b6f6e.jpg', 'uploads/047e83184ec836896a86b65b47667c5d.png', 'Polysorbate also known as Sorbitan Monooleate is used as an emulsifier and stabilizer. It is used to bind some ice-creams to keep their creamy texture without separating. It is also used to bulk foods up and keep sauces smooth such as creamy sauces, mayonnaise, margarine, smooth chocolate.\n\nPacking in : HDPE Barrels of 220 kgs/ 880 kgs', 1, '2019-07-16 20:19:49', 0),
(19, 'R. GLYCERINE 99.7 % BP GRADE', 4, 'uploads/46da89237c28151f8cf898daae06468d.jpg', 'uploads/a8517bd451b154d37f8101d4a02967aa.jpg', 'uploads/583a742427eaa2e358dbdc4994ae7097.jpg', 'Refined Glycerine is colourless and odourless, sweet-tasting viscous and hygroscopic liquid produced from the vegetable oils upon splitting them. It has the properties as solublizer, plasticizer, moisturizing and preserving agent. Refined Glycerine is widely used in pharmaceuticals, food applications, paints, textiles, cosmetics, daily chemicals etc.\n\nPacking in : New Steel Drums. / HDPE Drums, Flexibags', 1, '2019-07-16 20:22:53', 0),
(20, 'SOAP NOODLES - TOILET GRADE / LAUNDRY GRADE', 4, 'uploads/41106f732bcb446e8f26ffe22ecb90ae.jpg', 'uploads/71f1807c4db76d7d4a695b561a837c45.jpg', 'uploads/cc0e3097dda0bd6053e79b4113dcaac7.jpg', 'Soap Noodles are the sodium salt of fatty acids derived from oils or fats of Palm Oil, Palm Kernel Oil and Coconut Oil with required composition blend for soap making. Soap Noodles is of 100% vegetable origin. The process and the raw materials used enable us to retain all the good nutrients of the palm oil in the end products together with high glycerine content, the essential moisturizer for hand and body, softener for textile.\n\nPacking in : 25 kg PP Bags/ Kraft Paper Bags, Jumbo Bags', 1, '2019-07-17 11:20:43', 0),
(21, 'LAURIC ACID', 4, 'uploads/c35037495677cbc90d2b265b461ab995.jpg', 'uploads/63929a3e5e6b739a9b0240c668045bd3.jpg', 'uploads/f429d1960e8464fa2581f9e60e67513d.jpg', 'Lauric Acid, is a saturated fatty acid with a 12-Carbon atom chain, thus having many properties of medium-chain fatty acids. Itâ€™s appearance is bright white in beads/ flake form with a faint odor of bay oil or soap. It is mainly used as raw material in various cosmetic products as well as in making soaps.  \n\nPacking in : 25 kg PP Bags/ Kraft Paper Bags', 1, '2019-07-17 11:27:55', 0),
(22, 'CRUDE / REFINED SUNFLOWER OIL', 5, 'uploads/ce13285962dafe246c521c4437c7636b.jpg', 'uploads/adcff156d3847512738ae94ab01ef5c5.jpg', 'uploads/63a0971b60863ab243a86561062821af.png', 'Crude/ Refined Sunflower Oil is derived from crushing of Sunflower seeds, which preserves all the nutrients during the production process. This oil can be used in conditions of extremely high cooking temperatures.\n\nPacking in : Reconditioned/ New Steel Drums, Flexibags', 1, '2019-07-17 11:22:41', 0),
(23, 'CRUDE / REFINED SOYBEAN OIL', 5, 'uploads/d9cedaaef55f61e1d8137f90e25e866e.jpg', 'uploads/bb8a06560194d08e28911c006ae21433.jpg', 'uploads/dbd31c7083b468afe7f534c61cb01788.png', 'Crude Soya Bean Oil is obtained by heat treatment, crushed, dehulled and conditioned soybean, which is pressed. Oil is released of sediment through sedimentation and filtering in frame filter press, and then oil is stored. RBD Soybean Oil is refined, bleached, and deodorized from crude for use in paints, varnishes, alkyd resins, carriers, inks, pharmaceutical manufacturing and similar applications\n\nPacking in : PET Bottles, Tins, Jerry Cans, New Steel Drums, Flexibags', 1, '2019-07-17 11:22:27', 0),
(24, 'CRUDE / REFINED CORN OIL', 5, 'uploads/1bb6c2177790a3aba1fdcc72c9294f15.jpg', 'uploads/c5f3a8363e59390cff353ba2bad1a065.jpg', 'uploads/92bcef3b52856ead47e0d0e4c3a7a461.png', 'Crude Corn Oil is a germ expeller oil as such, contains significantly more essential elements than simple seed oil. Obtained from the fractionation of conventional maize, crude corn oil is extracted from the germ by pressing.\n\nPacking in : PET Bottles, Tins, Jerry Cans, New Steel Drums, Flexibags', 1, '2019-07-17 11:21:47', 0),
(25, 'CRUDE / REFINED CANOLA OIL', 5, 'uploads/343e6d26612d4d8c90cc2ee4b934dfea.jpg', 'uploads/d1fb91b5bf7146865592fed504027689.jpg', 'uploads/28c2b1c07c404c911cdad5915e356d90.png', 'Canola Oil is produced from pods of canola plant which are harvested and crushed to create canola oil and meal. This oil is low in saturated fat and is an excellent food choice for a healthy diet. Canola oil is used for cooking and baking at home, restaurants and in food processing plants. Canola oil also has non-food uses such as in biodiesel and bio-plastics.\n\nPacking in : New Steel Drums, Flexibags', 1, '2019-07-17 11:21:36', 0),
(26, 'CRUDE / REFINED PALM KERNEL OIL', 6, 'uploads/91248d00229051e203dc7f2f0e3185f3.jpg', 'uploads/25b8caf6a2f491411d5c1e3ddb2303b6.jpg', 'uploads/87cff1431af9f601d1efcceded0f80d8.png', 'RBD Palm Kernel Oil is derived from the kernel of the oil palm fruit. It is light yellow in color and refined physically to a very light color for both edible and non-edible use. Due to its rapid crystallization, it is often used in enrobing or dipping products. \n\nPacking in : New Steel Drums, Flexibags', 1, '2019-07-17 11:16:59', 0),
(27, 'CRUDE / REFINED PALM KERNEL OLEIN', 6, 'uploads/a49198d722821a94d4407d4123bac80f.jpg', 'uploads/b6156b51e3ec0d45202809bd6a4f726a.jpg', 'uploads/590c8aabef01ae7403f4be5de926a6bf.png', 'RBD Palm Kernel Olein is the liquid fraction of palm kernel oil from fractionation. The olein can be hydrogenated for a sharper melting profile, enabling its use in coating fats. It is also very useful for margarine fats when combined and interesterified with palm stearin. \n\nPacking in : Jerry Cans, New Steel Drums, Flexibags', 1, '2019-07-17 11:16:44', 0),
(28, 'CRUDE / REFINED PALM KERNEL STEARIN', 6, 'uploads/6121ab33412665ed6d74ef434c3ecbd7.jpg', 'uploads/ac3fc29deb4ff323344ed198f2fd6f41.jpg', 'uploads/5776364b9c496277480ea4330ec419a3.jpg', 'RBD Palm Kernel Stearin is the solid fraction of palm kernel oil upon fractionation. The Stearin can be hydrogenated for a sharper melting profile, enabling its use in chocolate moulding as well as filling fats. \n\nPacking in : New Steel Drums, Flexibags', 1, '2019-07-17 11:16:31', 0),
(29, 'CRUDE / REFINED COCONUT OIL (CCNO)', 6, 'uploads/032a143800dfc6b6dc7f8949d8379dc9.jpg', 'uploads/f022fa72ad44ddcc50a2489eed4dc4ce.jpg', 'uploads/a7e0c375f3396ebaf6a3f58f6e98da75.png', 'Crude Coconut Oil is produced by crushing coconut copra, which is the dried coconut meat. It is commonly utilized in many industries including beauty, food, healthcare, nutraceuticals, soap, as well as a replacement for petroleum oil such as industrial grade oils and more recently, as a feedstock in the production of Biodiesel. \n\nRBD Coconut Oil is produced by processing the crude coconut oil by refining, bleaching, and then deodorizing (RBD) to make it suitable for food applications. It is excellent as cooking oil and can withstand high temperatures and it does not breakdown easily compared to other oils. \n\nPacking in : Jerry Cans, Tins, New Steel Drums, Flexibags', 1, '2019-07-17 11:16:10', 0),
(30, 'RAW CASHEW NUTS', 7, 'uploads/f32a4d6d0841d0cdee7bbb1f83e873cc.jpg', 'uploads/cf9fafa80bf2dfc580e6a719e147da38.jpg', 'uploads/91bfc3386f8c7c5d4fff8e5140077692.png', 'The cashew nut is the seed nestled inside a shell that grows on the fruit of the cashew tree. The shell is toxic, so the nut has to be removed before it can be eaten. This is typically done by roasting the nut in the shell, the shells are then removed by hand. Raw cashews, therefore, are not really raw, they have already been roasted to remove the shell.\n \nPacking in : 80 kg Jute Bags', 1, '2019-07-17 11:12:10', 0),
(31, 'CASHEW KERNELS', 7, 'uploads/e18962dc1c9b2ee99444913b0aa5873a.jpg', 'uploads/349afd5c8d879670052311b562890aa0.jpg', 'uploads/fa59f2b30496af28cde10153468c6d22.jpg', 'The cashew nut, often simply called a cashew, is widely consumed. It is eaten on its own, used in recipes, or processed into cashew cheese or cashew butter. Cashew Kernels are graded into white/ scorched wholes, pieces, splits, etc. depending on the shape, size & color of the kernel. Scorched wholes are another grade of cashew kernels, which have a slight brown color due to longer roasting. They have all the other characteristics of white kernels and have the same nutritional qualities.\n \nPacking in : Tins - 25 lbs. (11.340 kg) Tin & 10 kg Tin, Pouch - 50 lbs. & 25 lbs.', 1, '2019-07-17 11:11:55', 0),
(32, 'REFINED SUGAR', 7, 'uploads/9907308cbc06ea0cd31bba309a1b8eb4.jpg', 'uploads/dcbcccb9c7b680790556da368c8e784c.jpg', 'uploads/85ad775b51d0ebf3d4c0e0927f8c04ee.jpg', 'Sugar is a natural ingredient that has been part of our diet for thousands of years. Sugars are carbohydrates that provide energy for the body. The most common sugar in the body is glucose which your brain, major organs and muscles need to function properly. Sucrose is often called table sugar which is made up from glucose and fructose, it is extracted from sugar cane or sugar beet and also naturally present in most fruits and vegetables\n \nPacking in : 50 kg PP Bags', 1, '2019-07-17 11:11:42', 0),
(33, 'SESAME SEEDS', 7, 'uploads/55706aaaaa554418de37fecc56916366.jpg', 'uploads/71fdbc7b62fc3b6f5f92089a9b6dd817.jpg', 'uploads/23facabd7dfdab2a8277793cb4dd8384.png', 'Sesame seeds are derived from a flowering sesame plant in the genus Sesamum. Sesame seed pods burst open when they reach full maturity, revealing the seeds of the sesame seed plant, which hold its valuable oils. With a rich, nutty flavor, it is a common ingredient in cuisines across the world.\n\nPacking in :-50 kg PP Bags', 1, '2019-07-17 11:11:30', 0),
(34, 'SPLIT DRIED GINGER', 7, 'uploads/ae324ec0ffb6cbcc9c205af3cf151133.jpg', 'uploads/1ab98b2e0419016a7b9b3cc9b058ea5b.jpg', 'uploads/67f94c9ff539b009c364ad1629c221c4.png', 'Ginger is a commodity that is highly valued in international markets for its aroma, pungency and high oil and Oleo resin content. Dried ginger is usually presented in a split or sliced form. Splitting is said to be preferred to slicing, as slicing loses more flavour, but the sliced are easier to grind and this is the predominant form of dried ginger currently in the market.\n \nPacking in : 40 kg PP Bags', 1, '2019-07-17 11:11:20', 0),
(35, 'CHICKPEAS', 7, 'uploads/f7ea3e0b8f4a7c28524b9bb61dc909f7.jpg', 'uploads/1408908ff2837d6b1a663f853796b29c.jpg', 'uploads/9c081f897b2f869b567490ee36a30050.png', 'Chickpeas have high protein and fiber content. It is a very versatile legume and are a noted ingredient in many Middle Eastern and Indian dishes such as hummus, falafels and curries. While many people think of chickpeas as being in beige in color, but there are other varieties as well which feature colors such as black, green, red and brown.\n \nWe have various size of chickpeas like :-\nA) 58/60 Count (9 mm)\nB) 44/46 Count (11 mm)\nC) 42/44 Count (12 mm)\nD) 40/42 Count (14 mm)\nE) 75/80 Count (7/8 mm)\n \nPacking in : 25/50 kg PP Bags', 1, '2019-07-17 11:11:10', 0),
(36, 'GUM ARABICA', 7, 'uploads/95898a2f2db1ebf3fcc91e8e6e8aaf19.jpg', 'uploads/cb51e07de3140ef79b7838c9ebe0a6fa.jpg', 'uploads/f3cb38bdc473142e66b7d7203103ac6f.jpg', 'Gum Arabic is a fibrous product made from the natural hardened sap of two types of wild Acacia trees. It is considered to be natural, edible and generally safe for human consumption. Research suggests that itâ€™s non-toxic, especially when used in normal/moderate amounts, and tolerated by people with sensitivities to gluten. Arabic gum is used to help stabilize products including desserts and baking ingredients, dairy products like ice cream, syrups, hard and soft candies, ink, paint, water colors, photography and printing materials etc.\n \nPacking in : 50 kg pp bags', 1, '2019-07-17 11:10:57', 0),
(37, 'MAC PLUS - RUMEN PROTECTED FAT', 8, 'uploads/954353df089dd3b1882e1ba47994d97d.jpg', 'uploads/d7c0885f70caf01f2c08450afb3ba917.png', 'uploads/3a3373d369d0614ac5b909617feb2987.png', 'Mac Plus is rumen bypass fat, made from pure vegetable oil. It has min 75% Palmitic Acid which is saturated and highly digestible in the lower gut. Since it has high melting point and saturated, it bypasses the rumen with minimal digestion. Dairy cattle demand for energy increases tremendously after calving, especially the first 100 days post-partum which leads to drawing energy from its body reserve to meet the demands of milk production and ends up with negative energy balance. Mac Plus enables to overcome such situation in cows as it is the high energy supplement for dairy cows.\n \nPacking in : 25 kg PP/ Paper Bag', 1, '2019-07-13 18:18:09', 0),
(38, 'CALCIUM SOAP', 8, 'uploads/a31b46cb66c23b2ff8aafb474483997d.jpg', 'uploads/c4d498840fa0767acb9d48c65238901a.jpg', 'uploads/3779ed5b701a354e0b10a99a00bc5ef5.png', 'The Calcium Soap (Rumen bypass fat) is made by combining long chain fatty acids for high milk yielding dairy ruminants with a calcium source resulting in a soap that will stay inert in the rumen. Because its main structure consists of fatty acids (which essentially is unattached triglycerides)- the main ingredient in an oil or fat is converted to energy, the Calcium Soap once broken up in the acidic 4th stomach, allow the fatty acids to be digested and converted into energy. Due to high requirement of energy to produce more milk and to recover from birthing (needed to get the animal to lactate), there is a need to provide a diet of highly intense energy feed.\n \nPacking in :- 25 kg PP/Paper Bag', 1, '2019-07-17 11:14:41', 0),
(40, 'PALM KERNEL PELLET / MEAL / CAKE / EXPELLER', 8, 'uploads/9fd1df754cbf4073747e8bb51b12cc60.jpg', 'uploads/86dbe56eb612389b32d8f38e1cef0e44.jpg', 'uploads/08e6c2b3c0ca179198f2bdc696b2eb69.png', 'PKP/PKM/PKC/PKE is an important feed ingredient that is obtained from the kernel after the oil has been extracted. It is a good source for animal feed as it supplies protein, energy and fiber. The PKP/PKM/PKC/PKE extracted by the solvent method unlike the mechanical method ensures that the nutritional profile of the product is not destroyed and external undesirable substances are separated. Higher energy made available through PKP/PKM/PKC/PKE can be used to replace other additives or sources of fats that feed manufacturers add in order to gain the desired growth in animals.\n \nPacking in : 50 kg Bag/ Loose stuffed in Bulk', 1, '2019-07-17 11:14:27', 0),
(43, 'SUNFLOWER DE-OILED CAKE/ MEAL', 8, 'uploads/47032fca02c8e1e2ce996eb970095b1d.jpg', 'uploads/305819d9f2fd95c50113d18520ab07f6.jpg', 'uploads/d3da950dfe9064e0c1eee1b63925ee82.png', 'Sunflower meal is another name for sunflower de-oiled cake. This is a by-product of extraction of oil from sunflower seeds. It is high in nutrition and is a rich source of protein and fiber. It is an excellent livestock feed and is ideal for composting purpose for the production of mushrooms. It is usually feed to dairy cows that have a high energy requirement.\n \nPacking in : 50 kg Bag/ Loose stuffed in Bulk', 1, '2019-07-17 11:14:11', 0),
(44, 'SOYBEANS / SOYBEAN MEAL / SOYBEAN DE-OILED CAKE', 8, 'uploads/8f8ec78640c59969a85976a8fa70ad21.jpg', 'uploads/cc80d7006640c0e95c0c29ba56ba9945.jpg', 'uploads/78282f56d463bd95ed2b0152343b8aea.png', 'Soybean is generally recognized as a source of edible and industrial oil. In oil extraction, soybeans undergo a solvent extraction process to produce the meal. On the other hand Soya De-Oiled Cake is a free flowing coarse granular material, produced from cleaned soybean seeds after series of preparatory physical processes followed by multistage extraction. Soybean Meal and Soybean de-oiled cake is an excellent source of protein commonly used in livestock, poultry feed and also as a source of metabolizable energy.\n \nPacking in : 50 kg Bag/ Loose stuffed in Bulk', 1, '2019-07-17 11:13:58', 0),
(46, 'SAFFLOWER MEAL', 8, 'uploads/211dc0b0c566eaad69f85c0322f92625.jpg', 'uploads/43668eaf8918c360a2f6cc61daadc4e7.jpg', 'uploads/58cafcaf3b3aa5fdf836ba207ae3d47d.png', 'Safflower meal is made from the seeds that remain after oil extraction. The quality of the safflower meal is variable and depends on the amount of hulls and the extent of the oil extraction. Safflower oil can be obtained from the seeds by cold-pressing, expeller pressing, or solvent extraction. Solvent extraction is more effective at oil removal than mechanical extraction.\n \nPacking in : 50 kg Bag/ Loose stuffed in Bulk', 1, '2019-07-17 11:13:44', 0),
(49, 'PEANUT MEAL/ GROUNDNUT OIL CAKE', 8, 'uploads/218786821102d0eee2f0ab52b5d464fa.jpg', 'uploads/b5b66bb2db72423277647941bd1fbc65.jpg', 'uploads/651ff054addce80c64b67c5f9a5cd3ad.png', 'Peanut meal/ Groundnut oil cake is a protein-rich ingredient that is widely used to feed all classes of livestock. It is generally considered as an excellent feed ingredient due to its high protein content, low fibre, high oil (for expeller meal) and relative absence of antinutritional factors.\n \nPacking in : 50 kg Bag/ Loose stuffed in Bulk', 1, '2019-07-17 11:13:29', 0),
(50, 'CORN GLUTEN MEAL', 8, 'uploads/824121bca8c63e31906ab695a5d69b65.jpg', 'uploads/6c82626e80a0f73305475d46d01d42e0.jpg', 'uploads/3502273dd5e2d2560db0c0ef060cc246.png', 'Corn gluten meal is a protein-rich feed. It is a byproduct of corn processing that has historically been used as an animal feed. Despite the name, \"corn gluten\" does not contain true gluten, which is formed by the interaction of gliadin and glutenin proteins. It is also valued in pet food for its high protein digestibility\n \nPacking in : 50 kg Bag/ Loose stuffed in Bulk', 1, '2019-07-17 11:13:14', 0),
(51, 'COPRA MEAL/ CAKE', 8, 'uploads/0959d42a5f1a46e9268237d0074dca58.jpg', 'uploads/32eaf2c41533a4f3cdd3302c29fdd3be.jpg', 'uploads/6a3047497f07923c5e892fc36c5dd431.png', 'Copra meal/Copra cake is the left over residue of a coconut after its oil extraction. Its high oil and protein levels are fattening for stock. The protein in copra meal/cake has been heat treated and it does not break down in the rumen and provides a source of high-quality protein for cattle, sheep and deer.\n \nPacking in : 50 kg Gunny Bags', 1, '2019-07-17 11:13:01', 0),
(52, 'SWEETENED CONDENSED FILLED MILK', 9, 'uploads/55c6c0d2c85d8c9d37fd582d3dcf0d3f.jpg', 'uploads/ba163f2ef60a9d80a2dd45e4201faec6.jpg', 'uploads/44c204c00dbfe1b16ac87773ca4d9ba5.png', 'Sweetened condensed milk is a milk substitute with milk solids and vegetable fat which is very thick, sweet product and when canned can last for years without refrigeration if not opened. Sweetened Condensed milk is used in numerous dessert dishes in many countries. It is used largely as the most popular source of milk solids for the sugar confectionery industry.\n\nPacking in : 170 g/ 390 g/ 1000 g Tins', 1, '2019-07-17 11:21:24', 0),
(53, 'EVAPORATED MILK', 9, 'uploads/6e8a0fe4c67ff1c09dee7e6bfe77cd4f.jpg', 'uploads/23eb7aaa31430c266710ca865820edd0.jpg', 'uploads/c9579908c196defd8e75bf0fbcefab0e.png', 'Evaporated Milk is a shelf-stable canned milk product with about 60% of the water removed from fresh milk. It possesses the appearance of cream. It is also used as a substitute for cooking and as coffee cream and is primarily used for recombination in various processed foods such as breads and confectionery. \n\nPacking in : 170 g/ 390 g/ 1000 g Tins', 1, '2019-07-17 11:21:13', 0),
(54, 'DESICCATED COCONUT POWDER', 9, 'uploads/93b0d69997b029f16b07468fda627ee9.jpg', 'uploads/26b201dde69a4d5110da2f0456f4fa35.jpg', 'uploads/d6dd9b0fdd7eaab66bb0019926597d52.png', 'Desiccated coconut is finely grated, dried, unsweetened form of coconut, obtained by drying shredded or ground kernel. It is used as a substitute to raw grated coconut in confectioneries, desserts like puddings, cookies, cakes, pastries, and other food preparations.\n \nPacking in : 25 kg PP bags', 1, '2019-07-17 11:20:58', 0),
(55, 'MYRISTIC ACID', 4, 'uploads/2af9943e349be25d3e4032d4a66207b2.jpg', 'uploads/51fe76487fd0078d40150ea454cd79ca.jpg', 'uploads/c5031e064b16800d92ca6e79f0e1ae7d.jpg', 'Myristic Acid is a fatty acid with a 14-Carbon atom chain found in Palm oil. It has a variety of uses in the beauty industry including as a: Fragrance Ingredient, Opacifying Agent, Surfactant, Cleansing Agent and Emulsifier.\n\nPacking in : 25 kg PP Bags/ Kraft Paper Bags', 1, '2019-07-17 11:28:06', 0),
(56, 'PALMITIC ACID', 4, 'uploads/6cea5e46002d3caf0f60b61dc5409781.jpg', 'uploads/1fa59dc3b4be564d6e6177e0f3e59554.jpg', 'uploads/76157cf175d11b5819cf32d0ca137f69.jpg', 'Palmitic Acid is a common saturated fatty acid found in fats and waxes naturally in palm oil and palm kernel oil. It is used as an ingredient in detergents, soaps and cleaning products, and as a surfactant. It is also used in beauty products and cosmetics for a variety of properties including as a fragrance ingredient, opacifying agent, surfactant, cleansing agent, emulsifying agent and emollient. \n\nPacking in : 25 kg PP Bags/ Kraft Paper Bags', 1, '2019-07-17 11:28:19', 0),
(57, 'TRIPLE PRESSED STEARIC ACID', 4, 'uploads/2577f898dc67e68635acf0e208ec016e.jpg', 'uploads/011a2b8875e91d43a41c5814cf9574d3.jpg', 'uploads/f17eefe092f6695af8870c174c8c747d.jpg', 'Triple Pressed Stearic Acid is used in a multitude of products that we use every day like shaving cream, cosmetics, medicines, skincare products, soaps, detergents and candles. It is also used in the manufacturing process of many more products due to its versatility. \n\nPacking in : 25 Kg PP Bags/ Kraft Paper Bags', 1, '2019-07-17 11:19:02', 0),
(58, 'RUBBER GRADE STEARIC ACID', 4, 'uploads/e41b166f5a04ff2c4b728c40d1db69e0.jpg', 'uploads/69dbfb897a9abb12e95db0bf84f3c5ef.jpg', 'uploads/bae29597dd577dda686350eaeb844f8c.jpg', 'Rubber Grade Stearic Acid is used in various applications as an activator, dispersing agent, plasticizer and lubricant in rubber compound processing as well as an external lubricant and viscosity depressant in PVC processing.\n\nPacking in : 25 Kg PP Bags/ Kraft Paper Bags', 1, '2019-07-17 11:18:48', 0),
(59, 'ALUMINIUM INGOTS', 11, 'uploads/466c1e4c15f52225f7b51c2ab2b71780.jpg', 'uploads/a30bb1ddfe8ad03f427626a768c3ceff.jpg', 'uploads/a7b5125ae42c30ea900cf4d4b66ae0e4.jpg', 'Aluminium Ingots are manufactured by the freezing of a molten liquid (known as the melt) in a mold. The mold is designed to completely solidify and form an appropriate grain structure required for later processing, as the structure formed by the freezing melt controls the physical properties of the material. The shape and size of the mold is designed to allow for ease of ingot handling and downstream processing. An ingot is a piece of relatively pure material, usually metal, that is cast into a shape suitable for further processing. Ingots usually require a second procedure of shaping, such as cold/hot working, cutting, or milling to produce a useful final product. \n\nPacking in : Loose stuffed blocks', 1, '2019-07-17 11:15:53', 0),
(60, 'FLEXI BAGS', 11, 'uploads/c1550a3cf87659ddcbb95667786bf440.jpg', 'uploads/f4b4646943dfcb8d1b3245613548acfc.jpg', 'uploads/2e49768dd8bc2e9a782927fc5c9fd930.jpg', 'Flexibags are a good alternative to a tank container, ISO tanks, barrels and other packaging materials for non-hazardous liquids or non-hazardous powder. It can be suspended in a standard 20 ft, 40 ft container and it can even be loaded onto a truck. The flexibag measures between 10,000 and 24,000 litres, which depends on the density of the liquid to be transported. \n\nPacking in : Cartons', 1, '2019-07-17 11:15:36', 0),
(61, 'HDPE RESIN', 11, 'uploads/15c2df9be5770e9b2e64255e216769bd.jpg', 'uploads/112d6cde6d2ff8fdf8236b714eb6e35f.jpg', 'uploads/e854d5d21a286027ce94b2b69dfdcaa2.jpg', 'HDPE Resin is a polyethylene thermoplastic made from petroleum. It offers an excellent combination of stiffness and environmental stress crack resistance, making them the materials of choice for many applications in personal care, household, industrial containers and bottle products in general.  \n\nPacking in : 25 kg Bags', 1, '2019-07-17 11:15:26', 0),
(62, 'PALMFIBRE', 11, 'uploads/2b5fcca22ea9764172c7e386eaed83cd.jpg', 'uploads/8c8b2fc541a3886b9fb4660641ad39eb.jpg', 'uploads/7c5ff0793df1e67051b60fc11ec02080.jpg', 'Palm Fibre is produced from oil palm\'s vascular bundles in the Empty Fruit Bunch (EFB). EFB is considered as waste products after the Fresh Fruit Bunch (FFB) have been processed. Palm fiber itself is 100% natural, non-hazardous, biodegradable and environmentally friendly. Palm Fiber is a superior substitute to coconut fiber due to its strong bond that are commonly used in making mattress and cushion production, rope manufacturing, rugs and carpets production, erosion control, livestock care and many others. \n\nPacking in : In Bales', 1, '2019-07-17 11:15:08', 0),
(63, 'RBD PALM OIL', 1, 'uploads/865e69e46eb3eee61103bb13c33ff1af.jpg', 'uploads/3b59aec66dbd7c0f4e38f7d006b512ec.jpg', 'uploads/22a748200463917cf076ac6fa6a33f29.jpg', 'RBD Palm Oil is obtained through refining process of Crude Palm Oil. It is in light cream colour and remains semi-liquid at room temperature, melting to a clear yellow liquid on slight heating. They are used as frying oil for food industries such as instant noodles and snack food. It is also used in manufacturing of margarine, shortening, vanaspathy, ice cream, condensed milk and soap.\n\nPacking in : Jerry Cans, Tins, Bag in Box, New Steel Drums, Flexi Bag', 1, '2019-07-16 19:49:41', 0),
(64, 'CETYL ALCOHOL', 4, 'uploads/3c4ac31f82fecb18e3d11b1c64721729.jpg', 'uploads/930cd10a9ba0460bfb7d5de648acfa03.jpg', 'uploads/f5b11b58616f281d8716927bc73bd7d6.jpg', 'Cetyl alcohol, also known as 1-hexadecanol and palmityl alcohol, is a common ingredient in a variety of personal care products and cosmetics. It is derived from vegetable oils such as palm or coconut oil. It is available in the form of pastelles.\n\nPacking in : 25 Kg PP Bags/ Kraft Paper Bags', 1, '2019-07-17 11:18:36', 0),
(65, 'STEARYL ALCOHOL', 4, 'uploads/ed75d663b6cf8689afc46183280ffa82.jpg', 'uploads/498d05791a1c18034497d0202fd48d3c.jpg', 'uploads/913eac643862ace864caf94a76b69e6d.jpg', 'Stearyl Alcohol is a natural fatty alcohol derived from stearic acid, coconut oil or vegetable fatty acids, and is used to soothen and soften as a conditioning agent and as an emulsifier. It is often found as a hair coating ingredient in shampoos and conditioners, and an emollient in creams and lotions for the skin. It is available in the form of pastelles.\n\nPacking in : 25 Kg PP Bags/ Kraft Paper Bags', 1, '2019-07-17 11:18:22', 0),
(66, 'PALM FATTY ACID DISTILLATE', 4, 'uploads/3431d6c41c6b03c145458e2ee1551efe.jpg', 'uploads/f5d64db6890073ec35c0f1f323ca09b6.jpg', 'uploads/b6ac8b75ca65e20b16fe8e057bb8233b.jpg', 'Palm Fatty Acid Distillate is a by-product derived during the refining process of crude palm oil. It is used for many industries such as soap manufacturing, animal feed and also is used as raw materials for bio-diesel and chemical industries.\n\nPacking in : Reconditioned Drums, Flexibags', 1, '2019-07-17 11:18:04', 0),
(67, 'PALM KERNEL FATTY ACID DISTILLATE', 4, 'uploads/bab4c8ee4fe40df9d27feb56cc6c8ca9.png', 'uploads/c36d3e1c43b0783d47d355bdb3b993ac.jpg', 'uploads/8f07594b5e302d98efe036123e48cc99.png', 'Palm Kernel Fatty Acid Distillate or commonly known as PKFAD is produced during the refining process of the Palm Kernel based oils. It is light brown liquid at room temperature and is used as raw material in soap, grease, oleo and bio-diesel industries.\n\nPacking in : Reconditioned Drums, Flexibags', 1, '2019-07-17 11:17:47', 0),
(69, 'DCFA', 4, 'uploads/947897650e699a35fd8fdf560ff5a39d.jpg', 'uploads/86e0ae9db1549de2b76b4b48c9447472.jpg', 'uploads/600dd6c7e9fe0b7cefc38c66c8480508.jpg', 'Distilled Coconut Fatty Acid is derived from Coconut Oil by the splitting of fats at high temperature and pressure. They are then distilled, obtaining a product with a white appearance and a soapy feel which is used in making soaps and cosmetics.\n\nPacking in : Reconditioned/ New Steel Drums, Flexibags', 1, '2019-07-17 11:17:34', 0),
(70, 'CDEA', 4, 'uploads/f7c705278f8643c04228880c366aea05.jpg', 'uploads/7a9a34907dbae60bf4f781e7455c2c36.jpg', 'uploads/b6fa5c6c90c8514f18ea82f8a0d42e2e.jpg', 'Coconut Di Ethanolamide, is made by reacting the mixture of fatty acid from coconut oil with diethanolamine. It is a viscous liquid and is used as a foaming agent in bath products like shampoos and hand soaps, and in cosmetics as an emulsifying agent.\n\nPacking in : Reconditioned/ New Steel Drums, Flexibags', 1, '2019-07-17 11:17:23', 0),
(72, 'RICE', 7, 'uploads/2d07b6d1e33f9854b8f0822c5f85303f.jpg', 'uploads/0988317678f2db13068dcde326ba249f.jpg', 'uploads/b81cb92a47e07ecab52243113db6446f.jpg', 'Rice is available in a variety of forms. While it is not edible in its rough form, it has to be processed and milled to get the desired form of rice. There are more than 40,000 varieties of cultivated rice in the world, here are the most common type of rice you will come across:-\n \nA) Basmati rice - Basmati rice is a long-grain rice known for its fragrant taste and smell. t is mainly grown in India and Pakistan in the Himalayan foothills. Some names of basmati rice are 1121, Sona Masoori Rice, Pusa Basmati Rice.\n \nB) Non- basmati rice - Non- basmati rice comes in all kinds of different shapes and sizes. Some are long and slender, some are short and thick, some are like beads, and some may be round. None have the same characteristics as basmati rice. Some names of non-basmati rice are Parboiled Rice, Broken Rice, Sella Rice, Swarna Rice and Sona Masoori Rice.\n \nPacking in : 50 kg PP Bags', 1, '2019-07-17 11:10:44', 0),
(73, 'BARLEY', 7, 'uploads/11a248655de9820ad05fa7629e7ea852.jpg', 'uploads/2155fc220ede8c21c158fc5017e6421c.jpg', 'uploads/50620a33eb55c6f8a142ea5d915e46fe.png', 'Barley is a major cereal grain grown in temperate climates globally. It is a wonderfully versatile cereal grain with a rich nutlike flavor and an appealing chewy, pasta-like consistency. Its appearance resembles wheat berries, although it is slightly lighter in color. Sprouted barley is naturally high in maltose, a sugar that serves as the basis for both malt syrup sweeteners. When fermented, barley is used as an ingredient in beer and other alcoholic beverages.\n \nPacking in : 50 kg Bag/ Loose stuffed in Bulk', 1, '2019-07-17 11:10:32', 0),
(74, 'PEANUT', 7, 'uploads/456e559b4782b6e39ebc2037b5a0358e.jpg', 'uploads/773fcffa70b89bd50a816e96cc143077.jpg', 'uploads/02cc3c990881efd21a5b09cb1ee43a86.jpg', 'Peanut also known as the groundnut, is a legume crop grown mainly for its edible seeds. They are comprehensively  used for the  extraction of  edible  oil  from  it. The peanut is unusual because it flowers above the ground, but fruits below the ground. From planting to harvesting, the growing cycle takes about four to five months, depending on the type or variety\n \nPacking in : 50 kg jute bags', 1, '2019-07-17 11:10:06', 0),
(75, 'COCOA POWDER', 7, 'uploads/f39fe618dca566495539f07f69d794dd.jpg', 'uploads/add188efbf59d649d36ad92223c4e356.jpg', 'uploads/c915db530e0a69b317d90d12c45e4638.png', 'Cocoa powder is an unsweetened powder produced by grinding cacao beans and pressing out the cocoa butter, better known as fat. The resulting cocoa powder is low in fat, but has an intense chocolate taste.\n \nPacking in : 25 kg net weight, packed in 3 ply Kraft paper bags with 1 inner layer of plastic HDPE 35 micron complying with International Standards.', 1, '2019-07-17 11:09:40', 0),
(76, 'DISTILLER DRIED GRAINS WITH SOLUBLES [DDGS]', 8, 'uploads/39db4930a6dbf20bb26ec9a8aee8cf81.jpg', 'uploads/ca0e1e4f96a698453669529711a20fa9.jpg', 'uploads/b69017c0f5cc7fa81a4e1dd5e8f48285.jpg', 'DDGS is a commodity by-product of the distillation process of corn. This process starts with removing the bran by grinding before steeping the grain in water. The wet cakes resulting from this process are then dried off resulting in DDGS feed.\n\nPacking in : In Bulk', 1, '2019-07-17 11:12:48', 0),
(77, 'COCONUT FATTY ACID DISTILLATE', 4, 'uploads/8414d7006fed7cf92c29319f73ad9c16.png', 'uploads/9aaf33457ea8c4a8dd4416c9b5940283.jpg', 'uploads/45dc732c2ba2d54aba8ac2013cf86137.png', 'CFAD contains most of the free fatty acids isolated from crude coconut oil during the refining process. This product is a raw material for fatty acid producers. Crude fatty acid oil is good for fat source in animal feeds. Coconut fatty acid has a bland taste, characteristic odour.\n\nPacking in : Reconditioned/ New Steel Drums, Flexibags', 1, '2019-07-17 11:17:10', 0);

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
