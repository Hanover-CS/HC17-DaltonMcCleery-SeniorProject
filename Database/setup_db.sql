-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2017 at 02:51 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Use this as a way to insure you have the correct URL path to the
-- Resources Folder within the Chops main Folder.
-- where ever you saved the Chops folder on your machine, you should put the absolute path in this variable
-- or replace all instances of this variable in this file with that path BEFORE running the script
DECLARE Resource_path varchar(80) := '/path/to/Chops';


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chops`
--
CREATE DATABASE IF NOT EXISTS `chops` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `chops`;

-- --------------------------------------------------------

--
-- Table structure for table `chops_audio`
--

DROP TABLE IF EXISTS `chops_audio`;
CREATE TABLE `chops_audio` (
  `id` int(11) NOT NULL,
  `file` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci DEFAULT 'Metronome Marking',
  `rudiment_id` int(11) DEFAULT NULL,
  `BPM` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chops_audio`
--

INSERT INTO `chops_audio` (`id`, `file`, `name`, `rudiment_id`, `BPM`) VALUES
(1, 'Resource_path/Resources/Audio/Click%20Tracks/60bpm', 'Metronome Marking', NULL, '60'),
(2, 'Resource_path/Resources/Audio/Click%20Tracks/75bpm', 'Metronome Marking', NULL, '75'),
(3, 'Resource_path/Resources/Audio/Click%20Tracks/90bpm', 'Metronome Marking', NULL, '90'),
(4, 'Resource_path/Resources/Audio/Click%20Tracks/100bpm', 'Metronome Marking', NULL, '100'),
(5, 'Resource_path/Resources/Audio/Click%20Tracks/110bpm', 'Metronome Marking', NULL, '110'),
(6, 'Resource_path/Resources/Audio/Click%20Tracks/120bpm', 'Metronome Marking', NULL, '120'),
(7, 'Resource_path/Resources/Audio/Click%20Tracks/130bpm', 'Metronome Marking', NULL, '130'),
(8, 'Resource_path/Resources/Audio/Click%20Tracks/140bpm', 'Metronome Marking', NULL, '140'),
(9, 'Resource_path/Resources/Audio/Click%20Tracks/150bpm', 'Metronome Marking', NULL, '150'),
(10, 'Resource_path/Resources/Audio/Click%20Tracks/160bpm', 'Metronome Marking', NULL, '160'),
(11, 'Resource_path/Resources/Audio/Click%20Tracks/170bpm', 'Metronome Marking', NULL, '170'),
(12, 'Resource_path/Resources/Audio/Click%20Tracks/180bpm', 'Metronome Marking', NULL, '180'),
(13, 'Resource_path/Resources/Audio/Click%20Tracks/190bpm', 'Metronome Marking', NULL, '190'),
(14, 'Resource_path/Resources/Audio/Click%20Tracks/200bpm', 'Metronome Marking', NULL, '200'),
(15, 'Resource_path/Resources/Audio/1%20E%20and%20Ah', 'Feel the Vibe', NULL, '120'),
(16, 'Resource_path/Resources/Audio/Beatles%20Medley', 'Beatles Medley', NULL, '100'),
(17, 'Resource_path/Resources/Audio/Drumline%20Etude%201', 'Drumline Groove', NULL, '150'),
(18, 'Resource_path/Resources/Audio/Fur%20Elise%20Redux', 'Fur Elise Redux', NULL, '120'),
(19, 'Resource_path/Resources/Audio/Planets%20Mars', 'Planets Suite: Mars', NULL, '150'),
(20, 'Resource_path/Resources/Audio/Sburg%202016%20Mvt%201', 'Scottsburg Marching Band - Part 1', NULL, '160'),
(21, 'Resource_path/Resources/Audio/Sburg%20Aux%20Warmup%201', '60 Seconds to Destruction', NULL, '160'),
(22, 'Resource_path/Resources/Audio/Sburg%20Aux%20Warmup%202', 'Solo Madness', NULL, '160');

-- --------------------------------------------------------

