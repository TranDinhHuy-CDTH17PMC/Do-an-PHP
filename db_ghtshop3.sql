-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th6 05, 2019 lúc 06:06 AM
-- Phiên bản máy phục vụ: 5.7.24
-- Phiên bản PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_ghtshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

DROP TABLE IF EXISTS `binhluan`;
CREATE TABLE IF NOT EXISTS `binhluan` (
  `makh` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `masp` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `noidung` varchar(10000) COLLATE utf8_vietnamese_ci NOT NULL,
  `ngaygio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trangthai` int(11) NOT NULL DEFAULT '0',
  `mabinhluan` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`mabinhluan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`makh`, `masp`, `noidung`, `ngaygio`, `trangthai`, `mabinhluan`) VALUES
('ddd', 'DT17', 'Sản phẩm rất tốt. Thanks shop', '2019-05-29 14:24:02', 0, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

DROP TABLE IF EXISTS `chitiethoadon`;
CREATE TABLE IF NOT EXISTS `chitiethoadon` (
  `masp` char(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `mahd` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  KEY `masp` (`masp`),
  KEY `mahd` (`mahd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`masp`, `mahd`, `soluong`) VALUES
('sp16', 'HoaDon-kh13-14-05-1', 1),
('sp16', 'HoaDon-kh13-14-05-2', 1),
('sp16', 'HoaDon-kh13-14-05-3', 1),
('sp16', 'HoaDon-kh13-14-05-4', 1),
('sp5', 'HoaDon--15-05-5', 1),
('sp4', 'HoaDon--15-05-6', 3),
('sp4', 'HoaDon-Guest-26-18-05-7', 4),
('sp4', 'HoaDon-Guest-6-18-05-8', 1),
('sp4', 'HoaDon-Guest-6-18-05-9', 1),
('sp4', 'HoaDon-Guest-6-18-05-10', 1),
('sp5', 'HoaDon-kh13-18-05-12', 2),
('sp2', 'HoaDon-0225-19-05-11', 1),
('masp007', 'HoaDon-0225-19-05-12', 1),
('DT24', 'HoaDon-0225-20-05-13', 1),
('masp004', 'HoaDon-Guest-9-21-05-14', 1),
('masp004', 'HoaDon-Guest-9-21-05-15', 1),
('141', 'HoaDon-0225-22-05-16', 1),
('a134114', 'HoaDon-0225-22-05-16', 4),
('masp001', 'HoaDon-0225-22-05-16', 1),
('masp002', 'HoaDon-0225-24-05-17', 1),
('DT17', 'HoaDon-0225-24-05-18', 1),
('DT24', 'HoaDon-0225-24-05-18', 1),
('DT24', 'HoaDon-0225-26-05-19', 1),
('ipad001', 'HoaDon-Customer-fad-29-05-20', 1),
('sp5', 'HoaDon-Customer-fad-29-05-20', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietlaphoadon`
--

DROP TABLE IF EXISTS `chitietlaphoadon`;
CREATE TABLE IF NOT EXISTS `chitietlaphoadon` (
  `manv` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `mahd` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  KEY `manv` (`manv`),
  KEY `mahd` (`mahd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieudathang`
--

DROP TABLE IF EXISTS `chitietphieudathang`;
CREATE TABLE IF NOT EXISTS `chitietphieudathang` (
  `masp` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MaPhieuDat` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  KEY `masp` (`masp`),
  KEY `MaPhieuDat` (`MaPhieuDat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieunhap`
--

DROP TABLE IF EXISTS `chitietphieunhap`;
CREATE TABLE IF NOT EXISTS `chitietphieunhap` (
  `masp` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `soluong` int(11) DEFAULT '0',
  `Maphieunhap` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  KEY `masp` (`masp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieuxuat`
--

DROP TABLE IF EXISTS `chitietphieuxuat`;
CREATE TABLE IF NOT EXISTS `chitietphieuxuat` (
  `MaPhieuXuat` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `masp` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `SoLuong` int(11) DEFAULT '1',
  KEY `MaPhieuXuat` (`MaPhieuXuat`),
  KEY `masp` (`masp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsp`
--

DROP TABLE IF EXISTS `chitietsp`;
CREATE TABLE IF NOT EXISTS `chitietsp` (
  `MASP` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `LINKANH` varchar(255) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `TENSP` varchar(1000) COLLATE utf8_vietnamese_ci NOT NULL,
  `GIAGOC` int(10) UNSIGNED DEFAULT NULL,
  `GIAMOI` int(10) UNSIGNED NOT NULL,
  `MALOAI` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `XOA` tinyint(1) NOT NULL DEFAULT '1',
  `SOLUONG` int(11) NOT NULL,
  `MANCC` varchar(250) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`MASP`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsp`
--

INSERT INTO `chitietsp` (`MASP`, `LINKANH`, `TENSP`, `GIAGOC`, `GIAMOI`, `MALOAI`, `XOA`, `SOLUONG`, `MANCC`) VALUES
('DT18', '../Media/img/AnhSanpham/ipad-mini-79-inch-wifi-cellular-64gb-2019-gray-400x400.jpg', 'adfadf', 14134, 14134, 'DT', 0, 134, 'ncc2'),
('sp4', '../Media/img/AnhSanpham/iphone-7-plus-gold-400x460.png', 'Iphone 7 plus', 11000000, 11000000, 'DT', 1, 1214, 'ncc2'),
('sp5', '../Media/img/AnhSanpham/iphone-6s-plus-32gb-400x460.png', 'Iphone', 0, 9900000, 'DT', 1, 12, 'ncc2'),
('sp8', '../Media/img/AnhSanpham/product-7.jpg', 'SamSung A30', 0, 400000, 'DT', 1, 12, 'ncc3'),
('sp7', '../Media/img/AnhSanpham/product-8.jpg', 'Iphone 5', 500000, 500000, 'DT', 1, 12, 'ncc2'),
('sp16', '../Media/img/AnhSanpham/product-9.jpg', 'Oppo F7', 4000000, 4000000, 'DT', 1, 12, 'ncc1'),
('sp123', '../Media/img/AnhSanpham/product-1.jpg', 'Oppo F9', 44800000, 4000000, 'DT', 1, 12, 'ncc1'),
('sp1', '../Media/img/AnhSanpham/iphone-x-64gb-1-400x460.png', 'Iphone X', 14134, 23000000, 'DT', 1, 12, 'ncc2'),
('masp001', '../Media/img/AnhSanpham/lenovo-ideapad-530s-14ikb-i7-8550u-8gb-256gb-win10-33397-thumb-400x400.jpg', 'Huawei 530s', 5000000, 5000000, 'DT', 1, 45, 'ncc4'),
('masp002', '../Media/img/AnhSanpham/samsung-galaxy-tab-a-101-t515-2019-gold-docquyen-1-400x400.jpg', 'Samsung Galaxy Tab 10', 5000000, 14999000, 'MTB', 1, 45, 'ncc3'),
('masp003', '../Media/img/AnhSanpham/iphone-xs-max-256gb-white-400x460.png', 'Iphone XS', 5000000, 5000000, 'DT', 1, 45, 'ncc2'),
('masp004', '../Media/img/AnhSanpham/oppo-f11-mtp-400x400.jpg', 'Oppo F11', 7400000, 5000000, 'DT', 0, 45, 'ncc2'),
('masp005', '../Media/img/AnhSanpham/samsung-galaxy-s10-plus-512gb-ceramic-black-600x600.jpg', 'Samsung Galaxy S10', 5000000, 5000000, 'DT', 1, 45, 'ncc3'),
('masp006', '../Media/img/AnhSanpham/oppo-f11-mtp-400x400.jpg', 'Oppo F11', 7400000, 5000000, 'DT', 0, 45, 'ncc2'),
('masp007', '../Media/img/AnhSanpham/oppo-f11-mtp-400x400.jpg', 'Oppo F11', 7400000, 5000000, 'DT', 0, 45, 'ncc2'),
('masp008', '../Media/img/AnhSanpham/ipad-mini-79-inch-wifi-cellular-64gb-2019-gray-400x400.jpg', 'Ipad Mini 79', 5000000, 5000000, 'MTB', 1, 45, 'ncc5'),
('masp009', '../Media/img/AnhSanpham/product-3.jpg', 'Oppo F11', 5000000, 5000000, 'DT', 1, 45, 'ncc1'),
('masp010', '../Media/img/AnhSanpham/oppo-f11-pro-xam-128gb-docquyen-400x400.jpg', 'Oppo F11 Pro', 5000000, 5000000, 'DT', 1, 45, 'ncc1'),
('masp011', '../Media/img/AnhSanpham/oppo-f11-mtp-400x400.jpg', 'Oppo F11', 7400000, 5000000, 'DT', 1, 45, 'ncc2'),
('DT17', '../Media/img/AnhSanpham/samsung-galaxy-s10-plus-black-400x400.jpg', 'Samsung Galaxy S10', 10000000, 10000000, 'DT', 1, 90, 'ncc3'),
('ipad001', '../Media/img/AnhSanpham/ipad-mini-79-inch-wifi-2019-1-400x400.jpg', 'Ipad Wifi 2018', 89000000, 89000000, 'MTB', 1, 16, 'ncc2'),
('DT19', '../Media/img/AnhSanpham/star-regular.svg', 'adfadf', 14134, 14134, 'DT', 0, 134, 'ncc1'),
('PK1', '../Media/img/AnhSanpham/cap-micro-1m-esaver-ds118br-tb-avatar-1-400x400.jpg', 'jj', 131231, 131231, 'PK', 0, 20, 'ncc2'),
('DT24', '../Media/img/AnhSanpham/samsung-galaxy-note8-black-400x460.png', 'Samsung Note 8', 14000000, 14000000, 'DT', 1, 12, 'ncc3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `mahd` char(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `ngaylap` date DEFAULT NULL,
  `tongtien` int(11) DEFAULT NULL,
  `tongsp` int(11) NOT NULL,
  `makh` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `trangthai` int(1) NOT NULL,
  `diachi` varchar(1000) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`mahd`),
  KEY `makh` (`makh`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `ngaylap`, `tongtien`, `tongsp`, `makh`, `trangthai`, `diachi`) VALUES
('HoaDon-kh13-14-05-1', '2019-05-14', 4000000, 1, 'kh13', 2, 'Phạm Ngọc Thảo,Tây Thạnh,Tân Phú,Hồ Chí Minhf'),
('HoaDon-kh13-14-05-2', '2019-05-14', 4000000, 1, 'kh13', 0, '240PhamNgocThao,Phuong TayThach,TanPhu,TP Hcm'),
('HoaDon-kh13-14-05-3', '2019-05-14', 4000000, 1, 'kh13', 1, '240PhamNgocThao,Phuong TayThach,TanPhu,TP Hcm'),
('HoaDon-kh13-14-05-4', '2019-05-14', 4000400, 2, 'kh13', 1, '240PhamNgocThao,Phuong TayThach,TanPhu,TP Hcm'),
('HoaDon-0225-19-05-12', '2019-05-19', 5000000, 1, '0225', 1, 'afadfadfadfaqrqrq'),
('HoaDon-0225-19-05-11', '2019-05-19', 28413413, 4, '0225', 2, 'afadfadfadfaqrqrq'),
('HoaDon-Guest-26-18-05-7', '2019-05-18', 2000000, 4, 'Guest-26', 1, 'fasdfasd, 8, TP Hồ Chí Minh'),
('HoaDon-Guest-6-18-05-8', '2019-05-18', 500000, 1, 'Guest-6', 1, 'ADFADFAD, 9, TP Hồ Chí Minh'),
('HoaDon-Guest-6-18-05-9', '2019-05-18', 500000, 1, 'Guest-6', 1, 'ADFADFAD, 9, TP Hồ Chí Minh'),
('HoaDon-Guest-6-18-05-10', '2019-05-18', 500000, 1, 'Guest-6', 0, 'ADFADFAD, 9, TP Hồ Chí Minh'),
('HoaDon-kh13-18-05-11', '2019-05-18', 0, 0, 'kh13', 2, '240PhamNgocThao,Phuong TayThach,TanPhu,TP Hcm    '),
('HoaDon-kh13-18-05-12', '2019-05-18', 1000000, 2, 'kh13', 2, '240PhamNgocThao,Phuong TayThach,TanPhu,TP Hcm    '),
('HoaDon-0225-20-05-13', '2019-05-20', 133000000, 8, '0225', 2, '230/1 Pastuer, Phường DaKao, Quận 3'),
('HoaDon-Guest-9-21-05-14', '2019-05-21', 19000000, 2, 'Guest-9', 2, 'TanPhu, 9, TP Hồ Chí Minh'),
('HoaDon-Guest-9-21-05-15', '2019-05-21', 19000000, 2, 'Guest-9', 2, 'TanPhu, 9, TP Hồ Chí Minh'),
('HoaDon-0225-22-05-16', '2019-05-22', 72067066, 6, '0225', 2, '230/1 Pastuer, Phường DaKao, Quận 3 '),
('HoaDon-0225-24-05-17', '2019-05-24', 14999000, 1, '0225', 2, '230/1 Pastuer, Phường DaKao, Quận 3 '),
('HoaDon-0225-24-05-18', '2019-05-24', 24000000, 2, '0225', 2, '230/1 Pastuer, Phường DaKao, Quận 3 '),
('HoaDon-0225-26-05-19', '2019-05-26', 14000000, 1, '0225', 2, '230/1 Pastuer, Phường DaKao, Quận 3 '),
('HoaDon-Customer-fad-29-05-20', '2019-05-29', 118700000, 4, 'Customer-fad', 2, 'Tân Kì');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `makh` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `tenkh` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `gioitinh` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `cmnd` varchar(11) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `sdt` varchar(11) COLLATE utf8_vietnamese_ci NOT NULL,
  `diachi` varchar(250) COLLATE utf8_vietnamese_ci NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`makh`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `gioitinh`, `cmnd`, `sdt`, `diachi`, `username`) VALUES
('Customer-fadfad', 'tran', 'Nữ', '193234', '08954221', 'Tân Kì ', 'fadfad'),
('Customer-', 'Huy Trần', 'Nữ', '066487', '078955', '134143', ''),
('Customer-fad', 'Trần Đình Huy', 'Nam', '13413', '1341341', 'Tân Kì', 'fad');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

DROP TABLE IF EXISTS `nhacungcap`;
CREATE TABLE IF NOT EXISTS `nhacungcap` (
  `MaNhaCungCap` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `TenNhaCungCap` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `DiaChi` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `SĐT` varchar(15) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MaPhieuNhapKho` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`MaNhaCungCap`),
  KEY `MaPhieuNhapKho` (`MaPhieuNhapKho`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNhaCungCap`, `TenNhaCungCap`, `DiaChi`, `SĐT`, `MaPhieuNhapKho`) VALUES
('ncc1', 'Oppo', NULL, NULL, NULL),
('ncc2', 'Apple', NULL, NULL, NULL),
('ncc3', 'Samsung', NULL, NULL, NULL),
('ncc4', 'Huawei', NULL, NULL, NULL),
('ncc5', 'XiXaoMi', NULL, NULL, NULL),
('ncc7', 'Nokia', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `manv` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `hoten` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `luong` int(11) DEFAULT '300000',
  `ngaysinh` date DEFAULT NULL,
  `ngaygianhap` date DEFAULT NULL,
  `gioitinh` varchar(3) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `diachi` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `sdt` varchar(15) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `tentaikhoan` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`manv`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `hoten`, `luong`, `ngaysinh`, `ngaygianhap`, `gioitinh`, `diachi`, `sdt`, `tentaikhoan`) VALUES
('nv001', 'LiCanL', 540000000, '2019-05-09', '2019-05-01', 'Nam', 'Tan Phu', '0972660078', ''),
('nv143', 'Trần Đình Huy', 100000, '2019-05-09', '2019-06-05', 'Nữ', 'Tân Phú', '0972660078', ''),
('nv14314', 'Trần Đình Huy', 1141, '2019-05-09', '2019-06-05', 'Nữ', 'Tân Phú', '0972660078', ''),
('nv13413414af', '141fasd', 100, '2019-05-08', '2019-05-27', 'Nữ', 'Tân Phú', '77541413', ''),
('nv1413', 'Hung', 10000000, '2019-05-07', '2019-05-29', 'Nữ', 'Tân Phú', '0314547', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudathang`
--

DROP TABLE IF EXISTS `phieudathang`;
CREATE TABLE IF NOT EXISTS `phieudathang` (
  `maphieu` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `ngaydat` datetime DEFAULT NULL,
  `ngaynhan` datetime DEFAULT NULL,
  `chitietkhac` varchar(3) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`maphieu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhapkho`
--

DROP TABLE IF EXISTS `phieunhapkho`;
CREATE TABLE IF NOT EXISTS `phieunhapkho` (
  `MaPhieu` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `NgayNhapKho` date DEFAULT NULL,
  `NgayGiao` date DEFAULT NULL,
  `DiaChiShop` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `SDDTCuaShop` varchar(15) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MaNV` varchar(3) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`MaPhieu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuatkho`
--

DROP TABLE IF EXISTS `phieuxuatkho`;
CREATE TABLE IF NOT EXISTS `phieuxuatkho` (
  `MaPhieu` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `NgayLap` date DEFAULT NULL,
  `NgayXuat` date DEFAULT NULL,
  `MaNV` varchar(3) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`MaPhieu`),
  KEY `MaNV` (`MaNV`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `USERNAME` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `EMAIL` text COLLATE utf8_vietnamese_ci NOT NULL,
  `TRANGTHAI` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`USERNAME`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`USERNAME`, `PASSWORD`, `EMAIL`, `TRANGTHAI`) VALUES
('Administrator', '123', 'yukihuy99@gmail.com', 'active'),
('ddd', 'ffff', 's@s', 'active'),
('dddtyl', 'ffff', 's@smai', 'active'),
('name', 'ddfadfaff', 'yukihuy@gmail.com', 'active'),
('gh', 'ad', 'gh@mm', 'active'),
('fad', 'fad', 'fad@g', 'active'),
('huy', '214', 'yukihuy@gmail.com', 'active'),
('h66uy', '214', 'yukihuy@gmail.com', '0'),
('adf', 'fadfa', 'fad@g', '0'),
('yukihuy', '123', 'dkaj@faf', 'active'),
('phamngocthao', '123', 'yk@gmail.com', 'active'),
('yukihuy99yuki', '2141999', 'yukihuy99@gmail.com.vn', 'active'),
('Linh', '123', 'linhhoang@gmail.com', 'active'),
('Giang LOL', '123', 'yukihuy@gmail.com', 'active'),
('fadfad', '123', '14ad@gm', 'active');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

DROP TABLE IF EXISTS `theloai`;
CREATE TABLE IF NOT EXISTS `theloai` (
  `tenloai` varchar(250) COLLATE utf8_vietnamese_ci NOT NULL,
  `maloai` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`maloai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`tenloai`, `maloai`) VALUES
('Máy tính bảng', 'MTB'),
('Điện thoại', 'DT'),
('Phụ kiện đi kèm', 'PK');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongsokythuat`
--

DROP TABLE IF EXISTS `thongsokythuat`;
CREATE TABLE IF NOT EXISTS `thongsokythuat` (
  `manhinh` varchar(250) COLLATE utf8_vietnamese_ci NOT NULL,
  `camera_truoc` int(11) NOT NULL,
  `camera_sau` int(11) NOT NULL,
  `hedieuhanh` varchar(250) COLLATE utf8_vietnamese_ci NOT NULL,
  `rom` int(11) NOT NULL,
  `ram` int(11) NOT NULL,
  `cpu` varchar(250) COLLATE utf8_vietnamese_ci NOT NULL,
  `thenho` int(11) NOT NULL,
  `thesim` varchar(1) COLLATE utf8_vietnamese_ci NOT NULL,
  `pin` int(11) NOT NULL,
  `otg` varchar(1) COLLATE utf8_vietnamese_ci NOT NULL,
  `masp` varchar(205) COLLATE utf8_vietnamese_ci NOT NULL,
  KEY `fk_masp_chitietsp` (`masp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thongsokythuat`
--

INSERT INTO `thongsokythuat` (`manhinh`, `camera_truoc`, `camera_sau`, `hedieuhanh`, `rom`, `ram`, `cpu`, `thenho`, `thesim`, `pin`, `otg`, `masp`) VALUES
('HD+', 15, 15, 'sadfad', 1341, 13, 'fadfd', 13, 'a', 134, 'y', 'sp1'),
('HD+', 15, 15, 'sadfad', 1341, 13, 'fadfd', 13, 'a', 134, 'y', 'sp3'),
('HD+', 15, 15, 'sadfad', 1341, 13, 'fadfd', 13, 'a', 134, 'y', 'sp2'),
('LCD HD++', 13, 42, 'IOS 9.0', 4, 8, '8', 458, '1', 4000, '1', 'sp5'),
('LCD HD++', 13, 42, 'IOS 9.0', 4, 8, '8', 458, '1', 4000, '1', 'sp6'),
('LCD HD++', 13, 42, 'IOS 9.0', 4, 8, '8', 458, '1', 4000, '1', 'sp7'),
('LCD HD++', 13, 42, 'IOS 9.0', 4, 8, '8', 458, '1', 4000, '1', 'sp8');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truycap`
--

DROP TABLE IF EXISTS `truycap`;
CREATE TABLE IF NOT EXISTS `truycap` (
  `ten` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `solan` int(11) NOT NULL,
  `ngaytruycap` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `truycap`
--

INSERT INTO `truycap` (`ten`, `solan`, `ngaytruycap`) VALUES
('Guest', 0, '2019-05-01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
