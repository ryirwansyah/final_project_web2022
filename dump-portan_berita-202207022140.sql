/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : freelance-portal_berita

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 04/07/2022 01:48:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipe` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `aktif` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0' COMMENT 'Keterangan \r\n1 = \'aktif atau ditampilkan\'\r\n0 = \'tidak ditampilkan\'',
  `dibuat_pada` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `diubah_pada` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `dihapus_pada` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Berita', 'berita', 'Kategori untuk berita', 'informasi', '1', '2022-07-03 23:29:49', '2022-07-03 23:29:49', NULL);
INSERT INTO `kategori` VALUES (8, 'Pengumuman', 'pengumuman', 'Artikel pengumuman untuk siswa', 'informasi', '1', '2022-07-03 23:25:26', '2022-07-03 23:25:26', NULL);
INSERT INTO `kategori` VALUES (11, 'Artikel Ilmiah', 'artikel-ilmiah', 'Artikel pembelajaran test ssss', 'informasi', '1', '2022-07-03 23:29:55', '2022-07-03 23:29:55', NULL);
INSERT INTO `kategori` VALUES (12, 'loem ipsum', 'loem-ipsum', 'fdsfdsfsdfsd', NULL, '0', '2022-06-30 11:23:50', '2022-06-30 11:23:50', '2022-06-30 06:23:50');
INSERT INTO `kategori` VALUES (13, 'Pendaftaran Alumni', 'pendaftaran-alumni', 'ggfg', 'informasi', '1', '2022-06-30 11:23:43', '2022-06-30 11:23:43', '2022-06-30 06:23:43');
INSERT INTO `kategori` VALUES (14, 'fdsfsdf', 'fdsfsdf', 'dsfdsfds', 'informasi', '1', '2022-06-30 11:22:41', '2022-06-30 11:22:41', '2022-06-30 06:22:41');

-- ----------------------------
-- Table structure for kategori_posting
-- ----------------------------
DROP TABLE IF EXISTS `kategori_posting`;
CREATE TABLE `kategori_posting`  (
  `kategori_id` bigint(20) NOT NULL,
  `posting_id` bigint(20) NOT NULL,
  PRIMARY KEY (`kategori_id`, `posting_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kategori_posting
-- ----------------------------
INSERT INTO `kategori_posting` VALUES (1, 2);
INSERT INTO `kategori_posting` VALUES (1, 3);
INSERT INTO `kategori_posting` VALUES (1, 5);
INSERT INTO `kategori_posting` VALUES (1, 9);
INSERT INTO `kategori_posting` VALUES (1, 15);
INSERT INTO `kategori_posting` VALUES (1, 20);
INSERT INTO `kategori_posting` VALUES (2, 1);
INSERT INTO `kategori_posting` VALUES (2, 6);
INSERT INTO `kategori_posting` VALUES (2, 7);
INSERT INTO `kategori_posting` VALUES (2, 10);
INSERT INTO `kategori_posting` VALUES (2, 13);
INSERT INTO `kategori_posting` VALUES (8, 8);
INSERT INTO `kategori_posting` VALUES (8, 11);
INSERT INTO `kategori_posting` VALUES (8, 19);
INSERT INTO `kategori_posting` VALUES (11, 4);
INSERT INTO `kategori_posting` VALUES (11, 12);
INSERT INTO `kategori_posting` VALUES (11, 16);
INSERT INTO `kategori_posting` VALUES (11, 17);
INSERT INTO `kategori_posting` VALUES (11, 18);

