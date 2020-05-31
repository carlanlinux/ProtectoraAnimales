-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 31, 2020 at 04:20 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `protectora_animales`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`password`, `id`) VALUES
('e3afed0047b08059d0fada10f400c1e5', 'Admin'),
('porrero', 'el petas'),
('8fe918632d847e8ea3ebffbd47bd8ca9', 'Carlos');
