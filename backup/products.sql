-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2025 at 03:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stars` int(11) DEFAULT NULL CHECK (`stars` between 0 and 5),
  `isInStock` tinyint(1) DEFAULT 1,
  `imageName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stars`, `isInStock`, `imageName`) VALUES
(1, 'Auriculares Bluetooth', 'Auriculares inalámbricos con cancelación de ruido y estuche de carga.', 200.99, 5, 1, 'auriculares.jpg'),
(3, 'Monitor 24 pulgadas', 'Pantalla IPS Full HD con entrada HDMI y VGA.', 149.00, 4, 1, 'monitor.jpg'),
(4, 'Mouse Gamer', 'Mouse óptico con 6 botones programables y luces LED.', 39.90, 3, 1, 'mouse.jpg'),
(5, 'Silla Ergonómica', 'Silla con soporte lumbar y ajuste de altura.', 229.99, 5, 0, 'silla.jpg'),
(6, 'Webcam HD', 'Cámara web con resolución 1080p y micrófono incorporado.', 69.95, 4, 1, 'webcam.jpg'),
(7, 'Disco SSD 1TB', 'Unidad de estado sólido SATA III con alta velocidad de lectura.', 389.99, 5, 1, '6839aeb7455ca_ssd.jpg'),
(10, 'Tablet 10\"', 'Tablet Android con pantalla HD y batería de larga duración.', 179.90, 4, 0, 'tablet.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
