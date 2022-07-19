/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : freelance_uts-dunedune

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 29/05/2022 04:38:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of murid
-- ----------------------------
INSERT INTO `murid` VALUES (4, 'ADIKA ALKHALIFI UTOMO', '2011204', '081234567891', 1, '7A', 'Laki-Laki', 'Sleman', '2008-05-28', 'Jl. K H. Syahdan No. 9. Kemanggisan – Palmerah Jakarta Barat 11480', '2022-05-20 01:11:47', '2022-05-24 10:26:39', NULL);
INSERT INTO `murid` VALUES (5, 'AISHANAYA JANEETA HARDIANDI', '2011201', '081234', 2, '7B', 'Perempuan', 'Sleman', '2008-06-10', 'Jl. K H. Syahdan No. 9. Kemanggisan – Palmerah Jakarta Barat 11480', '2022-05-20 01:18:34', '2022-05-24 10:30:11', NULL);
INSERT INTO `murid` VALUES (6, 'ALBIE SABQI ARDINANSYAH', '2011209', '081234', 2, '7B', 'Laki-Laki', 'Bantul', '2008-04-23', 'Jl. K H. Syahdan No. 9. Kemanggisan – Palmerah Jakarta Barat 11480', '2022-05-23 17:06:54', '2022-05-24 10:30:32', NULL);
INSERT INTO `murid` VALUES (7, 'Test', '123', '0812345', 1, '7A', 'Laki-Laki', 'Solo', '2022-05-18', 'testssssss', '2022-05-28 20:56:18', '2022-05-28 21:16:31', '2022-05-28 09:26:11');

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

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
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'username',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'password',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'userTable' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, NULL, NULL, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

SET FOREIGN_KEY_CHECKS = 1;
