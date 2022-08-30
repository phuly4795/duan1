-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2021 lúc 11:36 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tpshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `admin_name`) VALUES
(1, 'admin@gmail.com', 'admin', 'Lý Thành Phú');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `baiviet_id` int(11) NOT NULL,
  `tenbaiviet` varchar(100) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL,
  `danhmuctin_id` int(11) NOT NULL,
  `baiviet_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`baiviet_id`, `tenbaiviet`, `tomtat`, `noidung`, `danhmuctin_id`, `baiviet_img`) VALUES
(1, 'Nguồn tin uy tín tiết lộ Xiaomi 12, 12X, 12 Pro sẽ được ra mắt trong cùng một sự kiện diễn ra vào cu', '', '<p style=\"text-align:center\"><img alt=\"Xiaomi 12, 12X, 12 Pro có thể sẽ ra mắt cùng nhau vào ngày 28/12\" src=\"https://cdn.tgdd.vn/Files/2021/12/03/1402117/xiaomi-12-series-2_1280x720-800-resize.jpg\" title=\"Xiaomi 12, 12X, 12 Pro có thể sẽ ra mắt cùng nhau vào ngày 28/12\" /></p>\r\n\r\n<p style=\"text-align:center\">Ảnh minh họa</p>\r\n\r\n<h2 style=\"text-align:center\">Nhiều nguồn tin cho rằng&nbsp;<a href=\"https://www.thegioididong.com/dtdd-xiaomi\" target=\"_blank\" title=\"Điện thoại smartphone Xiaomi chính hãng, giá rẻ, trả góp 0% 11/2021 - Thegioididong.com\" type=\"Điện thoại smartphone Xiaomi chính hãng, giá rẻ, trả góp 0% 11/2021 - Thegioididong.com\">Xiaomi</a>&nbsp;sẽ tổ chức một sự kiện ra mắt sản phẩm lớn v&agrave;o ng&agrave;y 28/12 để c&ocirc;ng bố d&ograve;ng flagship&nbsp;<a href=\"https://www.thegioididong.com/dtdd/xiaomi-mi-12\" target=\"_blank\" title=\"Xiaomi Mi 12 - Cập nhật thông tin, hình ảnh, đánh giá\" type=\"Xiaomi Mi 12 - Cập nhật thông tin, hình ảnh, đánh giá\">Xiaomi 12</a>. Mới nhất, leaker nổi tiếng Digital Chat Station đ&atilde; tiết lộ cho biết nh&agrave; sản xuất Trung Quốc sẽ tung ra Xiaomi 12,&nbsp;<a href=\"https://www.thegioididong.com/dtdd/xiaomi-12x\" target=\"_blank\" title=\"Xiaomi 12X\" type=\"Xiaomi 12X\">Xiaomi 12X</a>&nbsp;v&agrave; Xiaomi 12 Pro trong c&ugrave;ng một sự kiện.</h2>\r\n\r\n<p style=\"text-align:center\">Th&ocirc;ng tin r&ograve; rỉ cho biết ba mẫu&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"Điện thoại, smartphone chính hãng giá rẻ, trả góp 0%\" type=\"Điện thoại, smartphone chính hãng giá rẻ, trả góp 0%\">điện thoại</a>&nbsp;Xiaomi mới c&oacute; c&aacute;c số model r&uacute;t gọn l&agrave;&nbsp;L3A, L3 v&agrave; L2. Những thiết bị n&agrave;y sẽ được tung ra thị trường với c&aacute;c t&ecirc;n gọi Xiaomi 12X, Xiaomi 12 v&agrave;&nbsp;<a href=\"https://www.thegioididong.com/dtdd/xiaomi-12-pro\" target=\"_blank\" title=\"Xiaomi 12 Pro - Cập nhật thông tin, hình ảnh, đánh giá\" type=\"Xiaomi 12 Pro - Cập nhật thông tin, hình ảnh, đánh giá\">Xiaomi 12 Pro</a>. Cả ba c&oacute; thể được ra mắt trong c&ugrave;ng một sự kiện diễn ra v&agrave;o ng&agrave;y 28/12.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Xiaomi 12, 12X, 12 Pro có thể sẽ ra mắt cùng nhau vào ngày 28/12\" src=\"https://cdn.tgdd.vn/Files/2021/12/03/1402117/xiaomi-12-pro-screen-protector-3_1280x720-800-resize.jpg\" title=\"Xiaomi 12, 12X, 12 Pro có thể sẽ ra mắt cùng nhau vào ngày 28/12\" /></p>\r\n\r\n<p style=\"text-align:center\">Xiaomi Mi 11 5G (tr&aacute;i) v&agrave; tấm k&iacute;nh bảo vệ Xiaomi 12 Pro (ảnh: Gizmochina)</p>\r\n\r\n<p style=\"text-align:center\">Xiaomi 12 Pro dự kiến c&oacute; m&agrave;n h&igrave;nh AMOLED k&iacute;ch thước 6.67 inch với c&aacute;c cạnh cong v&agrave; một lỗ bấm ở vị tr&iacute; trung t&acirc;m chứa camera selfie. Thiết bị sẽ được trang bị bộ vi xử l&yacute; Snapdragon 8 Gen 1 mới.</p>\r\n\r\n<p style=\"text-align:center\">Xiaomi 12 v&agrave; Xiaomi 12X cũng được đồn đo&aacute;n sở hữu m&agrave;n h&igrave;nh AMOLED với thiết kế cạnh cong. M&agrave;n h&igrave;nh của hai thiết bị sẽ hỗ trợ độ ph&acirc;n giải Full HD+ v&agrave; tốc độ l&agrave;m tươi 120 Hz. K&iacute;ch thước m&agrave;n h&igrave;nh của mẫu 12X được cho l&agrave; 6.28 inch.</p>\r\n\r\n<p style=\"text-align:center\">Xiaomi 12 c&oacute; thể được trang bị Snapdragon 8 Gen 1, c&ograve;n Xiaomi 12X được cho sở hữu vi xử l&yacute; Snapdragon 870. Cả hai c&oacute; thể được t&iacute;ch hợp camera ch&iacute;nh 50 MP.</p>\r\n', 3, 'blog1.jpg'),
(2, 'Tên bài viết 2', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi, eligendi dolore. Sapiente omnis numquam mollitia asperiores animi</p>\r\n', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi, eligendi dolore. Sapiente omnis numquam mollitia asperiores animi, veritatis sint illo magnam, voluptatum labore, quam ducimus! Nisi doloremque praesentium laudantium repellat.</p>\r\n', 2, 'blog1.jpg'),
(3, 'Cùng điểm qua bảng giá iPhone mới nhất 2021, hứa hẹn sẽ có rất nhiều khuyến mãi trong tháng 12 này', '', '<p>&nbsp;</p>\r\n\r\n<h2>Th&aacute;ng 12 n&agrave;y, c&ugrave;ng m&igrave;nh cập nhật qua&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/bang-gia-iphone-moi-nhat-2021-o-the-gioi-di-dong-1379571\" target=\"_blank\">bảng gi&aacute; iPhone mới nhất 2021</a>&nbsp;ở<strong>&nbsp;</strong><a href=\"https://www.thegioididong.com/\" target=\"_blank\">Thế Giới Di Động</a>. Xem thử c&oacute; những g&igrave; đổi mới, khuyến m&atilde;i như thế n&agrave;o? Biết đ&acirc;u đ&oacute;, lại c&oacute; sản phẩm bạn y&ecirc;u th&iacute;ch v&agrave; mong muốn sở hữu được giảm sốc th&igrave; sao.</h2>\r\n\r\n<p>Kh&ocirc;ng để c&aacute;c bạn đợi l&acirc;u th&ecirc;m nữa, ch&uacute;ng ta c&ugrave;ng bắt đầu th&ocirc;i n&agrave;o!</p>\r\n\r\n<h3><strong>Bảng gi&aacute;&nbsp;iPhone mới nhất 2021 ở Thế Giới Di Động</strong></h3>\r\n\r\n<p><strong>Thời gian khuyến m&atilde;i</strong>: Đến ng&agrave;y 31/12/2021.</p>\r\n\r\n<p><strong>Lưu &yacute;:&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Một số khuyến m&atilde;i chỉ &aacute;p dụng đặt mua Online.</li>\r\n	<li>Khuyến m&atilde;i c&oacute; thể kết th&uacute;c sớm nếu hết số lượng sản phẩm hoặc th&ocirc;ng tin khuyến m&atilde;i thay đổi.</li>\r\n</ul>\r\n\r\n<p><strong>Ưu đ&atilde;i th&ecirc;m:</strong></p>\r\n\r\n<ul>\r\n	<li>Giảm 50% gi&aacute; mua g&oacute;i bảo hiểm rơi vỡ 6 th&aacute;ng (trị gi&aacute; đến 1.000.000 đồng).</li>\r\n	<li>Giảm 50% gi&aacute; g&oacute;i cước 1 năm (Vina350/Vina500) cho Sim VinaPhone trả sau (trị gi&aacute; đến 3.000.000&nbsp;đồng).</li>\r\n</ul>\r\n\r\n<h3><strong>iPhone 12 Pro 256GB: Giảm 1.500.000 đồng, gi&aacute; c&ograve;n 29.990.000 đồng</strong></h3>\r\n\r\n<p><img alt=\"\" src=\"https://www.thegioididong.com/tin-tuc/bang-gia-iphone-moi-nhat-2021-o-the-gioi-di-dong-1379571\" /></p>\r\n\r\n<p>Sở hữu&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-12-pro-256gb\" target=\"_blank\">iPhone 12 Pro 256GB</a>&nbsp;l&agrave;&nbsp;bạn sẽ c&oacute; cho m&igrave;nh một chiếc m&aacute;y sang trọng với vẻ ngo&agrave;i vu&ocirc;ng vức, kết hợp c&ugrave;ng m&agrave;n h&igrave;nh OLED rộng 6.1 inch. Bộ 3 camera sau đỉnh cao, được t&iacute;ch hợp nhiều t&iacute;nh năng hiện đại từ nhiếp ảnh cho đến quay phim để bạn thoải m&aacute;i s&aacute;ng tạo.</p>\r\n\r\n<p>Đặc biệt, việc trang bị con chip Apple A14 Bionic v&agrave; hỗ trợ kết nối 5G tốc độ cao cũng bạn c&oacute; được những trải nghiệm tuyệt vời hơn bao giờ hết.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dtdd/iphone-12-pro-256gb\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg\" /></a></p>\r\n\r\n<h3><a href=\"https://www.thegioididong.com/dtdd/iphone-12-pro-256gb\">iPhone 12 Pro 256GB</a></h3>\r\n\r\n<p>Online giá rẻ</p>\r\n\r\n<p><strong>29.990.000₫</strong>&nbsp;31.490.000₫</p>\r\n\r\n<p><img alt=\"VNPAY GIẢM 500k\" src=\"https://cdn.tgdd.vn/2020/10/content/icon6-50x50.png\" style=\"height:20px; width:20px\" />VNPAY GIẢM 500K</p>\r\n\r\n<p>&nbsp;Trả góp 0%</p>\r\n\r\n<p>M&agrave;n h&igrave;nh 6.1&quot;, Chip Apple A14 BionicRAM 6 GB, ROM 256 GBCamera sau: 3 camera 12 MPCamera trước: 12 MPPin 2815 mAh, Sạc 20 W</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dtdd/iphone-12-pro-256gb\">XEM CHI TIẾT</a></p>\r\n\r\n<p>Ngo&agrave;i ra, vẫn c&ograve;n những mẫu&nbsp;<a href=\"https://www.thegioididong.com/dtdd-apple-iphone\" target=\"_blank\">iPhone</a>&nbsp;kh&aacute;c cũng nổi bật kh&ocirc;ng k&eacute;m, như l&agrave;:</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-xr\" target=\"_blank\">iPhone XR 64GB</a>: Gi&aacute; chỉ c&ograve;n&nbsp;14.490.000 đồng sau khi giảm 500.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-xr-128gb\" target=\"_blank\">iPhone XR 128GB</a>:&nbsp;Gi&aacute; chỉ c&ograve;n&nbsp;16.990.000 đồng sau khi giảm&nbsp;500.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-se-64gb-2020-hop-moi\" target=\"_blank\">iPhone SE 64GB (2020)</a>:&nbsp;Gi&aacute; chỉ c&ograve;n&nbsp;12.490.000 đồng sau khi giảm 1.000.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-se-128gb-2020\" target=\"_blank\">iPhone SE 128GB (2020)</a>:&nbsp;Gi&aacute; chỉ c&ograve;n&nbsp;13.490.000 đồng sau khi giảm 500.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-se-256gb-2020\" target=\"_blank\">iPhone SE 256GB (2020)</a>:&nbsp;Gi&aacute; chỉ c&ograve;n&nbsp;15.490.000 đồng sau khi giảm 500.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-11\" target=\"_blank\">iPhone 11 64GB</a>: Gi&aacute; chỉ c&ograve;n&nbsp;17.390.000 đồng sau khi giảm 1.600.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-11-128gb\" target=\"_blank\">iPhone 11 128GB</a>: Gi&aacute; chỉ c&ograve;n&nbsp;19.490.000 đồng sau khi giảm 2.000.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-11-256gb\" target=\"_blank\">iPhone 11 256GB</a>: Gi&aacute; chỉ c&ograve;n&nbsp;20.490.000 đồng sau khi giảm 500.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-12\" target=\"_blank\">iPhone 12 64GB</a>: Gi&aacute; chỉ c&ograve;n 20.490.000 đồng sau khi giảm 2.000.000&nbsp;đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-12-128gb\" target=\"_blank\">iPhone 12 128GB</a>: Gi&aacute; chỉ c&ograve;n&nbsp;22.490.000 đồng sau khi giảm 3.500.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-12-256gb\" target=\"_blank\">iPhone 12 256GB</a>:&nbsp;Gi&aacute; chỉ c&ograve;n&nbsp;24.990.000 đồng sau khi giảm 2.000.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-12-mini\" target=\"_blank\">iPhone 12 mini 64GB</a>:&nbsp;Gi&aacute; chỉ c&ograve;n&nbsp;16.490.000 đồng sau khi giảm&nbsp;2.500.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-12-mini-128gb\" target=\"_blank\">iPhone 12 mini 128GB</a>:&nbsp;Gi&aacute; chỉ c&ograve;n 19.990.000 đồng sau khi giảm 1.000.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-12-mini-256gb\" target=\"_blank\">iPhone 12 mini 256GB</a>:&nbsp;Gi&aacute; chỉ c&ograve;n&nbsp;19.990.000 đồng sau khi giảm 2.000.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-12-pro\" target=\"_blank\">iPhone 12 Pro 128GB</a>:&nbsp;Gi&aacute; chỉ c&ograve;n&nbsp;28.490.000 đồng sau khi giảm 2.000.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-12-pro-512gb\" target=\"_blank\">iPhone 12 Pro 512GB</a>: Gi&aacute; chỉ c&ograve;n&nbsp;35.490.000 đồng sau khi giảm 3.000.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-12-pro-max\" target=\"_blank\">iPhone 12 Pro Max 128GB</a>: Gi&aacute; chỉ c&ograve;n&nbsp;31.490.000 đồng sau khi giảm 1.500.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-12-pro-max-256gb\" target=\"_blank\">iPhone 12 Pro Max 256GB</a>: Gi&aacute; chỉ c&ograve;n&nbsp;33.490.000 đồng sau khi giảm 3.500.000 đồng.</li>\r\n	<li><a href=\"https://www.thegioididong.com/dtdd/iphone-12-pro-max-512gb\" target=\"_blank\">iPhone 12 Pro Max 512GB</a>: Gi&aacute; chỉ c&ograve;n&nbsp;38.490.000 đồng sau khi giảm 3.500.000 đồng.</li>\r\n</ul>\r\n\r\n<p>Sau khi xem qua, theo bạn th&igrave; đ&acirc;u l&agrave; sản phẩm đ&aacute;ng sắm về nhất?</p>\r\n\r\n<p>Chớ qu&ecirc;n tham khảo th&ecirc;m nhiều deal HOT kh&aacute;c trong chương tr&igrave;nh&nbsp;<a href=\"http://www.thegioididong.com/tin-tuc/mua-sam-cuoi-nam-cung-the-gioi-di-dong-thang-12-1401187\" target=\"_blank\">khuyến m&atilde;i Th&aacute;ng 12 Thế Giới Di Động</a>&nbsp;nữa nha.</p>\r\n', 3, 'blog3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `binhluan_id` int(11) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `noidung` text NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trangthai` int(11) NOT NULL COMMENT '0: chờ duyệt\r\n1: đã duyệt\r\n2: ẩn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`binhluan_id`, `khachhang_id`, `name`, `noidung`, `sanpham_id`, `ngaythang`, `trangthai`) VALUES
(23, 1, 'Thành Phú', ' Almira luôn đặt chất lượng lên đầu, tất cả sản phẩm của Almira đều được chăm chút tỉ mỉ nhằm đem đến cho khách hàng chất lượng tốt nhất!', 1, '2021-11-29 04:23:31', 1),
(24, 1, 'Thành Phú', ' đẹp lắm', 1, '2021-12-01 06:24:17', 1),
(25, 31, 'Thành Phú', 'tôi đã mua và sử dụng! sản phẩm rất tốt và giao hàng rất nhanh', 36, '2021-12-06 00:17:17', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_img`) VALUES
(1, 'Điện thoại', 'phone_menu.png'),
(2, 'Tai nghe', 'JBL_JR 310BT_Product Image_Hero_Skyblue.png'),
(3, 'Đồng hồ thông minh', 'smartwatch_menu.png'),
(4, 'Phụ kiện', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_donhang`
--

CREATE TABLE `chitiet_donhang` (
  `id_chitietdonhang` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitiet_donhang`
--

INSERT INTO `chitiet_donhang` (`id_chitietdonhang`, `donhang_id`, `sanpham_id`, `soluong`) VALUES
(138, 201, 35, 1),
(139, 202, 35, 1),
(140, 203, 37, 1),
(141, 204, 37, 3),
(142, 205, 36, 1),
(143, 206, 37, 1),
(144, 207, 37, 1),
(145, 208, 37, 1),
(146, 209, 35, 1),
(147, 210, 36, 3),
(148, 211, 35, 1),
(149, 212, 35, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc_tintuc`
--

CREATE TABLE `danhmuc_tintuc` (
  `danhmuctin_id` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc_tintuc`
--

INSERT INTO `danhmuc_tintuc` (`danhmuctin_id`, `tendanhmuc`) VALUES
(1, 'Tin về đồng hồ'),
(2, 'Tin về tai nghe'),
(3, 'Tin về điện thoại'),
(5, 'Tin vặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `donhang_id` int(11) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `ngaythang` varchar(50) NOT NULL,
  `tinhtrang` int(11) NOT NULL COMMENT '0: chưa xử lý \r\n1: đã xử lý\r\n2: Đang giao hàng\r\n3: Giao hàng thành công',
  `huydon` int(11) NOT NULL DEFAULT 0 COMMENT '0: đơn hàng bình thường\r\n1: đơn hàng đang yêu cầu hủy\r\n2: đơn hàng đã hủy',
  `makhuyenmai` varchar(50) NOT NULL,
  `tongtien` float NOT NULL,
  `tongthanhtoan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`donhang_id`, `khachhang_id`, `ngaythang`, `tinhtrang`, `huydon`, `makhuyenmai`, `tongtien`, `tongthanhtoan`) VALUES
(201, 32, '2021/12/10 04:28:35', 0, 0, '', 4290000, 4315000),
(202, 32, '2021/12/10 04:28:51', 0, 0, '', 4290000, 3797200),
(203, 34, '2021/12/10 04:39:34', 0, 0, '', 6290000, 6215000),
(204, 34, '2021/12/10 04:46:24', 0, 0, '', 18870000, 16627600),
(205, 34, '2021/12/10 04:51:37', 0, 0, '', 3990000, 3533200),
(206, 34, '2021/12/10 04:57:13', 0, 0, '', 6290000, 5557200),
(207, 34, '2021/12/10 04:57:55', 0, 0, '', 6290000, 6315000),
(208, 34, '2021/12/10 04:59:21', 0, 0, '', 6290000, 5557200),
(209, 34, '2021/12/10 05:03:00', 0, 0, 'A', 4290000, 3797200),
(210, 34, '2021/12/10 13:00:06', 0, 0, 'LTP', 11970000, 11895000),
(211, 34, '2021/12/10 13:02:31', 0, 0, 'ABC', 4290000, 3797200),
(212, 34, '2021/12/10 13:04:11', 0, 0, 'ok', 4290000, 4215000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `giohang_id` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `giasanpham` varchar(50) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`giohang_id`, `tensanpham`, `sanpham_id`, `giasanpham`, `hinhanh`, `soluong`) VALUES
(336, 'Đồng hồ Garmin Forerunner 55', 35, '4290000', 'dh3.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `khachhang_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `khachhang_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`khachhang_id`, `name`, `phone`, `address`, `email`, `password`, `khachhang_img`) VALUES
(32, 'Thành Phú', '0794248804', 'Châu Thành, Đồng Tháp', 'phuly4795@gmail.com', '123', '237d4f4420b9d5e78ca8.jpg'),
(33, 'tui la tui', '0799880851', 'qweqrffs', 'thanhvinhly9@gmail.com', '1234567', '237d4f4420b9d5e78ca8.jpg'),
(34, 'Thành Phú', '0794248804', 'Châu Thành, Đồng Tháp', 'phultpc01595@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'new.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `makhuyenmai` varchar(50) NOT NULL,
  `tenmagiamgia` varchar(100) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `hinhthuckhuyenmai` int(11) NOT NULL COMMENT '1: giam %\r\n2: giảm giá tiền',
  `giagiam` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`makhuyenmai`, `tenmagiamgia`, `ngaybatdau`, `ngayketthuc`, `hinhthuckhuyenmai`, `giagiam`) VALUES
('ABC', 'Giảm cực mạnh', '2021-12-09', '2021-12-12', 1, 12),
('LTP', 'Giảm giá COVID', '2021-12-09', '2022-12-11', 2, 100000),
('ok', 'Tri ân', '2021-12-09', '2022-12-11', 2, 100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `nhacungcap_id` int(11) NOT NULL,
  `tennhacungcap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`nhacungcap_id`, `tennhacungcap`) VALUES
(1, 'FPT'),
(2, 'Thế giới di động'),
(4, 'Mi Home'),
(5, 'Viettel');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sanpham_name` varchar(255) NOT NULL,
  `sanpham_chitiet` text NOT NULL,
  `sanpham_mota` text NOT NULL,
  `sanpham_gia` float NOT NULL,
  `sanpham_giakhuyenmai` float NOT NULL,
  `sanpham_active` int(11) NOT NULL COMMENT '0: sản phẩm đang bán\r\n1: sản phẩm ngừng bán hoặc hết hàng',
  `sanpham_hot` int(11) NOT NULL COMMENT '0:sản phẩm bình thường\r\n1:sản phẩm hot',
  `sanpham_soluong` int(11) NOT NULL,
  `sanpham_img` varchar(50) NOT NULL,
  `nhacungcap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`sanpham_id`, `category_id`, `sanpham_name`, `sanpham_chitiet`, `sanpham_mota`, `sanpham_gia`, `sanpham_giakhuyenmai`, `sanpham_active`, `sanpham_hot`, `sanpham_soluong`, `sanpham_img`, `nhacungcap_id`) VALUES
(1, 1, 'Samsung Galaxy Z Flip3 5G 128GB', '<h1 style=\"text-align:center\"><span style=\"font-size:26px\"><strong>Đ&aacute;nh gi&aacute; chi tiết&nbsp;Samsung Galaxy Z Flip3 5G</strong></span></h1>\r\n\r\n<p style=\"text-align:center\">Một biểu tượng thời trang, một kiệt t&aacute;c của thế giới c&ocirc;ng nghệ m&agrave; ai cũng phải kinh ngạc khi nh&igrave;n thấy&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/samsung-galaxy-z-flip-3\">Samsung Galaxy Z Flip3 5G</a>&nbsp;v&agrave; c&aacute;ch m&agrave; bạn sử dụng si&ecirc;u phẩm smartphone n&agrave;y, nơi c&ocirc;ng nghệ điện thoại m&agrave;n h&igrave;nh gập đ&atilde; mang đến những điều kh&ocirc;ng tưởng.</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:center\"><a href=\"https://www.thegioididong.com/images/42/229949/samsung-galaxy-z-flip-3-15.jpg\" onclick=\"return false;\"><img alt=\"Điện thoại Samsung Galaxy Z Flip3 5G 128GB | Khung viền nhôm cao cấp, thời trang\" src=\"https://cdn.tgdd.vn/Products/Images/42/229949/samsung-galaxy-z-flip-3-15.jpg\" title=\"Điện thoại Samsung Galaxy Z Flip3 5G 128GB | Khung viền nhôm cao cấp, thời trang\" /></a></h3>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>\r\n			<td style=\"text-align:center\">M&agrave;n h&igrave;nh ch&iacute;nh: 6.7&rdquo;, M&agrave;n h&igrave;nh phụ: 1.9&rdquo;, FHD+</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau</td>\r\n			<td style=\"text-align:center\">12.0 MP + 12.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera Selfie</td>\r\n			<td style=\"text-align:center\">10.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM&nbsp;</td>\r\n			<td style=\"text-align:center\">8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong</td>\r\n			<td style=\"text-align:center\">128 GB</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 29990000, 24990000, 0, 1, 100, 'samsung-galaxy-z-flip-3-violet-1-600x600.jpg', 2),
(2, 2, 'Tai nghe Gaming Zadez GT-326P', '', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Chất liệu</td>\r\n			<td style=\"text-align:center\">Đệm tai&nbsp;si&ecirc;u mềm, thoải m&aacute;i</td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&ocirc;ng suất</td>\r\n			<td style=\"text-align:center\">35 mW</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&acirc;y d&agrave;i&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>\r\n			<td style=\"text-align:center\">2.1m</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&ograve;ng h&agrave;ng</td>\r\n			<td style=\"text-align:center\">Tai nghe c&oacute; d&acirc;y</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&ograve;ng m&aacute;y tương th&iacute;ch 1&nbsp; &nbsp;&nbsp;</td>\r\n			<td style=\"text-align:center\">Laptop</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 750000, 650000, 0, 1, 100, 'JBL_QUANTUM ONE_Product Image_Angle.png', 1),
(3, 3, 'Đồng hồ Xiaomi Mi Watch Lite ', '<h2 style=\"text-align:center\"><strong>Đ&aacute;nh gi&aacute; chi tiết&nbsp;Đồng hồ th&ocirc;ng minh Xiaomi Mi Watch Lite</strong></h2>\r\n\r\n<p style=\"text-align:center\">Chiếc&nbsp;<a href=\"https://fptshop.com.vn/dong-ho\">đồng hồ</a>&nbsp;thời trang, m&agrave;n h&igrave;nh m&agrave;u đẹp rực rỡ, chống nước v&agrave; loạt t&iacute;nh năng theo d&otilde;i sức khỏe ấn tượng,&nbsp;<a href=\"https://fptshop.com.vn/smartwatch/xiaomi-mi-watch-lite\">Xiaomi Mi Watch Lite</a>&nbsp;l&agrave; sản phẩm c&ocirc;ng nghệ tuyệt vời trong mức gi&aacute; rẻ đến bất ngờ.</p>\r\n\r\n<p style=\"text-align:center\"><strong><img alt=\"Đánh giá đồng hồ thông minh Xiaomi Mi Watch Lite\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/xiaomi-mi-watch-lite.jpg\" /></strong></p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>&ocirc;ng nghệ m&agrave;n h&igrave;nh</td>\r\n			<td>TFT LCD</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước m&agrave;n h&igrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>\r\n			<td>1.4&quot;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU</td>\r\n			<td>Dialog 14695</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong</td>\r\n			<td>256 Mb</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh</td>\r\n			<td>RTOS</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1990000, 1090000, 0, 1, 100, 'dh2.jpg', 4),
(4, 4, 'Ốp lưng Magsage iPhone 13 Pro Max Mipow', '<h2 style=\"text-align:center\"><strong>Đặc điểm nổi bật</strong></h2>\r\n\r\n<p style=\"text-align:center\">Được chế t&aacute;c d&agrave;nh ri&ecirc;ng cho si&ecirc;u phẩm&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/iphone-13-pro-max\">iPhone 13 Pro Max</a>&nbsp;với 3 ti&ecirc;u ch&iacute; trọng t&acirc;m l&agrave; đem đến sự bảo vệ tốt nhất, n&acirc;ng tầm vẻ đẹp cho thiết bị v&agrave; tương th&iacute;ch với c&ocirc;ng nghệ sạc MagSafe, bộ ốp lưng chống sốc đến từ Mipow sẽ l&agrave; giải ph&aacute;p tối ưu khi chọn mua&nbsp;<a href=\"https://fptshop.com.vn/phu-kien\">phụ kiện</a>&nbsp;cho iPhone 13 Pro max.</p>\r\n\r\n<p style=\"text-align:center\"><strong><img alt=\"Ốp lưng iPhone 13 Pro Max Silicon chống sốc Mipow 1\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/BaoPK/10CrazyThingSmarphone/Op-lung-iphone-13-pro-max-silicon-chong-soc-mipow-1.JPG\" /></strong></p>\r\n\r\n<h3 style=\"text-align:center\">&nbsp;</h3>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Chất liệu</td>\r\n			<td style=\"text-align:center\">Silicon</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&ograve;ng m&aacute;y tương th&iacute;ch 1</td>\r\n			<td style=\"text-align:center\">iPhone 13 Pro Max</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại</td>\r\n			<td style=\"text-align:center\">Ốp lưng</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Năm sản xuất</td>\r\n			<td style=\"text-align:center\">2021</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nguồn gốc</td>\r\n			<td style=\"text-align:center\">Mỹ</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 540000, 432000, 0, 1, 95, '637686120429102718_AVT.jpg', 4),
(5, 1, 'iPhone 13 128GB', '<h2 style=\"text-align:center\"><strong>Đ&aacute;nh gi&aacute; chi tiết&nbsp;iPhone 13 Pro Max</strong></h2>\r\n\r\n<p style=\"text-align:center\">iPhone 13 Pro Max&nbsp;xứng đ&aacute;ng l&agrave; một&nbsp;chiếc iPhone lớn nhất, mạnh mẽ nhất v&agrave; c&oacute; thời lượng pin d&agrave;i nhất từ trước đến nay sẽ cho bạn trải nghiệm tuyệt vời, từ những t&aacute;c vụ b&igrave;nh thường cho đến c&aacute;c ứng dụng chuy&ecirc;n nghiệp.</p>\r\n\r\n<p style=\"text-align:center\"><strong><img alt=\"iPhone 13 Pro Max\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-13-pro-max-2.jpg\" /></strong></p>\r\n\r\n<h3 style=\"text-align:center\">&nbsp;</h3>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>\r\n			<td style=\"text-align:center\">6.7&quot;, Super Retina XDR, OLED</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau</td>\r\n			<td style=\"text-align:center\">12.0 MP + 12.0 MP + 12.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera Selfie</td>\r\n			<td style=\"text-align:center\">12.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM&nbsp;</td>\r\n			<td style=\"text-align:center\">6 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong</td>\r\n			<td style=\"text-align:center\">128 GB</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 30490000, 25490000, 0, 1, 98, 'iphone-13-midnight-2-600x600.jpg', 5),
(6, 2, 'Tai nghe có dây i.value T-139 ', '<h2 style=\"text-align:center\"><strong>Đặc điểm nổi bật</strong></h2>\r\n\r\n<p style=\"text-align:center\">L&agrave; sản phẩm c&oacute; gi&aacute; b&aacute;n hợp l&yacute; vừa t&uacute;i tiền,&nbsp;<a href=\"https://fptshop.com.vn/phu-kien/tai-nghe-co-day-choang-dau-co-mic-ivalue-t-139\">tai nghe chụp tai c&oacute; d&acirc;y c&oacute; mic i.value T-139</a>&nbsp;sẽ g&acirc;y bất ngờ cho người d&ugrave;ng ngay trong lần sử dụng đầu ti&ecirc;n bởi trải nghiệm tuyệt vời m&agrave; n&oacute; đem lại. Từ cảm gi&aacute;c đeo thoải m&aacute;i tr&ecirc;n tai cho tới chất lượng &acirc;m thanh thể hiện, T-139 đều cho thấy gi&aacute; trị vượt trội ngo&agrave;i mong đợi.</p>\r\n\r\n<h3 style=\"text-align:center\"><img alt=\"Mô tả sản phẩm tai nghe có dây choàng đầu có mic i.value T-139 1\" src=\"http://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/AnhNQ/1310/Mo-ta-san-pham-tai-nghe-co-day-choang-dau-co-mic-i-value-t-139-1.jpg\" /></h3>\r\n\r\n<h3 style=\"text-align:center\">&nbsp;</h3>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Chất liệu</td>\r\n			<td style=\"text-align:center\">Nhựa, silicon</td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&ocirc;ng suất&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>\r\n			<td style=\"text-align:center\">20mW</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&acirc;y d&agrave;i</td>\r\n			<td style=\"text-align:center\">&nbsp; &nbsp; &nbsp; 1.2 m&eacute;t</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&ograve;ng h&agrave;ng</td>\r\n			<td style=\"text-align:center\">Tai nghe&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại kết nối</td>\r\n			<td style=\"text-align:center\">Jack 3.5 mm</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 500000, 449000, 0, 1, 100, '637719900945146267_HASP-00774722-dd.jpg', 1),
(7, 2, 'Tai nghe có dây Rapoo VH160', '<h2 style=\"text-align:center\"><strong>Đặc điểm nổi bật</strong></h2>\r\n\r\n<p style=\"text-align:center\">L&agrave; chiếc&nbsp;<a href=\"https://fptshop.com.vn/phu-kien/tai-nghe\">tai nghe</a>&nbsp;l&yacute; tưởng d&agrave;nh cho c&aacute;c t&iacute;n đồ eSports,&nbsp;<a href=\"https://fptshop.com.vn/phu-kien/tai-nghe-co-day-choang-dau-co-mic-rapoo-vh160\">Rapoo VH160</a>&nbsp;sở hữu c&uacute;p tai mềm c&aacute;ch &acirc;m tốt, đồng thời thể hiện chất &acirc;m xuất sắc nhờ c&ocirc;ng nghệ &acirc;m thanh v&ograve;m 7.1 sống động. Bạn sẽ dễ d&agrave;ng kết nối sản phẩm với&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\">laptop</a>,&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\">PC</a>&nbsp;v&agrave; khơi dậy cảm hứng gaming qua đ&egrave;n LED RGB độc đ&aacute;o.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Tai nghe có dây choàng đầu Rapoo VH160 Đen 1\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/BaoPK/6BiMatVeLGV10/Tai-nghe-vh160-den-1.jpg\" /></p>\r\n\r\n<h3 style=\"text-align:center\">&nbsp;</h3>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Chất liệu</td>\r\n			<td style=\"text-align:center\">nhựa, da</td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&ocirc;ng suất</td>\r\n			<td style=\"text-align:center\">200W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&acirc;y d&agrave;i</td>\r\n			<td style=\"text-align:center\">220cm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&ograve;ng h&agrave;ng</td>\r\n			<td style=\"text-align:center\">Tai nghe c&oacute; d&acirc;y cho&agrave;ng đầu C&oacute; mic 400K</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&ograve;ng m&aacute;y tương th&iacute;ch 1</td>\r\n			<td style=\"text-align:center\">PC</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 500000, 449000, 0, 1, 100, 'JBL_E55BT_KEY_RED_6063_FS_x1-1605x1605px.webp', 2),
(15, 1, 'Xiaomi 11T 5G 128GB', '<h2 style=\"text-align:center\"><strong>Đ&aacute;nh gi&aacute; chi tiết&nbsp;Xiaomi 11T 8GB - 128GB</strong></h2>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://fptshop.com.vn/dien-thoai/xiaomi-11t-pro\">Xiaomi 11T Pro</a>&nbsp;l&agrave; chiếc&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai\">điện thoại</a>&nbsp;cao cấp c&oacute; mức gi&aacute; tốt nhất hiện nay. Bạn sẽ nhận được camera chuy&ecirc;n nghiệp 108MP, sạc si&ecirc;u nhanh 120W, m&agrave;n h&igrave;nh AMOLED 120Hz mượt m&agrave; hỗ trợ Dolby Vision v&agrave; bộ vi xử l&yacute; đầu bảng Snapdragon 888, một loạt những t&iacute;nh năng đỉnh cao sẽ mang tới trải nghiệm th&uacute; vị hơn bao giờ hết.</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><strong><img alt=\"Xiaomi 11T Pro\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/xiaomi-11t-pro-1.jpg\" /></strong></p>\r\n\r\n<h3 style=\"text-align:center\">&nbsp;</h3>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>\r\n			<td style=\"text-align:center\">6.67&quot;, FHD+, AMOLED DotDisplay</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau</td>\r\n			<td style=\"text-align:center\">108.0 MP + 8.0 MP + 5.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera Selfie</td>\r\n			<td style=\"text-align:center\">16.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM&nbsp;</td>\r\n			<td style=\"text-align:center\">12 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong</td>\r\n			<td style=\"text-align:center\">256 GB</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 10990000, 10490000, 0, 1, 100, 'xiaomi-11t-white-1-2-600x600.jpg', 1),
(16, 1, 'OPPO Reno6 Z 5G', '<h2 style=\"text-align:center\"><strong>Đ&aacute;nh gi&aacute; chi tiết&nbsp;OPPO Reno6 Z 5G</strong></h2>\r\n\r\n<p style=\"text-align:center\">Kh&ocirc;ng chỉ đưa bạn đến những trải nghiệm đầy phấn kh&iacute;ch của mạng 5G si&ecirc;u tốc,&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/oppo-reno6-z\">OPPO Reno6 Z 5G</a>&nbsp;c&ograve;n l&agrave; chiếc&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai\">điện thoại</a>&nbsp;tuyệt vời để lưu giữ cảm x&uacute;c. Chụp ảnh v&agrave; quay video ch&acirc;n dung chưa bao giờ th&uacute; vị đến thế với loạt t&iacute;nh năng chuy&ecirc;n nghiệp, đầy nghệ thuật.</p>\r\n\r\n<p style=\"text-align:center\"><strong><img alt=\"OPPO Reno6 Z 5G\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/oppo-reno-6z-5g-1.jpg\" /></strong></p>\r\n\r\n<h3 style=\"text-align:center\">&nbsp;</h3>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh</td>\r\n			<td style=\"text-align:center\">6.43&quot;, FHD+, AMOLED</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>\r\n			<td style=\"text-align:center\">64.0 MP + 8.0 MP + 2.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera Selfie</td>\r\n			<td style=\"text-align:center\">32.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM&nbsp;</td>\r\n			<td style=\"text-align:center\">8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong</td>\r\n			<td style=\"text-align:center\">128 GB</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 9590000, 9490000, 0, 1, 100, 'oppo-reno6-pro-blue-1-600x600.jpg', 1),
(26, 2, 'Tai nghe AirPods Pro', '<h2 style=\"text-align:center\"><strong>Đặc điểm nổi bật</strong></h2>\r\n\r\n<p style=\"text-align:center\">AirPods Pro sẽ đưa bạn ch&igrave;m v&agrave;o kh&ocirc;ng gian &acirc;m nhạc s&acirc;u lắng v&agrave; đem tới trải nghiệm giải tr&iacute; ưu việt chưa từng c&oacute; tr&ecirc;n d&ograve;ng tai nghe kh&ocirc;ng d&acirc;y Apple. Những n&acirc;ng cấp mạnh mẽ về thiết kế v&agrave; c&ocirc;ng nghệ gi&uacute;p tai nghe&nbsp;<a href=\"http://fptshop.com.vn/phu-kien/apple-tai-nghe-airpods-pro\">AirPods Pro</a>&nbsp;trở th&agrave;nh thiết bị nghe nhạc chuy&ecirc;n nghiệp thực thụ.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Tai nghe AirPods Pro chính hãng\" src=\"http://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/AnhNQ/02/Mo-ta-san-pham-tai-nghe-khong-day-apple-airpods-pro-1.JPG\" /></p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Chất liệu</td>\r\n			<td>Nhựa cao cấp</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&acirc;y d&agrave;i</td>\r\n			<td>C&aacute;p sạc USB-C to Lightning d&agrave;i 1m</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&ograve;ng h&agrave;ng&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>\r\n			<td>Airpods Pro</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&ograve;ng m&aacute;y tương th&iacute;ch 1</td>\r\n			<td>iPhone, iPad, Apple Watch, Mac, Apple TV, iPod</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&ograve;ng m&aacute;y tương th&iacute;ch 2</td>\r\n			<td>Điện thoại, MTB</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 6790000, 4990000, 0, 1, 100, 'TaingheAirPodsPro.jpg', 2),
(27, 2, 'Tai nghe Mi TWS Earphones 2 ', '<h2 style=\"text-align:center\"><strong>Đặc điểm nổi bật</strong></h2>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://fptshop.com.vn/phu-kien/tai-nghe-mi-true-wireless-earphones-2-basic\">Mi True Earphone 2 Basic</a>&nbsp;l&agrave; mẫu&nbsp;<a href=\"https://fptshop.com.vn/phu-kien/tai-nghe-khong-day\">tai nghe kh&ocirc;ng d&acirc;y</a>&nbsp;l&yacute; tưởng nhất hiện tại với thời lượng pin l&ecirc;n đến 20 giờ li&ecirc;n tục, hỗ trợ đ&agrave;m thoại r&otilde; r&agrave;ng nhờ micro k&eacute;p c&oacute; t&iacute;nh năng khử ồn m&ocirc;i trường. Sản phẩm sẽ tự động gh&eacute;p đ&ocirc;i v&agrave; tự động kết nối khi đặt gần smartphone, đồng thời cho chất lượng &acirc;m thanh tuyệt vời nhờ loa 14,2mm.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Tai nghe không dây Xiaomi Mi True Wireless Earphones 2\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/07/15/Tai-nghe-khong-day-mi-true-earphone-2-basic-1.jpg\" /></p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>hất liệu&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>\r\n			<td>Nhựa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&acirc;y d&agrave;i</td>\r\n			<td>kh&ocirc;ng d&acirc;y</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&ograve;ng m&aacute;y tương th&iacute;ch 1</td>\r\n			<td>Apple, Samsung..</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&ograve;ng m&aacute;y tương th&iacute;ch 2</td>\r\n			<td>Xiaomi, Huawei..</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh tương th&iacute;ch</td>\r\n			<td>Android, iOS, Windows</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 0, 1590000, 0, 0, 100, 'tainghe2.jpg', 2),
(28, 2, 'Tai nghe Airpods Pro 2021', '<h2 style=\"text-align:center\"><strong>Đặc điểm nổi bật</strong></h2>\r\n\r\n<p style=\"text-align:center\">AirPods Pro 2021 sẽ gi&uacute;p bạn cảm nhận trọn vẹn những gi&aacute; trị l&agrave;m n&ecirc;n t&ecirc;n tuổi của d&ograve;ng tai nghe Apple như sự tinh xảo, độ nhỏ gọn v&agrave; t&iacute;nh đa dụng th&ocirc;ng qua hộp sạc đặc trưng. Sản phẩm sử dụng chip H1 th&ocirc;ng minh v&agrave; tăng cường chất &acirc;m th&ocirc;ng qua Adaptive EQ. Những cải tiến hiệu quả trong phi&ecirc;n bản mới gi&uacute;p AirPods Pro 2021 tương th&iacute;ch tốt với c&ocirc;ng nghệ sạc MagSafe.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Tai nghe AirPods Pro 2021 1\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/AnhNQ/23/tai-nghe-airpods-pro-2021-7.jpg\" /></p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>D&ograve;ng h&agrave;ng</td>\r\n			<td>Airpods Pro</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&ograve;ng m&aacute;y tương th&iacute;ch&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>\r\n			<td>iPhone, iPad, iPod, Apple Watch, Apple TV, Mac</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin</td>\r\n			<td>L&ecirc;n đến 4.5h nghe nhạc</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh tương th&iacute;ch</td>\r\n			<td>iOS, iPadOS, watchOS, tvOS, macOS mới nhất</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại kết nối</td>\r\n			<td>Bluetooth</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 0, 4999000, 0, 1, 96, 'tainghe4.jpg', 2),
(29, 2, 'Tai nghe Samsung Galaxy Buds Pro', '<h2 style=\"text-align:center\"><strong>Đặc điểm nổi bật</strong></h2>\r\n\r\n<p style=\"text-align:center\">Kế thừa v&agrave; ph&aacute;t huy trọn vẹn những ưu điểm từ c&aacute;c thế hệ trước, tai nghe kh&ocirc;ng d&acirc;y&nbsp;<a href=\"https://fptshop.com.vn/phu-kien/tai-nghe-bluetooth-nhet-tai-samsung-galaxy-buds-pro\">Galaxy Buds Pro</a>&nbsp;c&oacute; thiết kế th&ocirc;ng minh với kiểu d&aacute;ng in-ear c&aacute;ch &acirc;m tốt. Sản phẩm đi k&egrave;m hộp sạc vu&ocirc;ng nhỏ gọn bo tr&ograve;n c&aacute;c g&oacute;c v&agrave; được t&iacute;ch hợp c&ocirc;ng nghệ chống ồn chủ động ANC linh hoạt với chất &acirc;m h&agrave;ng đầu thị trường.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Tai nghe Samsung Galaxy Buds Pro\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/07/15/Tai-nghe-samsung-galaxy-buds-pro-1.JPG\" /></p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Chất liệu</td>\r\n			<td>Nhựa, kim loại</td>\r\n		</tr>\r\n		<tr>\r\n			<td>D&ograve;ng h&agrave;ng&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>\r\n			<td>Tai nghe Bluetooth Nh&eacute;t tai Samsung 4990K</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng c&aacute;ch kết nối</td>\r\n			<td>10m</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại kết nối</td>\r\n			<td>Bluetooth</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại tai nghe</td>\r\n			<td>Kh&ocirc;ng d&acirc;y</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 4990000, 3990000, 0, 1, 97, 'tainghe5.jpg', 1),
(31, 1, 'Samsung Galaxy Z Fold3', '<h2 style=\"text-align:center\"><strong>Đ&aacute;nh gi&aacute; chi tiết&nbsp;Samsung Galaxy Z Fold3 5G</strong></h2>\r\n\r\n<p style=\"text-align:center\">Khi bạn mở ra m&agrave;n h&igrave;nh gập lớn tới 7,6 inch tr&ecirc;n&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/samsung-galaxy-z-fold3\">Samsung Galaxy Z Fold3 5G</a>&nbsp;l&agrave; l&uacute;c bạn đ&atilde; mở ra một tương lai ho&agrave;n to&agrave;n mới cho thế giới smartphone, nơi c&ocirc;ng nghệ vượt qua mọi giới hạn, cho trải nghiệm ho&agrave;n hảo nhất ở một thiết bị di động nhỏ gọn.</p>\r\n\r\n<p style=\"text-align:center\"><strong><img alt=\"Samsung Galaxy Z Fold3 5G\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/samsung-galaxy-z-fold3-5g-1.jpg\" /></strong></p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>\r\n			<td>M&agrave;n h&igrave;nh ch&iacute;nh: 7.6&rdquo;, M&agrave;n h&igrave;nh phụ: 6.2&rdquo;, HD+,</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau</td>\r\n			<td>12.0 MP + 12.0 MP + 12.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera Selfie</td>\r\n			<td>10.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM&nbsp;</td>\r\n			<td>12 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong</td>\r\n			<td>256 GB</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 0, 41990000, 0, 1, 97, 'dt1.jpg', 1),
(32, 1, 'Samsung Galaxy Z Flip3', '<h2 style=\"text-align:center\"><strong>Đ&aacute;nh gi&aacute; chi tiết&nbsp;Samsung Galaxy Z Flip3 5G</strong></h2>\r\n\r\n<p style=\"text-align:center\">Một biểu tượng thời trang, một kiệt t&aacute;c của thế giới c&ocirc;ng nghệ m&agrave; ai cũng phải kinh ngạc khi nh&igrave;n thấy&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/samsung-galaxy-z-flip-3\">Samsung Galaxy Z Flip3 5G</a>&nbsp;v&agrave; c&aacute;ch m&agrave; bạn sử dụng si&ecirc;u phẩm smartphone n&agrave;y, nơi c&ocirc;ng nghệ điện thoại m&agrave;n h&igrave;nh gập đ&atilde; mang đến những điều kh&ocirc;ng tưởng.</p>\r\n\r\n<p style=\"text-align:center\"><strong><img alt=\"Samsung Galaxy Z Flip3 5G\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/Samsung-Galaxy-Z-Flip-3-fpt-12.jpg\" /></strong></p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>\r\n			<td>M&agrave;n h&igrave;nh ch&iacute;nh: 6.7&rdquo;, M&agrave;n h&igrave;nh phụ: 1.9&rdquo;, FHD+</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau</td>\r\n			<td>12.0 MP + 12.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera Selfie</td>\r\n			<td>10.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM&nbsp;</td>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong</td>\r\n			<td>128 GB</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 0, 24990000, 0, 1, 91, 'dt2.jpg', 1),
(33, 1, 'Điện thoại OPPO Find X3 Pro', '<h2 style=\"text-align:center\"><strong>Đ&aacute;nh gi&aacute; chi tiết&nbsp;OPPO Find X3 Pro 5G</strong></h2>\r\n\r\n<p style=\"text-align:center\">Sẵn s&agrave;ng c&ugrave;ng bạn hướng tới tương lai với&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/oppo-find-x3-pro\">OPPO Find X3 Pro 5G</a>, chiếc&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai\">điện thoại</a>&nbsp;sở hữu camera m&agrave;u sắc trung thực, m&agrave;n h&igrave;nh 120Hz si&ecirc;u mượt, 1 tỷ m&agrave;u sống động v&agrave; hiệu năng đột ph&aacute; với sức mạnh của con chip Qualcomm Snapdragon 888 hỗ trợ 5G.</p>\r\n\r\n<p style=\"text-align:center\"><strong><img alt=\"OPPO Find X3 Pro 5G\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/oppo-find-x3-pro-12.jpg\" /></strong></p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh</td>\r\n			<td>6.7&quot;, QHD+, AMOLED, 1440 x 3216 Pixel</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>\r\n			<td>50.0 MP + 50.0 MP + 13.0 MP + 3.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera Selfie</td>\r\n			<td>32.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM&nbsp;</td>\r\n			<td>12 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong</td>\r\n			<td>256 GB</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 26990000, 19990000, 0, 1, 94, 'dt3.jpg', 1),
(34, 3, 'Đồng hồ Mi Band 5', '<h2 style=\"text-align:center\"><strong>Đ&aacute;nh gi&aacute; chi tiết&nbsp;V&ograve;ng đeo tay th&ocirc;ng minh Mi Band 5</strong></h2>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://fptshop.com.vn/smartwatch/xiaomi-mi-band-5\">Xiaomi Mi Band 5</a>&nbsp;l&agrave; sự lựa chọn th&ocirc;ng minh của bạn, khi đ&acirc;y l&agrave; chiếc v&ograve;ng đeo tay thời trang, hỗ trợ loạt t&iacute;nh năng ấn tượng tr&ecirc;n m&agrave;n h&igrave;nh m&agrave;u rực rỡ v&agrave; đặc biệt l&agrave; mức gi&aacute; v&ocirc; c&ugrave;ng&nbsp;rẻ.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Vòng đeo tay thông minh Xiaomi Mi Band 5\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/xiaomi-mi-band-5.jpg\" /></p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>C&ocirc;ng nghệ m&agrave;n h&igrave;nh</td>\r\n			<td>Amoled</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước m&agrave;n h&igrave;nh</td>\r\n			<td>1.1&quot;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong</td>\r\n			<td>16 MB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>\r\n			<td>Kh&ocirc;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kết nối được với hệ điều h&agrave;nh</td>\r\n			<td>Android 5.0, iOS 10 trở l&ecirc;n</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 0, 590000, 0, 1, 100, 'dh1.jpg', 4),
(35, 3, 'Đồng hồ Garmin Forerunner 55', '<h2 style=\"text-align:center\"><strong>Đ&aacute;nh gi&aacute; chi tiết&nbsp;Đồng hồ th&ocirc;ng minh Garmin Forerunner 55</strong></h2>\r\n\r\n<p style=\"text-align:center\">Đến từ d&ograve;ng sản phẩm Forerunner nổi tiếng d&agrave;nh cho những người y&ecirc;u th&iacute;ch trải nghiệm thể thao đa dạng, chiếc đồng hồ&nbsp;<a href=\"https://fptshop.com.vn/smartwatch/dong-ho-thong-minh-garmin-forerunner-55\">Garmin Forerunner 55</a>&nbsp;sẽ gi&uacute;p bạn theo d&otilde;i nhịp độ tập luyện, gi&aacute;m s&aacute;t to&agrave;n diện thể trạng sức khỏe v&agrave; được trang bị nhiều chức năng gi&uacute;p bạn giải ph&oacute;ng tiềm lực nội tại của bản th&acirc;n.</p>\r\n\r\n<p style=\"text-align:center\"><strong><img alt=\"Garmin Forerunner 55 1\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/BaoPK/10CrazyThingSmarphone/Garmin-forerunner-55-1.JPG\" /></strong></p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>C&ocirc;ng nghệ m&agrave;n h&igrave;nh</td>\r\n			<td>MIP chống ch&oacute;i, c&oacute; thể nh&igrave;n r&otilde; dưới &aacute;nh s&aacute;ng mặt trời</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước m&agrave;n h&igrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>\r\n			<td>1.04&quot; (26.3 mm)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong</td>\r\n			<td>200 giờ dữ liệu hoạt động</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chất liệu d&acirc;y</td>\r\n			<td>Silicone</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chất liệu mặt</td>\r\n			<td>K&iacute;nh cường lực h&oacute;a học</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 0, 4290000, 0, 1, 81, 'dh3.jpg', 1),
(36, 3, 'Đồng hồ Garmin Venu Sq', '<h2 style=\"text-align:center\"><strong>Đ&aacute;nh gi&aacute; chi tiết&nbsp;Đồng hồ th&ocirc;ng minh Garmin Venu Sq</strong></h2>\r\n\r\n<p style=\"text-align:center\">Nằm trong d&ograve;ng sản phẩm mới ra mắt trong thời gian gần đ&acirc;y của&nbsp;<a href=\"https://fptshop.com.vn/smartwatch/garmin\">Garmin</a>, chiếc đồng hồ Venu Sq hướng tới t&iacute;nh thời trang, sự tiện lợi v&agrave; tối ưu về gi&aacute; để đem tới trải nghiệm tốt nhất cho người d&ugrave;ng. Đ&acirc;y l&agrave; mẫu&nbsp;<a href=\"https://fptshop.com.vn/smartwatch\">smartwatch</a>&nbsp;nhỏ nhẹ, c&oacute; diện mạo unisex ph&ugrave; hợp với người d&ugrave;ng nam v&agrave; nữ.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Garmin Venu Sq 1\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/03/08/Garmin-venu-sq-1.jpg\" /></p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>&ocirc;ng nghệ m&agrave;n h&igrave;nh</td>\r\n			<td>LCD</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước m&agrave;n h&igrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>\r\n			<td>1.3&#39;&#39;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong&nbsp;</td>\r\n			<td>Dữ liệu hoạt động trong v&ograve;ng 200 giờ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh</td>\r\n			<td>Chưa cập nhật</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kết nối được với hệ điều h&agrave;nh</td>\r\n			<td>IOS, Android</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 0, 3990000, 0, 0, 90, 'dh4.jpg', 1),
(37, 3, 'Đồng hồ Garmin Forerunner 245 ', '<h2 style=\"text-align:center\"><strong>Đ&aacute;nh gi&aacute; chi tiết&nbsp;Đồng hồ th&ocirc;ng minh Garmin Forerunner 245</strong></h2>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://fptshop.com.vn/smartwatch/dong-ho-thong-minh-garmin-forerunner-245\">Garmin Forerunner 245</a>&nbsp;l&agrave; chiếc&nbsp;<a href=\"https://fptshop.com.vn/smartwatch\">đồng hồ th&ocirc;ng minh</a>&nbsp;l&yacute; tưởng cho những ai đam m&ecirc; chạy bộ. C&ocirc;ng nghệ định vị GPS kh&ocirc;ng chỉ thống k&ecirc; chi tiết qu&atilde;ng đường bạn đ&atilde; chạy m&agrave; c&ograve;n &aacute;p dụng thuật to&aacute;n ri&ecirc;ng của&nbsp;<a href=\"https://fptshop.com.vn/smartwatch/garmin\">Garmin</a>&nbsp;để thống k&ecirc; chi tiết về hiệu suất luyện tập, phương thức chạy, lịch sử r&egrave;n luyện v&agrave; hỗ trợ thiết lập mục ti&ecirc;u sắp tới.</p>\r\n\r\n<p style=\"text-align:center\"><strong><img alt=\"Garmin Forerunner 245 1\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/04/Garmin-forerunner-245-1.JPG\" /></strong></p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>&ocirc;ng nghệ m&agrave;n h&igrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>\r\n			<td>MIP chống ch&oacute;i, c&oacute; thể nh&igrave;n r&otilde; dưới &aacute;nh s&aacute;ng mặt trời</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước m&agrave;n h&igrave;nh</td>\r\n			<td>1,2&rdquo; (30,4 mm)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong</td>\r\n			<td>200 giờ dữ liệu hoạt động</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh</td>\r\n			<td>Chưa cập nhật</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kết nối được với hệ điều h&agrave;nh</td>\r\n			<td>IOS, Android</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 7790000, 6290000, 0, 0, 69, 'dh5.jpg', 1),
(38, 4, 'Adapter Sạc Type C 20W ', '<h2 style=\"text-align:center\"><strong>Đặc điểm nổi bật</strong></h2>\r\n\r\n<p style=\"text-align:center\">Đến từ thương hiệu sản xuất&nbsp;<a href=\"https://fptshop.com.vn/phu-kien\">phụ kiện</a>&nbsp;h&agrave;ng đầu thế giới, bộ&nbsp;<a href=\"https://fptshop.com.vn/phu-kien/sac-cap-adapter?tinh-nang=nhanh\">adapter sạc nhanh</a>&nbsp;Belkin 37W bao gồm một cổng sạc USB-C 25W v&agrave; một cổng USB-A 12W. Sản phẩm được thiết kế để tận dụng c&ocirc;ng suất sạc nhanh tối ưu tr&ecirc;n&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/apple-iphone\">iPhone</a>&nbsp;l&agrave; 20W v&agrave; cho smartphone Android l&agrave; 25W, đồng thời sở hữu nhiều c&ocirc;ng nghệ đảm bảo an to&agrave;n cho người d&ugrave;ng.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Adapter sạc nhanh 2 cổng Belkin 37W 1\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/BaoPK/10CrazyThingSmarphone/Adapter-sac-nhanh-2-cong-belkin-37w-1.jpg\" /></p>\r\n', '<ul>\r\n	<li>\r\n	<table>\r\n		<tbody>\r\n			<tr>\r\n				<td>Chất liệu</td>\r\n				<td>Nhựa cao cấp</td>\r\n			</tr>\r\n			<tr>\r\n				<td>Cổng c&aacute;p kết nối</td>\r\n				<td>USB-A, USB-C PD</td>\r\n			</tr>\r\n			<tr>\r\n				<td>Cường độ d&ograve;ng điện&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>\r\n				<td>2.22A, 2.25A, 3A</td>\r\n			</tr>\r\n			<tr>\r\n				<td>Loại</td>\r\n				<td>Adapter sạc</td>\r\n			</tr>\r\n			<tr>\r\n				<td>Mẫu m&atilde;</td>\r\n				<td>Mới, Nguy&ecirc;n Seal</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</li>\r\n</ul>\r\n', 0, 690000, 0, 1, 87, 'pk1.jpg', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`baiviet_id`),
  ADD KEY `danhmuctin_id` (`danhmuctin_id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`binhluan_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD PRIMARY KEY (`id_chitietdonhang`),
  ADD KEY `donhang_id` (`donhang_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `danhmuc_tintuc`
--
ALTER TABLE `danhmuc_tintuc`
  ADD PRIMARY KEY (`danhmuctin_id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`donhang_id`),
  ADD KEY `khachhang_id` (`khachhang_id`),
  ADD KEY `makhuyenmai` (`makhuyenmai`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`giohang_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`khachhang_id`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`makhuyenmai`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`nhacungcap_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sanpham_id`),
  ADD KEY `nhacungcap_id` (`nhacungcap_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `baiviet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `binhluan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  MODIFY `id_chitietdonhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT cho bảng `danhmuc_tintuc`
--
ALTER TABLE `danhmuc_tintuc`
  MODIFY `danhmuctin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `donhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `giohang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `khachhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `nhacungcap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
