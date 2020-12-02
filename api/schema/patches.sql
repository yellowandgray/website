--29-11-2020
--Created table sub_product

--30-11-2020
ALTER TABLE `sub_product` ADD `status` TINYINT(1) NOT NULL DEFAULT '1' AFTER `product_id`;

--02-12-2020
ALTER TABLE `orders` ADD `sub_total` FLOAT(12,2) NOT NULL DEFAULT '0' AFTER `mobile`, ADD `tax_amt` FLOAT(12,2) NOT NULL DEFAULT '0' AFTER `sub_total`;
ALTER TABLE `order_item` DROP `grand_total`;
ALTER TABLE `orders` ADD `discount_amt` FLOAT(12,2) NOT NULL DEFAULT '0' AFTER `tax_amt`;
ALTER TABLE `orders` CHANGE `shipped_at` `shipped_at` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '';
ALTER TABLE `orders` CHANGE `delivery_at` `delivery_at` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '';