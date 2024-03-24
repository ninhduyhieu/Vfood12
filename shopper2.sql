-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 14, 2024 lúc 09:19 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopper`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`) VALUES
(1, 'Emonzz', '3b9c8abb2fe2c5539bc49fb744c89b94', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_hoa_don`
--

CREATE TABLE `chi_tiet_hoa_don` (
  `MaHD` int(11) NOT NULL,
  `MaSPCT` int(11) NOT NULL,
  `count` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `tra_lai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_hoa_don`
--

INSERT INTO `chi_tiet_hoa_don` (`MaHD`, `MaSPCT`, `count`, `price`, `tra_lai`) VALUES
(1, 1, 2, 350000, NULL),
(1, 6, 1, 599000, NULL),
(2, 5, 1, 2900000, NULL),
(2, 7, 1, 9990000, NULL),
(3, 1, 2, 350000, NULL),
(4, 29, 1, 990000, NULL),
(5, 14, 1, 799000, NULL),
(6, 19, 1, 3990000, NULL),
(7, 2, 1, 499000, NULL),
(7, 10, 1, 9990000, NULL),
(8, 20, 1, 700000, NULL),
(9, 2, 2, 499000, NULL),
(9, 11, 2, 5500000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(3, 'Hieu', 'ninhduyhieu07092004@gmail.com', 'môn này sẽ được A'),
(6, 'vfood', 'ninhduyhieu07092004@gmail.com', 'Đây là website thời trang\n'),
(8, 'dsfsad', 'ninhduyhieu07092004@gmail.com', 'Đồ đẹp lắm'),
(10, 'Hieu', 'ninhduyhieu07092004@gmail.com', 'con cá trong bể cá'),
(14, '', '', ''),
(15, 'Hieu', 'ninhduyhieu07092004@gmail.com', 'fsfCVfƯEFW'),
(16, '', '', ''),
(17, 'Hieu', 'ninhduyhieu07092004@gmail.com', 'giang cute'),
(18, '', '', ''),
(19, '', '', ''),
(20, '', '', ''),
(21, '', '', ''),
(22, '', '', ''),
(23, '', '', ''),
(24, '', '', ''),
(25, 'Hieu', 'ninhduyhieu07092004@gmail.com', 'Chúng con muốn A môn này');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `MaDM` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`MaDM`, `name`, `status`) VALUES
(1, 'Men\'s Dresses', NULL),
(2, 'Women\'s dresses', NULL),
(3, 'Kid\'s Dresses', NULL),
(4, 'Bags', NULL),
(5, 'Accerssories', NULL),
(6, 'Shoes', NULL),
(7, 'A plus', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `MaHD` int(11) NOT NULL,
  `ngay_HD` datetime DEFAULT current_timestamp(),
  `name_nguoinhan` varchar(100) DEFAULT NULL,
  `address_nguoinhan` varchar(200) DEFAULT NULL,
  `phone_nguoinhan` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subtotal` float NOT NULL,
  `total` float NOT NULL,
  `ngay_giao_hang` datetime DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 1,
  `MaKH` int(11) DEFAULT NULL,
  `MaPTVC` int(11) DEFAULT NULL,
  `MaPTTT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`MaHD`, `ngay_HD`, `name_nguoinhan`, `address_nguoinhan`, `phone_nguoinhan`, `email`, `subtotal`, `total`, `ngay_giao_hang`, `status`, `MaKH`, `MaPTVC`, `MaPTTT`) VALUES
(1, '2023-07-07 18:01:35', 'Emonzz', 'Ha Noi', '0352785232', 'hoangviet02102004@gmail.com', 1299000, 1329000, '2023-07-17 18:01:35', 2, NULL, NULL, NULL),
(2, '2023-07-18 00:45:52', 'Hoang Viet', 'Ho Chi Minh City', '0966438109', 'hoangviet02102004@gmail.com', 12890000, 12920000, '2023-07-18 00:45:52', 2, NULL, NULL, NULL),
(3, '2023-12-30 20:35:27', 'Hieu', 'B6 KTX', '0707964936', 'ninhduyhieu07092004@gmail.com', 700000, 730000, '2023-12-30 20:35:27', 2, NULL, NULL, NULL),
(4, '2024-01-03 11:29:04', 'Hieu', 'B6 KTX', '0707964936', 'ninhduyhieu07092004@gmail.com', 990000, 1020000, '2024-01-03 11:29:04', 2, NULL, NULL, NULL),
(5, '2024-01-06 22:17:43', 'Hieu', 'B6 KTX', '0707964936', 'ninhduyhieu07092004@gmail.com', 799000, 829000, '2024-01-06 22:17:43', 2, NULL, NULL, NULL),
(6, '2024-01-10 11:58:41', 'Hieu', 'B6 KTX', '0707964936', 'ninhduyhieu07092004@gmail.com', 3990000, 4020000, '2024-01-10 11:58:41', 2, NULL, NULL, NULL),
(7, '2024-01-13 19:13:03', 'Hieu', 'B6 KTX', '0707964936', 'ninhduyhieu07092004@gmail.com', 10489000, 10519000, '2024-01-13 19:13:03', 2, NULL, NULL, NULL),
(8, '2024-01-14 08:23:41', 'Hieu', 'B6 KTX', '0707964936', 'ninhduyhieu07092004@gmail.com', 700000, 730000, '2024-01-14 08:23:41', 2, NULL, NULL, NULL),
(9, '2024-01-14 12:31:07', 'catecute', 'B6 KTX', '0707964936', 'ninhduyhieu07092004@gmail.com', 11998000, 12028000, '2024-01-14 12:31:07', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `MaKH` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `ngay_cap_nhat` datetime DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `tich_diem` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`MaKH`, `name`, `username`, `password`, `address`, `phone`, `email`, `birth`, `ngay_cap_nhat`, `gender`, `tich_diem`, `status`) VALUES
(1, 'Emonzz', 'Emonzz', '3b9c8abb2fe2c5539bc49fb744c89b94', NULL, NULL, 'hoangviet02102004@gmail.com', NULL, NULL, NULL, NULL, NULL),
(2, 'Hieu', 'Hieu', '7dd5fda3ee08d85a200ef45c7cd0ab3c', NULL, NULL, 'ninhduyhieu07092004@gmail.com', NULL, NULL, NULL, NULL, NULL),
(3, 'Hieu', 'Hieu', '7dd5fda3ee08d85a200ef45c7cd0ab3c', NULL, NULL, 'ninhduyhieu07092004@gmail.com', NULL, NULL, NULL, NULL, NULL),
(4, 'Hieu', 'Hieu', '7dd5fda3ee08d85a200ef45c7cd0ab3c', NULL, NULL, 'ninhduyhieu07092004@gmail.com', NULL, NULL, NULL, NULL, NULL),
(5, 'catecute', 'Cate', '48e84c9a97d7adf7ca52a8b7b24b58dd', NULL, NULL, 'ninhduyhieu07092004@gmail.com', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `email`, `rating`, `comment`, `created_at`) VALUES
(13, 1, 'ninhduyhieu07092004@gmail.com', 1, 'hihiihi', '2024-01-04 10:51:21'),
(14, 1, 'ninhduyhieu07092004@gmail.com', 3, 'fdgagfgfewbb', '2024-01-04 10:59:16'),
(15, 1, 'ninhduyhieu07092004@gmail.com', 3, 'gagwqg', '2024-01-04 11:07:03'),
(16, 0, 'ninhduyhieu07092004@gmail.com', 3, 'thu giang xinh quá', '2024-01-05 03:10:09'),
(17, 0, 'ninhduyhieu07092004@gmail.com', 3, 'thu giang xinh quá', '2024-01-05 03:10:13'),
(18, 0, 'ninhduyhieu07092004@gmail.com', 3, 'thu giang xinh quá', '2024-01-05 03:10:15'),
(19, 0, 'ninhduyhieu07092004@gmail.com', 3, 'thu giang xinh quá', '2024-01-05 03:41:11'),
(20, 2, 'ninhduyhieu07092004@gmail.com', 2, 'sdasadfadsf', '2024-01-05 04:15:03'),
(21, 2, 'ninhduyhieu07092004@gmail.com', 2, 'fasdfdsf', '2024-01-05 04:15:49'),
(23, 10, 'ninhduyhieu07092004@gmail.com', 1, 'áDFsdgsd', '2024-01-05 04:22:44'),
(24, 10, 'ninhduyhieu07092004@gmail.com', 2, 'ẻtgtasg', '2024-01-05 04:34:22'),
(25, 10, 'ninhduyhieu07092004@gmail.com', 2, 'sadfsadf', '2024-01-05 04:35:10'),
(26, 10, 'ninhduyhieu07092004@gmail.com', 4, 'giang cute quá', '2024-01-05 04:46:12
(27, 3, 'ninhduyhieu07092004@gmail.com', 2, 'Giang đáng iu ghê', '2024-01-05 04:46:42'),
(28, 4, 'ninhduyhieu07092004@gmail.com', 1, 'dsafasdfd', '2024-01-05 04:47:20'),
(29, 6, 'ninhduyhieu07092004@gmail.com', 5, 'anh yêu em', '2024-01-05 16:11:19'),
(42, 10, 'ninhduyhieu07092004@gmail.com', 3, 'fdsgsdfg', '2024-01-05 18:16:13'),
(63, 19, 'ninhduyhieu07092004@gmail.com', 3, 'fsasadfasdf', '2024-01-05 19:21:35'),
(64, 19, 'ninhduyhieu07092004@gmail.com', 1, 'zfgsdgdasg', '2024-01-05 19:22:12'),
(65, 19, 'ninhduyhieu07092004@gmail.com', 1, 'zfgsdgdasg', '2024-01-05 19:22:32'),
(66, 19, 'ninhduyhieu07092004@gmail.com', 3, 'ádfawefef', '2024-01-05 19:23:04'),
(68, 10, 'ninhduyhieu07092004@gmail.com', 5, 'giang cute', '2024-01-06 05:27:01'),
(69, 6, 'ninhduyhieu07092004@gmail.com', 3, 'wefawef', '2024-01-06 07:26:38'),
(70, 6, 'ninhduyhieu07092004@gmail.com', 4, 'kuhgybiubvvigiyf', '2024-01-06 07:35:02'),
(71, 21, 'ninhduyhieu07092004@gmail.com', 5, 'anh yêu em', '2024-01-06 07:46:40'),
(72, 21, 'ninhduyhieu07092004@gmail.com', 1, 'ấdfsd', '2024-01-06 07:56:45'),
(73, 30, 'ninhduyhieu07092004@gmail.com', 3, 'sdfasdgasdf', '2024-01-09 07:44:54'),
(74, 10, 'ninhduyhieu07092004@gmail.com', 4, 'óadhauhfuds', '2024-01-10 04:54:45'),
(75, 11, 'ninhduyhieu07092004@gmail.com', 5, 'Cô chúng em là tuyệt nhất', '2024-01-14 05:34:15'),
(76, 11, 'ninhduyhieu07092004@gmail.com', 5, 'Mong cô cho chúng em điểm A', '2024-01-14 05:34:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `MaSP` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `information` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `gia_nhap` float DEFAULT NULL,
  `gia_cu` float DEFAULT NULL,
  `gia_moi` float DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `ngay_cap_nhat` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `MaDM` int(11) DEFAULT NULL,
  `MaNH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`MaSP`, `name`, `description`, `information`, `image`, `gia_nhap`, `gia_cu`, `gia_moi`, `view`, `ngay_cap_nhat`, `status`, `MaDM`, `MaNH`) VALUES
