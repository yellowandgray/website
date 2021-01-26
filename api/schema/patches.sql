--26/01/2021
--New table course
ALTER TABLE `subject` ADD `course_id` INT(11) NOT NULL AFTER `description`;
ALTER TABLE `subject` CHANGE `course_id` `course_id` INT(11) NOT NULL DEFAULT '1';
ALTER TABLE `course` CHANGE `course_name` `name` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
ALTER TABLE `chapter` ADD `book_detail_id` INT(11) NOT NULL DEFAULT '0' AFTER `description`;
ALTER TABLE `chapter` CHANGE `book_detail_id` `bookl_id` INT(11) NOT NULL DEFAULT '0';
ALTER TABLE `question` DROP `book_id`;
ALTER TABLE `book` CHANGE `book_name_id` `subject_id` INT(11) NOT NULL;
ALTER TABLE `chapter` CHANGE `bookl_id` `book_id` INT(11) NOT NULL DEFAULT '0';
ALTER TABLE `question` CHANGE `created_by` `created_by` INT(11) NOT NULL DEFAULT '1';
ALTER TABLE `question` CHANGE `updated_by` `updated_by` INT(11) NOT NULL DEFAULT '1';
ALTER TABLE `subject` CHANGE `status` `status` TINYINT(1) NOT NULL DEFAULT '1';