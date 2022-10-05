-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2022 lúc 06:08 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_michio`
--
CREATE DATABASE IF NOT EXISTS `db_michio` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `db_michio`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_category`
--

DROP TABLE IF EXISTS `tb_category`;
CREATE TABLE `tb_category` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_category`
--

INSERT INTO `tb_category` (`id`, `name`) VALUES
(3, 'Laptop'),
(1, 'SmartPhone'),
(4, 'Smartwatch'),
(2, 'Tablet'),
(5, 'Tivi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_product`
--

DROP TABLE IF EXISTS `tb_product`;
CREATE TABLE `tb_product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_product`
--

INSERT INTO `tb_product` (`id`, `name`, `img`, `desc`, `price`, `id_category`) VALUES
(1, 'Sony Xperia Z', 'https://salt.tikicdn.com/media/catalog/product/s/o/sony-xperia-z-c6602-10_2_1.jpg', 'Sony Xperia Z với thiết kế cực đẹp, cùng camera chất lượng hơn, nhiều tính năng tiện ích hơn.', 13000000, 1),
(2, 'HTC One', 'https://m.media-amazon.com/images/I/51hgekyVikL.jpg', 'HTC One - Sự kết hợp hoàn hảo giữa thiết kế và công nghệ', 22000000, 1),
(3, 'Galaxy S10', 'https://cdn.tgdd.vn/Products/Images/42/161554/sieu-pham-galaxy-s-black-600x600.jpg', 'Samsung mang đến cho chúng ta một thiết bị cao cấp và sang trọng như món đồ trang sức', 13000000, 1),
(4, 'Oppo Find X3 Pro', 'https://cdn.tgdd.vn/Products/Images/42/232190/oppo-find-x3-pro-black-001-1-600x600.jpg', 'OPPO đã làm khuynh đảo thị trường smartphone khi cho ra đời chiếc điện thoại OPPO Find X3 Pro', 9000000, 1),
(5, 'Nexus 6P', 'https://www.kickmobiles.com/images/thumbs/0015907_huawei-google-nexus-6p_808.jpeg', 'Trong đó Nexus 6P là chiếc điện thoại đầu tiên của Google mang trong mình thiết kế nguyên khối', 10000000, 1),
(6, 'Vsmart Live 4', 'https://cdn.tgdd.vn/Products/Images/42/226436/vsmart-live-4-trang-200x200.jpg', 'Vsmart Live 4 mẫu smartphone gây ấn tượng với cụm 4 camera sau, dung lượng pin khủng và hiệu năng mạnh mẽ', 11000000, 1),
(7, 'iPhone X', 'https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb-hh-600x600.jpg', 'Một siêu phẩm đến từ Apple kỉ niệm 10 năm ra mắt chiếc iPhone đầu tiên', 15000000, 1),
(8, 'Xiaomi 12T', 'https://cdn.tgdd.vn/Products/Images/42/279065/xiaomi-12t-600x600.jpg', 'Xiaomi 12T cũng như Xiaomi 12T Pro chắc hẳn là cái tên mà bạn không nên bỏ qua.', 13000000, 1),
(9, 'Realme C30s', 'https://cdn.tgdd.vn/2022/09/campaign/C30S-600X600-Xanh-459x600.png', 'Đây hứa hẹn sẽ là một sự lựa chọn cực kỳ mẫu mực mà nhà Realme dành cho người dùng', 12000000, 1),
(10, 'Galaxy S21 FE', 'https://cdn.tgdd.vn/Products/Images/42/267212/Samsung-Galaxy-S21-FE-vang-600x600.jpg', 'Galaxy S21 FE - Thiết kế cao cấp, tinh tế và thời trang', 13000000, 1),
(11, 'Xiaomi Pad 5', 'https://cdn.tgdd.vn/Products/Images/522/250934/xiaomi-pad-5-grey-600x600.jpg', 'Chiếc máy tính bảng có thiết kế mỏng nhẹ, thời trang cùng cấu hình hàng đầu đáp ứng hết các nhu cầu', 3500000, 2),
(12, 'Galaxy Tab A7', 'https://cdn.tgdd.vn/Products/Images/522/228144/samsung-galaxy-tab-a7-2020-vangdong-600x600.jpg', 'Là phiên bản rút gọn của dòng tablet \"ăn khách\" Galaxy Tab A7', 11000000, 2),
(13, 'iPad Pro M1', 'https://cdn.tgdd.vn/Products/Images/522/269328/ipad-pro-m1-11-inch-wifi-2tb-2021-xam-thumb-600x600.jpeg', 'Trải nghiệm khung hình sống động cùng cảm giác chạm vuốt cực mượt', 16000000, 2),
(14, 'iPad Air 4', 'https://cdn.tgdd.vn/Products/Images/522/228808/ipad-air-4-wifi-64gb-2020-xam-600x600-200x200.jpg', 'Xứng danh dòng Air của Apple, iPad Air 4 được chế tác từ nhôm tái chế 100%', 12000000, 2),
(15, 'MacBook Pro M1', 'https://cdn2.cellphones.com.vn/358x/media/catalog/product/m/b/mbp-silver-select-202011.jpg', 'Sở hữu thiết kế sang trọng kế thừa từ các thế hệ trước và bên trong là một cấu hình ấn tượng từ con chip M1', 12000000, 3),
(16, 'Dell XPS 13', 'https://khoavang.vn/resources/cache/800xx1/NewFolder/xps-13-plus-9320-1-1659085595.png', 'Thiết kế hiện đại với màu bạc thời thượng cùng hiệu năng mạnh mẽ', 21000000, 3),
(17, 'HP Envy 13', 'https://laptopxachtay.com.vn/Images/Products/39150_39076_hp-envy-13-aq0027tu-i7-8565u-8gb-256g-ssd-pcie-13-3-fhd-win-10-fg_38589_3.jpg?', 'Thanh lịch hơn cùng màu vàng đồng với hệ điều hành Windows 11', 17000000, 3),
(18, 'Acer Swift 3', 'https://trungtran.vn/upload_images/2021/05/canh-phai-450.png', 'Thiết kế tinh tế của màu bạc thời thượng', 28000000, 3),
(19, 'Apple Watch SE 40mm', 'https://cdn2.cellphones.com.vn/358x/media/catalog/product/a/p/apple-watch-se-40mm_1_2_1.jpg', 'Apple Watch SE 40mm viền nhôm dây silicone hồng có thiết kế bo tròn 4 góc giúp thao tác vuốt chạm thoải mái hơn', 6990000, 4),
(20, 'Samsung Galaxy Watch 4', 'https://cdn.tgdd.vn/Products/Images/7077/278317/samsung-galaxy-watch-4-classic-46mm-den-600x600.jpg', 'Ấn tượng bởi vẻ đẹp cổ điển, thanh lịch, khung viền được chế tác từ thép không gỉ cao cấp', 6190000, 4),
(21, 'Google Tivi Sony 4K', 'https://cdn.nguyenkimmall.com/images/detailed/746/10049381-google-tivi-sony-4k-50-inch-kd-50x80j-vn3-1.jpg', 'Google Tivi Sony 4K cho chất lượng hình ảnh sắc nét, độ bão hòa cao, hình ảnh mượt mà, hạn chế nhòe hình nhờ công nghệ nâng cấp chuẩn hình ảnh 4K', 17900000, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `fullname`, `email`) VALUES
(1, 'nntrung25', '188eac7bfb03efb1cf53b091724c54cb', 'Nguyễn Như Trung', 'nguyennhutrung.nnt@gmail.com'),
(2, 'saladdays', '4547f9448a5483e990f842d3939585f1', 'Phạm Hà Mẫn Nhi', 'phamhamannhi16@gmail.com'),
(3, 'tindao', 'a39fa98c9be3f9f29e76eeaff4228030', 'Đào Phạm Trung Tín', 'tin.daophamtrung@gmail.com'),
(4, 'hoaiphuong', 'a7b3c7a61992d4086b0cc329219df6b4', 'Trần Hoài Phương', 'phuong090909@gmail.com'),
(5, 'huuloi', '2c3065cd74cd0c24e09f19d388b13dad', 'Nguyễn Hữu Lợi', 'huuloi@gmail.com'),
(6, 'ngocphuong', '06dc67758e6bd6f8b089aee4a915441e', 'Trần Đỗ Ngọc Phương', 'phuongdo@st.ueh.edu.vn'),
(8, 'kdung', '5836e28932236d44b42d2363e2e9ca7f', 'Nguyễn Kim Dung', 'dung.nguyenkimdung@gmail.com'),
(9, 'minhhai', '70a0f9894d2df18c2507d231a94caee8', 'Trịnh Minh Hải', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
