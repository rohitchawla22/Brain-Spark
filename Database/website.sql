-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2013 at 09:50 PM
-- Server version: 5.5.28
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `website`
--
CREATE DATABASE IF NOT EXISTS `website` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `website`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `comment` text NOT NULL,
  `tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cid`, `username`, `comment`, `tid`) VALUES
(1, '', 'asd', NULL),
(2, '', 'Noooooooo', NULL),
(3, '', 'I cant beleive it', NULL),
(4, '', 'mannnnn', NULL),
(5, '', 'Noooo', NULL),
(6, '', 'sdas', NULL),
(7, '', 'sdas', NULL),
(8, '', 'Nooo', NULL),
(9, 'Leged', 'Noooo', NULL),
(10, 'Leged', 'NOOOOOO', NULL),
(11, 'Leged', '', 1),
(12, 'Leged', '', 1),
(13, 'Leged', '', 1),
(14, 'Leged', '', NULL),
(15, 'Leged', '', NULL),
(16, 'Leged', '', NULL),
(17, 'Leged', ':(((', NULL),
(18, 'Leged', 'hey', NULL),
(19, 'Leged', 'sda', NULL),
(20, 'Leged', 'soll', NULL),
(21, 'Leged', 'yeahhh', NULL),
(22, 'Leged', 'No man', NULL),
(23, 'Leged', 'Yoo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` char(32) NOT NULL,
  `Message` varchar(150) NOT NULL,
  `Email` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `Name`, `Message`, `Email`) VALUES
(1, 'Aamir Anwar', 'well this is just fucking great', 'aamir_dragonfury@hotmail.com'),
(2, 'Aamir Anwar', 'well this is just fucking great', 'aamir_dragonfury@hotmail.com'),
(3, 'sid', 'trippy site helloo', 'siddharth.nayar@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` char(150) NOT NULL,
  `answer` char(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `question`, `answer`) VALUES
(1, 'All radioactivity is man-made', 'No'),
(2, 'Does time slow down around objects with higher mass?', 'Yes'),
(3, 'Electrons are smaller than atoms', 'Yes'),
(4, 'Do Lasers work by focusing sound waves?', 'No'),
(5, 'The continents on which we live have been moving their location for millions of years and will continue to move in the future. Is this statement true?', 'Yes'),
(6, ' Earthworms come out when it is raining because they love water.Yes or no?', 'No'),
(7, 'In humans,Does the right lung weigh more than the left lung?', 'No'),
(8, ' Fingernails grow faster than toenails', 'Yes'),
(9, 'If placed in water a good egg sinks. An egg that has gone bad, floats. Yes or no?', 'Yes'),
(10, 'A spider is an insect', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quotes` text NOT NULL,
  `author` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `quotes`, `author`) VALUES
(1, 'If you don''t want to be beaten, imprisoned, mutilated, killed or tortured then you shouldn''t condone such behaviour towards anyone, be they human or not', 'Moby'),
(2, 'My body will not be a tomb for other creatures', 'Leonardo Da Vinc'),
(3, 'Nothing will benefit human health and increase the chances for survival of life on Earth as much as the evolution to a vegetarian diet', 'Albert Einstein'),
(4, 'People eat meat and think they will become as strong as an ox, forgetting that the ox eats grass.', 'Pino Caruso'),
(5, 'Only two things are infinite, the universe and human stupidity, and I''m not sure about the former', 'Albert Einstein'),
(6, 'Our scientific power has outrun our spiritual power. We have guided missiles and misguided men', 'Martin Luther King, Jr'),
(7, 'Your theory is crazy, but it''s not crazy enough to be true', 'Niels Bohr'),
(8, 'I do not think there is any thrill that can go through the human heart like that felt by the inventor as he sees some creation of the brain unfolding to success... such emotions make a man forget food, sleep, friends, love, everything', 'Nikola Tesla'),
(9, 'Our virtues and our failings are inseparable, like force and matter. When they separate, man is no more', 'Nikola Tesla'),
(10, 'The Sun, with all the planets revolving around it, and depending on it, can still ripen a bunch of grapes as though it had nothing else in the Universe to do', 'Galileo'),
(11, 'In rivers, the water that you touch is the last of what has passed and the first of that which comes; so with present time', 'Leonardo da Vinci'),
(12, 'Imagination is more important than knowledge', 'Einstein'),
(13, 'Science is not only compatible with spirituality; it is a profound source of spirituality', 'Carl Sagan'),
(14, 'By denying scientific principles, one may maintain any paradox', 'Galileo Galilei'),
(15, 'Anyone who is not shocked by quantum theory has not understood it', 'Neils Bohr'),
(16, 'Astronomy compels the soul to look upwards and leads us from this\r\nworld to another', 'Plato'),
(17, 'Science is built up of facts, as a house is built of stones; but an\r\naccumulation of facts is no more science than a heap of stones a house', 'Jules-Henri'),
(18, 'We live in a society exquisitely dependent  on science and technology, in which hardly\r\nanyone knows anything about science and technology', 'Carl Sagan'),
(19, 'The scientist does not study nature because it is useful; he studies it because he delights in it,\r\nand he delights in it because it is beautiful.  If nature were not beautiful, it would not be worth \r\nknowing, and if nature were not worth knowing, life would not be worth living', 'Jules-Henri Poincare');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `tname` text NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`tid`, `tname`) VALUES
(1, 'Breaking Bad is ending :('),
(2, 'Finally! The new ios :DD'),
(3, 'Darn Politicians.They''re everywhere!\r\n'),
(4, 'This project will be the death of me. Any help guys??\r\n'),
(5, 'Ps4 vs Xbox one. '),
(6, 'The ark reactor phase 4 '),
(7, 'Mark 2 works! Time to catch some bad guys B)\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Forename` char(32) NOT NULL,
  `Surname` char(32) NOT NULL,
  `Username` varchar(16) NOT NULL,
  `Password` varchar(12) NOT NULL,
  `Age` int(3) NOT NULL,
  `Email` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `Forename` (`Forename`),
  UNIQUE KEY `Forename_2` (`Forename`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Password` (`Password`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Forename_3` (`Forename`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Forename`, `Surname`, `Username`, `Password`, `Age`, `Email`) VALUES
(1, 'Aamir', 'Anwar', 'Dargon123', 'abcABC123', 19, 'fgd@hotmail.com'),
(4, 'James', 'Dean', 'JamesDean', 'Polyrhythms1', 32, 'jamesdean@hotmail.com'),
(5, 'Arnav', 'Puri', 'Arnavpuri', 'satanArmy200', 20, 'arnav.metalboy@hotmail.com'),
(6, 'Jimmy', 'Page', 'Leged', 'Artists101', 30, 'jimmypage@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
