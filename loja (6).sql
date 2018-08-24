-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Ago-2018 às 23:10
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.1.19

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

CREATE TABLE `brands` (
  `brand_id` int(11) UNSIGNED NOT NULL,
  `brand_name` varchar(100) NOT NULL DEFAULT '',
  `brand_url` varchar(255) NOT NULL,
  `brand_status` int(1) NOT NULL
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
(9, 'tramontina', 'tramontina', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `category_parent` int(11) DEFAULT NULL,
  `category_name` varchar(100) NOT NULL DEFAULT '',
  `category_thumb` varchar(255) NOT NULL,
  `category_url` varchar(255) NOT NULL,
  `category_status` int(1) NOT NULL
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
(10, 3, 'Furadeira 2', '', 'furadeira-2', 2),
(11, 1, 'Calçados', '', 'calcados', 1),
(18, 6, 'Compressor de Ar Direto', '', 'compressor-de-ar-direto', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `coupon_type` int(11) NOT NULL,
  `coupon_value` float NOT NULL
) ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `options`
--

CREATE TABLE `options` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT ''
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

CREATE TABLE `pages` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '',
  `body` text NOT NULL
) ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `product_id` int(11) UNSIGNED NOT NULL,
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
  `product_options` varchar(200) DEFAULT NULL
) ;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`product_id`, `product_id_category`, `product_id_brand`, `product_thumb`, `product_name`, `product_ra`, `product_url`, `product_description`, `product_stock`, `product_price`, `product_price_from`, `product_rating`, `product_featured`, `product_sale`, `product_bestseller`, `product_new`, `product_offer`, `product_status`, `product_options`) VALUES
(1, 11, 8, 'products/2018/08/furadeira-de-impacto-1-2-34-700-watts-com-velocidade-variavel-e-reversivel.jpg', 'Furadeira de impacto 1/2&#34; 700 watts com velocidade variável e reversível', 'RA1111', 'furadeira-de-impacto-1-2-34-700-watts-com-velocidade-variavel-e-reversivel', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div id=\\\"\\\\&quot;\\\\\\\\&quot;descricao\\\\\\\\&quot;\\\\&quot;\\\">\r\n<div class=\\\"\\\\&quot;\\\\\\\\&quot;titulo\\\\\\\\&quot;\\\\&quot;\\\">Descri&ccedil;&atilde;o do Produto</div>\r\n<div class=\\\"\\\\&quot;\\\\\\\\&quot;texto\\\\\\\\&quot;\\\\&quot;\\\">\r\n<p>A&nbsp;<strong>Furadeira de Impacto FI-05 da Mondial</strong>&nbsp;possui um potente motor de&nbsp;<strong>700 watts</strong>, sua&nbsp;<strong>velocidade &eacute; revers&iacute;vel</strong>&nbsp;e<strong>&nbsp;vari&aacute;vel</strong>. Mandril com capacidade para brocas de at&eacute; 13 mil&iacute;metros de di&acirc;metro. &nbsp;&Eacute; ideal para trabalhos em diversos tipos de materiais como: metais, madeira, concreto e alvan&aacute;ria.&nbsp;<br />A Furadeira de Impacto FI-05 &eacute;&nbsp;<strong>100% rolamentada.&nbsp;</strong></p>\r\n<p><br /><strong>Principais caracter&iacute;sticas da FI-05.&nbsp;</strong><br />Motor de 700 watts<br />Chave eletr&ocirc;nica para regular a velocidade<br />Sistema de revers&atilde;o<br />Fun&ccedil;&atilde;o impacto<br />Empunhadura multiposi&ccedil;&atilde;o.</p>\r\n</div>\r\n</div>\r\n<div id=\\\"\\\\&quot;\\\\\\\\&quot;descricao\\\\\\\\&quot;\\\\&quot;\\\">\r\n<div class=\\\"\\\\&quot;\\\\\\\\&quot;titulo\\\\\\\\&quot;\\\\&quot;\\\">Caracter&iacute;sticas do produto</div>\r\n<div class=\\\"\\\\&quot;\\\\\\\\&quot;texto\\\\\\\\&quot;\\\\&quot;\\\">\r\n<table class=\\\"\\\\&quot;\\\\\\\\&quot;dados-tecnicos-produto\\\\\\\\&quot;\\\\&quot;\\\" cellspacing=\\\"\\\\&quot;\\\\\\\\&quot;0\\\\\\\\&quot;\\\\&quot;\\\">\r\n<tbody>\r\n<tr>\r\n<td>C&oacute;digo:</td>\r\n<td>FI-05-220V</td>\r\n</tr>\r\n<tr>\r\n<td>Modelo:</td>\r\n<td>FI-05</td>\r\n</tr>\r\n<tr>\r\n<td>Capacidade de perfura&ccedil;&atilde;o A&ccedil;o (mm):</td>\r\n<td>10</td>\r\n</tr>\r\n<tr>\r\n<td>Capacidade de perfura&ccedil;&atilde;o Concreto (mm):</td>\r\n<td>13</td>\r\n</tr>\r\n<tr>\r\n<td>Capacidade de perfura&ccedil;&atilde;o Madeira (mm):</td>\r\n<td>25.4</td>\r\n</tr>\r\n<tr>\r\n<td>Capacidade do mandril (mm):</td>\r\n<td>12.7</td>\r\n</tr>\r\n<tr>\r\n<td>Capacidade do mandril (polegadas):</td>\r\n<td>1/2</td>\r\n</tr>\r\n<tr>\r\n<td>Com impacto:</td>\r\n<td>Sim</td>\r\n</tr>\r\n<tr>\r\n<td>Empunhadura:</td>\r\n<td>Sim</td>\r\n</tr>\r\n<tr>\r\n<td>Limitador de profundidade:</td>\r\n<td>Sim</td>\r\n</tr>\r\n<tr>\r\n<td>Pot&ecirc;ncia (W):</td>\r\n<td>700</td>\r\n</tr>\r\n<tr>\r\n<td>Rota&ccedil;&atilde;o m&aacute;xima (rpm):</td>\r\n<td>3000</td>\r\n</tr>\r\n<tr>\r\n<td>Rota&ccedil;&atilde;o revers&iacute;vel:</td>\r\n<td>Sim</td>\r\n</tr>\r\n<tr>\r\n<td>Velocidade vari&aacute;vel:</td>\r\n<td>Sim</td>\r\n</tr>\r\n<tr>\r\n<td>Voltagem:</td>\r\n<td>220V</td>\r\n</tr>\r\n<tr>\r\n<td>Peso:</td>\r\n<td>1.80 kg</td>\r\n</tr>\r\n<tr>\r\n<td>Profundidade:</td>\r\n<td>6.50 cm</td>\r\n</tr>\r\n<tr>\r\n<td>Altura:</td>\r\n<td>20.50 cm</td>\r\n</tr>\r\n<tr>\r\n<td>Largura:</td>\r\n<td>30.50 cm</td>\r\n</tr>\r\n<tr>\r\n<td>Garantia:</td>\r\n<td>12 meses</td>\r\n</tr>\r\n<tr>\r\n<td>Itens inclusos:</td>\r\n<td>\r\n<p>Empunhadeira lateral<br />Limitador de profundidade</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</body>\r\n</html>', 10, 139, 129, 1, 1, 1, 1, 1, 1, 1, NULL),
(2, 18, 2, 'products/2018/08/compressor-de-ar-baixa-pressao-8-2-pes-25-litros-monofasico-csa8-2-25-pratic-air.jpg', 'Compressor de ar baixa pressão 8,2 pés 25 litros monofásico - CSA8,2/25 - PRATIC AIR', '1130-200-0337', 'compressor-de-ar-baixa-pressao-8-2-pes-25-litros-monofasico-csa8-2-25-pratic-air', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div id=\\\"\\\\&quot;descricao\\\\&quot;\\\">\r\n<div class=\\\"\\\\&quot;texto\\\\&quot;\\\">\r\n<p>O&nbsp;<strong>Compressor de ar de baixa press&atilde;o&nbsp;CSA8,2/25</strong>&nbsp;da&nbsp;<strong>Schulz</strong>, &eacute; indicado para uso hobby.</p>\r\n<p>Pode ser usado em ch&aacute;caras, s&iacute;tios ou at&eacute; pra pintar paredes com um uso mais prolongado.</p>\r\n<p>Possui motoriza&ccedil;&atilde;o de 2 hp, reservat&oacute;rio de 25 litros e tem opera&ccedil;&atilde;o m&aacute;xima de 120 psi.</p>\r\n<p><strong>Compressor de pist&atilde;o da linha PRATIC AIR</strong>, com toda qualidade&nbsp;<strong>Schulz</strong>!</p>\r\n</div>\r\n</div>\r\n<div id=\\\"\\\\&quot;descricao\\\\&quot;\\\">\r\n<div class=\\\"\\\\&quot;titulo\\\\&quot;\\\">Caracter&iacute;sticas do produto</div>\r\n<div class=\\\"\\\\&quot;texto\\\\&quot;\\\">\r\n<table class=\\\"\\\\&quot;dados-tecnicos-produto\\\\&quot;\\\" cellspacing=\\\"\\\\&quot;0\\\\&quot;\\\">\r\n<tbody>\r\n<tr>\r\n<td>C&oacute;digo:</td>\r\n<td>915.0373-0</td>\r\n</tr>\r\n<tr>\r\n<td>Modelo:</td>\r\n<td>PRATIC AIR</td>\r\n</tr>\r\n<tr>\r\n<td>Especifica&ccedil;&otilde;es T&eacute;cnicas:</td>\r\n<td>\r\n<p>Pot&ecirc;ncia: 2 hp<br />Deslocamento te&oacute;rico: 147,5 l/m<br />Deslocamento te&oacute;rico: 5,2 pcm<br />N&uacute;mero de est&aacute;gio: 1&nbsp;<br />N&uacute;mero de pist&atilde;o: 1<br />N&uacute;mero de polos: 2&nbsp;<br />Press&atilde;o de opera&ccedil;&atilde;o m&aacute;xima: 120 psi<br />Volume do reservat&oacute;rio: 25 litros</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Quantidade(s):</td>\r\n<td>1 pe&ccedil;a</td>\r\n</tr>\r\n<tr>\r\n<td>Tipo:</td>\r\n<td>El&eacute;trico</td>\r\n</tr>\r\n<tr>\r\n<td>Voltagem:</td>\r\n<td>110V</td>\r\n</tr>\r\n<tr>\r\n<td>Peso:</td>\r\n<td>22.00 kg</td>\r\n</tr>\r\n<tr>\r\n<td>Profundidade:</td>\r\n<td>62.00 cm</td>\r\n</tr>\r\n<tr>\r\n<td>Altura:</td>\r\n<td>29.00 cm</td>\r\n</tr>\r\n<tr>\r\n<td>Largura:</td>\r\n<td>59.00 cm</td>\r\n</tr>\r\n<tr>\r\n<td>Garantia:</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</body>\r\n</html>', 10, 678, 578, 1, 1, 1, 2, 1, 1, 1, NULL),
(3, 10, 4, 'products/2018/08/furadeira-de-impacto-3-8-34-600-watts-com-maleta-e-ferramentas-1535144197.jpg', 'Furadeira de impacto 3/8&#34; 600 watts com maleta e ferramentas ', 'NFFI-07M', 'furadeira-de-impacto-3-8-34-600-watts-com-maleta-e-ferramentas', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div id=\\\"descricao\\\">\r\n<div class=\\\"titulo\\\">Descri&ccedil;&atilde;o do Produto</div>\r\n<div class=\\\"texto\\\">\r\n<p>A Furadeira de impacto 3/8\\\" 600 watts com velocidade vari&aacute;vel revers&iacute;vel - NFFI-07M da Mondial acompanha maleta organizadora com: 1 chave de mandril, 1 empunhadura lateral multiposi&ccedil;&atilde;o, 1 limitador de profundidade, 1 Martelo, 1 Trena, 1 Chave Philips, 1 Chave de Fenda e 5 Brocas.&nbsp;</p>\r\n<p>Indicado para uso hobby e semi-profissional.</p>\r\n</div>\r\n</div>\r\n<div id=\\\"descricao\\\">\r\n<div class=\\\"titulo\\\">Caracter&iacute;sticas do produto</div>\r\n<div class=\\\"texto\\\">\r\n<table class=\\\"dados-tecnicos-produto\\\" cellspacing=\\\"0\\\">\r\n<tbody>\r\n<tr>\r\n<td>C&oacute;digo:</td>\r\n<td>NFFI-07M-110V</td>\r\n</tr>\r\n<tr>\r\n<td>Modelo:</td>\r\n<td>NFFI-07M</td>\r\n</tr>\r\n<tr>\r\n<td>Capacidade de perfura&ccedil;&atilde;o A&ccedil;o (mm):</td>\r\n<td>10</td>\r\n</tr>\r\n<tr>\r\n<td>Capacidade de perfura&ccedil;&atilde;o Concreto (mm):</td>\r\n<td>10</td>\r\n</tr>\r\n<tr>\r\n<td>Capacidade de perfura&ccedil;&atilde;o Madeira (mm):</td>\r\n<td>20</td>\r\n</tr>\r\n<tr>\r\n<td>Capacidade do mandril (mm):</td>\r\n<td>9.53</td>\r\n</tr>\r\n<tr>\r\n<td>Capacidade do mandril (polegadas):</td>\r\n<td>3/8</td>\r\n</tr>\r\n<tr>\r\n<td>Com impacto:</td>\r\n<td>Sim</td>\r\n</tr>\r\n<tr>\r\n<td>Empunhadura:</td>\r\n<td>Sim</td>\r\n</tr>\r\n<tr>\r\n<td>Limitador de profundidade:</td>\r\n<td>Sim</td>\r\n</tr>\r\n<tr>\r\n<td>Rota&ccedil;&atilde;o m&aacute;xima (rpm):</td>\r\n<td>2800</td>\r\n</tr>\r\n<tr>\r\n<td>Rota&ccedil;&atilde;o revers&iacute;vel:</td>\r\n<td>Sim</td>\r\n</tr>\r\n<tr>\r\n<td>Velocidade vari&aacute;vel:</td>\r\n<td>Sim</td>\r\n</tr>\r\n<tr>\r\n<td>Voltagem:</td>\r\n<td>110V</td>\r\n</tr>\r\n<tr>\r\n<td>Peso:</td>\r\n<td>2.50 kg</td>\r\n</tr>\r\n<tr>\r\n<td>Garantia:</td>\r\n<td>12 meses</td>\r\n</tr>\r\n<tr>\r\n<td>Itens inclusos:</td>\r\n<td>\r\n<p>1 chave de mandril;<br />1 empunhadura lateral multiposi&ccedil;&atilde;o;&nbsp;<br />1 limitador de profundidade;&nbsp;<br />1 Martelo;&nbsp;<br />1 Trena;&nbsp;<br />1 Chave Philips;&nbsp;<br />1 Chave de Fenda;&nbsp;<br />5 Brocas.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</body>\r\n</html>', 10, 139, 129, 1, 1, 1, 1, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `products_images`
--

CREATE TABLE `products_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_product` int(11) NOT NULL,
  `url` varchar(50) NOT NULL DEFAULT ''
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

CREATE TABLE `products_options` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_option` int(11) NOT NULL,
  `p_value` varchar(100) NOT NULL DEFAULT ''
) ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_coupon` int(11) DEFAULT NULL,
  `total_amount` float NOT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `payment_status` int(11) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchases_products`
--

CREATE TABLE `purchases_products` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_purchase` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchase_transactions`
--

CREATE TABLE `purchase_transactions` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_purchase` int(11) NOT NULL,
  `amount` float NOT NULL,
  `transaction_code` int(11) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rates`
--

CREATE TABLE `rates` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_rated` datetime NOT NULL,
  `points` int(11) NOT NULL,
  `comment` text
) ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

CREATE TABLE `teste` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
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

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
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
  `user_status` int(1) DEFAULT NULL
) ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `user_thumb`, `user_name`, `user_lastname`, `user_document`, `user_genre`, `user_telephone`, `user_cell`, `user_email`, `user_password`, `user_channel`, `user_registration`, `user_lastupdate`, `user_lastaccess`, `user_level`, `user_status`) VALUES
(1, NULL, 'Telmo', 'Ricardo Rosa', '12345678910', 1, '(61) 3333-3333', '(61) 33333-3333', 'admin@cial.com.br', '$2y$12$XYto0Jy70xA2El1OmqqMDufoK1S5gO/pgSIIaHLr/T0AKCmA0PP3C', NULL, NULL, '2018-08-20 12:26:17', '2018-08-24 13:03:31', 10, 1),
(2, NULL, 'teste', 'teste', '12345678910', 1, '61999999999', '61999999999', 'teste@gmail.com', '$2y$12$n5qmIA2z05aYFuCrqRL0Y.B/qk/pVxYUxfkhVSO9XnYDuu3RXKvSa', NULL, NULL, '2018-08-20 12:27:13', '2018-08-17 12:45:15', 10, 1),
(3, NULL, 'teste', 'teste', '999.999.999-99', 1, '(61) 3461-8404', '(61) 9285-9211', 'teste@gmail.com', '$2y$12$Km8vz2VCQguyqnPkMkVul.2lxaOYuwLQysmVL5xjDlvfxnOLOf1B6', NULL, '2018-08-17 13:46:31', '2018-08-20 12:26:54', '2018-08-17 20:55:33', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_options`
--
ALTER TABLE `products_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases_products`
--
ALTER TABLE `purchases_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_transactions`
--
ALTER TABLE `purchase_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teste`
--
ALTER TABLE `teste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_options`
--
ALTER TABLE `products_options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases_products`
--
ALTER TABLE `purchases_products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_transactions`
--
ALTER TABLE `purchase_transactions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teste`
--
ALTER TABLE `teste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
