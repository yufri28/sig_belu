-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jan 2025 pada 10.09
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sig_belu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pengelola') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `role`) VALUES
(1, 'supportadmin', '$2y$10$voGdw.DJxupTF4cOjGSHEuw6X4GpDiJTTL2XqrB27P2ART0j2df7W', 'admin'),
(3, 'claret', '$2y$10$RlgdPegHtsX86iYLbu9g3usq2ia/QA5PM/tpjgKQzs7G.0aakTwq.', 'pengelola');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT 'info@default.com',
  `telepon` varchar(20) DEFAULT '0000000000',
  `alamat` text DEFAULT 'Alamat belum tersedia.',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contact_info`
--

INSERT INTO `contact_info` (`id`, `email`, `telepon`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'parawisatabelum@gmail.com', '08193021499', 'Atambua', '2025-01-01 21:54:54', '2025-01-01 21:59:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_wisata`
--

CREATE TABLE `fasilitas_wisata` (
  `id_fasilitas_wisata` int(11) NOT NULL,
  `f_id_wisata` int(11) NOT NULL,
  `nama_fasilitas` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas_wisata`
--

INSERT INTO `fasilitas_wisata` (`id_fasilitas_wisata`, `f_id_wisata`, `nama_fasilitas`, `foto`, `latitude`, `longitude`, `keterangan`, `tarif`) VALUES
(2, 4, 'Lopo', '1735350280859.jpg', '-9.121176481055533', '125.08165444644898', 'Lopo disewakan', 25000),
(3, 8, 'Lopo', '1735888569747.jpg', '-9.865149346683376', '124.41281113776452', '-', 2400);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(3, 'Pantai'),
(4, 'Gunung'),
(5, 'Padang'),
(6, 'Kampung Adat'),
(7, 'Kolam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(3, 'Kota Atambua'),
(4, 'Atambua Selatan'),
(5, 'Bikomi Ninulat'),
(6, 'Kakuluk Mesak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id` int(11) NOT NULL,
  `Januari` int(11) NOT NULL DEFAULT 0,
  `Februari` int(11) NOT NULL DEFAULT 0,
  `Maret` int(11) NOT NULL DEFAULT 0,
  `April` int(11) NOT NULL DEFAULT 0,
  `Mei` int(11) NOT NULL DEFAULT 0,
  `Juni` int(11) NOT NULL DEFAULT 0,
  `Juli` int(11) NOT NULL DEFAULT 0,
  `Agustus` int(11) NOT NULL DEFAULT 0,
  `September` int(11) NOT NULL DEFAULT 0,
  `Oktober` int(11) NOT NULL DEFAULT 0,
  `November` int(11) NOT NULL DEFAULT 0,
  `Desember` int(11) NOT NULL DEFAULT 0,
  `tahun` year(4) NOT NULL,
  `f_id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`id`, `Januari`, `Februari`, `Maret`, `April`, `Mei`, `Juni`, `Juli`, `Agustus`, `September`, `Oktober`, `November`, `Desember`, `tahun`, `f_id_wisata`) VALUES
(1, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2025, 5),
(2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2025, 4),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0000, 6),
(5, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0000, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `komentar` longtext NOT NULL,
  `f_id_wisata` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ulasan_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `email`, `komentar`, `f_id_wisata`, `created_at`, `ulasan_id`) VALUES
(2, 'lysell@gmail.com', 'dasdasdas', 4, '2024-12-27 21:20:23', 0),
(4, 'lysell@gmail.com', 'dasdasdasdas', 4, '2024-12-27 21:23:07', 2),
(5, 'lysell@gmail.com', 'asdasas', 4, '2024-12-27 21:23:41', 0),
(6, 'yufriluttu567@gmail.com', 'gsdfsdfsfsdfs', 4, '2024-12-27 21:34:55', 5),
(7, 'abc@gmail.com', 'dasdasdsa', 4, '2024-12-27 21:36:52', 2),
(8, 'vickycostaa007@gmail.com', 'sadasdasdas', 4, '2024-12-27 21:36:58', 2),
(9, 'lysell@gmail.com', 'dasdas', 4, '2024-12-27 21:37:28', 0),
(10, 'yufriluttu567@gmail.com', 'dasdas', 4, '2024-12-27 21:37:36', 0),
(11, 'chrismaupi@gmail.com', 'dfsdfsdsfdfsd', 4, '2024-12-27 21:39:35', 9),
(12, 'abc@gmail.com', 'dassa', 4, '2024-12-27 21:49:06', 10),
(13, 'desanbr@gmail.com', 'dsaddas', 4, '2024-12-27 21:50:10', 10),
(14, 'lysell@gmail.com', 'Bagus sekaliii', 5, '2024-12-27 21:57:20', 0),
(15, 'dinasparawisata@gmail.com', 'Terima Kasih atas kunjungannya', 5, '2024-12-27 22:01:08', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `geojson` longtext NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `f_id_pengelola` int(11) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `jam_kunjung` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `f_id_kecamatan` int(11) NOT NULL,
  `f_id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`, `latitude`, `longitude`, `geojson`, `foto`, `deskripsi`, `f_id_pengelola`, `kontak`, `jam_kunjung`, `jam_tutup`, `f_id_kecamatan`, `f_id_kategori`) VALUES
(4, 'Fulan Fehan', '-9.121058987565918', '125.08159106665526', '[ 125.074405667288801, -9.118083030475955, 0.0 ], [ 125.073382934749205, -9.119682422912993, 0.0 ], [ 125.072512571528307, -9.121829679364955, 0.0 ], [ 125.074056194292694, -9.123997192673624, 0.0 ], [ 125.075910235189198, -9.124884970384203, 0.0 ], [ 125.078653223075193, -9.125568456865226, 0.0 ], [ 125.080737800728002, -9.12624841910467, 0.0 ], [ 125.083080169783898, -9.126921402941708, 0.0 ], [ 125.084717765588906, -9.125304064428416, 0.0 ], [ 125.085906100624399, -9.124840230118494, 0.0 ], [ 125.085805013433401, -9.121296202649861, 0.0 ], [ 125.086934874204005, -9.11857445687926, 0.0 ], [ 125.087319410452196, -9.116365381194829, 0.0 ], [ 125.085874134450904, -9.114433370460773, 0.0 ], [ 125.082549304999205, -9.11365982265499, 0.0 ], [ 125.080398664575497, -9.113348702028196, 0.0 ], [ 125.079903736613304, -9.113799049049904, 0.0 ], [ 125.078504593968503, -9.112699302179154, 0.0 ], [ 125.076094425764495, -9.115334690871965, 0.0 ], [ 125.074405667288801, -9.118083030475955, 0.0 ]', '1735347068428.jpg', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Minima enim harum fugiat, commodi unde non sit eligendi consectetur, vel exercitationem veniam debitis id atque impedit, adipisci sed provident ut tempora laboriosam ullam. Laborum laboriosam minima dicta neque, ad deleniti voluptatem ut excepturi, nemo quia voluptas magnam? Commodi reprehenderit voluptates tenetur dolor rerum culpa, nisi consequatur fugiat, quos totam at aliquam provident numquam nesciunt perferendis voluptatum neque. Minus accusamus tempora deserunt doloribus vel aliquam, quos id error quas eligendi animi repudiandae quasi rem accusantium? Repellendus cum reprehenderit laboriosam corporis sequi atque ratione voluptate quam est incidunt dolorum libero ex veniam inventore voluptas a maiores, quasi laborum id neque commodi modi. Harum eaque veniam repellat ex, totam non placeat quae fuga quam excepturi deserunt. Quis incidunt odit saepe nisi necessitatibus. Voluptates doloribus officiis in. Tenetur sapiente ratione alias nulla quod, quam nam cumque ad enim dolore obcaecati aspernatur ut reprehenderit. Doloremque asperiores qui tempora, vero a eos libero perspiciatis dolore, hic architecto commodi nostrum in soluta aliquid modi delectus explicabo accusamus consectetur amet repellat debitis doloribus excepturi. Tenetur sequi reprehenderit porro temporibus veritatis dolor perferendis aliquid! Sit sapiente eius ipsam illum magnam, vero ab iste iusto beatae excepturi ea, magni qui amet dolores suscipit adipisci cum. Dignissimos reiciendis provident, a vero possimus totam magnam quo nesciunt culpa mollitia esse. Aspernatur expedita accusamus nostrum quae quidem eveniet, soluta nesciunt nam. Quod rerum saepe autem, nisi illum a dolorem sit tempora. Ratione quam necessitatibus quaerat eaque accusantium, dolores, consequuntur sapiente unde illo neque sit suscipit nemo quisquam corrupti, sunt aliquid amet consectetur? Eligendi praesentium nam enim vitae pariatur blanditiis, nobis odit mollitia vel tenetur ex? Vitae, nostrum delectus tempore deleniti dolorem sunt quisquam quod pariatur officia perspiciatis optio maxime magni porro voluptatum reiciendis, nisi ea aperiam corrupti odit tempora recusandae voluptate sit nobis unde?', 1, '08109290033', '08:49:00', '20:49:00', 4, 5),
(5, 'Kampung Adat Ninulat', '-9.498330232149705', '124.3295794711795', '[ 125.139235275091906, -9.119278208539981, 0.0 ], [ 125.138101868594205, -9.119242125012917, 0.0 ], [ 125.137697113536007, -9.119784366469498, 0.0 ], [ 125.138256905958698, -9.120608932070487, 0.0 ], [ 125.139478603489806, -9.120735840918659, 0.0 ], [ 125.139827749710093, -9.120059162889556, 0.0 ], [ 125.139235275091906, -9.119278208539981, 0.0 ]', '1735361787452.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure provident quas iste, facilis corporis aperiam! Itaque deleniti in unde! Harum, blanditiis facere reiciendis perspiciatis illum, ipsam quidem recusandae dicta, ducimus laboriosam neque rerum laudantium ea. Itaque, nulla quis autem exercitationem minima natus dignissimos. Ducimus eum dicta quo velit rerum sequi corrupti voluptates quam blanditiis repellendus dolorum tenetur maiores, ea at distinctio animi, sit dolore unde incidunt? Consequuntur alias mollitia accusamus. Eius, aliquam reprehenderit nisi ratione beatae molestias quidem atque quasi nesciunt, possimus rerum, quibusdam aut commodi eum sunt nam culpa? Quibusdam repudiandae debitis quae facilis nihil praesentium maxime commodi, consequatur excepturi, obcaecati, pariatur natus quod fugit rem qui? Ratione quam ad dignissimos ea deserunt doloremque minima vel perferendis ipsum nam! Blanditiis error possimus laboriosam iusto in voluptatibus! Nobis magni nisi dolorum porro facere tempora architecto aliquid animi perspiciatis distinctio dolorem molestias eius esse culpa, atque, modi reprehenderit impedit rem soluta laudantium. Placeat ad magnam impedit aspernatur, cupiditate eius eligendi officiis enim. Vitae aut harum iste, aliquam dicta autem rem illo at praesentium id minima voluptate mollitia exercitationem, adipisci et atque perferendis! Dolor earum possimus doloremque deleniti similique qui incidunt? Ex assumenda molestias doloremque laudantium sed labore, porro quas illum dolorem eos ipsum veritatis tempore voluptatibus quia temporibus magni tempora quam nisi perferendis numquam beatae. Voluptatibus at culpa nesciunt iure, hic eaque in doloremque, maxime porro soluta corporis aliquid quisquam. Soluta, quis. Labore accusamus animi, ea, similique cupiditate dolor eius quisquam veniam consectetur ad delectus! Deserunt eum rerum nobis veniam cum asperiores perferendis cumque id cupiditate nostrum odio tenetur recusandae debitis sint libero facilis hic tempora, dolores nihil. Reiciendis possimus iure dolorum, dignissimos hic ullam id quia similique totam maxime aliquid at nulla inventore illum neque officiis provident tenetur non dolores itaque nesciunt natus recusandae optio quam. Beatae officia, odio voluptatibus facilis vel ullam soluta.', 1, '09499003002', '07:00:00', '20:00:00', 5, 6),
(6, 'Kolam Susuk', '-9.010996881497174', '124.83140367099396', '[ 124.833783500991899, -9.010805970224276, 0.0 ], [ 124.832352777637595, -9.009006803014964, 0.0 ], [ 124.830976030261297, -9.009589706274507, 0.0 ], [ 124.830554785624898, -9.010430589651307, 0.0 ], [ 124.829196338467, -9.011399101682608, 0.0 ], [ 124.828755709711203, -9.012408688509591, 0.0 ], [ 124.829321321171605, -9.013217406566113, 0.0 ], [ 124.831824376429793, -9.012134312594695, 0.0 ], [ 124.832569679128198, -9.012400645789974, 0.0 ], [ 124.833783500991899, -9.010805970224276, 0.0 ]', '1735880836771.jpg', '-', 1, '0819388923', '08:00:00', '08:00:00', 6, 7),
(8, 'Bendungan Rotiklot', '-9.066853580037462', '124.83640592346428', '[ 124.846385878790898, -9.073462770664772, 0.0 ], [ 124.845682745216095, -9.073196633165367, 0.0 ], [ 124.8453017863295, -9.073707091906405, 0.0 ], [ 124.844841787922803, -9.074312862992562, 0.0 ], [ 124.845412616155897, -9.074131035012298, 0.0 ], [ 124.845960802410303, -9.074129510845896, 0.0 ], [ 124.846317151562403, -9.07398381931408, 0.0 ], [ 124.846914877800899, -9.073851631279036, 0.0 ], [ 124.846385878790898, -9.073462770664772, 0.0 ]', '1735887388763.jpg', '-', 3, '08399400022', '14:55:00', '02:55:00', 6, 7);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas_wisata`
--
ALTER TABLE `fasilitas_wisata`
  ADD PRIMARY KEY (`id_fasilitas_wisata`),
  ADD KEY `f_id_wisata` (`f_id_wisata`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_id_wisata` (`f_id_wisata`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `f_id_wisata` (`f_id_wisata`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `f_id_kecamatan` (`f_id_kecamatan`),
  ADD KEY `f_id_kategori` (`f_id_kategori`),
  ADD KEY `f_id_pengelola` (`f_id_pengelola`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_wisata`
--
ALTER TABLE `fasilitas_wisata`
  MODIFY `id_fasilitas_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `fasilitas_wisata`
--
ALTER TABLE `fasilitas_wisata`
  ADD CONSTRAINT `fasilitas_wisata_ibfk_1` FOREIGN KEY (`f_id_wisata`) REFERENCES `wisata` (`id_wisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `kunjungan_ibfk_1` FOREIGN KEY (`f_id_wisata`) REFERENCES `wisata` (`id_wisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`f_id_wisata`) REFERENCES `wisata` (`id_wisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD CONSTRAINT `wisata_ibfk_1` FOREIGN KEY (`f_id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wisata_ibfk_2` FOREIGN KEY (`f_id_pengelola`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wisata_ibfk_3` FOREIGN KEY (`f_id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
