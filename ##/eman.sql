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

 Date: 14/07/2022 17:01:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_barang
-- ----------------------------
DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang`  (
  `id_barang` int(10) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug_barang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_barang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `jenis_barang` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `merk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_sumberdana` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `satuan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_barang
-- ----------------------------
INSERT INTO `tb_barang` VALUES (1, 'PRS/BOS/2021', 'PRS-BOS-2021', 'Printer Scan', 2, 'ASET TETAP', 'EPSON', 'L3110', '001-BOS', '2021-06-11', 'Unit', 'BAIK', 7300000);
INSERT INTO `tb_barang` VALUES (2, 'KAD/BOS/2021', 'KAD-BOS-2021', 'Kipas Angin DInding', 2, 'ASET TETAP', 'MASPION', 'Maspion', '001-BOS', '2021-06-11', 'Unit', 'BAIK', 1700000);
INSERT INTO `tb_barang` VALUES (3, 'SRA/BOS/2021', 'SRA-BOS-2021', 'Scanner Portable', 1, 'ASET TETAP', 'CANON', 'Epson', '001-BOS', '2021-06-11', 'Unit', 'BAIK', 4235000);
INSERT INTO `tb_barang` VALUES (4, 'CPUKI/BOS/2021', 'CPUKI-BOS-2021', 'CPU Rakitan', 4, 'ASET TETAP', '-', 'Core i5', '001-BOS', '2021-06-11', 'Unit', 'BAIK', 15000000);
INSERT INTO `tb_barang` VALUES (5, 'KAD/BOS/2021', 'KAD-BOS-2021', 'Kipas Angin Dinding', 2, 'ASET TETAP', 'MASPION', 'PW-501W', '001-BOS', '2021-11-26', 'Unit', 'BAIK', 1700000);
INSERT INTO `tb_barang` VALUES (6, 'CPURE/BOS/2021', 'CPURE-BOS-2021', 'CPU Core i5', 1, 'ASET TETAP', '-', '-', '001-BOS', '2021-11-26', 'Unit', 'BAIK', 3750000);
INSERT INTO `tb_barang` VALUES (7, 'MNR/BOS/2021', 'MNR-BOS-2021', 'Monitor 16\"', 5, 'ASET TETAP', '-', 'LG', '001-BOS', '2021-11-26', 'Unit', 'BAIK', 6375000);
INSERT INTO `tb_barang` VALUES (8, 'LTP/BOS/2021', 'LTP-BOS-2021', 'Laptop', 1, 'ASET TETAP', 'ASUS', 'K513EA-OLED321', '001-BOS', '2021-11-26', 'Unit', 'BAIK', 9850000);
INSERT INTO `tb_barang` VALUES (9, 'MUI/BOS/2021', 'MUI-BOS-2021', 'Meja Kursi Siswa', 75, 'ASET TETAP', '-', '-', '001-BOS', '2021-11-26', 'Set', 'BAIK', 66000000);
INSERT INTO `tb_barang` VALUES (10, 'MUG/BOS/2021', 'MUG-BOS-2021', 'Meja Kursi Guru', 1, 'ASET TETAP', '-', '-', '001-BOS', '2021-11-26', 'Set', 'BAIK', 1650000);
INSERT INTO `tb_barang` VALUES (11, 'KGG/BOS/2021', 'KGG-BOS-2021', 'Kursi Guru', 9, 'ASET TETAP', '-', '-', '001-BOS', '2021-11-26', 'Set', 'BAIK', 2925000);
INSERT INTO `tb_barang` VALUES (14, 'PRS/BOS/2021a', 'PRS-BOS-2021a', 'asdjk', 20001, 'Aset Tetap', 'adfjk', 'asdfjk', '001-BOS', '2022-07-19', 'Pcs', 'Rusak', 4006);

-- ----------------------------
-- Table structure for tb_detail_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `tb_detail_lokasi`;
CREATE TABLE `tb_detail_lokasi`  (
  `kode_lokasi` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_barang` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_detail_lokasi
-- ----------------------------
INSERT INTO `tb_detail_lokasi` VALUES ('11', 'KGG/BOS/2021');
INSERT INTO `tb_detail_lokasi` VALUES ('11', 'LTP/BOS/2021');
INSERT INTO `tb_detail_lokasi` VALUES ('11', 'CPURE/BOS/2021');
INSERT INTO `tb_detail_lokasi` VALUES ('10', 'KGG/BOS/2021');
INSERT INTO `tb_detail_lokasi` VALUES ('10', 'LTP/BOS/2021');
INSERT INTO `tb_detail_lokasi` VALUES ('10', 'CPURE/BOS/2021');

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
  `kode_lokasi` int(15) NOT NULL,
  `kode_pegawai` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lokasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `titik_koordinat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`kode_lokasi`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_lokasi
-- ----------------------------
INSERT INTO `tb_lokasi` VALUES (1, '197112202007011017', 'KANTOR', '-7.7540617600031245, 113.53666330714829');
INSERT INTO `tb_lokasi` VALUES (2, '197109042005012009', 'LAB KOMPUTER 1', '-7.7540318610599535, 113.53654528995966');
INSERT INTO `tb_lokasi` VALUES (3, '196810112007012019', 'LAB KOMPUTER 2', '-7.754044485058443, 113.53649499854404');
INSERT INTO `tb_lokasi` VALUES (4, '197112252008012018', 'PERPUSTAKAAN', '-7.754015250535052, 113.53654193719863');
INSERT INTO `tb_lokasi` VALUES (5, '197609292008012017', 'X AKL 1', '-7.754005948640824, 113.53635954699803');
INSERT INTO `tb_lokasi` VALUES (6, '198306042009031004', 'X AKL 2', '-7.753952794955551, 113.53635015926712');
INSERT INTO `tb_lokasi` VALUES (7, '197211242006041007', 'BENGKEL', '-7.754073055158884, 113.53670354028077');
INSERT INTO `tb_lokasi` VALUES (8, '197605142011012006', 'X TKRO 1', '-7.754006613061852, 113.53644001326299');
INSERT INTO `tb_lokasi` VALUES (9, '197806182010012007', 'X TKRO 2', '-7.754017243798085, 113.53641050896583');
INSERT INTO `tb_lokasi` VALUES (10, '198505122010012020', 'X TKRO 3', '-7.7540404985326425, 113.53641386172687');
INSERT INTO `tb_lokasi` VALUES (11, ' 197609292008012017', 'asd', 'asd');

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
