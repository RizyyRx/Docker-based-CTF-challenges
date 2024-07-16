-- Adminer 4.8.1 MySQL 8.3.0 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

USE `rizyy_docker_ctf`;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `price` text NOT NULL,
  `description` text NOT NULL,
  `specifications` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

TRUNCATE `products`;
INSERT INTO `products` (`id`, `name`, `price`, `description`, `specifications`, `image_url`) VALUES
(1,	'Logitech G PRO Wireless Gaming Mouse',	'₹10,495',	'Logitech G collaborated with more than 50 pro players to find the perfect shape, weight and feel combined with LIGHTSPEED wireless and HERO 25K sensor. The result: is one of the most popular mice in esports.',	'FORM FACTOR: Both handed\r\nCONNECTIVITY: Wireless\r\nRGB LIGHTING: Yes\r\nDPI RANGE: 100 – 25,600\r\nAPPROXIMATE WEIGHT: 80g\r\n\r\nBATTERY LIFE\r\nDefault lighting: 48 Hrs\r\nNo lighting: 60 Hrs',	'https://resource.logitechg.com/w_692,c_lpad,ar_4:3,q_auto,f_auto,dpr_2.0/d_transparent.gif/content/dam/gaming/en/products/pro-wireless-gaming-mouse/pro-wireless-carbon-gallery-1.png?v=1'),
(2,	'Razer DeathAdder Essential Wired Gaming Mouse',	'₹1,339',	'For more than a decade, the Razer DeathAdder line has been a mainstay in the global esports arena. It has garnered a reputation for reliability that gamers swear by due to its proven durability and ergonomics. Now, we’re making it even more accessible with its latest successor—the Razer DeathAdder Essential.',	'FORM FACTOR: Right-Handed\r\nCONNECTIVITY: Wired - Standard Cable\r\nRGB LIGHTING: Single-Color Green Lighting\r\nMAX DPI: 6400\r\nAPPROXIMATE WEIGHT: 96g',	'https://m.media-amazon.com/images/I/8189uwDnMkL.jpg'),
(3,	'Logitech G102 LIGHTSYNC Wired Gaming Mouse',	'₹1,395',	'Make the most of play time with G102—a gaming mouse in a variety of vibrant colors. With LIGHTSYNC technology, a gaming-grade sensor and a classic 6-button design, you’ll light up your game and your desk',	'FORM FACTOR: Both handed\r\nCONNECTIVITY: Wired\r\nRGB LIGHTING: Yes\r\nDPI RANGE: 200 – 8,000\r\nAPPROXIMATE WEIGHT: 85g',	'https://resource.logitechg.com/w_692,c_lpad,ar_4:3,q_auto,f_auto,dpr_2.0/d_transparent.gif/content/dam/gaming/en/products/refreshed-g203/g203-black-gallery-2.png?v=1'),
(4,	'Razer Viper V2 Pro Hyperspeed Wireless Optical Gaming Mouse',	'₹10,399',	'Esports has a new apex predator. As successor to the award-winning Razer Viper Ultimate, our latest evolution is more than 20% lighter and armed with all-round upgrades for enhanced performance. With one of the lightest wireless gaming mice ever, there’s now nothing holding you back.',	'FORM FACTOR: Both handed\r\nCONNECTIVITY: Wireless\r\nRGB LIGHTING: None\r\nDPI RANGE: upto 30,000\r\nAPPROXIMATE WEIGHT: 58g\r\n\r\nBATTERY LIFE\r\nUp to 90 hours at 1000 Hz\r\nUp to 17 hours at 8000 Hz',	'https://m.media-amazon.com/images/I/51Jr6+sh2EL._SY879_.jpg'),
(5,	'Logitech G PRO Mechanical Gaming Keyboard',	'₹10,995',	'The tournament-proven PRO gaming keyboard, now with advanced GX Blue Clicky mechanical switches. Built to win in collaboration with the world’s top esports athletes.',	'DIMENSIONS\r\nHeight: 200 mm\r\nWidth: 361 mm\r\nDepth: 153 mm\r\nTECHNICAL SPECIFICATIONS\r\nGX BLUE CLICKY SWITCHES\r\nActuation distance: 2 mm\r\nActuation force: 50 g\r\nTotal travel distance: 3.7 mm',	'https://resource.logitechg.com/w_692,c_lpad,ar_4:3,q_auto,f_auto,dpr_2.0/d_transparent.gif/content/dam/gaming/en/products/pro-keyboard/pro-clicky-gallery-1.png?v=1'),
(6,	'ASUS TUF Gaming K1 - RA04 Wired USB Gaming Keyboard  (Black)',	'₹3,599',	'Get an amazing gaming experience by getting the Asus TUF Gaming K1 Wired Gaming Keyboard online. This gaming keyboard delivers uncompromising performance and exceptional durability. It\'s equipped with switches that deliver silent tactility with every press.',	'Dimensions\r\nWidth\r\n468 mm\r\nHeight\r\n54 mm\r\nDepth\r\n354 mm\r\nCable Length\r\n1800 mm\r\nWeight\r\n907 g\r\nFor Desktop, Laptop\r\nConnectivity: Wired, USB 2.0\r\nCompatible OS: Windows 10 & 11\r\nDedicated Volume Knob, Side Light Bar, Armoury Crate\r\n1 Year Warranty\r\n',	'https://media-ik.croma.com/prod/https://media.croma.com/image/upload/v1681410061/Croma%20Assets/Computers%20Peripherals/Computer%20Accessories%20and%20Tablets%20Accessories/Images/233839_0_nmmzfl.png?tr=w-480'),
(7,	'Logitech G Pro X Gaming Wired Over Ear Headphones with Mic ',	'₹13,995',	'Designed with and for pros. Next-gen 7.1 surround sound and PRO-G 50 mm drivers ensure premium gaming audio. Mic sounds amazing with external USB sound card featuring Blue VO!CE broadcast filters.',	'Brand: Logitech G\r\nColour:	Black\r\nEar Placement:	Over Ear\r\nNoise Control:	Active Noise Cancellation\r\nConnectivity: wired',	'https://resource.logitechg.com/w_692,c_lpad,ar_4:3,q_auto,f_auto,dpr_2.0/d_transparent.gif/content/dam/gaming/en/products/pro-x/pro-headset-gallery-1.png?v=1'),
(8,	'Logitech G333 Gaming Earphones With Mic And Dual Drivers',	'₹5,495',	'Immerse into the game anywhere you play. High fidelity audio and clear communications on many devices—PC, mobile, Xbox, PlayStation , Nintendo and more. 3.5 mm connector and USB-C adapter included.',	'2 dynamic drivers: 5.8 mm + 9.2 mm\r\nFrequency Response: 20Hz ~ 20KHz\r\nImpedance: 24 Ohms ±20%\r\nSensitivity: 101.6±3 dB @ 1 kHz SPL\r\nMicrophone\r\n4 mm ECM mic, sensitivity: -42 dB',	'https://resource.logitechg.com/w_692,c_lpad,ar_4:3,q_auto,f_auto,dpr_2.0/d_transparent.gif/content/dam/gaming/en/products/g333-gaming-earphones/g333-black-gallery-1.png?v=1'),
(9,	'Redgear MP35 Speed-Type Gaming Mousepad (Black/Red)',	'₹299',	'Speed-type surface mousepad is designed with the use of great technology and craftsmanship especially for professional gamers. Non-slip rubber base',	'Brand: Redgear\r\nColour: Black/Red\r\nSpecial Feature	Speed-Type, Non-slip, Ergonomic\r\nRecommended Uses For Product: Gaming\r\nMaterial: Rubber\r\nMouse Mat Size: 350mm x 250mm x 4mm',	'https://m.media-amazon.com/images/I/61G5-hNFMYL._SX679_.jpg'),
(10,	'Logitech G840 Gaming Mousepad',	'₹3,716',	'Full desktop gaming mouse pad with space to configure your setup the way you want. Surface texture is performance-tuned for Logitech G mice. Rubber base stays in place for focus and control in-game.',	'DIMENSIONS\r\nHeight: 400 mm\r\nWidth: 900 mm\r\nDepth: 3 mm\r\nSurface: Performance-Tuned',	'https://resource.logitechg.com/w_692,c_lpad,ar_4:3,q_auto,f_auto,dpr_2.0/d_transparent.gif/content/dam/gaming/en/products/g840/g840-gallery-1-new.png?v=1');

-- 2024-07-16 07:29:03
