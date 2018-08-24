-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 24-Ago-2018 às 03:47
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.1.16

SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(100) NOT NULL DEFAULT '',
  `brand_url` varchar(255) NOT NULL,
  `brand_status` int(1) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ;

--
-- Extraindo dados da tabela `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_url`, `brand_status`) VALUES
(1, 'Still', 'still', 1),
(2, 'schulz', 'schulz', 1),
(3, 'weg', 'weg', 1),
(4, 'bthode', 'bthode', 1),
(5, 'branco', 'branco', 1),
(6, 'harcher', 'harcher', 1),
(7, 'schneider', 'schneider', 1),
(8, 'tigre', 'tigre', 1),
(9, 'tramontina', 'tramontina', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_parent` int(11) DEFAULT NULL,
  `category_name` varchar(100) NOT NULL DEFAULT '',
  `category_thumb` varchar(255) NOT NULL,
  `category_url` varchar(255) NOT NULL,
  `category_status` int(1) NOT NULL,
  PRIMARY KEY (`category_id`)
) ;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`category_id`, `category_parent`, `category_name`, `category_thumb`, `category_url`, `category_status`) VALUES
(1, NULL, 'Ferramentas Elétricas', 'categorias/2018/08/ferramentas-eletricas.png', 'ferramentas-eletricas', 1),
(2, NULL, 'Ferramentas à Bateria', 'categorias/2018/08/ferramentas-a-bateria.png', 'ferramentas-a-bateria', 1),
(3, NULL, 'Ferramentas Manuais', 'categorias/2018/08/ferramentas-manuais.png', 'ferramentas-manuais', 1),
(4, NULL, 'Construção Civil', 'categorias/2018/08/construcao-civil.png', 'construcao-civil', 1),
(5, NULL, 'Jardim e Agrícola', 'categorias/2018/08/jardim-e-agricola.png', 'jardim-e-agricola', 1),
(6, NULL, 'Compressores de Ar', 'categorias/2018/08/compressores-de-ar.png', 'compressores-de-ar', 1),
(7, NULL, 'Limpeza', 'categorias/2018/08/limpeza-1534279714.png', 'limpeza', 1),
(8, NULL, 'Solda', 'categorias/2018/08/solda.png', 'solda', 1),
(9, NULL, 'Movimentação de Carga', 'categorias/2018/08/movimentacao-de-carga.png', 'movimentacao-de-carga', 1),
(10, 1, 'Furadeira', '', 'furadeira', 1),
(11, 1, 'Calçados', '', 'calcados', 1),
(12, 2, 'sapatos', '', 'sapatos', 1),
(13, 1, 'Nova categoria', '', 'nova-categoria', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `coupon_type` int(11) NOT NULL,
  `coupon_value` float NOT NULL,
  PRIMARY KEY (`id`)
) ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ;

--
-- Extraindo dados da tabela `options`
--

INSERT INTO `options` (`id`, `name`) VALUES
(1, 'Cor'),
(2, 'Tamanho'),
(3, 'Memória RAM'),
(4, 'Polegadas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id_category` int(11) DEFAULT NULL,
  `product_id_brand` int(11) DEFAULT NULL,
  `product_thumb` varchar(255) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_ra` varchar(200) DEFAULT NULL,
  `product_url` varchar(255) DEFAULT NULL,
  `product_description` text,
  `product_stock` int(11) DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `product_price_from` float DEFAULT NULL,
  `product_rating` float DEFAULT NULL,
  `product_featured` tinyint(1) DEFAULT NULL,
  `product_sale` tinyint(1) DEFAULT NULL,
  `product_bestseller` tinyint(1) DEFAULT NULL,
  `product_new` tinyint(1) DEFAULT NULL,
  `product_offer` tinyint(1) DEFAULT NULL,
  `product_status` tinyint(1) DEFAULT NULL,
  `product_options` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`product_id`, `product_id_category`, `product_id_brand`, `product_thumb`, `product_name`, `product_ra`, `product_url`, `product_description`, `product_stock`, `product_price`, `product_price_from`, `product_rating`, `product_featured`, `product_sale`, `product_bestseller`, `product_new`, `product_offer`, `product_status`, `product_options`) VALUES
(1, 12, 8, 'products/2018/08/teste-teste.jpg', 'teste teste', 'RA1111', 'teste-teste', '                            sdfasfsafas', 10, 1, 399, 1, 1, 1, 1, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `products_images`
--

DROP TABLE IF EXISTS `products_images`;
CREATE TABLE IF NOT EXISTS `products_images` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `url` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ;

--
-- Extraindo dados da tabela `products_images`
--

INSERT INTO `products_images` (`id`, `id_product`, `url`) VALUES
(1, 1, '1.jpg'),
(2, 2, '2.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products_options`
--

DROP TABLE IF EXISTS `products_options`;
CREATE TABLE IF NOT EXISTS `products_options` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_option` int(11) NOT NULL,
  `p_value` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_coupon` int(11) DEFAULT NULL,
  `total_amount` float NOT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `payment_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchases_products`
--

DROP TABLE IF EXISTS `purchases_products`;
CREATE TABLE IF NOT EXISTS `purchases_products` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_purchase` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchase_transactions`
--

DROP TABLE IF EXISTS `purchase_transactions`;
CREATE TABLE IF NOT EXISTS `purchase_transactions` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_purchase` int(11) NOT NULL,
  `amount` float NOT NULL,
  `transaction_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rates`
--

DROP TABLE IF EXISTS `rates`;
CREATE TABLE IF NOT EXISTS `rates` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_rated` datetime NOT NULL,
  `points` int(11) NOT NULL,
  `comment` text,
  PRIMARY KEY (`id`)
) ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

