--29-10-2020
--Created table sub_product

--30-10-2020
ALTER TABLE `sub_product` ADD `status` TINYINT(1) NOT NULL DEFAULT '1' AFTER `product_id`;