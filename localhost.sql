-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 08, 2018 at 03:46 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meWriter`
--
CREATE DATABASE IF NOT EXISTS `meWriter` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `meWriter`;

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `administratorsId` int(100) NOT NULL,
  `administratorsName` varchar(100) NOT NULL,
  `administratorsPassword` varchar(100) NOT NULL,
  `administratorsEmail` varchar(100) NOT NULL,
  `administratorsMobile` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`administratorsId`, `administratorsName`, `administratorsPassword`, `administratorsEmail`, `administratorsMobile`) VALUES
(1, 'Ngure Ngure', '11111111111', 'vicorngure@gmail.com', 701969007);

-- --------------------------------------------------------

--
-- Table structure for table `answerFiles`
--

CREATE TABLE `answerFiles` (
  `fileId` int(254) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `orderId` int(100) NOT NULL,
  `uploadDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answerFiles`
--

INSERT INTO `answerFiles` (`fileId`, `fileName`, `orderId`, `uploadDate`) VALUES
(26, '1519555376-ngure-linda(cover-letter).docx', 10, '2018-02-25 13:42:56'),
(38, '1519662450-ngure%20linda(23.11', 10, '2018-02-26 19:27:30'),
(39, '1519663526-ngure%20linda(23.11', 10, '2018-02-26 19:45:26'),
(40, '1519663702-building+a+rest+api+with+spring.pdf', 10, '2018-02-26 19:48:22'),
(41, '1519663868-financing-a-business.odt', 10, '2018-02-26 19:51:08'),
(42, '1519663894-project-conecpt.odt', 10, '2018-02-26 19:51:34'),
(43, '1519663894-financing-a-business.odt', 10, '2018-02-26 19:51:34'),
(44, '1519663894-iot-questions.odt', 10, '2018-02-26 19:51:34'),
(45, '1519663895-is-project-(4).pdf', 10, '2018-02-26 19:51:35'),
(46, '1519729412-ngure%20linda(23.11', 11, '2018-02-27 14:03:32'),
(47, '1519729412-building+a+rest+api+with+spring.pdf', 11, '2018-02-27 14:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `assignmentFiles`
--

CREATE TABLE `assignmentFiles` (
  `fileID` int(254) NOT NULL,
  `fileName` varchar(254) NOT NULL,
  `orderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int(100) NOT NULL,
  `clientName` varchar(100) NOT NULL,
  `clientPassword` varchar(100) NOT NULL,
  `clientsEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientName`, `clientPassword`, `clientsEmail`) VALUES
