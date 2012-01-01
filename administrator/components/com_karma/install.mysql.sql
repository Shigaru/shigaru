DROP TABLE IF EXISTS`#__karma_tb`;

	CREATE TABLE `#__karma_tb` (
				`user_id` INT NOT NULL,
				`var_karma` INT DEFAULT 0,
				`total_karma` INT DEFAULT 0
				);
				
DROP TABLE IF EXISTS `#__karma_log`;

	CREATE TABLE `#__karma_log` (
				`id` INT PRIMARY KEY AUTO_INCREMENT,
				`user_id` INT,
				`my_id` INT,
				`type` INT,
				`timestamp` DATETIME,
				`ip` TEXT
				);

DROP TABLE IF EXISTS `#__karma_conf`;

	CREATE TABLE `#__karma_conf` (
				`name` TEXT,
				`value` TEXT
				);
				
INSERT INTO `#__karma_conf` values ('daylock', '1');
