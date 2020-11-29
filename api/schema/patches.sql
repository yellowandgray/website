--29-10-2020
--Created table sub_product
ALTER TABLE `product` ADD `has_sublevel` TINYINT(1) NOT NULL DEFAULT '0' AFTER `image_path`;