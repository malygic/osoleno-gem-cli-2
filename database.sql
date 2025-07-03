
-- Databáze pro projekt Osoleno

CREATE DATABASE IF NOT EXISTS `osoleno`;
USE `osoleno`;

-- Tabulka pro uživatele (pro e-shop)
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(50),
  `address` TEXT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabulka pro rezervace
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(50) NOT NULL,
  `reservation_date` DATE NOT NULL,
  `reservation_time` TIME NOT NULL,
  `guests` INT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabulka pro kategorie menu
CREATE TABLE IF NOT EXISTS `menu_categories` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabulka pro položky v menu
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `category_id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `price` VARCHAR(100) NOT NULL,
  `image` VARCHAR(255),
  FOREIGN KEY (`category_id`) REFERENCES `menu_categories`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabulka pro produkty v e-shopu
CREATE TABLE IF NOT EXISTS `products` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `price` DECIMAL(10, 2) NOT NULL,
  `image` VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabulka pro objednávky
CREATE TABLE IF NOT EXISTS `orders` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `total_price` DECIMAL(10, 2) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabulka pro položky v objednávce
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `order_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  `quantity` INT NOT NULL,
  `price` DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`),
  FOREIGN KEY (`product_id`) REFERENCES `products`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Vložení ukázkových dat

INSERT INTO `menu_categories` (`id`, `name`) VALUES
(1, 'Snídaňové Menu'),
(2, 'Předkrmy'),
(3, 'Hlavní chody'),
(4, 'Nápojový lístek');

INSERT INTO `menu_items` (`category_id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Brioška s lososem', 'Pošírované vejce, losos, avokádo, holandská omáčka.', '250 Kč', 'assets/images/menu/menu-item-brioche-salmon-benedict.jpg'),
(1, 'Brioška s kachnou', 'Trhané kachní maso, pošírované vejce, holandská omáčka.', '270 Kč', 'assets/images/menu/menu-item-brioche-duck-benedict.jpg'),
(2, 'Parfait Royale', 'Jemná paštika/parfait s lesklou želé vrstvou, servírovaná s plátky briošky.', '180 Kč', 'assets/images/menu/menu-item-parfait-royale.jpg'),
(3, 'Kachní filé', 'Šťavnaté kachní filé s křupavou kůží a omáčkou z červeného vína.', '450 Kč', 'assets/images/menu/menu-item-duck-fillet-main.jpg'),
(3, 'Burger s Foie Gras', 'Hovězí burger s plátkem foie gras, lanýžovou majonézou a hranolky.', '490 Kč', 'assets/images/menu/menu-item-burger-foie-gras.jpg');

INSERT INTO `products` (`name`, `description`, `price`, `image`) VALUES
('Kachní riettes', 'Naše domácí kachní riettes ve sklenici.', 150.00, 'assets/images/eshop/eshop-product-riettes-jar.jpg'),
('Čokoládový dezert', 'Bohatý čokoládový dezert s malinovou omáčkou.', 120.00, 'assets/images/eshop/eshop-product-dessert-takeaway.jpg');

