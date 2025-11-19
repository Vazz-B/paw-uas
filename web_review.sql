-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2025 at 03:07 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_review`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`) VALUES
(1, 'buku_fiksi'),
(2, 'buku_novel'),
(3, 'buku_komik'),
(4, 'buku_pelajaran'),
(5, 'buku_biografi'),
(6, 'buku_motivasi'),
(7, 'buku_sejarah'),
(8, 'buku_teknologi'),
(9, 'buku_romantis'),
(10, 'buku_petualangan'),
(11, 'lagu_pop'),
(12, 'lagu_rock'),
(13, 'lagu_jazz'),
(14, 'lagu_dangdut'),
(15, 'lagu_keroncong'),
(16, 'lagu_lofi'),
(17, 'lagu_edm'),
(18, 'lagu_hiphop'),
(19, 'lagu_religi'),
(20, 'lagu_indie'),
(21, 'game_moba'),
(22, 'game_fps'),
(23, 'game_rpg'),
(24, 'game_strategy'),
(25, 'game_simulation'),
(26, 'game_action'),
(27, 'game_sport'),
(28, 'game_puzzle'),
(29, 'game_fighting'),
(30, 'game_adventure'),
(31, 'film_drama'),
(32, 'film_horor'),
(33, 'film_komedi'),
(34, 'film_romance'),
(35, 'film_aksi'),
(36, 'film_fantasi'),
(37, 'film_scifi'),
(38, 'film_thriller'),
(39, 'film_petualangan'),
(40, 'film_misteri'),
(41, 'buku_puisi'),
(42, 'buku_kamus'),
(43, 'buku_ensiklopedia'),
(44, 'buku_kesehatan'),
(45, 'buku_filsafat'),
(46, 'buku_resep'),
(47, 'buku_nonfiksi'),
(48, 'buku_anak'),
(49, 'buku_tutorial'),
(50, 'buku_agama'),
(51, 'lagu_classic'),
(52, 'lagu_orchestra'),
(53, 'lagu_traditional'),
(54, 'lagu_akustik'),
(55, 'lagu_reggae'),
(56, 'lagu_kpop'),
(57, 'lagu_metal'),
(58, 'lagu_country'),
(59, 'lagu_ska'),
(60, 'lagu_ballad'),
(61, 'game_survival'),
(62, 'game_horror'),
(63, 'game_openworld'),
(64, 'game_racing'),
(65, 'game_platformer'),
(66, 'game_casual'),
(67, 'game_arcade'),
(68, 'game_sandbox'),
(69, 'game_multiplayer'),
(70, 'game_idle'),
(71, 'film_documenter'),
(72, 'film_anime'),
(73, 'film_biografi'),
(74, 'film_musikal'),
(75, 'film_perang'),
(76, 'film_superhero'),
(77, 'film_keluarga'),
(78, 'film_histori'),
(79, 'film_epic'),
(80, 'film_animasi'),
(81, 'buku_sastra'),
(82, 'buku_pengembangan_diri'),
(83, 'buku_ilmiah'),
(84, 'buku_finansial'),
(85, 'buku_inspiratif'),
(86, 'buku_kreatif'),
(87, 'buku_bahasa'),
(88, 'buku_desain'),
(89, 'buku_markup'),
(90, 'buku_arsitektur'),
(91, 'lagu_blues'),
(92, 'lagu_funk'),
(93, 'lagu_kontemporer'),
(94, 'lagu_romantis'),
(95, 'lagu_vocaloid'),
(96, 'lagu_jpop'),
(97, 'lagu_disney'),
(98, 'lagu_instrumen'),
(99, 'lagu_soul'),
(100, 'lagu_world');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `komentar_id` int NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `tanggal_komen` date DEFAULT NULL,
  `jumlah_like` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`komentar_id`, `post_id`, `user_id`, `tanggal_komen`, `jumlah_like`, `deleted_by`) VALUES
