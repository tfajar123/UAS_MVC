-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2023 pada 06.39
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efgnews`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `user_id`, `title`, `image`, `body`, `created_at`) VALUES
(1, 7, 'Putin Tegaskan Rusia Siap Menghadapi NATO Kapan Saja', '995b4544-ec1d-4c1b-8eab-1781cbb39cb8.jpg', 'Presiden Vladimir Putin menegaskan Rusia siap untuk berperang melawan negara-negara anggota Pakta Pertahanan Atlantik Utara (NATO) kapan saja. \r\n\r\nDilansir Russia Today, Putin mulanya mengatakan bahwa tak ada yang mau berkonfrontasi dengan siapa pun, baik itu Rusia maupun Amerika Serikat selaku pemimpin blok NATO. Putin menyebut saat ini garis batas pencegahan konflik antara AS dan Rusia masih bekerja sehingga tak ada pihak yang tertarik untuk bersinggungan. \r\n\r\nKendati begitu, &#34;Jika seseorang menginginkan [perang], dan tentunya bukan kami, maka kami siap [berperang].&#34;\r\n\r\nPernyataan Putin ini sendiri menjawab pertanyaan jurnalis mengenai tabrakan baru-baru ini yang melibatkan jet Rusia dan AS hingga sikapnya jika ada kemungkinan perang lawan NATO.', '2023-07-30 14:12:55'),
(4, 7, 'Diduga Menghina Jokowi, Apa Isi Pernyataan Rocky Gerung?', NULL, 'Akademisi Rocky Gerung dilaporkan ke Polda Metro Jaya setelah dianggap melakukan penghinaan terhadap Presiden Joko Widodo (Jokowi). Pelapornya adalah kelompok relawan pendukung Jokowi.\r\n\r\nSebelumnya, relawan Jokowi sempat melaporkan Rocky Gerung ke Bareskrim Polri pada Senin (31/7), namun ditolak dan laporan itu menjadi pengaduan masyarakat (dumas). Saat itu pelapor adalah Ketua Barikade 98, Benny Rhamdani.\r\n\r\nDi hari yang sama, laporan serupa diajukan relawan Jokowi ke Polda Metro Jaya dengan mengatasnamakan Relawan Indonesia Bersatu. Laporan itu diterima Polda Metro dan teregister dengan nomor LP/B/4459/VII/2023/SPKT POLDA METRO JAYA tanggal 31 Juli 2023.', '2023-08-01 11:32:59'),
(5, 7, 'Menkominfo Buka Suara Soal Kasus IMEI Bodong Dibongkar Polri', NULL, 'Menteri Komunikasi dan Informatika (Menkominfo) Budi Arie Setiadi merespons terbongkarnya kasus mafia IMEI ilegal akhir pekan lalu. Dari pengungkapan kasus itu, sekitar 191 ribu Hp yang menggunakan IMEI bodong di Indonesia bakal dimatikan alias shutdown.\r\nBudi mengaku pihaknya mendukung langkah kepolisian dalam menangani masalah ini. Menurut dia ini bagian dari upaya penerbitan registrasi IMEI.\r\n\r\n&#34;Saat ini, Kepolisian Republik Indonesia telah melakukan langkah hukum terkait pelanggaran yang terjadi dalam pendaftaran registrasi IMEI, Kemkominfo mendukung langkah yang diambil aparat hukum dalam rangka menertibkan registrasi IMEI di Indonesia sesuai pembagian tugas pokok dan fungsi (tupoksi) yang ada,&#34; kata Budi saat dihubungi CNNIndonesia.com, Selasa (1/8).\r\n\r\nBudi menjelaskan pengaturan registrasi IMEI diinisiasi oleh Kementerian Perindustrian (Kemenperin) dalam rangka melindungi industri perangkat HKT (Handphone, Komputer genggam, dan Tablet) dalam negeri yang terdisrupsi akibat maraknya impor perangkat HKT illegal.', '2023-08-01 11:38:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`) VALUES
(11, 7, 'Pendidikan Informal: Kebutuhan atau Keharusan?', 'Pendidikan informal mampu mendorong pembelajaran sepanjang hayat. Mari kita mengakui, mendukung, dan memperkuat pendidikan informal sebagai bagian integral dari sistem pendidikan yang komprehensif.', '2023-08-01 10:59:32'),
(12, 7, 'Koridor Sempit Menjadi Negara Maju', 'Peluang menjadi negara maju tetap tersedia meski koridornya amat kecil. Presiden mendatang perlu fokus pada aspek kelembagaan dan sumber daya manusia dalam mendukung produktivitas nasional, khususnya sektor manufaktur.', '2023-08-01 11:00:08'),
(13, 7, 'Sukarelawan', 'Sebagian orang yang disebut sukarelawan lebih sering menunjukkan kemarahan. Malah ada yang melakukan sesuatu karena mengharapkan imbalan. Rada aneh mengingat sukarelawan mestinya dilakukan dengan ”suka” dan ”rela”.', '2023-08-01 11:00:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `admin`, `name`, `email`, `password`, `created_at`) VALUES
(7, 1, 'root', 'root@user.com', '$2y$10$1BLar7D1YBnD5/h6lIp4LeP2HKgtk5FC1B6XUruHgI/EzZ99TlUo6', '2023-07-29 08:11:11'),
(8, 1, 'root2', 'root2@user.com', '$2y$10$1633r.uAeLDmhs/t2TySxeNCHkP5ZiDlB9jK7RBCGX9sKgs9RfMWO', '2023-07-29 12:48:49'),
(9, 0, 'user', 'user@user.com', '$2y$10$HyicEOOfBlWTn0YMtUfrAe3g/oO9NWXDdAS/jttpsFoFVv/xbQBP.', '2023-07-29 18:42:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