--
-- Table structure for table `chops_etudes`
--

DROP TABLE IF EXISTS `chops_etudes`;
CREATE TABLE `chops_etudes` (
  `id` int(11) NOT NULL,
  `file` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `rudiment_id` int(11) DEFAULT NULL,
  `hybrid_id` int(11) DEFAULT NULL,
  `composer` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `page` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chops_etudes`
--

INSERT INTO `chops_etudes` (`id`, `file`, `rudiment_id`, `hybrid_id`, `composer`, `name`, `page`) VALUES
(1, 'Resource_path/Resources/Etudes/5+2=7.jpg', 10, NULL, 'Edward Freytag', '5+2=7', NULL),
(2, 'Resource_path/Resources/Etudes/Accentuate.jpg', 7, NULL, 'Edward Freytag', 'Accentuate', NULL),
(3, 'Resource_path/Resources/Etudes/Add%20a%20Pop.jpg', 20, NULL, 'Edward Freytag', 'Add a Pop', NULL),
(4, 'Resource_path/Resources/Etudes/Crazy%20Eights%20-1.jpg', 21, NULL, 'Edward Freytag', 'Crazy Eights', 1),
(5, 'Resource_path/Resources/Etudes/Crazy%20Eights%20-2.jpg', 21, NULL, 'Edward Freytag', 'Crazy Eights', 2),
(6, 'Resource_path/Resources/Etudes/Diddle%20City%20-1.jpg', 16, NULL, 'Edward Freytag', 'Diddle City', 1),
(7, 'Resource_path/Resources/Etudes/Diddle%20City%20-2.jpg', 16, NULL, 'Edward Freytag', 'Diddle City', 2),
(8, 'Resource_path/Resources/Etudes/Diddles%20R%20Us%20-1.jpg', 10, NULL, 'Edward Freytag', 'Diddles R Us', 1),
(9, 'Resource_path/Resources/Etudes/Diddles%20R%20Us%20-2.jpg', 10, NULL, 'Edward Freytag', 'Diddles R Us', 2),
(10, 'Resource_path/Resources/Etudes/Draggin%20the%20Seven%20-1', 31, NULL, 'Edward Freytag', 'Draggin the Seven', 1),
(11, 'Resource_path/Resources/Etudes/Draggin%20the%20Seven%20-2', 31, NULL, 'Edward Freytag', 'Draggin the Seven', 2),
(12, 'Resource_path/Resources/Etudes/Exercise%201+2', NULL, NULL, 'N/A', 'Exercise 1 and 2', NULL),
(13, 'Resource_path/Resources/Etudes/Exercise%203', NULL, NULL, 'N/A', 'Exercise 3', NULL),
(14, 'Resource_path/Resources/Etudes/Exercise%204+5', NULL, NULL, 'N/A', 'Exercise 4 and 5', NULL),
(15, 'Resource_path/Resources/Etudes/Exercise%206+7', NULL, NULL, 'N/A', 'Exercise 6 and 7', NULL),
(16, 'Resource_path/Resources/Etudes/Exercise%208', NULL, NULL, 'N/A', 'Exercise 8', NULL),
(17, 'Resource_path/Resources/Etudes/First%20-1', 24, NULL, 'Stacey Duggan', 'First', 1),
(18, 'Resource_path/Resources/Etudes/First%20-2', 24, NULL, 'Stacey Duggan', 'First', 2),
(19, 'Resource_path/Resources/Etudes/Five%20against%20Two%20-1', 27, NULL, 'Edward Freytag', 'Five against Two', 1),
(20, 'Resource_path/Resources/Etudes/Five%20against%20Two%20-2', 27, NULL, 'Edward Freytag', 'Five against Two', 2),
(21, 'Resource_path/Resources/Etudes/Funky%20Fat%20-1', 21, NULL, 'Edward Freytag', 'Funky Fat', 1),
(22, 'Resource_path/Resources/Etudes/Funky%20Fat%20-2', 21, NULL, 'Edward Freytag', 'Funky Fat', 2),
(23, 'Resource_path/Resources/Etudes/Hit%20n%20Run%20-1', 22, NULL, 'John Witlock', 'Hit-N-Run', 1),
(24, 'Resource_path/Resources/Etudes/Hit%20n%20Run%20-2', 22, NULL, 'John Witlock', 'Hit-N-Run', 2),
(25, 'Resource_path/Resources/Etudes/Hit%20n%20Run%20-3', 22, NULL, 'John Witlock', 'Hit-N-Run', 3),
(26, 'Resource_path/Resources/Etudes/Hit%20n%20Run%20-4', 22, NULL, 'John Witlock', 'Hit-N-Run', 4),
(27, 'Resource_path/Resources/Etudes/Hot%20Licks', 18, NULL, 'Edward Freytag', 'Hot Licks', NULL),
(28, 'Resource_path/Resources/Etudes/Hybrid%20Rud%201', NULL, NULL, NULL, 'Hybrid Rudiments', NULL),
(29, 'Resource_path/Resources/Etudes/In%20Pulse%20-1', 23, NULL, 'John Witlock', 'In Pulse', 1),
(30, 'Resource_path/Resources/Etudes/In%20Pulse%20-2', 23, NULL, 'John Witlock', 'In Pulse', 2),
(31, 'Resource_path/Resources/Etudes/In%20Pulse%20-3', 23, NULL, 'John Witlock', 'In Pulse', 3),
(32, 'Resource_path/Resources/Etudes/In%20Pulse%20-4', 23, NULL, 'John Witlock', 'In Pulse', 4),
(33, 'Resource_path/Resources/Etudes/legend%20of%20a%20Two%20Eyed%20Soldier%20-1', 28, NULL, 'Edward Freytag', 'Legend of a Two Eyed Soldier', 1),
(34, 'Resource_path/Resources/Etudes/legend%20of%20a%20Two%20Eyed%20Soldier%20-2', 28, NULL, 'Edward Freytag', 'Legend of a Two Eyed Soldier', 2),
(35, 'Resource_path/Resources/Etudes/Mean%20Man%20Matt%20-1', 30, NULL, 'Mathew Freytag', 'Mean Man Matt', 1),
(36, 'Resource_path/Resources/Etudes/Mean%20Man%20Matt%20-2', 30, NULL, 'Mathew Freytag', 'Mean Man Matt', 2),
(37, 'Resource_path/Resources/Etudes/Method%20to%20my%20Madness%20-1', 27, NULL, 'Stacey Duggan', 'Method to my Madness', 1),
(38, 'Resource_path/Resources/Etudes/Method%20to%20my%20Madness%20-2', 27, NULL, 'Stacey Duggan', 'Method to my Madness', 2),
(39, 'Resource_path/Resources/Etudes/Method%20to%20my%20Madness%20-3', 27, NULL, 'Stacey Duggan', 'Method to my Madness', 3),
(40, 'Resource_path/Resources/Etudes/Odyssey%20II%20-1', NULL, NULL, 'Mike Lynch', 'Odssey II', 1),
(41, 'Resource_path/Resources/Etudes/Odyssey%20II%20-2', NULL, NULL, 'Mike Lynch', 'Odyssey II', 2),
(42, 'Resource_path/Resources/Etudes/Paraflams', NULL, NULL, 'Edward Freytag', 'Paraflams', NULL),
(43, 'Resource_path/Resources/Etudes/Prattfalls%20-1', NULL, NULL, 'Edward Freytag', 'Prattfalls', 1),
(44, 'Resource_path/Resources/Etudes/Prattfalls%20-2', NULL, NULL, 'Edward Freytag', 'Prattfalls', 2),
(45, 'Resource_path/Resources/Etudes/Prattfalls%20-3', NULL, NULL, 'Edward Freytag', 'Prattfalls', 3),
(46, 'Resource_path/Resources/Etudes/Seven%20and%20Six%20-1', NULL, NULL, 'Edward Freytag', 'Seven and Six', 1),
(47, 'Resource_path/Resources/Etudes/Seven%20and%20Six%20-2', NULL, NULL, 'Edward Freytag', 'Seven and Six', 2),
(48, 'Resource_path/Resources/Etudes/Shala%20-1', NULL, NULL, 'John Witlock', 'Shala\'', 1),
(49, 'Resource_path/Resources/Etudes/Shala%20-2', NULL, NULL, 'John Witlock', 'Shala\'', 2),
(50, 'Resource_path/Resources/Etudes/Shala%20-3', NULL, NULL, 'John Witlock', 'Shala\'', 3),
(51, 'Resource_path/Resources/Etudes/Shala%20-4', NULL, NULL, 'John Witlock', 'Shala\'', 4),
(52, 'Resource_path/Resources/Etudes/Single%20Strokin', NULL, NULL, 'Edward Freytag', 'Single Strokin\'', NULL),
(53, 'Resource_path/Resources/Etudes/Straight%20Six%20Eight', NULL, NULL, 'Edward Freytag', 'Straight Six Eight', NULL),
(54, 'Resource_path/Resources/Etudes/Cheese%20Exercises', NULL, 1, 'N/A', 'Cheese Exercises', NULL),
(55, 'Resource_path/Resources/Etudes/Herta%20Exercises', NULL, 2, 'N/A', 'Herta Exercises', NULL),
(56, 'Resource_path/Resources/Etudes/Eggbeater%20Exercise', NULL, 3, 'N/A', 'Eggbeater Exercise', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chops_favorites`
--

DROP TABLE IF EXISTS `chops_favorites`;
CREATE TABLE `chops_favorites` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `file` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lib_table` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chops_favorites`
--

INSERT INTO `chops_favorites` (`id`, `student_id`, `file_id`, `file`, `lib_table`) VALUES
(13, 3, 53, 'Resource_path/Resources/Etudes/Straight%20Six%20Eight', 'chops_etudes'),
(25, 3, 8, 'Resource_path/Resources/Videos/8V.%20Six%20Stroke%20Roll', 'chops_videos'),
(42, 1, 3, 'Resource_path/Resources/Etudes/Add%20a%20Pop.jpg', 'chops_etudes'),
(43, 1, 18, 'Resource_path/Resources/Audio/Fur%20Elise%20Redux', 'chops_audio'),
(47, 1, 11, 'https://www.youtube.com/watch?v=zgksthxBjqw', 'chops_videos');

-- --------------------------------------------------------

--
-- Table structure for table `chops_hybrids`
--

DROP TABLE IF EXISTS `chops_hybrids`;
CREATE TABLE `chops_hybrids` (
  `id` int(11) NOT NULL,
  `file` varchar(120) CHARACTER SET utf8 NOT NULL,
  `Name` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chops_hybrids`
--

INSERT INTO `chops_hybrids` (`id`, `file`, `Name`) VALUES
(1, 'Resource_path/Resources/Hybrid%20Rudi%20Pics/Cheese', 'Cheese'),
(2, 'Resource_path/Resources/Hybrid%20Rudi%20Pics/herta.jpg', 'Herta'),
(3, 'Resource_path/Resources/Hybrid%20Rudi%20Pics/eggbeaters.jpg', 'Eggbeaters'),
(4, 'Resource_path/Resources/Hybrid%20Rudi%20Pics/horsey.jpg', 'Horsey'),
(5, 'Resource_path/Resources/Hybrid%20Rudi%20Pics/flam%20fives.jpg', 'Double Inverted Flam Fives');

-- --------------------------------------------------------

--
-- Table structure for table `chops_rudiment`
--

DROP TABLE IF EXISTS `chops_rudiment`;
CREATE TABLE `chops_rudiment` (
  `id` int(11) NOT NULL,
  `file` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `Name` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chops_rudiment`
--

INSERT INTO `chops_rudiment` (`id`, `file`, `Name`) VALUES
(1, 'Resource_path/Resources/Rudi%20Pics/1.%20Single%20Stroke%20Roll%20Pic.jpg', 'Single Stroke Roll'),
(2, 'Resource_path/Resources/Rudi%20Pics/2.%20Single%20Stroke%20Four.jpg', 'Single Stroke Four'),
(3, 'Resource_path/Resources/Rudi%20Pics/3.%20Single%20Stroke%20Seven.jpg', 'Single Stroke Seven'),
(4, 'Resource_path/Resources/Rudi%20Pics/4.%20Buzz%20Roll.jpg', 'Buzz Roll'),
(5, 'Resource_path/Resources/Rudi%20Pics/5.%20Triple%20Stroke%20Roll.jpg', 'Triple Stroke Roll'),
(6, 'Resource_path/Resources/Rudi%20Pics/6.%20Double%20Stroke%20Roll.jpg', 'Double Stroke Roll'),
(7, 'Resource_path/Resources/Rudi%20Pics/7.%20Five%20Stroke%20Roll.jpg', 'Five Stroke Roll'),
(8, 'Resource_path/Resources/Rudi%20Pics/8.%20Six%20Stroke%20Roll.jpg', 'Six Stroke Roll'),
(9, 'Resource_path/Resources/Rudi%20Pics/9.%20Seven%20Stroke%20Roll.jpg', 'Seven Stroke Roll'),
(10, 'Resource_path/Resources/Rudi%20Pics/10.%20Nine%20Stroke%20Roll.jpg', 'Nine Stroke Roll'),
(11, NULL, 'Ten Stroke Roll'),
(12, NULL, 'Eleven Stroke Roll'),
(13, NULL, 'Thirteen Stroke Roll'),
(14, NULL, 'Fifteen Stroke Roll'),
(15, NULL, 'Seventeen Stroke Roll'),
(16, NULL, 'Single Paradiddle'),
(17, NULL, 'Double Paradiddle'),
(18, NULL, 'Triple Paradiddle'),
(19, NULL, 'Paradiddle-Diddle'),
(20, NULL, 'Flam'),
(21, NULL, 'Flam Accent'),
(22, NULL, 'Flam Tap'),
(23, NULL, 'Flamacue'),
(24, NULL, 'Flam Paradiddle'),
(25, NULL, 'Single Flam Mill'),
(26, NULL, 'Flam Paradiddle-Diddle'),
(27, NULL, 'Pataflafla'),
(28, NULL, 'Swiss Army Triplet'),
(29, NULL, 'Inverted Flam Tap'),
(30, NULL, 'Flam Drag'),
(31, NULL, 'Drag'),
(32, NULL, 'Single Drag Tap'),
(33, NULL, 'Double Drag Tap'),
(34, NULL, 'Lesson 25'),
(35, NULL, 'Single DragaDiddle'),
(36, NULL, 'Drag Paradiddle #1'),
(37, NULL, 'Drag Paradiddle #2'),
(38, NULL, 'Single Ratamacue'),
(39, NULL, 'Double Ratamacue'),
(40, NULL, 'Triple Ratamacue');

-- --------------------------------------------------------

--
-- Table structure for table `chops_students`
--

DROP TABLE IF EXISTS `chops_students`;
CREATE TABLE `chops_students` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `fname` varchar(45) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chops_students`
--

INSERT INTO `chops_students` (`id`, `username`, `password`, `fname`) VALUES
(1, 'username', 'password', 'Demo'),
(2, 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `chops_student_progress`
--

DROP TABLE IF EXISTS `chops_student_progress`;
CREATE TABLE `chops_student_progress` (
  `r_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chops_videos`
--

DROP TABLE IF EXISTS `chops_videos`;
CREATE TABLE `chops_videos` (
  `id` int(11) NOT NULL,
  `file` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `rudiment_id` int(11) DEFAULT NULL,
  `hybrid_id` int(11) DEFAULT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chops_videos`
--

INSERT INTO `chops_videos` (`id`, `file`, `rudiment_id`, `hybrid_id`, `name`) VALUES
(1, 'Resource_path/Resources/Videos/1V.%20Single%20Stroke%20Roll', 1, 0, 'Single Stroke Roll'),
(2, 'Resource_path/Resources/Videos/2V.%20Single%20Stroke%20Four', 2, 0, 'Single Stroke Four'),
(3, 'Resource_path/Resources/Videos/3V.%20Single%20Stroke%20Seven', 3, 0, 'Single Stroke Seven'),
(4, 'Resource_path/Resources/Videos/4V.%20Buzz%20Roll', 4, 0, 'Buzz Roll'),
(5, 'Resource_path/Resources/Videos/5V.%20Triple%20Stroke%20Roll', 5, 0, 'Triple Stroke Roll'),
(6, 'Resource_path/Resources/Videos/6V.%20Double%20Stroke%20Roll', 6, 0, 'Double Stroke Roll'),
(7, 'Resource_path/Resources/Videos/7V.%20Five%20Stroke%20Roll', 7, 0, 'Five Stroke Roll'),
(8, 'Resource_path/Resources/Videos/8V.%20Six%20Stroke%20Roll', 8, 0, 'Six Stroke Roll'),
(9, 'Resource_path/Resources/Videos/9V.%20Seven%20Stroke%20Roll', 9, 0, 'Seven Stroke Roll'),
(10, 'Resource_path/Resources/Videos/10V.%20Nine%20Stroke%20Roll', 10, 0, 'Nine Stroke Roll'),
(11, 'https://www.youtube.com/watch?v=zgksthxBjqw', NULL, NULL, 'Learn the Music: Madison Scouts 2016'),
(12, 'https://www.youtube.com/watch?v=EJ5ti4gTK6g', NULL, 1, 'Cheese');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chops_audio`
--
ALTER TABLE `chops_audio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rud_aud_id_idx` (`rudiment_id`);

--
-- Indexes for table `chops_etudes`
--
ALTER TABLE `chops_etudes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rudiment_idx` (`rudiment_id`),
  ADD KEY `chops_hybrid_idx` (`hybrid_id`);

--
-- Indexes for table `chops_favorites`
--
ALTER TABLE `chops_favorites`
  ADD PRIMARY KEY (`id`,`student_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `Students_idx` (`student_id`),
  ADD KEY `Favorites_idx` (`file`);

--
-- Indexes for table `chops_hybrids`
--
ALTER TABLE `chops_hybrids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chops_rudiment`
--
ALTER TABLE `chops_rudiment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `chops_students`
--
ALTER TABLE `chops_students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id_UNIQUE` (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `chops_student_progress`
--
ALTER TABLE `chops_student_progress`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `students_idx` (`student_id`);

--
-- Indexes for table `chops_videos`
--
ALTER TABLE `chops_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Rudiment_idx` (`rudiment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chops_audio`
--
ALTER TABLE `chops_audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `chops_etudes`
--
ALTER TABLE `chops_etudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `chops_favorites`
--
ALTER TABLE `chops_favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `chops_hybrids`
--
ALTER TABLE `chops_hybrids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `chops_rudiment`
--
ALTER TABLE `chops_rudiment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `chops_students`
--
ALTER TABLE `chops_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chops_audio`
--
ALTER TABLE `chops_audio`
  ADD CONSTRAINT `chops_audio_ibfk_1` FOREIGN KEY (`rudiment_id`) REFERENCES `chops_rudiment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chops_etudes`
--
ALTER TABLE `chops_etudes`
  ADD CONSTRAINT `chops_etudes_ibfk_1` FOREIGN KEY (`rudiment_id`) REFERENCES `chops_rudiment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chops_favorites`
--
ALTER TABLE `chops_favorites`
  ADD CONSTRAINT `chops_favorites_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `chops_students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chops_student_progress`
--
ALTER TABLE `chops_student_progress`
  ADD CONSTRAINT `chops_student_progress_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `chops_rudiment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `chops_student_progress_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `chops_students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chops_videos`
--
ALTER TABLE `chops_videos`
  ADD CONSTRAINT `chops_videos_ibfk_1` FOREIGN KEY (`rudiment_id`) REFERENCES `chops_rudiment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;