-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2016 at 12:05 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuvananvat`
--

-- --------------------------------------------------------

--
-- Table structure for table `blmonan`
--

CREATE TABLE `blmonan` (
  `MaMonAn` int(50) NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Ten` text COLLATE utf8_unicode_ci NOT NULL,
  `SDT` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `Duyet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blmonan`
--

INSERT INTO `blmonan` (`MaMonAn`, `ThoiGian`, `Ten`, `SDT`, `Email`, `NoiDung`, `Duyet`) VALUES
(1, '2016-11-23 23:40:03', 'Vô Danh', '01648283144', 'vodanh@gmail.com', 'ăn cũng tạm , nhưng được cái vừa túi ^^', 1),
(1, '2016-11-23 23:41:12', 'Vô Danh', '01648283144', 'vodanh@gmail.com', 'ăn cũng tạm , nhưng được cái vừa túi ^^', 0),
(2, '2016-11-19 13:45:30', 'Vô Danh', '01648283144', 'vodanh@gmail.com', 'Món ăn rất ngon', 1),
(3, '2016-11-19 13:45:54', 'Vô Danh', '01648283144', 'vodanh@gmail.com', 'Món ăn rất ngon', 1),
(4, '2016-11-19 13:46:13', 'Vô Danh', '01648283144', 'vodanh@gmail.com', 'Món ăn rất ngon', 1),
(4, '2016-11-24 00:09:53', 'Trần Lê Thanh Phan', '01648283144', 'tranlethanhphan14cntt@gmail.com', 'uống rất mát , ngon', 1),
(4, '2016-11-24 00:15:41', 'Trần Lê Thanh Phan', '01648283144', 'tranlethanhphan14cntt@gmail.com', 'test bình luận', 1),
(5, '2016-11-19 13:48:03', 'Vô Danh', '01648283144', 'vodanh@gmail.com', 'ăn rất vừa miệng', 1),
(5, '2016-11-19 13:48:17', 'Vô Danh', '01648283144', 'vodanh@gmail.com', 'ăn rất vừa miệng', 1),
(5, '2016-11-19 13:48:26', 'Vô Danh', '01648283144', 'vodanh@gmail.com', 'Món ăn rất ngon', 1),
(7, '2016-11-19 13:50:55', 'Vô Danh', '01648283144', 'vodanh@gmail.com', 'Món ăn rất ngon', 1),
(8, '2016-11-19 13:51:21', 'Vô Danh', '01648283144', 'vodanh@gmail.com', 'Món ăn rất ngon', 1),
(9, '2016-11-19 13:51:29', 'Vô Danh', '01648283144', 'vodanh@gmail.com', 'Món ăn rất ngon', 1),
(9, '2016-11-24 00:29:22', 'Trần Lê Thanh Phan', '01648283144', 'tranlethanhphan14cntt@gmail.com', 'test bình luận quán ăn', 1),
(10, '2016-11-19 13:51:37', 'Vô Danh', '01648283144', 'vodanh@gmail.com', 'Món ăn rất ngon', 1),
(15, '2016-12-20 15:53:26', 'Vô DANH', '012345678910', 'No@gmail.com', 'Bánh rất ngon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blquanan`
--

CREATE TABLE `blquanan` (
  `MaQuanAn` int(50) NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Ten` text COLLATE utf8_unicode_ci NOT NULL,
  `SDT` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `Duyet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blquanan`
--

INSERT INTO `blquanan` (`MaQuanAn`, `ThoiGian`, `Ten`, `SDT`, `Email`, `NoiDung`, `Duyet`) VALUES
(1, '2016-11-20 22:42:13', 'Trần Lê Thanh Phan', '01648283144', 'tranlethanhphan14cntt@gmail.com', 'Quán ăn được , rất ổn ,giá bèo', 1),
(1, '2016-11-24 00:17:47', 'Trần Lê Thanh Phan', '01648283144', 'tranlethanhphan14cntt@gmail.com', 'test', 1),
(1, '2016-12-24 00:18:47', 'Trần Lê Thanh Phan', '01648283144', 'tranlethanhphan14cntt@gmail.com', 'Món ăn vặt nổi tiếng của Đà nẵng! Có rất nhiều vị để lựa chọn, theo t thì loại nào cũng ngon hết. Có bánh ướt và bánh khô, khô là miếng dẹt còn ướt thì quấn vào, mỗi loại có cái hay riêng nhưng t thích bánh ướt hơn, chấm vào xốt thì hợp vô cùng .', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cauhoi`
--

CREATE TABLE `cauhoi` (
  `MaCauHoi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ChuDe` text COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL,
  `BangChuaMoTa` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cauhoi`
--

INSERT INTO `cauhoi` (`MaCauHoi`, `ChuDe`, `MoTa`, `BangChuaMoTa`) VALUES
('1', 'Thời Tiết', 'thời tiết của hôm nay ra sao vậy ?', 'thoitiet'),
('2', 'Số Lượng Người', 'số lượng người trong nhóm của bạn là ?', 'khonggian'),
('3', 'Văn hóa ẩm thực', 'loại ẩm thực mà bạn thích hơn ? ', 'loaithucan'),
('4', 'Số tiền hiện có', 'số tiền hiện có của bạn ?', 'luongtien'),
('5', 'Thời gian', 'Bạn muốn ăn vào thời điểm nào trong ngày?', 'thoigian'),
('6', 'Phương tiện', 'nhóm bạn sẽ sử dụng phương tiện gì ?', 'phuongtien'),
('7', 'Mức Độ trưởng thành', 'bạn đã trưởng thành hay vẫn còn năng động ?', 'luatuoi'),
('8', 'Không gian cho trẻ', 'Bạn có cần không gian cho trẻ ?', 'treem');

-- --------------------------------------------------------

--
-- Table structure for table `hinhanhmonan`
--

CREATE TABLE `hinhanhmonan` (
  `MaHinhAnh` int(50) NOT NULL,
  `Link` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hinhanhmonan`
--

INSERT INTO `hinhanhmonan` (`MaHinhAnh`, `Link`) VALUES
(1, '../images/monan/ma1.1_banhkep.jpg'),
(2, '../images/monan/ma1.2_banhkep.jpg'),
(3, '../images/monan/ma1.3_banhkep.jpg'),
(4, '../images/monan/ma1.4_banhkep.jpg'),
(5, '../images/monan/ma2.1_banhtrangopla.JPG'),
(6, '../images/monan/ma2.2_banhtrangopla.JPG'),
(7, '../images/monan/ma2.3_banhtrangopla.JPG'),
(8, '../images/monan/ma2.4_banhtrangopla.JPG'),
(9, '../images/monan/ma3.1_banhtrangtron.jpg'),
(10, '../images/monan/ma3.2_banhtrangtron.jpg'),
(11, '../images/monan/ma3.3_banhtrangtron.jpg'),
(12, '../images/monan/ma3.4_banhtrangtron.jpg'),
(13, '../images/monan/ma4.1_xoaiman.jpg'),
(14, '../images/monan/ma4.2_xoaiman.jpg'),
(15, '../images/monan/ma4.3_xoaiman.jpg'),
(16, '../images/monan/ma4.4_xoaiman.jpg'),
(17, '../images/monan/ma5.1_ganrim.jpg'),
(18, '../images/monan/ma5.2_ganrim.jpg'),
(19, '../images/monan/ma5.3_ganrim.jpg'),
(20, '../images/monan/ma5.4_ganrim.jpg'),
(21, '../images/monan/ma6.1_oidamximuoi.jpg'),
(22, '../images/monan/ma6.2_oidamximuoi.jpg'),
(23, '../images/monan/ma6.3_oidamximuoi.jpg'),
(24, '../images/monan/ma6.4_oidamximuoi.jpg'),
(25, '../images/monan/ma7.1_chanhday.jpg'),
(26, '../images/monan/ma7.2_chanhday.jpg'),
(27, '../images/monan/ma7.3_chanhday.jpg'),
(28, '../images/monan/ma7.4_chanhday.jpg'),
(29, '../images/monan/ma8.1_cacao.jpg'),
(30, '../images/monan/ma8.2_cacao.jpg'),
(31, '../images/monan/ma8.3_cacao.jpg'),
(32, '../images/monan/ma8.4_cacao.jpg'),
(33, '../images/monan/ma9.1_nuocdau.jpg'),
(34, '../images/monan/ma9.2_nuocdau.jpg'),
(35, '../images/monan/ma9.3_nuocdau.jpg'),
(36, '../images/monan/ma9.4_nuocdau.jpg'),
(37, '../images/monan/ma10.1_nuocdua.jpg'),
(38, '../images/monan/ma10.2_nuocdua.jpg'),
(39, '../images/monan/ma10.3_nuocdua.jpg'),
(40, '../images/monan/ma10.4_nuocdua.jpg'),
(41, '../images/monan/BanhMiMO1.jpg'),
(42, '../images/monan/BanhMiMO2.jpg'),
(43, '../images/monan/BanhMiMO3.jpg'),
(44, '../images/monan/BanhMiMO4.jpg'),
(45, '../images/monan/banhxoanlop1.jpg'),
(46, '../images/monan/banhxoanlop2.jpg'),
(47, '../images/monan/banhxoanlop3.jpg'),
(48, '../images/monan/banhxoanlop4.jpg'),
(49, '../images/monan/chabonggacay1.jpg'),
(50, '../images/monan/chabonggacay2.jpg'),
(51, '../images/monan/chabonggacay3.jpg'),
(52, '../images/monan/chabonggacay4.jpg'),
(53, '../images/monan/Coconutsmoothie1.jpg'),
(54, '../images/monan/Coconutsmoothie4.jpg'),
(55, '../images/monan/Coconutsmoothie3.jpg'),
(56, '../images/monan/Coconutsmoothie2.jpg'),
(57, '../images/monan/donutsocola3.png'),
(58, '../images/monan/donutsocola2.jpg'),
(59, '../images/monan/donutsocola1.jpg'),
(60, '../images/monan/donutsocola4.jpg'),
(61, '../images/monan/Hamburger1.jpg'),
(62, '../images/monan/Hamburger2.jpg'),
(63, '../images/monan/Hamburger3.jpg'),
(64, '../images/monan/Hamburger4.jpg'),
(65, '../images/monan/Lavacake1.jpg'),
(66, '../images/monan/Lavacake2.jpg'),
(67, '../images/monan/Lavacake3.jpg'),
(68, '../images/monan/Lavacake4.jpg'),
(69, '../images/monan/Pizzaga1.jpg'),
(70, '../images/monan/Pizzaga2.jpg'),
(71, '../images/monan/Pizzaga3.jpg'),
(72, '../images/monan/Pizzaga4.jpg'),
(73, '../images/monan/Tiramisulat3.jpg'),
(74, '../images/monan/Tiramisulat4.jpg'),
(75, '../images/monan/Tiramisulat1.jpg'),
(76, '../images/monan/Tiramisulat2.jpg'),
(77, '../images/monan/tradao4.jpg'),
(78, '../images/monan/tradao1.jpg'),
(79, '../images/monan/tradao2.jpg'),
(80, '../images/monan/tradao3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hinhanhquanan`
--

CREATE TABLE `hinhanhquanan` (
  `MaHinhAnh` int(50) NOT NULL,
  `Link` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hinhanhquanan`
--

INSERT INTO `hinhanhquanan` (`MaHinhAnh`, `Link`) VALUES
(1, '../images/quanan/quan1.1_banhtrangdihoa.jpg'),
(2, '../images/quanan/quan1.2_banhtrangdihoa.jpg'),
(3, '../images/quanan/quan1.3_banhtrangdihoa.jpg'),
(4, '../images/quanan/quan1.4_banhtrangdihoa.jpg'),
(5, '../images/quanan/quan1.5_banhtrangdihoa.jpg'),
(6, '../images/quanan/quan1.6_banhtrangdihoa.jpg'),
(7, '../images/quanan/bonpas1.jpg'),
(8, '../images/quanan/bonpas2.jpg'),
(9, '../images/quanan/bonpas3.jpg'),
(10, '../images/quanan/bonpas4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `khonggian`
--

CREATE TABLE `khonggian` (
  `MaKhongGian` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoNguoiDi` text COLLATE utf8_unicode_ci,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhMinhHoa` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khonggian`
--

INSERT INTO `khonggian` (`MaKhongGian`, `SoNguoiDi`, `MoTa`, `HinhMinhHoa`) VALUES
('MKG1', 'Nhỏ', 'bạn đi dưới 4 người', '../images/cauhoi/khonggian-nho.jpg'),
('MKG2', 'Vừa', 'Bạn đi từ 5 đến 7 người', '../images/cauhoi/khonggian-vua.jpg'),
('MKG3', 'Số lượng lớn', 'bạn đi từ 7 người trở lên', '../images/cauhoi/khonggian-lon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loaithucan`
--

CREATE TABLE `loaithucan` (
  `MaLoaiTA` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenLoaiThucAn` text COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhMinhHoa` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaithucan`
--

INSERT INTO `loaithucan` (`MaLoaiTA`, `TenLoaiThucAn`, `MoTa`, `HinhMinhHoa`) VALUES
('ML1', 'Món ăn Việt Nam', 'Nên ẩm thực Việt Nam cũng để lại những ấn tượng không hề nhỏ trong lòng du khách nước ngoài. Những món ăn Việt Nam nổi tiếng đã dần dần khẳng định vị trí và sự hấp dẫn', '../images/cauhoi/monan-vietnam.jpg'),
('ML2', 'Nước ngoài', 'Mỗi nền văn hóa đều có một phong cách ẩm thực khác nhau, nếu bạn thích khám phá những nền văn hóa khác.', '../images/cauhoi/monan-nuocngoai.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `luachonmon`
--

CREATE TABLE `luachonmon` (
  `LuaChon` bigint(100) NOT NULL,
  `Ngay` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ChonMon` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `luachonmon`
--

INSERT INTO `luachonmon` (`LuaChon`, `Ngay`, `ChonMon`) VALUES
(41, '2016-12-01 09:14:36', 1),
(42, '2016-12-01 09:14:36', 1),
(43, '2016-12-01 09:14:36', 1),
(44, '2016-12-01 09:14:36', 1),
(45, '2016-12-01 09:14:36', 1),
(46, '2016-12-01 09:14:36', 1),
(47, '2016-12-01 09:14:36', 1),
(48, '2016-12-01 09:14:36', 1),
(49, '2016-12-01 09:14:36', 1),
(50, '2016-12-01 09:14:36', 1),
(51, '2016-12-01 09:14:36', 2),
(52, '2016-12-01 09:14:37', 2),
(53, '2016-12-01 09:14:37', 2),
(54, '2016-12-01 09:14:37', 2),
(55, '2016-12-01 09:14:37', 2),
(56, '2016-12-01 09:14:37', 2),
(57, '2016-12-01 09:14:37', 2),
(58, '2016-12-01 09:14:37', 2),
(59, '2016-12-01 09:14:37', 2),
(60, '2016-12-01 09:14:37', 2),
(61, '2016-12-01 09:14:37', 2),
(62, '2016-12-01 09:14:37', 2),
(63, '2016-12-01 09:14:37', 2),
(64, '2016-12-01 09:14:37', 2),
(65, '2016-12-01 09:14:37', 2),
(66, '2016-12-01 09:14:37', 2),
(67, '2016-12-01 09:14:37', 2),
(68, '2016-12-01 09:14:37', 2),
(69, '2016-12-01 09:14:37', 2),
(70, '2016-12-01 09:14:37', 2),
(71, '2016-12-01 09:14:37', 3),
(72, '2016-12-01 09:14:37', 3),
(73, '2016-12-01 09:14:37', 3),
(74, '2016-12-01 09:14:37', 3),
(75, '2016-12-01 09:14:37', 3),
(76, '2016-12-01 09:14:37', 3),
(77, '2016-12-01 09:14:38', 3),
(78, '2016-12-01 09:14:38', 3),
(79, '2016-12-01 09:14:38', 3),
(80, '2016-12-01 09:14:38', 3),
(81, '2016-12-01 09:14:38', 3),
(82, '2016-12-01 09:14:38', 3),
(83, '2016-12-01 09:14:38', 3),
(84, '2016-12-01 09:14:38', 3),
(85, '2016-12-01 09:14:38', 3),
(86, '2016-12-01 09:14:38', 3),
(87, '2016-12-01 09:14:38', 3),
(88, '2016-12-01 09:14:38', 3),
(89, '2016-12-01 09:14:38', 3),
(90, '2016-12-01 09:14:38', 3),
(91, '2016-12-01 09:14:38', 4),
(92, '2016-12-01 09:14:38', 4),
(93, '2016-12-01 09:14:38', 4),
(94, '2016-12-01 09:14:38', 4),
(95, '2016-12-01 09:14:38', 4),
(96, '2016-12-01 09:14:38', 4),
(97, '2016-12-01 09:14:38', 4),
(98, '2016-12-01 09:14:38', 4),
(99, '2016-12-01 09:14:38', 4),
(100, '2016-12-01 09:14:38', 4),
(101, '2016-12-01 09:14:38', 4),
(102, '2016-12-01 09:14:38', 4),
(103, '2016-12-01 09:14:39', 4),
(104, '2016-12-01 09:14:39', 4),
(105, '2016-12-01 09:14:39', 4),
(106, '2016-12-01 09:14:39', 4),
(107, '2016-12-01 09:14:39', 4),
(108, '2016-12-01 09:14:39', 4),
(109, '2016-12-01 09:14:39', 4),
(110, '2016-12-01 09:14:39', 4),
(111, '2016-12-01 09:14:39', 4),
(112, '2016-12-01 09:14:39', 4),
(113, '2016-12-01 09:14:39', 4),
(114, '2016-12-01 09:14:39', 4),
(115, '2016-12-01 09:14:39', 4),
(116, '2016-12-01 09:14:39', 4),
(117, '2016-12-01 09:14:39', 4),
(118, '2016-12-01 09:14:39', 4),
(119, '2016-12-01 09:14:39', 4),
(120, '2016-12-01 09:14:39', 4),
(121, '2016-12-01 09:14:39', 5),
(122, '2016-12-01 09:14:39', 5),
(123, '2016-12-01 09:14:39', 5),
(124, '2016-12-01 09:14:39', 5),
(125, '2016-12-01 09:14:39', 5),
(126, '2016-12-01 09:14:39', 5),
(127, '2016-12-01 09:14:39', 5),
(128, '2016-12-01 09:14:40', 5),
(129, '2016-12-01 09:14:40', 5),
(130, '2016-12-01 09:14:40', 5),
(131, '2016-12-01 09:14:40', 6),
(132, '2016-12-01 09:14:40', 6),
(133, '2016-12-01 09:14:40', 6),
(134, '2016-12-01 09:14:40', 6),
(135, '2016-12-01 09:14:40', 6),
(136, '2016-12-01 09:14:40', 6),
(137, '2016-12-01 09:14:40', 6),
(138, '2016-12-01 09:14:40', 6),
(139, '2016-12-01 09:14:40', 6),
(140, '2016-12-01 09:14:40', 6),
(141, '2016-12-01 09:14:40', 7),
(142, '2016-12-01 09:14:40', 7),
(143, '2016-12-01 09:14:40', 7),
(144, '2016-12-01 09:14:40', 7),
(145, '2016-12-01 09:14:40', 7),
(146, '2016-12-01 09:14:40', 7),
(147, '2016-12-01 09:14:40', 7),
(148, '2016-12-01 09:14:40', 7),
(149, '2016-12-01 09:14:40', 7),
(150, '2016-12-01 09:14:40', 7),
(151, '2016-12-01 09:14:40', 8),
(152, '2016-12-01 09:14:40', 8),
(153, '2016-12-01 09:14:40', 8),
(154, '2016-12-01 09:14:40', 8),
(155, '2016-12-01 09:14:40', 8),
(156, '2016-12-01 09:14:41', 8),
(157, '2016-12-01 09:14:41', 8),
(158, '2016-12-01 09:14:41', 8),
(159, '2016-12-01 09:14:41', 8),
(160, '2016-12-01 09:14:41', 8),
(161, '2016-12-01 09:14:41', 9),
(162, '2016-12-01 09:14:41', 9),
(163, '2016-12-01 09:14:41', 9),
(164, '2016-12-01 09:14:41', 9),
(165, '2016-12-01 09:14:41', 9),
(166, '2016-12-01 09:14:41', 9),
(167, '2016-12-01 09:14:41', 9),
(168, '2016-12-01 09:14:41', 9),
(169, '2016-12-01 09:14:41', 9),
(170, '2016-12-01 09:14:41', 9),
(171, '2016-12-01 09:14:41', 10),
(172, '2016-12-01 09:14:41', 10),
(173, '2016-12-01 09:14:41', 10),
(174, '2016-12-01 09:14:41', 10),
(175, '2016-12-01 09:14:41', 10),
(176, '2016-12-01 09:14:41', 10),
(177, '2016-12-01 09:14:41', 10),
(178, '2016-12-01 09:14:41', 10),
(179, '2016-12-01 09:14:41', 10),
(180, '2016-12-01 09:14:41', 10),
(181, '2016-12-01 00:56:05', 4),
(182, '2016-12-01 23:06:09', 5),
(183, '2016-12-01 23:06:14', 6),
(184, '2016-12-01 23:06:19', 7),
(185, '2016-12-01 23:17:50', 5),
(186, '2016-12-02 11:43:10', 5),
(187, '2016-12-02 11:43:22', 7),
(188, '2016-12-02 11:43:49', 6),
(189, '2016-12-05 12:46:38', 5),
(190, '2016-12-05 12:50:01', 6),
(191, '2016-12-05 12:50:16', 7),
(192, '2016-12-05 12:50:19', 8),
(193, '2016-12-05 12:51:39', 5),
(194, '2016-12-05 12:51:53', 6),
(195, '2016-12-09 14:32:35', 5),
(196, '2016-12-12 22:20:12', 5),
(197, '2016-12-12 22:46:59', 5),
(198, '2016-12-12 22:47:01', 1),
(199, '2016-12-12 22:47:15', 2),
(200, '2016-12-12 22:47:21', 3),
(201, '2016-12-12 22:47:25', 4),
(202, '2016-12-12 22:52:40', 6),
(203, '2016-12-12 22:53:58', 7),
(204, '2016-12-12 22:54:01', 8),
(205, '2016-12-12 22:54:04', 9),
(206, '2016-12-12 22:54:08', 10),
(207, '2016-12-12 23:46:39', 5),
(208, '2016-12-13 16:58:26', 6),
(209, '2016-12-13 16:58:31', 6),
(210, '2016-12-13 18:48:48', 1),
(211, '2016-12-20 15:50:54', 15),
(212, '2016-12-20 15:54:12', 12),
(213, '2016-12-20 15:54:39', 16),
(214, '2016-12-20 16:23:38', 14);

-- --------------------------------------------------------

--
-- Table structure for table `luachonquan`
--

CREATE TABLE `luachonquan` (
  `LuaChon` bigint(100) NOT NULL,
  `Ngay` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ChonQuan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `luachonquan`
--

INSERT INTO `luachonquan` (`LuaChon`, `Ngay`, `ChonQuan`) VALUES
(1, '2016-11-23 09:11:09', 1),
(2, '2016-11-23 09:11:10', 1),
(3, '2016-11-23 09:11:10', 1),
(4, '2016-11-23 09:11:10', 1),
(5, '2016-11-23 09:11:10', 1),
(6, '2016-11-23 09:11:10', 1),
(7, '2016-11-23 09:11:10', 1),
(8, '2016-11-23 09:11:10', 1),
(9, '2016-11-23 09:11:10', 1),
(10, '2016-11-23 09:11:10', 1),
(11, '2016-12-01 21:54:34', 1),
(12, '2016-12-01 23:10:54', 1),
(13, '2016-12-02 11:42:36', 1),
(14, '2016-12-05 13:43:07', 1),
(15, '2016-12-05 13:51:51', 1),
(16, '2016-12-09 14:32:53', 1),
(17, '2016-12-13 17:00:26', 1),
(18, '2016-12-13 17:51:47', 1),
(19, '2016-12-13 17:52:50', 1),
(20, '2016-12-13 19:26:39', 1),
(21, '2016-12-19 21:44:30', 1),
(22, '2016-12-19 21:44:36', 2),
(23, '2016-12-20 10:12:15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `luatuoi`
--

CREATE TABLE `luatuoi` (
  `MaLuaTuoi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenLuaTuoi` text COLLATE utf8_unicode_ci,
  `MoTa` text COLLATE utf8_unicode_ci,
  `HinhMinhHoa` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `luatuoi`
--

INSERT INTO `luatuoi` (`MaLuaTuoi`, `TenLuaTuoi`, `MoTa`, `HinhMinhHoa`) VALUES
('MT1', 'Tuổi teen', 'bạn vẫn còn năng động, nhiệt huyết trong các hoạt động', '../images/cauhoi/luatuoi-tuoiteen.jpg'),
('MT2', 'Trưởng thành', 'Bạn đã chững chạc, trưởng thành thích hợp với những quán có không gian yên tĩnh , cách bày trí không gian cổ điển , đơn giản\r\n', '../images/cauhoi/luatuoi-truongthanh.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `luongtien`
--

CREATE TABLE `luongtien` (
  `MaLT` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenLT` text COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhMinhHoa` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `luongtien`
--

INSERT INTO `luongtien` (`MaLT`, `TenLT`, `MoTa`, `HinhMinhHoa`) VALUES
('MLT1', 'không có nhiều tiền', 'nếu bạn không có  nhiều tiền cũng đừng lo lắng, bạn vẫn có thể chọn những món ăn rẻ nhưng vẫn rất ngon.', '../images/cauhoi/sotien-it.jpg'),
('MLT2', 'dư giả', 'số tiền không còn là vấn đề với bạn, thoải mái chọn mói ăn miễn là ngon .', '../images/cauhoi/sotien-nhieu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `monan`
--

CREATE TABLE `monan` (
  `MaMonAn` int(50) NOT NULL,
  `TenMonAn` text COLLATE utf8_unicode_ci,
  `MoTa` text COLLATE utf8_unicode_ci,
  `MaLoaiTA` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhAnhDaiDien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GiaTien` bigint(20) NOT NULL,
  `MonMoi` tinyint(1) NOT NULL,
  `Diem` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monan`
--

INSERT INTO `monan` (`MaMonAn`, `TenMonAn`, `MoTa`, `MaLoaiTA`, `HinhAnhDaiDien`, `GiaTien`, `MonMoi`, `Diem`) VALUES
(1, 'Bánh kẹp', 'Bánh tráng kẹp là loại bánh tráng mềm, không quá dày, dùng bánh tráng này cuộn lại hỗn hợp pate gan tẩm gia vị đã chín trước cùng hành phi và trứng cút sao cho khéo rồi đem nướng lên có mùi rất thơm. Giá một dĩa bánh từ 10k đến 12k thôi.', 'ML1', '../images/monan/ma1_banhkep.jpg', 10000, 0, 8.5),
(2, 'Bánh tráng ốp la', 'Bánh tráng ốp la', 'ML1', '../images/monan/ma2_banhtrangopla.jpg', 10000, 0, 8),
(3, 'Bánh tráng trộn', 'Bánh tráng trộn là món ăn vặt vô cùng phổ biến ở các tỉnh phía Nam với nhiều biến thể và được mọi người yêu thích. Những miếng bánh tráng dai dai, bò khô cay xè, trứng cút béo béo thấm đẫm thứ nước sốt chua ngọt hấp dẫn vô cùng.', 'ML1', '../images/monan/ma3_banhtrangtron.jpg', 10000, 0, 8),
(4, 'Xoài dầm mắm', 'Món xoài dầm có lẽ cũng đã khá nổi tiếng trong giới ăn vặt rồi. Kết hợp chua và mặn và ngọt tạo nên một hỗn hợp rất ngon và lạ .', 'ML1', '../images/monan/ma4_xoaiman.jpg', 10000, 0, 8),
(5, 'Gan rim', 'Gan rim là món ăn được yêu thích quanh năm. Nếu ngày hè nóng nực món gỏi đu đủ gan rim chua cay được ưa chuộng, thì khi đông đến, món gan rim gan rim cay nồng lại cực hợp với xôi trắng.', 'ML1', '../images/monan/ma5_ganrim.jpg', 10000, 1, 8),
(6, 'Ổi dầm xí muội', 'Ổi là một loại quả hấp dẫn tuy nhiên cũng như bao loại quả chua khác, chúng phải kết hợp với cái gì đó thì cái ngon mới phát tiết hết. ổi dầm với xí muội và ớt bột tạo nên một vị rất đặc trưng.', 'ML1', '../images/monan/ma6_oidamximuoi.jpg', 10000, 1, 8),
(7, 'Chanh Dây', 'Trong những ngày hè nóng nực, một ly nước chanh dây mát lạnh sẽ giúp bạn sảng khoái, lấy lại tinh thần, không còn những uể oải do nóng bức nhé.', 'ML1', '../images/monan/ma7_chanhday.jpg', 10000, 1, 8),
(8, 'Nước Ca Cao', 'Ca cao là một loại thức uống vô cùng an toàn và mang lại nhiều lợi ích cho sức khỏe.', 'ML2', '../images/monan/ma8_cacao.jpg', 10000, 1, 8),
(9, 'Nước Dâu', ' Nước ép dâu có lợi cho sức khỏe và làm tan cơn khát của những ngày hè oi ả: ', 'ML1', '../images/monan/ma9_nuocdau.jpg', 10000, 0, 8),
(10, 'Nước Dừa', 'Nước dừa có lợi cho sức khỏe và làm tan cơn khát của những ngày hè oi ả: ', 'ML1', '../images/monan/ma10_nuocdua.jpg', 10000, 0, 8),
(11, 'Bánh mì mật ong', 'Món bánh mì vàng ruộm, thớm nức mùi bơ và vàng óng màu mật ong sẽ là một gợi ý nhanh chóng mà tuyệt ngon cho bữa sáng hoặc các bữa ăn nhẹ cho bạn và gia đình', 'ML2', '../images/monan/BanhMiMO.jpg', 20000, 1, 7),
(12, 'Bánh xoắn lớp', 'Với hình dạng độc đáo bắt mắt vị béo béo mền mền của lớp bánh hòa quyện với lớp bơ đậu phộng thơm ngon tao nên một món ăn vô cùng ngon và đẹp. Nếu bạn tò mò món biết công thức làm món bánh vừa ngon vừa đẹp này hãy đến với hội quán ẩm thực chúng tôi sẽ bật mí cho bạn cách làm bánh bao xoắn thơm ngon dễ thương cho bữa tráng miệng gia đình', 'ML2', '../images/monan/banhxoanlop.jpg', 10000, 1, 8),
(13, 'Chà bông gà cay', 'Một trong những món khô trữ trong nhà vừa ngon vừa lợi, đó chính là chà bông. Có hôm lười biếng, chỉ cần nấu nồi cơm nóng, ăn cùng chà bông gà cũng khiến bạn no bụng ngon lành. Hay một bát cháo nóng hổi, ăn kèm chà bông cay cay mặn mặn cũng hợp vị cực kỳ luôn nha.', 'ML1', '../images/monan/chabonggacay.jpg', 15000, 1, 7),
(14, 'Coconut smoothie', 'là một thức uống pha trộn, pha chế từ trái cây (hoa quả sinh tố) và đôi khi được thêm sô cô la, bơ, đậu phộng. trái cây, nhiều sinh tố bao gồm đá xay,trái cây để lạnh, mật ong hoặc các xi-rôvà các thành phần để lạnh khác. ', 'ML2', '../images/monan/Coconutsmoothie.jpg', 32000, 0, 6),
(15, 'Donut socola', 'Donut phủ sô cô la thơm nồng, mềm mịn cộng lớp socola hòa quyện phủ khắp mặt bánh đầy lôi cuốn. Donut là 1 dòng bánh nức tiếng của phương Tây, cực kỳ yêu thích phục vụ bữa sáng có tách cà phê nóng hổi.\r\n', 'ML2', '../images/monan/donutsocola.jpg', 12000, 1, 6),
(16, 'Hamburger bò', 'Ngoài phần nhân đậm đà, buns (vỏ burger) thơm không ngấy, phần salad tươi giòn, thì nước sốt cũng là một yếu tố vô cùng quan trọng làm nên chiếc burger hoàn hảo', 'ML2', '../images/monan/Hamburger.jpg', 27000, 1, 8.5),
(17, 'Lava cake', '. Phải tinh tế và chuẩn xác vô cùng mới làm được một chiếc bánh có socola tan chảy như dung nham tuôn trào, hương vị ngọt ngào đầy mê đắm. Cùng học cách làm molten lava cake đơn giản nhưng không kém phần thơm ngon ngay tại nhà.', 'ML2', '../images/monan/Lavacake.jpg', 15000, 0, 7),
(18, 'Pizza gà', 'Bánh pizza là món ăn phương Tây, được nhiều người ưa chuộng. Tuy nhiên, không phải cửa hàng nào cũng làm bánh với nhân thịt gà. Bạn hoàn toàn có thể thực hiện món ăn này tại nhà với chiếc lò nướng.', 'ML2', '../images/monan/Pizzaga.jpg', 23000, 0, 7),
(19, 'Tiramisu lát', 'Trong số tất cả các menu món tráng miệng, Creamy Tiramisu là một trong những món tráng miệng phổ biến nhất. Thành phần bí mật là phô mai Mascarpone tự làm tại Đà Lạt. Creamy Tiramisu là sự kết hợp hoàn hảo từ vị đắng của cà phê và vị béo của kem Mascarpone.', 'ML2', '../images/monan/Tiramisulat.jpg', 20000, 0, 7.5),
(20, 'Trà đào', 'Trà đào đang là 1 món đồ uống gây sốt trong giới trẻ. Không chỉ có tác dụng giải nhiệt mà trà đào còn có nhiều lợi ích cho sức khỏe giúp cơ thể luôn sảng khoái, giảm bớt căng thẳng và mệt mỏi.', 'ML1', '../images/monan/tradao.jpg', 29000, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `monan_hinhanh`
--

CREATE TABLE `monan_hinhanh` (
  `MaMonAn` int(50) NOT NULL,
  `MaHinhAnh` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monan_hinhanh`
--

INSERT INTO `monan_hinhanh` (`MaMonAn`, `MaHinhAnh`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(5, 17),
(5, 18),
(5, 19),
(5, 20),
(6, 21),
(6, 22),
(6, 23),
(6, 24),
(7, 25),
(7, 26),
(7, 27),
(7, 28),
(8, 29),
(8, 30),
(8, 31),
(8, 32),
(9, 33),
(9, 34),
(9, 35),
(9, 36),
(10, 37),
(10, 38),
(10, 39),
(10, 40),
(11, 41),
(11, 42),
(11, 43),
(11, 44),
(12, 45),
(12, 46),
(12, 47),
(12, 48),
(13, 49),
(13, 50),
(13, 51),
(13, 52),
(14, 53),
(14, 54),
(14, 55),
(14, 56),
(15, 57),
(15, 58),
(15, 59),
(15, 60),
(16, 61),
(16, 62),
(16, 63),
(16, 64),
(17, 63),
(17, 64),
(17, 65),
(17, 66),
(18, 67),
(18, 68),
(18, 69),
(18, 70),
(19, 71),
(19, 72),
(19, 73),
(19, 74),
(20, 75),
(20, 76),
(20, 77),
(20, 78);

-- --------------------------------------------------------

--
-- Table structure for table `monan_thoitiet`
--

CREATE TABLE `monan_thoitiet` (
  `MaThoiTiet` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MaMonAn` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monan_thoitiet`
--

INSERT INTO `monan_thoitiet` (`MaThoiTiet`, `MaMonAn`) VALUES
('MTT1', 4),
('MTT1', 5),
('MTT1', 6),
('MTT1', 7),
('MTT1', 8),
('MTT1', 9),
('MTT1', 10),
('MTT1', 14),
('MTT2', 1),
('MTT2', 2),
('MTT2', 3),
('MTT2', 4),
('MTT2', 5),
('MTT2', 6),
('MTT2', 7),
('MTT2', 8),
('MTT2', 9),
('MTT2', 10),
('MTT3', 11),
('MTT3', 12),
('MTT3', 13),
('MTT3', 15),
('MTT3', 16),
('MTT3', 17),
('MTT3', 18),
('MTT3', 19),
('MTT3', 20);

-- --------------------------------------------------------

--
-- Table structure for table `phuongtien`
--

CREATE TABLE `phuongtien` (
  `MaPT` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenPT` text COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhMinhHoa` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phuongtien`
--

INSERT INTO `phuongtien` (`MaPT`, `TenPT`, `MoTa`, `HinhMinhHoa`) VALUES
('MPT1', 'không có xe', 'Bạn không muốn đi xe, đi bộ để tận hưởng phong cảnh.', '../images/cauhoi/phuongtien-dibo.jpg'),
('MPT2', 'đi xe đạp', 'Nhóm của bạn đi xe đạp, để tập thể dục và ngắm cảnh xung quanh.', '../images/cauhoi/phuongtien-xedap.jpg'),
('MPT3', 'đi xe máy', 'Nhóm của bạn đi xe máy, đi xa để khám phá về những thứ mới mẻ.', '../images/cauhoi/phuongtien-xemay.jpg'),
('MPT4', 'đi xe ô tô', 'Một chuyến đi ăn cùng với số lượng lớn với gia đình hoặc bạn bè sẽ rất thú vị.', '../images/cauhoi/phuongtien-oto.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `quanan`
--

CREATE TABLE `quanan` (
  `MaQuanAn` int(50) NOT NULL,
  `TenQuanAn` text COLLATE utf8_unicode_ci,
  `MoTa` text COLLATE utf8_unicode_ci,
  `KhongGiaChoTre` tinyint(1) NOT NULL,
  `HinhAnhDaiDien` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhThuc` text COLLATE utf8_unicode_ci NOT NULL,
  `DiaDiem` text COLLATE utf8_unicode_ci NOT NULL,
  `DoiTuong` text COLLATE utf8_unicode_ci NOT NULL,
  `ThoiGianMoCua` text COLLATE utf8_unicode_ci NOT NULL,
  `Diem` float NOT NULL,
  `QuanMoi` tinyint(1) NOT NULL,
  `SrcMap` text COLLATE utf8_unicode_ci NOT NULL,
  `GiaTien` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quanan`
--

INSERT INTO `quanan` (`MaQuanAn`, `TenQuanAn`, `MoTa`, `KhongGiaChoTre`, `HinhAnhDaiDien`, `HinhThuc`, `DiaDiem`, `DoiTuong`, `ThoiGianMoCua`, `Diem`, `QuanMoi`, `SrcMap`, `GiaTien`) VALUES
(1, 'Bánh tráng dì hoa', 'Quán đẹp, giá cả học sinh sinh viên: 1 đĩa bánh bánh từ 10k đến 12k và còn nhiều các món ăn vặt khác như xoài mắm, nem chua rán, ốc.. Bánh tráng rất ngon đặc biệt là ốp la vs bò khô cuộn, Còn nem chua rán là cây nem  ăn trong mấy quán bánh canh đó mà bọc thêm lớp bột thấy cũng dc. Xoài mắm cũng rất ngon', 0, '../images/quanan/quan1_banhtrangdihoa.jpg', 'Ăn vặt/vỉa hè', '62/2A Núi Thành, Quận Hải Châu, Đà Nẵng', 'SINH VIÊN, CẶP ĐÔI, NHÓM HỘI', '02:30 PM - 10:00 PM', 7, 1, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2279.853505014399!2d108.21890612984348!3d16.05296447075607!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c5fe1d328b%3A0x76a4446786bfd55!2zQsOhbmggS-G6uXAgRMOsIEhvYQ!5e0!3m2!1svi!2s!4v1479651377897', '2000đ - 15000đ'),
(2, 'BonPas Bakery & Coffee ', 'Bánh ở đây ngon mà giá ok nữa. Không gian quán rất thích. Mong quán típ tục làm ra nhiều bánh ngon nữa', 0, '../images/quanan/bonpas.jpg', 'Quán ăn phong cách phương tây', '112 Lê Duẩn, Quận Hải Châu, Đà Nẵng', 'SINH VIÊN, CẶP ĐÔI, NHÓM HỘI', '08:00 AM - 10:00 PM', 7, 1, 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3833.898428544355!2d108.2139205142555!3d16.07075974366699!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1482151719129', '15000đ-32000đ');

-- --------------------------------------------------------

--
-- Table structure for table `quanan_hinhanh`
--

CREATE TABLE `quanan_hinhanh` (
  `MaQuanAn` int(50) NOT NULL,
  `MaHinhAnh` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quanan_hinhanh`
--

INSERT INTO `quanan_hinhanh` (`MaQuanAn`, `MaHinhAnh`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `quanan_khonggian`
--

CREATE TABLE `quanan_khonggian` (
  `MaQuanAn` int(50) NOT NULL,
  `MaKhongGian` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quanan_khonggian`
--

INSERT INTO `quanan_khonggian` (`MaQuanAn`, `MaKhongGian`) VALUES
(1, 'MKG1'),
(1, 'MKG2'),
(2, 'MKG2'),
(2, 'MKG3');

-- --------------------------------------------------------

--
-- Table structure for table `quanan_luatuoi`
--

CREATE TABLE `quanan_luatuoi` (
  `MaQuanAn` int(50) NOT NULL,
  `MaLuaTuoi` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quanan_luatuoi`
--

INSERT INTO `quanan_luatuoi` (`MaQuanAn`, `MaLuaTuoi`) VALUES
(1, 'MT1'),
(2, 'MT1');

-- --------------------------------------------------------

--
-- Table structure for table `quanan_monan`
--

CREATE TABLE `quanan_monan` (
  `MaQuanAn` int(50) NOT NULL,
  `MaMonAn` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quanan_monan`
--

INSERT INTO `quanan_monan` (`MaQuanAn`, `MaMonAn`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `quanan_thoigian`
--

CREATE TABLE `quanan_thoigian` (
  `MaQuanAn` int(50) NOT NULL,
  `MaThoiGian` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quanan_thoigian`
--

INSERT INTO `quanan_thoigian` (`MaQuanAn`, `MaThoiGian`) VALUES
(1, 'TG2'),
(1, 'TG3'),
(2, 'TG1'),
(2, 'TG2'),
(2, 'TG3');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `MaThanhVien` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` text COLLATE utf8_unicode_ci NOT NULL,
  `BietDanh` text COLLATE utf8_unicode_ci NOT NULL,
  `SoThich` text COLLATE utf8_unicode_ci NOT NULL,
  `ChamNgon` text COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`MaThanhVien`, `HoTen`, `BietDanh`, `SoThich`, `ChamNgon`, `img`) VALUES
('1', 'Lê Thị Chung', 'Chung tốt bụng', 'giúp đỡ người khác , thích ăn ,ngủ ', 'Better late than never', '../images/thanhvien/chung.jpg'),
('2', 'Nguyên Văn Hà', 'Hà siêu điên', 'hay bắt nạt những ké yếu đuối ví dụ như Chung ', 'Việc hôm nay chứ để ngay mai', '../images/thanhvien/ha.jpg'),
('3', ' Trần Lê Thanh Phan', 'Phan Khùng', 'Sở dĩ tôi đặt tên như vậy là vì lúc đó thần kinh tôi không được ổn định và cũng vì một lý do đơn giản là quên uống thuốc. tôi thành thực xin lỗi mọi người rất nhiều Tôi thích hành hạ các bạn những chú ông chăm chỉ khác mỗi ngày ', 'Dont give up bắt nạt người khác', '../images/thanhvien/Phan.jpg'),
('4', 'Trần Hoàng Phúc', 'Phúc đẹp trai', 'chơi game', 'game là số 1', '../images/thanhvien/phuc.jpg'),
('5', 'Lê Thị Phương Thảo', 'Thảo dịu dàng và xinh đẹp', 'love anh Phương bên bách khoa', 'Học mợi lúc mọi nơ mọi thời điểm', '../images/thanhvien/Thao.jpg'),
('6', 'Nguyễn Phước Thành', 'Thành ham học', 'chơi nhảy dây', 'Học, học nữa, học mãi', '../images/thanhvien/thanh.jpeg'),
('7', 'Ngô Đình Minh quân', 'Quân đập trai', 'chơi game', 'game là số 1', '../images/thanhvien/quan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `thoigian`
--

CREATE TABLE `thoigian` (
  `MaThoiGian` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenThoiGian` text COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhMinhHoa` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thoigian`
--

INSERT INTO `thoigian` (`MaThoiGian`, `TenThoiGian`, `MoTa`, `HinhMinhHoa`) VALUES
('TG1', 'Buổi Sáng', 'Hệ chuyên gia sẽ tim kiếm những quán mở cửa vào buổi sáng ', '../images/cauhoi/thoigian-buoisang.jpg'),
('TG2', 'Buổi Chiều', 'Hệ chuyên gia sẽ tim kiếm những quán mở cửa vào buổi chiều ', '../images/cauhoi/thoigian-buoichieu.jpg'),
('TG3', 'Buổi tối', 'Hệ chuyên gia sẽ tim kiếm những quán mở cửa vào buổi tối ', '../images/cauhoi/thoigian-buoitoi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `thoitiet`
--

CREATE TABLE `thoitiet` (
  `MaThoiTiet` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenThoaiTiet` text COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhMinhHoa` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thoitiet`
--

INSERT INTO `thoitiet` (`MaThoiTiet`, `TenThoaiTiet`, `MoTa`, `HinhMinhHoa`) VALUES
('MTT1', 'Nắng', 'Nếu thời tiết quá nóng thì thích hợp hơn với những món ăn giải nhiệt lạnh, giải khát, ngọt.\r\n', '../images/cauhoi/thoitiet-mat.jpg'),
('MTT2', 'Lạnh', ' Nếu thời tiết quá lạnh thì thích hợp hơn với những món ăn nóng , nướng , cay.\r\n', '../images/cauhoi/thoitiet-lanh.jpg'),
('MTT3', 'Mát', 'Thời tiết mát phù hợp với mọi món ăn, bạn có thể thỏa sức khám phá', '../images/cauhoi/thoitiet-nang.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `treem`
--

CREATE TABLE `treem` (
  `MaLuaChon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` text COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhMinhHoa` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `treem`
--

INSERT INTO `treem` (`MaLuaChon`, `Ten`, `MoTa`, `HinhMinhHoa`) VALUES
('LC1', 'Có Em Bé', 'Quán có không gian chơi cho trẻ ,đề bạn có thể thoải mái vui chơi.', '../images/cauhoi/treem-co.jpg'),
('LC2', 'không Có', 'Bạn không dẫn theo trẻ con, nên không thành vấn đề .', '../images/cauhoi/treem-khong.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blmonan`
--
ALTER TABLE `blmonan`
  ADD PRIMARY KEY (`MaMonAn`,`ThoiGian`);

--
-- Indexes for table `blquanan`
--
ALTER TABLE `blquanan`
  ADD PRIMARY KEY (`MaQuanAn`,`ThoiGian`);

--
-- Indexes for table `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`MaCauHoi`);

--
-- Indexes for table `hinhanhmonan`
--
ALTER TABLE `hinhanhmonan`
  ADD PRIMARY KEY (`MaHinhAnh`);

--
-- Indexes for table `hinhanhquanan`
--
ALTER TABLE `hinhanhquanan`
  ADD PRIMARY KEY (`MaHinhAnh`);

--
-- Indexes for table `khonggian`
--
ALTER TABLE `khonggian`
  ADD PRIMARY KEY (`MaKhongGian`);

--
-- Indexes for table `loaithucan`
--
ALTER TABLE `loaithucan`
  ADD PRIMARY KEY (`MaLoaiTA`);

--
-- Indexes for table `luachonmon`
--
ALTER TABLE `luachonmon`
  ADD PRIMARY KEY (`LuaChon`),
  ADD KEY `PK_luachonmon_MonAn` (`ChonMon`);

--
-- Indexes for table `luachonquan`
--
ALTER TABLE `luachonquan`
  ADD PRIMARY KEY (`LuaChon`),
  ADD KEY `PK_luachonquan_QuanAn` (`ChonQuan`);

--
-- Indexes for table `luatuoi`
--
ALTER TABLE `luatuoi`
  ADD PRIMARY KEY (`MaLuaTuoi`);

--
-- Indexes for table `luongtien`
--
ALTER TABLE `luongtien`
  ADD PRIMARY KEY (`MaLT`);

--
-- Indexes for table `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`MaMonAn`),
  ADD KEY `PK_mon_loaithucan` (`MaLoaiTA`);

--
-- Indexes for table `monan_hinhanh`
--
ALTER TABLE `monan_hinhanh`
  ADD PRIMARY KEY (`MaMonAn`,`MaHinhAnh`),
  ADD KEY `MaHinhAnh` (`MaHinhAnh`);

--
-- Indexes for table `monan_thoitiet`
--
ALTER TABLE `monan_thoitiet`
  ADD PRIMARY KEY (`MaThoiTiet`,`MaMonAn`),
  ADD KEY `MaMonAn` (`MaMonAn`);

--
-- Indexes for table `phuongtien`
--
ALTER TABLE `phuongtien`
  ADD PRIMARY KEY (`MaPT`);

--
-- Indexes for table `quanan`
--
ALTER TABLE `quanan`
  ADD PRIMARY KEY (`MaQuanAn`);

--
-- Indexes for table `quanan_hinhanh`
--
ALTER TABLE `quanan_hinhanh`
  ADD PRIMARY KEY (`MaQuanAn`,`MaHinhAnh`),
  ADD KEY `MaHinhAnh` (`MaHinhAnh`);

--
-- Indexes for table `quanan_khonggian`
--
ALTER TABLE `quanan_khonggian`
  ADD PRIMARY KEY (`MaQuanAn`,`MaKhongGian`),
  ADD KEY `quanan_khonggian_ibfk_2` (`MaKhongGian`);

--
-- Indexes for table `quanan_luatuoi`
--
ALTER TABLE `quanan_luatuoi`
  ADD PRIMARY KEY (`MaQuanAn`,`MaLuaTuoi`),
  ADD KEY `MaLuaTuoi` (`MaLuaTuoi`);

--
-- Indexes for table `quanan_monan`
--
ALTER TABLE `quanan_monan`
  ADD PRIMARY KEY (`MaQuanAn`,`MaMonAn`),
  ADD KEY `MaMonAn` (`MaMonAn`);

--
-- Indexes for table `quanan_thoigian`
--
ALTER TABLE `quanan_thoigian`
  ADD PRIMARY KEY (`MaQuanAn`,`MaThoiGian`),
  ADD KEY `MaThoiGian` (`MaThoiGian`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`MaThanhVien`);

--
-- Indexes for table `thoigian`
--
ALTER TABLE `thoigian`
  ADD PRIMARY KEY (`MaThoiGian`);

--
-- Indexes for table `thoitiet`
--
ALTER TABLE `thoitiet`
  ADD PRIMARY KEY (`MaThoiTiet`);

--
-- Indexes for table `treem`
--
ALTER TABLE `treem`
  ADD PRIMARY KEY (`MaLuaChon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hinhanhmonan`
--
ALTER TABLE `hinhanhmonan`
  MODIFY `MaHinhAnh` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `hinhanhquanan`
--
ALTER TABLE `hinhanhquanan`
  MODIFY `MaHinhAnh` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `luachonmon`
--
ALTER TABLE `luachonmon`
  MODIFY `LuaChon` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
--
-- AUTO_INCREMENT for table `luachonquan`
--
ALTER TABLE `luachonquan`
  MODIFY `LuaChon` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `monan`
--
ALTER TABLE `monan`
  MODIFY `MaMonAn` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `quanan`
--
ALTER TABLE `quanan`
  MODIFY `MaQuanAn` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blmonan`
--
ALTER TABLE `blmonan`
  ADD CONSTRAINT `blmonan_ibfk_1` FOREIGN KEY (`MaMonAn`) REFERENCES `monan` (`MaMonAn`);

--
-- Constraints for table `blquanan`
--
ALTER TABLE `blquanan`
  ADD CONSTRAINT `blquanan_ibfk_1` FOREIGN KEY (`MaQuanAn`) REFERENCES `quanan` (`MaQuanAn`);

--
-- Constraints for table `luachonmon`
--
ALTER TABLE `luachonmon`
  ADD CONSTRAINT `PK_luachonmon_MonAn` FOREIGN KEY (`ChonMon`) REFERENCES `monan` (`MaMonAn`);

--
-- Constraints for table `luachonquan`
--
ALTER TABLE `luachonquan`
  ADD CONSTRAINT `PK_luachonquan_QuanAn` FOREIGN KEY (`ChonQuan`) REFERENCES `quanan` (`MaQuanAn`);

--
-- Constraints for table `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `PK_mon_loaithucan` FOREIGN KEY (`MaLoaiTA`) REFERENCES `loaithucan` (`MaLoaiTA`);

--
-- Constraints for table `monan_hinhanh`
--
ALTER TABLE `monan_hinhanh`
  ADD CONSTRAINT `monan_hinhanh_ibfk_1` FOREIGN KEY (`MaMonAn`) REFERENCES `monan` (`MaMonAn`),
  ADD CONSTRAINT `monan_hinhanh_ibfk_2` FOREIGN KEY (`MaHinhAnh`) REFERENCES `hinhanhmonan` (`MaHinhAnh`);

--
-- Constraints for table `monan_thoitiet`
--
ALTER TABLE `monan_thoitiet`
  ADD CONSTRAINT `monan_thoitiet_ibfk_1` FOREIGN KEY (`MaMonAn`) REFERENCES `monan` (`MaMonAn`),
  ADD CONSTRAINT `monan_thoitiet_ibfk_2` FOREIGN KEY (`MaThoiTiet`) REFERENCES `thoitiet` (`MaThoiTiet`);

--
-- Constraints for table `quanan_hinhanh`
--
ALTER TABLE `quanan_hinhanh`
  ADD CONSTRAINT `quanan_hinhanh_ibfk_1` FOREIGN KEY (`MaQuanAn`) REFERENCES `quanan` (`MaQuanAn`),
  ADD CONSTRAINT `quanan_hinhanh_ibfk_2` FOREIGN KEY (`MaHinhAnh`) REFERENCES `hinhanhquanan` (`MaHinhAnh`);

--
-- Constraints for table `quanan_khonggian`
--
ALTER TABLE `quanan_khonggian`
  ADD CONSTRAINT `quanan_khonggian_ibfk_1` FOREIGN KEY (`MaQuanAn`) REFERENCES `quanan` (`MaQuanAn`),
  ADD CONSTRAINT `quanan_khonggian_ibfk_2` FOREIGN KEY (`MaKhongGian`) REFERENCES `khonggian` (`MaKhongGian`);

--
-- Constraints for table `quanan_luatuoi`
--
ALTER TABLE `quanan_luatuoi`
  ADD CONSTRAINT `quanan_luatuoi_ibfk_1` FOREIGN KEY (`MaQuanAn`) REFERENCES `quanan` (`MaQuanAn`),
  ADD CONSTRAINT `quanan_luatuoi_ibfk_2` FOREIGN KEY (`MaLuaTuoi`) REFERENCES `luatuoi` (`MaLuaTuoi`);

--
-- Constraints for table `quanan_monan`
--
ALTER TABLE `quanan_monan`
  ADD CONSTRAINT `quanan_monan_ibfk_1` FOREIGN KEY (`MaQuanAn`) REFERENCES `quanan` (`MaQuanAn`),
  ADD CONSTRAINT `quanan_monan_ibfk_2` FOREIGN KEY (`MaMonAn`) REFERENCES `monan` (`MaMonAn`);

--
-- Constraints for table `quanan_thoigian`
--
ALTER TABLE `quanan_thoigian`
  ADD CONSTRAINT `quanan_thoigian_ibfk_1` FOREIGN KEY (`MaQuanAn`) REFERENCES `quanan` (`MaQuanAn`),
  ADD CONSTRAINT `quanan_thoigian_ibfk_2` FOREIGN KEY (`MaThoiGian`) REFERENCES `thoigian` (`MaThoiGian`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
