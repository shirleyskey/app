-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 04, 2020 lúc 11:22 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `app`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cham_thi`
--

CREATE TABLE `cham_thi` (
  `id_chamthi` int(11) NOT NULL,
  `id_lop` int(11) NOT NULL,
  `hinh_thuc_cham` int(11) NOT NULL,
  `thi_viet` int(11) NOT NULL,
  `thi_tieu_luan` int(11) NOT NULL,
  `thi_van_dap` int(11) NOT NULL,
  `thi_tot_nghiep` int(11) NOT NULL,
  `id_giaovien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cham_thi`
--

INSERT INTO `cham_thi` (`id_chamthi`, `id_lop`, `hinh_thuc_cham`, `thi_viet`, `thi_tieu_luan`, `thi_van_dap`, `thi_tot_nghiep`, `id_giaovien`) VALUES
(1, 1, 1, 1, 4, 0, 0, 159),
(3, 12, 2, 1, 3, 1, 1, 3),
(7, 12, 4, 2, 5, 10, 3, 160);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coi_thi`
--

CREATE TABLE `coi_thi` (
  `id_coi_thi` int(11) NOT NULL,
  `id_lop` int(11) NOT NULL,
  `id_giaovien` int(11) NOT NULL,
  `thoi_gian` int(11) NOT NULL,
  `thi_tot_nghiep` int(11) NOT NULL,
  `thi_het_hoc_phan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `coi_thi`
--

INSERT INTO `coi_thi` (`id_coi_thi`, `id_lop`, `id_giaovien`, `thoi_gian`, `thi_tot_nghiep`, `thi_het_hoc_phan`) VALUES
(2, 10, 161, 5, 1, 0),
(5, 5, 160, 0, 3, 1),
(6, 3, 160, 0, 4, 2),
(8, 12, 160, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `day_gioi`
--

CREATE TABLE `day_gioi` (
  `id_daygioi` int(11) NOT NULL,
  `bai_day_gioi` int(11) NOT NULL,
  `cham_day_gioi` int(11) NOT NULL,
  `id_lop` int(11) NOT NULL,
  `id_giaovien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `day_gioi`
--

INSERT INTO `day_gioi` (`id_daygioi`, `bai_day_gioi`, `cham_day_gioi`, `id_lop`, `id_giaovien`) VALUES
(4, 3, 2, 1, 159),
(8, 0, 0, 10, 0),
(9, 1, 10, 5, 160);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa_luan`
--

CREATE TABLE `khoa_luan` (
  `id` int(11) NOT NULL,
  `id_giaovien` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `huong_dan` float NOT NULL,
  `cham` float NOT NULL,
  `doc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khoa_luan`
--

INSERT INTO `khoa_luan` (`id`, `id_giaovien`, `ten`, `huong_dan`, `cham`, `doc`) VALUES
(1, 0, 'Khóa Luận 01', 3, 5, 33),
(2, 3, 'Khóa Luận 03', 4, 7, 9),
(3, 159, 'Khóa Luận 04', 44, 5, 3),
(5, 160, 'Khóa Luận 05', 3, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop_hoc`
--

CREATE TABLE `lop_hoc` (
  `id_lop` int(11) NOT NULL,
  `ten_lop` varchar(50) NOT NULL,
  `chuyen_nganh` varchar(50) NOT NULL,
  `thoi_gian` int(11) NOT NULL,
  `thoi_khoa_bieu` longtext NOT NULL,
  `quy_mo` varchar(50) NOT NULL,
  `si_so` int(11) NOT NULL,
  `id_gvphutrach` int(11) NOT NULL,
  `id_gvthamgia` int(11) NOT NULL,
  `thoigian_gv_phutrach` int(11) NOT NULL,
  `thoigian_gv_thamgia` int(11) NOT NULL,
  `thoigian_chitiet_gvphutrach` int(11) NOT NULL,
  `thoigian_chitiet_gvthamgia` int(11) NOT NULL,
  `he` varchar(50) NOT NULL,
  `so_gio_ly_thuyet` int(11) NOT NULL,
  `so_gio_ly_thuyet_gvphutrach` int(11) NOT NULL,
  `so_gio_ly_thuyet_gvthamgia` int(11) NOT NULL,
  `xemina` int(11) NOT NULL,
  `xemina_gvphutrach` int(11) NOT NULL,
  `xemina_gvthamgia` int(11) NOT NULL,
  `thaoluan` int(11) NOT NULL,
  `thaoluan_gvphutrach` int(11) NOT NULL,
  `thaoluan_gvthamgia` int(11) NOT NULL,
  `hinh_thuc_thi` varchar(50) NOT NULL,
  `tong_gio_gvphutrach` int(11) NOT NULL,
  `tong_gio_gvthamgia` int(11) NOT NULL,
  `ghi-chu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lop_hoc`
--

INSERT INTO `lop_hoc` (`id_lop`, `ten_lop`, `chuyen_nganh`, `thoi_gian`, `thoi_khoa_bieu`, `quy_mo`, `si_so`, `id_gvphutrach`, `id_gvthamgia`, `thoigian_gv_phutrach`, `thoigian_gv_thamgia`, `thoigian_chitiet_gvphutrach`, `thoigian_chitiet_gvthamgia`, `he`, `so_gio_ly_thuyet`, `so_gio_ly_thuyet_gvphutrach`, `so_gio_ly_thuyet_gvthamgia`, `xemina`, `xemina_gvphutrach`, `xemina_gvthamgia`, `thaoluan`, `thaoluan_gvphutrach`, `thaoluan_gvthamgia`, `hinh_thuc_thi`, `tong_gio_gvphutrach`, `tong_gio_gvthamgia`, `ghi-chu`) VALUES
(1, 'B12D48', 'Chất Lượng Cao', 60, '[]', 'A', 30, 160, 3, 32, 32, 0, 0, 'Quân Sự', 20, 17, 10, 10, 5, 5, 10, 6, 5, 'Vấn Đáp', 0, 0, ''),
(3, 'B14D48', 'An toàn thông tin', 50, '[\n    {\n        \"id\": 3,\n        \"title\": \"eeee\",\n        \"start\": \"2020-04-08 00:00:00\",\n        \"end\": \"2020-04-09 00:00:00\"\n    },\n    {\n        \"id\": 12,\n        \"title\": \"Morning\",\n        \"start\": \"2020-05-08 00:00:00\",\n        \"end\": \"2020-05-09 00:00:00\"\n    },\n    {\n        \"id\": 13,\n        \"title\": \"Afternoon\",\n        \"start\": \"2020-06-03 00:00:00\",\n        \"end\": \"2020-06-04 00:00:00\"\n    },\n    {\n        \"id\": 14,\n        \"title\": \"Morning\",\n        \"start\": \"2020-06-04 00:00:00\",\n        \"end\": \"2020-06-05 00:00:00\"\n    }\n]', 'B', 50, 4, 4, 18, 5, 0, 0, 'Quân Sự', 20, 9, 10, 10, 4, 888, 5, 5, 0, 'Thi Lý Thuyết', 0, 0, ''),
(5, 'B13D48', 'Công nghệ Thông tin', 70, '[]', 'B', 12, 159, 160, 40, 30, 0, 0, 'Quân Sự', 20, 7, 13, 10, 5, 5, 14, 5, 9, 'Vấn đáp', 0, 0, ''),
(10, 'B4DS6', 'An Toàn Thông Tin', 0, '[{\"id\":111,\"title\":\"aaaa\",\"start\":\"2020-03-30 00:00:00\",\"end\":\"2020-03-31 00:00:00\"},{\"id\":1,\"title\":\"buoi 1\",\"start\":\"2020-05-07 00:00:00\",\"end\":\"2020-05-08 00:00:00\"}]', 'A', 30, 4, 4, 0, 0, 0, 0, 'Dân Sự', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 'Huh'),
(12, 'B11D49', 'Chất Lượng Ca', 0, '', '20', 20, 0, 0, 0, 0, 0, 0, 'Quân sự', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 'a');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luan_an`
--

CREATE TABLE `luan_an` (
  `id` int(11) NOT NULL,
  `id_giaovien` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `huong_dan` float DEFAULT NULL,
  `cham` float DEFAULT NULL,
  `doc` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `luan_an`
--

INSERT INTO `luan_an` (`id`, `id_giaovien`, `ten`, `huong_dan`, `cham`, `doc`) VALUES
(1, 160, 'Luận Án 01', 3.5, 0, 0),
(2, 161, 'Luận Án 02', 0, 0, 0),
(3, 160, 'Luận Án 03', 0, 0, 10),
(4, 161, 'Luận Án 04', 0, 0, 0),
(6, 3, 'Luận Án 1', 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luan_van`
--

CREATE TABLE `luan_van` (
  `id` int(11) NOT NULL,
  `id_giaovien` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `huong_dan` float NOT NULL,
  `cham` float NOT NULL,
  `doc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `luan_van`
--

INSERT INTO `luan_van` (`id`, `id_giaovien`, `ten`, `huong_dan`, `cham`, `doc`) VALUES
(1, 160, 'Luận Văn', 9, 0, 0),
(2, 161, 'Luận Văn 01', 0, 6, 0),
(3, 160, 'Luận Văn 02', 0, 8, 0),
(4, 161, 'Luận Văn 03', 5, 6, 77),
(6, 0, 'Luận Văn 01', 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nghiencuu`
--

CREATE TABLE `nghiencuu` (
  `id` int(11) NOT NULL,
  `id_giaovien` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `huong_dan` int(11) DEFAULT NULL,
  `cham` int(11) DEFAULT NULL,
  `doc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nghiencuu`
--

INSERT INTO `nghiencuu` (`id`, `id_giaovien`, `ten`, `huong_dan`, `cham`, `doc`) VALUES
(1, 3, 'A', 8, 7, 3),
(2, 162, 'A', 8, 1, 4),
(3, 160, 'iiii', 4, 4, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nghien_cuu`
--

CREATE TABLE `nghien_cuu` (
  `id_nghien_cuu` int(11) NOT NULL,
  `id_giaovien` int(11) NOT NULL,
  `luan_an` varchar(500) NOT NULL,
  `cham_luan_an` varchar(500) NOT NULL,
  `luan_van` varchar(500) NOT NULL,
  `cham_luan_van` varchar(500) NOT NULL,
  `khoa_luan` varchar(500) NOT NULL,
  `cham_khoa_luan` varchar(500) NOT NULL,
  `nc_khoa_hoc` varchar(500) NOT NULL,
  `thuc_tap_tot_nghiep` varchar(500) NOT NULL,
  `cham_thuc_tap_tot_nghiep` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nghien_cuu`
--

INSERT INTO `nghien_cuu` (`id_nghien_cuu`, `id_giaovien`, `luan_an`, `cham_luan_an`, `luan_van`, `cham_luan_van`, `khoa_luan`, `cham_khoa_luan`, `nc_khoa_hoc`, `thuc_tap_tot_nghiep`, `cham_thuc_tap_tot_nghiep`) VALUES
(1, 3, 'Luận Án A', 'Chấm Luận Án B', 'Luận Văn A', 'CHấm Luận Văn B', 'Khóa Luận A', 'Chấm Khóa Luận A', 'NC Khoa Học', 'TTTN', 'TTTN'),
(9, 159, 'Luận Án A', 'Luận Án B', 'Luận Văn A', 'Chấm Luận Văn B', 'Khóa Luận A', 'Chấm Khóa Luận A', '', '', ''),
(11, 160, 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'B', 'JK'),
(12, 161, 'a', 'VVVV', '', '', '', '', '', '', ''),
(13, 162, 'f', 'BBBB', 'CCCC', 'DDDD', 'EEE', '', '', '', ''),
(14, 160, 'Luận Án 01', 'Chấm Luận Án 01', 'Luận Văn 01', 'Chấm Luận Văn 01', 'Khóa Luận 01', 'Chấm Khóa Luận 01', 'NNKH 01', 'TTTN 01', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ngoi_hoi_dong`
--

CREATE TABLE `ngoi_hoi_dong` (
  `id_ngoihoidong` int(11) NOT NULL,
  `id_giaovien` int(11) NOT NULL,
  `hoat_dong` varchar(500) NOT NULL,
  `so_gio` float NOT NULL,
  `ghi_chu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ngoi_hoi_dong`
--

INSERT INTO `ngoi_hoi_dong` (`id_ngoihoidong`, `id_giaovien`, `hoat_dong`, `so_gio`, `ghi_chu`) VALUES
(1, 160, 'Đi họ', 5, 'Rất Vui'),
(2, 160, 'Culi', 10000000000, 'Sadddd'),
(3, 159, 'á', 0, ''),
(4, 0, 'ssss', 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id_tai_khoan` int(11) NOT NULL,
  `ten_tai_khoan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nhom_tai_khoan` tinyint(2) NOT NULL,
  `ten_sinh_vien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`id_tai_khoan`, `ten_tai_khoan`, `mat_khau`, `nhom_tai_khoan`, `ten_sinh_vien`, `sdt`, `ngay_sinh`, `ngay_tao`) VALUES
(0, 'dungb', '21232f297a57a5a743894a0e4a801fc3', 1, 'Nguyễn Văn A', '097878328', '12/1/1888', '2016-09-17 06:16:17'),
(3, '0300', '15be6c30a18e2e9baf739f457193fdaf', 0, 'Nguyễn Văn Ba', '081849726', '1/1/1998', '2019-10-05 12:23:33'),
(159, 'giangdm', '22567749d1b13a69bb01f52c759b3c2d', 1, 'Đào Mạnh Giang', '0123456789', '12/12/1975', '2020-05-25 08:41:59'),
(160, 'trongtv', 'c175bb71b4d0e6d68fc729d150b289d9', 0, 'Trần Văn Trọng', '0123456', '12/13/1977', '2020-05-25 08:43:49'),
(161, 'hoangdv', '80535bfa6b5f63f2a9f4f5426683bd81', 0, 'Đặng Văn Hoàng', '01234567', '19/05/1963', '2020-05-25 08:44:31'),
(162, 'thuyltt', 'd32ec7bb3535415307c3cd19c53e558d', 0, 'Lưu Thị Thu Thủy', '1321056', '113165165', '2020-05-25 08:44:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuc_tap`
--

CREATE TABLE `thuc_tap` (
  `id` int(11) NOT NULL,
  `id_giaovien` int(11) NOT NULL,
  `dia_ban` varchar(500) NOT NULL,
  `khoang_cach` int(11) NOT NULL,
  `so_sv` int(11) NOT NULL,
  `doc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thuc_tap`
--

INSERT INTO `thuc_tap` (`id`, `id_giaovien`, `dia_ban`, `khoang_cach`, `so_sv`, `doc`) VALUES
(2, 160, 'Hải Phòn', 102, 2, 4),
(3, 160, 'Cà Mau', 1000, 1, 0),
(5, 160, 'aaaa', 10, 12, 0),
(6, 160, '', 0, 0, 0),
(7, 0, 'aaaaaaaaaaaaa', 0, 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cham_thi`
--
ALTER TABLE `cham_thi`
  ADD PRIMARY KEY (`id_chamthi`);

--
-- Chỉ mục cho bảng `coi_thi`
--
ALTER TABLE `coi_thi`
  ADD PRIMARY KEY (`id_coi_thi`);

--
-- Chỉ mục cho bảng `day_gioi`
--
ALTER TABLE `day_gioi`
  ADD PRIMARY KEY (`id_daygioi`);

--
-- Chỉ mục cho bảng `khoa_luan`
--
ALTER TABLE `khoa_luan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  ADD PRIMARY KEY (`id_lop`);

--
-- Chỉ mục cho bảng `luan_an`
--
ALTER TABLE `luan_an`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `luan_van`
--
ALTER TABLE `luan_van`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nghiencuu`
--
ALTER TABLE `nghiencuu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nghien_cuu`
--
ALTER TABLE `nghien_cuu`
  ADD PRIMARY KEY (`id_nghien_cuu`);

--
-- Chỉ mục cho bảng `ngoi_hoi_dong`
--
ALTER TABLE `ngoi_hoi_dong`
  ADD PRIMARY KEY (`id_ngoihoidong`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id_tai_khoan`);

--
-- Chỉ mục cho bảng `thuc_tap`
--
ALTER TABLE `thuc_tap`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cham_thi`
--
ALTER TABLE `cham_thi`
  MODIFY `id_chamthi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `coi_thi`
--
ALTER TABLE `coi_thi`
  MODIFY `id_coi_thi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `day_gioi`
--
ALTER TABLE `day_gioi`
  MODIFY `id_daygioi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `khoa_luan`
--
ALTER TABLE `khoa_luan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  MODIFY `id_lop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `luan_an`
--
ALTER TABLE `luan_an`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `luan_van`
--
ALTER TABLE `luan_van`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nghiencuu`
--
ALTER TABLE `nghiencuu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nghien_cuu`
--
ALTER TABLE `nghien_cuu`
  MODIFY `id_nghien_cuu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `ngoi_hoi_dong`
--
ALTER TABLE `ngoi_hoi_dong`
  MODIFY `id_ngoihoidong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id_tai_khoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT cho bảng `thuc_tap`
--
ALTER TABLE `thuc_tap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
