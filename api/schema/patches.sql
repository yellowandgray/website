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

--27/01/2021
ALTER TABLE `student_log` ADD `book_id` INT NOT NULL DEFAULT '0' AFTER `difficult_name`, ADD `book_name` VARCHAR(255) NOT NULL DEFAULT '' AFTER `book_id`;

--28/01/2021
ALTER TABLE `book` ADD `chapter_note` TEXT NOT NULL AFTER `subject_id`, ADD `solved_example` TEXT NOT NULL AFTER `chapter_note`;
ALTER TABLE `book` ADD `image_path` VARCHAR(255) NOT NULL DEFAULT '' AFTER `solved_example`;
ALTER TABLE `book` ADD `show_s_example` TINYINT(1) NOT NULL DEFAULT '0' AFTER `image_path`;