-- ----------------------------
-- Table structure for murid
-- ----------------------------
DROP TABLE IF EXISTS `murid`;
CREATE TABLE `murid`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nis` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `kelas` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(9) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tanggal_lahir` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `nama`(`nama`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of murid
-- ----------------------------
INSERT INTO `murid` VALUES (4, 'ADIKA ALKHALIFI UTOMO', '2011204', '081234567891', 1, '7A', 'Laki-Laki', 'Sleman', '2008-05-28', 'Jl. K H. Syahdan No. 9. Kemanggisan – Palmerah Jakarta Barat 11480', '2022-05-20 01:11:47', '2022-05-24 10:26:39', NULL);
INSERT INTO `murid` VALUES (5, 'AISHANAYA JANEETA HARDIANDI', '2011201', '081234', 2, '7B', 'Perempuan', 'Sleman', '2008-06-10', 'Jl. K H. Syahdan No. 9. Kemanggisan – Palmerah Jakarta Barat 11480', '2022-05-20 01:18:34', '2022-05-24 10:30:11', NULL);
INSERT INTO `murid` VALUES (6, 'ALBIE SABQI ARDINANSYAH', '2011209', '081234', 2, '7B', 'Laki-Laki', 'Bantul', '2008-04-23', 'Jl. K H. Syahdan No. 9. Kemanggisan – Palmerah Jakarta Barat 11480', '2022-05-23 17:06:54', '2022-05-24 10:30:32', NULL);
INSERT INTO `murid` VALUES (7, 'Test', '123', '0812345', 1, '7A', 'Laki-Laki', 'Solo', '2022-05-18', 'testssssss', '2022-05-28 20:56:18', '2022-05-28 21:16:31', '2022-05-28 09:26:11');
INSERT INTO `murid` VALUES (8, 'fghjk', '65789', '09524e54', 3, '7C', 'Laki-Laki', 'gfhgjkl', '2022-05-25', 'dfghjkl;', '2022-05-28 21:51:08', '2022-05-28 21:51:08', '2022-05-29 05:54:23');

-- ----------------------------
-- Table structure for posting
-- ----------------------------
DROP TABLE IF EXISTS `posting`;
CREATE TABLE `posting`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `konten` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `diterbitkan` date NULL DEFAULT NULL,
  `dibuat_pada` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `diubah_pada` datetime NULL DEFAULT NULL,
  `dihapus_pada` datetime NULL DEFAULT NULL,
  `pengguna_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of posting
-- ----------------------------
INSERT INTO `posting` VALUES (1, 'What is Lorem Ipsum', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1', 'what-is-lorem-ipsum', '2022-03-30', '2022-03-30 03:03:45', '2022-03-06 18:16:48', '2022-03-30 10:03:45', NULL);
INSERT INTO `posting` VALUES (2, 'Sopir Bus Primajasa dan Truk Ayam Tewas Usai Kecelakaan di Tol Cipali', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '1', 'profile-sekolah', '2022-04-05', '2022-07-04 01:30:47', '2022-07-03 17:35:42', NULL, 1);
INSERT INTO `posting` VALUES (3, 'SMK Yayasan Pendidikan Delanggu', '<p style=\"text-align: left;\">Lorem ipsum dolor sit amet consectetur adipiscing do eiusmod tempor incididunt ut labore dolore magna enim veniam nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet consectetur adipiscing do eiusmod tempor incididunt ut labore dolore magna enim veniam nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet consectetur adipiscing do eiusmod tempor incididunt ut labore dolore magna enim veniam nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet consectetur adipiscing do eiusmod tempor incididunt ut labore dolore magna enim veniam nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet consectetur adipiscing do eiusmod tempor incididunt ut labore dolore magna enim veniam nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet consectetur adipiscing do eiusmod tempor incididunt ut labore dolore magna enim veniam nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet consectetur adipiscing do eiusmod tempor incididunt ut labore dolore magna enim veniam nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '1', 'smk-yayasan-pendidikan-delanggu', '2022-03-31', '2022-07-04 01:30:47', '2022-07-03 17:34:30', NULL, 1);
INSERT INTO `posting` VALUES (4, 'Makin Ganas! Rusia Sudah Kepung Kota Lisichansk, Ukraina', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '1', 'makin-ganas-rusia-sudah-kepung-kota-lisichansk-ukraina', '2022-03-06', '2022-07-04 01:30:47', '2022-07-03 18:08:29', NULL, 1);
INSERT INTO `posting` VALUES (5, 'Smash Erika Carlina Bawa Kemenangan Lawan Raisa-Anya', '<p>\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p>', '1', 'smash-erika-carlina-bawa-kemenangan-lawan-raisa-anya', '2022-02-10', '2022-07-04 01:30:47', '2022-07-03 18:07:56', NULL, 1);
INSERT INTO `posting` VALUES (6, 'Contrary to popular belief, Lorem Ipsum is not simply random text', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '1', 'contrary-to-popular-belief-lorem-ipsum-is-not-simply-random-text', '2022-03-30', '2022-03-30 03:03:50', '2022-03-04 08:35:34', '2022-03-30 10:03:50', NULL);
INSERT INTO `posting` VALUES (7, 'Tentang Pengembangan Softskill Siswa', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '1', 'tentang-pengembangan-softskill-siswa', '2022-03-30', '2022-03-30 03:03:53', '2022-03-03 14:52:02', '2022-03-30 10:03:53', NULL);
INSERT INTO `posting` VALUES (8, 'Peternak Sapi Potong Pasuruan Tolak Vaksin', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.</p>', '1', 'peternak-sapi-potong-pasuruan-tolak-vaksin', '2022-03-06', '2022-07-04 01:30:47', '2022-07-03 18:07:30', NULL, 1);
INSERT INTO `posting` VALUES (9, 'Molekul Alkohol Terbesar Ditemukan di Luar Angkasa', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.</p>', '1', 'molekul-alkohol-terbesar-ditemukan-di-luar-angkasa', '2022-02-16', '2022-07-04 01:30:47', '2022-07-03 18:06:00', NULL, 1);
INSERT INTO `posting` VALUES (10, 'Seputar artikel terkait', '<p>Seputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkaitSeputar artikel terkait.</p>', '1', 'seputar-artikel-terkait', '2022-03-30', '2022-03-30 03:03:56', '2022-03-30 10:01:18', '2022-03-30 10:03:56', NULL);
INSERT INTO `posting` VALUES (11, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', '1', 'sed-ut-perspiciatis-unde-omnis-iste-natus-error-sit-voluptatem-accusantium-doloremque-laudantium-totam-rem-aperiam', '2022-04-02', '2022-07-04 01:30:47', '2022-07-03 18:04:15', NULL, 1);
INSERT INTO `posting` VALUES (12, 'Cara Install Node JS Dan NPM Pada Windows', '<p>Node.js menggunakan model single threaded dengan event looping. Mekanismenya membantu server untuk merespons dengan cara yang tidak menghalangi dan membuat server sangat skalabel dibandingkan dengan server tradisional yang membuat utas terbatas untuk menangani permintaan. Node.js menggunakan program berulir tunggal dan program yang sama sehingga dapat menyediakan layanan untuk jumlah permintaan yang jauh lebih besar daripada server tradisional seperti Apache HTTP Server.</p>\r\n<p>Node.js menggunakan model single threaded dengan event looping. Mekanismenya membantu server untuk merespons dengan cara yang tidak menghalangi dan membuat server sangat skalabel dibandingkan dengan server tradisional yang membuat utas terbatas untuk menangani permintaan. Node.js menggunakan program berulir tunggal dan program yang sama sehingga dapat menyediakan layanan untuk jumlah permintaan yang jauh lebih besar daripada server tradisional seperti Apache HTTP Server.</p>\r\n<p>Node.js menggunakan model single threaded dengan event looping. Mekanismenya membantu server untuk merespons dengan cara yang tidak menghalangi dan membuat server sangat skalabel dibandingkan dengan server tradisional yang membuat utas terbatas untuk menangani permintaan. Node.js menggunakan program berulir tunggal dan program yang sama sehingga dapat menyediakan layanan untuk jumlah permintaan yang jauh lebih besar daripada server tradisional seperti Apache HTTP Server.</p>', '1', 'cara-install-node-js-dan-npm-pada-windows', '2022-04-01', '2022-07-04 01:30:47', '2022-07-03 18:03:50', NULL, 1);
INSERT INTO `posting` VALUES (13, 'cek data aja ahhh', '<p>cek data aja ahhh cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;cek data aja ahhh&nbsp;</p>', '0', 'cek-data-aja-ahhh', NULL, '2022-07-04 01:04:24', '2022-04-12 20:27:29', '2022-07-03 18:04:24', NULL);
INSERT INTO `posting` VALUES (14, 'cek data lagi', '<p>cek data lagi</p>', '0', 'cek-data-lagi', NULL, '2022-07-04 01:04:27', '2022-04-02 20:01:47', '2022-07-03 18:04:27', 1);
INSERT INTO `posting` VALUES (15, 'cek data aja ... !!', '<p>cek data aja ...&nbsp; dfsds dfd dfds dfn hghgfh hg j j gfhfgh fggfhgfhh gfhfghgfh gfhgfhhfgh h ghgfhfg gfh gfhgf ghgfhgf hfgh gfh gfhf ghgf hg gfh fg hfghfg hgfhgfh&nbsp; gfhgh gfh gf hgh ghfghgfhgf hghgfhgf hghgfh ghg !!</p>', '0', 'cek-data-aja', '2022-04-07', '2022-04-07 12:54:58', '2022-04-07 19:44:47', '2022-04-07 19:54:58', 1);
INSERT INTO `posting` VALUES (16, 'Jadwal Semifinal Piala Presiden 2022, Arema Vs PSIS Semarang, Laga Sulit Almeida Lawan Carlos Fortes', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '0', 'jadwal-semifinal-piala-presiden-2022-arema-vs-psis-semarang-laga-sulit-almeida-lawan-carlos-fortes', '2022-07-01', '2022-07-04 01:06:55', '2022-07-03 18:06:55', NULL, 1);
INSERT INTO `posting` VALUES (17, 'Yeni Inka Full Album 2022 Tanpa Iklan dgfdf', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '1', 'yeni-inka-full-album-2022-tanpa-iklan-dgfdf', '2022-07-03', '2022-07-04 00:28:54', '2022-07-01 08:36:48', NULL, 1);
INSERT INTO `posting` VALUES (18, 'test', '<p>Fusce vel lacus fermentum, finibus nunc id, euismod leo. Curabitur condimentum, justo in porttitor porta, est nibh posuere magna, sed posuere odio libero quis lectus. Donec porta ante at tincidunt dictum. In ut libero pulvinar, lobortis massa ut, ultrices velit. Phasellus velit odio, elementum eget lectus pellentesque, facilisis convallis neque. Ut fermentum a ante non rutrum. Duis dapibus, sem in fermentum lobortis, ante lectus posuere odio, a sodales neque velit in tortor. Nullam est urna, ornare eu leo eget, placerat pulvinar tortor. Vivamus sit amet vehicula arcu. Aliquam in ipsum erat. Donec aliquam nulla eu velit vehicula, ut vehicula turpis.</p>', '0', 'test', '2022-07-03', '2022-07-03 23:03:14', '2022-07-03 15:28:33', '2022-07-03 16:03:14', 1);
INSERT INTO `posting` VALUES (19, 'Nor again is there anyone who loves or pursues', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure? On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee</p>', '1', 'nor-again-is-there-anyone-who-loves-or-pursues', '2022-07-03', '2022-07-04 00:35:30', '2022-07-03 17:35:30', NULL, 1);
INSERT INTO `posting` VALUES (20, 'Beda Klaim Ukraina Vs Rusia soal Titip Pesan via Jokowi Jadi Tanda Tanya', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>', '1', 'berita-heboh', '2022-07-03', '2022-07-04 01:09:58', '2022-07-03 17:35:26', NULL, 1);

-- ----------------------------
-- Table structure for ref_kelas
-- ----------------------------
DROP TABLE IF EXISTS `ref_kelas`;
CREATE TABLE `ref_kelas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tingkatan` enum('7','8','9') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` enum('active','deactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'active',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ref_kelas
-- ----------------------------
INSERT INTO `ref_kelas` VALUES (1, '7', 'A', 'active', '2022-05-20 01:07:28', '2022-05-23 14:41:08', NULL);
INSERT INTO `ref_kelas` VALUES (2, '7', 'B', 'active', '2022-05-20 01:07:28', '2022-05-23 14:42:03', NULL);
INSERT INTO `ref_kelas` VALUES (3, '7', 'C', 'active', '2022-05-20 01:07:28', '2022-05-23 14:41:59', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `create_time` datetime NULL DEFAULT NULL COMMENT 'Create Time',
  `update_time` datetime NULL DEFAULT NULL COMMENT 'Update Time',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'username',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'password',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'userTable' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, NULL, NULL, 'Admin Berita', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

SET FOREIGN_KEY_CHECKS = 1;
