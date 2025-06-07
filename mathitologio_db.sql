-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 07 Ιουν 2025 στις 16:17:25
-- Έκδοση διακομιστή: 10.4.28-MariaDB
-- Έκδοση PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `mathitologio_db`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `grade`
--

CREATE TABLE `grade` (
  `student_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `subject` varchar(30) DEFAULT NULL,
  `surname` varchar(30) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `class` varchar(3) DEFAULT NULL,
  `grade` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `eponymo` varchar(30) NOT NULL,
  `onoma` varchar(20) DEFAULT NULL,
  `taxi` varchar(1) DEFAULT NULL,
  `tmima` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `class` varchar(1) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `teacher_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(10) NOT NULL,
  `eponymo` varchar(30) NOT NULL,
  `onoma` varchar(20) NOT NULL,
  `subject` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Ευρετήρια για πίνακα `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Ευρετήρια για πίνακα `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
