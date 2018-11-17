-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2018 at 02:48 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lib`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_book`
--

CREATE TABLE `add_book` (
  `bookid` int(8) NOT NULL,
  `book_name` varchar(20) NOT NULL,
  `isbn_no` int(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `subtitle` varchar(20) NOT NULL,
  `author` varchar(20) NOT NULL,
  `edition` varchar(10) NOT NULL,
  `book_catagoary` varchar(20) NOT NULL,
  `edition_year` year(4) NOT NULL,
  `numberofcopy` int(11) NOT NULL,
  `availablebook` int(11) NOT NULL,
  `coverimg` mediumblob NOT NULL,
  `publisher` varchar(20) NOT NULL,
  `series` varchar(15) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date of birth` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `phoneno` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(70) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `upload_img` longblob NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
-