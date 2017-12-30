/*
Navicat MySQL Data Transfer

Source Server         : phpmyadmin
Source Server Version : 100128
Source Host           : localhost:3306
Source Database       : alibabagroup

Target Server Type    : MYSQL
Target Server Version : 100128
File Encoding         : 65001

Date: 2017-12-30 14:49:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_image` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `show_hide` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'về chúng tôi', 've-chung-toi', 'http://localhost/alibabagroup/upload/files/profile.png', '<p>T&ocirc;i l&agrave; một lập tr&igrave;nh vi&ecirc;n abc</p>', '0', null, null, '0', '1', '2017-12-30 08:35:25');
INSERT INTO `categories` VALUES ('2', 'dịch vụ', 'dich-vu', null, null, '0', null, null, '0', '1', '2017-12-20 14:27:07');
INSERT INTO `categories` VALUES ('3', 'sản phẩm', 'san-pham', null, null, '0', null, null, '0', '1', '2017-12-20 14:27:23');
INSERT INTO `categories` VALUES ('4', 'tin tức', 'tin-tuc', null, null, '0', null, null, '0', '1', '2017-12-20 14:27:37');
INSERT INTO `categories` VALUES ('5', 'tuyển dụng', 'tuyen-dung', null, null, '0', null, null, '0', '1', '2017-12-20 14:27:52');
INSERT INTO `categories` VALUES ('6', 'liên hệ', 'lien-he', null, null, '0', null, null, '0', '1', '2017-12-20 14:28:08');
INSERT INTO `categories` VALUES ('7', 'logo', 'logo', null, null, '3', null, null, '1', '1', '2017-12-20 14:54:13');
INSERT INTO `categories` VALUES ('8', 'nhận diện thương hiệu', 'nhan-dien-thuong-hieu', null, null, '3', null, null, '1', '1', '2017-12-20 14:54:40');
INSERT INTO `categories` VALUES ('9', 'quảng cáo', 'quang-cao', null, null, '3', null, null, '1', '1', '2017-12-20 14:54:57');
INSERT INTO `categories` VALUES ('10', 'website', 'website', null, null, '3', null, null, '1', '1', '2017-12-20 14:55:21');
INSERT INTO `categories` VALUES ('11', 'ứng dụng', 'ung-dung', null, null, '3', null, null, '1', '1', '2017-12-20 14:55:39');
INSERT INTO `categories` VALUES ('12', 'thiết kế', 'thiet-ke', null, null, '2', null, null, '1', '1', '2017-12-20 14:56:12');
INSERT INTO `categories` VALUES ('13', 'lập trình', 'lap-trinh', null, null, '2', null, null, '1', '1', '2017-12-20 14:56:44');
INSERT INTO `categories` VALUES ('14', 'maketting', 'maketing', null, null, '2', null, null, '1', '1', '2017-12-20 14:57:04');

-- ----------------------------
-- Table structure for category_menu
-- ----------------------------
DROP TABLE IF EXISTS `category_menu`;
CREATE TABLE `category_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category_menu
-- ----------------------------
INSERT INTO `category_menu` VALUES ('1', 'Main menu', '2017-12-26 16:25:10');

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'admin', '2017-12-21 16:45:11');
INSERT INTO `groups` VALUES ('2', 'quản trị viên', '2017-12-21 16:45:22');
INSERT INTO `groups` VALUES ('3', 'nhân viên', '2017-12-21 16:45:36');

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cate_menu_id` tinyint(1) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `ordinal` int(4) DEFAULT NULL,
  `show_hide` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('1', '1', '1', '1', '1', '2017-12-26 16:25:10');
INSERT INTO `menus` VALUES ('2', '1', '2', '2', '1', '2017-12-26 16:25:10');
INSERT INTO `menus` VALUES ('3', '1', '3', '3', '1', '2017-12-26 16:25:10');
INSERT INTO `menus` VALUES ('4', '1', '4', '4', '1', '2017-12-26 16:25:10');
INSERT INTO `menus` VALUES ('5', '1', '5', '5', '1', '2017-12-26 16:25:10');
INSERT INTO `menus` VALUES ('6', '1', '6', '6', '1', '2017-12-26 16:25:10');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_image` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  `show_hide` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('2', 'Đăng Nhập Facebook Bằng Cách Quét Mã Vạch QR', 'dang-nhap-facebook-bang-cach-quet-ma-vach-qr-2', 'http://localhost/alibabagroup/upload/files/profile.png', '<p>Nếu trước đ&acirc;y, khi muốn đăng nhập v&agrave;o facebook người d&ugrave;ng sẽ nhập địa chỉ email hoặc số điện thoại đ&atilde; đăng k&yacute; trước đ&oacute;. Song để tạo ra sự đổi mới, lần cập nhật mới đ&acirc;y nhất, nh&agrave; sản xuất facebook đ&atilde; th&ecirc;m c&aacute;ch thức đăng nhập mới đ&oacute; l&agrave; qu&eacute;t m&atilde; QR.</p>\r\n', '<p>Nếu trước đ&acirc;y, khi muốn đăng nhập v&agrave;o facebook người d&ugrave;ng sẽ nhập địa chỉ email hoặc số điện thoại đ&atilde; đăng k&yacute; trước đ&oacute;. Song để tạo ra sự đổi mới, lần cập nhật mới đ&acirc;y nhất, nh&agrave; sản xuất facebook đ&atilde; th&ecirc;m c&aacute;ch thức đăng nhập mới đ&oacute; l&agrave; qu&eacute;t m&atilde; QR.</p>\r\n\r\n<p>　　Facebook đang triển khai v&agrave; thử nghiệm t&iacute;n năng n&agrave;y để gi&uacute;p người d&ugrave;ng đăng nhập v&agrave;o t&agrave;i khoản được m&agrave; kh&ocirc;ng cần sử dụng đến mật khẩu hay nhập bất cứ th&ocirc;ng tin li&ecirc;n quan n&agrave;o. Theo đ&oacute;, bạn chỉ cần v&agrave;o face bằng điện thoại rồi d&ugrave;ng m&atilde; QR c&oacute; sẵn để truy cập facebook tr&ecirc;n m&aacute;y t&iacute;nh l&agrave; xong.</p>\r\n\r\n<p><img alt=\"\" src=\"http://alibabagroup.vn/upload/hinhanh/dang-nhap-1.jpg\" /></p>\r\n\r\n<p>　　Điều n&agrave;y sẽ đảm bảo t&iacute;nh bảo mật cho t&agrave;i khoản facebook tr&ecirc;n m&aacute;y t&iacute;nh, nhất l&agrave; khi bạn sử dụng đến c&aacute;c m&aacute;y t&iacute;nh ơi c&ocirc;ng cộng, văn ph&ograve;ng l&agrave;m việc m&agrave; v&ocirc; t&igrave;nh qu&ecirc;n x&oacute;a lịch sử tr&igrave;nh duyệt web.</p>\r\n\r\n<p><strong>　　Hướng dẫn c&aacute;ch truy cập facebook bằng điện thoại th&ocirc;ng qua m&atilde; QR</strong></p>\r\n\r\n<p><strong>　　* Thứ nhất:&nbsp;</strong>Bạn h&atilde;y truy cập t&agrave;i khoản facebook tr&ecirc;n điện thoại sau đ&oacute; truy cập v&agrave;o link facebook nền web l&agrave; sẽ nh&igrave;n thấy t&iacute;n năng ngay trong giao diện. Rồi nh&acirc;n v&agrave;o n&uacute;t Đăng nh&acirc;p bằng điện thoại để sử dụng.</p>\r\n\r\n<p>　<strong>　* Thứ hai:&nbsp;</strong>Tr&ecirc;n m&agrave;n h&igrave;nh sẽ hiện th&ocirc;ng b&aacute;o tới bạn cần sử dụng ứng dụng facebook hoặc tr&igrave;nh qu&eacute;t m&atilde; QR để đăng nhập. Bạn để nguy&ecirc;n vậy xong rồi mở ứng dụng facebook.</p>\r\n\r\n<p><img alt=\"\" src=\"http://alibabagroup.vn/upload/hinhanh/dang-nhap.jpg\" /></p>\r\n\r\n<p>　<strong>　* Thứ 3:</strong>&nbsp;Khi hiện giao diện, nhấn v&agrave;o biểu tượng 3 dấu gạch ngang ở g&oacute;c dưới c&ugrave;ng nằm b&ecirc;n phải m&agrave;n h&igrave;nh rồi t&igrave;m tới t&iacute;nh năng QR Code. Tiếp theo nhấn v&agrave;o OK sẽ xuất hiện giao diện m&atilde; qu&eacute;t QR m&agrave; rồi đưa đi&ecirc;n thoại qu&eacute;t m&atilde; QR m&agrave; facbook cung cấp tr&ecirc;n m&aacute;y t&iacute;nh.</p>\r\n\r\n<p>　<strong>　* Thứ 4:&nbsp;</strong>Facebook x&aacute;c nhận xong t&agrave;i khoản, bạn sẽ được y&ecirc;u cầu nhấn n&uacute;t x&aacute;c nhận. Tại giao diện điện thoại, bạn nhấn v&agrave;o n&uacute;t Allow Login (cho ph&eacute;p đăng nhập) v&agrave; nhận được th&ocirc;ng b&aacute;o đ&atilde; đăng nhập l&agrave; xong.</p>\r\n\r\n<p>　　C&oacute; thể thấy, đ&acirc;y l&agrave; phương ph&aacute;p đăng nhập facebook v&ocirc; c&ugrave;ng nhanh ch&oacute;ng v&agrave; đơn giản nhưng lại đảm bảo t&iacute;nh bảo mật rất cao. Hy vọng, sự thay đổi n&agrave;y của nh&agrave; sản xuất sẽ nhận được sự đ&oacute;n nhận từ c&aacute;c chủ t&agrave;i khoản.</p>\r\n', 'Đăng Nhập Facebook Bằng Cách Quét Mã Vạch QR', '1', '4', '2017-12-28 14:19:52', '1', '2017-12-28 10:37:37');
INSERT INTO `news` VALUES ('3', 'Đăng Nhập Facebook Bằng Cách Quét Mã Vạch QR', 'dang-nhap-facebook-bang-cach-quet-ma-vach-qr-3', 'http://localhost/alibabagroup/upload/files/profile.png', '<p>Nếu trước đ&acirc;y, khi muốn đăng nhập v&agrave;o facebook người d&ugrave;ng sẽ nhập địa chỉ email hoặc số điện thoại đ&atilde; đăng k&yacute; trước đ&oacute;. Song để tạo ra sự đổi mới, lần cập nhật mới đ&acirc;y nhất, nh&agrave; sản xuất facebook đ&atilde; th&ecirc;m c&aacute;ch thức đăng nhập mới đ&oacute; l&agrave; qu&eacute;t m&atilde; QR.</p>\r\n', '<p>Nếu trước đ&acirc;y, khi muốn đăng nhập v&agrave;o facebook người d&ugrave;ng sẽ nhập địa chỉ email hoặc số điện thoại đ&atilde; đăng k&yacute; trước đ&oacute;. Song để tạo ra sự đổi mới, lần cập nhật mới đ&acirc;y nhất, nh&agrave; sản xuất facebook đ&atilde; th&ecirc;m c&aacute;ch thức đăng nhập mới đ&oacute; l&agrave; qu&eacute;t m&atilde; QR.</p>\r\n\r\n<p>　　Facebook đang triển khai v&agrave; thử nghiệm t&iacute;n năng n&agrave;y để gi&uacute;p người d&ugrave;ng đăng nhập v&agrave;o t&agrave;i khoản được m&agrave; kh&ocirc;ng cần sử dụng đến mật khẩu hay nhập bất cứ th&ocirc;ng tin li&ecirc;n quan n&agrave;o. Theo đ&oacute;, bạn chỉ cần v&agrave;o face bằng điện thoại rồi d&ugrave;ng m&atilde; QR c&oacute; sẵn để truy cập facebook tr&ecirc;n m&aacute;y t&iacute;nh l&agrave; xong.</p>\r\n\r\n<p><img alt=\"\" src=\"http://alibabagroup.vn/upload/hinhanh/dang-nhap-1.jpg\" /></p>\r\n\r\n<p>　　Điều n&agrave;y sẽ đảm bảo t&iacute;nh bảo mật cho t&agrave;i khoản facebook tr&ecirc;n m&aacute;y t&iacute;nh, nhất l&agrave; khi bạn sử dụng đến c&aacute;c m&aacute;y t&iacute;nh ơi c&ocirc;ng cộng, văn ph&ograve;ng l&agrave;m việc m&agrave; v&ocirc; t&igrave;nh qu&ecirc;n x&oacute;a lịch sử tr&igrave;nh duyệt web.</p>\r\n\r\n<p><strong>　　Hướng dẫn c&aacute;ch truy cập facebook bằng điện thoại th&ocirc;ng qua m&atilde; QR</strong></p>\r\n\r\n<p><strong>　　* Thứ nhất:&nbsp;</strong>Bạn h&atilde;y truy cập t&agrave;i khoản facebook tr&ecirc;n điện thoại sau đ&oacute; truy cập v&agrave;o link facebook nền web l&agrave; sẽ nh&igrave;n thấy t&iacute;n năng ngay trong giao diện. Rồi nh&acirc;n v&agrave;o n&uacute;t Đăng nh&acirc;p bằng điện thoại để sử dụng.</p>\r\n\r\n<p>　<strong>　* Thứ hai:&nbsp;</strong>Tr&ecirc;n m&agrave;n h&igrave;nh sẽ hiện th&ocirc;ng b&aacute;o tới bạn cần sử dụng ứng dụng facebook hoặc tr&igrave;nh qu&eacute;t m&atilde; QR để đăng nhập. Bạn để nguy&ecirc;n vậy xong rồi mở ứng dụng facebook.</p>\r\n\r\n<p><img alt=\"\" src=\"http://alibabagroup.vn/upload/hinhanh/dang-nhap.jpg\" /></p>\r\n\r\n<p>　<strong>　* Thứ 3:</strong>&nbsp;Khi hiện giao diện, nhấn v&agrave;o biểu tượng 3 dấu gạch ngang ở g&oacute;c dưới c&ugrave;ng nằm b&ecirc;n phải m&agrave;n h&igrave;nh rồi t&igrave;m tới t&iacute;nh năng QR Code. Tiếp theo nhấn v&agrave;o OK sẽ xuất hiện giao diện m&atilde; qu&eacute;t QR m&agrave; rồi đưa đi&ecirc;n thoại qu&eacute;t m&atilde; QR m&agrave; facbook cung cấp tr&ecirc;n m&aacute;y t&iacute;nh.</p>\r\n\r\n<p>　<strong>　* Thứ 4:&nbsp;</strong>Facebook x&aacute;c nhận xong t&agrave;i khoản, bạn sẽ được y&ecirc;u cầu nhấn n&uacute;t x&aacute;c nhận. Tại giao diện điện thoại, bạn nhấn v&agrave;o n&uacute;t Allow Login (cho ph&eacute;p đăng nhập) v&agrave; nhận được th&ocirc;ng b&aacute;o đ&atilde; đăng nhập l&agrave; xong.</p>\r\n\r\n<p>　　C&oacute; thể thấy, đ&acirc;y l&agrave; phương ph&aacute;p đăng nhập facebook v&ocirc; c&ugrave;ng nhanh ch&oacute;ng v&agrave; đơn giản nhưng lại đảm bảo t&iacute;nh bảo mật rất cao. Hy vọng, sự thay đổi n&agrave;y của nh&agrave; sản xuất sẽ nhận được sự đ&oacute;n nhận từ c&aacute;c chủ t&agrave;i khoản.</p>\r\n', 'Đăng Nhập Facebook Bằng Cách Quét Mã Vạch QR', '1', '4', '2017-12-28 14:20:08', '1', '2017-12-28 10:37:53');
INSERT INTO `news` VALUES ('4', 'Sắp Ra Đời Loại Màn Hình Smartphone Có Thể Tự Lành Sau Khi Đã Vỡ', 'sap-ra-doi-loai-man-hinh-smartphone-co-the-tu-lanh-sau-khi-da-vo-4', 'http://localhost/alibabagroup/upload/files/profile.png', '<p>Khi d&ugrave;ng smartphone hay điện thoại th&igrave; nổi &aacute;m ảnh lớn nhất của người sử dụng đ&oacute; l&agrave; v&ocirc; t&igrave;nh l&agrave;m rơi vỡ m&agrave;n h&igrave;nh. Bởi gi&aacute; của chiếc m&agrave;n h&igrave;nh cảm ứng c&oacute; thể n&oacute;i l&agrave; kh&aacute; đắt đỏ trong số c&aacute;c trục trặc kh&aacute;c. Tuy nhi&ecirc;n, ng&agrave;y nay nổi lo ấy c&oacute; thể xua tan khi c&ocirc;ng nghệ chế tạo m&agrave;n h&igrave;nh smartphone tự l&agrave;nh sau khi vỡ sắp ra đời.</p>\r\n', '<p>Khi d&ugrave;ng smartphone hay điện thoại th&igrave; nổi &aacute;m ảnh lớn nhất của người sử dụng đ&oacute; l&agrave; v&ocirc; t&igrave;nh l&agrave;m rơi vỡ m&agrave;n h&igrave;nh. Bởi gi&aacute; của chiếc m&agrave;n h&igrave;nh cảm ứng c&oacute; thể n&oacute;i l&agrave; kh&aacute; đắt đỏ trong số c&aacute;c trục trặc kh&aacute;c. Tuy nhi&ecirc;n, ng&agrave;y nay nổi lo ấy c&oacute; thể xua tan khi c&ocirc;ng nghệ chế tạo m&agrave;n h&igrave;nh smartphone tự l&agrave;nh sau khi vỡ sắp ra đời.</p>\r\n\r\n<p>　　C&aacute;c nh&agrave; khoa học tại Nhật Bản đ&atilde; nghi&ecirc;n cứu th&agrave;nh c&ocirc;ng vật liệu mới mang t&ecirc;n &quot;polyether-thioureas&quot;. Loại chất liệu n&agrave;y c&oacute; đặc điểm cứng như k&iacute;nh th&ocirc;ng thường nhưng khi vỡ c&oacute; thể tự l&agrave;nh lại chỉ bằng việc miết tay l&ecirc;n n&oacute;, tạo &aacute;p lục cho k&iacute;nh.</p>\r\n\r\n<p><img alt=\"\" src=\"http://alibabagroup.vn/upload/hinhanh/kinh-tu-lanh.jpg\" /></p>\r\n\r\n<p>　　Nếu hầu hết c&aacute;c vật liệu c&oacute; thể phục hồi ở nhiệu độ cao th&igrave; với polyether-thioureas chỉ cần gh&eacute;p c&aacute;c mảnh vỡ lại với nhau trong v&agrave;i gi&acirc;y l&agrave; ch&uacute;ng đ&atilde; c&oacute; thể kết d&iacute;nh v&agrave; phục hồi lại như trạng th&aacute;i ban đầu.</p>\r\n\r\n<p>　　Vật liệu n&agrave;y được tạo ra một c&aacute;ch rất t&igrave;nh cờ từ một th&agrave;nh vi&ecirc;n l&agrave; sinh vi&ecirc;n muốn tạo ra một loại keo kết d&iacute;nh, tuy nhi&ecirc;n khi tạo xong th&igrave; n&oacute; c&oacute; thể d&iacute;nh lại với nhau. Bắt nguồn từ điều n&agrave;y,&nbsp;c&aacute;c nh&agrave; nghi&ecirc;n cứu đ&atilde; ứng dụng v&agrave; s&aacute;ng tạo ra k&iacute;nh c&oacute; khả năng phục hồi.</p>\r\n\r\n<p>　　Qu&aacute; tr&igrave;nh sản xuất loại n&agrave;y kh&ocirc;ng qu&aacute; phức tạp, v&igrave; vậy c&aacute;c nh&agrave; khoa học hy vọng rằng n&oacute; sẽ sớm được &aacute;p dụng v&agrave;o thực tế, sử dụng cho smartphone, m&aacute;y t&iacute;nh v&agrave; c&aacute;c thiết bị di động kh&aacute;c.</p>\r\n', 'Sắp Ra Đời Loại Màn Hình Smartphone Có Thể Tự Lành Sau Khi Đã Vỡ', '1', '4', '2017-12-28 14:20:36', '1', '2017-12-28 10:42:15');
INSERT INTO `news` VALUES ('5', 'Thư Pháp Hiện Đại Nhật Bản', 'thu-phap-hien-dai-nhat-ban-5', 'http://localhost/alibabagroup/upload/files/profile.png', '<p>Kh&aacute;i niệm Thư ph&aacute;p hiện đại Nhật Bản xuất hiện từ sau Chiến tranh thế giới lần thứ hai, từ cuộc triển l&atilde;m thư ph&aacute;p đầu ti&ecirc;n do H&atilde;ng b&aacute;o Mainichi v&agrave; Hội Thư ph&aacute;p Mainichi tổ chức v&agrave;o năm 1948. Thư ph&aacute;p Nhật Bản vốn c&oacute; một lịch sử h&igrave;nh th&agrave;nh l&acirc;u đời v&agrave; kh&aacute; độc đ&aacute;o.</p>\r\n', '<p>Kh&aacute;i niệm Thư ph&aacute;p hiện đại Nhật Bản xuất hiện từ sau Chiến tranh thế giới lần thứ hai, từ cuộc triển l&atilde;m thư ph&aacute;p đầu ti&ecirc;n do H&atilde;ng b&aacute;o Mainichi v&agrave; Hội Thư ph&aacute;p Mainichi tổ chức v&agrave;o năm 1948. Thư ph&aacute;p Nhật Bản vốn c&oacute; một lịch sử h&igrave;nh th&agrave;nh l&acirc;u đời v&agrave; kh&aacute; độc đ&aacute;o.</p>\r\n\r\n<p>Chữ H&aacute;n được truyền từ Trung Quốc sang Nhật Bản v&agrave;o khoảng 2000 năm trước. Nh&igrave;n v&agrave;o ba t&aacute;c phẩm thư ph&aacute;p thời Heian của Nội Th&acirc;n vương Ito Thi&ecirc;n ho&agrave;ng Saga v&agrave; bức chữ&nbsp;Manyogana, tuy vẫn d&ugrave;ng chữ H&aacute;n nhưng chất s&aacute;ng tạo rất đặc sắc, b&aacute;o hiệu sự ra đời của thể chữ&nbsp;kana sau n&agrave;y.</p>\r\n\r\n<p><img alt=\"\" src=\"http://alibabagroup.vn/upload/hinhanh/Ito_Naishinno_Ganmon_1.jpg\" /></p>\r\n\r\n<p>Thư ph&aacute;p Nhật Bản được h&igrave;nh th&agrave;nh từ hai kiểu chữ ch&iacute;nh l&agrave; chữ H&aacute;n - kiểu chữ biểu &yacute; (tượng h&igrave;nh) v&agrave; chữ hiragana - kiểu chữ biểu &acirc;m (tượng thanh) v&agrave; ph&aacute;t triển như l&agrave; một m&ocirc;n nghệ thuật.</p>\r\n\r\n<p>Trong khi ở Trung Quốc, thư ph&aacute;p được viết dưới năm thể ch&iacute;nh l&agrave; Triện, Lệ, H&agrave;nh, Khải, Thảo th&igrave; ở Nhật, kiểu chữ Thảo chiếm ưu thế. Dễ hiểu th&ocirc;i, v&igrave; chữ hiragana của Nhật được s&aacute;ng chế dựa tr&ecirc;n kiểu chữ n&agrave;y.</p>\r\n\r\n<p>Chữ Thảo c&oacute; b&uacute;t ph&aacute;p ph&oacute;ng kho&aacute;ng v&agrave; tốc độ viết nhanh, mức độ đơn giản h&oacute;a cũng lớn nhất. Tuy kh&oacute; đọc nhưng chữ Thảo lại c&oacute; t&iacute;nh thẩm mỹ rất cao, đường n&eacute;t mềm mại v&agrave; uyển chuyển, rất hợp với t&acirc;m hồn y&ecirc;u c&aacute;i đẹp của người Nhật.</p>\r\n\r\n<p>Kết cấu của chữ Thảo kh&aacute; ph&oacute;ng kho&aacute;ng v&agrave; tự do, c&oacute; thể n&oacute;i: c&oacute; bao nhi&ecirc;u nh&agrave; thư ph&aacute;p th&igrave; c&oacute; bấy nhi&ecirc;u lối chữ Thảo kh&aacute;c nhau, mỗi chữ l&agrave; một s&aacute;ng tạo ri&ecirc;ng của mỗi người. Hơn nữa, ngay cả với từng nh&agrave; thư ph&aacute;p, đối với c&ugrave;ng một chữ, mỗi lần viết lại l&agrave; một c&aacute;ch thể hiện kh&aacute;c nhau.</p>\r\n\r\n<p>Thảo thư đ&uacute;ng thật l&agrave; khoảng kh&ocirc;ng gian s&aacute;ng tạo kh&ocirc;ng giới hạn.</p>\r\n\r\n<p><img alt=\"\" src=\"http://alibabagroup.vn/upload/hinhanh/syodou-05.jpg\" /></p>\r\n\r\n<p>Kế thừa từ truyền thống, Thư ph&aacute;p hiện đại Nhật Bản l&agrave; bức ph&aacute;c họa về một nước Nhật ph&aacute;t triển h&agrave;i ho&agrave; giữa văn ho&aacute; v&agrave; văn minh, giữa truyền thống v&agrave; hiện đại.</p>\r\n', 'Thư Pháp Hiện Đại Nhật Bản', '1', '4', '2017-12-28 14:19:07', '1', '2017-12-28 13:54:02');
INSERT INTO `news` VALUES ('6', 'Dịch Vụ Chăm Sóc Khách Hàng Sẽ Thay Đổi Thông Qua Chatbot', 'dich-vu-cham-soc-khach-hang-se-thay-doi-thong-qua-chatbot-6', 'http://localhost/alibabagroup/upload/files/profile.png', '<p>C&oacute; thể thấy con người đang tiếp cận gần hơn với c&aacute;c phương tiện truyền th&ocirc;ng c&ocirc;ng nghệ, trong đ&oacute; c&aacute;c ứng dụng tr&ograve; chuyện trực tuyến được nhiều người sử dụng để chat dần trở th&agrave;nh h&igrave;nh thức y&ecirc;u th&iacute;ch nhất để trao đổi với c&aacute;c doanh nghiệp v&agrave; giải đ&aacute;p thắc mắc của kh&aacute;ch h&agrave;ng.</p>\r\n', '<p>C&oacute; thể thấy con người đang tiếp cận gần hơn với c&aacute;c phương tiện truyền th&ocirc;ng c&ocirc;ng nghệ, trong đ&oacute; c&aacute;c ứng dụng tr&ograve; chuyện trực tuyến được nhiều người sử dụng để chat dần trở th&agrave;nh h&igrave;nh thức y&ecirc;u th&iacute;ch nhất để trao đổi với c&aacute;c doanh nghiệp v&agrave; giải đ&aacute;p thắc mắc của kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>　　V&agrave; theo c&aacute;c chuy&ecirc;n gia c&ocirc;ng nghệ nhận định, chatbot trong tương lai gần sẽ l&agrave;m thay đổi to&agrave;n diện phương thức v&agrave; hiệu quả giao tiếp với kh&aacute;c h&agrave;ng của c&aacute;c doanh nghiệp.</p>\r\n\r\n<p><strong>　　Chatbot l&agrave; g&igrave;? tại sao n&oacute; lại được ưa th&iacute;ch đến vậy?</strong></p>\r\n\r\n<p>　　Nếu trước kia khi muốn li&ecirc;n hệ với bộ phận chăm s&oacute;c kh&aacute;ch h&agrave;ng thường cần đến c&aacute;c cuộc gọi hoặc chờ phản hồi qua email n&ecirc;n thường c&oacute; cảm gi&aacute;c chờ đợi nh&agrave;m ch&aacute;n, mệt mỏi. Do đ&oacute;, c&aacute;c nh&agrave; c&ocirc;ng nghệ đ&atilde; khắc phục t&igrave;nh trạng n&agrave;y bằng c&aacute;ch thay v&agrave;o đ&oacute; l&agrave; ứng dụng tr&ograve; chuyện trực tuyến th&ocirc;ng qua &ldquo;botchat&rdquo;.</p>\r\n\r\n<p>　　Điều n&agrave;y đ&atilde; mở ra c&aacute;nh của mới cho c&aacute;c thương hiệu, doanh nghiệp c&oacute; thể giao tiếp, giải đ&aacute;p thắc mắc với kh&aacute;ch h&agrave;ng bằng h&igrave;nh thức mới, tiện lợi, hấp dẫn hơn.</p>\r\n\r\n<p><img alt=\"\" src=\"http://alibabagroup.vn/upload/hinhanh/chat-bot-1-s.jpg\" /></p>\r\n\r\n<p>　　&ldquo;Chat bot&rdquo; được hiểu đơn giản l&agrave; một phần của phần mềm của m&aacute;y t&iacute;nh c&oacute; khả năng tr&ograve; chuyện giống như người b&igrave;nh thường. N&oacute; hoạt động độc lập v&agrave; c&oacute; thể tự động trả lời những c&acirc;u hỏi hoặc xử l&yacute; những t&igrave;nh huống để phản hồi lại một c&aacute;ch ch&iacute;nh x&aacute;c nhất c&oacute; thể, phục vụ tự động h&oacute;a quy tr&igrave;nh kinh doanh.</p>\r\n\r\n<p>　　Đến nay, với sự tiến bộ của tr&iacute; tuệ nh&acirc;n tạo, c&ocirc;ng nghệ n&agrave;y đ&atilde; được phổ biến rộng r&atilde;i, nhất l&agrave; trong hoạt động thương mại tạo ra một trải nghiệm ho&agrave;n to&agrave;n mới giữa dịch vụ kh&aacute;ch h&agrave;ng của con người với m&aacute;y t&iacute;nh.</p>\r\n\r\n<p>　　Ra đời từ năm 2014, sản phẩm chatbot của c&ocirc;ng ty Salesforce đ&atilde; l&acirc;y lan sang cả Facebook Messenger. N&oacute; c&oacute; thể hiểu được cả nội dung đoạn hội thoại d&agrave;i, tự học để cải thiện khả năng của m&igrave;nh, nhằm phục vụ một c&aacute;ch tốt nhất.</p>\r\n\r\n<p><strong>　　Ứng dụng của Chatbot trong tương lai</strong></p>\r\n\r\n<p>　　Hiện tại Facebook đang t&iacute;ch hợp chatbot v&agrave;o Messenger để cho ph&eacute;p c&aacute;c doanh nghiệp tạo ra tương t&aacute;c cho kh&aacute;ch h&agrave;ng. Với c&aacute;c t&iacute;nh năng như thanh to&aacute;n trong cửa sổ chat, t&iacute;ch hợp quy tr&igrave;nh xử l&yacute; ng&ocirc;n ngữ tự nhi&ecirc;n, cho ph&eacute;p con người v&agrave; m&aacute;y t&iacute;nh c&ugrave;ng hoạt động trong một cuộc hội thoại. Th&ocirc;ng qua đ&acirc;y người d&ugrave;ng c&oacute; thể tương t&aacute;c với chủ thể để tảo đổi th&ocirc;ng tin, đặt h&agrave;ng,&hellip; m&agrave; kh&ocirc;ng cần phải gọi điện.</p>\r\n\r\n<p><img alt=\"\" src=\"http://alibabagroup.vn/upload/hinhanh/tu-van.jpg\" /></p>\r\n\r\n<p>　　Trong tương lai gần, chatbot sẽ b&ugrave;ng nổ v&agrave; ph&aacute;t triển mạnh hơn, đa dạng hơn về h&igrave;nh thức. Điều n&agrave;y gi&uacute;p cho việc tiếp thị, quảng b&aacute; sản phẩm của doanh nghiệp dựa tr&ecirc;n chatbot sẽ dễ d&agrave;ng, tự nhi&ecirc;n hơn, đồng thời cũng tạo cảm gi&aacute;c th&uacute; vị cho đối tượng người d&ugrave;ng.</p>\r\n\r\n<p>　　C&oacute; thể lấy một v&iacute; dụ điển h&igrave;nh l&agrave; ng&agrave;nh t&agrave;i ch&iacute;nh &ndash; ng&acirc;n h&agrave;ng tại Việt Nam đang ti&ecirc;n phong trong việc ứng dụng c&ocirc;ng nghệ dịch vụ kh&aacute;ch h&agrave;ng n&agrave;y bằng việc dự t&iacute;nh thu hẹp bộ phận tổng đ&agrave;i, thậm ch&iacute; l&agrave; bộ phận giao dịch tại quầy để thay bằng chatbot.</p>\r\n\r\n<p>　　Như vậy, một thời gian kh&ocirc;ng l&acirc;u nữa c&aacute;c dịch vụ định hướng v&agrave; chatbot c&oacute; thể h&ograve;a hợp với nhau nhằm n&acirc;ng cao trải nghiệm người d&ugrave;ng.</p>\r\n', 'Dịch Vụ Chăm Sóc Khách Hàng Sẽ Thay Đổi Thông Qua Chatbot', '1', '4', '2017-12-28 14:21:44', '1', '2017-12-28 14:21:44');

-- ----------------------------
-- Table structure for options
-- ----------------------------
DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of options
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_image` text COLLATE utf8_unicode_ci,
  `thumbnail` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fee` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `period_time` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scrope_work` text COLLATE utf8_unicode_ci,
  `show_hide` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'logo đẹp', 'logo-dep-1', 'http://localhost/alibabagroup/upload/hinhanh/logo.png', null, '<p>Với sự ph&aacute;t triển ch&oacute;ng mặt của mạng x&atilde; hội, c&aacute;c k&ecirc;nh tối ưu h&oacute;a t&igrave;m kiếm&hellip; c&ugrave;ng sự tấn c&ocirc;ng ồ ạt của h&agrave;ng tỉ thư r&aacute;c (spam) trong những năm gần đ&acirc;y, nhiều người nghĩ rằng email markting &ndash; c&ocirc;ng cụ Digital Marketing thống trị một thời &ndash; đang đi dần tới hồi kết. Nhưng c&oacute; vẻ đ&oacute; l&agrave; một đ&aacute;nh gi&aacute; sai lầm cho người l&agrave;m marketing, &iacute;t nhất l&agrave; cho tới thời điểm hiện tại.</p>\r\n', '<p><img alt=\"\" src=\"http://alibabagroup.vn/upload/hinhanh/Tulip-Petals-Nature-2K.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>5 điều cần lưu &yacute; để tạo được một email marketing xuất sắc l&agrave; v&ocirc; c&ugrave;ng kh&oacute; nhưng để tạo một email marketing hiệu quả chạm tới kh&aacute;ch h&agrave;ng th&igrave; đơn giản hơn.<br />\r\nVới sự ph&aacute;t triển ch&oacute;ng mặt của mạng x&atilde; hội, c&aacute;c k&ecirc;nh tối ưu h&oacute;a t&igrave;m kiếm&hellip; c&ugrave;ng sự tấn c&ocirc;ng ồ ạt của h&agrave;ng tỉ thư r&aacute;c (spam) trong những năm gần đ&acirc;y, nhiều người nghĩ rằng email markting &ndash; c&ocirc;ng cụ Digital Marketing thống trị một thời &ndash; đang đi dần tới hồi kết. Nhưng c&oacute; vẻ đ&oacute; l&agrave; một đ&aacute;nh gi&aacute; sai lầm cho người l&agrave;m marketing, &iacute;t nhất l&agrave; cho tới thời điểm hiện tại.</p>\r\n\r\n<p>Theo Caroline Malamut, chuy&ecirc;n gia về Marketing Automation (Tự động h&oacute;a trong Marketing) v&agrave; Email Marketing, cơ hội gia tăng doanh số cho c&aacute;c doanh nghiệp th&ocirc;ng qua Email Marketing l&agrave; kh&ocirc;ng hề nhỏ, miễn l&agrave; bạn biết c&aacute;ch &aacute;p dụng hiệu quả c&ocirc;ng cụ n&agrave;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cụ thể l&agrave; th&ocirc;ng qua c&aacute;c thống k&ecirc; của nhiều đơn vị về email marketing trong&nbsp; năm 2016 sẽ l&agrave;m bạn ngạc nhi&ecirc;n v&agrave; suy nghĩ lại:&nbsp;</p>\r\n\r\n<p>- Năm 2013, tr&ecirc;n to&agrave;n thế giới c&oacute; gần 3,9 tỉ t&agrave;i khoản email. Dự đo&aacute;n đến năm 2017, con số n&agrave;y sẽ tăng l&ecirc;n 4,9 tỉ. (Nguồn: The Radicati Group)</p>\r\n\r\n<p>- 91% người ti&ecirc;u d&ugrave;ng kiểm tra hộp mail &iacute;t nhất 1 lần mỗi ng&agrave;y. (Nguồn: ExactTarget)</p>\r\n\r\n<p>- Mỗi ng&agrave;y c&oacute; khoảng 247 tỉ email được gửi đi, t&iacute;nh ra cứ mỗi 0.00000035 gi&acirc;y lại c&oacute; 1 email được gửi đi. (Nguồn: Email Marketing Reports)</p>\r\n\r\n<p>- Cứ mỗi 1 USD đầu tư v&agrave;o Email Marketing thu về 44,25USD doanh thu trung b&igrave;nh. (Nguồn: emailexpert)</p>\r\n\r\n<p>- Những kh&aacute;ch h&agrave;ng thường nhận được email từ một doanh nghiệp sẽ mua h&agrave;ng của doanh nghiệp đ&oacute; nhiều hơn 138% những kh&aacute;ch h&agrave;ng kh&ocirc;ng nhận được email n&agrave;o từ doanh nghiệp đ&oacute;. (Nguồn: Convince and Convert)</p>\r\n\r\n<p>- Tr&ecirc;n thế giới c&oacute; khoảng 897 triệu người d&ugrave;ng email tr&ecirc;n điện thoại, bao gồm cả doanh nghiệp v&agrave; người ti&ecirc;u d&ugrave;ng. (Nguồn: The Radicati Group)</p>\r\n\r\n<p>- 48% email được mở tr&ecirc;n thiết bị di động. (Nguồn: Litmus)</p>\r\n\r\n<p>- Một nghi&ecirc;n cứu chỉ ra rằng email gi&uacute;p doanh nghiệp kiếm được nhiều kh&aacute;ch h&agrave;ng mới hơn Facebook v&agrave; Twitter khoảng 40 lần. (Nguồn: McKinsey &amp; Company)</p>\r\n\r\n<p>- 60% nh&acirc;n vi&ecirc;n đang l&agrave;m Marketing cho rằng Email Marketing đang tạo ra ROI - tỉ lệ ho&agrave;n vốn đầu tư - cho doanh nghiệp của m&igrave;nh. (Nguồn: MarketingSherpa)</p>\r\n\r\n<p>- 72% người ti&ecirc;u d&ugrave;ng đăng k&yacute; nhận email từ doanh nghiệp v&igrave; muốn được giảm gi&aacute;, chỉ 8,2% đăng k&yacute; v&igrave; y&ecirc;u th&iacute;ch thương hiệu. (Nguồn: BlueHornet)</p>\r\n\r\n<p>- Tỉ lệ chuyển đổi của email cao hơn mạng x&atilde; hội gấp 3 lần, tương đương mức 17%. (Nguồn: McKinsey &amp; Company)</p>\r\n\r\n<p>- 48% người ti&ecirc;u d&ugrave;ng n&oacute;i rằng họ th&iacute;ch tương t&aacute;c với thương hiệu th&ocirc;ng qua email hơn. (Nguồn: Direct Marketing News)</p>\r\n\r\n<p>C&oacute; thể mạng x&atilde; hội đ&aacute;ng dần &ldquo;ph&aacute; đảo thế giới ảo&rdquo; nhưng với những người mua h&agrave;ng th&igrave; email vẫn l&agrave; một thứ đ&aacute;ng tin cậy hơn v&agrave; được lựa chọn nhiều hơn. V&agrave; v&igrave; vậy m&agrave; tạo ra một email marketing hiệu quả vẫn l&agrave; điều m&agrave; nhiều người l&agrave;m marketing cần quan t&acirc;m.</p>\r\n', 'logo đẹp', '1', '7', '2017-12-29 11:16:59', '1 triệu - 2 triệu', '1 - 2 ngày', 'Với sự phát triển chóng mặt của mạng xã hội, các kênh tối ưu hóa tìm kiếm', '1', '2017-12-29 09:50:36');

-- ----------------------------
-- Table structure for recruitments
-- ----------------------------
DROP TABLE IF EXISTS `recruitments`;
CREATE TABLE `recruitments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `gender` tinyint(4) DEFAULT NULL,
  `age` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `work_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `show_hide` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of recruitments
-- ----------------------------
INSERT INTO `recruitments` VALUES ('1', 'Nhân viên trợ lý - phiên dịch tiếng trung', 'nhan-vien-tro-ly---phien-dich-tieng-trung-1', '<p>M&Ocirc; TẢ<br />\r\n-Trợ l&yacute; h&agrave;nh ch&iacute;nh: Phi&ecirc;n dịch tiếng trung, l&agrave;m số liệu, b&aacute;o c&aacute;o số liệu, bảng biểu, dich cho c&aacute;c cuộc họp nh&oacute;m, nội bộ, xử l&yacute; c&aacute;c vấn đề h&agrave;nh ch&iacute;nh &hellip;.<br />\r\n- Trở l&yacute; quảng c&aacute;o: Chạy quảng c&aacute;o (Google adwords) , kh&ocirc;ng cần kinh nghiệm, được đ&agrave;o tạo cơ bản đến chuy&ecirc;n s&acirc;u<br />\r\n- Chi tiết c&ocirc;ng việc sẽ được trao đổi th&ecirc;m khi phỏng vấn<br />\r\nY&Ecirc;U CẦU<br />\r\n- Tinh thần tr&aacute;ch nhiệm cao<br />\r\n- Chịu kh&oacute;, ham học hỏi<br />\r\n- C&oacute; tinh thần cầu tiến<br />\r\n- Tiếng trung nghe n&oacute;i đọc viết lưu lo&aacute;t</p>\r\n\r\n<p>Hồ sơ gởi về ch&uacute;ng t&ocirc;i theo địa chỉ:<br />\r\ndongco99@icloud.com(Ghi r&otilde; vị tr&iacute; ứng tuyển)</p>\r\n', '2', '18 - 25', '2018-01-01 00:00:00', 'Tp. Hồ Chí Minh', 'Thỏa Thuận', 'Nhân viên trợ lý - phiên dịch tiếng trung', '5', '1', '2017-12-29 15:53:06');
INSERT INTO `recruitments` VALUES ('3', 'Nhân viên trợ lý - phiên dịch tiếng trung', 'nhan-vien-tro-ly---phien-dich-tieng-trung-3', '<p>M&Ocirc; TẢ<br />\r\n-Trợ l&yacute; h&agrave;nh ch&iacute;nh: Phi&ecirc;n dịch tiếng trung, l&agrave;m số liệu, b&aacute;o c&aacute;o số liệu, bảng biểu, dich cho c&aacute;c cuộc họp nh&oacute;m, nội bộ, xử l&yacute; c&aacute;c vấn đề h&agrave;nh ch&iacute;nh &hellip;.<br />\r\n- Trở l&yacute; quảng c&aacute;o: Chạy quảng c&aacute;o (Google adwords) , kh&ocirc;ng cần kinh nghiệm, được đ&agrave;o tạo cơ bản đến chuy&ecirc;n s&acirc;u<br />\r\n- Chi tiết c&ocirc;ng việc sẽ được trao đổi th&ecirc;m khi phỏng vấn<br />\r\nY&Ecirc;U CẦU<br />\r\n- Tinh thần tr&aacute;ch nhiệm cao<br />\r\n- Chịu kh&oacute;, ham học hỏi<br />\r\n- C&oacute; tinh thần cầu tiến<br />\r\n- Tiếng trung nghe n&oacute;i đọc viết lưu lo&aacute;t</p>\r\n\r\n<p>Hồ sơ gởi về ch&uacute;ng t&ocirc;i theo địa chỉ:<br />\r\ndongco99@icloud.com(Ghi r&otilde; vị tr&iacute; ứng tuyển)</p>\r\n', '2', '18 - 25', '2018-02-01 00:00:00', 'Tp. Hồ Chí Minh', 'Thỏa Thuận', 'Nhân viên trợ lý - phiên dịch tiếng trung', '5', '1', '2017-12-29 17:05:53');

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_image` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `show_hide` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES ('1', 'Thiết kế', 'thiet-ke-1', 'http://localhost/alibabagroup/upload/hinhanh/logo.png', '<p>Thương Hiệu, Quảng C&aacute;o, Website</p>\r\n', '<p>Ra đời với đội ngũ nh&acirc;n sự chuy&ecirc;n nghiệp c&ugrave;ng nguồn đầu tư b&agrave;i bản, ch&uacute;ng t&ocirc;i x&acirc;y dựng m&ocirc; h&igrave;nh c&ocirc;ng ty trọn g&oacute;i, cung cấp giải ph&aacute;p maketing online to&agrave;n diện x&acirc;y dựng trang web, thiết kế h&igrave;nh ảnh, viết nội dung, SEO website, quảng c&aacute;o Google adwords, Facebook ads, Zalo.vv..</p>\r\n\r\n<p>Ra đời với đội ngũ nh&acirc;n sự chuy&ecirc;n nghiệp c&ugrave;ng nguồn đầu tư b&agrave;i bản, ch&uacute;ng t&ocirc;i x&acirc;y dựng m&ocirc; h&igrave;nh c&ocirc;ng ty trọn g&oacute;i, cung cấp giải ph&aacute;p maketing online to&agrave;n diện x&acirc;y dựng trang web, thiết kế h&igrave;nh ảnh, viết nội dung, SEO website, quảng c&aacute;o Google adwords, Facebook ads, Zalo.vv..</p>\r\n\r\n<p>với đội ngủ nh&acirc;n vi&ecirc;n điều l&agrave; những người trẻ.</p>\r\n', 'Thiết kế', '12', '1', '2017-12-30 10:09:07');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL,
  `group_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Trần Hữu Thái', 'thai', 'e10adc3949ba59abbe56e057f20f883e', '../images/profile.png', '1', '2017-12-23 14:21:25');
SET FOREIGN_KEY_CHECKS=1;
