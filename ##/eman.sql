/*
 Navicat Premium Data Transfer

 Source Server         : LOKALAN
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : eman

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 08/07/2022 16:14:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_barang
-- ----------------------------
DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang`  (
  `kode_barang` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_barang` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `jenis_barang` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `merk` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_sumberdana` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_pembelian` datetime(0) NOT NULL,
  `satuan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_detail_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `tb_detail_lokasi`;
CREATE TABLE `tb_detail_lokasi`  (
  `kode_lokasi` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_barang` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_detail_peminjaman
-- ----------------------------
DROP TABLE IF EXISTS `tb_detail_peminjaman`;
CREATE TABLE `tb_detail_peminjaman`  (
  `kode_pinjam` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_barang` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_detail_perawatan
-- ----------------------------
DROP TABLE IF EXISTS `tb_detail_perawatan`;
CREATE TABLE `tb_detail_perawatan`  (
  `kode_perawatan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_barang` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `biaya_perawatan` int(11) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `tb_lokasi`;
CREATE TABLE `tb_lokasi`  (
  `kode_lokasi` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_pegawai` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lokasi` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `titik_koordinat` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `tb_pegawai`;
CREATE TABLE `tb_pegawai`  (
  `kode_pegawai` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nomor_telepon` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`kode_pegawai`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pegawai
-- ----------------------------
INSERT INTO `tb_pegawai` VALUES (' 197609292008012017', 'Ariah Sejati, S.Pd', 'ariah-sejati-spd', 'SUMBERANYAR - PAITON', '081323665878');
INSERT INTO `tb_pegawai` VALUES ('111', '13213200', '13213200', '54654654600', '54654654600');
INSERT INTO `tb_pegawai` VALUES ('123456', 'apa aja lah', 'apa-aja-lah', 'aaaaaaaaa', '4444444');
INSERT INTO `tb_pegawai` VALUES ('196810112007012019', 'Dra. Anik Nursukma', 'dra-anik-nursukma', 'TRIWUNGAN - KOTAANYAR', '085269336554');
INSERT INTO `tb_pegawai` VALUES ('197109042005012009', 'Fatratin Azizah, SE', 'fatratin-azizah-se', 'KRAKSAAN - KRAKSAAN', '083117228745');
INSERT INTO `tb_pegawai` VALUES ('197112202007011017', 'Mulhadi, S.Pd', 'mulhadi-spd', 'SUMBERREJO - PAITON', '085232657984');
INSERT INTO `tb_pegawai` VALUES ('197112252008012018', 'Sunarsi, S.Pd', 'sunarsi-spd', 'SUMBERANYAR - PAITON', '085331224556');
INSERT INTO `tb_pegawai` VALUES ('197211242006041007', 'Edi Kurniawan, ST', 'edi-kurniawan-st', 'SOGAAN - KRAKSAAN', '085336963456');
INSERT INTO `tb_pegawai` VALUES ('197605142011012006', 'Retno Suryaningtyas, S.Pd', 'retno-suryaningtyas-spd', 'PAITON - PAITON', '081223664557');
INSERT INTO `tb_pegawai` VALUES ('197806182010012007', 'Kholili, S.Pd', 'kholili-spd', 'JATIURIP - KREJENGAN', '081317002985');
INSERT INTO `tb_pegawai` VALUES ('198306042009031004', 'Abdul Hadi, S.Pd.I', 'abdul-hadi-spdi', 'SAMBIRAMPAK KIDUL - KOTAANYAR', '085143254789');
INSERT INTO `tb_pegawai` VALUES ('198505122010012020', 'Iva Dwi Meilydiawati, S.Pd. Gr.', 'iva-dwi-meilydiawati-spd-gr', 'MARON - MARON', '085259658745');

-- ----------------------------
-- Table structure for tb_peminjaman
-- ----------------------------
DROP TABLE IF EXISTS `tb_peminjaman`;
CREATE TABLE `tb_peminjaman`  (
  `kode_pinjam` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_pinjam` datetime(0) NOT NULL,
  `tgl_jatuh_tempo` datetime(0) NOT NULL,
  `kode_pegawai` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_penghapusan
-- ----------------------------
DROP TABLE IF EXISTS `tb_penghapusan`;
CREATE TABLE `tb_penghapusan`  (
  `kode_penghapusan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_barang` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_perawatan
-- ----------------------------
DROP TABLE IF EXISTS `tb_perawatan`;
CREATE TABLE `tb_perawatan`  (
  `kode_perawatan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_perawatan` datetime(0) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_sumberdana
-- ----------------------------
DROP TABLE IF EXISTS `tb_sumberdana`;
CREATE TABLE `tb_sumberdana`  (
  `kode_sumberdana` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_barang` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_sumberdana` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `username` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_user` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