(1, 'Kamanu  Ngure', '111111111111111111111', 'kamanu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(100) NOT NULL,
  `commentSubject` varchar(100) NOT NULL,
  `commentMessage` varchar(100) NOT NULL,
  `orderId` int(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `clientId` int(100) DEFAULT NULL,
  `writersId` int(100) DEFAULT NULL,
  `administratorsId` int(100) DEFAULT NULL,
  `commentStatus` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `commentSubject`, `commentMessage`, `orderId`, `date`, `clientId`, `writersId`, `administratorsId`, `commentStatus`) VALUES
(4, 'Increase Content', 'Kindly increase the content of this answer. I feel like it is too shallow', 10, '2018-03-05 18:09:48', NULL, NULL, 1, 1),
(5, 'ooooooo', 'ooooooooo', 10, '2018-02-26 19:04:17', 1, NULL, NULL, 0),
(15, 'bra bra bra', '111111', 10, '2018-02-26 19:17:15', NULL, 3, NULL, 0),
(16, 'Come Ucheki', 'Nakucheki', 10, '2018-02-26 19:18:06', NULL, 3, NULL, 0),
(17, 'Come Ucheki', 'Nakucheki', 10, '2018-02-26 19:18:09', NULL, 3, NULL, 0),
(18, 'mmmm', '0000', 10, '2018-02-26 19:52:00', NULL, 3, NULL, 0),
(19, 'olololo', 'olololo', 10, '2018-02-27 14:09:45', NULL, 3, NULL, 0),
(20, 'olololo', 'olololo', 10, '2018-02-27 14:09:49', NULL, 3, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(254) NOT NULL,
  `orderCourse` varchar(254) NOT NULL,
  `orderTitle` varchar(254) NOT NULL,
  `orderStatus` int(1) NOT NULL DEFAULT '0',
  `pages` int(10) NOT NULL,
  `deadline` varchar(254) NOT NULL,
  `fee` int(254) NOT NULL,
  `paperDescription` varchar(1000) NOT NULL,
  `academicLevel` varchar(100) NOT NULL,
  `titlePage` varchar(100) NOT NULL,
  `paperFormat` varchar(100) NOT NULL,
  `serviceType` varchar(100) NOT NULL,
  `writersId` int(100) DEFAULT NULL,
  `clientId` int(100) NOT NULL,
  `assignmentStatus` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `orderCourse`, `orderTitle`, `orderStatus`, `pages`, `deadline`, `fee`, `paperDescription`, `academicLevel`, `titlePage`, `paperFormat`, `serviceType`, `writersId`, `clientId`, `assignmentStatus`) VALUES
(10, 'Computer Science', 'Computer Science', 1, 40, '28/02/2018', 400, 'Computer Science', 'Computer Science', 'Computer Science', 'Computer Science', 'Computer Science', 3, 1, 3),
(11, 'Bcom', 'aaaaaaaa', 1, 6, '29/02/2018', 3000, 'There are mainly two types of packet forwarders that can be running on your gateway, depending on the kind of network protocol they use:\r\n\r\n    Packet forwarders that connect using the Semtech UDP protocol (such as the Semtech UDP Packet Forwarder). This protocol is not encrypted, ', 'phd', 'yes', 'APA', 'Write from scratch', 3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers` (
  `writersId` int(100) NOT NULL,
  `writersName` varchar(100) NOT NULL,
  `writersPassword` varchar(100) NOT NULL,
  `writersMobile` int(100) NOT NULL,
  `writersEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`writersId`, `writersName`, `writersPassword`, `writersMobile`, `writersEmail`) VALUES
(1, 'victor', '202cb962ac59075b964b07152d234b70', 701969007, 'victorngure@gmail.com'),
(2, 'vik', '333c16ffc4a246e51cfb8f3ba4db079e', 701969007, 'vic@gmail.com'),
(3, 'victorngure', '946cc85484c4dd01e2f44fbc88afbc93', 0, 'victorngure@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`administratorsId`);

--
-- Indexes for table `answerFiles`
--
ALTER TABLE `answerFiles`
  ADD PRIMARY KEY (`fileId`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `assignmentFiles`
--
ALTER TABLE `assignmentFiles`
  ADD PRIMARY KEY (`fileID`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `administratorsId` (`administratorsId`),
  ADD KEY `clientId` (`clientId`),
  ADD KEY `writersId` (`writersId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `clientId` (`clientId`),
  ADD KEY `writersId` (`writersId`);

--
-- Indexes for table `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`writersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `administratorsId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answerFiles`
--
ALTER TABLE `answerFiles`
  MODIFY `fileId` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `assignmentFiles`
--
ALTER TABLE `assignmentFiles`
  MODIFY `fileID` int(254) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `writers`
--
ALTER TABLE `writers`
  MODIFY `writersId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answerFiles`
--
ALTER TABLE `answerFiles`
  ADD CONSTRAINT `answerFiles_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `assignmentFiles`
--
ALTER TABLE `assignmentFiles`
  ADD CONSTRAINT `assignmentFiles_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`administratorsId`) REFERENCES `administrators` (`administratorsId`) ON UPDATE SET NULL,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON UPDATE SET NULL,
  ADD CONSTRAINT `comments_ibfk_4` FOREIGN KEY (`writersId`) REFERENCES `writers` (`writersId`) ON UPDATE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`writersId`) REFERENCES `writers` (`writersId`) ON UPDATE SET NULL;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"meWriter\",\"table\":\"comments\"},{\"db\":\"meWriter\",\"table\":\"orders\"},{\"db\":\"meWriter\",\"table\":\"writers\"},{\"db\":\"meWriter\",\"table\":\"answerFiles\"},{\"db\":\"meWriter\",\"table\":\"assignmentFiles\"},{\"db\":\"meWriter\",\"table\":\"administrators\"},{\"db\":\"meWriter\",\"table\":\"clients\"},{\"db\":\"meWriter\",\"table\":\"users\"},{\"db\":\"tastic\",\"table\":\"images\"},{\"db\":\"tastic\",\"table\":\"users\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'tastic', 'images', '{\"sorted_col\":\"`propertyId` ASC\"}', '2018-01-23 19:35:50'),
('root', 'tastic', 'properties', '{\"sorted_col\":\"`propertyDescription` ASC\"}', '2018-02-13 09:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2018-02-25 10:14:18', '{\"collation_connection\":\"utf8mb4_unicode_ci\",\"SendErrorReports\":\"always\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `tastic`
--
CREATE DATABASE IF NOT EXISTS `tastic` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tastic`;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageId` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `propertyId` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imageId`, `image`, `created`, `propertyId`) VALUES
(69, '1516738824-home1.jpg', '2018-01-23 23:20:24', 80),
(70, '1516738824-home2.jpg', '2018-01-23 23:20:24', 80),
(71, '1516831367-home3.jpg', '2018-01-25 01:02:47', 81),
(72, '1516831367-home4.jpg', '2018-01-25 01:02:47', 81),
(73, '1516832146-home7.jpg', '2018-01-25 01:15:46', 82),
(74, '1516832146-home6.jpg', '2018-01-25 01:15:46', 82),
(75, '1516832146-home5.jpg', '2018-01-25 01:15:46', 82),
(76, '1516832146-home4.jpg', '2018-01-25 01:15:46', 82),
(77, '1516832146-home3.jpg', '2018-01-25 01:15:46', 82),
(78, '1516832146-home2.jpg', '2018-01-25 01:15:46', 82),
(79, '1516832146-home1.jpg', '2018-01-25 01:15:46', 82),
(80, '1518071705-home7.jpg', '2018-02-08 09:35:05', 83),
(81, '1518071705-home6.jpg', '2018-02-08 09:35:05', 83),
(82, '1518071705-home5.jpg', '2018-02-08 09:35:05', 83),
(83, '1518072519-home2.jpg', '2018-02-08 09:48:39', 84),
(84, '1518072519-home5.jpg', '2018-02-08 09:48:39', 84),
(85, '1518072519-home7.jpg', '2018-02-08 09:48:39', 84),
(86, '1518072615-home3.jpg', '2018-02-08 09:50:15', 86),
(87, '1518072799-home6.jpg', '2018-02-08 09:53:19', 88),
(88, '1518072799-home3.jpg', '2018-02-08 09:53:19', 88),
(89, '1518072799-home4.jpg', '2018-02-08 09:53:19', 88),
(90, '1518073178-home6.jpg', '2018-02-08 09:59:38', 89),
(91, '1518073178-home3.jpg', '2018-02-08 09:59:38', 89);

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `id` int(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `propertyId` int(100) NOT NULL,
  `propertyTitle` varchar(100) NOT NULL,
  `propertyPrice` int(11) NOT NULL,
  `propertyDescription` varchar(254) NOT NULL,
  `propertyArea` int(254) NOT NULL,
  `propertyStatus` varchar(254) NOT NULL,
  `bedrooms` int(254) NOT NULL,
  `bathrooms` int(254) NOT NULL,
  `propertyType` varchar(254) NOT NULL,
  `propertyLocation` varchar(100) NOT NULL,
  `propertySublocation` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `agentId` int(100) NOT NULL,
  `activationStatus` int(1) NOT NULL DEFAULT '0',
  `propertyVideo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`propertyId`, `propertyTitle`, `propertyPrice`, `propertyDescription`, `propertyArea`, `propertyStatus`, `bedrooms`, `bathrooms`, `propertyType`, `propertyLocation`, `propertySublocation`, `created`, `agentId`, `activationStatus`, `propertyVideo`) VALUES
(80, 'Kilimani Heights', 1000, '1000', 0, 'Sale', 0, 0, 'Apartment', 'Mombasa', 'Mtongwe', '2018-02-13 12:23:11', 27, 0, 'https://www.youtube.com/watch?v=UO5ktwPXsyM'),
(81, 'Donholmn Flat', 100, 'Assure polite his really and others figure though. Day age advantages end sufficient eat expression travelling. Of on am father by agreed supply rather either. Own handsome delicate its property mistress her end appetite. Mean are sons too sold nor said.', 100, 'Rent', 5, 5, 'Single Family Home', 'Nairobi', 'Kasarani', '2018-01-25 01:02:46', 27, 0, ''),
(82, 'Phase 8 Bedsitter', 1000, 'Assure polite his really and others figure though. Day age advantages end sufficient eat expression travelling. Of on am father by agreed supply rather either. Own handsome delicate its property mistress her end appetite. Mean are sons too sold nor said.', 0, 'Rent', 0, 0, 'Apartment', 'Kisumu', 'Nyamera', '2018-01-25 01:15:46', 27, 0, ''),
(83, 'Madaraka Flats', 1000, 'CSS stands for Cascading Style Sheets.\r\n\r\nCSS describes how HTML elements are to be displayed on screen, paper, or in other media.\r\n\r\nCSS saves a lot of work. It can control the layout of multiple web pages all at once.\r\n\r\nCSS can be added to HTML elemen', 10, 'Sale', 10, 10, 'Apartment', 'Kisumu', 'Nyamera', '2018-02-08 09:35:04', 27, 0, ''),
(84, 'Jong Jong Jong', 10, 'aaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 10, 'Sale', 10, 10, 'Apartment', 'Kisumu', 'Nyamera', '2018-02-08 09:48:39', 27, 0, ''),
(85, 'Jong Jong Jong', 10, 'aaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 10, 'Sale', 10, 10, 'Apartment', '', '', '2018-02-08 09:49:16', 27, 0, ''),
(86, 'Umoja  Tala', 110, '110', 110, 'Sale', 110, 110, 'Apartment', 'Nairobi', 'Kasarani', '2018-02-08 09:50:15', 27, 0, ''),
(87, 'Umoja  Tala', 110, '110', 110, 'Sale', 110, 110, 'Apartment', '', '', '2018-02-08 09:50:55', 27, 0, ''),
(88, 'Utawala FLats', 1111, 'Note that per RFC 2616 (the HTTP/1.1 specification), the value of the Location header must be an absolute URI, not just a path.\r\n\r\nIf your script is for a specific purpose and always redirects to a certain section, but may vary which particular records a', 1111, 'Sale', 1111, 1111, 'Apartment', 'Mombasa', 'Mtongwe', '2018-02-08 09:53:19', 27, 0, ''),
(89, 'Ruai Plaza ', 100, 'Note that per RFC 2616 (the HTTP/1.1 specification), the value of the Location header must be an absolute URI, not just a path.\r\n\r\nIf your script is for a specific purpose and always redirects to a certain section, but may vary which particular records a', 100, 'Sale', 100, 100, 'Apartment', 'Mombasa', 'Mtongwe', '2018-02-08 09:59:38', 27, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `propertyCordinates`
--

CREATE TABLE `propertyCordinates` (
  `id` int(100) NOT NULL,
  `propertyId` int(100) NOT NULL,
  `propertyLong` varchar(100) NOT NULL,
  `propertyLat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `property_features`
--

CREATE TABLE `property_features` (
  `id` int(100) NOT NULL,
  `feature` varchar(100) NOT NULL,
  `propertyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_features`
--

INSERT INTO `property_features` (`id`, `feature`, `propertyId`) VALUES
(52, 'Attic', 80),
(53, 'Garden', 80),
(54, 'Attic', 81),
(55, 'Basement', 81),
(56, 'Garden', 81),
(57, 'Alarm System', 81),
(58, 'Solar Panels', 81),
(59, 'CCTV', 81),
(60, 'Attic', 82),
(61, 'Basement', 82),
(62, 'Garden', 82),
(63, 'Alarm System', 82),
(64, 'Solar Panels', 82),
(65, 'CCTV', 82),
(66, 'Attic', 83),
(67, 'Garden', 83),
(68, 'Solar Panels', 83),
(69, 'Attic', 84),
(70, 'Attic', 86),
(71, 'Attic', 88),
(72, 'Solar Panels', 89);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userPassword` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `activationStatus` int(1) NOT NULL DEFAULT '0',
  `hash` varchar(255) NOT NULL,
  `userMobile1` varchar(100) NOT NULL,
  `userMobile2` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userPassword`, `userEmail`, `activationStatus`, `hash`, `userMobile1`, `userMobile2`, `facebook`, `twitter`, `instagram`, `youtube`) VALUES
(27, 'viki     ', '946cc85484c4dd01e2f44fbc88afbc93', 'victorngure@gmail.com', 0, 'c24cd76e1ce41366a4bbe8a49b02a028', '0701969007', '0789089229', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageId`),
  ADD KEY `fk_propertyId` (`propertyId`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`propertyId`),
  ADD KEY `agentId` (`agentId`);

--
-- Indexes for table `propertyCordinates`
--
ALTER TABLE `propertyCordinates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `propertyId` (`propertyId`);

--
-- Indexes for table `property_features`
--
ALTER TABLE `property_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `propertyId` (`propertyId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `propertyId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `propertyCordinates`
--
ALTER TABLE `propertyCordinates`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_features`
--
ALTER TABLE `property_features`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_propertyId` FOREIGN KEY (`propertyId`) REFERENCES `properties` (`propertyId`);

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`agentId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `propertyCordinates`
--
ALTER TABLE `propertyCordinates`
  ADD CONSTRAINT `propertyCordinates_ibfk_1` FOREIGN KEY (`propertyId`) REFERENCES `properties` (`propertyId`);

--
-- Constraints for table `property_features`
--
ALTER TABLE `property_features`
  ADD CONSTRAINT `property_features_ibfk_1` FOREIGN KEY (`propertyId`) REFERENCES `properties` (`propertyId`);
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