(1, 'Relaxed Fit T-shirt Ninh DUy Hieu', 'Relaxed-fit T-shirt in soft cotton jersey with a printed design. Ribbed crew neck and dropped shoulders.( Duy Hiếu)', NULL, 'prd_1.jpg', NULL, 499000, 505500, NULL, NULL, 1, 1, NULL),
(2, 'Slim Fit Polo Shirt', 'Slim-fit polo shirt in soft cotton jersey. Collar, button placket, and short sleeves.', NULL, 'prd_2.jpg', NULL, 599000, 499000, NULL, NULL, 1, 1, NULL),
(3, 'Tank Top', 'Tank top in cotton jersey. Narrow ribbing at neckline, deep armholes with raw edges, and short slits at sides.', NULL, 'prd_3.jpg', NULL, 350000, 250000, NULL, NULL, 1, 1, NULL),
(4, 'Cargo Joggers', 'Joggers in woven cotton fabric. Waistband with drawstring and covered elastic. Diagonal side pockets, back pockets with flap and concealed snap fasteners, and leg pockets with flap and concealed snap fasteners.', NULL, 'prd_4.jpg', NULL, 3000000, 1990000, NULL, NULL, 1, 1, NULL),
(5, 'Skinny Fit Suit Pants', 'Skinny-fit suit pants in woven stretch fabric with creased legs. Zip fly with concealed hook-and-eye fastener, side pockets, and welt back pockets.', NULL, 'prd_5.jpg', NULL, 4000000, 2900000, NULL, NULL, 1, 1, NULL),
(6, 'Relaxed Fit Nylon Cargo Shorts', 'Relaxed-fit, knee-length cargo shorts in nylon. Covered elastic at waistband, elasticized drawstring with cord stopper, and mock fly. Side pockets with zipper, welt back pockets.', NULL, 'prd_6.jpg', NULL, 700000, 599000, NULL, NULL, 1, 1, NULL),
(7, 'Slim Fit Jacket', 'Slim-fit, single-breasted jacket in woven stretch fabric. Narrow, notched lapels with a decorative buttonhole, two buttons at front, and decorative buttons at cuffs. Chest pocket, front pockets with flap, and one inner pocket.', NULL, 'prd_7.jpg', NULL, 12000000, 9990000, NULL, NULL, 1, 1, NULL),
(8, 'Skinny Fit Jacket', 'Skinny-fit, single-breasted jacket in woven stretch fabric. Narrow, notched lapels and decorative buttons at cuffs. Chest pocket, front pockets with flap, and an inner pocket.', NULL, 'prd_8.jpg', NULL, 12000000, 9990000, NULL, NULL, 1, 1, NULL),
(9, 'Regular Double-breasted Jacket', 'Regular-fit, double-breasted jacket in woven lyocell. Pointed lapels, a chest pocket, welt front pockets with flap, and two inner pockets. Buttons at cuffs and a double vent at back', NULL, 'prd_9.jpg', NULL, 15000000, 12500000, NULL, NULL, 1, 1, NULL),
(10, 'Twist-detail Dress', 'Calf-length dress in soft, woven fabric. Draped collar, opening at front with a twisted detail, and short, wide sleeves with an opening. Concealed zipper at back with hook-and-eye fastening.', NULL, 'prd_10.jpg', NULL, 12000000, 9990000, NULL, NULL, 1, 2, NULL),
(11, 'Balloon-sleeved Chiffon Dress', 'Ankle-length dress in crêped chiffon. Low-cut V-neck, defined waist with gathers and delicate piping, concealed zipper at back, and long balloon sleeves with narrow elastic at cuffs.', NULL, 'prd_11.jpg', NULL, 7000000, 5500000, NULL, NULL, 1, 2, NULL),
(12, 'Crinkled Dress', 'Short dress in woven, crinkled fabric. Round neckline, small opening at back of neck with a concealed button, gently dropped shoulders, and long, wide sleeves. ', NULL, 'prd_12.jpg', NULL, 3000000, 2500000, NULL, NULL, 1, 2, NULL),
(13, 'Boxy Cotton Shirt', 'Short, loose-fit, boxy shirt in woven cotton fabric. Collar, buttons at front, and an open chest pocket. Dropped shoulders and long sleeves with button at cuffs.', NULL, 'prd_13.jpg', NULL, 700000, 550000, NULL, NULL, 1, 2, NULL),
(14, 'Oversized Twill Shirt', 'Oversized shirt in soft twill. Collar, concealed button placket, open chest pockets, and a yoke at back. Heavily dropped shoulders and long sleeves with sleeve placket, link button, and button at cuffs.', NULL, 'prd_14.jpg', NULL, 1500000, 799000, NULL, NULL, 1, 2, NULL),
(15, 'Blouse with Tie Detail', 'Short blouse in woven, textured fabric. Collar, V-shaped neckline, wide, elbow-length sleeves, and wide ties at front of waist.', NULL, 'prd_15.jpg', NULL, 650000, 550000, NULL, NULL, 1, 2, NULL),
(16, 'Denim cargo trousers', 'Loose-fit cargo trousers in denim with a high waist and a zip fly and button. Diagonal front pockets, back pockets and straight legs with bellows pockets and decorative seams.', NULL, 'prd_16.jpg', NULL, 900000, 7000000, NULL, NULL, 1, 2, NULL),
(17, 'Parachute Pants', 'Relaxed-fit pants in crisp woven fabric with a regular waist. Drawstring at waistband with cord stopper. Diagonal side pockets, mock back pockets with flap, and wide legs with pleats at sides of knees for added volume', NULL, 'prd_17.jpg', NULL, 900000, 700000, NULL, NULL, 1, 2, NULL),
(18, 'Oversized blazer', 'Oversized, single-breasted blazer in woven fabric with notch lapels and one button at the front. Shoulder pads, long sleeves, a fake chest pocket and jetted front pockets with a flap.', NULL, 'prd_18.jpg', NULL, 13000000, 8990000, NULL, NULL, 1, 2, NULL),
(19, 'Oversized Printed Baseball Jacket', 'Oversized baseball jacket in sweatshirt fabric with a printed design and soft, brushed inside. Low collar, snap fasteners at front, dropped shoulders, and welt front pockets.', NULL, 'prd_19.jpg', NULL, 5000000, 3990000, NULL, NULL, 1, 3, NULL),
(20, '2-piece Sweatsuit', 'Cozy set in lightweight sweatshirt fabric. Crew-neck sweatshirt with dropped shoulders, long sleeves, and ribbing at neck, cuffs, and hem.', NULL, 'prd_20.jpg', NULL, 900000, 700000, NULL, NULL, 1, 3, NULL),
(21, 'Printed Hoodie', 'Loose-fit hooded sweatshirt jacket in lightweight fabric with a cheerful, printed pattern. Lined hood with wrapover front, dropped shoulders, and ribbing at cuffs and hem.', NULL, 'prd_21.jpg', NULL, 700000, 499000, NULL, NULL, 1, 3, NULL),
(22, 'Oversized Baseball Jacket', 'Oversized, color-block baseball jacket in cotton-blend sweatshirt fabric with soft, brushed inside. Low collar, snap fasteners at front, dropped shoulders, and long sleeves.', NULL, 'prd_22.jpg', NULL, 1200000, 799000, NULL, NULL, 1, 3, NULL),
(23, 'Jacquard-weave Shopper', 'Jacquard-weave shopper with two handles at top and an inner compartment with zipper. ', NULL, 'prd_23.jpg', NULL, 1300000, 799000, NULL, NULL, 1, 4, NULL),
(24, 'Quilted Shoulder Bag', 'Shoulder bag in quilted, coated fabric. Narrow, detachable shoulder strap, zipper, and chunky handle at top.', NULL, 'prd_24.jpg', NULL, 1500000, 1200000, NULL, NULL, 1, 4, NULL),
(25, 'Cotton Canvas Changing Bag', 'Changing bag in thick cotton canvas with several practical compartments for easily finding what you need at changing time. Removable divider inside stays in place with hook-loop fastening. ', NULL, 'prd_25.jpg', NULL, 3000000, 1500000, NULL, NULL, 1, 4, NULL),
(26, 'High Tops', 'High tops with a padded edge, padded tongue, and hook-loop tab and lacing at front. Ripstop loop at back.', NULL, 'prd_26.jpg', NULL, 4500000, 3000000, NULL, NULL, 1, 6, NULL),
(27, 'Chelsea Boots', 'Chelsea boots with an elasticized panel at one side and zipper at other side. Grosgrain loop at front and back. Velour lining, insoles in Cellfit™ technical foam for added comfort, and chunky soles with good grip.', NULL, 'prd_27.jpg', NULL, 7500000, 6500000, NULL, NULL, 1, 6, NULL),
(28, 'Sneakers', 'Sneakers with a lightly padded upper edge and tongue, hook-loop tabs at front, and a grosgrain loop at back. Soft, mesh lining and insoles.', NULL, 'prd_28.jpg', NULL, 1000000, 799000, NULL, NULL, 1, 6, NULL),
(29, 'Patterned Scarf', 'Patterned scarf in airy, woven fabric.', NULL, 'prd_29.jpg', NULL, 1200000, 990000, NULL, NULL, 1, 5, NULL),
(30, 'Rib-knit Hat', 'Rib-knit hat in a soft cotton blend with a foldover cuff.', NULL, 'prd_30.jpg', NULL, 550000, 350000, NULL, NULL, 1, 5, NULL),
(31, 'Polarized Sunglasses', 'Cat eye sunglasses with plastic frames and sidepieces. Tinted, polarized, UV-protective plastic lenses.', NULL, 'prd_31.jpg', NULL, 700000, 550000, NULL, NULL, 1, 5, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD PRIMARY KEY (`MaHD`,`MaSPCT`),
  ADD KEY `MaSPCT` (`MaSPCT`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `MaKH` (`MaKH`),
  ADD KEY `MaPTVC` (`MaPTVC`),
  ADD KEY `MaPTTT` (`MaPTTT`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaLSP` (`MaDM`),
  ADD KEY `MaNH` (`MaNH`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD CONSTRAINT `chi_tiet_hoa_don_ibfk_1` FOREIGN KEY (`MaHD`) REFERENCES `hoa_don` (`MaHD`),
  ADD CONSTRAINT `chi_tiet_hoa_don_ibfk_2` FOREIGN KEY (`MaSPCT`) REFERENCES `san_pham` (`MaSP`);

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khach_hang` (`MaKH`),
  ADD CONSTRAINT `hoa_don_ibfk_2` FOREIGN KEY (`MaPTVC`) REFERENCES `pt_van_chuyen` (`MaPTVC`),
  ADD CONSTRAINT `hoa_don_ibfk_3` FOREIGN KEY (`MaPTTT`) REFERENCES `pt_thanh_toan` (`MaPTTT`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`MaDM`) REFERENCES `danh_muc` (`MaDM`),
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`MaNH`) REFERENCES `nhan_hieu` (`MaNH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
