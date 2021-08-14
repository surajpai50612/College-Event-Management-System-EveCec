--
-- Database: `eve_cec`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` ( 
  `si` INT NOT NULL AUTO_INCREMENT UNIQUE KEY ,  
  `username` VARCHAR(30) NOT NULL ,  
  `usn` VARCHAR(11) NOT NULL ,  
  `email_id` VARCHAR(30) NOT NULL ,  
  `password` VARCHAR(30) NOT NULL ,  
  `timestrap` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(usn)
) ENGINE = InnoDB;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`si`, `username`, `usn`, `email_id`, `password`, `timestrap`) VALUES 
('1', 'admin', '4CB18CS000', 'admin@gmail.com', 'admin', current_timestamp()),
('2', 'suraj', '4CB18CS099', 'suraj@gmail.com', 'suraj', current_timestamp()),
('3', 'varun', '4CB18CS112', 'varun@gmail.com', 'varun', current_timestamp()),
('4', 'shiva', '4CB18CS085', 'shiva@gmail.com', 'shiva', current_timestamp()),
('5', 'rakshan', '4CB18CS071', 'rakshan@gmail.com', 'rakshan', current_timestamp());

SELECT * FROM users ORDER BY si;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` ( 
  `si` INT NOT NULL AUTO_INCREMENT UNIQUE KEY ,  
  `image_id` INT NOT NULL ,  
  `name` VARCHAR(30) NOT NULL ,  
  `category` VARCHAR(30) NOT NULL ,  
  `description` VARCHAR(300) NOT NULL ,  
  `venue` VARCHAR(300) NOT NULL ,  
  `d&t` VARCHAR(50) NOT NULL ,  
  `timestramp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(image_id)
) ENGINE = InnoDB;

-- --
-- -- Dumping data for table `events`
-- --

INSERT INTO `events` (`si`, `image_id`, `name`, `category`, `description`, `venue`, `d&t`, `timestramp`) VALUES
('1', '2', 'DANCAHOLIC', 'Cultural', 'Display your individual brilliance, be the star of the stage thats all your. The stage gives you the chance to flaunt your best moves and the elegance. This is your chance to free yourself and express the best.', 'Main Stage, Canara Engineering College', 'on 12th December at 2:00 PM', current_timestamp()),
('2', '3', 'HOWZZATT!', 'Sports', 'Apna time aayega....if you can spin it, then swing it!!', 'BASKETBALL COURT, Canara Engineering College', 'on 20th December at 3:00 PM', current_timestamp()),
('3', '4', 'HACKATHON', 'Technical', 'Theme: Advancing Technology for Humanity – Hack Innovate Create', 'Cyber Center, Sahyadri Engineering College', 'on 28th December at 10:00 PM', current_timestamp());

SELECT * FROM events ORDER BY si;

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `winner`
-- --

CREATE TABLE `winner` ( 
  `si` INT NOT NULL AUTO_INCREMENT UNIQUE KEY ,  
  `image_id` INT NOT NULL ,  
  `stud_name` VARCHAR(30) NOT NULL ,  
  `usn` VARCHAR(11) NOT NULL ,  
  `eve_name` VARCHAR(50) NOT NULL ,  
  `category` VARCHAR(30) NOT NULL ,  
  `timestrap` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   FOREIGN KEY(usn) REFERENCES users(usn) ON DELETE CASCADE
) ENGINE = InnoDB;

-- --
-- -- Dumping data for table `winner`
-- --

INSERT INTO `winner` (`si`, `image_id`, `stud_name`, `usn`, `eve_name`, `category`, `timestrap`) VALUES
( '1','2', 'Suraj Pai K', '4CB18CS099', 'DANCAHOLIC', 'Cultural', current_timestamp()),
( '2','3', 'Varun Prabhu', '4CB18CS112', 'HACKATHON', 'Technical', current_timestamp()),
( '3','4', 'Rakshan Jain', '4CB18CS071', 'HOWZZATT!', 'Sports', current_timestamp());

SELECT * FROM winner ORDER BY si;

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `cultural`
-- --

CREATE TABLE `cultural` ( 
  `si` INT NOT NULL AUTO_INCREMENT UNIQUE KEY ,  
  `eve_name` VARCHAR(30) NOT NULL ,  
  `name` VARCHAR(30) NOT NULL ,  
  `usn` VARCHAR(11) NOT NULL ,  
  `email_id` VARCHAR(30) NOT NULL ,  
  `phone_number` VARCHAR(11) NOT NULL ,  
  `timestrap` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY(usn) REFERENCES users(usn) ON DELETE CASCADE
  ) ENGINE = InnoDB;

-- --
-- -- Dumping data for table `cultural`
-- --

INSERT INTO `cultural` (`si`, `eve_name`, `name`, `usn`, `email_id`, `phone_number`, `timestrap`) VALUES 
('1', 'DANCAHOLIC', 'Suraj Pai K', '4CB18CS099', 'suraj@gmail.com', '7019589692', current_timestamp());

SELECT * FROM cultural ORDER BY si;

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `technical`
-- --

CREATE TABLE `technical` ( 
  `si` INT NOT NULL AUTO_INCREMENT UNIQUE KEY ,  
  `eve_name` VARCHAR(30) NOT NULL ,  
  `name` VARCHAR(30) NOT NULL ,  
  `usn` VARCHAR(11) NOT NULL ,  
  `email_id` VARCHAR(30) NOT NULL ,  
  `phone_number` VARCHAR(11) NOT NULL ,  
  `timestrap` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY(usn) REFERENCES users(usn) ON DELETE CASCADE
  ) ENGINE = InnoDB;

-- --
-- -- Dumping data for table `technical`
-- --

INSERT INTO `technical` (`si`, `eve_name`, `name`, `usn`, `email_id`, `phone_number`, `timestrap`) VALUES 
('1', 'HACKATHON', 'Varun Prabhu', '4CB18CS112', 'varun@gmail.com', '7011234567', current_timestamp());

SELECT * FROM technical ORDER BY si;

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `sports`
-- --

CREATE TABLE `sports` ( 
  `si` INT NOT NULL AUTO_INCREMENT UNIQUE KEY ,  
  `eve_name` VARCHAR(30) NOT NULL ,  
  `name` VARCHAR(30) NOT NULL ,  
  `usn` VARCHAR(11) NOT NULL ,  
  `email_id` VARCHAR(30) NOT NULL ,  
  `phone_number` VARCHAR(11) NOT NULL ,  
  `timestrap` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY(usn) REFERENCES users(usn) ON DELETE CASCADE
  ) ENGINE = InnoDB;

-- --
-- -- Dumping data for table `sports`
-- --

INSERT INTO `sports` (`si`, `eve_name`, `name`, `usn`, `email_id`, `phone_number`, `timestrap`) VALUES 
('1', 'HOWZZATT!', 'Rakshan Jain', '4CB18CS071', 'rakshan@gmail.com', '3211234567', current_timestamp());

SELECT * FROM sports ORDER BY si;

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `registered`
-- --

CREATE TABLE `registered` ( 
  `si` INT NOT NULL AUTO_INCREMENT UNIQUE KEY ,  
  `eve_name` VARCHAR(30) NOT NULL ,  
  `name` VARCHAR(30) NOT NULL ,  
  `usn` VARCHAR(11) NOT NULL ,  
  `email_id` VARCHAR(30) NOT NULL ,  
  `phone_number` VARCHAR(11) NOT NULL ,  
  `timestrap` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY(usn) REFERENCES users(usn) ON DELETE CASCADE
  ) ENGINE = InnoDB;

SELECT * FROM sports ORDER BY si;

--
-- Triggers `registered` table `cultural`
--

CREATE TRIGGER `trigCultural` 
AFTER INSERT ON `cultural` FOR EACH ROW 
INSERT INTO `registered` (`si`, `eve_name`, `name`, `usn`, `email_id`, `phone_number`, `timestrap`) VALUES 
(null, new.eve_name, new.name, new.usn, new.email_id, new.phone_number, current_timestamp());

--
-- Triggers `registered` table `technical`
--

CREATE TRIGGER `trigTechnical` 
AFTER INSERT ON `technical` FOR EACH ROW 
INSERT INTO `registered` (`si`, `eve_name`, `name`, `usn`, `email_id`, `phone_number`, `timestrap`) VALUES 
(null, new.eve_name, new.name, new.usn, new.email_id, new.phone_number, current_timestamp());

--
-- Triggers `registered` table `sports`
--

CREATE TRIGGER `trigSports` 
AFTER INSERT ON `sports` FOR EACH ROW 
INSERT INTO `registered` (`si`, `eve_name`, `name`, `usn`, `email_id`, `phone_number`, `timestrap`) VALUES 
(null, new.eve_name, new.name, new.usn, new.email_id, new.phone_number, current_timestamp());

--  Creating Stored Procedure of selecting Users who registered today for any event 

CREATE PROCEDURE `getDetail`() NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
SELECT * FROM `registered` WHERE CAST(`timestrap` AS DATE)=CURDATE();

-- Calling stored procedure
-- CALL `getDetail`();