DROP TABLE IF EXISTS `teste`;
CREATE TABLE IF NOT EXISTS `teste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;

--
-- Extraindo dados da tabela `teste`
--

INSERT INTO `teste` (`id`, `name`) VALUES
(21, 'teste1'),
(22, 'Telmo'),
(23, 'teste1'),
(24, NULL),
(25, NULL),
(26, NULL),
(27, NULL),
(28, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_thumb` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_document` varchar(255) DEFAULT NULL,
  `user_genre` int(11) DEFAULT NULL,
  `user_telephone` varchar(255) DEFAULT NULL,
  `user_cell` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_channel` varchar(255) DEFAULT NULL,
  `user_registration` timestamp NULL DEFAULT NULL,
  `user_lastupdate` timestamp NULL DEFAULT NULL,
  `user_lastaccess` timestamp NULL DEFAULT NULL,
  `user_level` int(11) NOT NULL DEFAULT '1',
  `user_status` int(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `user_thumb`, `user_name`, `user_lastname`, `user_document`, `user_genre`, `user_telephone`, `user_cell`, `user_email`, `user_password`, `user_channel`, `user_registration`, `user_lastupdate`, `user_lastaccess`, `user_level`, `user_status`) VALUES
(1, NULL, 'Telmo', 'Ricardo Rosa', '12345678910', 1, '(61) 3333-3333', '(61) 33333-3333', 'admin@cial.com.br', '$2y$12$XYto0Jy70xA2El1OmqqMDufoK1S5gO/pgSIIaHLr/T0AKCmA0PP3C', NULL, NULL, '2018-08-20 12:26:17', '2018-08-24 01:48:42', 10, 1),
(2, NULL, 'teste', 'teste', '12345678910', 1, '61999999999', '61999999999', 'teste@gmail.com', '$2y$12$n5qmIA2z05aYFuCrqRL0Y.B/qk/pVxYUxfkhVSO9XnYDuu3RXKvSa', NULL, NULL, '2018-08-20 12:27:13', '2018-08-17 12:45:15', 10, 1),
(3, NULL, 'teste', 'teste', '999.999.999-99', 1, '(61) 3461-8404', '(61) 9285-9211', 'teste@gmail.com', '$2y$12$Km8vz2VCQguyqnPkMkVul.2lxaOYuwLQysmVL5xjDlvfxnOLOf1B6', NULL, '2018-08-17 13:46:31', '2018-08-20 12:26:54', '2018-08-17 20:55:33', 2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