(1, 12, 44, '2025-01-05', 34, NULL),
(2, 3, 21, '2025-02-11', 12, 21),
(3, 77, 9, '2025-03-18', 87, NULL),
(4, 54, 60, '2025-01-27', 145, 60),
(5, 19, 11, '2025-04-02', 22, NULL),
(6, 88, 32, '2025-03-09', 301, 32),
(7, 45, 7, '2025-02-14', 16, NULL),
(8, 70, 28, '2025-05-03', 57, 28),
(9, 96, 49, '2025-01-31', 112, NULL),
(10, 5, 15, '2025-06-12', 4, NULL),
(11, 13, 3, '2025-01-20', 64, 3),
(12, 24, 64, '2025-04-21', 119, NULL),
(13, 68, 17, '2025-02-18', 201, NULL),
(14, 2, 27, '2025-03-12', 55, 27),
(15, 41, 72, '2025-01-25', 13, NULL),
(16, 59, 8, '2025-02-07', 78, 8),
(17, 10, 57, '2025-03-14', 9, NULL),
(18, 22, 1, '2025-05-07', 46, NULL),
(19, 91, 43, '2025-04-19', 32, 43),
(20, 6, 19, '2025-02-02', 15, NULL),
(21, 47, 31, '2025-01-16', 101, 31),
(22, 35, 5, '2025-06-06', 3, NULL),
(23, 14, 23, '2025-01-29', 144, NULL),
(24, 53, 61, '2025-02-24', 299, 61),
(25, 100, 12, '2025-04-11', 20, NULL),
(26, 38, 4, '2025-05-14', 8, NULL),
(27, 80, 79, '2025-01-04', 248, 79),
(28, 18, 51, '2025-03-02', 77, NULL),
(29, 66, 35, '2025-02-27', 166, NULL),
(30, 1, 84, '2025-04-30', 92, 84),
(31, 74, 6, '2025-02-10', 52, NULL),
(32, 9, 46, '2025-05-08', 111, 46),
(33, 28, 17, '2025-03-23', 42, NULL),
(34, 83, 10, '2025-01-13', 305, 10),
(35, 57, 95, '2025-06-02', 17, NULL),
(36, 26, 39, '2025-04-03', 130, NULL),
(37, 71, 14, '2025-03-15', 61, NULL),
(38, 11, 50, '2025-02-05', 22, NULL),
(39, 32, 36, '2025-01-08', 197, 36),
(40, 16, 25, '2025-04-24', 10, NULL),
(41, 52, 73, '2025-05-29', 280, 73),
(42, 7, 66, '2025-01-22', 93, NULL),
(43, 89, 58, '2025-03-18', 12, 58),
(44, 63, 22, '2025-04-14', 49, NULL),
(45, 42, 76, '2025-06-18', 5, NULL),
(46, 93, 2, '2025-02-08', 136, NULL),
(47, 55, 71, '2025-01-30', 80, 71),
(48, 87, 34, '2025-06-10', 154, NULL),
(49, 50, 13, '2025-03-06', 26, 13),
(50, 79, 41, '2025-05-12', 212, NULL),
(51, 21, 99, '2025-04-01', 18, 99),
(52, 40, 29, '2025-03-10', 141, NULL),
(53, 65, 56, '2025-02-04', 7, NULL),
(54, 8, 88, '2025-05-20', 92, 88),
(55, 23, 62, '2025-01-11', 63, NULL),
(56, 33, 48, '2025-04-05', 199, NULL),
(57, 31, 74, '2025-06-22', 172, 74),
(58, 20, 81, '2025-03-27', 30, NULL),
(59, 49, 18, '2025-02-16', 115, NULL),
(60, 60, 52, '2025-01-07', 8, 52),
(61, 17, 98, '2025-05-25', 147, 98),
(62, 86, 40, '2025-03-04', 29, NULL),
(63, 4, 16, '2025-02-12', 54, NULL),
(64, 58, 90, '2025-04-18', 302, 90),
(65, 95, 63, '2025-06-14', 83, NULL),
(66, 73, 85, '2025-02-22', 215, 85),
(67, 25, 55, '2025-03-01', 9, NULL),
(68, 46, 47, '2025-01-18', 216, NULL),
(69, 30, 92, '2025-04-27', 17, 92),
(70, 36, 59, '2025-06-09', 39, NULL),
(71, 78, 24, '2025-03-19', 111, NULL),
(72, 15, 53, '2025-02-20', 55, 53),
(73, 44, 69, '2025-06-01', 24, NULL),
(74, 72, 30, '2025-01-23', 185, 30),
(75, 97, 20, '2025-04-23', 77, NULL),
(76, 51, 26, '2025-02-03', 88, NULL),
(77, 69, 83, '2025-05-11', 212, 83),
(78, 90, 33, '2025-03-08', 43, NULL),
(79, 34, 4, '2025-06-16', 17, NULL),
(80, 62, 75, '2025-04-08', 136, 75),
(81, 94, 1, '2025-01-14', 309, 1),
(82, 82, 10, '2025-02-25', 14, NULL),
(83, 76, 38, '2025-03-26', 66, NULL),
(84, 29, 45, '2025-04-15', 48, 45),
(85, 57, 50, '2025-05-30', 154, 50),
(86, 43, 93, '2025-06-05', 91, NULL),
(87, 67, 80, '2025-01-26', 132, NULL),
(88, 98, 6, '2025-02-15', 20, NULL),
(89, 48, 68, '2025-04-20', 285, 68),
(90, 100, 14, '2025-06-19', 8, NULL),
(91, 56, 96, '2025-03-03', 60, 96),
(92, 11, 58, '2025-02-06', 39, NULL),
(93, 22, 29, '2025-05-19', 155, NULL),
(94, 84, 3, '2025-04-06', 210, 3),
(95, 52, 91, '2025-01-15', 72, NULL),
(96, 19, 12, '2025-02-13', 51, NULL),
(97, 7, 41, '2025-03-28', 14, 41),
(98, 63, 82, '2025-01-09', 128, NULL),
(99, 27, 54, '2025-04-10', 33, 54),
(100, 85, 37, '2025-06-21', 190, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `like_komentar`
--

CREATE TABLE `like_komentar` (
  `likekomentar_id` int NOT NULL,
  `komentar_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `like_komentar`
--

INSERT INTO `like_komentar` (`likekomentar_id`, `komentar_id`, `user_id`) VALUES
(1, 12, 44),
(2, 7, 81),
(3, 25, 16),
(4, 48, 92),
(5, 3, 67),
(6, 19, 54),
(7, 61, 33),
(8, 88, 10),
(9, 40, 79),
(10, 55, 23),
(11, 31, 5),
(12, 97, 36),
(13, 14, 72),
(14, 63, 18),
(15, 26, 49),
(16, 84, 91),
(17, 52, 12),
(18, 91, 27),
(19, 1, 62),
(20, 71, 8),
(21, 46, 30),
(22, 9, 59),
(23, 79, 2),
(24, 34, 43),
(25, 67, 77),
(26, 4, 95),
(27, 18, 39),
(28, 82, 13),
(29, 59, 68),
(30, 22, 51),
(31, 75, 20),
(32, 29, 84),
(33, 53, 11),
(34, 96, 46),
(35, 16, 40),
(36, 66, 99),
(37, 39, 73),
(38, 89, 6),
(39, 5, 28),
(40, 78, 63),
(41, 32, 87),
(42, 94, 32),
(43, 13, 55),
(44, 21, 75),
(45, 68, 7),
(46, 44, 98),
(47, 28, 50),
(48, 76, 19),
(49, 11, 90),
(50, 41, 53),
(51, 85, 26),
(52, 24, 4),
(53, 62, 58),
(54, 99, 38),
(55, 6, 89),
(56, 45, 15),
(57, 73, 71),
(58, 36, 3),
(59, 87, 82),
(60, 58, 24),
(61, 2, 94),
(62, 50, 35),
(63, 95, 17),
(64, 20, 85),
(65, 69, 47),
(66, 37, 76),
(67, 49, 41),
(68, 86, 22),
(69, 8, 34),
(70, 64, 97),
(71, 17, 52),
(72, 81, 25),
(73, 23, 56),
(74, 72, 14),
(75, 35, 60),
(76, 77, 100),
(77, 10, 29),
(78, 98, 1),
(79, 57, 45),
(80, 15, 93),
(81, 100, 69),
(82, 74, 31),
(83, 27, 78),
(84, 56, 42),
(85, 65, 96),
(86, 47, 9),
(87, 93, 83),
(88, 30, 61),
(89, 83, 37),
(90, 38, 64),
(91, 42, 48),
(92, 92, 57),
(93, 33, 74),
(94, 90, 21),
(95, 70, 66),
(96, 80, 52),
(97, 60, 70),
(98, 54, 86),
(99, 43, 80),
(100, 51, 88);

-- --------------------------------------------------------

--
-- Table structure for table `like_post`
--

CREATE TABLE `like_post` (
  `likepost_id` int NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `like_post`
--

INSERT INTO `like_post` (`likepost_id`, `post_id`, `user_id`) VALUES
(1, 34, 12),
(2, 7, 56),
(3, 89, 3),
(4, 15, 44),
(5, 63, 27),
(6, 22, 81),
(7, 51, 9),
(8, 99, 72),
(9, 40, 15),
(10, 13, 67),
(11, 76, 24),
(12, 58, 93),
(13, 4, 11),
(14, 92, 35),
(15, 10, 48),
(16, 47, 62),
(17, 84, 5),
(18, 53, 29),
(19, 1, 77),
(20, 66, 8),
(21, 31, 90),
(22, 74, 41),
(23, 9, 16),
(24, 25, 54),
(25, 97, 2),
(26, 38, 69),
(27, 20, 23),
(28, 82, 88),
(29, 44, 30),
(30, 56, 14),
(31, 14, 63),
(32, 62, 37),
(33, 33, 78),
(34, 95, 20),
(35, 11, 46),
(36, 59, 6),
(37, 73, 58),
(38, 19, 95),
(39, 87, 32),
(40, 5, 71),
(41, 36, 4),
(42, 81, 87),
(43, 17, 38),
(44, 49, 60),
(45, 93, 1),
(46, 26, 76),
(47, 69, 12),
(48, 2, 66),
(49, 55, 50),
(50, 98, 19),
(51, 6, 82),
(52, 71, 25),
(53, 68, 92),
(54, 32, 13),
(55, 21, 57),
(56, 94, 7),
(57, 30, 83),
(58, 83, 53),
(59, 46, 10),
(60, 8, 74),
(61, 41, 47),
(62, 75, 22),
(63, 12, 85),
(64, 64, 49),
(65, 28, 18),
(66, 100, 80),
(67, 3, 43),
(68, 79, 21),
(69, 24, 52),
(70, 52, 59),
(71, 18, 94),
(72, 91, 40),
(73, 16, 75),
(74, 29, 34),
(75, 80, 17),
(76, 39, 89),
(77, 23, 64),
(78, 72, 51),
(79, 50, 28),
(80, 60, 79),
(81, 37, 31),
(82, 96, 70),
(83, 43, 26),
(84, 86, 84),
(85, 48, 55),
(86, 78, 36),
(87, 35, 68),
(88, 61, 45),
(89, 88, 96),
(90, 27, 39),
(91, 45, 86),
(92, 70, 33),
(93, 67, 73),
(94, 42, 91),
(95, 65, 42),
(96, 57, 98),
(97, 90, 65),
(98, 85, 97),
(99, 54, 61),
(100, 77, 100);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `kategori_id` int NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `isi` varchar(100) DEFAULT NULL,
  `jumlah_like` varchar(50) DEFAULT NULL,
  `tanggal_post` date DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `kategori_id`, `judul`, `isi`, `jumlah_like`, `tanggal_post`, `deleted_by`) VALUES
(1, 12, 5, 'Review Buku Fiksi Seru', 'Buku ini sangat menarik dibaca.', '120', '2025-01-12', NULL),
(2, 33, 11, 'Lagu Pop Favorit', 'Lagunya enak dan easy listening.', '210', '2025-02-05', NULL),
(3, 7, 22, 'Game FPS Baru', 'Gameplay cepat dan grafik bagus.', '340', '2025-11-20', NULL),
(4, 56, 31, 'Film Drama Menyentuh', 'Alur cerita sangat emosional.', '98', '2025-03-14', NULL),
(5, 44, 14, 'Rekomendasi Lagu Jazz', 'Musiknya lembut dan rileks.', '54', '2025-10-17', NULL),
(6, 18, 1, 'Buku Fiksi Petualangan', 'Sangat seru dari awal sampai akhir.', '77', '2025-01-27', NULL),
(7, 22, 23, 'Game RPG Paling Seru', 'Cerita dan karakter luar biasa.', '303', '2025-04-02', NULL),
(8, 48, 33, 'Film Komedi Kocak', 'Banyak adegan lucu.', '65', '2025-12-11', NULL),
(9, 5, 41, 'Buku Puisi Dalam', 'Bahasanya indah dan penuh makna.', '22', '2025-02-15', NULL),
(10, 67, 52, 'Lagu Orchestra Keren', 'Musiknya megah.', '190', '2025-03-05', NULL),
(11, 11, 61, 'Game Survival Baru', 'Sangat menantang.', '134', '2025-09-09', NULL),
(12, 39, 72, 'Film Anime Terbaik', 'Visualnya memukau.', '289', '2025-05-20', NULL),
(13, 21, 83, 'Buku Ilmiah Ringan', 'Penjelasan mudah dipahami.', '49', '2025-02-21', NULL),
(14, 76, 92, 'Lagu Funk Seru', 'Iramanya bikin joget.', '210', '2025-04-11', NULL),
(15, 8, 24, 'Game Strategy Seru', 'Bikin mikir keras.', '112', '2025-10-01', NULL),
(16, 9, 32, 'Film Horor Baru', 'Bikin merinding.', '405', '2025-03-30', NULL),
(17, 2, 12, 'Lagu Rock Mantap', 'Energinya luar biasa.', '145', '2025-01-08', NULL),
(18, 25, 3, 'Komik Baru Menarik', 'Sangat menghibur.', '74', '2025-12-03', NULL),
(19, 43, 28, 'Game Puzzle Santai', 'Cocok untuk mengisi waktu.', '88', '2025-05-01', NULL),
(20, 60, 75, 'Film Perang Realistis', 'Sinematografi top.', '330', '2025-11-27', NULL),
(21, 14, 6, 'Buku Motivasi Keren', 'Sangat memotivasi.', '120', '2025-01-20', NULL),
(22, 10, 16, 'Lagu Lofi Calm', 'Cocok untuk belajar.', '500', '2025-04-08', NULL),
(23, 28, 64, 'Game Racing Cepat', 'Mobilnya keren.', '175', '2025-12-22', NULL),
(24, 33, 73, 'Film Biografi Menginspirasi', 'Kisah nyata yang kuat.', '205', '2025-02-10', NULL),
(25, 54, 45, 'Buku Filsafat Sulit', 'Butuh fokus untuk paham.', '14', '2025-04-18', NULL),
(26, 59, 97, 'Lagu Disney Favorit', 'Liriknya bagus.', '301', '2025-11-15', NULL),
(27, 30, 66, 'Game Casual Seru', 'Cocok dimainkan kapan saja.', '66', '2025-05-04', NULL),
(28, 73, 34, 'Film Romance Menghibur', 'Ceritanya manis.', '154', '2025-03-21', NULL),
(29, 19, 82, 'Buku Pengembangan Diri', 'Banyak insight baru.', '87', '2025-05-12', NULL),
(30, 42, 57, 'Lagu Metal Keras', 'Energinya luar biasa.', '99', '2025-10-19', NULL),
(31, 6, 1, 'Novel Fiksi Populer', 'Sangat recommended.', '221', '2025-03-09', NULL),
(32, 24, 11, 'Playlist Pop Baru', 'Lagunya tenang-tenang.', '120', '2025-01-24', NULL),
(33, 15, 27, 'Pertarungan Game Fighting', 'Sangat intens.', '178', '2025-09-28', NULL),
(34, 70, 37, 'Film Sci-Fi Mantap', 'Dunia futuristik keren.', '350', '2025-02-27', NULL),
(35, 3, 81, 'Sastra Nusantara', 'Bahasanya indah.', '41', '2025-04-01', NULL),
(36, 45, 13, 'Jazz Malam Hari', 'Sangat relaxing.', '90', '2025-12-29', NULL),
(37, 50, 22, 'Game RPG Legendaris', 'Quest sangat banyak.', '410', '2025-03-17', NULL),
(38, 32, 55, 'Lagu Reggae Chill', 'Ritmenya enak.', '65', '2025-11-02', NULL),
(39, 62, 76, 'Film Superhero Seru', 'Action nonstop.', '298', '2025-01-18', NULL),
(40, 13, 43, 'Buku Ensiklopedia Lengkap', 'Informasinya banyak.', '12', '2025-05-22', NULL),
(41, 31, 14, 'Jazz Santai', 'Cocok untuk malam hari.', '56', '2025-01-15', NULL),
(42, 4, 23, 'Game RPG Baru', 'Cerita memukau.', '320', '2025-12-10', NULL),
(43, 20, 32, 'Film Horor Gelap', 'Ending mengejutkan.', '180', '2025-04-24', NULL),
(44, 63, 51, 'Lagu Classic Indah', 'Musik ajaib.', '295', '2025-12-05', NULL),
(45, 52, 71, 'Film Dokumenter Alam', 'Visual memukau.', '188', '2025-03-12', NULL),
(46, 26, 91, 'Lagu Blues Deep', 'Sangat soulful.', '120', '2025-02-04', NULL),
(47, 16, 61, 'Game Survival Sulit', 'Musuhnya brutal.', '330', '2025-05-15', NULL),
(48, 41, 36, 'Film Fantasi Magis', 'Dunia penuh sihir.', '207', '2025-01-11', NULL),
(49, 77, 84, 'Buku Finansial Modern', 'Wajib dibaca.', '76', '2025-03-01', NULL),
(50, 55, 18, 'Hiphop Baru', 'Beat-nya mantap.', '165', '2025-04-16', NULL),
(51, 12, 5, 'Review Film Misteri', 'Plot twist yang mengejutkan.', '145', '2025-02-10', 12),
(52, 38, 14, 'Lagu Pop Viral', 'Enak buat nemenin kerja.', '330', '2025-03-19', 38),
(53, 47, 23, 'Game Petualangan Seru', 'Dunia terbuka luas.', '270', '2025-01-27', 47),
(54, 66, 33, 'Film Fantasi Epik', 'Visualnya memukau.', '198', '2025-05-11', 66),
(55, 29, 41, 'Buku Sejarah Nusantara', 'Banyak fakta menarik.', '34', '2025-04-07', 29),
(56, 71, 52, 'Lagu Piano Lembut', 'Sangat menenangkan.', '140', '2025-09-12', 71),
(57, 18, 61, 'Game Sandbox Kreatif', 'Bikin bangunan sesuka hati.', '412', '2025-11-01', 18),
(58, 36, 72, 'Film Aksi Modern', 'Penuh adegan keren.', '205', '2025-03-04', 36),
(59, 57, 83, 'Buku Motivasi Pemula', 'Cocok untuk awal karier.', '67', '2025-10-29', 57),
(60, 64, 92, 'Lagu RnB Menawan', 'Vokalnya keren.', '189', '2025-12-14', 64),
(61, 30, 24, 'Game MOBA Seru', 'Pertandingan cepat.', '345', '2025-08-20', 30),
(62, 49, 32, 'Film Thriller Intens', 'Ngangenin dari awal.', '302', '2025-04-18', 49),
(63, 11, 12, 'Lagu Indie Baru', 'Suasananya santai.', '75', '2025-01-30', 11),
(64, 25, 3, 'Review Komik Petualangan', 'Ceritanya lucu.', '44', '2025-02-08', 25),
(65, 62, 28, 'Game Puzzle Rumit', 'Butuh strategi.', '210', '2025-03-16', 62),
(66, 20, 75, 'Film Perang Heroik', 'Emosional dan megah.', '256', '2025-11-22', 20),
(67, 45, 6, 'Buku Pengembangan Diri', 'Membantu berpikir maju.', '98', '2025-07-12', 45),
(68, 9, 16, 'Lofi Study Playlist', 'Cocok saat belajar.', '530', '2025-01-22', 9),
(69, 41, 64, 'Game Balapan Realistis', 'Mobil-mobil keren.', '177', '2025-06-09', 41),
(70, 14, 73, 'Film Biografi Tokoh', 'Benar-benar inspiratif.', '188', '2025-05-23', 14),
(71, 53, 45, 'Buku Filsafat Modern', 'Pembahasannya dalam.', '21', '2025-10-03', 53),
(72, 76, 97, 'Lagu Orkestra Epik', 'Sangat megah.', '248', '2025-12-17', 76),
(73, 34, 66, 'Game Casual Santai', 'Bikin ketagihan.', '84', '2025-03-08', 34),
(74, 16, 34, 'Film Romantis Hangat', 'Chemistry bagus.', '134', '2025-02-12', 16),
(75, 69, 82, 'Buku Inspiratif', 'Cocok buat motivasi.', '72', '2025-06-30', 69),
(76, 5, 57, 'Lagu Rock Powerful', 'Energinya kuat.', '199', '2025-09-28', 5),
(77, 27, 1, 'Novel Fiksi Baru', 'Plot bagus dan ringan.', '305', '2025-01-14', 27),
(78, 72, 11, 'Playlist Pop Fresh', 'Asik didengar.', '148', '2025-02-06', 72),
(79, 10, 27, 'Game Fighting Keren', 'Penuh aksi.', '214', '2025-05-15', 10),
(80, 39, 37, 'Film Sci-Fi Futuristik', 'Dunia canggih.', '367', '2025-03-29', 39),
(81, 68, 81, 'Kumpulan Cerita Rakyat', 'Sangat menarik.', '53', '2025-04-25', 68),
(82, 23, 13, 'Jazz Modern', 'Melodinya enak.', '96', '2025-07-18', 23),
(83, 40, 22, 'Game RPG Fantasy', 'Quest tak berujung.', '402', '2025-10-02', 40),
(84, 63, 55, 'Lagu Reggae Seru', 'Ritme tropis.', '74', '2025-01-05', 63),
(85, 37, 76, 'Film Superhero Baru', 'Action superb.', '280', '2025-11-11', 37),
(86, 22, 43, 'Buku Ensiklopedia Anak', 'Ilustrasi menarik.', '18', '2025-02-14', 22),
(87, 52, 14, 'Jazz Malam Cozy', 'Musiknya halus.', '57', '2025-04-20', 52),
(88, 33, 23, 'Game RPG Remastered', 'Grafis jauh lebih baik.', '389', '2025-12-20', 33),
(89, 44, 32, 'Film Horor Rumah Tua', 'Ngeri.', '143', '2025-10-07', 44),
(90, 56, 51, 'Lagu Klasik Barok', 'Penuh detail.', '112', '2025-03-05', 56),
(91, 73, 71, 'Film Dokumenter Laut', 'Indah dan informatif.', '164', '2025-05-27', 73),
(92, 48, 91, 'Lagu Blues Deep', 'Sangat soulful.', '119', '2025-01-19', 48),
(93, 28, 61, 'Game Survival Horror', 'Menegangkan.', '294', '2025-07-04', 28),
(94, 15, 36, 'Film Fantasi Kerajaan', 'Dunia magis.', '215', '2025-02-18', 15),
(95, 60, 84, 'Buku Ekonomi Baru', 'Penuh insight.', '39', '2025-06-19', 60),
(96, 74, 18, 'Hiphop Underground', 'Beat unik.', '189', '2025-04-11', 74),
(97, 21, 5, 'Review Buku Misteri', 'Ending tak terduga.', '117', '2025-11-30', 21),
(98, 50, 14, 'Lagu Pop Manis', 'Liriknya catchy.', '230', '2025-12-26', 50),
(99, 13, 23, 'Game RPG Nostalgia', 'Kenangan masa kecil.', '388', '2025-02-28', 13),
(100, 42, 33, 'Film Drama Modern', 'Adu emosi.', '276', '2025-03-13', 42);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int NOT NULL,
  `post_id` int NOT NULL,
  `sekolah_id` int NOT NULL,
  `jenis_rating` enum('sekolah','umum') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `post_id`, `sekolah_id`, `jenis_rating`) VALUES
(1, 34, 12, 'sekolah'),
(2, 7, 56, 'umum'),
(3, 89, 3, 'sekolah'),
(4, 15, 44, 'umum'),
(5, 63, 27, 'sekolah'),
(6, 22, 81, 'umum'),
(7, 51, 9, 'sekolah'),
(8, 99, 72, 'umum'),
(9, 40, 15, 'sekolah'),
(10, 13, 67, 'umum'),
(11, 76, 24, 'sekolah'),
(12, 58, 93, 'umum'),
(13, 4, 11, 'sekolah'),
(14, 92, 35, 'umum'),
(15, 10, 48, 'sekolah'),
(16, 47, 62, 'umum'),
(17, 84, 5, 'sekolah'),
(18, 53, 29, 'umum'),
(19, 1, 77, 'sekolah'),
(20, 66, 8, 'umum'),
(21, 31, 90, 'sekolah'),
(22, 74, 41, 'umum'),
(23, 9, 16, 'sekolah'),
(24, 25, 54, 'umum'),
(25, 97, 2, 'sekolah'),
(26, 38, 69, 'umum'),
(27, 20, 23, 'sekolah'),
(28, 82, 88, 'umum'),
(29, 44, 30, 'sekolah'),
(30, 56, 14, 'umum'),
(31, 14, 63, 'sekolah'),
(32, 62, 37, 'umum'),
(33, 33, 78, 'sekolah'),
(34, 95, 20, 'umum'),
(35, 11, 46, 'sekolah'),
(36, 59, 6, 'umum'),
(37, 73, 58, 'sekolah'),
(38, 19, 95, 'umum'),
(39, 87, 32, 'sekolah'),
(40, 5, 71, 'umum'),
(41, 36, 4, 'sekolah'),
(42, 81, 87, 'umum'),
(43, 17, 38, 'sekolah'),
(44, 49, 60, 'umum'),
(45, 93, 1, 'sekolah'),
(46, 26, 76, 'umum'),
(47, 69, 12, 'sekolah'),
(48, 2, 66, 'umum'),
(49, 55, 50, 'sekolah'),
(50, 98, 19, 'umum'),
(51, 6, 82, 'sekolah'),
(52, 71, 25, 'umum'),
(53, 68, 92, 'sekolah'),
(54, 32, 13, 'umum'),
(55, 21, 57, 'sekolah'),
(56, 94, 7, 'umum'),
(57, 30, 83, 'sekolah'),
(58, 83, 53, 'umum'),
(59, 46, 10, 'sekolah'),
(60, 8, 74, 'umum'),
(61, 41, 47, 'sekolah'),
(62, 75, 22, 'umum'),
(63, 12, 85, 'sekolah'),
(64, 64, 49, 'umum'),
(65, 28, 18, 'sekolah'),
(66, 100, 80, 'umum'),
(67, 3, 43, 'sekolah'),
(68, 79, 21, 'umum'),
(69, 24, 52, 'sekolah'),
(70, 52, 59, 'umum'),
(71, 18, 94, 'sekolah'),
(72, 91, 40, 'umum'),
(73, 16, 75, 'sekolah'),
(74, 29, 34, 'umum'),
(75, 80, 17, 'sekolah'),
(76, 39, 89, 'umum'),
(77, 23, 64, 'sekolah'),
(78, 72, 51, 'umum'),
(79, 50, 28, 'sekolah'),
(80, 60, 79, 'umum'),
(81, 37, 31, 'sekolah'),
(82, 96, 70, 'umum'),
(83, 43, 26, 'sekolah'),
(84, 86, 84, 'umum'),
(85, 48, 55, 'sekolah'),
(86, 78, 36, 'umum'),
(87, 35, 68, 'sekolah'),
(88, 61, 45, 'umum'),
(89, 88, 96, 'sekolah'),
(90, 27, 39, 'umum'),
(91, 45, 86, 'sekolah'),
(92, 70, 33, 'umum'),
(93, 67, 73, 'sekolah'),
(94, 42, 91, 'umum'),
(95, 65, 42, 'sekolah'),
(96, 57, 98, 'umum'),
(97, 90, 65, 'sekolah'),
(98, 85, 97, 'umum'),
(99, 54, 61, 'sekolah'),
(100, 77, 100, 'umum');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `sekolah_id` int NOT NULL,
  `nama_sekolah` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`sekolah_id`, `nama_sekolah`) VALUES
(1, 'SD Negeri Surabaya Timur 01 - Jawa Timur'),
(2, 'SD Negeri Surabaya Timur 02 - Jawa Timur'),
(3, 'SD Negeri Surabaya Timur 03 - Jawa Timur'),
(4, 'SD Negeri Gresik Kota 01 - Jawa Timur'),
(5, 'SD Negeri Gresik Kota 02 - Jawa Timur'),
(6, 'SD Negeri Sidoarjo Barat 01 - Jawa Timur'),
(7, 'SD Negeri Sidoarjo Barat 02 - Jawa Timur'),
(8, 'SD Negeri Mojokerto Kota 01 - Jawa Timur'),
(9, 'SD Negeri Mojokerto Kota 02 - Jawa Timur'),
(10, 'SD Negeri Kediri Utara 01 - Jawa Timur'),
(11, 'SMP Negeri Surabaya Barat 01 - Jawa Timur'),
(12, 'SMP Negeri Surabaya Barat 02 - Jawa Timur'),
(13, 'SMP Negeri Surabaya Barat 03 - Jawa Timur'),
(14, 'SMP Negeri Gresik Selatan 01 - Jawa Timur'),
(15, 'SMP Negeri Gresik Selatan 02 - Jawa Timur'),
(16, 'SMP Negeri Sidoarjo Kota 01 - Jawa Timur'),
(17, 'SMP Negeri Sidoarjo Kota 02 - Jawa Timur'),
(18, 'SMP Negeri Malang Kota 01 - Jawa Timur'),
(19, 'SMP Negeri Malang Kota 02 - Jawa Timur'),
(20, 'SMP Negeri Malang Kota 03 - Jawa Timur'),
(21, 'SMA Negeri Surabaya 01 - Jawa Timur'),
(22, 'SMA Negeri Surabaya 02 - Jawa Timur'),
(23, 'SMA Negeri Surabaya 03 - Jawa Timur'),
(24, 'SMA Negeri Sidoarjo 01 - Jawa Timur'),
(25, 'SMA Negeri Sidoarjo 02 - Jawa Timur'),
(26, 'SMA Negeri Gresik 01 - Jawa Timur'),
(27, 'SMA Negeri Gresik 02 - Jawa Timur'),
(28, 'SMA Negeri Malang 01 - Jawa Timur'),
(29, 'SMA Negeri Malang 02 - Jawa Timur'),
(30, 'SMA Negeri Malang 03 - Jawa Timur'),
(31, 'SMK Negeri Surabaya Teknik 01 - Jawa Timur'),
(32, 'SMK Negeri Surabaya Teknik 02 - Jawa Timur'),
(33, 'SMK Negeri Surabaya Bisnis 01 - Jawa Timur'),
(34, 'SMK Negeri Surabaya Bisnis 02 - Jawa Timur'),
(35, 'SMK Negeri Sidoarjo Teknik 01 - Jawa Timur'),
(36, 'SMK Negeri Sidoarjo Teknik 02 - Jawa Timur'),
(37, 'SMK Negeri Gresik Industri 01 - Jawa Timur'),
(38, 'SMK Negeri Gresik Industri 02 - Jawa Timur'),
(39, 'SMK Negeri Malang Multimedia 01 - Jawa Timur'),
(40, 'SMK Negeri Malang Multimedia 02 - Jawa Timur'),
(41, 'SD Negeri Pasuruan Kota 01 - Jawa Timur'),
(42, 'SD Negeri Pasuruan Kota 02 - Jawa Timur'),
(43, 'SD Negeri Jember Timur 01 - Jawa Timur'),
(44, 'SD Negeri Jember Timur 02 - Jawa Timur'),
(45, 'SD Negeri Banyuwangi Kota 01 - Jawa Timur'),
(46, 'SD Negeri Banyuwangi Kota 02 - Jawa Timur'),
(47, 'SD Negeri Madiun Kota 01 - Jawa Timur'),
(48, 'SD Negeri Madiun Kota 02 - Jawa Timur'),
(49, 'SD Negeri Blitar Utara 01 - Jawa Timur'),
(50, 'SD Negeri Blitar Utara 02 - Jawa Timur'),
(51, 'SMP Negeri Pasuruan Kota 01 - Jawa Timur'),
(52, 'SMP Negeri Pasuruan Kota 02 - Jawa Timur'),
(53, 'SMP Negeri Jember Timur 01 - Jawa Timur'),
(54, 'SMP Negeri Jember Timur 02 - Jawa Timur'),
(55, 'SMP Negeri Banyuwangi Kota 01 - Jawa Timur'),
(56, 'SMP Negeri Banyuwangi Kota 02 - Jawa Timur'),
(57, 'SMP Negeri Madiun Kota 01 - Jawa Timur'),
(58, 'SMP Negeri Madiun Kota 02 - Jawa Timur'),
(59, 'SMP Negeri Blitar Utara 01 - Jawa Timur'),
(60, 'SMP Negeri Blitar Utara 02 - Jawa Timur'),
(61, 'SMA Negeri Pasuruan 01 - Jawa Timur'),
(62, 'SMA Negeri Pasuruan 02 - Jawa Timur'),
(63, 'SMA Negeri Jember 01 - Jawa Timur'),
(64, 'SMA Negeri Jember 02 - Jawa Timur'),
(65, 'SMA Negeri Banyuwangi 01 - Jawa Timur'),
(66, 'SMA Negeri Banyuwangi 02 - Jawa Timur'),
(67, 'SMA Negeri Madiun 01 - Jawa Timur'),
(68, 'SMA Negeri Madiun 02 - Jawa Timur'),
(69, 'SMA Negeri Blitar 01 - Jawa Timur'),
(70, 'SMA Negeri Blitar 02 - Jawa Timur'),
(71, 'SMK Negeri Pasuruan Industri 01 - Jawa Timur'),
(72, 'SMK Negeri Pasuruan Industri 02 - Jawa Timur'),
(73, 'SMK Negeri Jember Teknologi 01 - Jawa Timur'),
(74, 'SMK Negeri Jember Teknologi 02 - Jawa Timur'),
(75, 'SMK Negeri Banyuwangi Teknik 01 - Jawa Timur'),
(76, 'SMK Negeri Banyuwangi Teknik 02 - Jawa Timur'),
(77, 'SMK Negeri Madiun Otomotif 01 - Jawa Timur'),
(78, 'SMK Negeri Madiun Otomotif 02 - Jawa Timur'),
(79, 'SMK Negeri Blitar Bisnis 01 - Jawa Timur'),
(80, 'SMK Negeri Blitar Bisnis 02 - Jawa Timur'),
(81, 'SD Negeri Tuban Utara 01 - Jawa Timur'),
(82, 'SD Negeri Tuban Utara 02 - Jawa Timur'),
(83, 'SMP Negeri Tuban Utara 01 - Jawa Timur'),
(84, 'SMP Negeri Tuban Utara 02 - Jawa Timur'),
(85, 'SMA Negeri Tuban 01 - Jawa Timur'),
(86, 'SMA Negeri Tuban 02 - Jawa Timur'),
(87, 'SMK Negeri Tuban Industri 01 - Jawa Timur'),
(88, 'SMK Negeri Tuban Industri 02 - Jawa Timur'),
(89, 'SD Negeri Lamongan Kota 01 - Jawa Timur'),
(90, 'SD Negeri Lamongan Kota 02 - Jawa Timur'),
(91, 'SMP Negeri Lamongan Kota 01 - Jawa Timur'),
(92, 'SMP Negeri Lamongan Kota 02 - Jawa Timur'),
(93, 'SMA Negeri Lamongan 01 - Jawa Timur'),
(94, 'SMA Negeri Lamongan 02 - Jawa Timur'),
(95, 'SMK Negeri Lamongan Teknik 01 - Jawa Timur'),
(96, 'SMK Negeri Lamongan Teknik 02 - Jawa Timur'),
(97, 'SD Negeri Probolinggo Kota 01 - Jawa Timur'),
(98, 'SMP Negeri Probolinggo Kota 01 - Jawa Timur'),
(99, 'SMA Negeri Probolinggo 01 - Jawa Timur'),
(100, 'SMK Negeri Probolinggo 01 - Jawa Timur');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `sekolah_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `email`, `password`, `role`, `sekolah_id`) VALUES
(1, 'Andi Pratama', 'andipratama@mail.com', 'andipratama123', 'user', 1),
(2, 'Budi Santoso', 'budisantoso@mail.com', 'budisantoso123', 'user', 2),
(3, 'Citra Lestari', 'citralestari@mail.com', 'citralestari123', 'user', 3),
(4, 'Dewi Anggraini', 'dewianggraini@mail.com', 'dewianggraini123', 'user', 4),
(5, 'Eko Saputra', 'ekosaputra@mail.com', 'ekosaputra123', 'user', 5),
(6, 'Fajar Ramadhan', 'fajarramadhan@mail.com', 'fajarramadhan123', 'user', 6),
(7, 'Gita Maharani', 'gitamaharani@mail.com', 'gitamaharani123', 'user', 7),
(8, 'Hadi Prakoso', 'hadiprakoso@mail.com', 'hadiprakoso123', 'user', 8),
(9, 'Indah Kusuma', 'indahkusuma@mail.com', 'indahkusuma123', 'user', 9),
(10, 'Joko Prabowo', 'jokoprabowo@mail.com', 'jokoprabowo123', 'user', 10),
(11, 'Kurnia Wibowo', 'kurniawibowo@mail.com', 'kurniawibowo123', 'user', 11),
(12, 'Lia Hartati', 'liahartati@mail.com', 'liahartati123', 'user', 12),
(13, 'Maya Sari', 'mayasari@mail.com', 'mayasari123', 'user', 13),
(14, 'Niko Akbar', 'nikoakbar@mail.com', 'nikoakbar123', 'user', 14),
(15, 'Oki Firmansyah', 'okifirmansyah@mail.com', 'okifirmansyah123', 'user', 15),
(16, 'Putri Amelia', 'putriamelia@mail.com', 'putriamelia123', 'user', 16),
(17, 'Qori Hanifah', 'qorihanifah@mail.com', 'qorihanifah123', 'user', 17),
(18, 'Raka Adrian', 'rakaadrian@mail.com', 'rakaadrian123', 'user', 18),
(19, 'Sinta Mutiara', 'sintamutiara@mail.com', 'sintamutiara123', 'user', 19),
(20, 'Tono Wijaya', 'tonowijaya@mail.com', 'tonowijaya123', 'user', 20),
(21, 'Umar Fahmi', 'umarfahmi@mail.com', 'umarfahmi123', 'user', 21),
(22, 'Vina Larasati', 'vinalarasati@mail.com', 'vinalarasati123', 'user', 22),
(23, 'Wahyu Fadillah', 'wahyufadillah@mail.com', 'wahyufadillah123', 'user', 23),
(24, 'Xenia Paramita', 'xeniaparamita@mail.com', 'xeniaparamita123', 'user', 24),
(25, 'Yusuf Hamdani', 'yusufhamdani@mail.com', 'yusufhamdani123', 'user', 25),
(26, 'Zahra Putri', 'zahraputri@mail.com', 'zahraputri123', 'user', 26),
(27, 'Aulia Rahmad', 'auliarahmad@mail.com', 'auliarahmad123', 'user', 27),
(28, 'Bagas Nugroho', 'bagasnugroho@mail.com', 'bagasnugroho123', 'user', 28),
(29, 'Cindy Oktavia', 'cindyoktavia@mail.com', 'cindyoktavia123', 'user', 29),
(30, 'Dimas Aditya', 'dimasaditya@mail.com', 'dimasaditya123', 'user', 30),
(31, 'Erlangga Setiawan', 'erlanggasetiawan@mail.com', 'erlanggasetiawan123', 'user', 31),
(32, 'Farah Najwa', 'farahnajwa@mail.com', 'farahnajwa123', 'user', 32),
(33, 'Gilang Saputra', 'gilangsaputra@mail.com', 'gilangsaputra123', 'user', 33),
(34, 'Hana Syafira', 'hanasyafira@mail.com', 'hanasyafira123', 'user', 34),
(35, 'Irwan Maulana', 'irwanmaulana@mail.com', 'irwanmaulana123', 'user', 35),
(36, 'Jihan Lestari', 'jihanlestari@mail.com', 'jihanlestari123', 'user', 36),
(37, 'Kevin Mahendra', 'kevinmahendra@mail.com', 'kevinmahendra123', 'user', 37),
(38, 'Lutfi Hidayat', 'lutfihidayat@mail.com', 'lutfihidayat123', 'user', 38),
(39, 'Mega Ayuning', 'megaayuning@mail.com', 'megaayuning123', 'user', 39),
(40, 'Nurul Safitri', 'nurulsafitri@mail.com', 'nurulsafitri123', 'user', 40),
(41, 'Oscar Pranata', 'oscarpranata@mail.com', 'oscarpranata123', 'user', 41),
(42, 'Prima Astuti', 'primaastuti@mail.com', 'primaastuti123', 'user', 42),
(43, 'Qomarudin Fahri', 'qomarudinfahri@mail.com', 'qomarudinfahri123', 'user', 43),
(44, 'Ratna Sari', 'ratnasari@mail.com', 'ratnasari123', 'user', 44),
(45, 'Satria Alam', 'satriaalam@mail.com', 'satriaalam123', 'user', 45),
(46, 'Tasya Nuraini', 'tasyanuraini@mail.com', 'tasyanuraini123', 'user', 46),
(47, 'Ulfa Indriani', 'ulfaindriani@mail.com', 'ulfaindriani123', 'user', 47),
(48, 'Valdo Saputra', 'valdosaputra@mail.com', 'valdosaputra123', 'user', 48),
(49, 'Winda Ayu', 'windaayu@mail.com', 'windaayu123', 'user', 49),
(50, 'Yudi Prakoso', 'yudiprakoso@mail.com', 'yudiprakoso123', 'user', 50),
(51, 'Zidan Arif', 'zidanarif@mail.com', 'zidanarif123', 'user', 51),
(52, 'Alya Rosalia', 'alyarosalia@mail.com', 'alyarosalia123', 'user', 52),
(53, 'Bimo Harsya', 'bimoharsya@mail.com', 'bimoharsya123', 'user', 53),
(54, 'Clarissa Putri', 'clarissaputri@mail.com', 'clarissaputri123', 'user', 54),
(55, 'Davin Oktarizki', 'davinoftarizki@mail.com', 'davinoftarizki123', 'user', 55),
(56, 'Evelyn Maharani', 'evelynmaharani@mail.com', 'evelynmaharani123', 'user', 56),
(57, 'Fauzan Ridho', 'fauzanridho@mail.com', 'fauzanridho123', 'user', 57),
(58, 'Gia Amanda', 'giaamanda@mail.com', 'giaamanda123', 'user', 58),
(59, 'Hakim Perdana', 'hakimperdana@mail.com', 'hakimperdana123', 'user', 59),
(60, 'Intan Widya', 'intanwidya@mail.com', 'intanwidya123', 'user', 60),
(61, 'Jordan Firmansyah', 'jordanfirmansyah@mail.com', 'jordanfirmansyah123', 'user', 61),
(62, 'Karina Melati', 'karinamelati@mail.com', 'karinamelati123', 'user', 62),
(63, 'Leonard Aditya', 'leonardaditya@mail.com', 'leonardaditya123', 'user', 63),
(64, 'Mira Prameswari', 'miraprameswari@mail.com', 'miraprameswari123', 'user', 64),
(65, 'Naufal Rizky', 'naufalrizky@mail.com', 'naufalrizky123', 'user', 65),
(66, 'Olin Maharani', 'olinmaharani@mail.com', 'olinmaharani123', 'user', 66),
(67, 'Pratama Hadi', 'pratamahadi@mail.com', 'pratamahadi123', 'user', 67),
(68, 'Qaisya Amelia', 'qaisyaamelia@mail.com', 'qaisyaamelia123', 'user', 68),
(69, 'Rendi Kurniawan', 'rendikurniawan@mail.com', 'rendikurniawan123', 'user', 69),
(70, 'Salsa Nadira', 'salsanadira@mail.com', 'salsanadira123', 'user', 70),
(71, 'Teguh Prasetyo', 'teguhprasetyo@mail.com', 'teguhprasetyo123', 'user', 71),
(72, 'Uli Rahmawati', 'ulirahmawati@mail.com', 'ulirahmawati123', 'user', 72),
(73, 'Vandi Pratama', 'vandipratama@mail.com', 'vandipratama123', 'user', 73),
(74, 'Wahyu Armanda', 'wahyuarmanda@mail.com', 'wahyuarmanda123', 'user', 74),
(75, 'Xavier Reinaldo', 'xavierreinaldo@mail.com', 'xavierreinaldo123', 'user', 75),
(76, 'Yulian Safutra', 'yuliansafutra@mail.com', 'yuliansafutra123', 'user', 76),
(77, 'Zahira Rahmadani', 'zahirarahmadani@mail.com', 'zahirarahmadani123', 'user', 77),
(78, 'Adit Permana', 'aditpermana@mail.com', 'aditpermana123', 'user', 78),
(79, 'Bella Maharani', 'bellamaharani@mail.com', 'bellamaharani123', 'user', 79),
(80, 'Cahyo Prasetyo', 'cahyoprasetyo@mail.com', 'cahyoprasetyo123', 'user', 80),
(81, 'Diva Aurel', 'divaaurel@mail.com', 'divaaurel123', 'user', 81),
(82, 'Elang Gumilang', 'elanggumilang@mail.com', 'elanggumilang123', 'user', 82),
(83, 'Fani Safitri', 'fanisafitri@mail.com', 'fanisafitri123', 'user', 83),
(84, 'Gibran Wijaya', 'gibranwijaya@mail.com', 'gibranwijaya123', 'user', 84),
(85, 'Hesty Permata', 'hestypermata@mail.com', 'hestypermata123', 'user', 85),
(86, 'Ilham Prakoso', 'ilhamprakoso@mail.com', 'ilhamprakoso123', 'user', 86),
(87, 'Jelita Ardhana', 'jelitaardhana@mail.com', 'jelitaardhana123', 'user', 87),
(88, 'Kelvin Andhara', 'kelvinandhara@mail.com', 'kelvinandhara123', 'user', 88),
(89, 'Laras Mutia', 'larasmutia@mail.com', 'larasmutia123', 'user', 89),
(90, 'Miko Aryanto', 'mikoaryanto@mail.com', 'mikoaryanto123', 'user', 90),
(91, 'Nadia Putri', 'nadiaputri@mail.com', 'nadiaputri123', 'user', 91),
(92, 'Omar Raditya', 'omarraditya@mail.com', 'omarraditya123', 'user', 92),
(93, 'Pertiwi Laras', 'pertiwilaras@mail.com', 'pertiwilaras123', 'user', 93),
(94, 'Qiana Rahma', 'qianarahma@mail.com', 'qianarahma123', 'user', 94),
(95, 'Rafif Rahmadan', 'rafifrahmadan@mail.com', 'rafifrahmadan123', 'user', 95),
(96, 'Selvi Nuraini', 'selvinuraini@mail.com', 'selvinuraini123', 'user', 96),
(97, 'Tomi Suryana', 'tomisuryana@mail.com', 'tomisuryana123', 'user', 97),
(98, 'Umar Satria', 'umarsatria@mail.com', 'umarsatria123', 'user', 98),
(99, 'Vira Anggun', 'viraanggun@mail.com', 'viraanggun123', 'user', 99),
(100, 'Wisnu Prayoga', 'wisnuprayoga@mail.com', 'wisnuprayoga123', 'user', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentar_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `like_komentar`
--
ALTER TABLE `like_komentar`
  ADD PRIMARY KEY (`likekomentar_id`),
  ADD KEY `komentar_id` (`komentar_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `like_post`
--
ALTER TABLE `like_post`
  ADD PRIMARY KEY (`likepost_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk_post_user` (`user_id`),
  ADD KEY `fk_post_kategori` (`kategori_id`),
  ADD KEY `fk_post_deleted` (`deleted_by`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `sekolah_id` (`sekolah_id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`sekolah_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_user_sekolah` (`sekolah_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentar_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `like_komentar`
--
ALTER TABLE `like_komentar`
  MODIFY `likekomentar_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `like_post`
--
ALTER TABLE `like_post`
  MODIFY `likepost_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `sekolah_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `komentar_ibfk_3` FOREIGN KEY (`deleted_by`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `like_komentar`
--
ALTER TABLE `like_komentar`
  ADD CONSTRAINT `like_komentar_ibfk_1` FOREIGN KEY (`komentar_id`) REFERENCES `komentar` (`komentar_id`),
  ADD CONSTRAINT `like_komentar_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `like_post`
--
ALTER TABLE `like_post`
  ADD CONSTRAINT `like_post_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `like_post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_deleted` FOREIGN KEY (`deleted_by`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `fk_post_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`),
  ADD CONSTRAINT `fk_post_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`sekolah_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_sekolah` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`sekolah_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
