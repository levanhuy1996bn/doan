-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 20, 2018 lúc 01:56 PM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fashion`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `image`, `created_date`, `updated_date`) VALUES
(1, 'Gucci', 'gucci.jpg', '2018-01-27', '2018-05-18'),
(2, 'LV', '11lv.gif', '2018-01-27', '2018-05-18'),
(3, 'Dior', '4dior.jpg', '2018-01-27', '2018-05-18'),
(4, 'Prada', '88prada.jpg', '2018-01-27', '2018-05-18'),
(5, 'Versace', '87versace.jpg', '2018-01-27', '2018-05-18'),
(6, 'Dolce & Gabbana', '3DandG.png', '2018-01-27', '2018-05-18'),
(7, 'Armani', 'armani12.png', '2018-01-27', '2018-05-18'),
(8, 'Adidas', 'adidas12.jpg', '2018-01-27', '2018-05-18'),
(9, 'Chanel', '1chanel.jpg', '2018-01-27', '2018-05-18'),
(10, 'Hermes', '32hermes.jpg', '2018-01-27', '2018-05-18'),
(11, 'Burberry', 'burberry12.jpg', '2018-01-27', '2018-05-18'),
(12, 'Nike', '45nike.jpg', '2018-01-27', '2018-05-18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `obj_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `obj_id`, `name`, `created_date`, `updated_date`) VALUES
(1, 1, 'Áo Khoác Nam', '2018-01-27', '2018-04-25'),
(2, 1, 'Áo Thun Nam', '2018-01-27', '0000-00-00'),
(3, 1, 'Áo Sơ Mi Nam', '2018-01-27', '0000-00-00'),
(4, 2, 'Áo Sơ Mi Nữ', '2018-01-27', '0000-00-00'),
(5, 3, 'Áo Khoác Bé Trai', '2018-01-27', '0000-00-00'),
(6, 4, 'Đầm Bé Gái', '2018-01-27', '0000-00-00'),
(7, 4, 'Đồ Bộ Bé Gái', '2018-01-27', '0000-00-00'),
(8, 1, 'Vest', '2018-01-27', '0000-00-00'),
(9, 2, 'Áo Khoác Nữ', '2018-01-27', '0000-00-00'),
(10, 2, 'Áo Len Nữ', '2018-01-27', '0000-00-00'),
(11, 1, 'Quần Short Nam', '2018-01-27', '0000-00-00'),
(12, 1, 'Quần Jean Nam', '2018-01-27', '0000-00-00'),
(13, 1, 'Quần Áo Thể Thao Nam', '2018-01-27', '0000-00-00'),
(14, 2, 'Áo Thun Nữ', '2018-01-27', '0000-00-00'),
(15, 2, 'Áo Hoodie Nữ', '2018-01-27', '0000-00-00'),
(16, 2, 'Quần Jean Nữ', '2018-01-27', '0000-00-00'),
(17, 2, 'Quần Áo Thể Thao Nữ', '2018-01-27', '0000-00-00'),
(18, 3, 'Đồ Bộ Bé Trai', '2018-01-27', '0000-00-00'),
(19, 4, 'Áo Khoác Bé Gái', '2018-01-27', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `name`, `created_date`, `updated_date`) VALUES
(1, 'Đỏ', '2018-01-27', '2018-04-25'),
(2, 'Vàng', '2018-01-27', '0000-00-00'),
(3, 'Xanh lá', '2018-01-27', '0000-00-00'),
(4, 'Xanh da trời', '2018-01-27', '0000-00-00'),
(5, 'Hồng', '2018-01-27', '0000-00-00'),
(6, 'Tím than', '2018-01-27', '0000-00-00'),
(7, 'Xanh nước biển', '2018-01-27', '0000-00-00'),
(8, 'Trắng', '2018-01-27', '0000-00-00'),
(9, 'Đen', '2018-01-27', '0000-00-00'),
(10, 'Nhiều màu', '2018-01-28', '0000-00-00'),
(11, 'Đen trắng', '2018-01-28', '0000-00-00'),
(12, 'Đỏ sẫm', '2018-01-28', '0000-00-00'),
(13, 'Tím nhạt', '2018-01-28', '0000-00-00'),
(14, 'Xanh sẫm', '2018-01-28', '0000-00-00'),
(15, 'Nâu', '2018-01-28', '0000-00-00'),
(16, 'Bạc', '2018-01-28', '0000-00-00'),
(17, 'Xám', '2018-01-28', '0000-00-00'),
(18, 'Cam', '2018-01-28', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `progroup_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `progroup_id`, `cus_id`, `content`, `created_date`) VALUES
(1, 25, 1, 'I really like this T - shirt', '2018-04-25'),
(7, 29, 3, 'Cho tôi thêm thông tin về sản phẩm', '2018-04-25'),
(8, 29, 6, 'Cái áo này còn màu nào nữa không', '2018-04-25'),
(9, 5, 6, 'Okay!', '2018-04-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthdn`
--

CREATE TABLE `cthdn` (
  `id_hdn` int(11) NOT NULL,
  `id_progroup` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `cthdn`
--

INSERT INTO `cthdn` (`id_hdn`, `id_progroup`, `qty`, `price`, `total`) VALUES
(2, 1, 3, 300000, 900000),
(2, 17, 3, 105000, 315000),
(3, 6, 3, 200000, 600000),
(3, 15, 2, 100000, 200000),
(4, 1, 3, 200000, 600000),
(5, 1, 3, 400000, 1200000),
(5, 2, 2, 250000, 500000),
(6, 1, 8, 123000, 984000),
(6, 3, 4, 300000, 1200000),
(6, 6, 4, 120000, 480000),
(6, 28, 3, 99000, 297000),
(6, 30, 10, 400000, 4000000),
(6, 123, 12, 300000, 3600000),
(7, 4, 2, 120000, 240000),
(7, 9, 20, 150000, 3000000),
(7, 15, 10, 99000, 990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) NOT NULL,
  `birth` date NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `image`, `address`, `phone`, `birth`, `created_date`, `updated_date`) VALUES
(1, 'Bạch Văn Thịnh', 'thinhbn@gmail.com', 'thinhzoro', '26857326_874943725998177_1868969850_n.jpg', 'Bắc Ninh', '01683319811', '2018-01-04', '2018-01-27', '2018-04-25'),
(2, 'Nguyễn Ngọc Tiến', 'tien1996@gmail.com', 'ngoctien', '03.jpg', 'Hải Dương', '01687342687', '1996-09-21', '2018-04-04', '2018-04-25'),
(3, 'Dương Trường Giang', 'giangduong1102@gmail.com', 'giangduong', 'aohq.jpg', 'Hải Dương', '0969505668', '1996-04-11', '2018-04-04', '2018-04-25'),
(6, 'Trần Quang Trung', 'trungoc@gmail.com', 'trung123', '482018derbymanchester.jpg', 'Thái Nguyên', '0967213886', '1996-04-03', '2018-04-09', '2018-04-12'),
(7, 'Lê Bá Thao', 'thao12@gmail.com', 'thao123', '18699778_212832059232436_4163094093281105098_n.jpg', 'Thuận Thành - Bắc Ninh', '01666952168', '1996-10-17', '2018-04-25', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hdn`
--

CREATE TABLE `hdn` (
  `id` int(11) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `total` float NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hdn`
--

INSERT INTO `hdn` (`id`, `status`, `total`, `created_date`, `updated_date`) VALUES
(2, 'Đã thanh toán', 1215000, '2018-04-12', '2018-05-09'),
(3, 'Chưa thanh toán', 800000, '2018-04-12', '2018-05-20'),
(4, 'Đã thanh toán', 600000, '2018-05-03', '2018-05-20'),
(5, 'Chưa thanh toán', 1700000, '2018-05-03', '2018-05-09'),
(6, 'Chưa thanh toán', 11254000, '2018-05-04', '2018-05-09'),
(7, 'Đã thanh toán', 4230000, '2018-05-09', '2018-05-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `obj`
--

CREATE TABLE `obj` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `obj`
--

INSERT INTO `obj` (`id`, `name`, `created_date`, `updated_date`) VALUES
(1, 'Thời trang nam', '2018-03-11', '0000-00-00'),
(2, 'Thời trang nữ', '2018-03-11', '0000-00-00'),
(3, 'Thời trang bé trai', '2018-03-11', '0000-00-00'),
(4, 'Thời trang bé gái', '2018-03-11', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_cus` int(11) NOT NULL,
  `ttimes` int(11) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_cus`, `ttimes`, `status`, `created_date`, `updated_date`, `total`) VALUES
(1, 1, 1, 'Chưa thanh toán', '2018-05-18', '0000-00-00', 332100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_item`
--

CREATE TABLE `order_item` (
  `id_order` int(11) NOT NULL,
  `id_progroup` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `order_item`
--

INSERT INTO `order_item` (`id_order`, `id_progroup`, `qty`, `price`, `total`) VALUES
(1, 7, 1, 69300, 69300),
(1, 15, 1, 150000, 150000),
(1, 29, 2, 56400, 112800);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_cate` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `id_brand`, `id_cate`, `created_date`, `updated_date`) VALUES
(1, 'Áo Khoác Nam Liên Minh Huyền Thoại', 3, 1, '2018-01-27', '2018-01-28'),
(2, 'Áo Sơ Mi Nữ Hai Màu', 11, 4, '2018-01-27', '2018-01-28'),
(3, 'Áo Thun Nam Dài Tay', 2, 2, '2018-01-27', '0000-00-00'),
(4, 'Áo Sơ Mi Nam Công Sở', 7, 3, '2018-01-27', '0000-00-00'),
(5, 'Áo Sơ Mi Coban', 3, 3, '2018-01-27', '0000-00-00'),
(6, 'Áo Sơ Mi Kẻ Caro', 4, 3, '2018-01-27', '0000-00-00'),
(7, 'Áo Khoác OnePiece', 9, 1, '2018-01-28', '0000-00-00'),
(8, 'Áo Khoác Kaki Hàn Quốc', 5, 1, '2018-01-28', '0000-00-00'),
(9, 'Áo Khoác Hoodie', 2, 1, '2018-01-28', '0000-00-00'),
(10, 'Áo Khoác Thể Thao Chelsea', 8, 1, '2018-01-28', '0000-00-00'),
(11, 'Áo Khoác Bat Man', 7, 1, '2018-01-28', '0000-00-00'),
(12, 'Áo Khoác Phối Màu', 1, 1, '2018-01-28', '0000-00-00'),
(13, 'Áo Sơ Mi Nữ Trắng Đẹp', 6, 4, '2018-01-28', '0000-00-00'),
(14, 'Áo Sơ Mi Nữ Siêu Đẹp', 9, 4, '2018-01-28', '0000-00-00'),
(15, 'Áo Thun Nam Hàn Quốc', 10, 2, '2018-01-28', '0000-00-00'),
(16, 'Áo Thun Nam Dài Tay', 9, 2, '2018-01-28', '0000-00-00'),
(17, 'Áo Thun Cổ Tròn', 4, 2, '2018-01-28', '0000-00-00'),
(18, 'Áo Thun LOL', 12, 2, '2018-01-28', '2018-01-28'),
(19, 'Áo Thun Animals', 11, 2, '2018-01-28', '0000-00-00'),
(20, 'Quần Jean Nam Trẻ Trung', 1, 12, '2018-01-28', '0000-00-00'),
(21, 'Quần Jean Nam Nghiêm Túc', 6, 12, '2018-01-28', '0000-00-00'),
(22, 'Quần Jean Nam Rách Gối', 11, 1, '2018-01-28', '0000-00-00'),
(23, 'Áo Khoác Bé Trai Cao Cấp', 12, 5, '2018-01-28', '0000-00-00'),
(24, 'Áo Khoác Lông Cừu', 3, 5, '2018-01-28', '0000-00-00'),
(25, 'Áo Khoác Jean', 9, 5, '2018-01-28', '0000-00-00'),
(26, 'Áo Khoác Phao', 5, 5, '2018-01-28', '0000-00-00'),
(27, 'Áo Khoác Da', 4, 5, '2018-01-28', '0000-00-00'),
(28, 'Đầm Nhung', 7, 6, '2018-01-28', '0000-00-00'),
(29, 'Đầm Cao Cấp', 2, 6, '2018-01-28', '0000-00-00'),
(30, 'Đồ Bộ Dài Tay', 9, 7, '2018-01-28', '0000-00-00'),
(31, 'Đồ Bộ Cộc Tay', 10, 7, '2018-01-28', '0000-00-00'),
(32, 'Vest Cao Cấp', 12, 8, '2018-01-28', '0000-00-00'),
(33, 'Áo Vest Nâu Đẹp', 6, 8, '2018-01-28', '0000-00-00'),
(34, 'Vest Trẻ Trung', 3, 8, '2018-01-28', '0000-00-00'),
(35, 'Áo Khoác Phao Nữ', 7, 9, '2018-01-28', '0000-00-00'),
(36, 'Áo Khoác Nữ Mỏng', 5, 9, '2018-01-28', '0000-00-00'),
(37, 'Áo Len Công Sở Nữ', 10, 10, '2018-01-28', '0000-00-00'),
(38, 'Áo Len Nữ Dệt', 4, 10, '2018-01-28', '0000-00-00'),
(39, 'Quần Short Jean Nam', 12, 11, '2018-01-28', '0000-00-00'),
(40, 'Quần Short Kaki', 11, 11, '2018-01-28', '0000-00-00'),
(41, 'Quần Short Thun', 1, 11, '2018-01-28', '0000-00-00'),
(42, 'Bộ Đồ Thể Thao Nam', 8, 13, '2018-01-28', '2018-01-28'),
(43, 'Bộ Quần Áo Đá Bóng', 7, 13, '2018-01-28', '0000-00-00'),
(44, 'Quần Thun Thể Thao Nam', 12, 13, '2018-01-28', '0000-00-00'),
(45, 'Áo Logo Social Network', 6, 14, '2018-01-28', '0000-00-00'),
(46, 'Áo Thun Nữ Cộc Tay', 2, 14, '2018-01-28', '0000-00-00'),
(47, 'Áo Thun Nữ Không Tay', 4, 14, '2018-01-28', '0000-00-00'),
(48, 'Ao Hoodie In Hình', 7, 15, '2018-01-28', '0000-00-00'),
(49, 'Áo Hoodie Adidas', 8, 15, '2018-01-28', '0000-00-00'),
(50, 'Áo hoodie Nữ Simple', 9, 15, '2018-01-28', '0000-00-00'),
(51, 'Quần Jean Nữ Đen', 1, 16, '2018-01-28', '0000-00-00'),
(52, 'Quần Jean Ngắn', 10, 16, '2018-01-28', '0000-00-00'),
(53, 'Quần Jean Nữ Dài Ống Bó', 3, 16, '2018-01-28', '0000-00-00'),
(54, 'Bộ Đồ Thể Thao Nữ Cao Cấp', 5, 17, '2018-01-28', '0000-00-00'),
(55, 'Áo Thể Thao Nữ Cộc Tay', 5, 17, '2018-01-28', '0000-00-00'),
(56, 'Quần Tập Thể Thao Thun', 4, 17, '2018-01-28', '0000-00-00'),
(57, 'Đồ Bộ Bé Trai Bear', 1, 18, '2018-01-28', '0000-00-00'),
(58, 'Bộ Siêu Nhân Cho Bé Trai', 11, 18, '2018-01-28', '0000-00-00'),
(59, 'Đồ Bộ Adidas Bé Trai', 8, 18, '2018-01-28', '0000-00-00'),
(60, 'Bộ Đồ Bé Trai Đẹp', 5, 18, '2018-01-28', '0000-00-00'),
(61, 'Áo Khoác Phao Bé Gái', 9, 19, '2018-01-28', '0000-00-00'),
(62, 'Áo Khoác Choàng', 2, 19, '2018-01-28', '0000-00-00'),
(63, 'Áo Hình Thú', 4, 19, '2018-01-28', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_group`
--

CREATE TABLE `product_group` (
  `id` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `price` float NOT NULL,
  `vote` int(11) NOT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product_group`
--

INSERT INTO `product_group` (`id`, `id_pro`, `id_color`, `id_size`, `image`, `qty`, `discount`, `price`, `vote`, `detail`, `created_date`, `updated_date`) VALUES
(1, 1, 9, 3, 'aokhoaclol.png', 42, 38, 450000, 3, 'Áo khoác nỉ ấm áp dành cho fan LOL || Giá ưu đãi.', '2018-01-28', '2018-05-04'),
(2, 7, 9, 3, 'AoKhoacLuffy.png', 23, 5, 300000, 4, 'Áo Khoác dành cho những người yêu(hâm mộ) truyện tranh OnePiece', '2018-01-28', '2018-05-03'),
(3, 2, 10, 1, 'aohaimau.jpg', 16, 11, 120000, 3, 'Áo sơ mi nữ hai màu thoáng mát phù hợp cho đi hội hè.', '2018-01-28', '2018-05-04'),
(4, 3, 11, 2, 'aothundep.jpg', 12, 15, 180000, 3, 'Áo Thun Nam Dài Tay Phối Sọc Đen Trắng Thanh Lịch', '2018-01-28', '2018-05-09'),
(5, 4, 12, 3, 'aosomihop.jpg', 13, 15, 150000, 36, 'Áo sơ mi hộp công sở lịch lãm màu sắc hợp lý không chói.', '2018-01-28', '2018-05-09'),
(6, 5, 7, 2, 'aosomiblue.jpg', 20, 9, 205000, 40, 'Áo sơ mi trơn dài tay Coban trang trọng lịch lãm khoe body.', '2018-01-28', '2018-05-09'),
(7, 6, 4, 3, 'caro.jpg', 14, 30, 99000, 32, 'Áo sơ mi ngắn tay kẻ caro phù hợp cho đi dạo phố.', '2018-01-28', '0000-00-00'),
(8, 8, 6, 1, 'AoKhoackaki.jpg', 6, 20, 340000, 19, 'Áo khoác thu đông mặc trong thời tiết dịu mát!', '2018-01-28', '2018-04-25'),
(9, 9, 1, 1, 'aokhoachoodie.jpg', 30, 5, 250000, 37, 'Áo khoác hoodie đáng yêu thường được các idol Hàn Quốc ưu chuộng.', '2018-01-28', '2018-05-09'),
(10, 10, 4, 4, 'aokhoacthethao.jpg', 14, 25, 520000, 40, 'Áo khoác thể thao màu xanh sáng đẹp dành cho fan chè xanh, FC against coach.', '2018-01-28', '2018-04-11'),
(11, 11, 2, 2, 'aokhoacbatman.jpg', 12, 15, 245000, 10, 'Áo Khoác Bat Man Siêu Đẹp || Khiến nhiều người nhớ lại tuổi thơ dữ dội.', '2018-01-28', '0000-00-00'),
(12, 12, 1, 3, 'aokhoaphoimau.jpg', 14, 22, 340000, 0, 'Áo Khoác Nam Phối Màu MS Cực Đẹp', '2018-01-28', '2018-04-27'),
(13, 12, 10, 4, 'aokhoacgio.jpg', 4, 10, 210000, 4, 'Áo Khoác Gió Đủ Màu Cho Mùa Đông', '2018-01-28', '0000-00-00'),
(14, 13, 8, 1, 'aosomisieudethuong.jpg', 13, 10, 120000, 1, 'Áo Sơ Mi Họa Tiết Siêu Dễ Thương', '2018-01-28', '2018-04-11'),
(15, 13, 8, 3, 'aosomics.jpg', 18, 25, 200000, 0, 'Áo sơ mi trắng phù hợp cho nhân viên công sở', '2018-01-28', '0000-00-00'),
(16, 14, 1, 1, 'aosmcs.jpg', 5, 12, 99000, 4, 'Áo sơ mi công sở đẹp, vải mát', '2018-01-28', '2018-01-28'),
(17, 14, 5, 3, 'aosomihong.jpg', 19, 25, 205000, 50, 'Áo sơ mi nữ cổ xếp ly thắt nơ', '2018-01-28', '2018-05-09'),
(18, 15, 12, 2, 'aothuncoco.jpg', 10, 10, 180000, 24, 'Áo thun nam vải cá sấu cao cấp.', '2018-01-28', '0000-00-00'),
(19, 15, 9, 3, 'aohq.jpg', 15, 20, 199000, 40, 'Áo Thun Dài Tay Hàn Quốc', '2018-01-28', '2018-04-25'),
(20, 16, 13, 4, 'aothundaitay.jpg', 22, 18, 234000, 4, 'Áo thun dài tay phong cách Boss', '2018-01-28', '2018-04-12'),
(21, 17, 7, 2, 'aothuncotron.jpg', 15, 5, 55000, 12, 'Áo Thun Cổ Tròn FALCON Nam Tính', '2018-01-28', '0000-00-00'),
(22, 17, 9, 3, 'aothuncotron2.png', 22, 10, 109000, 20, 'Áo thun Ghost team cao cấp', '2018-01-28', '0000-00-00'),
(23, 17, 4, 3, 'aothunlas.jpg', 9, 7, 90000, 12, 'Áo Thun Việt Nam Cao Cấp', '2018-01-28', '0000-00-00'),
(24, 17, 8, 1, 'aothuncotron3.png', 17, 4, 75000, 5, 'Áo Thun Mickey Vải Trơn || Đảm bảo sự hài lòng của bạn về khoản mát da.', '2018-01-28', '0000-00-00'),
(25, 19, 8, 3, 'aoech.png', 18, 5, 80000, 34, 'Áo thun Ếch và Báo Cute', '2018-01-28', '0000-00-00'),
(26, 19, 8, 2, 'aodoraemon.png', 20, 15, 140000, 23, 'Áo Thun Doremon || Cho teen là fan cứng của dòng truyện manga này.', '2018-01-28', '0000-00-00'),
(27, 19, 8, 1, 'aoconbao.png', 1, 5, 55000, 1, 'Áo phông ếch báo!', '2018-01-28', '2018-04-27'),
(28, 18, 9, 4, 'aothunLMHT.png', 15, 12, 80000, 0, 'Áo thun Liên minh huyền thoại - cs LOL || Garena', '2018-01-28', '2018-05-04'),
(29, 18, 9, 3, 'aothunLMHT2.png', 57, 6, 60000, 11, '<p>&Aacute;o thun Li&ecirc;n minh huyền thoại || Thun LOL cup</p>\r\n', '2018-01-28', '0000-00-00'),
(30, 18, 9, 1, 'aothunLMHT2.png', 23, 12, 95000, 9, 'Áo thun LMHT màu đen - thun LOL đen', '2018-01-28', '2018-05-04'),
(31, 4, 11, 4, 'aosomipc.jpg', 15, 13, 120000, 12, 'Áo Sơ Mi Nam Dài Tay Hàn Quốc.', '2018-01-28', '0000-00-00'),
(32, 20, 9, 3, 'quanjeanxuoc.jpg', 34, 12, 240000, 6, 'Quần Jean xước phù hợp cho trường phái nghiêm túc', '2018-01-28', '2018-01-29'),
(33, 20, 8, 1, 'trangrack.jpg', 7, 5, 210000, 3, 'Quần Jean nam rách phong cách', '2018-01-28', '0000-00-00'),
(34, 20, 7, 1, 'quanjean1.jpg', 48, 42, 320000, 40, 'Quần Jean nam trẻ trung phong cách', '2018-01-28', '2018-04-25'),
(35, 21, 4, 4, 'cs.jpg', 5, 3, 125000, 4, 'Quần Jean Cotton nam phù hợp cho nhân viên công sở', '2018-01-28', '0000-00-00'),
(36, 22, 9, 1, 'rackgoi.jpg', 22, 21, 210000, 32, 'Quần jean nam Rách Gối Ống Bó', '2018-01-28', '0000-00-00'),
(37, 22, 4, 4, 'rack1.jpg', 10, 10, 330000, 10, 'JEAN NAM CAO CẤP ẢNH THẬT', '2018-01-28', '0000-00-00'),
(38, 22, 9, 3, 'rach0124.jpg', 56, 30, 420000, 40, 'Quần Jean Nam Rách Phong Cách', '2018-01-28', '2018-05-02'),
(39, 21, 4, 4, 'nt1.jpg', 16, 9, 199000, 20, 'QUẦN JEANS ỐNG SUÔNG COTTON', '2018-01-28', '0000-00-00'),
(40, 21, 7, 2, 'nt2.jpg', 13, 21, 190000, 1, 'QUẦN JEANS NAM TRUNG NIÊN', '2018-01-28', '0000-00-00'),
(41, 23, 9, 1, 'aokhoacda.jpg', 11, 10, 200000, 0, 'Áo khoác da cho bé trai thêm phần đáng yêu hơn', '2018-01-28', '0000-00-00'),
(42, 23, 11, 1, 'clashofclan.jpg', 21, 15, 175000, 2, 'Áo Khoác Game Clash Of Clans Cho Bé', '2018-01-28', '0000-00-00'),
(43, 24, 6, 1, 'longcuu.jpg', 9, 7, 229000, 45, 'Áo khoác lông cừu Mother Bear rất đẹp', '2018-01-28', '0000-00-00'),
(44, 25, 4, 1, 'aokhoacjean.jpeg', 43, 13, 209000, 1, 'Áo khoác jeans bé trai in Mickey', '2018-01-28', '0000-00-00'),
(45, 26, 14, 1, 'aokhoacphao333.jpg', 21, 10, 150000, 34, 'Áo Khoác Phao Ấm Áp Mùa Đông Cho Bé Yêu Của Mẹ', '2018-01-28', '0000-00-00'),
(46, 26, 6, 1, 'aokhoacphao332.jpg', 30, 20, 280000, 5, 'Áo Khoác Phao Bên Trong Lót Lông Êm Mượt', '2018-01-28', '0000-00-00'),
(47, 26, 9, 1, 'aokhoacphao331.jpg', 22, 5, 169000, 16, 'Áo Khoác Phao Cá Tính', '2018-01-28', '2018-01-28'),
(48, 27, 15, 1, 'aokhoacda331.jpg', 14, 5, 240000, 40, 'Áo Khoác Da Bò Bền Đẹp', '2018-01-28', '0000-00-00'),
(49, 27, 10, 1, 'aokhoacda332.jpg', 30, 20, 299000, 50, 'Áo Khoác Da Bóng Loáng Nhìn Rất Cuốn Hút', '2018-01-28', '0000-00-00'),
(50, 28, 1, 1, 'damchobegai.jpg', 10, 5, 145000, 0, 'Đầm nhung cho các bé từ 15-23kg', '2018-01-28', '0000-00-00'),
(51, 29, 5, 1, 'fox.jpg', 12, 10, 99000, 21, 'Đầm váy dài tay cáo con xinh xắn', '2018-01-28', '0000-00-00'),
(52, 29, 1, 1, 'voan.jpg', 23, 14, 350000, 3, 'Đầm voan cho công chúa bé nhỏ thêm phần đáng yêu hơn', '2018-01-28', '0000-00-00'),
(53, 29, 10, 1, 'hiphop.jpg', 17, 19, 159000, 11, 'Đầm thun Hip hop cho bé gái', '2018-01-28', '0000-00-00'),
(54, 30, 2, 3, 'cute.jpg', 12, 5, 120000, 1, 'Bộ bé trai bé gái tay dài ấm áp mùa đông', '2018-01-28', '0000-00-00'),
(55, 30, 5, 1, 'mickey.jpg', 5, 5, 155000, 5, 'Bộ nữ như thế nhồi bông mickey', '2018-01-28', '0000-00-00'),
(56, 30, 4, 1, 'nifish.jpg', 10, 10, 100000, 10, 'Bộ đồ nỉ da cá bé gái', '2018-01-28', '0000-00-00'),
(57, 31, 2, 1, 'pokemon.jpg', 20, 5, 99000, 10, 'Bộ thun lửng in hình Pokemon cho bé từ 28kg-40kg', '2018-01-28', '0000-00-00'),
(58, 31, 3, 1, 'dobotieuthu.jpg', 15, 6, 119000, 12, 'Bộ Đồ Tiểu Thư Ống Rộng Cá Tính', '2018-01-28', '0000-00-00'),
(59, 32, 9, 2, 'vestden.jpg', 12, 12, 550000, 20, 'Áo khoác vest nam sang trọng lịch sự cho phái mạnh', '2018-01-28', '0000-00-00'),
(60, 32, 6, 3, 'vesthanguk.jpg', 5, 13, 500000, 42, 'Áo vest nam nhập khẩu từ Hàn Quốc', '2018-01-28', '0000-00-00'),
(61, 33, 15, 2, 'vestnhung.png', 9, 10, 240000, 30, 'Áo Vest Nam | Áo Vest Nhung Cao Cấp', '2018-01-28', '0000-00-00'),
(62, 33, 15, 2, 'vestmelody.jpg', 17, 5, 550000, 12, 'Áo Khoác Vest Cao Cấp Kaki Melody', '2018-01-28', '0000-00-00'),
(63, 34, 8, 1, 'vestda.jpg', 10, 25, 880000, 60, 'Áo Vest da dành cho nam thần', '2018-01-28', '0000-00-00'),
(64, 34, 16, 4, 'vesttho.jpg', 5, 15, 690000, 45, 'Áo Vest vải thô form body Hàn Quốc', '2018-01-28', '0000-00-00'),
(65, 35, 9, 4, 'aokhoacphao.jpg', 10, 10, 450000, 9, 'Áo khoác phao nữ phong cách Hàn Quốc', '2018-01-28', '0000-00-00'),
(66, 35, 5, 2, 'aokhoacgonsong.png', 15, 5, 520000, 13, 'ÁO PHAO GỢN SÓNG HÀNG NHẬP', '2018-01-28', '0000-00-00'),
(67, 36, 11, 2, 'socdaitay.jpg', 12, 3, 199000, 5, 'Áo khoác sọc dài khuỷu tay phối da cá tính,trẻ trung', '2018-01-28', '0000-00-00'),
(68, 36, 1, 3, 'mangto.jpg', 15, 5, 249000, 5, 'Áo khoác nhẹ Mangto tay pass cá tính', '2018-01-28', '0000-00-00'),
(69, 12, 5, 3, 'len.jpg', 5, 15, 270000, 12, 'Áo khoác len dệt kim phome dài xinh xắn', '2018-01-28', '0000-00-00'),
(70, 37, 5, 3, 'aolencs.jpg', 15, 10, 280000, 0, 'Áo len cho nàng công sở sang chảnh', '2018-01-28', '0000-00-00'),
(71, 37, 17, 1, 'xeta.jpg', 10, 15, 220000, 20, 'Áo len xẻ tà thời trang', '2018-01-28', '0000-00-00'),
(72, 38, 15, 1, 'aolendet.jpg', 12, 10, 180000, 15, 'ÁO KHOÁC LEN DỆT KIM', '2018-01-28', '0000-00-00'),
(73, 38, 4, 1, 'cardigan.jpg', 14, 5, 280000, 35, 'Áo len cardigan nữ, kiểu dáng hàn quốc mùa thu đông', '2018-01-28', '0000-00-00'),
(74, 37, 17, 4, 'oversize.jpg', 20, 25, 290000, 5, 'Hàng nhập áo len nữ oversize', '2018-01-28', '0000-00-00'),
(75, 39, 4, 3, 'jeanlung.jpg', 10, 5, 299000, 5, 'Quần jean lửng đính nút 2 bên túi', '2018-01-28', '0000-00-00'),
(76, 53, 7, 3, 'rach.jpg', 15, 15, 250000, 15, 'Quần short jean nhập khẩu châu âu', '2018-01-28', '2018-04-03'),
(77, 40, 17, 1, 'kakinam.jpg', 10, 10, 160000, 15, 'Quần kaki nam cao cấp', '2018-01-28', '0000-00-00'),
(78, 40, 9, 3, 'quansoockaki.jpg', 15, 5, 200000, 10, 'Quần short nam kaki phong cách', '2018-01-28', '0000-00-00'),
(79, 41, 18, 3, 'thuntron.jpg', 5, 10, 99000, 28, 'Quần thun trơn nam thoáng mát', '2018-01-28', '0000-00-00'),
(80, 41, 10, 3, 'thun.jpg', 9, 10, 65000, 5, 'QUẦN SHORT THUN NAM CAO CẤP', '2018-01-28', '0000-00-00'),
(81, 42, 16, 4, 'boadidas.jpg', 20, 20, 250000, 12, 'Bộ thể thao nam Adidas || Tự Tin Khoe Body', '2018-01-28', '0000-00-00'),
(82, 42, 9, 2, 'setden.jpg', 10, 15, 250000, 15, 'Bộ Quần Áo Thể Thao Nỉ Nam Đen', '2018-01-28', '0000-00-00'),
(83, 43, 1, 3, 'tapgym.jpg', 10, 10, 99000, 5, 'Set thể thao tập gym nam YG', '2018-01-28', '0000-00-00'),
(84, 43, 1, 3, 'aobongdanam.jpg', 15, 5, 110000, 40, 'Set thể thao bóng đá Việt Nam', '2018-01-28', '0000-00-00'),
(85, 44, 9, 2, 'jogger.jpg', 20, 5, 70000, 15, 'Quần jogger thể thao phối sọc RPS', '2018-01-28', '0000-00-00'),
(86, 44, 9, 3, 'santap.jpg', 9, 5, 60000, 0, 'Quần Thun Thể Thao Nam 3 Sọc', '2018-01-28', '0000-00-00'),
(87, 45, 8, 3, 'youtube.jpg', 20, 5, 100000, 1, 'Áo thun nữ Thái Lan cổ tròn Youtube', '2018-01-28', '0000-00-00'),
(88, 45, 8, 1, 'zalo.jpg', 10, 5, 90000, 10, 'Áo thun nữ Thái Lan Zalo', '2018-01-28', '0000-00-00'),
(89, 46, 8, 1, 'trangsang.jpg', 16, 10, 109000, 10, 'Áo thun nữ cộc tay form rộng in hoa hồng', '2018-01-28', '0000-00-00'),
(90, 46, 5, 1, 'catinh.jpg', 19, 5, 80000, 21, 'Áo Thun Nữ In Chữ Cá Tính', '2018-01-28', '0000-00-00'),
(91, 46, 6, 3, 'tronctton.png', 10, 10, 120000, 15, 'Áo thun trơn cotton nữ đẹp giá rẻ Tím Huế', '2018-01-28', '0000-00-00'),
(92, 47, 9, 1, 'aothunbalo.jpg', 5, 5, 130000, 0, 'Áo Thun Ba Lỗ Sexy || Tự Tin Khoe Cá Tính', '2018-01-28', '0000-00-00'),
(93, 47, 17, 3, 'cotim.jpg', 15, 10, 140000, 10, 'Áo Thun Cổ Tim Sát Nách Thời Trang Eden', '2018-01-28', '0000-00-00'),
(94, 48, 8, 4, 'BTS.jpg', 15, 10, 380000, 20, 'Áo Hoodie In Ảnh BTS dành cho fan Kpop', '2018-01-28', '0000-00-00'),
(95, 48, 8, 2, 'exo.jpg', 14, 12, 260000, 6, 'Áo Hoodie EXO ChanYeol Chibi', '2018-01-28', '0000-00-00'),
(96, 49, 10, 1, 'thundaitay.jpg', 14, 10, 240000, 80, 'Áo thun hoodie tay dài nữ nhãn hiệu Adidas', '2018-01-28', '0000-00-00'),
(97, 50, 16, 3, 'wanna1.jpg', 15, 20, 300000, 20, 'Áo Khoác Hoodie Chui Đầu Wanna One', '2018-01-28', '0000-00-00'),
(98, 50, 9, 2, 'eminem.jpg', 20, 36, 219000, 35, 'Áo khoác hoodie EMINEM ấm áp với mùa đông.', '2018-01-28', '0000-00-00'),
(99, 51, 9, 3, 'theuhoa.jpg', 17, 10, 240000, 15, 'Quần jean nữ cao cấp có thêu hoa', '2018-01-28', '0000-00-00'),
(100, 51, 9, 3, 'ongbo.jpg', 25, 21, 205000, 16, 'Quần jean nữ ống ôm phù hợp cho nhân viên công sở', '2018-01-28', '0000-00-00'),
(101, 52, 7, 1, 'jeanngan.jpg', 25, 5, 125000, 0, 'Quần jean nữ ngắn sexy', '2018-01-28', '0000-00-00'),
(102, 52, 7, 1, 'jeanthun.jpg', 20, 10, 160000, 15, 'Quần jean thun ngắn thoáng mát cho mùa hè', '2018-01-28', '0000-00-00'),
(103, 53, 7, 1, 'jeancatinh.jpg', 15, 17, 280000, 4, 'Quần jean nữ cá tính cho các nàng năng động', '2018-01-28', '0000-00-00'),
(104, 53, 7, 3, 'xuoc.jpg', 25, 15, 240000, 10, 'Quần jean nữ thời trang hiện đại', '2018-01-28', '0000-00-00'),
(105, 53, 7, 1, 'rach.jpg', 11, 11, 245000, 11, 'Quần jean rách cho những cô gái \"nghịch ngợm\"', '2018-01-28', '0000-00-00'),
(106, 54, 10, 3, 'setnu.jpg', 54, 40, 269000, 10, 'Sét bộ thể thao nữ hàng cao cấp', '2018-01-28', '0000-00-00'),
(107, 54, 4, 1, 'xanhkb.jpg', 10, 10, 199000, 4, 'Bộ đồ thể thao nữ phù hợp cho thời tiết se lạnh', '2018-01-28', '0000-00-00'),
(108, 54, 2, 3, 'bonu.jpg', 20, 10, 250000, 9, 'Bộ đồ thể thao cho nữ', '2018-01-28', '0000-00-00'),
(109, 55, 10, 1, 'aococ.jpg', 30, 5, 65000, 21, 'Áo tập thể thao thông hơi, co giãn tốt', '2018-01-28', '0000-00-00'),
(110, 56, 17, 3, 'quantaplung.jpg', 41, 20, 95000, 5, 'Quần tập lửng, thun co giãn thoải mái', '2018-01-28', '0000-00-00'),
(111, 56, 9, 1, 'dai.jpg', 30, 38, 199000, 9, 'Quần tập dài, hàng Việt Nam xuất khẩu chất đẹp', '2018-01-28', '0000-00-00'),
(112, 57, 2, 1, 'vangbear.jpg', 17, 5, 69000, 17, 'Bộ nỉ cho bé-bộ nỉ hình gấu dễ thương size 1-5 tuổi', '2018-01-28', '2018-04-12'),
(113, 57, 16, 1, 'betraiHQ.jpg', 7, 10, 89000, 15, 'Bộ thu đông xuất Hàn bé trai 8-20kg - áo kẻ', '2018-01-28', '0000-00-00'),
(114, 58, 10, 1, 'captain.jpg', 15, 11, 195000, 11, 'Bộ thun tay ngắn in CAPTAIN Đèn LED kèm áo choàng', '2018-01-28', '0000-00-00'),
(115, 58, 1, 1, 'nguoinhen.jpg', 12, 5, 160000, 5, 'Bộ thun tay ngắn in SPIDERMAN Đèn LED kèm áo choàng', '2018-01-28', '0000-00-00'),
(116, 59, 4, 1, 'adidas.jpg', 14, 10, 210000, 5, 'Bộ thu đông bé trai bé gái phong cách thể thao cực ngầu hàng vnxk', '2018-01-28', '0000-00-00'),
(117, 59, 10, 1, 'dobo.jpg', 15, 5, 80000, 15, 'Đồ bộ cho bé trai', '2018-01-28', '0000-00-00'),
(118, 60, 6, 1, 'vestchambi.jpg', 10, 5, 215000, 0, 'Bộ đồ vest chấm bi cho bé ra dáng hơn', '2018-01-28', '0000-00-00'),
(119, 60, 10, 1, 'jeansmile.jpg', 45, 30, 150000, 14, 'Bộ áo thun quần jean mặt cười', '2018-01-28', '0000-00-00'),
(120, 61, 6, 1, 'tho.jpg', 20, 15, 220000, 12, 'Áo khoác phao thỏ láu bé gái', '2018-01-28', '0000-00-00'),
(121, 61, 10, 1, 'akpgile.jpg', 10, 35, 229000, 45, 'Free Ship Áo khoác phao gile siêu nhẹ cao cấp', '2018-01-28', '0000-00-00'),
(122, 62, 12, 1, 'dosam.jpg', 5, 5, 150000, 15, 'QUẦN ÁO TRẺ EM CAO CẤP - ÁO GIÓ CHO BÉ GÁI', '2018-01-28', '0000-00-00'),
(123, 62, 12, 1, 'akda.jpg', 20, 10, 300000, 4, 'Áo khoác dạ cho bé yêu hàng thiết kế - Freeship toàn quốc', '2018-01-28', '2018-05-04'),
(124, 63, 10, 1, 'acht.jpg', 7, 10, 160000, 30, 'Áo choàng hình thú | Áo choàng đáng yêu cho bé', '2018-01-28', '0000-00-00'),
(125, 63, 2, 1, 'pony.jpg', 43, 5, 150000, 46, 'Áo khoác hình Pony xinh iu cho bé', '2018-01-28', '0000-00-00'),
(126, 5, 8, 2, 'p7.jpg', 20, 10, 120000, 4, '<p>Sản phẩm thuộc c&ocirc;ng ty TNHH - ACB</p>\r\n', '2018-01-31', '2018-05-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `name`, `created_date`, `updated_date`) VALUES
(1, 'S', '2018-01-10', '2018-04-25'),
(2, 'L', '2018-01-27', '0000-00-00'),
(3, 'M', '2018-01-27', '0000-00-00'),
(4, 'XL', '2018-01-27', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `name`, `image`, `link`, `created_date`, `updated_date`) VALUES
(1, 'baner', '01.jpg', 'youtube.com', '2018-01-27', '2018-04-12'),
(2, 'slide1', '02.jpg', 'facebook.com', '2018-01-27', '0000-00-00'),
(5, 'slideN', 'image3.jpg', '24h.com.vn', '2018-04-02', '2018-04-04'),
(7, 'trungoc', '482018derbymanchester.jpg', 'xoilac.tv', '2018-04-12', '2018-04-12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`, `phone`, `address`, `level`, `created_date`, `updated_date`) VALUES
(1, 'Lê Văn Huy', 'levanhuy@gmail.com', 'willing', '76544.jpg', '0972006638', '<p>Bắc Ninh</p>\r\n', 'Admin', '2018-01-18', '2018-04-25'),
(2, 'Vũ Hoàng Giang', 'vugiang@gmail.com', '1996', 'anh2.jpg', '0912334856', 'Hà Nội', 'Admin', '2018-01-27', '2018-04-12'),
(3, 'Trương Thị Thu', 'truongthithu@gmail.com', 'thu1993', 'anh5.jpg', '0972381942', '<p>Bắc Ninh</p>\r\n', 'User', '2018-05-09', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `id_progroup` int(11) NOT NULL,
  `id_cus` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `wishlist`
--

INSERT INTO `wishlist` (`id`, `id_progroup`, `id_cus`, `created_date`, `updated_date`) VALUES
(38, 7, 1, '2018-04-20', '0000-00-00'),
(51, 14, 1, '2018-04-20', '0000-00-00'),
(52, 8, 1, '2018-04-20', '0000-00-00'),
(53, 12, 3, '2018-04-25', '0000-00-00'),
(55, 106, 3, '2018-04-25', '0000-00-00'),
(56, 29, 3, '2018-04-25', '0000-00-00'),
(57, 14, 3, '2018-04-25', '0000-00-00'),
(58, 5, 6, '2018-04-25', '0000-00-00'),
(59, 29, 7, '2018-04-26', '0000-00-00'),
(60, 6, 7, '2018-04-26', '0000-00-00'),
(61, 29, 2, '2018-05-02', '0000-00-00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_obj1` (`obj_id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_fk` (`progroup_id`),
  ADD KEY `cus_fk` (`cus_id`);

--
-- Chỉ mục cho bảng `cthdn`
--
ALTER TABLE `cthdn`
  ADD PRIMARY KEY (`id_hdn`,`id_progroup`),
  ADD KEY `fk_proid` (`id_progroup`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hdn`
--
ALTER TABLE `hdn`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `obj`
--
ALTER TABLE `obj`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer` (`id_cus`);

--
-- Chỉ mục cho bảng `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id_order`,`id_progroup`),
  ADD KEY `fk_progroup` (`id_progroup`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_brand` (`id_brand`),
  ADD KEY `fk_cate` (`id_cate`);

--
-- Chỉ mục cho bảng `product_group`
--
ALTER TABLE `product_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product` (`id_pro`),
  ADD KEY `fk_color` (`id_color`),
  ADD KEY `fk_size` (`id_size`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sp` (`id_progroup`),
  ADD KEY `fk_cus` (`id_cus`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hdn`
--
ALTER TABLE `hdn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `obj`
--
ALTER TABLE `obj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `product_group`
--
ALTER TABLE `product_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_obj1` FOREIGN KEY (`obj_id`) REFERENCES `obj` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `cus_fk` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `pro_fk` FOREIGN KEY (`progroup_id`) REFERENCES `product_group` (`id`);

--
-- Các ràng buộc cho bảng `cthdn`
--
ALTER TABLE `cthdn`
  ADD CONSTRAINT `fk_hdn` FOREIGN KEY (`id_hdn`) REFERENCES `hdn` (`id`),
  ADD CONSTRAINT `fk_proid` FOREIGN KEY (`id_progroup`) REFERENCES `product_group` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`id_cus`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `fk_orders` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_progroup` FOREIGN KEY (`id_progroup`) REFERENCES `product_group` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_brand` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `fk_cate` FOREIGN KEY (`id_cate`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `product_group`
--
ALTER TABLE `product_group`
  ADD CONSTRAINT `fk_color` FOREIGN KEY (`id_color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_size` FOREIGN KEY (`id_size`) REFERENCES `size` (`id`);

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `fk_cus` FOREIGN KEY (`id_cus`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `fk_sp` FOREIGN KEY (`id_progroup`) REFERENCES `product_group` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
