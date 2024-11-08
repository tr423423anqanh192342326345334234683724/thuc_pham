-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2024 lúc 05:34 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thuc_pham_chuc_nang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--


CREATE DATABASE IF NOT EXISTS `thuc_pham_chuc_nang`;
USE `thuc_pham_chuc_nang`;

CREATE TABLE `binh_luan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_khach_hang` int(11) NOT NULL,
  `ten_khach_hang` varchar(100) NOT NULL,
  `noi_dung` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_khach_hang` (`id_khach_hang`),
  CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `id_khach_hang`, `ten_khach_hang`, `noi_dung`) VALUES
(1, 2, 'anh', 'web ok'),
(2, 2, 'anh', 'web ok');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_khach_hang` int(11) NOT NULL,
  `id_mat_hang` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ngay_dat_hang` datetime DEFAULT current_timestamp(),
  `trang_thai` varchar(50) DEFAULT 'Chờ xác nhận',
  PRIMARY KEY (`id`),
  KEY `id_khach_hang` (`id_khach_hang`),
  KEY `id_mat_hang` (`id_mat_hang`),
  CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id`),
  CONSTRAINT `don_hang_ibfk_2` FOREIGN KEY (`id_mat_hang`) REFERENCES `mat_hang` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `id_khach_hang`, `id_mat_hang`, `so_luong`, `tong_tien`, `ngay_dat_hang`, `trang_thai`) VALUES
(3, 2, 15, 1, 220000.00, '2024-10-31 10:34:53', 'Đang xử lý'),
(4, 2, 1, 1, 150000.00, '2024-10-31 10:34:53', 'Chờ xác nhận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_khach_hang` int(11) NOT NULL,
  `id_mat_hang` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `ngay_them` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_khach_hang_id_mat_hang` (`id_khach_hang`, `id_mat_hang`),
  KEY `id_khach_hang` (`id_khach_hang`),
  KEY `id_mat_hang` (`id_mat_hang`),
  CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id`),
  CONSTRAINT `gio_hang_ibfk_2` FOREIGN KEY (`id_mat_hang`) REFERENCES `mat_hang` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--


CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tai_khoan` int(11) DEFAULT NULL,
  `ten_khach_hang` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tai_khoan` (`id_tai_khoan`),
  CONSTRAINT `khach_hang_ibfk_1` FOREIGN KEY (`id_tai_khoan`) REFERENCES `tai_khoan_khach_hang` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `id_tai_khoan`, `ten_khach_hang`, `email`, `so_dien_thoai`, `dia_chi`) VALUES
(1, 1, 'Admin', 'Admin@gmail.com', '0123785596', 'Định Công Thượng'),
(2, 2, 'Quang Anh', 'tqayoutobe@gmail.com', '0879874782', '230 Định Công Thượng - Định Công - Hoàng Mai - Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mat_hang`
--

CREATE TABLE `mat_hang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loai_mat_hang` varchar(100) DEFAULT NULL,
  `ten_mat_hang` varchar(100) DEFAULT NULL,
  `cong_dung_mat_hang` text DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `gia_mat_hang` decimal(10,2) DEFAULT NULL,
  `hinh_anh` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan_khach_hang`
--

CREATE TABLE `tai_khoan_khach_hang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tai_khoan` varchar(50) DEFAULT NULL,
  `mat_khau` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tai_khoan` (`tai_khoan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan_khach_hang`
--

INSERT INTO `tai_khoan_khach_hang` (`id`, `tai_khoan`, `mat_khau`) VALUES
(1, 'admin', 'admin'),
(2, 'anh', '$2y$10$xCFx9EyWRj.WQzlLun1WaO5SwCux9B0GKqmxOf5VKDDwnrxGb1JZe'),
(3, '0382666331', '$2y$10$kzou/2leJFCyU4ScurQGcu2VhDnYStzdToj/nr07QyqjJw31eY2ma');

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `mat_hang`
--
ALTER TABLE `mat_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `tai_khoan_khach_hang`
--
ALTER TABLE `tai_khoan_khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

