--26/01/2021
--New table course
ALTER TABLE `subject` ADD `course_id` INT(11) NOT NULL AFTER `description`;
ALTER TABLE `subject` CHANGE `course_id` `course_id` INT(11) NOT NULL DEFAULT '1';
ALTER TABLE `course` CHANGE `course_name` `name` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;