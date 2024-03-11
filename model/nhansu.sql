-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 03, 2023 lúc 12:41 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhansu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangluong`
--

CREATE TABLE `bangluong` (
  `maLuong` int(11) NOT NULL,
  `maCB` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `nam` int(11) NOT NULL,
  `luongCoBan` int(11) NOT NULL,
  `tienThuong` int(11) NOT NULL,
  `tienPhat` int(11) NOT NULL,
  `heSoLuong` int(11) NOT NULL,
  `tienLuong` int(11) NOT NULL,
  `luongThucNhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bangluong`
--

INSERT INTO `bangluong` (`maLuong`, `maCB`, `thang`, `nam`, `luongCoBan`, `tienThuong`, `tienPhat`, `heSoLuong`, `tienLuong`, `luongThucNhan`) VALUES
(7, 74, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 75, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `canbo`
--

CREATE TABLE `canbo` (
  `maCB` int(11) NOT NULL,
  `hoTen` varchar(25) NOT NULL,
  `ngaySinh` date NOT NULL,
  `gioiTinh` varchar(10) NOT NULL,
  `diaChi` varchar(30) NOT NULL,
  `soDT` int(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `canbo`
--

INSERT INTO `canbo` (`maCB`, `hoTen`, `ngaySinh`, `gioiTinh`, `diaChi`, `soDT`, `email`) VALUES
(72, 'Chí', '2023-07-13', 'Nam', 'VN', 114, 'chidb.21it@vku.udn.vn'),
(74, 'Đặng Bá Chí', '2003-03-28', 'Nữ', 'Việt Nam', 115, 'chidb.21it@vku.udn.vn'),
(75, 'Hồ Sỹ Vinh', '2023-07-07', 'Nam', 'Việt Nam', 114, 'chidb.21it@vku.udn.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `maCV` int(11) NOT NULL,
  `tenCV` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`maCV`, `tenCV`) VALUES
(1, ''),
(10, 'Giám sát');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hosocanbo`
--

CREATE TABLE `hosocanbo` (
  `maHS` int(11) NOT NULL,
  `maCB` int(11) NOT NULL,
  `maCV` int(11) NOT NULL,
  `maPB` int(11) NOT NULL,
  `trinhDo` varchar(30) NOT NULL,
  `ngayVao` date NOT NULL,
  `ngayRa` date NOT NULL,
  `lyDo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hosocanbo`
--

INSERT INTO `hosocanbo` (`maHS`, `maCB`, `maCV`, `maPB`, `trinhDo`, `ngayVao`, `ngayRa`, `lyDo`) VALUES
(17, 72, 1, 1, 'Trung Cấp', '2023-07-18', '2023-07-25', 'Đi học'),
(18, 74, 1, 1, '', '0000-00-00', '0000-00-00', ''),
(19, 75, 1, 1, '', '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `maPB` int(11) NOT NULL,
  `tenPB` varchar(30) NOT NULL,
  `diaChi` varchar(30) NOT NULL,
  `sDT` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`maPB`, `tenPB`, `diaChi`, `sDT`, `email`) VALUES
(1, '', '', 0, ''),
(9, 'Quản lý', 'Việt Nam', 113, 'chidb.21it@vku.udn.vn');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bangluong`
--
ALTER TABLE `bangluong`
  ADD PRIMARY KEY (`maLuong`),
  ADD KEY `maCB` (`maCB`);

--
-- Chỉ mục cho bảng `canbo`
--
ALTER TABLE `canbo`
  ADD PRIMARY KEY (`maCB`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`maCV`),
  ADD KEY `maCV` (`maCV`);

--
-- Chỉ mục cho bảng `hosocanbo`
--
ALTER TABLE `hosocanbo`
  ADD PRIMARY KEY (`maHS`),
  ADD KEY `maCV` (`maCV`),
  ADD KEY `maCB` (`maCB`,`maPB`),
  ADD KEY `maPB` (`maPB`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`maPB`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bangluong`
--
ALTER TABLE `bangluong`
  MODIFY `maLuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `canbo`
--
ALTER TABLE `canbo`
  MODIFY `maCB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `maCV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `hosocanbo`
--
ALTER TABLE `hosocanbo`
  MODIFY `maHS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `phongban`
--
ALTER TABLE `phongban`
  MODIFY `maPB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bangluong`
--
ALTER TABLE `bangluong`
  ADD CONSTRAINT `bangluong_ibfk_1` FOREIGN KEY (`maCB`) REFERENCES `canbo` (`maCB`);

--
-- Các ràng buộc cho bảng `hosocanbo`
--
ALTER TABLE `hosocanbo`
  ADD CONSTRAINT `hosocanbo_ibfk_1` FOREIGN KEY (`maCB`) REFERENCES `canbo` (`maCB`),
  ADD CONSTRAINT `hosocanbo_ibfk_2` FOREIGN KEY (`maCV`) REFERENCES `chucvu` (`maCV`),
  ADD CONSTRAINT `hosocanbo_ibfk_3` FOREIGN KEY (`maPB`) REFERENCES `phongban` (`maPB`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
