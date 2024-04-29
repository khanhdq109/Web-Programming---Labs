-- Set SQL mode and time zone
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Create database `user` if it does not exist and use it
CREATE DATABASE IF NOT EXISTS `user` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `user`;

-- Table structure for table `login`
CREATE TABLE `login` (
    `id` int(11) AUTO_INCREMENT PRIMARY KEY,
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Insert data into table `login`
INSERT INTO `login` (`username`, `password`) VALUES
    ('john_doe', 'password123'),
    ('alice_smith', 'pass1234'),
    ('khanhdq0109', '01092002'),
    ('admin', 'admin123');